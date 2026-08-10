<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\brandController;
use App\Http\Controllers\cityController;
use App\Http\Controllers\carListingController;

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

Route::get('/cities', [CityController::class, 'index'])
    ->name('cities.index');

Route::get('/cities/create', [CityController::class, 'create'])
    ->name('cities.create');

Route::post('/cities', [CityController::class, 'store'])
    ->name('cities.store');

Route::get('/cities/{city}/edit', [CityController::class, 'edit'])
    ->name('cities.edit');

Route::put('/cities/{city}', [CityController::class, 'update'])
    ->name('cities.update');

Route::delete('/cities/{city}', [CityController::class, 'destroy'])
    ->name('cities.destroy');

Route::get('/car-listings', [CarListingController::class, 'index'])
    ->name('car_listings.index');

Route::get('/car-listings/create', [CarListingController::class, 'create'])
    ->name('car_listings.create');

Route::post('/car-listings', [CarListingController::class, 'store'])
    ->name('car_listings.store');




    



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/car-listings/create', [CarListingController::class, 'create'])
        ->name('car_listings.create');

    Route::post('/car-listings', [CarListingController::class, 'store'])
        ->name('car_listings.store');
});

require __DIR__.'/auth.php';
