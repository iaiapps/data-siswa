@extends('layouts.app')

@section('title', 'Buat Nilai Baru')

@section('content')

    <div class="card">
        <div class="card-body mt-3">
            <p class="fs-4">Buat Nilai Siswa {{ $student->name }}</p>
            <hr>
            <form method="POST" action="{{ route('scorecollection.store') }}">
                @csrf
                <div class="input-group mb-3">
                    {{-- <span class="input-group-text bg-secondary-subtle">Pilih Siswa</span>
                    <select name="student_id" id="student" class="form-control">
                        <option disabled selected>--- pilih siswa ---</option>
                        @foreach ($students as $student)
                            <option value="{{ $student->id }}">{{ $student->name }}</option>
                        @endforeach
                    </select> --}}
                    <input type="text" name="student_id" value="{{ $student->id }}" hidden>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text bg-secondary-subtle">Pilih Mapel</span>
                    <select name="subject_id" id="subject" class="form-control">
                        <option disabled selected>--- pilih pelajaran ---</option>
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->pelajaran }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <table class="table">

                        <body>
                            <tr>
                                <td>Kelas 1</td>
                                <td>semester 1 <input class="form-control" type="number" name="kelas_1a"></td>
                                <td>semester 2 <input class="form-control" type="number" name="kelas_1b"></td>
                            </tr>

                            <tr>
                                <td>Kelas 2</td>
                                <td>semester 1 <input class="form-control" type="number" name="kelas_2a"></td>
                                <td>semester 2 <input class="form-control" type="number" name="kelas_2b"></td>
                            </tr>
                            <tr>
                                <td>Kelas 3</td>
                                <td>semester 1 <input class="form-control" type="number" name="kelas_3a"></td>
                                <td>semester 2 <input class="form-control" type="number" name="kelas_3b"></td>
                            </tr>
                            <tr>
                                <td>Kelas 4</td>
                                <td>semester 1 <input class="form-control" type="number" name="kelas_4a"></td>
                                <td>semester 2 <input class="form-control" type="number" name="kelas_4b"></td>
                            </tr>
                            <tr>
                                <td>Kelas 5</td>
                                <td>semester 1 <input class="form-control" type="number" name="kelas_5a"></td>
                                <td>semester 2 <input class="form-control" type="number" name="kelas_5b"></td>
                            </tr>
                            <tr>
                                <td>Kelas 6</td>
                                <td>semester 1 <input class="form-control" type="number" name="kelas_6a"></td>
                                <td>semester 2 <input class="form-control" type="number" name="kelas_6b"></td>
                            </tr>

                        </body>
                    </table>
                </div>


                {{-- simpan --}}
                <div class="my-3">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-success">
                            Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
