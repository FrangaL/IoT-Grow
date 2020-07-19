<?php

use Illuminate\Support\Facades\Route;

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
Route::get('reloj', 'PagesController@reloj');
Route::get('iluminacion', 'PagesController@iluminacion');
Route::get('temperatura', 'PagesController@temperatura');
Route::get('portafolio', 'PagesController@portafolio');

Route::get('ajaxRequestBtn/{id}', 'HomeController@ajaxRequestBtn');
Route::post('ajaxRequestBtn/{id}', 'HomeController@ajaxRequestPostBtn');

Route::get('programareloj', 'HomeController@programareloj');
Route::post('programareloj', 'HomeController@programareloj');

Route::get('changemode', 'HomeController@changemode');
Route::post('changemode', 'HomeController@changemode');

Route::get('showhour', 'HomeController@showhour');
Route::post('showhour', 'HomeController@showhour');
