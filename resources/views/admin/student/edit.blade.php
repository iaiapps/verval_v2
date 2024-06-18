@extends('layouts.app')

@section('title', 'Edit Siswa')

@section('content')

    <div class="card">
        <div class="card-body mt-3">
            <form method="POST" action="{{ route('student.update', $student->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nis" class="form-label">NIS</label>
                    <input id="nis" type="text" class="form-control" name="nis"
                        value="{{ old('nis', $student->nis) }}" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="nisn" class="form-label">NISN</label>
                    <input id="nisn" type="text" class="form-control" name="nisn"
                        value="{{ old('nisn', $student->nisn) }}" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="full_name" class="form-label">full_name</label>
                    <input id="full_name" type="text" class="form-control" name="full_name"
                        value="{{ old('full_name', $student->full_name) }}" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="place_of_birth" class="form-label">place_of_birth</label>
                    <input id="place_of_birth" type="text" class="form-control" name="place_of_birth"
                        value="{{ old('place_of_birth', $student->place_of_birth) }}" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="date_of_birth" class="form-label">date_of_birth</label>
                    <input id="date_of_birth" type="text" class="form-control" name="date_of_birth"
                        value="{{ old('date_of_birth', $student->date_of_birth) }}" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="parents_name" class="form-label">parents_name</label>
                    <input id="parents_name" type="text" class="form-control" name="parents_name"
                        value="{{ old('parents_name', $student->parents_name) }}" required autofocus>
                </div>

                <button type="submit" class="btn btn-success">
                    simpan data siswa
                </button>

            </form>
        </div>
    </div>
@endsection
