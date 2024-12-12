<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {return view('welcome');});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get("/", [HomeController::class, "index"])->name("home");

//Shop routes
Route::get("/shop", [ShopController::class, "index"])->name("shop");

//Contact routes
Route::get("/contact", [ContactController::class, "index"])->name("contact");
Route::post("send-contact", [ContactController::class, "sendContact"])->name("contact.send");


//Admin routes
Route::group(["prefix" => "admin"], function () {

    //Contact routes
    Route::get("contacts", [ContactController::class, "allContacts"])->name("admin.contacts");
    Route::get("delete-contact/{contact}", [ContactController::class, "delete"])->name("admin.deletecontact");
    Route::get("edit-contact/{contact}", [ContactController::class, "edit"])->name("admin.editcontact");
    Route::post("update-contact/{contact}", [ContactController::class, "update"])->name("admin.updatecontact");

    //Product routes
    Route::get("products", [ProductsController::class, "index"])->name("admin.products");
    Route::get("add-product", [ProductsController::class, "create"])->name("admin.addproduct");
    Route::post("save-product", [ProductsController::class, "store"])->name("admin.saveproduct");
    Route::get("delete-product/{product}", [ProductsController::class, "deleteProduct"])->name("admin.deleteproduct");
    Route::get("edit-product/{product}", [ProductsController::class, "edit"])->name("admin.editproduct");
    Route::post("update-product/{product}", [ProductsController::class, "update"])->name("admin.updateproduct");
})->middleware(["auth", "verified"])->name("admin.");



//About routes
Route::view("/about", "about")->name("about");

require __DIR__.'/auth.php';
