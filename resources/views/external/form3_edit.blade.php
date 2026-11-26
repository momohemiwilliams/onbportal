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
                                    <p class="text-soft mb-4">In the absence of the immediate availability of a Board Resolution, a three (3) months deferral letter signed by the Principal Officer of the Prospective Participant should be provided for the onboarding process to be completed.</p>

                                    <form action="{{ route('external.onboarding.step4.update', $form_3->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        @php
                                            $companyDocs = [
                                                ['name' => 'memorandumand_articles_of_association', 'label' => '1. Memorandum and Articles of Association *', 'required' => true],
                                                ['name' => 'board_resolution', 'label' => '2. Board Resolution to onboard as a Participant of FMDQ Depository *', 'required' => true, 'template' => asset('templates/Board_Resolution_Template.pdf'), 'template_label' => 'Download Board Resolution Template'],
                                                ['name' => 'certificate_of_incorporation', 'label' => '3. Certificate of Incorporation *', 'required' => true],
                                                ['name' => 'particulars_of_directors', 'label' => '4. Particulars of Directors - CAC Form 7 (include CAC 1.1 or Status Report where applicable) *', 'required' => true],
                                                ['name' => 'particulars_of_shareholders', 'label' => '5. Particulars of Shareholders - CAC Form 2 or Status Report (if applicable)', 'required' => false],
                                                ['name' => 'evidence_of_securities_and_exchange_commission', 'label' => '6. Evidence of SEC Registration (for SEC regulated entities) *', 'required' => true],
                                                ['name' => 'evidence_of_sec_renewal', 'label' => '7. Evidence of Renewal of SEC Registration (Screenshot from SEC ePortal) *', 'required' => true],
                                                ['name' => 'evidence_of_trading_exchange_license', 'label' => '8. Evidence of Trading Exchange License/Approval (if applicable)', 'required' => false],
                                                ['name' => 'evidence_of_registration_from_regulatory', 'label' => '9. Evidence of Registration from other Regulatory bodies (if applicable)', 'required' => false],
                                            ];
                                        @endphp

                                        <div class="row g-4">
                                            @foreach ($companyDocs as $doc)
                                                @php $field = $doc['name']; @endphp
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">
                                                            {{ $doc['label'] }}
                                                            @if (!empty($doc['template']))
                                                                <a href="{{ $doc['template'] }}" download class="ml-1 small">{{ $doc['template_label'] }}</a>
                                                            @endif
                                                        </label>
                                                        <small class="d-block text-danger mb-1">Please note that the maximum file size for upload is 5MB (PDF only).</small>
                                                        <input type="file"
                                                               name="{{ $field }}"
                                                               accept="application/pdf"
                                                               class="form-control pdf-validate"
                                                               {{ ($doc['required'] && !$form_3->$field) ? 'required' : '' }}>
                                                        @if ($form_3->$field)
                                                            <small class="text-success d-block mt-1">
                                                                Uploaded: <a href="{{ asset($form_3->$field) }}" target="_blank">View PDF</a>
                                                            </small>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <div class="d-flex justify-content-between mt-4">
                                            <a href="{{ route('external.onboarding.step3.edit', $form_3->id) }}" class="btn btn-lg btn-secondary">Previous</a>
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
