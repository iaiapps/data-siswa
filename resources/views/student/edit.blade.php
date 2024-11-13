@extends('layouts.app')

@section('title', 'Formulir Biodata Siswa')
@section('content')
    <div class="bg-white p-3 rounded">

        <form action="{{ route('student.update', $student->id) }}" method="POST">
            @csrf
            @method('put')


            <fieldset class="step">
                <h2 class="mb-3">Edit Biodata Siswa</h2>
                <div class="row mb-3">
                    <div class="col-6">
                        <label class="form-label" for="nis">NIS</label>
                        <input class="form-control" id="nis" name="nis" type="number" placeholder="nis"
                            value="{{ $student->nis }}" />
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="nisn">NISN</label>
                        <input class="form-control" id="nisn" name="nisn" type="number" placeholder="nisn"
                            value="{{ $student->nisn }}" />
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="name">Nama Lengkap</label>
                    <input
                        class="form-control @error('name')
                        is-invalid
                    @enderror"
                        id="name" name="name" type="text" placeholder="nama lengkap"
                        value="{{ old('name', $student->name) }}" />
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="gender">Jenis Kelamin</label>
                    <select class="form-select" id="gender" name="gender">
                        <option>---</option>
                        <option value="laki-laki">Laki-Laki</option>
                        <option value="perempuan">Perempuan</option>

                    </select>
                </div>

                <div class="row g-3">
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label" for="birthplace">Tempat Lahir</label>
                            <input
                                class="form-control @error('birthplace') is-invalid
                            @enderror"
                                id="birthplace" name="birthplace" type="text" placeholder="tempat lahir"
                                value="{{ $student->birthplace }}" />
                            @error('birthplace')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label " for="birthdate">Tanggal Lahir</label>
                            <input class="form-control @error('birthdate')
                            is-invalid @enderror"
                                name="birthdate" type="date" id="birthdate" placeholder="Bulan/Hari/Tahun"
                                value="{{ $student->birthdate }}" />
                            @error('birthdate')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label class="form-label " for="childstatus">Status Anak</label>
                            <input
                                class="form-control @error('childstatus')
                            is-invalid
                            @enderror"
                                name="childstatus" type="text" id="childstatus" placeholder="Status Anak" />
                            @error('childstatus')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label class="form-label " for="siblings">Saudara</label>
                            <input
                                class="form-control @error('siblings')
                            is-invalid
                            @enderror"
                                name="siblings" type="text" id="siblings" placeholder="Saudara" />
                            @error('siblings')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label " for="alamatjalan">Alamat Jalan</label>
                    <input
                        class="form-control @error('address')
                    is-invalid
                    @enderror"
                        type="text" id="alamatjalan" name="address" placeholder="alamat"
                        value="{{ $student->address }}" />
                    @error('address')
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
                        <label class="form-label " for="desa/kelurahan">Desa/Kelurahan</label>
                        <input
                            class="form-control @error('village')
                        is-invalid
                        @enderror"
                            type="text" id="desa/kelurahan" name="village" placeholder="village"
                            value="{{ $student->village }}" />
                        @error('village')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="kecamatan">Kecamatan</label>
                        <input
                            class="form-control  @error('subdistrict')
                        is-invalid
                        @enderror"
                            type="text" id="kecamatan" name="subdistrict" placeholder="subdistrict"
                            value="{{ $student->sundistrict }}" />
                        @error('subdistrict')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="kabupaten/kota">Kabupaten / Kota</label>
                        <input
                            class="form-control @error('city')
                        is-invalid
                        @enderror"
                            type="text" id="kabupaten/kota" name="city" placeholder="city"
                            value="{{ $student->city }}" />
                        @error('city')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label " for="province">Provinsi</label>
                        <input class="form-control @error('province') is-invalid @enderror" type="text"
                            id="province" name="province" placeholder="province" value="{{ $student->province }}" />
                        @error('province')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6 col-12 mb-3">
                        <label class="form-label" for="height">Tinggi</label>
                        <input class="form-control @error('height') is-invalid @enderror" type="text" id="height"
                            name="height" placeholder="height" value="{{ $student->height }}" />
                        @error('height')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-12 mb-3">
                        <label class="form-label" for="weight">Berat</label>
                        <input class="form-control @error('weight') is-invalid @enderror" type="text" id="weight"
                            name="weight" placeholder="weight" value="{{ $student->weight }}" />
                        @error('weight')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-12 mb-3">
                        <label class="form-label" for="blood">Golongan Darah</label>
                        <input class="form-control @error('blood') is-invalid @enderror" type="text" id="blood"
                            name="blood" placeholder="blood" value="{{ $student->blood }}" />
                        @error('blood')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-12 mb-3">
                        <label class="form-label" for="medical">Riwayat penyakit</label>
                        <input class="form-control @error('medical') is-invalid @enderror" type="text" id="medical"
                            name="medical" placeholder="medical" value="{{ $student->medical }}" />
                        @error('medical')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12 col-md-6 mb-3">
                        <label class="form-label" for="living">Tinggal Bersama</label>
                        <input
                            class="form-control @error('living')
                    is-invalid
                    @enderror"
                            type="text" id="living" name="living" placeholder="Tinggal Bersama"
                            value="{{ $student->living }}" />
                        @error('living')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6 col-12 mb-3">
                        <label class="form-label" for="religion">Agama</label>
                        <input
                            class="form-control @error('religion')
                    is-invalid
                    @enderror"
                            type="text" id="religion" name="religion" placeholder="Agama" />
                        @error('religion')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6 col-12 mb-3">
                        <label class="form-label" for="citizenship">Kewarganegaraan</label>
                        <input
                            class="form-control @error('citizenship')
                    is-invalid
                    @enderror"
                            type="text" id="citizenship" name="citizenship" placeholder="Kewarganegaraan" />
                        @error('citizenship')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6 col-12 mb-3">
                        <label class="form-label" for="language">Bahasa sehari-hari</label>
                        <input
                            class="form-control @error('language')
                    is-invalid
                    @enderror"
                            type="text" id="language" name="language" placeholder="Bahasa sehari-hari" />
                        @error('language')
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
