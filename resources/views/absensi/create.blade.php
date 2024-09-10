@extends('layouts.master')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2 class="text-center">Tambah Absensi</h2>
        </div>
        <div class="card-body">
            <!-- Form untuk tambah data absensi -->
            <form action="{{ route('absensi.store') }}" method="POST">
                @csrf

                <!-- Input PIN -->
                <div class="mb-3">
                    <label for="pin" class="form-label">PIN</label>
                    <input type="text" class="form-control" id="pin" name="pin" required>
                </div>

                <!-- Input NIP -->
                <div class="mb-3">
                    <label for="nip" class="form-label">NIP</label>
                    <input type="text" class="form-control" id="nip" name="nip" required>
                </div>

                <!-- Input Nama -->
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>

                <!-- Input Jabatan -->
                <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan</label>
                    <input type="text" class="form-control" id="jabatan" name="jabatan" required>
                </div>

                <!-- Input Departemen -->
                <div class="mb-3">
                    <label for="departemen" class="form-label">Departemen</label>
                    <input type="text" class="form-control" id="departemen" name="departemen" required>
                </div>

                <!-- Input Kantor -->
                <div class="mb-3">
                    <label for="kantor" class="form-label">Kantor</label>
                    <input type="text" class="form-control" id="kantor" name="kantor" required>
                </div>

                <!-- Input Izin Libur -->
                <div class="mb-3">
                    <label for="izin_libur" class="form-label">Izin Libur</label>
                    <input type="text" class="form-control" id="izin_libur" name="izin_libur">
                </div>

                <!-- Input Jml -->
                <div class="mb-3">
                    <label for="jml" class="form-label">Jml</label>
                    <input type="number" class="form-control" id="jml" name="jml" required>
                </div>

                <!-- Input Jam Menit -->
                <div class="mb-3">
                    <label for="jam_menit" class="form-label">Jam Menit</label>
                    <input type="text" class="form-control" id="jam_menit" name="jam_menit" required>
                </div>

                <!-- Input Jml Terlambat -->
                <div class="mb-3">
                    <label for="jml_terlambat" class="form-label">Jml Terlambat</label>
                    <input type="number" class="form-control" id="jml_terlambat" name="jml_terlambat" required>
                </div>

                <!-- Input Jam Menit Terlambat -->
                <div class="mb-3">
                    <label for="jam_menit_terlambat" class="form-label">Jam Menit Terlambat</label>
                    <input type="text" class="form-control" id="jam_menit_terlambat" name="jam_menit_terlambat" required>
                </div>

                <!-- Input Jml Pulang Awal -->
                <div class="mb-3">
                    <label for="jml_pulang_awal" class="form-label">Jml Pulang Awal</label>
                    <input type="number" class="form-control" id="jml_pulang_awal" name="jml_pulang_awal" required>
                </div>

                <!-- Input Jam Menit Pulang Awal -->
                <div class="mb-3">
                    <label for="jam_menit_pulang_awal" class="form-label">Jam Menit Pulang Awal</label>
                    <input type="text" class="form-control" id="jam_menit_pulang_awal" name="jam_menit_pulang_awal" required>
                </div>

                <!-- Input Jml Istirahat Lebih -->
                <div class="mb-3">
                    <label for="jml_istirahat_lebih" class="form-label">Jml Istirahat Lebih</label>
                    <input type="number" class="form-control" id="jml_istirahat_lebih" name="jml_istirahat_lebih" required>
                </div>

                <!-- Input Jam Menit Istirahat Lebih -->
                <div class="mb-3">
                    <label for="jam_menit_istirahat_lebih" class="form-label">Jam Menit Istirahat Lebih</label>
                    <input type="text" class="form-control" id="jam_menit_istirahat_lebih" name="jam_menit_istirahat_lebih" required>
                </div>

                <!-- Input Jml Scan Kerja -->
                <div class="mb-3">
                    <label for="jml_scan_kerja" class="form-label">Jml Scan Kerja</label>
                    <input type="number" class="form-control" id="jml_scan_kerja" name="jml_scan_kerja" required>
                </div>

                <!-- Input Jam Menit Scan Kerja -->
                <div class="mb-3">
                    <label for="jam_menit_scan_kerja" class="form-label">Jam Menit Scan Kerja</label>
                    <input type="text" class="form-control" id="jam_menit_scan_kerja" name="jam_menit_scan_kerja" required>
                </div>

                <!-- Input Jml Lembur -->
                <div class="mb-3">
                    <label for="jml_lembur" class="form-label">Jml Lembur</label>
                    <input type="number" class="form-control" id="jml_lembur" name="jml_lembur" required>
                </div>

                <!-- Input Jam Menit Lembur -->
                <div class="mb-3">
                    <label for="jam_menit_lembur" class="form-label">Jam Menit Lembur</label>
                    <input type="text" class="form-control" id="jam_menit_lembur" name="jam_menit_lembur" required>
                </div>

                <!-- Input Tidak Hadir -->
                <div class="mb-3">
                    <label for="tidak_hadir" class="form-label">Tidak Hadir</label>
                    <input type="number" class="form-control" id="tidak_hadir" name="tidak_hadir" required>
                </div>

                <!-- Input Libur -->
                <div class="mb-3">
                    <label for="libur" class="form-label">Libur</label>
                    <input type="number" class="form-control" id="libur" name="libur" required>
                </div>

                <!-- Input Perhitungan Pengecualian Izin -->
                <div class="mb-3">
                    <label for="perhitungan_pengecualian_izin" class="form-label">Perhitungan Pengecualian Izin</label>
                    <input type="text" class="form-control" id="perhitungan_pengecualian_izin" name="perhitungan_pengecualian_izin" required>
                </div>

                <!-- Input Tanpa Izin -->
                <div class="mb-3">
                    <label for="tanpa_izin" class="form-label">Tanpa Izin</label>
                    <input type="number" class="form-control" id="tanpa_izin" name="tanpa_izin" required>
                </div>

                <!-- Input Rutin Umum -->
                <div class="mb-3">
                    <label for="rutin_umum" class="form-label">Rutin Umum</label>
                    <input type="number" class="form-control" id="rutin_umum" name="rutin_umum" required>
                </div>

                <!-- Input Izin Tidak Masuk Pribadi -->
                <div class="mb-3">
                    <label for="izin_tidak_masuk_pribadi" class="form-label">Izin Tidak Masuk Pribadi</label>
                    <input type="number" class="form-control" id="izin_tidak_masuk_pribadi" name="izin_tidak_masuk_pribadi" required>
                </div>

                <!-- Input Izin Pulang
                <!-- Input Izin Pulang Awal Pribadi -->
                <div class="mb-3">
                    <label for="izin_pulang_awal_pribadi" class="form-label">Izin Pulang Awal Pribadi</label>
                    <input type="number" class="form-control" id="izin_pulang_awal_pribadi" name="izin_pulang_awal_pribadi" required>
                </div>

                <!-- Input Izin Datang Terlambat Pribadi -->
                <div class="mb-3">
                    <label for="izin_datang_terlambat_pribadi" class="form-label">Izin Datang Terlambat Pribadi</label>
                    <input type="number" class="form-control" id="izin_datang_terlambat_pribadi" name="izin_datang_terlambat_pribadi" required>
                </div>

                <!-- Input Sakit Dengan Surat Dokter -->
                <div class="mb-3">
                    <label for="sakit_dengan_surat_dokter" class="form-label">Sakit Dengan Surat Dokter</label>
                    <input type="number" class="form-control" id="sakit_dengan_surat_dokter" name="sakit_dengan_surat_dokter" required>
                </div>

                <!-- Input Sakit Tanpa Surat Dokter -->
                <div class="mb-3">
                    <label for="sakit_tanpa_surat_dokter" class="form-label">Sakit Tanpa Surat Dokter</label>
                    <input type="number" class="form-control" id="sakit_tanpa_surat_dokter" name="sakit_tanpa_surat_dokter" required>
                </div>

                <!-- Input Izin Meninggalkan Tempat Kerja -->
                <div class="mb-3">
                    <label for="izin_meninggalkan_tempat_kerja" class="form-label">Izin Meninggalkan Tempat Kerja</label>
                    <input type="number" class="form-control" id="izin_meninggalkan_tempat_kerja" name="izin_meninggalkan_tempat_kerja" required>
                </div>

                <!-- Input Izin Dinas -->
                <div class="mb-3">
                    <label for="izin_dinas" class="form-label">Izin Dinas</label>
                    <input type="number" class="form-control" id="izin_dinas" name="izin_dinas" required>
                </div>

                <!-- Input Izin Datang Terlambat Kantor -->
                <div class="mb-3">
                    <label for="izin_datang_terlambat_kantor" class="form-label">Izin Datang Terlambat Kantor</label>
                    <input type="number" class="form-control" id="izin_datang_terlambat_kantor" name="izin_datang_terlambat_kantor" required>
                </div>

                <!-- Input Izin Pulang Awal Kantor -->
                <div class="mb-3">
                    <label for="izin_pulang_awal_kantor" class="form-label">Izin Pulang Awal Kantor</label>
                    <input type="number" class="form-control" id="izin_pulang_awal_kantor" name="izin_pulang_awal_kantor" required>
                </div>

                <!-- Input Cuti Normatif -->
                <div class="mb-3">
                    <label for="cuti_normatif" class="form-label">Cuti Normatif</label>
                    <input type="number" class="form-control" id="cuti_normatif" name="cuti_normatif" required>
                </div>

                <!-- Input Cuti Pribadi -->
                <div class="mb-3">
                    <label for="cuti_pribadi" class="form-label">Cuti Pribadi</label>
                    <input type="number" class="form-control" id="cuti_pribadi" name="cuti_pribadi" required>
                </div>

                <!-- Input Tidak Scan Masuk -->
                <div class="mb-3">
                    <label for="tidak_scan_masuk" class="form-label">Tidak Scan Masuk</label>
                    <input type="number" class="form-control" id="tidak_scan_masuk" name="tidak_scan_masuk" required>
                </div>

                <!-- Input Tidak Scan Pulang -->
                <div class="mb-3">
                    <label for="tidak_scan_pulang" class="form-label">Tidak Scan Pulang</label>
                    <input type="number" class="form-control" id="tidak_scan_pulang" name="tidak_scan_pulang" required>
                </div>

                <!-- Input Tidak Scan Mulai Istirahat -->
                <div class="mb-3">
                    <label for="tidak_scan_mulai_istirahat" class="form-label">Tidak Scan Mulai Istirahat</label>
                    <input type="number" class="form-control" id="tidak_scan_mulai_istirahat" name="tidak_scan_mulai_istirahat" required>
                </div>

                <!-- Input Tidak Scan Selesai Istirahat -->
                <div class="mb-3">
                    <label for="tidak_scan_selesai_istirahat" class="form-label">Tidak Scan Selesai Istirahat</label>
                    <input type="number" class="form-control" id="tidak_scan_selesai_istirahat" name="tidak_scan_selesai_istirahat" required>
                </div>

                <!-- Input Tidak Scan Mulai Lembur -->
                <div class="mb-3">
                    <label for="tidak_scan_mulai_lembur" class="form-label">Tidak Scan Mulai Lembur</label>
                    <input type="number" class="form-control" id="tidak_scan_mulai_lembur" name="tidak_scan_mulai_lembur" required>
                </div>

                <!-- Input Tidak Scan Selesai Lembur -->
                <div class="mb-3">
                    <label for="tidak_scan_selesai_lembur" class="form-label">Tidak Scan Selesai Lembur</label>
                    <input type="number" class="form-control" id="tidak_scan_selesai_lembur" name="tidak_scan_selesai_lembur" required>
                </div>

                <!-- Input Izin Lain-Lain -->
                <div class="mb-3">
                    <label for="izin_lain_lain" class="form-label">Izin Lain-Lain</label>
                    <input type="text" class="form-control" id="izin_lain_lain" name="izin_lain_lain">
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection