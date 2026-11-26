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
                                            <h3 class="nk-block-title page-title">SETTLEMENT BANK ELIGIBILITY FORM</h3>
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
                                                        <a class="nav-link active" href="#"><em class="icon ni ni-user-circle"></em><span>Bank  Particulars</span></a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link"  href="#"><em class="icon ni ni-repeat"></em><span>Principal Officer(s) Details</span></a>
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
                                                               
                                                                <form action="{{ route('form_step_one_update_SB', $form_1_edit->id) }}" method="POST">
                                                                    @csrf
                                                                   
                                                                    <div class="row g-4">
                                                                        <div class="col-lg-6">
                                                                           
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                        </div>

                                                                        {{-- <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="full-name-1">Full Name</label>
                                                                                <div class="form-control-wrap">
                                                                                    <input hidden name="user_id" value="{{Auth::user()->id}}">
                                                                                    <input readonly value="{{Auth::user()->name}}" name="user_name" type="text" class="form-control" id="full-name-1">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="email-address-1">Mobile Number/Direct Line</label>
                                                                                <div class="form-control-wrap">
                                                                                    <input value="{{Auth::user()->phone}}" name="user_phone" type="" readonly class="form-control" id="email-address-1">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="email-address-1">Email</label>
                                                                                <div class="form-control-wrap">
                                                                                    <input readonly value="{{Auth::user()->email}}" name="user_email" type="email" class="form-control" id="email-address-1">
                                                                                </div>
                                                                            </div>
                                                                        </div> --}}

                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="phone-no-1">Name of Bank * </label>
                                                                                <div class="form-control-wrap">
                                                                                   
                                                                                    <input name="institution_name" value="{{$form_1_edit->institution_name}}"  type="text" class="form-control" id="phone-no-1">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="phone-no-1">Office Address *</label>
                                                                                <div class="form-control-wrap">
                                                                                    <input name="company_address" value="{{$form_1_edit->company_address}}" type="text" class="form-control" id="phone-no-1">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="phone-no-1">Direct Line * </label>
                                                                                <div class="form-control-wrap">
                                                                                    <input required value="{{$form_1_edit->direct_line}}" name="direct_line"  class="form-control" id="phone-no-1">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="pay-amount-1">
                                                                                     Email Address *
                                                                                </label>
                                                                                <div class="form-control-wrap">
                                                                                    <input name="company_email" value="{{$form_1_edit->company_email}}" type="email" class="form-control" id="pay-amount-1">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="pay-amount-1">
                                                                                    Company Tax Identification Number *
                                                                                </label>
                                                                                <div class="form-control-wrap">
                                                                                    <input value="{{$form_1_edit->company_tax_number}}" required name="company_tax_number" type="text" class="form-control" id="pay-amount-1">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="pay-amount-1">
                                                                                    Company Registration (RC)
                                                                                    No. *
                                                                                </label>
                                                                                <div class="form-control-wrap">
                                                                                    <input name="company_reg_number" value="{{$form_1_edit->company_reg_number}}" type="text" class="form-control" id="pay-amount-1">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="pay-amount-1">
                                                                                     Registration Date *
                                                                                </label>
                                                                                <div class="form-control-wrap">
                                                                                    <input name="company_reg_date" value="{{$form_1_edit->company_reg_date}}" type="date" class="form-control" id="pay-amount-1">
                                                                                </div>
                                                                            </div>
                                                                        </div>
    

                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="pay-amount-1">
                                                                                    Settlement Account No. *
                                                                                </label>
                                                                                <div class="form-control-wrap">
                                                                                    <input required  name="settlement_bank_account_number"  value="{{$form_1_edit->settlement_bank_account_number}}" type="text" class="form-control" id="pay-amount-1">
                                                                                </div>
                                                                            </div>
                                                                             
                                                                        </div>
    
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="pay-amount-1">
                                                                                    Local Entity Identification (LEI) Code (If Applicable)
                                                                                </label>
                                                                                <div class="form-control-wrap">
                                                                                    <input value="{{$form_1_edit->lei_code}}"  name="lei_code" type="text" class="form-control" id="pay-amount-1">
                                                                                </div>
                                                                            </div>
                                                                        </div>
    
    
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="pay-amount-1">
                                                                                    SWIFT BIC Code (If Applicable)
                                                                                </label>
                                                                                <div class="form-control-wrap">
                                                                                    <input  value="{{$form_1_edit->switt_code}}" name="switt_code" type="text" class="form-control" id="pay-amount-1">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <br>  <br>
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