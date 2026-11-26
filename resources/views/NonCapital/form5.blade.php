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
                                            <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#"><em class="icon ni ni-user-circle"></em><span>Participant Particulars</span></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link " href="#"><em class="icon ni ni-repeat"></em><span>Principal Officer(s) Detail</span></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#"><em class="icon ni ni-file-text"></em><span>Documents</span></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#"><em class="icon ni ni-bell"></em><span>Declaration</span></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link active" href="#"><em class="icon ni ni-activity"></em><span>Signature Mandate Form
                                                    </span></a>
                                                </li>
                                               
                                            </ul><!-- .nav-tabs -->
                                            <div class="card-inner">
                                                <div class="nk-block">

                                                    <div class="">
                                                        <div class="card-inner">
                                                           
                                                            <form action="#">
                                                                Authorised Signatory
                                                                <hr class="preview-hr">
                                                                    <div class="row g-4">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fw-mobile-number">Name of Institution
                                                                            </label>
                                                                            <div class="form-control-wrap">
                                                                                <input name="name_of_institution1" type="text" data-msg="Required" class="form-control required" id="fw-mobile-number" name="fw-mobile-number" >
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fw-mobile-number">Name of Signatory
                                                                            </label>
                                                                            <div class="form-control-wrap">
                                                                                <input name="name_of_signatory1" type="text" data-msg="Required" class="form-control required" id="fw-mobile-number"  >
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fw-first-name">Signature Specimen</label>
                                                                            <div class="form-control-wrap">
                                                                                <div class="custom-file">
                                                                                    <input name="signature_specimen1" type="file" class="custom-file-input" id="inputGroupFile01">
                                                                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                        
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fw-last-name">Signatory Class (A, B or C) </label>
                                                                            <div class="form-control-wrap">
                                                                                <div class="custom-file">
                                                                                    <input name="signature_class1" type="file" class="custom-file-input" id="inputGroupFile01">
                                                                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fw-last-name">Recent Passport Photograph
                                                                            </label>
                                                                            <div class="form-control-wrap">
                                                                                <div class="custom-file">
                                                                                    <input name="recent_passport_photpgraph1" type="file" class="custom-file-input" id="inputGroupFile01">
                                                                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                  
                                                                   
                                                                    
                                                                        <div class="col-12">
                                                                      
                                                                            <hr class="preview-hr">
                                                                          Authorised Signatory

                                                                            
                                                                        </div>

                                                                       

                                                                        <div class="row g-4">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="form-label" for="fw-mobile-number">Name of Institution
                                                                                    </label>
                                                                                    <div class="form-control-wrap">
                                                                                        <input name="name_of_institution2" type="text" data-msg="Required" class="form-control required" id="fw-mobile-number" name="fw-mobile-number" >
                                                                                    </div>
                                                                                </div>
                                                                            </div>
        
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="form-label" for="fw-mobile-number">Name of Signatory
                                                                                    </label>
                                                                                    <div class="form-control-wrap">
                                                                                        <input name="name_of_signatory2" type="text" data-msg="Required" class="form-control required" id="fw-mobile-number" name="fw-mobile-number" >
                                                                                    </div>
                                                                                </div>
                                                                            </div>
        
        
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label class="form-label" for="fw-first-name">Signature Specimen</label>
                                                                                    <div class="form-control-wrap">
                                                                                        <div class="custom-file">
                                                                                            <input name="signature_specimen2" type="file" class="custom-file-input" id="inputGroupFile01">
                                                                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label class="form-label" for="fw-last-name">Signatory Class (A, B or C) </label>
                                                                                    <div class="form-control-wrap">
                                                                                        <div class="custom-file">
                                                                                            <input name="signature_class2" type="file" class="custom-file-input" id="inputGroupFile01">
                                                                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label class="form-label" for="fw-last-name">Recent Passport Photograph
                                                                                    </label>
                                                                                    <div class="form-control-wrap">
                                                                                        <div class="custom-file">
                                                                                            <input name="recent_passport_photpgraph2" type="file" class="custom-file-input" id="inputGroupFile01">
                                                                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>



                                                                            <div class="col-12">
                                                                      
                                                                                <hr class="preview-hr">
                                                                              Authorised Signatory
    
                                                                                
                                                                            </div>
    
                                                                           
    
                                                                            <div class="row g-4">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label class="form-label" for="fw-mobile-number">Name of Institution
                                                                                        </label>
                                                                                        <div class="form-control-wrap">
                                                                                            <input name="name_of_institution3" type="text" data-msg="Required" class="form-control required" id="fw-mobile-number" name="fw-mobile-number" >
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
            
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label class="form-label" for="fw-mobile-number">Name of Signatory
                                                                                        </label>
                                                                                        <div class="form-control-wrap">
                                                                                            <input name="name_of_signatory3" type="text" data-msg="Required" class="form-control required" id="fw-mobile-number" name="fw-mobile-number" >
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
            
            
                                                                                <div class="col-md-4">
                                                                                    <div class="form-group">
                                                                                        <label class="form-label" for="fw-first-name">Signature Specimen</label>
                                                                                        <div class="form-control-wrap">
                                                                                            <div class="custom-file">
                                                                                                <input name="signature_specimen3" type="file" class="custom-file-input" id="inputGroupFile01">
                                                                                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                    
                                                                                <div class="col-md-4">
                                                                                    <div class="form-group">
                                                                                        <label class="form-label" for="fw-last-name">Signatory Class (A, B or C) </label>
                                                                                        <div class="form-control-wrap">
                                                                                            <div class="custom-file">
                                                                                                <input name="signature_class3" type="file" class="custom-file-input" id="inputGroupFile01">
                                                                                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <div class="form-group">
                                                                                        <label class="form-label" for="fw-last-name">Recent Passport Photograph
                                                                                        </label>
                                                                                        <div class="form-control-wrap">
                                                                                            <div class="custom-file">
                                                                                                <input name="recent_passport_photpgraph3" type="file" class="custom-file-input" id="inputGroupFile01">
                                                                                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                           


                                                                                <div class="col-md-12">
                                                                                    <div class="form-group" style="margin: 10px 0px 0px 705px">
                                                                                        
                                                                                        <ul class="custom-control-group g-3 align-center">
                                                                                            <li>
                                                                                                <button  type="submit" class="btn btn-lg btn-primary">Previous</button>
                                                                                            </li>
                                                                                            <li>
                                                                                                <button  type="submit" class="btn btn-lg btn-primary">Save And Submit</button>
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
            