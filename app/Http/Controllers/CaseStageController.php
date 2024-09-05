<?php

namespace App\Http\Controllers;

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
        return view('case_stage.index', compact('case_stage'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('case_stage.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|min:2|max:100'
        ]);
        // dd($request->all());   

        DB::beginTransaction();

        try {
            $data = $request->except(['_token']);
            $case_stage =CaseStage::create($data);    
            DB::commit();

            toastr()->addSuccess('Case Stage added successfully.');
            return redirect()->route('case_stage.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th->getMessage());
            return redirect()->route('case_stage.index')
            ->with('error', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CaseStage $case_stage)
    {
        try {
            $case_stage =CaseStage::where('id', '=', $case_stage->id)->first();
            return view('case_stage.show', compact('brand'));
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            return redirect()->route('case_stage.index')
            ->with('error', 'Something went wrong');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CaseStage $case_stage)
    {
        try {
            // $case_stage =CaseStage::where('id', '=', $case_stage->id)->first();
            return view('case_stage.edit', compact('case_stage'));
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            return redirect()->route('case_stage.index')
            ->with('error', 'Something went wrong');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CaseStage $case_stage)
    {
        $validator = $request->validate([
            'name' => 'required|min:2|max:100'
        ]);

        DB::beginTransaction();

        try {
            // dd($case_stage);
            // Update the fields
            $data = $request->except(['_token']);
            $case_stage->update($data);
    
            DB::commit();

            toastr()->addSuccess('Case Stage updated successfully.');
            return redirect()->route('case_stage.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th->getMessage());
            return redirect()->route('case_stage.index')
            ->with('error', 'Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CaseStage $case_stage)
    {
        try {
            $case_stage->delete();
            toastr()->addSuccess('Case Stage deleted successfully.');
            return redirect()->route('case_stage.index');
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            return redirect()->route('case_stage.index')
            ->with('error', 'Something went wrong');
        }
    }
    
    public function brand_status(Request $request){
        $updateStatus =CaseStage::where('id',$request->id)->first();
        if ($updateStatus) {
            if ($request->status == 0) {
                $status = 1;
            }else{
                $status = 0;
            }
            $updateStatus->status = $status;
            $updateStatus->save();
        }
        return response()->json($updateStatus);
       
    }
}