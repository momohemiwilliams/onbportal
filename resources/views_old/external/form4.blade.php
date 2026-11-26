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
                                                    <a class="nav-link " href="#"><em class="icon ni ni-repeat"></em><span>Principal Officer(s) Details</span></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#"><em class="icon ni ni-text-rich"></em><span>Correspondence Email Address</span></a>
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
                                                        @if ($message = Session::get('success'))
                                            <div class="alert alert-success alert-block">
                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @endif

                                        @if ($message = Session::get('error'))
                                            <div class="alert alert-success alert-block">
                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @endif
                            
                                        @if (count($errors) > 0)
                                            <div class="alert alert-danger">
                                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                                        <div class="card-inner">
                                                           
                                                            <form action="{{ route('form_step_four',  $form_4->id) }}" enctype="multipart/form-data" method="POST">
                                                                @csrf 
                                                               
                                                                 <div class="row g-4">
                                                                   
                                                                    <div class="row g-4">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <p>  <a href="../../public/signature_mandate_form/Signature_Mandate.pdf" download="Signature_Mandate.pdf"> Click to download Signature Mandate Form and upload a signed copy</a></p>
                                                                            <label class="form-label" for="fw-mobile-number">Upload signed Signature Mandate Form
                                                                            </label>
                                                                            <div class="custom-file">
                                                                                <div class="custom-file">
                                                                                    <input  name="signature_mandate_form" type="file" class="custom-file-input" id="inputGroupFile01" >
                                                                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <p>  <a href="../../public/declaration_form/Declaration.pdf" download="Declaration.pdf">Click to download Declaration Form and upload a signed copy </a></p>
                                                                            <label class="form-label" for="fw-mobile-number">Upload signed Declaration Form
                                                                            </label>
                                                                            <div class="custom-file">
                                                                                <div class="custom-file">
                                                                                    <input  name="declaration_form" type="file" class="custom-file-input" id="inputGroupFile01">
                                                                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                   

                                                                    <div class="col-md-12">
                                                                        <div class="nk-kycfm-footer">
                                                                            <div class="form-group">
                                                                                <div class="custom-control custom-control-xs custom-checkbox">
                                                                                    <input type="checkbox" name="certified_check_box"  class="custom-control-input" id="tc-agree">
                                                                                    {{-- <label class="custom-control-label" for="tc-agree">I Have Read The <a href="#">Terms And Conditions</a> And <a href="#">Privacy Policy</a></label> --}}

                                                                                    <label class="custom-control-label" for="tc-agree"> I certify that all information entered is correct.</label>
                                                                                </div>
                                                                            </div>
                                                                           
                                                                            {{-- <div class="form-group">
                                                                                <div class="custom-control custom-control-xs custom-checkbox">
                                                                                    <input type="checkbox"  class="custom-control-input" id="info-assure">
                                                                                    <label class="custom-control-label" for="info-assure">All The Information I Have Entered Is Correct.</label>
                                                                                </div>
                                                                            </div> --}}
                                                                            
                                                                        </div><!-- .nk-kycfm-footer -->
                                                                    </div>
                                                                  
                                                                
                                                                    <div class="col-md-12">
                                                                        <div class="form-group" >
                                                                            
                                                                            <ul class="custom-control-group g-3 align-center">
                                                                                <li>
                                                                                    <a href="{{route('userform_three_edit', $form_4->id)}}"> <span  class="btn btn-lg btn-primary">Previous</span></a>
                                                                                </li>
                                                                                <li>
                                                                                    {{-- <button class="btn btn-lg btn-primary" type="submit">
                                                                                        <i class="loading-icon fa-lg fas fa-spinner fa-spin hide"></i> &nbsp; 
                                                                                        <i class="czi-user mr-2 ml-n1"></i>
                                                                                        <span class="btn-txt">{{ __('Submit') }}</span></button> --}}
                                                                                        <button class="btn btn-lg btn-primary btn-block" name="SUBMIT" id="submit" onclick="loading(); setTimeout('document.getElementById(\'' + this.id + '\').disabled=true;', 50);   " type="submit">
                                                                                            <i class="fas fa-spinner fa-spin" style="display:none;"></i>
                                                                                           <span class="btn-text">Submit</span>
                                                                                         </button>



                                                                                    {{-- <button  type="submit" class="btn btn-lg btn-primary"></button> --}}
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
                <!-- content @e -->
       
                @endsection    
            