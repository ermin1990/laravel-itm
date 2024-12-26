<?php

namespace App\Repositories;

use App\Http\Requests\SaveCartRequests;
use App\Models\CartModel;
use App\Models\ProductModel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartRepository
{

    private $cart;
    private $product;
    public function __construct(){
        $this->cart = new CartModel();
        $this->product = new ProductModel();
    }

    public function addToCart($request, $user)
    {

        $this->cart->user_id = $user;
        $this->cart->product_id = $request->product_id;
        $this->cart->quantity = $request->quantity;
        $this->cart->price = $request->price;
        $this->cart->save();

    }

    public function getAmount(mixed $product_id)
    {
        return $this->product->find($product_id)->amount;
    }

    public function addToSessionCart(SaveCartRequests $request, $user)
    {
        Session::pull('cart', [
            'user_id' => $user,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'price' => $request->price
        ]);

    }
}
