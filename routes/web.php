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


Route::get('/', 'PagesController@index');
Route::get('/shop-grid', 'PagesController@shopGrid');
Route::get('/shop-details', 'PagesController@shopDetails');
Route::get('/checkout', 'PagesController@checkout');
Route::get('/shoping-cart', 'PagesController@shopingCart');
Route::get('/bog-detais', 'PagesController@blog-details');
Route::get('/blog', 'PagesController@blog');
Route::get('/contact', 'PagesController@contact');