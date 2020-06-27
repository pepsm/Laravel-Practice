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

Auth::routes();

Route::get('/', 'WelcomeController@index');

Route::get('/items', 'ItemsController@index');
Route::resource('items', 'ItemsController');

Route::get('/about', 'AboutController@index');
Route::get('/dashboard', 'DashboardController@index');

// Defining a resourceful route
Route::resource('account', 'AccountsController');

Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');

    Route::post('/search-user', 'AdminSearchController@searchUser');
    Route::post('/search-item', 'AdminSearchController@searchItem');

    // Password reset routes
    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

});

Route::get('/list-users', 'AdminController@users');
Route::delete('/list-users/{id}', 'AdminController@destroyUser');

Route::get('/list-items', 'AdminController@items');
Route::delete('/list-items/{id}', 'AdminController@destroyItem');

Route::get('item/like/{id}', ['as' => 'item.like', 'uses' => 'LikeController@likePost']);
Route::resource('comments', 'CommentController');