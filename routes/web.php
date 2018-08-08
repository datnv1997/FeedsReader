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
Route::get('News', 'HomeController@index')->name('news');

Route::get('news/{id}', 'HomeController@show');

Route::post("del/{id}",'HomeController@Phahuy');

Route::post("Edit",'HomeController@edit')->name('Action_Edit');


Route::get('startup','startupController@index');
Route::post("startup_del/{id}",'startupController@Phahuy');






