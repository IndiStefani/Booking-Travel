<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/', [Controller::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('profile')->middleware('auth')->group(function () {
    Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/delete', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('user')->middleware('auth')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::get('/view', [UserController::class, 'index_profile'])->name('profile.view');
    Route::get('/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');
});

Route::prefix('driver')->middleware('auth')->group(function () {
    Route::get('/', [DriverController::class, 'index'])->name('driver.index');
    Route::get('/create', [DriverController::class, 'create'])->name('driver.create');
    Route::post('/store', [DriverController::class, 'store'])->name('driver.store');
    Route::get('/edit/{id}', [DriverController::class, 'edit'])->name('driver.edit');
    Route::put('/update/{id}', [DriverController::class, 'update'])->name('driver.update');
    Route::delete('/delete/{id}', [DriverController::class, 'destroy'])->name('driver.destroy');
});

Route::get('/profile', [ProfileController::class, 'profile'])->name('profile.index');
Route::get('/pages/table', [PagesController::class, 'table'])->name('tables.view');
Route::get('/pages/billing', [PagesController::class, 'billing'])->name('billing.view');
Route::get('/pages/notifications', [PagesController::class, 'notifications'])->name('notifications.view');


require __DIR__ . '/auth.php';
