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
                                    <form action="{{ route('external.onboarding.step1.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="eligibility_type" value="{{ $eligibilityType }}">
                                        <input type="hidden" name="eligibility_sub_type" value="{{ $eligibilitySubType }}">
                                        <input type="hidden" name="eligibility_other" value="{{ $eligibilityOther }}">

                                        <div class="row g-4">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label">Name of Participant *</label>
                                                    <input required name="institution_name" type="text" class="form-control" value="{{ old('institution_name') }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label">Office Address *</label>
                                                    <input required name="company_address" type="text" class="form-control" value="{{ old('company_address') }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label">Mobile Number/Direct Line *</label>
                                                    <input required name="direct_line" type="text" class="form-control" value="{{ old('direct_line') }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label">Company Email Address *</label>
                                                    <input required name="company_email" type="email" class="form-control" value="{{ old('company_email') }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-label">Company Tax Identification Number *</label>
                                                    <input required name="company_tax_number" type="text" class="form-control" value="{{ old('company_tax_number') }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-label">Company Registration (RC) Number *</label>
                                                    <input required name="company_reg_number" type="text" class="form-control" value="{{ old('company_reg_number') }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-label">Company Registration Date *</label>
                                                    <input required name="company_reg_date" type="date" class="form-control" value="{{ old('company_reg_date') }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <small class="text-soft">*Settlement Bank Account information is required for processing cash payment relating to secondary market activities. Kindly ensure accurate information is provided.</small>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label">Name of Settlement Bank *</label>
                                                    <input required name="settlement_bank" type="text" class="form-control" value="{{ old('settlement_bank') }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label">Settlement Bank Account No *</label>
                                                    <input required name="settlement_bank_account_number" type="text" class="form-control" value="{{ old('settlement_bank_account_number') }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label">Local Entity Identification (LEI) Code (If Applicable)</label>
                                                    <input name="lei_code" type="text" class="form-control" value="{{ old('lei_code') }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label">SWIFT BIC Code (If Applicable)</label>
                                                    <input name="switt_code" type="text" class="form-control" value="{{ old('switt_code') }}">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-lg btn-primary">Continue</button>
                                            </div>
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
