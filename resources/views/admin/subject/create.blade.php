@extends('layouts.app')

@section('title', 'Buat Matapelajaran Baru')

@section('content')

    <div class="card">
        <div class="card-body mt-3">
            <p class="fs-4">Buat Matapelajaran baru</p>
            <hr>
            <form method="POST" action="{{ route('subject.store') }}">
                @csrf
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="pelajaran" class="form-label">Nama Pelajaran</label>
                        <input id="pelajaran" type="text" class="form-control @error('pelajaran') is-invalid @enderror"
                            name="pelajaran" value="{{ old('pelajaran') }}" required autocomplete="pelajaran" autofocus>
                        @error('pelajaran')
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
