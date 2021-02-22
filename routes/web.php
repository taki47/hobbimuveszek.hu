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

/** SETLOCALE */
Route::get("setlocale/{locale}", function ($lang) {
    \Session::put("locale", $lang);
    return redirect()->back();
})->name("setlocale");


Route::group(['middleware'=>'language'],function () {
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

    /** CONTACT FORM */
    Route::post('/kapcsolat/kuldes', "PublicController@sendContactForm")->name("sendContactForm");

    /** BLOG */
    Route::get("/blog/{tag}/{url}", "PublicController@blogDetail")->name("blogDetail");
    Route::get("/blog/{tag}", "PublicController@blogTagFilter")->name("blogTagFilter");
    Route::get("/blog", "PublicController@blogList")->name("blog");
    
    /** SEARCH */
    Route::post("/kereses/ajax-search", "SearchController@AjaxSearch")->name("ajaxSearch");
    Route::post("/muveszek", "SearchController@SearchArtist")->name("searchArtist");
    Route::post("/alkotasok", "SearchController@SearchCreation")->name("searchCreation");

    /** FOLLOW */
    Route::post("/follow/{userId}", "ProfileController@Follow")->name("follow");
    Route::post("/unfollow/{userId}", "ProfileController@UnFollow")->name("unFollow");

    /** MORE PAGES */
    Route::any("/{slug}", "PublicController@showPage");


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

        /** PROVINCES */
        Route::get("/provinces", "Admin\ProvincesController@index")->name("adminProvinces");
        Route::get("/province/edit/{id}", "Admin\ProvincesController@edit")->name("adminProvinceEdit");
        Route::post("/province/edit/{id}", "Admin\ProvincesController@update")->name("adminProvinceUpdate");
        Route::get("/province/new", "Admin\ProvincesController@create")->name("adminProvinceCreate");
        Route::post("/province/new", "Admin\ProvincesController@store")->name("adminProvinceStore");

        /** BILLINGTYPES */
        Route::get("/billingTypes", "Admin\BillingTypesController@index")->name("adminBillingTypes");
        Route::get("/billingTypes/edit/{id}", "Admin\BillingTypesController@edit")->name("adminBillingTypeEdit");
        Route::post("/billingTypes/edit/{id}", "Admin\BillingTypesController@update")->name("adminBillingTypeUpdate");
        Route::get("/billingTypes/new", "Admin\BillingTypesController@create")->name("adminBillingTypeCreate");
        Route::post("/billingTypes/new", "Admin\BillingTypesController@store")->name("adminBillingTypeStore");

        /**
         * GLOBAL SETTINGS
         */
        Route::get("/globalSettings", "Admin\GlobalSettingsController@index")->name("adminGlobalSettings");
        Route::get("/globalSetting/edit/{id}", "Admin\GlobalSettingsController@edit")->name("adminGlobalSettingEdit");
        Route::post("/globalSetting/edit/{id}", "Admin\GlobalSettingsController@update")->name("adminGlobalSettingUpdate");
        Route::get("/globalSetting/new", "Admin\GlobalSettingsController@create")->name("adminGlobalSettingCreate");
        Route::post("/globalSetting/new", "Admin\GlobalSettingsController@store")->name("adminGlobalSettingStore");

        /**
         * PAGES
         */
        Route::get("/pages", "Admin\PageController@index")->name("adminPages");
        Route::get("/page/edit/{id}", "Admin\PageController@edit")->name("adminPageEdit");
        Route::post("/page/edit/{id}", "Admin\PageController@update")->name("adminPageUpdate");
        Route::get("/page/new", "Admin\PageController@create")->name("adminPageCreate");
        Route::post("/page/new", "Admin\PageController@store")->name("adminPageStore");


        /**
         * CATEGORIES
         */
        Route::get("/categories", "Admin\CategoryController@index")->name("adminCategories");

        /**
         * CATEGORY IMAGES
         */
        Route::get("/categoryImages", "Admin\CategoryImageController@index")->name("adminCategoryImages");
        Route::get("/categoryImage/edit/{id}", "Admin\CategoryImageController@edit")->name("adminCategoryImageEdit");
        Route::post("/categoryImage/edit/{id}", "Admin\CategoryImageController@update")->name("adminCategoryImageUpdate");
        Route::get("/categoryImage/new", "Admin\CategoryImageController@create")->name("adminCategoryImageCreate");
        Route::post("/categoryImage/new", "Admin\CategoryImageController@store")->name("adminCategoryImageStore");
        Route::delete("/categoryImage/delete/{id}", "Admin\CategoryImageController@destroy")->name("adminCategoryImageDestroy");

        /**
         * SLIDERS
         */
        Route::get("/sliders", "Admin\SliderController@index")->name("adminSliders");
        Route::get("/slider/edit/{id}", "Admin\SliderController@edit")->name("adminSliderEdit");
        Route::post("/slider/edit/{id}", "Admin\SliderController@update")->name("adminSliderUpdate");
        Route::get("/slider/new", "Admin\SliderController@create")->name("adminSliderCreate");
        Route::post("/slider/new", "Admin\SliderController@store")->name("adminSliderStore");
        Route::delete("/slider/delete/{id}", "Admin\SliderController@destroy")->name("adminSliderDestroy");

        /**
         * TOPCATEGORIES
         */
        Route::get("/topcategories", "Admin\TopCategoryController@index")->name("adminTopCategories");
        Route::get("/topcategory/edit/{id}", "Admin\TopCategoryController@edit")->name("adminTopCategoryEdit");
        Route::post("/topcategory/edit/{id}", "Admin\TopCategoryController@update")->name("adminTopCategoryUpdate");
        Route::get("/topcategory/new", "Admin\TopCategoryController@create")->name("adminTopCategoryCreate");
        Route::post("/topcategory/new", "Admin\TopCategoryController@store")->name("adminTopCategoryStore");
        Route::delete("/topcategory/delete/{id}", "Admin\TopCategoryController@destroy")->name("adminTopCategoryDestroy");

        /**
         * BLOGS
         */
        Route::get("/blogs", "Admin\BlogController@index")->name("adminBlogs");
        Route::get("/blog/edit/{id}", "Admin\BlogController@edit")->name("adminBlogEdit");
        Route::post("/blog/edit/{id}", "Admin\BlogController@update")->name("adminBlogUpdate");
        Route::get("/blog/new", "Admin\BlogController@create")->name("adminBlogCreate");
        Route::post("/blog/new", "Admin\BlogController@store")->name("adminBlogStore");
        Route::delete("/blog/delete/{id}", "Admin\BlogController@destroy")->name("adminBlogDestroy");

        /**
         * BLOG TAGS
         */
        Route::get("/blogtags", "Admin\BlogTagController@index")->name("adminBlogTags");
        Route::get("/blogtag/edit/{id}", "Admin\BlogTagController@edit")->name("adminBlogTagEdit");
        Route::post("/blogtag/edit/{id}", "Admin\BlogTagController@update")->name("adminBlogTagUpdate");
        Route::get("/blogtag/new", "Admin\BlogTagController@create")->name("adminBlogTagCreate");
        Route::post("/blogtag/new", "Admin\BlogTagController@store")->name("adminBlogTagStore");
        Route::delete("/blogtag/delete/{id}", "Admin\BlogTagController@destroy")->name("adminBlogTagDestroy");
    });
});

/**
 * CKFINDER
 */
Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
    ->name('ckfinder_connector');

Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
    ->name('ckfinder_browser');