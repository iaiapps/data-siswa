@extends('layouts.app')

@section('title', 'Data Tahun Pelajaran')

@section('content')
    <a href="{{ route('year.create') }}" class="btn btn-primary mb-3">Tambah Tahun Pelajaran</a>

    <div class="card rounded p-3">
        <div class="table-responsive">

            <table id="table" class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Data Tahun</th>
                        <th scope="col">Jumlah Siswa</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($years as $year)
                        <tr>
                            <td>{{ $year->id }}</td>
                            <td>{{ $year->year }}</td>
                            <td>
                                <button class="btn btn-outline-primary btn-sm">
                                    {{ $year->student->count() ?? 'belum ditentukan' }}
                                </button>
                                <a href="{{ route('showstudentyear', ['id' => $year->id]) }}"
                                    class="btn btn-sm btn-primary">lihat
                                    siswa</a>
                                <a href="{{ route('addstudentyear', ['id' => $year->id]) }}"
                                    class="btn btn-warning btn-sm">edit
                                    siswa</a>
                            </td>

                            <td>
                                <a href="{{ route('year.edit', $year->id) }}" class="btn btn-warning btn-sm">edit
                                    tahun</a>

                                <form method="POST" action="{{ route('year.destroy', $year->id) }}" class="d-inline"
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
