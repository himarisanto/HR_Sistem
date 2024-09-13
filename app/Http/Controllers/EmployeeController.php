<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Employee_record;
use App\Models\Family_date;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;




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

    public function archive()
    {
        $archivedEmployees = DB::table('archive_employees')->get();

        return view('employee.archive', compact('archivedEmployees'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }


    public function destroy($id_number)
    {
        $employee = Employee::with('familyDate')->where('id_number', $id_number)->firstOrFail();

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
            'mate_name' => $employee->familyDate->mate_name ?? '',
            'child_name' => $employee->familyDate->child_name ?? '',
            'wedding_date' => $employee->familyDate->wedding_date ?? '',
            'wedding_certificate_number' => $employee->familyDate->wedding_certificate_number ?? '',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

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
        $employee = Employee::withTrashed()->where('id_number', $id_number)->first();

        if ($employee) {

            $employee->restore();

            DB::table('archive_employees')->where('id_number', $id_number)->delete();

            return redirect()->route('employees.index')->with('success', 'Employee restored and removed from archive successfully.');
        } else {
            return redirect()->route('employees.index')->with('error', 'Employee not found.');
        }
    }
    public function export()
    {
        $employees = Employee::with('familyDate')->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set Header
        $sheet->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Nomor KTP')
            ->setCellValue('C1', 'Nama Lengkap')
            ->setCellValue('D1', 'Nama Panggilan')
            ->setCellValue('E1', 'Tanggal Kontrak')
            ->setCellValue('F1', 'Tanggal Kerja')
            ->setCellValue('G1', 'Masa Kerja')
            ->setCellValue('H1', 'Golongan')
            ->setCellValue('I1', 'Status')
            ->setCellValue('J1', 'Posisi')
            ->setCellValue('K1', 'NUPTK')
            ->setCellValue('L1', 'Jenis Kelamin')
            ->setCellValue('M1', 'Tempat Lahir')
            ->setCellValue('N1', 'Tanggal Lahir')
            ->setCellValue('O1', 'Agama')
            ->setCellValue('P1', 'Email')
            ->setCellValue('Q1', 'Hobi')
            ->setCellValue('R1', 'Status Pernikahan')
            ->setCellValue('S1', 'Alamat Tempat Tinggal')
            ->setCellValue('T1', 'Telepon')
            ->setCellValue('U1', 'Alamat Darurat')
            ->setCellValue('V1', 'Telepon Darurat')
            ->setCellValue('W1', 'Golongan Darah')
            ->setCellValue('X1', 'Pendidikan Terakhir')
            ->setCellValue('Y1', 'Lembaga')
            ->setCellValue('Z1', 'Tahun Kelulusan')
            ->setCellValue('AA1', 'Tempat Pelatihan Kompetensi')
            ->setCellValue('AB1', 'Pengalaman Organisasi')
            ->setCellValue('AC1', 'Nama Pasangan')
            ->setCellValue('AD1', 'Nama Anak')
            ->setCellValue('AE1', 'Tanggal Pernikahan')
            ->setCellValue('AF1', 'Nomor Sertifikat Pernikahan');

        // Isi data
        $row = 2;
        foreach ($employees as $key => $employee) {
            $sheet->setCellValue('A' . $row, ++$key)
                ->setCellValue('B' . $row, $employee->id_number)
                ->setCellValue('C' . $row, $employee->full_name)
                ->setCellValue('D' . $row, $employee->nickname)
                ->setCellValue('E' . $row, $employee->contract_date)
                ->setCellValue('F' . $row, $employee->work_date)
                ->setCellValue('G' . $row, $employee->work_time)
                ->setCellValue('H' . $row, $employee->group)
                ->setCellValue('I' . $row, $employee->status)
                ->setCellValue('J' . $row, $employee->position)
                ->setCellValue('K' . $row, $employee->nuptk)
                ->setCellValue('L' . $row, $employee->gender)
                ->setCellValue('M' . $row, $employee->place_birth)
                ->setCellValue('N' . $row, $employee->birth_date)
                ->setCellValue('O' . $row, $employee->religion)
                ->setCellValue('P' . $row, $employee->email)
                ->setCellValue('Q' . $row, $employee->hobby)
                ->setCellValue('R' . $row, $employee->marital_status)
                ->setCellValue('S' . $row, $employee->residence_address)
                ->setCellValue('T' . $row, $employee->phone)
                ->setCellValue('U' . $row, $employee->address_emergency)
                ->setCellValue('V' . $row, $employee->phone_emergency)
                ->setCellValue('W' . $row, $employee->blood_type)
                ->setCellValue('X' . $row, $employee->last_education)
                ->setCellValue('Y' . $row, $employee->agency)
                ->setCellValue('Z' . $row, $employee->graduation_year)
                ->setCellValue('AA' . $row, $employee->competency_training_place)
                ->setCellValue('AB' . $row, $employee->organizational_experience)
                ->setCellValue('AC' . $row, $employee->familyDate->mate_name ?? '')
                ->setCellValue('AD' . $row, $employee->familyDate->child_name ?? '')
                ->setCellValue('AE' . $row, $employee->familyDate->wedding_date ?? '')
                ->setCellValue('AF' . $row, $employee->familyDate->wedding_certificate_number ?? '');
            $row++;
        }

        // Simpan file
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Data_Karyawan.xlsx';
        $filePath = 'exports/' . $fileName;

        if (!file_exists(storage_path('exports'))) {
            mkdir(storage_path('exports'), 0777, true);
        }

        $filePath = storage_path('exports/data_karyawan.xlsx');
        $writer->save($filePath);

        return response()->download($filePath)->deleteFileAfterSend(true);
    }
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls,csv|max:2048',
        ]);

        $file = $request->file('file');
        $spreadsheet = IOFactory::load($file->getRealPath());
        $sheet = $spreadsheet->getActiveSheet();

        $highestRow = $sheet->getHighestRow();
        for ($row = 2; $row <= $highestRow; $row++) {
            $employeeData = [
                'id_number' => $sheet->getCell('B' . $row)->getValue(),
                'full_name' => $sheet->getCell('C' . $row)->getValue(),
                'nickname' => $sheet->getCell('D' . $row)->getValue(),
                'contract_date' => $sheet->getCell('E' . $row)->getValue(),
                'work_date' => $sheet->getCell('F' . $row)->getValue(),
                'work_time' => $sheet->getCell('G' . $row)->getValue(),
                'group' => $sheet->getCell('H' . $row)->getValue(),
                'status' => $sheet->getCell('I' . $row)->getValue(),
                'position' => $sheet->getCell('J' . $row)->getValue(),
                'nuptk' => $sheet->getCell('K' . $row)->getValue(),
                'gender' => $sheet->getCell('L' . $row)->getValue(),
                'place_birth' => $sheet->getCell('M' . $row)->getValue(),
                'birth_date' => $sheet->getCell('N' . $row)->getValue(),
                'religion' => $sheet->getCell('O' . $row)->getValue(),
                'email' => $sheet->getCell('P' . $row)->getValue(),
                'hobby' => $sheet->getCell('Q' . $row)->getValue(),
                'marital_status' => $sheet->getCell('R' . $row)->getValue(),
                'residence_address' => $sheet->getCell('S' . $row)->getValue(),
                'phone' => $sheet->getCell('T' . $row)->getValue(),
                'address_emergency' => $sheet->getCell('U' . $row)->getValue(),
                'phone_emergency' => $sheet->getCell('V' . $row)->getValue(),
                'blood_type' => $sheet->getCell('W' . $row)->getValue(),
                'last_education' => $sheet->getCell('X' . $row)->getValue(),
                'agency' => $sheet->getCell('Y' . $row)->getValue(),
                'graduation_year' => $sheet->getCell('Z' . $row)->getValue(),
                'competency_training_place' => $sheet->getCell('AA' . $row)->getValue(),
                'organizational_experience' => $sheet->getCell('AB' . $row)->getValue(),
            ];

            // Ensure Employee exists or create it
            $employee = Employee::updateOrCreate(
                ['id_number' => $employeeData['id_number']],
                $employeeData
            );

            // Save the Family_date related to the Employee
            $familyData = [
                'mate_name' => $sheet->getCell('AC' . $row)->getValue(),
                'child_name' => $sheet->getCell('AD' . $row)->getValue(),
                'wedding_date' => $sheet->getCell('AE' . $row)->getValue(),
                'wedding_certificate_number' => $sheet->getCell('AF' . $row)->getValue(),
            ];

            // Ensure Family_date is created or updated only after the Employee is created
            Family_date::updateOrCreate(
                ['id_number' => $employeeData['id_number']], // Ensure the family record is tied to the employee
                $familyData
            );
        }

        return redirect()->route('employees.index')->with('success', 'Data berhasil diimpor.');
    }
}
