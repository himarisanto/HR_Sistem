<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    // Nama tabel jika berbeda dari default (plural dari nama model)
    protected $table = 'attendance';

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'pin',
        'nip',
        'nama',
        'jabatan',
        'departemen',
        'kantor',
        'izin_libur',
        'kehadiran_jml',
        'jam_menit_kehadiran',
        'datang_terlambat_jml',
        'jam_menit_datang_terlambat',
        'pulang_awal_jml',
        'jam_menit_pulang_awal',
        'istirahat_lebih_jml',
        'jam_menit_istirahat_lebih',
        'scan_kerja_1x_masuk',
        'keluar',
        'lembur_jam',
        'lembur_menit',
        'scan_1x',
        'tidak_hadir_tanpa_izin',
        'libur_rutin_umum',
        'izin_pribadi',
        'izin_pulang_awal',
        'izin_datang_terlambat',
        'sakit_ada_surat_dokter',
        'sakit_tanpa_surat_dokter',
        'meninggalkan_tempat_kerja',
        'izin_dinas_kantor',
        'datang_telat_kantor',
        'pulang_awal_kantor',
        'cuti_normatif',
        'cuti_pribadi',
        'tidak_scan_masuk',
        'tidak_scan_pulang',
        'tidak_scan_istirahat',
        'tidak_scan_selesai_istirahat',
        'tidak_scan_mulai_lembur',
        'tidak_scan_selesai_lembur',
        'izin_lain_lain'
    ];

    // Jika ada kolom yang perlu di-cast (misalnya tipe waktu atau JSON)
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
