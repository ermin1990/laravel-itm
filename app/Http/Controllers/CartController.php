<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveCartRequests;
use App\Repositories\CartRepository;

class CartController extends Controller
{
    private $cartRepository;

    public function __construct()
    {
        $this->cartRepository = new CartRepository();
    }

    public function addToCart(SaveCartRequests $request)
    {

        $this->cartRepository->addToCart($request);

    }
}
