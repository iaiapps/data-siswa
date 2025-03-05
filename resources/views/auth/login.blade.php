@extends('layouts.loginapp')
@section('title', 'Login')
@section('content')
    <div class="row vh-100 g-0">
        <!-- ini kiri -->
        <div class="col-12 col-md-4 d-block d-md-flex pt-5 pt-md-0 flex-column justify-content-center px-4 bg-light">
            <p class="text-center fs-3 mt-5">Pusat Data Siswa SDIT Harapan Umat Jember</p>

            @if ($errors->any())
                {{-- @foreach ($errors->all() as $error) --}}
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{-- {{ $error }} --}}
                    Email atau Password salah!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                {{-- @endforeach --}}
            @endif
            <div class="card mt-2">
                <div class="card-header text-center">{{ __('Login Siswa') }}</div>
                <div class="card-body mx-1">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label text-md-end">Alamat Email (NIS +
                                @sditharum.id)</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="username" value="{{ old('email') }}" required autocomplete="email" autofocus
                                placeholder="nis@sditharum.id">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label text-md-end">Kata Sandi</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password" placeholder="********">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                        <button type="submit" class="btn btn-primary w-100"> {{ __('Login') }} </button>
                    </form>
                </div>
            </div>

            <p class="small px-3 mt-4">
                NB: Jika tidak mengetahui email dan kata sandi, silahkan hubungi wali kelas masing-masing
            </p>
        </div>
        <!-- ini kanan -->
        <div class="col-12 col-md-8 bg-secondary d-sm-block d-none">
            <div class="d-flex vh-100 flex-column align-items-center justify-content-center px-5 text-center">
                <img src=" {{ asset('img/logosdit.png') }}" class="logo bg-white p-1 rounded mb-5" alt="logo nav" />
                <h2 class="display-4 text-white fw-bold">PUSDATIN SISWA SDIT</h2>
                <h3 class="fs-3 text-white fw-light">
                    Pusat Data dan Informasi Siswa SDIT Harapan Umat Jember
                </h3>
                <footer class="mt-5 p-2 text-center text-white">
                    <small> Pusdatin @ SISTER SDIT by Tim IT SDIT Harum Jember ❤️ </small>
                </footer>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .logo {
            width: 100px;
        }
    </style>
@endpush
