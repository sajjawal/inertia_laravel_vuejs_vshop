<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthCOntroller;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\ProductListController;
use App\Http\Controllers\User\UserController;



Route::prefix('cart')->controller(CartController::class)->group(function(){
    Route::get('view','view')->name('cart.view');
     Route::post('store/{product}','store')->name('cart.store');
     Route::patch('update/{product}','update')->name('cart.update');
      Route::delete('delete/{product}','delete')->name('cart.delete');
});

Route::prefix("products")->controller(ProductListController::class)->group(function(){
Route::get('/','index')->name('products.index');
});

Route::get('/', [UserController::class, "index"])->name('home');

Route::get('dashboard',[DashboardController::class,'index'])->middleware(['auth','verified'])->name('dashboard');

// Route::get('dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// admin routes
Route::middleware(["auth", "admin"])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, "index"])->name('admin.dashboard');
    Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::post('/products/store', [ProductController::class, 'store'])->name('admin.products.store');
    Route::put('/products/update/{id}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/products/image/{id}', [ProductController::class, 'deleteImage'])->name('admin.products.image.delete');
    Route::delete('/products/destory/{id}', [ProductController::class, 'destory'])->name('admin.products.delete');
});


Route::middleware(["auth"])->group(function () {
    Route::prefix('checkout')->controller(CheckoutController::class)->group(function(){
        Route::post('order','store')->name('checkout.store');
        Route::get('success','success')->name('checkout.success');
        Route::get('cancel','cancel')->name('checkout.cancel');
    });

});



Route::group(['prefix' => 'admin', 'middleware' => 'redirectAdmin'], function () {
    Route::get('login', [AdminAuthCOntroller::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminAuthCOntroller::class, 'login'])->name('admin.login.post');
    Route::post('logout', [AdminAuthCOntroller::class, 'logout'])->name('logout');
});

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
