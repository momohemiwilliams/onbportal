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
                                                    <a class="nav-link active" href="#"><em class="icon ni ni-repeat"></em><span>Personal Details</span></a>
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
                                                    <center> <p><b>(Kindly Provide Information Below)</b></p></center>
                                                    <div class="">
                                                       
                                                        <div class="card-inner">
                                                          
                                                           
                                                            <form action="{{ route('form_step_two_private_account',  $form_2->id) }}" method="POST">
                                                                @csrf 
                                                             
                                                               
                                                               
                                                        
                                                                <div class="row g-4">
                                                                   
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fw-last-name">Purpose for Securities  Account *</label>
                                                                            <div class="form-control-wrap">
                                                                                <input name="purpose_for_account" readonly value="{{$form_2->purpose_for_account}}" type="text" data-msg="readonly" class="form-control readonly" id="fw-last-name" >
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fw-mobile-number">Beneficial Owners of Securities/Assets (If Different from Private Account Holder) *
                                                                            </label>
                                                                            <div class="form-control-wrap">
                                                                                <textarea type="text" readonly  name="beneficial" data-msg="readonly" class="form-control readonly" >
                                                                                    {{$form_2->beneficial}}
                                                                                </textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fw-mobile-number">Source of funds *
                                                                            </label>
                                                                            <div class="form-control-wrap">
                                                                                <input type="text" readonly value="{{$form_2->source_of_fund}}" name="source_of_fund" data-msg="readonly" class="form-control readonly" >
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                   
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fw-mobile-number"> Employer’s Name /Occupation *
                                                                                </label>
                                                                            <div class="form-control-wrap">
                                                                                <input name="occupation" readonly value="{{$form_2->occupation}}"  type="text" data-msg="readonly" class="form-control readonly"  >
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fw-mobile-number"> Employer’s / Office Address *
                                                                                </label>
                                                                            <div class="form-control-wrap">
                                                                                <input name="office_address" readonly value="{{$form_2->office_address}}"  type="text" data-msg="readonly" class="form-control readonly"  >
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fw-mobile-number"> Current Position *
                                                                                </label>
                                                                            <div class="form-control-wrap">
                                                                                <input name="current_position" readonly value="{{$form_2->current_position}}"  type="text" data-msg="readonly" class="form-control readonly"  >
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    

                                                                    
                                                                </div>
                                                                
                                                             
                                                      
                                                                    <div class="row g-4">
                                                                    <div class="row g-4">
                                                                       
                                                                      
                                                                        <div class="row g-4">
                                                                          
                                                                           
                                                                           
                                                                          
                                                                        
                                                                    
                                                                
                                                                            <div class="col-md-12">
                                                                                <br>  <br>
                                                                                <div class="form-group" >
                                                                                    
                                                                                    <ul class="custom-control-group g-3 align-center">
                                                                                        <li>
                                                                                            <a href="{{route('form_one_view_PA', $form_2->id)}}"> <span  class="btn btn-lg btn-primary">Previous</span></a>
                                                                                        </li>

                                                                                        <li>
                                                                                            <a href="{{route('form_three_view_PA', $form_2->id)}}"> <span  class="btn btn-lg btn-primary">Next</span></a>
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
            