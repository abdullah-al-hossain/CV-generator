<?php

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::resource('cv', 'CvController');
Route::get('/my-cv', 'CvController@show');

// Facebook login
Route::get('/facebook/redirect', 'SocialAuthController@redirect');
Route::get('/facebook/callback', 'SocialAuthController@callback');

// Google Login
Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');

// LinkedIn Login
Route::get('auth/linkedin', 'LinkedinController@redirectToLinkedin');
Route::get('auth/linkedin/callback', 'LinkedinController@handleLinkedinCallback');

// Auth routes
Auth::routes();

// Home routes
Route::get('/home', 'HomeController@index')->name('home');

// Admin routes
Route::get('/adminlogin', 'AdminController@login')->name('admin.login');
Route::get('/admin', 'AdminController@index')->name('admin.index')->middleware('admin');

// Pdf creator RouteServiceProvider
Route::get('/dynamic_pdf/{uid}', 'DynamicPDFController@index')->name('pdf');
Route::get('/dynamic_pdf/pdf/{uid}', 'DynamicPDFController@pdf')->name('pdf.download');

// jquery
Route::get('/jquery', 'QueryController@index');
Route::post('/jquery/post', 'QueryController@store')->name('jquery.post');
Route::get('/jquery/fetch', 'QueryController@fetch')->name('jquery.fetch');


Route::get('/bid','BidController@index');
Route::get('/bid/{id}','BidController@show')->name('bid.show');
Route::get('/bidlatest','BidController@shownew')->name('bid.shownew');
Route::post('/bid','BidController@store')->name('bid.new');
