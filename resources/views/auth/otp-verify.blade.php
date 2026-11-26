@extends('layouts.master-without-nav')

@section('content')
    <!-- content @s -->
        <div class="nk-content "
            style="background-image: url({{ asset('assets/images/onboard-bg.png') }}); background-color: #cccccc; width: 100%; height: 100%;background-position: center;background-repeat: no-repeat; background-size: cover;">
            <div class="nk-block nk-block-middle nk-auth-body  wide-xs">

                <div class="card card-bordered">
                    <div class="card-inner card-inner-lg">
                        <div class="brand-logo pb-4 text-center">
                            <a href="{{ url('/') }}" class="logo-link">
                                <img class="logo-light logo-img logo-img-lg" src="{{ asset('assets/images/FMDQlogo.svg') }}"
                                    srcset="{{ asset('assets/images/FMDQlogo.svg') }} 1x" alt="logo">

                                <img class="logo-dark logo-img logo-img-lg" src="{{ asset('assets/images/FMDQlogo.svg') }}"
                                    srcset="{{ asset('assets/images/FMDQlogo.svg') }} 1x" alt="logo-dark">
                            </a>
                        </div>
                        <div class="nk-block-head">
                            <div class="nk-block-head-content">
                                <center>
                                    <h4>Q-Depository Onboarding Portal</h4>
                                </center>
                                <br>
                                <div class="nk-block-des">
                                    <h6 class="nk-block-title">OTP Verification</h6>
                                 
                                </div>

                            </div>
                        </div>
                        <div class="example-alert">
                            @if (\Session::has('error'))
                                <div class="alert alert-danger alert-icon alert-dismissible">
                                    <em class="icon ni ni-check-circle"></em> <strong> {{ \Session::get('error') }}<button
                                            class="close" data-dismiss="alert"></button>
                                </div>
                            @endif



                            @if (\Session::has('success'))
                                <div class="alert alert-success alert-icon alert-dismissible">
                                    <em class="icon ni ni-check-circle"></em> <strong> {{ \Session::get('success') }}<button
                                            class="close" data-dismiss="alert"></button>
                                </div>
                            @endif


                            @if (count($errors) > 0)
                                <div>
                                    <div class="alert alert-danger alert-icon alert-dismissible">
                                        <strong>Opps!</strong> Something went wrong, please check below errors.<br><br>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                        <button class="close" data-dismiss="alert"></button>
                                    </div>
                            @endif




                        </div>
                        <form method="POST" action="{{ route('auth.otp.verify.submit') }}" id="ordersubmitform">
                            @csrf
                            <div class="form-group">
                                <div class="form-label-group">
                                    <label class="form-label" for="default-01">OTP *</label>

                                </div>
                                <input type="number" name="otp"
                                    class="form-control form-control-lg  @error('otp') is-invalid @enderror" name="otp"
                                    value="{{ old('otp') }}" id="default-01" placeholder="Enter your otp">
                                @error('otp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div><!-- .foem-group -->
                         
                            <div class="form-group">
                                <button class="btn btn-lg btn-primary btn-block" name="SUBMIT" id="submit" type="submit">
                                    Verify
                                </button>
                               
                            </div>
                            <div class="form-note-s2 text-center pt-4">
                                <span id="resend-text">Didn't receive the code?</span>
                                <a href="{{ route('auth.otp.resend') }}" id="resend-link" style="display: none;">Resend OTP</a>
                                <span id="timer-display">Resend in <span id="time-left">60</span>s</span>
                            </div>
                        </form>
                       
                    </div>
                </div>
            </div>

        </div>
        <!-- wrap @e -->
        </div>
        <!-- content @e -->
        </div>
        <!-- main @e -->
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var timeLeft = 60;
                var timerId = setInterval(countdown, 1000);
                var resendLink = document.getElementById('resend-link');
                var timerDisplay = document.getElementById('timer-display');
                var timeLeftSpan = document.getElementById('time-left');

                function countdown() {
                    if (timeLeft == -1) {
                        clearTimeout(timerId);
                        resendLink.style.display = 'inline';
                        timerDisplay.style.display = 'none';
                    } else {
                        timeLeftSpan.innerHTML = timeLeft;
                        timeLeft--;
                    }
                }
            });
        </script>
    @endsection







