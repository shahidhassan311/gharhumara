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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/home', function(){
    return redirect('/dashboard');
});

Route::get('/WIN-PSL-FINAL-TICKET', 'MarketingController@marketing_p');
Route::post('/psl_store', 'MarketingController@marketing_store');

Route::get('/notification_ajax', 'Adminpanel@notification_ajax');


Route::post('/website_form', 'Adminpanel@website_form');
Route::get('/', 'Adminpanel@website');
Route::get('/sale', 'Adminpanel@website_sale');
Route::get('/sale_info/{id}', 'Adminpanel@website_sale_details');

Route::get('/rent', 'Adminpanel@website_rent');
Route::get('/rent_info/{id}', 'Adminpanel@website_rent_details');

Route::get('/purchase', 'Adminpanel@website_purchase');
Route::get('/purchase_info/{id}', 'Adminpanel@website_purchase_details');

Route::get('/property_info/{id}', 'Adminpanel@website_property_info');
Route::get('/single', 'Adminpanel@website_single');
Route::get('/contact', 'Adminpanel@website_contact');

Route::post('/search_filter', 'Adminpanel@search_filter');

Route::get('/realestate_login', 'Adminpanel@index');


//property message
Route::post('/purchase_property_message', 'Adminpanel@website_purchase_property_message');
Route::post('/sales_property_message', 'Adminpanel@website_sales_property_message');
Route::post('/rent_property_message', 'Adminpanel@website_rent_property_message');
Route::post('/purchase_info_message', 'Adminpanel@website_purchase_info_message');

Route::group(['middleware' => ['auth']], function()
{
    //website
    Route::get('/rent_property_message_info', 'Adminpanel@website_rent_message_info');
    Route::get('/rent_message_delete/{id}', 'Adminpanel@website_rent_message_delete');


    Route::get('/sales_property_message_info', 'Adminpanel@website_sale_message_info');
    Route::get('/sale_message_delete/{id}', 'Adminpanel@website_sale_message_delete');


    Route::get('/purchase_property_message_info', 'Adminpanel@website_purchase_message_info');
    Route::get('/purchase_message_delete/{id}', 'Adminpanel@website_purchase_message_delete');

    Route::get('/latest_property', 'Adminpanel@website_latest');
    Route::get('/add_latest', 'Adminpanel@website_add_latest');
    Route::get('/latest_property_delete/{id}', 'Adminpanel@website_latest_delete');

    Route::get('/popular_property', 'Adminpanel@website_popular');
    Route::get('/add_popular', 'Adminpanel@website_add_popular');
    Route::get('/popular_property_delete/{id}', 'Adminpanel@website_popular_delete');

    Route::get('/bahria_property', 'Adminpanel@website_bahria');
    Route::get('/add_bahria', 'Adminpanel@website_add_bahria');
    Route::post('/add_bahria_store', 'Adminpanel@website_add_bahria_store');
    Route::get('/website_bahria_null/{id}/{string}', 'Adminpanel@website_bahria_null');
    Route::get('/bahria_update/{id}', 'Adminpanel@website_bahria_update');
    Route::post('/bahria_update_store/{id}', 'Adminpanel@website_bahria_update_store');
    Route::get('/property_show/{id}', 'Adminpanel@website_bahria_property_show');
    Route::get('/property_delete/{id}', 'Adminpanel@website_bahria_delete');
    Route::get('/website_bahria_images_delete/{id}/{rid}', 'Adminpanel@website_bahria_images_delete');


    Route::get('/dashboard', 'Adminpanel@dashboard');
    //users
    Route::get('/users_details', 'Adminpanel@users_details');
    Route::get('/user_profile_detail/{id}', 'Adminpanel@user_profile_detail');
    Route::get('/user_profile_sale_full_details/{id}', 'Adminpanel@user_profile_sale_full_details');
    Route::get('/user_profile_rent_full_details/{id}', 'Adminpanel@user_profile_rent_full_details');
    Route::get('/user_profile_purchase_full_details/{id}', 'Adminpanel@user_profile_purchase_full_details');
    Route::get('/user_edit/{id}', 'Adminpanel@user_edit');
    Route::post('/user_edit_store/{id}', 'Adminpanel@user_edit_store');
    Route::get('/user_delete/{id}', 'Adminpanel@user_delete');
    //excel file download
    Route::get('users_downloadExcel/{type}', 'Adminpanel@users_downloadExcel');


    //Agent
    Route::get('/agent_details', 'Adminpanel@agent_details');
    Route::get('/agent_add', 'Adminpanel@agent_add');
    Route::post('/agent_add_store', 'Adminpanel@agent_add_store');
    Route::get('/agent_edit/{id}', 'Adminpanel@agent_edit');
    Route::post('/agent_edit_store/{id}', 'Adminpanel@agent_edit_store');
    Route::get('/agent_delete/{id}', 'Adminpanel@agent_delete');
    //excel file download
    Route::get('agent_downloadExcel/{type}', 'Adminpanel@agent_downloadExcel');

    //employess
    Route::get('/employee_details', 'Adminpanel@employee_details');
    Route::get('/employee_add_get', 'Adminpanel@employee_add_get');
    Route::post('/employee_store', 'Adminpanel@employee_store');
    Route::get('/employee_edit/{id}', 'Adminpanel@employee_edit');
    Route::post('/employee_edit_store/{id}', 'Adminpanel@employee_edit_store');
    Route::get('/employee_delete/{id}', 'Adminpanel@employee_delete');

    //services_details
    Route::get('/services_details', 'Adminpanel@services_details');
    Route::get('/services_add_get', 'Adminpanel@services_add_get');
    Route::post('/services_store', 'Adminpanel@services_store');
    Route::get('/services_edit/{id}', 'Adminpanel@services_edit');
    Route::post('/services_edit_store/{id}', 'Adminpanel@services_edit_store');
    Route::get('/services_delete/{id}', 'Adminpanel@services_delete');
    Route::get('/services_delete_null/{id}/{string}', 'Adminpanel@services_delete_null');
    Route::get('/services_status/{id}/{string}', 'Adminpanel@services_status');
    Route::get('/services_message', 'Adminpanel@services_message');
    Route::get('/services_message_delete/{id}', 'Adminpanel@services_message_delete');

    //sale
    Route::get('/user_sales_req', 'Adminpanel@add_user_sales_request');
    Route::post('/user_sales_req_store', 'Adminpanel@user_sales_req_store');
    Route::get('/user_sales_details', 'Adminpanel@user_sales_details');
    Route::get('/admin_sale_edit_get/{id}', 'Adminpanel@admin_sale_edit_get');
    Route::post('/admin_sale_store/{id}', 'Adminpanel@admin_sale_store');
    Route::get('/admin_sale_edit_ajax', 'Adminpanel@admin_sale_edit_ajax');
    Route::get('/admin_sale_display_images_ajax', 'Adminpanel@admin_sale_display_images_ajax');
    Route::get('/admin_sale_delete/{id}', 'Adminpanel@admin_sale_delete');
    Route::get('/admin_sales_details_show/{id}', 'Adminpanel@admin_sales_details_show');
    Route::get('/find_sale_users_profile/{id}', 'Adminpanel@admin_sale_find_users_profile');
    Route::get('/admin_sale_images_delete/{id}/{string}', 'Adminpanel@admin_sale_images_delete');
    //user send details
    Route::get('/user_sale_request', 'Adminpanel@user_sale_request');
    Route::get('/user_sale_request_edit/{id}', 'Adminpanel@user_sale_request_edit');
    Route::post('/user_sale_request_store/{id}', 'Adminpanel@user_sale_request_store');
    Route::get('/user_sales_show/{id}', 'Adminpanel@user_sales_show');
    Route::get('/admin_sale_status/{id}/{string}', 'Adminpanel@admin_sale_status');
    Route::get('/user_sale_delete/{id}', 'Adminpanel@user_sale_delete');

    //rent
    Route::get('/user_rent_req', 'Adminpanel@add_user_rent_request');
    Route::post('/user_rent_req_store', 'Adminpanel@user_rent_req_store');
    Route::get('/user_rent_details', 'Adminpanel@user_rent_details');
    Route::post('/admin_rent_store/{id}', 'Adminpanel@admin_rent_store');
    Route::get('/admin_rent_edit_get/{id}', 'Adminpanel@admin_rent_edit_get');
    Route::get('/admin_rent_display_images_ajax', 'Adminpanel@admin_rent_display_images_ajax');
    Route::get('/admin_rent_edit_ajax', 'Adminpanel@admin_rent_edit_ajax');
    Route::get('/admin_rent_delete/{id}', 'Adminpanel@admin_rent_delete');
    Route::get('/admin_rent_details_show/{id}', 'Adminpanel@admin_rent_details_show');
    Route::get('/find_rent_users_profile/{id}', 'Adminpanel@admin_rent_find_users_profile');
    Route::get('/admin_rent_images_delete/{id}/{string}', 'Adminpanel@admin_rent_images_delete');
    //user send details
    Route::get('/user_rent_request', 'Adminpanel@user_rent_request');
    Route::get('/user_rent_request_edit/{id}', 'Adminpanel@user_rent_request_edit');
    Route::post('/user_rent_request_store/{id}', 'Adminpanel@user_rent_request_store');
    Route::get('/user_rent_show/{id}', 'Adminpanel@user_rent_show');
    Route::get('/admin_rent_status/{id}/{string}', 'Adminpanel@admin_rent_status');
    Route::get('/user_rent_delete/{id}', 'Adminpanel@user_rent_delete');

    //purchase
    Route::get('/user_purchase_req', 'Adminpanel@add_user_purchase_request');
    Route::post('/user_purchase_req_store', 'Adminpanel@user_purchase_req_store');
    Route::get('/user_purchase_details', 'Adminpanel@user_purchase_details');
    Route::post('/admin_purchase_store/{id}', 'Adminpanel@admin_purchase_store');
    Route::get('/admin_purchase_edit_get/{id}', 'Adminpanel@admin_purchase_edit_get');
    Route::get('/admin_purchase_display_images_ajax', 'Adminpanel@admin_purchase_display_images_ajax');
    Route::get('/admin_purchase_edit_ajax', 'Adminpanel@admin_purchase_edit_ajax');
    Route::get('/admin_purchase_delete/{id}', 'Adminpanel@admin_purchase_delete');
    Route::get('/admin_purchase_details_show/{id}', 'Adminpanel@admin_purchase_details_show');
    Route::get('/find_purchase_users_profile/{id}', 'Adminpanel@admin_purchase_find_users_profile');
    Route::get('/admin_purchase_images_delete/{id}/{string}', 'Adminpanel@admin_purchase_images_delete');
    //user send details
    Route::get('/user_purchase_request', 'Adminpanel@user_purchase_request');
    Route::get('/user_purchase_request_edit/{id}', 'Adminpanel@user_purchase_request_edit');
    Route::post('/user_purchase_request_store/{id}', 'Adminpanel@user_purchase_request_store');
    Route::get('/user_purchase_show/{id}', 'Adminpanel@user_purchase_show');
    Route::get('/admin_purchase_status/{id}/{string}', 'Adminpanel@admin_purchase_status');
    Route::get('/user_purchase_delete/{id}', 'Adminpanel@user_purchase_delete');


//    *******************************subadmin********************************
    Route::get('/sales_data_sa', 'Adminpanel@subadmin_sales_data');
    Route::get('/add_sales_sa', 'Adminpanel@subadmin_add_sales');
    Route::get('/sale_all_data_sa/{id}', 'Adminpanel@subadmin_sale_all_data');
    Route::post('/subadmin_add_sales_store', 'Adminpanel@subadmin_add_sales_store');

    Route::get('/purchase_data_sa', 'Adminpanel@subadmin_purchase_data');
    Route::get('/add_purchase_sa', 'Adminpanel@subadmin_add_purchase');
    Route::get('/purchase_all_data_sa/{id}', 'Adminpanel@subadmin_purchase_all_data');
    Route::post('/subadmin_add_purchase_store', 'Adminpanel@subadmin_add_purchase_store');


    Route::get('/rent_data_sa', 'Adminpanel@subadmin_rent_data');
    Route::get('/add_rent_sa', 'Adminpanel@subadmin_add_rent');
    Route::get('/rent_all_data_sa/{id}', 'Adminpanel@subadmin_rent_all_data');
    Route::post('/subadmin_add_rent_store', 'Adminpanel@subadmin_add_rent_store');

});
