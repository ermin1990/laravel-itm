<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::get("/", [HomeController::class, "index"])->name("home");

//Shop routes
Route::get("/shop", [ShopController::class, "index"])->name("shop");

//Contact routes
Route::controller(ContactController::class)->prefix("/contact")->group(function () {
    Route::get("/", "index")->name("contact");
    Route::post("/send", "sendContact")->name("contact.send");
});


//Admin routes
Route::group(["prefix" => "admin"], function () {

    //Contact routes
    Route::controller(ContactController::class)->prefix("/contact")->name("contact.")->group(function () {
        Route::get("/all", "allContacts")->name("allcontacts");
        Route::get("/delete/{contact}", "delete")->name("delete");
        Route::get("/edit/{contact}", "edit")->name("edit");
        Route::post("/update/{contact}", "update")->name("update");
    });


    //Product routes
    Route::controller(ProductsController::class)->prefix("/products")->name("products.")->group(function () {
        Route::get("/all", "index")->name("all");
        Route::get("/add", "create")->name("addproduct");
        Route::get("/delete/{product}", "deleteProduct")->name("deleteproduct");
        Route::get("/edit/{product}", "edit")->name("editproduct");
        Route::post("/save", "store")->name("saveproduct");
        Route::post("/update/{product}", "update")->name("updateproduct");
    });
});

//About routes
Route::view("/about", "about")->name("about");
