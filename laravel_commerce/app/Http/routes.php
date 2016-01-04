<?php


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::pattern('id','[0-9]+');
Route::pattern('category','[A-Za-z]+');
Route::pattern('products','[A-Za-z]+');


Route::group(['prefix' => 'admin'],function(){

    Route::resource('products', 'AdminProductsController');

    Route::resource('categories', 'AdminCategoriesController');

});


Route::get('/','WelcomeController@index');


//Route::get('admin/products','AdminProductsController@index');

//Route::get('admin/categories','AdminCategoriesController@index');
