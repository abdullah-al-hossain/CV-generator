<?php

Route::get('/', function () {
  return view('welcome');
})->name('welcome');

Route::get('/cart', function() {
  return view('cart');
})->name('cart');

Route::resource('cv', 'CvController');
Route::resource('product', 'ProductController');
Route::resource('auction', 'AuctionController');
// Route::get('/my-cv', 'CvController@show');

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
Route::get('/admin-cv/{id}', 'AdminController@view_cv')->name('admin.show.cv')->middleware('admin');

// Admin routes
Route::get('/adminlogin', 'AdminController@login')->name('admin.login');
Route::get('/admin', 'AdminController@index')->name('admin.index')->middleware('admin');

// Pdf creator RouteServiceProvider
Route::get('/dynamic-pdf/{uid}', 'DynamicPDFController@index')->name('pdf');
Route::get('/dynamic-pdf/pdf/{uid}', 'DynamicPDFController@pdf')->name('cv.download');

// jquery
Route::get('/application', 'QueryController@index');
Route::post('/application/post', 'QueryController@store')->name('jquery.post');
Route::get('/application/fetch', 'QueryController@fetch')->name('jquery.fetch');


Route::get('/bid','BidController@index');
Route::get('/bid/{id}','BidController@show')->name('bid.show');
Route::get('/bid-latest','BidController@shownew')->name('bid.shownew');
Route::get('/show-winner','BidController@show_winner')->name('show.winner');
Route::post('/bid','BidController@store')->name('bid.new');
Route::post('/bid-winner','BidController@winner')->name('bid.winner');
