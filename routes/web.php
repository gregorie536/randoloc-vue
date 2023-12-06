<?php

use Inertia\Inertia;
use App\Models\HomepageFeature;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GuidelineController;
use App\Http\Controllers\HomepageFeaturesController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CategoryController;

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
        'homepageFeatures' => HomepageFeature::all()
    ]);
})->name('home');

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

// Route pour la page organisation
Route::get('/organization', function () {
    return Inertia::render('Organization');
})->name('organization');

// Route pour les mentions légales
Route::get('/legal-notice', function () {
    return Inertia::render('LegalNotice');
})->name('legalNotice');

// Route pour la page contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/contact/edit', [ContactController::class, 'edit'])->name('contact.edit');
Route::post('/contacts/update', [ContactController::class, 'update'])->name('contacts.update');

// Route pour la page règlement et organisation (Guidelines)
Route::get('/guideline', [GuidelineController::class, 'index'])->name('guideline');
Route::get('/guideline/edit', [GuidelineController::class, 'edit']);
Route::post('/guidelines/update', [GuidelineController::class, 'update']);

// Route pour la page Gallerie Photos
Route::get('/gallery-photos', [GalleryController::class, 'index'])->name('galleryPhotos');
Route::get('/gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
Route::post('/gallery', [GalleryController::class, 'store'])->name('gallery.store');
Route::get('/gallery/{gallery}/edit', [GalleryController::class, 'edit'])->name('gallery.edit');
Route::put('/gallery/{gallery}', [GalleryController::class, 'update'])->name('gallery.update');
Route::delete('/gallery/{gallery}', [GalleryController::class, 'destroy'])->name('gallery.destroy');

// Route pour la page Info de moment (homepage_features)
Route::get('/homepage_features', [HomepageFeaturesController::class, 'index'])->name('home');
Route::get('/homepage_features/edit', [HomepageFeaturesController::class, 'edit'])->name('homepage_features.edit');
Route::post('/homepage_features/update', [HomepageFeaturesController::class, 'update'])->name('homepage_features.update');

// Routes pour les événements
Route::get('/events/choice', [EventController::class, 'choice'])->name('events.choice');
Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
Route::post('/events', [EventController::class, 'store'])->name('events.store');
Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
Route::get('/events/manage', [EventController::class, 'manage'])->name('events.manage');
Route::get('/event', [EventController::class, 'index'])->name('event');
Route::get('/events/{id}', [EventController::class, 'show'])->name('eventDetail');

// Route pour les catégories
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/manage', [CategoryController::class, 'manage'])->name('categories.manage');
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categoryDetail');

require __DIR__ . '/auth.php';
