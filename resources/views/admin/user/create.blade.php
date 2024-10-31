@extends('layouts.app')

@section('title', 'Buat Akun Baru')

@section('content')

    <div class="card">
        <div class="card-body mt-3">
            <p class="fs-4">Akun Untuk Siswa Baru</p>
            <hr>
            <form method="POST" action="{{ route('user.store') }}">
                @csrf
                <div class="row">
                    <div class="col-md-6 col-12 mb-3">
                        <label for="name" class="form-label">Nama Lengkap Siswa</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-6 col-12 mb-3">
                        <label for="email" class="form-label">Alamat Email ( nis + @gmail.com)</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-6 col-12 mb-3">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-6 col-12 mb-3">
                        <label for="password-confirm" class="form-label">{{ __('Ulangi Password') }}</label>
                        <div class="col-md-10">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="role">Role</label>
                        <select class="form-select" id="role" name="role">
                            <option disabled selected>--- pilih role ---</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="my-3">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-success">
                            Selanjutnya
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
