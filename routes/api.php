<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CourtCategoryController;
use App\Http\Controllers\Api\CourtController;
use App\Http\Controllers\Api\CaseCategoryController;
use App\Http\Controllers\Api\CaseStageController;
use App\Http\Controllers\Api\CaseController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::group([
'middleware' => ['auth:api']
], function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/refresh', [AuthController::class, 'refresh'])->name('refresh');
    Route::get('/me', [AuthController::class, 'me'])->name('me');
    
    Route::get('court-category/index', [CourtCategoryController::class, 'index']);
    Route::get('court-category/edit', [CourtCategoryController::class, 'edit']);
    Route::post('court-category/store', [CourtCategoryController::class, 'store']);
    Route::post('court-category/update', [CourtCategoryController::class, 'update']);
    Route::post('court-category/destroy', [CourtCategoryController::class, 'destroy']);


    // Route::resource('court', CourtController::class);
    Route::get('court/index', [CourtController::class, 'index']);
    Route::get('court/create', [CourtController::class, 'create']);
    Route::get('court/edit', [CourtController::class, 'edit']);
    Route::post('court/store', [CourtController::class, 'store']);
    Route::post('court/update', [CourtController::class, 'update']);
    Route::post('court/destroy', [CourtController::class, 'destroy']);


    // Route::resource('case-category', CaseCategoryController::class);
    Route::get('case-category/index', [CaseCategoryController::class, 'index']);
    Route::get('case-category/edit', [CaseCategoryController::class, 'edit']);
    Route::post('case-category/store', [CaseCategoryController::class, 'store']);
    Route::post('case-category/update', [CaseCategoryController::class, 'update']);
    Route::post('case-category/destroy', [CaseCategoryController::class, 'destroy']);


    // Route::resource('case-stage', CaseStageController::class);
    Route::get('case-stage/index', [CaseStageController::class, 'index']);
    Route::get('case-stage/edit', [CaseStageController::class, 'edit']);
    Route::post('case-stage/store', [CaseStageController::class, 'store']);
    Route::post('case-stage/update', [CaseStageController::class, 'update']);
    Route::post('case-stage/destroy', [CaseStageController::class, 'destroy']);


    // Route::resource('cases', CaseController::class);
    Route::get('cases/index', [CaseController::class, 'index']);
    Route::get('cases/create', [CaseController::class, 'create']);
    Route::get('cases/edit', [CaseController::class, 'edit']);
    Route::post('cases/store', [CaseController::class, 'store']);
    Route::post('cases/update', [CaseController::class, 'update']);
    Route::post('cases/courtlist', [CaseController::class, 'courtlist']);
    Route::post('cases/destroy', [CaseController::class, 'destroy']);
});