<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function(){
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/userslist', 'HomeController@users')->name('home.userslist');
Route::get('/home/userslist/otherprofileview/{id}', 'HomeController@profileview')->name('home.userslist.profileview');

//Users
Route::get('/admin/dashboard/users', 'UserController@users')->name('admin.dashboard.users');
Route::get('/admin/dashboard/users/register', 'UserController@register')->name('admin.dashboard.user.register');
Route::post('/admin/dashboard/users/register/create', 'UserController@create')->name('admin.dashboard.user.register.create');
Route::delete('/admin/dashboard/user/delete/{user}', 'UserController@delete')->name('admin.dashboard.user.delete');
Route::get('/admin/dashboard/users/edit/{user}', 'UserController@edit')->name('admin.dashboard.user.edit');
Route::patch('/admin/dashboard/users/edit/update/{user}', 'UserController@update')->name('admin.dashboard.user.update');

//Users Profile
Route::get('/admin/dashboard/profile', 'AdminController@profile')->name('admin.dashboard.profile');
Route::get('/admin/dashboard/users/edit/current/{user}', 'UserController@edituser')->name('admin.dashboard.user.edit.user');
Route::patch('/admin/dashboard/users/edit/update/current/{user}', 'UserController@updateuser')->name('admin.dashboard.user.update.current');

//Admin categories
Route::get('/admin/dashboard/categories', 'AdminController@index')->name('admin.dashboard.categories');
Route::get('/admin/dashboard/categories/category', 'AdminController@category')->name('admin.dashboard.categories.category');
Route::post('/admin/dashboard/categories/category/create', 'AdminController@store')->name('admin.dashboard.categories.category.create');
Route::get('/admin/dashboard/categories/category/lesson/{category}', 'AdminController@view')->name('admin.dashboard.categories.view');

//categories delete and edit
Route::delete('/admin/dashboard/categories/delete/{category}', 'AdminController@delete')->name('admin.dashboard.categories.delete');
Route::get('/admin/dashboard/categories/edit/{category}', 'AdminController@edit')->name('admin.dashboard.categories.edit');
Route::patch('/admin/dashboard/categories/update/{category}', 'AdminController@update')->name('admin.dashboard.categories.update');

//Question
Route::get('/admin/dashboard/categories/category/lesson/question/{category}', 'AdminController@question')->name('admin.dashboard.categories.question');

//Follow
Route::get('/home/userslist/follow/{followed_id}', 'FollowController@follow')->name('home.userslist.follow');
Route::get('/home/userslist/unfollow/{unfollowed_id}', 'FollowController@unfollow')->name('home.userslist.unfollow');