<?php

use Illuminate\Http\Request;

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
Route::get('/user_purchase_data_guest', 'UserController@user_purchase_data_guest');
Route::get('/purchase_detail_guest/{id}', 'UserController@purchase_detail_guest');
Route::get('/user_rent_data_guest', 'UserController@user_rent_data_guest');
Route::get('/rent_detail_guest/{id}', 'UserController@rent_detail_guest');
Route::get('/user_sale_data_guest', 'UserController@user_sale_data_guest');
Route::get('/sale_detail_guest/{id}', 'UserController@sale_detail_guest');
Route::post('/filter','UserController@search_filter');
Route::get('/services_guest','UserController@services_guest');



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');
Route::group(['middleware' => 'cors', 'prefix' => '/v1'], function () {
    Route::post('/login', 'UserController@authenticate');
    Route::post('/register', 'UserController@register');
    Route::post('/user_profile_update/{id}', 'UserController@user_profile_update');
    Route::get('/user_profile/{id}', 'UserController@user_profile');

    Route::post('/add_sales/{id}', 'UserController@add_sales');
    Route::post('/add_sales_image/{id}', 'UserController@add_sales_image');
    Route::get('/sale_detail/{id}', 'UserController@sale_detail');
    Route::get('/user_sale_data', 'UserController@user_sale_data');
    Route::get('/sale_all_data', 'UserController@sale_all_data');
    Route::get('/sale_my_property/{id}', 'UserController@sale_my_property');

    Route::post('/add_purchase/{id}', 'UserController@add_purchase');
    Route::post('/add_purchase_image/{id}', 'UserController@add_purchase_image');
    Route::get('/purchase_detail/{id}', 'UserController@purchase_detail');
    Route::get('/user_purchase_data', 'UserController@user_purchase_data');
    Route::get('/purchase_all_data', 'UserController@purchase_all_data');
    Route::get('/purchase_my_property/{id}', 'UserController@purchase_my_property');

    Route::post('/add_rent/{id}', 'UserController@add_rent');
    Route::post('/add_rent_image/{id}', 'UserController@add_rent_image');
    Route::get('/rent_detail/{id}', 'UserController@rent_detail');
    Route::get('/user_rent_data', 'UserController@user_rent_data');
    Route::get('/rent_all_data', 'UserController@rent_all_data');
    Route::get('/rent_my_property/{id}', 'UserController@rent_my_property');

    Route::post('/services_message/{id}', 'UserController@services_message');

    Route::post('/file/upload','UserController@upload_files');
    Route::get('/filter/{type}','UserController@search_filter');
    Route::get('/logout/{api_token}', 'UserController@logout');
});