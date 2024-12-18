@extends('layouts.app')

@section('title', 'Data Master Akun')

@section('content')

    @if (session()->has('reset'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('reset') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card rounded p-3">
        <div class="table-responsive">

            <table id="table" class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->roles()->first()->name ?? 'belum ditentukan' }}</td>

                            <td>
                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm">edit</a>
                                <form method="POST" action="{{ route('reset.pass', $user->id) }}" class="d-inline"
                                    onsubmit="return confirm('Apakah anda yakin untuk reset password ?');">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-secondary btn-sm">reset</button>
                                </form>
                                <form method="POST" action="{{ route('user.destroy', $user->id) }}" class="d-inline"
                                    onsubmit="return confirm('Apakah anda yakin untuk menghapus data ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">delete</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection
@include('layouts.partials.scripts')
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('assets/datatables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                "pageLength": 50
            });
        });
    </script>
@endpush
