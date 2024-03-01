<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[WelcomeController::class,'index'])->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// post
Route::post('/posts/store',[PostController::class,'store'])->name('posts.store');
Route::get('/posts/{post_id}/show',[PostController::class,'show'])->name('posts.show');
Route::get('posts/all',[PostController::class,'all_posts'])->name('posts.all');
Route::get('posts/{post_id}/edit',[PostController::class,'edit_post'])->name('post.edit');
Route::post('posts/{post_id}/update',[PostController::class,'update_post'])->name('post.update');
Route::get('posts/{post_id}/delete',[PostController::class,'delete_post'])->name('post.delete');