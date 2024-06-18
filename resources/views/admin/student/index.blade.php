@extends('layouts.app')

@section('title', 'Data Siswa')

@section('content')

    <div class="card rounded p-3">
        <div class="table-responsive">
            <table id="table" class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NISN</th>
                        <th scope="col">NIS</th>
                        <th scope="col">Nama</th>
                        <th scope="col">TTL</th>
                        <th scope="col">Orang Tua</th>
                        <th scope="col">Verifikasi</th>
                        <th scope="col">Preview</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->nisn }}</td>
                            <td>{{ $student->nis }}</td>
                            <td>{{ $student->full_name }}</td>
                            <td>{{ $student->place_of_birth }}, {{ $student->date_of_birth }}</td>
                            <td>{{ $student->parents_name ?? 'belum ditentukan' }}</td>
                            <td>
                                @if ($student->isVerified == 1)
                                    <button class="btn btn-primary btn-sm">sudah</button>
                                @else
                                    <button class="btn btn-danger btn-sm">belum</button>
                                @endif
                            </td>
                            <td> <a href="{{ route('student.show', $student->id) }}"
                                    class="btn btn-primary btn-sm">preview</a></td>
                            <td>
                                <form method="POST" action="{{ route('student.destroy', $student->id) }}" class="d-inline"
                                    onsubmit="return confirm('Apakah anda yakin untuk menghapus data ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('assets/datatables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                "pageLength": 50
            });
        });
    </script>
@endpush
