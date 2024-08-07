<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DetailToppingProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ToppingController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckAdmin;
use App\Models\Cart;
use App\Models\DetailToppingProduct;
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
Route::get('/', [HomeController::class, 'index'])->name('home');

//Login
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'storeLogin'])->name('storeLogin');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'storeRegister'])->name('storeRegister');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
//Cart
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/addCart', [CartController::class, 'addCart'])->name('addCart');
Route::post('/updateCart', [CartController::class, 'updateCart'])->name('updateCart');
Route::post('/deleteCart', [CartController::class, 'deleteCart'])->name('deleteCart');
Route::post('/deleteAllCart', [CartController::class, 'deleteAllCart'])->name('deleteAllCart');
Route::post('/save-address', [CartController::class, 'saveAddress'])->name('save.address');
Route::get('/delivery', function () {
    return view('delivery');
})->name('delivery');
//Product
Route::get('/detail/{id}', [ProductController::class, 'detail'])->name('detail');
Route::get('/products', [ProductController::class, 'products'])->name('products');
//Shop
Route::get('/shops', [ShopController::class, 'shops'])->name('shops');
Route::get('/detail-shop/{id}', [ShopController::class, 'detailShop'])->name('detailShop');
//Delivery
Route::get('/delivery', [ShopController::class, 'delivery'])->name('delivery');


//ADMIN

Route::prefix('admin')->middleware('admin')->name('admin.')->group( function () {
    Route::get('/', [AdminController::class, 'index'])->name('home');
    Route::prefix('order')->name('order.')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::get('/detail/{id}', [OrderController::class,'detail'])->name('detail');
        Route::get('/delete/{id}', [OrderController::class, 'delete'])->name('delete');
    });

    Route::prefix('product')->name('product.')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/detail/{id}', [ProductController::class, 'detailAdmin'])->name('detail');
        Route::get('/insert', [ProductController::class, 'insert'])->name('insert');
        Route::post('/insertProduct', [ProductController::class, 'postInsert'])->name('postInsert');
        Route::get('/update/{id}', [ProductController::class, 'update'])->name('update');
        Route::post('/update', [ProductController::class, 'postUpdate'])->name('postUpdate');
        Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('delete');
        Route::post('/insertTopping', [ProductController::class,'insertTopping'])->name('insertTopping');
        Route::post('/deleteTopping', [ProductController::class,'deleteTopping'])->name('deleteTopping');

    });

    Route::prefix('shop')->name('shop.')->group(function () {
        Route::get('/', [ShopController::class, 'index'])->name('index');
        Route::get('/detail/{id}', [ShopController::class, 'detail'])->name('detail');
        Route::get('/insert', [ShopController::class, 'insert'])->name('insert');
        Route::post('/insert', [ShopController::class, 'postInsert'])->name('postInsert');
        Route::get('/update/{id}', [ShopController::class, 'update'])->name('update');
        Route::post('/update', [ShopController::class, 'postUpdate'])->name('postUpdate');
        Route::get('/delete/{id}', [ShopController::class, 'delete'])->name('delete');
    });

    Route::prefix('type')->name('type.')->group(function () {
        Route::get('/', [TypeController::class, 'index'])->name('index');
        Route::get('/insert', [TypeController::class, 'insert'])->name('insert');
        Route::post('/insert', [TypeController::class, 'postInsert'])->name('postInsert');
        Route::get('/update/{id}', [TypeController::class, 'update'])->name('update');
        Route::post('/update', [TypeController::class, 'postUpdate'])->name('postUpdate');
        Route::get('/delete/{id}', [TypeController::class, 'delete'])->name('delete');
    });
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/detail/{id}', [UserController::class, 'detail'])->name('detail');
        Route::get('/insert', [UserController::class, 'insert'])->name('insert');
        Route::post('/insert', [UserController::class, 'postInsert'])->name('postInsert');
        Route::get('/update/{id}', [UserController::class, 'update'])->name('update');
        Route::post('/update', [UserController::class, 'postUpdate'])->name('postUpdate');
        Route::get('/delete/{id}', [UserController::class, 'delete'])->name('delete');
    });
});
