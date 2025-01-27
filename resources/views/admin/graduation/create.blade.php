@extends('layouts.app')

@section('title', 'Buat Data Alumni')
@section('content')
    <div class="card p-3 rounded">
        <form action="{{ route('graduation.create') }}" method="get">
            <div class="input-group">
                <select name="kelas" class="form-select">
                    <option selected disabled> -- pilih kelas --</option>
                    @foreach ($groups as $group)
                        <option value="{{ $group->id }}">{{ $group->kelas }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary">Pilih Kelas</button>
            </div>
        </form>
        <hr>
        <p class="text-center fs-5 m-0">Cek Data Siswa</p>
        <form action="{{ route('graduation.store') }}" method="POST">
            @csrf
            <div class="">
                <label for="year" class="form-label">Pilih tahun lulusan</label>
                <select name="year_id" class="form-select">
                    @foreach ($years as $year)
                        <option value="{{ $year->id }}">{{ $year->year }}</option>
                    @endforeach
                </select>
            </div>
            <hr>
            <div class="mt-2">

            </div>
            @if ($student_g6 != null)
                <table class="table">
                    <thead>
                        <tr>
                            <td>
                                <input type="checkbox" id="selectAllCheckbox"
                                    class="form-check-input border border-primary border-2 large">
                                Pilih semua
                            </td>
                            <td>Nama</td>
                            <td>Kelas</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($student_g6 as $s)
                            <tr>
                                <td>
                                    <input class="checkboxes form-check-input border border-primary border-2 large"
                                        type="checkbox" name="check[{{ $s->id }}]">
                                </td>
                                <td> <input type="text" value="{{ $s->id }}"
                                        name="student_id[{{ $s->id }}]" hidden> {{ $s->nama }}
                                </td>
                                <td>{{ $s->group->kelas }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">Belum ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            @else
                <div class="text-center fs-5">
                    kelas belum dipilih
                </div>
            @endif

            <button type="submit" class="my-3 action submit btn btn-success float-end w-25">
                Simpan Data
            </button>
        </form>
    </div>

@endsection

@push('css')
    <style>
        .large {
            width: 25px;
            height: 17px;
        }
    </style>
@endpush
@push('scripts')
    <script>
        document.getElementById('selectAllCheckbox')
            .addEventListener('change', function() {
                let checkboxes =
                    document.querySelectorAll('.checkboxes');
                checkboxes.forEach(function(checkbox) {
                    checkbox.checked = this.checked;
                }, this);
            });
    </script>
@endpush
