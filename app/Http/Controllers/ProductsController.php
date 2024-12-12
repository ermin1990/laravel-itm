<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $products = ProductModel::all();

        return view("admin.products", compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteProduct($product)
    {

        try {
            $product = ProductModel::where("id", $product)->first();
            $product->delete();
            return redirect()->back()->with("success", "Proizvod je obrisan");
        } catch (\Throwable $th) {
            $errors = "Nemoguće brisati proizvod";
            return redirect()->back()->withErrors($errors);
        }
    }
}
