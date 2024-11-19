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
                        <label for="nis" class="form-label">NIS</label>
                        <input id="nis" type="text" class="form-control @error('nis') is-invalid @enderror"
                            name="nis" value="{{ old('nis') }}" required autocomplete="nis" autofocus>
                        @error('nis')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6 col-12 mb-3">
                        <label for="nisn" class="form-label">NISN</label>
                        <input id="nisn" type="text" class="form-control @error('nisn') is-invalid @enderror"
                            name="nisn" value="{{ old('nisn') }}" required autocomplete="nisn" autofocus>
                        @error('nisn')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <hr>
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
                        <label class="form-label" for="gender">Jenis Kelamin</label>
                        <select class="form-select" id="gender" name="gender">
                            <option disabled selected>--- pilih jenis kelamin ---</option>
                            <option>Laki-laki</option>
                            <option>Perempuan</option>

                        </select>
                    </div>
                    <div class="col-md-6 col-12 mb-3">
                        <label for="birthplace" class="form-label">Tempat Lahir</label>
                        <input id="birthplace" type="text" class="form-control @error('birthplace') is-invalid @enderror"
                            name="birthplace" value="{{ old('birthplace') }}" required autocomplete="birthplace" autofocus>
                        @error('birthplace')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6 col-12 mb-3">
                        <label for="birthdate" class="form-label">Tanggal Lahir</label>
                        <input id="birthdate" type="date" class="form-control @error('birthdate') is-invalid @enderror"
                            name="birthdate" value="{{ old('birthdate') }}" required autocomplete="birthdate" autofocus>
                        @error('birthdate')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- <div class="col-md-6 col-12 mb-3">
                        <label for="email" class="form-label">Alamat Email ( nis + @gmail.com)</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> --}}

                    <div class="col-md-6 col-12 mb-3">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="new-password" value="password1234">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <small>*jika tidak dirubah, password default = password1234</small>
                    </div>

                    <div class="col-md-6 col-12 mb-3">
                        <label for="password-confirm" class="form-label">{{ __('Ulangi Password') }}</label>
                        <div class="col-md-10">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                required autocomplete="new-password" value="password1234">
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
                        <small>*email default adalah nis + @sditharum.id</small>
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
