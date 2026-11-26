@extends('layouts.master-without-nav')

@section('content')
<style>
    .nk-wrap-nosidebar {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }
    .qdop-error-wrapper {
        flex: 1 0 auto;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2.5rem 1rem;
        background-image: linear-gradient(rgba(16, 30, 68, 0.55), rgba(16, 30, 68, 0.65)), url({{ asset('assets/images/onboard-bg.png') }});
        background-color: #162652;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    .qdop-error-card {
        width: 100%;
        max-width: 560px;
        background: #ffffff;
        border-radius: 14px;
        border: none;
        border-top: 5px solid #ad8e4f;
        box-shadow: 0 24px 60px rgba(10, 22, 56, 0.35);
        overflow: hidden;
    }
    .qdop-error-badge {
        width: 64px;
        height: 64px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: rgba(34, 52, 108, 0.08);
        color: #22346c;
        font-size: 1.75rem;
        margin-bottom: 1rem;
    }
    .qdop-error-code {
        font-size: 4.5rem;
        font-weight: 800;
        letter-spacing: -0.03em;
        line-height: 1;
        color: #22346c;
        margin: 0;
    }
    .qdop-btn-navy {
        background-color: #22346c !important;
        border-color: #22346c !important;
        color: #ffffff !important;
    }
    .qdop-btn-navy:hover {
        background-color: #192754 !important;
        border-color: #192754 !important;
    }
    .qdop-btn-gold {
        background-color: #ad8e4f !important;
        border-color: #ad8e4f !important;
        color: #ffffff !important;
    }
    .qdop-btn-gold:hover {
        background-color: #96793e !important;
        border-color: #96793e !important;
    }
</style>

<div class="qdop-error-wrapper">
    <div class="qdop-error-card">
        <div class="card-inner card-inner-lg text-center py-5 px-4 px-sm-5">
            <div class="brand-logo pb-3 text-center">
                <a href="{{ auth()->check() ? route('home') : url('/') }}" class="logo-link">
                    <img class="logo-dark logo-img" style="max-height: 42px;" src="{{ asset('assets/images/FMDQlogo.svg') }}" alt="FMDQ Logo">
                </a>
                <div class="text-soft small mt-1">Q-Depository Onboarding Portal</div>
            </div>

            <div class="qdop-error-badge">
                <em class="icon ni @yield('icon', 'ni-alert-circle')"></em>
            </div>

            <h1 class="qdop-error-code">@yield('code')</h1>
            <h4 class="mt-3 mb-2" style="color: #22346c; font-weight: 600;">@yield('title')</h4>
            <p class="text-soft mb-4 mx-auto" style="max-width: 440px; font-size: 0.95rem; line-height: 1.6;">
                @yield('message')
            </p>

            <div class="d-flex justify-content-center">
                <a href="{{ auth()->check() ? route('home') : url('/') }}" class="btn btn-md qdop-btn-navy px-4">
                    <em class="icon ni ni-home mr-1"></em>
                    <span>{{ auth()->check() ? 'Back to Dashboard' : 'Back to Home' }}</span>
                </a>
            </div>

            <div class="mt-4 pt-3 border-top text-soft small">
                Need assistance? Contact <a href="mailto:dsd@fmdqgroup.com" style="color: #22346c; font-weight: 600;">dsd@fmdqgroup.com</a>
            </div>
        </div>
    </div>
</div>
@endsection
