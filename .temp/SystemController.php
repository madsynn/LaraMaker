<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Input;
use Validator;

class SystemController extends BaseController
{

    /**
     *
     * @param unknown $id
     * @return unknown
     */
    public function show()
    {
        $system = DB::table('system')->first();

        return view('system')->with('system', $system);
    }

    /**
     * @param Request $request
     * @return unknown
     */
    public function store(Request $request)
    {
        if (env('WRITE_ACCESS') == false) {
            \Session::flash('success-msg',
                            'Disabled In Demo');

            return redirect()->back();
        }
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'url' => 'required',
            'logo' => 'required',
            'email' => 'required|email',

            ]);

        if ($validator->fails()) {
            return redirect('/administrator/system')
            ->withErrors($validator)
            ->withInput();
        }

        $title = Input::get('title');
        $url = Input::get('url');
        $email = Input::get('email');
        $website_logo = Input::file('logo');
        $destinationPath = public_path('');
        $mobile = Input::get('mobile');
        $address = Input::get('address');
        $facebook = Input::get('facebook');
        $twitter = Input::get('twitter');
        $linked_in = Input::get('linked_in');
        $google_plus = Input::get('google_plus');

        $name = 'logo.png';
        $website_logo->move($destinationPath, $name);
        $filename = $name;

        $row = DB::table('system')->get();
        if (sizeof($row) > 0) {
            DB::table('system')->update(
                [
                'title' => $title,
                'url' => $url,
                'email' => $email,
                'logo' => $filename,
                'mobile' => $mobile,
                'address' => $address,
                'facebook' => $facebook,
                'twitter' => $twitter,
                'linked_in' => $linked_in,
                'google_plus' => $google_plus]
            );
            \Session::flash('success-msg',
                            'Successfully updated');

        } else {
            DB::table('system')->insert(
                [
                'title' => $title,
                'url' => $url,
                'email' => $email,
                'logo' => $filename,
                'mobile' => $mobile,
                'address' => $address,
                'facebook' => $facebook,
                'twitter' => $twitter,
                'linked_in' => $linked_in,
                'google_plus' => $google_plus
                ]
            );
            \Session::flash('success-msg',
                            'Successfully Added');

        }

        return redirect('/administrator/system');

    }
}
