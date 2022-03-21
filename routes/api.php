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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Required Parameter
Route::get('/users/{name}', function ($name) {

    return 'Hi ' . $name;
});


// Optional Parameters
Route::get('/user/{name?}', function ($name = null) {

    return 'Hi ' . $name;
});

//Restrict Characters Only constraint - Accepts only character values
Route::get('/products/{name?}', function ($name = null) {

    return 'Hi ' . $name;
})->where(['name' => '[a-zA-Z]+']);
