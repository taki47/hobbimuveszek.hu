<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'admin'], function () {
    /** CATEGORIES */
    Route::group(['prefix' => 'category'], function () {
        Route::post('/update', [App\Http\Controllers\Admin\CategoryController::class, 'update']);
        Route::delete('/delete/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy']);
    });

    //TAGS
    Route::post('/tag/new', [App\Http\Controllers\Admin\BlogTagController::class, "storeAPI"]);
});

