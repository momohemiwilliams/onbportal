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
                                        <div class="col-xxl-4 col-sm-4">
                                            <div class="card">
                                                <div class="nk-ecwg nk-ecwg6">
                                                   
                                                    <a href="{{route('internal.applications.index')}}">
                                                    <div class="card-inner">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">Total Applications</h6>
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
                                                </a>
                                                </div><!-- .nk-ecwg -->
                                            </div><!-- .card -->
                                        </div><!-- .col -->


                                        <div class="col-xxl-4 col-sm-4">
                                            <div class="card">
                                                <div class="nk-ecwg nk-ecwg6">
                                                    @if($countsubmission == 0)
                                                    <a href="#">
                                                    @endif

                                                    @if($countsubmission !==0)
                                                    <a href="{{url('applications',$completeapp->approval_status)}}">
                                                    @endif


                                                    
                                                    <div class="card-inner">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">Completed Applications</h6>
                                                            </div>
                                                        </div>
                                                        <div class="data">
                                                            <div class="data-group">
                                                                <div class="amount">{{$countsubmission}}</div>
                                                                <div class="nk-ecwg6-ck">
                                                                   
                                                                </div>
                                                            </div>
                                                            <div class="info"></div>
                                                        </div>
                                                    </div><!-- .card-inner -->
                                                    </a>
                                                </div><!-- .nk-ecwg -->
                                            </div><!-- .card -->
                                        </div><!-- .col -->

                                       
                                        <div class="col-xxl-4 col-sm-4">
                                            <div class="card">
                                                <div class="nk-ecwg nk-ecwg6">
                                                  
                                                        @if($verifiedapplicationcoount == 0)
                                                        <a href="#">
                                                        @endif
    
                                                        @if($verifiedapplicationcoount !==0)
                                                        <a href="{{url('applications',$verifiedapplication->approval_status)}}">
                                                        @endif

                                                        
                                                    <div class="card-inner">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">Verified Applications</h6>
                                                            </div>
                                                        </div>
                                                        <div class="data"> 
                                                            <div class="data-group">
                                                                <div class="amount">{{$verifiedapplicationcoount}}</div>
                                                                <div class="nk-ecwg6-ck">
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="info"></div>
                                                        </div>
                                                    </div><!-- .card-inner -->
                                                    </a>
                                                </div><!-- .nk-ecwg -->
                                            </div><!-- .card -->
                                        </div><!-- .col -->

                                        <div class="col-xxl-4 col-sm-4">
                                            <div class="card">
                                                <div class="nk-ecwg nk-ecwg6">
                                                    @if($countdsdapproval == 0)
                                                        <a href="#">
                                                        @endif
    
                                                        @if($countdsdapproval !==0)
                                                        <a href="{{url('applications',$dsdapproval->approval_status)}}">
                                                        @endif


                                                    
                                                    <div class="card-inner">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">DSD Approval</h6>
                                                            </div>
                                                        </div>
                                                        <div class="data">
                                                            <div class="data-group">
                                                                <div class="amount">{{$countdsdapproval}}</div>
                                                                <div class="nk-ecwg6-ck">
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="info"></div>
                                                        </div>
                                                    </div><!-- .card-inner -->
                                                    </a>
                                                </div><!-- .nk-ecwg -->
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                        <div class="col-xxl-4 col-sm-4">
                                            <div class="card">
                                                <div class="nk-ecwg nk-ecwg6">
                                                    @if($countmegapproval == 0)
                                                    <a href="#">
                                                    @endif

                                                    @if($countmegapproval !=0)
                                                    <a href="{{url('applications',$megapproval->approval_status)}}">
                                                    @endif
                                                    
                                                    <div class="card-inner">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">MEG Approval</h6>
                                                            </div>
                                                        </div>
                                                        <div class="data">
                                                            <div class="data-group">
                                                                <div class="amount">{{$countmegapproval}}</div>
                                                                <div class="nk-ecwg6-ck">
                                                                   
                                                                </div>
                                                            </div>
                                                            <div class="info"></div>
                                                        </div>
                                                    </div><!-- .card-inner -->
                                                    </a>
                                                </div><!-- .nk-ecwg -->
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                        <div class="col-xxl-4 col-sm-4">
                                            <div class="card">
                                                @if($dodapprovalcoount == 0)
                                                    <a href="#">
                                                    @endif

                                                    @if($dodapprovalcoount !==0)
                                                    <a href="{{url('applications',$dodapproval->approval_status)}}">
                                                    @endif

                                               
                                                <div class="nk-ecwg nk-ecwg6">
                                                    <div class="card-inner">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">DOD Approval</h6>
                                                            </div>
                                                        </div> 
                                                        <div class="data">
                                                            <div class="data-group">
                                                                <div class="amount">{{$dodapprovalcoount}}</div>
                                                                <div class="nk-ecwg6-ck">
                                                                   
                                                                </div>
                                                            </div>
                                                            <div class="info"></div>
                                                        </div>
                                                    </div><!-- .card-inner -->
                                                </div><!-- .nk-ecwg -->
                                                </a>
                                            </div><!-- .card -->
                                        </div><!-- .col -->


                                        {{-- <div class="col-xxl-4 col-sm-4">
                                            <div class="card">
                                                <div class="nk-ecwg nk-ecwg6">
                                                    <div class="card-inner">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">ICG Approval</h6>
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
                                        </div><!-- .col --> --}}
                                       
                                     
                                       
                                        <div class="col-xxl-12">
                                            <div class="card card-full">
                                                <div class="card-inner">
                                                    <div class="card-title-group">
                                                        <div class="card-title">
                                                            <h6 class="title">Monitoring Dashboard</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                             
                                                           <div class="">
                                                         <table class="datatable-init-export nowrap table table-bordered table-responsive" data-export-title="Export">
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="3">Request Initiator</th>
                                                                    <th colspan="2">DSD User</th>
                                                                     <th colspan="2">MEG User</th>
                                                                      <th colspan="2">DOD User</th>
                                                                      <th colspan="2">ICG User</th>
                                                                </tr>
                                                                <tr>
                                                                    <th>S/N</th>
                                                                    <th>Unique Ref</th>
                                                                    <th>Time Stamp</th>
                                                                    <th>User Stamp</th>
                                                                    <th>Time Stamp</th>
                                                                    <th>User Stamp </th>
                                                                    <th>Time Stamp </th>
                                                                    <th>User Stamp </th>
                                                                    <th>Time Stamp </th>
                                                                     <th>User Stamp</th>
                                                                      <th>Time Stamp</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($formstatus as $track)
                                                               
                                                                <tr>
                                                                    <td><a href="{{route('internal.applications.show', $track->app_code)}}">{{ $loop->iteration }}</a></td>
                                                                    <td><a href="{{route('internal.applications.show', $track->app_code)}}">{{$track->app_code}}</a></td>
                                                                    <td>{{$track->app_time}}</td>
                                                                    <td>
                                                                       
                                                                        {{$track->dsd_user_name}}
                                                                     
                                                                       </td>
                                                                    <td>
                                                                      
                                                                        {{$track->dsd_user_time}}
                                                                     
                                                                        </td>
                                                                        <td>
                                                                           
                                                                            {{$track->meg_user_name}}
                                                                        
                                                                           </td>
                                                                        <td>
                                                                            
                                                                            {{$track->meg_user_time}}
                                                                           
                                                                            </td>
                                                                            <td>
                                                                               
                                                                                {{$track->dod_user_name}}
                                                                               
                                                                               </td>
                                                                            <td>
                                                                               
                                                                                {{$track->dod_user_time}}
                                                                              
                                                                                </td>
                                                                                <td>
                                                                                   
                                                                                    {{$track->icg_user_name}}
                                                                                    
                                                                                   </td>
                                                                                <td>
                                                                                   
                                                                                    {{$track->icg_user_time}}
                                                                                   
                                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table> 
                                                           </div>



                                                           {{-- <table class="datatable-init-export nowrap table" data-export-title="Export">
                                                            <thead>
                                                                
                                                                <tr>
                                                                    <th>S/N</th>
                                                                    <th>Unique Ref</th>
                                                                 
                                                                    <th>Participant Firm</th>
                                                                    <th>Participant Type</th>
                                                                    <th>Time Stamp</th>
                                                                    <th>Status</th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($onboarding as $member)
                                                                <tr>
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td> <span class="tb-lead"><a href="{{route('internal.applications.show', $member->app_code)}}">#{{$member->app_code}}</a></span></td>
                                                                   
                                                                       <td> <span class="tb-sub tb-amount">{{$member->institution_name}}</span></td>
                                                                    <td> <span class="tb-lead">{{$member->eligibility_type}}</span></td>
                                                                   
                                                                    <td> <span class="tb-sub tb-amount">{{$member->created_at}}</span></td>
                                                                    <td>
                                                                        @if($member->approval_status == 1 || $member->approval_status == 2  ||$member->approval_status == 3 ||  $member->approval_status == 4)
                                                                        <span class="badge badge-dim badge-sm badge-outline-primary">Application  Not Completed</span>
                                                                        @endif
                            
                                                                        @if($member->approval_status == 5)
                                                                        <span class="badge badge-dim badge-sm badge-outline-secondary">Application Submitted</span>
                                                                        @endif
            
            
                                                                        @if($member->approval_status == 6)
                                                                        <span class="badge badge-dim badge-sm badge-outline-info">DSD Approved</span>
                                                                        @endif
            
            
                                                                        @if($member->approval_status == 7)
                                                                        <span class="badge badge-dim badge-sm badge-outline-info">MEG Approved</span>
                                                                        @endif
            
            
                                                                        @if($member->approval_status == 8)
                                                                        <span class="badge badge-dim badge-sm badge-outline-success">Application Completed</span>
                                                                        @endif

                                                                        @if($member->approval_status == 10)
                                                                        <span class="badge badge-dim badge-sm badge-outline-success">Successfully Reviewed</span>
                                                                        @endif
                            
                                                                        
                            
                                                                     
                                                                   </td>
            
                                                                   <td class="tb-odr-action">
                                                                    <div class="tb-odr-btns d-none d-md-inline">
                                                                        <a href="{{route('internal.applications.show', $member->app_code)}}" class="btn btn-sm btn-primary">View</a>
                                                                        
                                                                        @if($member->approval_status == 5 && Auth::user()->hasRole('DsdAdmin') )
                                                                       

                                                                         <button class="btn btn-sm btn-success"  onclick="event.preventDefault(); document.getElementById('statuschange-{{$member->id}}').submit(); loading(); setTimeout('document.getElementById(\'' + this.id + '\').disabled=true;', 50);   " type="submit">
                                                                            <i class="fas fa-spinner fa-spin" style="display:none;"></i>
                                                                           <span class="btn-text">Approve</span>
                                                                         </button>
                                                                       
                                                                        @endif
            
                                                                        @if($member->approval_status == 6 && Auth::user()->hasRole('MegAdmin') )
                                                                         <a href="#"  data-toggle="modal" data-target="#megupload-{{$member->id}}" class="btn btn-sm btn-success">Approve</a>     
                                                                        @endif
            
            
            
                                                                        @if($member->approval_status == 7 && Auth::user()->hasRole('DodAdmin') )
                                                                        <a href="#"  data-toggle="modal" data-target="#dodapprove-{{$member->id}}" class="btn btn-sm btn-success">Approve</a>    
                                                                        
                                                                        
                                                                        @endif




                                                                        @if($member->approval_status == 8 && Auth::user()->hasRole('IcgAdmin') )
                                                                        <a href="#"  data-toggle="modal" data-target="#icgapprove-{{$member->id}}" class="btn btn-sm btn-success">Approve</a>    
                                                                        
                                                                        
                                                                        @endif
            
            
                                                                       
                                                                         
                                                                        @if(Auth::user()->group->name == 'DSD' && $member->approval_status == 5 )
                                                                            <a href="#" data-toggle="modal" data-target="#rejectapplication-{{$member->id}}" class="btn btn-sm btn-danger">Reject</a>
                                                                            @endif
                                                                       
                                                                    </div>
            
            
                                                                   
            
            
            
                                                                   
                                                              
                                                              
                                                                    <form id="statuschange-{{$member->id}}" action="{{ route('internal.review.dsd') }}" method="POST" style="display: none;">
                                                                    @csrf
                                                                    @if($member->approval_status == 5 && Auth::user()->hasRole('DsdAdmin') )
                                                                    <input value="6" name="status">   
                                                                    @endif
            
                                                                    @if($member->approval_status == 7 && Auth::user()->hasRole('DodAdmin') )
                                                                    <input value="8" name="status">   
                                                                    @endif
            
                                                                    
                                                                    <input hidden name="user_id" value="{{Auth::user()->id}}">
                                                                    <input hidden name="app_code" value="{{$member->app_code}}">
                                                                    </form>
            
            
                                                                   
                                                                </td>
                                                               
                                                                   
                                                                </tr>
                                                                @endforeach
                                                           
                                                            </tbody>
                                                        </table> --}}
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
                @foreach($onboarding as $member)
                <div class="modal fade" role="dialog" id="rejectapplication-{{$member->id}}">
                  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                      <div class="modal-content">
                          <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                          <div class="modal-body modal-body-md">
                              <h5 class="title">Reject {{$member->institution_name}} Application</h5>
                              <form  action="{{ route('internal.review.dsd') }}" method="POST">
                                  @csrf
                              <div class="tab-content">
                                  <div class="tab-pane active" id="infomation">
                                      <br>
                                      <div class="row gy-4">
                                          <div class="col-md-12">
                                             
                                              <div class="form-group">
                                                  <label class="form-label" for="lead-name">Reason</label>
                                                  <div class="form-control-wrap">
                                                      <input hidden value="9" name="status">
                                                      <input hidden name="user_id" value="{{Auth::user()->id}}">
                                                      <input hidden name="app_code" value="{{$member->app_code}}">
                                                      <textarea required name="note" type="text" class="form-control"></textarea>
                                                  </div>
                                              </div>
                                          </div>
                                         
                                         
                                          <div class="col-12">
                                             
                                              <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                                  <li>
                                                      <button type="submit" class="btn btn-primary">Submit</button>
                                                  </li>
                                              </ul>
                                          </div>
                                      </div>
                                  </div><!-- .tab-pane -->
                                 
                              </div>
                              </form><!-- .tab-content -->
                             
                          </div><!-- .modal-body -->
                      </div><!-- .modal-content -->
                  </div><!-- .modal-dialog -->
              </div><!-- .modal -->
              
              @endforeach
              
              
              
              
              
              
              
              
              @foreach($onboarding as $member)
              <div class="modal fade" role="dialog" id="megupload-{{$member->id}}">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                        <div class="modal-body modal-body-md">
                            <h5 class="title">Approve {{$member->institution_name}} Application</h5>
                            <form  action="{{ route('internal.review.dsd') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                            <div class="tab-content">
                                <div class="tab-pane active" id="infomation">
                                    <br>
                                    <div class="row gy-4">
                                        <div class="col-md-12">
                                           
                                            <div class="form-group">
                                                <input hidden name="status" value="7">
                                                <input hidden name="user_id" value="{{Auth::user()->id}}">
                                                <input hidden name="app_code" value="{{$member->app_code}}">
                                                <div class="form-control-wrap">
                                                  <div class="form-group">
                                                      <label class="form-label" for="customFileLabel">Approval Document</label>
                                                      <div class="form-control-wrap">
                                                          <div class="custom-file">
                                                              <input required type="file" name="document" class="custom-file-input" id="customFile">
                                                              <label class="custom-file-label" for="customFile">Choose file</label>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  
                                                </div>
                                            </div>
                                        </div>
                                       
                                       
                                        <div class="col-12">
                                           
                                            <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                                <li>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- .tab-pane -->
                               
                            </div>
                            </form><!-- .tab-content -->
                           
                        </div><!-- .modal-body -->
                    </div><!-- .modal-content -->
                </div><!-- .modal-dialog -->
              </div><!-- .modal -->
              
              @endforeach 










              @foreach($onboarding as $member)
              <div class="modal fade" role="dialog" id="dodapprove-{{$member->id}}">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                        <div class="modal-body modal-body-md">
                            <h5 class="title">Approve {{$member->institution_name}} Application</h5>
                            <form  action="{{ route('internal.review.dsd') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                            <div class="tab-content">
                                <div class="tab-pane active" id="infomation">
                                    <br>
                                    <div class="row gy-4">
                                        <div class="col-md-12">
                                           
                                            <div class="form-group">
                                                <input hidden name="status" value="8">
                                                <input hidden name="user_id" value="{{Auth::user()->id}}">
                                                <input hidden name="app_code" value="{{$member->app_code}}">
                                                <div class="form-control-wrap">
                                                  <div class="form-group">
                                                      <label class="form-label" for="customFileLabel">Partner BPID</label>
                                                      <div class="form-control-wrap">
                                                        <input required name="Partner_BPID"  type="text" class="form-control">
                                                          </div>
                                                      </div> 

                                                      <div class="form-group">
                                                        <label class="form-label" for="customFileLabel">Client BPID</label>
                                                        <div class="form-control-wrap">
                                                          <input required name="Client_BPID" type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                  </div>
                                                  
                                                </div>
                                            </div>
                                        </div>
                                       
                                       
                                        <br>
                                        <br>
                                        <div class="col-12">
                                           
                                            <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                                <li>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- .tab-pane -->
                               
                            </div>
                            </form><!-- .tab-content -->
                           
                        </div><!-- .modal-body -->
                    </div><!-- .modal-content -->
                </div><!-- .modal-dialog -->
              </div><!-- .modal -->
              
              @endforeach 






              {{-- @foreach($onboarding as $member)
              <div class="modal fade" role="dialog" id="icgapprove-{{$member->id}}">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                        <div class="modal-body modal-body-md">
                            <h5 class="title">Approve {{$member->institution_name}} Application</h5>
                            <form  action="{{ route('internal.review.dsd') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                            <div class="tab-content">
                                <div class="tab-pane active" id="infomation">
                                    <br>
                                    <div class="row gy-4">
                                        <div class="col-md-12">
                                           
                                            <div class="form-group">
                                                <input hidden name="status" value="8">
                                                <input hidden name="user_id" value="{{Auth::user()->id}}">
                                                <input hidden name="app_code" value="{{$member->app_code}}">
                                                <div class="form-control-wrap">
                                                  <div class="form-group">
                                                      <label class="form-label" for="customFileLabel">Partner BPID</label>
                                                      <div class="form-control-wrap">
                                                        <input required name="Partner_BPID"  type="text" class="form-control">
                                                          </div>
                                                      </div> 

                                                      <div class="form-group">
                                                        <label class="form-label" for="customFileLabel">Client BPID</label>
                                                        <div class="form-control-wrap">
                                                          <input required name="Client_BPID" type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                  </div>
                                                  
                                                </div>
                                            </div>
                                        </div>
                                       
                                       
                                        <br>
                                        <br>
                                        <div class="col-12">
                                           
                                            <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                                <li>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- .tab-pane -->
                               
                            </div>
                            </form><!-- .tab-content -->
                           
                        </div><!-- .modal-body -->
                    </div><!-- .modal-content -->
                </div><!-- .modal-dialog -->
              </div><!-- .modal -->
              
              @endforeach  --}}





              @foreach($onboarding as $member)
<div class="modal fade" id="icgapprove-{{$member->id}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross"></em></a>
            <div class="modal-body modal-body-sm text-center">
                <div class="nk-modal py-4">
                    <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-check bg-success"></em>
                    <h4 class="nk-modal-title">Are You Sure ?</h4>
                    <div class="nk-modal-text mt-n2"> 
                        {{-- <p class="text-soft">This will delete user details permanently.</p> --}}
                    </div>
                    <ul class="d-flex justify-content-center gx-4 mt-4">
                        <li>
                            <form  action="{{ route('internal.review.dsd') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                                <input hidden name="status" value="10">
                                                <input hidden name="user_id" value="{{Auth::user()->id}}">
                                                <input hidden name="app_code" value="{{$member->app_code}}">
                            <button type="submit" class="btn btn-success">Yes, Approve Application</button>
                            </form>
                        </li>
                        <li>
                            
                            <button data-dismiss="modal" data-toggle="modal" data-target="#editEventPopup" class="btn btn-danger btn-dim">Cancel</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div><!-- .modal -->
@endforeach
             
            
              <script>
                function loading() {
            $(".btn .fa-spinner").show();
            $(".btn .btn-text").html("Processing...");
        
            }
            </script>
            
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    @endsection