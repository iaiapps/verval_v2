@extends('layouts.app')

@section('title', 'Preview')

@section('content')
    <div id="printarea">
        <div class="printhidden">
            <a class="btn btn-primary mb-3">kembali</a>
            <div class="text-center">
                <h4 class="fw-bold">Preview Nilai Ijazah SDIT Harapan Umat Jember.</h4>
                <h5 class>Tahun Ajaran 2023/2024</h5>
                <hr>
            </div>
        </div>
        <div class="card">
            <div class="row">
                <div class="col-md-3 col-12 printhidden">
                    <div class="p-3">
                        <p> Data berikut berdasarkan nilai yang sudah dihimpun dari wali kelas
                        </p>
                        <p> jika terdapat <b>data yang berbeda</b> hubungi wali kelas </p>
                        <hr />
                        <button type="button" class="btn btn-primary w-100" onclick="print()">Print NIlai</button>
                        <hr>
                    </div>
                </div>
                <div class="col-md-9 col-12">
                    <div class="mb-3">
                        <div class="cardijazah">
                            <img class="imgijazah " src="{{ asset('img/iback.png') }}" alt="ifront">
                            <div class="text nama text-uppercase">{{ $score->student->full_name }}</div>
                            <div class="text ttl">{{ $score->student->place_of_birth }},
                                {{ $score->student->date_of_birth }}
                            </div>
                            <div class="text nis">{{ $score->student->nis }}</div>
                            <div class="text nisn">{{ $score->student->nisn }}</div>
                            <div class="text a1">{{ $score->a1 }}</div>
                            <div class="text a2">{{ $score->a2 }}</div>
                            <div class="text a3">{{ $score->a3 }}</div>
                            <div class="text a4">{{ $score->a4 }}</div>
                            <div class="text a5">{{ $score->a5 }}</div>
                            <div class="text a6">{{ $score->a6 }}</div>
                            <div class="text b1">{{ $score->b1 }}</div>
                            <div class="text b2">{{ $score->b2 }}</div>

                            {{-- mulok --}}
                            <div class="text textb3a">Bahasa Jawa</div>
                            <div class="text textb3b">Baca Tulis Al Quran</div>
                            <div class="text b3a">{{ $score->b3a }}</div>
                            <div class="text b3a">{{ $score->b3a }}</div>
                            <div class="text b3b">{{ $score->b3b }}</div>
                            {{-- <div class="text b3c">{{ $score->b3c }}</div> --}}
                            <div class="text r">{{ $score->r }}</div>

                            {{-- <div class="text sekolah">SDIT Harapan Umat Jember</div> --}}

                            <div class="text tanggal">Kab. Jember, 11 Juni </div>
                            <div class="text kepsek">Elly Nuzulianti S.S</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
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
            font-weight: 500;
        }

        .nama {
            top: 190px;
            left: 315px;
        }

        .ttl {
            top: 215px;
            left: 315px;
        }

        .nis {
            top: 242px;
            left: 315px;
        }

        .nisn {
            top: 267px;
            left: 315px;
        }

        .a1 {
            top: 367px;
            left: 675px;
        }

        .a2 {
            top: 391px;
            left: 675px;
        }

        .a3 {
            top: 415px;
            left: 675px;
        }

        .a4 {
            top: 438px;
            left: 675px;
        }

        .a5 {
            top: 462px;
            left: 675px;
        }

        .a6 {
            top: 485px;
            left: 675px;
        }

        .b1 {
            top: 530px;
            left: 675px;
        }

        .b2 {
            top: 555px;
            left: 675px;
        }

        .textb3a {
            top: 603px;
            left: 175px;
        }

        .textb3b {
            top: 626px;
            left: 175px;
        }

        .b3a {
            top: 603px;
            left: 675px;
        }

        .b3b {
            top: 626px;
            left: 675px;
        }

        .b3c {
            top: 648px;
            left: 675px;
        }

        .r {
            top: 673px;
            left: 675px;
        }

        .tanggal {
            top: 717px;
            left: 520px;
        }

        /* .sekolah {
                                                                                top: 752px;
                                                                                left: 534px;
                                                                            } */

        .kepsek {
            top: 831px;
            left: 550px;
        }

        /* print */
        @media print {
            body {
                visibility: hidden;
                margin: 0 !important;
                padding: 0 !important;
                background-color: white !important
            }

            .printhidden {
                display: none;
                visibility: hidden;
            }

            #printarea {
                visibility: visible !important;
                position: absolute !important;
                display: block;
                left: 0;
                right: 0;
                top: 0;
                margin: 0 !important;
                padding: 0 !important;
                width: 100%;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        print() {
            window.print();
        },
    </script>
@endpush
