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

Blade::setContentTags('<%', '%>');
Blade::setEscapedContentTags('<%%', '%%>');

Route::get('/', function () {
    return view('index');
});

Route::any('api/v1/login', 'api\v1\LoginController@index');
Route::any('api/v1/logout', 'api\v1\LoginController@logout');
Route::any('api/v1/isLogged', 'api\v1\LoginController@isLogged');


Route::any('api/v1/register', 'api\v1\RegisterController@index');


Route::any('api/v1/Admins', 'api\v1\AdminController@Admins');
Route::any('api/v1/admin/new', 'api\v1\AdminController@insert');


Route::any('api/v1/user/new', 'api\v1\UsersController@insert');
Route::any('api/v1/Users', 'api\v1\UsersController@Users');
Route::any('api/v1/user/calif', 'api\v1\UsersController@calif');
Route::any('api/v1/user/edit', 'api\v1\UsersController@edit');
Route::any('api/v1/user/test', 'api\v1\UsersController@user_test');

Route::any('api/v1/change_pass', 'api\v1\UsersController@change_pass');


Route::any('api/v1/UsersCategories', 'api\v1\CategoriesController@usersCategories');
Route::any('api/v1/categories', 'api\v1\CategoriesController@categories');
Route::any('api/v1/categories/new', 'api\v1\CategoriesController@new_category');
Route::any('api/v1/mod_status', 'api\v1\CategoriesController@mod_status');
Route::any('api/v1/answer', 'api\v1\CategoriesController@answer');
Route::any('api/v1/new_test', 'api\v1\CategoriesController@new_test');



Route::any('api/v1/get_images', 'api\v1\ImagesController@get_images');
Route::any('api/v1/getImagesInCategory', 'api\v1\ImagesController@getImagesInCategory');
Route::any('api/v1/save_images', 'api\v1\ImagesController@save_images');
Route::any('api/v1/isNot', 'api\v1\ImagesController@isNot');
Route::any('api/v1/images', 'api\v1\ImagesController@index');


//Route::any('api/v1/new_category', 'api\v1\ImagesController@get_images');
