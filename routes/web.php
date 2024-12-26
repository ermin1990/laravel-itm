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
    Route::post("send-contact", "sendContact")->name("contact.send");
});


//Admin routes
Route::group(["prefix" => "admin"], function () {

    //Contact routes
    Route::controller(ContactController::class)->group(function () {
        Route::get("contact", "allContacts")->name("allcontacts");
        Route::get("delete-contact/{contact}", "delete")->name("deletecontact");
        Route::get("edit-contact/{contact}", "edit")->name("editcontact");
        Route::post("update-contact/{contact}", "update")->name("updatecontact");
    });


    //Product routes
    Route::controller(ProductsController::class)->group(function () {
        Route::get("products", "index")->name("admin.products");
        Route::get("add-product", "create")->name("admin.addproduct");
        Route::post("save-product", "store")->name("admin.saveproduct");
        Route::get("delete-product/{product}", "deleteProduct")->name("admin.deleteproduct");
        Route::get("edit-product/{product}", "edit")->name("admin.editproduct");
        Route::post("update-product/{product}", "update")->name("admin.updateproduct");
    });
});

//About routes
Route::view("/about", "about")->name("about");
