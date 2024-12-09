<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $products = [
            [
                "id" => 1,
                "name" => "PHP",
                "price" => 50,
                "description" => "PHP je popularni server-side jezik za razvoj dinamičkih web aplikacija."
            ],
            [
                "id" => 2,
                "name" => "Laravel",
                "price" => 90,
                "description" => "Laravel je moćni PHP framework za razvoj modernih web aplikacija."
            ],
            [
                "id" => 3,
                "name" => "React",
                "price" => 70,
                "description" => "React je popularna JavaScript biblioteka za izgradnju korisničkih sučelja."
            ],
            [
                "id" => 4,
                "name" => "CSS",
                "price" => 30,
                "description" => "CSS se koristi za stiliziranje web stranica i kreiranje responzivnih dizajna."
            ]
        ];


        $compact = [
            "products" => $products
        ];

        return view('shop', $compact);
    }
}
