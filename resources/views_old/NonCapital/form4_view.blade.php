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
                                            (Non-Capital Market Operator – Corporate) 
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
                                                    <a class="nav-link " href="#"><em class="icon ni ni-repeat"></em><span>Principal Officer(s) Detail</span></a>
                                                </li>




                                                <li class="nav-item">
                                                    <a class="nav-link " href="#"><em class="icon ni ni-file-text"></em><span>Documents</span></a>
                                                </li>
                                               
                                                    <li class="nav-item">
                                                        <a class="nav-link active"  href="#"><em class="icon ni ni-activity"></em><span>Signature Mandate</span></a>
                                                    </li>
                                               
                                            </ul><!-- .nav-tabs -->
                                            <div class="card-inner">
                                                <div class="nk-block">

                                                    <div class="">
                                                        <div class="card-inner">
                                                           
                                                           
                                                               
                                                                

                                                                    <div class="row g-4">
                                                                   


                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <p>  <a href="../../public{{$form_4->signature_mandate_form}}" download="{{$form_4->signature_mandate_form}}">Download  Signature Mandate Form</a></p>
                                                                            
                                                                        </div>
                                                                    </div>


                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <p>  <a href="../../public{{$form_4->declaration_form }}" download="{{$form_4->declaration_form }}">Download Declaration form</a></p>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                   

                                                                    <div class="col-md-12">
                                                                        <div class="nk-kycfm-footer">
                                                                            
                                                                            
                                                                        </div><!-- .nk-kycfm-footer -->
                                                                    </div>
                                                                  
                                                                
                                                                    <div class="col-md-12">
                                                                        <div class="form-group" >
                                                                            
                                                                            <ul class="custom-control-group g-3 align-center">
                                                                                <li>
                                                                                    <a href="{{route('form_three_view_CO', $form_4->id)}}"> <span  class="btn btn-lg btn-primary">Previous</span></a>
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
            