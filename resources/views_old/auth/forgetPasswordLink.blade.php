@extends('layouts.master-without-nav')

@section('content')
                <!-- content @s -->
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
                                    {{-- <p>If you forgot your password, well, then we’ll
                                        email you instructions to reset your password.</p> --}}
                                </div>
                            </div>
                        </div><!-- .nk-block-head -->
                        @if (Session::has('message'))
                        <div class="alert alert-success text-center mb-4" role="alert">
                        {{ Session::get('message') }}
                             </div>
                             @endif
        
                             @if (Session::has('error'))
                             <div class="alert alert-danger text-center mb-4" role="alert">
                             {{ Session::get('error') }}
                                  </div>
                                  @endif
                        <form method="POST" action="{{ route('reset.password.post') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            
                            <div class="form-group">
                                <div class="form-label-group">
                                    <label class="form-label" for="default-01">Email</label>
        
                                </div>
                                <input type="email" name="email" class="form-control form-control-lg  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="default-01" placeholder="Enter your email address or username">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div><!-- .foem-group -->
        
                             <!-- .foem-group -->
                             <div class="form-group">
                                <div class="form-label-group">
                                    <label class="form-label" for="password">Password*</label>
                                   
        
                                </div>
                                <div class="form-control-wrap">
                                    <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                                        <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                        <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                    </a>
                                    <input  type="password"  name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="password" placeholder="Enter your password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <p><h6>Password Policy</h6></p>
                                <ul class="list-unstyled">
                                <li>- Password must contain at least eight characters</li>
                                <li>-  Password must be different from username</li>
                                <li>-  Password must contain at least one number (0-9)</li>
                                <li>-  Password must contain at least one lowercase letter (a-z)</li>
                                <li>-  Password must contain at least one uppercase letter (A-Z)</li>
                                </ul>
                                </div>
                            </div><!-- .foem-group -->
        
                            <div class="form-group">
                                <div class="form-label-group">
                                    <label class="form-label" for="password">Confirm Password</label>
                                   
                                </div>
                                <div class="form-control-wrap">
                                    <input  type="password"  name="password_confirmation" class="form-control form-control-lg @error('password') is-invalid @enderror" id="confirm_password" placeholder="Confirm your password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-lg btn-primary btn-block" name="SUBMIT" id="submit" onclick="loading(); setTimeout('document.getElementById(\'' + this.id + '\').disabled=true;', 50);   " type="submit">
                                    <i class="fas fa-spinner fa-spin" style="display:none;"></i>
                                   <span class="btn-text">Reset</span>
                                 </button>
                                {{-- <input type="submit" class="btn btn-lg btn-primary btn-block" name="SUBMIT" value="Reset"
                                onclick="this.disabled='disabled';this.form.submit();" /> --}}
        
                                {{-- {!! Form::button('Place Your Order', ['class' => 'pull-right btn btn-success', 'onclick' => 'submit()']) !!} --}}
        
                                {{-- <input type="submit"  class="btn btn-lg btn-primary btn-block" value="Sign in" class="pull-right btn btn-success" name="submit" onclick="this.disabled=true;this.form.submit();">  --}}
                                {{-- <button id="disable-submit" type="submit" class="g-recaptcha btn btn-light rounded-pill" data-sitekey="{{ config('services.recaptcha.sitekey') }}" data-callback='onSubmit' data-action='submit'>
                                    {{ __('Register') }}
                                </button>  --}}
                              
                                {{-- <button type="submit"  id="button" class="btn btn-lg btn-primary btn-block">Sign in</button> --}}
                            </div>
                            <!-- .foem-group -
        
                            <div class="form-group">
        
                                <button type="submit" class="btn btn-lg btn-primary btn-block">Send Password Reset Link</button>
                            </div>
                        </form>-->
                         <div class="form-note-s2 pt-4">Wait, I remember my password......<a href="{{ route('login') }}">Click here</a>
                        </div>
                                
                            </div>
                        </div>
                    </div>
                    @endsection