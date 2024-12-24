@extends('layouts.app')

@section('title', 'Data Siswa')
@section('content')
    <div class="mb-3">
        <a href="{{ route('user.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Tambah
            Siswa</a>
    </div>
    <div class="card p-3 rounded">
        <div class="table-responsive">

            <div class="table-responsive">
                <table id="table" class="table table-striped align-middle" style="width: 100%">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Status</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">NIS - NISN</th>
                            <th scope="col">Tahun Masuk</th>
                            <th scope="col">Ayah</th>
                            <th scope="col">Ibu</th>
                            <th scope="col">Cek</th>
                            <th scope="col">Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $student->name }}</td>
                                <td>
                                    {{ $student->status == 'aktif' ? 'Aktif' : 'Lulus' }}
                                </td>
                                <td>
                                    {{ $student->group->kelas ?? 'belum ditentukan' }}

                                </td>
                                <td>{{ $student->nis ?? 'belum ditentukan' }} - {{ $student->nisn ?? 'belum ditentukan' }}
                                </td>
                                <td>{{ $student->year->year ?? 'belum ditentukan' }}</td>
                                <td>{{ $student->studentparents->nama_ayah ?? 'belum ditentukan' }}</td>
                                <td>{{ $student->studentparents->nama_ibu ?? 'belum ditentukan' }}</td>
                                <td>
                                    @if (
                                        ($student->address == null) |
                                            ($student->rt == null) |
                                            ($student->village == null) |
                                            ($student->height == null) |
                                            ($student->siblings == null) |
                                            ($student->province == null))
                                        <small class="text-danger">Data belum lengkap !</small>
                                    @else
                                        <small class="text-primary">Data lengkap !</small>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('student.show', $student->id) }}" class="btn btn-success btn-sm"><i
                                            class="bi bi-info-circle"></i>
                                        info</a>
                                    <a href="{{ route('student.edit', $student->id) }}" class="btn btn-warning btn-sm"><i
                                            class="bi bi-pencil-square"></i>
                                        edit</a>
                                    {{-- <a href="{{ route('document.index', ['id' => $student->id]) }}"
                                        class="btn btn-primary btn-sm"><i class="bi bi-image"></i> doc</a> --}}
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
