@extends('layouts.external')

@section('content')
<style>
    .qdop-dash-card {
        border-radius: 12px;
        border: 1px solid #e2e8f0;
        border-top: 4px solid #ad8e4f;
        box-shadow: 0 10px 30px rgba(15, 23, 42, 0.06);
        overflow: hidden;
    }
    .qdop-progress-pane {
        background-color: #f8fafc;
        border-right: 1px solid #e2e8f0;
    }
    .qdop-progress-track {
        height: 8px;
        background-color: #e2e8f0;
        border-radius: 999px;
        overflow: hidden;
    }
    .qdop-progress-fill {
        height: 100%;
        background: linear-gradient(90deg, #22346c 0%, #ad8e4f 100%);
        border-radius: 999px;
        transition: width 0.35s ease;
    }
    .qdop-step-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .qdop-step-item {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        padding: 9px 0;
        font-size: 13.5px;
        color: #64748b;
    }
    .qdop-step-item.done {
        color: #1e293b;
        font-weight: 600;
    }
    .qdop-step-dot {
        width: 22px;
        height: 22px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        font-size: 11px;
        font-weight: 700;
        border: 1.5px solid #cbd5e1;
        background: #ffffff;
        color: #64748b;
        margin-top: 1px;
    }
    .qdop-step-item.done .qdop-step-dot {
        background-color: #1ee0ac;
        border-color: #1ee0ac;
        color: #ffffff;
    }
    .qdop-elig-pill {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 600;
        background-color: rgba(34, 52, 108, 0.08);
        color: #22346c;
    }
    #eligibilityModal .modal-content {
        border-radius: 14px;
        border: none;
        border-top: 5px solid #ad8e4f;
        box-shadow: 0 24px 60px rgba(10, 22, 56, 0.25);
    }
    #eligibilityModal .form-control {
        height: 44px;
        border-radius: 8px;
        border-color: #cbd5e1;
    }
    #eligibilityModal textarea.form-control {
        height: auto;
    }
    #eligibilityModal .form-control:focus {
        border-color: #22346c;
        box-shadow: 0 0 0 3px rgba(34, 52, 108, 0.12);
    }
</style>

<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-lg">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-lg wide-sm mx-auto pb-4">
                <div class="nk-block-head-content text-center">
                    <span class="qdop-elig-pill mb-2">Q-Depository Onboarding Portal</span>
                    <h2 class="nk-block-title fw-bold" style="color: #22346c;">Welcome, {{ Auth::user()->name }}</h2>
                    <div class="nk-block-des">
                        <p class="text-soft">Track your participant onboarding progress and manage your submission.</p>
                    </div>
                </div>
            </div>

            @php
                $completed = $application ? $application->completedTrackerSteps() : 0;
                $percentage = $application ? $application->trackerPercentage() : 0;
                $status = $application ? (int) $application->approval_status : 0;

                $nextRoute = null;
                if ($application) {
                    $maxStep = (int) ($application->max_step_completed ?? 0);
                    if ($status === 9) {
                        $nextRoute = route('external.onboarding.step1.edit', $application->id);
                    } elseif ($maxStep <= 1) {
                        $nextRoute = route('external.onboarding.step2.edit', $application->id);
                    } elseif ($maxStep === 2) {
                        $nextRoute = route('external.onboarding.step3.edit', $application->id);
                    } elseif ($maxStep === 3) {
                        $nextRoute = route('external.onboarding.step4.edit', $application->id);
                    } elseif ($maxStep === 4) {
                        $nextRoute = route('external.onboarding.step5.edit', $application->id);
                    } else {
                        $nextRoute = route('external.onboarding.step6.edit', $application->id);
                    }
                }
            @endphp

            <div class="nk-block">
                <div class="card qdop-dash-card">
                    <div class="row no-gutters">
                        <div class="col-lg-4 qdop-progress-pane">
                            <div class="card-inner-group h-100 d-flex flex-column justify-content-between">
                                <div class="card-inner pb-2">
                                    <h5 class="mb-1" style="color: #22346c;">Application Progress</h5>
                                    <p class="text-soft small mb-0">Complete all steps to submit for review.</p>
                                </div>
                                <div class="card-inner py-2">
                                    <ul class="qdop-step-list">
                                        <li class="qdop-step-item {{ $completed >= 1 ? 'done' : '' }}">
                                            <span class="qdop-step-dot">{!! $completed >= 1 ? '&#10003;' : '1' !!}</span>
                                            <span>Participant Details</span>
                                        </li>
                                        <li class="qdop-step-item {{ $completed >= 2 ? 'done' : '' }}">
                                            <span class="qdop-step-dot">{!! $completed >= 2 ? '&#10003;' : '2' !!}</span>
                                            <span>Principal Officer(s) Details</span>
                                        </li>
                                        <li class="qdop-step-item {{ $completed >= 3 ? 'done' : '' }}">
                                            <span class="qdop-step-dot">{!! $completed >= 3 ? '&#10003;' : '3' !!}</span>
                                            <span>Correspondence Email Address</span>
                                        </li>
                                        <li class="qdop-step-item {{ $completed >= 4 ? 'done' : '' }}">
                                            <span class="qdop-step-dot">{!! $completed >= 4 ? '&#10003;' : '4' !!}</span>
                                            <span>Upload Company Documents</span>
                                        </li>
                                        <li class="qdop-step-item {{ $completed >= 5 ? 'done' : '' }}">
                                            <span class="qdop-step-dot">{!! $completed >= 5 ? '&#10003;' : '5' !!}</span>
                                            <span>Upload Signature Mandate Form and Declaration Form</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-inner pt-2">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="small font-weight-bold" style="color: #22346c;">{{ $completed }}/5 Completed</span>
                                        <span class="small text-soft font-weight-bold">{{ $percentage }}%</span>
                                    </div>
                                    <div class="qdop-progress-track">
                                        <div class="qdop-progress-fill" style="width: {{ $percentage }}%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div class="card-inner card-inner-lg h-100 d-flex align-items-center">
                                <div class="align-center flex-wrap flex-md-nowrap g-4 w-100">
                                    <div class="nk-block-image w-180px flex-shrink-0 order-first order-md-last mx-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 114 113.9">
                                            <path d="M87.84,110.34l-48.31-7.86a3.55,3.55,0,0,1-3.1-4L48.63,29a3.66,3.66,0,0,1,4.29-2.8L101.24,34a3.56,3.56,0,0,1,3.09,4l-12.2,69.52A3.66,3.66,0,0,1,87.84,110.34Z" transform="translate(-4 -2.1)" fill="#c4cefe" />
                                            <path d="M33.73,105.39,78.66,98.1a3.41,3.41,0,0,0,2.84-3.94L69.4,25.05a3.5,3.5,0,0,0-4-2.82L20.44,29.51a3.41,3.41,0,0,0-2.84,3.94l12.1,69.11A3.52,3.52,0,0,0,33.73,105.39Z" transform="translate(-4 -2.1)" fill="#c4cefe" />
                                            <rect x="22" y="17.9" width="66" height="88" rx="3" ry="3" fill="#6576ff" />
                                            <rect x="31" y="85.9" width="48" height="10" rx="1.5" ry="1.5" fill="#fff" />
                                            <rect x="31" y="27.9" width="48" height="5" rx="1" ry="1" fill="#e3e7fe" />
                                            <rect x="31" y="37.9" width="23" height="3" rx="1" ry="1" fill="#c4cefe" />
                                            <rect x="59" y="37.9" width="20" height="3" rx="1" ry="1" fill="#c4cefe" />
                                            <rect x="31" y="45.9" width="23" height="3" rx="1" ry="1" fill="#c4cefe" />
                                            <rect x="59" y="45.9" width="20" height="3" rx="1" ry="1" fill="#c4cefe" />
                                            <rect x="31" y="52.9" width="48" height="3" rx="1" ry="1" fill="#e3e7fe" />
                                            <rect x="31" y="60.9" width="23" height="3" rx="1" ry="1" fill="#c4cefe" />
                                            <path d="M107.66,7.05A5.66,5.66,0,0,0,103.57,3,47.45,47.45,0,0,0,85.48,3h0A5.66,5.66,0,0,0,81.4,7.06a47.51,47.51,0,0,0,0,18.1,5.67,5.67,0,0,0,4.08,4.07,47.57,47.57,0,0,0,9,.87,47.78,47.78,0,0,0,9.06-.87,5.66,5.66,0,0,0,4.08-4.09A47.45,47.45,0,0,0,107.66,7.05Z" transform="translate(-4 -2.1)" fill="#2ec98a" />
                                            <path d="M100.66,12.81l-1.35,1.47c-1.9,2.06-3.88,4.21-5.77,6.3a1.29,1.29,0,0,1-1,.42h0a1.27,1.27,0,0,1-1-.42c-1.09-1.2-2.19-2.39-3.28-3.56a1.29,1.29,0,0,1,1.88-1.76c.78.84,1.57,1.68,2.35,2.54,1.6-1.76,3.25-3.55,4.83-5.27l1.35-1.46a1.29,1.29,0,0,1,1.9,1.74Z" transform="translate(-4 -2.1)" fill="#fff" />
                                        </svg>
                                    </div>

                                    <div class="nk-block-content flex-grow-1">
                                        @if (!$application)
                                            <h4 class="mb-2" style="color: #22346c;">Become a Participant</h4>
                                            <p class="text-soft mb-4">Select your eligibility category to start your Q-Depository participant onboarding application.</p>
                                            <a href="#" data-toggle="modal" data-target="#eligibilityModal" class="btn btn-lg btn-primary px-4">Get Started</a>
                                        @elseif ($status === 9)
                                            <div class="alert alert-danger mb-3">
                                                <strong>Application Returned for Update</strong>
                                                @if ($application->rejection_reason)
                                                    <p class="mt-1 mb-1">Reason: {!! nl2br(e($application->rejection_reason)) !!}</p>
                                                @endif
                                                @if ($application->drc_doc)
                                                    <p class="mb-0"><a href="{{ asset($application->drc_doc) }}" target="_blank" class="btn btn-sm btn-outline-danger mt-1">Download Document Requirements Checklist (DRC)</a></p>
                                                @elseif ($rejectionDoc && $rejectionDoc->document)
                                                    <p class="mb-0"><a href="{{ asset($rejectionDoc->document) }}" target="_blank" class="btn btn-sm btn-outline-danger mt-1">Download Rejection Document</a></p>
                                                @endif
                                            </div>
                                            <a href="{{ $nextRoute }}" class="btn btn-lg btn-warning px-4">Update &amp; Resubmit Application</a>
                                        @elseif (in_array($status, [1, 2, 3, 4, 45]))
                                            <span class="qdop-elig-pill mb-2">{{ $application->displayEligibilityType() }}</span>
                                            <h4 class="mb-2" style="color: #22346c;">Continue Your Application</h4>
                                            <p class="text-soft mb-4">Your progress is saved. Pick up where you left off to complete your onboarding submission.</p>
                                            <a href="{{ $nextRoute }}" class="btn btn-lg btn-primary px-4">Continue Application</a>
                                        @else
                                            <div class="d-flex flex-wrap align-items-center justify-content-between mb-2" style="gap: 0.5rem;">
                                                <h4 class="mb-0" style="color: #22346c;">Application #{{ $application->app_code }}</h4>
                                                <span class="qdop-elig-pill">{{ $application->displayEligibilityType() }}</span>
                                            </div>
                                            <p class="text-soft mb-3">
                                                Eligibility Type: <strong style="color: #22346c;">{{ $application->displayEligibilityType() }}</strong>
                                            </p>

                                            @if ($application->Partner_BPID || $application->Client_BPID)
                                                <div class="mb-3 p-3" style="background: #f4f6fb; border: 1px solid #d9e0f0; border-left: 4px solid #ad8e4f; border-radius: 10px;">
                                                    <div class="d-flex align-items-center mb-2" style="gap: 0.45rem;">
                                                        <span class="d-inline-flex align-items-center justify-content-center" style="width: 22px; height: 22px; border-radius: 50%; background: #22346c; color: #ffffff; font-size: 0.75rem;">
                                                            <em class="icon ni ni-check"></em>
                                                        </span>
                                                        <strong style="color: #22346c; font-size: 0.92rem;">Account Created</strong>
                                                    </div>
                                                    <div class="d-flex flex-wrap" style="gap: 0.75rem;">
                                                        @if ($application->Partner_BPID)
                                                            <div class="px-3 py-2 bg-white" style="border: 1px solid #e2e8f0; border-radius: 8px; min-width: 180px;">
                                                                <div class="text-uppercase text-soft" style="font-size: 0.68rem; font-weight: 700; letter-spacing: 0.06em;">Partner BPID</div>
                                                                <div style="color: #22346c; font-weight: 700; font-size: 0.92rem; letter-spacing: 0.02em;">{{ $application->Partner_BPID }}</div>
                                                            </div>
                                                        @endif
                                                        @if ($application->Client_BPID)
                                                            <div class="px-3 py-2 bg-white" style="border: 1px solid #e2e8f0; border-radius: 8px; min-width: 180px;">
                                                                <div class="text-uppercase text-soft" style="font-size: 0.68rem; font-weight: 700; letter-spacing: 0.06em;">Client BPID</div>
                                                                <div style="color: #ad8e4f; font-weight: 700; font-size: 0.92rem; letter-spacing: 0.02em;">{{ $application->Client_BPID }}</div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endif

                                            <div class="d-flex flex-wrap mb-3" style="gap: 0.5rem;">
                                                <a href="{{ route('external.application.show', $application->id) }}" class="btn btn-primary">View Information</a>
                                                @if ($application->invoice_doc)
                                                    <a href="{{ asset('invoice/' . $application->invoice_doc) }}" target="_blank" class="btn btn-outline-primary">Download Invoice</a>
                                                @endif
                                            </div>

                                            @if ($application->invoice_doc && !$application->receipt_doc && $status === 5)
                                                <div class="card card-bordered p-3 mt-2 bg-lighter">
                                                    <h6 class="mb-2">Upload Payment Receipt</h6>
                                                    <form action="{{ route('external.receipt.upload') }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" name="app_code" value="{{ $application->app_code }}">
                                                        <div class="form-group mb-2">
                                                            <input type="file" name="receipt_doc" class="form-control" accept="application/pdf" required>
                                                            <small class="text-soft">PDF format, max 5MB</small>
                                                        </div>
                                                        <button type="submit" class="btn btn-sm btn-success">Upload Payment Receipt</button>
                                                    </form>
                                                </div>
                                            @elseif ($application->receipt_doc)
                                                <p class="text-success small mb-0"><em class="icon ni ni-check-circle"></em> Payment receipt uploaded. Pending DSD confirmation.</p>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Eligibility Type Modal -->
<div class="modal fade" role="dialog" id="eligibilityModal">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-md p-4">
                <h5 class="title mb-1" style="color: #22346c;">Eligibility Type</h5>
                <p class="text-soft small mb-3">Select your participant classification to begin onboarding.</p>
                <form action="{{ route('external.onboarding.start') }}" method="POST" id="eligibilityForm">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="eligibility_type">Select Eligibility Type *</label>
                        <select name="eligibility_type" id="eligibility_type" class="form-control" required>
                            <option value="">Select eligibility type</option>
                            <option value="Capital Market Operator">Capital Market Operator</option>
                            <option value="Non-Capital Market Operator – Corporate">Non-Capital Market Operator – Corporate</option>
                            <option value="Private Account - Corporate and Individual">Private Account - Corporate and Individual</option>
                            <option value="Settlement Banks">Settlement Banks</option>
                        </select>
                    </div>

                    <div class="form-group d-none" id="cmo_sub_group">
                        <label class="form-label" for="eligibility_sub_type">Capital Market Operator Role *</label>
                        <select name="eligibility_sub_type" id="eligibility_sub_type" class="form-control">
                            <option value="">Select role</option>
                            <option value="Trustee">Trustee</option>
                            <option value="Pension Fund Custodian">Pension Fund Custodian</option>
                            <option value="Asset Custodian/Nominee">Asset Custodian/Nominee</option>
                            <option value="Issuing House">Issuing House</option>
                            <option value="Registrar">Registrar</option>
                            <option value="Stockbroker">Stockbroker</option>
                            <option value="Fund Manager">Fund Manager</option>
                            <option value="Others (Please indicate)">Others (Please indicate)</option>
                        </select>
                    </div>

                    <div class="form-group d-none" id="cmo_other_group">
                        <label class="form-label" for="eligibility_other">Please Indicate Your Role *</label>
                        <textarea name="eligibility_other" id="eligibility_other" class="form-control" rows="3" placeholder="Enter your Capital Market Operator role..."></textarea>
                    </div>

                    <div class="form-group mt-4 mb-0 text-right">
                        <button type="button" class="btn btn-light mr-2" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary px-4" id="confirmEligibilityBtn">Continue</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const primarySelect = document.getElementById('eligibility_type');
    const subGroup = document.getElementById('cmo_sub_group');
    const subSelect = document.getElementById('eligibility_sub_type');
    const otherGroup = document.getElementById('cmo_other_group');
    const otherInput = document.getElementById('eligibility_other');

    if (primarySelect) {
        primarySelect.addEventListener('change', function () {
            if (this.value === 'Capital Market Operator') {
                subGroup.classList.remove('d-none');
                subSelect.setAttribute('required', 'required');
            } else {
                subGroup.classList.add('d-none');
                subSelect.removeAttribute('required');
                subSelect.value = '';
                otherGroup.classList.add('d-none');
                otherInput.removeAttribute('required');
                otherInput.value = '';
            }
        });
    }

    if (subSelect) {
        subSelect.addEventListener('change', function () {
            if (this.value === 'Others (Please indicate)') {
                otherGroup.classList.remove('d-none');
                otherInput.setAttribute('required', 'required');
            } else {
                otherGroup.classList.add('d-none');
                otherInput.removeAttribute('required');
                otherInput.value = '';
            }
        });
    }
});
</script>
@endsection
