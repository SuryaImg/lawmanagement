<?php

namespace App\Http\Controllers;

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
        return view('court.index', compact('court'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $court_category =CourtCategory::latest()->get();
        return view('court.create', compact('court_category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'court_category_id' => 'required',
            'location' => 'required',
            'court_name' => 'required',
        ]);
        // dd($request->all());   

        DB::beginTransaction();

        try {
            $data = $request->except(['_token']);
            $court =Court::create($data);    
            DB::commit();

            toastr()->addSuccess('Court added successfully.');
            return redirect()->route('courts.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th->getMessage());
            return redirect()->route('courts.index')
            ->with('error', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Court $court)
    {
        try {
            $court =Court::where('id', '=', $court->id)->first();
            return view('court.show', compact('court'));
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            return redirect()->route('courts.index')
            ->with('error', 'Something went wrong');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Court $court)
    {
        try {
            // $court =Court::where('id', '=', $court->id)->first();
            $court_category =CourtCategory::latest()->get();
            return view('court.edit', compact('court','court_category'));
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            return redirect()->route('courts.index')
            ->with('error', 'Something went wrong');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Court $court)
    {
        $validator = $request->validate([
            'court_category_id' => 'required',
            'location' => 'required',
            'court_name' => 'required',
        ]);

        DB::beginTransaction();

        try {
            // dd($court);
            // Update the fields
            $data = $request->except(['_token']);
            $court->update($data);
    
            DB::commit();

            toastr()->addSuccess('Court updated successfully.');
            return redirect()->route('courts.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th->getMessage());
            return redirect()->route('courts.index')
            ->with('error', 'Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Court $court)
    {
        try {
            $court->delete();
            toastr()->addSuccess('Court deleted successfully.');
            return redirect()->route('courts.index');
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            return redirect()->route('courts.index')
            ->with('error', 'Something went wrong');
        }
    }
    
    public function brand_status(Request $request){
        $updateStatus =Court::where('id',$request->id)->first();
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
