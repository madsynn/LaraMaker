<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Category;
use App\Models\AlbumPhoto;
use App\Models\CategoryProduct;
use App\Models\Option;
use App\Models\OptionValue;
use App\Models\OrderProduct;
use App\Models\Price;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductFeature;
use File;
use Input;
use Redirect;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App;
use Session;
use \Illuminate\Database\Eloquent\Collection;
use App\Ecommerce\helperFunctions;

class ProductController extends Controller
{
	public function __construct()
	{
		//'middleware' => ['before', 'sentinel.auth', 'sentinel.permission']
		$this->middleware('sentinel.auth', ['except' => [
			'index',
			'show',
			'search'
		]]);
	}

//	public function __toString()
//	{
//		try {
//			return (string) $this->attributeToReturn; // If it is possible, return a string value from object.
//		} catch (Exception $e) {
//			return get_class($this).'@'.spl_object_hash($this); // If it is not possible, return a preset string to identify instance of object, e.g.
//		}
//	}

	public function index()
	{
		// $products = Product::orderBy('name', 'asc')->take(6)->get();
		$new_products = Product::orderBy('created_at', 'desc')->take(12)->get();
		$get_best_sellers = OrderProduct::select('product_id', \DB::raw('COUNT(product_id) as count'))->groupBy('product_id')->orderBy('count', 'desc')->take(8)->get();
		$best_sellers = [];
		foreach($get_best_sellers as $product){
			$best_sellers[] = $product->product;
		}
		//helperFunctions::getPageInfo($sections,$cart,$total);
		return view('frontend.shop.index', compact('new_products', 'best_sellers', 'sections', 'cart', 'total'));
	}


	public function show($id, $slug = null)
	{
		$product = Product::findBySlugOrIdOrFail($id);
		$product_categories = $product->categories()->lists('id')->toArray();

		// dd($product, $product->features, $product->categories, $product->prices, $product->options, $product->variants);
		$similair = Category::find($product_categories[array_rand($product_categories)])->products()->whereNotIn('id', [$id])->orderByRaw('RAND()')->take(6)->get();

		return view('frontend.shop.product', compact('sections', 'product', 'similair', 'cart', 'total'));
	}

//	public function store(CreateProductRequest $request)
	public function store(Request $request)
	{
	//	dd($request->all());

//		/**
//		 * Validate the submitted Data
//		 */
//		$this->validate($request, [
//			'name' => 'required',
//			'manufacturer' => 'required',
//			'price' => 'required',
//			'details' => 'required',
//			'quantity' => 'required',
//			'categories' => 'required',
//			'thumbnail' => 'required|image',
//		]);


		if($request->hasFile('album')){
			foreach($request->album as $photo){
				if($photo && strpos($photo->getMimeType(), 'image') === false){
					return \Redirect()->back();
				}
			}
		}


		/**
		 * Upload a new thumbnail and thumbnail2
		 */
		$dest  = 'uploads/products/today/';
		$name  = str_random(11) . '_' . $request->file('thumbnail')->getClientOriginalName();
		$request->file('thumbnail')->move($dest, $name);

		$name2 = str_random(11) . '_' . $request->file('thumbnail2')->getClientOriginalName();
		$request->file('thumbnail2')->move($dest, $name2);
		//$product = $request->all();
		$input = $request->all();

		 //dd($input);

		$input['thumbnail'] = '/' . $dest . $name;

		$input['thumbnail2'] = '/' . $dest . $name2;




		$product = Product::create($input, $request->except(
			'attribute_name',
			'product_attribute_value',
			'price',
			'sku',
			'quantity',
			'model',
			'upc',
			'alt_details',
			'feature_name',
			'use_icon',
			'icon',
			'photo_src',
			'alt',
			'caption',
			'photoinfo',
			'linkto',
			'use_main',
			'use_thumb',
			'use_gallery'
		));

//		try {
//			$product->prices()->create(Input::all());
//			//Flash::message('Article was successfully added');
//			FlashAlert()->success('Success!', 'The Product Was Successfully Added');
//			//return langRedirectRoute('admin.products');
//		} catch (ValidationException $e) {
//
//			FlashAlert()->error('Failed!', 'The Product Was Successfully Added');
////			return langRedirectRoute('admin.article.create')->withInput()->withErrors($e->getErrors());
//		}



//
//		$price = new Price();
//
//		$product->price()->title = $request->title;
//		$product->price()->save($price);



//		$user->save();
//		$profile = $user->profile()->save($profile);
//		$address = $user->address()->save($address);
//
//		$price = new Price();
//		$product->prices()->save($price);
//
//		if(!empty($request->prices)){
//			foreach($request->prices as $productPrice){
//
//				$price = new Price();
////				$price->product_id = $product->id;
////				$price->price =  $productPrice;
////				$price->upc =  $productPrice;
////				$price->model =  $productPrice;
////				$price->quantity =  $productPrice;
////				$price->sku =  $productPrice;
////				$price->alt_details =  $productPrice;
//				$product->prices()->save($price);
//				//dd($price);
//			}
//		}

	//product = Input::all();
	//	if($request->has('prices')){

			foreach($product->prices as $price){
				if(!empty($price['price'])){
					$product->prices()->create($price);

				}
			}
	//	}


		/**
		 * Upload Album Photos
		 */
//		if($request->hasFile('album')){
//			foreach($request->album as $photo){
//				if($photo){
//					$name = str_random(11) . "_" . $photo->getClientOriginalName();
//					$photo->move($dest, $name);
//
//					AlbumPhoto::create([
//						'product_id' => $product->id,
//						'photo_src' => "/" . $dest . $name,
//						'alt' => $photo->alt,
//						'caption' => $photo->caption,
//						'photoinfo' => $photo->photoinfo,
//						'linkto' => $photo->linkto,
//						'use_main' => $photo->use_main,
//						'use_thumb' => $photo->use_thumb,
//						'use_gallery' => $photo->use_gallery
//					]);
//				}
//			}
//		}


		/**
		 * Linking the categories to the product
		 */

		foreach($request->categories as $category_id){
			CategoryProduct::create(['category_id' => $category_id, 'product_id' => $product->id]);
		}

		/**
		 * Linking the options to the product
		 */

		if($request->has('options')){
			foreach($request->options as $option_details){
				if(!empty($option_details['name']) && !empty($option_details['values'][0])){
					$option = Option::create([
						'name' => $option_details['name'],
						'product_id' => $product->id
					]);
					foreach($option_details['values'] as $value){
						OptionValue::create([
							'value' => $value,
							'option_id' => $option->id
						]);
					}
				}
			}
		}

		if(!empty($request->attribute_name)){
			foreach($request->attribute_name as $key => $item){
				$productVariant = new ProductVariant();
				$productVariant->attribute_name = $item;
				$productVariant->product_attribute_value = $request->product_attribute_value[$key];
				$product->productVariants()->save($productVariant);
			}
		}

		if(!empty($request->feature_name)){
			foreach($request->feature_name as $feature){
				$productFeature = new ProductFeature();
				$productFeature->feature_name = $feature;
				$product->productFeatures()->save($productFeature);

			}
		}

		FlashAlert()->success('Success!', 'The Product Was Successfully Added');

		return \Redirect(getLang() . '/admin/products');
	}


	public function edit(Request $request, $id)
	{
		$product = Product::find($id);

		if($request->hasFile('album')){
			foreach($request->album as $photo){
				if($photo && strpos($photo->getMimeType(), 'image') === false){
					return \Redirect()->back();
				}
			}
		}


		/**
		 * Remove the old categories from the pivot table and maintain the reused ones
		 */
		$added_categories = [];
		foreach($product->categories as $category){
			if(!in_array($category->id, $request->categories)){
				CategoryProduct::whereProduct_id($product->id)->whereCategory_id($category->id)->delete();
			}else{
				$added_categories[] = $category->id;
			}
		}

		/**
		 * Link the new categories to the pivot table
		 */
		foreach($request->categories as $category_id){
			if(!in_array($category_id, $added_categories)){
				CategoryProduct::create(['category_id' => $category_id, 'product_id' => $product->id]);
			}
		}

		$info = $request->all();

		$dest = "A/images/";

		/**
		 * Upload a new thumbnail and delete the old one
		 */
		if($request->file('thumbnail')){
			File::delete(public_path() . $product->thumbnail);
			$name = str_random(11) . "_" . $request->file('thumbnail')->getClientOriginalName();
			$request->file('thumbnail')->move($dest, $name);
			$info['thumbnail'] = "/" . $dest . $name;
		}

		/**
		 * Upload a new thumbnail2 and delete the old one
		 */
		if($request->file('thumbnail2')){
			File::delete(public_path() . $product->thumbnail2);
			$name2 = str_random(11) . "_" . $request->file('thumbnail2')->getClientOriginalName();
			$request->file('thumbnail2')->move($dest, $name2);
			$info['thumbnail2'] = "/" . $dest . $name2;
		}


		/**
		 * Linking the options to the product
		 */
		if($request->has('options')){
			foreach($request->options as $option_details){
				if(!empty($option_details['name']) && !empty($option_details['values']['name'][0])){
					if(isset($option_details['id'])){
						$size = count($option_details['values']['id']);
						Option::find($option_details['id'])->update(['name' => $option_details['name']]);
						foreach($option_details['values']['name'] as $key => $value){
							if($key < $size){
								OptionValue::find($option_details['values']['id'][$key])->update(['value' => $value]);
							}else{
								OptionValue::create([
									'value' => $value,
									'option_id' => $option_details['id']
								]);
							}
						}
					}else{
						$option = Option::create([
							'name' => $option_details['name'],
							'product_id' => $product->id
						]);
						foreach($option_details['values']['name'] as $value){
							if(!empty($value)){
								OptionValue::create([
									'value' => $value,
									'option_id' => $option->id
								]);
							}
						}
					}
				}
			}
		}

		return \Redirect()->back()->with([
			'flash_message' => 'Product Successfully Modified'
		]);

	}






































	/**
	 * @param $id
	 *
	 * @return mixed
	 */
	public function togglePublish($id)
	{
		$product = Product::find($id);

		$product->is_published = ($product->is_published) ? false : true;
		$product->save();

		return Response::json(array('result' => 'success', 'changed' => ($product->is_published) ? 1 : 0));
	}

}
