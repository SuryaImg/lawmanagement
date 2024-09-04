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
    
    Route::resource('court_category', CourtCategoryController::class);
    Route::post('court_category/store', [CourtCategoryController::class, 'store']);
    Route::post('court_category/update', [CourtCategoryController::class, 'update']);
    Route::post('court_category/destroy', [CourtCategoryController::class, 'destroy']);
    Route::post('court_category/destroy-image', [CourtCategoryController::class, 'destroy_image']);


    Route::resource('court', CourtController::class);
    Route::post('court/store', [CourtController::class, 'store']);
    Route::post('court/update', [CourtController::class, 'update']);
    Route::post('court/destroy', [CourtController::class, 'destroy']);
    Route::post('court/destroy-image', [CourtController::class, 'destroy_image']);


    Route::resource('case_category', CaseCategoryController::class);
    Route::post('case_category/store', [CaseCategoryController::class, 'store']);
    Route::post('case_category/update', [CaseCategoryController::class, 'update']);
    Route::post('case_category/destroy', [CaseCategoryController::class, 'destroy']);
    Route::post('case_category/destroy-image', [CaseCategoryController::class, 'destroy_image']);


    Route::resource('case_stage', CaseStageController::class);
    Route::post('case_stage/store', [CaseStageController::class, 'store']);
    Route::post('case_stage/update', [CaseStageController::class, 'update']);
    Route::post('case_stage/destroy', [CaseStageController::class, 'destroy']);
    Route::post('case_stage/destroy-image', [CaseStageController::class, 'destroy_image']);


    Route::resource('cases', CaseController::class);
    Route::post('cases/store', [CaseController::class, 'store']);
    Route::post('cases/update', [CaseController::class, 'update']);
    Route::post('cases/destroy', [CaseController::class, 'destroy']);
    Route::post('cases/destroy-image', [CaseController::class, 'destroy_image']);
});