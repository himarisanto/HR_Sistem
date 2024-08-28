<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee; // Sesuaikan dengan model Anda

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Ambil pencarian dari query string
        $search = $request->get('search');

        // Ambil data karyawan yang sesuai dengan pencarian
        $employees = Employee::when($search, function ($query, $search) {
            return $query->where('full_name', 'like', "%{$search}%");
        })->get();

        // Ambil data untuk dasbor
        $recentActivities = []; // Ganti dengan data aktivitas terbaru
        $topPerformers = []; // Ganti dengan data performer terbaik
        $birthdayAlerts = []; // Ganti dengan data ulang tahun

        // Hitung jumlah karyawan
        $totalEmployees = $employees->count();

        return view('admin.home', compact('recentActivities', 'topPerformers', 'birthdayAlerts', 'totalEmployees'));
    }
}
