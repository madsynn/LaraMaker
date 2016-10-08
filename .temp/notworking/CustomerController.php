<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use Yajra\Datatables\Datatables;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customer.index');
    }

    public function getCustomers()
    {
        return Datatables::of(Customer::select('*'))
            ->addColumn('action', function ($model) {
                return '
                    <a href="/shop/customer/'.$model->id.'/edit"><i class="material-icons">create</i></a>
                    <a href="#" onclick="deleteModel(\''.$model->id.'\')"><i class="material-icons">delete</i></a>';
            })
            ->make(true);
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [

            'name' => 'required',
            'surname' => '',

        ]);

        Customer::create($request->all());

        return redirect(route('shop.customer.index'));
    }

    public function show($id)
	{
		return 'Not implemented';
	}

    public function edit($id)
	{
		$model = Customer::find($id);

        return view('customer.edit')->with('model', $model);
	}

    public function update($id, Request $request)
	{
        $this->validate($request, [

            'name' => 'required',
            'surname' => '',

        ]);

        Customer::find($id)->fill($request->all())->save();

		return response()->json(['message' => 'ok']);
	}

    public function destroy($id)
	{
        Customer::destroy($id);

		return response()->json(['message' => 'ok']);
	}
}
