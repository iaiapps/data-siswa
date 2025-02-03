@extends('layouts.app')

@section('title', 'Formulir Biodata Siswa')
@section('content')
    <div class="bg-white p-3 rounded">
        @php
            $admin = Auth::user()->hasRole('admin');
            if ($admin) {
                $route = route('student.update', $student->id);
            } else {
                $route = route('biodata.update', $student->id);
            }
        @endphp

        <form action="{{ $route }}" method="POST">
            @csrf
            @method('put')

            <fieldset class="step">
                <h2 class="mb-3">Edit Biodata Siswa</h2>
                @if ($admin)
                    <div class="row mb-3">
                        <div class="col-md-4 col-12">
                            <label class="form-label" for="nis">NIS</label>
                            <input class="form-control" id="nis" name="nis" type="number" placeholder="nis"
                                value="{{ $student->nis }}" />
                        </div>
                        <div class="col-md-4 col-12">
                            <label class="form-label" for="nisn">NISN</label>
                            <input class="form-control" id="nisn" name="nisn" type="number" placeholder="nisn"
                                value="{{ $student->nisn }}" />
                        </div>
                        <div class="col-md-4 col-12">
                            <label class="form-label" for="year">Tahun Masuk</label>
                            <select name="year_id" class="form-select" id="year">
                                <option disabled selected>--- pilih tahun ---</option>
                                @foreach ($years as $year)
                                    <option value="{{ $year->id }}">{{ $year->year }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <hr>
                @endif
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label" for="nama">Nama Lengkap</label>
                        <input
                            class="form-control @error('nama')
                        is-invalid
                    @enderror"
                            id="nama" name="nama" type="text" placeholder="nama lengkap"
                            value="{{ old('nama', $student->nama) }}" />
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4 col-12">
                        <label class="form-label" for="nik">NIK</label>
                        <input class="form-control" id="nik" name="nik" type="number" placeholder="nik"
                            value="{{ $student->nik }}" />
                    </div>
                    <div class="col-md-4 col-12">
                        <label class="form-label" for="akta">Akta Kelahiran</label>
                        <input class="form-control" id="akta" name="akta" type="number" placeholder="akta"
                            value="{{ $student->akta }}" />
                    </div>
                    <div class="col-md-4 col-12">
                        <label class="form-label" for="kk">KK</label>
                        <input class="form-control" id="kk" name="kk" type="number" placeholder="kk"
                            value="{{ $student->kk }}" />
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="form-select" id="jenis_kelamin" name="jenis_kelamin">
                        <option>---</option>
                        <option value="laki-laki">Laki-Laki</option>
                        <option value="perempuan">Perempuan</option>

                    </select>
                </div>

                <div class="row g-3">
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label" for="tempat_lahir">Tempat Lahir</label>
                            <input
                                class="form-control @error('tempat_lahir') is-invalid
                            @enderror"
                                id="tempat_lahir" name="tempat_lahir" type="text" placeholder="tempat lahir"
                                value="{{ $student->tempat_lahir }}" />
                            @error('tempat_lahir')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label " for="tanggal_lahir">Tanggal Lahir</label>
                            <input
                                class="form-control @error('tanggal_lahir')
                            is-invalid @enderror"
                                name="tanggal_lahir" type="date" id="tanggal_lahir" placeholder="Bulan/Hari/Tahun"
                                value="{{ $student->tanggal_lahir }}" />
                            @error('tanggal_lahir')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="mb-3">
                            <label class="form-label " for="status_anak">Status Anak</label>
                            <input
                                class="form-control @error('status_anak')
                            is-invalid
                            @enderror"
                                name="status_anak" type="text" id="status_anak" placeholder="Status Anak" />
                            @error('status_anak')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="mb-3">
                            <label class="form-label " for="anak_ke">Anak Ke</label>
                            <input
                                class="form-control @error('anak_ke')
                            is-invalid
                            @enderror"
                                name="anak_ke" type="text" id="anak_ke" placeholder="Status Anak" />
                            @error('anak_ke')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="mb-3">
                            <label class="form-label " for="saudara">Saudara</label>
                            <input
                                class="form-control @error('saudara')
                            is-invalid
                            @enderror"
                                name="saudara" type="text" id="saudara" placeholder="Saudara" />
                            @error('saudara')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <hr>
                <div class="mb-3">
                    <label class="form-label " for="alamat">Alamat Jalan</label>
                    <input
                        class="form-control @error('alamat')
                    is-invalid
                    @enderror"
                        type="text" id="alamat" name="alamat" placeholder="alamat"
                        value="{{ $student->alamat }}" />
                    @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label" for="rt">RT </label>
                        <input
                            class="form-control @error('rt')
                        is-invalid
                        @enderror"
                            type="number" id="rt" name="rt" placeholder="RT"
                            value="{{ $student->rt }}" />
                        @error('rt')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label " for="rw">RW</label>
                        <input
                            class="form-control @error('rw')
                        is-invalid
                        @enderror"
                            type="number" id="rw" name="rw" placeholder="RW"
                            value="{{ $student->rw }}" />
                        @error('rw')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label " for="desa_kelurahan">Desa/Kelurahan</label>
                        <input
                            class="form-control @error('desa_kelurahan')
                        is-invalid
                        @enderror"
                            type="text" id="desa_kelurahan" name="desa_kelurahan" placeholder="desa_kelurahan"
                            value="{{ $student->desa_kelurahan }}" />
                        @error('desa_kelurahan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="kecamatan">Kecamatan</label>
                        <input
                            class="form-control  @error('kecamatan')
                        is-invalid
                        @enderror"
                            type="text" id="kecamatan" name="kecamatan" placeholder="kecamatan"
                            value="{{ $student->sundistrict }}" />
                        @error('kecamatan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="kode_pos">Kode Pos</label>
                        <input
                            class="form-control  @error('kode_pos')
                        is-invalid
                        @enderror"
                            type="text" id="kode_pos" name="kode_pos" placeholder="kode_pos"
                            value="{{ $student->sundistrict }}" />
                        @error('kode_pos')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="kota_kabupaten">Kabupaten / Kota</label>
                        <input
                            class="form-control @error('kota_kabupaten')
                        is-invalid
                        @enderror"
                            type="text" id="kota_kabupaten" name="kota_kabupaten" placeholder="kota_kabupaten"
                            value="{{ $student->kota_kabupaten }}" />
                        @error('kota_kabupaten')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label " for="provinsi">Provinsi</label>
                        <input class="form-control @error('provinsi') is-invalid @enderror" type="text"
                            id="provinsi" name="provinsi" placeholder="provinsi" value="{{ $student->provinsi }}" />
                        @error('provinsi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="border rounded">
                        <div class="col">
                            <label class="form-label " for="lintang">Garis Lintang</label>
                            <input class="form-control @error('lintang') is-invalid @enderror" type="text"
                                id="lintang" name="lintang" placeholder="lintang" value="{{ $student->lintang }}" />
                            @error('lintang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label class="form-label " for="bujur">Garis Bujur</label>
                            <input class="form-control @error('bujur') is-invalid @enderror" type="text"
                                id="bujur" name="bujur" placeholder="bujur" value="{{ $student->bujur }}" />
                            @error('bujur')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <small>jika tidak tahu bisa dikosongi atau beri tanda "-"</small>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6 col-12 mb-3">
                        <label class="form-label" for="tinggi">Tinggi</label>
                        <input class="form-control @error('tinggi') is-invalid @enderror" type="text" id="tinggi"
                            name="tinggi" placeholder="tinggi" value="{{ $student->tinggi }}" />
                        @error('tinggi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-12 mb-3">
                        <label class="form-label" for="berat">Berat</label>
                        <input class="form-control @error('berat') is-invalid @enderror" type="text" id="berat"
                            name="berat" placeholder="berat" value="{{ $student->berat }}" />
                        @error('berat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-12 mb-3">
                        <label class="form-label" for="golongan_darah">Golongan Darah</label>
                        <input class="form-control @error('golongan_darah') is-invalid @enderror" type="text"
                            id="golongan_darah" name="golongan_darah" placeholder="golongan_darah"
                            value="{{ $student->golongan_darah }}" />
                        @error('golongan_darah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-12 mb-3">
                        <label class="form-label" for="riwayat_kesehatan">Riwayat penyakit</label>
                        <input class="form-control @error('riwayat_kesehatan') is-invalid @enderror" type="text"
                            id="riwayat_kesehatan" name="riwayat_kesehatan" placeholder="riwayat_kesehatan"
                            value="{{ $student->riwayat_kesehatan }}" />
                        @error('riwayat_kesehatan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12 col-md-6 mb-3">
                        <label class="form-label" for="tinggal_bersama">Tinggal Bersama</label>
                        <input
                            class="form-control @error('tinggal_bersama')
                    is-invalid
                    @enderror"
                            type="text" id="tinggal_bersama" name="tinggal_bersama" placeholder="Tinggal Bersama"
                            value="{{ $student->tinggal_bersama }}" />
                        @error('tinggal_bersama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6 col-12 mb-3">
                        <label class="form-label" for="agama">Agama</label>
                        <input
                            class="form-control @error('agama')
                    is-invalid
                    @enderror"
                            type="text" id="agama" name="agama" placeholder="Agama" />
                        @error('agama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6 col-12 mb-3">
                        <label class="form-label" for="kewarganegaraan">Kewarganegaraan</label>
                        <input
                            class="form-control @error('kewarganegaraan')
                    is-invalid
                    @enderror"
                            type="text" id="kewarganegaraan" name="kewarganegaraan" placeholder="Kewarganegaraan" />
                        @error('kewarganegaraan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6 col-12 mb-3">
                        <label class="form-label" for="bahasa">Bahasa sehari-hari</label>
                        <input
                            class="form-control @error('bahasa')
                    is-invalid
                    @enderror"
                            type="text" id="bahasa" name="bahasa" placeholder="Bahasa sehari-hari" />
                        @error('bahasa')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="action submit btn btn-success float-end w-25">
                    Simpan Data
                </button>
        </form>
    </div>
@endsection
