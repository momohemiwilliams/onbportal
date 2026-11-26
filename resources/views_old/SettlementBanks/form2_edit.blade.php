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
                                                    <a class="nav-link" href="#"><em class="icon ni ni-user-circle"></em><span>Bank Particulars</span></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link active" href="#"><em class="icon ni ni-repeat"></em><span>Principal Officer(s) Details</span></a>
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
                                                    <center> <p><b>To be completed by two Officers applying on behalf of the Bank, their two passports photographs attached, bearing their signatures at the back.</b></p></center>
                                                    <div class="">
                                                       
                                                        <div class="card-inner">
                                                          
                                                           
                                                            <form action="{{ route('form_step_two_SB',  $form_2_edit->id) }}" method="POST">
                                                                @csrf 
                                                             
                                                               
                                                               
                                                             
                                                                <h6 class="overline-title title">Principal Officer 1</h6>
                                                               
                                                             
                                                                <div class="row g-4">
                                                                   
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fw-last-name">Name of Principal Officer (1) *</label>
                                                                            <div class="form-control-wrap">
                                                                                <input name="principal_director_name1" required value="{{$form_2_edit->principal_director_name1}}" type="text" data-msg="Required" class="form-control required" id="fw-last-name" >
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fw-mobile-number">Designation *
                                                                            </label>
                                                                            <div class="form-control-wrap">
                                                                                <input type="text" required value="{{$form_2_edit->principal_director_designation1}}" name="principal_director_designation1" data-msg="Required" class="form-control required" >
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fw-mobile-number"> Mobile Number/Direct Line *
                                                                            </label>
                                                                            <div class="form-control-wrap">
                                                                                <input type="number" required value="{{$form_2_edit->principal_director_phone1}}" name="principal_director_phone1" data-msg="Required" class="form-control required" >
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                   
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fw-mobile-number"> Email Address *
                                                                                </label>
                                                                            <div class="form-control-wrap">
                                                                                <input  name="principal_director_email1" required value="{{$form_2_edit->principal_director_email1}}"  type="email" data-msg="Required" class="form-control required"  >
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    

                                                                    
                                                                </div>
                                                                <hr>

                                                                <h6 class="overline-title title">Principal Officer 2</h6>
                                                               
                                                             
                                                                <div class="row g-4">
                                                                   
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fw-last-name">Name of Principal Officer (2) *</label>
                                                                            <div class="form-control-wrap">
                                                                                <input required name="principal_director_name2" value="{{$form_2_edit->principal_director_name2}}" type="text" data-msg="Required" class="form-control" id="fw-last-name" >
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fw-mobile-number">Designation *
                                                                            </label>
                                                                            <div class="form-control-wrap">
                                                                                <input required type="text" value="{{$form_2_edit->principal_director_designation2}}" name="principal_director_designation2" data-msg="Required" class="form-control required" >
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fw-mobile-number"> Mobile Number /Direct Line *
                                                                            </label>
                                                                            @php 
                                                                             $principal_director_phone2 = trim($form_2_edit->principal_director_phone2);
                                                                            @endphp
                                                                            <div class="form-control-wrap">
                                                                                <input required type="number" value="{{$principal_director_phone2}}" name="principal_director_phone2" data-msg="Required" class="form-control required" >
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                   
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fw-mobile-number"> Email Address *
                                                                                </label>
                                                                            <div class="form-control-wrap">
                                                                                <input required name="principal_director_email2" value="{{$form_2_edit->principal_director_email2}}"  type="email" data-msg="Required" class="form-control required"  >
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                   

                                                                   

                                                                    
                                                                </div>
                                                                <hr>


                                                              
                                                               
                                                             
                                                      
                                                                    <div class="row g-4">
                                                                    <div class="row g-4">
                                                                       
                                                                      
                                                                        <div class="row g-4">
                                                                          
                                                                           
                                                                           
                                                                          
                                                                        
                                                                    
                                                                
                                                                            <div class="col-md-12">
                                                                                <br>  <br>
                                                                                <div class="form-group" >
                                                                                    
                                                                                    <ul class="custom-control-group g-3 align-center">
                                                                                        <li>
                                                                                            <a href="{{route('form_one_edit_SB', $form_2_edit->id)}}"> <span  class="btn btn-lg btn-primary">Previous</span></a>
                                                                                        </li>
                                                                                        <li>
                                                                                            <button  type="submit" class="btn btn-lg btn-primary">Continue</button>
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
            