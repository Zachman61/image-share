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

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

if (env('REGISTER_ENABLED', false))
{
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');
}
else
{
    Route::get('register', function() {
        return view('registration_disabled');
    })->name('register');
}

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => 'auth'], function() {
    Route::get('/settings', 'SettingsController@index')->name('settings');
    Route::get('/images', 'ImagesController@index')->name('images');
});

Route::get('/d/{image}', 'ImagesController@delete')->name('images.delete');


Route::get('/sharex', function() {
    $config = \App\ShareXConfig::getShareXConfig();
    return view('sharex')->with('config', $config);

})->name('json');

Route::get('/{image}', 'ImagesController@show')->name('images.show');