<div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg" data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
    <div class="card-inner-group" data-simplebar>
        <div class="card-inner">
            <div class="user-card">
                <div class="user-avatar bg-primary">
                    <span>{{ mb_strtoupper(mb_substr(Auth::user()->name, 0, 1)) }}</span>
                </div>
                <div class="user-info">
                    <span class="lead-text">{{ Auth::user()->name }}</span>
                    <span class="sub-text">{{ Auth::user()->email }}</span>
                </div>
            </div>
        </div>
        <div class="card-inner p-0">
            <ul class="link-list-menu">
                <li>
                    <a class="{{ ($activeTab ?? '') === 'profile' ? 'active' : '' }}" href="{{ route('external.profile') }}">
                        <em class="icon ni ni-user-fill-c"></em>
                        <span>Personal Information</span>
                    </a>
                </li>
                <li>
                    <a class="{{ ($activeTab ?? '') === 'password' ? 'active' : '' }}" href="{{ route('external.profile.password') }}">
                        <em class="icon ni ni-lock-alt-fill"></em>
                        <span>Change Password</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

