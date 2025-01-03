@extends('layouts.app')

@section('title', 'Data Kelas')

@section('content')

    <a href="{{ route('group.create') }}" class="btn btn-primary mb-3">Tambah Kelas</a>

    <div class="card rounded p-3">
        <div class="table-responsive">

            <table id="table" class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Jumlah Siswa</th>
                        <th scope="col">Lembar Presensi</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($groups as $group)
                        <tr>
                            <td>{{ $group->id }}</td>
                            <td>{{ $group->kelas }}</td>
                            <td>
                                <button class="btn btn-outline-primary btn-sm">
                                    {{ $group->student->count() ?? 'belum ditentukan' }}
                                </button>
                                <a href="{{ route('showstudentgroup', ['id' => $group->id]) }}"
                                    class="btn btn-sm btn-primary">lihat
                                    siswa</a>
                                <a href="{{ route('addstudentgroup', ['id' => $group->id]) }}"
                                    class="btn btn-warning btn-sm">edit
                                    siswa</a>
                            </td>
                            <td><a href="{{ route('showpresensi', ['id' => $group->id]) }}">presensi</a></td>
                            <td>
                                <a href="{{ route('group.edit', $group->id) }}" class="btn btn-warning btn-sm">edit
                                    kelas</a>

                                <form method="POST" action="{{ route('group.destroy', $group->id) }}" class="d-inline"
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
@include('layouts.partials.scripts')
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
