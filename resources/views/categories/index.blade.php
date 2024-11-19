@extends('layouts.global')

@section('title') Kategori @endsection

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
                    <h3 class="font-weight-bold">Kategori</h3>
                    <h6 class="font-weight-normal mb-0">Kelola semua kategori.</h6>
                </div>
                <div class="col-12 col-xl-4">
                    <div class="justify-content-end d-flex">
                        <button type="button" class="btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#create-category"><i class="ti-plus btn-icon-prepend"></i> Tambah Kategori </button>
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
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $index => $category)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $category->title }}</td>
                                                <td class="text-end">
                                                    <button type="button" class="btn btn-light btn-update-category" data-bs-toggle="modal" data-bs-target="#update-category" data-id="{{ $category->id }}" data-title="{{ $category->title }}"><i class="ti-pencil-alt text-success"></i> Ubah</button>
                                                    <form action="{{ route('categories.destroy', [$category->id]) }}" method="POST" class="d-inline" id="delete-form-{{ $category->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-light" onclick="confirmation(event, {{ $category->id }})"><i class="ti-trash text-danger"></i> Hapus</button>
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

    <!-- create-category -->
    @include('categories.create')
    <!-- create-category -->

    <!-- update-category -->
    @include('categories.edit')
    <!-- update-category -->
</div>
@endsection

@section('scripts')
    <script src="{{ asset('dashboard/assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/data-table.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendors/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendors/jquery-toast-plugin/jquery.toast.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/toast-utils.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/categories.js') }}"></script>
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
        $(document).ready(function() {
            // Show create category modal
            @if($errors->has('title'))
                $('#create-category').modal('show');
            @endif
            // Show update category modal
            @if($errors->has('update_title'))
                $('#update-category').modal('show');
            @endif
            // Remove error message when modal is closed
            // Enter the modal id with commas: '#create-category, #update-category'
            $('#update-category').on('hidden.bs.modal', function () {
                $(this).find('.invalid-feedback').remove();
                $(this).find('.is-invalid').removeClass('is-invalid');
            });
        });
    </script>
@endsection
