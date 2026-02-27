<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColocationController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/mycolocation', [ColocationController::class, 'mycolocation'])->name('mycolocation');
    Route::get('/mycolocation/new', [ColocationController::class, 'colocationForm']);
    Route::post('/addColocation', [ColocationController::class, 'createColocation']);
    Route::get('/colocation/{token}', [ColocationController::class, 'currentColocation']);
    Route::post('/join', [MembershipController::class, 'join']);
    Route::post('/addCategory', [CategoryController::class, 'add']);
    Route::post('/addExpense', [ExpenseController::class, 'add']);
});

require __DIR__.'/auth.php';
