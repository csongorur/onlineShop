<?php

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

Route::get('/', ['as' => 'shop', 'uses' => 'ShopController@index']);

// Admin.
Route::get('admin', ['as' => 'login', 'uses' => 'Admin\AdminController@index']);
Route::post('admin/login', ['as' => 'admin.login', 'uses' => 'Admin\UsersController@login']);
Route::get('admin/logout', ['as' => 'admin.logout', 'uses' => 'Admin\UsersController@logout']);
Route::get('admin/registration', ['as' => 'admin.registration.show', 'uses' => 'Admin\UsersController@registration_show']);
Route::post('admin/registration', ['as' => 'admin.registration', 'uses' => 'Admin\UsersController@registration']);

// Shop.
Route::get('products/{id}', ['as' => 'products.show', 'uses' => 'ProductsController@show']);

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('dashboard', ['as' => 'admin.dashboard', 'uses' => 'Admin\AdminController@dashboard']);

    // Products
    Route::get('products', ['as' => 'admin.products', 'uses' => 'Admin\ProductsController@index']);
    Route::get('products/add', ['as' => 'admin.products.add', 'uses' => 'Admin\ProductsController@add']);
    Route::post('products/store', ['as' => 'admin.products.store', 'uses' => 'Admin\ProductsController@store']);
    Route::get('products/delete/{id?}', ['as' => 'admin.products.delete', 'uses' => 'Admin\ProductsController@delete']);
});