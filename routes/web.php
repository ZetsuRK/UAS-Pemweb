<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\Auth\GoogleController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Google
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// GitHub
Route::get('auth/github', [SocialiteController::class, 'redirectToGitHub']);
Route::get('auth/github/callback', [SocialiteController::class, 'handleGitHubCallback']);

// Microsoft
Route::get('auth/microsoft', [SocialiteController::class, 'redirectToMicrosoft']);
Route::get('auth/microsoft/callback', [SocialiteController::class, 'handleMicrosoftCallback']);

// Redirect berdasarkan role
Route::get('/redirect-by-role', function () {
    $user = Auth::user();

    return match ($user->role) {
        'admin' => redirect('/admin/dashboard'),
        'editor' => redirect('/editor/berita'),
        'wartawan' => redirect('/wartawan/berita'),
        default => abort(403),
    };
})->middleware('auth');

// Route-role-based
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', fn() => view('admin.dashboard'));
});

Route::middleware(['auth', 'role:wartawan'])->group(function () {
    Route::get('/berita/tulis', fn() => view('wartawan.tulis'));
});

Route::middleware(['auth', 'role:editor'])->group(function () {
    Route::get('/editor/dashboard', fn() => view('editor.dashboard'));
});

Route::get('/check-auth', function () {
    dd(Auth::check(), Auth::user());
});

// Wartawan (tulis berita)
Route::middleware(['auth', 'role:wartawan'])->group(function () {
    Route::resource('/berita', \App\Http\Controllers\Wartawan\BeritaController::class);
});

// Editor (approval berita)
Route::middleware(['auth', 'role:editor'])->group(function () {
    Route::get('/editor/berita', [\App\Http\Controllers\Editor\BeritaApprovalController::class, 'index']);
    Route::patch('/editor/berita/{berita}/approve', [\App\Http\Controllers\Editor\BeritaApprovalController::class, 'approve']);
    Route::patch('/editor/berita/{berita}/reject', [\App\Http\Controllers\Editor\BeritaApprovalController::class, 'reject']);
});

use App\Http\Controllers\BeritaController;

Route::middleware(['auth', 'role:wartawan'])->prefix('berita')->group(function () {
    Route::get('/', [BeritaController::class, 'index'])->name('berita.index');
    Route::get('/create', [BeritaController::class, 'create'])->name('berita.create');
    Route::post('/', [BeritaController::class, 'store'])->name('berita.store');
    Route::get('/{id}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
    Route::put('/{id}', [BeritaController::class, 'update'])->name('berita.update');
    Route::delete('/{id}', [BeritaController::class, 'destroy'])->name('berita.destroy');
});

require __DIR__.'/auth.php';
