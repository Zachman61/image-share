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


Route::group(['middleware' => 'auth'], function() {
    Route::get('/settings', 'SettingsController@index')->name('settings');
    Route::get('/images', 'ImagesController@index')->name('images');
});

Route::get('/d/{image}', 'ImagesController@delete')->name('images.delete');


Route::get('/sharex', function() {
    $config = config('img.sharex_config');
    return view('sharex')->with('config', $config);

})->name('json');

Route::get('/{image}', 'ImagesController@show')->name('images.show');