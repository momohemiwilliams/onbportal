@extends('layouts.external')

@section('content')
<style>
    .qdop-view-card {
        border-radius: 12px;
        border: 1px solid #e2e8f0;
        border-top: 4px solid #ad8e4f;
        box-shadow: 0 10px 30px rgba(15, 23, 42, 0.06);
        overflow: hidden;
    }
    .qdop-view-tabs {
        background-color: #f8fafc;
        padding: 0 1.25rem;
        border-bottom: 1px solid #e2e8f0;
    }
    .qdop-view-tabs .nav-link {
        font-size: 13px;
        font-weight: 600;
        padding: 0.9rem 0.85rem;
        border-bottom: 3px solid transparent;
    }
    .qdop-view-tabs .nav-link.active {
        color: #22346c !important;
        border-bottom-color: #ad8e4f !important;
        background-color: #ffffff;
    }
    .qdop-info-tile {
        background-color: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        padding: 12px 15px;
        height: 100%;
    }
    .qdop-info-label {
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: #64748b;
        margin-bottom: 4px;
    }
    .qdop-info-value {
        font-size: 14px;
        font-weight: 600;
        color: #1e293b;
        word-break: break-word;
    }
    .qdop-po-card {
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        padding: 18px 20px;
        margin-bottom: 18px;
        background-color: #ffffff;
    }
    .qdop-po-title {
        color: #22346c;
        font-weight: 700;
        font-size: 14px;
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .qdop-doc-tile {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        background-color: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        padding: 14px 16px;
        height: 100%;
    }
</style>

<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between flex-wrap" style="gap: 1rem;">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title" style="color: #22346c;">
                                Depository Participant Onboarding ({{ $displayEligibility }})
                            </h3>
                            <div class="nk-block-des text-soft mt-1">
                                Application ID: <strong>#{{ $application->app_code }}</strong>
                            </div>
                        </div>
                        <div class="nk-block-head-content">
                            <a href="{{ route('external.dashboard') }}" class="btn btn-outline-light bg-white">
                                <em class="icon ni ni-arrow-left"></em><span>Back to Dashboard</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="nk-block">
                    <div class="card qdop-view-card">
                        <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card qdop-view-tabs">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#tab-step1"><em class="icon ni ni-user-circle"></em><span>Participant Details</span></a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab-step2"><em class="icon ni ni-users"></em><span>Principal Officer(s) Details</span></a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab-step3"><em class="icon ni ni-mail"></em><span>Correspondence Email Address</span></a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab-step4"><em class="icon ni ni-file-text"></em><span>Company Documents</span></a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab-step5"><em class="icon ni ni-pen"></em><span>Signature Mandate and Declaration</span></a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab-step6"><em class="icon ni ni-clock"></em><span>Deferral Request</span></a></li>
                        </ul>

                        <div class="card-inner p-4">
                            <div class="tab-content">
                                <!-- Step 1 Read-Only -->
                                <div class="tab-pane active" id="tab-step1">
                                    <div class="row g-3">
                                        @php
                                            $step1Fields = [
                                                ['label' => 'Name of Participant', 'value' => $application->institution_name, 'col' => 'col-md-6'],
                                                ['label' => 'Office Address', 'value' => $application->company_address, 'col' => 'col-md-6'],
                                                ['label' => 'Mobile Number / Direct Line', 'value' => $application->direct_line, 'col' => 'col-md-6'],
                                                ['label' => 'Company Email Address', 'value' => $application->company_email, 'col' => 'col-md-6'],
                                                ['label' => 'Company Tax Identification Number', 'value' => $application->company_tax_number, 'col' => 'col-md-4'],
                                                ['label' => 'Company Registration (RC) Number', 'value' => $application->company_reg_number, 'col' => 'col-md-4'],
                                                ['label' => 'Company Registration Date', 'value' => $application->company_reg_date, 'col' => 'col-md-4'],
                                                ['label' => 'Name of Settlement Bank', 'value' => $application->settlement_bank, 'col' => 'col-md-6'],
                                                ['label' => 'Settlement Bank Account No', 'value' => $application->settlement_bank_account_number, 'col' => 'col-md-6'],
                                                ['label' => 'Local Entity Identification (LEI) Code', 'value' => $application->lei_code ?: 'N/A', 'col' => 'col-md-6'],
                                                ['label' => 'SWIFT BIC Code', 'value' => $application->switt_code ?: 'N/A', 'col' => 'col-md-6'],
                                            ];
                                        @endphp
                                        @foreach ($step1Fields as $f)
                                            <div class="{{ $f['col'] }}">
                                                <div class="qdop-info-tile">
                                                    <div class="qdop-info-label">{{ $f['label'] }}</div>
                                                    <div class="qdop-info-value">{{ $f['value'] }}</div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Step 2 Read-Only -->
                                <div class="tab-pane" id="tab-step2">
                                    <!-- PO 1 -->
                                    <div class="qdop-po-card">
                                        <div class="qdop-po-title">
                                            <span>Principal Officer 1 (Managing Director / CEO)</span>
                                            <span class="badge badge-dim badge-primary">Required</span>
                                        </div>
                                        <div class="row g-3 mb-3">
                                            <div class="col-md-4"><div class="qdop-info-tile"><div class="qdop-info-label">Name</div><div class="qdop-info-value">{{ $application->managing_director_name }}</div></div></div>
                                            <div class="col-md-4"><div class="qdop-info-tile"><div class="qdop-info-label">Mobile Number</div><div class="qdop-info-value">{{ $application->managing_director_phone }}</div></div></div>
                                            <div class="col-md-4"><div class="qdop-info-tile"><div class="qdop-info-label">Email Address</div><div class="qdop-info-value">{{ $application->managing_director_email }}</div></div></div>
                                            <div class="col-md-6"><div class="qdop-info-tile"><div class="qdop-info-label">BVN</div><div class="qdop-info-value">{{ $application->managing_director_bvn }}</div></div></div>
                                            <div class="col-md-6"><div class="qdop-info-tile"><div class="qdop-info-label">NIN</div><div class="qdop-info-value">{{ $application->managing_director_nin }}</div></div></div>
                                        </div>
                                        <div class="d-flex flex-wrap" style="gap: 0.5rem;">
                                            @if($application->means_of_identification1) <a href="{{ asset($application->means_of_identification1) }}" download class="btn btn-sm btn-outline-primary"><em class="icon ni ni-download mr-1"></em>Download Means of ID</a> @endif
                                            @if($application->nin_slip1) <a href="{{ asset($application->nin_slip1) }}" download class="btn btn-sm btn-outline-primary"><em class="icon ni ni-download mr-1"></em>Download NIN Slip</a> @endif
                                            @if($application->data_consent1) <a href="{{ asset($application->data_consent1) }}" download class="btn btn-sm btn-outline-primary"><em class="icon ni ni-download mr-1"></em>Download Data Consent Form</a> @endif
                                        </div>
                                    </div>

                                    <!-- PO 2 -->
                                    <div class="qdop-po-card">
                                        <div class="qdop-po-title">
                                            <span>Principal Officer 2</span>
                                            <span class="badge badge-dim badge-primary">Required</span>
                                        </div>
                                        <div class="row g-3 mb-3">
                                            <div class="col-md-4"><div class="qdop-info-tile"><div class="qdop-info-label">Name</div><div class="qdop-info-value">{{ $application->principal_director_name1 }}</div></div></div>
                                            <div class="col-md-4"><div class="qdop-info-tile"><div class="qdop-info-label">Designation</div><div class="qdop-info-value">{{ $application->principal_director_designation1 }}</div></div></div>
                                            <div class="col-md-4"><div class="qdop-info-tile"><div class="qdop-info-label">Mobile Number</div><div class="qdop-info-value">{{ $application->principal_director_phone1 }}</div></div></div>
                                            <div class="col-md-4"><div class="qdop-info-tile"><div class="qdop-info-label">Email Address</div><div class="qdop-info-value">{{ $application->principal_director_email1 }}</div></div></div>
                                            <div class="col-md-4"><div class="qdop-info-tile"><div class="qdop-info-label">BVN</div><div class="qdop-info-value">{{ $application->principal_director_bvn1 }}</div></div></div>
                                            <div class="col-md-4"><div class="qdop-info-tile"><div class="qdop-info-label">NIN</div><div class="qdop-info-value">{{ $application->principal_director_nin1 }}</div></div></div>
                                        </div>
                                        <div class="d-flex flex-wrap" style="gap: 0.5rem;">
                                            @if($application->means_of_identification2) <a href="{{ asset($application->means_of_identification2) }}" download class="btn btn-sm btn-outline-primary"><em class="icon ni ni-download mr-1"></em>Download Means of ID</a> @endif
                                            @if($application->nin_slip2) <a href="{{ asset($application->nin_slip2) }}" download class="btn btn-sm btn-outline-primary"><em class="icon ni ni-download mr-1"></em>Download NIN Slip</a> @endif
                                            @if($application->data_consent2) <a href="{{ asset($application->data_consent2) }}" download class="btn btn-sm btn-outline-primary"><em class="icon ni ni-download mr-1"></em>Download Data Consent Form</a> @endif
                                        </div>
                                    </div>

                                    <!-- PO 3 (Optional) -->
                                    @if($application->principal_director_name2)
                                    <div class="qdop-po-card">
                                        <div class="qdop-po-title">
                                            <span>Principal Officer 3</span>
                                            <span class="badge badge-dim badge-secondary">Optional</span>
                                        </div>
                                        <div class="row g-3 mb-3">
                                            <div class="col-md-4"><div class="qdop-info-tile"><div class="qdop-info-label">Name</div><div class="qdop-info-value">{{ $application->principal_director_name2 }}</div></div></div>
                                            <div class="col-md-4"><div class="qdop-info-tile"><div class="qdop-info-label">Designation</div><div class="qdop-info-value">{{ $application->principal_director_designation2 }}</div></div></div>
                                            <div class="col-md-4"><div class="qdop-info-tile"><div class="qdop-info-label">Mobile Number</div><div class="qdop-info-value">{{ $application->principal_director_phone2 }}</div></div></div>
                                            <div class="col-md-4"><div class="qdop-info-tile"><div class="qdop-info-label">Email Address</div><div class="qdop-info-value">{{ $application->principal_director_email2 }}</div></div></div>
                                            <div class="col-md-4"><div class="qdop-info-tile"><div class="qdop-info-label">BVN</div><div class="qdop-info-value">{{ $application->principal_director_bvn2 }}</div></div></div>
                                            <div class="col-md-4"><div class="qdop-info-tile"><div class="qdop-info-label">NIN</div><div class="qdop-info-value">{{ $application->principal_director_nin2 }}</div></div></div>
                                        </div>
                                        <div class="d-flex flex-wrap" style="gap: 0.5rem;">
                                            @if($application->means_of_identification3) <a href="{{ asset($application->means_of_identification3) }}" download class="btn btn-sm btn-outline-primary"><em class="icon ni ni-download mr-1"></em>Download Means of ID</a> @endif
                                            @if($application->nin_slip3) <a href="{{ asset($application->nin_slip3) }}" download class="btn btn-sm btn-outline-primary"><em class="icon ni ni-download mr-1"></em>Download NIN Slip</a> @endif
                                            @if($application->data_consent3) <a href="{{ asset($application->data_consent3) }}" download class="btn btn-sm btn-outline-primary"><em class="icon ni ni-download mr-1"></em>Download Data Consent Form</a> @endif
                                        </div>
                                    </div>
                                    @endif

                                    <!-- PO 4 -->
                                    <div class="qdop-po-card mb-0">
                                        <div class="qdop-po-title">
                                            <span>Principal Officer 4 (Compliance Officer)</span>
                                            <span class="badge badge-dim badge-primary">Required</span>
                                        </div>
                                        <div class="row g-3 mb-3">
                                            <div class="col-md-4"><div class="qdop-info-tile"><div class="qdop-info-label">Name</div><div class="qdop-info-value">{{ $application->compliance_director_name }}</div></div></div>
                                            <div class="col-md-4"><div class="qdop-info-tile"><div class="qdop-info-label">Mobile Number</div><div class="qdop-info-value">{{ $application->compliance_director_phone }}</div></div></div>
                                            <div class="col-md-4"><div class="qdop-info-tile"><div class="qdop-info-label">Email Address</div><div class="qdop-info-value">{{ $application->compliance_director_email }}</div></div></div>
                                            <div class="col-md-6"><div class="qdop-info-tile"><div class="qdop-info-label">BVN</div><div class="qdop-info-value">{{ $application->compliance_director_bvn }}</div></div></div>
                                            <div class="col-md-6"><div class="qdop-info-tile"><div class="qdop-info-label">NIN</div><div class="qdop-info-value">{{ $application->compliance_director_nin }}</div></div></div>
                                        </div>
                                        <div class="d-flex flex-wrap" style="gap: 0.5rem;">
                                            @if($application->means_of_identification4) <a href="{{ asset($application->means_of_identification4) }}" download class="btn btn-sm btn-outline-primary"><em class="icon ni ni-download mr-1"></em>Download Means of ID</a> @endif
                                            @if($application->nin_slip4) <a href="{{ asset($application->nin_slip4) }}" download class="btn btn-sm btn-outline-primary"><em class="icon ni ni-download mr-1"></em>Download NIN Slip</a> @endif
                                            @if($application->data_consent4) <a href="{{ asset($application->data_consent4) }}" download class="btn btn-sm btn-outline-primary"><em class="icon ni ni-download mr-1"></em>Download Data Consent Form</a> @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Step 3 Read-Only -->
                                <div class="tab-pane" id="tab-step3">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <div class="qdop-info-tile">
                                                <div class="qdop-info-label">General Correspondence Email(s)</div>
                                                <div class="qdop-info-value">{{ $application->general_correspondence_email }}</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="qdop-info-tile">
                                                <div class="qdop-info-label">Operations Team / Group Email(s)</div>
                                                <div class="qdop-info-value">{{ $application->operations_team_email }}</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="qdop-info-tile">
                                                <div class="qdop-info-label">Other Groups Email(s)</div>
                                                <div class="qdop-info-value">{{ $application->other_groups_email }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Step 4 Read-Only -->
                                <div class="tab-pane" id="tab-step4">
                                    @php
                                        $docs = [
                                            'memorandumand_articles_of_association' => 'Memorandum and Articles of Association',
                                            'board_resolution' => 'Board Resolution',
                                            'certificate_of_incorporation' => 'Certificate of Incorporation',
                                            'particulars_of_directors' => 'Particulars of Directors - CAC Form 7',
                                            'particulars_of_shareholders' => 'Particulars of Shareholders - CAC Form 2',
                                            'evidence_of_securities_and_exchange_commission' => 'Evidence of SEC Registration',
                                            'evidence_of_sec_renewal' => 'Evidence of Renewal of SEC Registration (Screenshot from SEC ePortal)',
                                            'evidence_of_trading_exchange_license' => 'Evidence of Trading Exchange License/Approval',
                                            'evidence_of_registration_from_regulatory' => 'Evidence of Registration from other Regulatory bodies',
                                        ];
                                    @endphp
                                    <div class="row g-3">
                                        @foreach($docs as $col => $label)
                                            <div class="col-md-6">
                                                <div class="qdop-doc-tile">
                                                    <div>
                                                        <div class="qdop-info-value">{{ $label }}</div>
                                                        <small class="text-soft">{{ $application->$col ? 'PDF Uploaded' : 'Not provided' }}</small>
                                                    </div>
                                                    @if($application->$col)
                                                        <a href="{{ asset($application->$col) }}" download class="btn btn-sm btn-primary flex-shrink-0">
                                                            <em class="icon ni ni-download mr-1"></em>Download
                                                        </a>
                                                    @else
                                                        <span class="badge badge-dim badge-light">N/A</span>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Step 5 Read-Only -->
                                <div class="tab-pane" id="tab-step5">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="qdop-doc-tile">
                                                <div>
                                                    <div class="qdop-info-value">Signed Signature Mandate Form</div>
                                                    <small class="text-soft">{{ $application->signature_mandate_form ? 'PDF Uploaded' : 'Not provided' }}</small>
                                                </div>
                                                @if($application->signature_mandate_form)
                                                    <a href="{{ asset($application->signature_mandate_form) }}" download class="btn btn-sm btn-primary flex-shrink-0">
                                                        <em class="icon ni ni-download mr-1"></em>Download
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="qdop-doc-tile">
                                                <div>
                                                    <div class="qdop-info-value">Signed Declaration Form</div>
                                                    <small class="text-soft">{{ $application->declaration_form ? 'PDF Uploaded' : 'Not provided' }}</small>
                                                </div>
                                                @if($application->declaration_form)
                                                    <a href="{{ asset($application->declaration_form) }}" download class="btn btn-sm btn-primary flex-shrink-0">
                                                        <em class="icon ni ni-download mr-1"></em>Download
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Step 6 Read-Only -->
                                <div class="tab-pane" id="tab-step6">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="qdop-doc-tile">
                                                <div>
                                                    <div class="qdop-info-value">Deferral Request Document</div>
                                                    <small class="text-soft">{{ $application->deferral_request_doc ? 'PDF Uploaded' : 'None uploaded' }}</small>
                                                </div>
                                                @if($application->deferral_request_doc)
                                                    <a href="{{ asset($application->deferral_request_doc) }}" download class="btn btn-sm btn-primary flex-shrink-0">
                                                        <em class="icon ni ni-download mr-1"></em>Download
                                                    </a>
                                                @else
                                                    <span class="badge badge-dim badge-light">Optional</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="qdop-info-tile">
                                                <div class="qdop-info-label">Certification</div>
                                                <div class="qdop-info-value">
                                                    @if ($application->certified_correct)
                                                        <span class="text-success"><em class="icon ni ni-check-circle mr-1"></em>Certified that all information entered is correct</span>
                                                    @else
                                                        <span class="text-soft">Pending</span>
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
        </div>
    </div>
</div>

@if(session('show_submission_modal'))
<div class="modal fade" id="submissionSuccessModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content text-center p-5" style="border-radius: 14px; border-top: 5px solid #ad8e4f;">
            <h4 class="mb-3" style="color: #22346c;">Application Verification</h4>
            <div class="mb-3">
                <em class="icon ni ni-file-check text-info" style="font-size: 4rem;"></em>
            </div>
            <h5 class="mb-2">Your application is under review</h5>
            <p class="text-soft small mb-4">We have sent a confirmation email with your application details.</p>
            <div>
                <button type="button" class="btn btn-primary px-4" data-dismiss="modal">View Information</button>
            </div>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    $('#submissionSuccessModal').modal('show');
});
</script>
@endif
@endsection
