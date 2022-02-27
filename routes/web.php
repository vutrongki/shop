<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::prefix('/backend')->group(function () {
    Auth::routes();

    Route::get('/logout', function () {
        return redirect()->route('login');
    });

    Route::get('/', 'HomeController@index')->name('home');

    Route::prefix('/categories')->group(function () {

        Route::get('/', 'backend\CategoryController@index')->name('categories.index');

        Route::get('/create', 'backend\CategoryController@create')->name('categories.create');

        Route::post('/store', 'backend\CategoryController@store')->name('categories.store');

        Route::get('/edit/{id}', 'backend\CategoryController@edit')->name('categories.edit');

        Route::post('/update/{id}', 'backend\CategoryController@update')->name('categories.update');

        Route::get('/delete/{id}', 'backend\CategoryController@delete')->name('categories.delete');
    });

    Route::prefix('/products')->group(function () {

        Route::get('/', 'backend\ProductController@index')->name('products.index');

        Route::get('/create', 'backend\ProductController@create')->name('products.create');

        Route::post('/store', 'backend\ProductController@store')->name('products.store');

        Route::get('/edit/{id}', 'backend\ProductController@edit')->name('products.edit');

        Route::post('/update/{id}', 'backend\ProductController@update')->name('products.update');

        Route::get('/delete/{id}', 'backend\ProductController@delete')->name('products.delete');
    });
    Route::prefix('/sliders')->group(function () {

        Route::get('/', 'backend\SliderController@index')->name('sliders.index');

        Route::get('/create', 'backend\SliderController@create')->name('sliders.create');

        Route::post('/store', 'backend\SliderController@store')->name('sliders.store');

        Route::get('/edit/{id}', 'backend\SliderController@edit')->name('sliders.edit');

        Route::post('/update/{id}', 'backend\SliderController@update')->name('sliders.update');

        Route::get('/delete/{id}', 'backend\SliderController@delete')->name('sliders.delete');
    });

    Route::prefix('/settings')->group(function () {

        Route::get('/', 'backend\SettingController@index')->name('settings.index');

        Route::get('/create', 'backend\SettingController@create')->name('settings.create');

        Route::post('/store', 'backend\SettingController@store')->name('settings.store');

        Route::get('/edit/{id}', 'backend\SettingController@edit')->name('settings.edit');

        Route::post('/update/{id}', 'backend\SettingController@update')->name('settings.update');

        Route::get('/delete/{id}', 'backend\SettingController@delete')->name('settings.delete');
    });

    Route::prefix('/news')->group(function () {

        Route::get('/', 'backend\NewController@index')->name('news.index');

        Route::get('/create', 'backend\NewController@create')->name('news.create');

        Route::post('/store', 'backend\NewController@store')->name('news.store');

        Route::get('/edit/{id}', 'backend\NewController@edit')->name('news.edit');

        Route::post('/update/{id}', 'backend\NewController@update')->name('news.update');

        Route::get('/delete/{id}', 'backend\NewController@delete')->name('news.delete');
    });

    Route::prefix('/orders')->group(function () {

        Route::get('/', 'backend\OrdersController@index')->name('orders.index');
        
        Route::get('/detail/{id}', 'backend\OrdersController@detail')->name('orders.detail');

        Route::get('/update/{id}', 'backend\OrdersController@update')->name('orders.update');

    });
});

//---------------------------Frontend---------------------------
Route::get('/', 'frontend\HomeController@index')->name('home.index');

Route::get('/categories', 'frontend\HomeController@categories')->name('categories.list');

Route::get('/categories/{slug}', 'frontend\HomeController@category')->name('categories.detail');

Route::get('/detail/{id}', 'frontend\HomeController@detail')->name('product.detail');

Route::group(["prefix" => "cart"], function () {
    Route::get("add-to-cart/{id}", "frontend\CartController@addToCart")->name('addToCart');
    Route::get("show-cart", "frontend\CartController@showCart")->name('showCart');
    Route::get("delete/{id}", "CartController@deleteCart");
    Route::get("update", "frontend\CartController@updateCart")->name('updateCart');
});

Route::get('/ajax/{id}', 'frontend\HomeController@modal')->name('modal');

Route::get('/register', 'frontend\CustomerController@register')->name('customer.register');

Route::post('/registerPost', 'frontend\CustomerController@registerPost')->name('register.post');

Route::get('/login', 'frontend\CustomerController@login')->name('customer.login');

Route::post('/loginPost', 'frontend\CustomerController@loginPost')->name('login.post');

Route::get('/checkout', 'frontend\CartController@checkout')->name('checkout');

Route::post('/checkoutPost', 'frontend\CartController@checkoutPost')->name('checkout.post');

Route::get('/search', 'frontend\SearchController@searchProduct')->name('search');

Route::post('/review', 'frontend\ReviewController@review')->name('review');



