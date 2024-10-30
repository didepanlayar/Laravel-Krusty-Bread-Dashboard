@extends('layouts.global')

@section('title') Tambah Karyawan @endsection

@section('content')
<div class="content-wrapper">
    <!-- title -->
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Tambah Karyawan</h3>
                    <h6 class="font-weight-normal">Tambah karyawan untuk kelola penjualan.</h6>
                </div>
            </div>
        </div>
    </div>
    <!-- title -->

    <!-- form -->
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Form Data Karyawan</h4>
                    <p class="card-description"> Lengkapi data karyawan. </p>
                    <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col">
                                <label>Nama Lengkap</label>
                                <div id="name">
                                    <input class="typeahead @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name') }}" placeholder="John Doe">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <label>Username</label>
                                <div id="username">
                                    <input class="typeahead @error('username') is-invalid @enderror" type="text" name="username" id="username" value="{{ old('username') }}" placeholder="johndoe">
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <label>Email</label>
                                <div id="email">
                                    <input class="typeahead @error('email') is-invalid @enderror" type="text" name="email" id="email" value="{{ old('email') }}" placeholder="johndoe@email.com">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <label>WhatsApp</label>
                                <div id="phone">
                                    <input class="typeahead @error('phone') is-invalid @enderror" type="text" name="phone" id="phone" value="{{ old('phone') }}" placeholder="08123456789">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label>Peran</label>
                            <div class="col-md-3">
                                <div id="owner">
                                    <div class="form-check">
                                        <label class="form-check-label"><input type="radio" class="form-check-input @error('roles') is-invalid @enderror" name="roles" id="owner" value="Owner"> Pemilik </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div id="staff">
                                    <div class="form-check">
                                        <label class="form-check-label"><input type="radio" class="form-check-input @error('roles') is-invalid @enderror" name="roles" id="staff" value="Staff"> Staf </label>
                                    </div>
                                </div>
                            </div>
                            @error('roles')
                                <span class="invalid-feedback" style="display: block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <label>Password</label>
                                <div id="password">
                                    <input class="typeahead @error('password') is-invalid @enderror" type="password" name="password" id="password" placeholder="*******">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <label>Konfirmasi Password</label>
                                <div id="password-confirmation">
                                    <input class="typeahead @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation" id="password_confirmation" placeholder="********">
                                    @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <a href="{{ route('users.index') }}" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- form -->
</div>
@endsection
