<?php

Route::get('/','Web\HomeController@index')->name('homepage');
Route::resource('blog', 'Admin\BlogController');
Route::get('test/{id}', 'Admin\BlogController@test');
Route::get('/about','InfoController@about');
Route::get('/contact','InfoController@contact');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/post/category/{category}','HomeController@category')->name('category');