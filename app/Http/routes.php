<?php

/*
  |--------------------------------------------------------------------------
  | Routes File
  |--------------------------------------------------------------------------
  |
  | Here is where you will register all of the routes in an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */




/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | This route group applies the "web" middleware group to every route
  | it contains. The "web" middleware group is defined in your HTTP
  | kernel and includes session state, CSRF protection, and more.
  |
 */

Route::group(['middleware' => ['web']], function () {

    //Route::get('test', 'FirstController@testMethod');
    Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');
    Route::resource('posts', 'PostController');
    Route::get('/about', 'PagesController@getAbout');
    Route::get('/contact', 'PagesController@getContact');
    //Route::get('/', 'PagesController@getIndex');
    Route::get('auth/login', 'Auth\AuthController@getLogin');
    Route::Post('auth/login', 'Auth\AuthController@postLogin');
    Route::get('auth/logout', 'Auth\AuthController@getLogout');
    Route::get('admin/dashboard', 'Admin\AdminController@dashboard');
    Route::get('admin', 'Admin\AdminController@dashboard');
    Route::get('/', 'Admin\AdminController@dashboard');

    Route::resource('admin/products', 'Admin\ProductsController');
    Route::get('admin/products/uploadImages/{productId}', 'Admin\ProductsController@uploadImagesGet');
    Route::post('admin/products/uploadImages', 'Admin\ProductsController@uploadImagesPost');
    Route::get('admin/products/productImages/{product}', 'Admin\ProductsController@productImages');
    Route::get('admin/products/{product}/delete', 'Admin\ProductsController@delete');
    Route::get('admin/products/{image}/{product}/deleteImage', 'Admin\ProductsController@deleteProductImage');
    Route::get('admin/products/{image}/{product}/makePrimaryImage', 'Admin\ProductsController@makePrimaryImage');
    Route::get('admin/products/{productId}/attributes', 'Admin\ProductsController@productAttributesGet');
    Route::post('admin/products/{productId}/attributes', 'Admin\ProductsController@productAttributesPost');
    Route::get('admin/products/deleteAttributes/{id}/{productId}', 'Admin\ProductsController@deleteAttributes');
    Route::get('admin/products/primaryImage/{productId}', 'Admin\ProductsController@getPrimaryImage');
    Route::post('admin/products/bulk_delete', 'Admin\ProductsController@bulk_delete');

    Route::resource('admin/categories', 'Admin\CategoriesController');
    Route::get('admin/categories/{category}/delete', 'Admin\CategoriesController@delete');
    Route::post('admin/categories/imageUpload', 'Admin\CategoriesController@imageUpload');
    Route::post('admin/categories/imageChange/{cat_id}', 'Admin\CategoriesController@imageChange');
    
    Route::resource('admin/orders', 'Admin\OrdersController');
    Route::get('admin/orders/{id}/delete', 'Admin\OrdersController@delete');


    Route::get('admin/registerUser', 'Admin\AdminController@registerUserGet');
    Route::post('auth/register', 'Auth\AuthController@postRegister');
    Route::get('admin/myPrefrences', 'Admin\AdminController@myPrefrences');
    Route::post('admin/myPrefrences', 'Admin\AdminController@myPrefrencesPost');
    Route::resource('admin/user', 'Admin\AdminController');
    Route::get('admin/user/{user}/delete', 'Admin\AdminController@delete');
    Route::post('admin/changePassword', 'Admin\AdminController@changePassword');


    Route::group(['prefix' => 'admin/'], function() {
        Route::get('tags/sort_tags', 'Admin\TagsController@sort_tags');
        Route::resource('tags', 'Admin\TagsController');
        Route::get('tags/{id}/delete', 'Admin\TagsController@delete');
        Route::post('tags/bulk_delete', 'Admin\TagsController@bulk_delete');

    });
});



Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});
