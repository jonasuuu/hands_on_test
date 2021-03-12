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

Route::get('/', 
    [
        'uses'=> 'LoginController@index'
]);
Route::post('/log', 
    [
        'uses'=> 'LoginController@login'
]);
Route::get('/register', 
    [
        'uses'=> 'LoginController@register'
]);
Route::post('/success', 
    [
        'uses'=> 'LoginController@registered'
]);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
