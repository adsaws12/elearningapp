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
Route::get('/profile', 'AdminController@profile')->name('profile');

//Admin categories
Route::get('/admin/dashboard/categories', 'AdminController@index')->name('admin.dashboard.categories');
Route::get('/admin/dashboard/categories/category', 'AdminController@category')->name('admin.dashboard.categories.category');
Route::post('/admin/dashboard/categories/category/create', 'AdminController@store')->name('admin.dashboard.categories.category.create');
Route::get('/admin/dashboard/categories/category/{category}', 'AdminController@view')->name('admin.dashboard.categories.view');

//categories delete and edit
Route::delete('/admin/dashboard/categories/delete/{category}', 'AdminController@delete')->name('admin.dashboard.categories.delete');
Route::get('/admin/dashboard/categories/edit/{category}', 'AdminController@edit')->name('admin.dashboard.categories.edit');
Route::patch('/admin/dashboard/categories/update/{category}', 'AdminController@update')->name('admin.dashboard.categories.update');

//Follow
Route::get('/home/userslist/follow/{followed_id}', 'FollowController@follow')->name('home.userslist.follow');
Route::get('/home/userslist/unfollow/{unfollowed_id}', 'FollowController@unfollow')->name('home.userslist.unfollow');

//Quiz
Route::get('/admin/dashboard/categories/category/question/{category}', 'QuizController@question')->name('admin.dashboard.categories.question');
Route::post('/admin/dashboard/categories/category/question/{category}/answer', 'QuizController@answer');
Route::get('/admin/dashboard/categories/category/question/{category}/edit/{question}', 'QuizController@editquestion');
Route::patch('/admin/dashboard/categories/category/question/{category}/edit/{question}/update/', 'QuizController@updatequestion');
Route::delete('/admin/dashboard/categories/category/question/{category}/delete/{question}', 'QuizController@deletequestion');


//User Categories
Route::get('/categories', 'TakeQuizController@index');
Route::post('/categories/lesson', 'TakeQuizController@store')->name('lesson');
Route::get('/categories/lessons/{lesson}', 'TakeQuizController@lessonview')->name('lessons');