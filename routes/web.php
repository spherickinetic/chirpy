<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChirpController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FollowerController;

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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('/chirps', ChirpController::class)
    ->only(['store', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

    Route::get('/', [ChirpController::class, 'index'])->name('index');

Route::resource('/followers', FollowerController::class)
    ->only(['index'])
    ->middleware(['auth', 'verified']);

Route::post('/follow-me',[FollowerController::class, 'store'])->name('followers.store');
Route::post('/unfollow-me',[FollowerController::class, 'destroy'])->name('followers.destroy');

Route::delete('/delete-image',[ImageController::class, 'destroy'])->name('images.destroy');

require __DIR__.'/auth.php';
