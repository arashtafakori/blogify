<?php

use App\Http\Controllers\FoodController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


// Route::get('/foods/{id}', [FoodController::class, 'index'])->middleware(['auth', 'verified'])->name('foods.index');
// Route::get('/foods/list', [FoodController::class, 'list'])->middleware(['auth', 'verified'])->name('foods.list');
// Route::get('/foods/show/{id}', [FoodController::class, 'show'])->middleware(['auth', 'verified'])->name('foods.show');
Route::get('/foods/new-post/{locale?}', [FoodController::class, 'newPost'])->name('foods.new-post');
Route::get('/foods/explore/{locale?}', [FoodController::class, 'explore'])->name('foods.explore');
Route::get('/foods/myfoods/{locale?}', [FoodController::class, 'myfoods'])->middleware(['auth', 'verified'])->name('foods.my-foods');
Route::resource('foods', FoodController::class)
->only(['store', 'update', 'destroy'])
->middleware(['auth', 'verified']);

Route::get('/', function () {
    return view('welcome');
});
 
// Route::get('/{locale?}', [App\Http\Controllers\HomeController::class, 'welcome'])->name('home.welcome');

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
