@php
    $user = Auth::user();
    $userdda = \App\Models\MemberOnboarding::where('user_id', $user->id)->latest('id')->first();
    $isDashboard = request()->routeIs('external.dashboard');
    $isProfile = request()->routeIs('external.profile*');
    $isApplication = request()->routeIs('external.onboarding.*') || request()->routeIs('external.application.*');
@endphp

@include('layouts.partials.sidebar_styles')

<!-- sidebar @s -->
<div class="nk-sidebar nk-sidebar-fixed is-light" data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head qdop-sidebar-head">
        <div class="nk-sidebar-brand">
            <a href="{{ route('external.dashboard') }}" class="logo-link nk-sidebar-logo">
                <img class="logo-light logo-img logo-img-lg" src="{{ asset('public/assets/images/FMDQlogo.svg') }}" srcset="{{ asset('assets/images/FMDQlogo.svg') }}" alt="FMDQ">
                <img class="logo-dark logo-img logo-img-lg" src="{{ asset('public/assets/images/FMDQlogo.svg') }}" srcset="{{ asset('assets/images/FMDQlogo.svg') }}" alt="FMDQ">
            </a>
        </div>
        <div class="nk-menu-trigger mr-n2">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
        </div>
    </div><!-- .nk-sidebar-element -->

    <div class="nk-sidebar-element qdop-sidebar-body">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <ul class="nk-menu">
                    <li class="qdop-nav-label">Onboarding</li>

                    <li class="nk-menu-item {{ $isDashboard ? 'active' : '' }}">
                        <a href="{{ route('external.dashboard') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span>
                            <span class="nk-menu-text">Dashboard</span>
                        </a>
                    </li>

                    @if(!empty($userdda))
                        @if(in_array((int) $userdda->approval_status, [1, 2, 3, 4, 45, 9]))
                            <li class="nk-menu-item {{ $isApplication ? 'active' : '' }}">
                                <a href="{{ route('external.onboarding.step1.edit', $userdda->id) }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-edit"></em></span>
                                    <span class="nk-menu-text">Continue Application</span>
                                </a>
                            </li>
                        @elseif((int) $userdda->approval_status >= 5)
                            <li class="nk-menu-item {{ $isApplication ? 'active' : '' }}">
                                <a href="{{ route('external.application.show', $userdda->id) }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-file-check"></em></span>
                                    <span class="nk-menu-text">View Application</span>
                                </a>
                            </li>
                        @endif
                    @endif

                    <li class="qdop-nav-label mt-3">Account</li>

                    <li class="nk-menu-item {{ $isProfile ? 'active' : '' }}">
                        <a href="{{ route('external.profile') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-user-circle"></em></span>
                            <span class="nk-menu-text">Account Settings</span>
                        </a>
                    </li>
                </ul><!-- .nk-menu -->
            </div><!-- .nk-sidebar-menu -->

            <div class="qdop-sidebar-footer">
                <div class="qdop-sidebar-user">
                    <div class="qdop-sidebar-avatar">
                        {{ mb_strtoupper(mb_substr($user->name ?? 'U', 0, 1)) }}
                    </div>
                    <div class="qdop-sidebar-user-meta">
                        <div class="qdop-sidebar-user-name">{{ $user->name }}</div>
                        <div class="qdop-sidebar-user-role">Participant Portal</div>
                    </div>
                </div>
                <a href="{{ route('logout.get') }}" class="qdop-sidebar-signout">
                    <em class="icon ni ni-signout"></em>
                    <span>Sign Out</span>
                </a>
            </div>
        </div><!-- .nk-sidebar-content -->
    </div><!-- .nk-sidebar-element -->
</div>
<!-- sidebar @e -->
