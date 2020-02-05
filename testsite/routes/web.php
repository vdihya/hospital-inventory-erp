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
use App\PurchaseOrder;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});
  
Auth::routes(['verify' => true]);
  
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('refresh_captcha', 'CaptchaController@refreshCaptcha')->name('refresh_captcha'); 

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

Route::get('/formpurchaseinfo','PurchaseController@show')->name('formpurchaseinfo');;

Route::post('/purchasedetails','PurchaseController@store')->name('purchasedetails');;

Route::get('/purchases','PurchaseController@view')->name('purchases');

Route::any('/search','PurchaseController@search')->name('search');

Route::get('/close_order/{ordno?}', 'PurchaseController@closeOrder')->name('close_order');