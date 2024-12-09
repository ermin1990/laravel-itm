<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $hour = date('H');
        $dateNow = date('d-m-Y H:i:s');
        $compact = [
            "dateNow" => $dateNow,
            "name" => "Ermin",
            "hour" => $hour
        ];

        return view('home', $compact);
    }
}
