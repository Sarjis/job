<?php

Route::get('/','PageController@index')->name('/');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {

    Route::resource('post','PostController');
    Route::resource('profile','ProfileController');

    Route::resource('applicant','ApplicantController');
    Route::resource('company','CompanyController');

});

Route::get("/{path}", "PageController@index")->where('path', '.*');