<?php

namespace Ecommerce;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Sentinel;
use Session;

class helperFunctions
{

    public static function getPageInfo(&$cart, &$total)
    {
        if (Sentinel::check())
        {
            $user = Sentinel::getUser();
            // dd($user);
            $userid = Sentinel::getUser()->getUserId();
            // dd($userid);
            $cart = Cart::where('user_id', $userid)->first();
            // dd($cart);
            // dd($total);
        }

        if (Sentinel::check())
        {

            $cart = Cart::where('user_id', Sentinel::getUser()->id)->first();
            //$cart = Sentinel::getUser()->cart;
        }
        else
        {
            $cart = new Collection;
            if (Session::has('cart'))
            {
                foreach (Session::get('cart') as $item)
                {
                    $elem = new Cart;
                    $elem->product_id = $item['product_id'];
                    $elem->amount = $item['quantity'];
                    if (isset($item['options']))
                    {
                        $elem->options = $item['options'];
                    }
                    $cart->add($elem);
                }
            }
        }
        $total = 0;
        foreach ($cart as $item)
        {
            $total += $item->product->price * $item->amount;
        }
    }
}