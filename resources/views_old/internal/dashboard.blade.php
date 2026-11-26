@extends('layouts.master')

@section('content')
           
           
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Dashboard</h3>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                              
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="row g-gs">
                                        <div class="col-xxl-3 col-sm-3">
                                            <div class="card">
                                                <div class="nk-ecwg nk-ecwg6">
                                                    <div class="card-inner">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">Total Participants</h6>
                                                            </div>
                                                        </div>
                                                        <div class="data">
                                                            <div class="data-group">
                                                                <div class="amount">{{$countall}}</div>
                                                                <div class="nk-ecwg6-ck">
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="info"></div>
                                                        </div>
                                                    </div><!-- .card-inner -->
                                                </div><!-- .nk-ecwg -->
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                        <div class="col-xxl-3 col-sm-3">
                                            <div class="card">
                                                <div class="nk-ecwg nk-ecwg6">
                                                    <div class="card-inner">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">Complete Registration</h6>
                                                            </div>
                                                        </div>
                                                        <div class="data">
                                                            <div class="data-group">
                                                                <div class="amount">{{$countpending}}</div>
                                                                <div class="nk-ecwg6-ck">
                                                                   
                                                                </div>
                                                            </div>
                                                            <div class="info"></div>
                                                        </div>
                                                    </div><!-- .card-inner -->
                                                </div><!-- .nk-ecwg -->
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                        <div class="col-xxl-3 col-sm-3">
                                            <div class="card">
                                                <div class="nk-ecwg nk-ecwg6">
                                                    <div class="card-inner">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">Pending Approval</h6>
                                                            </div>
                                                        </div>
                                                        <div class="data">
                                                            <div class="data-group">
                                                                <div class="amount">{{$countawaitingapproval}}</div>
                                                                <div class="nk-ecwg6-ck">
                                                                   
                                                                </div>
                                                            </div>
                                                            <div class="info"></div>
                                                        </div>
                                                    </div><!-- .card-inner -->
                                                </div><!-- .nk-ecwg -->
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                        <div class="col-xxl-3 col-sm-3">
                                            <div class="card">
                                                <div class="nk-ecwg nk-ecwg6">
                                                    <div class="card-inner">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">Verified</h6>
                                                            </div>
                                                        </div>
                                                        <div class="data">
                                                            <div class="data-group">
                                                                <div class="amount">{{$countverified}}</div>
                                                                <div class="nk-ecwg6-ck">
                                                                   
                                                                </div>
                                                            </div>
                                                            <div class="info"></div>
                                                        </div>
                                                    </div><!-- .card-inner -->
                                                </div><!-- .nk-ecwg -->
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                       
                                     
                                       
                                        <div class="col-xxl-8">
                                            <div class="card card-full">
                                                <div class="card-inner">
                                                    <div class="card-title-group">
                                                        <div class="card-title">
                                                            <h6 class="title">Recent Registration</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <table class="datatable-init-export nowrap table" data-export-title="Export">
                                                    <thead>
                                                        <tr>
                                                            <th>Application NO</th>
                                                            <th>Name</th>
                                                            <th>Participant Type</th>
                                                            <th>Participant Firm</th>
                                                            <th>Date</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($onboarding as $member)
                                                        <tr>
                                                            <td> <span class="tb-lead"><a href="{{route('participant', $member->app_code)}}">#{{$member->app_code}}</a></span></td>
                                                            <td> <span class="tb-lead">{{{$member->user->name}}}</span></td>
                                                            <td> <span class="tb-lead">{{$member->eligibility_type}}</span></td>
                                                            <td> <span class="tb-sub tb-amount">{{$member->institution->name}}</span></td>
                                                            <td> <span class="tb-sub tb-amount">{{$member->created_at}}</span></td>
                                                            <td>
                                                                @if($member->approval_status == 0)
                                                                <span class="badge badge-dim badge-sm badge-outline-primary">Not Completed</span>
                                                                @endif
                    
                                                                @if($member->approval_status == 1)
                                                                <span class="badge badge-dim badge-sm badge-outline-secondary">Application Submitted</span>
                                                                @endif


                                                                @if($member->approval_status == 2)
                                                                <span class="badge badge-dim badge-sm badge-outline-info">DSD Approved</span>
                                                                @endif


                                                                @if($member->approval_status == 3)
                                                                <span class="badge badge-dim badge-sm badge-outline-info">MEG Approved</span>
                                                                @endif


                                                                @if($member->approval_status == 4)
                                                                <span class="badge badge-dim badge-sm badge-outline-info">DOD Approved</span>
                                                                @endif
                    
                    
                                                                @if($member->approval_status == 5 )
                                                                <span class="badge badge-dim badge-sm badge-outline-danger">Rejected</span>
                                                                @endif
                                                             
                                                           </td>

                                                           
                                                        </tr>
                                                        @endforeach
                                                   
                                                    </tbody>
                                                </table>
                                            </div><!-- .card -->
                                        </div>
                                       
                                    </div><!-- .row -->
                                </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
                <!-- footer @s -->
              
  
    @endsection