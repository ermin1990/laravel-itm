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
Route::controller(ContactController::class)->group(function () {
    Route::get("/contact", "index")->name("contact");
    Route::post("/send-contact", "sendContact")->name("contact.send");
});


//Admin routes
Route::group(["prefix" => "admin"], function () {

    //Contact routes
    Route::controller(ContactController::class)->group(function () {
        Route::get("/contact/all", "allContacts")->name("allcontacts");
        Route::get("/contact/delete/{contact}", "delete")->name("deletecontact");
        Route::get("/contact/edit/{contact}", "edit")->name("editcontact");
        Route::post("/contact/update/{contact}", "update")->name("updatecontact");
    });


    //Product routes
    Route::controller(ProductsController::class)->group(function () {
        Route::get("/products/all", "index")->name("admin.products");
        Route::get("/products/add", "create")->name("admin.addproduct");
        Route::post("/products/save", "store")->name("admin.saveproduct");
        Route::get("/products/delete/{product}", "deleteProduct")->name("admin.deleteproduct");
        Route::get("/products/edit/{product}", "edit")->name("admin.editproduct");
        Route::post("/products/update/{product}", "update")->name("admin.updateproduct");
    });
});

//About routes
Route::view("/about", "about")->name("about");
