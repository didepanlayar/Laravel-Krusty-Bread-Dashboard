@extends('layouts.global')

@section('title') Pelanggan @endsection

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
                    <h3 class="font-weight-bold">Pelanggan</h3>
                    <h6 class="font-weight-normal mb-0">Kelola semua pelanggan.</h6>
                </div>
                <div class="col-12 col-xl-4">
                    <div class="justify-content-end d-flex">
                        <button type="button" class="btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#create-customer"><i class="ti-star btn-icon-prepend"></i> Tambah Customer </button>
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
                                            <th>WhatsApp</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($customers as $index => $customer)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $customer->name }}</td>
                                                <td>{{ $customer->phone }}</td>
                                                <td class="text-end">
                                                    <button type="button" class="btn btn-light btn-update-customer" data-bs-toggle="modal" data-bs-target="#update-customer" data-id="{{ $customer->id }}" data-name="{{ $customer->name }}" data-phone="{{ $customer->phone }}"><i class="ti-pencil-alt text-success"></i> Ubah</button>
                                                    <form action="{{ route('customers.destroy', [$customer->id]) }}" method="POST" class="d-inline" id="delete-form-{{ $customer->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-light" onclick="confirmation(event, {{ $customer->id }})"><i class="ti-trash text-danger"></i> Hapus</button>
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

    <!-- create-customer -->
    @include('customers.create')
    <!-- create-customer -->

    <!-- update-customer -->
    @include('customers.edit')
    <!-- update-customer -->

</div>
@endsection

@section('scripts')
    <script src="{{ asset('dashboard/assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/data-table.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendors/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendors/jquery-toast-plugin/jquery.toast.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/toast-utils.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/customers.js') }}"></script>
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
            // Show create customer modal
            @if($errors->has('name') || $errors->has('phone'))
                $('#create-customer').modal('show');
            @endif
            // Show update customer modal
            @if($errors->has('update_name') || $errors->has('update_phone'))
                $('#update-customer').modal('show');
            @endif
            // Remove error message when modal is closed
            // Enter the modal id with commas: '#create-customer, #update-customer'
            $('#update-customer').on('hidden.bs.modal', function () {
                $(this).find('.invalid-feedback').remove();
                $(this).find('.is-invalid').removeClass('is-invalid');
            });
        });
    </script>
@endsection
