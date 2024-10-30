@extends('layouts.app')

@section('title') Login @endsection

@section('content')
<div class="content-wrapper d-flex align-items-center auth px-0">
    <div class="row w-100 mx-0">
        <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <div class="brand-logo text-center">
                    <img src="{{ asset('dashboard/assets/images/logo.svg') }}" alt="logo">
                </div>
                <div class="text-center">
                    <h4>Hello! Let's get started</h4>
                    <h6 class="font-weight-light">Sign in to continue.</h6>
                </div>
                <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}" class="pt-3">
                    @csrf
                    <div class="form-group">
                        <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email Adress" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mt-3 d-grid gap-2">
                        <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">{{ __('SIGN IN') }}</button>
                    </div>
                    <div class="my-2 d-flex justify-content-between align-items-center">
                        <div class="form-check">
                            <label class="form-check-label text-muted"> <input type="checkbox" class="form-check-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Keep me signed in') }}</label>
                        </div>
                        <a href="{{ route('password.request') }}" class="auth-link text-black">{{ __('Forgot password?') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
