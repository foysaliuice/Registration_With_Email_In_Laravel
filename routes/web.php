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

//PagesController
Route::get('/','PagesController@index');
Route::get('/register','PagesController@registrationForm')->name('register');
Route::get('/dashboard','PagesController@dashboard')->name('dashboard');
Route::get('/profile','PagesController@profile')->name('profile');

//registrationController
Route::post('/registration','RegisterController@register')->name('registration');
Route::get('verify/{member_email}/{verifyToken}','RegisterController@sendEmailDone')->name('sendEmailDone');

//LoginController
Route::get('/login','LoginController@loginForm')->name('login');
Route::post('/memberLogin','LoginController@memberLogin')->name('memberLogin');
Route::get('/logout','LoginController@logout')->name('logout');
Route::get('/reset-password','PasswordResetController@resetForm')->name('reset-password');
Route::post('/reset','PasswordResetController@reset')->name('reset');

//Member Controller
Route::post('update','MemberController@updateMember')->name('update');
Route::post('upload','MemberController@uploadFile')->name('upload');
