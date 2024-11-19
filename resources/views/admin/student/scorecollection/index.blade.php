@extends('layouts.app')

@section('title', 'Data Mata Pelajaran')

@section('content')

    <a href="{{ route('scorecollection.create') }}" class="btn btn-primary mb-3">Tambah Nilai Pelajaran</a>

    <div class="card rounded p-3">
        <div class="table-responsive">

            <table id="table" class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>

                        <th scope="col">Nama Siswa</th>
                        <th scope="col">Kelas</th>
                        @foreach ($subjects as $subject)
                            <th>{{ $subject->pelajaran }}</th>
                        @endforeach

                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->group->kelas ?? 'belum ditentukan' }}</td>
                            @foreach ($subjects as $subject)
                                @if (!$student->scorecollection->where('subject_id', $subject->id)->isEmpty())
                                    <td>cek</td>
                                @else
                                    <td>belum diisi</td>
                                @endif
                            @endforeach


                            <td>
                                <a href="{{ route('scorecollection.show', $student->id) }}"
                                    class="btn btn-primary btn-sm">lihat</a>

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
