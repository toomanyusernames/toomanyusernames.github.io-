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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/post', [App\Http\Controllers\PostController::class, 'index'])->middleware('auth');
Route::post('/post', [App\Http\Controllers\PostController::class, 'store'])->middleware('auth');
Route::get('/post/{id}', [App\Http\Controllers\PostController::class, 'show'])->name('post.show');
Route::get('/post/{id}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit')->middleware('auth');
Route::put('/post/{id}/edit', [App\Http\Controllers\PostController::class, 'update'])->name('post.update')->middleware('auth');
Route::delete('/post/{id}/delete', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.delete')->middleware('auth');


Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index'])->middleware('auth');
Route::post('/category', [App\Http\Controllers\CategoryController::class, 'store'])->middleware('auth');

Route::get('/post/category/{name}', [App\Http\Controllers\CategoryController::class, 'showAll'])->name('category.showAll')->middleware('auth');

Route::post('/like', [App\Http\Controllers\LikeController::class, 'index'])->middleware('auth');

Route::post('/comment', [App\Http\Controllers\CommentController::class, 'index'])->middleware('auth');

Route::get('/users', [App\Http\Controllers\HomeController::class, 'listUser']);

Route::get('/users/{id}', [App\Http\Controllers\HomeController::class, 'showUser'])->name('user.show');

Route::post('/friend', [App\Http\Controllers\FriendController::class, 'index'])->middleware('auth');

Route::post('/friend/remove', [App\Http\Controllers\FriendController::class, 'remove'])->middleware('auth');

Route::get('/friend/{id}', [App\Http\Controllers\FriendController::class, 'showFriends'])->middleware('auth')->name('friend.show');
