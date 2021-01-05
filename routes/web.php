<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', ['uses'=>'Controller@homepage']);
Route::get('/login', ['uses'=>'Controller@viewlogin']);
Route::get('/logout', ['uses'=>'Controller@logout']);
Route::get('/about', ['uses'=>'Controller@viewabout']);
Route::get('/contactus', ['uses'=>'Controller@viewcontactus']);
Route::get('/register', ['uses'=>'Controller@viewregister']);
Route::get('/adminmobil', ['uses'=>'Controller@adminpage']);
Route::get('/adminuser', ['uses'=>'Controller@adminuser']);
Route::get('/bookingpage', ['uses'=>'Controller@bookingpage']);
Route::get('/history', ['uses'=>'Controller@viewhistory']);
Route::get('/viewdetail/{platnomor}', ['uses'=>'Controller@viewdetail']);
Route::get('/booking', ['uses'=>'Controller@bookingpage']);
Route::get('/profile', ['uses'=>'Controller@profile']);
Route::get('/password', ['uses'=>'Controller@password']);
Route::get('/adminbooking', ['uses'=>'Controller@adminbooking']);
Route::get('/adminhistory', ['uses'=>'Controller@adminhistory']);
Route::get('/nonaktifkanmobil/{platnomor}', ['uses'=>'Controller@nonaktifkanmobil']);
Route::get('/aktifkanmobil/{platnomor}', ['uses'=>'Controller@aktifkanmobil']);
Route::get('/nonaktifkanuser/{username}', ['uses'=>'Controller@nonaktifkanuser']);
Route::get('/aktifkanuser/{username}', ['uses'=>'Controller@aktifkanuser']);

Route::post('/post_register', ['uses'=>'Controller@register']);
Route::post('/post_profile', ['uses'=>'Controller@postprofile']);
Route::post('/post_password', ['uses'=>'Controller@postpassword']);
Route::post('/post_login', ['uses'=>'Controller@login']);
Route::post('/post_tambahmobil', ['uses'=>'Controller@post_tambahmobil']);
Route::post('/post_booking', ['uses'=>'Controller@post_booking']);