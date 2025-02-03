@extends('layouts.app')

@section('title', 'Data Induk Siswa')
@section('content')
    @if (
        ($student->alamat == null) |
            ($student->rt == null) |
            ($student->desa_kelurahan == null) |
            ($student->tinggi == null) |
            ($student->saudara == null) |
            ($student->provinsi == null))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Ada data yang belum lengkap! <button type="button" class="btn-close" data-bs-dismiss="alert"
                aria-label="Close"></button></div>
    @endif

    @if (session('success'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert"
                aria-label="Close"></button></div>
    @endif

    <div class="card mb-3">
        <div class="card-body">
            <p class="fs-4 text-center mb-0">Rincian Data Siswa dan Orang Tua/Wali</p>
        </div>
    </div>
    <div class="row gx-3">
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="text-end mb-3">
                        <small>
                            <i>Data Siswa diperbarui pada
                                {{ isset($student->updated_at) ? Carbon\Carbon::parse($student->updated_at)->isoFormat('DD MMM YYYY') : '(belum ada data)' }}
                            </i><br>
                            <i>Data Orang Tua/Wali diperbarui pada
                                {{ isset($student->studentparents->updated_at) ? Carbon\Carbon::parse($student->studentparents->updated_at)->isoFormat('DD MMM YYYY') : '(belum ada data)' }}
                            </i>
                        </small>
                    </div>
                    <hr>
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
                                        <td colspan="2">{{ $student->group->kelas ?? 'kelas belum ditentukan' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <small class="text-center d-block mb-0">
                        *berdasarkan Dapodik SDIT Harapan Umat Jember
                    </small>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('biodata.edit', $student->id) }}" class="btn btn-primary w-100">edit biodata</a>
                        {{-- <a href="{{ route('student.cover', $student->id) }}" class="btn btn-primary mx-1">lihat dokumen</a> --}}
                        {{-- <a href="{{ route('student.binduk', $student->id) }}" class="btn btn-primary mx-1">Buku Induk</a> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-body">
                    <ul class="nav nav-underline nav-fill" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a href="#siswa" class="nav-link active" id="data-siswa-tab" data-bs-toggle="tab"
                                data-bs-target="#data-siswa" type="button" role="tab" aria-controls="data-siswa"
                                aria-selected="true">Data Siswa
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="#ortu" class="nav-link" id="data-ortu-tab" data-bs-toggle="tab"
                                data-bs-target="#data-ortu" type="button" role="tab" aria-controls="data-ortu"
                                aria-selected="false">Data Orang Tua/Wali
                            </a>
                        </li>
                        {{-- <li class="nav-item" role="presentation">
                            <a href="#school" class="nav-link" id="data-sekolah-tab" data-bs-toggle="tab"
                                data-bs-target="#data-sekolah" type="button" role="tab" aria-controls="data-sekolah"
                                aria-selected="false">Data
                                Sekolah
                            </a>
                        </li> --}}
                    </ul>
                </div>
            </div>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="data-siswa" role="tabpanel" aria-labelledby="home-tab"
                    tabindex="0">
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
                                        <td>Jarak Rumah ke Sekolah</td>
                                        <td> : {{ $student->jarak_rumah }} </td>
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
                                                <td>Riwayat Penyakit</td>
                                                <td>: {{ $student->riwayat_penyakit }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="data-ortu" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                    @if ($student->studentparents == null)
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="text-center mt-3">
                                    <p class="fs-5 text-center mb-1">Data Orang Tua / Wali belum ada</p>
                                    <a href="{{ route('studentparent.create', ['id' => $student->id]) }}"
                                        class="btn btn-primary">Tambah
                                        Data Orang Tua/Wali
                                    </a>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="card mb-3 clearfix">
                            <div class="text-end p-2">
                                <a href="{{ route('studentparent.edit', $student->studentparents->id) }}"
                                    class="btn btn-primary btn-sm">Edit Data</a>
                            </div>
                            <div class="card-body">
                                <p class="fs-4 text-center mb-3">Data Orang Tua </p>
                                <div class="row gx-3">
                                    <div class="col-md-6 col-12">
                                        <table id="table" class="table align-middle" style="width: 100%">
                                            <tbody>
                                                <tr>
                                                    <td>Nama Ayah</td>
                                                    <td>{{ $student->studentparents->nama_ayah }}</td>
                                                </tr>

                                                <tr>
                                                    <td>Tempat Lahir Ayah</td>
                                                    <td>{{ $student->studentparents->tempat_lahir_ayah }},
                                                        {{ $student->studentparents->tanggal_lahir_ayah }}
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>Pendidikan ayah</td>
                                                    <td>{{ $student->studentparents->pendidikan_ayah }}
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Pekerjaan Ayah</td>
                                                    <td>{{ $student->studentparents->pekerjaan_ayah }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Penghasilan Ayah</td>
                                                    <td>{{ $student->studentparents->penghasilan_ayah }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>No. Hp Ayah</td>
                                                    <td>{{ $student->studentparents->hp_ayah }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <table id="table" class="table align-middle" style="width: 100%">
                                            <tbody>
                                                <tr>
                                                    <td>Nama Ibu</td>
                                                    <td>{{ $student->studentparents->nama_ibu }}</td>
                                                </tr>

                                                <tr>
                                                    <td>Tempat Lahir Ibu</td>
                                                    <td>{{ $student->studentparents->tempat_lahir_ibu }},
                                                        {{ $student->studentparents->tanggal_lahir_ibu }}
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>Pendidikan Ibu</td>
                                                    <td>{{ $student->studentparents->pendidikan_ibu }}
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Pekerjaan Ibu</td>
                                                    <td>{{ $student->studentparents->pekerjaan_ibu }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Penghasilan Ibu</td>
                                                    <td>{{ $student->studentparents->penghasilan_ibu }}
                                                    </td>
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
                        <div class="card">
                            <div class="card-body">
                                <p class="fs-4 text-center mb-3">Data Wali </p>
                                <div class="row">
                                    <div class="col-12">
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
                                                    <td>{{ $student->studentparents->alamat_wali }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Hubungan Keluarga</td>
                                                    <td>{{ $student->studentparents->hubungan_keluarga }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Pendidikan Wali</td>
                                                    <td>{{ $student->studentparents->pendidikan_wali }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Pekerjaan Wali</td>
                                                    <td>{{ $student->studentparents->pekerjaan_wali }}
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                {{-- <div class="tab-pane fade" id="data-sekolah" role="tabpanel" aria-labelledby="contact-tab"
                    tabindex="0">

                    @if ($student->studentschools == null)
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="text-center mt-3">
                                    <p class="fs-5 text-center mb-1">Data Sekolah Belum Ada</p>
                                    <a href="{{ route('studentschool.create', ['id' => $student->id]) }}"
                                        class="btn btn-primary">Tambah
                                        Data
                                    </a>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-sm align-middle ">
                                    Perkembangan Siswa
                                    <tbody>
                                        <tr>
                                            <td colspan="2">A. Masuk Menjadi Siswa Baru</td>
                                        </tr>
                                        <tr>
                                            <td><span class="me-1">1.</span> Pendidikan Sebelumnya</td>
                                            <td>: {{ $student->studentschools->siswa_baru_pendidikan_sebelumnya ?? '-' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span class="me-1">2.</span> Nama Sekolah</td>
                                            <td>: {{ $student->studentschools->siswa_baru_nama_sekolah ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td><span class="me-1">3.</span> Alamat</td>
                                            <td>: {{ $student->studentschools->siswa_baru_alamat_sekolah ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="pt-3">B. Pendidikan dari sekolah lain</td>
                                        </tr>
                                        <tr>
                                            <td><span class="me-1">1.</span>Nama Sekolah Asal </td>
                                            <td>: {{ $student->studentschools->siswa_pindahan_nama_sekolah_asal ?? '-' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span class="me-1">2.</span>Dari Kelas</td>
                                            <td>: {{ $student->studentschools->siswa_pindahan_dari_kelas ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td><span class="me-1">3.</span>Diterima Tanggal</td>
                                            <td>: {{ $student->studentschools->siswa_pindahan_diterima_tanggal ?? '-' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span class="me-1">4.</span>Di Kelas</td>
                                            <td>: {{ $student->studentschools->siswa_pindahan_di_kelas ?? '-' }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table table-sm align-middle ">
                                    BEASISWA
                                    <tbody>
                                        <tr>
                                            <td><span class="me-1">a.</span> Jenis Beasiswa</td>
                                            <td>: {{ $student->studentschools->beasiswa ?? '-' }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table table-sm align-middle ">
                                    MENINGGALKAN SEKOLAH
                                    <tbody>
                                        <tr>
                                            <td colspan="2">A. Tamat Belajar</td>
                                        </tr>
                                        <tr>
                                            <td><span class="me-1">1.</span> Tahun/No STTB Ijazah</td>
                                            <td>: {{ $student->studentschools->lulus_no_ijazah ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td><span class="me-1">2.</span> Melanjutkan sekolah di</td>
                                            <td>: {{ $student->studentschools->lulus_lanjut_sekolah ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="pt-3">B. Pindah Sekolah</td>
                                        </tr>
                                        <tr>
                                            <td><span class="me-1">1.</span> Dari Kelas</td>
                                            <td>: {{ $student->studentschools->pindah_sekolah_dari_kelas ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td><span class="me-1">2.</span> Ke Sekolah</td>
                                            <td>: {{ $student->studentschools->pindah_sekolah_ke_sekolah ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td><span class="me-1">3.</span> Ke Kelas</td>
                                            <td>: {{ $student->studentschools->pindah_sekolah_ke_kelas ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td><span class="me-1">4.</span> Alasan</td>
                                            <td>: {{ $student->studentschools->pindah_sekolah_alasan ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="pt-3">C. Keluar Sekolah</td>
                                        </tr>
                                        <tr>
                                            <td><span class="me-1">1.</span> Tanggal</td>
                                            <td>: {{ $student->studentparents->keluar_sekolah_tanggal ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td><span class="me-1">2.</span> Alasan</td>
                                            <td>: {{ $student->studentparents->keluar_sekolah_tanggal ?? '-' }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                </div> --}}
            </div>
        </div>
    </div>




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

        small {
            font-size: 12px;
        }

        @media (max-width: 800px) {
            .profil {
                width: 120px;
            }
        }
    </style>
@endpush
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#myTab a[href="#{{ old('tab') }}"]').tab('show')
        });
    </script>
@endpush
