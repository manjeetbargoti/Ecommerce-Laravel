<?php

//#################################################################################//
//           ###########            Backend Routes           ###########           //
//#################################################################################//

Auth::routes();

// Super Sadmin Routes
Route::group(['middleware' => 'role:Super Admin', 'auth'], function () {

    Route::get('/admin/dashboard', 'AdminController@dashboard')->name('dashboard');

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

    // Contact Query Management
    Route::resource('admin/support/contact-query', 'ContactQueryController');

    // Product Query Management
    Route::resource('admin/support/product-query', 'Admin\\ProductQueryController');
    Route::resource('admin/support/supplier-query', 'SupplierQueryController');
    // Subscriber Management
    Route::resource('admin/support/subscribers', 'SubscriberController');


    // Send Email for Product Query
    Route::match(['get','post'], '/admin/send-email/{id}', 'Admin\\ProductQueryController@sendEmail');

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

Route::group(['middleware' => 'role:Super Admin|Seller', 'auth'], function () {

    // Product Management
    Route::resource('admin/product', 'Admin\\ProductsController');
});

Route::group(['middleware' => 'role:Buyer|Super Admin|Seller', 'auth'], function () {

    // Product Query Management
    Route::resource('admin/support/product-query', 'Admin\\ProductQueryController');
});

Route::group(['middleware' => 'role:Supplier|Super Admin', 'auth'], function () {

    // Supplier Query Management
    Route::resource('admin/support/supplier-query', 'SupplierQueryController');
});

// Routes for all Autorized Users
Route::group(['middleware' => 'auth'], function () {

    // Profile Access
    Route::match(['get','post'], '/admin/profile', 'Admin\\UserController@profile');
    Route::match(['get','post'], '/admin/profile/{id}/edit', 'Admin\\UserController@profileEdit');
    Route::match(['get','post'], '/admin/profile/{id}/change-password', 'Admin\\UserController@changePassword');

    // Email and Username velidation
    Route::match(['get', 'post'], '/checkemail', 'AdminController@checkEmail');
    Route::match(['get', 'post'], '/checkusername', 'AdminController@checkUsername');

    // Edit Supplier Business info
    Route::match(['get','post'], '/supplier-info/{id}/edit', 'Admin\\UserController@editBusinessInfo');

    // User Address Management
    Route::resource('/admin/user/address', 'UserAddressController');
});

//#################################################################################//
//           ###########            Frontend Routes           ##########           //
//#################################################################################//

Route::match(['get', 'post'], '/', 'HomeController@index')->name('homepage');
Route::match(['get', 'post'], '/user/register', 'Admin\UserController@registerUser');

// Product & Product Category Page
Route::match(['get', 'post'], '/product/categories', 'Admin\ProductCategoryController@productCategory');
Route::match(['get', 'post'], '/category/{category}/products', 'Admin\ProductsController@categoryProduct');
Route::match(['get', 'post'], '/category/{category}/product/{id}', 'Admin\ProductsController@singleProduct');

// VVV Luxury Product URL's
Route::match(['get', 'post'], '/vvv-lux/products', 'Admin\ProductsController@vvvProduct');

// Supllier & Supplier Category Page
Route::match(['get', 'post'], '/supplier/categories', 'SupplierController@supplierCategory');
Route::match(['get', 'post'], '/category/{category}/suppliers/', 'SupplierController@categorySupplier');

// Email Product url 
Route::match(['get', 'post'], '/product/{id}/{token}', 'Admin\ProductsController@singleEmailProduct');

// CMS Page URL
Route::match(['get','post'], '/{url}', 'Admin\\PagesController@singleCms');

// Verify Email
Route::match(['get','post'], '/verify/token={token}/code={code}', 'AdminController@verifyEmail');

// Subscribe form url
Route::match(['get','post'], '/subscribe/form/', 'SubscriberController@subscribeNow');
