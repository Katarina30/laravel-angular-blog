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

Route::get('/', 'HomeController@index');

Route::get('posts', 'PostController@index')->name('posts');


Route::middleware('auth')->group(function () {

		Route::get('posts/create', 'PostController@create');

		Route::post('posts', 'PostController@store');

		Route::get('posts/{id}/edit', 'PostController@edit');

		Route::put('posts', 'PostController@update');

		Route::delete('posts/{id}', 'PostController@destroy');
        
    });

Route::get('posts/{id}', 'PostController@show');

Route::get('users/register', 'RegisterController@index');
Route::post('users/register', 'RegisterController@register');

Route::get('users/login', 'LoginController@index');
Route::post('users/login', 'LoginController@login')->name('login');

Route::get('users/logout', 'LoginController@logout')->name('logout');