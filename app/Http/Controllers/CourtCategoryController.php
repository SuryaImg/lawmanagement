<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\CourtCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Throwable;

class CourtCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $court_category =CourtCategory::latest()->get();
        return view('court_category.index', compact('court_category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('court_category.create');
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
            $court_category =CourtCategory::create($data);    
            DB::commit();

            toastr()->addSuccess('Court Category added successfully.');
            return redirect()->route('court_category.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th->getMessage());
            return redirect()->route('court_category.index')
            ->with('error', 'Something went wrong');
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
            return redirect()->route('court_category.index')
            ->with('error', 'Something went wrong');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourtCategory $court_category)
    {
        try {
            // $court_category =CourtCategory::where('id', '=', $court_category->id)->first();
            return view('court_category.edit', compact('court_category'));
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            return redirect()->route('court_category.index')
            ->with('error', 'Something went wrong');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CourtCategory $court_category)
    {

        DB::beginTransaction();

        try {
            $validator = $request->validate([
                'name' => 'required|min:2|max:100'
            ]);
            // dd($court_category);
            // Update the fields
            $data = $request->except(['_token']);
            $court_category->update($data);
    
            DB::commit();

            toastr()->addSuccess('Court Category updated successfully.');
            return redirect()->route('court_category.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th->getMessage());
            return redirect()->route('court_category.index')
            ->with('error', 'Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourtCategory $court_category)
    {
        try {
            $court_category->delete();
            toastr()->addSuccess('Court Category deleted successfully.');
            return redirect()->route('court_category.index');
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            return redirect()->route('court_category.index')
            ->with('error', 'Something went wrong');
        }
    }
    
    public function brand_status(Request $request){
        $updateStatus =CourtCategory::where('id',$request->id)->first();
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
