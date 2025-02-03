@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    @if (($student->address == null) | ($student->rt == null) | ($student->village == null))
        <div class="alert alert-danger alert-dismissible fade show py-2" role="alert">
            <p class="m-0">Identitas anda belum lengkap! <a href="{{ route('biodata.index') }}"
                    class="btn btn-dark btn-sm ms-md-2">lihat biodata</a></p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="bg-white rounded p-3 mb-3">
        <p class="fs-4 text-center m-0">
            Selamat Datang Ananda <span class="fw-bold text-capitalize">{{ $student->name ?? $student->user->name }}</span>
            di Pusat Data
            Siswa SDIT Harapan Umat Jember
        </p>
    </div>
    <div class="card p-3">
        <p class="fs-4 text-center pt-3 mb-0">Ringkasan Profil Pengguna</p>
        <hr>
        <div class="row">
            <div class="col-12 col-md-5 p-3 d-flex flex-column justify-content-center align-items-center">
                <div class="text-center">
                    @if (is_null($student->documents->where('type', 'profil')->first()))
                        <i class="bi bi-person-circle imgs"></i>
                        {{-- <a class="btn btn-sm btn-primary d-block" href="{{ route('uploadfoto', $student->id) }}">upload
                            foto</a> --}}
                    @else
                        <img class="profil mb-3"
                            src="{{ asset('storage/img-document/' . $student->documents->where('type', 'profil')->first()->file) }}"
                            alt="img">
                        <br>
                        <div class="mt-2" role="group">
                            <a href="{{ route('viewfoto', $student->documents->where('type', 'profil')->first()->id) }}"
                                class="btn btn-sm btn-primary">lihat foto</a>

                            {{-- <form onsubmit="return confirm('Apakah anda yakin untuk menghapus data ?');"
                                action="{{ route('deletefoto', $student->documents->where('type', 'profil')->first()->id) }}"
                                method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </form> --}}
                        </div>
                    @endif
                </div>

                <div class="mt-3">
                    <p class="fs-5 text-center mb-0">{{ $student->nama ?? 'belum ditentukan' }}</p>
                    <table class="table align-middle table-sm mb-0">
                        <tbody>
                            <tr>
                                <td>Status</td>
                                <td>: {{ $student->status_siswa == 'aktif' ? 'Aktif' : 'Lulus' }}
                                    {{ isset($student->graduation->year->year) ? $student->graduation->year->year : '' }}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"> {{ $student->group->kelas ?? 'kelas belum ditentukan' }} </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-7 col-12 p-3">
                <table id="table" class="table table-striped align-middle">
                    <tbody>
                        <tr>
                            <td>Tempat, Tanggal Lahir</td>
                            <td>: {{ $student->tempat_lahir . ', ' . $student->tanggal_lahir ?? 'belum ditentukan' }}</td>
                        </tr>
                        <tr>
                            <td>NIS - NISN</td>
                            <td>: {{ $student->nis . ' - ' . $student->nisn ?? 'belum ditentukan' }}</td>
                        </tr>

                        <tr>
                            <td>Nama Ayah</td>
                            <td>: {{ $student->studentparents->nama_ayah ?? 'belum ada data' }} </td>
                        </tr>
                        <tr>
                            <td>Nama Ibu</td>
                            <td>: {{ $student->studentparents->nama_ibu ?? 'belum ada data' }}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>

                            <td>: {{ $student->alamat }} | rt {{ $student->rt }} / rw {{ $student->rw }} |
                                {{ $student->desa_kelurahan }} | {{ $student->kecamatan }} |
                                {{ $student->kota_kabupaten }}|{{ $student->provinsi }} </td>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .profil {
            width: 170px;
        }

        .imgs {
            font-size: 100px;
            padding: 0;
            margin: 0
        }
    </style>
@endpush
