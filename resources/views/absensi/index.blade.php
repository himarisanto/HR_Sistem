@extends('layouts.master')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2 class="text-center">Absensi</h2>
        </div>
        <div class="card-body d-flex align-items-center">
            <!-- Tombol Export -->
            <a href="{{ route('absensi.export') }}" class="btn btn-primary me-2">Export</a>

            <!-- Form Import -->
            <form action="{{ route('absensi.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <button type="submit" class="btn btn-primary">Import</button>

                <input type="file" name="file" accept=".xlsx, .xls, .csv">

            </form>

        </div>


        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>PIN</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Departemen</th>
                        <th>Kantor</th>
                        <th>Izin Libur</th>
                        <th>kehadiran jml</th>
                        <th>Jam:menit</th>
                        <th>Datang terlambat jml</th>
                        <th>jam:menit</th>
                        <th>pulang awal jml</th>
                        <th>jam:Menit</th>
                        <th>istirahat lebih jml</th>
                        <th>Jam:menit</th>
                        <th>Scan kerja 1x masuk</th>
                        <th>keluar</th>
                        <th>Lembur Jam</th>
                        <th>menit</th>
                        <th>Scan 1x</th>
                        <th>Tidak hadir tanpa Izin</th>
                        <th>Libut rutin & umum</th>
                        <th>Izin pribadi</th>
                        <th>Izin pulang Awal</th>
                        <th>Izin Datang Terlambat</th>
                        <th>Sakit ada surat dokter</th>
                        <th>Sakit Tanpa Surat Dokter</th>
                        <th>Meninggalkan tempat kerja</th>
                        <th>Izin Dinas/kantor</th>
                        <th>Datang Telat/Kantor</th>
                        <th>Pualng Awal/Kantor</th>
                        <th>Cuti normatif</th>
                        <th>Cuti pribadi</th>
                        <th>Tidak scan/masuk</th>
                        <th>Tidak scan/pulang</th>
                        <th>Tidak scan/istirahat</th>
                        <th>Tidak scan/selesai istirahat</th>
                        <th>Tidak scan/Mulai lembur</th>
                        <th>Tidak scan/selesai lembur</th>
                        <th>Izin lain-lain</th>

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
        </div>
    </div>
</div>
</div>
@endsection