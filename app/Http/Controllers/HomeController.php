<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {

        $products = ProductModel::orderBy('id', 'desc')->get()->take(6);

        Session::forget('products');

        $hour = date('H');
        $dateNow = date('d-m-Y H:i:s');
        $compact = [
            "dateNow" => $dateNow,
            "name" => Session::get("ime"),
            "hour" => $hour,
            "products" => $products
        ];

        return view('home', $compact);
    }
}
