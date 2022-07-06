<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return redirect('dashboard');
});


Route::middleware(['auth', 'verified'])->group(function () {
    // dashboard
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    // superadmin route
    Route::prefix('admin')->group(function () {
        // superadmin
        Route::resource('role', RoleController::class)->middleware(['role:superadmin']);
        Route::resource('permission', PermissionController::class)->middleware(['role:superadmin']);
        Route::resource('user', UserController::class)->middleware(['role:superadmin|admin']);
    });
});

require __DIR__ . '/auth.php';
