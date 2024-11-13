@extends('layouts.app')

@section('title', 'Upload Foto Profil')
@section('content')
    <div class="card p-3 rounded">
        <form action="{{ route('storefoto') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <fieldset class="step">
                <p class="fs-5">File Foto Siswa berbentuk .png atau .jpg/.jpeg berukuran 4x6</p>
                <hr>
                <input type="hidden" name="student_id" value="{{ $id }}">

                {{-- <div class="mb-3">
                    <label class="form-label" for="type">Upload Dokumen</label>
                    <input
                        class="form-control @error('type')
                            is-invalid
                        @enderror"
                        id="type" name="type" type="text" placeholder="type" value="{{ old('type') }}" />
                    @error('type')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div> --}}
                <input type="hidden" name="type" value="profil">
                {{-- type ada profil->foto profil dan dokumen->kk,akte --}}
                <div class="mb-3">
                    <label class="form-label" for="type">Foto Profil</label>
                    <input
                        class="form-control @error('file')
                            is-invalid
                        @enderror"
                        id="file" name="file" type="file" placeholder="file" value="{{ old('file') }}" />
                    @error('file')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>



            </fieldset>
            <button type="submit" class="my-3 action submit btn btn-success float-end w-25">
                Simpan Data
            </button>
        </form>
    </div>

@endsection
