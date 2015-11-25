<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// ============ API Routes ============
Route::group(array('prefix' => 'api/v1'), function () {
	# TimeEntry #
    Route::resource('track', 'TracksController', ['only' => ['index', 'store', 'update', 'destroy']]);
	# Type #
    Route::get('type', 'TypesController@index');
});

// ============ Angular Routing ============
Route::get('/', function () {
    return File::get(public_path() . '/app/index.html');
});

//Missing Route
Route::any('{path?}', function () {
    return File::get(public_path() . '/app/index.html');
})->where("path", ".+");