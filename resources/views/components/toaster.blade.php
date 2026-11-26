<style>
    .qdop-toast-container {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
        display: flex;
        flex-direction: column;
        gap: 12px;
        max-width: 390px;
        width: calc(100vw - 32px);
        pointer-events: none;
    }
    .qdop-toast {
        pointer-events: auto;
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0 14px 35px rgba(15, 23, 42, 0.16);
        border: 1px solid #e2e8f0;
        border-left: 4px solid #22346c;
        overflow: hidden;
        animation: qdopToastIn 0.28s cubic-bezier(0.16, 1, 0.3, 1);
        transition: opacity 0.25s ease, transform 0.25s ease;
    }
    .qdop-toast.closing {
        opacity: 0;
        transform: translateX(24px);
    }
    .qdop-toast-success { border-left-color: #1ee0ac; }
    .qdop-toast-error   { border-left-color: #e85347; }
    .qdop-toast-info    { border-left-color: #22346c; }
    .qdop-toast-warning { border-left-color: #ad8e4f; }

    .qdop-toast-body {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        padding: 14px 16px;
    }
    .qdop-toast-icon {
        width: 28px;
        height: 28px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        font-size: 14px;
    }
    .qdop-toast-success .qdop-toast-icon { background: rgba(30, 224, 172, 0.14); color: #139b77; }
    .qdop-toast-error .qdop-toast-icon   { background: rgba(232, 83, 71, 0.14); color: #c7372c; }
    .qdop-toast-info .qdop-toast-icon    { background: rgba(34, 52, 108, 0.1); color: #22346c; }
    .qdop-toast-warning .qdop-toast-icon { background: rgba(173, 142, 79, 0.16); color: #8c7036; }

    .qdop-toast-content {
        flex: 1;
        min-width: 0;
    }
    .qdop-toast-title {
        font-size: 13px;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 2px;
    }
    .qdop-toast-msg {
        font-size: 13px;
        color: #475569;
        line-height: 1.45;
        word-wrap: break-word;
    }
    .qdop-toast-close {
        background: none;
        border: none;
        color: #94a3b8;
        font-size: 18px;
        line-height: 1;
        cursor: pointer;
        padding: 0 2px;
    }
    .qdop-toast-close:hover {
        color: #334155;
    }
    .qdop-toast-bar {
        height: 3px;
        width: 100%;
        background: #f1f5f9;
    }
    .qdop-toast-bar-fill {
        height: 100%;
        width: 100%;
        animation: qdopToastProgress 5s linear forwards;
    }
    .qdop-toast:hover .qdop-toast-bar-fill {
        animation-play-state: paused;
    }
    .qdop-toast-success .qdop-toast-bar-fill { background: #1ee0ac; }
    .qdop-toast-error .qdop-toast-bar-fill   { background: #e85347; }
    .qdop-toast-info .qdop-toast-bar-fill    { background: #22346c; }
    .qdop-toast-warning .qdop-toast-bar-fill { background: #ad8e4f; }

    @keyframes qdopToastIn {
        from { opacity: 0; transform: translateX(24px); }
        to   { opacity: 1; transform: translateX(0); }
    }
    @keyframes qdopToastProgress {
        from { width: 100%; }
        to   { width: 0%; }
    }
</style>

@php
    $toasts = [];
    if (session('success')) {
        $toasts[] = ['type' => 'success', 'title' => 'Success', 'message' => session('success')];
    }
    if (session('message')) {
        $toasts[] = ['type' => 'success', 'title' => 'Success', 'message' => session('message')];
    }
    if (session('status')) {
        $toasts[] = ['type' => 'success', 'title' => 'Success', 'message' => session('status')];
    }
    if (session('error')) {
        $toasts[] = ['type' => 'error', 'title' => 'Error', 'message' => session('error')];
    }
    if (session('info')) {
        $toasts[] = ['type' => 'info', 'title' => 'Notice', 'message' => session('info')];
    }
    if (session('warning')) {
        $toasts[] = ['type' => 'warning', 'title' => 'Warning', 'message' => session('warning')];
    }
    if (isset($errors) && $errors->any()) {
        foreach ($errors->all() as $err) {
            $toasts[] = ['type' => 'error', 'title' => 'Validation Error', 'message' => $err];
        }
    }
@endphp

@if (count($toasts) > 0)
<div class="qdop-toast-container" id="qdopToastContainer" aria-live="polite">
    @foreach ($toasts as $toast)
        <div class="qdop-toast qdop-toast-{{ $toast['type'] }}" role="alert">
            <div class="qdop-toast-body">
                <div class="qdop-toast-icon">
                    @if ($toast['type'] === 'success')
                        <em class="icon ni ni-check"></em>
                    @elseif ($toast['type'] === 'error')
                        <em class="icon ni ni-cross"></em>
                    @elseif ($toast['type'] === 'warning')
                        <em class="icon ni ni-alert"></em>
                    @else
                        <em class="icon ni ni-info"></em>
                    @endif
                </div>
                <div class="qdop-toast-content">
                    <div class="qdop-toast-title">{{ $toast['title'] }}</div>
                    <div class="qdop-toast-msg">{{ $toast['message'] }}</div>
                </div>
                <button type="button" class="qdop-toast-close" aria-label="Close" onclick="qdopCloseToast(this.closest('.qdop-toast'))">&times;</button>
            </div>
            <div class="qdop-toast-bar"><div class="qdop-toast-bar-fill"></div></div>
        </div>
    @endforeach
</div>

<script>
function qdopCloseToast(el) {
    if (!el || el.classList.contains('closing')) return;
    el.classList.add('closing');
    setTimeout(function () { el.remove(); }, 250);
}
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('#qdopToastContainer .qdop-toast').forEach(function (toast) {
        let timer = setTimeout(function () { qdopCloseToast(toast); }, 5000);
        toast.addEventListener('mouseenter', function () { clearTimeout(timer); });
        toast.addEventListener('mouseleave', function () {
            timer = setTimeout(function () { qdopCloseToast(toast); }, 2500);
        });
    });
});
</script>
@endif

<script>
document.addEventListener('submit', function (e) {
    if (e.defaultPrevented) return;
    const form = e.target;
    if (!form || form.tagName !== 'FORM') return;
    if (typeof form.checkValidity === 'function' && !form.checkValidity()) return;

    const btn = e.submitter || form.querySelector('button[type="submit"], input[type="submit"]');
    if (!btn || btn.disabled) return;

    setTimeout(function () {
        btn.disabled = true;
        if (btn.tagName === 'BUTTON') {
            const label = btn.textContent.trim() || 'Submitting';
            btn.innerHTML = '';
            const spinner = document.createElement('span');
            spinner.className = 'spinner-border spinner-border-sm mr-2';
            spinner.setAttribute('role', 'status');
            spinner.setAttribute('aria-hidden', 'true');
            spinner.style.width = '1rem';
            spinner.style.height = '1rem';
            spinner.style.flexShrink = '0';
            const textSpan = document.createElement('span');
            textSpan.textContent = label + '...';
            btn.appendChild(spinner);
            btn.appendChild(textSpan);
        }
    }, 0);
});
</script>

