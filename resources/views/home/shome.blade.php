@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    @if (($student->address == null) | ($student->rt == null) | ($student->village == null))
        <div class="alert alert-danger text-center">Data belum lengkap !</div>
        <div class="alert alert-danger alert-dismissible fade show py-2 text-center" role="alert">
            <span class="m-0">Identitas anda belum lengkap!</span>
            <a href="{{ route('biodata.index') }}" class="btn btn-dark btn-sm ms-md-2">klik
                untuk mengisi</a>
        </div>
    @endif

    <div class="container bg-white rounded p-3 mb-3">
        <p class="fs-4 text-center m-0">
            Selamat Datang di Pusat Data Siswa SDIT Harapan Umat Jember
        </p>
    </div>
    <div class="container bg-white rounded p-3 mb-3">
        <p class="fs-4 text-center m-0">
            Ananda {{ $student->name }}
        </p>
    </div>

    <div class="rounded container text-center mb-3">
        <div class="row">
            <div class="col-12 col-md-4 bg-primary p-2">
                <a href="#" class="nav-link btn btn-outline text-white">
                    <i class="bi bi-person fs-2"></i>
                    <span class="d-block">Profil Biodata Siswa</span>
                </a>
            </div>
            <div class="col-12 col-md-4 bg-light p-2">
                <a href="#" class="nav-link btn btn-outline text-dark">
                    <i class="bi bi-card-image fs-2"></i>
                    <span class="d-block">Dokumen</span>
                </a>
            </div>
            <div class="col-12 col-md-4 bg-danger p-2">
                <a href="#" class="nav-link btn btn-outline text-white">
                    <i class="bi bi-calendar-check fs-2"></i>
                    <span class="d-block">Presensi</span>
                </a>
            </div>

        </div>
    </div>

    <div class="bg-white rounded container">
        <p class="fs-4 text-center pt-3">Profil Pengguna</p>
        <hr>
        <div class="row">
            <div class="col-12 col-md-4 p-3 d-flex justify-content-center align-items-center">
                <div class="text-center   ">
                    @if (is_null($student->documents->where('type', 'profil')->first()))
                        <i class="bi bi-person-circle display-1 "></i><br>
                        <a class="btn btn-sm btn-primary" href="{{ route('uploadfoto', $student->id) }}">upload foto</a>
                    @else
                        <img class="profil mb-3"
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
            </div>


            <div class="col-md-8 col-12 p-3">
                <div class="table-responsive">
                    <table id="table" class="table table-striped align-middle">
                        <tbody>

                            <tr>
                                <td>Nama Lengkap</td>
                                <td>{{ $student->name ?? 'belum ditentukan' }}</td>
                            </tr>
                            <tr>
                                <td>Tempat, Tanggal Lahir</td>
                                <td>{{ $student->birthplace . ', ' . $student->birthdate ?? 'belum ditentukan' }}</td>
                            </tr>
                            <tr>
                                <td>NIS/NISN</td>
                                <td>{{ $student->nis . '/ ' . $student->niN ?? 'belum ditentukan' }}</td>
                            </tr>
                            <tr>
                                <td>Kelas</td>
                                <td>{{ $student->group->name ?? 'belum ditentukan' }} </td>
                            </tr>
                            <tr>
                                <td>Nama Ayah</td>
                                <td>{{ $student->studentparents->nama_ayah ?? 'belum ditentukan' }}
                                    {{ '$teacher->year_enter' }}</td>
                            </tr>
                            <tr>
                                <td>Nama Ibu</td>
                                <td>{{ $student->studentparents->nama_ibu ?? 'belum ditentukan' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .profil {
            width: 170px;
        }
    </style>
@endpush
