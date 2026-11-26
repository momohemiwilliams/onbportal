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
                                    <form action="{{ route('external.onboarding.step3.update', $cosemail->id) }}" method="POST">
                                        @csrf
                                        <div class="row g-4">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label">GENERAL CORRESPONDENCE — Email Address(es) *</label>
                                                    <small class="d-block text-soft mb-1">Separate multiple email addresses with a comma (,)</small>
                                                    <textarea required name="general_correspondence_email" class="form-control" rows="3" placeholder="example1@company.com, example2@company.com">{{ old('general_correspondence_email', $cosemail->general_correspondence_email) }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label">OPERATIONS TEAM/GROUP — Email Address(es) *</label>
                                                    <small class="d-block text-soft mb-1">Separate multiple email addresses with a comma (,)</small>
                                                    <textarea required name="operations_team_email" class="form-control" rows="3" placeholder="ops1@company.com, ops2@company.com">{{ old('operations_team_email', $cosemail->operations_team_email) }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label">OTHER GROUPS — Email Address(es) *</label>
                                                    <small class="d-block text-soft mb-1">Separate multiple email addresses with a comma (,)</small>
                                                    <textarea required name="other_groups_email" class="form-control" rows="3" placeholder="other1@company.com, other2@company.com">{{ old('other_groups_email', $cosemail->other_groups_email) }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-between mt-4">
                                            <a href="{{ route('external.onboarding.step2.edit', $cosemail->id) }}" class="btn btn-lg btn-secondary">Previous</a>
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
