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

Route::group(['middleware' => 'isOnline'], function () {
    Route::get('/', "PublicController@Home")->name("home");

    /**
     * REGISTRATION / AUTHENTICATION
     */
    Route::get("/bejelentkezes", "AuthenticationController@Login")->name("login");
    Route::post("/bejelentkezes", "AuthenticationController@LoginAttempt")->name("loginAttempt");

    Route::get("/regisztracio/megerosites/{Email}/{confirmCode}", "AuthenticationController@RegisterStepTwo")->name("registerStepTwo");
    Route::post("/regisztracio/megerosites/{Email}/{confirmCode}", "AuthenticationController@SendRegisterStepTwo")->name("sendRegisterStepTwo");
    Route::get("/regisztracio/sikerult", "AuthenticationController@RegisterStepTwoSuccess")->name("registerStepTwoSuccess");
    Route::get("/regisztracio", "AuthenticationController@Register")->name("register");
    Route::get("/regisztracio-sikeres", "AuthenticationController@RegisterSuccess")->name("registerSuccess");
    Route::post("/regisztracio", "AuthenticationController@SendRegister")->name("sendRegister");

    Route::get("/elfelejtett-jelszo/uj-jelszo/{email}/{confirmCode}", "AuthenticationController@GenerateNewPassword")->name("generateNewPassword");
    Route::post("/elfelejtett-jelszo/uj-jelszo/{email}/{confirmCode}", "AuthenticationController@SendGenerateNewPassword")->name("sendGenerateNewPassword");
    Route::get("/elfelejtett-jelszo", "AuthenticationController@LostPassword")->name("lostPassword");
    Route::post("/elfelejtett-jelszo", "AuthenticationController@SendLostPassword")->name("sendLostPassword");

    Route::get("/kijelentkezes", "AuthenticationController@Logout")->name("logout");

    /** PROFILES */
    Route::get("/muvesz/{userSlug}","ProfileController@show")->name("showProfile");
});

//captcha
Route::post("/checkCaptcha", "PublicController@CheckCaptcha")->name("checkCaptcha");


Route::group(['prefix' => 'admin', 'middleware'=>'checkAdmin'], function () {
    Route::get("/dashboard","Admin\AdminController@Dashboard")->name("adminDashboard");

    /** USERS */
    Route::get("/users","Admin\UserController@index")->name("adminUsers");
    Route::get("/user/{id}","Admin\UserController@edit")->name("adminUserEdit");
    Route::post("/user/{id}","Admin\UserController@update")->name("adminUserUpdate");
});