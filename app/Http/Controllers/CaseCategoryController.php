<?php

namespace App\Http\Controllers;

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
        return view('case_category.index', compact('case_category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('case_category.create');
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
            $case_category =CaseCategory::create($data);    
            DB::commit();

            toastr()->addSuccess('Case Category added successfully.');
            return redirect()->route('case_category.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th->getMessage());
            return redirect()->route('case_category.index')
            ->with('error', 'Something went wrong');
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
            return redirect()->route('case_category.index')
            ->with('error', 'Something went wrong');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CaseCategory $case_category)
    {
        try {
            // $case_category =CaseCategory::where('id', '=', $case_category->id)->first();
            return view('case_category.edit', compact('case_category'));
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            return redirect()->route('case_category.index')
            ->with('error', 'Something went wrong');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CaseCategory $case_category)
    {
        $validator = $request->validate([
            'name' => 'required|min:2|max:100'
        ]);

        DB::beginTransaction();

        try {
            // dd($case_category);
            // Update the fields
            $data = $request->except(['_token']);
            $case_category->update($data);
    
            DB::commit();

            toastr()->addSuccess('Case Category updated successfully.');
            return redirect()->route('case_category.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th->getMessage());
            return redirect()->route('case_category.index')
            ->with('error', 'Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CaseCategory $case_category)
    {
        try {
            $case_category->delete();
            toastr()->addSuccess('Case Category deleted successfully.');
            return redirect()->route('case_category.index');
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            return redirect()->route('case_category.index')
            ->with('error', 'Something went wrong');
        }
    }
    
    public function brand_status(Request $request){
        $updateStatus =CaseCategory::where('id',$request->id)->first();
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
