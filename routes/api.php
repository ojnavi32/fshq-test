<?php

use Illuminate\Http\Request;

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

$version = env('API_VERSION', 'v1');

Route::group(['prefix' => $version, 'namespace' => 'API',], function () {
    
    #Employee api routes
    Route::group(['prefix' => 'employees'], function () {
        Route::get('list', 'EmployeeAPIController@list');
    });

    #Company api routes
    Route::group(['prefix' => 'companies'], function () {
        Route::get('list', 'CompanyAPIController@list');
    });
});
