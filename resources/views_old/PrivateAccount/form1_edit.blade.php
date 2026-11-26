@extends('layouts.external')

@section('content')
           

                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Depository Participant Eligibility Form (Private)</h3>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                              
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="card card-bordered">
                                        <div class="card-aside-wrap">
                                            <div class="card-content">
                                                <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" href="#"><em class="icon ni ni-user-circle"></em><span>Account Details</span></a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link"  href="#"><em class="icon ni ni-repeat"></em><span>Personal Details</span></a>
                                                    </li>
                                                   
                                                    <li class="nav-item">
                                                        <a class="nav-link"  href="#"><em class="icon ni ni-file-text"></em><span>Documents</span></a>
                                                    </li>
                                                    {{-- <li class="nav-item">
                                                        <a class="nav-link"  href="#"><em class="icon ni ni-bell"></em><span>Notifications</span></a>
                                                    </li> --}}
                                                    <li class="nav-item">
                                                        <a class="nav-link"  href="#"><em class="icon ni ni-activity"></em><span>Signature Mandate</span></a>
                                                    </li>
                                                   
                                                </ul><!-- .nav-tabs -->
                                                @if (\Session::has('success'))
                                                <div><div class="alert alert-success alert-border-left alert-dismissible fade show" role="alert">
                                    <strong> {{ \Session::get('success') }} </strong> </b> 
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div></div>
                                    @endif
                            
                                                <div class="card-inner">
                                                    <div class="nk-block">
    
                                                        <div class="">
                                                            <div class="card-inner">
                                                               
                                                                <form action="{{ route('form_step_one_update_PA', $form_1_edit->id) }}" method="POST">
                                                                    @csrf
                                                                   
                                                                    <div class="row g-4">
                                                               
                                                                        
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="phone-no-1">Name of Private Account Holder * </label>
                                                                                <div class="form-control-wrap">
                                                                                  
                                                                                    <input required value="{{$form_1_edit->institution_name}}" name="institution_name" type="text" class="form-control" id="phone-no-1">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="phone-no-1"> Home Address * </label>
                                                                                <div class="form-control-wrap">
                                                                                    <input required value="{{$form_1_edit->home_address}}"   name="home_address" type="text" class="form-control" id="phone-no-1">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="phone-no-1">Mobile Number * </label>
                                                                                <div class="form-control-wrap">
                                                                                    <input  value="{{$form_1_edit->mobile_number}}"  required name="mobile_number" type="number" class="form-control" id="phone-no-1">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="pay-amount-1">
                                                                                Email Address *
                                                                                </label>
                                                                                <div class="form-control-wrap">
                                                                                    <input value="{{$form_1_edit->email_address}}"   required name="email_address" type="email" class="form-control" id="pay-amount-1">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                       

                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="pay-amount-1">
                                                                                    Nationality *
                                                                                </label>
                                                                                <div class="form-control-wrap">
                                                                                    <input value="{{$form_1_edit->nationality}}" required name="nationality" type="text" class="form-control" id="pay-amount-1">
                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="pay-amount-1">
                                                                                    Name of Bank *
                                                                                </label>
                                                                                <div class="form-control-wrap">
                                                                                    <input value="{{$form_1_edit->settlement_bank}}" required name="settlement_bank" type="text" class="form-control" id="pay-amount-1">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="pay-amount-1">
                                                                                    Bank Account No. *
                                                                                </label>
                                                                                <div class="form-control-wrap">
                                                                                    <input required value="{{$form_1_edit->settlement_bank_account_number}}"  name="settlement_bank_account_number" type="number" class="form-control" id="pay-amount-1">
                                                                                </div>
                                                                            </div>
                                                                             
                                                                        </div>
                                                
                                                                    
    
    
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="pay-amount-1">
                                                                                    Bank Verification Number (BVN) *
                                                                                </label>
                                                                                <div class="form-control-wrap">
                                                                                    <input value="{{$form_1_edit->bvn}}" required name="bvn" type="text" class="form-control" id="pay-amount-1">
                                                                                </div>
                                                                            </div>
                                                                        </div>
    
    
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="pay-amount-1">
                                                                                    National Identity Number (NIM) *
                                                                                </label>
                                                                                <div class="form-control-wrap">
                                                                                    <input value="{{$form_1_edit->nim}}" required  name="nim" type="text" class="form-control" id="pay-amount-1">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="pay-amount-1">
                                                                                    Tax Identification Number (TIN) *
                                                                                </label>
                                                                                <div class="form-control-wrap">
                                                                                    <input required value="{{$form_1_edit->company_tax_number}}"  name="company_tax_number" type="text" class="form-control" id="pay-amount-1">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                                                   <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                
                                                                                <ul class="custom-control-group g-3 align-center">
                                                                                    
                                                                                    <li>
                                                                                        
                                                                                        <button  type="submit" class="btn btn-lg btn-primary">Continue</button>
                                                                                    </li>
                                                                                   
                                                                                </ul>
                                                                            </div>
                                                                        </div>
    
    
                                                                        {{-- <div class="col-12">
                                                                            <div class="form-group" style="margin: 10px 0px 0px 830px">
                                                                                <button  type="submit" class="btn btn-lg btn-primary">Save And Contine</button>
                                                                            </div>
        
                                                                        </div> --}}
                                                                    </div>
                                                                </form>
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
                <!-- footer @s -->
              
    <!-- select region modal -->
 
    <!-- JavaScript -->
    @endsection

   

    <script>
        $(document).ready(function() {
          $("#myform").submit(function() {
            $(".result").text("");
            $(".loading-icon").removeClass("hide");
            $(".submit").attr("disabled", true);
            $(".btn-txt").text("Processing ...");
          });
        });
        </script>