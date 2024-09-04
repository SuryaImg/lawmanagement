<?php

namespace App\Http\Controllers\Api;

use App\Api\ApiResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\CaseCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Throwable;


class CaseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $case_category =CaseCategory::latest()->get();
        $message = 'Case Category List.';
        return ApiResponse::ok(
            $message,
            $case_category
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'name' => 'required|min:2|max:100'
        ]);
  
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        // dd($request->all());   

        DB::beginTransaction();

        try {
            $data = $request->except(['_token']);
            $case_category =CaseCategory::create($data);    
            DB::commit();

            $message = 'Case Category added successfully.';
            return ApiResponse::ok(
                $message,
                $case_category
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
    public function show(CaseCategory $case_category)
    {
        try {
            $case_category =CaseCategory::where('id', '=', $case_category->id)->first();
            return view('case_category.show', compact('brand'));
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
            $case_category =CaseCategory::where('id', '=', $request->id)->first();

            $message = 'Case Category edit.';
            return ApiResponse::ok(
                $message,
                $case_category
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
        $validator = Validator::make(request()->all(), [
            'id' => 'required',
            'name' => 'required|min:2|max:100'
        ]);
  
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        DB::beginTransaction();

        try {
            // dd($case_category);
            // Update the fields
            $data = $request->except(['_token']);
            $case_category = CaseCategory::find($request->id);
            $case_category->update($data);
    
            DB::commit();

            $message = 'Case Category updated successfully.';
            return ApiResponse::ok(
                $message,
                $case_category
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
            $case_category = CaseCategory::find($request->id);
            $case_category->delete();

            $message = 'Case Category deleted successfully.';
            return ApiResponse::ok(
                $message,
            );
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            return ApiResponse::error($e->getMessage());
        }
    }
}

