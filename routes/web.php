<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/auth/login','Auth\LoginController@login');
Route::get('/auth/register','Auth\RegisterController@regidter');
Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function()
{
	
	Route::get('/admin/dashboard','Admin\DashBoardController@index')->name('admin.dashboard');	
	Route::get('/admin/user/','admin\user\UserController@index')->name('admin.user');
Route::post('/admin/user/{id}/edit','admin\user\UserController@edit');
Route::patch('/admin/user/{id}','admin\user\UserController@update');
Route::delete('/admin/user/{id}','admin\user\UserController@destroy');

Route::get('/admin/product/','admin\product\ProductController@index')->name('admin.product');
Route::get('/admin/product/create','admin\product\ProductController@create')->name('admin.product.create');
Route::post('/admin/product/','admin\product\ProductController@store');
Route::post('/admin/product/{id}/edit','admin\product\ProductController@edit');
Route::patch('/admin/product/{id}','admin\product\ProductController@update');
Route::delete('/admin/product/{id}','admin\product\ProductController@destroy');

Route::get('/admin/order/','admin\order\OrderController@index')->name('admin.order');
Route::post('/admin/order/{id}/edit','admin\order\OrderController@edit');
Route::post('/order/{id}/show',"admin\order\OrderController@show");
Route::get('/admin/category/','admin\category\CategoryController@index')->name('admin.category');
Route::get('/admin/category/create','admin\category\CategoryController@create')->name('admin.category.create');
Route::post('/admin/category/','admin\category\CategoryController@store');
Route::post('/admin/category/{id}/edit','admin\category\CategoryController@edit');
Route::patch('/admin/category/{id}','admin\category\CategoryController@update');
Route::delete('/admin/category/{id}','admin\category\CategoryController@destroy');

Route::get('/admin/recharge/','admin\recharge\RechargeController@index');
Route::post('/admin/recharge/{id}/edit','admin\recharge\RechargeController@edit');
Route::delete('/admin/recharge/{id}','admin\recharge\RechargeController@destroy');
Route::patch('/admin/profile/{id}','Admin\DashboardController@profile');

});

Route::group(['middleware' => 'App\Http\Middleware\UserMiddleware'], function()
{
	Route::post('/user/read/{id}','HomeController@read');
	Route::post('/order/edit/{id}','HomeController@gave');
	Route::delete('/user/read/{id}/a','HomeController@destroymessage');

	Route::post('/user/{id}/show',"HomeController@show");
	Route::get('/cart','user\cart\CartController@index')->name('user.cart');
	Route::get('/cart/{id}','user\cart\CartController@store');
	Route::post('/cart/{id}','user\cart\CartController@update');
	Route::delete('/cart/{id}','user\cart\CartController@destroy');
	

	Route::get('/older','user\older\OlderController@index')->name('user.older');
	Route::post('/older/check','user\older\OlderController@check');
	Route::get('/older/store','user\older\OlderController@store');
	Route::get('/catelog/{id}', 'HomeController@catelog')->name('catelog');
	Route::get('/user/search', 'HomeController@search')->name('search');
	Route::post('/user/sort', 'HomeController@sort')->name('sort');
	Route::patch('/user/profile/{id}','HomeController@profile');
	Route::get('/user/hoadon/','user\older\OlderController@hoadon');
	Route::get('/dele/{id}','CommentController@destroy');
	Route::post('/edit/{id}','CommentController@edit');
	Route::post('/add/{id}','CommentController@add');
	
});
Route::get('/a','Admin\DashboardController@maxpr');
Route::get('/auth/logout','Auth\LogoutController@logout');