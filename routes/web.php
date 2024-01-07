<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PhotoController; // Import the PhotosController class
use App\Http\Controllers\AlbumController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController; // Import the PortfolioController class

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

Route::get('/', function () {
    return view('index');
});

// Albums
Route::get('/albums', [AlbumController::class, 'index'])->middleware('admin')->name('albums.index');
Route::get('/albums/{album}/edit', [AlbumController::class, 'edit'])->middleware('admin')->name('albums.edit');
Route::delete('/albums/{album}', [AlbumController::class, 'destroy'])->middleware('admin')->name('albums.destroy');
Route::post('/albums', [AlbumController::class, 'store'])->middleware('admin');
Route::get('/albums/create', [AlbumController::class, 'create'])->middleware('admin')->name('albums.create');
Route::put('/albums/{album}', [AlbumController::class, 'update'])->middleware('admin')->name('albums.update');
Route::get('/albums/{id}/edit-photos', [AlbumController::class, 'editPhotos'])->name('albums.editPhotos');

// Photos
Route::get('/photos', [PhotoController::class, 'index'])->middleware('admin')->name('photos.index');
Route::get('/photos/{photo}/edit', [PhotoController::class, 'edit'])->middleware('admin')->name('photos.edit');
Route::put('/photos/{photo}', [PhotoController::class, 'update'])->middleware('admin')->name('photos.update');
Route::delete('/photos/{photo}', [PhotoController::class, 'destroy'])->middleware('admin')->name('photos.destroy');
Route::get('/albums/{album}/photos', [PhotoController::class, 'showAlbumPhotos'])->middleware(['auth', 'verified'])->name('albums.photos');
Route::post('/photos', [PhotoController::class, 'store'])->name('photos.store')->middleware('admin');
Route::get('/photos/create/{albumId}', [PhotoController::class, 'create'])->name('photos.create')->middleware('admin');
Route::post('/photos/massDestroy', [PhotoController::class, 'massDestroy'])->name('photos.massDestroy')->middleware('admin');

// Portfolio
Route::get('/portfolio/upload', [PortfolioController::class, 'create'])->name('portfolio.create')->middleware('admin');
Route::post('/portfolio', [PortfolioController::class, 'store'])->name('portfolio.store')->middleware('admin');
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index')->middleware('admin');

Route::get('/home', function () {
    return view('index');
})->name('Home');

Route::get('/services', function () {
    return view('index');
})->name('Services');

Route::get('/about', function () {
    return view('about');
})->name('About');

Route::get('/contact', function () {
    return view('index');
})->name('Contact');

Route::get('/pricing', function () {
    return view('index');
})->name('Pricing');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
