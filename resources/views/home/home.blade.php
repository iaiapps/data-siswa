@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="card rounded p-3 mb-3">
        <p class="text-center m-0">
            <span class="">Waktu Server {{ $now }}</span>
        </p>
    </div>
    <div class="card rounded p-3">
        <p class="fs-4 text-center m-0">
            Selamat Datang <span class="fw-bold text-uppercase">"{{ $name }}"</span> di di Pusat Data dan Informasi
            SDIT Harapan Umat Jember
        </p>
    </div>

    <div id="info" class="row gx-3 mb-3">
        <div class="col-12 col-sm-6">
            <div class="mt-3 card rounded p-3 flex-row justify-content-between align-items-center">
                <div class="d-flex flex-row align-items-center">
                    <span class="fs-4 py-0 px-2 btn btn-outline-primary">
                        <i class="bi bi-person-check"></i>
                    </span>
                    <span class="ms-2 fs-5 "> Total Siswa </span>
                </div>
                <button class="bg-primary btn btn-primary p-1 px-2 fs-5 ">{{ $students->count() }}</button>
            </div>
        </div>
        <div class="col-12 col-sm-6">
            <div class="mt-3 card rounded p-3 flex-row justify-content-between align-items-center">
                <div class="d-flex flex-row align-items-center">
                    <span class="fs-4 py-0 px-2 btn btn-outline-primary">
                        <i class="bi bi-easel"></i>
                    </span>
                    <span class="ms-2 fs-5 "> Total Kelas </span>
                </div>
                <button class="bg-primary btn btn-primary p-1 px-2 fs-5 ">{{ $group->count() }}</button>
            </div>
        </div>
    </div>


    <div class="card mt-3 rounded p-3">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Form</th>
                        <th scope="col">Keterangan</th>
                    </tr>
                </thead>
                <tbody class="align-midle">
                    {{-- @forelse ($schools as $school)
                        <tr>
                            <td>
                                <button class="btn btn-primary rounded">
                                    <i class="{{ $school->icon }}"></i>
                                </button>
                            </td>
                            <td>{{ $school->name }}</td>
                            <td>{{ $school->description }}</td>
                        </tr>
                    @empty
                        <div class="alert alert-primary" role="alert">
                            <p class="text-center m-0">Belum Ada Data</p>
                        </div>
                    @endforelse --}}
                    <tr>
                        <td>
                            <button class="btn btn-primary rounded">
                                <i class="bi bi-building"></i>
                            </button>
                        </td>
                        <td>Sekolah</td>
                        <td>SDIT Harapan Umat Jember</td>
                    </tr>
                    <tr>
                        <td>
                            <button class="btn btn-primary rounded">
                                <i class="bi bi-123"></i>
                            </button>
                        </td>
                        <td>NPSN</td>
                        <td> 20554128</td>
                    </tr>
                    <tr>
                        <td>
                            <button class="btn btn-primary rounded">
                                <i class="bi bi-geo-alt"></i>
                            </button>
                        </td>
                        <td>Alamat Sekolah</td>
                        <td>Jl. Danau Toba, Gg. Islamic Center, Tegalgede, Kec. Sumbersari, Kabupaten Jember, Jawa Timur
                            68124</td>
                    </tr>
                    <tr>
                        <td>
                            <button class="btn btn-primary rounded">
                                <i class="bi bi-globe2"></i>
                            </button>
                        </td>
                        <td>Website</td>
                        <td> www.sditharum.id</td>
                    </tr>
                    <tr>
                        <td>
                            <button class="btn btn-primary rounded">
                                <i class="bi bi-envelope"></i>
                            </button>
                        </td>
                        <td>E-mail</td>
                        <td> sditharum@gmail.com</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

@endsection
