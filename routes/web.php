<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['web']], function() {

// Login Routes...
    Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
    Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
    Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

// Registration Routes...
    Route::get('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
    Route::post('register', ['as' => 'register.post', 'uses' => 'Auth\RegisterController@register']);

// Password Reset Routes...
    Route::get('password/reset', ['as' => 'password.reset', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
    Route::post('password/email', ['as' => 'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
    Route::get('password/reset/{token}', ['as' => 'password.reset.token', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
    Route::post('password/reset', ['as' => 'password.reset.post', 'uses' => 'Auth\ResetPasswordController@reset']);
});


// Site-admin routes

Route::get('/admin/news', 'SiteController@news');
Route::get('/admin/news/add','SiteController@addNews');
Route::post('/admin/news/add','SiteController@postNews');
Route::get('/admin/authors/add','SiteController@addAuthors');
Route::post('/admin/authors/add','SiteController@postAuthors');
Route::get('/admin/categories/add','SiteController@addCategories');
Route::post('/admin/categories/add','SiteController@postCategories');
Route::get('/admin/news/edit/{id}','SiteController@editNews');
Route::post('/admin/news/edit/{id}','SiteController@changeNews');
Route::get('/admin/news/delete/{id}','SiteController@deleteNews');

Route::get('admin/downloads', 'SiteController@downloads');
Route::get('admin/downloads/add','SiteController@addDownload');
Route::post('admin/downloads/add','SiteController@postDownload');
Route::get('admin/downloads/edit/{id}','SiteController@editDownload');
Route::post('admin/downloads/edit/{id}','SiteController@changeDownload');
Route::get('admin/downloads/delete/{id}','SiteController@deleteDownload');


Route::get('/home', 'HomeController@index');
Route::get('/downloads','HomeController@downloads');
Route::get('/ranking','HomeController@ranking');

