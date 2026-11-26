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
                    <h5 class="qdop-auth-subtitle">Sign-In</h5>
                    <p class="text-soft small mb-0">Access your onboarding dashboard with your credentials.</p>
                </div>

                @if (session('unverified_email'))
                    <div class="alert alert-warning p-3 mb-3" style="border-radius: 8px; border-left: 4px solid #ad8e4f;">
                        <p class="small mb-2">
                            Your email <strong>{{ session('unverified_email') }}</strong> is not verified yet. Didn't receive the link?
                        </p>
                        <form method="POST" action="{{ route('auth.verify.resend') }}" class="m-0">
                            @csrf
                            <input type="hidden" name="email" value="{{ session('unverified_email') }}">
                            <button type="submit" class="btn btn-sm btn-outline-primary">
                                <em class="icon ni ni-mail mr-1"></em>Resend Verification Email
                            </button>
                        </form>
                    </div>
                @endif

                <form method="POST" action="{{ route('auth.login.validate') }}" id="ordersubmitform">
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

                    <div class="form-group">
                        <div class="form-label-group">
                            <label class="form-label" for="password">Password *</label>
                            @if (Route::has('password.request'))
                                <a class="link link-primary link-sm" tabindex="-1" href="{{ route('auth.password.forgot') }}">Forgot Password?</a>
                            @endif
                        </div>
                        <div class="form-control-wrap">
                            <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                            </a>
                            <input type="password" name="password"
                                class="form-control form-control-lg @error('password') is-invalid @enderror"
                                id="password" placeholder="Enter your password" required>
                            @error('password')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group pt-1">
                        <button class="btn btn-lg btn-primary btn-block" name="SUBMIT" id="submit" type="submit">
                            Sign in
                        </button>
                    </div>
                </form>

                <div class="form-note-s2 text-center pt-3">
                    New on our platform? <a class="link link-primary link-sm font-weight-bold" href="{{ route('register') }}">Click here to register</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
