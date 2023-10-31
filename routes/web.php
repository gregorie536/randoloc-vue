<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


use App\Http\Controllers\ContactController;
use App\Http\Controllers\GuidelineController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomepageFeaturesController;

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

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard', [
        'successMessage' => session('successMessage')
    ]);
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
    // Route::get('/gallery-photos', function () {
    //     return Inertia::render('GalleryPhotos');
    // })->name('galleryPhotos');

// Route pour la page organisation
Route::get('/organization', function () {
    return Inertia::render('Organization');
})->name('organization');

// Route pour la page règlement et organisation
// Route::get('/guideline', function () {
//     return Inertia::render('Guideline');
// })->name('guideline');

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
Route::get('/contact/edit', [ContactController::class, 'edit'])->name('contact.edit');
Route::post('/contacts/update', [ContactController::class, 'update'])->name('contacts.update');

// Route pour la page règlement et organisation (Guidelines)
Route::get('/guideline', [GuidelineController::class, 'index'])->name('guideline');
Route::get('/guideline/edit', [GuidelineController::class, 'edit']);
Route::post('/guidelines/update', [GuidelineController::class, 'update']);

// Route pour la page Gallerie Photos
// Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
// Route::get('/gallery-photos', [GalleryController::class, 'index']);
Route::get('/gallery-photos', [GalleryController::class, 'index'])->name('galleryPhotos');
Route::get('/gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
Route::post('/gallery', [GalleryController::class, 'store'])->name('gallery.store');
Route::get('/gallery/{gallery}/edit', [GalleryController::class, 'edit'])->name('gallery.edit');
Route::put('/gallery/{gallery}', [GalleryController::class, 'update'])->name('gallery.update');
Route::delete('/gallery/{gallery}', [GalleryController::class, 'destroy'])->name('gallery.destroy');

// Route pour la page Info de moment (homepage_features)
Route::get('/homepage_features', [HomepageFeaturesController::class, 'index'])->name('homepage_features');
// Route::get('/homepage_features/edit', [HomepageFeaturesController::class, 'edit']);

Route::get('/homepage_features/edit', [HomepageFeaturesController::class, 'edit'])->name('homepage_features.edit');
Route::post('/homepage_features/update', [HomepageFeaturesController::class, 'update'])->name('homepage_features.update');


require __DIR__ . '/auth.php';
