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
    return view('/');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

//Route::get('/', 'Adminpanel@index');
//Route::get('/dashboard', 'Adminpanel@dashboard');
//Route::get('/user_sales_req', 'Adminpanel@add_user_sales_request');
//Route::post('/user_sales_req_store', 'Adminpanel@user_sales_req_store');
//Route::post('/berg_facilites_store', 'Adminpanel@berg_facilites_store');
