<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee; // Sesuaikan dengan model Anda
use App\Models\Employee_record;

class DashboardController extends Controller
{
    public function index()
    {
        $employees = Employee::with('familyDate')->paginate(10);
        $totalEmployees = Employee::count();
        $totalRecords = Employee_record::count(); // Pastikan ini ada
        $recentActivity = Employee_record::orderBy('offense_date', 'desc')->take(5)->get();

        return view('admin.home', compact('employees', 'totalEmployees', 'totalRecords', 'recentActivity'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }
}
