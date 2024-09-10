<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Family_date;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with('familyDate')->paginate(10);
        return view('employee.index', compact('employees'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function golongan()
    {
        $employees = Employee::paginate(10);

        return view('employee.golongan', compact('employees'));
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
        $employee->group = $request->group;
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
        $employee->group = $request->group;
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
    // public function destroy($id_number)
    // {
    //     $employee = Employee::where('id_number', $id_number)->first();
    //     if ($employee) {
    //         Family_date::where('id_number', $id_number)->delete();
    //         $employee->delete();
    //         return redirect()->route('employees.index')
    //             ->with('success', 'Data karyawan dan data terkait berhasil dihapus.');
    //     }
    //     return redirect()->route('employees.index')
    //         ->with('error', 'Data karyawan tidak ditemukan.');
    // }
    public function archive()
    {
        $archivedEmployees = DB::table('archive_employees')->paginate(10);

        return view('employee.archive', compact('archivedEmployees'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function destroy($id_number)
    {
        $employee = Employee::where('id_number', $id_number)->firstOrFail();

        // Pindahkan data ke tabel arsip (abaikan jika sudah ada)
        DB::table('archive_employees')->insertOrIgnore([
            'id_number' => $employee->id_number,
            'full_name' => $employee->full_name,
            'nickname' => $employee->nickname,
            'contract_date' => $employee->contract_date,
            'work_date' => $employee->work_date,
            'work_time' => $employee->work_time,
            'group' => $employee->group,
            'status' => $employee->status,
            'position' => $employee->position,
            'nuptk' => $employee->nuptk,
            'gender' => $employee->gender,
            'place_birth' => $employee->place_birth,
            'birth_date' => $employee->birth_date,
            'religion' => $employee->religion,
            'email' => $employee->email,
            'hobby' => $employee->hobby,
            'marital_status' => $employee->marital_status,
            'residence_address' => $employee->residence_address,
            'phone' => $employee->phone,
            'address_emergency' => $employee->address_emergency,
            'phone_emergency' => $employee->phone_emergency,
            'blood_type' => $employee->blood_type,
            'last_education' => $employee->last_education,
            'agency' => $employee->agency,
            'graduation_year' => $employee->graduation_year,
            'competency_training_place' => $employee->competency_training_place,
            'organizational_experience' => $employee->organizational_experience,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Hapus data dari tabel asli
        $employee->delete();

        return redirect()->route('employees.index')
            ->with('success', 'Karyawan berhasil diarsipkan.');
    }

    public function destroyArchive($id_number)
    {
        DB::table('archive_employees')->where('id_number', $id_number)->delete();

        return redirect()->route('employees.archive')
            ->with('success', 'Karyawan berhasil dihapus secara permanen.');
    }
    public function restore($id_number)
    {
        // Temukan karyawan dengan id_number yang diberikan, termasuk yang dihapus
        $employee = Employee::withTrashed()->where('id_number', $id_number)->first();

        if ($employee) {
            // Pulihkan karyawan jika ada
            $employee->restore();
            return redirect()->route('employees.index')->with('success', 'Employee restored successfully.');
        } else {
            return redirect()->route('employees.index')->with('error', 'Employee not found.');
        }
    }
}
