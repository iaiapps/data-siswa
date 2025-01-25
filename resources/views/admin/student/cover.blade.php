@extends('layouts.app')

@section('title', 'Data Induk Siswa')
@section('content')

    <a href="{{ url()->previous() }}" class="btn btn-primary mb-3">kembali</a>
    <button class="btn btn-primary mb-3" onclick="print()">print</button>
    <div id="printarea">
        <div class="area_a4">
            <div class="text-center border-box">
                <br><br>
                <img src="{{ asset('img/logosdit.png') }}" class="logo" alt="logo">
                <br><br>
                <p class="fs-4 text-center mb-2 fw-bold">LAPORAN <br>
                    HASIL PENCAPAIAN KOMPETENSI PESERTA DIDIK <br>
                    SEKOLAH DASAR (SD)</p>
                <div class="nbox">
                    <p class="fs-4 text-center mb-2">Nama Peserta Didik</p>
                    <p class="fs-4 text-center mb-2 "> <span
                            class="border border-1 border-black w-box fw-bold">{{ $student->name }}</span>
                    </p>
                    <br>
                    <p class="fs-4 text-center mb-2">NISN:</p>
                    <p class="fs-4 text-center mb-2"><span
                            class="border border-1 border-black w-box fw-bold">{{ $student->nisn }}</span> </p>
                </div>
                <br><br><br><br><br><br>
                <p class="fs-4 text-center mb-2 fw-bold">KEMENTERIAN PENDIDIKAN DASAR DAN MENENGAH <br> REPUBLIK INDONESIA
                </p>
            </div>
        </div>
        <div class="area_a4">
            <div class="border-box">
                <p class="fs-4 text-center fw-bold mt-2 mb-4">LAPORAN <br>
                    HASIL PENCAPAIAN KOMPETENSI PESERTA DIDIK <br>
                    SEKOLAH DASAR (SD)</p>
                <div class="px-4">
                    <table id="table" class="table align-middle">
                        <tbody>
                            <tr>
                                <td>Nama Sekolah </td>
                                <td>SDIT HARAPAN UMAT JEMBER</td>
                            </tr>
                            <tr>
                                <td>NPSN </td>
                                <td>20554128</td>
                            </tr>
                            <tr>
                                <td>Alamat Sekolah </td>
                                <td>Jl. Danau Toba Gg. Islamic Center Jember <br>68126</td>
                            </tr>
                            <tr>
                                <td>Desa/Kelurahan </td>
                                <td>Tegal Gede</td>
                            </tr>
                            <tr>
                                <td>Kecamatan </td>
                                <td>Sumbersari</td>
                            </tr>
                            <tr>
                                <td>Kabupaten/Kota</td>
                                <td>Jember</td>
                            </tr>
                            <tr>
                                <td>Provinsi</td>
                                <td>Jawa Timur</td>
                            </tr>
                            <tr>
                                <td>Website</td>
                                <td>https://sditharum.id/</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>harumjember@gmail.com</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="area_a4 mb-0">
            <div class="border-box">
                <p class="fs-4 text-center fw-bold mb-4 mt-2">IDENTITAS PESERTA DIDIK</p>
                <div class="px-4">
                    <table class="table table-sm align-middle">
                        <tbody>
                            <tr>
                                <td>Nama Peserta Didik</td>
                                <td>{{ $student->name }}</td>
                            </tr>
                            <tr>
                                <td>Nomor Induk</td>
                                <td>{{ $student->nis . ' - ' . $student->nisn }}</td>
                            </tr>
                            <tr>
                                <td>Tempat & Tanggal Lahir</td>
                                <td>{{ $student->birthplace }}, {{ $student->birthdate }}</td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>
                                    @if ($student->gender == 'L')
                                        Laki-laki
                                    @elseif($student->gender == 'P')
                                        Perempuan
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Agama</td>
                                <td>{{ $student->religion }}</td>
                            </tr>
                            <tr>
                                <td>Pendidikan Sebelumnya</td>
                                <td>TK</td>
                            </tr>
                            <tr>
                                <td>Alamat Peserta Didik</td>
                                <td>{{ $student->address }} | rt {{ $student->rt }} / rw {{ $student->rw }} |
                                    {{ $student->village }} | {{ $student->subdistrict }} |
                                    {{ $student->city }}|{{ $student->province }} </td>
                            </tr>
                            <tr>
                                <td>Nama Orang Tua</td>
                            </tr>
                            <tr>
                                <td>Ayah</td>
                                <td>{{ $student->studentparents->nama_ayah ?? 'belum ada data' }}</td>
                            </tr>
                            <tr>
                                <td>Ibu</td>
                                <td>{{ $student->studentparents->nama_ibu ?? 'belum ada data' }}</td>
                            </tr>
                            <tr>
                                <td>Pekerjaan Orang Tua</td>
                            </tr>
                            <tr>
                                <td>Ayah</td>
                                <td>{{ $student->studentparents->pekerjaan_ayah ?? 'belum ada data' }}</td>
                            </tr>
                            <tr>
                                <td>Ibu</td>
                                <td>{{ $student->studentparents->pekerjaan_ibu ?? 'belum ada data' }}</td>
                            </tr>
                            <tr>
                                <td>Alamat Orang Tua</td>
                            </tr>
                            <tr>
                                <td>Jalan</td>
                                <td>{{ $student->address }}</td>
                            </tr>
                            <tr>
                                <td>Kelurahan/Desa</td>
                                <td>{{ $student->village }}</td>
                            </tr>
                            <tr>
                                <td>Kecamatan</td>
                                <td>{{ $student->subdistrict }}</td>
                            </tr>
                            <tr>
                                <td>Kabupaten/Kota</td>
                                <td>{{ $student->city }}</td>
                            </tr>
                            <tr>
                                <td>Provinsi</td>
                                <td>{{ $student->province }}</td>
                            </tr>

                            <tr>
                                <td>Wali Peserta Didik</td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>{{ $student->studentparents->nama_wali ?? 'belum ada data' }}</td>
                            </tr>
                            <tr>
                                <td>Pekerjaan</td>
                                <td>{{ $student->studentparents->pekerjaan_wali ?? 'belum ada data' }}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>{{ $student->studentparents->alamat_wali ?? 'belum ada data' }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between mt-5 mb-0">
                        <div class="ms-5 pasfoto border border-1 border-black text-center">
                            @if (is_null($student->documents->where('type', 'profil')->first()))
                                <br><br>
                                <p>PAS FOTO</p>
                                <p>3x4 CM</p>
                            @else
                                <img src="{{ asset('storage/img-document/' . $student->documents->where('type', 'profil')->first()->file) }}"
                                    alt="img">
                            @endif
                        </div>
                        <div class="text-center me-5">
                            <p class="mb-2">Jember, ................................</p>
                            <p>Kepala Sekolah </p>
                            <br><br>
                            <p><u>Elly Nuzulianti, S.S.</u> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        td:nth-child(1) {
            width: 180px;
        }

        .nbox {
            padding-top: 10cm;
        }

        .area_a4 {
            width: 21cm;
            min-height: 29.7cm;
            padding: 1cm;
            margin: 1cm auto;
            border: 1px #D3D3D3 solid;
            border-radius: 5px;
            background: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .border-box {
            display: block;
            min-height: 29.7cm;
            border: 2px solid rgb(0, 0, 0);
        }

        .w-box {
            display: inline-block;
            width: 500px;
        }

        .logo {
            width: 120px;
        }

        .pasfoto {
            width: 3cm;
            height: 4cm;
        }

        @media print {
            body {
                visibility: hidden;
            }

            .nbox {
                padding-top: 8cm;
            }

            .area_a4 {
                width: 210mm !important;
                height: 297mm !important;
                margin: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                page-break-after: always;
            }

            .border-box {
                min-height: 100%;
                border: 2px solid rgb(0, 0, 0);

            }

            #printarea {
                visibility: visible !important;
                position: absolute !important;
                z-index: 999;
                margin: 8px;
                top: 0;
                left: 0;
                border: 2px solid rgb(255, 255, 255);
            }
        }

        /* ini untuk ukuran a4 ketika print */
        @page {
            size: A4;
            margin: 0;
            padding: 16px;
        }
    </style>
@endpush

@push('scripts')
    <script>
        let print = () => {
            window.print();
        }
    </script>
@endpush
