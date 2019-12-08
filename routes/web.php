<?php

//#################################################################################//
//           ###########            Backend Routes           ###########           //
//#################################################################################//

Auth::routes();

// Super Sadmin Routes
Route::group(['middleware' => 'role:Super Admin', 'auth'], function () {
    Route::resource('admin/user/permission', 'Admin\\PermissionController');
    Route::resource('admin/user/role', 'Admin\\RoleController');
    Route::resource('admin/user', 'Admin\\UserController');

    // Product Management
    Route::resource('admin/product', 'Admin\\ProductsController');
    Route::resource('admin/product-category', 'Admin\\ProductCategoryController');
    Route::resource('admin/product-vendor', 'Admin\\ProductVendorController');
    // Route::match(['get', 'post'], 'admin/product/create', 'Admin\\ProductsController@checkSlug');

    // Supplier Management
    Route::resource('admin/supplier', 'SupplierController');
    Route::resource('admin/supplier-category', 'Admin\\SupplierCategoryController');

    // Page Management
    Route::resource('admin/pages', 'Admin\\PagesController');

    // Product Query Management
    Route::resource('admin/support/product-query', 'Admin\\ProductQueryController');

    // Website System Setting Options Route
    Route::get('admin/system/options', 'SystemController@getOptions');
    Route::post('admin/system/options', 'SystemController@postOption');
    Route::get('/admin/system/robots.txt', 'SystemController@getRobot');
    Route::post('/admin/system/robots.txt', 'SystemController@postRobot');
    Route::get('/admin/system/htaccess', 'SystemController@getHtaccess');
    Route::post('/admin/system/htaccess', 'SystemController@postHtaccess');
    Route::get('/admin/system/custom-code', 'SystemController@getCode');
    Route::post('/admin/system/custom-code', 'SystemController@postCodes');
    Route::get('/admin/system/contact-info', 'SystemController@getContactInfo');
    Route::post('/admin/system/contact-info', 'SystemController@postContactInfo');
});

// Routes for all Autorized Users
Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin/dashboard', 'AdminController@dashboard')->name('dashboard');

    // Profile Access
    Route::match(['get','post'], '/admin/profile', 'Admin\\UserController@profile');
    Route::match(['get','post'], '/admin/profile/{id}/edit', 'Admin\\UserController@profileEdit');

    // Email and Username velidation
    Route::match(['get', 'post'], '/checkemail', 'AdminController@checkEmail');
    Route::match(['get', 'post'], '/checkusername', 'AdminController@checkUsername');
});

//#################################################################################//
//           ###########            Frontend Routes           ##########           //
//#################################################################################//

Route::match(['get', 'post'], '/', 'HomeController@index')->name('homepage');
Route::match(['get', 'post'], '/user/register', 'Admin\UserController@registerUser');

// Product Category Page
Route::match(['get', 'post'], '/product/categories', 'Admin\ProductCategoryController@productCategory');

