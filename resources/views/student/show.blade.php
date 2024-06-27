@extends('layouts.app')

@section('title', 'Preview')

@section('content')
    <div>
        <a class="btn btn-primary mb-3" href="{{ route('home') }}">kembali</a>
        <div class="text-center">
            <h4 class="fw-bold">Preview Ijazah SDIT Harapan Umat Jember.</h4>
            <h5 class>Tahun Ajaran 2023/2024</h5>
            <hr>
        </div>
        <div class="card">
            <div class="row">
                <div class="col-md-3 col-12 ">
                    <div class="p-3">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                {{ $message }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <p> Data berikut berdasarkan akte ananda, jika sudah <b>benar</b> klik tombol
                            <b>tanda tangan</b> lalu klik tombol <b> verifikasi</b>
                        </p>
                        <p> jika terdapat <b>data yang berbeda</b> hubungi wali kelas </p>
                        <hr>
                        @if ($student->ttd != null)
                            <img src="{{ asset('storage/upload/' . $student->ttd->image) }}" alt="ttd"
                                class="img-fluid">
                        @else
                            <div class="text-center">
                                <small>belum ttd</small>
                            </div>
                        @endif
                        <hr />
                        @if ($student->ttd == null)
                            <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal"
                                data-bs-target="#ttd">
                                Tanda Tangan
                            </button>
                        @else
                            <button type="button" class="btn btn-secondary w-100" disabled data-bs-toggle="modal"
                                data-bs-target="#ttd">
                                Sudah Tanda Tangan
                            </button>
                        @endif
                        <hr>
                        {{-- @dd($student->ttd) --}}
                        @if ($student->isVerified == null && $student->isVerified == 0)
                            @if ($student->ttd != null || $student->ttd != 0)
                                <button class="btn btn-primary w-100" data-bs-toggle="modal"
                                    data-bs-target="#verify">Verifikasi
                                    Ijazah</button>
                            @else
                                <button class="btn btn-secondary w-100" data-bs-toggle="modal" data-bs-target="#verify"
                                    disabled>Verifikasi
                                    Ijazah</button>
                            @endif
                        @else
                            <button class="btn btn-secondary w-100" data-bs-toggle="modal" data-bs-target="#verify"
                                disabled>Sudah Verifikasi
                                Ijazah</button>
                        @endif
                        <hr />
                        <div>
                            <p class="fw-bold">Catatan Persetujuan</p>
                            <p>
                                Jika dikemudian hari terdapat
                                <b>kesalahan atau perubahan data</b> setelah verifikasi dilakukan, maka resiko
                                <b>ditanggung Orang Tua / Wali</b> siswa-siswi yang bersangkutan.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-12">
                    <div class="mb-3">
                        <div class="cardijazah">
                            <img class="imgijazah " src="{{ asset('img/ifront.png') }}" alt="ifront">
                            <div class="text sekolah1">SD Islam Terpadu </div>
                            <div class="text sekolah2">Harapan Umat Jember </div>
                            <div class="text npsn">20554128</div>
                            <div class="text kab">Jember</div>
                            <div class="text prov">Jawa Timur</div>
                            <div class="text nama text-uppercase">{{ $student->full_name }}</div>
                            <div class="text ttl">{{ $student->place_of_birth }}, {{ $student->date_of_birth }}</div>
                            <div class="text ortu">{{ $student->parents_name }}</div>
                            <div class="text nis">{{ $student->nis }}</div>
                            <div class="text nisn">{{ $student->nisn }}</div>
                            <div class="text sekolah3">SD Islam Terpadu Harapan Umat Jember</div>
                            <div class="text nomor">421.2/65/310.03.20554128/2024</div>
                            <div class="text tanggal">Kab. Jember, 11 Juni </div>
                            <div class="text kepsek">Elly Nuzulianti S.S</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        @include('student.ttd')
        @include('student.verify')
    </div>

@endsection

@push('css')
    <style>
        .cardijazah {
            width: 100%;
            overflow: auto;
            position: relative;
        }

        .imgijazah {
            width: 844px;
            height: 100%;
            overflow-x: auto;
        }

        .text {
            white-space: nowrap;
            position: absolute;
            font-weight: normal;
        }

        .sekolah1 {
            top: 390px;
            left: 440px;
        }

        .sekolah2 {
            top: 415px;
            left: 140px;
        }

        .npsn {
            top: 445px;
            left: 370px;
        }

        .kab {
            top: 470px;
            left: 260px;
        }

        .prov {
            top: 500px;
            left: 200px;
        }

        .nama {
            top: 525px;
            left: 370px;
        }

        .ttl {
            top: 550px;
            left: 370px;
        }

        .ortu {
            top: 576px;
            left: 370px;
        }

        .nis {
            top: 604px;
            left: 370px;
        }

        .nisn {
            top: 632px;
            left: 370px;
        }

        .sekolah3 {
            top: 772px;
            left: 360px;
        }

        .nomor {
            top: 800px;
            left: 190px;
        }

        .tanggal {
            top: 910px;
            left: 500px;
        }

        .kepsek {
            top: 1020px;
            left: 520px;
        }
    </style>
@endpush
