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

//Admin
Route::group(['prefix' => 'admin'],function()
{

    Route::resource('products', 'AdminProductsController');

    Route::resource('categories', 'AdminCategoriesController');

});

//categories
Route::group(['prefix' => 'categories'],function()
{
    Route::get('/', ['as' => 'categories', 'uses' => 'CategoriesController@index']);
    Route::get('create', ['as' => 'categories.create', 'uses' => 'CategoriesController@create']);
    Route::post('store', ['as' => 'categories.store', 'uses' => 'CategoriesController@store']);
    Route::get('{id}/destroy', ['as' => 'categories.destroy', 'uses' => 'CategoriesController@destroy']);
    Route::get('{id}/edit', ['as' => 'categories.edit', 'uses' => 'CategoriesController@edit']);
    Route::put('{id}/update', ['as' => 'categories.update', 'uses' => 'CategoriesController@update']);
});

//Products
Route::group(['prefix' => 'products'],function()
{
    Route::get('', ['as' => 'products', 'uses' => 'ProductsController@index']);
    Route::get('create', ['as' => 'products.create', 'uses' => 'ProductsController@create']);
    Route::post('store', ['as' => 'products.store', 'uses' => 'ProductsController@store']);
    Route::get('{id}/destroy', ['as' => 'products.destroy', 'uses' => 'ProductsController@destroy']);
    Route::get('{id}/edit', ['as' => 'products.edit', 'uses' => 'ProductsController@edit']);
    Route::put('/{id}/update', ['as' => 'products.update', 'uses' => 'ProductsController@update']);
});

Route::get('/','WelcomeController@index');
