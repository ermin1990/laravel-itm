<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $products = ProductModel::orderBy('id', 'desc')->get()->take(6);


        $hour = date('H');
        $dateNow = date('d-m-Y H:i:s');
        $compact = [
            "dateNow" => $dateNow,
            "name" => "Ermin",
            "hour" => $hour,
            "products" => $products
        ];

        return view('home', $compact);
    }
}
