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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('get_countries', 'CountryStateController@getCountries');
Route::get('get_states', 'CountryStateController@getStates');
Route::resource('products','ProductController');
Route::get('{path}',"HomeController@index")->where('path','[-a-z0-9_\s]+');

Route::get('get_branchbalance', 'CountryStateController@getCountries');
Route::get('get_states', 'CountryStateController@getStates');



Route::get('/userlist','TestController@index')->name('userlist');
Route::post('/deleteuser/{id}','UserController@delete_user');