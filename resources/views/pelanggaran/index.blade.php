@extends('layouts.master') <!-- Assuming 'layouts.master' is your main layout -->

@section('content')
<div class="container">
    <h1 style="text-align: center;">Catatan Pelanggaran</h1>

    <!-- Menampilkan pesan sukses jika ada -->
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>NO</th>
                <th>Nama </th>
                <th>Jenis Pelanggaran</th>
                <th>Tanggal Pelanggaran</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($records as $record)
            <tr>
                <td>{{ $record->id }}</td>
                <td>{{ $record->employee->full_name }}</td>
                <td>{{ $record->offense_type }}</td>
                <td>{{ $record->offense_date->format('d-m-Y') }}</td>
                <td>{{ $record->description }}</td>
                <td class="">
                    <div class="d-inline-flex">
                        <a href="{{ route('pelanggaran.edit', $record->id_number) }}" class="btn btn-outline-primary btn-sm me-2">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                        <form action="{{ route('pelanggaran.destroy', $record->id_number) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure you want to delete this record?');">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                        </form>
                    </div>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection