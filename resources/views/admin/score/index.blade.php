@extends('layouts.app')

@section('title', 'Data Siswa')

@section('content')

    <div class="card rounded p-3">
        <div class="table-responsive">
            <table id="table" class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">a1</th>
                        <th scope="col">a2</th>
                        <th scope="col">a3</th>
                        <th scope="col">a4</th>
                        <th scope="col">a5</th>
                        <th scope="col">a6</th>
                        <th scope="col">b1</th>
                        <th scope="col">b2</th>
                        <th scope="col">b3a</th>
                        <th scope="col">b3b</th>
                        {{-- <th scope="col">b3c</th> --}}
                        <th scope="col">r</th>
                        <th scope="col">preview</th>
                        <th scope="col">action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($scores as $score)
                        <tr>
                            <td>{{ $score->id }}</td>
                            <td>{{ $score->student->full_name }}</td>
                            <td>{{ $score->a1 }}</td>
                            <td>{{ $score->a2 }}</td>
                            <td>{{ $score->a3 }}</td>
                            <td>{{ $score->a4 }}</td>
                            <td>{{ $score->a5 }}</td>
                            <td>{{ $score->a6 }}</td>
                            <td>{{ $score->b1 }}</td>
                            <td>{{ $score->b2 }}</td>
                            <td>{{ $score->b3a }}</td>
                            <td>{{ $score->b3b }}</td>
                            {{-- <td>{{ $score->b3c }}</td> --}}
                            <td>{{ $score->r }}</td>

                            <td> <a href="{{ route('score.show', $score->id) }}" class="btn btn-primary btn-sm">preview</a>
                            </td>
                            <td>
                                <a href="{{ route('score.edit', $score->id) }}" class="btn btn-warning btn-sm">edit</a>

                                <form method="POST" action="{{ route('score.destroy', $score->id) }}" class="d-inline"
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
