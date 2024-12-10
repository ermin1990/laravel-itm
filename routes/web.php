<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::get("/", [HomeController::class, "index"])->name("home");

//Shop routes
Route::get("/shop", [ShopController::class, "index"])->name("shop");

//Contact routes
Route::get("/contact", [ContactController::class, "index"])->name("contact");
Route::post("send-contact", [ContactController::class, "sendContact"])->name("contact.send");


//Admin routes
Route::group(["prefix" => "admin"], function () {
    Route::get("contacts", [ContactController::class, "allContacts"])->name("admin.contacts");
    Route::get("add-product", [ShopController::class, "addProduct"])->name("admin.addproduct");
    Route::post("save-product", [ShopController::class, "saveProduct"])->name("admin.saveproduct");
    Route::get("products", [ShopController::class, "products"])->name("admin.products");
});


Route::view("/about", "about")->name("about");
