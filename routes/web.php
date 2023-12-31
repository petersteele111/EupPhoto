<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PhotoController; // Import the PhotosController class
use App\Http\Controllers\AlbumController;
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

Route::get('/', function () {
    return view('index');
});

Route::post('/albums', [AlbumController::class, 'store'])->middleware('admin');
Route::get('/albums/create', [AlbumController::class, 'create'])->middleware('admin');

Route::get('/albums/{id}/photos', [PhotoController::class, 'showAlbumPhotos'])->name('albums.photos')->middleware('admin');
Route::post('/photos', [PhotoController::class, 'store'])->name('photos.store')->middleware('admin');
Route::get('/upload', [PhotoController::class, 'create'])->name('photos.create')->middleware('admin');

Route::get('/home', function () {
    return view('index');
})->name('Home');

Route::get('/services', function () {
    return view('index');
})->name('Services');

Route::get('/about', function () {
    return view('index');
})->name('About');

Route::get('/contact', function () {
    return view('index');
})->name('Contact');

Route::get('/portfolio', function () {
    return view('index');
})->name('Portfolio');

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
