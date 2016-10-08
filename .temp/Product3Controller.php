<?php

namespace Fully\Http\Controllers;


use Fully\Helpers\Thumbnail;
use Flash;
use Fully\Http\Controllers\AppBaseController;
use Fully\Http\Requests\CreateProductRequest;
use Fully\Http\Requests\UpdateProductRequest;
use Fully\Repositories\Category\CategoryInterface;
use Fully\Repositories\Category\CategoryRepository as Category;
use Fully\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
// use Fully\Logic\Image\ImageRepository;
use Illuminate\Support\Facades\Input;
use Fully\Models\ProductVariant;
use Fully\Models\ProductFeature;
use Fully\Models\Product;
use Fully\Models\User;



class ProductController extends AppBaseController
{

    private $productRepository;
    private $model;
    private $user;
    protected $image;
    protected $category;

    /**
     * @param ProductRepository $productRepo
     * @param CategoryInterface $category
     */
    public function __construct(ProductRepository $productRepo, CategoryInterface $category, Product $model, User $user)
    {
        $this->productRepository = $productRepo;
        $this->category          = $category;
        $this->model = $model;
        $this->user = $user;


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
    public function store(CreateProductRequest $request)
    {
        $input = $request->all();


        $product = $this->productRepository->create($input, $request->except('attribute_name', 'product_attribute_value' ));


		$product = new Product([
			'name' => $request->get('name'),
			'sku'  => $request->get('sku')
		]);

		$product->save();

		$imageName = $request->file('primary_image')->getClientOriginalName() . '.' .
		$request->file('primary_image')->getClientOriginalExtension();

		$usethisname = str_slug($product->name, '-');
		$usedir      = $usethisname;
		$usename     = pathinfo($imageName, PATHINFO_FILENAME);

		$DestinationDir = base_path() . '/public/uploads/products/' . $usedir;
		if (!$request->hasFile($DestinationDir)) {
		File::makeDirectory($DestinationDir, $mode = 0777, true, true);
		}


   if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $file = $this->productRepository->uploadProductImage($file);
            $request->merge(['image' => $file->getFileInfo()->getFilename()]);
            $this->generateProductThumbnail($file);
            $this->generateProductCatalog($file);
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

        if ($request->hasFile('primary_image'))
        {
            $file = $request->file('primary_image');
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

        $product->update($request->except('attribute_name', 'product_attribute_value', 'primary_image', 'feature_name'));

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
