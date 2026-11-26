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
                                            <h3 class="nk-block-title page-title">Depository Participant Eligibility Form 
                                                (Non-Capital Market Operator – Corporate) 
                                                </h3>
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
                                                        <a class="nav-link active" href="#"><em class="icon ni ni-user-circle"></em><span>Participant Particulars</span></a>
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
                                                               
                                                                <form action="{{ route('form_step_one_corporate_account') }}" method="POST">
                                                                    @csrf
                                                                  
                                                                    <div class="row g-4">
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                               
                                                                                <div class="form-control-wrap">
                                                                                    
                                                                                   
                                                                                    {{-- <input value="{{Auth::user()->name}}" name="fullname" type="text" class="form-control" id="full-name-1"> --}}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                        </div>
                                                            <input hidden name="eligibility_type" value="Non-Capital Market Operator - Corporate"> <input hidden name="user_id" value="{{Auth::user()->id}}">
                                                                        <input hidden name="user_email" value="{{Auth::user()->email}}">
                                                                        <input hidden name="user_phone" value="{{Auth::user()->phone}}">
                                                                        <input  hidden  value="{{Auth::user()->name}}" name="user_name" type="text" class="form-control" id="full-name-1">
                                                                      
                                                                        
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="phone-no-1">Name of Company * </label>
                                                                                <div class="form-control-wrap">
                                                                                  
                                                                                    <input required name="institution_name" type="text" class="form-control" id="phone-no-1">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="phone-no-1">Office Address * </label>
                                                                                <div class="form-control-wrap">
                                                                                    <input required name="company_address" type="text" class="form-control" id="phone-no-1">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="phone-no-1">Mobile Number/Direct Line * </label>
                                                                                <div class="form-control-wrap">
                                                                                    <input required name="direct_line" type="number" class="form-control" id="phone-no-1">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="pay-amount-1">
                                                                                    Company Tax Identification Number *
                                                                                </label>
                                                                                <div class="form-control-wrap">
                                                                                    <input required name="company_tax_number" type="text" class="form-control" id="pay-amount-1">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="pay-amount-1">
                                                                                    Company Email Address *
                                                                                </label>
                                                                                <div class="form-control-wrap">
                                                                                    <input required name="company_email" type="email" class="form-control" id="pay-amount-1">
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
                                                                                    <input required name="company_reg_number" type="text" class="form-control" id="pay-amount-1">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                       
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="pay-amount-1">
                                                                                    Company Registration Date *
                                                                                </label>
                                                                                <div class="form-control-wrap">
                                                                                    <input required name="company_reg_date" type="date" class="form-control" id="pay-amount-1">
                                                                                </div>
                                                                            </div>
                                                                             
                                                                        </div>
                                                
                                                                     
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="pay-amount-1">
                                                                                    Name of Bank *
    
                                                                                </label>
                                                                                <div class="form-control-wrap">
                                                                                    <input required name="settlement_bank" type="text" class="form-control" id="pay-amount-1">
                                                                                </div>
                                                                            </div>
                                                                        </div>
    
    
                                                                        <div class="col-lg-6">
                                                                            
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="pay-amount-1">
                                                                                    Bank Account No. *
                                                                                </label>
                                                                                <div class="form-control-wrap">
                                                                                    <input required name="settlement_bank_account_number" type="text" class="form-control" id="pay-amount-1">
                                                                                </div>
                                                                            </div>
                                                                        </div>
    
    
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="pay-amount-1">
                                                                                    Local Entity Identification (LEI) Code (if Applicable)
                                                                                </label>
                                                                                <div class="form-control-wrap">
                                                                                    <input  name="lei_code" type="text" class="form-control" id="pay-amount-1">
                                                                                </div>
                                                                            </div>
                                                                        </div>
    
    
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="pay-amount-1">
                                                                                    Purpose for Securities  Account
                                                                                </label>
                                                                                <div class="form-control-wrap">
                                                                                    <input  name="purpose_for_securities" type="text" class="form-control" id="pay-amount-1">
                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                        

                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="fw-mobile-number">Beneficial Owners of Securities/Assets (if Different from Private Account Holder) *
                                                                                </label>
                                                                                <div class="form-control-wrap">
                                                                                    <textarea type="text" required  name="beneficial" class="form-control required" >
                                                                                       
                                                                                    </textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                        <div class="col-lg-12">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="pay-amount-1">
                                                                                    Source of Business Funds *
                                                                                </label>
                                                                                <div class="form-control-wrap">
                                                                                    <textarea required name="source_of_fund" type="text" class="form-control" id="pay-amount-1">
                                                                                    </textarea>
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
    <script>
        document.getElementById("selectOption").addEventListener("change", function() {
      let selectedOption = this.value;
      let options = ["Settlement-Banks", "Private-account-Corporate-and-Individual","Capital-Market-Operator"];
      
      options.forEach(function(option) {
        if (option === selectedOption) {
          document.getElementById(option).style.display = "block";
        } else {
          document.getElementById(option).style.display = "none";
        }
      });
    });
    </script>


    <!-- JavaScript -->
    @endsection