<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);
Route::get('logout', 'Auth\LoginController@logout');

#authenticated routes
Route::group(['middleware' => 'auth'], function () {

    #Admin routes
    Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['role:admin']], function () {

        #admin employee routes
        Route::resource('employees', 'EmployeeController');

        #admin company routes
        Route::resource('companies', 'CompanyController');

        #schedule email route
        Route::get('schedule-email', 'ScheduledEmailController@index');
        Route::post('schedule-email', 'ScheduledEmailController@store')->name('schedule-email');
    });

    Route::group(['prefix' => 'me', 'middleware' => ['role:employee']], function () {
        Route::get('', 'EmployeeController@index')->name('me');
        Route::get('profile', 'EmployeeController@profile')->name('profile');

        Route::get('co-workers', 'API\EmployeeAPIController@coEmployees');
        Route::get('co-worker/{id}', 'EmployeeController@coWorker');
    });
});