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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('restaurant', 'Admin\\RestaurantController@index')->name('restaurant.index');
    Route::get('restaurant/new', 'Admin\\RestaurantController@new')->name('restaurant.new');
    Route::post('restaurant/store', 'Admin\\RestaurantController@store')->name('restaurant.store');
});
