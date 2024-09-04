<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Cases;
use App\Models\CaseCategory;
use App\Models\CaseStage;
use App\Models\CourtCategory;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;
use App\Api\ApiResponse;
use Illuminate\Support\Facades\Validator;

class CaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cases =Cases::with('case_category','court_category','court','staff')->latest()->get();
      
        // return response()->json($user, 201);
        $message = 'Get Data Successfully';
        return ApiResponse::ok(
            $message,
            $cases
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $case_category =CaseCategory::latest()->get();
        $case_stage =CaseStage::latest()->get();
        $court_category =CourtCategory::latest()->get();
        $user = User::latest()->get();
        $data = array(
            $case_category,
            $case_stage,
            $court_category,
            $user,
        );
        // return response()->json($user, 201);
        $message = 'Get Data Successfully';
        return ApiResponse::ok(
            $message,
            $data
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'type' => 'required',
            'p_r_name' => 'required',
            'p_r_advocate' => 'required',
            'title' => 'required',
            'case_category_id' => 'required',
            'court_category_id' => 'required',
            'court_id' => 'required',
            'staff_id' => 'required',
            'stage_id' => 'required',
            'opp_lawyer' => 'required',
            'case_no' => 'required',
            'case_file_no' => 'required',
            'acts' => 'required',
            'case_charge' => 'required',
            'receiving_date' => 'required',
            'filling_date' => 'required',
            'hearing_date' => 'required',
            'judgement_date' => 'required',
            'description' => 'required'
        ]);
  
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        // dd($request->all());   

        DB::beginTransaction();

        try {
            $data = $request->except(['_token']);
            $cases =Cases::create($data);    
            DB::commit();
      
            // return response()->json($user, 201);
            $message = 'Data Added Successfully';
            return ApiResponse::ok(
                $message,
                $cases
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
    public function show(Cases $cases)
    {
        try {
            $cases =Cases::where('id', '=', $cases->id)->first();
            // return response()->json($user, 201);
            $message = 'Get Data Successfully';
            return ApiResponse::ok(
                $message,
                $cases
            );
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
            $case_category =CaseCategory::latest()->get();
            $case_stage =CaseStage::latest()->get();
            $court_category =CourtCategory::latest()->get();
            $user = User::latest()->get();
            $cases = Cases::where("id",$request->id)->first();
            $data = array(
                $case_category,
                $case_stage,
                $court_category,
                $user,
                $cases,
            );
            // return response()->json($user, 201);
            $message = 'Get Data Successfully';
            return ApiResponse::ok(
                $message,
                $data
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
            // dd($cases);
            // Update the fields
            $data = $request->except(['_token']);
            $cases = Cases::find($request->id);
            $cases->update($data);
    
            DB::commit();
            $message = 'Get Data Successfully';
            return ApiResponse::ok(
                $message,
                $cases
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
            $cases = Cases::find($request->id);
            $cases->delete();
            $message = 'Case deleted successfully';
            return ApiResponse::ok(
                $message,
                $cases
            );
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            return ApiResponse::error($e->getMessage());
        }
    }
}

