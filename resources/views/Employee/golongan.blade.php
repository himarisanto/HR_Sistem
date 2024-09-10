@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-center align-items-center mb-0">
                <h2 class="text-center">Golongan</h2>
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
                                    <th>NIK</th>
                                    <th>Nama Lengkap</th>
                                    <th>Nama Panggilan</th>
                                    <th>Golongan</th>
                                    <th width="200px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $employee)
                                <tr>
                                    <td>{{ $loop->iteration }}</td> <!-- Menggunakan $loop->iteration sebagai nomor urut -->
                                    <td>{{ $employee->id_number }}</td>
                                    <td>{{ $employee->full_name }}</td>
                                    <td>{{ $employee->nickname }}</td>
                                    <td>{{ $employee->group }}</td>
                                    <td>
                                        <div class="d-inline-flex">
                                            <form action="{{ route('employees.destroy', $employee->id_number) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin ingin menghapus karyawan ini?');">
                                                    <i class="bi bi-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $employees->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection