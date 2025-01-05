<?php

namespace App\Http\Controllers;


use App\Http\Requests\SaveCartRequests;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{
    private $productRepository;


    public function __construct()
    {
        $this->productRepository = new ProductRepository();
    }

    public function index()
    {
        $cartProducts = [];

        if (Session::has('products')) {
            foreach (Session::get('products') as $id => $quantity) {
                $product = $this->productRepository->getProductById($id);
                $product->quantity = $quantity;
                $cartProducts[] = $product;
            }
        }

        $ukupnaCijena = 0;
        foreach ($cartProducts as $product) {
            $ukupnaCijena += $product->price * $product->quantity;
        }


        return view('cart.index', compact('cartProducts', 'ukupnaCijena'));
    }

    public function addToCart(SaveCartRequests $request)
    {
        $products = Session::get('products', []);

        $maxQuantity = $this->productRepository->getMaxQuantity($request->product_id);

        if ($request->quantity <= 0 || $request->quantity > $maxQuantity) {
            return redirect()->route('cart.index')->with('error', 'Neispravna količina. Unesite broj između 1 i ' . $maxQuantity);
        }

        if (isset($products[$request->product_id])) {
            $newQuantity = $products[$request->product_id] + $request->quantity;
            if ($newQuantity > $maxQuantity) {
                return redirect()->route('cart.index')->with('error', 'Nema dovoljno proizvoda na skladištu');
            }
            $products[$request->product_id] = $newQuantity;
        } else {
            if ($request->quantity > $maxQuantity) {
                return redirect()->route('cart.index')->with('error', 'Nema dovoljno proizvoda na skladištu');
            }
            $products[$request->product_id] = $request->quantity;
        }

        Session::put('products', $products);

        return redirect()->route('cart.index')->with('success', 'Proizvod je dodat u korpu');
    }


    public function update(SaveCartRequests $request)
    {
        $products = Session::get('products', []);

        $maxQuantity = $this->productRepository->getMaxQuantity($request->product_id);

        if ($request->quantity <= 0 || $request->quantity > $maxQuantity) {
            return redirect()->route('cart.index')->with('error', 'Neispravna količina. Unesite broj između 1 i ' . $maxQuantity);
        }

        if (isset($products[$request->product_id])) {
            if ($request->quantity > $maxQuantity) {
                return redirect()->route('cart.index')->with('error', 'Nema dovoljno proizvoda na skladištu');
            }
            $products[$request->product_id] = $request->quantity;
            Session::put('products', $products);
        }

        return redirect()->route('cart.index')->with('success', 'Količina je ažurirana.');
    }



    public function delete($id)
    {
        $products = Session::get('products', []);

        if (isset($products[$id])) {
            unset($products[$id]);
            Session::put('products', $products);
        }

        return redirect()->route('cart.index')->with('success', 'Proizvod je uklonjen iz korpe.');
    }


}
