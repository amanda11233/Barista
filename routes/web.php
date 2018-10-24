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

Route::get('/','Controller@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('admin')->group(function(){

    Route::get('/login','Admins\LoginController@loginForm')->name('adminloginform');
    Route::post('/login','Admins\LoginController@login')->name('adminlogin');
    Route::get('/adminlogout','Admins\LoginController@logout')->name('adminlogout');
    Route::get('/','Admins\AdminController@dashboard')->name('admindashboard');
Route::resource('/users','Users\UsersController');
Route::get('/teachers','Users\UsersController@viewTeachers')->name('users.teachers');
Route::get('/teahdelete/{id}','Users\UsersController@deleteTeacher')->name('teacher.delete');
Route::get('/classdelete/{id}','Classes\ClassesController@deleteClass')->name('class.delete');
Route::resource('/classes','Classes\ClassesController');
});

Route::get('/userlogout', 'Auth\LoginController@logoutUser')->name('userlogout');
Route::get('/classes', 'Controller@classes')->name('classes');
Route::get('/view-classes/{id}', 'Controller@viewClasses')->name('view.classes');