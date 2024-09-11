@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-center align-items-center mb-0">
                <h2 class="text-center">Arsip Karyawan</h2>
            </div>

            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No KTP</th>
                                    <th>Nama Lengkap</th>
                                    <th>Nama Panggilan</th>
                                    <th>Tanggal Kontrak</th>
                                    <th>Tanggal Kerja</th>
                                    <th>Masa Kerja</th>
                                    <th>Golongan</th>
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
                                    <!-- <th>Nama Pasangan</th>
                                    <th>Nama Anak</th>
                                    <th>Tanggal Pernikahan</th>
                                    <th>Nomor Sertifikat Pernikahan</th> -->
                                    <th width="400px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($archivedEmployees as $employee)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $employee->id_number }}</td>
                                    <td>{{ $employee->full_name }}</td>
                                    <td>{{ $employee->nickname }}</td>
                                    <td>{{ $employee->contract_date }}</td>
                                    <td>{{ $employee->work_date }}</td>
                                    <td>{{ $employee->work_time }}</td>
                                    <td>{{ $employee->group }}</td>
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
                                    <!-- <td>{{ $employee->mate_name ?? '' }}</td>
                                    <td>{{ $employee->child_name ?? '' }}</td>
                                    <td>{{ $employee->wedding_date ?? '' }}</td>
                                    <td>{{ $employee->wedding_certificate_number ?? '' }}</td> -->
                                    <td class="">
                                        <div class="d-inline-flex">
                                            <form action="{{ route('employees.restore', $employee->id_number) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-success btn-sm me-2">
                                                    <i class="bi bi-arrow-counterclockwise"></i> Pulihkan
                                                </button>
                                            </form>
                                            <form action="{{ route('employee.destroyArchive', $employee->id_number) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini secara permanen?');">
                                                    <i class="bi bi-trash"></i> Hapus Permanen
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection