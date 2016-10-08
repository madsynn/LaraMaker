<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Item;
use Yajra\Datatables\Datatables;

class ItemController extends Controller
{
    public function index()
    {
        return view('item.index');
    }

    public function getItems()
    {
        return Datatables::of(Item::select('*'))
            ->addColumn('action', function ($model) {
                return '
                    <a href="/shop/item/'.$model->id.'/edit"><i class="material-icons">create</i></a>
                    <a href="#" onclick="deleteModel(\''.$model->id.'\')"><i class="material-icons">delete</i></a>';
            })
            ->make(true);
    }

    public function create()
    {
        return view('item.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [

            'name' => 'required',
            'description' => 'max:255',

        ]);

        Item::create($request->all());

        return redirect(route('shop.item.index'));
    }

    public function show($id)
	{
		return 'Not implemented';
	}

    public function edit($id)
	{
		$model = Item::find($id);

        return view('item.edit')->with('model', $model);
	}

    public function update($id, Request $request)
	{
        $this->validate($request, [

            'name' => 'required',
            'description' => 'max:255',

        ]);

        Item::find($id)->fill($request->all())->save();

		return response()->json(['message' => 'ok']);
	}

    public function destroy($id)
	{
        Item::destroy($id);

		return response()->json(['message' => 'ok']);
	}
}
