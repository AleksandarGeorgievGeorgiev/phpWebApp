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

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');
Route::resource('posts', 'PostsController');
Auth::routes();
// Route::resource('profile', 'UserController');
Route::get('/profile', 'UserController@index');
Route::get('/profile/adminRights/{email}', 'UserController@handleAdminRights');
Route::get('/profile/delete', 'UserController@deleteProfile');
Route::get('/profile/destroy/{id}', 'UserController@destroy');
Route::get('/profile/restore/{email}', 'UserController@restoreProfile');
Route::post('/profile','UserController@update');
Route::get('/dashboard', 'DashboardController@index');
Route::group(['middleware' => ['auth', 'admin']], function(){
    Route::get('admin', 'AdminController@index');
});
Route::get('pdf/{id}', 'PdfController@generatePDF');
Route::get('excel', 'UserController@export');
