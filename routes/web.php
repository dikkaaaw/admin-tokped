<?php

use Illuminate\Support\Facades\Route;

// Login
Route::get('login', 'App\Http\Controllers\AuthController@login_page')->name('login_page');
Route::post('logout', 'App\Http\Controllers\AuthController@logout')->name('logout');
Route::post('login', 'App\Http\Controllers\AuthController@login')->name('login');
Route::post('update-address', 'App\Http\Controllers\AuthController@updateAddress')->name('updateAddress');

// Register
Route::get('register', 'App\Http\Controllers\AuthController@register_page')->name('register_page');
Route::post('register', 'App\Http\Controllers\AuthController@register')->name('register');


Route::name('admin.')
    ->namespace('App\Http\Controllers\Admin')
    ->prefix('admin')
    ->group(function () {
        // Dashboard
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');

        // Product Routes
        Route::prefix('product')->group(function () {
            Route::get('/', 'ProductController@index')->name('product.index');
            Route::get('/add', 'ProductController@add')->name('product.add');
            Route::post('/proccessadd', 'ProductController@proccessadd')->name('product.store');
            Route::get('/{product}', 'ProductController@edit')->name('product.edit');
            Route::post('/proccessedit/{product}', 'ProductController@proccessedit')->name('product.update');
            Route::get('/delete/{product}', 'ProductController@delete')->name('product.delete');
        });

        // Order Routes
        Route::prefix('order')->group(function () {
            Route::get('/', 'OrderController@index')->name('order.index');
            Route::get('/add', 'OrderController@add')->name('order.add');
            Route::post('/add', 'OrderController@proccessadd')->name('order.store');
            Route::get('/{order}', 'OrderController@edit')->name('order.edit');
            Route::post('/proccessedit/{order}', 'OrderController@proccessedit')->name('order.update');
            Route::get('/delete/{order}', 'OrderController@delete')->name('order.delete');
        });

        // User Routes
        Route::prefix('user')->group(function () {
            Route::get('/', 'UserController@index')->name('user.index');
            Route::post('/{user}', 'UserController@edit')->name('user.edit');
            Route::post('/proccessedit/{user}', 'UserController@proccessedit')->name('user.update');
        });

        // Transaction Routes
        Route::prefix('transaction')->group(function () {
            Route::get('/', 'TransactionController@index')->name('transaction.index');
            Route::get('/{transaction}', 'TransactionController@read')->name('transaction.show');
            Route::post('/{transaction}/status', 'TransactionController@updateStatus')->name('transaction.status');
            Route::post('/{transaction}', 'TransactionController@proccessedit')->name('transaction.update');
        });

        // Homepage Routes
    });

// Homepage
Route::get('/', 'App\Http\Controllers\PageController@index')->name('homepage');
Route::post('/search-product', 'App\Http\Controllers\PageController@searchProduct')->name('homepage.search');
// Cart
Route::post('/cart/store', 'App\Http\Controllers\PageController@storeToCart')->name('cart.store');
Route::post('/cart/update', 'App\Http\Controllers\PageController@update')->name('cart.update');
Route::delete('/cart/delete/{idOrder}', 'App\Http\Controllers\PageController@destroy')->name('cart.delete');