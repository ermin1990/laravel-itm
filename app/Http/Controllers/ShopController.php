<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Support\Facades\Session;

class ShopController extends Controller
{
    public function index()
    {
        try {
            $products = ProductModel::all();
            return view('shop', compact("products"));
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }


    public function products(){
        $products = ProductModel::all();
        return view('products', compact("products"));
    }
}
