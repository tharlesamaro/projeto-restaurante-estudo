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

    Route::prefix('admin')->namespace('Admin')->group(function () {

        Route::prefix('restaurants')->group(function () {
            Route::get('/', 'RestaurantController@index')->name('restaurant.index');
            Route::get('new', 'RestaurantController@new')->name('restaurant.new');
            Route::get('edit/{restaurant}', 'RestaurantController@edit')->name('restaurant.edit');
            Route::get('remove/{id}', 'RestaurantController@delete')->name('restaurant.remove');

            Route::post('store', 'RestaurantController@store')->name('restaurant.store');
            Route::post('update/{id}', 'RestaurantController@update')->name('restaurant.update');
        });

        Route::prefix('users')->group(function () {
            Route::get('/', 'UserController@index')->name('user.index');
            Route::get('new', 'UserController@new')->name('user.new');
            Route::get('edit/{user}', 'UserController@edit')->name('user.edit');
            Route::get('remove/{id}', 'UserController@delete')->name('user.remove');

            Route::post('store', 'UserController@store')->name('user.store');
            Route::post('update/{id}', 'UserController@update')->name('user.update');
        });

        Route::prefix('menus')->group(function () {
            Route::get('/', 'MenuController@index')->name('menu.index');
            Route::get('new', 'MenuController@new')->name('menu.new');
            Route::get('edit/{menu}', 'MenuController@edit')->name('menu.edit');
            Route::get('remove/{id}', 'MenuController@delete')->name('menu.remove');

            Route::post('store', 'MenuController@store')->name('menu.store');
            Route::post('update/{id}', 'MenuController@update')->name('menu.update');
        });
    });
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
