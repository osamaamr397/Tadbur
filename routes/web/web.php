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
Route::get('/', 'HomeController@index')->name('home');
Route::get('/ayah','AyahController@index')->name('ayah');
Route::get('/ayah/{ayah}','AyahController@show')->name('ayah.show');
Route::get('/ayah/{ayah}/{AyahNo}','AyahController@show_wird')->name('ayah.showWird');
Route::get('/add-to-wird/{id}','AyahController@getAddToWard')->name('ayah.addToWard');
Route::get('/wird-cart','AyahController@getWird')->name('ayah.wirdCart');
Route::get('/search','SearchController@algo')->name('quran.search');

//Route::middleware('auth')->group(function(){
//   // m4 m3ana Route::get('/admin','AdminController@index')->name('admin.index');
//    Route::get('/home', 'HomeController@index')->name('home');
//});

