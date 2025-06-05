<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SoftwareController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Assets routes with permissions
    Route::middleware(['permission:manage-assets'])->group(function () {
        Route::resource('assets', AssetController::class);
    });

    // Software routes with permissions
    Route::middleware(['permission:manage-software'])->group(function () {
        Route::resource('software', SoftwareController::class);
    });

    // Categories routes with permissions
    Route::middleware(['permission:manage-categories'])->group(function () {
        Route::resource('categories', CategoryController::class);
    });

    // Settings Routes with permissions
    Route::middleware(['permission:manage-settings'])->prefix('settings')->group(function () {
        Route::get('/', [SettingsController::class, 'index'])->name('settings.index');
        Route::get('/general', [SettingsController::class, 'general'])->name('settings.general');
        Route::get('/customizations', [SettingsController::class, 'customizations'])->name('settings.customizations');
        Route::get('/integrations', [SettingsController::class, 'integrations'])->name('settings.integrations');
        Route::get('/workflows', [SettingsController::class, 'workflows'])->name('settings.workflows');
        Route::get('/notifications', [SettingsController::class, 'notifications'])->name('settings.notifications');
        Route::get('/maintenance', [SettingsController::class, 'maintenance'])->name('settings.maintenance');
        Route::get('/system-logs', [SettingsController::class, 'systemLogs'])->name('settings.system-logs');
    });
});

// Admin only routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('users', UserController::class);
});
