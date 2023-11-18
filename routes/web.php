<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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


Route::get('/', function(){
    return view('shared.home');
});


Route::group(['middleware' => 'checkBuyer'], function () {
    Route::get('/orders', function(){
        return view("buyer.orders");
    });
});


Route::group(['middleware' => 'checkSeller'], function () {
    Route::get('/dashboard', function(){
        return view("seller.dashboard");
    });
});


Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [LoginController::class, 'index']);
    Route::post('/login', [LoginController::class, 'login']);
    
    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register', [RegisterController::class, 'register']);
});

Route::post('/logout', [LoginController::class, 'logout']);