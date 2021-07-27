<?php

use Illuminate\Support\Facades\Route;

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
Route::auth();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/wast', 'HomeController@wast')->name('wastt');
Route::get('/warch', 'HomeController@warsh')->name('warshh');
Route::get('/douri', 'HomeController@douri')->name('dourii');
Route::get('/detectpage','HomeController@detectreciter')->name('detectionre');
Route::get('/videotafseer','VideoController@index2')->name('videoTafsser');
Route::get('/ayah','AyahController@index')->name('ayah');
Route::get('/ayah/{ayah}','AyahController@show')->name('ayah.show');

Route::get('/add-to-wird/{AyahNo}/{id}','AyahController@getAddToWard')->name('ayah.addToWard');
Route::get('/wird-cart','AyahController@getWird')->name('ayah.wirdCart');
Route::get('/ayah/{ayah}/{AyahNo}','AyahController@show_wird')->name('ayah.showWird');

//search route

Route::get("search",'AyahController@search')->name('search');



//Route::middleware('auth')->group(function(){
//   // m4 m3ana Route::get('/admin','AdminController@index')->name('admin.index');
//    Route::get('/home', 'HomeController@index')->name('home');
//});

