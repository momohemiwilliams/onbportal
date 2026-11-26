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
                                        <h4 class="nk-block-title">Personal Information</h4>
                                        <div class="nk-block-des">
                                            <p class="text-soft">Update your contact name and phone number. Your email address is locked to your account.</p>
                                        </div>
                                    </div>
                                    <div class="nk-block-head-content align-self-start d-lg-none">
                                        <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                    </div>
                                </div>
                            </div>

                            <div class="nk-block">
                                <form action="{{ route('external.profile.update') }}" method="POST">
                                    @csrf
                                    <div class="row g-4">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="profile-name">Full Name <span class="text-danger">*</span></label>
                                                <div class="form-control-wrap">
                                                    <input
                                                        type="text"
                                                        id="profile-name"
                                                        name="name"
                                                        value="{{ old('name', Auth::user()->name) }}"
                                                        class="form-control form-control-lg @error('name') is-invalid @enderror"
                                                        placeholder="Enter your full name"
                                                        required
                                                    >
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="profile-phone">Phone Number <span class="text-danger">*</span></label>
                                                <div class="form-control-wrap">
                                                    <input
                                                        type="text"
                                                        id="profile-phone"
                                                        name="phone"
                                                        value="{{ old('phone', Auth::user()->phone) }}"
                                                        class="form-control form-control-lg @error('phone') is-invalid @enderror"
                                                        placeholder="Enter your phone number"
                                                        required
                                                    >
                                                    @error('phone')
                                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label" for="profile-email">Email Address</label>
                                                <div class="form-control-wrap">
                                                    <div class="form-icon form-icon-right">
                                                        <em class="icon ni ni-lock-alt text-soft"></em>
                                                    </div>
                                                    <input
                                                        type="email"
                                                        id="profile-email"
                                                        value="{{ Auth::user()->email }}"
                                                        class="form-control form-control-lg bg-light"
                                                        readonly
                                                        disabled
                                                    >
                                                </div>
                                                <div class="form-note text-soft">Email address cannot be changed after registration.</div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group mt-2">
                                                <button type="submit" class="btn btn-lg btn-primary">Save Changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        @include('external.partials.profile_sidebar', ['activeTab' => 'profile'])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
