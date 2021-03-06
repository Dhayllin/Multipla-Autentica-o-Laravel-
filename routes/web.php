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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['admin']], function(){
 
    Auth::routes();

    Route::get('/admin','AdminController@index');
    Route::get('/admin/login','AdminController@login')->name('admin.login');
    Route::post('/admin/login','AdminController@postLogin')->name('admin.postLogin');


    //Route::get('/home', 'HomeController@index')->name('home');

});