<?php

namespace App\Http\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use App\Imports\AttendanceImport;

use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Models\Attendance;
use Illuminate\Support\Facades\Storage;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::all(); // Retrieve all attendance records from the database
        return view('absensi.index', compact('attendances')); // Pass the data to the view
    }
    public function create()
    {
        return view('absensi.create');
    }
    public function store(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'pin' => 'required',
            'nip' => 'required',
            'nama' => 'required',
            'jabatan' => 'required',
            'departemen' => 'required',
            'kantor' => 'required',
            'izin_libur' => 'nullable',
            'jml' => 'required|numeric',
            'jam_menit' => 'required',
            'jml_terlambat' => 'required|numeric',
            'jam_menit_terlambat' => 'required',
            'jml_pulang_awal' => 'required|numeric',
            'jam_menit_pulang_awal' => 'required',
            'jml_istirahat_lebih' => 'required|numeric',
            'jam_menit_istirahat_lebih' => 'required',
            'jml_scan_kerja' => 'required|numeric',
            'jam_menit_scan_kerja' => 'required',
            'jml_lembur' => 'required|numeric',
            'jam_menit_lembur' => 'required',
            'tidak_hadir' => 'required|numeric',
            'libur' => 'required|numeric',
            'perhitungan_pengecualian_izin' => 'required',
            'tanpa_izin' => 'required|numeric',
            'rutin_umum' => 'required|numeric',
            'izin_tidak_masuk_pribadi' => 'required|numeric',
            'izin_pulang_awal_pribadi' => 'required|numeric',
            'izin_datang_terlambat_pribadi' => 'required|numeric',
            'sakit_dengan_surat_dokter' => 'required|numeric',
            'sakit_tanpa_surat_dokter' => 'required|numeric',
            'izin_meninggalkan_tempat_kerja' => 'required|numeric',
            'izin_dinas' => 'required|numeric',
            'izin_datang_terlambat_kantor' => 'required|numeric',
            'izin_pulang_awal_kantor' => 'required|numeric',
            'cuti_normatif' => 'required|numeric',
            'cuti_pribadi' => 'required|numeric',
            'tidak_scan_masuk' => 'required|numeric',
            'tidak_scan_pulang' => 'required|numeric',
            'tidak_scan_mulai_istirahat' => 'required|numeric',
            'tidak_scan_selesai_istirahat' => 'required|numeric',
            'tidak_scan_mulai_lembur' => 'required|numeric',
            'tidak_scan_selesai_lembur' => 'required|numeric',
            'izin_lain_lain' => 'nullable',
        ]);

        // Simpan data ke dalam database
        Attendance::create($validatedData);

        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil ditambahkan.');
    }

    public function export()
    {
        $attendances = Attendance::all();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();


        $headers = [
            'B1' => 'PIN',
            'C1' => 'NIP',
            'D1' => 'Nama',
            'E1' => 'Jabatan',
            'F1' => 'Departemen',
            'G1' => 'Kantor',
            'H1' => 'Izin Libur',
            'I1' => 'Jml',
            'J1' => 'Jam Menit',
            'K1' => 'Jml Terlambat',
            'L1' => 'Jam Menit Terlambat',
            'M1' => 'Jml Pulang Awal',
            'N1' => 'Jam Menit Pulang Awal',
            'O1' => 'Jml Istirahat Lebih',
            'P1' => 'Jam Menit Istirahat Lebih',
            'Q1' => 'Jml Scan Kerja',
            'R1' => 'Jam Menit Scan Kerja',
            'S1' => 'Jml Lembur',
            'T1' => 'Jam Menit Lembur',
            'U1' => 'Tidak Hadir',
            'V1' => 'Libur',
            'W1' => 'Perhitungan Pengecualian Izin',
            'X1' => 'Tanpa Izin',
            'Y1' => 'Rutin Umum',
            'Z1' => 'Izin Tidak Masuk Pribadi',
            'AA1' => 'Izin Pulang Awal Pribadi',
            'AB1' => 'Izin Datang Terlambat Pribadi',
            'AC1' => 'Sakit Dengan Surat Dokter',
            'AD1' => 'Sakit Tanpa Surat Dokter',
            'AE1' => 'Izin Meninggalkan Tempat Kerja',
            'AF1' => 'Izin Dinas',
            'AG1' => 'Izin Datang Terlambat Kantor',
            'AH1' => 'Izin Pulang Awal Kantor',
            'AI1' => 'Cuti Normatif',
            'AJ1' => 'Cuti Pribadi',
            'AK1' => 'Tidak Scan Masuk',
            'AL1' => 'Tidak Scan Pulang',
            'AM1' => 'Tidak Scan Mulai Istirahat',
            'AN1' => 'Tidak Scan Selesai Istirahat',
            'AO1' => 'Tidak Scan Mulai Lembur',
            'AP1' => 'Tidak Scan Selesai Lembur',
            'AQ1' => 'Izin Lain Lain',
        ];

        foreach ($headers as $cell => $header) {
            $sheet->setCellValue($cell, $header);
        }


        $row = 2;
        foreach ($attendances as $attendance) {
            $sheet->setCellValue('B' . $row, $attendance->pin);
            $sheet->setCellValue('C' . $row, $attendance->nip);
            $sheet->setCellValue('D' . $row, $attendance->nama);
            $sheet->setCellValue('E' . $row, $attendance->jabatan);
            $sheet->setCellValue('F' . $row, $attendance->departemen);
            $sheet->setCellValue('G' . $row, $attendance->kantor);
            $sheet->setCellValue('H' . $row, $attendance->izin_libur);
            $sheet->setCellValue('I' . $row, $attendance->jml);
            $sheet->setCellValue('J' . $row, $attendance->jam_menit);
            $sheet->setCellValue('K' . $row, $attendance->jml_terlambat);
            $sheet->setCellValue('L' . $row, $attendance->jam_menit_terlambat);
            $sheet->setCellValue('M' . $row, $attendance->jml_pulang_awal);
            $sheet->setCellValue('N' . $row, $attendance->jam_menit_pulang_awal);
            $sheet->setCellValue('O' . $row, $attendance->jml_istirahat_lebih);
            $sheet->setCellValue('P' . $row, $attendance->jam_menit_istirahat_lebih);
            $sheet->setCellValue('Q' . $row, $attendance->jml_scan_kerja);
            $sheet->setCellValue('R' . $row, $attendance->jam_menit_scan_kerja);
            $sheet->setCellValue('S' . $row, $attendance->jml_lembur);
            $sheet->setCellValue('T' . $row, $attendance->jam_menit_lembur);
            $sheet->setCellValue('U' . $row, $attendance->tidak_hadir);
            $sheet->setCellValue('V' . $row, $attendance->libur);
            $sheet->setCellValue('W' . $row, $attendance->perhitungan_pengecualian_izin);
            $sheet->setCellValue('X' . $row, $attendance->tanpa_izin);
            $sheet->setCellValue('Y' . $row, $attendance->rutin_umum);
            $sheet->setCellValue('Z' . $row, $attendance->izin_tidak_masuk_pribadi);
            $sheet->setCellValue('AA' . $row, $attendance->izin_pulang_awal_pribadi);
            $sheet->setCellValue('AB' . $row, $attendance->izin_datang_terlambat_pribadi);
            $sheet->setCellValue('AC' . $row, $attendance->sakit_dengan_surat_dokter);
            $sheet->setCellValue('AD' . $row, $attendance->sakit_tanpa_surat_dokter);
            $sheet->setCellValue('AE' . $row, $attendance->izin_meninggalkan_tempat_kerja);
            $sheet->setCellValue('AF' . $row, $attendance->izin_dinas);
            $sheet->setCellValue('AG' . $row, $attendance->izin_datang_terlambat_kantor);
            $sheet->setCellValue('AH' . $row, $attendance->izin_pulang_awal_kantor);
            $sheet->setCellValue('AI' . $row, $attendance->cuti_normatif);
            $sheet->setCellValue('AJ' . $row, $attendance->cuti_pribadi);
            $sheet->setCellValue('AK' . $row, $attendance->tidak_scan_masuk);
            $sheet->setCellValue('AL' . $row, $attendance->tidak_scan_pulang);
            $sheet->setCellValue('AM' . $row, $attendance->tidak_scan_mulai_istirahat);
            $sheet->setCellValue('AN' . $row, $attendance->tidak_scan_selesai_istirahat);
            $sheet->setCellValue('AO' . $row, $attendance->tidak_scan_mulai_lembur);
            $sheet->setCellValue('AP' . $row, $attendance->tidak_scan_selesai_lembur);
            $sheet->setCellValue('AQ' . $row, $attendance->izin_lain_lain);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'attendances.xlsx';
        $filePath = storage_path('app/' . $filename);

        $writer->save($filePath);

        return response()->download($filePath)->deleteFileAfterSend(true);
    }

    public function import(Request $request)
    { {
            // Validasi file
            $request->validate([
                'file' => 'required|mimes:xlsx'
            ]);

            // Simpan file ke storage sementara
            $filePath = $request->file('file')->store('temp');

            try {
                // Panggil metode import dari kelas AttendanceImport
                $importer = new AttendanceImport();
                $importer->importFromExcel(storage_path('app/' . $filePath));

                // Hapus file setelah impor
                Storage::delete($filePath);

                return redirect()->back()->with('success', 'Data berhasil diimpor.');
            } catch (\Exception $e) {
                // Tangani error jika terjadi
                \Log::error('Error saat impor data: ' . $e->getMessage());

                // Hapus file meskipun terjadi error
                Storage::delete($filePath);

                // Alihkan pengguna dengan pesan kesalahan
                return redirect()->back()->with('error', 'Terjadi kesalahan saat mengimpor data. Silakan coba lagi.');
            }
        }
    }
}
