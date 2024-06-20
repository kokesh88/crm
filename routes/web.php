<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\MasterApplicationController;
use App\Http\Controllers\ClientApplicationController;

require __DIR__ . '/auth.php';

Route::redirect('/', '/dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('tasks', TaskController::class)->except(['show']);
    Route::resource('clients', ClientController::class)->except(['index']);
    Route::resource('employees', EmployeeController::class)->except(['index', 'edit', 'update']);

    Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
    Route::get('/progress', [ProgressController::class, 'index'])->name('progress.index');
    Route::get('/history', [HistoryController::class, 'index'])->name('history.index');
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
    Route::get('/analytics', [AnalyticsController::class, 'index'])->name('analytics.index');

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/about', [HomeController::class, 'about'])->name('about');
    Route::get('/prices', [HomeController::class, 'prices'])->name('prices');
    Route::get('/work', [HomeController::class, 'work'])->name('work');
    Route::get('/partners', [HomeController::class, 'partners'])->name('partners');
    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

    // Маршруты для заявок
    Route::resource('applications', ApplicationController::class)->except(['show', 'edit', 'destroy']);
    Route::patch('applications/{application}/update-status', [ApplicationController::class, 'updateStatus'])->name('applications.updateStatus');

    Route::middleware('role:master')->group(function () {
        Route::get('/master/applications', [MasterApplicationController::class, 'index'])->name('master.applications.index');
        Route::delete('/master/applications/{application}', [MasterApplicationController::class, 'destroy'])->name('master.applications.destroy');
        Route::patch('/master/applications/{application}/update-status', [MasterApplicationController::class, 'updateStatus'])->name('master.applications.updateStatus');
    });

    Route::middleware('role:client')->group(function () {
        Route::get('/client/applications', [ClientApplicationController::class, 'index'])->name('client.applications.index');
    });
});

Route::get('/applications/create', [ApplicationController::class, 'create'])->name('applications.create');
Route::post('/applications', [ApplicationController::class, 'store'])->name('applications.store');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
