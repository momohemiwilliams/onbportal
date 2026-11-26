@extends('layouts.external')

@section('content')
                <!-- content @s -->
                <div class="nk-content nk-content-fluid">
                    <div class="container-xl wide-lg">
                        <div class="nk-content-body">
                            <div class="nk-block-head nk-block-head-sm">
                                <div class="nk-block-between g-3">
                                    <div class="nk-block-head-content">
                                        <h3 class="nk-block-title page-title">Depository Participant Eligibility Form 
                                            (Capital Market Operator)
                                       </h3>
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
                                                    <a class="nav-link active" href="#"><em class="icon ni ni-repeat"></em><span>Principal Officer(s) Details</span></a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link" href="#"><em class="icon ni ni-text-rich"></em><span>Correspondence Email Address</span></a>
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
                                                     {{-- <center> <p><b>
                                                        (Minimum of two (2) Principal Officers and a Compliance Officer must be provided)</b></p></center>  --}}

                                                         <center> <p><b>
                                                        (Minimum of two (2) Principal Officers and a Compliance Officer must be provided)</b></p></center> 
                                                    <div class="">
                                                       
                                                        <div class="card-inner">
                                                          
                                                           
                                                            <form action="{{ route('form_step_two',  $form_2->id) }}" method="POST">
                                                                @csrf 
                                                             
                                                                <h6 class="overline-title title">Principal Officer 1</h6>
                                                               
                                                             
                                                                <div class="row g-4">
                                                                   
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fw-last-name">Managing Director/CEO *</label>
                                                                            <div class="form-control-wrap">
                                                                                <input readonly name="managing_director_name" required value="{{$form_2->managing_director_name}}" type="text" data-msg="Required" class="form-control required" id="fw-last-name">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fw-mobile-number"> Mobile Number and Direct Line *
                                                                            </label>
                                                                            <div class="form-control-wrap">
                                                                                <input readonly type="number" required value="{{$form_2->managing_director_phone}}" name="managing_director_phone" data-msg="Required" class="form-control required" >
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fw-mobile-number"> Email Address *
                                                                                </label>
                                                                            <div class="form-control-wrap">
                                                                                <input readonly name="managing_director_email" required value="{{$form_2->managing_director_email}}"  type="email" data-msg="Required" class="form-control required"  >
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fw-mobile-number"> Bank Verification Number  *
                                                                                </label>
                                                                            <div class="form-control-wrap">
                                                                                <input readonly name="managing_director_bvn" required value="{{$form_2->managing_director_bvn}}"  type="text" data-msg="Required" class="form-control required"  >
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fw-mobile-number"> National Identification Number  *
                                                                                </label>
                                                                            <div class="form-control-wrap">
                                                                                <input readonly name="managing_director_nin" required value="{{$form_2->managing_director_nin}}"  type="text" data-msg="Required" class="form-control required"  >
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    
                                                                </div>
                                                                <hr>


                                                                <h6 class="overline-title title">Principal Officer 2</h6>
                                                               
                                                             
                                                                <div class="row g-4">
                                                                   
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fw-last-name">Name *</label>
                                                                            <div class="form-control-wrap">
                                                                                <input readonly name="principal_director_name1" required value="{{$form_2->principal_director_name1}}" type="text" data-msg="Required" class="form-control required" id="fw-last-name" >
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fw-mobile-number">Designation *
                                                                            </label>
                                                                            <div class="form-control-wrap">
                                                                                <input readonly type="text" required value="{{$form_2->principal_director_designation1}}" name="principal_director_designation1" data-msg="Required" class="form-control required" >
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fw-mobile-number"> Mobile Number and Direct Line *
                                                                            </label>
                                                                            <div class="form-control-wrap">
                                                                                <input readonly type="number" required value="{{$form_2->principal_director_phone1}}" name="principal_director_phone1" data-msg="Required" class="form-control required" >
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                   
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fw-mobile-number"> Email Address *
                                                                                </label>
                                                                            <div class="form-control-wrap">
                                                                                <input readonly name="principal_director_email1" required value="{{$form_2->principal_director_email1}}"  type="email" data-msg="Required" class="form-control required"  >
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fw-mobile-number"> Bank Verification Number  *
                                                                                </label>
                                                                            <div class="form-control-wrap">
                                                                                <input readonly name="principal_director_bvn1" required value="{{$form_2->principal_director_bvn1}}"  type="text" data-msg="Required" class="form-control required"  >
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fw-mobile-number"> National Identification Number  *
                                                                                </label>
                                                                            <div class="form-control-wrap">
                                                                                <input readonly name="principal_director_nin1" required value="{{$form_2->principal_director_nin1}}"  type="text" data-msg="Required" class="form-control required"  >
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    
                                                                </div>
                                                                <hr>

                                                                <h6 class="overline-title title">Principal Officer 3</h6>
                                                               
                                                             
                                                                <div class="row g-4">
                                                                   
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fw-last-name">Name</label>
                                                                            <div class="form-control-wrap">
                                                                                <input readonly name="principal_director_name2" value="{{$form_2->principal_director_name2}}" type="text" data-msg="Required" class="form-control" id="fw-last-name" >
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fw-mobile-number">Designation
                                                                            </label>
                                                                            <div class="form-control-wrap">
                                                                                <input readonly type="text" value="{{$form_2->principal_director_designation2}}" name="principal_director_designation2" data-msg="Required" class="form-control required" >
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fw-mobile-number"> Mobile Number / Direct Line
                                                                            </label>
                                                                            <div class="form-control-wrap">
                                                                                <input readonly type="text" value="{{$form_2->principal_director_phone2}}" name="principal_director_phone2" data-msg="Required" class="form-control required" >
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                   
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fw-mobile-number"> Email Address
                                                                                </label>
                                                                            <div class="form-control-wrap">
                                                                                <input readonly name="principal_director_email2" value="{{$form_2->principal_director_email2}}"  type="email" data-msg="Required" class="form-control required"  >
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fw-mobile-number"> Bank Verification Number 
                                                                                </label>
                                                                            <div class="form-control-wrap">
                                                                                <input readonly name="principal_director_bvn2" value="{{$form_2->principal_director_bvn2}}"  type="text" data-msg="Required" class="form-control required"  >
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fw-mobile-number"> National Identification Number 
                                                                                </label>
                                                                            <div class="form-control-wrap">
                                                                                <input readonly name="principal_director_nin2" value="{{$form_2->principal_director_nin2}}"  type="text" data-msg="Required" class="form-control required"  >
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    
                                                                </div>
                                                                <hr>


                                                                <h6 class="overline-title title">Principal Officer 4</h6>
                                                               
                                                             
                                                                <div class="row g-4">
                                                                   
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fw-last-name">Compliance Officer *</label>
                                                                            <div class="form-control-wrap">
                                                                                <input readonly name="compliance_director_name" required value="{{$form_2->compliance_director_name}}" type="text" data-msg="Required" class="form-control required" id="fw-last-name" >
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    {{-- <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fw-mobile-number">Designation
                                                                            </label>
                                                                            <div class="form-control-wrap">
                                                                                <input readonly type="number" value="{{$form_2->compliance_director_designation}}" name="compliance_director_designation" data-msg="Required" class="form-control required" >
                                                                            </div>
                                                                        </div>
                                                                    </div> --}}
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fw-mobile-number"> Mobile Number / Direct Line *
                                                                            </label>
                                                                            <div class="form-control-wrap">
                                                                                <input readonly type="number" required value="{{$form_2->compliance_director_phone}}" name="compliance_director_phone" data-msg="Required" class="form-control required" >
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                   
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fw-mobile-number"> Email Address *
                                                                                </label>
                                                                            <div class="form-control-wrap">
                                                                                <input readonly name="compliance_director_email" required value="{{$form_2->compliance_director_email}}"  type="email" data-msg="Required" class="form-control required"  >
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fw-mobile-number"> Bank Verification Number  *
                                                                                </label>
                                                                            <div class="form-control-wrap">
                                                                                <input readonly name="compliance_director_bvn" required value="{{$form_2->compliance_director_bvn}}"  type="text" data-msg="Required" class="form-control required"  >
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fw-mobile-number"> National Identification Number  *
                                                                                </label>
                                                                            <div class="form-control-wrap">
                                                                                <input readonly name="compliance_director_nin" required value="{{$form_2->compliance_director_nin}}"  type="text" data-msg="Required" class="form-control required"  >
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
                                                                                            <a href="{{route('userform_one_view', $form_2->id)}}"> <span  class="btn btn-lg btn-primary">Previous</span></a>
                                                                                        </li>

                                                                                        <li>
                                                                                            <a href="{{route('form_cores_view', $form_2->id)}}"> <span  class="btn btn-lg btn-primary">Next</span></a>
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
            