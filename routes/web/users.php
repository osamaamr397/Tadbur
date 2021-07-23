<?php
use Illuminate\Support\Facades\Route;

//Route::delete('admin/users/{user}/destroy','UserController@destroy')->name('user.destroy');
//Route::put('admin/users/{user}/update','UserController@update')->name('user.profile.update');
//
//Route::middleware(['role:Admin'])->group(function (){
//    Route::get('admin/users','UserController@index')->name('users.index');
//    Route::get('/admin','AdminController@index')->name('admin.index');
//
//});
//Route::middleware(['can:view,user'])->group(function (){
//    Route::get('admin/users/{user}/profile','UserController@show')->name('user.profile.show');
//
//});

Route::delete('/users/{user}/destroy','UserController@destroy')->name('user.destroy');
Route::put('/users/{user}/update','UserController@update')->name('user.profile.update');

Route::middleware(['role:Admin'])->group(function (){
    Route::get('/users','UserController@index')->name('users.index');
    Route::get('/admin','AdminController@index')->name('admin.index');
    Route::put('/users/{user}/attach','UserController@attach')->name('user.role.attach');
    Route::put('/users/{user}/detach','UserController@detach')->name('user.role.detach');

});
Route::middleware(['can:view,user'])->group(function (){
    Route::get('/users/{user}/profile','UserController@show')->name('user.profile.show');

});
