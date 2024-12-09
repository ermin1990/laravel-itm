<?php

use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    return view("home", ["name" => "Erminov"]);
})->name("home");
Route::get("/shop", function () {
    return view("shop");
})->name("shop");

Route::view("/about", "about")->name("about");
Route::view("/contact", "contact")->name("contact");
