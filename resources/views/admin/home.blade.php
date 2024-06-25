@extends('layouts.app')
@section('title', 'Home')

@section('content')


    <div class="card">
        <div class="card-body text-center">
            <p class="fs-5 ">Selamat datang "Admin" di </p>
            <p class="fs-4 mb-0 ">Aplikasi verifikasi ijazah SDIT Harapan Umat Jember </p>
        </div>
    </div>

    <div class="row mt-3 align-items-center justify-content-center">
        <div class="col-md-6 col-12">
            <div class="card p-3">
                <div class="row h-100">
                    <div class="col-9">
                        <div class="d-flex align-items-center h-100 justify-content-center">
                            <i class="bi bi-check-circle fs-3 me-3"></i>
                            <p class="mb-0 fs-5">Yang sudah Verifikasi</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center col-3 h-100">
                        <button class="btn btn-primary px-3 fs-4"> {{ $verified->count() }} </button>
                    </div>
                </div>
            </div>
        </div>
    </div>





@endsection
