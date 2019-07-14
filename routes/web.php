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


//Data Berkas
Route::get('pelatihan/index/', 'DataProcessingController@index');
Route::get('pelatihan/create/', 'DataProcessingController@create');
Route::post('pelatihan/store/', 'DataProcessingController@store')->name('pelatihan.store');
Route::get('pelatihan/show/{id}', 'DataProcessingController@show');
Route::get('pelatihan/edit/{id}', 'DataProcessingController@edit');
Route::post('pelatihan/update/{id}', 'DataProcessingController@update');
Route::get('pelatihan/destroy/{id}', 'DataProcessingController@destroy');
Route::get('pelatihan/latih/{id}', 'DataProcessingController@latih')->name('pelatihan.latih');


//Data Pelatihan
Route::get('uploaddata/index/', 'DataBerkasController@index');
Route::get('uploaddata/create/', 'DataBerkasController@create');
Route::post('uploaddata/store/', 'DataBerkasController@store')->name('uploaddata.store');
Route::get('uploaddata/show/{id}', 'DataBerkasController@show');
Route::get('uploaddata/edit/{id}', 'DataBerkasController@edit');
Route::post('uploaddata/update/{id}', 'DataBerkasController@update');
Route::get('uploaddata/destroy/{id}', 'DataBerkasController@destroy');