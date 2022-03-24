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

Route::get('/', [App\Http\Controllers\ProductController::class, 'index']);


Route::get('home', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('edit/{id}', [App\Http\Controllers\HomeController::class, 'edit']);

Route::get('user', [App\Http\Controllers\UserController::class, 'index']);



// Http Client
// -----------------


// Http Client - Fetch Post
Route::get('posts', [App\Http\Controllers\ClientController::class, 'getAllPosts']);

// Http Client - Fetch SIngle Post BY ID
Route::get('post/{id}', [App\Http\Controllers\ClientController::class, 'getPostById']);


// Http Client - Add Post
Route::get('add-post ', [App\Http\Controllers\ClientController::class, 'addPost']);


// Http Client - Update Post
Route::get('update-post ', [App\Http\Controllers\ClientController::class, 'updatePost']);


// Http Client - Delete Post
Route::get('delete-post/{id}', [App\Http\Controllers\ClientController::class, 'deletePost']);


// FLUENT STRINGS
Route::get('fluent-string', [App\Http\Controllers\FluentController::class, 'index']);

// Http Methods
//$request->method()
Route::get('getMethod', [App\Http\Controllers\UserController::class, 'getMethod']);
//$request->Path()
Route::get('getPath', [App\Http\Controllers\UserController::class, 'getPath']);
//$request->url()
Route::get('getUrl', [App\Http\Controllers\UserController::class, 'getUrl']);
//$request->fullUrl()
Route::get('getFullUrl', [App\Http\Controllers\UserController::class, 'getFullUrl']);


// LoginController
Route::get('login', [App\Http\Controllers\LoginController::class, 'index']);
Route::post('login', [App\Http\Controllers\LoginController::class, 'loginSubmit']);


//Middleware

//Apply Middleware on a Single Route
// Route::get('login', [App\Http\Controllers\LoginController::class, 'index'])->middleware('checkuser');

//Apply Middleware on a group of  Routes
Route::middleware(['checkuser'])->group(function () {

    // LoginController
    Route::get('login', [App\Http\Controllers\LoginController::class, 'index']);
    Route::post('login', [App\Http\Controllers\LoginController::class, 'loginSubmit']);
});


// HTTP SESSIONS
Route::get('session/get', [App\Http\Controllers\SessionController::class, 'getSessionData']);
Route::get('session/store', [App\Http\Controllers\SessionController::class, 'storeSessionData']);
Route::get('session/remove', [App\Http\Controllers\SessionController::class, 'deleteSessionData']);


//POSTS - USING QUERY BUILDER
Route::get('post', [App\Http\Controllers\PostController::class, 'getAllPosts']);
Route::get('post/add-post', [App\Http\Controllers\PostController::class, 'addPost']);
Route::post('post/store-post', [App\Http\Controllers\PostController::class, 'storePost']);

Route::get('post/single-post/{id}', [App\Http\Controllers\PostController::class, 'getSinglePostById']);

Route::get('post/edit-post/{id}', [App\Http\Controllers\PostController::class, 'editPost']);
Route::post('post/update-post/{id}', [App\Http\Controllers\PostController::class, 'updatePost']);

Route::get('delete-post/{id}', [App\Http\Controllers\PostController::class, 'deletePost']);

// JOINS
Route::get('inner-join', [App\Http\Controllers\PostController::class, 'innerJoinClause']);
Route::get('left-join', [App\Http\Controllers\PostController::class, 'leftJoinClause']);
Route::get('right-join', [App\Http\Controllers\PostController::class, 'rightJoinClause']);


//POSTS - USING MODEL
Route::get('all-posts', [App\Http\Controllers\PostController::class, 'getAllPostsUsingModel']);


// BLADE TEMPLATE - Tuts
Route::get('test', function(){

    return view('Test.test');
});