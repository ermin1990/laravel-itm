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

Route::get("admin/allcontacts", [ContactController::class, "allContacts"])->name("admin.allcontacts");

Route::view("/about", "about")->name("about");
