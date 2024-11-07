@extends('layouts.global')

@section('title') Karyawan @endsection

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
                    <h3 class="font-weight-bold">Karyawan</h3>
                    <h6 class="font-weight-normal mb-0">Kelola semua karyawan.</h6>
                </div>
                <div class="col-12 col-xl-4">
                    <div class="justify-content-end d-flex">
                        <button type="button" class="btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#create-user"><i class="ti-user btn-icon-prepend"></i> Tambah Karyawan </button>
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
                                            <th>Jabatan</th>
                                            <th>WhatsApp</th>
                                            <th>Email</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $index => $user)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ json_decode($user->roles) }}</td>
                                                <td>{{ $user->phone }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-light btn-update-user" data-bs-toggle="modal" data-bs-target="#update-user" data-id="{{ $user->id }}" data-name="{{ $user->name }}" data-username="{{ $user->username }}" data-email="{{ $user->email }}" data-phone="{{ $user->phone }}"  data-roles="{{ $user->roles }}"><i class="ti-pencil-alt text-success"></i> Ubah</button>
                                                    <form action="{{ route('users.destroy', [$user->id]) }}" method="POST" class="d-inline" id="delete-form-{{ $user->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-light" onclick="confirmation(event, {{ $user->id }})"><i class="ti-trash text-danger"></i> Hapus</button>
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

    <!-- create-user -->
    @include('users.create')
    <!-- create-user -->

    <!-- update-user -->
    @include('users.edit')
    <!-- update-user -->

</div>
@endsection

@section('scripts')
    <script src="{{ asset('dashboard/assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/data-table.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendors/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendors/jquery-toast-plugin/jquery.toast.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/toast-utils.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/users.js') }}"></script>
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
            // Show create user modal
            @if($errors->has('name') || $errors->has('username') || $errors->has('email') || $errors->has('phone') || $errors->has('roles') || $errors->has('password') || $errors->has('password_confirmation'))
                $('#create-user').modal('show');
            @endif
            // Show update user modal
            @if($errors->has('update_name') || $errors->has('update_username') || $errors->has('update_phone') || $errors->has('update_roles'))
                $('#update-user').modal('show');
            @endif
            // Remove error message when modal is closed
            // Enter the modal id with commas: '#create-user, #update-user'
            $('#update-user').on('hidden.bs.modal', function () {
                $(this).find('.invalid-feedback').remove();
                $(this).find('.is-invalid').removeClass('is-invalid');
            });
        });
    </script>
@endsection
