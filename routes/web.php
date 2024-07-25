<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ToppingController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Models\Cart;
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
//Home
Route::get('/', [HomeController::class, 'index'])->name('index');

//Login
Route::get('/login', [UserController::class,'login'])->name('login');
Route::post('/login', [UserController::class,'postLogin'])->name('postLogin');
Route::get('/register',[UserController::class,'register'])->name('register');
Route::post('/register',[UserController::class,'postRegister'])->name('postRegister');

//Cart
Route::get('/cart',[CartController::class,'cart'])->name('cart');

//Product
Route::get('/detail/{id}',[ProductController::class,'detail'])->name('detail');
Route::get('/products',[ProductController::class,'products'])->name('products');

//Shop
Route::get('/shops',[ShopController::class,'shops'])->name('shops');
Route::get('/detail-shop/{id}',[ShopController::class,'detail'])->name('detail');


//ADMIN

Route::prefix('admin')->name('admin.')->group(function(){
    Route::prefix('order')->name('order.')->group(function(){
        Route::get('/index',[OrderController::class,'index'])->name('index');
        Route::get('/insert',[OrderController::class,'insert'])->name('insert');
        Route::post('/insert',[OrderController::class,'postInsert'])->name('postInsert');
        Route::get('/update/{id}',[OrderController::class,'update'])->name('update');
        Route::post('/update',[OrderController::class,'postUpdate'])->name('postUpdate');
        Route::get('/delete/{id}',[OrderController::class,'delete'])->name('delete');
    });

    Route::prefix('product')->name('product.')->group(function(){
        Route::get('/index',[ProductController::class,'index'])->name('index');
        Route::get('/insert',[ProductController::class,'insert'])->name('insert');
        Route::post('/insert',[ProductController::class,'postInsert'])->name('postInsert');
        Route::get('/update/{id}',[ProductController::class,'update'])->name('update');
        Route::post('/update',[ProductController::class,'postUpdate'])->name('postUpdate');
        Route::get('/delete/{id}',[ProductController::class,'delete'])->name('delete');
    });

    Route::prefix('shop')->name('shop.')->group(function(){
        Route::get('/index',[ShopController::class,'index'])->name('index');
        Route::get('/insert',[ShopController::class,'insert'])->name('insert');
        Route::post('/insert',[ShopController::class,'postInsert'])->name('postInsert');
        Route::get('/update/{id}',[ShopController::class,'update'])->name('update');
        Route::post('/update',[ShopController::class,'postUpdate'])->name('postUpdate');
        Route::get('/delete/{id}',[ShopController::class,'delete'])->name('delete');
    });

    Route::prefix('topping')->name('topping.')->group(function(){
        Route::get('/index',[ToppingController::class,'index'])->name('index');
        Route::get('/insert',[ToppingController::class,'insert'])->name('insert');
        Route::post('/insert',[ToppingController::class,'postInsert'])->name('postInsert');
        Route::get('/update/{id}',[ToppingController::class,'update'])->name('update');
        Route::post('/update',[ToppingController::class,'postUpdate'])->name('postUpdate');
        Route::get('/delete/{id}',[ToppingController::class,'delete'])->name('delete');
    });
    Route::prefix('type')->name('type.')->group(function(){
        Route::get('/index',[TypeController::class,'index'])->name('index');
        Route::get('/insert',[TypeController::class,'insert'])->name('insert');
        Route::post('/insert',[TypeController::class,'postInsert'])->name('postInsert');
        Route::get('/update/{id}',[TypeController::class,'update'])->name('update');
        Route::post('/update',[TypeController::class,'postUpdate'])->name('postUpdate');
        Route::get('/delete/{id}',[TypeController::class,'delete'])->name('delete');
    });
    Route::prefix('user')->name('user.')->group(function(){
        Route::get('/index',[UserController::class,'index'])->name('index');
        Route::get('/insert',[UserController::class,'insert'])->name('insert');
        Route::post('/insert',[UserController::class,'postInsert'])->name('postInsert');
        Route::get('/update/{id}',[UserController::class,'update'])->name('update');
        Route::post('/update',[UserController::class,'postUpdate'])->name('postUpdate');
        Route::get('/delete/{id}',[UserController::class,'delete'])->name('delete');
    });
});
