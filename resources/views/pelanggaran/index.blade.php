@extends('layouts.master')

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
                <th>Nama</th>
                <th>Jenis Pelanggaran</th>
                <th>Tanggal Pelanggaran</th>
                <th>Deskripsi pelanggaran</th>
                <th>Status Follow-up</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($records as $record)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $record->employee->full_name }}</td>
                <td>{{ $record->offense_type }}</td>
                <td>{{ $record->offense_date->format('d-m-Y') }}</td>
                <td>{{ $record->description }}</td>
                <td>
                    @if ($record->followed_up)
                    <span>
                        <a href="#" class="text-success" data-bs-toggle="modal" data-bs-target="#viewFollowupModal" data-id="{{ $record->id_number }}" data-notes="{{ $record->followup_notes }}">
                            Sudah Follow-up
                        </a>
                        <a href="#" class="text-primary ms-2" data-bs-toggle="modal" data-bs-target="#viewFollowupModal" data-id="{{ $record->id_number }}" data-notes="{{ $record->followup_notes }}">
                            <i class="bi bi-eye"></i>
                        </a>
                    </span>
                    @else
                    Belum Follow-up
                    @endif
                </td>
                <td>
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

                        <!-- Tombol Follow-up -->
                        <button class="btn btn-outline-success btn-sm me-2" data-bs-toggle="modal" data-bs-target="#followupModal" data-id="{{ $record->id_number }}">
                            <i class="bi bi-check2-square"></i> Catatan
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal untuk melihat deskripsi follow-up -->
<div class="modal fade" id="viewFollowupModal" tabindex="-1" aria-labelledby="viewFollowupModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewFollowupModalLabel">Detail Follow-up</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Deskripsi Follow-up:</strong></p>
                <p id="followupNotes"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="followupModal" tabindex="-1" aria-labelledby="followupModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="followupModalLabel">Follow-up Pelanggaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('pelanggaran.followup.save') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id_number" id="id_number" value="">
                    <div class="mb-3">
                        <label for="followup_notes" class="form-label">Deskripsi Follow-up</label>
                        <textarea class="form-control" name="followup_notes" id="followup_notes" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan Follow-up</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Script untuk mengisi modal view follow-up -->
<script>
    var viewFollowupModal = document.getElementById('viewFollowupModal');
    viewFollowupModal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget;
        var followupNotes = button.getAttribute('data-notes');
        var modalBody = viewFollowupModal.querySelector('#followupNotes');
        modalBody.textContent = followupNotes;
    });

    var followupModal = document.getElementById('followupModal');
    followupModal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget;
        var idNumber = button.getAttribute('data-id');
        var modalInput = followupModal.querySelector('#id_number');
        modalInput.value = idNumber;
    });
</script>

@endsection