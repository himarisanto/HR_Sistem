@extends('layouts.master')

@section('content')
<div class="container">
    <h1 class="text-center mb-1">Create Employee Record</h1>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="card" style="max-width: 800px; margin: auto; padding: 35px;">
        <div class="card-body">
            <form action="{{ route('pelanggaran.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="id_number">Employee ID:</label>
                    <select id="id_number" name="id_number" class="form-control" required>
                        <option value="">Select Employee</option>
                        @foreach($employees as $employee)
                        <option value="{{ $employee->id_number }}">{{ $employee->id_number }} - {{ $employee->full_name }}</option>
                        @endforeach
                    </select>
                    @error('id_number')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="offense_type">Offense Type:</label>
                    <input type="text" id="offense_type" name="offense_type" class="form-control" required>
                    @error('offense_type')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="offense_date">Offense Date:</label>
                    <input type="date" id="offense_date" name="offense_date" class="form-control" required>
                    @error('offense_date')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" class="form-control"></textarea>
                    @error('description')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection