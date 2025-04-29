<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\JobCardApproval;
use App\Http\Livewire\JobCardForm;
use App\Http\Livewire\JobCardReports;

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
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/approvals', JobCardApproval::class);
    Route::get('/reports', JobCardReports::class);
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/create-job-card', JobCardForm::class);
});

require __DIR__.'/auth.php';
