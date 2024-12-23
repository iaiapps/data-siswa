@extends('layouts.app')

@section('title', 'Edit Kelas')

@section('content')

    <div class="card">
        {{-- <div class="card-header bg-success">{{ __('Register') }}</div> --}}
        <div class="card-body mt-3">
            <form method="POST" action="{{ route('subject.update', $subject->id) }}">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <label for="subject" class="col-md-2 col-form-label">Nama Pelajaran</label>
                    <div class="col-md-10">
                        <input id="subject" type="text" class="form-control @error('subject') is-invalid @enderror"
                            name="pelajaran" value="{{ old('subject', $subject->pelajaran) }}" required
                            autocomplete="subject" autofocus>

                        @error('subject')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-success">
                            Simpan data Pelajaran
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
