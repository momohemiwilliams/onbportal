@extends('layouts.master-without-nav')

@section('content')
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
                        <div class="brand-logo pb-4 text-center">
                            <a href="html/index.html" class="logo-link">
                                <img class="logo-light logo-img logo-img-lg" src="{{ asset('assets/images/FMDQlogo.svg')}}" srcset="{{ asset('assets/images/FMDQlogo.svg')}} 1x" alt="logo">
                                
                                <img class="logo-dark logo-img logo-img-lg" src="{{ asset('assets/images/FMDQlogo.svg')}}" srcset="{{ asset('assets/images/FMDQlogo.svg')}} 1x" alt="logo-dark">
                            </a>
                        </div>
                        
                        <div class="nk-block-head">
                            <div class="nk-block-head-content">
                                <h5 class="nk-block-title">Reset Password</h5>
                                <div class="nk-block-des">
                                    <p>If you forgot your password, well, then we’ll
                                        email you instructions to reset your password.</p>
                                </div>
                            </div>
                        </div><!-- .nk-block-head -->
                        @if (Session::has('message'))
                        <div class="alert alert-success text-center mb-4" role="alert">
                        {{ Session::get('message') }}
                             </div>
                             @endif
                        <form method="POST" action="{{ route('forget.password.post') }}">
                            @csrf
                            <div class="form-group">
                                <div class="form-label-group">
                                    <label class="form-label" for="default-01">Email*</label>
        
                                </div>
                                <input type="email" name="email" class="form-control form-control-lg  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="default-01" placeholder="Enter your email address or username">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div><!-- .foem-group -->
        
                            <div class="form-group">
                                {{-- <button class="btn btn-lg btn-primary btn-block" name="SUBMIT" id="submit" onclick="loading(); setTimeout('document.getElementById(\'' + this.id + '\').disabled=true;', 50);  " type="submit">
                                    <i class="fas fa-spinner fa-spin" style="display:none;"></i>
                                   <span class="btn-text"></span>
                                 </button> --}}

                                 <button class="btn btn-lg btn-primary btn-block" name="SUBMIT" id="submit" onclick="loading(); setTimeout('document.getElementById(\'' + this.id + '\').disabled=true;', 50);   " type="submit">
                                    <i class="fas fa-spinner fa-spin" style="display:none;"></i>
                                   <span class="btn-text">Send Password Reset Link</span>
                                 </button>
                               
                            </div>
                        </form><!-- form -->
                         <div class="form-note-s2 pt-4">Return to  <a href="{{ route('login') }}">Login</a>
                        </div>
                                
                            </div>
                        </div>
                    </div>

                    @endsection