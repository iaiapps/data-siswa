@extends('layouts.app')

@section('title', 'Tambah Data Orang Tua')
@section('content')
    <div class="card p-3">

        <form action="{{ route('studentschool.store') }}" method="POST">
            @csrf
            <input name="student_id" value="{{ $student_id }}" readonly hidden>
            <fieldset class="step">
                <p class="fw-bold fs-5">Perkembangan Sekolah Siswa</p>
                <div class="row mb-3">
                    <p class="fw-bold mb-1">Masuk Menjadi Siswa Baru </p>
                    <div class="col-md-4 col-12">
                        <label class="form-label" for="siswa_baru_pendidikan_sebelumnya">Pendidikan Sebelumnya</label>
                        <input class="form-control" type="text" id="siswa_baru_pendidikan_sebelumnya"
                            name="siswa_baru_pendidikan_sebelumnya" placeholder="pendidikan sebelumnya" />
                    </div>
                    <div class="col-md-4 col-12">
                        <label class="form-label" for="siswa_baru_nama_sekolah">Nama Sekolah</label>
                        <input class="form-control" type="text" id="siswa_baru_nama_sekolah"
                            name="siswa_baru_nama_sekolah" placeholder="nama sekolah" />
                    </div>
                    <div class="col-md-4 col-12">
                        <label class="form-label" for="siswa_baru_alamat_sekolah">Alamat</label>
                        <input class="form-control" type="text" id="siswa_baru_alamat_sekolah"
                            name="siswa_baru_alamat_sekolah" placeholder="alamat sekolah" />
                    </div>
                </div>
                <div class="row mb-3">
                    <p class="fw-bold mb-1">Pendidikan dari sekolah lain</p>
                    <div class="col-md-3 col-12">
                        <div class="mb-3">
                            <label class="form-label" for="siswa_pindahan_nama_sekolah_asal">Nama Sekolah Asal </label>
                            <input class="form-control" type="text" id="siswa_pindahan_nama_sekolah_asal"
                                name="siswa_pindahan_nama_sekolah_asal" placeholder="nama sekolah asal" />
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="mb-3">
                            <label class="form-label" for="siswa_pindahan_pindah_dari_kelas">Dari Kelas</label>
                            <input class="form-control" type="text" id="siswa_pindahan_pindah_dari_kelas"
                                name="siswa_pindahan_pindah_dari_kelas" placeholder="dari kelas" />
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="mb-3">
                            <label class="form-label" for="siswa_pindahan_diterima_tanggal">Diterima Tanggal</label>
                            <input class="form-control" type="text" id="siswa_pindahan_diterima_tanggal"
                                name="siswa_pindahan_diterima_tanggal" placeholder="diterima tanggal" />
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="mb-3">
                            <label class="form-label" for="siswa_pindahan_di_kelas">Di Kelas</label>
                            <input class="form-control" type="text" id="siswa_pindahan_di_kelas"
                                name="siswa_pindahan_di_kelas" placeholder="di kelas" />
                        </div>
                    </div>
                </div>
            </fieldset>
            <hr>
            <fieldset>
                <p class="fw-bold fs-5">Beasiswa</p>
                <div class="row">
                    <div class="col-12 mb-3">
                        <label class="form-label" for="beasiswa">Beasiswa</label>
                        <input class="form-control" type="text" id="beasiswa" name="beasiswa" placeholder="beasiswa" />
                    </div>
                </div>
            </fieldset>
            <hr>
            <fieldset>
                <p class="fw-bold fs-5">Meninggalkan Sekolah</p>
                {{-- <div class="row mb-3">
                    <p class="fw-bold mb-1">Tamat Belajar</p>
                    <div class="col">
                        <label class="form-label" for="tahun_lulus">Tahun Lulus</label>
                        <select name="year_id" id="year" class="form-select">
                            <option disabled>--pilih tahun--</option>
                            @foreach ($years as $year)
                                <option value="{{ $year->id }}">{{ $year->year }}</option>
                            @endforeach
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label" for="lulus_no_ijazah">No STTB Ijazah</label>
                        <input class="form-control" type="text" id="lulus_no_ijazah" name="lulus_no_ijazah"
                            placeholder="no ijazah" />
                    </div>
                    <div class="col">
                        <label class="form-label" for="lulus_lanjut_sekolah">Melanjutkan sekolah di</label>
                        <input class="form-control" type="text" id="lulus_lanjut_sekolah" name="lulus_lanjut_sekolah"
                            placeholder="melanjutkan sekolah di" />
                    </div>
                </div> --}}

                <div class="row mb-3">
                    <p class="fw-bold mb-1">Pindah Sekolah</p>
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="pindah_sekolah_dari_kelas"> Dari Kelas</label>
                            <input class="form-control" type="text" id="pindah_sekolah_dari_kelas"
                                name="pindah_sekolah_dari_kelas" placeholder="dari kelas" />
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="pindah_sekolah_ke_sekolah">Ke Sekolah</label>
                            <input class="form-control" type="text" id="pindah_sekolah_ke_sekolah"
                                name="pindah_sekolah_ke_sekolah" placeholder="ke sekolah" />
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="pindah_sekolah_ke_kelas">Ke Kelas</label>
                            <input class="form-control" type="text" id="pindah_sekolah_ke_kelas"
                                name="pindah_sekolah_ke_kelas" placeholder="ke kelas" />
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="pindah_sekolah_alasan">Alasan</label>
                            <input class="form-control" type="text" id="pindah_sekolah_alasan"
                                name="pindah_sekolah_alasan" placeholder="alasan" />
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <p class="fw-bold mb-1">Keluar Sekolah</p>
                    <div class="col-md-4 col-12 ">
                        <label class="form-label" for="keluar_sekolah_tanggal">Tanggal</label>
                        <input class="form-control" type="text" id="keluar_sekolah_tanggal"
                            name="keluar_sekolah_tanggal" placeholder="tanggal" />
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="mb-3">
                            <label class="form-label" for="keluar_sekolah_alasan">alasan</label>
                            <input class="form-control" type="text" id="keluar_sekolah_alasan"
                                name="keluar_sekolah_alasan" placeholder="alasan" />
                        </div>
                    </div>

                </div>
            </fieldset>

            <button type="submit" class="action submit btn btn-success float-end">
                Simpan Data
            </button>
        </form>

    </div>
@endsection
