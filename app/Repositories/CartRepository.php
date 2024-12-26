<?php

namespace App\Repositories;

use App\Models\CartModel;
use App\Models\User;

class CartRepository
{
    protected $cartModel;
    protected $user;

    public function __construct(){

        $this->cartModel = new CartModel();
        $this->user = new User();

    }

    public function addToCart($request)
    {
        dd($this->user->name);
        $cart = new CartModel();
        $cart->user_id = $request->user_id;
        $cart->product_id = $request->product_id;
        $cart->quantity = $request->quantity;
        $cart->price = $request->price;
        $cart->save();
    }
}
