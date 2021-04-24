<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\ExternalAuthController;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

/**
 * External Login
 */
Route::get('/login/google', [ExternalAuthController::class, 'redirectToGoogleLogin'])->name('login.google');
Route::get('/api/login/google', [ExternalAuthController::class, 'handleGoogleLoginResponse'])->name('api.login.google');
// Route::get('/login/google/set-password', [ExternalAuthController::class, 'redirectGoogleLoginPassword'])->name('login.google.new');
// Route::post('/api/login/google/set-password', [ExternalAuthController::class, 'setGoogleLoginPassword'])->name('api.login.google.new');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');
