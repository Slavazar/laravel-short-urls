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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/urls', 'UrlController@index');

Route::get('/urls/add', 'UrlController@getAdd');
Route::post('/urls/add', 'UrlController@postAdd');
Route::get('/urls/edit/{id}', 'UrlController@getEdit');
Route::post('/urls/edit/{id}', 'UrlController@postEdit');
Route::get('/urls/view/{id}', 'UrlController@getView');
Route::get('/urls/delete/{id}', 'UrlController@getDelete');

Route::get('/urls/get-short-url/{id}', 'UrlController@getShortUrl');

Route::get('/go/{token}', 'GoController@getView');
