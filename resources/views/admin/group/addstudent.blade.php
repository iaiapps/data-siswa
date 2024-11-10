@extends('layouts.app')

@section('title', 'Data Siswa')
@section('content')

    <a href="{{ url()->previous() }}" class="btn btn-primary mb-3">Kembali</a>

    <div class="card rounded p-3">
        <form action="{{ route('storestudentgroup') }}" method="POST">
            @csrf
            @method('PUT')
            {{-- <div class="input-group mb-3">
                <span class="input-group-text bg-secondary-subtle">Pilih Kelas</span>
                <select name="group_id" id="group" class="form-control">
                    <option disabled selected>--- pilih kelas ---</option>
                    @foreach ($groups as $group)
                        <option value="{{ $group->id }}">{{ $group->kelas }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary">simpan</button>
            </div> --}}

            <div class="input-group mb-3">
                <span class="input-group-text bg-secondary-subtle">Pilih Kelas</span>
                <select name="group_id" id="group" class="form-control">
                    <option value="{{ $groups->where('id', $id)->first()->id }}">
                        {{ $groups->where('id', $id)->first()->kelas }}</option>

                </select>
                <button type="submit" class="btn btn-primary">simpan</button>
            </div>
            <div class="table-responsive">
                <table id="table" class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Check</th>
                            <th scope="col">Nama Siswa</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Kelas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->id }}</td>
                                <td>
                                    <input class="form-check-input border border-primary border-2 large" type="checkbox"
                                        name="check[{{ $student->id }}]">
                                </td>
                                <td>{{ $student->name }} <input type="text" value="{{ $student->id }}"
                                        name="student_id[{{ $student->id }}]" hidden></td>
                                <td>{{ $student->gender }}</td>
                                <td>{{ $student->group->kelas ?? 'belum ditentukan' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </form>
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
