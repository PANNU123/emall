<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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


Route::get('/','fontendController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/home', 'AdminController@index');
Route::get('admin','Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin','Admin\LoginController@Login');
Route::get('admin/logout','AdminController@Logout')->name('admin.logout');

//===========admin==========
Route::get('admin/category','Admin\CategoryController@index')->name('admin.category');
Route::post('admin/category-store','Admin\CategoryController@store')->name('store.category');

Route::get('admin/categories/edit/{cat_id}','Admin\CategoryController@Edit');
Route::post('admin/category-update','Admin\CategoryController@update')->name('update.category');
Route::get('admin/categories/delete/{cat_id}','Admin\CategoryController@Delete');

Route::get('admin/categories/inactive/{cat_id}','Admin\CategoryController@inactive');
Route::get('admin/categories/active/{cat_id}','Admin\CategoryController@active');
//======admin.brand======
Route::get('admin/brand','Admin\BrandController@index')->name('admin.brand');
Route::post('admin/brand-store','Admin\BrandController@store')->name('store.brand');

Route::get('admin/brands/edit/{cat_id}','Admin\BrandController@Edit');
Route::post('admin/brand-update','Admin\BrandController@update')->name('update.brand');
Route::get('admin/brands/delete/{cat_id}','Admin\BrandController@Delete');

Route::get('admin/brands/inactive/{cat_id}','Admin\BrandController@inactive');
Route::get('admin/brands/active/{cat_id}','Admin\BrandController@active');
//=========add product=========
Route::get('admin/products/add','Admin\ProductController@addProduct')->name('add-product');
Route::post('admin/products/store','Admin\ProductController@storeProduct')->name('store-products');
