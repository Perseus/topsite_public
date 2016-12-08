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

Route::get('/admin/site','SiteController@mainPage');

Route::get('/admin/news', 'SiteController@news');
Route::get('/admin/news/add','SiteController@addNews');
Route::post('/admin/news/add','SiteController@postNews');
Route::get('/admin/news/edit/{id}','SiteController@editNews');
Route::post('/admin/news/edit/{id}','SiteController@changeNews');
Route::get('/admin/news/delete/{id}','SiteController@deleteNews');

Route::get('/admin/authors/add','SiteController@addAuthors');
Route::post('/admin/authors/add','SiteController@postAuthors');
Route::get('/admin/authors/delete/{type}/{id}','SiteController@deleteAuthor');
Route::get('/admin/authors/view/{type?}','SiteController@viewAuthors');

Route::get('/admin/categories/add','SiteController@addCategories');
Route::post('/admin/categories/add','SiteController@postCategories');
Route::get('/admin/categories/delete/{type}/{id}','SiteController@deleteCategory');
Route::get('/admin/categories/view/{type?}','SiteController@viewCategories');


Route::get('admin/downloads', 'SiteController@downloads');
Route::get('admin/downloads/add','SiteController@addDownload');
Route::post('admin/downloads/add','SiteController@postDownload');
Route::get('admin/downloads/edit/{id}','SiteController@editDownload');
Route::post('admin/downloads/edit/{id}','SiteController@changeDownload');
Route::get('admin/downloads/delete/{id}','SiteController@deleteDownload');

Route::get('admin/reports','SiteController@showReports');
Route::get('admin/report/{id}', 'SiteController@showReport');



// site-panel routes

Route::get('/admin/panel','PanelController@index');


// account-search
Route::post('/admin/panel/accounts','PanelController@searchAccounts');

// account-display
Route::get('/admin/panel/account/{id}', 'PanelController@showAccount'); 


// ajax account edit routes
Route::post('/admin/panel/pw/{id}', 'PanelController@ajaxChangePass');
Route::post('/admin/panel/mail/{id}', 'PanelController@ajaxChangeMail');


// character-search
Route::post('/admin/panel/characters','PanelController@searchCharacters');

Route::get('/home', 'HomeController@index');
Route::get('/index','HomeController@index');
Route::get('/downloads','HomeController@downloads');
Route::get('/ranking','HomeController@ranking');
Route::get('/contactus','HomeController@contact');
Route::post('/contactus','HomeController@contactUsPost');



// user-account routes

Route::get('/account','UserController@accountPage');
Route::get('/account/changepw', 'UserController@changePass');
Route::post('/account/changepw','UserController@editPass');
Route::get('/account/changemail', 'UserController@changeMail');
Route::post('/account/changemail','UserController@editMail');
