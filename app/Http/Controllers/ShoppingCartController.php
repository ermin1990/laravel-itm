<?php

namespace App\Http\Controllers;

use App\Models\OrderItems;
use App\Models\Orders;
use App\Models\ProductModel;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ShoppingCartController extends Controller
{
    private $productRepository;


    public function __construct()
    {
        $this->productRepository = new ProductRepository();
    }

    // Provjeriti da li je korisnik prijavljen
    // Provjeriti da li je korpa prazna
    // Perovjeriti da li imamo dovoljno proizvoda na stanju
    // Smanjiti stanje tog proizvoda koji je prodan
    // Isprazniti korpu
    // Prikazati zahvalu nakon uspješne narudžbe

    public function fisnihOrder()
    {

        $cart = Session::get('products');
        $totalPrice = 0;

        foreach ($cart as $id => $quantity) {
            $product = $this->productRepository->getProductById($id);
            if ($quantity > $product->amount) {
                return redirect()->route('cart.index')->with('error', 'Nema dovoljno proizvoda na stanju');
            }else{
                $totalPrice += $product->price * $quantity;
                $product->amount -= $quantity;
                $product->save();
            }
        }

        $order = Orders::create([
            'user_id' => Auth::user()->id,
            'price' => $totalPrice
        ]);

        foreach ($cart as $id => $quantity) {
            $product = ProductModel::firstWhere('id', $id);
            OrderItems::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'quantity' => $quantity,
                'price' => $product->price * $quantity
            ]);
        }

        Session::forget('products');
        return redirect()->route('thanks')->with('success', 'Uspjesno ste narucili proizvode');
    }
}
