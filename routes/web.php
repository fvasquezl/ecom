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

Route::get('product/{id}', function (){
    return view('products/show');
});

Route::group(['prefix'=> 'admin','middleware' =>['role:admin']], function(){

    Route::get('products','Admin\ProductController@index')->name('admin.products.index');
    Route::get('products/create','Admin\ProductController@create')->name('admin.products.create');
    Route::post('products/store','Admin\ProductController@store')->name('admin.products.store');
    Route::get('product/{id}-{slug}','Admin\ProductController@show')->name('admin.product.show');
    Route::get('products/{product}/edit','Admin\ProductController@edit')->name('admin.products.edit');
    Route::put('products/update/{product}','Admin\ProductController@update')->name('admin.products.update');

});

//Route::get('/cart', function (){
//   return view('cart/show');
//});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
