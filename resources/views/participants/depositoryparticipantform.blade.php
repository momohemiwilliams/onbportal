@extends('layouts.participantsmaster')

@section('content')
           
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="components-preview">
                    <div class="nk-block-head nk-block-head-lg wide-sm">
                        <div class="nk-block-head-content">
                            <div class="nk-block-head-sub"><a class="back-to" href="html/components.html"><em class="icon ni ni-arrow-left"></em><span>Dashboard</span></a></div>
                         
                          
                        </div>
                    </div><!-- .nk-block-head -->
                    <div class="nk-block nk-block-lg">
                        <div class="nk-block-head">
                            <div class="nk-block-head-content">
                                <h4 class="title nk-block-title">DEPOSITORY PARTICIPANT  FORM</h4>
                                <div class="nk-block-des">
                                
                                </div>
                            </div>
                        </div>
                        <div class="card card-bordered">
                            <div class="card-inner">
                                <form action="{{route('participantformSubmit')}}" method="POST" class="nk-wizard nk-wizard-simple is-alter" id="wizard-01">
                                    @csrf
                                    <div class="nk-wizard-head">
                                        <h5>Participant Particulars</h5>
                                    </div>
                                    <div class="nk-wizard-content">
                                        <label>Eligibility Type:</label>
                                        <br>
                                        <div class="row gy-3">
                                           
                                         
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <div class="custom-control custom-radio">    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">    <label class="custom-control-label" for="customRadio1">Foreign Bank</label></div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <div class="custom-control custom-radio">    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">    <label class="custom-control-label" for="customRadio1">Custodian</label></div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <div class="custom-control custom-radio">    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">    <label class="custom-control-label" for="customRadio1">Bank</label></div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <div class="custom-control custom-radio">    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">    <label class="custom-control-label" for="customRadio1">Fund Manager/Trustees</label></div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <div class="custom-control custom-radio">    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">    <label class="custom-control-label" for="customRadio1">Issuing & Paying Agent</label></div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <div class="custom-control custom-radio">    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">    <label class="custom-control-label" for="customRadio1">Registrars</label></div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <div class="custom-control custom-radio">    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">    <label class="custom-control-label" for="customRadio1">Stockbroker</label></div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <div class="custom-control custom-radio">    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">    <label class="custom-control-label" for="customRadio1">Radio</label></div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <div class="custom-control custom-radio">    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">    <label class="custom-control-label" for="customRadio1">Radio</label></div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <div class="custom-control custom-radio">    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">    <label class="custom-control-label" for="customRadio1">Radio</label></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="fw-first-name">Full Name</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" data-msg="Required" class="form-control required" id="fw-first-name" name="fw-first-name" value="dhdhdhd" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="fw-last-name">Email Address</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" data-msg="Required" value="dhdhdhd" class="form-control required" id="fw-last-name" name="fw-last-name" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="fw-mobile-number">Direct Line
                                                    </label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" data-msg="Required" value="dhdhdhd" class="form-control required" id="fw-mobile-number" name="fw-mobile-number" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="fw-mobile-number">Mobile Number</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" data-msg="Required" value="dhdhdhd" class="form-control required" id="fw-mobile-number" name="fw-mobile-number" required>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            {{-- <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="fw-nationality">Country</label>
                                                    <div class="form-control-wrap ">
                                                        <div class="form-control-select">
                                                            <select class="form-control required" data-msg="Required" id="fw-nationality" name="fw-nationality" required>
                                                                <option value="">Select Country</option>
                                                                <option value="us">United State</option>
                                                                <option value="uk">United KingDom</option>
                                                                <option value="fr">France</option>
                                                                <option value="ch">China</option>
                                                                <option value="cr">Czech Republic</option>
                                                                <option value="cb">Colombia</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .col --> --}}
                                        </div>
                                    </div>
                                    <div class="nk-wizard-head">
                                        <h5>Principal Officer(s) Detail</h5>
                                        <small>
                                        </small>
                                    </div>
                                    <div class="nk-wizard-content">
                                        <div class="row gy-3">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="fw-first-name">Office Address</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" data-msg="Required" class="form-control required" id="fw-first-name" name="fw-first-name" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="fw-last-name">Company Email Address</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" data-msg="Required" class="form-control required" id="fw-last-name" name="fw-last-name" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="fw-mobile-number">Company Registration (RC)
                                                        No
                                                    </label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" data-msg="Required" class="form-control required" id="fw-mobile-number" name="fw-mobile-number" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="fw-mobile-number">Company Registration
                                                        Date</label>
                                                    <div class="form-control-wrap">
                                                        <input type="date" data-msg="Required" class="form-control required" id="fw-mobile-number" name="fw-mobile-number" >
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="fw-mobile-number">Name of Settlement Bank
                                                    </label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" data-msg="Required" class="form-control required" id="fw-mobile-number" name="fw-mobile-number" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="fw-mobile-number">Settlement Bank Account No</label>
                                                    <div class="form-control-wrap">
                                                        <input type="number" data-msg="Required" class="form-control required" id="fw-mobile-number" name="fw-mobile-number" >
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="fw-mobile-number">Local Entity Identification 
                                                        (LEI) Code 
                                                    </label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" data-msg="Required" class="form-control required" id="fw-mobile-number" name="fw-mobile-number" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="fw-mobile-number">SWIFT BIC Code</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" data-msg="Required" class="form-control required" id="fw-mobile-number" name="fw-mobile-number" >
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div><!-- .row -->
                                    
                                    </div>
                                    <div class="nk-wizard-head">
                                        <h5>Principal Officer(s) Details</h5>
                                    </div>
                                    <div class="nk-wizard-content">
                                        <div class="row gy-3">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="fw-first-name">Mobile Number and Direct Line</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" data-msg="Required" class="form-control required" id="fw-first-name" name="fw-first-name" >
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="fw-last-name">Managing Director/CEO</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" data-msg="Required" class="form-control required" id="fw-last-name" name="fw-last-name" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="fw-last-name">Mobile Number and Direct Line</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" data-msg="Required" class="form-control required" id="fw-last-name" name="fw-last-name" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="fw-mobile-number">Email Address
                                                    </label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" data-msg="Required" class="form-control required" id="fw-mobile-number" name="fw-mobile-number" >
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="fw-last-name">Name and Role</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" data-msg="Required" class="form-control required" id="fw-last-name" name="fw-last-name" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="fw-last-name">Mobile Number and Direct Line</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" data-msg="Required" class="form-control required" id="fw-last-name" name="fw-last-name" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="fw-mobile-number">Email Address
                                                    </label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" data-msg="Required" class="form-control required" id="fw-mobile-number" name="fw-mobile-number" >
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="fw-last-name">Name and Role</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" data-msg="Required" class="form-control required" id="fw-last-name" name="fw-last-name" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="fw-last-name">Mobile Number and Direct Line</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" data-msg="Required" class="form-control required" id="fw-last-name" name="fw-last-name" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="fw-mobile-number">Email Address
                                                    </label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" data-msg="Required" class="form-control required" id="fw-mobile-number" name="fw-mobile-number" >
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="fw-mobile-number">Company Registration
                                                        Date</label>
                                                    <div class="form-control-wrap">
                                                        <input type="date" data-msg="Required" class="form-control required" id="fw-mobile-number" name="fw-mobile-number" >
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="fw-mobile-number">Name of Settlement Bank
                                                    </label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" data-msg="Required" class="form-control required" id="fw-mobile-number" name="fw-mobile-number" >
                                                    </div>
                                                </div>
                                            </div> 
                                           

                                
                                            
                                        </div><!-- .row -->
                                    </div>

                                    <div class="nk-wizard-head">
                                        <h5>Document Upload</h5>
                                    </div>
                                    <div class="nk-wizard-content">
                                        <div class="row gy-3">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="fw-first-name">Memorandumand Articles of Association</label>
                                                    <div class="form-control-wrap">
                                                        <input type="file" id="input-file-now" class="dropify" data-default-file="" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="fw-last-name">Board Resolution</label>
                                                    <div class="form-control-wrap">
                                                        <input type="file" id="input-file-now" class="dropify" data-default-file="" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="fw-last-name">Signature Mandate Form(s)</label>
                                                    <div class="form-control-wrap">
                                                        <input type="file" id="input-file-now" class="dropify" data-default-file="" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="fw-mobile-number"> Evidence of Securities and Exchange Commission (SEC) Registration 
                                                    </label>
                                                    <div class="form-control-wrap">
                                                        <input type="file" id="input-file-now" class="dropify" data-default-file="" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="fw-mobile-number">Evidence of Trading Exchange License/Approval for proprietary and/or client trade
                                                    </label>
                                                    <div class="form-control-wrap">
                                                        <input type="file" id="input-file-now" class="dropify" data-default-file="" />
                                                    </div>
                                                </div>
                                            </div>


                                          


                                            <div class="row gy-3">
                                          
                                           
                                                {{-- <div class="col-md-12">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" data-msg="Required" class="custom-control-input required" name="fw-policy" id="fw-policy" required>
                                                        <label class="custom-control-label" for="fw-policy">I agreed Terms and policy</label>
                                                    </div>
                                                </div> --}}
                                            </div><!-- .row -->
                                            
                                        </div><!-- .row -->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- .nk-block -->
                   
                </div><!-- .components-preview -->
            </div>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">

<script>
    $('.dropify').dropify();
</script>

         

@endsection



