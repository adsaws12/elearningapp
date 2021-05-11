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

//categories
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