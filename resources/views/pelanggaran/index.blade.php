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

    <!-- Tautan untuk menambahkan catatan pelanggaran -->
   

    <!-- Tabel untuk menampilkan catatan pelanggaran -->
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Number</th>
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
                <td>{{ $record->id_number }}</td>
                <td>{{ $record->offense_type }}</td>
                <td>{{ $record->offense_date->format('d-m-Y') }}</td> 
                <td>{{ $record->description }}</td>
                <td>
                    
                    <a href="{{ route('pelanggaran.edit', $record->id_number) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('pelanggaran.destroy', $record->id_number) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection