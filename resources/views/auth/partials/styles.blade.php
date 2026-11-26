<style>
    .nk-wrap-nosidebar {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }
    .qdop-auth-wrapper {
        flex: 1 0 auto;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2.5rem 1rem;
        background-image: linear-gradient(rgba(16, 30, 68, 0.58), rgba(16, 30, 68, 0.72)), url({{ asset('assets/images/onboard-bg.png') }});
        background-color: #162652;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    .qdop-auth-box {
        width: 100%;
        max-width: 460px;
    }
    .qdop-auth-box.wide {
        max-width: 680px;
    }
    .qdop-auth-card {
        background: #ffffff;
        border-radius: 14px;
        border: none;
        border-top: 5px solid #ad8e4f;
        box-shadow: 0 24px 60px rgba(10, 22, 56, 0.35);
        overflow: hidden;
    }
    .qdop-auth-card .card-inner-lg {
        padding: 2.25rem 2.25rem 2rem;
    }
    .qdop-auth-title {
        color: #22346c;
        font-weight: 700;
        font-size: 1.15rem;
        margin-bottom: 0.25rem;
    }
    .qdop-auth-subtitle {
        color: #1e293b;
        font-weight: 700;
        font-size: 1.25rem;
        margin-bottom: 0.25rem;
    }
    .qdop-auth-card .form-control-lg {
        border-radius: 8px;
        border-color: #cbd5e1;
        font-size: 0.92rem;
        height: 44px;
    }
    .qdop-auth-card .form-control-lg:focus {
        border-color: #22346c;
        box-shadow: 0 0 0 3px rgba(34, 52, 108, 0.12);
    }
    .qdop-auth-card .btn-primary {
        background-color: #ad8e4f !important;
        border-color: #ad8e4f !important;
        border-radius: 8px;
        font-weight: 600;
        height: 46px;
    }
    .qdop-auth-card .btn-primary:hover {
        background-color: #96793e !important;
        border-color: #96793e !important;
    }
    .qdop-policy-box {
        background-color: #f8fafc;
        border: 1px solid #e2e8f0;
        border-left: 3px solid #22346c;
        border-radius: 8px;
        padding: 12px 14px;
        margin-bottom: 1rem;
    }
    .qdop-policy-box ul {
        margin: 6px 0 0;
        padding-left: 1.1rem;
        font-size: 12px;
        color: #475569;
        line-height: 1.55;
    }
</style>

