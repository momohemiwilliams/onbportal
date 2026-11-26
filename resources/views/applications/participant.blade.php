@extends('layouts.master')

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
    .qdop-action-box {
        background-color: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        padding: 20px;
    }
    .modal-content {
        border-radius: 12px;
        border-top: 4px solid #ad8e4f;
    }
</style>

@php
    $st = (int) $eligibilityform->approval_status;
    $groupCode = Auth::user()->internalGroupCode();
    $isAdmin = Auth::user()->hasRole('Admin');
@endphp

<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between g-3 flex-wrap">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title" style="color: #22346c;">
                                {{ $eligibilityform->institution_name }}
                                <span class="badge badge-dim badge-primary ml-1" style="font-size: 13px;">{{ $eligibilityform->displayEligibilityType() }}</span>
                            </h3>
                            <div class="nk-block-des text-soft mt-1">
                                Application ID: <strong>#{{ $eligibilityform->app_code }}</strong>
                                <span class="mx-2">|</span>
                                Submitted At: <strong>{{ $eligibilityform->submitted_at ?? $eligibilityform->created_at }}</strong>
                                <span class="mx-2">|</span>
                                Status: <span class="badge badge-info px-2 py-1">{{ $eligibilityform->statusLabel() }}</span>
                            </div>
                        </div>
                        <div class="nk-block-head-content">
                            <a href="{{ route('internal.applications.index') }}" class="btn btn-outline-light bg-white">
                                <em class="icon ni ni-arrow-left"></em><span>Back</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card qdop-view-card">
                    <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card qdop-view-tabs">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#status-tab"><em class="icon ni ni-check-circle"></em><span>Status &amp; Actions</span></a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#part-tab"><em class="icon ni ni-user-circle"></em><span>Participant Details</span></a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#po-tab"><em class="icon ni ni-users"></em><span>Principal Officer(s) Details</span></a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#corr-tab"><em class="icon ni ni-mail"></em><span>Correspondence Emails</span></a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#docs-tab"><em class="icon ni ni-file-text"></em><span>Company Documents</span></a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#mandate-tab"><em class="icon ni ni-pen"></em><span>Mandate, Declaration &amp; Deferral</span></a></li>
                    </ul>

                    <div class="card-inner p-4">
                        <div class="tab-content">
                            <!-- Status & Actions Tab -->
                            <div class="tab-pane active" id="status-tab">
                                <div class="row g-4">
                                    <div class="col-lg-6">
                                        <h6 class="mb-3" style="color: #22346c;">Internal &amp; Payment Documents</h6>
                                        <div class="d-flex flex-column" style="gap: 10px;">
                                            <div class="qdop-doc-tile">
                                                <div>
                                                    <div class="qdop-info-value">Rejection Document</div>
                                                    <small class="text-soft">{{ ($meg_reject && $meg_reject->document) ? 'Uploaded' : 'None' }}</small>
                                                </div>
                                                @if($meg_reject && $meg_reject->document)
                                                    <a href="{{ asset($meg_reject->document) }}" download class="btn btn-sm btn-outline-danger"><em class="icon ni ni-download mr-1"></em>Download</a>
                                                @else
                                                    <span class="badge badge-dim badge-light">None</span>
                                                @endif
                                            </div>
                                            <div class="qdop-doc-tile">
                                                <div>
                                                    <div class="qdop-info-value">Document Requirements Checklist (DRC)</div>
                                                    <small class="text-soft">{{ $eligibilityform->drc_doc ? 'Uploaded' : 'None' }}</small>
                                                </div>
                                                @if($eligibilityform->drc_doc)
                                                    <a href="{{ asset($eligibilityform->drc_doc) }}" download class="btn btn-sm btn-outline-danger"><em class="icon ni ni-download mr-1"></em>Download</a>
                                                @else
                                                    <span class="badge badge-dim badge-light">None</span>
                                                @endif
                                            </div>
                                            <div class="qdop-doc-tile">
                                                <div>
                                                    <div class="qdop-info-value">Application Invoice</div>
                                                    <small class="text-soft">{{ $eligibilityform->invoice_doc ? 'Uploaded' : 'Not uploaded' }}</small>
                                                </div>
                                                @if($eligibilityform->invoice_doc)
                                                    <a href="{{ asset('invoice/' . $eligibilityform->invoice_doc) }}" download class="btn btn-sm btn-outline-primary"><em class="icon ni ni-download mr-1"></em>Download</a>
                                                @else
                                                    <span class="badge badge-dim badge-light">Pending</span>
                                                @endif
                                            </div>
                                            <div class="qdop-doc-tile">
                                                <div>
                                                    <div class="qdop-info-value">Payment Receipt</div>
                                                    <small class="text-soft">{{ $eligibilityform->receipt_doc ? 'Uploaded' : 'Not uploaded' }}</small>
                                                </div>
                                                @if($eligibilityform->receipt_doc)
                                                    <a href="{{ asset('receipt/' . $eligibilityform->receipt_doc) }}" download class="btn btn-sm btn-outline-success"><em class="icon ni ni-download mr-1"></em>Download</a>
                                                @else
                                                    <span class="badge badge-dim badge-light">Pending</span>
                                                @endif
                                            </div>
                                            <div class="qdop-doc-tile">
                                                <div>
                                                    <div class="qdop-info-value">Application Report (MEG)</div>
                                                    <small class="text-soft">{{ ($eligibilityform->application_report_doc || ($meg_approval && $meg_approval->document)) ? 'Uploaded' : 'Not uploaded' }}</small>
                                                </div>
                                                @if($eligibilityform->application_report_doc || ($meg_approval && $meg_approval->document))
                                                    <a href="{{ asset($eligibilityform->application_report_doc ?? $meg_approval->document) }}" download class="btn btn-sm btn-outline-primary"><em class="icon ni ni-download mr-1"></em>Download</a>
                                                @else
                                                    <span class="badge badge-dim badge-light">Pending</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <h6 class="mb-3" style="color: #22346c;">Workflow Actions</h6>
                                        <div class="qdop-action-box">
                                            <p class="text-soft small mb-3">
                                                Current Stage: <strong style="color: #22346c;">{{ $eligibilityform->statusLabel() }}</strong>
                                            </p>

                                            <!-- DSD Actions -->
                                            @if($groupCode === 'DSD' && $st === 5)
                                                <div class="d-flex flex-wrap" style="gap: 0.5rem;">
                                                    @if(!$eligibilityform->invoice_doc)
                                                        <button class="btn btn-success" data-toggle="modal" data-target="#dsdInvoiceModal">Approve &amp; Upload Invoice</button>
                                                    @else
                                                        <form action="{{ route('internal.review.dsd') }}" method="POST" class="d-inline">
                                                            @csrf
                                                            <input type="hidden" name="app_code" value="{{ $eligibilityform->app_code }}">
                                                            <input type="hidden" name="status" value="11">
                                                            <button type="submit" class="btn btn-success">Confirm Payment &amp; Forward to MEG</button>
                                                        </form>
                                                    @endif
                                                    <button class="btn btn-danger" data-toggle="modal" data-target="#dsdRejectModal">Reject</button>
                                                </div>
                                            @elseif($groupCode === 'MEG' && in_array($st, [11, 6]))
                                                <div class="d-flex flex-wrap" style="gap: 0.5rem;">
                                                    <button class="btn btn-success" data-toggle="modal" data-target="#megApproveModal">Approve (Upload Report)</button>
                                                    <button class="btn btn-danger" data-toggle="modal" data-target="#megRejectModal">Reject</button>
                                                </div>
                                            @elseif($groupCode === 'DOD' && $st === 7)
                                                <div class="d-flex flex-wrap" style="gap: 0.5rem;">
                                                    <button class="btn btn-success" data-toggle="modal" data-target="#dodApproveModal">Create Account &amp; Approve</button>
                                                    <button class="btn btn-danger" data-toggle="modal" data-target="#dodRejectModal">Reject to MEG</button>
                                                </div>
                                            @elseif($groupCode === 'ICG')
                                                <div class="alert alert-light border mb-0">
                                                    Read-only view for <strong>ICG</strong> call-over.
                                                </div>
                                            @else
                                                <div class="alert alert-light border mb-0">
                                                    No actions required from <strong>{{ $groupCode }}</strong> at this stage.
                                                </div>
                                            @endif

                                            @if($eligibilityform->Partner_BPID || $eligibilityform->Client_BPID)
                                                <div class="alert alert-success mt-3 mb-0">
                                                    <strong>Account Details Created:</strong><br>
                                                    Partner BPID: <strong>{{ $eligibilityform->Partner_BPID }}</strong><br>
                                                    Client BPID: <strong>{{ $eligibilityform->Client_BPID }}</strong>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Participant Details Tab -->
                            <div class="tab-pane" id="part-tab">
                                <div class="row g-3">
                                    @php
                                        $partFields = [
                                            ['label' => 'Name of Participant', 'value' => $eligibilityform->institution_name, 'col' => 'col-md-6'],
                                            ['label' => 'Office Address', 'value' => $eligibilityform->company_address, 'col' => 'col-md-6'],
                                            ['label' => 'Mobile / Direct Line', 'value' => $eligibilityform->direct_line, 'col' => 'col-md-6'],
                                            ['label' => 'Company Email', 'value' => $eligibilityform->company_email, 'col' => 'col-md-6'],
                                            ['label' => 'Tax ID', 'value' => $eligibilityform->company_tax_number, 'col' => 'col-md-4'],
                                            ['label' => 'RC Number', 'value' => $eligibilityform->company_reg_number, 'col' => 'col-md-4'],
                                            ['label' => 'Registration Date', 'value' => $eligibilityform->company_reg_date, 'col' => 'col-md-4'],
                                            ['label' => 'Settlement Bank', 'value' => $eligibilityform->settlement_bank, 'col' => 'col-md-6'],
                                            ['label' => 'Settlement Account No', 'value' => $eligibilityform->settlement_bank_account_number, 'col' => 'col-md-6'],
                                            ['label' => 'LEI Code', 'value' => $eligibilityform->lei_code ?: 'N/A', 'col' => 'col-md-6'],
                                            ['label' => 'SWIFT BIC Code', 'value' => $eligibilityform->switt_code ?: 'N/A', 'col' => 'col-md-6'],
                                        ];
                                    @endphp
                                    @foreach ($partFields as $f)
                                        <div class="{{ $f['col'] }}">
                                            <div class="qdop-info-tile">
                                                <div class="qdop-info-label">{{ $f['label'] }}</div>
                                                <div class="qdop-info-value">{{ $f['value'] }}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Principal Officers Tab -->
                            <div class="tab-pane" id="po-tab">
                                <div class="qdop-po-card">
                                    <div class="qdop-po-title">
                                        <span>Principal Officer 1 (MD/CEO)</span>
                                        <span class="badge badge-dim badge-primary">Required</span>
                                    </div>
                                    <div class="row g-3 mb-3">
                                        <div class="col-md-4"><div class="qdop-info-tile"><div class="qdop-info-label">Name</div><div class="qdop-info-value">{{ $eligibilityform->managing_director_name }}</div></div></div>
                                        <div class="col-md-4"><div class="qdop-info-tile"><div class="qdop-info-label">Mobile</div><div class="qdop-info-value">{{ $eligibilityform->managing_director_phone }}</div></div></div>
                                        <div class="col-md-4"><div class="qdop-info-tile"><div class="qdop-info-label">Email</div><div class="qdop-info-value">{{ $eligibilityform->managing_director_email }}</div></div></div>
                                        <div class="col-md-6"><div class="qdop-info-tile"><div class="qdop-info-label">BVN</div><div class="qdop-info-value">{{ $eligibilityform->managing_director_bvn }}</div></div></div>
                                        <div class="col-md-6"><div class="qdop-info-tile"><div class="qdop-info-label">NIN</div><div class="qdop-info-value">{{ $eligibilityform->managing_director_nin }}</div></div></div>
                                    </div>
                                    <div class="d-flex flex-wrap" style="gap: 0.5rem;">
                                        @if($eligibilityform->means_of_identification1) <a href="{{ asset($eligibilityform->means_of_identification1) }}" download class="btn btn-sm btn-outline-primary"><em class="icon ni ni-download mr-1"></em>Means of ID</a> @endif
                                        @if($eligibilityform->nin_slip1) <a href="{{ asset($eligibilityform->nin_slip1) }}" download class="btn btn-sm btn-outline-primary"><em class="icon ni ni-download mr-1"></em>NIN Slip</a> @endif
                                        @if($eligibilityform->data_consent1) <a href="{{ asset($eligibilityform->data_consent1) }}" download class="btn btn-sm btn-outline-primary"><em class="icon ni ni-download mr-1"></em>Data Consent Form</a> @endif
                                    </div>
                                </div>

                                <div class="qdop-po-card">
                                    <div class="qdop-po-title">
                                        <span>Principal Officer 2</span>
                                        <span class="badge badge-dim badge-primary">Required</span>
                                    </div>
                                    <div class="row g-3 mb-3">
                                        <div class="col-md-4"><div class="qdop-info-tile"><div class="qdop-info-label">Name</div><div class="qdop-info-value">{{ $eligibilityform->principal_director_name1 }}</div></div></div>
                                        <div class="col-md-4"><div class="qdop-info-tile"><div class="qdop-info-label">Designation</div><div class="qdop-info-value">{{ $eligibilityform->principal_director_designation1 }}</div></div></div>
                                        <div class="col-md-4"><div class="qdop-info-tile"><div class="qdop-info-label">Mobile</div><div class="qdop-info-value">{{ $eligibilityform->principal_director_phone1 }}</div></div></div>
                                        <div class="col-md-4"><div class="qdop-info-tile"><div class="qdop-info-label">Email</div><div class="qdop-info-value">{{ $eligibilityform->principal_director_email1 }}</div></div></div>
                                        <div class="col-md-4"><div class="qdop-info-tile"><div class="qdop-info-label">BVN</div><div class="qdop-info-value">{{ $eligibilityform->principal_director_bvn1 }}</div></div></div>
                                        <div class="col-md-4"><div class="qdop-info-tile"><div class="qdop-info-label">NIN</div><div class="qdop-info-value">{{ $eligibilityform->principal_director_nin1 }}</div></div></div>
                                    </div>
                                    <div class="d-flex flex-wrap" style="gap: 0.5rem;">
                                        @if($eligibilityform->means_of_identification2) <a href="{{ asset($eligibilityform->means_of_identification2) }}" download class="btn btn-sm btn-outline-primary"><em class="icon ni ni-download mr-1"></em>Means of ID</a> @endif
                                        @if($eligibilityform->nin_slip2) <a href="{{ asset($eligibilityform->nin_slip2) }}" download class="btn btn-sm btn-outline-primary"><em class="icon ni ni-download mr-1"></em>NIN Slip</a> @endif
                                        @if($eligibilityform->data_consent2) <a href="{{ asset($eligibilityform->data_consent2) }}" download class="btn btn-sm btn-outline-primary"><em class="icon ni ni-download mr-1"></em>Data Consent Form</a> @endif
                                    </div>
                                </div>

                                @if($eligibilityform->principal_director_name2)
                                <div class="qdop-po-card">
                                    <div class="qdop-po-title">
                                        <span>Principal Officer 3</span>
                                        <span class="badge badge-dim badge-secondary">Optional</span>
                                    </div>
                                    <div class="row g-3 mb-3">
                                        <div class="col-md-4"><div class="qdop-info-tile"><div class="qdop-info-label">Name</div><div class="qdop-info-value">{{ $eligibilityform->principal_director_name2 }}</div></div></div>
                                        <div class="col-md-4"><div class="qdop-info-tile"><div class="qdop-info-label">Designation</div><div class="qdop-info-value">{{ $eligibilityform->principal_director_designation2 }}</div></div></div>
                                        <div class="col-md-4"><div class="qdop-info-tile"><div class="qdop-info-label">Mobile</div><div class="qdop-info-value">{{ $eligibilityform->principal_director_phone2 }}</div></div></div>
                                        <div class="col-md-4"><div class="qdop-info-tile"><div class="qdop-info-label">Email</div><div class="qdop-info-value">{{ $eligibilityform->principal_director_email2 }}</div></div></div>
                                        <div class="col-md-4"><div class="qdop-info-tile"><div class="qdop-info-label">BVN</div><div class="qdop-info-value">{{ $eligibilityform->principal_director_bvn2 }}</div></div></div>
                                        <div class="col-md-4"><div class="qdop-info-tile"><div class="qdop-info-label">NIN</div><div class="qdop-info-value">{{ $eligibilityform->principal_director_nin2 }}</div></div></div>
                                    </div>
                                    <div class="d-flex flex-wrap" style="gap: 0.5rem;">
                                        @if($eligibilityform->means_of_identification3) <a href="{{ asset($eligibilityform->means_of_identification3) }}" download class="btn btn-sm btn-outline-primary"><em class="icon ni ni-download mr-1"></em>Means of ID</a> @endif
                                        @if($eligibilityform->nin_slip3) <a href="{{ asset($eligibilityform->nin_slip3) }}" download class="btn btn-sm btn-outline-primary"><em class="icon ni ni-download mr-1"></em>NIN Slip</a> @endif
                                        @if($eligibilityform->data_consent3) <a href="{{ asset($eligibilityform->data_consent3) }}" download class="btn btn-sm btn-outline-primary"><em class="icon ni ni-download mr-1"></em>Data Consent Form</a> @endif
                                    </div>
                                </div>
                                @endif

                                <div class="qdop-po-card mb-0">
                                    <div class="qdop-po-title">
                                        <span>Principal Officer 4 (Compliance Officer)</span>
                                        <span class="badge badge-dim badge-primary">Required</span>
                                    </div>
                                    <div class="row g-3 mb-3">
                                        <div class="col-md-4"><div class="qdop-info-tile"><div class="qdop-info-label">Name</div><div class="qdop-info-value">{{ $eligibilityform->compliance_director_name }}</div></div></div>
                                        <div class="col-md-4"><div class="qdop-info-tile"><div class="qdop-info-label">Mobile</div><div class="qdop-info-value">{{ $eligibilityform->compliance_director_phone }}</div></div></div>
                                        <div class="col-md-4"><div class="qdop-info-tile"><div class="qdop-info-label">Email</div><div class="qdop-info-value">{{ $eligibilityform->compliance_director_email }}</div></div></div>
                                        <div class="col-md-6"><div class="qdop-info-tile"><div class="qdop-info-label">BVN</div><div class="qdop-info-value">{{ $eligibilityform->compliance_director_bvn }}</div></div></div>
                                        <div class="col-md-6"><div class="qdop-info-tile"><div class="qdop-info-label">NIN</div><div class="qdop-info-value">{{ $eligibilityform->compliance_director_nin }}</div></div></div>
                                    </div>
                                    <div class="d-flex flex-wrap" style="gap: 0.5rem;">
                                        @if($eligibilityform->means_of_identification4) <a href="{{ asset($eligibilityform->means_of_identification4) }}" download class="btn btn-sm btn-outline-primary"><em class="icon ni ni-download mr-1"></em>Means of ID</a> @endif
                                        @if($eligibilityform->nin_slip4) <a href="{{ asset($eligibilityform->nin_slip4) }}" download class="btn btn-sm btn-outline-primary"><em class="icon ni ni-download mr-1"></em>NIN Slip</a> @endif
                                        @if($eligibilityform->data_consent4) <a href="{{ asset($eligibilityform->data_consent4) }}" download class="btn btn-sm btn-outline-primary"><em class="icon ni ni-download mr-1"></em>Data Consent Form</a> @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Correspondence Emails Tab -->
                            <div class="tab-pane" id="corr-tab">
                                <div class="row g-3">
                                    <div class="col-12"><div class="qdop-info-tile"><div class="qdop-info-label">General Correspondence</div><div class="qdop-info-value">{{ $eligibilityform->general_correspondence_email }}</div></div></div>
                                    <div class="col-12"><div class="qdop-info-tile"><div class="qdop-info-label">Operations Team / Group</div><div class="qdop-info-value">{{ $eligibilityform->operations_team_email }}</div></div></div>
                                    <div class="col-12"><div class="qdop-info-tile"><div class="qdop-info-label">Other Groups</div><div class="qdop-info-value">{{ $eligibilityform->other_groups_email }}</div></div></div>
                                </div>
                            </div>

                            <!-- Company Documents Tab -->
                            <div class="tab-pane" id="docs-tab">
                                @php
                                    $docs = [
                                        'memorandumand_articles_of_association' => 'Memorandum and Articles of Association',
                                        'board_resolution' => 'Board Resolution',
                                        'certificate_of_incorporation' => 'Certificate of Incorporation',
                                        'particulars_of_directors' => 'Particulars of Directors (CAC Form 7)',
                                        'particulars_of_shareholders' => 'Particulars of Shareholders (CAC Form 2)',
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
                                                    <small class="text-soft">{{ $eligibilityform->$col ? 'PDF Uploaded' : 'Not provided' }}</small>
                                                </div>
                                                @if($eligibilityform->$col)
                                                    <a href="{{ asset($eligibilityform->$col) }}" download class="btn btn-sm btn-primary flex-shrink-0"><em class="icon ni ni-download mr-1"></em>Download</a>
                                                @else
                                                    <span class="badge badge-dim badge-light">N/A</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Mandate & Deferral Tab -->
                            <div class="tab-pane" id="mandate-tab">
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <div class="qdop-doc-tile">
                                            <div>
                                                <div class="qdop-info-value">Signature Mandate Form</div>
                                                <small class="text-soft">{{ $eligibilityform->signature_mandate_form ? 'PDF Uploaded' : 'None' }}</small>
                                            </div>
                                            @if($eligibilityform->signature_mandate_form)
                                                <a href="{{ asset($eligibilityform->signature_mandate_form) }}" download class="btn btn-sm btn-primary flex-shrink-0"><em class="icon ni ni-download mr-1"></em>Download</a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="qdop-doc-tile">
                                            <div>
                                                <div class="qdop-info-value">Declaration Form</div>
                                                <small class="text-soft">{{ $eligibilityform->declaration_form ? 'PDF Uploaded' : 'None' }}</small>
                                            </div>
                                            @if($eligibilityform->declaration_form)
                                                <a href="{{ asset($eligibilityform->declaration_form) }}" download class="btn btn-sm btn-primary flex-shrink-0"><em class="icon ni ni-download mr-1"></em>Download</a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="qdop-doc-tile">
                                            <div>
                                                <div class="qdop-info-value">Deferral Request</div>
                                                <small class="text-soft">{{ $eligibilityform->deferral_request_doc ? 'PDF Uploaded' : 'None' }}</small>
                                            </div>
                                            @if($eligibilityform->deferral_request_doc)
                                                <a href="{{ asset($eligibilityform->deferral_request_doc) }}" download class="btn btn-sm btn-primary flex-shrink-0"><em class="icon ni ni-download mr-1"></em>Download</a>
                                            @else
                                                <span class="badge badge-dim badge-light">Optional</span>
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

<!-- DSD Invoice Modal -->
<div class="modal fade" id="dsdInvoiceModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('internal.invoice.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="app_code" value="{{ $eligibilityform->app_code }}">
                <div class="modal-header"><h5 class="modal-title">Approve &amp; Upload Invoice</h5></div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Invoice Document (max 5MB) *</label>
                        <input type="file" name="invoice_doc" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Send Invoice to Participant</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- DSD Reject Modal -->
<div class="modal fade" id="dsdRejectModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('internal.review.dsd') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="app_code" value="{{ $eligibilityform->app_code }}">
                <input type="hidden" name="status" value="9">
                <div class="modal-header"><h5 class="modal-title">Reject {{ $eligibilityform->institution_name }}'s Application</h5></div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Note (required if no document uploaded)</label>
                        <textarea name="note" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Rejection Document (any file type, max 5MB)</label>
                        <input type="file" name="document" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Submit Rejection</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- MEG Approve Modal -->
<div class="modal fade" id="megApproveModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('internal.review.meg') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="app_code" value="{{ $eligibilityform->app_code }}">
                <input type="hidden" name="status" value="7">
                <div class="modal-header"><h5 class="modal-title">Approve Application (MEG)</h5></div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Upload Application Report (required, max 5MB) *</label>
                        <input type="file" name="document" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Approve &amp; Forward to DOD</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- MEG Reject Modal -->
<div class="modal fade" id="megRejectModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('internal.review.meg') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="app_code" value="{{ $eligibilityform->app_code }}">
                <input type="hidden" name="status" value="9">
                <div class="modal-header"><h5 class="modal-title">Reject Application (MEG)</h5></div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Reason for Rejection (required if no DRC uploaded)</label>
                        <textarea name="note" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Document Requirements Checklist (DRC) (any file type, max 5MB)</label>
                        <input type="file" name="document" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Submit Rejection</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- DOD Approve Modal -->
<div class="modal fade" id="dodApproveModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('internal.review.dod') }}" method="POST">
                @csrf
                <input type="hidden" name="app_code" value="{{ $eligibilityform->app_code }}">
                <input type="hidden" name="status" value="8">
                <div class="modal-header"><h5 class="modal-title">Create Participant Account (DOD)</h5></div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Partner BPID *</label>
                        <input type="text" name="Partner_bpid" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Client BPID *</label>
                        <input type="text" name="Client_bpid" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Create Account &amp; Approve</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- DOD Reject Modal -->
<div class="modal fade" id="dodRejectModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('internal.review.dod') }}" method="POST">
                @csrf
                <input type="hidden" name="app_code" value="{{ $eligibilityform->app_code }}">
                <input type="hidden" name="status" value="6">
                <div class="modal-header"><h5 class="modal-title">Return Application to MEG</h5></div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Reason *</label>
                        <textarea name="note" class="form-control" rows="4" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Return to MEG</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
