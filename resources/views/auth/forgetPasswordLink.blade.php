@extends('layouts.master-without-nav')

@section('content')
@include('auth.partials.styles')

<div class="qdop-auth-wrapper" style="padding: 1.5rem 1rem;">
    <div class="qdop-auth-box wide">
        <div class="card qdop-auth-card">
            <div class="card-inner card-inner-lg" style="padding: 1.75rem 2rem;">
                <div class="brand-logo pb-2 text-center">
                    <a href="{{ url('/') }}" class="logo-link">
                        <img class="logo-dark logo-img" style="max-height: 36px;" src="{{ asset('assets/images/FMDQlogo.svg') }}" alt="FMDQ Logo">
                    </a>
                    <div class="qdop-auth-title mt-1">Q-Depository Onboarding Portal</div>
                </div>

                <div class="nk-block-head pb-3 text-center">
                    <h5 class="qdop-auth-subtitle mb-0">Reset Password</h5>
                    <p class="text-soft small mb-0">Choose a new password for your account.</p>
                </div>

                <form method="POST" action="{{ route('auth.password.reset.submit') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="row g-3">

                        <div class="col-md-6">
                            <div class="form-group mb-0">
                                <label class="form-label" for="password">Password *</label>
                                <div class="form-control-wrap">
                                    <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                                        <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                        <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                    </a>
                                    <input type="password" name="password" id="password"
                                        class="form-control form-control-lg @error('password') is-invalid @enderror"
                                        placeholder="Enter new password" required>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-0">
                                <label class="form-label" for="confirm_password">Confirm Password *</label>
                                <div class="form-control-wrap">
                                    <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch" data-target="confirm_password">
                                        <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                        <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                    </a>
                                    <input type="password" name="password_confirmation" id="confirm_password"
                                        class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror"
                                        placeholder="Confirm new password" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="qdop-policy-box py-2 px-3 mb-0">
                                <span class="small font-weight-bold" style="color: #22346c;">Password Policy:</span>
                                <span class="small text-soft">Min. 8 chars, different from username, with uppercase (A-Z), lowercase (a-z), number (0-9), and special char (@.$!%*#?&).</span>
                            </div>
                        </div>

                        <div class="col-12 pt-1">
                            <button class="btn btn-lg btn-primary btn-block" name="SUBMIT" id="submit" type="submit">
                                Reset Password
                            </button>
                        </div>
                    </div>
                </form>

                <div class="form-note-s2 text-center pt-3">
                    Remember your password? <a class="link link-primary link-sm font-weight-bold" href="{{ route('login') }}">Return to Login</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
