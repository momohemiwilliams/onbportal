@extends(Auth::user()->hasRole('external') ? 'layouts.external' : 'layouts.master')

@section('content')
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-lg">
        <div class="nk-content-body">
            <div class="nk-block">
                <div class="card card-bordered">
                    <div class="card-aside-wrap">
                        <div class="card-inner card-inner-lg">
                            <div class="nk-block-head nk-block-head-lg">
                                <div class="nk-block-between">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">Change Password</h4>
                                        <div class="nk-block-des">
                                            <p class="text-soft">Keep your account secure by choosing a strong password that meets the policy below.</p>
                                        </div>
                                    </div>
                                    <div class="nk-block-head-content align-self-start d-lg-none">
                                        <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                    </div>
                                </div>
                            </div>

                            <div class="nk-block">
                                <form action="{{ route('external.profile.password.update') }}" method="POST">
                                    @csrf
                                    <div class="row g-4">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label" for="current-password">Current Password <span class="text-danger">*</span></label>
                                                <div class="form-control-wrap">
                                                    <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="current-password" tabindex="-1">
                                                        <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                        <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                                    </a>
                                                    <input
                                                        required
                                                        type="password"
                                                        name="password"
                                                        id="current-password"
                                                        class="form-control form-control-lg @error('password') is-invalid @enderror"
                                                        placeholder="Enter your current password"
                                                    >
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="new-password">New Password <span class="text-danger">*</span></label>
                                                <div class="form-control-wrap">
                                                    <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="new-password" tabindex="-1">
                                                        <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                        <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                                    </a>
                                                    <input
                                                        required
                                                        type="password"
                                                        name="new_password"
                                                        id="new-password"
                                                        class="form-control form-control-lg @error('new_password') is-invalid @enderror"
                                                        placeholder="Enter new password"
                                                    >
                                                    @error('new_password')
                                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="new-password-confirmation">Confirm New Password <span class="text-danger">*</span></label>
                                                <div class="form-control-wrap">
                                                    <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="new-password-confirmation" tabindex="-1">
                                                        <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                        <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                                    </a>
                                                    <input
                                                        required
                                                        type="password"
                                                        name="new_password_confirmation"
                                                        id="new-password-confirmation"
                                                        class="form-control form-control-lg"
                                                        placeholder="Confirm new password"
                                                    >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="p-3 bg-lighter rounded border">
                                                <h6 class="title mb-2" style="font-size: 0.875rem;">Password Policy</h6>
                                                <ul class="list-unstyled mb-0 text-soft" style="font-size: 0.84rem; line-height: 1.7;">
                                                    <li><em class="icon ni ni-check-circle text-primary mr-1"></em> At least 8 characters long</li>
                                                    <li><em class="icon ni ni-check-circle text-primary mr-1"></em> Different from your current password</li>
                                                    <li><em class="icon ni ni-check-circle text-primary mr-1"></em> At least one uppercase letter (A-Z) and one lowercase letter (a-z)</li>
                                                    <li><em class="icon ni ni-check-circle text-primary mr-1"></em> At least one number (0-9)</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group mt-1">
                                                <button type="submit" class="btn btn-lg btn-primary">Update Password</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        @include('external.partials.profile_sidebar', ['activeTab' => 'password'])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
