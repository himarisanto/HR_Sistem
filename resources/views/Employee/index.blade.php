@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Karyawan</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('employees.create') }}"> Tambah Karyawan</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nomor KTP</th>
            <th>Nama Lengkap</th>
            <th>Nama Panggilan</th>
            <th>Tanggal Kontrak</th>
            <th>Tanggal Kerja</th>
            <th>Status</th>
            <th>Posisi</th>
            <th>NUPTK</th>
            <th>Jenis Kelamin</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Agama</th>
            <th>Email</th>
            <th>Hobi</th>
            <th>Status Pernikahan</th>
            <th>Alamat Tempat Tinggal</th>
            <th>Telepon</th>
            <th>Alamat Darurat</th>
            <th>Telepon Darurat</th>
            <th>Golongan Darah</th>
            <th>Pendidikan Terakhir</th>
            <th>Lembaga</th>
            <th>Tahun Kelulusan</th>
            <th>Tempat Pelatihan Kompetensi</th>
            <th>Pengalaman Organisasi</th>
            <th>Nama Pasangan</th>
            <th>Nama Anak</th>
            <th>Tanggal Pernikahan</th>
            <th>Nomor Sertifikat Pernikahan</th>
            <th width="280px">Aksi</th>
        </tr>
        @foreach ($employee as $employee)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $employee->id_number }}</td>
            <td>{{ $employee->full_name }}</td>
            <td>{{ $employee->nickname }}</td>
            <td>{{ $employee->contract_date }}</td>
            <td>{{ $employee->work_date }}</td>
            <td>{{ $employee->status }}</td>
            <td>{{ $employee->position }}</td>
            <td>{{ $employee->nuptk }}</td>
            <td>{{ $employee->gender }}</td>
            <td>{{ $employee->place_birth }}</td>
            <td>{{ $employee->birth_date }}</td>
            <td>{{ $employee->religion }}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->hobby }}</td>
            <td>{{ $employee->marital_status }}</td>
            <td>{{ $employee->residence_address }}</td>
            <td>{{ $employee->phone }}</td>
            <td>{{ $employee->address_emergency }}</td>
            <td>{{ $employee->phone_emergency }}</td>
            <td>{{ $employee->blood_type }}</td>
            <td>{{ $employee->last_education }}</td>
            <td>{{ $employee->agency }}</td>
            <td>{{ $employee->graduation_year }}</td>
            <td>{{ $employee->competency_training_place }}</td>
            <td>{{ $employee->organizational_experience }}</td>
            <td>{{ $employee->mate_name }}</td>
            <td>{{ $employee->child_name }}</td>
            <td>{{ $employee->wedding_date }}</td>
            <td>{{ $employee->wedding_certificate_number }}</td>
            <td>
                <form action="{{ route('employees.destroy',$employee->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('employees.show',$employee->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('employees.edit',$employee->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

</div>
@endsection