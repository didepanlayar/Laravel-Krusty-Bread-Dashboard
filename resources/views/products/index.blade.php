@extends('layouts.global')

@section('title') Produk @endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendors/jquery-toast-plugin/jquery.toast.min.css') }}">    
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">    
@endsection

@section('content')
<div class="content-wrapper">
    <!-- title -->
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Produk</h3>
                    <h6 class="font-weight-normal mb-0">Kelola semua produk.</h6>
                </div>
                <div class="col-12 col-xl-4">
                    <div class="justify-content-end d-flex">
                        <a href="{{ route('products.create') }}" class="btn btn-primary btn-icon-text" ><i class="ti-plus btn-icon-prepend"></i> Tambah Produk </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- title -->

    <!-- table -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="order-listing" class="table">
                                    <thead>
                                        <tr class="bg-primary text-white">
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Kategori</th>
                                            <th>Status</th>
                                            <th>Harga</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $index => $product)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $product->title }}</td>
                                                <td>{{ $product->category->title ?? '-' }}</td>
                                                <td>
                                                    @if($product->status == 'Available')
                                                        <span class="badge badge-success">Tersedia</span>
                                                    @else
                                                        <span class="badge badge-danger">Habis</span>
                                                    @endif
                                                </td>
                                                <td>{{ $product->default_price }}</td>
                                                <td class="text-end">
                                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-light"><i class="ti-pencil-alt text-success"></i> Ubah</a>
                                                    <form action="{{ route('products.destroy', [$product->id]) }}" method="POST" class="d-inline" id="delete-form-{{ $product->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-light" onclick="confirmation(event, {{ $product->id }})"><i class="ti-trash text-danger"></i> Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- table -->
</div>
@endsection

@section('scripts')
    <script src="{{ asset('dashboard/assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/data-table.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendors/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendors/jquery-toast-plugin/jquery.toast.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/toast-utils.js') }}"></script>
    @if(session('status'))
        <script>
            (function ($) {
                $(document).ready(function () {
                    'use strict';
                    resetToastPosition();
                    $.toast({
                        heading: 'Berhasil',
                        text: "{{ session('status') }}",
                        showHideTransition: 'slide',
                        icon: 'success',
                        loaderBg: '#f96868',
                        position: 'top-right'
                    });
                });
            })(jQuery);
        </script>
    @endif
    <script>
        // Confirmation for deletion
        function confirmation(event, productId) {
            event.preventDefault();
            swal({
                title: "Hapus produk?",
                text: "Produk ini akan dihapus secara permanen!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    document.getElementById('delete-form-' + productId).submit();
                }
            });
        }
    </script>
@endsection
