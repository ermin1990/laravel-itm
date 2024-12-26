<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveProductRequest;
use App\Repositories\ProductRepository;

class ProductsController extends Controller
{
    private $productRepository;

    public function __construct()
    {
        $this->productRepository = new ProductRepository();
    }


    public function index()
    {

        $products = $this->productRepository->getAll();
        return view("admin.products", compact("products"));
    }


    public function create()
    {
        return view('admin.products.add-product');
    }

    public function store(SaveProductRequest $request)
    {
        try {
            if ($this->productRepository->createNew($request)) {
                return redirect()->route('admin.products')->with("success", "Proizvod je dodat");
            }

        } catch (\Throwable $th) {
            $errors = "Nemoguće dodati proizvod";
            return redirect()->back()->withErrors($errors);
        }
    }

    public function edit($product)
    {
        try {
            $product = $this->productRepository->getProductById($product);
            return view("admin.products.edit-product", compact("product"));
        } catch (\Throwable $th) {
            return redirect()->back()->with("error", "Nema proizvoda");
        }

    }

    public function update(SaveProductRequest $request, $product)
    {
        try {

            $this->productRepository->editProduct($request, $product);
            return redirect()->route('admin.products')->with("success", "Proizvod je azuriran");

        } catch (\Throwable $th) {
            $errors = "Nemoguće azurirati proizvod";
            return redirect()->back()->withErrors($errors)->withInput([
                "name" => $request->name,
                "description" => $request->description,
                "price" => $request->price,
                "image" => $request->image,
                "amount" => $request->amount
            ]);
        }
    }

    public function deleteProduct($product)
    {
        $prod = $this->productRepository->getProductById($product);
        if ($prod == null) {
            return redirect()->back()->with("error", "Proizvod ne postoji u bazi");
        }
        $delete = $this->productRepository->deleteProduct($product);
        if (!$delete) {
            return redirect()->back()->with("error", "Nemoguće obrisati proizvod");
        }
        return redirect()->route('admin.products')->with("success", "Proizvod je obrisan");

    }
}
