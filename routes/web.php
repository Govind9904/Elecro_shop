<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Controllers
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;


// Admin Auth

Route::prefix('admin')->group(function () {

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginSubmit']);
});


// Admin Panel

Route::prefix('admin')->middleware('auth:admin')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');


    Route::middleware('role:admin,editor')->group(function () {

        // Sliders
        Route::get('/sliders', [SliderController::class, 'index']);
        Route::get('/sliders/create', [SliderController::class, 'create']);
        Route::post('/sliders/store', [SliderController::class, 'store']);
        Route::get('/sliders/edit/{id}', [SliderController::class, 'edit']);
        Route::post('/sliders/update/{id}', [SliderController::class, 'update']);
        Route::get('/sliders/delete/{id}', [SliderController::class, 'destroy']);

        // Settings
        Route::get('/settings', [SettingController::class, 'index']);
        Route::post('/settings', [SettingController::class, 'update']);
    });


    // Categories

    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/categories/create', [CategoryController::class, 'create']);
    Route::post('/categories/store', [CategoryController::class, 'store']);
    Route::get('/categories/edit/{id}', [CategoryController::class, 'edit']);
    Route::post('/categories/update/{id}', [CategoryController::class, 'update']);
    Route::get('/categories/delete/{id}', [CategoryController::class, 'destroy']);


    // SubCategories

    Route::get('/subcategories', [SubcategoryController::class, 'index']);
    Route::get('/subcategories/create', [SubcategoryController::class, 'create']);
    Route::post('/subcategories/store', [SubcategoryController::class, 'store']);
    Route::get('/subcategories/edit/{id}', [SubcategoryController::class, 'edit']);
    Route::post('/subcategories/update/{id}', [SubcategoryController::class, 'update']);
    Route::get('/subcategories/delete/{id}', [SubcategoryController::class, 'destroy']);


    // Products

    Route::middleware('role:admin,manager')->group(function () {

        Route::get('/products', [ProductController::class, 'index']);
        Route::get('/products/create', [ProductController::class, 'create']);
        Route::post('/products/store', [ProductController::class, 'store']);
        Route::get('/products/edit/{id}', [ProductController::class, 'edit']);
        Route::post('/products/update/{id}', [ProductController::class, 'update']);
        Route::get('/products/delete/{id}', [ProductController::class, 'destroy']);
    });


    // Orders

    Route::get('/orders', [OrderController::class, 'index'])->name('admin.orders.index');
    Route::get('/orders/{id}', [OrderController::class, 'show']);
    Route::post('/orders/status/{id}', [OrderController::class, 'updateStatus']);
    Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('admin.orders.destroy');

    // Invoice
    Route::get('/orders/invoice/{id}', [OrderController::class, 'invoice']);
    Route::get('/orders/invoice-download/{id}', [OrderController::class, 'downloadInvoice']);


    //Users
    Route::get('users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('users/create', [UserController::class, 'create']);
    Route::post('users', [UserController::class, 'store']);
    Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('users/{id}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');


    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');
});


// Frontend Routes


// Home Page

Route::get('/', [FrontendController::class, 'home'])->name('home');

// Catergory

Route::get('/products/{name?}', [FrontendController::class, 'products'])->name('products');
Route::get('/category/{slug}', [FrontendController::class, 'categoryProducts'])->name('category.products');
Route::get('/subcategory/{slug}', [FrontendController::class, 'subcategoryProducts'])->name('subcategory.products');
Route::get('/product/{slug}', [FrontendController::class, 'productDetail'])->name('product.detail');


// Cart

Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

// Checkout

Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');

Route::post('checkout/place-order', [CheckoutController::class, 'placeOrder'])->name('place.order');


// Contact

Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
