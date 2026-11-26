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
                                            <h3 class="nk-block-title page-title">Applications</h3>
                                            <div class="nk-block-des text-soft">
                                               
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="more-options"><em class="icon ni ni-more-v"></em></a>
                                                <div class="toggle-expand-content" data-content="more-options">
                                                    <ul class="nk-block-tools g-3">
                                                   
                                                       
                                                        {{-- <li class="nk-block-tools-opt">
                                                            <a href="#" class="btn btn-icon btn-primary d-md-none"><em class="icon ni ni-plus"></em></a>
                                                            <a href="#" data-toggle="modal" data-target="#addUser" class="btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em><span>Add</span></a>
                                                        </li> --}}

                                                        {{-- <li><a href="#" data-toggle="modal" data-target="#addLead"><span>Add Orgranigation</span></a></li>
                                                        <li><a href="#"><span>Import Lead</span></a></li> --}}
                                                    </ul>
                                                </div>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block nk-block-lg">
                                    <div class="nk-block-head">
                                        <div class="nk-block-head-content">
                                            <h4 class="nk-block-title"></h4>
                                            <div class="nk-block-des">
                                                <div class="example-alert">
                                                    @if (\Session::has('error'))
                                             <div class="alert alert-danger alert-icon alert-dismissible">
                                                <em class="icon ni ni-check-circle"></em>  <strong> {{ \Session::get('error') }}<button class="close" data-dismiss="alert"></button>
                                                    </div>
                                                    @endif
                                
                                              
                                
                                                    @if (\Session::has('success') )
                                                    <div class="alert alert-success alert-icon alert-dismissible">
                                                       <em class="icon ni ni-check-circle"></em>  <strong> {{ \Session::get('success') }}<button class="close" data-dismiss="alert"></button>
                                                           </div>
                                                           @endif


                                                           @if (\Session::has('info') )
                                                    <div class="alert alert-primary alert-icon alert-dismissible">
                                                       <em class="icon ni ni-cross-circle"></em>  <strong> {{ \Session::get('info') }}<button class="close" data-dismiss="alert"></button>
                                                        
                                                           </div>
                                                           @endif
                                
                                
                                                    @if (count($errors) > 0)
                                                    <div><div class="alert alert-danger alert-icon alert-dismissible">
                                                        <strong>Opps!</strong> Something went wrong, please check below errors.<br><br>
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                                <button class="close" data-dismiss="alert"></button>
                                                           </div>
                                                           @endif
                                                           
                                
                                                    
                                                                        
                                            </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-preview">
                                        <div class="card-inner">
                                            <table class="datatable-init-export nowrap table" data-export-title="Export">
                                                <thead>
                                                    
                                                    <tr>
                                                        <th>S/N</th>
                                                        <th>Unique Ref</th>
                                                        {{-- <th>Name</th> --}}
                                                        <th>Name Of Participant</th>
                                                        <th>Eligibility Type</th>
                                                        <th>Time Stamp</th>
                                                        <th>Status</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($app as $member)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td> <span class="tb-lead"><a href="{{route('participant', $member->app_code)}}">#{{$member->app_code}}</a></span></td>
                                                        {{-- <td> <span class="tb-lead">{{optional($member->user)->name}}
                                                           </span></td> --}}
                                                           <td> <span class="tb-sub tb-amount">{{$member->institution_name}}</span></td>
                                                        <td> <span class="tb-lead">{{$member->eligibility_type}}</span></td>
                                                       
                                                        <td> <span class="tb-sub tb-amount">{{$member->submitted_at}}</span></td>
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
                                                            <span class="badge badge-dim badge-sm badge-outline-success">DOD Approved</span>
                                                            @endif

                                                            @if($member->approval_status == 10)
                                                            <span class="badge badge-dim badge-sm badge-outline-success">ICG Approved</span>
                                                            @endif
                
                                                            
                                                      
                                                            {{-- @if($member->approval_status == 5 )
                                                            <span class="badge badge-dim badge-sm badge-outline-danger">Rejected</span>
                                                            @endif --}}
                                                         
                                                       </td>

                                                       <td class="tb-odr-action">
                                                        <div class="tb-odr-btns d-none d-md-inline">
                                                            <a href="{{url('participant', $member->app_code)}}" class="btn btn-sm btn-primary">View</a>
                                                            
                                                            @if($member->approval_status == 5 && $member->receipt_doc == '' && $member->invoice_doc == '' && Auth::user()->hasRole('DsdAdmin') )
                                                           
                                                            <a href="#"  data-toggle="modal" data-target="#uploadinvoice-{{$member->id}}" class="btn btn-sm btn-success">Upload Invoice</a> 
                                                           
                                                            @endif



                                                            @if($member->approval_status == 5 && $member->receipt_doc != '' && $member->invoice_doc != '' && Auth::user()->hasRole('DsdAdmin') )
                                                           
                                                            <a href="#"  data-toggle="modal" data-target="#dsdapprove-{{$member->id}}" class="btn btn-sm btn-success">Approve</a> 
                                                           
                                                            @endif

                                                            

                                                            

                                                            @if($member->approval_status == 6 && Auth::user()->hasRole('MegAdmin') )
                                                             <a href="#"  data-toggle="modal" data-target="#megupload-{{$member->id}}" class="btn btn-sm btn-success">Approve</a>     
                                                            @endif

                                                            @if($member->approval_status == 6 && Auth::user()->hasRole('MegAdmin') )
                                                            <a href="#" data-toggle="modal" data-target="#rejectapplicationMEG-{{$member->id}}" class="btn btn-sm btn-danger">Reject</a>     
                                                           @endif

                                                           



                                                            @if($member->approval_status == 7 && Auth::user()->hasRole('DodAdmin') )
                                                            <a href="#"  data-toggle="modal" data-target="#dodapprove-{{$member->id}}" class="btn btn-sm btn-success">Approve</a>    
                                                            
                                                            
                                                            @endif


                                                            @if($member->approval_status == 7 && Auth::user()->hasRole('DodAdmin') )
                                                            <a href="#"  data-toggle="modal" data-target="#rejectdod-{{$member->id}}" class="btn btn-sm btn-danger">Reject</a>    
                                                            
                                                            
                                                            @endif

                                                            


                                                            @if($member->approval_status == 8 && Auth::user()->hasRole('IcgAdmin') )
                                                            <a href="#"  data-toggle="modal" data-target="#icgapprove-{{$member->id}}" class="btn btn-sm btn-success">Approve</a>@endif


                                                            @if($member->approval_status == 8 && Auth::user()->hasRole('IcgAdmin') )
                                                            <a href="#"  data-toggle="modal" data-target="#rejecicg-{{$member->id}}" class="btn btn-sm btn-danger">Reject</a>@endif


                                                            {{-- @if(Auth::user()->group->name == 'DSD' && $member->approval_status == 5 )
                                                                <a href="#" data-toggle="modal" data-target="#rejectapplication-{{$member->id}}" class="btn btn-sm btn-danger">Reject</a>
                                                                @endif --}}



                                                            {{-- @if($member->approval_status == 8 && Auth::user()->hasRole('IcgAdmin') )
                                                             <a href="javascript:void();"
                                                            onclick="event.preventDefault(); document.getElementById('statuschange').submit();" class="btn btn-sm btn-success">Approve</a>  
                                                            @endif --}}

                                                          
                                                           

                                                            {{-- <button class="btn btn-sm btn-success"  onclick="event.preventDefault(); document.getElementById('statuschange').submit(); loading(); setTimeout('document.getElementById(\'' + this.id + '\').disabled=true;', 50);   " type="submit">
                                                                <i class="fas fa-spinner fa-spin" style="display:none;"></i>
                                                               <span class="btn-text">Approve</span>
                                                             </button> --}}
                                                             
                                                            @if(Auth::user()->group->name == 'DSD' && $member->approval_status == 5 )
                                                                <a href="#" data-toggle="modal" data-target="#rejectapplication-{{$member->id}}" class="btn btn-sm btn-danger">Reject</a>
                                                                @endif


                                                               
                                                           
                                                        </div>


                                                        {{-- <button class="btn btn-sm btn-success"  onclick="event.preventDefault(); document.getElementById('statuschange').submit(); loading(); setTimeout('document.getElementById(\'' + this.id + '\').disabled=true;', 50);   " type="submit">
                                                            <i class="fas fa-spinner fa-spin" style="display:none;"></i>
                                                           <span class="btn-text">Approve</span>
                                                         </button> --}}



                                                       
                                                  
                                                  
                                                        <form id="statuschange-{{$member->id}}" action="{{ route('dodstatus') }}" method="POST" style="display: none;">
                                                        @csrf
                                                        @if($member->approval_status == 5 && Auth::user()->hasRole('DsdAdmin') )
                                                        <input value="6" name="status">   
                                                        @endif

                                                        @if($member->approval_status == 7 && Auth::user()->hasRole('DodAdmin') )
                                                        <input value="8" name="status">   
                                                        @endif

                                                        
                                                        <input hidden name="user_id" value="{{Auth::user()->id}}">
                                                        <input hidden name="user_name" value="{{Auth::user()->name}}">
                                                        <input hidden name="app_code" value="{{$member->app_code}}">
                                                        </form>


                                                        {{-- <div class="dropdown">
                                                            <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown" data-offset="-8,0"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                                <ul class="link-list-plain">
                                                                    <li><a href="#" class="text-primary">Edit</a></li>
                                                                    <li><a href="#" class="text-primary">View</a></li>
                                                                    <li><a href="#" class="text-danger">Remove</a></li>
                                                                </ul>
                                                            </div>
                                                        </div> --}}
                                                    </td>
                                                   
                                                       
                                                    </tr>
                                                    @endforeach
                                               
                                                </tbody>
                                            </table>
                                          
                                          
                                            
                                       
                                        </div>
                                    </div><!-- .card-preview -->
                                </div>
                        </div>
                    </div>
                </div>
                </div>
             

                
                @include('applications.application_status')
             


@endsection



