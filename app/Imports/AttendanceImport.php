<?php

namespace App\Imports;

use App\Models\Attendance;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Log;

class AttendanceImport
{
    /**
     * Mengimpor data dari file Excel ke database.
     *
     * @param string $filePath Path ke file Excel yang akan diimpor.
     * @return void
     */
    public function importFromExcel(string $filePath)
    {
        // Load file Excel menggunakan PHPSpreadsheet
        $spreadsheet = IOFactory::load($filePath);
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray(null, true, true, true); // Mengubah ke array

        // Looping melalui data di Excel
        foreach ($rows as $rowIndex => $row) {
            // Lewati header (baris pertama)
            if ($rowIndex == 1) {
                continue;
            }

            // Pastikan kolom 'A' (PIN) tidak kosong
            if (empty($row['A'])) {
                continue;
            }

            // Masukkan data ke dalam database
            Attendance::updateOrCreate(
                ['pin' => $row['A']], // 'A' adalah kolom pertama, sesuaikan dengan file Excel
                [
                    'nip' => $row['B'], // 'B' adalah kolom kedua
                    'nama' => $row['C'],
                    'jabatan' => $row['D'],
                    'departemen' => $row['E'],
                    'kantor' => $row['F'],
                    'izin_libur' => $row['G'],
                    'jumlah' => $row['H'], // Sesuaikan dengan nama dan urutan kolom di file Excel
                    'jam_menit' => $row['I'],
                    'scan_kerja_1_x' => $row['J'],
                    'lembur' => $row['K'],
                    'tidak_hadir' => $row['L'],
                    'libur' => $row['M'],
                    'perhitungan_pengecualian_izin' => $row['N'],
                    'tanpa_izin' => $row['O'],
                    'rutin_umum' => $row['P'],
                    'izin_tidak_masuk_keperluan_pribadi' => $row['Q'],
                    'izin_pulang_awal_keperluan_pribadi' => $row['R'],
                    'izin_datang_terlambat_keperluan_pribadi' => $row['S'],
                    'sakit_dengan_surat_dokter' => $row['T'],
                    'sakit_tanpa_surat_dokter' => $row['U'],
                    'izin_meninggalkan_tempat_kerja' => $row['V'],
                    'izin_dinas' => $row['W'],
                    'izin_datang_terlambat_izin_kantor' => $row['X'],
                    'izin_pulang_awal_izin_kantor' => $row['Y'],
                    'cuti_normatif' => $row['Z'],
                    'cuti_pribadi' => $row['AA'],
                    'tidak_scan_masuk' => $row['AB'],
                    'tidak_scan_pulang' => $row['AC'],
                    'tidak_scan_mulai_istirahat' => $row['AD'],
                    'tidak_scan_selesai_istirahat' => $row['AE'],
                    'tidak_scan_mulai_lembur' => $row['AF'],
                    'tidak_scan_selesai_lembur' => $row['AG'],
                    'izin_lain_lain' => $row['AH'],
                ]
            );
        }
    }
}
