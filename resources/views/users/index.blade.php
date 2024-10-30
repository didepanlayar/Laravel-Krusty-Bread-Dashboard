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
                        <a href="{{ route('users.create') }}" class="btn btn-primary btn-icon-text"><i class="ti-user btn-icon-prepend"></i> Tambah Karyawan </a>
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
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                            <th>WhatsApp</th>
                                            <th>Email</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ json_decode($user->roles) }}</td>
                                                <td>{{ $user->phone }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    <a href="{{ route('users.edit', [$user->id]) }}" class="btn btn-light"><i class="ti-pencil-alt text-success"></i> Ubah</a>
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
        function confirmation(event, userId) {
            event.preventDefault();
            swal({
                title: "Hapus data karyawan?",
                text: "Data karyawan ini akan dihapus secara permanen!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    document.getElementById('delete-form-' + userId).submit();
                }
            });
        }
    </script>
@endsection
