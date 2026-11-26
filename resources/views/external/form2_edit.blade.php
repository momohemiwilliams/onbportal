@extends('layouts.external')

@section('content')
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-aside-wrap">
                            <div class="card-content">
                                @include('external.partials.tabs')

                                <div class="card-inner">
                                    <p class="text-soft mb-4">(Minimum of two (2) Principal Officers and a Compliance Officer must be provided)</p>

                                    <form action="{{ route('external.onboarding.step2.update', $form_2_edit->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <!-- PRINCIPAL OFFICER 1 -->
                                        <h6 class="overline-title text-primary mb-3">*PRINCIPAL OFFICER 1</h6>
                                        <div class="row g-3 mb-4">
                                            <div class="col-md-4">
                                                <label class="form-label">Managing Director/CEO *</label>
                                                <input required name="managing_director_name" type="text" class="form-control" value="{{ old('managing_director_name', $form_2_edit->managing_director_name) }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Mobile Number/Direct Line *</label>
                                                <input required name="managing_director_phone" type="text" class="form-control" value="{{ old('managing_director_phone', $form_2_edit->managing_director_phone) }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Email Address *</label>
                                                <input required name="managing_director_email" type="email" class="form-control" value="{{ old('managing_director_email', $form_2_edit->managing_director_email) }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Bank Verification Number *</label>
                                                <input required name="managing_director_bvn" type="text" class="form-control" value="{{ old('managing_director_bvn', $form_2_edit->managing_director_bvn) }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">National Identification Number *</label>
                                                <input required name="managing_director_nin" type="text" class="form-control" value="{{ old('managing_director_nin', $form_2_edit->managing_director_nin) }}">
                                            </div>
                                            <div class="col-md-4 qdop-file-col">
                                                <label class="form-label">National Identification Number (NIN) Slip (PDF, max 5MB) *</label>
                                                <input type="file" name="nin_slip1" accept="application/pdf" class="form-control pdf-validate" {{ $form_2_edit->nin_slip1 ? '' : 'required' }}>
                                                @if($form_2_edit->nin_slip1)
                                                    <small class="text-success"><a href="{{ asset($form_2_edit->nin_slip1) }}" target="_blank">View uploaded PDF</a></small>
                                                @endif
                                            </div>
                                            <div class="col-md-4 qdop-file-col">
                                                <label class="form-label">Means of Identification (International Passport or Driver’s License) (PDF, max 5MB) *</label>
                                                <input type="file" name="means_of_identification1" accept="application/pdf" class="form-control pdf-validate" {{ $form_2_edit->means_of_identification1 ? '' : 'required' }}>
                                                @if($form_2_edit->means_of_identification1)
                                                    <small class="text-success"><a href="{{ asset($form_2_edit->means_of_identification1) }}" target="_blank">View uploaded PDF</a></small>
                                                @endif
                                            </div>
                                            <div class="col-md-4 qdop-file-col">
                                                <label class="form-label">
                                                    <span>Data Subject Consent Form (PDF, max 5MB) *</span>
                                                    <a href="{{ asset('templates/Data_Subject_Consent_Form.pdf') }}" download class="small">Download Form</a>
                                                </label>
                                                <input type="file" name="data_consent1" accept="application/pdf" class="form-control pdf-validate" {{ $form_2_edit->data_consent1 ? '' : 'required' }}>
                                                @if($form_2_edit->data_consent1)
                                                    <small class="text-success"><a href="{{ asset($form_2_edit->data_consent1) }}" target="_blank">View uploaded PDF</a></small>
                                                @endif
                                            </div>
                                        </div>

                                        <hr>

                                        <!-- PRINCIPAL OFFICER 2 -->
                                        <h6 class="overline-title text-primary mb-3">*PRINCIPAL OFFICER 2</h6>
                                        <div class="row g-3 mb-4">
                                            <div class="col-md-4">
                                                <label class="form-label">Name *</label>
                                                <input required name="principal_director_name1" type="text" class="form-control" value="{{ old('principal_director_name1', $form_2_edit->principal_director_name1) }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Designation *</label>
                                                <input required name="principal_director_designation1" type="text" class="form-control" value="{{ old('principal_director_designation1', $form_2_edit->principal_director_designation1) }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Mobile Number/Direct Line *</label>
                                                <input required name="principal_director_phone1" type="text" class="form-control" value="{{ old('principal_director_phone1', $form_2_edit->principal_director_phone1) }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Email Address *</label>
                                                <input required name="principal_director_email1" type="email" class="form-control" value="{{ old('principal_director_email1', $form_2_edit->principal_director_email1) }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Bank Verification Number *</label>
                                                <input required name="principal_director_bvn1" type="text" class="form-control" value="{{ old('principal_director_bvn1', $form_2_edit->principal_director_bvn1) }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">National Identification Number *</label>
                                                <input required name="principal_director_nin1" type="text" class="form-control" value="{{ old('principal_director_nin1', $form_2_edit->principal_director_nin1) }}">
                                            </div>
                                            <div class="col-md-4 qdop-file-col">
                                                <label class="form-label">National Identification Number (NIN) Slip (PDF, max 5MB) *</label>
                                                <input type="file" name="nin_slip2" accept="application/pdf" class="form-control pdf-validate" {{ $form_2_edit->nin_slip2 ? '' : 'required' }}>
                                                @if($form_2_edit->nin_slip2)
                                                    <small class="text-success"><a href="{{ asset($form_2_edit->nin_slip2) }}" target="_blank">View uploaded PDF</a></small>
                                                @endif
                                            </div>
                                            <div class="col-md-4 qdop-file-col">
                                                <label class="form-label">Means of Identification (International Passport or Driver’s License) (PDF, max 5MB) *</label>
                                                <input type="file" name="means_of_identification2" accept="application/pdf" class="form-control pdf-validate" {{ $form_2_edit->means_of_identification2 ? '' : 'required' }}>
                                                @if($form_2_edit->means_of_identification2)
                                                    <small class="text-success"><a href="{{ asset($form_2_edit->means_of_identification2) }}" target="_blank">View uploaded PDF</a></small>
                                                @endif
                                            </div>
                                            <div class="col-md-4 qdop-file-col">
                                                <label class="form-label">
                                                    <span>Data Subject Consent Form (PDF, max 5MB) *</span>
                                                    <a href="{{ asset('templates/Data_Subject_Consent_Form.pdf') }}" download class="small">Download Form</a>
                                                </label>
                                                <input type="file" name="data_consent2" accept="application/pdf" class="form-control pdf-validate" {{ $form_2_edit->data_consent2 ? '' : 'required' }}>
                                                @if($form_2_edit->data_consent2)
                                                    <small class="text-success"><a href="{{ asset($form_2_edit->data_consent2) }}" target="_blank">View uploaded PDF</a></small>
                                                @endif
                                            </div>
                                        </div>

                                        <hr>

                                        <!-- PRINCIPAL OFFICER 3 (OPTIONAL) -->
                                        <h6 class="overline-title text-soft mb-3">PRINCIPAL OFFICER 3 (OPTIONAL)</h6>
                                        <div class="row g-3 mb-4">
                                            <div class="col-md-4">
                                                <label class="form-label">Name</label>
                                                <input name="principal_director_name2" type="text" class="form-control" value="{{ old('principal_director_name2', $form_2_edit->principal_director_name2) }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Designation</label>
                                                <input name="principal_director_designation2" type="text" class="form-control" value="{{ old('principal_director_designation2', $form_2_edit->principal_director_designation2) }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Mobile Number/Direct Line</label>
                                                <input name="principal_director_phone2" type="text" class="form-control" value="{{ old('principal_director_phone2', $form_2_edit->principal_director_phone2) }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Email Address</label>
                                                <input name="principal_director_email2" type="email" class="form-control" value="{{ old('principal_director_email2', $form_2_edit->principal_director_email2) }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Bank Verification Number</label>
                                                <input name="principal_director_bvn2" type="text" class="form-control" value="{{ old('principal_director_bvn2', $form_2_edit->principal_director_bvn2) }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">National Identification Number</label>
                                                <input name="principal_director_nin2" type="text" class="form-control" value="{{ old('principal_director_nin2', $form_2_edit->principal_director_nin2) }}">
                                            </div>
                                            <div class="col-md-4 qdop-file-col">
                                                <label class="form-label">National Identification Number (NIN) Slip (PDF, max 5MB)</label>
                                                <input type="file" name="nin_slip3" accept="application/pdf" class="form-control pdf-validate">
                                                @if($form_2_edit->nin_slip3)
                                                    <small class="text-success"><a href="{{ asset($form_2_edit->nin_slip3) }}" target="_blank">View uploaded PDF</a></small>
                                                @endif
                                            </div>
                                            <div class="col-md-4 qdop-file-col">
                                                <label class="form-label">Means of Identification (International Passport or Driver’s License) (PDF, max 5MB)</label>
                                                <input type="file" name="means_of_identification3" accept="application/pdf" class="form-control pdf-validate">
                                                @if($form_2_edit->means_of_identification3)
                                                    <small class="text-success"><a href="{{ asset($form_2_edit->means_of_identification3) }}" target="_blank">View uploaded PDF</a></small>
                                                @endif
                                            </div>
                                            <div class="col-md-4 qdop-file-col">
                                                <label class="form-label">
                                                    <span>Data Subject Consent Form (PDF, max 5MB)</span>
                                                    <a href="{{ asset('templates/Data_Subject_Consent_Form.pdf') }}" download class="small">Download Form</a>
                                                </label>
                                                <input type="file" name="data_consent3" accept="application/pdf" class="form-control pdf-validate">
                                                @if($form_2_edit->data_consent3)
                                                    <small class="text-success"><a href="{{ asset($form_2_edit->data_consent3) }}" target="_blank">View uploaded PDF</a></small>
                                                @endif
                                            </div>
                                        </div>

                                        <hr>

                                        <!-- PRINCIPAL OFFICER 4 (COMPLIANCE OFFICER) -->
                                        <h6 class="overline-title text-primary mb-3">*PRINCIPAL OFFICER 4</h6>
                                        <div class="row g-3 mb-4">
                                            <div class="col-md-4">
                                                <label class="form-label">Compliance Officer *</label>
                                                <input required name="compliance_director_name" type="text" class="form-control" value="{{ old('compliance_director_name', $form_2_edit->compliance_director_name) }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Mobile Number/Direct Line *</label>
                                                <input required name="compliance_director_phone" type="text" class="form-control" value="{{ old('compliance_director_phone', $form_2_edit->compliance_director_phone) }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Email Address *</label>
                                                <input required name="compliance_director_email" type="email" class="form-control" value="{{ old('compliance_director_email', $form_2_edit->compliance_director_email) }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Bank Verification Number *</label>
                                                <input required name="compliance_director_bvn" type="text" class="form-control" value="{{ old('compliance_director_bvn', $form_2_edit->compliance_director_bvn) }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">National Identification Number *</label>
                                                <input required name="compliance_director_nin" type="text" class="form-control" value="{{ old('compliance_director_nin', $form_2_edit->compliance_director_nin) }}">
                                            </div>
                                            <div class="col-md-4 qdop-file-col">
                                                <label class="form-label">National Identification Number (NIN) Slip (PDF, max 5MB) *</label>
                                                <input type="file" name="nin_slip4" accept="application/pdf" class="form-control pdf-validate" {{ $form_2_edit->nin_slip4 ? '' : 'required' }}>
                                                @if($form_2_edit->nin_slip4)
                                                    <small class="text-success"><a href="{{ asset($form_2_edit->nin_slip4) }}" target="_blank">View uploaded PDF</a></small>
                                                @endif
                                            </div>
                                            <div class="col-md-4 qdop-file-col">
                                                <label class="form-label">Means of Identification (International Passport or Driver’s License) (PDF, max 5MB) *</label>
                                                <input type="file" name="means_of_identification4" accept="application/pdf" class="form-control pdf-validate" {{ $form_2_edit->means_of_identification4 ? '' : 'required' }}>
                                                @if($form_2_edit->means_of_identification4)
                                                    <small class="text-success"><a href="{{ asset($form_2_edit->means_of_identification4) }}" target="_blank">View uploaded PDF</a></small>
                                                @endif
                                            </div>
                                            <div class="col-md-4 qdop-file-col">
                                                <label class="form-label">
                                                    <span>Data Subject Consent Form (PDF, max 5MB) *</span>
                                                    <a href="{{ asset('templates/Data_Subject_Consent_Form.pdf') }}" download class="small">Download Form</a>
                                                </label>
                                                <input type="file" name="data_consent4" accept="application/pdf" class="form-control pdf-validate" {{ $form_2_edit->data_consent4 ? '' : 'required' }}>
                                                @if($form_2_edit->data_consent4)
                                                    <small class="text-success"><a href="{{ asset($form_2_edit->data_consent4) }}" target="_blank">View uploaded PDF</a></small>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-between mt-4">
                                            <a href="{{ route('external.onboarding.step1.edit', $form_2_edit->id) }}" class="btn btn-lg btn-secondary">Previous</a>
                                            <button type="submit" class="btn btn-lg btn-primary">Continue</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
