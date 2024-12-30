@extends('layouts.app')

@section('title', 'Data Induk Siswa')
@section('content')

    <button class="btn btn-primary mb-3" onclick="print()">print</button>
    <div class="bg-white p-3" id="printarea">
        <div class="area_a4 p-5">
            <div class="text-center border-box p-5">
                <br>
                <img src="{{ asset('img/logosdit.png') }}" class="logo" alt="logo">
                <br><br>
                <p class="fs-4 text-center mb-2 fw-bold">LAPORAN <br>
                    HASIL PENCAPAIAN KOMPETENSI PESERTA DIDIK <br>
                    SEKOLAH DASAR (SD)</p>
                <br><br><br><br><br><br><br><br>
                <p class="fs-4 text-center mb-2">Nama Peserta Didik</p>
                <p class="fs-4 text-center mb-2 "> <span
                        class="border border-1 border-black w-box fw-bold">{{ $student->name }}</span>
                </p>
                <br>
                <p class="fs-4 text-center mb-2">NISN:</p>
                <p class="fs-4 text-center mb-2"><span
                        class="border border-1 border-black w-box fw-bold">{{ $student->nisn }}</span> </p>
                <br><br><br><br><br><br><br><br><br>
                <p class="fs-4 text-center mb-2 fw-bold">KEMENTERIAN PENDIDIKAN DASAR DAN MENENGAH <br> REPUBLIK INDONESIA
                </p>
            </div>

        </div>
        <div class="area_a4 p-5">
            <div class="border-box">
                <p class="fs-4 text-center fw-bold mt-2 mb-4">LAPORAN <br>
                    HASIL PENCAPAIAN KOMPETENSI PESERTA DIDIK <br>
                    SEKOLAH DASAR (SD)</p>
                <div class="px-5">
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
        <div class="area_a4 p-5">
            <div class="border-box">
                <p class="fs-4 text-center fw-bold mb-4 mt-2">IDENTITAS PESERTA DIDIK</p>
                <div class="px-5">
                    <table class="table table-sm ">
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
                    <div class="clearfix d-flex">
                        <div class="pasfoto border border-1 border-black">
                            <p>PAS FOTO</p>
                            <p>3x4 CM</p>
                        </div>
                        <div class="text-center float-end me-5 mt-3">
                            <p class="mb-0">Jember, .......................</p>
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
        .logo {
            width: 120px;
        }

        .area_a4 {
            width: 210mm;
            height: 297mm;
            border: 1px solid rgb(231, 92, 92);
        }

        .border-box {
            height: 100%;
            border: 2px solid rgb(0, 0, 0);
        }

        .w-box {
            display: inline-block;
            width: 500px;

        }

        .pasfoto {
            width: 3cm;
            height: 4cm;
        }

        @media print {
            body {
                visibility: hidden;
                background-color: white !important;
            }

            .area_a4 {
                width: 210mm;
                height: 297mm;
            }

            #printarea {
                visibility: visible !important;
                position: absolute !important;
                top: 0;
                left: 0;
                border: 2px solid rgb(255, 255, 255);
            }
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
