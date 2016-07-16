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
Route::group(['prefix' => 'admin','middleware' => 'auth.admin','where'=> ['id' => '[0-9]+']], function()
{
    //categories
    Route::group(['prefix' => 'categories'],function()
    {
        Route::get('', ['as' => 'categories', 'uses' => 'CategoriesController@index']);
        Route::post('', ['as' => 'categories.store', 'uses' => 'CategoriesController@store']);
        Route::get('create', ['as' => 'categories.create', 'uses' => 'CategoriesController@create']);
        Route::get('{id}/destroy', ['as' => 'categories.destroy', 'uses' => 'CategoriesController@destroy']);
        Route::get('{id}/edit', ['as' => 'categories.edit', 'uses' => 'CategoriesController@edit']);
        Route::put('{id}/update', ['as' => 'categories.update', 'uses' => 'CategoriesController@update']);
    });

//Products
    Route::group(['prefix' => 'products'],function()
    {
        Route::get('', ['as' => 'products', 'uses' => 'ProductsController@index']);
        Route::post('', ['as' => 'products.store', 'uses' => 'ProductsController@store']);
        Route::get('create', ['as' => 'products.create', 'uses' => 'ProductsController@create']);
        Route::get('{id}/destroy', ['as' => 'products.destroy', 'uses' => 'ProductsController@destroy']);
        Route::get('{id}/edit', ['as' => 'products.edit', 'uses' => 'ProductsController@edit']);
        Route::put('/{id}/update', ['as' => 'products.update', 'uses' => 'ProductsController@update']);

        Route::group(['prefix' => 'images'], function()
        {
            Route::get('{id}/product',['as' => 'products.images', 'uses' => 'ProductsController@images']);
            Route::get('create/{id}/product',['as' => 'products.images.create', 'uses' => 'ProductsController@createImage']);
            Route::post('store/{id}/product',['as' => 'products.images.store', 'uses' => 'ProductsController@storeImage']);
            Route::get('destroy/{id}/image',['as' => 'products.images.destroy', 'uses' => 'ProductsController@destroyImage']);
        });
    });
});

Route::get('/', ['as' => 'store.index', 'uses' => 'StoreController@index']);
Route::get('category/{id}', ['as' => 'store.category', 'uses' => 'StoreController@category']);
Route::get('product/{id}', ['as' => 'store.product', 'uses' => 'StoreController@product']);
Route::get('tag/{id}', ['as' => 'store.tag', 'uses' => 'StoreController@tag']);
Route::get('cart', ['as' => 'cart', 'uses' => 'CartController@index']);
Route::get('cart/add/{id}', ['as' => 'cart.add', 'uses' => 'CartController@add']);
Route::get('cart/destroy/{id}', ['as' => 'cart.destroy', 'uses' => 'CartController@destroy']);
Route::put('cart/update/{id}', ['as' => 'cart.update', 'uses' => 'CartController@update']);


Route::group(['prefix' => 'orders'],function() {
    Route::get('', ['as' => 'orders', 'uses' => 'OrdersController@index']);
    Route::get('{id}/edit', ['as' => 'orders.edit', 'uses' => 'OrdersController@edit']);
    Route::put('{id}/update', ['as' => 'orders.update', 'uses' => 'OrdersController@update']);
});

Route::group(['middleware'=>'auth'],function(){
    Route::get('checkout/placeOrder',[ 'as' => 'checkout.place', 'uses' => 'CheckoutController@place']);
    Route::get('account/orders',[ 'as' => 'account.orders', 'uses' => 'AccountController@orders']);
});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
    'test' => 'TestController',
]);

Route::get('test','CheckoutController@test');