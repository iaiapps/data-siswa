@extends('layouts.app')

@section('title', 'Edit Data Anak')
@section('content')
    <div class="card p-3">

        <form action="{{ route('studentparent.update', $studentparent->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="row">
                <div class="col">
                    <fieldset>
                        <p class="fw-bold fs-5">Formulir Ayah</p>
                        <div class="mb-3">
                            <label class="form-label" for="nama_ayah">Nama Ayah</label>
                            <input class="form-control" type="text" id="nama_ayah" name="nama_ayah"
                                placeholder="nama ayah" value="{{ old('nama_ayah', $studentparent->nama_ayah) }}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="nik_ayah">NIK Ayah</label>
                            <input class="form-control" type="text" id="nik_ayah" name="nik_ayah" placeholder="nik ayah"
                                value="{{ old('nik_ayah', $studentparent->nik_ayah) }}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="tempat_lahir_ayah">Tempat Lahir Ayah</label>
                            <input class="form-control" type="text" id="tempat_lahir_ayah" name="tempat_lahir_ayah"
                                placeholder="tempat lahir ayah"
                                value="{{ old('tempat_lahir_ayah', $studentparent->tempat_lahir_ayah) }}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="tanggal_lahir_ayah">Tanggal Lahir Ayah</label>
                            <input class="form-control" type="text" id="tanggal_lahir_ayah" name="tanggal_lahir_ayah"
                                placeholder="tanggal lahir ayah"
                                value="{{ old('tanggal_lahir_ayah', $studentparent->tanggal_lahir_ayah) }}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="pendidikan_ayah">Pendidikan Ayah</label>
                            <input class="form-control" type="text" id="pendidikan_ayah" name="pendidikan_ayah"
                                placeholder="pendidikan ayah"
                                value="{{ old('pendidikan_ayah', $studentparent->pendidikan_ayah) }}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="pekerjaan_ayah">Pekerjaan Ayah</label>
                            <input class="form-control" type="text" id="pekerjaan_ayah" name="pekerjaan_ayah"
                                placeholder="pekerjaan ayah"
                                value="{{ old('pekerjaan_ayah', $studentparent->pekerjaan_ayah) }}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="penghasilan_ayah">Penghasilan Ayah</label>
                            <input class="form-control" type="text" id="penghasilan_ayah" name="penghasilan_ayah"
                                placeholder="penghasilan ayah"
                                value="{{ old('penghasilan_ayah', $studentparent->penghasilan_ayah) }}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="hp_ayah">No. HP Ayah</label>
                            <input class="form-control" type="text" id="hp_ayah" name="hp_ayah"
                                placeholder="no. hp ayah" value="{{ old('hp_ayah', $studentparent->hp_ayah) }}" />
                        </div>
                    </fieldset>

                </div>
                <div class="col">
                    <fieldset>
                        <p class="fw-bold fs-5">Formulir Ibu</p>

                        <div class="mb-3">
                            <label class="form-label" for="nama_ibu">Nama Ibu</label>
                            <input class="form-control" type="text" id="nama_ibu" name="nama_ibu" placeholder="nama ibu"
                                value="{{ old('nama_ibu', $studentparent->nama_ibu) }}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="nik_ibu">NIK Ibu</label>
                            <input class="form-control" type="text" id="nik_ibu" name="nik_ibu" placeholder="nik ibu"
                                value="{{ old('nik_ibu', $studentparent->nik_ibu) }}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="tempat_lahir_ibu">Tempat Lahir Ibu</label>
                            <input class="form-control" type="text" id="tempat_lahir_ibu" name="tempat_lahir_ibu"
                                placeholder="tempat lahir ibu"
                                value="{{ old('tempat_lahir_ibu', $studentparent->tempat_lahir_ibu) }}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="tanggal_lahir_ibu">Tanggal Lahir Ibu</label>
                            <input class="form-control" type="text" id="tanggal_lahir_ibu" name="tanggal_lahir_ibu"
                                placeholder="tanggal lahir ibu"
                                value="{{ old('tanggal_lahir_ibu', $studentparent->tanggal_lahir_ibu) }}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="pendidikan_ibu">Pendidikan Ibu</label>
                            <input class="form-control" type="text" id="pendidikan_ibu" name="pendidikan_ibu"
                                placeholder="pendidikan ibu"
                                value="{{ old('pendidikan_ibu', $studentparent->pendidikan_ibu) }}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="pekerjaan_ibu">Pekerjaan Ibu</label>
                            <input class="form-control" type="text" id="pekerjaan_ibu" name="pekerjaan_ibu"
                                placeholder="pekerjaan ibu"
                                value="{{ old('pekerjaan_ibu', $studentparent->pekerjaan_ibu) }}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="penghasilan_ibu">Penghasilan Ibu</label>
                            <input class="form-control" type="text" id="penghasilan_ibu" name="penghasilan_ibu"
                                placeholder="penghasilan ibu"
                                value="{{ old('penghasilan_ibu', $studentparent->penghasilan_ibu) }}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="hp_ibu">No. HP Ibu</label>
                            <input class="form-control" type="text" id="hp_ibu" name="hp_ibu"
                                placeholder="no. hp ibu" value="{{ old('hp_ibu', $studentparent->hp_ibu) }}" />
                        </div>
                    </fieldset>

                    <fieldset>
                        <p class="fw-bold fs-5 mb-0">Formulir Wali*</p>
                        <small>kosongi atau beri tanda "-" jika ananda tidak tinggal dengan wali</small>
                        <div class="my-3">
                            <label class="form-label" for="nama_wali">Nama Wali</label>
                            <input class="form-control" type="text" id="nama_wali" name="nama_wali"
                                placeholder="nama wali" value="{{ old('nama_wali', $studentparent->nama_wali) }}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="hubungan_keluarga">Hubungan Wali dan Ananda</label>
                            <input class="form-control" type="text" id="hubungan_keluarga" name="hubungan_keluarga"
                                placeholder="hubungan wali dan ananda"
                                value="{{ old('hubungan_keluarga', $studentparent->hubungan_keluarga) }}" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="pendidikan_wali">Pendidiakan Wali</label>
                            <input class="form-control" type="text" id="pendidikan_wali" name="pendidikan_wali"
                                placeholder="pendidikan wali"
                                value="{{ old('pendidikan_wali', $studentparent->pendidikan_wali) }}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="pekerjaan_wali">Pekerjaan Wali</label>
                            <input class="form-control" type="text" id="pekerjaan_wali" name="pekerjaan_wali"
                                placeholder="pekerjaan wali"
                                value="{{ old('pekerjaan_wali', $studentparent->pekerjaan_wali) }}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="hp_wali">No. HP Wali</label>
                            <input class="form-control" type="text" id="hp_wali" name="hp_wali"
                                placeholder="no. hp wali" value="{{ old('hp_wali', $studentparent->hp_wali) }}" />
                        </div>

                    </fieldset>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Simpan Data</button>
        </form>
    </div>
@endsection
