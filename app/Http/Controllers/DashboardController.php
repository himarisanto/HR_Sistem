<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Employee_record;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch employees and their associated family date records
        $employees = Employee::with('familyDate')->paginate(10);
        
        // Calculate the total number of employees and records
        $totalEmployees = Employee::count();
        $totalRecords = Employee_record::count();

        // Fetch recent activity from employee records
        $recentActivity = Employee_record::orderBy('offense_date', 'desc')->take(5)->get();
        
       
        $upcomingBirthdays = Employee::whereMonth('birth_date', '>=', Carbon::now()->month)
            ->whereDay('birth_date', '>=', Carbon::now()->day)
            ->whereMonth('birth_date', '<=', Carbon::now()->addDays(30)->month)
            ->orderByRaw("DATE_FORMAT(birth_date, '%m-%d')")
            ->get();

        return view('admin.home', compact('employees', 'totalEmployees', 'totalRecords', 'recentActivity', 'upcomingBirthdays'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }
}
