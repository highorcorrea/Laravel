<?php

//use CodeCommerce\Category;
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

//New style
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::pattern('id','[0-9]+');

//Old style
Route::get('/','WelcomeController@index');


Route::get('admin/products','AdminProductsController@index');

Route::get('admin/categories','AdminCategoriesController@index');

Route::get('user/{id?}', function($id = null){
    if($id)
        return "Ola $id";
    return "Não possui id";

});

/*
Route::get('exemplo',function(){

    $categories = Category::all();
    return view('exemplo',compact('categories'));
});
*/