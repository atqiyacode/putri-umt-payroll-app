<?php

use App\Http\Controllers\API\ApiDivisionController;
use App\Http\Controllers\API\ApiDurationController;
use App\Http\Controllers\API\ApiPermissionController;
use App\Http\Controllers\API\ApiRoleController;
use App\Http\Controllers\API\ApiStatusTypeController;
use App\Http\Controllers\API\ApiUserController;
use App\Http\Controllers\API\ApiGroupController;
use App\Http\Controllers\API\ApiTagCodeController;
use App\Http\Controllers\API\ApiUnitController;
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

    Route::get('/master-data', function () {
        return Inertia::render('MasterData');
    })->name('master.data');

    // superadmin route
    Route::prefix('master')->group(function () {
        Route::get('statusType', function () {
            return inertia('superadmin/StatusType');
        })->name('statusType.data')->middleware(['role:superAdmin']);
        Route::get('role', function () {
            return inertia('superadmin/Role');
        })->name('role.data')->middleware(['role:superAdmin']);
        Route::get('permission', function () {
            return inertia('superadmin/Permission');
        })->name('permission.data')->middleware(['role:superAdmin']);
        // master data menu
        Route::get('user', function () {
            return inertia('superadmin/User');
        })->name('user.data')->middleware(['role:superAdmin|admin']);
        Route::get('division', function () {
            return inertia('superadmin/Division');
        })->name('division.data')->middleware(['role:superAdmin|admin']);
        Route::get('group', function () {
            return inertia('superadmin/Group');
        })->name('group.data')->middleware(['role:superAdmin|admin']);
        Route::get('unit', function () {
            return inertia('superadmin/Unit');
        })->name('unit.data')->middleware(['role:superAdmin|admin']);
        Route::get('tagCode', function () {
            return inertia('superadmin/TagCode');
        })->name('tagCode.data')->middleware(['role:superAdmin|admin']);
        Route::get('duration', function () {
            return inertia('superadmin/Duration');
        })->name('duration.data')->middleware(['role:superAdmin|admin']);
    });

    // api
    Route::resource('role', ApiRoleController::class)->middleware(['role:superAdmin'])->only(['index', 'store', 'update', 'destroy']);
    Route::resource('permission', ApiPermissionController::class)->middleware(['role:superAdmin'])->only(['index', 'store', 'update', 'destroy']);
    Route::resource('statusType', ApiStatusTypeController::class)->middleware(['role:superAdmin'])->only(['index', 'store', 'update', 'destroy']);
    Route::resource('user', ApiUserController::class)->middleware(['role:superAdmin|admin'])->only(['index', 'store', 'update', 'destroy']);
    Route::resource('division', ApiDivisionController::class)->middleware(['role:superAdmin|admin'])->only(['index', 'store', 'update', 'destroy']);
    Route::resource('group', ApiGroupController::class)->middleware(['role:superAdmin|admin'])->only(['index', 'store', 'update', 'destroy']);
    Route::resource('unit', ApiUnitController::class)->middleware(['role:superAdmin|admin'])->only(['index', 'store', 'update', 'destroy']);
    Route::resource('tagCode', ApiTagCodeController::class)->middleware(['role:superAdmin|admin'])->only(['index', 'store', 'update', 'destroy']);
    Route::resource('duration', ApiDurationController::class)->middleware(['role:superAdmin|admin'])->only(['index', 'store', 'update', 'destroy']);

    // superadmin
});

require __DIR__ . '/auth.php';
