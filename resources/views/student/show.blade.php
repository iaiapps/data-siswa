@extends('layouts.app')

@section('title', 'Data Induk Siswa')
@section('content')

    <div class="card p-3">
        <p class="fs-2 text-center m-0">Profil Siswa</p>
        <hr class="m-0">
        <div class="row align-items-center">

            <div class="col-3 text-center">
                <i class="bi bi-person-circle display-1"></i>

            </div>
            <div class="col-6">
                <p class="fs-3 m-0">{{ $student->name }} <span class="fs-5">[{{ $student->gender }}]</span></p>
                <p class="fs-5 m-0">Nomor Induk Siswa Nasional : {{ $student->nisn }}</p>
                <p class="fs-5 m-0">Nomor Induk Siswa : {{ $student->nis }}</p>
                <p class="fs-6 m-0">Diterima pada tahun ajaran {{ $student->year ?? 'belum ditentukan' }}</p>
            </div>
            <div class="col-3">
                <a href="{{ route('student.edit', $student->id) }}" class="btn btn-primary my-1">edit biodata</a>
                <a href="#" class="btn btn-primary my-1">edit ayah </a>
                <a href="#" class="btn btn-primary my-1">edit ibu</a>
                <a href="#" class="btn btn-primary my-1">edit cetak</a>

            </div>
        </div>

        <hr>
        <div class="row">
            <div class="col">
                <table id="table" class="table align-middle" style="width: 100%">
                    <tbody>
                        <tr>
                            <td>Tempat & Tanggal Lahir</td>
                            <td>{{ $student->birthplace }}, {{ $student->birthdate }}</td>
                        </tr>

                        <tr>
                            <td>Alamat Rumah</td>
                            <td>{{ $student->address }} | rt {{ $student->rt }} / rw {{ $student->rw }} |
                                {{ $student->village }} | {{ $student->subdistrict }} |
                                {{ $student->city }}|{{ $student->province }} </td>
                        </tr>

                        <tr>
                            <td>Status Anak</td>
                            <td>{{ $student->childstatus }}</td>
                        </tr>
                        <tr>
                            <td>Saudara</td>
                            <td>{{ $student->siblings }}</td>
                        </tr>

                        <tr>
                            <td>Tinggal Bersama</td>
                            <td>{{ $student->living }}</td>
                        </tr>


                    </tbody>
                </table>
            </div>
            <div class="col">
                <table id="table" class="table align-middle" style="width: 100%">
                    <tbody>

                        <tr>
                            <td>Agama</td>
                            <td>{{ $student->religion }}</td>
                        </tr>
                        <tr>
                            <td>Kewarganegaraan</td>
                            <td>{{ $student->citizenship }}</td>
                        </tr>
                        <tr>
                            <td>Bahasa</td>
                            <td>{{ $student->language }}</td>
                        </tr>
                        <tr>
                            <td>tinggi badan</td>
                            <td>{{ $student->height }}</td>
                        </tr>
                        <tr>
                            <td>berat badan</td>
                            <td>{{ $student->weight }}</td>
                        </tr>
                        <tr>
                            <td>golongan darah</td>
                            <td>{{ $student->blood }}</td>
                        </tr>
                        <tr>
                            <td>Riwayat kesehatan</td>
                            <td>{{ $student->medical }}</td>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>
        <p class="fs-2 text-center m-0">Data Orang Tua / Wali</p>
        <hr class="m-0">

    </div>
@endsection
