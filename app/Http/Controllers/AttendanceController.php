<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;


class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::all();
        return view('absensi.index', compact('attendances')); 
    }
    public function create()
    {
        return view('absensi.create');
    }
    public function store(Request $request)
    {
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
        Attendance::create($validatedData);

        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil ditambahkan.');
    }

    public function export()
    {
        $attendances = Attendance::all();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Absensi');

        $headers = [
            'PIN',
            'NIP',
            'Nama',
            'Jabatan',
            'Departemen',
            'Kantor',
            'Izin Libur',
            'kehadiran jml',
            'Jam:menit',
            'Datang terlambat jml',
            'jam:menit',
            'pulang awal jml',
            'jam:Menit',
            'istirahat lebih jml',
            'Jam:menit',
            'Scan kerja 1x masuk',
            'keluar',
            'Lembur Jam',
            'menit',
            'Scan 1x',
            'Tidak hadir tanpa Izin',
            'Libut rutin & umum',
            'Izin pribadi',
            'Izin pulang Awal',
            'Izin Datang Terlambat',
            'Sakit ada surat dokter',
            'Sakit Tanpa Surat Dokter',
            'Meninggalkan tempat kerja',
            'Izin Dinas/kantor',
            'Datang Telat/Kantor',
            'Pualng Awal/Kantor',
            'Cuti normatif',
            'Cuti pribadi',
            'Tidak scan/masuk',
            'Tidak scan/pulang',
            'Tidak scan/istirahat',
            'Tidak scan/selesai istirahat',
            'Tidak scan/Mulai lembur',
            'Tidak scan/selesai lembur',
            'Izin lain-lain'
        ];

        $sheet->fromArray($headers, null, 'A1');

        $row = 2;
        foreach ($attendances as $attendance) {
            $sheet->fromArray($attendance->toArray(), null, 'A' . $row);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'Absensi-' . now()->format('YmdHis') . '.xlsx';

        $filePath = storage_path('app/public/' . $fileName);
        $writer->save($filePath);

        return response()->download($filePath)->deleteFileAfterSend(true);
    }
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        $file = $request->file('file');
        $spreadsheet = IOFactory::load($file->getRealPath());
        $sheet = $spreadsheet->getActiveSheet();
        $data = $sheet->toArray();

        array_shift($data);

        foreach ($data as $row) {
            Attendance::updateOrCreate([
                'pin' => $row[0],
                'nip' => $row[1]
            ], [
                'nama' => $row[2],
                'jabatan' => $row[3],
                'departemen' => $row[4],
                'kantor' => $row[5],
                'izin_libur' => $row[6],
                'kehadiran_jml' => $row[7],
                'jam_menit_kehadiran' => $row[8],
                'datang_terlambat_jml' => $row[9],
                'jam_menit_datang_terlambat' => $row[10],
                'pulang_awal_jml' => $row[11],
                'jam_menit_pulang_awal' => $row[12],
                'istirahat_lebih_jml' => $row[13],
                'jam_menit_istirahat_lebih' => $row[14],
                'scan_kerja_1x_masuk' => $row[15],
                'keluar' => $row[16],
                'lembur_jam' => $row[17],
                'lembur_menit' => $row[18],
                'scan_1x' => $row[19],
                'tidak_hadir_tanpa_izin' => $row[20],
                'libur_rutin_umum' => $row[21],
                'izin_pribadi' => $row[22],
                'izin_pulang_awal' => $row[23],
                'izin_datang_terlambat' => $row[24],
                'sakit_ada_surat_dokter' => $row[25],
                'sakit_tanpa_surat_dokter' => $row[26],
                'meninggalkan_tempat_kerja' => $row[27],
                'izin_dinas_kantor' => $row[28],
                'datang_telat_kantor' => $row[29],
                'pulang_awal_kantor' => $row[30],
                'cuti_normatif' => $row[31],
                'cuti_pribadi' => $row[32],
                'tidak_scan_masuk' => $row[33],
                'tidak_scan_pulang' => $row[34],
                'tidak_scan_istirahat' => $row[35],
                'tidak_scan_selesai_istirahat' => $row[36],
                'tidak_scan_mulai_lembur' => $row[37],
                'tidak_scan_selesai_lembur' => $row[38],
                'izin_lain_lain' => $row[39],
            ]);
        }

        return redirect()->back()->with('success', 'Data successfully imported!');
    }
}
