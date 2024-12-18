@extends('layouts.app')

@section('title', 'Ganti Password')

@section('content')

    <div class="card">
        <div class="card-body mt-3">
            <p class="fs-4">Ganti Password</p>
            <hr>

            <form method="POST" action="{{ route('password.edit', ['pass' => $id]) }}">
                @csrf
                @method('PUT')

                <div class=" mb-3">
                    <label for="current_password" class="form-label">{{ __('Password Lama') }}</label>
                    <input id="current_password" type="password"
                        class="form-control @error('current_password') is-invalid @enderror" name="current_password"
                        required>
                    @error('current_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class=" mb-3">
                    <label for="password" class="form-label">{{ __('Password Baru') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class=" mb-3">
                    <label for="password-confirm" class="form-label">{{ __('Ulangi Password') }}</label>
                    <input id="password-confirm" type="password"
                        class="form-control @error('password_confirmation') is-invalid @enderror"
                        name="password_confirmation" required>
                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="my-3">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">
                            Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
