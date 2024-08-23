@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Karyawan</h2>
            </div>
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

        <h2>Data Pribadi</h2>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nomor KTP:</strong>
                    <input type="text" name="id_number" class="form-control" value="{{ old('id_number', $employee->id_number) }}" placeholder="16 digit">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Lengkap:</strong>
                    <input type="text" name="full_name" class="form-control" value="{{ old('full_name', $employee->full_name) }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Panggilan:</strong>
                    <input type="text" name="nickname" class="form-control" value="{{ old('nickname', $employee->nickname) }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tanggal Kontrak:</strong>
                    <input type="date" name="contract_date" class="form-control" value="{{ old('contract_date', $employee->contract_date) }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tanggal Kerja:</strong>
                    <input type="date" name="work_date" class="form-control" value="{{ old('work_date', $employee->work_date) }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Masa Kerja:</strong>
                    <select name="work_time" class="form-control">
                        <option value="Magang" {{ $employee->work_time == 'Magang' ? 'selected' : '' }}>Magang</option>
                        <option value="Kontrak" {{ $employee->work_time == 'Kontrak' ? 'selected' : '' }}>Kontrak</option>
                        <option value="Tetap" {{ $employee->work_time == 'Tetap' ?  'selected' : '' }}>Tetap</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status:</strong>
                    <select name="status" class="form-control">
                        <option value="Aktif" {{ $employee->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="Berhenti" {{ $employee->status == 'Berhenti' ? 'selected' : '' }}>Berhenti</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Posisi:</strong>
                    <input type="text" name="position" class="form-control" value="{{ old('position', $employee->position) }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>NUPTK:</strong>
                    <input type="text" name="nuptk" class="form-control" value="{{ old('nuptk', $employee->nuptk) }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Jenis Kelamin:</strong>
                    <select name="gender" class="form-control">
                        <option value="pria" {{ $employee->gender == 'pria' ? 'selected' : '' }}>Pria</option>
                        <option value="wanita" {{ $employee->gender == 'wanita' ? 'selected' : '' }}>Wanita</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tempat Lahir:</strong>
                    <input type="text" name="place_birth" class="form-control" value="{{ old('place_birth', $employee->place_birth) }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tanggal Lahir:</strong>
                    <input type="date" name="birth_date" class="form-control" value="{{ old('birth_date', $employee->birth_date) }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Agama:</strong>
                    <select name="religion" class="form-control" required>
                        <option value="Kristen" {{ $employee->religion == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                        <option value="Katolik" {{ $employee->religion == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                        <option value="Islam" {{ $employee->religion == 'Islam' ? 'selected' : '' }}>Islam</option>
                        <option value="Hindu" {{ $employee->religion == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                        <option value="Buddha" {{ $employee->religion == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                        <option value="Kong Hu Cu" {{ $employee->religion == 'Kong Hu Cu' ? 'selected' : '' }}>Kong Hu Cu</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $employee->email) }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Hobi:</strong>
                    <input type="text" name="hobby" class="form-control" value="{{ old('hobby', $employee->hobby) }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status Pernikahan:</strong>
                    <select name="marital_status" class="form-control">
                        <option value="menikah" {{ $employee->marital_status == 'menikah' ? 'selected' : '' }}>Menikah</option>
                        <option value="belum" {{ $employee->marital_status == 'belum' ? 'selected' : '' }}>Belum</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Alamat Tempat Tinggal:</strong>
                    <input type="text" name="residence_address" class="form-control" value="{{ old('residence_address', $employee->residence_address) }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Telepon:</strong>
                    <input type="text" name="phone" class="form-control" value="{{ old('phone', $employee->phone) }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Alamat Darurat:</strong>
                    <input type="text" name="address_emergency" class="form-control" value="{{ old('address_emergency', $employee->address_emergency) }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Telepon Darurat:</strong>
                    <input type="text" name="phone_emergency" class="form-control" value="{{ old('phone_emergency', $employee->phone_emergency) }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Golongan Darah:</strong>
                    <select name="blood_type" class="form-control" required>
                        <option value="A" {{ $employee->blood_type == 'A' ? 'selected' : '' }}>A</option>
                        <option value="B" {{ $employee->blood_type == 'B' ? 'selected' : '' }}>B</option>
                        <option value="AB" {{ $employee->blood_type == 'AB' ? 'selected' : '' }}>AB</option>
                        <option value="O" {{ $employee->blood_type == 'O' ? 'selected' : '' }}>O</option>
                        <option value="A+" {{ $employee->blood_type == 'A+' ? 'selected' : '' }}>A+</option>
                        <option value="A-" {{ $employee->blood_type == 'A-' ? 'selected' : '' }}>A-</option>
                        <option value="B+" {{ $employee->blood_type == 'B+' ? 'selected' : '' }}>B+</option>
                        <option value="B-" {{ $employee->blood_type == 'B-' ? 'selected' : '' }}>B-</option>
                        <option value="AB+" {{ $employee->blood_type == 'AB+' ? 'selected' : '' }}>AB+</option>
                        <option value="AB-" {{ $employee->blood_type == 'AB-' ? 'selected' : '' }}>AB-</option>
                        <option value="O+" {{ $employee->blood_type == 'O+' ? 'selected' : '' }}>O+</option>
                        <option value="O-" {{ $employee->blood_type == 'O-' ? 'selected' : '' }}>O-</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Pendidikan Terakhir:</strong>
                    <input type="text" name="last_education" class="form-control" value="{{ old('last_education', $employee->last_education) }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Lembaga:</strong>
                    <input type="text" name="agency" class="form-control" value="{{ old('agency', $employee->agency) }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tahun Kelulusan:</strong>
                    <input type="text" name="graduation_year" class="form-control" value="{{ old('graduation_year', $employee->graduation_year) }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tempat Pelatihan Kompetensi:</strong>
                    <input type="text" name="competency_training_place" class="form-control" value="{{ old('competency_training_place', $employee->competency_training_place) }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Pengalaman Organisasi:</strong>
                    <textarea class="form-control" style="height:150px" name="organizational_experience">{{ old('organizational_experience', $employee->organizational_experience) }}</textarea>
                </div>
            </div>
        </div>

        <h2>Data Keluarga</h2>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Pasangan:</strong>
                <input type="text" name="mate_name" value="{{ $employee->familyDate->mate_name ?? '' }}" class="form-control" placeholder="Nama Pasangan">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Anak:</strong>
                <input type="text" name="child_name" value="{{ $employee->familyDate->child_name ?? '' }}" class="form-control" placeholder="Nama Anak">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tanggal Pernikahan:</strong>
                <input type="date" name="wedding_date" value="{{ $employee->familyDate->wedding_date ?? '' }}" class="form-control" placeholder="Tanggal Pernikahan">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nomor Sertifikat Pernikahan:</strong>
                <input type="text" name="wedding_certificate_number" value="{{ $employee->familyDate->wedding_certificate_number ?? '' }}" class="form-control" placeholder="Nomor Sertifikat Pernikahan">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a class="btn btn-primary" href="{{ route('employees.index') }}">Kembali</a>
        </div>
</div>
</form>
</div>
@endsection