<?php

namespace App\Http\Controllers\Api;

use App\Api\ApiResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\CaseStage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Throwable;  

class CaseStageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $case_stage =CaseStage::latest()->get();
        $message = 'Case Stage List.';
        return ApiResponse::ok(
            $message,
            $case_stage
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
            $case_stage =CaseStage::create($data);    
            DB::commit();
            $message = 'Case Stage added successfully.';
            return ApiResponse::ok(
                $message,
                $case_stage
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
    public function show(Request $request)
    {
        try {
            $case_stage =CaseStage::where('id', '=', $request->id)->first();
            return view('case_stage.show', compact('brand'));
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
            $case_stage =CaseStage::where('id', '=', $request->id)->first();
            $message = 'Case Stage edit details.';
            return ApiResponse::ok(
                $message,
                $case_stage
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
            // dd($case_stage);
            // Update the fields
            $data = $request->except(['_token']);
            $case_stage =CaseStage::find($request->id);
            $case_stage->update($data);
    
            DB::commit();
            $message = 'Case Stage updated successfully.';
            return ApiResponse::ok(
                $message,
                $case_stage
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
            $case_stage =CaseStage::find($request->id);
            $case_stage->delete();
      
            // return response()->json($user, 201);
            $message = 'Case Stage deleted successfully.';
            return ApiResponse::ok(
                $message,
            );
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            return ApiResponse::error($e->getMessage());
        }
    }
}
