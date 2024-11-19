@extends('layouts.app')

@section('title', 'Data Induk Siswa')
@section('content')

    <div class="card p-3">
        @if (($student->address == null) | ($student->rt == null) | ($student->village == null))
            <div class="alert alert-danger text-center">Data belum lengkap !</div>
        @endif
        <p class="fs-2 text-center mb-2">Profil Siswa</p>
        <hr class="m-0">
        <div class="row align-items-center">
            <div class="col-3 text-center">
                {{-- @dd($student->documents->where('type', 'profil')->first()); --}}
                @if (is_null($student->documents->where('type', 'profil')->first()))
                    <i class="bi bi-person-circle display-1"></i><br>
                    {{-- <p>belum upload</p> --}}
                    <a class="btn btn-sm btn-primary" href="{{ route('uploadfoto', $student->id) }}">upload foto</a>
                @else
                    <img class="profil"
                        src="{{ asset('storage/img-document/' . $student->documents->where('type', 'profil')->first()->file) }}"
                        alt="img">
                    <br>
                    <div class="mt-2" role="group">
                        <a href="{{ route('viewfoto', $student->documents->where('type', 'profil')->first()->id) }}"
                            class="btn btn-sm btn-primary">lihat foto</a>

                        <form onsubmit="return confirm('Apakah anda yakin untuk menghapus data ?');"
                            action="{{ route('deletefoto', $student->documents->where('type', 'profil')->first()->id) }}"
                            method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="bi bi-trash3"></i>
                            </button>
                        </form>
                    </div>
                @endif
            </div>
            <div class="col-6">
                <p class="fs-3 m-0">{{ $student->name }} <span class="fs-5">[{{ $student->gender }}]</span></p>
                <p class="fs-5 m-0">Nomor Induk Siswa Nasional : {{ $student->nisn }}</p>
                <p class="fs-5 m-0">Nomor Induk Siswa : {{ $student->nis }}</p>
                <p class="fs-6 m-0">Diterima pada tahun ajaran {{ $student->year ?? 'belum ditentukan' }}</p>
            </div>
            <div class="col-3">
                <a href="{{ route('student.edit', $student->id) }}" class="btn btn-primary my-1">edit biodata</a>
                {{-- <a href="{{ route('studentparent.create', ['id' => $student->id]) }}" class="btn btn-primary my-1">edit
                    data
                    orang
                    tua/wali
                </a> --}}
                <br>
                <a href="#" class="btn btn-primary my-1">cetak dokumen</a>

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
        <br>
        <p class="fs-2 text-center my-2">Data Orang Tua / Wali</p>
        <hr class="m-0">

        @if ($student->studentparents == null)
            <div class="text-center mt-3">
                <p class="fs-5 text-center mb-1">Data Orang Tua / Wali belum ada</p>
                <a href="{{ route('studentparent.create', ['id' => $student->id]) }}" class="btn btn-primary">edit
                    data
                    orang
                    tua/wali
                </a>
            </div>
        @else
            <div class="row">
                <div class="col-4">
                    <table id="table" class="table align-middle" style="width: 100%">
                        <tbody>
                            <tr>
                                <td>Nama Ayah</td>
                                <td>{{ $student->studentparents->nama_ayah }}</td>
                            </tr>

                            <tr>
                                <td>Tempat Lahir Ayah</td>
                                <td>{{ $student->studentparents->tempat_lahir_ayah }},
                                    {{ $student->studentparents->tanggal_lahir_ayah }}</td>

                            </tr>
                            <tr>
                                <td>Pendidikan ayah</td>
                                <td>{{ $student->studentparents->pendidikan_ayah }}</td>
                            </tr>

                            <tr>
                                <td>Pekerjaan Ayah</td>
                                <td>{{ $student->studentparents->pekerjaan_ayah }}</td>
                            </tr>
                            <tr>
                                <td>Penghasilan Ayah</td>
                                <td>{{ $student->studentparents->penghasilan_ayah }}</td>
                            </tr>
                            <tr>
                                <td>No. Hp Ayah</td>
                                <td>{{ $student->studentparents->hp_ayah }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-4">
                    <table id="table" class="table align-middle" style="width: 100%">
                        <tbody>
                            <tr>
                                <td>Nama Ibu</td>
                                <td>{{ $student->studentparents->nama_ibu }}</td>
                            </tr>

                            <tr>
                                <td>Tempat Lahir Ibu</td>
                                <td>{{ $student->studentparents->tempat_lahir_ibu }},
                                    {{ $student->studentparents->tanggal_lahir_ibu }}</td>

                            </tr>
                            <tr>
                                <td>Pendidikan Ibu</td>
                                <td>{{ $student->studentparents->pendidikan_ibu }}</td>
                            </tr>

                            <tr>
                                <td>Pekerjaan Ibu</td>
                                <td>{{ $student->studentparents->pekerjaan_ibu }}</td>
                            </tr>
                            <tr>
                                <td>Penghasilan Ibu</td>
                                <td>{{ $student->studentparents->penghasilan_ibu }}</td>
                            </tr>
                            <tr>
                                <td>No. Hp Ibu</td>
                                <td>{{ $student->studentparents->hp_ibu }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-4">
                    <table id="table" class="table align-middle" style="width: 100%">
                        <tbody>
                            <tr>
                                <td>Nama Wali</td>
                                <td>{{ $student->studentparents->nama_wali }}</td>
                            </tr>

                            <tr>
                                <td>Hubungan Keluarga</td>
                                <td>{{ $student->studentparents->hubungan_keluarga }}</td>
                            </tr>
                            <tr>
                                <td>Pendidikan Wali</td>
                                <td>{{ $student->studentparents->pendidikan_wali }}</td>
                            </tr>

                            <tr>
                                <td>Pekerjaan Wali</td>
                                <td>{{ $student->studentparents->pekerjaan_wali }}</td>
                            </tr>
                            <tr>
                                <td>No. Hp Wali</td>
                                <td>{{ $student->studentparents->hp_wali }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

    </div>
@endsection

@push('css')
    <style>
        .profil {
            width: 120px;
        }
    </style>
@endpush
