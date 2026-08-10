<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\brandController;

Route::get('/', [homeController::class, 'index'])->name('home');

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/brands', [BrandController::class, 'index'])
    ->name('brands.index');

Route::get('/brands/create', [BrandController::class, 'create'])
    ->name('brands.create');

Route::post('/brands', [BrandController::class, 'store'])
    ->name('brands.store');


Route::get('/brands/{brand}/edit', [BrandController::class, 'edit'])
    ->name('brands.edit');

Route::put('/brands/{brand}', [BrandController::class, 'update'])
    ->name('brands.update');

Route::delete('/brands/{brand}', [BrandController::class, 'destroy'])
    ->name('brands.destroy');




    



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
