<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Family_date;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employee.index', compact('employees'));
    }

    public function create()
    {
        return view('employee.create');
    }
    public function store(Request $request)
    {

        $employee = new Employee();
        $employee->id_number = $request->id_number;
        $employee->full_name = $request->full_name;
        $employee->nickname = $request->nickname;
        $employee->contract_date = $request->contract_date;
        $employee->work_date = $request->work_date;
        $employee->status = $request->status;
        $employee->position = $request->position;
        $employee->nuptk = $request->nuptk;
        $employee->gender = $request->gender;
        $employee->place_birth = $request->place_birth;
        $employee->birth_date = $request->birth_date;
        $employee->religion = $request->religion;
        $employee->email = $request->email;
        $employee->hobby = $request->hobby;
        $employee->marital_status = $request->marital_status;
        $employee->residence_address = $request->residence_address;
        $employee->phone = $request->phone;
        $employee->address_emergency = $request->address_emergency;
        $employee->phone_emergency = $request->phone_emergency;
        $employee->blood_type = $request->blood_type;
        $employee->last_education = $request->last_education;
        $employee->agency = $request->agency;
        $employee->graduation_year = $request->graduation_year;
        $employee->competency_training_place = $request->competency_training_place;
        $employee->organizational_experience = $request->organizational_experience;
        $employee->save();

        if ($request->marital_status === 'Married') {
            $request->validate([
                'mate_name' => 'required|string|max:255',
                'child_name' => 'nullable|string|max:255',
                'wedding_date' => 'required|date',
                'wedding_certificate_number' => 'required|string|max:255',
            ]);

            $keluarga = new Family_date();
            $keluarga->id_number = $request->id_number;
            $keluarga->mate_name = $request->mate_name;
            $keluarga->child_name = $request->child_name;
            $keluarga->wedding_date = $request->wedding_date;
            $keluarga->wedding_certificate_number = $request->wedding_certificate_number;
            $keluarga->save();
        } else {
            $keluarga = new Family_date();
            $keluarga->id_number = $request->id_number;
            $keluarga->mate_name = null;
            $keluarga->child_name = null;
            $keluarga->wedding_date = null;
            $keluarga->wedding_certificate_number = null;
            $keluarga->save();
        }

        User::create([
            'name' => $employee->nickname,
            'email' => $request->email,
            'password' => $request->id_number,
        ]);

        return view('employee.create');
    }
}
