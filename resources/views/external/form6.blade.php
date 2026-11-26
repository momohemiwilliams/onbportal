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
                                    <form action="{{ route('external.onboarding.step6.submit', $application->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row g-4">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <p class="mb-1">
                                                        <a href="{{ asset('templates/Deferral_Request_Form.pdf') }}" download="Deferral_Request_Form.pdf">
                                                            Click to download Deferral Request Form template
                                                        </a>
                                                    </p>
                                                    <label class="form-label">Deferral Request Document (Optional)</label>
                                                    <small class="d-block text-soft mb-1">Upload only if you are requesting a deferral (PDF only, max 5MB).</small>
                                                    <input type="file" name="deferral_request_doc" accept="application/pdf" class="form-control pdf-validate">
                                                    @if ($application->deferral_request_doc)
                                                        <small class="text-success d-block mt-1">Uploaded: <a href="{{ asset($application->deferral_request_doc) }}" target="_blank">View PDF</a></small>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="certified_correct" name="certified_correct" value="1" required {{ old('certified_correct', $application->certified_correct) ? 'checked' : '' }}>
                                                    <label class="custom-control-label" for="certified_correct">
                                                        I certify that all information entered is correct
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-between mt-4">
                                            <a href="{{ route('external.onboarding.step5.edit', $application->id) }}" class="btn btn-lg btn-secondary">Previous</a>
                                            <button type="submit" class="btn btn-lg btn-success">Submit</button>
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

