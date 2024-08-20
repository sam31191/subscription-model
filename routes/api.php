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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'post'], function () {
    Route::post('/{website_id}/store', 'PostController@store');
});

Route::group(['prefix' => 'subscriber'], function () {
    Route::post('/{website_id}/subscribe', 'SubscriberController@subscribe');
});

Route::group(['prefix' => 'website'], function () {
    Route::post('/create', 'WebsiteController@create');
});
