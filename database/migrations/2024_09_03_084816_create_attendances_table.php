<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    public function up()
    {
            Schema::create('attendance', function (Blueprint $table) {
                $table->id(); // ID primary key
                $table->string('pin')->nullable();
                $table->string('nip')->nullable();
                $table->string('nama')->nullable();
                $table->string('jabatan')->nullable();
                $table->string('departemen')->nullable();
                $table->string('kantor')->nullable();
                $table->string('izin_libur')->nullable();
                $table->integer('kehadiran_jml')->nullable();
                $table->string('jam_menit_kehadiran')->nullable();
                $table->integer('datang_terlambat_jml')->nullable();
                $table->string('jam_menit_datang_terlambat')->nullable();
                $table->integer('pulang_awal_jml')->nullable();
                $table->string('jam_menit_pulang_awal')->nullable();
                $table->integer('istirahat_lebih_jml')->nullable();
                $table->string('jam_menit_istirahat_lebih')->nullable();
                $table->integer('scan_kerja_1x_masuk')->nullable();
                $table->string('keluar')->nullable();
                $table->integer('lembur_jam')->nullable();
                $table->integer('lembur_menit')->nullable();
                $table->integer('scan_1x')->nullable();
                $table->integer('tidak_hadir_tanpa_izin')->nullable();
                $table->integer('libur_rutin_umum')->nullable();
                $table->integer('izin_pribadi')->nullable();
                $table->integer('izin_pulang_awal')->nullable();
                $table->integer('izin_datang_terlambat')->nullable();
                $table->integer('sakit_ada_surat_dokter')->nullable();
                $table->integer('sakit_tanpa_surat_dokter')->nullable();
                $table->integer('meninggalkan_tempat_kerja')->nullable();
                $table->integer('izin_dinas_kantor')->nullable();
                $table->integer('datang_telat_kantor')->nullable();
                $table->integer('pulang_awal_kantor')->nullable();
                $table->integer('cuti_normatif')->nullable();
                $table->integer('cuti_pribadi')->nullable();
                $table->integer('tidak_scan_masuk')->nullable();
                $table->integer('tidak_scan_pulang')->nullable();
                $table->integer('tidak_scan_istirahat')->nullable();
                $table->integer('tidak_scan_selesai_istirahat')->nullable();
                $table->integer('tidak_scan_mulai_lembur')->nullable();
                $table->integer('tidak_scan_selesai_lembur')->nullable();
                $table->integer('izin_lain_lain')->nullable();
                $table->timestamps(); // Timestamps untuk created_at dan updated_at
            });
    }

    public function down()
    {
        Schema::dropIfExists('attendances');
    }
}
