<?php

Route::group(['middleware' => ['admin']], function(){
 
 Auth::routes();

 Route::get('/admins','AdminController@index');
 Route::get('/admin/login','AdminController@login');
 Route::post('/admin/login','AdminController@postLogin');

 //Route::get('/home', 'HomeController@index')->name('home');

});