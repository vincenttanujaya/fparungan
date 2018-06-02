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
Route::get('/ourproject/{id}', 'HomeController@our');
Route::get('/login', 'HomeController@login')->name('login');


Route::group(['prefix' => 'penyedium'], function () {
  Route::get('/login', 'PenyediumAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'PenyediumAuth\LoginController@login');
  Route::post('/logout', 'PenyediumAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'PenyediumAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'PenyediumAuth\RegisterController@register');

  Route::post('/password/email', 'PenyediumAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'PenyediumAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'PenyediumAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'PenyediumAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'mahasiswa'], function () {
  Route::get('/login', 'MahasiswaAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'MahasiswaAuth\LoginController@login');
  Route::post('/logout', 'MahasiswaAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'MahasiswaAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'MahasiswaAuth\RegisterController@register');

  Route::post('/password/email', 'MahasiswaAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'MahasiswaAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'MahasiswaAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'MahasiswaAuth\ResetPasswordController@showResetForm');
});
