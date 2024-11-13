@extends('layouts.loginapp')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <p class="text-center fs-3 mt-5">Pusat Data Siswa SDIT Harapan Umat Jember</p>
            <div class="col-md-6">
                <div class="card mt-2">
                    <div class="card-header text-center">{{ __('Login') }}</div>

                    <div class="card-body mx-4">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label text-md-end">{{ __('Email Address') }}</label>


                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class=" mb-3">
                                <label for="password" class="form-label text-md-end">{{ __('Password') }}</label>


                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="mx-4">
                                <button type="submit" class="btn btn-primary w-100">
                                    {{ __('Login') }}
                            </div>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
