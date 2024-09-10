@extends('layouts.master') <!-- Assuming 'app' is the NiceAdmin template's layout -->

@section('content')
<div class="container">
    <div class="row mb-2">
        <div class="col-lg-12 d-flex justify-content-center align-items-center">
            <h2 style="text-align: center;">Tambah Karyawan</h2>
        </div>
    </div>


    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Ada masalah dengan inputan Anda.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('employees.store') }}" method="POST">
        @csrf

        <!-- Personal Data Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 style="text-align: center;">Data Pribadi</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="id_number" class="form-label"><strong>Nomor KTP</strong></label>
                        <input type="text" name="id_number" class="form-control" placeholder="16 digit">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="full_name" class="form-label"><strong>Nama Lengkap</strong></label>
                        <input type="text" name="full_name" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="nickname" class="form-label"><strong>Nama Panggilan</strong></label>
                        <input type="text" name="nickname" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="contract_date" class="form-label"><strong>Tanggal Kontrak</strong></label>
                        <input type="date" name="contract_date" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="work_date" class="form-label"><strong>Tanggal Kerja</strong></label>
                        <input type="date" name="work_date" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="work_time" class="form-label"><strong>Masa Kerja</strong></label>
                        <select name="work_time" class="form-control">
                            <option value=""></option>
                            <option value="Magang">Magang</option>
                            <option value="Kontrak">Kontrak</option>
                            <option value="Tetap">Tetap</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="group" class="form-label"><strong>Golongan</strong></label>
                        <input type="text" name="group" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="status" class="form-label"><strong>Status</strong></label>
                        <select name="status" class="form-control">
                            <option value=""></option>
                            <option value="Aktif">Aktif</option>
                            <option value="Berhenti">Berhenti</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="position" class="form-label"><strong>Posisi</strong></label>
                        <input type="text" name="position" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="nuptk" class="form-label"><strong>NUPTK</strong></label>
                        <input type="text" name="nuptk" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="gender" class="form-label"><strong>Jenis Kelamin</strong></label>
                        <select name="gender" class="form-control">
                            <option value=""></option>
                            <option value="pria">Pria</option>
                            <option value="wanita">Wanita</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="place_birth" class="form-label"><strong>Tempat Lahir</strong></label>
                        <input type="text" name="place_birth" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="birth_date" class="form-label"><strong>Tanggal Lahir</strong></label>
                        <input type="date" name="birth_date" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="religion" class="form-label"><strong>Agama</strong></label>
                        <select name="religion" class="form-control" required>
                            <option value=""></option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Islam">Islam</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Kong Hu Cu">Kong Hu Cu</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label"><strong>Email</strong></label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="hobby" class="form-label"><strong>Hobi</strong></label>
                        <input type="text" name="hobby" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="marital_status" class="form-label"><strong>Status Pernikahan</strong></label>
                        <select name="marital_status" class="form-control">
                            <option value=""></option>
                            <option value="menikah">Menikah</option>
                            <option value="belum">Belum</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="residence_address" class="form-label"><strong>Alamat Tempat Tinggal</strong></label>
                        <input type="text" name="residence_address" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="phone" class="form-label"><strong>Telepon</strong></label>
                        <input type="text" name="phone" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="address_emergency" class="form-label"><strong>Alamat Darurat</strong></label>
                        <input type="text" name="address_emergency" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="phone_emergency" class="form-label"><strong>Telepon Darurat</strong></label>
                        <input type="text" name="phone_emergency" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="blood_type" class="form-label"><strong>Golongan Darah</strong></label>
                        <select name="blood_type" class="form-control" required>
                            <option value=""></option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="AB">AB</option>
                            <option value="O">O</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="last_education" class="form-label"><strong>Pendidikan Terakhir</strong></label>
                        <input type="text" name="last_education" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="agency" class="form-label"><strong>Lembaga</strong></label>
                        <input type="text" name="agency" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="graduation_year" class="form-label"><strong>Tahun Kelulusan</strong></label>
                        <input type="text" name="graduation_year" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="competency_training_place" class="form-label"><strong>Tempat Pelatihan Kompetensi</strong></label>
                        <input type="text" name="competency_training_place" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="organizational_experience" class="form-label"><strong>Pengalaman Organisasi</strong></label>
                        <textarea class="form-control" style="height:150px" name="organizational_experience"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <h5 style="text-align: center;">Data Keluarga</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="mate_name" class="form-label"><strong>Nama Pasangan</strong></label>
                        <input type="text" name="mate_name" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="child_name" class="form-label"><strong>Nama Anak</strong></label>
                        <input type="text" name="child_name" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="wedding_date" class="form-label"><strong>Tanggal Pernikahan</strong></label>
                        <input type="date" name="wedding_date" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="wedding_certificate_number" class="form-label"><strong>Nomor Sertifikat Pernikahan</strong></label>
                        <input type="text" name="wedding_certificate_number" class="form-control">
                    </div>
                </div>
            </div>
        </div>


        <div class="">
            <button type="submit" class="btn btn-success me-2">
                <i class="bi bi-save"></i> Simpan
            </button>
            <a class="btn btn-secondary" href="{{ route('employees.index') }}">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>

    </form>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const maritalStatusSelect = document.getElementById('marital_status');
        const mateNameInput = document.getElementById('mate_name');
        const childNameInput = document.getElementById('child_name');
        const weddingDateInput = document.getElementById('wedding_date');
        const weddingCertificateNumberInput = document.getElementById('wedding_certificate_number');

        function toggleFields() {
            const isMarried = maritalStatusSelect.value === 'menikah';

            [mateNameInput, childNameInput, weddingDateInput, weddingCertificateNumberInput].forEach(input => {
                input.disabled = !isMarried;
                if (input.disabled) {
                    input.style.backgroundColor = '#f8f9fa';
                    input.style.color = '#6c757d';
                    input.style.cursor = 'not-allowed';
                } else {
                    input.style.backgroundColor = '';
                    input.style.color = '';
                    input.style.cursor = '';
                }
            });
        }

        maritalStatusSelect.addEventListener('change', toggleFields);
        toggleFields();
    });
</script>
@endsection