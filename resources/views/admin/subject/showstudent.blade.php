@extends('layouts.app')

@section('title', 'Data Kelas')
@section('content')
    <div class="card rounded p-3">
        <p class="text-center fs-5 m-0">Data Siswa Kelas {{ $group->kelas }}</p>
        <hr>
        <div class="table-responsive">
            <table id="table" class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nama Siswa</th>
                        <th scope="col">Jenis Kelamin</th>
                        {{-- <th scope="col">Kelas</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>

                            <td>{{ $student->name }} <input type="text" value="{{ $student->id }}"
                                    name="student_id[{{ $student->id }}]" hidden></td>
                            <td>{{ $student->gender }}</td>
                            {{-- <td>{{ $student->group->kelas ?? 'belum ditentukan' }}</td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
@include('layouts.partials.scripts')
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}">
    <style>
        .large {
            width: 25px;
            height: 15px;
        }
    </style>
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
