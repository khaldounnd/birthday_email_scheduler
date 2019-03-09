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

use Illuminate\Support\Facades\Route;

Route::get('myErrorLogs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');


/////////////////////////AUTHENTICATION ROUTES///////////////////////////////
Route::group(['namespace' => 'Auth'],function() {
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout')->name('logout');

    // Password Reset Routes...
    Route::get('password/reset', 'ResetPasswordController@showLinkRequestForm')->name('password.reset');
    Route::post('password/email', 'ResetPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/resetForm', 'ResetPasswordController@showResetForm');
    Route::post('password/reset', 'ResetPasswordController@confirmPassword')->name('password.confirm');
});

//////////////////////////FRONTEND ROUTES/////////////////////////////////////

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function () {
    return view('welcome');
});

//////////////////////////BACKEND ROUTES//////////////////////////////////////
Route::prefix('dashboard')->namespace('Back')->group(function () {

    //Dashboard
    Route::get('/', 'DashboardController@index')->name('dashboard');


    Route::resource('users', 'UserController', [ 'only' => [
        'index', 'edit', 'update', 'destroy', 'create', 'store'
        ]]
    );
});
