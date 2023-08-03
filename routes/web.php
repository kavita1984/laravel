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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/all/user', 'HomeController@allUser')->name('allUser');
Route::get('/all/categories', 'HomeController@allCategories')->name('allCategories');

Route::get('/manage/categories', 'HomeController@manageCategories')->name('manageCategories');
Route::get('/add/categories', 'HomeController@addCategory')->name('addCategory');
Route::get('/edit/categories/{id}', 'HomeController@addCategory')->name('editCategory');
Route::post('/add/categories', 'HomeController@addCategory')->name('addCategory');
Route::get('/delete/categories/{id}', 'HomeController@deleteCategory')->name('deleteCategory');

Route::get('/manage/sub/categories', 'HomeController@manageSubCategories')->name('manageSubCategories');
Route::get('/add/sub/categories', 'HomeController@addSubCategory')->name('addSubCategory');
Route::get('/edit/sub/categories/{id}', 'HomeController@addSubCategory')->name('editSubCategory');
Route::post('/add/sub/categories', 'HomeController@addSubCategory')->name('addSubCategory');

Route::get('/delete/sub/categories/{id}', 'HomeController@deleteSubCategory')->name('deleteSubCategory');