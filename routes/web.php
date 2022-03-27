<?php

use App\Http\Controllers\MailController;
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


//STUDENTS - USING MODEL
Route::get('students', [App\Http\Controllers\StudentController::class, 'index']);
Route::get('add-student', [App\Http\Controllers\StudentController::class, 'create']);
Route::post('store-student', [App\Http\Controllers\StudentController::class, 'store']);
Route::get('edit-student/{id}', [App\Http\Controllers\StudentController::class, 'edit']);
Route::post('update-student/{id}', [App\Http\Controllers\StudentController::class, 'update']);
Route::get('delete-student/{id}', [App\Http\Controllers\StudentController::class, 'destroy']);

//PHONE - USING MODEL
Route::get('phones', [App\Http\Controllers\PhoneController::class, 'index']);
Route::get('add-phone', [App\Http\Controllers\PhoneController::class, 'create']);
Route::post('store-phone', [App\Http\Controllers\PhoneController::class, 'store']);
Route::get('edit-phone/{id}', [App\Http\Controllers\PhoneController::class, 'edit']);
Route::post('update-phone/{id}', [App\Http\Controllers\PhoneController::class, 'update']);
Route::get('delete-phone/{id}', [App\Http\Controllers\PhoneController::class, 'destroy']);


//COMMENTS - USING MODEL
Route::get('comments', [App\Http\Controllers\CommentController::class, 'index']);
Route::get('add-comment', [App\Http\Controllers\CommentController::class, 'create']);
Route::post('store-comment', [App\Http\Controllers\CommentController::class, 'store']);
Route::get('edit-comment/{id}', [App\Http\Controllers\CommentController::class, 'edit']);
Route::post('update-comment/{id}', [App\Http\Controllers\CommentController::class, 'update']);
Route::get('delete-comment/{id}', [App\Http\Controllers\CommentController::class, 'destroy']);


// BLADE TEMPLATE - Tuts
Route::get('test', function () {

    return view('Test.test');
});



//FILE UPLOAD
Route::get('upload', [App\Http\Controllers\UploadController::class, 'uploadForm']);
Route::post('upload', [App\Http\Controllers\UploadController::class, 'uploadFile']);


// PAYMENT FACADES
Route::get('payment', function () {

    return App\PaymentGateway\Payment::process();
});


// SEND EMAIL

Route::get('send-email', [MailController::class, 'SendEmail']);


//EMPLOYEE - USING MODEL
Route::get('employees', [App\Http\Controllers\EmployeeController::class, 'index']);
Route::get('add-employee', [App\Http\Controllers\EmployeeController::class, 'create']);
Route::post('store-employee', [App\Http\Controllers\EmployeeController::class, 'store']);
Route::get('export-excel', [App\Http\Controllers\EmployeeController::class, 'exportIntoExcel']);
Route::get('export-csv', [App\Http\Controllers\EmployeeController::class, 'exportIntoCSV']);


// CONTACT US
Route::get('contact', [App\Http\Controllers\ContactController::class, 'index']);
Route::post('send-message', [App\Http\Controllers\ContactController::class, 'SendEmail']);


// RESIZE IMAGE
Route::get('resize-image', [App\Http\Controllers\ImageController::class, 'resizeImage']);
Route::post('resize-image', [App\Http\Controllers\ImageController::class, 'upload']);

// DROPZONE
Route::get('dropzone', [App\Http\Controllers\DropzoneController::class, 'dropzone']);
Route::post('dropzone', [App\Http\Controllers\DropzoneController::class, 'store']);


// LAZYLOADING
Route::get('gallery', [App\Http\Controllers\GalleryController::class, 'gallery']);

// TinyMCE WYSIWYG EDITOR
Route::get('editor', [App\Http\Controllers\EditorController::class, 'editor']);


//HELPERS
Route::get('get-name', [App\Http\Controllers\TestController::class, 'getFirstLastname']);

//SEARCH PRODUCTS
Route::get('add-product', [App\Http\Controllers\ProductController::class, 'addProduct']);
Route::get('search-product', [App\Http\Controllers\ProductController::class, 'searchProduct']);
Route::get('autocomplete', [App\Http\Controllers\ProductController::class, 'autocomplete']);


//BBOKS - USING AJAX CRUD
Route::get('books', [App\Http\Controllers\BookController::class, 'index']);
Route::post('books', [App\Http\Controllers\BookController::class, 'store']);
