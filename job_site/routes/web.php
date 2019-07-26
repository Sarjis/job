<?php

Route::get('/','PageController@index');

Route::resource('post','PostController');
Route::resource('profile','ProfileController');

Route::resource('applicant','ApplicantController');
Route::resource('company','CompanyController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
