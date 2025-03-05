@extends('layouts.app')

@section('title', 'Data Mata Pelajaran')

@section('content')
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
                            <td>{{ $student->nama }}</td>
                            <td>{{ $student->group->kelas ?? 'belum ditentukan' }}</td>
                            @foreach ($subjects as $subject)
                                @if (!$student->scorecollection->where('subject_id', $subject->id)->isEmpty())
                                    <td>
                                        @php
                                            $nilai = $student->scorecollection
                                                ->where('subject_id', $subject->id)
                                                ->first();
                                            $n = [
                                                $nilai->kelas_1a,
                                                $nilai->kelas_1b,
                                                $nilai->kelas_2a,
                                                $nilai->kelas_2b,
                                                $nilai->kelas_3a,
                                                $nilai->kelas_3b,
                                                $nilai->kelas_4a,
                                                $nilai->kelas_4b,
                                                $nilai->kelas_5a,
                                                $nilai->kelas_5b,
                                                $nilai->kelas_6a,
                                                $nilai->kelas_6b,
                                            ];

                                            if (count(array_filter($n)) == count($n)) {
                                                $nilaii = 'progress';
                                                $percent = round((count(array_filter($n)) / count($n)) * 100, 0);
                                            } elseif (count(array_filter($n)) < count($n)) {
                                                $nilaii = 'progress';
                                                $percent = round((count(array_filter($n)) / count($n)) * 100, 0);
                                            }

                                        @endphp
                                        {{ $nilaii . ' ' . $percent . '%' }}
                                    </td>
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
