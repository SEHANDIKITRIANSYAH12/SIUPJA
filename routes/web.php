<?php

use Illuminate\Support\Facades\Route;

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

// Landing Page
Route::get('/', function () {
    return view('frontend.welcome');
})->name('/');

Route::group(['middleware' => ['auth']], function () {

    // Home
    Route::group(['prefix' => 'home', 'as' => 'home.'], function () {
        Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('index');
    });

    Route::group(['middleware' => ['role:Administrator']], function () {
        Route::group(['prefix' => 'users',  'as' => 'users.'], function () {
            Route::resource('/', \App\Http\Controllers\UserController::class);
        });
        // Route untuk pengaturan sistem
        Route::get('system/settings', [\App\Http\Controllers\SystemSettingsController::class, 'index'])->name('system.settings');
        Route::post('system/settings', [\App\Http\Controllers\SystemSettingsController::class, 'update'])->name('system.settings.update');
        Route::post('system/settings/password', [\App\Http\Controllers\SystemSettingsController::class, 'password'])->name('system.settings.password');
        Route::post('system/settings/avatar', [\App\Http\Controllers\SystemSettingsController::class, 'avatar'])->name('system.settings.avatar');
    });

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
    Route::post('profile/update', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::post('profile/password', [\App\Http\Controllers\ProfileController::class, 'password'])->name('profile.password');
    Route::post('profile/avatar', [\App\Http\Controllers\ProfileController::class, 'avatar'])->name('profile.avatar');
});

Route::group(['middleware' => ['auth', 'role:Administrator'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('tools', \App\Http\Controllers\Admin\ToolController::class);
    Route::resource('loans', \App\Http\Controllers\Admin\LoanController::class)->only(['index', 'show', 'update']);
    Route::resource('returns', \App\Http\Controllers\Admin\ReturnController::class)->only(['index', 'show', 'update']);
    Route::get('reports', [\App\Http\Controllers\Admin\ReportController::class, 'index'])->name('reports.index');
    Route::get('reports/pdf', [\App\Http\Controllers\Admin\ReportController::class, 'exportPdf'])->name('reports.exportPdf');
});

Route::group(['middleware' => ['auth', 'role:Member'], 'prefix' => 'member', 'as' => 'member.'], function () {
    Route::get('dashboard', [\App\Http\Controllers\Member\DashboardController::class, 'index'])->name('dashboard');
    Route::get('tools', [\App\Http\Controllers\Member\ToolController::class, 'index'])->name('tools.index');
    Route::get('loans', [\App\Http\Controllers\Member\LoanController::class, 'index'])->name('loans.index');
    Route::get('loans/create', [\App\Http\Controllers\Member\LoanController::class, 'create'])->name('loans.create');
    Route::post('loans', [\App\Http\Controllers\Member\LoanController::class, 'store'])->name('loans.store');
    Route::get('returns/create', [\App\Http\Controllers\Member\ReturnController::class, 'create'])->name('returns.create');
    Route::post('returns', [\App\Http\Controllers\Member\ReturnController::class, 'store'])->name('returns.store');
    Route::get('loans/{loan}/download-pdf', [\App\Http\Controllers\Member\LoanController::class, 'downloadPdf'])->name('loans.downloadPdf');
});

require __DIR__ . '/auth.php';
