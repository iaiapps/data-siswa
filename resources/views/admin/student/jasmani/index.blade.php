@extends('layouts.app')

@section('title', 'Data Ortu')
@section('content')
    <div class="card p-3 rounded">
        <div class="table-responsive">
            <div class="mb-3">
                <a href="{{ route('studentparent.create') }}" class="btn btn-success"><i class="bi bi-arrow-down-circle"></i>
                    Create
                    Data</a>
            </div>
            <div class="table-responsive">
                <table id="table" class="table table-striped align-middle" style="width: 100%">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Tinggi Badan</th>
                            <th scope="col">Berat Badan</th>
                            <th scope="col">Golongan Darah</th>
                            <th scope="col">Riwayat Penyakit</th>

                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($studentparents as $studentparent)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $studentparent->full_name }}</td>
                                <td>{{ $studentparent->gender }}</td>
                                <td>{{ $studentparent->place_of_birth }}, {{ $studentparent->date_of_birth }}</td>
                                <td>
                                    <a href="{{ route('studentparent.show', $studentparent->id) }}"
                                        class="btn btn-success btn-sm"><i class="bi bi-info-circle"></i>
                                        info</a>
                                    <a href="{{ route('studentparent.edit', $studentparent->id) }}"
                                        class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i>
                                        edit</a>
                                </td>
                            </tr>
                        @endforeach --}}
                        <tr>
                            <td>sdf</td>
                            <td>sdf</td>
                            <td>sdf</td>
                            <td>sdf</td>
                            <td>sdf</td>
                            <td>sdf</td>
                        </tr>
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
