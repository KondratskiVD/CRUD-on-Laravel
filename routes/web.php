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

Route::get('/adverts/{id}', ['as'=>'adverts_of_user','uses'=>'Core@getAdverts']);
Route::get('/', ['as'=>'all_adverts','uses'=>'Core@getAllAdverts']);

Route::post('/adverts/{id}/add', 'Core@store');
Route::delete('/adverts/{id}/destroy', ['as'=>'destroy_advert','uses'=>'Core@destroy']);
Route::get('/adverts/{id}/edit', ['as'=>'edit_advert','uses'=>'Core@edit']);
Route::post('/adverts/{id}/edit', ['as'=>'edit_advert','uses'=>'Core@update']);