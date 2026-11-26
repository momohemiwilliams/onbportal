<style>
    .qdop-pub-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 14px 5%;
        background-color: rgba(255, 255, 255, 0.96);
        backdrop-filter: blur(8px);
        border-bottom: 1px solid #e2e8f0;
        position: sticky;
        top: 0;
        z-index: 1020;
        width: 100%;
    }
    .qdop-pub-logo {
        display: flex;
        align-items: center;
        gap: 12px;
        text-decoration: none !important;
    }
    .qdop-pub-logo img {
        height: 38px;
        width: auto;
    }
    .qdop-pub-divider {
        width: 1px;
        height: 24px;
        background-color: #cbd5e1;
    }
    .qdop-pub-subtitle {
        font-size: 13px;
        font-weight: 600;
        color: #475569;
        letter-spacing: 0.02em;
    }
    .qdop-pub-actions {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .qdop-pub-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 8px 22px;
        font-size: 14px;
        font-weight: 600;
        border-radius: 6px;
        text-decoration: none !important;
        border: 2px solid #22346c;
        cursor: pointer;
        transition: all 0.2s ease;
        line-height: 1.4;
    }
    .qdop-pub-btn-outline {
        background-color: #ffffff;
        color: #22346c !important;
    }
    .qdop-pub-btn-outline:hover {
        background-color: #22346c;
        color: #ffffff !important;
    }
    .qdop-pub-btn-primary {
        background-color: #22346c;
        color: #ffffff !important;
    }
    .qdop-pub-btn-primary:hover {
        background-color: #182652;
        border-color: #182652;
        color: #ffffff !important;
    }
    @media (max-width: 768px) {
        .qdop-pub-divider, .qdop-pub-subtitle {
            display: none;
        }
    }
</style>

<header class="qdop-pub-header">
    <a href="{{ route('landing') }}" class="qdop-pub-logo">
        <img src="{{ asset('assets/images/FMDQ_Logo.png') }}" alt="FMDQ Logo">
        <span class="qdop-pub-divider"></span>
        <span class="qdop-pub-subtitle">Q-Depository Onboarding Portal</span>
    </a>
    <div class="qdop-pub-actions">
        @auth
            <a href="{{ route('home') }}" class="qdop-pub-btn qdop-pub-btn-primary">Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="qdop-pub-btn qdop-pub-btn-outline">Login</a>
            <a href="{{ route('register') }}" class="qdop-pub-btn qdop-pub-btn-primary">Sign Up</a>
        @endauth
    </div>
</header>

