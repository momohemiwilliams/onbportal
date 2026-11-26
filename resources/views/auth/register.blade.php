@extends('layouts.master-without-nav')

@section('content')
@include('auth.partials.styles')

<div class="qdop-auth-wrapper" style="padding: 1.5rem 1rem;">
    <div class="qdop-auth-box wide">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if (Session::has('alert-' . $msg))
                <div class="alert alert-{{ $msg }} alert-dismissible">
                    {{ Session::get('alert-' . $msg) }}
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </div>
            @endif
        @endforeach

        <div class="card qdop-auth-card">
            <div class="card-inner card-inner-lg" style="padding: 1.65rem 2rem;">
                <div class="brand-logo pb-2 text-center">
                    <a href="{{ url('/') }}" class="logo-link">
                        <img class="logo-dark logo-img" style="max-height: 36px;" src="{{ asset('assets/images/FMDQlogo.svg') }}" alt="FMDQ Logo">
                    </a>
                    <div class="qdop-auth-title mt-1">Q-Depository Onboarding Portal</div>
                </div>

                <div class="nk-block-head pb-2 text-center">
                    <h5 class="qdop-auth-subtitle mb-0">Register</h5>
                    <p class="text-soft small mb-0">Create a participant account to begin your onboarding.</p>
                </div>

                <form method="POST" action="{{ route('auth.register.submit') }}">
                    @csrf
                    <input name="usertype" type="hidden" value="external">

                    <div class="row g-3">
                        <div class="col-md-12">
                            <div class="form-group mb-0">
                                <label class="form-label" for="reg-name">Full Name *</label>
                                <input type="text" name="name" id="reg-name"
                                    class="form-control form-control-lg @error('name') is-invalid @enderror"
                                    value="{{ old('name') }}" placeholder="Enter your full name" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-0">
                                <label class="form-label" for="reg-email">Email *</label>
                                <input type="email" name="email" id="reg-email"
                                    class="form-control form-control-lg @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}" placeholder="Enter your email address" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-0">
                                <label class="form-label" for="reg-phone">Phone Number *</label>
                                <input type="text" name="phone" id="reg-phone"
                                    class="form-control form-control-lg @error('phone') is-invalid @enderror"
                                    value="{{ old('phone') }}" placeholder="Enter your phone number" required>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

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
                                        placeholder="Enter password" required>
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
                                        placeholder="Confirm password" required>
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
                                Register
                            </button>
                        </div>
                    </div>
                </form>

                <div class="form-note-s2 text-center pt-3">
                    Already have an account? <a class="link link-primary link-sm font-weight-bold" href="{{ route('login') }}">Return to Login</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
