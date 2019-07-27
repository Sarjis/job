<?php

Route::get('/posts', 'PageController@index')->name('/posts');
//Route::get('/', 'PageController@index')->name('/');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {

    Route::resource('post', 'PostController');

    Route::resource('profile', 'ProfileController');

    Route::get('/register/{id}/{profile_id}', 'ProfileController@makeRegister')->name('register');

    Route::get('/application/select{id}', 'ApplicationController@makeApplicationSelected')->name('application/select');

    Route::get('/applicant-post', 'PostController@applicant_post')->name('applicant-post');

    Route::resource('application', 'ApplicationController');


});

Route::get("/{path}", "PageController@index")->where('path', '.*');