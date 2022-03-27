<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\posts\PostController;
use App\Http\Controllers\ErrorPostController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Social\GoogleSocialiteController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get("/posts/deletedposts",[PostController::class,"showDeletedPosts"])->name("posts.deleted");

Route::get("/posts/myposts",[PostController::class,"getmyposts"])->name("posts.myposts");
Route::get("/posts/{id}/restore",[PostController::class,"restorePost"])->name("posts.restore");

Route::resource('posts', PostController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get("/posts/error",ErrorPostController::class)->name("posts.error");

 

Route::get('auth/google', [GoogleSocialiteController::class, 'redirectToGoogle']);
Route::get('callback/google', [GoogleSocialiteController::class, 'handleCallback']);
