@extends('layouts.master')

@section('content')
<div class="container">
    <div class="card mt-4">
        <div class="card-header text-center">
            <h2>Absensi</h2>
        </div>

        <!-- Form Search -->
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-4">
                    <form action="{{ route('absensi.index') }}" method="GET" class="d-flex">
                        <input type="text" name="search" class="form-control" placeholder="Cari ..." value="{{ request('search') }}">
                        <button class="btn btn-primary ms-2" type="submit">
                            <i class="bi bi-search"></i> Cari
                        </button>
                    </form>
                </div>
            </div>

            <!-- Export & Import Buttons -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <form action="{{ route('absensi.import') }}" method="POST" enctype="multipart/form-data" class="d-flex align-items-center">
                    @csrf
                    <a href="{{ route('absensi.export') }}" class="btn btn-outline-primary">
                        <i class="bi bi-download me-2"></i> Export
                    </a>
                    <input type="file" name="file" accept=".xlsx, .xls, .csv" class="form-control me-2" style="width: auto;" />
                    <button type="submit" class="btn btn-outline-primary">
                        <i class="bi bi-upload me-2"></i> Import
                    </button>
                </form>
            </div>

            <!-- Tabel Absensi -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>PIN</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Departemen</th>
                            <th>Kantor</th>
                            <th>Izin Libur</th>
                            <th>Kehadiran Jml</th>
                            <th>Jam:Menit</th>
                            <th>Datang Terlambat Jml</th>
                            <th>Jam:Menit</th>
                            <th>Pulang Awal Jml</th>
                            <th>Jam:Menit</th>
                            <th>Istirahat Lebih Jml</th>
                            <th>Jam:Menit</th>
                            <th>Scan Kerja 1x Masuk</th>
                            <th>Keluar</th>
                            <th>Lembur Jam</th>
                            <th>Menit</th>
                            <th>Scan 1x</th>
                            <th>Tidak Hadir Tanpa Izin</th>
                            <th>Libur Rutin & Umum</th>
                            <th>Izin Pribadi</th>
                            <th>Izin Pulang Awal</th>
                            <th>Izin Datang Terlambat</th>
                            <th>Sakit Ada Surat Dokter</th>
                            <th>Sakit Tanpa Surat Dokter</th>
                            <th>Meninggalkan Tempat Kerja</th>
                            <th>Izin Dinas/Kantor</th>
                            <th>Datang Telat/Kantor</th>
                            <th>Pulang Awal/Kantor</th>
                            <th>Cuti Normatif</th>
                            <th>Cuti Pribadi</th>
                            <th>Tidak Scan Masuk</th>
                            <th>Tidak Scan Pulang</th>
                            <th>Tidak Scan Istirahat</th>
                            <th>Tidak Scan Selesai Istirahat</th>
                            <th>Tidak Scan Mulai Lembur</th>
                            <th>Tidak Scan Selesai Lembur</th>
                            <th>Izin Lain-lain</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($attendances as $attendance)
                        <tr>
                            <td>{{ $attendance->pin }}</td>
                            <td>{{ $attendance->nip }}</td>
                            <td>{{ $attendance->nama }}</td>
                            <td>{{ $attendance->jabatan }}</td>
                            <td>{{ $attendance->departemen }}</td>
                            <td>{{ $attendance->kantor }}</td>
                            <td>{{ $attendance->izin_libur }}</td>
                            <td>{{ $attendance->kehadiran_jml }}</td>
                            <td>{{ $attendance->jam_menit_kehadiran }}</td>
                            <td>{{ $attendance->datang_terlambat_jml }}</td>
                            <td>{{ $attendance->jam_menit_datang_terlambat }}</td>
                            <td>{{ $attendance->pulang_awal_jml }}</td>
                            <td>{{ $attendance->jam_menit_pulang_awal }}</td>
                            <td>{{ $attendance->istirahat_lebih_jml }}</td>
                            <td>{{ $attendance->jam_menit_istirahat_lebih }}</td>
                            <td>{{ $attendance->scan_kerja_1x_masuk }}</td>
                            <td>{{ $attendance->keluar }}</td>
                            <td>{{ $attendance->lembur_jam }}</td>
                            <td>{{ $attendance->lembur_menit }}</td>
                            <td>{{ $attendance->scan_1x }}</td>
                            <td>{{ $attendance->tidak_hadir_tanpa_izin }}</td>
                            <td>{{ $attendance->libur_rutin_umum }}</td>
                            <td>{{ $attendance->izin_pribadi }}</td>
                            <td>{{ $attendance->izin_pulang_awal }}</td>
                            <td>{{ $attendance->izin_datang_terlambat }}</td>
                            <td>{{ $attendance->sakit_ada_surat_dokter }}</td>
                            <td>{{ $attendance->sakit_tanpa_surat_dokter }}</td>
                            <td>{{ $attendance->meninggalkan_tempat_kerja }}</td>
                            <td>{{ $attendance->izin_dinas_kantor }}</td>
                            <td>{{ $attendance->datang_telat_kantor }}</td>
                            <td>{{ $attendance->pulang_awal_kantor }}</td>
                            <td>{{ $attendance->cuti_normatif }}</td>
                            <td>{{ $attendance->cuti_pribadi }}</td>
                            <td>{{ $attendance->tidak_scan_masuk }}</td>
                            <td>{{ $attendance->tidak_scan_pulang }}</td>
                            <td>{{ $attendance->tidak_scan_istirahat }}</td>
                            <td>{{ $attendance->tidak_scan_selesai_istirahat }}</td>
                            <td>{{ $attendance->tidak_scan_mulai_lembur }}</td>
                            <td>{{ $attendance->tidak_scan_selesai_lembur }}</td>
                            <td>{{ $attendance->izin_lain_lain }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Pagination Links -->
                <div class="pagination-wrapper">
                    {{ $attendances->links('pagination::bootstrap-4', ['class' => 'pagination-sm']) }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection