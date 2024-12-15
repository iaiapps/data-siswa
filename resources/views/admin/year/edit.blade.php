@extends('layouts.app')

@section('title', 'Edit Tahun')

@section('content')

    <div class="card">
        {{-- <div class="card-header bg-success">{{ __('Register') }}</div> --}}
        <div class="card-body mt-3">
            <form method="POST" action="{{ route('year.update', $year->id) }}">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <label for="year" class="col-md-2 col-form-label">Nama year</label>
                    <div class="col-md-10">
                        <input id="year" type="text" class="form-control @error('year') is-invalid @enderror"
                            name="year" value="{{ old('year', $year->year) }}" required autocomplete="year" autofocus>

                        @error('year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-success">
                            Simpan data year
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
