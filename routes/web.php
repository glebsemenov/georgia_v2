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

Route::get( '/', 'IndexController@index' );

Auth::routes();

Route::get( '/send', 'EmailController@send' );

Route::get( '/properties', 'PropertyController@index' );

Route::get( '/property/register', 'PropertyController@showRegisterForm' )->middleware('auth');;
Route::get( '/property/manage', 'PropertyController@manage' )->middleware('auth');;
Route::post( '/property/register', 'PropertyController@register' )->middleware('auth');;

Route::get( '/account', 'AccountController@index' );

Route::get( '/hotel/{id}', 'HotelController@show' );