@extends('layouts.global')

@section('title') Beranda @endsection

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Halo, {{ Auth::user()->name }}!</h3>
                    <h6 class="font-weight-normal mb-0">Dapatkan semua laporan penjualan disini.</h6>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
