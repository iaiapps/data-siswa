@extends('layouts.app')

@section('title', 'Buat Akun Baru')

@section('content')

    <div class="card">
        <div class="card-body mt-3">
            <p class="fs-4">Buat Kelas baru</p>
            <hr>
            <form method="POST" action="{{ route('group.store') }}">
                @csrf
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="kelas" class="form-label">Nama Kelas</label>
                        <input id="kelas" type="text" class="form-control @error('kelas') is-invalid @enderror"
                            name="kelas" value="{{ old('kelas') }}" required autocomplete="kelas" autofocus>
                        @error('kelas')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="my-3">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-success">
                                Simpan
                            </button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
@endsection
