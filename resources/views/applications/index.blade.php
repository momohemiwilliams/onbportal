@extends('layouts.master')

@section('content')
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Applications</h3>
                        </div>
                    </div>
                </div>

                <div class="nk-block nk-block-lg">
                    <div class="card card-preview">
                        <div class="card-inner">
                            <table class="datatable-init-export nowrap table" data-export-title="Export">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Unique ID</th>
                                        <th>Name Of Participant</th>
                                        <th>Eligibility Type</th>
                                        <th>Timestamp of Submission</th>
                                        <th>Status of Application</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($app as $member)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
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
