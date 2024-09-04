<?php

namespace App\Http\Controllers\Api;

use App\Api\ApiResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\CourtCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class CourtCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $court_category =CourtCategory::latest()->get();
    
        DB::commit();
        $message = 'Court Category List.';
        return ApiResponse::ok(
            $message,
            $court_category
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());   

        DB::beginTransaction();

        try {
            $data = $request->except(['_token']);
            $court_category =CourtCategory::create($data);    
            DB::commit();

            $message = 'Court Category added.';
            return ApiResponse::ok(
                $message,
                $court_category
            );
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th->getMessage());
            return ApiResponse::error($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CourtCategory $court_category)
    {
        try {
            $court_category =CourtCategory::where('id', '=', $court_category->id)->first();
            return view('court_category.show', compact('brand'));
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            return ApiResponse::error($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        try {
            $court_category =CourtCategory::where('id', '=', $request->id)->first();
            $message = 'Court Category edit List.';
            return ApiResponse::ok(
                $message,
                $court_category
            );
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            return ApiResponse::error($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        DB::beginTransaction();

        try {
            // dd($court_category);
            // Update the fields
            $data = $request->except(['_token']);
            $court_category = CourtCategory::find($request->id);
            $court_category->update($data);
    
            DB::commit();
            $message = 'Court Category  updated successfully.';
            return ApiResponse::ok(
                $message,
                $court_category
            );
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th->getMessage());
            return ApiResponse::error($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $court_category = CourtCategory::find($request->id);
            $court_category->delete();
            $message = 'Court Category deleted successfully.';
            return ApiResponse::ok(
                $message,
                $court_category
            );
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            return ApiResponse::error($e->getMessage());
        }
    }
}

