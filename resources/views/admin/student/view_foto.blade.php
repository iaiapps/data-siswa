@extends('layouts.app')

@section('title', 'Foto Profil Siswa')
@section('content')

    <div class="card p-3">
        <div>
            <a href="{{ url()->previous() }}" class="btn btn-primary btn-sm">kembali</a>
            <hr>
            <div class="text-center">
                <img class="img-fluid"
                    src="{{ asset('storage/img-document/' . $document->where('type', 'profil')->first()->file) }}"
                    alt="img">
            </div>
        </div>
    </div>
@endsection
