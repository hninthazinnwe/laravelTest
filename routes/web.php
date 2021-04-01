<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
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

Route::middleware('auth')->group(function(){
// User
    // Page
    Route::get('/', [PageController::class, "index"])->name("home");

    Route::get('/user/profile', [PageController::class,"userProfile"])->name("profile");
    Route::get('/user/contactUs', [PageController::class,"contactUs"])->name("contactUs");
    Route::get('/user/createPost', [PageController::class,"createPost"])->name("createPost");

    Route::post('/user/contactUs', [ContactUsController::class, "postContactMessage"])->name("postContactMessage");

    // Post
    Route::post('/user/createPost', [PostController::class,"post"])->name("createPost");
    Route::get('/post/{id}', [PostController::class, "showPostById"])->name('showPostById');
    Route::get('/post/delete/{id}', [PostController::class, 'deletePost'])->name('deletePost')->middleware('premiumUser');
    Route::get('/post/edit/{id}', [PostController::class, 'editPost'])->name('editPost')->middleware('premiumUser');
    Route::post('/post/update/{id}', [PostController::class,"updatePost"])->name("updatePost");
    // Auth
    Route::POST('/user/post_userProfile', [AuthController::class,"post_userProfile"])->name("post_userProfile");
//Admin
    Route::middleware('admin')->group(function(){
        Route::get('/admin/index', [AdminController::class,"index"])->name("admin.home");
        Route::get('/admin/manage_premium_user', [AdminController::class,"managePremiumUser"])->name("admin.managePremiumUser");
        Route::get('/admin/contact_message', [AdminController::class,"contactMessage"])->name("admin.contactMessage");
        Route::get('/admin/manage_premium_user/delete/{id}', [AdminController::class,"deleteUser"])->name("deleteUser");
        Route::get('/admin/manage_premium_user/edit/{id}', [AdminController::class,"editUser"])->name("editUser");
        Route::post('/admin/manage_premium_user/update/{id}', [AdminController::class,"updateUser"])->name("updateUser");
        Route::get('/admin/contact_message/delete/{id}', [ContactUsController::class, "deleteMessage"])->name("deleteMessage");
        Route::get('/admin/contact_message/edit/{id}', [ContactUsController::class, "editMessage"])->name("editMessage");
        Route::post('/admin/contact_message/update/{id}', [ContactUsController::class, "updateMessage"])->name("updateMessage");
    });
});
// Authentication
Route::middleware('guest')->group(function(){
    Route::get('/login', [AuthController::class,"login"])->name("login");
    Route::get('/register', [AuthController::class, "register"])->name("register");
    Route::post('/post_register', [AuthController::class, "post_register"])->name("post_register");
    Route::post('/login', [AuthController::class, 'post_login'])->name('post_login');
});
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
