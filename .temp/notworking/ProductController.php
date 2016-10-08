<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Yajra\Datatables\Datatables;

class ProductController extends Controller
{
    public function index()
    {
        return view('product.index');
    }

    public function getProducts()
    {
        return Datatables::of(Product::select('*'))
            ->addColumn('action', function ($model) {
                return '
                    <a href="/Scaffolder\/product/'.$model->id.'/edit"><i class="material-icons">create</i></a>
                    <a href="#" onclick="deleteModel(\''.$model->id.'\')"><i class="material-icons">delete</i></a>';
            })
            ->make(true);
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [

            'name' => 'required',
            'details' => '',
            'manufacturer' => '',
            'thumbnail' => '',
            'is_published' => '',
            'status' => '',

        ]);

        Product::create($request->all());

        return redirect(route('Scaffolder\.product.index'));
    }

    public function show($id)
	{
		return 'Not implemented';
	}

    public function edit($id)
	{
		$model = Product::find($id);

        return view('product.edit')->with('model', $model);
	}

    public function update($id, Request $request)
	{
        $this->validate($request, [

            'name' => 'required',
            'details' => '',
            'manufacturer' => '',
            'thumbnail' => '',
            'is_published' => '',
            'status' => '',

        ]);

        Product::find($id)->fill($request->all())->save();

		return response()->json(['message' => 'ok']);
	}

    public function destroy($id)
	{
        Product::destroy($id);

		return response()->json(['message' => 'ok']);
	}
}
