<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Middleware\AdminCheckMiddleware;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Cart routes
Route::controller(CartController::class)->prefix("/cart")->name("cart.")->group(function () {
    Route::get("/", "index")->name("index");
    Route::post("/add", "addToCart")->name("add");
    Route::get("/show", "showCart")->name("show");
    Route::put("/update/", "update")->name("update");
    Route::get("/delete/{cart}", "delete")->name("delete");});

Route::get("/", [HomeController::class, "index"])->name("home");

//Shop routes
Route::get("/shop", [ShopController::class, "index"])->name("shop");

Route::get("/product/{product}", [ProductsController::class, "show"])->name("product");

//Contact routes
Route::controller(ContactController::class)->prefix("/contact")->group(function () {
    Route::get("/", "index")->name("contact");
    Route::post("/send", "sendContact")->name("contact.send");
});


//Admin routes


Route::group(["prefix" => "admin"], function () {

    //Contact routes
    Route::controller(ContactController::class)->prefix("/contact")
        ->name("contact.")
        ->group(function () {
            Route::get("/all", "allContacts")->name("allcontacts");
            Route::get("/delete/{contact}", "delete")->name("delete");
            Route::get("/edit/{contact}", "edit")->name("edit");
            Route::post("/update/{contact}", "update")->name("update");
        });


    //Product routes
    Route::controller(ProductsController::class)->prefix("/products")
        ->name("products.")
        ->group(function () {
            Route::get("/all", "index")->name("all");
            Route::get("/add", "create")->name("addproduct");
            Route::get("/delete/{product}", "deleteProduct")->name("deleteproduct");
            Route::get("/edit/{product}", "edit")->name("editproduct");
            Route::post("/save", "store")->name("saveproduct");
            Route::post("/update/{product}", "update")->name("updateproduct");


        });


})->middleware([AdminCheckMiddleware::class]);


//About routes
Route::view("/about", "about")->name("about");

require __DIR__ . '/auth.php';
