@extends('layouts.app')

@section('title', 'Edit Kelas')

@section('content')

    <div class="card">
        {{-- <div class="card-header bg-success">{{ __('Register') }}</div> --}}
        <div class="card-body mt-3">
            <form method="POST" action="{{ route('group.update', $group->id) }}">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <label for="kelas" class="col-md-2 col-form-label">Nama Kelas</label>
                    <div class="col-md-10">
                        <input id="kelas" type="text" class="form-control @error('kelas') is-invalid @enderror"
                            name="kelas" value="{{ old('kelas', $group->kelas) }}" required autocomplete="kelas"
                            autofocus>

                        @error('kelas')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-success">
                            Simpan data Kelas
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
