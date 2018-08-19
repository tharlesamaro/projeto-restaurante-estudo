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

Route::group(['middleware' => ['auth']], function () {

    Route::prefix('admin')->group(function () {
        Route::get('restaurants', 'Admin\\RestaurantController@index')->name('restaurant.index');
        Route::get('restaurants/new', 'Admin\\RestaurantController@new')->name('restaurant.new');
        Route::get('restaurants/edit/{restaurant}', 'Admin\\RestaurantController@edit')->name('restaurant.edit');
        Route::get('restaurants/remove/{id}', 'Admin\\RestaurantController@delete')->name('restaurant.remove');

        Route::post('restaurants/store', 'Admin\\RestaurantController@store')->name('restaurant.store');
        Route::post('restaurants/update/{id}', 'Admin\\RestaurantController@update')->name('restaurant.update');
    });
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
