<?php

use Illuminate\Http\Request;
use App\Category;
use App\Http\Resources\Category as CategoryResource;
use App\Http\Resources\Categories as CategoriesResource;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// List Products
Route::get('products', 'API\ProductController@index');

// List single product
Route::get('product/{id}', 'API\ProductController@show');

//getting list of product under 
Route::get('category/{id}', 'API\ProductController@allProduct');
//getting list of category
Route::get('category',  function () {
    return new CategoriesResource(Category::all());
});

//authenticating user
Route::post('auth/login', 'Auth\ApiLoginController@login');

Route::group(['middleware' => ['api']], function () {
    Route::post('auth/register', 'Auth\ApiRegisterController@register');
});

Route::post("product/order","API\ProductController@order");

