<style>
    .qdop-wizard-header {
        padding: 1.5rem 2rem 1rem;
        border-top: 4px solid #ad8e4f;
        border-bottom: 1px solid #e2e8f0;
        background-color: #ffffff;
    }
    .qdop-step-pill {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 700;
        background-color: rgba(34, 52, 108, 0.08);
        color: #22346c;
    }
    .qdop-tabs-bar {
        background-color: #f8fafc;
        padding: 0 1.25rem;
        border-bottom: 1px solid #e2e8f0;
    }
    .qdop-tabs-bar .nav-link {
        font-size: 13px;
        font-weight: 600;
        padding: 0.9rem 0.85rem;
        border-bottom: 3px solid transparent;
    }
    .qdop-tabs-bar .nav-link.active {
        color: #22346c !important;
        border-bottom-color: #ad8e4f !important;
        background-color: #ffffff;
    }
    .qdop-tabs-bar .nav-link.disabled {
        opacity: 0.55;
        cursor: not-allowed;
    }
    .card-inner .form-control {
        border-radius: 7px;
        border-color: #cbd5e1;
    }
    .card-inner .form-control:focus {
        border-color: #22346c;
        box-shadow: 0 0 0 3px rgba(34, 52, 108, 0.1);
    }
    .card-inner input[type="file"].form-control {
        height: auto;
        padding: 5px 10px;
        background-color: #f8fafc;
        font-size: 13px;
        line-height: 1.4;
    }
    .card-inner input[type="file"].form-control::file-selector-button,
    .card-inner input[type="file"].form-control::-webkit-file-upload-button {
        background-color: #22346c;
        color: #ffffff;
        border: none;
        border-radius: 5px;
        padding: 5px 12px;
        margin-right: 10px;
        font-size: 12px;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.2s ease;
    }
    .card-inner input[type="file"].form-control::file-selector-button:hover,
    .card-inner input[type="file"].form-control::-webkit-file-upload-button:hover {
        background-color: #182652;
    }
    .qdop-file-col {
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
    }
    .qdop-file-col .form-label {
        margin-bottom: 6px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 4px;
    }
</style>

<div class="qdop-wizard-header d-flex justify-content-between align-items-center flex-wrap" style="gap: 0.75rem;">
    <div>
        <h3 class="nk-block-title page-title mb-0" style="color: #22346c;">
            Depository Participant Onboarding ({{ $displayEligibility }})
        </h3>
    </div>
    <span class="qdop-step-pill">Step {{ $activeStep }} of 6</span>
</div>

@php
    $appId = $application ? $application->id : null;
    $maxDone = $maxStepCompleted ?? ($application ? (int) $application->max_step_completed : 0);
    $steps = [
        1 => ['label' => 'Participant Details', 'icon' => 'ni-user-circle', 'route' => $appId ? route('external.onboarding.step1.edit', $appId) : route('external.onboarding.step1.create')],
        2 => ['label' => 'Principal Officer(s) Details', 'icon' => 'ni-users', 'route' => $appId ? route('external.onboarding.step2.edit', $appId) : '#'],
        3 => ['label' => 'Correspondence Email Address', 'icon' => 'ni-mail', 'route' => $appId ? route('external.onboarding.step3.edit', $appId) : '#'],
        4 => ['label' => 'Company Documents', 'icon' => 'ni-file-text', 'route' => $appId ? route('external.onboarding.step4.edit', $appId) : '#'],
        5 => ['label' => 'Signature Mandate and Declaration', 'icon' => 'ni-pen', 'route' => $appId ? route('external.onboarding.step5.edit', $appId) : '#'],
        6 => ['label' => 'Deferral Request (If Applicable)', 'icon' => 'ni-clock', 'route' => $appId ? route('external.onboarding.step6.edit', $appId) : '#'],
    ];
@endphp

<ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card qdop-tabs-bar">
    @foreach ($steps as $num => $step)
        @php
            $isActive = ($activeStep === $num);
            $isClickable = ($num === 1) || ($appId && $maxDone >= ($num - 1));
        @endphp
        <li class="nav-item">
            <a class="nav-link {{ $isActive ? 'active' : '' }} {{ !$isClickable ? 'disabled text-muted' : '' }}"
               href="{{ $isClickable ? $step['route'] : 'javascript:void(0);' }}"
               @if(!$isClickable) aria-disabled="true" onclick="return false;" title="Complete previous step first" @endif>
                <em class="icon ni {{ $step['icon'] }}"></em>
                <span>{{ $step['label'] }}</span>
            </a>
        </li>
    @endforeach
</ul>

<!-- PDF Validation Modal -->
<div class="modal fade" id="pdfValidationModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content text-center p-4" style="border-radius: 12px; border-top: 4px solid #e85347;">
            <div class="mb-2">
                <em class="icon ni ni-cross-circle text-danger" style="font-size: 3rem;"></em>
            </div>
            <h5 id="pdfModalTitle" class="mb-2">Invalid File Type</h5>
            <p id="pdfModalMessage" class="text-soft mb-3"></p>
            <button type="button" class="btn btn-success btn-sm px-4" data-dismiss="modal">OK</button>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const maxBytes = 5 * 1024 * 1024;
    document.querySelectorAll('input[type="file"].pdf-validate').forEach(function (input) {
        input.addEventListener('change', function () {
            if (!this.files || !this.files.length) return;
            const file = this.files[0];
            const isPdf = file.type === 'application/pdf' || file.name.toLowerCase().endsWith('.pdf');
            if (!isPdf) {
                document.getElementById('pdfModalTitle').textContent = 'Invalid File Type';
                document.getElementById('pdfModalMessage').textContent = 'The file "' + file.name + '" is not a PDF. Please upload only PDF files.';
                $('#pdfValidationModal').modal('show');
                this.value = '';
                return;
            }
            if (file.size > maxBytes) {
                document.getElementById('pdfModalTitle').textContent = 'File Too Large';
                document.getElementById('pdfModalMessage').textContent = 'The file "' + file.name + '" exceeds the maximum allowed size of 5MB.';
                $('#pdfValidationModal').modal('show');
                this.value = '';
            }
        });
    });
});
</script>
