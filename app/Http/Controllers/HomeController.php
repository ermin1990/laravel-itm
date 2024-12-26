<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {

        $products = ProductModel::orderBy('id', 'desc')->get()->take(6);


        $hour = date('H');
        $dateNow = date('d-m-Y H:i:s');
        $compact = [
            "dateNow" => $dateNow,
            "name" => Auth::user()->name??null,
            "hour" => $hour,
            "products" => $products
        ];

        return view('home', $compact);
    }
}
