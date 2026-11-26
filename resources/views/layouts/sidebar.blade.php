@php
    $user = Auth::user();
    $isDashboard = request()->routeIs('home') || request()->routeIs('internal.dashboard');
    $isApplications = request()->routeIs('internal.applications.*') || request()->is('allapplications') || request()->is('applications/*') || request()->is('participant/*');
    $isReports = request()->routeIs('internal.reports.*') || request()->is('report');
    $isProfile = request()->routeIs('external.profile*');
    $isUsers = request()->routeIs('users.*') || request()->routeIs('groups.*');
    $isRoles = request()->routeIs('roles.*') || request()->routeIs('permissions.*');
@endphp

@include('layouts.partials.sidebar_styles')

<!-- sidebar @s -->
<div class="nk-sidebar nk-sidebar-fixed is-light" data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head qdop-sidebar-head">
        <div class="nk-sidebar-brand">
            <a href="{{ route('home') }}" class="logo-link nk-sidebar-logo">
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
                @if($user->hasRole('DsdAdmin') || $user->hasRole('DodAdmin') || $user->hasRole('MegAdmin') || $user->hasRole('IcgAdmin'))
                    <ul class="nk-menu">
                        <li class="qdop-nav-label">Operations</li>

                        <li class="nk-menu-item {{ $isDashboard ? 'active' : '' }}">
                            <a href="{{ route('home') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span>
                                <span class="nk-menu-text">Dashboard</span>
                            </a>
                        </li>

                        <li class="nk-menu-item has-sub {{ $isApplications ? 'active' : '' }}">
                            <a href="#" class="nk-menu-link nk-menu-toggle">
                                <span class="nk-menu-icon"><em class="icon ni ni-card-view"></em></span>
                                <span class="nk-menu-text">Applications</span>
                            </a>
                            <ul class="nk-menu-sub">
                                <li class="nk-menu-item {{ request()->is('allapplications') ? 'active' : '' }}">
                                    <a href="{{ route('internal.applications.index') }}" class="nk-menu-link">
                                        <span class="nk-menu-text">All Applications</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nk-menu-item {{ $isReports ? 'active' : '' }}">
                            <a href="{{ route('internal.reports.index') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-bar-chart"></em></span>
                                <span class="nk-menu-text">Reports</span>
                            </a>
                        </li>

                        <li class="qdop-nav-label mt-3">Account</li>

                        <li class="nk-menu-item {{ $isProfile ? 'active' : '' }}">
                            <a href="{{ route('external.profile') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-user-circle"></em></span>
                                <span class="nk-menu-text">Account Settings</span>
                            </a>
                        </li>
                    </ul>
                @endif

                @if($user->hasRole('Admin'))
                    <ul class="nk-menu">
                        <li class="qdop-nav-label">Administration</li>

                        <li class="nk-menu-item {{ $isDashboard ? 'active' : '' }}">
                            <a href="{{ route('home') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span>
                                <span class="nk-menu-text">Dashboard</span>
                            </a>
                        </li>

                        <li class="nk-menu-item has-sub {{ $isUsers ? 'active' : '' }}">
                            <a href="#" class="nk-menu-link nk-menu-toggle">
                                <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>
                                <span class="nk-menu-text">Users Management</span>
                            </a>
                            <ul class="nk-menu-sub">
                                <li class="nk-menu-item {{ request()->routeIs('users.*') ? 'active' : '' }}">
                                    <a href="{{ route('users.index') }}" class="nk-menu-link"><span class="nk-menu-text">Users</span></a>
                                </li>
                                <li class="nk-menu-item {{ request()->routeIs('groups.*') ? 'active' : '' }}">
                                    <a href="{{ route('groups.index') }}" class="nk-menu-link"><span class="nk-menu-text">Groups</span></a>
                                </li>
                            </ul>
                        </li>

                        <li class="nk-menu-item has-sub {{ $isRoles ? 'active' : '' }}">
                            <a href="#" class="nk-menu-link nk-menu-toggle">
                                <span class="nk-menu-icon"><em class="icon ni ni-cc-alt2-fill"></em></span>
                                <span class="nk-menu-text">Roles &amp; Permissions</span>
                            </a>
                            <ul class="nk-menu-sub">
                                <li class="nk-menu-item {{ request()->routeIs('roles.*') ? 'active' : '' }}">
                                    <a href="{{ route('roles.index') }}" class="nk-menu-link"><span class="nk-menu-text">Roles</span></a>
                                </li>
                                <li class="nk-menu-item {{ request()->routeIs('permissions.*') ? 'active' : '' }}">
                                    <a href="{{ route('permissions.index') }}" class="nk-menu-link"><span class="nk-menu-text">Permissions</span></a>
                                </li>
                            </ul>
                        </li>

                        <li class="nk-menu-item {{ request()->routeIs('groups.*') ? 'active' : '' }}">
                            <a href="{{ route('groups.index') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-book-read"></em></span>
                                <span class="nk-menu-text">Group Management</span>
                            </a>
                        </li>

                        <li class="qdop-nav-label mt-3">Account</li>

                        <li class="nk-menu-item {{ $isProfile ? 'active' : '' }}">
                            <a href="{{ route('external.profile') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-user-circle"></em></span>
                                <span class="nk-menu-text">Account Settings</span>
                            </a>
                        </li>
                    </ul>
                @endif
            </div><!-- .nk-sidebar-menu -->

            <div class="qdop-sidebar-footer">
                <div class="qdop-sidebar-user">
                    <div class="qdop-sidebar-avatar">
                        {{ mb_strtoupper(mb_substr($user->name ?? 'U', 0, 1)) }}
                    </div>
                    <div class="qdop-sidebar-user-meta">
                        <div class="qdop-sidebar-user-name">{{ $user->name }}</div>
                        <div class="qdop-sidebar-user-role">Internal Portal</div>
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
