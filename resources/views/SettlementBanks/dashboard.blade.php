@extends('layouts.external')

@section('content')



    @php  
    
     echo $eligibility_type;
      $userdda = \App\Models\MemberOnboarding::where('eligibility_type', $eligibility_type)->where('user_id', $id)->first();
    
    @endphp

  

             
@if(empty($userdda))
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-lg">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-lg wide-xs mx-auto">
                <div class="nk-block-head-content text-center">
                    <h2 class="nk-block-title fw-normal">{{Auth::user()->name}}</h2>
                    <div class="nk-block-des">
                        <p>Welcome to Q-Depository Onboarding Portal</p>
                    </div>
                </div>
            </div>
            <div class="nk-block">
                <div class="card card-custom-s1 card-bordered">
                    <div class="row no-gutters">
                        <div class="col-lg-4">
                            <div class="card-inner-group h-100">
                                <div class="card-inner">
                                    <h5>Application progress</h5>
                                   
                                </div>
                                <div class="card-inner">
                                    <ul class="list list-step">
                                        <li>Participant Details</li>
                                        <li>Principal Officer(s) Details</li>
                                        <li>Correspondence Email Address</li>
                                        <li>Upload Documents</li>
                                        <li>Signature Mandate Form and Declaration</li>
                                     
                                    </ul>
                                </div>
                                <div class="card-inner">
                                    <div class="align-center gx-3">
                                        <div class="flex-item">
                                            <div class="progress progress-sm progress-pill w-80px">
                                                <div class="progress-bar" data-progress="0"></div>
                                            </div>
                                        </div>
                                        <div class="flex-item">
                                            <span class="sub-text sub-text-sm text-soft">0/5 Completed</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card-inner card-inner-lg h-100">
                                <div class="align-center flex-wrap flex-md-nowrap g-3 h-100">
                                    <div class="nk-block-image w-200px flex-shrink-0 order-first order-md-last">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 114 113.9">
                                            <path d="M87.84,110.34l-48.31-7.86a3.55,3.55,0,0,1-3.1-4L48.63,29a3.66,3.66,0,0,1,4.29-2.8L101.24,34a3.56,3.56,0,0,1,3.09,4l-12.2,69.52A3.66,3.66,0,0,1,87.84,110.34Z" transform="translate(-4 -2.1)" fill="#c4cefe" />
                                            <path d="M33.73,105.39,78.66,98.1a3.41,3.41,0,0,0,2.84-3.94L69.4,25.05a3.5,3.5,0,0,0-4-2.82L20.44,29.51a3.41,3.41,0,0,0-2.84,3.94l12.1,69.11A3.52,3.52,0,0,0,33.73,105.39Z" transform="translate(-4 -2.1)" fill="#c4cefe" />
                                            <rect x="22" y="17.9" width="66" height="88" rx="3" ry="3" fill="#6576ff" />
                                            <rect x="31" y="85.9" width="48" height="10" rx="1.5" ry="1.5" fill="#fff" />
                                            <rect x="31" y="27.9" width="48" height="5" rx="1" ry="1" fill="#e3e7fe" />
                                            <rect x="31" y="37.9" width="23" height="3" rx="1" ry="1" fill="#c4cefe" />
                                            <rect x="59" y="37.9" width="20" height="3" rx="1" ry="1" fill="#c4cefe" />
                                            <rect x="31" y="45.9" width="23" height="3" rx="1" ry="1" fill="#c4cefe" />
                                            <rect x="59" y="45.9" width="20" height="3" rx="1" ry="1" fill="#c4cefe" />
                                            <rect x="31" y="52.9" width="48" height="3" rx="1" ry="1" fill="#e3e7fe" />
                                            <rect x="31" y="60.9" width="23" height="3" rx="1" ry="1" fill="#c4cefe" />
                                            <path d="M98.5,116a.5.5,0,0,1-.5-.5V114H96.5a.5.5,0,0,1,0-1H98v-1.5a.5.5,0,0,1,1,0V113h1.5a.5.5,0,0,1,0,1H99v1.5A.5.5,0,0,1,98.5,116Z" transform="translate(-4 -2.1)" fill="#9cabff" />
                                            <path d="M16.5,85a.5.5,0,0,1-.5-.5V83H14.5a.5.5,0,0,1,0-1H16V80.5a.5.5,0,0,1,1,0V82h1.5a.5.5,0,0,1,0,1H17v1.5A.5.5,0,0,1,16.5,85Z" transform="translate(-4 -2.1)" fill="#9cabff" />
                                            <path d="M7,13a3,3,0,1,1,3-3A3,3,0,0,1,7,13ZM7,8a2,2,0,1,0,2,2A2,2,0,0,0,7,8Z" transform="translate(-4 -2.1)" fill="#9cabff" />
                                            <path d="M113.5,71a4.5,4.5,0,1,1,4.5-4.5A4.51,4.51,0,0,1,113.5,71Zm0-8a3.5,3.5,0,1,0,3.5,3.5A3.5,3.5,0,0,0,113.5,63Z" transform="translate(-4 -2.1)" fill="#9cabff" />
                                            <path d="M107.66,7.05A5.66,5.66,0,0,0,103.57,3,47.45,47.45,0,0,0,85.48,3h0A5.66,5.66,0,0,0,81.4,7.06a47.51,47.51,0,0,0,0,18.1,5.67,5.67,0,0,0,4.08,4.07,47.57,47.57,0,0,0,9,.87,47.78,47.78,0,0,0,9.06-.87,5.66,5.66,0,0,0,4.08-4.09A47.45,47.45,0,0,0,107.66,7.05Z" transform="translate(-4 -2.1)" fill="#2ec98a" />
                                            <path d="M100.66,12.81l-1.35,1.47c-1.9,2.06-3.88,4.21-5.77,6.3a1.29,1.29,0,0,1-1,.42h0a1.27,1.27,0,0,1-1-.42c-1.09-1.2-2.19-2.39-3.28-3.56a1.29,1.29,0,0,1,1.88-1.76c.78.84,1.57,1.68,2.35,2.54,1.6-1.76,3.25-3.55,4.83-5.27l1.35-1.46a1.29,1.29,0,0,1,1.9,1.74Z" transform="translate(-4 -2.1)" fill="#fff" />
                                        </svg>
                                    </div>
                                    <div class="nk-block-content">
                                        <div class="nk-block-content-head">
                                            <h4></h4>
                                         
                                        </div>
                                        {{-- <p>Looks like your have not verified your indentity yet. Please verify yourself to get full access to digital wallet.</p> --}}
                                          <p style="font-size: 20px;">Become a Participant</p>
                                        {{-- <ul class="list list-sm list-checked">
                                            <li>Lorem ipsum dolor sit amet consectetur</li>
                                            <li>Lorem ipsum dolor sit amet consectetur</li>
                                            <li>Lorem ipsum dolor sit amet consectetur</li>
                                        </ul> --}}
                                        
                                        <a  href="#" data-toggle="modal" data-target="#addUser" class="btn btn-lg btn-primary">Get Started</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</div>
@endif
   
    @if(!empty($userdda))  
  
    @php 
    $approval = $userdda->approval_status;
    $view = $userdda->id;
    @endphp
    
  

    @if($approval == 1 || $approval == 2 || $approval == 3 || $approval == 4   )
        <div class="nk-content nk-content-fluid">
            <div class="container-xl wide-lg">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-lg wide-xs mx-auto">
                        <div class="nk-block-head-content text-center">
                            <h2 class="nk-block-title fw-normal">{{Auth::user()->name}}</h2>
                            <div class="nk-block-des">
                                <p>Welcome to Q-Depository Onboarding Portal</p>
                            </div>
                        </div>
                    </div>
                    <div class="nk-block">
                        <div class="card card-custom-s1 card-bordered">
                            <div class="row no-gutters">
                                @if($approval == 1   )
                                <div class="col-lg-4">
                                    <div class="card-inner-group h-100">
                                        <div class="card-inner">
                                            <h5>Application progress</h5>
                                           
                                        </div>
                                        <div class="card-inner">
                                            <ul class="list list-step">
                                                {{-- <li class="list-step-done">Verify email address</li> --}}
                                              
                                                <li class="list-step-done">Participant Details</li>
                                                <li>Principal Officer(s) Details</li>
                                                <li>Correspondence Email Address</li>
                                                <li>Upload Documents</li>
                                                <li>Signature Mandate Form and Declaration</li>
                                               
                                            </ul>
                                        </div>
                                        <div class="card-inner">
                                            <div class="align-center gx-3">
                                                <div class="flex-item">
                                                    <div class="progress progress-sm progress-pill w-80px">
                                                        <div class="progress-bar" data-progress="20"></div>
                                                    </div>
                                                </div>
                                                <div class="flex-item">
                                                    <span class="sub-text sub-text-sm text-soft">1/5 Completed</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                @if($approval == 2   )
                                <div class="col-lg-4">
                                    <div class="card-inner-group h-100">
                                        <div class="card-inner">
                                            <h5>Application progress</h5>
                                           
                                        </div>
                                        <div class="card-inner">
                                            <ul class="list list-step">
                                                {{-- <li class="list-step-done">Verify email address</li> --}}
                                              
                                                <li class="list-step-done">Participant Details</li>
                                                <li class="list-step-done">Principal Officer(s) Details</li>
                                                <li>Correspondence Email Address</li>
                                                <li>Upload Documents</li>
                                                <li>Signature Mandate Form and Declaration</li>
                                               
                                            </ul>
                                        </div>
                                        <div class="card-inner">
                                            <div class="align-center gx-3">
                                                <div class="flex-item">
                                                    <div class="progress progress-sm progress-pill w-80px">
                                                        <div class="progress-bar" data-progress="40"></div>
                                                    </div>
                                                </div>
                                                <div class="flex-item">
                                                    <span class="sub-text sub-text-sm text-soft">2/5 Completed</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                @if($approval == 3   )
                                <div class="col-lg-4">
                                    <div class="card-inner-group h-100">
                                        <div class="card-inner">
                                            <h5>Application progress</h5>
                                           
                                        </div>
                                        <div class="card-inner">
                                            <ul class="list list-step">
                                                {{-- <li class="list-step-done">Verify email address</li> --}}
                                              
                                                <li class="list-step-done">Participant Details</li>
                                                <li class="list-step-done">Principal Officer(s) Details</li>
                                                <li class="list-step-done">Correspondence Email Address</li>
                                                <li>Upload Documents</li>
                                                <li>Signature Mandate Form and Declaration</li>
                                               
                                            </ul>
                                        </div>
                                        <div class="card-inner">
                                            <div class="align-center gx-3">
                                                <div class="flex-item">
                                                    <div class="progress progress-sm progress-pill w-80px">
                                                        <div class="progress-bar" data-progress="60"></div>
                                                    </div>
                                                </div>
                                                <div class="flex-item">
                                                    <span class="sub-text sub-text-sm text-soft">3/5 Completed</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                @if($approval == 4   )
                                <div class="col-lg-4">
                                    <div class="card-inner-group h-100">
                                        <div class="card-inner">
                                            <h5>Application progress</h5>
                                           
                                        </div>
                                        <div class="card-inner">
                                            <ul class="list list-step">
                                                {{-- <li class="list-step-done">Verify email address</li> --}}
                                              
                                                <li class="list-step-done">Participant Details</li>
                                                <li class="list-step-done">Principal Officer(s) Details</li>
                                                <li class="list-step-done">Correspondence Email Address</li>
                                                <li class="list-step-done">Upload Documents</li>
                                                <li>Signature Mandate Form and Declaration</li>
                                               
                                            </ul>
                                        </div>
                                        <div class="card-inner">
                                            <div class="align-center gx-3">
                                                <div class="flex-item">
                                                    <div class="progress progress-sm progress-pill w-80px">
                                                        <div class="progress-bar" data-progress="80"></div>
                                                    </div>
                                                </div>
                                                <div class="flex-item">
                                                    <span class="sub-text sub-text-sm text-soft">4/5 Completed</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if($approval == 5   )
                                <div class="col-lg-4">
                                    <div class="card-inner-group h-100">
                                        <div class="card-inner">
                                            <h5>Apploca Registration</h5>
                                           
                                        </div>
                                        <div class="card-inner">
                                            <ul class="list list-step">
                                                {{-- <li class="list-step-done">Verify email address</li> --}}
                                              
                                                <li class="list-step-done">Participant Details</li>
                                                <li class="list-step-done">Principal Officer(s) Details</li>
                                                <li class="list-step-done">Correspondence Email Address</li>
                                                <li class="list-step-done">Upload Documents</li>
                                                {{-- <li class="list-step-done"></li> --}}
                                                <li class="list-step-done">Signature Mandate Form and Declaration</li>
                                               
                                            </ul>
                                        </div>
                                        <div class="card-inner">
                                            <div class="align-center gx-3">
                                                <div class="flex-item">
                                                    <div class="progress progress-sm progress-pill w-80px">
                                                        <div class="progress-bar" data-progress="100"></div>
                                                    </div>
                                                </div>
                                                <div class="flex-item">
                                                    <span class="sub-text sub-text-sm text-soft">5/5 Completed</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="col-lg-8">
                                    <div class="card-inner card-inner-lg h-100">
                                        <div class="align-center flex-wrap flex-md-nowrap g-3 h-100">
                                            <div class="nk-block-image w-200px flex-shrink-0 order-first order-md-last">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 114 113.9">
                                                    <path d="M87.84,110.34l-48.31-7.86a3.55,3.55,0,0,1-3.1-4L48.63,29a3.66,3.66,0,0,1,4.29-2.8L101.24,34a3.56,3.56,0,0,1,3.09,4l-12.2,69.52A3.66,3.66,0,0,1,87.84,110.34Z" transform="translate(-4 -2.1)" fill="#c4cefe" />
                                                    <path d="M33.73,105.39,78.66,98.1a3.41,3.41,0,0,0,2.84-3.94L69.4,25.05a3.5,3.5,0,0,0-4-2.82L20.44,29.51a3.41,3.41,0,0,0-2.84,3.94l12.1,69.11A3.52,3.52,0,0,0,33.73,105.39Z" transform="translate(-4 -2.1)" fill="#c4cefe" />
                                                    <rect x="22" y="17.9" width="66" height="88" rx="3" ry="3" fill="#6576ff" />
                                                    <rect x="31" y="85.9" width="48" height="10" rx="1.5" ry="1.5" fill="#fff" />
                                                    <rect x="31" y="27.9" width="48" height="5" rx="1" ry="1" fill="#e3e7fe" />
                                                    <rect x="31" y="37.9" width="23" height="3" rx="1" ry="1" fill="#c4cefe" />
                                                    <rect x="59" y="37.9" width="20" height="3" rx="1" ry="1" fill="#c4cefe" />
                                                    <rect x="31" y="45.9" width="23" height="3" rx="1" ry="1" fill="#c4cefe" />
                                                    <rect x="59" y="45.9" width="20" height="3" rx="1" ry="1" fill="#c4cefe" />
                                                    <rect x="31" y="52.9" width="48" height="3" rx="1" ry="1" fill="#e3e7fe" />
                                                    <rect x="31" y="60.9" width="23" height="3" rx="1" ry="1" fill="#c4cefe" />
                                                    <path d="M98.5,116a.5.5,0,0,1-.5-.5V114H96.5a.5.5,0,0,1,0-1H98v-1.5a.5.5,0,0,1,1,0V113h1.5a.5.5,0,0,1,0,1H99v1.5A.5.5,0,0,1,98.5,116Z" transform="translate(-4 -2.1)" fill="#9cabff" />
                                                    <path d="M16.5,85a.5.5,0,0,1-.5-.5V83H14.5a.5.5,0,0,1,0-1H16V80.5a.5.5,0,0,1,1,0V82h1.5a.5.5,0,0,1,0,1H17v1.5A.5.5,0,0,1,16.5,85Z" transform="translate(-4 -2.1)" fill="#9cabff" />
                                                    <path d="M7,13a3,3,0,1,1,3-3A3,3,0,0,1,7,13ZM7,8a2,2,0,1,0,2,2A2,2,0,0,0,7,8Z" transform="translate(-4 -2.1)" fill="#9cabff" />
                                                    <path d="M113.5,71a4.5,4.5,0,1,1,4.5-4.5A4.51,4.51,0,0,1,113.5,71Zm0-8a3.5,3.5,0,1,0,3.5,3.5A3.5,3.5,0,0,0,113.5,63Z" transform="translate(-4 -2.1)" fill="#9cabff" />
                                                    <path d="M107.66,7.05A5.66,5.66,0,0,0,103.57,3,47.45,47.45,0,0,0,85.48,3h0A5.66,5.66,0,0,0,81.4,7.06a47.51,47.51,0,0,0,0,18.1,5.67,5.67,0,0,0,4.08,4.07,47.57,47.57,0,0,0,9,.87,47.78,47.78,0,0,0,9.06-.87,5.66,5.66,0,0,0,4.08-4.09A47.45,47.45,0,0,0,107.66,7.05Z" transform="translate(-4 -2.1)" fill="#2ec98a" />
                                                    <path d="M100.66,12.81l-1.35,1.47c-1.9,2.06-3.88,4.21-5.77,6.3a1.29,1.29,0,0,1-1,.42h0a1.27,1.27,0,0,1-1-.42c-1.09-1.2-2.19-2.39-3.28-3.56a1.29,1.29,0,0,1,1.88-1.76c.78.84,1.57,1.68,2.35,2.54,1.6-1.76,3.25-3.55,4.83-5.27l1.35-1.46a1.29,1.29,0,0,1,1.9,1.74Z" transform="translate(-4 -2.1)" fill="#fff" />
                                                </svg>
                                            </div>
                                            <div class="nk-block-content">
                                                <div class="nk-block-content-head">
                                                    <h4></h4>
                                                    <span class="sub-text sub-text-sm text-soft"></span>
                                                </div>
                                                {{-- <p>Looks like your have not verified your indentity yet. Please verify yourself to get full access to digital wallet.</p> --}}
                                                 <p style="font-size: 20px;">Become a Participant</p>
                                                {{-- <ul class="list list-sm list-checked">
                                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut maiores, nam provident unde, cumque iure a quod culpa quae fuga quam, ipsum at veniam quo consequuntur asperiores explicabo quisquam perspiciatis.
                                                   
                                                </ul> --}}
                                                @if( $userdda->approval_status == 1 ||  $userdda->approval_status == 2 ||  $userdda->approval_status == 3 || $userdda->approval_status == 4   )

                                                @if($userdda->eligibility_type == 'Settlement Banks')
                                                <a href="{{route('form_one_edit_SB', $userdda->id)}}" class="btn btn-lg btn-primary">Continue Application</a>
                                                @endif

                                                @if($userdda->eligibility_type == 'Private Account')
                                                <a href="{{route('form_one_edit_PA', $userdda->id)}}" class="btn btn-lg btn-primary">Continue Application</a>
                                                @endif
                                                

                                                @endif

                                                {{-- <a href="{{route('external.onboarding.step1.edit', $userdda->id)}}" class="btn btn-lg btn-primary">Continue Application</a>
                                                @endif --}}
                                                
                                                {{-- @if($approval == 2   )
                                                <a href="{{route('external.onboarding.step2.edit', $userdda->id)}}" class="btn btn-lg btn-primary">Continue Application</a>
                                                @endif
                                                @if($approval == 3   )
                                                <a href="{{route('external.onboarding.step3.edit', $userdda->id)}}" class="btn btn-lg btn-primary">Continue Application</a>
                                                @endif
                                                @if($approval == 4  )
                                                <a href="{{route('external.onboarding.step4.edit', $userdda->id)}}" class="btn btn-lg btn-primary">Continue Application</a>
                                                @endif
                                                @if($approval == 5   )
                                                <a href="{{route('external.onboarding.step1.create')}}" class="btn btn-lg btn-primary">View Application</a>
                                                @endif --}}
                                               
                                                
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
       @endif




                @if($approval == 5 )
        <div class="nk-content nk-content-fluid">
                    <div class="container-xl wide-lg">
                        <div class="nk-content-body">
                            <div class="kyc-app wide-sm m-auto">
                                
                                @if (\Session::has('success') )
                                <div class="alert alert-success alert-icon alert-dismissible">
                                   <em class="icon ni ni-check-circle"></em>  <strong> {{ \Session::get('success') }}<button class="close" data-dismiss="alert"></button>
                                       </div>
                                       @endif
                                <div class="nk-block-head nk-block-head-lg wide-xs mx-auto">
                                    <div class="nk-block-head-content text-center">
                                        <h2 class="nk-block-title fw-normal">Application Verification</h2>
                                        <div class="nk-block-des">
                                            {{-- <p>To comply with regulation each participant will have to go through application verification.</p> --}}
                                        </div>
                                    </div>
                                </div><!-- nk-block-head -->
                                <div class="nk-block">
                                    <div class="card card-bordered">
                                        <div class="card-inner card-inner-lg">
                                            <div class="nk-kyc-app p-sm-2 text-center">
                                                <div class="nk-kyc-app-icon">
                                                    <img  src="{{ asset('images/kycprogress.jpg')}}" alt="In Process">
                                                </div>
                                                <div class="nk-kyc-app-text mx-auto">
                                                    <h4>Your aplication is under review</h4>
                                                </div>
                                                <div class="nk-kyc-app-action">
                                                    {{-- <p>We are  working on verifing your information. Once our team verified your information, you will be notified by email.</p> --}}
                                                </div>
                                                <br>
                                               
                                                @if($userdda->eligibility_type == 'Settlement Banks')
                                                <a href="{{route('form_one_view_SB', $view)}}" class="btn btn-lg btn-primary">View Information</a>
                                                @endif
                                                
                                                @if(!is_null($userdda->invoice_doc) && is_null($userdda->receipt_doc)) 
                                                <a  href="#" data-toggle="modal" data-target="#addreceipt" class="btn btn-lg btn-primary">Upload payment receipt </a>

                                             
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                                 <!-- Modal Trigger Code -->




    

                                                 @if($approval == 6 || $approval == 7 || $approval == 8  )
                                                 <div class="nk-content nk-content-fluid">
                                                             <div class="container-xl wide-lg">
                                                                 <div class="nk-content-body">
                                                                     <div class="kyc-app wide-sm m-auto">
                                                                         <div class="nk-block-head nk-block-head-lg wide-xs mx-auto">
                                                                             <div class="nk-block-head-content text-center">
                                                                                 <h2 class="nk-block-title fw-normal">Application Verification</h2>
                                                                                 <div class="nk-block-des">
                                                                                     {{-- <p>To comply with regulation each participant will have to go through application verification.</p> --}}
                                                                                 </div>
                                                                             </div>
                                                                         </div><!-- nk-block-head -->
                                                                         <div class="nk-block">
                                                                             <div class="card card-bordered">
                                                                                 <div class="card-inner card-inner-lg">
                                                                                     <div class="nk-kyc-app p-sm-2 text-center">
                                                                                         <div class="nk-kyc-app-icon">
                                                                                             <img  src="{{ asset('images/kycprogress.jpg')}}" alt="In Process">
                                                                                         </div>
                                                                                         <div class="nk-kyc-app-text mx-auto">
                                                                                             <h4>Application Under Review</h4>
                                                                                         </div>
                                                                                         {{-- <div class="nk-kyc-app-action">
                                                                                             <p>We are working on verifing your information. Once our team verified your information, you will be notified by email.</p>
                                                                                         </div> --}}
                                                                                         <br>
                                                                                         @if($userdda->eligibility_type == 'Settlement Banks')
                                                                                         <a href="{{route('form_one_view_SB', $view)}}" class="btn btn-lg btn-primary">View Information</a>
                                                                                         @endif
                                                                                         @if($userdda->eligibility_type == 'Private Account')
                                                                                         <a href="{{route('form_one_view_SB', $view)}}" class="btn btn-lg btn-primary">View Information</a>
                                                                                         @endif
                                                                                     </div>
                                                                                 </div>
                                                                             </div>
                                                                             <div class="text-center pt-4">
                                                                                 {{-- <p>If you have any question, please contact our support team <a href="mailto:support@fmdqgroup.com">support@fmdqgroup.com</a></p> --}}
                                                                             </div>
                                                                         </div><!-- nk-block -->
                                                                     </div><!-- kyc-app -->
                                                                 </div>
                                                             </div>
                                                         </div>
                                                         @endif
                                 
                                 
                                 
                                 
                                                         @if($approval == 10  )
                                                 <div class="nk-content nk-content-fluid">
                                                             <div class="container-xl wide-lg">
                                                                 <div class="nk-content-body">
                                                                     <div class="kyc-app wide-sm m-auto">
                                                                         <div class="nk-block-head nk-block-head-lg wide-xs mx-auto">
                                                                             <div class="nk-block-head-content text-center">
                                                                                 <h2 class="nk-block-title fw-normal">Application Verification</h2>
                                                                                 <div class="nk-block-des">
                                                                                     {{-- <p>One fo our team verified your indentity. You are now in whitelisted for token sale.</p> --}}
                                                                                 </div>
                                                                             </div>
                                                                         </div><!-- nk-block-head -->
                                                                         <div class="nk-block">
                                                                             <div class="card card-bordered">
                                                                                 <div class="card-inner card-inner-lg">
                                                                                     <div class="nk-kyc-app p-sm-2 text-center">
                                                                                         <div class="nk-kyc-app-icon">
                                                                                             <img  src="{{ asset('images/kyc-success.png')}}" alt="In Process">
                                                                                         </div>
                                                                                         <div class="nk-kyc-app-text mx-auto">
                                                                                             <h4>Application Verified </h4>
                                                                                         </div>
                                                                                         {{-- <div class="nk-kyc-app-action">
                                                                                             <p>We are still working on your verifing your information. Once our team verified your information, you will be notified by email.</p>
                                                                                         </div> --}}
                                                                                         <br>
                                                                                         @if($userdda->eligibility_type == 'Settlement Banks')
                                                                                 <a href="{{route('form_one_view_SB', $view)}}" class="btn btn-lg btn-primary">View Information</a>
                                                                                 @endif
                                                                                 @if($userdda->eligibility_type == 'Private Account')
                                                                                 <a href="{{route('form_one_view_SB', $view)}}" class="btn btn-lg btn-primary">View Information</a>
                                                                                 @endif
                                                                                     </div>
                                                                                 </div>
                                                                             </div>
                                                                             <div class="text-center pt-4">
                                                                                 {{-- <p>If you have any question, please contact our support team <a href="mailto:support@fmdqgroup.com">support@fmdqgroup.com</a></p> --}}
                                                                             </div>
                                                                         </div><!-- nk-block -->
                                                                     </div><!-- kyc-app -->
                                                                 </div>
                                                             </div>
                                                         </div>
                                                         @endif


<!-- Modal Content Code -->
<div class="modal fade" tabindex="-1" id="addreceipt">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
            </a>
            <div class="modal-header">
                <h5 class="title">Upload Payment Receipt </h5>
            </div>
            <div class="modal-body">
                <form  action="{{ route('external.receipt.upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="tab-content">
                    <div class="tab-pane active" id="infomation">
                        <br>
                        <div class="row gy-4">
                            <div class="col-md-12">

                              <div class="form-control-wrap">
                                  <div class="custom-file">
                                      <input name="receipt_doc" type="file" class="custom-file-input" id="inputGroupFile01">
                                      <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                  </div>
                              </div>
                               
                               
                                    
                                        <input hidden  name="app_code" value="{{$userdda->app_code}}">
                                       
                                </div>
                            </div>
                            <br>
                                      <br>
                           
                            <div class="col-12">
                               
                                <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                    <li>
                                           <button class="btn btn-primary" name="SUBMIT" id="submit" onclick="setTimeout('document.getElementById(\'' + this.id + '\').disabled=true;', 50); loading();" type="submit">
                                                  <i class="fas fa-spinner fa-spin" style="display:none;"></i>
                                                 <span class="btn-text">Submit</span>
                                               </button> 
                                        {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- .tab-pane -->
                   
                </div>
                </form><!-- .tab-content -->
            </div>
           
        </div>
    </div>
</div>


                                    <div class="text-center pt-4">
                                        {{-- <p>If you have any question, please contact our support team <a href="mailto:support@fmdqgroup.com">support@fmdqgroup.com</a></p> --}}
                                    </div>
                                </div><!-- nk-block -->
                            </div><!-- kyc-app -->
                        </div>
                    </div>
                </div>
                @endif
               


           
                        @endif
                {{-- <div class="nk-content nk-content-fluid">
                    <div class="container-xl wide-lg">
                        <div class="nk-content-body">
                            <div class="nk-block-head nk-block-head-lg wide-xs mx-auto">
                                <div class="nk-block-head-content text-center">
                                    <h2 class="nk-block-title fw-normal">{{Auth::user()->name}}</h2>
                                    <div class="nk-block-des">
                                        <p>Welcome to <strong>FMDQ GROUP</strong> Participant onboarding portal. You are few steps away to complete your profile.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="nk-block">
                                <div class="card card-custom-s1 card-bordered">
                                    <div class="row no-gutters">
                                        <div class="col-lg-4">
                                            <div class="card-inner-group h-100">
                                                <div class="card-inner">
                                                    <h5>Application progress</h5>
                                                   
                                                </div>
                                                <div class="card-inner">
                                                    <ul class="list list-step">
                                                        <li class="list-step-done">Verify email address</li>
                                                      
                                                        <li>Verify your identity (KYC)</li>
                                                        <li>Upload Documents</li>
                                                     
                                                    </ul>
                                                </div>
                                                <div class="card-inner">
                                                    <div class="align-center gx-3">
                                                        <div class="flex-item">
                                                            <div class="progress progress-sm progress-pill w-80px">
                                                                <div class="progress-bar" data-progress="25"></div>
                                                            </div>
                                                        </div>
                                                        <div class="flex-item">
                                                            <span class="sub-text sub-text-sm text-soft">0/4 Completed</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="card-inner card-inner-lg h-100">
                                                <div class="align-center flex-wrap flex-md-nowrap g-3 h-100">
                                                    <div class="nk-block-image w-200px flex-shrink-0 order-first order-md-last">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 114 113.9">
                                                            <path d="M87.84,110.34l-48.31-7.86a3.55,3.55,0,0,1-3.1-4L48.63,29a3.66,3.66,0,0,1,4.29-2.8L101.24,34a3.56,3.56,0,0,1,3.09,4l-12.2,69.52A3.66,3.66,0,0,1,87.84,110.34Z" transform="translate(-4 -2.1)" fill="#c4cefe" />
                                                            <path d="M33.73,105.39,78.66,98.1a3.41,3.41,0,0,0,2.84-3.94L69.4,25.05a3.5,3.5,0,0,0-4-2.82L20.44,29.51a3.41,3.41,0,0,0-2.84,3.94l12.1,69.11A3.52,3.52,0,0,0,33.73,105.39Z" transform="translate(-4 -2.1)" fill="#c4cefe" />
                                                            <rect x="22" y="17.9" width="66" height="88" rx="3" ry="3" fill="#6576ff" />
                                                            <rect x="31" y="85.9" width="48" height="10" rx="1.5" ry="1.5" fill="#fff" />
                                                            <rect x="31" y="27.9" width="48" height="5" rx="1" ry="1" fill="#e3e7fe" />
                                                            <rect x="31" y="37.9" width="23" height="3" rx="1" ry="1" fill="#c4cefe" />
                                                            <rect x="59" y="37.9" width="20" height="3" rx="1" ry="1" fill="#c4cefe" />
                                                            <rect x="31" y="45.9" width="23" height="3" rx="1" ry="1" fill="#c4cefe" />
                                                            <rect x="59" y="45.9" width="20" height="3" rx="1" ry="1" fill="#c4cefe" />
                                                            <rect x="31" y="52.9" width="48" height="3" rx="1" ry="1" fill="#e3e7fe" />
                                                            <rect x="31" y="60.9" width="23" height="3" rx="1" ry="1" fill="#c4cefe" />
                                                            <path d="M98.5,116a.5.5,0,0,1-.5-.5V114H96.5a.5.5,0,0,1,0-1H98v-1.5a.5.5,0,0,1,1,0V113h1.5a.5.5,0,0,1,0,1H99v1.5A.5.5,0,0,1,98.5,116Z" transform="translate(-4 -2.1)" fill="#9cabff" />
                                                            <path d="M16.5,85a.5.5,0,0,1-.5-.5V83H14.5a.5.5,0,0,1,0-1H16V80.5a.5.5,0,0,1,1,0V82h1.5a.5.5,0,0,1,0,1H17v1.5A.5.5,0,0,1,16.5,85Z" transform="translate(-4 -2.1)" fill="#9cabff" />
                                                            <path d="M7,13a3,3,0,1,1,3-3A3,3,0,0,1,7,13ZM7,8a2,2,0,1,0,2,2A2,2,0,0,0,7,8Z" transform="translate(-4 -2.1)" fill="#9cabff" />
                                                            <path d="M113.5,71a4.5,4.5,0,1,1,4.5-4.5A4.51,4.51,0,0,1,113.5,71Zm0-8a3.5,3.5,0,1,0,3.5,3.5A3.5,3.5,0,0,0,113.5,63Z" transform="translate(-4 -2.1)" fill="#9cabff" />
                                                            <path d="M107.66,7.05A5.66,5.66,0,0,0,103.57,3,47.45,47.45,0,0,0,85.48,3h0A5.66,5.66,0,0,0,81.4,7.06a47.51,47.51,0,0,0,0,18.1,5.67,5.67,0,0,0,4.08,4.07,47.57,47.57,0,0,0,9,.87,47.78,47.78,0,0,0,9.06-.87,5.66,5.66,0,0,0,4.08-4.09A47.45,47.45,0,0,0,107.66,7.05Z" transform="translate(-4 -2.1)" fill="#2ec98a" />
                                                            <path d="M100.66,12.81l-1.35,1.47c-1.9,2.06-3.88,4.21-5.77,6.3a1.29,1.29,0,0,1-1,.42h0a1.27,1.27,0,0,1-1-.42c-1.09-1.2-2.19-2.39-3.28-3.56a1.29,1.29,0,0,1,1.88-1.76c.78.84,1.57,1.68,2.35,2.54,1.6-1.76,3.25-3.55,4.83-5.27l1.35-1.46a1.29,1.29,0,0,1,1.9,1.74Z" transform="translate(-4 -2.1)" fill="#fff" />
                                                        </svg>
                                                    </div>
                                                    <div class="nk-block-content">
                                                        <div class="nk-block-content-head">
                                                            <h4>Complete Your KYC</h4>
                                                            <span class="sub-text sub-text-sm text-soft">7 minutes</span>
                                                        </div>
                                                        <p>Looks like your have not verified your indentity yet. Please verify yourself to get full access to digital wallet.</p>
                                                        <ul class="list list-sm list-checked">
                                                            <li>Fiat Currency Wallet <span>(USD, EUR, GBP)</span></li>
                                                            <li>10+ Digital Crypto Wallet <span>(ETH, BTC, LTC etc)</span></li>
                                                            <li>Receive and send payment with NioWallet</li>
                                                        </ul>
                                                        <a href="{{route('external.onboarding.step1.create')}}" class="btn btn-lg btn-primary">Get Started</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div> --}}
                <!-- content @e -->


                <div class="modal fade" role="dialog" id="addUser">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                            <div class="modal-body modal-body-md">
                                <h5 class="title">Eligibility Type</h5>
                                {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
                                <div class="tab-content">
                                    <div class="tab-pane active" id="infomation">
                                        <div class="row gy-4">
                                         
                                        
                                                                    
                                                                        <div class="col-lg-12">
                                                                            <div class="form-group">
                                                                                
                                                                                <div class="form-control-wrap">
                                                                                    <select name="selected_value" id="selected_value" onchange="submitForm()" class="form-control">
                                                                                        <option value="">Select eligibility type</option>
                                                                                       
                                                                                        
                                                                                        <option value="Capital-Market-Operator">Capital Market Operator</option>
                                                                                        <option value="Private-account-Corporate-and-Individual">Private account - Corporate and Individual</option>

                                                                                        <option value="Settlement-Banks">Settlement Banks</option>
                                                                                       
                                                                                        
                                                                                    </select>
                                                                                    <script>
                                                                                        function submitForm() {
                                                                                          let selectedValue = document.getElementById('selected_value').value;
                                                                                      
                                                                                          if (selectedValue) {
                                                                                            window.location.href = '{{url('')}}/participantuser/' + selectedValue;
                                                                                          }
                                                                                        }
                                                                                      </script>
                                                                                    {{-- <input value="{{Auth::user()->name}}" name="fullname" type="text" class="form-control" id="full-name-1"> --}}
                                                                                </div>
                                                                            </div>
                                                                       
                                           
                                          
                                           
                                        </div>
                                    </div><!-- .tab-pane -->
                                   
                                </div><!-- .tab-content -->
                                {!! Form::close() !!}
                            </div><!-- .modal-body -->
                        </div><!-- .modal-content -->
                    </div><!-- .modal-dialog -->
                </div>




 

                <script>
                    document.getElementById("selectOption").addEventListener("change", function() {
                  let selectedOption = this.value;
                  let options = ["Settlement-Banks", "Private-account-Corporate-and-Individual","Capital-Market-Operator"];
                  
                  options.forEach(function(option) {
                    if (option === selectedOption) {
                      document.getElementById(option).style.display = "block";
                    } else {
                      document.getElementById(option).style.display = "none";
                    }
                  });
                });
                </script>






   

                @endsection    