<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Cases;
use App\Models\CaseCategory;
use App\Models\CaseStage;
use App\Models\CourtCategory;
use App\Models\Court;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Throwable;

class CaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cases =Cases::with('case_category','court_category','court','staff')->latest()->get();
        return view('cases.index', compact('cases'));
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
        return view('cases.create', compact('case_category','case_stage','court_category','user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());  
        $validator = $request->validate([
            // 'type' => 'required',
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
            // 'filling_date' => 'required',
            // 'hearing_date' => 'required',
            // 'judgement_date' => 'required',
            'description' => 'required'
        ]); 
        DB::beginTransaction();

        try {
            $data = $request->except(['_token']);
            $cases =Cases::create($data);    
            DB::commit();

            toastr()->addSuccess('Case Stage added successfully.');
            return redirect()->route('cases.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th->getMessage());
            return redirect()->route('cases.index')
            ->with('error', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Cases $cases)
    {
        try {
            $cases =Cases::where('id', '=', $cases->id)->first();
            return view('cases.show', compact('brand'));
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            return redirect()->route('cases.index')
            ->with('error', 'Something went wrong');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cases $case)
    {
        try {
            $case_category =CaseCategory::latest()->get();
            $case_stage =CaseStage::latest()->get();
            $court_category =CourtCategory::latest()->get();
            $user = User::latest()->get();
            return view('cases.edit', compact('case','case_category','case_stage','court_category','user'));
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            return redirect()->route('cases.index')
            ->with('error', 'Something went wrong');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cases $cases)
    {
        $validator = $request->validate([
            // 'type' => 'required',
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
            // 'filling_date' => 'required',
            // 'hearing_date' => 'required',
            // 'judgement_date' => 'required',
            'description' => 'required'
        ]); 

        DB::beginTransaction();

        try {
            // dd($cases);
            // Update the fields
            $data = $request->except(['_token']);
            $cases->update($data);
    
            DB::commit();

            toastr()->addSuccess('Case Stage updated successfully.');
            return redirect()->route('cases.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th->getMessage());
            return redirect()->route('cases.index')
            ->with('error', 'Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cases $cases)
    {
        try {
            $cases->delete();
            toastr()->addSuccess('Case Stage deleted successfully.');
            return redirect()->route('cases.index');
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            return redirect()->route('cases.index')
            ->with('error', 'Something went wrong');
        }
    }
    
    public function courtlist(Request $request){
        $updateStatus =Court::where('court_category_id',$request->id)->get();
        return response()->json($updateStatus);
    }
}
