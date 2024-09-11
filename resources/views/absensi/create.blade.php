@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h3 class="text-center">Tambah Data Absensi</h3>
        </div>
        <div class="card-body">
            <!-- Form untuk input data absensi baru -->
            <form action="{{ route('absensi.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="pin">PIN</label>
                    <input type="text" name="pin" class="form-control" value="{{ old('pin') }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="nip">NIP</label>
                    <input type="text" name="nip" class="form-control" value="{{ old('nip') }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="jabatan">Jabatan</label>
                    <input type="text" name="jabatan" class="form-control" value="{{ old('jabatan') }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="departemen">Departemen</label>
                    <input type="text" name="departemen" class="form-control" value="{{ old('departemen') }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="kantor">Kantor</label>
                    <input type="text" name="kantor" class="form-control" value="{{ old('kantor') }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="kehadiran_jml">Jumlah Kehadiran</label>
                    <input type="number" name="kehadiran_jml" class="form-control" value="{{ old('kehadiran_jml') }}">
                </div>

                <div class="form-group mb-3">
                    <label for="datang_terlambat_jml">Jumlah Datang Terlambat</label>
                    <input type="number" name="datang_terlambat_jml" class="form-control" value="{{ old('datang_terlambat_jml') }}">
                </div>

                <div class="form-group mb-3">
                    <label for="lembur_jam">Lembur (Jam)</label>
                    <input type="number" name="lembur_jam" class="form-control" value="{{ old('lembur_jam') }}">
                </div>

                <div class="form-group mb-3">
                    <label for="lembur_menit">Lembur (Menit)</label>
                    <input type="number" name="lembur_menit" class="form-control" value="{{ old('lembur_menit') }}">
                </div>

                <div class="form-group mb-3">
                    <label for="izin_sakit">Izin Sakit</label>
                    <input type="text" name="izin_sakit" class="form-control" value="{{ old('izin_sakit') }}">
                </div>

                <div class="form-group mb-3">
                    <label for="izin_cuti">Izin Cuti</label>
                    <input type="text" name="izin_cuti" class="form-control" value="{{ old('izin_cuti') }}">
                </div>

                <div class="form-group mb-3">
                    <label for="izin_tanpa_keterangan">Izin Tanpa Keterangan</label>
                    <input type="text" name="izin_tanpa_keterangan" class="form-control" value="{{ old('izin_tanpa_keterangan') }}">
                </div>

                <div class="form-group mb-3">
                    <label for="izin_lain_lain">Izin Lain-lain</label>
                    <input type="text" name="izin_lain_lain" class="form-control" value="{{ old('izin_lain_lain') }}">
                </div>

                <!-- Tambahkan field lain sesuai kebutuhan -->

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('absensi.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection