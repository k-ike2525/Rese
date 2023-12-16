<?php

use App\Http\Controllers\MyPageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

Auth::routes();

Route::get('/top', function () {return view('/top');});
Route::get('/thanks', function () {return view('/auth.thanks');});


Route::group(['middleware' => 'guest'], function() {
  Route::get('/register', 'Auth\RegisteredUserController@create')->name('register');
  Route::post('/register', 'Auth\RegisteredUserController@store')->name('register');
});

Route::get('/', 'ShopController@index')->name('home.index');
Route::get('/detail/{id}', 'ShopController@detail')->name('shop.detail');
Route::get('/search', 'ShopController@search')->name('search');

Route::get('/done', 'ReservationController@index')->name('done.index');
Route::post('/reservations', 'ReservationController@store')->name('reservations.store');

Route::get('/my_page', [MyPageController::class, 'myPage'])->name('my_page');
Route::get('/my_page', 'MyPageController@index')->name('my_page.index');
