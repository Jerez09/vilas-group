<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController; /* TODO: Move this controller to the Auth folder */
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Email\ContactController;
use App\Http\Controllers\Luxury\LuxuryController;
use App\Http\Controllers\Property\PropertyController;
use App\Http\Controllers\Property\CreatePropertyController;

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
// Language redirection
Route::redirect('/', '/es/home');
Route::redirect('/policy', '/es/policy');
Route::redirect('/properties', '/es/properties');
Route::redirect('/properties/{slug}', '/es/properties/{slug}');
Route::redirect('/properties/{id}', '/es/properties/{id}');
Route::redirect('/properties/create', '/es/properties/create');
Route::redirect('/properties/edit/{id}', '/es/properties/edit/{id}');

Route::redirect('/luxuries', '/es/luxuries');
Route::redirect('/luxuries/{slug}', '/es/luxuries/{slug}');
Route::redirect('/luxuries/{id}', '/es/luxuries/{id}');
Route::redirect('/luxuries/create', '/es/luxuries/create');
Route::redirect('/luxuries/edit/{id}', '/es/luxuries/edit/{id}');

Route::redirect('/es/login', '/login');
Route::redirect('/en/login', '/login');
Route::redirect('/es/register', '/register');
Route::redirect('/en/register', '/register');
Route::redirect('/es/password-reset', '/password-reset');
Route::redirect('/en/password-reset', '/password-reset');

Route::get('/foo', function () {
    Artisan::call('storage:link');
});

// Register routes
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

// Login routes
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

// Reset password
Route::get('/password-reset', [LoginController::class, 'index'])->name('password-reset');
Route::post('/password-reset', [LoginController::class, 'store']);

// Log out
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::group(['prefix' => '{locale}', 'where' => ['locale' => '[a-zA-Z]{2}']], function () {
    // Home
    Route::get('/home', function () {
        return view('pages.home');
    })->name('home');

    Route::get('/policy', function () {
        return view('pages.policy');
    })->name('policy');

    Route::post('/contact', [ContactController::class, 'index'])->name('contact');

    // Create and Edit property pages
    Route::get('/properties/create', [CreatePropertyController::class, 'index'])->name('properties.create');
    Route::get('/properties/edit/{id}', [CreatePropertyController::class, 'show'])->name('properties.edit');

    // Properties Routes
    Route::get('/properties', [PropertyController::class, 'index'])->name('properties');
    Route::post('/properties', [PropertyController::class, 'store']);
    Route::get('/properties/{slug}', [PropertyController::class, 'show'])->name('properties.show');

    Route::put('/properties/{id}', [PropertyController::class, 'update'])->name('properties.update');
    Route::delete('/properties/{id}', [PropertyController::class, 'destroy'])->name('properties.destroy');

    // Create and Edit property pages
    Route::get('/luxuries/create', [LuxuryController::class, 'create'])->name('luxuries.create');
    Route::get('/luxuries/edit/{id}', [LuxuryController::class, 'edit'])->name('luxuries.edit');

    // Luxuries Routes
    Route::get('/luxuries', [LuxuryController::class, 'index'])->name('luxuries');
    Route::post('/luxuries', [LuxuryController::class, 'store']);
    Route::get('/luxuries/{slug}', [LuxuryController::class, 'show'])->name('luxuries.show');

    Route::put('/luxuries/{id}', [LuxuryController::class, 'update'])->name('luxuries.update');
    Route::delete('/luxuries/{id}', [LuxuryController::class, 'destroy'])->name('luxuries.destroy');
});

Auth::routes();
