<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Price;
use Yajra\Datatables\Datatables;

class PriceController extends Controller
{
    public function index()
    {
        return view('price.index');
    }

    public function getPrices()
    {
        return Datatables::of(Price::select('*'))
            ->addColumn('action', function ($model) {
                return '
                    <a href="/Scaffolder\/price/'.$model->id.'/edit"><i class="material-icons">create</i></a>
                    <a href="#" onclick="deleteModel(\''.$model->id.'\')"><i class="material-icons">delete</i></a>';
            })
            ->make(true);
    }

    public function create()
    {
        return view('price.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [

            'price_id' => '',
            'price' => '',
            'title' => '',
            'model' => '',
            'sku' => '',
            'upc' => '',
            'quantity' => '',
            'alt_details' => '',

        ]);

        Price::create($request->all());

        return redirect(route('Scaffolder\.price.index'));
    }

    public function show($id)
	{
		return 'Not implemented';
	}

    public function edit($id)
	{
		$model = Price::find($id);

        return view('price.edit')->with('model', $model);
	}

    public function update($id, Request $request)
	{
        $this->validate($request, [

            'price_id' => '',
            'price' => '',
            'title' => '',
            'model' => '',
            'sku' => '',
            'upc' => '',
            'quantity' => '',
            'alt_details' => '',

        ]);

        Price::find($id)->fill($request->all())->save();

		return response()->json(['message' => 'ok']);
	}

    public function destroy($id)
	{
        Price::destroy($id);

		return response()->json(['message' => 'ok']);
	}
}
