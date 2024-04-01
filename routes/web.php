<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


// Route::get('/posts/{id}', [PostController::class, 'index'])->middleware(['auth', 'verified'])->name('posts.index');
// Route::get('/posts/list', [PostController::class, 'list'])->middleware(['auth', 'verified'])->name('posts.list');
// Route::get('/posts/show/{id}', [PostController::class, 'show'])->middleware(['auth', 'verified'])->name('posts.show-post');
// Route::get('/posts/new-post/{locale?}', [PostController::class, 'newPost'])->name('posts.new-post');
 

// Route::resource('posts', PostController::class)->only(['show']);
Route::get('/posts/{id}/show/{locale?}', [PostController::class, 'show'])->name('posts.show-post');

Route::get('/posts/explore/{locale?}', [PostController::class, 'explore'])->name('posts.explore');
Route::get('/posts/my-posts/{locale?}', [PostController::class, 'myPosts'])->middleware(['auth', 'verified'])->name('posts.my-posts');
Route::resource('posts', PostController::class)
->only(['edit', 'create', 'store', 'update', 'destroy'])
->middleware(['auth', 'verified']);

// Route::get('/', function () {
//     return view('welcome');
// });
 
Route::get('/', [App\Http\Controllers\HomeController::class, 'welcome'])->name('home.welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
