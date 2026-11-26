@extends('layouts.master-without-nav')

@section('content')
@include('auth.partials.styles')

<div class="qdop-auth-wrapper">
    <div class="qdop-auth-box">
        <div class="card qdop-auth-card">
            <div class="card-inner card-inner-lg">
                <div class="brand-logo pb-3 text-center">
                    <a href="{{ url('/') }}" class="logo-link">
                        <img class="logo-dark logo-img" style="max-height: 42px;" src="{{ asset('assets/images/FMDQlogo.svg') }}" alt="FMDQ Logo">
                    </a>
                    <div class="qdop-auth-title mt-2">Q-Depository Onboarding Portal</div>
                </div>

                <div class="nk-block-head pb-3 text-center">
                    <h5 class="qdop-auth-subtitle">Reset Password</h5>
                    <p class="text-soft small mb-0">Enter your registered email and we will send you instructions to reset your password.</p>
                </div>

                <form method="POST" action="{{ route('auth.password.forgot.submit') }}">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="default-01">Email *</label>
                        <input type="email" name="email"
                            class="form-control form-control-lg @error('email') is-invalid @enderror"
                            value="{{ old('email') }}" id="default-01" placeholder="Enter your email address" required>
                        @error('email')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group pt-1">
                        <button class="btn btn-lg btn-primary btn-block" name="SUBMIT" id="submit" type="submit">
                            Send Password Reset Link
                        </button>
                    </div>
                </form>

                <div class="form-note-s2 text-center pt-3">
                    Return to <a class="link link-primary link-sm font-weight-bold" href="{{ route('login') }}">Login</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
