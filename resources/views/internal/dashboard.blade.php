@extends('layouts.master')

@section('content')
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Dashboard ({{ $roleView }} View)</h3>
                        </div>
                    </div>
                </div>

                <div class="nk-block">
                    <div class="row g-gs">
                        <div class="col-xxl-4 col-sm-4">
                            <div class="card">
                                <div class="card-inner">
                                    <h6 class="title text-soft">Total Applications</h6>
                                    <div class="amount h3 mt-2">{{ $metrics['all'] }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-sm-4">
                            <div class="card">
                                <div class="card-inner">
                                    <h6 class="title text-soft">Completed Applications</h6>
                                    <div class="amount h3 mt-2">{{ $metrics['completed'] }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-sm-4">
                            <div class="card">
                                <div class="card-inner">
                                    <h6 class="title text-soft">Verified Applications</h6>
                                    <div class="amount h3 mt-2">{{ $metrics['verified'] }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-sm-4">
                            <div class="card">
                                <div class="card-inner">
                                    <h6 class="title text-soft">DSD Approval</h6>
                                    <div class="amount h3 mt-2">{{ $metrics['dsd_approval'] }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-sm-4">
                            <div class="card">
                                <div class="card-inner">
                                    <h6 class="title text-soft">MEG Approval</h6>
                                    <div class="amount h3 mt-2">{{ $metrics['meg_approval'] }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-sm-4">
                            <div class="card">
                                <div class="card-inner">
                                    <h6 class="title text-soft">DOD Approval</h6>
                                    <div class="amount h3 mt-2">{{ $metrics['dod_approval'] }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="nk-block nk-block-lg mt-4">
                    <div class="card card-preview">
                        <div class="card-inner">
                            <h5 class="mb-3">Applications</h5>
                            <table class="datatable-init nowrap table">
                                <thead>
                                    <tr>
                                        <th>Unique ID</th>
                                        <th>Name of Participant</th>
                                        <th>Eligibility Type</th>
                                        <th>Timestamp of Submission</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($onboarding as $member)
                                    <tr>
                                        <td><a href="{{ route('internal.applications.show', $member->app_code) }}">#{{ $member->app_code }}</a></td>
                                        <td>{{ $member->institution_name }}</td>
                                        <td>{{ $member->displayEligibilityType() }}</td>
                                        <td>{{ $member->submitted_at ?? $member->created_at }}</td>
                                        <td><span class="badge badge-dim badge-outline-primary">{{ $member->statusLabel() }}</span></td>
                                        <td>
                                            <a href="{{ route('internal.applications.show', $member->app_code) }}" class="btn btn-sm btn-primary">View</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
