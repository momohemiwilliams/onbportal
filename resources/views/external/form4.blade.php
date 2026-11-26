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
                                    <form action="{{ route('external.onboarding.step5.update', $form_4->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row g-4">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <p class="mb-1">
                                                        <a href="{{ asset('templates/Signature_Mandate.pdf') }}" download="Signature_Mandate.pdf">
                                                            Click to download Signature Mandate Form template
                                                        </a>
                                                    </p>
                                                    <label class="form-label">Upload signed Signature Mandate Form *</label>
                                                    <small class="d-block text-danger mb-1">Please note that the maximum file size for upload is 5MB (PDF only).</small>
                                                    <input type="file" name="signature_mandate_form" accept="application/pdf" class="form-control pdf-validate" {{ $form_4->signature_mandate_form ? '' : 'required' }}>
                                                    @if ($form_4->signature_mandate_form)
                                                        <small class="text-success d-block mt-1">Uploaded: <a href="{{ asset($form_4->signature_mandate_form) }}" target="_blank">View PDF</a></small>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <p class="mb-1">
                                                        <a href="{{ asset('templates/Declaration_Form.pdf') }}" download="Declaration_Form.pdf">
                                                            Click to download Declaration Form template
                                                        </a>
                                                    </p>
                                                    <label class="form-label">Upload signed Declaration Form *</label>
                                                    <small class="d-block text-danger mb-1">Please note that the maximum file size for upload is 5MB (PDF only).</small>
                                                    <input type="file" name="declaration_form" accept="application/pdf" class="form-control pdf-validate" {{ $form_4->declaration_form ? '' : 'required' }}>
                                                    @if ($form_4->declaration_form)
                                                        <small class="text-success d-block mt-1">Uploaded: <a href="{{ asset($form_4->declaration_form) }}" target="_blank">View PDF</a></small>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-between mt-4">
                                            <a href="{{ route('external.onboarding.step4.edit', $form_4->id) }}" class="btn btn-lg btn-secondary">Previous</a>
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
