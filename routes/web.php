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
    Route::get('restaurants', 'Admin\\RestaurantController@index')->name('restaurant.index');
    Route::get('restaurants/new', 'Admin\\RestaurantController@new')->name('restaurant.new');
    Route::get('restaurants/edit/{id}', 'Admin\\RestaurantController@edit')->name('restaurant.edit');
    Route::get('restaurants/update/{id}', 'Admin\\RestaurantController@edit')->name('restaurant.update');

    Route::post('restaurants/store', 'Admin\\RestaurantController@store')->name('restaurant.store');

});
