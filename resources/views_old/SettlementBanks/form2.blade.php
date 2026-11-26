@extends('layouts.external')

@section('content')
                <!-- content @s -->
                <div class="nk-content nk-content-fluid">
                    <div class="container-xl wide-lg">
                        <div class="nk-content-body">
                            <div class="nk-block-head nk-block-head-sm">
                                <div class="nk-block-between g-3">
                                    <div class="nk-block-head-content">
                                        <h3 class="nk-block-title page-title">DEPOSITORY PARTICIPANT FORM</h3>
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
                                            @if (\Session::has('success'))
                                            <div><div class="alert alert-success alert-border-left alert-dismissible fade show" role="alert">
                                <strong> {{ \Session::get('success') }} </strong> </b> 
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div></div>
                                @endif
                                            <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#"><em class="icon ni ni-user-circle"></em><span>Participant Particulars</span></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link active" href="#"><em class="icon ni ni-repeat"></em><span>Principal Officer(s) Detail</span></a>
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
                                                          
                                                           
                                                            <form action="{{ route('form_step_two',  $form_2->id) }}" method="POST">
                                                                @csrf 
                                                               
                                                                <div class="row g-4">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fw-last-name">Name of Managing
                                                                                Director/CEO</label>
                                                                            <div class="form-control-wrap">
                                                                                <input name="managing_director_name" type="text" data-msg="Required" class="form-control required" id="fw-last-name" >
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fw-mobile-number"> Managing
                                                                                Director/CEO Mobile Number
                                                                            </label>
                                                                            <div class="form-control-wrap">
                                                                                <input type="number" name="managing_director_phone" data-msg="Required" class="form-control required" id="fw-mobile-number">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fw-mobile-number"> Managing
                                                                                Director/CEO Email Address
                                                                                </label>
                                                                            <div class="form-control-wrap">
                                                                                <input name="managing_director_email" type="email" data-msg="Required" class="form-control required" id="fw-mobile-number" >
                                                                            </div>
                                                                        </div>
                                                                    </div>
                        


                                                                    <div class="row g-4">
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="fw-last-name">Name of Principal Officer</label>
                                                                                <div class="form-control-wrap">
                                                                                    <input name="principal_director_name" type="text" data-msg="Required" class="form-control required" id="fw-last-name"  >
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="fw-mobile-number"> Principal Officer
                                                                                    Mobile Number
                                                                                </label>
                                                                                <div class="form-control-wrap">
                                                                                    <input type="number" name="principal_director_phone" data-msg="Required" class="form-control required" id="fw-mobile-number" >
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="fw-mobile-number"> Principal Officer
                                                                                     Email Address
                                                                                    </label>
                                                                                <div class="form-control-wrap">
                                                                                    <input name="principal_director_email" type="email" data-msg="Required" class="form-control required" id="fw-mobile-number" name="fw-mobile-number" >
                                                                                </div>
                                                                            </div>
                                                                        </div>
                        







                                                                        <div class="row g-4">
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label class="form-label" for="fw-last-name">Name of Compliance Officer</label></label>
                                                                                    <div class="form-control-wrap">
                                                                                        <input name="compliance_director_name" type="text" data-msg="Required" class="form-control required" id="fw-last-name" name="fw-last-name" >
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label class="form-label" for="fw-mobile-number"> Compliance Officer Mobile Number
                                                                                    </label>
                                                                                    <div class="form-control-wrap">
                                                                                        <input type="number" name="compliance_director_phone" data-msg="Required" class="form-control required" id="fw-mobile-number" name="fw-mobile-number" >
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label class="form-label" for="fw-mobile-number"> Compliance Email Address
                                                                                        </label>
                                                                                    <div class="form-control-wrap">
                                                                                        <input name="compliance_director_email" type="email" data-msg="Required" class="form-control required" id="fw-mobile-number" name="fw-mobile-number" >
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                            
                                                                        
                                                                    
                                                                
                                                                            <div class="col-md-12">
                                                                                <div class="form-group" >
                                                                                    
                                                                                    <ul class="custom-control-group g-3 align-center">
                                                                                        <li>
                                                                                            <a href="{{route('userform_one_edit', $form_2->id)}}"> <span  class="btn btn-lg btn-primary">Previous</span></a>
                                                                                        </li>
                                                                                        <li>
                                                                                            <button  type="submit" class="btn btn-lg btn-primary">Save And Contine</button>
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
            