<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\FrontEnd\FrontEndController;
use App\Http\Controllers\FrontEnd\CommentController;
use App\Http\Controllers\Admin\SettingController;
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

Route::get('/',[FrontEndController::class,'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/tutorial/{category_slug}',[FrontEndController::class,'viewCategoryPosts']);
Route::get('/tutorial/{category_slug}/{post_slug}',[FrontEndController::class,'viewPost']);
// Comment Section
Route::post('comments',[CommentController::class,'store']);
Route::post('/delete-comment',[CommentController::class,'destroy']);

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function()
{
    Route::get('/',[DashboardController::class,'index']);
    Route::get('dashboard',[DashboardController::class,'index']);
    // Category Route
    Route::get('category',[CategoryController::class,'index']);
    Route::get('add-category',[CategoryController::class,'create']);
    Route::post('add-category',[CategoryController::class,'store']);
    Route::get('edit-category/{category_id}',[CategoryController::class,'edit']);
    Route::put('update-category/{category_id}',[CategoryController::class,'update']);
    Route::post('delete-category',[CategoryController::class,'destroy']);
    // Posts Route
    Route::get('posts',[PostsController::class,'index']);
    Route::get('add-posts',[PostsController::class,'create']);
    Route::post('add-posts',[PostsController::class,'store']);
    Route::get('edit-post/{post_id}',[PostsController::class,'edit']);
    Route::put('update-post/{post_id}',[PostsController::class,'update']);
    Route::get('delete-post/{post_id}',[PostsController::class,'destroy']);

    // Users Route
    Route::get('users',[UserController::class,'index']);
    Route::get('edit-user/{user_id}',[UserController::class,'edit']);
    Route::put('edit-user/{user_id}',[UserController::class,'update']);

    // Setting Route
    Route::get('settings',[SettingController::class,'index']);
    Route::post('settings',[SettingController::class,'store']);
});
