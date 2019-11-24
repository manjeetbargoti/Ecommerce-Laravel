<?php

//#################################################################################//
//           ###########            Backend Routes           ###########           //
//#################################################################################//

Auth::routes();

// Super Sadmin Routes
Route::group(['middleware'=>'role:Super Admin','auth'],function(){
    Route::resource('admin/user/permission', 'Admin\\PermissionController');
    Route::resource('admin/user/role', 'Admin\\RoleController');
    Route::resource('admin/user', 'Admin\\UserController');

    // Product Management
    Route::resource('admin/product', 'Admin\\ProductsController');
    Route::resource('admin/product-category', 'Admin\\ProductCategoryController');
    // Route::match(['get', 'post'], 'admin/product/create', 'Admin\\ProductsController@checkSlug');

    // Website System Setting Options Route
    Route::get('admin/system/options', 'SystemController@getOptions');
    Route::post('admin/system/options','SystemController@postOption');
    Route::get('/admin/system/robots.txt','SystemController@getRobot');
    Route::post('/admin/system/robots.txt','SystemController@postRobot');
    Route::get('/admin/system/htaccess','SystemController@getHtaccess');
    Route::post('/admin/system/htaccess','SystemController@postHtaccess');
    Route::get('/admin/system/custom-code','SystemController@getCode');
    Route::post('/admin/system/custom-code','SystemController@postCodes');
    Route::get('/admin/system/contact-info', 'SystemController@getContactInfo');
    Route::post('/admin/system/contact-info','SystemController@postContactInfo');
});

// Routes for all Autorized Users
Route::group(['middleware'=>'auth'],function(){
    Route::get('/admin/dashboard', 'AdminController@dashboard')->name('dashboard');
});




//#################################################################################//
//           ###########            Frontend Routes           ##########           //
//#################################################################################//

Route::match(['get','post'], '/', 'HomeController@index')->name('homepage');
Route::match(['get','post'], '/user/register', 'Admin\UserController@registerUser');