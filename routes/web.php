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

/** API */
Route::any("/getEmail", "ApiController@getEmailAddress")->name("getEmailAddress");
Route::post("/getPhone", "ApiController@getPhoneNumber")->name("getEmailAddress");


Route::group(['prefix' => 'admin', 'middleware'=>'checkAdmin'], function () {
    Route::get("/dashboard","Admin\AdminController@Dashboard")->name("adminDashboard");

    /** USERS */
    Route::get("/users","Admin\UserController@index")->name("adminUsers");
    Route::any("/users/search", "Admin\UserController@search")->name("adminUserSearch");
    Route::get("/user/edit/{id}","Admin\UserController@edit")->name("adminUserEdit");
    Route::post("/user/edit/{id}","Admin\UserController@update")->name("adminUserUpdate");
    Route::get("/user/avatar/delete/{id}","Admin\UserController@deleteAvatar")->name("deleteAvatar");

    /** USERROLES */
    Route::get("/users/roles", "Admin\UserRolesController@index")->name("adminUserRoles");
    Route::get("/users/role/edit/{id}", "Admin\UserRolesController@edit")->name("adminUserRoleEdit");
    Route::post("/users/role/edit/{id}", "Admin\UserRolesController@update")->name("adminUserRoleUpdate");
    Route::get("/users/role/new", "Admin\UserRolesController@create")->name("adminUserRoleCreate");
    Route::post("/users/role/new", "Admin\UserRolesController@store")->name("adminUserRoleStore");

    /** USERSTATUSES */
    Route::get("/users/statuses", "Admin\UserStatusesController@index")->name("adminUserStatuses");
    Route::get("/users/status/edit/{id}", "Admin\UserStatusesController@edit")->name("adminUserStatusEdit");
    Route::post("/users/status/edit/{id}", "Admin\UserStatusesController@update")->name("adminUserStatusUpdate");
    Route::get("/users/status/new", "Admin\UserStatusesController@create")->name("adminUserStatusCreate");
    Route::post("/users/status/new", "Admin\UserStatusesController@store")->name("adminUserStatusStore");
});