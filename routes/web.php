<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\brandController;
use App\Http\Controllers\cityController;
use App\Http\Controllers\carListingController;
use App\Http\Controllers\adminController;

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

Route::get('/car-listings', [carListingController::class, 'index'])
    ->name('car_listings.index');

Route::get('/car-listings/create', [carListingController::class, 'create'])
    ->name('car_listings.create');

Route::post('/car-listings', [carListingController::class, 'store'])
    ->name('car_listings.store');

Route::get(
    '/car-listings/{carListing}',
    [carListingController::class, 'show']
)->name('car_listings.show');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get(
        '/profile',
        [ProfileController::class, 'edit']
    )->name('profile.edit');

    Route::patch(
        '/profile',
        [ProfileController::class, 'update']
    )->name('profile.update');

    Route::delete(
        '/profile',
        [ProfileController::class, 'destroy']
    )->name('profile.destroy');

    Route::get(
        '/car-listings/create',
        [carListingController::class, 'create']
    )->name('car_listings.create');

    Route::post(
        '/car-listings',
        [carListingController::class, 'store']
    )->name('car_listings.store');

    Route::get(
        '/my-listings',
        [carListingController::class, 'myListings']
    )->name('car_listings.my');

    Route::get(
        '/car-listings/{carListing}/edit',
        [carListingController::class, 'edit']
    )->name('car_listings.edit');

    Route::put(
        '/car-listings/{carListing}',
        [carListingController::class, 'update']
    )->name('car_listings.update');

    Route::delete(
        '/car-listings/{carListing}',
        [carListingController::class, 'destroy']
    )->name('car_listings.destroy');
});

Route::middleware('auth')->group(function () {

    Route::get(
        '/admin',
        [adminController::class, 'dashboard']
    )->name('admin.dashboard');

    Route::get(
        '/admin/listings',
        [adminController::class, 'listings']
    )->name('admin.listings');

    Route::patch(
        '/admin/listings/{carListing}/approve',
        [adminController::class, 'approveListing']
    )->name('admin.listings.approve');

    Route::patch(
        '/admin/listings/{carListing}/reject',
        [adminController::class, 'rejectListing']
    )->name('admin.listings.reject');

    Route::get(
        '/admin/users',
        [adminController::class, 'users']
    )->name('admin.users');

    Route::patch(
        '/admin/users/{user}',
        [adminController::class, 'toggleAdmin']
    )->name('admin.users.toggle');
});

Route::get(
    '/seller/{user}',
    [homeController::class, 'seller']
)->name('seller.show');

require __DIR__ . '/auth.php';
