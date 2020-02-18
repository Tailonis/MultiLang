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

Route::resource('langs', 'Multi\LanguagesController');
Route::resource('localization', 'Multi\LocalizationController');
Route::resource('keys', 'Multi\KeysController');

Route::post('localization/save', 'Multi\LocalizationController@saveTranslate')->name('translate.update');


