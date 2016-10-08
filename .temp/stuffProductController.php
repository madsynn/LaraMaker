<?php

namespace Fully\Http\Controllers;


use App\Helpers\Thumbnail;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Repositories\Category\CategoryInterface;
use App\Repositories\Category\CategoryRepository as Category;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Logic\Image\ImageRepository;
use Illuminate\Support\Facades\Input;
use App\Models\ProductVariant;
use App\Models\ProductFeature;
use App\Models\Product;
use App\Models\User;



class ProductController extends AppBaseController
{

    private $productRepository;
    private $model;
    private $user;
    protected $img;
    protected $category;

    /**
     * @param ProductRepository $productRepo
     * @param CategoryInterface $category
     */
    public function __construct(ProductRepository $productRepo, CategoryInterface $category, Product $model, User $user, ImageRepository $imageRepository)
    {
        $this->productRepository = $productRepo;
        $this->category          = $category;
        $this->model = $model;
        $this->user = $user;
        $this->image = $imageRepository;

    }

    /**
     * Display a listing of the Product.
     *
     * @param  Request    $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->productRepository->pushCriteria(new RequestCriteria($request));
        $products = $this->productRepository->paginate(20);

        return view('backend.products.index')
            ->with('products', $products);
    }

    /**
     * Show the form for creating a new Product.
     *
     * @return Response
     */
    public function create()
    {
        $categories = $this->category->lists();

        return view('backend.products.create', compact('categories'));
    }

    /**
     * Store a newly created Product in storage.
     *
     * @param  CreateProductRequest $request
     * @return Response
     */












  $model->getAttributes() will return an array of raw attributes (as they are stored in the database), and $model->toArray() will return all the model's raw, mutated, and appended attributes.


  $productPricing = $request->input('price');
  $productPricing = $request->input('quantity');
  $productPricing = $request->input('model');
  $productPricing = $request->input('sku');
  $productPricing = $request->input('upc');

  $productPricing = $request->input('products.0.prices.0.price');




$factory->define(App\Models\Product::class, function (Faker\Generator $faker) {

    $status = ['Online','Offline','Removed', 'Archived','Discontinued'];

    return [
        'status' => $status[rand($status)], true, 'Faker',
        'category_id' =>  '1',
        'slug' =>  $faker->word,
        'ispromo' =>  $faker->boolean($chanceOfGettingTrue = 50),
        'is_published' =>  $faker->boolean($chanceOfGettingTrue = 50),
        'name' =>  $faker->word,
        'subtitle' =>  $faker->word ,
        'manufacturer' =>  $faker->word ,
        'details' =>  $faker->paragraph,
        'description' =>  $faker->paragraph,
        'thumbnail' =>  $faker->imageUrl(600, 480),
        'thumbnail2' =>  $faker->imageUrl(600, 600, 'business', true, 'Faker'),
        'photo_album' =>  $faker->imageUrl(600, 480),
        'pubished_at' =>  $faker->dateTimeBetween() ,
        'video_url' =>  $faker->word ,
        'meta_title' =>  $faker->word ,
        'meta_description' =>  $faker->word ,
        'facebook_title' =>  $faker->word ,
        'google_plus_title' =>  $faker->word ,
        'twitter_title' =>  $faker->word ,
        'lang' =>  $faker->word ,
        'deleted_at' =>  $faker->dateTimeBetween()

    ];
});













    public function store(CreateProductRequest $request)
    {
        $input = $request->all();


        if ($request->hasFile('product_image_file'))
        {
            $file = $request->file('product_image_file');
            $file = $this->productRepository->uploadProductImage($file);

            $request->merge(['product_image' => $file->getFileInfo()->getFilename()]);

            $this->generateProductThumbnail($file);
        }

        $product = $this->productRepository->create($input, $request->except('attribute_name', 'product_attribute_value', 'product_image_file'));

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

        Flash::success('Product saved successfully.');

        return redirect(route(getLang() . '.admin.products.index'));
    }

    /**
     * Display the specified Product.
     *
     * @param  int        $id
     * @return Response
     */
    public function show($id)
    {
        $product = $this->productRepository->findWithoutFail($id);

        if (empty($product))
        {
            Flash::error('Product not found');

            return redirect(route(getLang() . '.admin.products.index'));
        }

        return view('backend.products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified Product.
     *
     * @param  int        $id
     * @return Response
     */
    public function edit($id)
    {
        $product = $this->productRepository->findWithoutFail($id);

        if (empty($product))
        {
            Flash::error('Product not found');

            return redirect(route(getLang() . '.admin.products.index'));
        }

        return view('backend.products.edit')->with('product', $product);
    }

    /**
     * Update the specified Product in storage.
     *
     * @param  int                  $id
     * @param  UpdateProductRequest $request
     * @return Response
     */

    public function update($id, UpdateProductRequest $request)
    {
        $product = $this->productRepository->findWithoutFail($id);

        if (empty($product))
        {
            Flash::error('Product not found');

            return redirect(route(getLang() . '.admin.products.index'));
        }

        if ($request->hasFile('product_image_file'))
        {
            $file = $request->file('product_image_file');
            $file = $this->productRepository->uploadProductImage($file);
            $request->merge([
                'product_image' => $file->getFileInfo()->getFilename()
            ]);
            $this->generateProductThumbnail($file);
        }
        if (empty($product))
        {
            Flash::error('Product not found');
            return redirect(route('admin.products.index'));
        }

        $product->update($request->except('attribute_name', 'product_attribute_value', 'product_image_file', 'feature_name'));

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

        $product = $this->productRepository->update($request->all(), $id);

        Flash::success('Product updated successfully.');

        return redirect(route(getLang() . '.admin.products.index'));
    }

    /**
     * Remove the specified Product from storage.
     *
     * @param  int        $id
     * @return Response
     */
    public function destroy($id)
    {
        $product = $this->productRepository->findWithoutFail($id);

        if (empty($product))
        {
            Flash::error('Product not found');

            return redirect(route('admin.products.index'));
        }

        $this->productRepository->delete($id);

        Flash::success('Product deleted successfully.');

        return redirect(route('admin.products.index'));
    }

    /**
     * @param array $variants
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

    private function getProductFeatures($features = [])
    {
        if (isset($features)) {
            $features = array_map(
                    function ($v) {
                        return explode(':', $v);
                    },
                    explode(',', $features)
            );
        }
        return $features;
    }

        /**
     * @param $file
     */
    private function generateProductThumbnail($file)
    {
        $sourcePath = $file->getPath() . '/' . $file->getFilename();
        $thumbPath = $file->getPath() . '/thumb_' . $file->getFilename();
        Thumbnail::generate_image_thumbnail($sourcePath, $thumbPath);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function togglePublish($id)
    {
        return $this->product->togglePublish($id);
    }

	public function lists()
	{
	//	return $this->product->get()->where('lang', $this->getLang())->lists('title', 'id');
	}

}
