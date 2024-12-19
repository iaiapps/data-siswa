@extends('layouts.app')

@section('title', 'Data Alumni')
@section('content')
    <div class="mb-3">
        <a href="{{ route('graduation.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Tambah Data
            Alumni</a>
    </div>
    <div class="card p-3 rounded">
        <div class="table-responsive">

            <div class="table-responsive">
                <table id="table" class="table table-striped align-middle" style="width: 100%">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Siswa</th>
                            <th scope="col">Tahun Lulus</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($graduations as $graduation)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $graduation->student->name }} </td>
                                <td>{{ $graduation->year->year }} </td>
                                <td>{{ $graduation->status }} </td>
                                <td>
                                    <a href="{{ route('student.show', $graduation->student->id) }}"
                                        class="btn btn-success btn-sm"><i class="bi bi-info-circle"></i>
                                        info</a>
                                    {{-- <a href="{{ route('graduation.edit', $graduation->id) }}"
                                        class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i>
                                        edit</a> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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
