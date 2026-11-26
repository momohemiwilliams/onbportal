 <!-- sidebar @s --> 
 <div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-sidebar-brand">
            <a href="{{route('external.dashboard')}}" class="logo-link nk-sidebar-logo">
                <img class="logo-light logo-img logo-img-lg" src="{{ asset('public/assets/images/FMDQlogo.svg')}}" srcset="{{ asset('assets/images/FMDQlogo.svg')}}">
                <img class="logo-dark logo-img logo-img-lg" src="{{ asset('public/assets/images/FMDQlogo.svg')}}" srcset="{{ asset('assets/images/FMDQlogo.svg')}}">
               
            </a>
        </div>
        {{-- <div class="nk-menu-trigger mr-n2">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
            <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
        </div> --}}
    </div><!-- .nk-sidebar-element -->
    <div class="nk-sidebar-element" style="background-color: #22346c">
        <div class="nk-sidebar-content" >
            <div class="nk-sidebar-menu" data-simplebar >
                <ul class="nk-menu" >
                    <li class="nk-menu-heading">
                       
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item" >
                        <a href="{{route('external.dashboard')}}" class="nk-menu-link">
                            <span class="nk-menu-icon" style="color: white"><em class="icon ni ni-bag"></em></span>
                            <span class="nk-menu-text" style="color: white">Dashboard</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                   

                    <li class="nk-menu-item">
                        <a href="{{route('external.profile')}}" class="nk-menu-link">
                            <span class="nk-menu-icon" style="color: white"><em class="icon ni ni-setting"></em></span>
                            <span class="nk-menu-text" style="color: white">Account Settings</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    @php  
                     $id = Auth::User()->id;
                    // $used = \App\Models\User::where('user_id', $id)->first();
                    $userdda = \App\Models\PrivateAccountOnform::where('user_id', $id)->first();
                 
                   @endphp

               
               
                @if(!empty($userdda) )
                    @if( $userdda->approval_status == 1 ||  $userdda->approval_status == 2 ||  $userdda->approval_status == 3 || $userdda->approval_status == 4   )
                    <li class="nk-menu-item">
                        @if($userdda->eligibility_type == 'Settlement Banks')
                        <a href="{{route('form_one_edit_SB', $userdda->id)}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-files"></em></span>
                            <span class="nk-menu-text">Continue Application</span>
                        </a>
                        @endif

                        @if($userdda->eligibility_type == 'Private Account')
                        <a href="{{route('form_one_edit_PA', $userdda->id)}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-files"></em></span>
                            <span class="nk-menu-text">Continue Application</span>
                        </a>
                        @endif
                       
                    </li>
                    @endif
                    
                    @if($userdda->approval_status > 4 )
                    @if($userdda->eligibility_type == 'Settlement Banks')
                    <li class="nk-menu-item">
                        <a href="{{route('form_one_view_SB', $userdda->id)}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-files"></em></span>
                            <span class="nk-menu-text">View Application</span>
                        </a>
                    </li>
                    @endif

                    @if($userdda->eligibility_type == 'Private Account')
                    <li class="nk-menu-item">
                        <a href="{{route('form_one_view_PA', $userdda->id)}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-files"></em></span>
                            <span class="nk-menu-text">View Application</span>
                        </a>
                    </li>
                    @endif
                    @endif


                 


                    {{-- @if($userdda->approval_status == 6 )
                    <li class="nk-menu-item">
                        <a href="{{route('external.application.show', $userdda->id)}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-files"></em></span>
                            <span class="nk-menu-text">View Application</span>
                        </a>
                    </li>
                    @endif

                    @if($userdda->approval_status == 7 )
                    <li class="nk-menu-item">
                        <a href="{{route('external.application.show', $userdda->id)}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-files"></em></span>
                            <span class="nk-menu-text">View Application</span>
                        </a>
                    </li>
                    @endif

                    @if($userdda->approval_status == 8 )
                    <li class="nk-menu-item">
                        <a href="{{route('external.application.show', $userdda->id)}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-files"></em></span>
                            <span class="nk-menu-text">View Application</span>
                        </a>
                    </li>
                    @endif

                    @if($userdda->approval_status == 6 ||  $userdda->approval_status == 7  ||  $userdda->approval_status)
                    <li class="nk-menu-item">
                        <a href="{{route('external.application.show', $userdda->id)}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-files"></em></span>
                            <span class="nk-menu-text">View Application</span>
                        </a>
                    </li>
                    @endif --}}
                    @endif
                   
                   
                   

                 
              
                </ul><!-- .nk-menu -->
            </div><!-- .nk-sidebar-menu -->
        </div><!-- .nk-sidebar-content -->
    </div><!-- .nk-sidebar-element -->
</div>
<!-- sidebar @e -->