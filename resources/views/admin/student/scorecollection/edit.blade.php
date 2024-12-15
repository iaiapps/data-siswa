@extends('layouts.app')

@section('title', 'Edit Kelas')

@section('content')

    <div class="card">
        {{-- <div class="card-header bg-success">{{ __('Register') }}</div> --}}
        <div class="card-body mt-3">
            <form method="POST" action="{{ route('scorecollection.update', $scoreCollection->id) }}">
                @csrf
                @method('PUT')
                <div>
                    <table class="table">

                        <body>
                            <tr>
                                <td>Kelas 1</td>
                                <td>semester 1 <input class="form-control" type="number" name="kelas_1a"
                                        value="{{ $scoreCollection->kelas_1a }}"></td>
                                <td>semester 2 <input class="form-control" type="number" name="kelas_1b"
                                        value="{{ $scoreCollection->kelas_1b }}"></td>
                            </tr>

                            <tr>
                                <td>Kelas 2</td>
                                <td>semester 1 <input class="form-control" type="number" name="kelas_2a"
                                        value="{{ $scoreCollection->kelas_2a }}"></td>
                                <td>semester 2 <input class="form-control" type="number" name="kelas_2b"
                                        value="{{ $scoreCollection->kelas_2b }}"></td>
                            </tr>
                            <tr>
                                <td>Kelas 3</td>
                                <td>semester 1 <input class="form-control" type="number" name="kelas_3a"
                                        value="{{ $scoreCollection->kelas_3a }}"></td>
                                <td>semester 2 <input class="form-control" type="number" name="kelas_3b"
                                        value="{{ $scoreCollection->kelas_3b }}"></td>
                            </tr>
                            <tr>
                                <td>Kelas 4</td>
                                <td>semester 1 <input class="form-control" type="number" name="kelas_4a"
                                        value="{{ $scoreCollection->kelas_4a }}"></td>
                                <td>semester 2 <input class="form-control" type="number" name="kelas_4b"
                                        value="{{ $scoreCollection->kelas_4b }}"></td>
                            </tr>
                            <tr>
                                <td>Kelas 5</td>
                                <td>semester 1 <input class="form-control" type="number" name="kelas_5a"
                                        value="{{ $scoreCollection->kelas_5a }}"></td>
                                <td>semester 2 <input class="form-control" type="number" name="kelas_5b"
                                        value="{{ $scoreCollection->kelas_5b }}"></td>
                            </tr>
                            <tr>
                                <td>Kelas 6</td>
                                <td>semester 1 <input class="form-control" type="number" name="kelas_6a"
                                        value="{{ $scoreCollection->kelas_6a }}"></td>
                                <td>semester 2 <input class="form-control" type="number" name="kelas_6b"
                                        value="{{ $scoreCollection->kelas_6b }}"></td>
                            </tr>
                        </body>
                    </table>
                </div>
                <button type="submit">submit</button>
            </form>
        </div>
    </div>
@endsection
