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
//    Route::get('register',['as'=>'web.register','uses'=>'AuthController@register']);
//    Route::post('register',['as'=>'web.do.register','uses'=>'AuthController@doRegister']);
});




// Admin
Route::group(['middleware'=>['role:admin']],function (){
    Route::get('picture/store/{regid}',['as'=>'picture.store','uses'=>'FileUploadController@store']);
    Route::post('picture/store/{regid}',['as'=>'picture.dostore','uses'=>'FileUploadController@doStore']);
    Route::resource('pictures', 'FileUploadController', ['only' => ['index', 'destroy']]);

    Route::get('picture/capture/{regid}',['as'=>'picture.capture','uses'=>'FileUploadController@capture']);
    Route::post('savewebcam/{regid}','FileUploadController@saveWebcam')->name('saveWebcam');


    Route::post('/dropzone-upload','FileUploadController@dropzoneUpload')->name('dropzoneUpload');


    Route::get('course/index',['as'=>'course.index','uses'=>'CourseController@index']);
    Route::get('course/create',['as'=>'course.create','uses'=>'CourseController@create']);
    Route::post('course/create',['as'=>'course.create','uses'=>'CourseController@store']);
    Route::get('course/index',['as'=>'course.index','uses'=>'CourseController@index']);
    Route::get('course/update/{id}',['as'=>'course.update','uses'=>'CourseController@update']);
    Route::post('course/update/{id}',['as'=>'course.update','uses'=>'CourseController@update']);
    Route::delete('course/delete/{id}',['as'=>'course.delete','uses'=>'CourseController@delete']);


    Route::get('routine/index',['as'=>'routine.index','uses'=>'RoutineController@index']);
    Route::post('routine/indexUpdate',['as'=>'routine.indexUpdate','uses'=>'RoutineController@indexUpdate']);
    Route::get('routine/create',['as'=>'routine.create','uses'=>'RoutineController@create']);
    Route::post('routine/create',['as'=>'routine.add','uses'=>'RoutineController@add']);
    Route::get('routine/update/{id}',['as'=>'routine.update','uses'=>'RoutineController@update']);
    Route::post('routine/update/{id}',['as'=>'routine.update','uses'=>'RoutineController@doUpdate']);
    Route::delete('routine/delete/{id}',['as'=>'routine.delete','uses'=>'RoutineController@delete']);

    Route::post('routine/csvUpload','FileUploadController@csvUpload')->name('routine.csvUpload');


    Route::get('attendance',['as'=>'attendance','uses'=>'RoutineController@attendance']);


});





// Auth Routes
Route::group(['middleware' => ['auth']],function (){

    Route::put('user/{id}',['as' => 'user.update', 'uses' => 'User\UserController@update']);
    Route::get('user/{id}/show',['as'=>'user.show','uses'=>'User\UserController@show']);
    Route::post('student/store',['as'=>'student.store','uses'=>'User\UserController@storeStudent']);
    Route::post('teacher/store',['as'=>'teacher.store','uses'=>'User\UserController@storeTeacher']);
    Route::get('user/{id}/edit',['as'=>'user.edit','uses'=>'User\UserController@edit']);
    Route::delete('user/{id}',['as'=>'user.delete','uses'=>'User\UserController@delete']);
    Route::get('teacher/create',['as'=>'teacher.create','uses'=>'User\UserController@createTeacher']);
    Route::get('student/create',['as'=>'student.create','uses'=>'User\UserController@createStudent']);
    Route::get('students',['as'=>'student.index','uses'=>'User\UserController@studentIndex']);
    Route::get('teachers',['as'=>'teacher.index','uses'=>'User\UserController@teacherIndex']);
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





Route::get('/test',['as'=>'test','uses'=>'FileUploadController@test']);
Route::post('/testroute','CourseController@test');
//Route::view('/test','test');
//Route::get('/test', function () {
//    return view('test');
//});


//Route::get('/webcam','TestController@getWebcam');
Route::post('/detectwebcam/{room}','FaceDetectionController@detectWebcam')->name('detectWebcam');




