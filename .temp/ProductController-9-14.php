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
use App\Models\Price as Price;
use App\Models\Product as Product;
use App\Models\ProductVariant;
use App\Models\ProductFeature;
use File;
use Redirect;

use App;
use Session;
use \Illuminate\Database\Eloquent\Collection;
use App\Ecommerce\helperFunctions;

class ProductController extends Controller
{


	public function index()
	{
		// $products = Product::orderBy('name', 'asc')->take(6)->get();
		$new_products     = Product::orderBy('created_at', 'desc')->take(12)->get();
		$get_best_sellers = OrderProduct::select('product_id', \DB::raw('COUNT(product_id) as count'))->groupBy('product_id')->orderBy('count', 'desc')->take(8)->get();
		$best_sellers     = [];
		foreach ($get_best_sellers as $product)
		{
			$best_sellers[] = $product->product;
		}
		//helperFunctions::getPageInfo($sections,$cart,$total);
		return view('frontend.shop.index', compact('new_products', 'best_sellers', 'sections', 'cart', 'total'));
	}


	public function show($id, $slug = null)
	{
		$product            = Product::findBySlugOrIdOrFail($id);
		$product_categories = $product->categories()->lists('id')->toArray();

		// dd($product, $product->features, $product->categories, $product->prices, $product->options, $product->variants);
		$similair = Category::find($product_categories[array_rand($product_categories)])->products()->whereNotIn('id', [$id])->orderByRaw('RAND()')->take(6)->get();

		return view('frontend.shop.product', compact('sections', 'product', 'similair', 'cart', 'total'));
	}

	/**
	 * @param Request $request
	 */

	public function store(Request $request)
	{

		/*
		 * Validate the submitted Data
		 */
    //    $this->validate($request, [  'name' => 'required' ]);

		if ($request->hasFile('album')) {
			foreach ($request->album as $photo) {
				if ($photo && strpos($photo->getMimeType(), 'image') === false) {
					return \Redirect()->back();
				}
			}
		}

		/*
		 * Upload a new thumbnail
		 */
		$dest = 'testing/TEST';

		//$dest  = 'uploads/products/today';
		$name  = str_random(11) . '_' . $request->file('thumbnail')->getClientOriginalName();
		//$name2 = str_random(4) . '_' . $request->file('thumbnail2')->getClientOriginalName();
		$request->file('thumbnail')->move($dest, $name);
		//$request->file('thumbnail2')->move($dest, $name2);
		$product = $request->all();

		// dd($product);

		$product['thumbnail'] = '/' . $dest . $name;

		//$product['thumbnail2'] = '/' . $dest . $name2;

		$product = Product::create($product);



		/*
		 * Upload Album Photos
		 */
		        if ($request->hasFile('album')) {
		            foreach ($request->album as $photo) {
		                if ($photo) {
		                    $name = str_random(11)."_".$photo->getClientOriginalName();
		                    $photo->move($dest, $name);
		                    AlbumPhoto::create([
		                        'product_id' => $product->id,
		                        'photo_src' => "/".$dest.$name
		                    ]);
		                }
		            }
		        }

		/**
		 * Linking the categories to the product
		 */

		foreach ($request->categories as $category_id)
		{
			CategoryProduct::create(['category_id' => $category_id, 'product_id' => $product->id]);
		}

		/*
		 * Linking the options to the product
		 */

		if ($request->has('options'))
		{
			foreach ($request->options as $option_details)
			{
				if (!empty($option_details['name']) && !empty($option_details['values'][0]))
				{
					$option = Option::create([
						'name'       => $option_details['name'],
						'product_id' => $product->id
					]);
					foreach ($option_details['values'] as $value)
					{
						OptionValue::create([
							'value'     => $value,
							'option_id' => $option->id
						]);
					}
				}
			}
		}
		if (!empty($request->price))
		{
			foreach ($request->price as $request)
			{
					$price = new Price;
					$price->product_id  = $product->id;
					$price->price       = $request->price;
					$price->model       = $request->model;
					$price->sku         = $request->sku;
					$price->upc         = $request->upc;
					$price->quantity    = $request->quantity;
					$price->details     = $request->detail;
				$product->productPrice()->save($price);				            }
		}



		        if (!empty($request->attribute_name))
		        {
		            foreach ($request->attribute_name as $key => $item)
		            {
		                $productVariant                          = new ProductVariant();
		                $productVariant->attribute_name          = $item;
		                $productVariant->product_attribute_value = $request->product_attribute_value[$key];
		                $product->productVariants()->save($productVariant);
		            }
		        }

		        if (!empty($request->feature_name))
		        {
		            foreach ($request->feature_name as $feature)
		            {
		                $productFeature               = new ProductFeature();
		                $productFeature->feature_name = $feature;
		                $product->productFeatures()->save($productFeature);

		            }
		        }


		FlashAlert()->success('Success!', 'The Product Was Successfully Added');

//		return \Redirect(getLang() . '/admin/products');
		return View::make('/admin/product/create')->__tostring();
	}

	public function load(Request $request)
	{
		// $formData = $request->all();
		//  dd($formData);

		/*
		 * Validate the submitted Data
		 */
		//        $validator = $this->validate($request, [
		//            'name' => 'required'
		//
		//        ]);

		if ($request->hasFile('album'))
		{
			foreach ($request->album as $photo)
			{
				if ($photo && strpos($photo->getMimeType(), 'image') === false)
				{
					return \Redirect()->back();
				}
			}
		}

		/*
		 * Upload a new thumbnail
		 */
		$dest  = 'uploads/products/today';
		$name  = str_random(11) . '_' . $request->file('thumbnail')->getClientOriginalName();
		$name2 = str_random(11) . '_' . $request->file('thumbnail2')->getClientOriginalName();
		$request->file('thumbnail')->move($dest, $name);
		$request->file('thumbnail2')->move($dest, $name2);
		$product = $request->all();

		// dd($product);

		$product['thumbnail'] = '/' . $dest . $name;

		$product['thumbnail2'] = '/' . $dest . $name2;

		$product = Product::create($product);

//		$product->prices = Price::create($product);

		// $product = Model::create($request->all());
		// $product->price()->create($request->all());

		//  $product = Product::create($product, $request->except('attribute_name', 'product_attribute_value', 'album', 'options'));

		/*
		 * Upload Album Photos
		 */
		//        if ($request->hasFile('album'))
		//        {
		//            foreach ($request->album as $photo)
		//            {
		//                if ($photo)
		//                {
		//                    $name = str_random(11) . '_' . $photo->getClientOriginalName();
		//                    $photo->move($dest, $name);
		//                    AlbumPhoto::create([
		//                        'product_id'  => $product->id,
		//                        'photo_src'   => '/' . $dest . $name
		//                        //,
		//                        //'alt'         => $request->get(['alt']),
		//                        //'caption'     => $request->get(['caption']),
		//                       // 'photoinfo'   => $request->get(['photoinfo']),
		//                       // 'linkto'      => $request->get(['linkto']),
		//                       // 'use_main'    => $request->get(['use_main']),
		//                       // 'use_thumb'   => $request->get(['use_thumb']),
		//                       // 'use_gallery' => $request->get(['use_gallery'])

		//                        //'alt'         => $photo->alt,
		//                        //'caption'     => $photo->caption,
		//                       // 'photoinfo'   => $photo->photoinfo,
		//                       // 'linkto'      => $photo->linkto,
		//                       // 'use_main'    => $photo->use_main,
		//                       // 'use_thumb'   => $photo->use_thumb,
		//                       // 'use_gallery' => $photo->use_gallery
		//                    ]);
		//                }
		//            }
		//        }

		// if ($request->hasFile('album'))
		// {
		// 	foreach ($request->album as $photo)
		// 	{
		// 		if ($photo)
		// 		{
		// 			$name = str_random(11) . '_' . $photo->getClientOriginalName();
		// 			$photo->move($dest, $name);
		// 			AlbumPhoto::create([
		// 				'product_id' => $product->id,
		// 				'photo_src'  => '/' . $dest . $name
		// 			]);
		// 		}
		// 	}
		// }

		/*
		 * Linking the categories to the product
		 */

			//        foreach ($request->categories as $category_id)
		//        {
		//            CategoryProduct::create(['category_id' => $category_id, 'product_id' => $product->id]);
		//        }

		/*
		 * Linking the options to the product
		 */

		//        if ($request->has('options'))
		//        {
		//            foreach ($request->options as $option_details)
		//            {
		//                if (!empty($option_details['name']) && !empty($option_details['values'][0]))
		//                {
		//                    $option = Option::create([
		//                        'name'       => $option_details['name'],
		//                        'product_id' => $product->id
		//                    ]);
		//                    foreach ($option_details['values'] as $value)
		//                    {
		//                        OptionValue::create([
		//                            'value'     => $value,
		//                            'option_id' => $option->id
		//                        ]);
		//                    }
		//                }
		//            }
		//        }

		//        if ($request->has('prices')){
		//            foreach ($request->prices as $price_details) {
		//                if (!empty($price_details['price'])   ) {
		//                    $price = Price::create([
		//                        'price' => $price_details['price'],
		//                        'product_id' => $product->id
		//                    ]);
		//
		//                }
		//            }
		//        }
		//        if ($request->has('prices')) {
		//            Price::create($request->all());
		//        }

		//        Price::create($request->all());

		//        if ($request->has('prices'))
		//        {
		//            $price = $request->all();
		//            Price::create($price);
		////            foreach ($request->prices as $productPrice)
		////            {
		////                if (!empty($productPrice['price']))
		////                {
		//////                    $price = Price::create([
		//////                        'product_id' => $product->id,
		//////                        'price'      => $productPrice['price'],
		//////                        'model'      => $productPrice['model'],
		//////                        'sku'        => $productPrice['sku'],
		//////                        'upc'        => $productPrice['upc'],
		//////                        'quantity'   => $productPrice['quantity'],
		//////                        'details'    => $productPrice['details']
		//////                    ]);
		////                    Price::create($price);
		////                }
		////            }
		//        }

		//        if (!empty($request->attribute_name))
		//        {
		//            foreach ($request->attribute_name as $key => $item)
		//            {
		//                $productVariant                          = new ProductVariant();
		//                $productVariant->attribute_name          = $item;
		//                $productVariant->product_attribute_value = $request->product_attribute_value[$key];
		//                $product->productVariants()->save($productVariant);
		//            }
		//        }
		//
		//        if (!empty($request->feature_name))
		//        {
		//            foreach ($request->feature_name as $feature)
		//            {
		//                $productFeature               = new ProductFeature();
		//                $productFeature->feature_name = $feature;
		//                $product->productFeatures()->save($productFeature);
		//
		//            }
		//        }

		FlashAlert()->success('Success!', 'The Product Was Successfully Added');

		return \Redirect(getLang() . '/admin/products');
	}

	/**
	 * @param Request $request
	 * @param $id
	 */
	public function edit(Request $request, $id)
	{
		$product = Product::find($id);
		//  $slug = Str::slug($product->name);
		/*
		 * Validate the submitted Data
		 */
		//        $this->validate($request, [
		//            'name'         => 'required',
		//            'manufacturer' => 'required',
		//            'price'        => 'required',
		//            'details'      => 'required',
		//            'quantity'     => 'required',
		//            'categories'   => 'required',
		//            'thumbnail'    => 'image'
		//        ]);

		if ($request->hasFile('album'))
		{
			foreach ($request->album as $photo)
			{
				if ($photo && strpos($photo->getMimeType(), 'image') === false)
				{
					return \Redirect()->back();
				}
			}
		}

		/*
		 * Remove the old categories from the pivot table and maintain the reused ones
		 */
		$added_categories = [];
		foreach ($product->categories as $category)
		{
			if (!in_array($category->id, $request->categories))
			{
				CategoryProduct::whereProduct_id($product->id)->whereCategory_id($category->id)->delete();
			}
			else
			{
				$added_categories[] = $category->id;
			}
		}

		/*
		 * Link the new categories to the pivot table
		 */
		foreach ($request->categories as $category_id)
		{
			if (!in_array($category_id, $added_categories))
			{
				CategoryProduct::create(['category_id' => $category_id, 'product_id' => $product->id]);
			}
		}

		$info = $request->all();

		/*
		 * Upload a new thumbnail and delete the old one
		 */
		$dest = 'content/images/';
		if ($request->file('thumbnail'))
		{
			File::delete(public_path() . $product->thumbnail);
			$name = str_random(11) . '_' . $request->file('thumbnail')->getClientOriginalName();
			$request->file('thumbnail')->move($dest, $name);
			$info['thumbnail'] = '/' . $dest . $name;
		}
		/*
		 * Upload Album Photos
		 */
		if ($request->hasFile('album'))
		{
			foreach ($request->album as $photo)
			{
				if ($photo)
				{
					$name = str_random(11) . '_' . $photo->getClientOriginalName();
					$photo->move($dest, $name);
					AlbumPhoto::create([
						'product_id' => $product->id,
						'photo_src'  => '/' . $dest . $name
					]);
				}
			}
		}

		$product->update($info);

		//$pivotTableData = App\Models\Product::find(1)->prices()->pivot;

		/*
		 * Linking the options to the product
		 */
		if ($request->has('options'))
		{
			foreach ($request->options as $option_details)
			{
				if (!empty($option_details['name']) && !empty($option_details['values']['name'][0]))
				{
					if (isset($option_details['id']))
					{
						$size = count($option_details['values']['id']);
						Option::find($option_details['id'])->update(['name' => $option_details['name']]);
						foreach ($option_details['values']['name'] as $key => $value)
						{
							if ($key < $size)
							{
								OptionValue::find($option_details['values']['id'][$key])->update(['value' => $value]);
							}
							else
							{
								OptionValue::create([
									'value'     => $value,
									'option_id' => $option_details['id']
								]);
							}
						}
					}
					else
					{
						$option = Option::create([
							'name'       => $option_details['name'],
							'product_id' => $product->id
						]);
						foreach ($option_details['values']['name'] as $value)
						{
							if (!empty($value))
							{
								OptionValue::create([
									'value'     => $value,
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
	 * @param  array   $variants
	 * @return mixed
	 */
	private function getProductVariants($variants = [])
	{
		if (isset($variants))
		{
			$variants = array_map(
				function ($v)
				{
					return explode(':', $v);
				},
				explode(',', $variants)
			);
		}
		return $variants;
	}

	/**
	 * @param  array   $features
	 * @return mixed
	 */
	private function getProductFeatures($features = [])
	{
		if (isset($features))
		{
			$features = array_map(
				function ($v)
				{
					return explode(':', $v);
				},
				explode(',', $features)
			);
		}
		return $features;
	}

	/**
	 * @param  array   $prices
	 * @return mixed
	 */
	private function getPrices($prices = [])
	{
		if (isset($prices))
		{
			$prices = array_map(
				function ($v)
				{
					return explode(':', $v);
				},
				explode(',', $prices)
			);
		}
		return $prices;
	}

	/**
	 * @param  $id
	 * @return mixed
	 */
	public function togglePublish($id)
	{
		return $this->product->togglePublish($id);
	}

	/**
	 * @param $id
	 */
	public function delete($id)
	{
		$product = Product::find($id);

		/*
		 * Remove the product , all its linked categories and delete the thumbnail
		 */
		File::delete(public_path() . $product->thumbnail);
		File::delete(public_path() . $product->thumbnail2);
		CategoryProduct::whereProduct_id($id)->delete();

		Price::whereProduct_id($id)->delete();
//        ProductFeature::whereProduct_id($id)->delete();
		//        ProductVariant::whereProduct_id($id)->delete();

		$product->delete();
		return \Redirect::back();
	}

	/**
	 * @param $id
	 * @param $photo_id
	 */
	public function deletePhoto($id, $photo_id)
	{
		$photo = AlbumPhoto::find($photo_id);
		File::delete(public_path() . $photo->photo_src);
		AlbumPhoto::destroy($photo_id);
		return \Redirect()->back();
	}

	/**
	 * @param $id
	 */
	public function deleteOption($id)
	{
		Option::destroy($id);
		return \Redirect()->back();
	}

	/**
	 * @param $id
	 */
	public function deletePrice($id)
	{
		Price::destroy($id);
		return \Redirect()->back();
	}

	/**
	 * @param $id
	 */
	public function deleteOptionValue($id)
	{
		OptionValue::destroy($id);
		return \Redirect()->back();
	}

	/**
	 * @param Request $request
	 */
	public function search(Request $request)
	{
		if (strtoupper($request->sort) == 'NEWEST')
		{
			$products = Product::where('name', 'like', '%' . $request->q . '%')->orderBy('created_at', 'desc')->paginate(40);
		}
		elseif (strtoupper($request->sort) == 'HIGHEST')
		{
			$products = Product::where('name', 'like', '%' . $request->q . '%')->orderBy('price', 'desc')->paginate(40);
		}
		elseif (strtoupper($request->sort) == 'LOWEST')
		{
			$products = Product::where('name', 'like', '%' . $request->q . '%')->orderBy('price', 'asc')->paginate(40);
		}
		else
		{
			$products = Product::where('name', 'like', '%' . $request->q . '%')->paginate(40);
		}
		helperFunctions::getPageInfo($sections, $cart, $total);
		$query = $request->q;
		return view('site.search', compact('sections', 'cart', 'total', 'products', 'query'));
	}
}
