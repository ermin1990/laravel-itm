<?php

namespace App\Http\Controllers;


use App\Http\Requests\SaveCartRequests;
use App\Models\CartModel;
use App\Repositories\CartRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{
    private $cartRepository;


    public function __construct()
    {
        $this->cartRepository = new CartRepository();

    }

    public function addToCart(SaveCartRequests $request)
    {

        Session::put('product', [
            $request->product_id => $request->quantity
        ]);

        dd(Session::get('product'));

    }
}
