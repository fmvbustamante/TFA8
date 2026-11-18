<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
require __DIR__.'/auth.php';

Route::middleware('auth')->group(function (): void {
    Route::resource('customers', CustomerController::class)->only(['index', 'create', 'store', 'edit', 'update']);
    Route::resource('users', UserController::class)->only(['index', 'create', 'store', 'edit', 'update']);
});
