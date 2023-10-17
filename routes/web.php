<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


use App\Http\Controllers\ContactController;

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
    return Inertia::render('Home', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('home');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route pour la page evenements
Route::get('/event', function () {
    return Inertia::render('Event');
})->name('event');

// Route pour la page de la galerie photos
Route::get('/gallery-photos', function () {
    return Inertia::render('GalleryPhotos');
})->name('galleryPhotos');

// Route pour la page organisation
Route::get('/organization', function () {
    return Inertia::render('Organization');
})->name('organization');

// Route pour la page règlement et organisation
Route::get('/guideline', function () {
    return Inertia::render('Guideline');
})->name('guideline');

// Route pour la page contact
// Route::get('/contact', function () {
//     return Inertia::render('Contact');
// })->name('contact');

// Route pour les mentions légales
Route::get('/legal-notice', function () {
    return Inertia::render('LegalNotice');
})->name('legalNotice');


/////////////////////////////TESTS/////////////////////////////////////

// Route pour la page contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
// Route::get('/contact/edit', [ContactController::class, 'edit'])->name('contact.edit');
// Route::post('/contact/update', [ContactController::class, 'update'])->name('contact.update');


require __DIR__ . '/auth.php';
