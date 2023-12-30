<?php

use Inertia\Inertia;
use App\Models\HomepageFeature;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\{
    ContactController,
    GalleryController,
    ProfileController,
    GuidelineController,
    HomepageFeaturesController,
    EventController,
    CategoryController,
    OrganizationController,
    BoardController,
    MemberController,
    CommitteeController
};

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

    // Contact
    Route::get('/contact/edit', [ContactController::class, 'edit'])->name('contact.edit');
    Route::post('/contacts/update', [ContactController::class, 'update'])->name('contacts.update');
    Route::get('/contact/choice', [ContactController::class, 'choice'])->name('contact.choice');

    // Guidelines
    Route::get('/guideline/edit', [GuidelineController::class, 'edit'])->name('guideline.edit');
    Route::post('/guidelines/update', [GuidelineController::class, 'update']);
    Route::get('/guideline/choice', [GuidelineController::class, 'choice'])->name('guideline.choice');

    // Gallery
    Route::get('/gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
    Route::post('/gallery', [GalleryController::class, 'store'])->name('gallery.store');
    Route::get('/gallery/{gallery}/edit', [GalleryController::class, 'edit'])->name('gallery.edit');
    Route::put('/gallery/{gallery}', [GalleryController::class, 'update'])->name('gallery.update');
    Route::delete('/gallery/{gallery}', [GalleryController::class, 'destroy'])->name('gallery.destroy');
    Route::get('/gallery/manage', [GalleryController::class, 'manage'])->name('gallery.manage');
    Route::get('/gallery/choice', [GalleryController::class, 'choice'])->name('gallery.choice');

    // Homepage_features
    Route::get('/homepage_features/edit', [HomepageFeaturesController::class, 'edit'])->name('homepage_features.edit');
    Route::post('/homepage_features/update', [HomepageFeaturesController::class, 'update'])->name('homepage_features.update');
    Route::get('/homepage_features/choice', [HomepageFeaturesController::class, 'choice'])->name('homepage_features.choice');

    // Categories
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/manage', [CategoryController::class, 'manage'])->name('categories.manage');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    // Events
    Route::get('/events/choice', [EventController::class, 'choice'])->name('events.choice');
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
    Route::get('/events/manage', [EventController::class, 'manage'])->name('events.manage');

    // Organization -> Board -> Members -> Committees
    Route::get('/organization/choice', [OrganizationController::class, 'choice'])->name('organization.choice');

    // Boards
    Route::get('/organization/boards/create', [BoardController::class, 'create'])->name('organization.boards.create');
    Route::get('/organization/boards/{board}/edit', [BoardController::class, 'edit'])->name('organization.boards.edit');
    Route::post('/organization/boards', [BoardController::class, 'store'])->name('organization.boards.store');
    Route::get('/organization/boards/manage', [BoardController::class, 'manage'])->name('organization.boards.manage');
    Route::put('/organization/boards/{board}', [BoardController::class, 'update'])->name('organization.boards.update');
    Route::get('/organization/boards/choice', [BoardController::class, 'choice'])->name('organization.boards.choice');

    // Members
    Route::get('/organization/members/create', [MemberController::class, 'create'])->name('organization.members.create');
    Route::get('/organization/members/{member}/edit', [MemberController::class, 'edit'])->name('organization.members.edit');
    Route::post('/organization/members', [MemberController::class, 'store'])->name('organization.members.store');
    Route::get('/organization/members/manage', [MemberController::class, 'manage'])->name('organization.members.manage');
    Route::put('/organization/members/{member}', [MemberController::class, 'update'])->name('organization.members.update');
    Route::get('/organization/members/choice', [MemberController::class, 'choice'])->name('organization.members.choice');
    Route::delete('/organization/members/{member}', [MemberController::class, 'destroy'])->name('organization.members.destroy');

    // Committees
    Route::get('/organization/committees/create', [CommitteeController::class, 'create'])->name('organization.committees.create');
    Route::get('/organization/committees/{committee}/edit', [CommitteeController::class, 'edit'])->name('organization.committees.edit');
    Route::post('/organization/committees', [CommitteeController::class, 'store'])->name('organization.committees.store');
    Route::get('/organization/committees/manage', [CommitteeController::class, 'manage'])->name('organization.committees.manage');
    Route::put('/organization/committees/{committee}', [CommitteeController::class, 'update'])->name('organization.committees.update');
    Route::get('/organization/committees/choice', [CommitteeController::class, 'choice'])->name('organization.committees.choice');

});

Route::get('/organization', function () {
    return Inertia::render('Organization');
})->name('organization');

Route::get('/legal-notice', function () {
    return Inertia::render('LegalNotice');
})->name('legalNotice');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/guideline', [GuidelineController::class, 'index'])->name('guideline');
Route::get('/gallery-photos', [GalleryController::class, 'index'])->name('galleryPhotos');
Route::get('/homepage_features', [HomepageFeaturesController::class, 'index'])->name('home');
Route::get('/event', [EventController::class, 'index'])->name('event');
Route::get('/events/{id}', [EventController::class, 'show'])->name('eventDetail');
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categoryDetail');

require __DIR__ . '/auth.php';
