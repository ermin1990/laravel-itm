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
        try {
            $products = ProductModel::all();
            return view('admin.products', compact("products"));
        } catch (\Throwable $th) {
            return redirect()->back()->with("error", "Nema proizvoda");
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.add-product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string|unique:products",
            "description" => "required",
            "price" => "required|numeric|decimal:0,2",
            "image" => "string|url|nullable",
            "amount" => "required|numeric|integer"
        ]);

        try {
            ProductModel::create([
                "name" => $request->name,
                "description" => $request->description,
                "price" => $request->price,
                "image" => $request->image,
                "amount" => $request->amount
            ]);
            return redirect()->route('admin.products')->with("success", "Proizvod je dodat");
        } catch (\Throwable $th) {
            $errors = "Nemoguće dodati proizvod";
            return redirect()->back()->withErrors($errors);
        }
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
    public function edit(ProductModel $product)
    {
        try {
            return view("admin.products.edit-product", compact("product"));
        }catch (\Throwable $th) {
            return redirect()->back()->with("error", "Nema proizvoda");
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductModel $product)
    {

        $request->validate([
            "name" => "required|string|unique:products",
            "description" => "required",
            "price" => "required|numeric|decimal:0,2",
            "image" => "string|url|nullable",
            "amount" => "required|numeric|integer"
        ]);

        try {
            $product ->update([
                "name" => $request->name,
                "description" => $request->description,
                "price" => $request->price,
                "image" => $request->image,
                "amount" => $request->amount
            ]);
            return redirect()->route('admin.products')->with("success", "Proizvod je ažuriran");
        } catch (\Throwable $th) {
            $errors = "Nemoguće ažurirati proizvod";
            return redirect()->back()->withErrors($errors)->withInput([
                "name" => $request->name,
                "description" => $request->description,
                "price" => $request->price,
                "image" => $request->image,
                "amount" => $request->amount
            ])  ;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteProduct(ProductModel $product)
    {

        try {
            $product->delete();
            return redirect()->back()->with("success", "Proizvod je obrisan");
        } catch (\Throwable $th) {
            $errors = "Nemoguće brisati proizvod";
            return redirect()->back()->withErrors($errors);
        }
    }
}
