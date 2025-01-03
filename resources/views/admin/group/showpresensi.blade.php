@extends('layouts.app')

@section('title', 'Data Kelas')
@section('content')
    <div id="printarea" class="rounded p-3 ">
        <div class="area_a4">
            <div class="row">
                <div class="col-6">
                    <table id="tablee" class="table table-sm py-1">
                        <tr>
                            <td>NAMA SEKOLAH </td>
                            <td>: SDIT HARAPAN UMAT JEMBER </td>
                        </tr>
                        <tr>
                            <td>STATUS SEKOLAH </td>
                            <td>: SWASTA </td>
                        </tr>
                        <tr>
                            <td>ALAMAT SEKOLAH </td>
                            <td>: JL.DANAU TOBA GG.ISLAMIC CENTRE </td>
                        </tr>
                        <tr>
                            <td>DESA/KELURAHAN </td>
                            <td>: TEGALGEDE
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-6">
                    <table id="tablee" class="table table-sm">
                        <tr>
                            <td>NOMOR STATISTIK </td>
                            <td>: 1 0 2 0 5 2 4 2 7 0 0 6 </td>
                        </tr>
                        <tr>
                            <td>KECAMATAN/KOTA </td>
                            <td>: SUMBERSARI</td>
                        </tr>
                        <tr>
                            <td>PROVINSI </td>
                            <td>: JAWA TIMUR</td>
                        </tr>
                        <tr>
                            <td>WALI KELAS</td>
                            <td>: - </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="text-center">
                <p class="mb-1">BUKU ABSENSI SISWA</p>
                <p class="mb-1">{{ $group->kelas }}</p>
                <p class="mb-1">Bulan :</p>
            </div>
            <hr>
            <div class="table-responsive">
                <table id="tablee" class="table table-bordered border-black align-middle">
                    <thead>
                        <tr>
                            <td rowspan="2" class="align-middle text-center">No</td>
                            <td rowspan="2" class="align-middle text-center">NIS</td>
                            <td rowspan="2" class="align-middle text-center"> <span class="tn">Nama Siswa</span></td>
                            <td rowspan="2" class="align-middle text-center"><span class="wta mx-1">JK</span></td>
                            <td colspan="31" class="align-middle text-center">Tanggal</td>
                            <td colspan="3" class="align-middle text-center">Jumlah</td>
                            <td rowspan="2" class="align-middle text-center"><span class="wta mx-3">Ket</span></td>
                        </tr>
                        <tr>
                            @for ($x = 1; $x <= 31; $x++)
                                <td>
                                    <span class="wta text-center d-block"> {{ $x }}</span>
                                </td>
                            @endfor
                            <td><span class="wta mx-1">S</span></td>
                            <td><span class="wta mx-1">I</span></td>
                            <td><span class="wta mx-1">A</span></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $student->nis }}</td>

                                <td> <span class="tn">
                                        {{ $student->name }}
                                        <input type="text" value="{{ $student->id }}"
                                            name="student_id[{{ $student->id }}]" hidden>
                                    </span>
                                </td>
                                <td class="text-center">
                                    @if ($student->gender == 'L')
                                        L
                                    @elseif($student->gender == 'P')
                                        P
                                    @endif
                                </td>
                                @for ($x = 0; $x <= 31; $x++)
                                    <td> </td>
                                @endfor
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div>
                <table>
                    <tr>
                        <td>Jumlah Laki-laki </td>
                        <td class="ps-3">: {{ $students->where('gender', 'L')->count() }}</td>
                    </tr>
                    <tr>
                        <td>Jumlah Perempuan </td>
                        <td class="ps-3">: {{ $students->where('gender', 'P')->count() }}</td>
                    </tr>
                    <tr>
                        <td>Jumlah </td>
                        <td class="ps-3">: {{ $students->count() }}</td>
                    </tr>
                </table>
                <div class="row">
                    <div class="col-6 text-center">
                        <p>Kepala Sekolah</p>
                        <p>Sri Puji Hastuti</p>
                    </div>
                    <div class="col-6 text-center">
                        <p>Wali Kelas</p>
                        <p>-</p>
                    </div>
                </div>
            </div>
        </div>

    @endsection
    @include('layouts.partials.scripts')
    @push('css')
        <link rel="stylesheet" href="{{ asset('assets/datatables/datatables.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/pagination.css') }}">
        <style>
            .tn {
                display: block;
                width: 230px;
            }

            .wta {
                width: 15px !important;
            }

            #tablee td {
                padding: 2px 5px !important;
                font-size: 13px;
            }

            /* template untuk print */
            /* dari sini */
            .area_a4 {
                width: 297mm;
                min-height: 210mm;
                padding: 1cm;
                margin: 1cm auto;
                border: 1px #D3D3D3 solid;
                border-radius: 5px;
                background: white;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            }

            @media print {
                body {
                    visibility: hidden;
                }

                .area_a4 {
                    width: 297mm !important;
                    height: 210mm !important;
                    margin: 0;
                    border: initial;
                    border-radius: initial;
                    width: initial;
                    min-height: initial;
                    box-shadow: initial;
                    background: initial;
                    page-break-after: always;
                }

                #printarea {
                    visibility: visible !important;
                    position: absolute !important;
                    z-index: 999;
                    margin: 8px;
                    top: 0;
                    left: 0;
                    border: 2px solid rgb(129, 63, 63);
                }
            }

            /* ini untuk ukuran a4 ketika print */
            @page {
                size: A4 landscape;
                margin: 0;
                padding: 16px;
            }

            /* sampe sini */
        </style>
    @endpush
    @push('scripts')
        <script src="{{ asset('assets/datatables/datatables.min.js') }}"></script>
        <script>
            $(document).ready(function() {
                $('#table').DataTable({
                    "pageLength": 50
                });
            });

            let print = () => {
                window.print();
            };
        </script>
    @endpush
