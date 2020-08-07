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


Route::get('/', 'PagesController@index')->name('page.index');
Route::get('/shop-grid', 'PagesController@shopGrid');
// Route::get('/shop-details', 'PagesController@shopDetails');

Route::get('/bog-detais', 'PagesController@blog-details');
Route::get('/blog', 'PagesController@blog');
Route::get('/contact', 'PagesController@contact');

Route::get('/shopping-cart', 'ShopingCartController@index')->name('cart.index');
Route::post('/shopping-cart', 'ShopingCartController@store')->name('cart.store');
Route::get('/cart/{product}', 'ShopingCartController@delete')->name('cart.delete');
Route::patch('/cart/{product}', 'ShopingCartController@update')->name('cart.update');
Route::post('/cart/switchToSaveForLater', 'ShopingCartController@switchToSaveForLater')->name('cart.switchToSaveForLater');

Route::get('/empty', function(){
    Cart::destroy();
});
Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');

Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');
Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');



Route::get('/product-details/{id}', 'ProductsController@productDetails')->name('product.details');


Route::group(['prefix' => 'auth'], function () {

    Route::get('/login', 'AuthenticationController@index')->name('user.login');
    Route::post('/login', 'AuthenticationController@vendorLogin')->name('login.post');
    Route::get('/register', 'AuthenticationController@create')->name('user.register');
    Route::post('/register', 'AuthenticationController@store')->name('user.store');
    Route::post('/logout', 'AuthenticationController@logout')->name('logout');

});

Route::group(['prefix' => 'vendor'], function () {

    Route::get('/products', 'ProductsController@index')->name('vendor.index');
    Route::post('/products', 'ProductsController@store')->name('vendor.post');
    Route::get('/products/{id}', 'ProductsController@edit')->name('product.edit');
    Route::put('/products/{id}', 'ProductsController@update')->name('product.update');
    Route::get('/delete/{id}', 'ProductsController@delete')->name('product.delete');


});

Route::group(['prefix' => 'admin'], function () {

    Route::get('/users', 'UserController@index')->name('admin.index');
    Route::get('/customers', 'UserController@AllCustomers')->name('user.index');
    Route::get('/vendors', 'VendorsController@AllVendors');
    Route::get('/products', 'AdminController@index')->name('product.get');

    // Route::get('/users', 'AdminController@users')->name('user.index');

    Route::get('/category', 'Product_categoryController@index')->name('category.index');
    Route::post('/category', 'Product_categoryController@store')->name('category.post');
    Route::get('/category/{slug}', 'Product_categoryController@edit')->name('category.edit');
    Route::put('/category/{slug}', 'Product_categoryController@update')->name('category.update');
    Route::get('/delete/{slug}', 'Product_categoryController@delete')->name('category.delete');




});

