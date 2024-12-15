@extends('layouts.app')

@section('title', 'Buat Data Tahun')

@section('content')

    <div class="card">
        <div class="card-body mt-3">
            <p class="fs-4">Buat Data Tahun Pelajaran</p>
            <hr>
            <form method="POST" action="{{ route('year.store') }}">
                @csrf
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="year" class="form-label">Tahun</label>
                        <input id="year" type="text" class="form-control @error('year') is-invalid @enderror"
                            name="year" value="{{ old('year') }}" required autocomplete="year" autofocus>
                        @error('year')
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
