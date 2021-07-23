<?php
use Illuminate\Support\Facades\Route;
//Route::get('/admin/videos','VideoController@index')->name('video.index');
//Route::get('/admin/videos/create','VideoController@create')->name('video.create');
//Route::post('/admin/videos','VideoController@store')->name('video.store');
//Route::delete('/admin/videos/{video}/destroy','VideoController@destroy')->name('video.destroy');
////here we gonna bind the post class {video}
//Route::patch('/admin/videos/{video}/update', 'VideoController@update')->name('video.update');
//Route::get('/admin/videos/{video}/edit','VideoController@edit')->middleware('can:view,video')->name('video.edit');
Route::get('/videos','VideoController@index')->name('video.index');
Route::get('/videos/create','VideoController@create')->name('video.create');
Route::post('/videos','VideoController@store')->name('video.store');
Route::delete('/videos/{video}/destroy','VideoController@destroy')->name('video.destroy');
//here we gonna bind the post class {video}
Route::patch('/videos/{video}/update', 'VideoController@update')->name('video.update');
Route::get('/videos/{video}/edit','VideoController@edit')->middleware('can:view,video')->name('video.edit');
