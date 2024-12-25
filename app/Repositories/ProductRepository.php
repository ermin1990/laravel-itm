<?php

namespace App\Repositories;

use App\Models\ProductModel;

class ProductRepository
{
    //DI - Dependency Injection

    private $productModel;
    public function __construct()
    {
       $this->productModel = new ProductModel();
    }

    public function getAll()
    {
        return $this->productModel->all();
    }

    public function createNew($request)
    {

        return $this->productModel->create([
            "name" => $request->name,
            "description" => $request->description,
            "price" => $request->price,
            "image" => $request->image,
            "amount" => $request->amount
        ]);

    }

    public function deleteProduct($id)
    {
        return $this->productModel->where("id", $id)->delete();
    }

    public function getProductById($id)
    {
        return $this->productModel->where("id", $id)->first();
    }

    public function editProduct($request, $id)
    {
        $prod = self::getProductById($id);
        $prod->update([
            "name" => $request->name,
            "description" => $request->description,
            "price" => $request->price,
            "image" => $request->image,
            "amount" => $request->amount,
        ]);

        return $prod;
    }
}
