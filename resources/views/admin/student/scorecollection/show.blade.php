@extends('layouts.app')

@section('title', 'Data Nilai Siswa')
@section('content')


    <a href="{{ url()->previous() }}" class=" btn btn-primary mb-3">kembali</a>
    <div class="card p-3">

        <p class="fs-4 text-center mb-2">Nilai Siswa</p>
        <hr class="m-0">
        <div class="row">
            <div class="col">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th rowspan="2">Mapel</th>
                            <th colspan="2" class="text-center">Kelas 1</th>
                            <th colspan="2" class="text-center">Kelas 2</th>
                            <th colspan="2" class="text-center">Kelas 3</th>
                            <th colspan="2" class="text-center">Kelas 4</th>
                            <th colspan="2" class="text-center">Kelas 5</th>
                            <th colspan="2" class="text-center">Kelas 6</th>
                        </tr>
                        <tr>
                            <th>sem 1</th>
                            <th>sem 2</th>
                            <th>sem 1</th>
                            <th>sem 2</th>
                            <th>sem 1</th>
                            <th>sem 2</th>
                            <th>sem 1</th>
                            <th>sem 2</th>
                            <th>sem 1</th>
                            <th>sem 2</th>
                            <th>sem 1</th>
                            <th>sem 2</th>
                        </tr>
                        @foreach ($collection as $cl)
                            <tr>
                                <td>{{ $cl->subject->pelajaran }}</td>
                                <td>{!! $cl->kelas_1a ?? '<i class="bi bi-x-circle text-danger fs-5"></i>' !!} </td>
                                <td>{!! $cl->kelas_1b ?? '<i class="bi bi-x-circle text-danger fs-5"></i>' !!} </td>
                                <td>{!! $cl->kelas_2a ?? '<i class="bi bi-x-circle text-danger fs-5"></i>' !!} </td>
                                <td>{!! $cl->kelas_2b ?? '<i class="bi bi-x-circle text-danger fs-5"></i>' !!} </td>
                                <td>{!! $cl->kelas_3a ?? '<i class="bi bi-x-circle text-danger fs-5"></i>' !!} </td>
                                <td>{!! $cl->kelas_3b ?? '<i class="bi bi-x-circle text-danger fs-5"></i>' !!} </td>
                                <td>{!! $cl->kelas_4a ?? '<i class="bi bi-x-circle text-danger fs-5"></i>' !!} </td>
                                <td>{!! $cl->kelas_4b ?? '<i class="bi bi-x-circle text-danger fs-5"></i>' !!} </td>
                                <td>{!! $cl->kelas_5a ?? '<i class="bi bi-x-circle text-danger fs-5"></i>' !!} </td>
                                <td>{!! $cl->kelas_5b ?? '<i class="bi bi-x-circle text-danger fs-5"></i>' !!} </td>
                                <td>{!! $cl->kelas_6a ?? '<i class="bi bi-x-circle text-danger fs-5"></i>' !!} </td>
                                <td>{!! $cl->kelas_6b ?? '<i class="bi bi-x-circle text-danger fs-5"></i>' !!} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .profil {
            width: 120px;
        }
    </style>
@endpush
