<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Role-based dashboards
Route::middleware(['auth', 'verified'])->group(function () {
    // Admin
    Route::get('/admin/dashboard', fn() => Inertia::render('Admin/Dashboard'))->name('admin.dashboard');

    // Customer
    Route::get('/customer/dashboard', fn() => Inertia::render('Customer/Dashboard'))->name('customer.dashboard');

    // Delivery Staff
    Route::get('/delivery/dashboard', fn() => Inertia::render('DeliveryStaff/Dashboard'))->name('delivery.dashboard');

    // Cashier
    Route::get('/cashier/dashboard', fn() => Inertia::render('Cashier/Dashboard'))->name('cashier.dashboard');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
