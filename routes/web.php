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

/* route groud for admin*/
Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function()
{

/*Routes for products  */
Route::get('/products', 'ProductController@index')->name('products');
Route::post('/updateProduct/{id}', 'ProductController@update')->name('updateProduct');
Route::get('/monitoring', 'ProductController@StockMonitoring')->name('StockMonitoring');
Route::post('/searchProducts', 'ProductController@searchProducts')->name('searchProducts');

Route::resource('products', 'ProductController');

/*Routes for suppliers */

Route::get('/suppliers', 'SupplierController@index')->name('suppliers');
Route::post('/updateSupplier/{id}', 'SupplierController@update')->name('updateSupplier');
Route::delete('/delete/{id}', 'SupplierController@destroy')->name('deleteProduct');
Route::post('/searchSuppliers', 'SupplierController@searchSuppliers')->name('searchSuppliers');

Route::resource('suppliers','SupplierController');

});

/* Route for export excel */
Route::get('products/export/', 'ProductController@export')->name('exportProducts');
