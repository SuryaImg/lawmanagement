<?php

namespace App\Http\Controllers\Api;

use App\Api\ApiResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\CourtCategory;
use App\Models\Court;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Throwable;

class CourtController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $court =Court::latest()->get();

        $message = 'Case Category updated successfully.';
        return ApiResponse::ok(
            $message,
            $court
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $court_category =CourtCategory::latest()->get();

        $message = 'Case Category list.';
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
            $court =Court::create($data);    
            DB::commit();

            $message = 'Court added successfully.';
            return ApiResponse::ok(
                $message,
                $court
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
    public function show(Court $court)
    {
        try {
            $court =Court::where('id', '=', $court->id)->first();
            return view('court.show', compact('brand'));
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
            $court =Court::where('id', '=', $request->id)->first();
            $court_category =CourtCategory::latest()->get();
            $data = array(
                $court,
                $court_category
            );
            $message = 'Court edit.';
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
            // dd($court);
            // Update the fields
            $data = $request->except(['_token']);
            $court = Court::find($request->id);
            $court->update($data);
    
            DB::commit();
            $message = 'Court updated successfully.';
            return ApiResponse::ok(
                $message,
                $court
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
            $court = Court::find($request->id);
            $court->delete();
            $message = 'Court deleted successfully.';
            return ApiResponse::ok(
                $message
            );
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            return ApiResponse::error($e->getMessage());
        }
    }
}