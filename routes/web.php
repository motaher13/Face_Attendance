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
    //login
    Route::get('login',['as'=>'login','uses'=>'AuthController@login']);
    Route::post('login',['as'=>'web.do.login','uses'=>'AuthController@doLogin']);
    Route::get('register',['as'=>'web.register','uses'=>'AuthController@register']);
    Route::post('register',['as'=>'web.do.register','uses'=>'AuthController@doRegister']);


});
// Auth Routes
Route::group(['middleware' => ['auth']],function (){
    Route::get('user/{id}/edit',['as' => 'user.edit', 'uses' => 'User\UserController@edit']);
    Route::put('user/{id}',['as' => 'user.update', 'uses' => 'User\UserController@update']);
    Route::get('user/{id}/show',['as'=>'user.show','uses'=>'User\UserController@show']);
    Route::post('user/store',['as'=>'user.store','uses'=>'User\UserController@store']);
    Route::get('user/{id}/edit',['as'=>'user.edit','uses'=>'User\UserController@edit']);
    Route::delete('user/{id}',['as'=>'user.delete','uses'=>'User\UserController@delete']);
    Route::get('user/create',['as'=>'user.create','uses'=>'User\UserController@create']);
    Route::get('users',['as'=>'user.index','uses'=>'User\UserController@index']);
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
    Route::get('filemanager',['as'=>'filemanager','uses'=>'FileController@index']);

    //Role
    Route::get('chooseRole',['as'=>'chooseRole','uses'=>'RoleController@chooseRole']);
    Route::get('{category}/set',['as'=>'set.role','uses'=>'RoleController@setRole']);

    Route::post('business/set',['as'=>'business.role','uses'=>'RoleController@businessRole']);
    Route::post('employee/set',['as'=>'employee.role','uses'=>'RoleController@employeeRole']);

    //courses
    Route::get('course/basic',['as'=>'course.basic','uses'=>'CourseController@basic']);
    Route::get('course/scheduled',['as'=>'course.scheduled','uses'=>'CourseController@scheduled']);
    Route::get('course/details/{id}',['as'=>'course.details','uses'=>'CourseController@details']);
    Route::get('course/details_modal/{id}',['as'=>'course.details_modal','uses'=>'CourseController@details_modal']);

    //Route::get('{id}/courseEnrol',['as'=>'course.enrol','uses'=>'CourseController@enrol']);
    //Route::get('{courseEnrolled',['as'=>'course.enrolled','uses'=>'CourseController@enrol']);

    //profile
   // Route::get('profile',['as'=>'profile.show','uses'=>'ProfileController@index']);




});

Route::group(['middleware' => ['role:tutor']],function (){
    Route::get('course/create',['as'=>'course.create','uses'=>'CourseController@create']);
    Route::post('course/create',['as'=>'course.create','uses'=>'CourseController@store']);


    Route::get('course/{id}/material_add',['as'=>'material.add','uses'=>'CourseController@addMaterial']);
    Route::post('course/{id}/material_add',['as'=>'material.add','uses'=>'CourseController@doAddMaterial']);

    Route::get('course/category_create',['as'=>'course.category_create','uses'=>'CourseController@categoryCreate']);
    Route::post('course/category_create',['as'=>'course.category_create','uses'=>'CourseController@doCategoryCreate']);

    Route::get('course/created',['as'=>'course.created','uses'=>'CourseController@showCreated']);




});

Route::group(['middleware' => ['role:selfteach|business|employee']],function (){
    Route::get('course/enrolled',['as'=>'course.enrolled','uses'=>'CourseController@showEnrolled']);
    Route::delete('course/enrolled_remove/{id}',['as'=>'course.enrolled_remove','uses'=>'CourseController@removeEnrolled']);
    Route::get('course/enrol/{id}',['as'=>'course.enrol','uses'=>'CourseController@enrol']);



});

Route::group(['middleware'=>['role:admin|tutor']],function (){
    Route::delete('course/delete/{id}',['as'=>'course.delete','uses'=>'CourseController@delete']);
});


Route::group(['middleware'=>['role:business']],function (){
    Route::get('course/enrol_employee/{id}',['as'=>'course.enrol_employee','uses'=>'CourseController@enrolEmployee']);
    Route::post('course/enrol_employee',['as'=>'course.do_enrol_employee','uses'=>'CourseController@doEnrolEmployee']);
    Route::get('employee/list',['as'=>'employee.list','uses'=>'EmployeeController@index']);
    Route::delete('employee/remove/{id}',['as'=>'employee.remove','uses'=>'EmployeeController@remove']);
    Route::get('employee/details/{id}',['as'=>'employee.details','uses'=>'EmployeeController@details']);


});

Route::get('/test',['as'=>'test','uses'=>'EmployeeController@test']);
//Route::view('/test','test');


    Route::get('/create', 'UploadController@create');
    Route::post('/images-save', 'UploadController@store');
    Route::post('/images-delete', 'UploadController@destroy');
    Route::get('/images-show', 'UploadController@index');




