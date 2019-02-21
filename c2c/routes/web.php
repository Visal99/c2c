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

Route::get('/','FrontController@index');
Route::get('/register','FrontController@register');
Route::post('/register','FrontController@register_store');
Route::get('/member/login','FrontController@member_login_view')->name('member.login');
Route::post('/member/login','FrontController@member_login_check')->name('member.login.check');
Route::get('/member/logout','FrontController@member_logout')->name('member.logout');

Route::get('/post','PostController@index')->name('post.index');
Route::get('/getsubcat/{parent_id}','PostController@get_sub_category')->name('category.getsub');


Route::post('/post/store','PostController@store');

// Exception Route
// when we submit , we need to access ...!
Route::get('/system','admin\LoginController@Index')->name('login');
Route::post('/system/login','admin\LoginController@login');

Route::group(['prefix' => 'system' , 'middleware' => 'check.admin'],function (){

   
    Route::get('/logout','admin\LoginController@logout');
  
    Route::get('/dashboard','admin\DashboardController@Index');
    Route::get('/users','admin\UserController@Index');
    Route::get('/users/create','admin\UserController@Create');
    Route::post('/users','admin\UserController@store');

    Route::get('/products','admin\ProductController@Index');

    Route::get('/category','admin\CategoryController@index');
    Route::get('/category/sub/{id}','admin\CategoryController@index');
    Route::get('/category/create/{id?}','admin\CategoryController@create');
    Route::post('/category','admin\CategoryController@store');

    Route::get('/vendor','admin\VendorController@index');
    

    Route::get('/category/order/{id}/{order}/{mode}','admin\CategoryController@order');
    // Route::get('/category/order/','admin\CategoryController@order');
});