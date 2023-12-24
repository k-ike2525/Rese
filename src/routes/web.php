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

Auth::routes();

//.....各表示....//
Route::get('/top', function () {return view('/top');});
Route::get('/thanks', function () {return view('/auth.thanks');});

//.....会員登録機能....//
Route::group(['middleware' => 'guest'], function() {
  Route::get('/register', 'Auth\RegisteredUserController@create')->name('register');
  Route::post('/register', 'Auth\RegisteredUserController@store')->name('register');
});

//.....飲食店一覧表示機能....//
Route::get('/', 'ShopController@index')->name('home.index');
Route::get('/detail/{id}', 'ShopController@detail')->name('shop.detail');
Route::get('/search', 'ShopController@search')->name('search');

//.....飲食店一覧表示機能:お気に入り機能....//
Route::middleware(['auth'])->group(function () {
  Route::get('/favorites/check/{shopId}','FavoritesController@checkFavorite');//...サーバー読み込みによるデータチェック
  Route::post('/favorites/toggle/{shopId}', 'FavoritesController@toggleFavorite');//...お気に入り オンオフ切り替え
});

//.....マイページ表示：予約情報・お気に入り削除....//
Route::get('/my_page', 'MyPageController@myPage')->name('my_page');//・・表示機能
Route::delete('/favorites/remove/{shopId}', 'MyPageController@removeFromFavorites')->name('favorites.remove');//  お気に入り削除

//.....予約機能....//
Route::post('/reservations', 'ReservationController@store')->name('reservations.store');//・・予約開始
Route::get('/done', 'ReservationController@index')->name('done.index');//・・予約完了
Route::delete('/cancel-reservation/{id}', 'MyPageController@cancelReservation');//  予約取り消し

//.....予約変更機能....//
Route::put('/reservations/{id}', 'ReservationController@update')->name('reservations.update');//  予約の編集画面を表示
Route::get('/reservations/{id}/edit', 'ReservationController@edit')->name('reservations.edit');//...DB:予約テーブル情報変更


