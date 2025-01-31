<?php

use Illuminate\Support\Facades\Route;

// Login & Logout
Route::post('login', 'App\Http\AuthController@login')->name('login');
Route::get('/logout', 'App\Http\Controllers\AuthController@logout')->name('logout');

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
            Route::post('/add', 'ProductController@proccessadd')->name('product.store');
            Route::get('/{product}', 'ProductController@edit')->name('product.edit');
            Route::post('/{product}', 'ProductController@proccessedit')->name('product.update');
        });

        // Order Routes
        Route::prefix('order')->group(function () {
            Route::get('/', 'OrderController@index')->name('order.index');
            Route::get('/add', 'OrderController@add')->name('order.add');
            Route::post('/add', 'OrderController@proccessadd')->name('order.store');
            Route::get('/{order}', 'OrderController@edit')->name('order.edit');
            Route::post('/{order}', 'OrderController@proccessedit')->name('order.update');
        });

        // User Routes
        Route::prefix('user')->group(function () {
            Route::get('/', 'UserController@index')->name('user.index');
            Route::get('/{user}', 'UserController@read')->name('user.show');
            Route::post('/{user}', 'UserController@proccessedit')->name('user.update');
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

Route::get('/', 'App\Http\Controllers\PageController@index')->name('homepage');
Route::post('/cart/store', 'App\Http\Controllers\PageController@storeToCart')->name('cart.store');
Route::post('/cart/update', 'App\Http\Controllers\PageController@update')->name('cart.update');