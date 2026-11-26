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
                        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))
                            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                        @endif
                    @endforeach
                        
                        <div class="card card-bordered">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">Register</h4>
                                        <div class="nk-block-des">
                                            
                                            <p>Access the Participant Onboarding Portal  using your email and password.</p>
                                        </div>
                                        
                                    </div>
                                </div>
                                <form method="POST" action="{{ route('register.post') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input name="usertype" type="hidden" value="external">
                                        <div class="form-label-group">
                                            <label class="form-label" for="default-01">Full Name*</label>
                                        </div>
                                        <input  type="text" name="name" class="form-control form-control-lg  @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" id="default-01" placeholder="Enter your full name">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="default-01">Email*</label>
                                        </div>
                                        <input  type="email" name="email" class="form-control form-control-lg  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="default-01" placeholder="Enter your email address">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                
                
                                    <div class="form-group">
                                        <label class="form-label" for="password">Phone Number*</label>
                                        
                                        <input  type="number" name="phone" class="form-control form-control-lg  @error('phone') is-invalid @enderror" value="{{ old('phone') }}" id="default-01">
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                
                                    {{-- <div class="form-group">
                                        <label class="form-label" for="password">Select Institution</label>
                                        <select name="institution_id" id="selector" class="form-control form-control-lg">
                                            <option>----</option>
                                            @php
                                                 $institutions = \App\Models\Institution::all(); @endphp
                                            @foreach ($institutions as $insti)
                                            <option value="{{$insti->id}}"> {{$insti->name}}</option>
                                            @endforeach     
                                            <option value="others">Other</option>
                                        </select>
                                    </div> --}}
                
                                    {{-- <div class="form-group others">
                                       
                                        <div class="form-label-group">
                                            <label class="form-label" for="default-01">Institution Name</label>
                                        </div>
                                        <input type="text" name="institution_name" class="form-control form-control-lg" placeholder="Enter your Institution name">
                                        
                                    </div> --}}
                
                                  
                                    
                                    <!-- .foem-group -->
                                    <p style="font-size: 19px;"><b>Password Policy</b></p>
                                    <ul class="list-unstyled">
                                    <li>- Password must contain at least eight characters</li>
                                    <li>-  Password must be different from username</li>
                                    <li>-  Password must contain at least one number (0-9)</li>
                                    <li>-  Password must contain at least one lowercase letter (a-z)</li>
                                    <li>-  Password must contain at least one uppercase letter (A-Z)</li>
                                    </ul>
                                    <br>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="password">Password*</label>
                                            @if (Route::has('password.request'))
                                            {{-- <a class="link link-primary link-sm" tabindex="-1" href="{{ route('password.request') }}">Forgot Password?</a> --}}
                
                                        @endif
                
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
                                       
                                        
                                        </div>
                                    </div><!-- .foem-group -->
                
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="password">Confirm Password*</label>
                                            @if (Route::has('password.request'))
                                            {{-- <a class="link link-primary link-sm" tabindex="-1" href="{{ route('password.request') }}">Forgot Password?</a> --}}
                
                                        @endif
                
                                        </div>
                                        <div class="form-control-wrap">
                                            {{-- <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a> --}}
                                            <input  type="password"  name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="confirm_password" placeholder="Confirm your password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div><!-- .foem-group -->
                                    <div class="form-group">
                                        {{-- <input type="submit" class="btn btn-lg btn-primary btn-block" name="SUBMIT" value="Register"
                                        onclick="this.disabled='disabled';this.form.submit();" /> --}}
                
                                        {{-- <button type="submit" class="btn btn-lg btn-primary btn-block">Register</button>  --}}

                                        {{-- <button type="submit" id="btnFetch" class="btn btn-lg btn-primary btn-block">Register</button> --}}
                                        <button class="btn btn-lg btn-primary btn-block" name="SUBMIT" id="submit" onclick="loading(); setTimeout('document.getElementById(\'' + this.id + '\').disabled=true;', 50);   " type="submit">
                                            <i class="fas fa-spinner fa-spin" style="display:none;"></i>
                                           <span class="btn-text">Register</span>
                                         </button>

                                        {{-- <button class="btn btn-lg btn-primary btn-block" id="submit" onclick="loading()" type="submit">
                                            <i class="fas fa-spinner fa-spin" style="display:none;"></i>
                                           <span class="btn-text">Register</span>
                                         </button> --}}
                                    </div>
                                </form><!-- form -->
                                 <div class="form-note-s2 pt-4"> Return to  <a  class="link link-primary link-sm" href="{{route('login')}}">Login</a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    @endsection