<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialLoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MyController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::post('/user/forgot-password',[UserController::class,'submit_forgot_password']);

Route::post('/code_to_reset_pswd/{email}',[UserController::class,'code_to_reset_pswd']);

Route::post('/reset/password/{email}/{code}',[UserController::class,'resetPassword']);

Route::post('/user/verify/code_to_register/{email}',[UserController::class,'verify_code_to_register']);

Route::post('/user/initial_registration',[UserController::class,'register']);

Route::get('/user/fetch_stored_data',[UserController::class,'fetch_stored_data']);

Route::post('/user/userfill_missed_info/{email}',[UserController::class,'fill_missed_info']);

//User/Seeker routes
Route::group(['prefix'=>'user' , 'middleware'=>'User'],function(){
    Route::get('/dashboard', [UserController::class, 'dashboard']);
    // Route::get('/profile', [UserController::class, 'profile_picture']);
    Route::get('/view_info', [UserController::class, 'View_information']);
    Route::post('/update_info', [UserController::class, 'edit_info']);
    // Route::get('/fetch_stored_data',[UserController::class,'fetch_stored_data']);
    Route::post('/modify_password', [UserController::class, 'modify_password']);
    // Route::post('/uploadImage',[UserController::class,'uploadImage']);
});

//Admin routes
Route::group(['prefix'=>'adminauth' , 'middleware'=>'Admin'],function(){

});

Route::get('/getting-Data',[MyController::class,'getData']);
Route::post('/posting-Data',[MyController::class,'postData']);

Route::post('/send-warning-email', [MyController::class, 'sendEmail']);