<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Employee_record;
use Illuminate\Http\Request;

class EmployeeRecordController extends Controller
{
    public function index()
    {
        $records = Employee_record::with('employee')->get(); // Eager load the employee relationship
        return view('pelanggaran.index', compact('records'));
    }

    public function create()
    {
        $employees = Employee::all(); // Fetch all employees to use in the form
        return view('pelanggaran.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_number' => 'required|exists:employees,id_number', // Validate that id_number exists in employees table
            'offense_type' => 'required|string',
            'offense_date' => 'required|date',
            'description' => 'nullable|string',
        ]);

        $pelanggaran = new Employee_record();
        $pelanggaran->id_number = $request->id_number;
        $pelanggaran->offense_type = $request->offense_type;
        $pelanggaran->offense_date = $request->offense_date;
        $pelanggaran->description = $request->description;
        $pelanggaran->save();

        return redirect()->route('pelanggaran.index')->with('success', 'Employee record created successfully.');
    }

    public function edit($id_number)
    {
        $pelanggaran = Employee_record::where('id_number', $id_number)->firstOrFail();
        $employees = Employee::all(); // Fetch all employees to use in the form

        return view('pelanggaran.edit', compact('pelanggaran', 'employees'));
    }

    public function update(Request $request, $id_number)
    {
        $request->validate([
            'id_number' => 'required|exists:employees,id_number', // Validate that id_number exists in employees table
            'offense_type' => 'required|string',
            'offense_date' => 'required|date',
            'description' => 'nullable|string',
        ]);

        $pelanggaran = Employee_record::where('id_number', $id_number)->firstOrFail();

        $pelanggaran->id_number = $request->id_number;
        $pelanggaran->offense_type = $request->offense_type;
        $pelanggaran->offense_date = $request->offense_date;
        $pelanggaran->description = $request->description;
        $pelanggaran->save();

        return redirect()->route('pelanggaran.index')->with('success', 'Data pelanggaran berhasil diperbarui');
    }

    public function destroy($id_number)
    {
        $pelanggaran = Employee_record::where('id_number', $id_number)->first();
        if ($pelanggaran) {
            $pelanggaran->delete();
            return redirect()->route('pelanggaran.index')
                ->with('success', 'Data pelanggaran berhasil dihapus.');
        }
        return redirect()->route('pelanggaran.index')
            ->with('error', 'Data pelanggaran tidak ditemukan.');
    }
}
