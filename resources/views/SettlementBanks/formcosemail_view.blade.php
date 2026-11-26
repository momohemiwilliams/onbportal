@extends('layouts.external')

@section('content')
                <!-- content @s -->
                <div class="nk-content nk-content-fluid">
                    <div class="container-xl wide-lg">
                        <div class="nk-content-body">
                            <div class="nk-block-head nk-block-head-sm">
                                <div class="nk-block-between g-3">
                                    <div class="nk-block-head-content">
                                        <h3 class="nk-block-title page-title">SETTLEMENT BANK ELIGIBILITY FORM</h3>
                                        <div class="nk-block-des text-soft">
                                          
                                        </div>
                                    </div>
                                    {{-- <div class="nk-block-head-content">
                                        <a href="html/user-list-regular.html" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                                        <a href="html/user-list-regular.html" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
                                    </div> --}}
                                </div>
                            </div><!-- .nk-block-head -->
                            <div class="nk-block">
                                <div class="card card-bordered">
                                    <div class="card-aside-wrap">
                                        <div class="card-content">
                                            <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#"><em class="icon ni ni-user-circle"></em><span>Participant Particulars</span></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#"><em class="icon ni ni-repeat"></em><span>Principal Officer(s) Details</span></a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link active" href="#"><em class="icon ni ni-text-rich"></em><span>Correspondence Email Address</span></a>
                                                </li>

                                               


                                                <li class="nav-item">
                                                    <a class="nav-link" href="#"><em class="icon ni ni-file-text"></em><span>Documents</span></a>
                                                </li>
                                               {{-- <li class="nav-item">
                                                        <a class="nav-link"  href="#"><em class="icon ni ni-bell"></em><span>Notifications</span></a>
                                                    </li> --}}
                                                    <li class="nav-item">
                                                        <a class="nav-link"  href="#"><em class="icon ni ni-activity"></em><span>Signature Mandate</span></a>
                                                    </li>
                                               
                                            </ul><!-- .nav-tabs -->
                                            <div class="card-inner">
                                                <div class="nk-block">
                                                   
                                                    <div class="">
                                                       
                                                        <div class="card-inner">
                                                          
                                                           
                                                            <form action="{{ route('external.onboarding.step3.update',  $form_cores_view->id) }}" method="POST">
                                                                @csrf 
                                                             
                                                                <h6 class="overline-title title">General Correspondence</h6>
                                                               
                                                             
                                                                <div class="row g-4">
                                                                   
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fw-last-name">Emails *</label>
                                                                            <div class="form-control-wrap">
                                                                                <textarea readonly required name="general_correspondence_email" class="form-control required">{{$form_cores_view->general_correspondence_email}}</textarea>
                                                                               
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                   
                                                                    
                                                                  
                                                                    
                                                                </div>
                                                                <hr>



                                                                <h6 class="overline-title title">Operations Team/Group</h6>
                                                               
                                                             
                                                                <div class="row g-4">
                                                                   
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fw-last-name">Emails *</label>
                                                                            <div class="form-control-wrap">
                                                                                <textarea readonly required name="operations_team_email" class="form-control required">{{$form_cores_view->operations_team_email}}</textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                   
                                                                  
                                                                    
                                                                </div>
                                                                <hr>





                                                                <h6 class="overline-title title">Other Groups</h6>
                                                               
                                                             
                                                                <div class="row g-4">
                                                                   
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fw-last-name">Emails *</label>
                                                                            <div class="form-control-wrap">
                                                                                <textarea readonly required name="other_groups_email" class="form-control required">{{$form_cores_view->other_groups_email}}</textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                   
                                                                    
                                                                  
                                                                    
                                                                </div>
                                                                <hr>


                                                             

                                                                <br>
                                                      
                                                                    <div class="row g-4">
                                                                    <div class="row g-4">
                                                                       
                                                                      
                                                                        <div class="row g-4">
                                                                          
                                                                           
                                                                           
                            
                                                                        
                                                                    
                                                                
                                                                            <div class="col-md-12">
                                                                                <br>  <br>
                                                                                <div class="form-group" >
                                                                                    
                                                                                    <ul class="custom-control-group g-3 align-center">
                                                                                        <li>
                                                                                            <a href="{{route('userform_two_view', $form_cores_view->id)}}"> <span  class="btn btn-lg btn-primary">Previous</span></a>
                                                                                        </li>
                                                                                        <li>
                                                                                            <a href="{{route('userform_three_view', $form_cores_view->id)}}"> <span  class="btn btn-lg btn-primary">Next</span></a>
                                                                                        </li>
                                                                                       
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                 <!-- .nk-block-head -->
                                                    
                                            </div><!-- .card-inner -->
                                        </div><!-- .card-content -->
                                     
                                    </div><!-- .card-aside-wrap -->
                                </div><!-- .card -->
                            </div><!-- .nk-block -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
                <!-- content @e -->

                @endsection    
            