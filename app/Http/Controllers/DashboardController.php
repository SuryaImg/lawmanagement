<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cases;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $date = \Carbon\Carbon::today()->subDays(7);
        $cases =Cases::where('created_at','>=',$date)->get();
        $all_cases =Cases::count();
        $cases_count = Cases::where('created_at','>=',\Carbon\Carbon::today()->subDays(1))->count();
        $users_count = User::where('created_at','>=',\Carbon\Carbon::today()->subDays(1))->count();
        $all_users = User::count();
        return view('dashboard', compact('cases','cases_count','users_count','all_cases','all_users'));
    }
}
