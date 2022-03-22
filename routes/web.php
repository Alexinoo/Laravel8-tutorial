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
Route::get('/posts', [App\Http\Controllers\ClientController::class, 'getAllPosts']);
// Http Client - Fetch SIngle Post BY ID
Route::get('/post/{id}', [App\Http\Controllers\ClientController::class, 'getPostById']);

// Http Client - Add Post
Route::get('/add-post ', [App\Http\Controllers\ClientController::class, 'addPost']);

// Http Client - Update Post
Route::get('/update-post ', [App\Http\Controllers\ClientController::class, 'updatePost']);

// Http Client - Delete Post
Route::get('/delete-post/{id}', [App\Http\Controllers\ClientController::class, 'deletePost']);
