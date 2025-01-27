@extends('layouts.app')

@section('title', 'Data Induk Siswa')
@section('content')

    <a href="{{ url()->previous() }}" class="btn btn-primary mb-3">kembali</a>
    <button class="btn btn-primary mb-3" onclick="print()">print</button>
    <div id="printarea">
        <div class="area_a4 mb-0">
            {{-- <div class="border-box"> --}}
            {{-- <img src="{{ asset('img/logosdit.png') }}" class="logo" alt="logo"> --}}
            <p class="fs-4 text-center fw-bold mb-4">BUKU INDUK SISWA</p>
            <div>
                <table class="table table-sm align-middle table-borderless mb-2">
                    <tbody>
                        <tr>
                            <td class="tin">Nomor Induk</td>
                            <td> : {{ $student->nis }}</td>
                        </tr>
                        <tr>
                            <td class="tin">NISN</td>
                            <td>: {{ $student->nisn }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="px-4">
                <table class="table table-sm align-middle ">
                    1. Keterangan Identitas Siswa
                    <tbody>
                        <tr>
                            <td><span class="me-1">a.</span> Nama Peserta Didik</td>
                            <td> : {{ $student->name }}</td>
                        </tr>
                        <tr>
                            <td><span class="me-1">b.</span> Tempat & Tanggal Lahir</td>
                            <td>: {{ $student->birthplace }}, {{ $student->birthdate }}</td>
                        </tr>
                        <tr>
                            <td><span class="me-1">c.</span> Jenis Kelamin</td>
                            <td> :
                                @if ($student->gender == 'L')
                                    Laki-laki
                                @elseif($student->gender == 'P')
                                    Perempuan
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td><span class="me-1">d.</span> Status Anak</td>
                            <td>: {{ $student->childstatus }}</td>
                        </tr>
                        <tr>
                            <td><span class="me-1">e.</span> Jumlah Saudara</td>
                            <td>: {{ $student->siblings }}</td>
                        </tr>

                        <tr>
                            <td><span class="me-1">f.</span> Alamat Peserta Didik</td>
                            <td>: {{ $student->address }} | rt {{ $student->rt }} / rw {{ $student->rw }} |
                                {{ $student->village }} | {{ $student->subdistrict }} |
                                {{ $student->city }}|{{ $student->province }} </td>
                        </tr>
                        <tr>
                            <td><span class="me-1">g.</span> Tinggal Bersama</td>
                            <td>: {{ $student->living }}</td>
                        </tr>
                        <tr>
                            <td><span class="me-1">h.</span> Agama</td>
                            <td>: {{ $student->religion }}</td>
                        </tr>
                        <tr>
                            <td><span class="me-1">i.</span> Warga Negara</td>
                            <td>: {{ $student->citizenship }}</td>
                        </tr>
                        <tr>
                            <td><span class="me-1">j.</span> Bahasa sehari-hari</td>
                            <td>: {{ $student->language }}</td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-sm align-middle ">
                    2. Keterangan Identitas Orang Tua/Wali
                    <tbody>
                        <tr>
                            <td><span class="me-1">a.</span> Nama Ayah</td>
                            <td>: {{ $student->studentparents->nama_ayah ?? 'belum ada data' }}</td>
                        </tr>
                        <tr>
                            <td><span class="me-1">b.</span> Pendidikan Terakhir</td>
                            <td>: {{ $student->studentparents->pendidikan_ayah ?? 'belum ada data' }}</td>
                        </tr>
                        <tr>
                            <td><span class="me-1">c.</span> Pekerjaan Ayah</td>
                            <td>: {{ $student->studentparents->pekerjaan_ayah ?? 'belum ada data' }}</td>
                        </tr>
                        <tr>
                            <td><span class="me-1">d.</span> Nomor HP</td>
                            <td>: {{ $student->studentparents->hp_ayah ?? 'belum ada data' }}</td>
                        </tr>
                        <tr>
                            <td><span class="me-1">e.</span> Nama Ibu</td>
                            <td>: {{ $student->studentparents->nama_ibu ?? 'belum ada data' }}</td>
                        </tr>
                        <tr>
                            <td><span class="me-1">f.</span> Pendidikan Terakhir</td>
                            <td>: {{ $student->studentparents->pendidikan_ibu ?? 'belum ada data' }}</td>
                        </tr>
                        <tr>
                            <td><span class="me-1">g.</span> Pekerjaan Ayah</td>
                            <td>: {{ $student->studentparents->pekerjaan_ibu ?? 'belum ada data' }}</td>
                        </tr>
                        <tr>
                            <td><span class="me-1">h.</span> Nomor HP</td>
                            <td>: {{ $student->studentparents->hp_ibu ?? 'belum ada data' }}</td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-sm align-middle ">
                    3. Wali Peserta didik
                    <tbody>
                        <tr>
                            <td><span class="me-1">a.</span> Nama</td>
                            <td>: {{ $student->studentparents->nama_wali ?? 'belum ada data' }}</td>
                        </tr>
                        <tr>
                            <td><span class="me-1">b.</span> Hubungan Keluarga</td>
                            <td>: {{ $student->studentparents->hubungan_keluarga ?? 'belum ada data' }}</td>
                        </tr>
                        <tr>
                            <td><span class="me-1">c.</span> Hubungan Pekerjaan</td>
                            <td>: {{ $student->studentparents->pendidikan_wali ?? 'belum ada data' }}</td>
                        </tr>
                        <tr>
                            <td><span class="me-1">d.</span> Alamat</td>
                            <td>: {{ $student->studentparents->pekerjaan_wali ?? 'belum ada data' }}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="mt-4 mb-0 clearfix">
                    {{-- <div class="ms-5 pasfoto border border-1 border-black text-center">
                        <br><br>
                        <p>PAS FOTO</p>
                        <p>3x4 CM</p>
                    </div> --}}
                    <div class="text-center me-5 float-end">
                        <p class="mb-2">Jember, ................................</p>
                        <p>Kepala Sekolah </p>
                        <br><br>
                        <p><u>Elly Nuzulianti, S.S.</u> </p>
                    </div>
                </div>
            </div>
            {{-- </div> --}}
        </div>
        {{-- lembar dua --}}
        <div class="area_a4 mb-0">
            <div class="px-4">
                <table class="table table-sm align-middle ">
                    4. Keadaan Jasmani
                    <tbody>
                        <tr>
                            <td><span class="me-1">a.</span> Tinggi Badan</td>
                            <td> : {{ $student->height }}</td>
                        </tr>
                        <tr>
                            <td><span class="me-1">b.</span> Berat Badan</td>
                            <td>: {{ $student->weight }}</td>
                        </tr>
                        <tr>
                            <td><span class="me-1">c.</span> Golongan Darah</td>
                            <td> {{ $student->blood }} </td>
                        </tr>
                        <tr>
                            <td><span class="me-1">d.</span> Riwayat Penyakit</td>
                            <td>: {{ $student->medical }}</td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-sm align-middle ">
                    Perkembangan Siswa
                    <tbody>
                        <tr>
                            <td colspan="2">A. Masuk Menjadi Siswa Baru</td>
                        </tr>
                        <tr>
                            <td><span class="me-1">1.</span> Pendidikan Sebelumnya</td>
                            <td>: {{ $student->studentschools->siswa_baru_pendidikan_sebelumnya ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td><span class="me-1">2.</span> Nama Sekolah</td>
                            <td>: {{ $student->studentschools->siswa_baru_nama_sekolah ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td><span class="me-1">3.</span> Alamat</td>
                            <td>: {{ $student->studentschools->siswa_baru_alamat_sekolah ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="pt-3">B. Pendidikan dari sekolah lain</td>
                        </tr>
                        <tr>
                            <td><span class="me-1">1.</span>Nama Sekolah Asal </td>
                            <td>: {{ $student->studentschools->siswa_pindahan_nama_sekolah_asal ?? '-' }} </td>
                        </tr>
                        <tr>
                            <td><span class="me-1">2.</span>Dari Kelas</td>
                            <td>: {{ $student->studentschools->siswa_pindahan_dari_kelas ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td><span class="me-1">3.</span>Diteriama Tanggal</td>
                            <td>: {{ $student->studentschools->siswa_pindahan_diterima_tanggal ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td><span class="me-1">4.</span>Di Kelas</td>
                            <td>: {{ $student->studentschools->siswa_pindahan_di_kelas ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="pt-3">C. Laporan Hasil Pencapaian Kompetensi Peserta Didik
                                (Terlampir)</td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-sm align-middle ">
                    6. BEASISWA
                    <tbody>
                        <tr>
                            <td><span class="me-1">a.</span> Jenis Beasiswa</td>
                            <td>: {{ $student->studentschools->beasiswa ?? '-' }}</td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-sm align-middle ">
                    7. MENINGGALKAN SEKOLAH
                    <tbody>
                        <tr>
                            <td colspan="2">A. Tamat Belajar</td>
                        </tr>
                        <tr>
                            <td><span class="me-1">1.</span> Tahun/No STTB Ijazah</td>
                            <td>: {{ $student->studentschools->lulus_no_ijazah ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td><span class="me-1">2.</span> Melanjutkan sekolah di</td>
                            <td>: {{ $student->studentschools->lulus_lanjut_sekolah ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="pt-3">B. Pindah Sekolah</td>
                        </tr>
                        <tr>
                            <td><span class="me-1">1.</span> Dari Kelas</td>
                            <td>: {{ $student->studentschools->pindah_sekolah_dari_kelas ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td><span class="me-1">2.</span> Ke Sekolah</td>
                            <td>: {{ $student->studentschools->pindah_sekolah_ke_sekolah ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td><span class="me-1">3.</span> Ke Kelas</td>
                            <td>: {{ $student->studentschools->pindah_sekolah_ke_kelas ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td><span class="me-1">4.</span> Alasan</td>
                            <td>: {{ $student->studentschools->pindah_sekolah_alasan ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="pt-3">C. Keluar Sekolah</td>
                        </tr>
                        <tr>
                            <td><span class="me-1">1.</span> Tanggal</td>
                            <td>: {{ $student->studentparents->keluar_sekolah_tanggal ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td><span class="me-1">2.</span> Alasan</td>
                            <td>: {{ $student->studentparents->keluar_sekolah_tanggal ?? '-' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            {{-- </div> --}}
        </div>
    </div>
@endsection

@push('css')
    <style>
        td {
            background-color: #ffffff !important;
            padding: 3px 4px !important;
        }

        td:nth-child(1) {
            width: 200px;
            padding-left: 16px;
        }

        .tin {
            width: 120px !important;
        }

        .area_a4 {
            width: 21cm !important;
            min-height: 29.7cm !important;
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
