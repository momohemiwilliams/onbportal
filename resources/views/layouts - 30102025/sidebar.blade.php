 <!-- sidebar @s --> 
 <div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-sidebar-brand">
            <a href="{{url('home')}}" class="logo-link nk-sidebar-logo">
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
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                @if(Auth::user()->hasRole('DsdAdmin')  ||  Auth::user()->hasRole('DodAdmin') ||  Auth::user()->hasRole('MegAdmin')
                ||  Auth::user()->hasRole('IcgAdmin') )
                <ul class="nk-menu">
                    <li class="nk-menu-heading">
                        
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="{{route('home')}}" class="nk-menu-link">
                            <span class="nk-menu-icon" style="color: white"><em class="icon ni ni-bag"></em></span>
                            <span class="nk-menu-text" style="color: white">Dashboard</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    {{-- <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>
                            <span class="nk-menu-text">Users Management</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{url('users')}}" class="nk-menu-link"><span class="nk-menu-text">Users</span></a>
                                
                            </li>
                        
                        </ul>
                    </li> --}}
                   
                   
                    {{-- <li class="nk-menu-item">
                        <a href="{{url('participants')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-book-read"></em></span>
                            <span class="nk-menu-text">Applications 
                        </a>
                    </li><!-- .nk-menu-item --> --}}


                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon" style="color: white"><em class="icon ni ni-card-view"></em></span>
                            <span class="nk-menu-text" style="color: white">Applications</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{url('allapplications')}}" class="nk-menu-link" style="color: white"><span class="nk-menu-text">All Applications</span></a>
                            </li>
                            {{-- <li class="nk-menu-item">
                                <a href="html/product-card.html" class="nk-menu-link"><span class="nk-menu-text">Pending</span></a>
                            </li> --}}
                          
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->

                    <li class="nk-menu-item">
                        <a href="{{route('internal.reports.index')}}" class="nk-menu-link">
                            <span class="nk-menu-icon" style="color: white"><em class="icon ni ni-card-view"></em></span>
                            <span class="nk-menu-text" style="color: white">Reports</span>
                        </a>
                    </li>

                </ul>
                @endif


                @if(Auth::user()->hasRole('Admin'))
                <ul class="nk-menu">
                    <li class="nk-menu-heading">
                       
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="{{route('home')}}" class="nk-menu-link">
                            <span class="nk-menu-icon" style="color: white"><em class="icon ni ni-bag"></em></span>
                            <span class="nk-menu-text" style="color: white">Dashboard</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon" style="color: white"><em class="icon ni ni-users-fill"></em></span>
                            <span class="nk-menu-text" style="color: white">Users Management</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{url('users')}}" class="nk-menu-link" style="color: white"><span class="nk-menu-text">Users</span></a>
                                <a href="#" class="nk-menu-link" style="color: white"><span class="nk-menu-text">Groups</span></a>
                            </li>
                        
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon" style="color: white"><em class="icon ni ni-cc-alt2-fill"></em></span>
                            <span class="nk-menu-text" style="color: white">Roles And Permissions</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{url('roles')}}" class="nk-menu-link" style="color: white"><span class="nk-menu-text">Roles</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{url('permissions')}}" class="nk-menu-link" style="color: white"><span class="nk-menu-text">Permissions</span></a>
                            </li>
                            
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="{{url('groups')}}" class="nk-menu-link">
                            <span class="nk-menu-icon" style="color: white"><em class="icon ni ni-book-read"></em></span>
                            <span class="nk-menu-text" style="color: white">Group Management
                        </a>
                    </li><!-- .nk-menu-item -->
                    <<!-- .nk-menu-item -->


                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon" style="color: white"><em class="icon ni ni-card-view"></em></span>
                            <span class="nk-menu-text" style="color: white">Participants</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{url('participants')}}" class="nk-menu-link" style="color: white"><span class="nk-menu-text">Completed</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="html/product-card.html" class="nk-menu-link" style="color: white"><span class="nk-menu-text">Pending</span></a>
                            </li>
                          
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->

              
                </ul>
                @endif
                
                <!-- .nk-menu -->
            </div><!-- .nk-sidebar-menu -->
        </div><!-- .nk-sidebar-content -->
    </div><!-- .nk-sidebar-element -->
</div>
<!-- sidebar @e -->