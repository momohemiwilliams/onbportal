@extends('layouts.external')

@section('content')
                <!-- content @s -->
                <div class="nk-content nk-content-fluid">
                    <div class="container-xl wide-lg">
                        <div class="nk-content-body">
                            <div class="nk-block-head nk-block-head-sm">
                                <div class="nk-block-between g-3">
                                    <div class="nk-block-head-content">
                                        <h3 class="nk-block-title page-title">Depository Participant Eligibility Form (Private)</h3>
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
                                                    <a class="nav-link" href="#"><em class="icon ni ni-user-circle"></em><span>Account Details</span></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link " href="#"><em class="icon ni ni-repeat"></em><span>Personal Details</span></a>
                                                </li>
                                               
                                                <li class="nav-item">
                                                    <a class="nav-link active" href="#"><em class="icon ni ni-file-text"></em><span>Documents</span></a>
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
                                                    {{-- <center> <p><b>In the absence of immediate availability of Board Resolution, a three (3) months deferral letter signed by the principal officer of the prospective participant should be provided/uploaded for the onboarding process to be completed</b></p></center> --}}
                                                    <div class="">
                                                        <div class="card-inner">
                                                           
                                                            <form action="{{ route('form_step_three_private_account',  $form_3->id) }}" enctype="multipart/form-data" method="POST">
                                                                @csrf 
                                                                <div class="row g-4">

                                                                    <div class="col-md-12">
                                                                        <div class="gallery card card-bordered">
                                                                            
                                                                            <div class="gallery-body card-inner align-center justify-between flex-wrap g-2">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fw-last-name">Means of Identification (i.e.  International Passport bio page preferred /if not available Driver’s License) and National Identification Number Slip of all nominated principal officer(s)</label>
                                                                            @if(!empty($form_3->means_of_identification1)) 
                                                                            <a href="../../public{{$form_3->means_of_identification1}}" download="{{$form_3->means_of_identification1}}"><br>Download Particulars of Directors</a>
                                                                            
                                                                            @endif
                                                                            
                                                                           
                                                                        </div>
                                                                    </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                   
                                                                   
                                                                   
                        

                                                                    
                                                                  
                                                                    
                                                                    <div class="col-md-12">
                                                                        <br><br>
                                                                        <div class="form-group" >
                                                                            
                                                                            <ul class="custom-control-group g-3 align-center">
                                                                                <li>
                                                                                    <a href="{{route('form_two_view_PA', $form_3->id)}}"> <span  class="btn btn-lg btn-primary">Previous</span></a>
                                                                                </li>

                                                                                <li>
                                                                                    <a href="{{route('form_four_view_PA', $form_3->id)}}"> <span  class="btn btn-lg btn-primary">Next</span></a>
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
                <!-- content @e -->

                @endsection    
            