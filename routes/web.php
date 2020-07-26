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

Route::get('/', 'PagesController@index')->name('home');

Route::get('products', 'ProductsController@index')->name('products');

Route::get('cart', 'CartController@index')->name('cart');
Route::get('cart/{product}', 'CartController@store')->name('addToCart');
Route::patch('cart/{product}', 'CartController@edit')->name('editCartItem');
Route::delete('cart/{product}', 'CartController@delete')->name('removeCartItem');
Route::delete('cart', 'CartController@destroy')->name('emptyCart');

Route::get('wishlist', 'WishListController@index')->name('wishlist');
Route::get('wishlist/{product}', 'WishListController@store')->name('addTowishlist');
Route::post('wishlist', 'WishListController@addAllToCart')->name('addAllToCart');
Route::delete('wishlist/{product}', 'WishListController@delete')->name('removeWishlistItem');
Route::delete('wishlist', 'WishListController@destroy')->name('emptyWishlist');

Route::auth();