<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

// ONLY FOR BUYER
Route::middleware(["buyer"])->group(function () {
    // 
});

// ONLY FOR SELLER
Route::middleware(["seller"])->group(function () {
    Route::get('/seller/dashboard', function(){
        return view("seller.dashboard");
    });
     
    Route::resource("/seller/dashboard/products", SellerProductController::class);
    Route::get("/seller/dashboard/products/s/checkSlug", [SellerProductController::class, 'checkSlug'])->middleware('seller');
});

// ONLY FOR USERS WHO ARE NOT LOGGED IN
Route::middleware(["guest"])->group(function () {
    Route::get('/login', [LoginController::class, 'index']);
    Route::post('/login', [LoginController::class, 'login']);
    
    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register', [RegisterController::class, 'register']);
});

// ACCESSIVLE TO EVERYONE
Route::get('/', function(){
    return view('shared.home');
});

Route::post('/logout', [LoginController::class, 'logout']);