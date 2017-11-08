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

Route::get('/',['as'=>'home','uses'=>'Dashboard\MainDashboardController@home']);
// Password Reset Routes...
Route::post('password/email', ['as' => 'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
Route::get('password/reset', ['as' => 'password.request', 'uses' => 'Auth\ResetPasswordController@showLinkRequestForm']);
Route::post('password/reset', ['as' => '', 'uses' => 'Auth\ResetPasswordController@reset']);
Route::get('password/reset/{token}', ['as' => 'password.reset', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
// Guest Routes
Route::group(['namespace' => 'Auth','middleware' => ['guest']],function (){
    Route::get('login',['as'=>'login','uses'=>'AuthController@login']);
    Route::post('login',['as'=>'web.do.login','uses'=>'AuthController@doLogin']);
    Route::get('register',['as'=>'web.register','uses'=>'AuthController@register']);
    Route::post('register',['as'=>'web.do.register','uses'=>'AuthController@doRegister']);
});
// Auth Routes
Route::group(['middleware' => ['auth']],function (){
    Route::get('logout',['as' => 'logout','uses' => 'Auth\AuthController@logout']);
    Route::get('dashboard',['as'=>'dashboard.main','uses'=>'Dashboard\MainDashboardController@dashboard']);
    Route::get('password-reset',['as' => 'profile.password.reset','uses' => 'Auth\AuthController@reset']);
    Route::post('password-reset',['as' => 'password.doReset','uses' => 'Auth\AuthController@doReset']);
    Route::get('profile',['as' => 'profile','uses' => 'User\UserController@profile']);
    Route::post('profile',['as' => 'profile.update','uses' => 'User\UserController@profileUpdate']);
    Route::get('profile-pic-change',['as' => 'profile.pic.change','uses' => 'User\UserController@profilePicChange']);
    Route::post('profile-pic-change',['as' => 'profile.pic.update','uses' => 'User\UserController@doProfilePicChange']);
    // laravel logs viewer
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

});
