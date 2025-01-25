@extends('layouts.app')

@section('title', 'Data Induk Siswa')
@section('content')
    @if (
        ($student->address == null) |
            ($student->rt == null) |
            ($student->village == null) |
            ($student->height == null) |
            ($student->siblings == null) |
            ($student->province == null))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Ada data yang belum lengkap! <button type="button" class="btn-close" data-bs-dismiss="alert"
                aria-label="Close"></button></div>
    @endif

    <div class="card mb-3">
        <div class="card-body">
            <p class="fs-4 text-center mb-0">Profil Siswa</p>
        </div>
    </div>
    <div class="row gx-3">
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center ">
                        <div class="text-center">
                            @if (is_null($student->documents->where('type', 'profil')->first()))
                                <a class="btn btn-sm btn-primary mt-0" href="{{ route('uploadfoto', $student->id) }}">upload
                                    foto</a>
                                <i class="d-block bi bi-person-circle imgs"></i>
                            @else
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
                                <br>
                                <img class="profil mb-3"
                                    src="{{ asset('storage/img-document/' . $student->documents->where('type', 'profil')->first()->file) }}"
                                    alt="img">
                            @endif
                        </div>
                        <div class="mt-1">
                            <p class="fs-4 m-0 text-center">{{ $student->nama }} </p>
                            <table class="table table-sm">
                                <tbody>
                                    <tr>
                                        <td>Status</td>
                                        <td>: {{ $student->status_siswa == 'aktif' ? 'Aktif' : 'Lulus' }}
                                            {{ isset($student->graduation->year->year) ? $student->graduation->year->year : '' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Induk</td>
                                        <td>: {{ $student->nis }}</td>
                                    </tr>
                                    <tr>
                                        <td>NISN</td>
                                        <td>: {{ $student->nisn }}</td>
                                    </tr>
                                    <tr>
                                        <td>Masuk pada tahun</td>
                                        <td>: {{ $student->year->year ?? 'belum ada data' }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">{{ $student->group->kelas ?? 'belum ada data' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('student.edit', $student->id) }}" class="btn btn-primary mx-1">edit biodata</a>
                        <a href="{{ route('student.cover', $student->id) }}" class="btn btn-primary mx-1">lihat dokumen</a>
                        <a href="{{ route('student.binduk', $student->id) }}" class="btn btn-primary mx-1">Buku Induk</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-body">
                    <table id="table" class="table align-middle" style="width: 100%">
                        <tbody>
                            <tr>
                                <td>NIK</td>
                                <td>{{ $student->nik }}</td>
                            </tr>
                            <tr>
                                <td>No KK</td>
                                <td>{{ $student->kk }}</td>
                            </tr>
                            <tr>
                                <td>No Akta Kelahiran</td>
                                <td>{{ $student->akta }}</td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>
                                    @if ($student->jenis_kelamin == 'L')
                                        Laki-laki
                                    @elseif($student->jenis_kelamin == 'P')
                                        Perempuan
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Tempat & Tanggal Lahir</td>
                                <td>{{ $student->tempat_lahir }}, {{ $student->tanggal_lahir }}</td>
                            </tr>
                            <tr>
                                <td>Alamat Rumah</td>
                                <td>{{ $student->alamat }} | rt {{ $student->rt }} / rw {{ $student->rw }} |
                                    {{ $student->desa_kelurahan }} | {{ $student->kecamatan }} |
                                    {{ $student->kota_kabupaten }}|{{ $student->provinsi }} </td>
                            </tr>
                            <tr>
                                <td>Kode Pos</td>
                                <td> : {{ $student->kode_pos }} </td>
                            </tr>
                            <tr>
                                <td>Agama</td>
                                <td>: {{ $student->agama }}</td>
                            </tr>
                            <tr>
                                <td>Kewarganegaraan</td>
                                <td>: {{ $student->kewarganegaraan }}</td>
                            </tr>
                            <tr>
                                <td>Bahasa sehari-hari</td>
                                <td>: {{ $student->bahasa }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row gx-3">
                <div class="col-md-6 col-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Status Anak</td>
                                        <td>: {{ $student->status_anak }}</td>
                                    </tr>
                                    <tr>
                                        <td>Anak ke-</td>
                                        <td>: {{ $student->anak_ke }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Saudara</td>
                                        <td>: {{ $student->saudara }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tinggal Bersama</td>
                                        <td>: {{ $student->tinggal_bersama }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                            </div>
                            <table id="table" class="table align-middle" style="width: 100%">
                                <tbody>
                                    <tr>
                                        <td>Tinggi Badan</td>
                                        <td>: {{ $student->tinggi }}</td>
                                    </tr>
                                    <tr>
                                        <td>Berat Badan</td>
                                        <td>: {{ $student->berat }}</td>
                                    </tr>
                                    <tr>
                                        <td>Golongan Darah</td>
                                        <td>: {{ $student->golongan_darah }}</td>
                                    </tr>
                                    <tr>
                                        <td>Riwayat Kesehatan</td>
                                        <td>: {{ $student->riwayat_kesehatan }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="card p-3 my-3">
        <div class="body">
            <p class="fs-4 text-center mb-0">Data Orang Tua / Wali</p>
            @if ($student->studentparents != null)
                <div class="text-center">
                    <a href="{{ route('studentparent.edit', $student->studentparents->id) }}" class="btn btn-primary">Edit
                        Data</a>
                </div>
            @endif
        </div>
    </div>

    @if ($student->studentparents == null)
        <div class="card mb-3">
            <div class="card-body">
                <div class="text-center mt-3">
                    <p class="fs-5 text-center mb-1">Data Orang Tua / Wali belum ada</p>
                    <a href="{{ route('studentparent.create', ['id' => $student->id]) }}" class="btn btn-primary">Tambah
                        Data Orang Tua/Wali
                    </a>
                </div>
            </div>
        </div>
    @else
        <div class="accordion">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button bg-transparent" type="button" data-bs-toggle="collapse"
                        data-bs-target="#dataortu" aria-expanded="true" aria-controls="dataortu">
                        Data Orang Tua
                    </button>
                </h2>
                <div id="dataortu" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row gx-3">
                            <div class="col-md-6 col-12">
                                <div class="card">
                                    <div class="card-body">
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
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="card">
                                    <div class="card-body">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed bg-transparent" type="button" data-bs-toggle="collapse"
                        data-bs-target="#datawali" aria-expanded="false" aria-controls="datawali">
                        Data Wali
                    </button>
                </h2>
                <div id="datawali" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table id="table" class="table align-middle" style="width: 100%">
                                            <tbody>
                                                <tr>
                                                    <td>Nama Wali</td>
                                                    <td>{{ $student->studentparents->nama_wali }}</td>
                                                </tr>
                                                <tr>
                                                    <td>No. Hp Wali</td>
                                                    <td>{{ $student->studentparents->hp_wali }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Alamat Wali</td>
                                                    <td>{{ $student->studentparents->alamat_wali }}</td>
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

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endif



@endsection

@push('css')
    <style>
        .profil {
            width: 120px;
        }

        .imgs {
            font-size: 100px;
            padding: 0;
            margin: 0
        }

        @media (max-width: 800px) {
            body {
                background-color: rgb(9, 171, 225) !important;
            }

            .profil {
                width: 120px;
            }
        }
    </style>
@endpush
