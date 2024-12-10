<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $products = ProductModel::all();


        $compact = [
            "products" => $products
        ];

        return view('shop', $compact);
    }

    public function addProduct(){

        return view('admin.add-product');
    }

    public function saveProduct(Request $request){
        $request->validate([
            "name" => "required|string",
            "description" => "required",
            "price" => "required|numeric|decimal:0,2",
            "image" => "required|url",
            "amount" => "required|numeric|integer"
        ]);


        ProductModel::create([
            "name" => $request->name,
            "description" => $request->description,
            "price" => $request->price,
            "image" => $request->image,
            "amount" => $request->amount
        ]);

        return redirect()->route('admin.products');
    }

    public function products(){
        $products = ProductModel::all();
        return view('admin.products', compact("products"));
    }
}
