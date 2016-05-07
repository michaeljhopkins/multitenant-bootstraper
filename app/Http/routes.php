<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');


Route::resource('clients', 'ClientController');
Route::resource('orders', 'OrderController');
Route::resource('permissions', 'PermissionController');
Route::resource('products', 'ProductController');
Route::resource('roles', 'RoleController');
Route::resource('tenants', 'TenantController');
Route::resource('users', 'UserController');