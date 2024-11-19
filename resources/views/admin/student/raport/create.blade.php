@extends('layouts.app')

@section('title', 'Formulir Data Siswa')
@section('content')
    <div class="bg-white p-3 rounded">
        <form action="{{ route('student.store') }}" method="POST">
            @csrf

            <fieldset class="step">
                <div class="d-flex justify-content-between mb-3">
                    <h2 class="">Identitas Siswa</h2>
                    <p class="fs-4">1/2</p>
                </div>

                {{-- @dd($data->id) --}}
                {{-- <input type="text" value="{{ $data->id }}" name="user_id" hidden> --}}
                <hr>
                <div class="row mb-3">
                    <div class="col"> <label class="form-label" for="nis">NIS</label>
                        <input
                            class="form-control @error('nis')
                            is-invalid
                        @enderror"
                            id="nis" name="nis" type="number" placeholder="NIS" value="{{ old('nis') }}" />
                        @error('nis')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col"> <label class="form-label" for="nisn">NISN</label>
                        <input
                            class="form-control @error('nisn')
                            is-invalid
                        @enderror"
                            id="nisn" name="nisn" type="number" placeholder="NISN" value="{{ old('nisn') }}" />
                        @error('nisn')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>




                <div class="row g-3">
                    <div class="col-md-4 col-12">
                        <div class="mb-3">
                            <label for="nik" class="form-label ">NIK (Nomor Induk Kependudukan)</label>
                            <input type="number"
                                class="form-control @error('nik')
                            is-invalid
                            @enderror"
                                id="nik" name="nik" placeholder="nik" />
                            @error('nik')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="mb-3">
                            <label for="kk" class="form-label ">No. KK</label>
                            <input type="number"
                                class="form-control @error('kk')
                            is-invalid
                            @enderror"
                                id="kk" name="kk" placeholder="no. kk" />
                            @error('kk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="mb-3">
                            <label for="akte" class="form-label ">No. Akte Kelahiran</label>
                            <input type="number"
                                class="form-control @error('akte')
                            is-invalid
                            @enderror"
                                id="akte" name="akte" placeholder="no. akte kelahiran" />
                            @error('akte')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="full_name">Nama Lengkap</label>
                    <input
                        class="form-control @error('full_name')
                        is-invalid
                    @enderror"
                        id="full_name" name="full_name" type="text" placeholder="nama lengkap"
                        value="{{ old('full_name') }}" />
                    @error('full_name')
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
                                value="{{ old('birthplace') }}" />
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
                            <input
                                class="form-control @error('birthdate')
                            is-invalid
                            @enderror"
                                name="birthdate" type="date" id="birthdate" placeholder="Bulan/Hari/Tahun" />
                            @error('birthdate')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label " for="alamatjalan">Alamat</label>
                    <input
                        class="form-control @error('address')
                    is-invalid
                    @enderror"
                        type="text" id="alamatjalan" name="address" placeholder="Jalan" />
                    @error('address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-6">
                        <label class="form-label " for="rt">RT </label>
                        <input
                            class="form-control @error('rt')
                        is-invalid
                        @enderror"
                            type="number" id="rt" name="rt" placeholder="RT" />
                        @error('rt')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label class="form-label " for="rw">RW</label>
                        <input
                            class="form-control @error('rw')
                        is-invalid
                        @enderror"
                            type="number" id="rw" name="rw" placeholder="RW" />
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
                            type="text" id="desa/kelurahan" name="village" placeholder="village" />
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
                            type="text" id="kecamatan" name="subdistrict" placeholder="subdistrict" />
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
                            type="text" id="kabupaten/kota" name="city" placeholder="city" />
                        @error('city')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label " for="province">Provinsi</label>
                        <input
                            class="form-control @error('province')
                        is-invalid
                        @enderror"
                            type="text" id="province" name="province" placeholder="province" />
                        @error('province')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="living">Tinggal Bersama</label>
                    <input
                        class="form-control @error('living')
                    is-invalid
                    @enderror"
                        type="text" id="living" name="living" placeholder="tinggal bersama" />
                    @error('living')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="alat_transportasi">Alat Transportasi</label>
                    <input
                        class="form-control @error('alat_transportasi')
                    is-invalid
                    @enderror"
                        type="text" id="alat_transportasi" name="alat_transportasi"
                        placeholder="alat transportasi" />
                    @error('alat_transportasi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="religion">Agama</label>
                    <input
                        class="form-control @error('religion')
                    is-invalid
                    @enderror"
                        type="text" id="religion" name="religion" placeholder="alat transportasi" />
                    @error('religion')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="citizenship">Kewarganegaraan</label>
                    <input
                        class="form-control @error('citizenship')
                    is-invalid
                    @enderror"
                        type="text" id="citizenship" name="citizenship" placeholder="xx" />
                    @error('citizenship')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
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
            </fieldset>
            <button type="submit" class="action submit btn btn-success float-end w-25">
                Simpan Data
            </button>
        </form>
    </div>

@endsection
