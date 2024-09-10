<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourtCategoryController;
use App\Http\Controllers\CourtController;
use App\Http\Controllers\CaseCategoryController;
use App\Http\Controllers\CaseStageController;
use App\Http\Controllers\CaseController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','verify_admin','revalidate'])->name('dashboard');

Route::middleware(['auth','verify_admin','revalidate'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Our resource routes
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('court_category', CourtCategoryController::class);
    Route::resource('courts', CourtController::class);
    Route::post('courts/city', [CourtController::class, 'projectcity'])->name('projectcity');
    Route::resource('case_category', CaseCategoryController::class);
    Route::resource('case_stage', CaseStageController::class);
    Route::resource('cases', CaseController::class);
    Route::post('cases/courtlist', [CaseController::class, 'courtlist'])->name('courtlist');
    Route::post('cases/replaceImage', [CaseController::class, 'replaceImage'])->name('replaceImage');
});

require __DIR__.'/auth.php';
