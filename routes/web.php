<?php

use App\Http\Controllers\API\ApiPermissionController;
use App\Http\Controllers\API\ApiRoleController;
use App\Http\Controllers\API\ApiUserController;
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
    // superadmin
    Route::resource('role', RoleController::class)->middleware(['role:superadmin'])->only(['index', 'create', 'show', 'edit']);
    Route::resource('permission', PermissionController::class)->middleware(['role:superadmin'])->only(['index', 'create', 'show', 'edit']);
    Route::resource('user', UserController::class)->middleware(['role:superadmin|admin'])->only(['index', 'create', 'show', 'edit']);


    // api
    Route::resource('api-role', ApiRoleController::class)->middleware(['role:superadmin'])->only(['index', 'store', 'update', 'destroy']);
    Route::resource('api-permission', ApiPermissionController::class)->middleware(['role:superadmin'])->only(['index', 'store', 'update', 'destroy']);
    Route::resource('api-user', ApiUserController::class)->middleware(['role:superadmin'])->only(['index', 'store', 'update', 'destroy']);

    // superadmin
});

require __DIR__ . '/auth.php';
