@extends('layouts.master')

@section('content')
<style>
    .others {
    display:none;
}

</style>
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between g-3">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title"><strong class="text-primary small">{{$eligibilityform->user->name}}</strong></h3>
                                <div class="nk-block-des text-soft">
                                    <ul class="list-inline">
                                        <li>Application ID: <span class="text-base">{{$eligibilityform->app_code}}</span></li>
                                        <li>Submited At: <span class="text-base">{{$eligibilityform->created_at}}</span></li>
                                    </ul>
                                </div>
                              
                            </div>
                    
                        </div>
                </div>
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
                <div class="nk-block nk-block-lg">
                    <div class="card">
                        <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#personal-info"><em class="icon ni ni-user-circle-fill"></em><span>Submission Status</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#profile-overview"><em class="icon ni ni-book-fill"></em><span>Participant Particulars</span></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#principal"><em class="icon ni ni-book-fill"></em><span>Principal Officer(s) Details</span></a>
                            </li>

                       

                           

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#documents"><em class="icon ni ni-book-fill"></em><span>Documents</span></a>
                            </li>
                            
                            <li class="nav-item nav-item-trigger">
                                @if($eligibilityform->approval_status == 1 || $eligibilityform->approval_status == 2  ||$eligibilityform->approval_status == 3 ||  $eligibilityform->approval_status == 4)
                                <span class="badge badge-dim badge-sm badge-outline-primary">Application  Not Completed</span>
                                @endif

                                @if($eligibilityform->approval_status == 5)
                                <span class="badge badge-dim badge-sm badge-outline-secondary">Application Submitted</span>
                                @endif


                                @if($eligibilityform->approval_status == 6)
                                <span class="badge badge-dim badge-sm badge-outline-info">DSD Approved</span>
                                @endif


                                @if($eligibilityform->approval_status == 7)
                                <span class="badge badge-dim badge-sm badge-outline-info">MEG Approved</span>
                                @endif


                                @if($eligibilityform->approval_status == 8)
                                <span class="badge badge-dim badge-sm badge-outline-info">Application Completed</span>
                                @endif

                                @if($eligibilityform->approval_status == 10)
                                <span class="badge badge-dim badge-sm badge-outline-success">Successfully Reviewed</span>
                                @endif
                            </li>
                        </ul>
                        <div class="card-inner">
                            <div class="tab-content">
                                <div class="tab-pane active" id="personal-info">
                                    <div class="nk-block">
                                     
                                        <div class="col-lg-12">
                                           
                                            <div class="card card-bordered">
                                                <ul class="data-list is-compact">
                                                    <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label">Submitted By</div>
                                                            <div class="data-value">{{$eligibilityform->user->name}}</div>
                                                        </div>
                                                    </li>
                                                    <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label">Submitted At</div>
                                                            <div class="data-value">{{$eligibilityform->submitted_at}}</div>
                                                        </div>
                                                    </li>
                                                    <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label">User Email</div>
                                                            <div class="data-value">{{$eligibilityform->user->email}}</div>
                                                        </div>
                                                    </li>

                                                    <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label">User Phone Number</div>
                                                            <div class="data-value">{{$eligibilityform->user->phone}}</div>
                                                        </div>
                                                    </li>
                                                    @if($eligibilityform->Partner_BPID !== '' || $eligibilityform->Client_BPID !== '' )
                                                    <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label">Partner BPID</div>
                                                            <div class="data-value">{{$eligibilityform->Partner_BPID}}</div>
                                                        </div>
                                                    </li>


                                                    <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label">Client BPID</div>
                                                            <div class="data-value">{{$eligibilityform->Client_BPID}}</div>
                                                        </div>
                                                    </li>

                                                    @endif
                                                    <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label">Status</div>
                                                            <div class="data-value">
                                                                @if($eligibilityform->approval_status == 1 || $eligibilityform->approval_status == 2  ||$eligibilityform->approval_status == 3 ||  $eligibilityform->approval_status == 4)
                                                                <span class="badge badge-dim badge-sm badge-outline-primary">Application  Not Completed</span>
                                                                @endif
                    
                                                                @if($eligibilityform->approval_status == 5)
                                                                <span class="badge badge-dim badge-sm badge-outline-secondary">Application Submitted</span>
                                                                @endif


                                                                @if($eligibilityform->approval_status == 6)
                                                                <span class="badge badge-dim badge-sm badge-outline-info">DSD Approved</span>
                                                                @endif


                                                                @if($eligibilityform->approval_status == 7)
                                                                <span class="badge badge-dim badge-sm badge-outline-info">MEG Approved</span>
                                                                @endif


                                                                @if($eligibilityform->approval_status == 8)
                                                                <span class="badge badge-dim badge-sm badge-outline-info">Application Completed</span>
                                                                @endif

                                                                @if($eligibilityform->approval_status == 10)
                                                                <span class="badge badge-dim badge-sm badge-outline-success">Successfully Reviewed</span>
                                                                @endif
                                                                </div>
                                                        </div>
                                                    </li>
                                                 
                                                    @if(!empty($formstatus )) 
                                                     <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label">Last Checked</div>
                                                            <div class="data-value">
                                                                <div class="user-card">
                                                                    {{-- <div class="user-avatar user-avatar-xs bg-orange-dim">
                                                                        <span>AB</span>
                                                                    </div> --}}
                                                                    <div class="user-name">
                                                                        <span class="tb-lead">{{$formstatus->user->name}} </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                   
                                                    <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label">Last Checked At</div>
                                                            <div class="data-value">{{$formstatus->updated_at}}</div>
                                                        </div>
                                                    </li>
                                                    @endif

                                                    @if(!empty($meg_approval->document))
                                                    <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label"><a href="../public{{$meg_approval->document}}" download="{{$meg_approval->document}}"><h6 class="btn btn-sm btn-primary">Download Approval Document</h6></a></div>
                                                            <div class="data-value"></div>
                                                        </div>
                                                    </li>
                                                    @endif

                                                    @if(!empty($meg_reject->document))
                                                    <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label"><a href="../public{{$meg_reject->document}}" download="{{$meg_reject->document}}"><h6 class="btn btn-sm btn-primary">Download  Rejection Document</h6></a></div>
                                                            <div class="data-value"></div>
                                                        </div>
                                                    </li>
                                                    @endif

                                                    @if(!empty($eligibilityform->invoice_doc))
                                                    <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label"><a href="../public/invoice/{{$eligibilityform->invoice_doc}}" download="{{$eligibilityform->invoice_doc}}"><h6 class="btn btn-sm btn-primary">Download Appilcation Invoice</h6></a></div>
                                                            <div class="data-value"></div>
                                                        </div>
                                                    </li>
                                                    @endif



                                                    @if(!empty($eligibilityform->receipt_doc))
                                                    <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label"><a href="../public/receipt/{{$eligibilityform->receipt_doc}}" download="{{$eligibilityform->receipt_doc}}"><h6 class="btn btn-sm btn-primary">Download Payment Receipt</h6></a></div>
                                                            <div class="data-value"></div>
                                                        </div>
                                                    </li>
                                                    @endif

                                                    {{-- @if(!empty($eligibilityform->certificate_of_incorporation)) 
                                                                            <a href="../public{{$eligibilityform->certificate_of_incorporation}}" download="{{$eligibilityform->certificate_of_incorporation}}"><br>Download Certificate of Incorporation</a>
                                                                           
                                                                            @endif --}}
                                                </ul>
                                            </div>
                                          <br>
                                          {{-- @if(Auth::user()->hasRole('DsdAdmin')  ||  Auth::user()->hasRole('DodAdmin') ||  Auth::user()->hasRole('MegAdmin')
                                          ||  Auth::user()->hasRole('IcgAdmin') ) --}}
                                          {{-- @if($eligibilityform->approval_status == 5 && Auth::user()->hasRole('DsdAdmin') )
                                          @if(empty($formstatus && $formstatus->user_id == Auth::user()->id )) <center><a href="#" data-toggle="modal" data-target="#addUser" class="btn btn-primary d-none d-md-inline-flex"><span>Take Action</span></a></center>   @endif
                                          @endif

                                          @if($eligibilityform->approval_status == 6 && Auth::user()->hasRole('MegAdmin') )
                                          @if(empty($formstatus && $formstatus->user_id == Auth::user()->id )) <center><a href="#" data-toggle="modal" data-target="#addUser" class="btn btn-primary d-none d-md-inline-flex"><span>Take Action</span></a></center>   @endif
                                          @endif



                                          @if($eligibilityform->approval_status == 7 && Auth::user()->hasRole('DodAdmin') )
                                          @if(empty($formstatus && $formstatus->user_id == Auth::user()->id )) <center><a href="#" data-toggle="modal" data-target="#addUser" class="btn btn-primary d-none d-md-inline-flex"><span>Take Action</span></a></center>   @endif
                                          @endif


                                          @if($eligibilityform->approval_status == 8 && Auth::user()->hasRole('IcgAdmin') )
                                          @if(empty($formstatus && $formstatus->user_id == Auth::user()->id )) <center><a href="#" data-toggle="modal" data-target="#addUser" class="btn btn-primary d-none d-md-inline-flex"><span>Take Action</span></a></center>   @endif
                                          @endif --}}


                                        </div><!-- .card -->
                                    </div><!-- .nk-block -->
                                    
                                   
                                    <div class="nk-divider divider md"></div>
                                    
                                </div><!-- tab pane -->
                                <div class="tab-pane" id="profile-overview">
                                    <div class="nk-block-head nk-block-head-md">
                                        <div class="card card-bordered">
                                            <ul class="data-list is-compact">
                                                {{-- <li class="data-item">
                                                    <div class="data-col">
                                                        <div class="data-label">Full Name</div>
                                                        <div class="data-value">{{$eligibilityform->user->name}}</div>
                                                    </div>
                                                </li>
                                               
                                                <li class="data-item">
                                                    <div class="data-col">
                                                        <div class="data-label">Email Address</div>
                                                        <div class="data-value">{{$eligibilityform->user->email}}</div>
                                                    </div>
                                                </li>
                                                <li class="data-item">
                                                    <div class="data-col">
                                                        <div class="data-label">Phone Number</div>
                                                        <div class="data-value text-soft"><em>{{$eligibilityform->user->phone}}</em></div>
                                                    </div>
                                                </li> --}} 
                                                <li class="data-item">
                                                    <div class="data-col">
                                                        <div class="data-label">Name of Bank </div>
                                                        <div class="data-value">{{$eligibilityform->institution_name}}</div>
                                                    </div>
                                                </li>

                                                <li class="data-item">
                                                    <div class="data-col">
                                                        <div class="data-label">Eligibility Type </div>
                                                        <div class="data-value">{{$eligibilityform->eligibility_type}}</div>
                                                    </div>
                                                </li>

                                                <li class="data-item">
                                                    <div class="data-col">
                                                        <div class="data-label">Official Address </div>
                                                        <div class="data-value">{{$eligibilityform->company_address}}</div>
                                                    </div>
                                                </li>


                                                <li class="data-item">
                                                    <div class="data-col">
                                                        <div class="data-label">Direct Line </div>
                                                        <div class="data-value">{{$eligibilityform->direct_line}}</div>
                                                    </div>
                                                </li>

                                                
                                                <li class="data-item">
                                                    <div class="data-col">
                                                        <div class="data-label">
                                                            Company Email Address </div>
                                                        <div class="data-value">{{$eligibilityform->company_email}}</div>
                                                    </div>
                                                </li>

                                               
                                               



                                                <li class="data-item">
                                                    <div class="data-col">
                                                        <div class="data-label">
                                                            Company Registration (RC) No. </div>
                                                        <div class="data-value">{{$eligibilityform->company_reg_number}}</div>
                                                    </div>
                                                </li>



                                                <li class="data-item">
                                                    <div class="data-col">
                                                        <div class="data-label">
                                                            Company Registration Date </div>
                                                        <div class="data-value">{{$eligibilityform->company_reg_date}}</div>
                                                    </div>
                                                </li>

                                               

                                                <li class="data-item">
                                                    <div class="data-col">
                                                        <div class="data-label">
                                                            Settlement Bank Account No.  </div>
                                                        <div class="data-value">{{$eligibilityform->settlement_bank_account_number}}</div>
                                                    </div>
                                                </li>


                                                <li class="data-item">
                                                    <div class="data-col">
                                                        <div class="data-label">
                                                            Local Entity Identification (LEI) Code  </div>
                                                        <div class="data-value">{{$eligibilityform->lei_code}}</div>
                                                    </div>
                                                </li>



                                                <li class="data-item">
                                                    <div class="data-col">
                                                        <div class="data-label">
                                                            SWIFT BIC Code  </div>
                                                        <div class="data-value">{{$eligibilityform->switt_code}}</div>
                                                    </div>
                                                </li>


                                            
                                            </ul>
                                        </div>
                                       
                                    </div><!-- .nk-block-head -->
                                  
                                </div>


                                <div class="tab-pane" id="principal">
                                    <div class="nk-block-head nk-block-head-md">
                                        <div class="card card-bordered">
                                            <ul class="data-list is-compact">
                                               
                                               <br>
                                              
                                               <h6 class="title">&nbsp;&nbsp;&nbsp;&nbsp; <b>Principal Officer 1</b></h6>
                                                <li class="data-item">
                                                    <div class="data-col">
                                                        <div class="data-label">Name of Principal Officer (1)   </div>
                                                        <div class="data-value">{{$eligibilityform->principal_director_name1}}</div>
                                                    </div>
                                                </li>

                                                <li class="data-item">
                                                    <div class="data-col">
                                                        <div class="data-label">Designation </div>
                                                        <div class="data-value">{{$eligibilityform->principal_director_designation1}}</div>
                                                    </div>
                                                </li>

                                               

                                                <li class="data-item">
                                                    <div class="data-col">
                                                        <div class="data-label">
                                                            Mobile Number / Direct Line  </div>
                                                        <div class="data-value">{{$eligibilityform->principal_director_phone1}}</div>
                                                    </div>
                                                </li>

                                                <li class="data-item">
                                                    <div class="data-col">
                                                        <div class="data-label">
                                                             Email Address </div>
                                                        <div class="data-value">{{$eligibilityform->principal_director_email1}}</div>
                                                    </div>
                                                </li>

                                          



                                                <hr>
                                               
                                                <h6 class="title">&nbsp;&nbsp;&nbsp;&nbsp; <b>Principal Officer 2</b></h6>

                                                <li class="data-item">

                                                    <div class="data-col">
                                                        <div class="data-label">Name of Principal Officer (2)  </div>
                                                        <div class="data-value">{{$eligibilityform->principal_director_name2}}</div>
                                                    </div>
                                                </li>

                                                <li class="data-item">
                                                    <div class="data-col">
                                                        <div class="data-label">Designation </div>
                                                        <div class="data-value">{{$eligibilityform->principal_director_designation2}}</div>
                                                    </div>
                                                </li>

                                               

                                                <li class="data-item">
                                                    <div class="data-col">
                                                        <div class="data-label">
                                                            Mobile Number /Direct Line </div>
                                                        <div class="data-value">{{$eligibilityform->principal_director_phone2}}</div>
                                                    </div>
                                                </li>

                                                <li class="data-item">
                                                    <div class="data-col">
                                                        <div class="data-label">
                                                            Email Address </div>
                                                        <div class="data-value">{{$eligibilityform->principal_director_email2}}</div>
                                                    </div>
                                                </li>

                                             

                                               
                                              
                                            </ul>
                                        </div>
                                       
                                    </div><!-- .nk-block-head -->
                                  
                                </div>




                               


                                



                                <div class="tab-pane" id="documents">
                                    <div class="nk-block-head nk-block-head-md">
                                        <div class="nk-fmg-listing nk-block-lg">
                                            
                                            <div class="tab-content">
                                               
                                                <div class="tab-pane active" id="file-group-view">
                                                    <div class="nk-files nk-files-view-group">
                                                        
                                                     
                                                        <div class="nk-files-group">
                                                           
                                                            <div class="nk-files-list">
                                                              
                                                               
                                                                <div class="row g-4">

                                                                    
                                                                     
                                                                    <div class="col-md-6">
                                                                        <div class="gallery card card-bordered">
                                                                            
                                                                            <div class="gallery-body card-inner align-center justify-between flex-wrap g-2">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fw-first-name">	A certified true  copy of the ‘ Memorandum and Articles of Association’ for the company </label>
                                                                            {{-- <a href="onb/public{{$eligibilityform->memorandumand_articles_of_association}}">Link</a> --}}
                                                                            @if(!empty($eligibilityform->memorandumand_articles_of_association)) 
                                                                            <a href="../public{{$eligibilityform->memorandumand_articles_of_association}}" download="{{$eligibilityform->memorandumand_articles_of_association}}"><br>Download Memorandum and Articles of Association</a>
                                                                            
                                                                            @endif
                                                                           
                                                                                
                                                                            
                                                                            
                                                                           
                                                                        </div>
                                                                    </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                        
                                                                    
                                                                    <div class="col-md-6">
                                                                        <div class="gallery card card-bordered">
                                                                            
                                                                            <div class="gallery-body card-inner align-center justify-between flex-wrap g-2">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fw-last-name">A certified true copy of the ‘Board Resolution’ to onboard as a participant of FMDQ Depository </label>
                                                                            @if(!empty($eligibilityform->board_resolution)) 
                                                                            <a href="../public{{$eligibilityform->board_resolution}}" download="{{$eligibilityform->board_resolution}}"><br>Download Board Resolution</a>
                                                                           
                                                                            @endif
                                                                         
                                                                           
                                                                        </div>
                                                                    </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>








                                                                     
                                                                    <div class="col-md-6">
                                                                        <div class="gallery card card-bordered">
                                                                            
                                                                            <div class="gallery-body card-inner align-center justify-between flex-wrap g-2">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fw-last-name">Certificate of Incorporation</label>
                                                                           
                                                                            @if(!empty($eligibilityform->certificate_of_incorporation)) 
                                                                            <a href="../public{{$eligibilityform->certificate_of_incorporation}}" download="{{$eligibilityform->certificate_of_incorporation}}"><br>Download Certificate of Incorporation</a>
                                                                           
                                                                            @endif
                                                                            <br>
                                                                            <br> 
                                                                           
                                                                           
                                                                        </div>
                                                                    </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>








                                                                    
                                                                    <div class="col-md-6">
                                                                        <div class="gallery card card-bordered">
                                                                            
                                                                            <div class="gallery-body card-inner align-center justify-between flex-wrap g-2">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fw-last-name">Particulars of Directors - CAC Form 7 (Include CAC 1.1 or Status Report where there is change of Director)</label>
                                                                            @if(!empty($eligibilityform->particulars_of_directors)) 
                                                                            <a href="../public{{$eligibilityform->particulars_of_directors}}" download="{{$eligibilityform->particulars_of_directors}}"><br>Download Particulars of Directors</a>
                                                                           
                                                                            @endif
                                                                           
                                                                           
                                                                        </div>
                                                                    </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>




                                                                    <div class="col-md-6">
                                                                        <div class="gallery card card-bordered">
                                                                            
                                                                            <div class="gallery-body card-inner align-center justify-between flex-wrap g-2">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fw-last-name">Particulars of Shareholders - CAC Form 2 or Status Report  (If applicable)</label>
                                                                            @if(!empty($eligibilityform->particulars_of_shareholders)) 
                                                                            <a href="../public{{$eligibilityform->particulars_of_shareholders}}" download="{{$eligibilityform->particulars_of_shareholders}}"><br>Download Particulars of Shareholders</a>
                                                                           
                                                                            @endif
                                                                      
                                                                           
                                                                        </div>
                                                                    </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>




                                                                   
                                                                    
                                                                   

                                                                  
                                                         
                        


                                                                    


                                                        <div class="col-md-6">
                                                            <div class="gallery card card-bordered">
                                                                
                                                                <div class="gallery-body card-inner align-center justify-between flex-wrap g-2">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="fw-last-name">Means of Identification (i.e.  International Passport bio page preferred /if not available Driver’s License) and National Identification Number Slip of all nominated principal officer(s)</label>
                                                                @if(!empty($eligibilityform->means_of_identification1)) 
                                                                <a href="../public{{$eligibilityform->means_of_identification1}}" download="{{$eligibilityform->means_of_identification1}}"><br>Download Means of Identification</a>
                                                               
                                                                @endif
                                                               
                                                               
                                                            </div>
                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-md-6">
                                                            <div class="gallery card card-bordered">
                                                                
                                                                <div class="gallery-body card-inner align-center justify-between flex-wrap g-2">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="fw-last-name">Means of Identification (i.e.  International Passport bio page preferred /if not available Driver’s License) and National Identification Number Slip of all nominated principal officer(s)</label>
                                                                @if(!empty($eligibilityform->means_of_identification2)) 
                                                                <a href="../public{{$eligibilityform->means_of_identification2}}" download="{{$eligibilityform->means_of_identification2}}"><br>Download Particulars of Directors</a>
                                                               
                                                                @endif
                                                               
                                                               
                                                            </div>
                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>




                                                        
                                                         <div class="col-md-6">
                                                            <div class="gallery card card-bordered">
                                                                
                                                                <div class="gallery-body card-inner align-center justify-between flex-wrap g-2">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="fw-last-name"> Signature Mandate Form</label>
                                                                @if(!empty($eligibilityform->signature_mandate_form )) 
                                                                <a href="../public{{$eligibilityform->signature_mandate_form }}" download="{{$eligibilityform->signature_mandate_form }}"><br>Download  Signature Mandate Form</a>
                                                               
                                                                @endif
                                                               
                                                               
                                                            </div>
                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>





                                                         <div class="col-md-6">
                                                            <div class="gallery card card-bordered">
                                                                
                                                                <div class="gallery-body card-inner align-center justify-between flex-wrap g-2">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="fw-last-name">  Declaration form</label>
                                                                @if(!empty($eligibilityform->declaration_form)) 
                                                                <a href="../public{{$eligibilityform->declaration_form}}" download="{{$eligibilityform->declaration_form}}"><br>Download Declaration form</a>
                                                               
                                                                @endif
                                                               
                                                               
                                                            </div>
                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>




                                                     

                                                    </div><!-- .nk-files -->
                                                </div><!-- .tab-pane -->
                                               
                                            </div><!-- .tab-content -->
                                        </div><!-- .nk-block -->
                                       
                                    </div><!-- .nk-block-head -->
                                  
                                </div>
                                <!--tab pane-->
                                
                                <!--tab pane-->
                            </div>
                            <!--tab content-->
                        </div>
                        <!--card inner-->
                    </div>
                    <!--card-->
                </div>
                <!--nk block lg-->
            </div>
        </div>
    </div>
</div>

                </div>

<!-- .modal -->
</div></div></div>




  
@endsection



