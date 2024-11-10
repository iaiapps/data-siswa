@extends('layouts.app')

@section('title', 'Data Induk Siswa')
@section('content')

    <div class="card p-3">
        <p class="fs-4 text-center mb-2">Nilai Siswa</p>
        <hr class="m-0">

        <div class="row">
            <div class="col">
                <table id="table" class="table align-middle" style="width: 100%">
                    <thead>
                        <tr>
                            <td rowspan="2">Pelajaran</td>
                            <td rowspan="2" class="text-center">Semester</td>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>MTK</td>
                            <td>Kelas</td>
                            <td>Semester 1</td>
                            <td>Semester 2</td>
                        </tr>
                        <tr>
                            <td>IPAS</td>
                            <td>Kelas</td>
                            <td>Semester 1</td>
                            <td>Semester 2</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            {{-- <div class="col">
                <table id="table" class="table align-middle" style="width: 100%">
                    <tbody>

                        <tr>
                            <td>sadf</td>
                        </tr>
                    </tbody>
                </table>
            </div> --}}
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
