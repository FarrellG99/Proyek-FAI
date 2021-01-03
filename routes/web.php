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
Route::get('/about', ['uses'=>'Controller@viewabout']);
Route::get('/contactus', ['uses'=>'Controller@viewcontactus']);
Route::get('/register', ['uses'=>'Controller@viewregister']);
Route::get('/adminpage', ['uses'=>'Controller@adminpage']);
Route::get('/bookingpage', ['uses'=>'Controller@bookingpage']);
Route::get('/history', ['uses'=>'Controller@viewhistory']);
Route::get('/viewdetail/{platnomor}', ['uses'=>'Controller@viewdetail']);
Route::get('/booking', ['uses'=>'Controller@bookingpage']);
Route::get('/profile', ['uses'=>'Controller@profile']);

Route::post('/post_register', ['uses'=>'Controller@register']);
Route::post('/post_profile', ['uses'=>'Controller@postprofile']);
Route::post('/post_login', ['uses'=>'Controller@login']);
Route::post('/post_tambahmobil', ['uses'=>'Controller@post_tambahmobil']);
Route::post('/post_booking', ['uses'=>'Controller@post_booking']);