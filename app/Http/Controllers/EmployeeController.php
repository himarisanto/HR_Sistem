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
        $employees = Employee::with('familyDate')->paginate(10);
        return view('employee.index', compact('employees'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
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

        $keluarga = new Family_date();
        $keluarga->id_number = $request->id_number;
        $keluarga->mate_name = $request->mate_name;
        $keluarga->child_name = $request->child_name;
        $keluarga->wedding_date = $request->wedding_date;
        $keluarga->wedding_certificate_number = $request->wedding_certificate_number;
        $keluarga->save();

        User::create([
            'name' => $employee->nickname,
            'email' => $request->email,
            'password' => $request->id_number,
        ]);

        return view('employee.create');
    }
    public function edit(Employee $employee)
    {
        return view('employee.edit', compact('employee'));
    }

    public function update(Request $request, $employee)
    {
        $employee = Employee::find($employee);
        $employee->id_number = $request->id_number;
        $employee->full_name = $request->full_name;
        $employee->nickname = $request->nickname;
        $employee->contract_date = $request->contract_date;
        $employee->work_date = $request->work_date;
        $employee->work_time = $request->work_time;
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

        $family_date = $employee->familyDate;
        if ($family_date) {
            $family_date->mate_name = $request->mate_name;
            $family_date->child_name = $request->child_name;
            $family_date->wedding_date = $request->wedding_date;
            $family_date->wedding_certificate_number = $request->wedding_certificate_number;
            $family_date->save();
        } else {
            Family_date::create([
                'id_number' => $employee->id_number,
                'mate_name' => $request->mate_name,
                'child_name' => $request->child_name,
                'wedding_date' => $request->wedding_date,
                'wedding_certificate_number' => $request->wedding_certificate_number,
            ]);
        }

        $employee->save();

        return redirect()->route('employees.index')
            ->with('success', 'Data karyawan berhasil diperbarui.');
    }
}
