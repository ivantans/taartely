<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SellerCategoryController;
use App\Http\Controllers\SellerDashboardController;
use App\Http\Controllers\SellerOrderController;
use App\Http\Controllers\SellerProductController;
use App\Jobs\SendEmailNotificationJob;
use App\Mail\SendEmailNotification;
use App\Models\Order;
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

    Route::post('/checkout', [CheckOutController::class, 'store'])
    ->name("checkout.store");

    Route::get('/orders', [OrderController::class, 'index'])
    ->name("orders.index");

    Route::get('/payment/{order}', [CheckOutController::class, 'index'])
    ->name("payment.index");

    Route::put('/payment/{order}', [CheckOutController::class, 'payment'])
    ->name("payment.payment");
});

// * ONLY FOR SELLER
Route::middleware(["seller"])->group(function () {
    Route::get("seller/dashboard", [SellerDashboardController::class, "index"])
    ->name("dashboard.index");

    Route::resource("/seller/dashboard/products", SellerProductController::class)
    ->names([
        "index" => "products.index",
        "create" => "products.create",
        "store" => "products.store",
        "show" => "products.show",
        "edit" => "products.edit",
        "update" => "products.update",
        "destroy" => "products.destroy",
    ]);

    Route::resource("/seller/dashboard/categories", SellerCategoryController::class)
    ->except("show")
    ->names([
        "index" => "categories.index",
        "create" => "categories.create",
        "store" => "categories.store",
        "edit" => "categories.edit",
        "update" => "categories.update",
        "destroy" => "categories.destroy",
    ]);;

    Route::get("/seller/orders", [SellerOrderController::class, "index"])
    ->name("orders.index");

    Route::put("/updateFromPending/{order}", [SellerOrderController::class, "updateFromPending"])
    ->name("orders.updateFromPending");

    Route::put("/updateFromDonePayment/{order}", [SellerOrderController::class, "updateFromDonePayment"])
    ->name("orders.updateFromDonePayment");

    Route::put("/updateFromDonePaymentButCancel/{order}", [SellerOrderController::class, "updateFromDonePaymentButCancel"])
    ->name("orders.updateFromDonePaymentButCancel");

    Route::put("/updateFromProcess/{order}", [SellerOrderController::class, "updateFromProcess"])
    ->name("orders.updateFromProcess");

    Route::get("/seller/dashboard/products/s/checkSlug", [SellerProductController::class, 'checkSlug']);
    Route::get("/seller/dashboard/categories/s/checkSlug", [SellerProductController::class, 'checkSlug']);
});

// * ONLY FOR USERS WHO ARE NOT LOGGED IN 
Route::middleware(["guest"])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])
    ->name("login.index");

    Route::post('/login', [LoginController::class, 'login'])
    ->name("login.login");
    
    Route::get('/register', [RegisterController::class, 'index'])
    ->name("register.index");

    Route::post('/register', [RegisterController::class, 'register'])
    ->name("register.register");
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

Route::get('/products', [ProductController::class, 'index'])
->name("productcontroller.index");
Route::get('/products/{product}', [ProductController::class, 'show'])
->name("productcontroller.show");

Route::post('/logout', [LoginController::class, 'logout'])
->name("logout.logout");