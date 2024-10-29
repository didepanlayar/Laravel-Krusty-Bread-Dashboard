@extends('layouts.app')

@section('title') Reset Password @endsection

@section('content')
<div class="content-wrapper d-flex align-items-center auth px-0">
    <div class="row w-100 mx-0">
        <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <div class="brand-logo text-center">
                    <img src="{{ asset('dashboard/assets/images/logo.svg') }}" alt="logo">
                </div>
                <div class="text-center">
                    <h4>Reset Password</h4>
                    <h6 class="font-weight-light">Enter your email to send password reset link.</h6>
                </div>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('password.email') }}" class="pt-3">
                    @csrf
                    <div class="form-group">
                        <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email Adress" value="{{ old('email') }}" required autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mt-3 d-grid gap-2">
                        <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">{{ __('Send Password Reset Link') }}</button>
                    </div>
                    <div class="my-2 text-center">
                        <a href="{{ route('login') }}" class="auth-link text-black">{{ __('Have a account?') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
