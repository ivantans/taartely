<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SellerCategoryController;
use App\Http\Controllers\SellerOrderController;
use App\Http\Controllers\SellerProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// * ONLY FOR BUYER
Route::middleware(["buyer"])->group(function () {
    Route::resource('/carts', CartController::class)
    ->except(["create", "show", "edit"])
    ->names([
        "index" => "carts.index",
        "store" => "carts.store",
        "update" => "carts.update",
        "destroy" => "carts.destroy",
    ]);
    Route::post('/checkout', [CheckOutController::class, 'store']);
    Route::get('/orders', [OrderController::class, 'index']);

    Route::get('/payment/{order:id}', [CheckOutController::class, 'index']);
    Route::put('/payment/{order:id}', [CheckOutController::class, 'payment']);
});

// * ONLY FOR SELLER
Route::middleware(["seller"])->group(function () {
    Route::get('/seller/dashboard', function(){
        return view("seller.dashboard", [
            "title" => "Dashboard",
        ]);
    }); 
    Route::resource("/seller/dashboard/products", SellerProductController::class);
    Route::resource("/seller/dashboard/categories", SellerCategoryController::class)->except("show");

    Route::get("/seller/orders", [SellerOrderController::class, "index"]);
    Route::put("/updateFromPending/{order:id}", [SellerOrderController::class, "updateFromPending"]);
    Route::put("/updateFromDonePayment/{order:id}", [SellerOrderController::class, "updateFromDonePayment"]);
    Route::put("/updateFromDonePaymentButCancel/{order:id}", [SellerOrderController::class, "updateFromDonePaymentButCancel"]);
    Route::put("/updateFromProcess/{order:id}", [SellerOrderController::class, "updateFromProcess"]);

    Route::get("/seller/dashboard/products/s/checkSlug", [SellerProductController::class, 'checkSlug']);
    Route::get("/seller/dashboard/categories/s/checkSlug", [SellerProductController::class, 'checkSlug']);
});

// * ONLY FOR USERS WHO ARE NOT LOGGED IN 
Route::middleware(["guest"])->group(function () {
    Route::get('/login', [LoginController::class, 'index']);
    Route::post('/login', [LoginController::class, 'login']);
    
    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register', [RegisterController::class, 'register']);
});

// * ACCESSIBLE TO EVERYONE
Route::get('/', function(){
    return view('shared.home', [
        "title" => "Home"
    ]);
});
Route::get('/home', function(){
    return view('shared.home', [
        "title" => "Home"
    ]);
});

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{product}', [ProductController::class, 'show']);
Route::post('/logout', [LoginController::class, 'logout']);