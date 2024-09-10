@extends('layouts.master')

@section('content')
<div class="container mt-2">
    <div class="row mb-1">
        <div class="col-lg-12">
            <h2 style="text-align: center;">Edit Karyawan</h2>
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

    <form action="{{ route('employees.update', $employee->id_number) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Data Pribadi -->
        <div class="card mb-4">
            <div class="card-header">
                <h5>Data Pribadi</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Nomor KTP -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id_number">Nomor KTP:</label>
                            <input type="text" name="id_number" class="form-control" value="{{ old('id_number', $employee->id_number) }}" placeholder="16 digit">
                        </div>
                    </div>

                    <!-- Nama Lengkap -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="full_name">Nama Lengkap:</label>
                            <input type="text" name="full_name" class="form-control" value="{{ old('full_name', $employee->full_name) }}">
                        </div>
                    </div>

                    <!-- Nama Panggilan -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nickname">Nama Panggilan:</label>
                            <input type="text" name="nickname" class="form-control" value="{{ old('nickname', $employee->nickname) }}">
                        </div>
                    </div>

                    <!-- Tanggal Kontrak -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="contract_date">Tanggal Kontrak:</label>
                            <input type="date" name="contract_date" class="form-control" value="{{ old('contract_date', $employee->contract_date) }}">
                        </div>
                    </div>

                    <!-- Tanggal Kerja -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="work_date">Tanggal Kerja:</label>
                            <input type="date" name="work_date" class="form-control" value="{{ old('work_date', $employee->work_date) }}">
                        </div>
                    </div>

                    <!-- Masa Kerja -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="work_time">Masa Kerja:</label>
                            <select name="work_time" class="form-control">
                                <option value="Magang" {{ $employee->work_time == 'Magang' ? 'selected' : '' }}>Magang</option>
                                <option value="Kontrak" {{ $employee->work_time == 'Kontrak' ? 'selected' : '' }}>Kontrak</option>
                                <option value="Tetap" {{ $employee->work_time == 'Tetap' ? 'selected' : '' }}>Tetap</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="group">Golongan:</label>
                            <input type="text" name="group" class="form-control" value="{{ old('group', $employee->group) }}">
                        </div>
                    </div>
                    <!-- Status -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status">Status:</label>
                            <select name="status" class="form-control">
                                <option value="Aktif" {{ $employee->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="Berhenti" {{ $employee->status == 'Berhenti' ? 'selected' : '' }}>Berhenti</option>
                            </select>
                        </div>
                    </div>

                    <!-- Posisi -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="position">Posisi:</label>
                            <input type="text" name="position" class="form-control" value="{{ old('position', $employee->position) }}">
                        </div>
                    </div>

                    <!-- NUPTK -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nuptk">NUPTK:</label>
                            <input type="text" name="nuptk" class="form-control" value="{{ old('nuptk', $employee->nuptk) }}">
                        </div>
                    </div>

                    <!-- Jenis Kelamin -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gender">Jenis Kelamin:</label>
                            <select name="gender" class="form-control">
                                <option value="pria" {{ $employee->gender == 'pria' ? 'selected' : '' }}>Pria</option>
                                <option value="wanita" {{ $employee->gender == 'wanita' ? 'selected' : '' }}>Wanita</option>
                            </select>
                        </div>
                    </div>

                    <!-- Tempat Lahir -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="place_birth">Tempat Lahir:</label>
                            <input type="text" name="place_birth" class="form-control" value="{{ old('place_birth', $employee->place_birth) }}">
                        </div>
                    </div>

                    <!-- Tanggal Lahir -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="birth_date">Tanggal Lahir:</label>
                            <input type="date" id="birth_date" name="birth_date" class="form-control" value="{{ old('birth_date', $employee->birth_date ? $employee->birth_date->format('Y-m-d') : '') }}">
                        </div>
                    </div>

                    <!-- Agama -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="religion">Agama:</label>
                            <select name="religion" class="form-control">
                                <option value="Kristen" {{ $employee->religion == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                <option value="Katolik" {{ $employee->religion == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                <option value="Islam" {{ $employee->religion == 'Islam' ? 'selected' : '' }}>Islam</option>
                                <option value="Hindu" {{ $employee->religion == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                <option value="Buddha" {{ $employee->religion == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                <option value="Kong Hu Cu" {{ $employee->religion == 'Kong Hu Cu' ? 'selected' : '' }}>Kong Hu Cu</option>
                            </select>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email', $employee->email) }}">
                        </div>
                    </div>

                    <!-- Hobi -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="hobby">Hobi:</label>
                            <input type="text" name="hobby" class="form-control" value="{{ old('hobby', $employee->hobby) }}">
                        </div>
                    </div>

                    <!-- Status Pernikahan -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="marital_status">Status Pernikahan:</label>
                            <select name="marital_status" class="form-control">
                                <option value="menikah" {{ $employee->marital_status == 'menikah' ? 'selected' : '' }}>Menikah</option>
                                <option value="belum" {{ $employee->marital_status == 'belum' ? 'selected' : '' }}>Belum</option>
                            </select>
                        </div>
                    </div>

                    <!-- Alamat Tempat Tinggal -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="residence_address">Alamat Tempat Tinggal:</label>
                            <input type="text" name="residence_address" class="form-control" value="{{ old('residence_address', $employee->residence_address) }}">
                        </div>
                    </div>

                    <!-- Telepon -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone">Telepon:</label>
                            <input type="text" name="phone" class="form-control" value="{{ old('phone', $employee->phone) }}">
                        </div>
                    </div>

                    <!-- Alamat Darurat -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address_emergency">Alamat Darurat:</label>
                            <input type="text" name="address_emergency" class="form-control" value="{{ old('address_emergency', $employee->address_emergency) }}">
                        </div>
                    </div>

                    <!-- Telepon Darurat -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone_emergency">Telepon Darurat:</label>
                            <input type="text" name="phone_emergency" class="form-control" value="{{ old('phone_emergency', $employee->phone_emergency) }}">
                        </div>
                    </div>

                    <!-- Golongan Darah -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="blood_type">Golongan Darah:</label>
                            <select name="blood_type" class="form-control">
                                <option value="A" {{ $employee->blood_type == 'A' ? 'selected' : '' }}>A</option>
                                <option value="B" {{ $employee->blood_type == 'B' ? 'selected' : '' }}>B</option>
                                <option value="AB" {{ $employee->blood_type == 'AB' ? 'selected' : '' }}>AB</option>
                                <option value="O" {{ $employee->blood_type == 'O' ? 'selected' : '' }}>O</option>
                            </select>
                        </div>
                    </div>

                    <!-- Pendidikan Terakhir -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="last_education">Pendidikan Terakhir:</label>
                            <input type="text" name="last_education" class="form-control" value="{{ old('last_education', $employee->last_education) }}">
                        </div>
                    </div>

                    <!-- Lembaga -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="agency">Lembaga:</label>
                            <input type="text" name="agency" class="form-control" value="{{ old('agency', $employee->agency) }}">
                        </div>
                    </div>

                    <!-- Tahun Kelulusan -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="graduation_year">Tahun Kelulusan:</label>
                            <input type="text" name="graduation_year" class="form-control" value="{{ old('graduation_year', $employee->graduation_year) }}">
                        </div>
                    </div>

                    <!-- Tempat Pelatihan Kompetensi -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="competency_training_place">Tempat Pelatihan Kompetensi:</label>
                            <input type="text" name="competency_training_place" class="form-control" value="{{ old('competency_training_place', $employee->competency_training_place) }}">
                        </div>
                    </div>

                    <!-- Pengalaman Organisasi -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="organizational_experience">Pengalaman Organisasi:</label>
                            <textarea class="form-control" style="height:150px" name="organizational_experience">{{ old('organizational_experience', $employee->organizational_experience) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Keluarga -->
        <div class="card mb-4">
            <div class="card-header">
                <h5>Data Keluarga</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Nama Pasangan -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mate_name">Nama Pasangan:</label>
                            <input type="text" name="mate_name" value="{{ $employee->familyDate->mate_name ?? '' }}" class="form-control" placeholder="Nama Pasangan">
                        </div>
                    </div>

                    <!-- Nama Anak -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="child_name">Nama Anak:</label>
                            <input type="text" name="child_name" value="{{ $employee->familyDate->child_name ?? '' }}" class="form-control" placeholder="Nama Anak">
                        </div>
                    </div>

                    <!-- Tanggal Pernikahan -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="wedding_date">Tanggal Pernikahan:</label>
                            <input type="date" name="wedding_date" value="{{ $employee->familyDate->wedding_date ?? '' }}" class="form-control" placeholder="Tanggal Pernikahan">
                        </div>
                    </div>

                    <!-- Nomor Sertifikat Pernikahan -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="wedding_certificate_number">Nomor Sertifikat Pernikahan:</label>
                            <input type="text" name="wedding_certificate_number" value="{{ $employee->familyDate->wedding_certificate_number ?? '' }}" class="form-control" placeholder="Nomor Sertifikat Pernikahan">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tombol Simpan dan Kembali -->
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
@endsection