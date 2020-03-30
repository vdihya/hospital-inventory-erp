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



// Routes for Purchase Orders
Route::get('/formpurchaseinfo','PurchaseController@show')->name('formpurchaseinfo');;

Route::post('/purchasedetails','PurchaseController@store')->name('purchasedetails');;

Route::get('/purchases','PurchaseController@view')->name('purchases');

Route::any('/search','PurchaseController@search')->name('search');

Route::get('/close_order/{ordno?}', 'PurchaseController@closeOrder')->name('close_order');


// Routes for Reports !REDUNDANT!
Route::get('/makeReport/{reportno?}','ReportController@makeReport')->name('makeReport');

Route::post('/saveReport','ReportController@saveReport')->name('saveReport');

Route::get('/reportForm','ReportController@reportForm')->name('reportForm');

Route::get('/showReport','ReportController@showReport')->name('showReport');



// Routes for Products
Route::get('/addProduct','ProductController@addProduct')->name('addProduct');

Route::post('/storeProduct','ProductController@store')->name('storeProduct');

Route::get('/viewProducts','ProductController@viewProducts')->name('viewProducts');

Route::get('/checkStock','ProductController@checkStock')->name('checkStock');

Route::get('/getStock','ProductController@getStock')->name('getStock');

Route::get('/deleteProduct','ProductController@deleteProduct')->name('deleteProduct');

Route::get('/getProduct','ProductController@getProduct')->name('getProduct');

Route::get('/updateStock','ProductController@updateStock')->name('updateStock');



// Routes for PDFReport creation

Route::get('/POreportform','PurchaseController@POreportform')->name('POreportform');

Route::get('/PROreportform','ProductController@PROreportform')->name('PROreportform');

Route::get('/USERreportform','UserController@USERreportform')->name('USERreportform');

Route::get('/POpdf','PurchaseController@POpdf')->name('POpdf');

Route::get('/PROpdf','ProductController@PROpdf')->name('PROpdf');

