@foreach($app as $member)
<div class="modal fade" role="dialog" id="uploadinvoice-{{$member->id}}">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
          <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
          <div class="modal-body modal-body-md">
              <h5 class="title">Invoice for  {{$member->institution_name}}'s Application</h5>
              <form  action="{{ route('internal.invoice.upload') }}" method="POST" enctype="multipart/form-data">
                  @csrf
              <div class="tab-content">
                  <div class="tab-pane active" id="infomation">
                      <br>
                      <div class="row gy-4">
                          <div class="col-md-12">

                            <div class="form-control-wrap">
                                <div class="custom-file">
                                    <input name="invoice_doc" type="file" class="custom-file-input" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                             
                             
                                  
                                      <input hidden name="app_code" value="{{$member->app_code}}">
                                     
                              </div>
                          </div>
                          <br>
                                    <br>
                         
                          <div class="col-12">
                             
                              <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                  <li>
                                         <button class="btn btn-primary" name="SUBMIT" id="submit" onclick="setTimeout('document.getElementById(\'' + this.id + '\').disabled=true;', 50); loading();" type="submit">
                                                <i class="fas fa-spinner fa-spin" style="display:none;"></i>
                                               <span class="btn-text">Submit</span>
                                             </button> 
                                      {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                                  </li>
                              </ul>
                          </div>
                      </div>
                  </div><!-- .tab-pane -->
                 
              </div>
              </form><!-- .tab-content -->
             
          </div><!-- .modal-body -->
      </div><!-- .modal-content -->
  </div><!-- .modal-dialog -->
</div><!-- .modal -->

@endforeach







@foreach($app as $member)
<div class="modal fade" id="dsdapprove-{{$member->id}}">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross"></em></a>
          <div class="modal-body modal-body-sm text-center">
              <div class="nk-modal py-4">
                  <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-check bg-success"></em>
                  <h4 class="nk-modal-title">Are You Sure ?</h4>
                  <div class="nk-modal-text mt-n2"> 
                      {{-- <p class="text-soft">This will delete user details permanently.</p> --}}
                  </div>
                  <ul class="d-flex justify-content-center gx-4 mt-4">
                      <li>
                          <form  action="{{ route('internal.review.dsd') }}" method="POST" enctype="multipart/form-data">
                              @csrf
                                              <input hidden name="status" value="6">
                                              <input hidden name="user_id" value="{{Auth::user()->id}}">
                                              <input hidden name="user_name" value="{{Auth::user()->name}}">
                                              <input hidden name="app_code" value="{{$member->app_code}}">

                                               <button class="btn btn-sm btn-success" name="SUBMIT" id="submit" onclick="loading(); setTimeout('document.getElementById(\'' + this.id + '\').disabled=true;', 50);" type="submit">
                                                <i class="fas fa-spinner fa-spin" style="display:none;"></i>
                                               <span class="btn-text">Yes, Approve Application</span>
                                             </button> 

                                             {{-- <button class="btn btn-lg btn-primary btn-block" name="SUBMIT" id="submit" onclick="setTimeout('document.getElementById(\'' + this.id + '\').disabled=true;', 50); loading();" type="submit">
                                                <i class="fas fa-spinner fa-spin" style="display:none;"></i>
                                               <span class="btn-text">Submit</span>
                                             </button> --}}

                                              {{-- <button class="btn btn-sm btn-success"  onclick="loading(); setTimeout('document.getElementById(\'' + this.id + '\').disabled=true;', 50);   " type="submit">
                                                <i class="fas fa-spinner fa-spin" style="display:none;"></i>
                                               <span class="btn-text">Yes, Approve Application</span>
                                             </button> --}}
                          </form>
                      </li>
                      <li>
                       


                          <button data-dismiss="modal" data-toggle="modal" data-target="#editEventPopup" class="btn btn-danger btn-dim">Cancel</button>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
  </div>
</div><!-- .modal -->
@endforeach


@foreach($app as $member)
<div class="modal fade" role="dialog" id="rejectapplication-{{$member->id}}">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
          <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
          <div class="modal-body modal-body-md">
              <h5 class="title">Reject {{$member->institution_name}}'s Application</h5>
              <form  action="{{ route('internal.review.dsd') }}" method="POST" enctype="multipart/form-data">
                  @csrf
              <div class="tab-content">
                  <div class="tab-pane active" id="infomation">
                      <br>
                      <div class="row gy-4">
                          <div class="col-md-12">
                             
                              <div class="form-group">
                                  <label class="form-label" for="lead-name">Note</label>
                                  <div class="form-control-wrap">
                                      <input hidden value="9" name="status">
                                      <input hidden name="user_id" value="{{Auth::user()->id}}">
                                      <input hidden name="user_name" value="{{Auth::user()->name}}">
                                      <input hidden name="app_code" value="{{$member->app_code}}">
                                      <textarea  name="note" type="text" class="form-control"></textarea>
                                  </div>
                              </div>
                          </div>


                           @if($member->approval_status = 5 )
                          @php
                              
                          
                           $reject_doc =  \App\Models\RejectlDocs::where('app_code','=',$member->app_code)->first();
                          @endphp
                         
                         @if($reject_doc !='')
                           <div class="col-12">
                           <div class="form-group">
                                <label class="form-label" for="customFileLabel">Rejection Document </label>
                                <div class="form-control-wrap">
                                    <div class="custom-file">
                                        <input  type="file" name="document" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                           </div>
                           @endif
                            @endif
                         
                          <div class="col-12">
                             
                              <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                  <li>
                                         <button class="btn btn-primary" name="SUBMIT" id="submit" onclick="setTimeout('document.getElementById(\'' + this.id + '\').disabled=true;', 50); loading();" type="submit">
                                                <i class="fas fa-spinner fa-spin" style="display:none;"></i>
                                               <span class="btn-text">Submit</span>
                                             </button> 
                                      {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                                  </li>
                              </ul>
                          </div>
                      </div>
                  </div><!-- .tab-pane -->
                 
              </div>
              </form><!-- .tab-content -->
             
          </div><!-- .modal-body -->
      </div><!-- .modal-content -->
  </div><!-- .modal-dialog -->
</div><!-- .modal -->

@endforeach


@foreach($app as $member)
<div class="modal fade" role="dialog" id="rejectapplicationMEG-{{$member->id}}">
<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
        <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
        <div class="modal-body modal-body-md">
            <h5 class="title">Reject {{$member->institution_name}}'s Application</h5>
            <form  action="{{ route('internal.review.meg') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="tab-content">
                <div class="tab-pane active" id="infomation">
                    <br>
                    <div class="row gy-4">
                        <div class="col-md-12"> 
                           
                            <div class="form-group">
                                <label class="form-label" for="lead-name">Note</label>
                                <div class="form-control-wrap">
                                    <input hidden value="5" name="status">
                                    <input hidden name="user_id" value="{{Auth::user()->id}}">
                                    <input hidden name="user_name" value="{{Auth::user()->name}}">
                                    <input hidden name="app_code" value="{{$member->app_code}}">
                                    <textarea  name="note" type="text" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="customFileLabel">Rejection Document</label>
                                <div class="form-control-wrap">
                                    <div class="custom-file">
                                        <input  type="file" name="document" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                       
                        <div class="col-12">
                           
                            <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                <li>
                                   
                                       <button class="btn btn-primary" name="SUBMIT" id="submit" onclick="setTimeout('document.getElementById(\'' + this.id + '\').disabled=true;', 50); loading();" type="submit">
                                              <i class="fas fa-spinner fa-spin" style="display:none;"></i>
                                             <span class="btn-text">Submit</span>
                                           </button> 
                                    {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- .tab-pane -->
               
            </div>
            </form><!-- .tab-content -->
           
        </div><!-- .modal-body -->
    </div><!-- .modal-content -->
</div><!-- .modal-dialog -->
</div><!-- .modal -->

@endforeach








@foreach($app as $member)
<div class="modal fade" role="dialog" id="megupload-{{$member->id}}">
<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
        <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
        <div class="modal-body modal-body-md">
            <h5 class="title">Approve {{$member->institution_name}}'s Application</h5>
            <form  action="{{ route('internal.review.dsd') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="tab-content">
                <div class="tab-pane active" id="infomation">
                    <br>
                    <div class="row gy-4">
                        <div class="col-md-12">
                           
                            <div class="form-group">
                                <input hidden name="status" value="7">
                                <input hidden name="user_id" value="{{Auth::user()->id}}">
                                <input hidden name="user_name" value="{{Auth::user()->name}}">
                                <input hidden name="app_code" value="{{$member->app_code}}">
                                <div class="form-control-wrap">
                                  <div class="form-group">
                                      <label class="form-label" for="customFileLabel">Approval Document</label>
                                      <div class="form-control-wrap">
                                          <div class="custom-file">
                                              <input   type="file" name="document" class="custom-file-input" id="customFile">
                                              <label class="custom-file-label" for="customFile">Choose file</label>
                                          </div>
                                      </div>
                                  </div>
                                  
                                </div>
                            </div>
                        </div>
                       
                       
                        <div class="col-12">
                           
                            <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                <li>
                                    <button class="btn btn-primary" name="SUBMIT" id="submit" onclick="setTimeout('document.getElementById(\'' + this.id + '\').disabled=true;', 50); loading();" type="submit">
                                        <i class="fas fa-spinner fa-spin" style="display:none;"></i>
                                       <span class="btn-text">Submit</span>
                                     </button> 


                                    {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- .tab-pane -->
               
            </div>
            </form><!-- .tab-content -->
           
        </div><!-- .modal-body -->
    </div><!-- .modal-content -->
</div><!-- .modal-dialog -->
</div><!-- .modal -->

@endforeach 










@foreach($app as $member)
<div class="modal fade" role="dialog" id="dodapprove-{{$member->id}}">
<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
        <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
        <div class="modal-body modal-body-md">
            <h5 class="title">Approve {{$member->institution_name}}'s Application</h5>
            <form  action="{{ route('internal.review.dod') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="tab-content">
                <div class="tab-pane active" id="infomation">
                    <br>
                    <div class="row gy-4">
                        <div class="col-md-12">
                           
                            <div class="form-group">
                                <input hidden name="status" value="8">
                                <input hidden name="user_id" value="{{Auth::user()->id}}">
                                <input hidden name="user_name" value="{{Auth::user()->name}}">
                                <input hidden name="app_code" value="{{$member->app_code}}">
                                <div class="form-control-wrap">
                                  <div class="form-group">
                                      <label class="form-label" for="customFileLabel">Partner BPID</label>
                                      <div class="form-control-wrap">
                                        <input  name="Partner_bpid"  type="text" class="form-control">
                                          </div>
                                      </div> 

                                      <div class="form-group">
                                        <label class="form-label" for="customFileLabel">Client BPID</label>
                                        <div class="form-control-wrap">
                                          <input  name="Client_bpid" type="text" class="form-control">
                                            </div>
                                        </div>
                                  </div>
                                 
                                </div>
                            </div>
                        </div>
                       
                       
                        <br>
                        <br>
                        <div class="col-12">
                           
                            <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                <li>
                                    <button class="btn btn-primary" name="SUBMIT" id="submit" onclick="setTimeout('document.getElementById(\'' + this.id + '\').disabled=true;', 50); loading();" type="submit">
                                        <i class="fas fa-spinner fa-spin" style="display:none;"></i>
                                       <span class="btn-text">Submit</span>
                                     </button> 
                                    {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- .tab-pane -->
               
            </div>
            </form><!-- .tab-content -->
           
        </div><!-- .modal-body -->
    </div><!-- .modal-content -->
</div><!-- .modal-dialog -->
</div><!-- .modal -->

@endforeach 



@foreach($app as $member)
<div class="modal fade" role="dialog" id="rejectdod-{{$member->id}}">
<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
<div class="modal-content">
<a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
<div class="modal-body modal-body-md">
<h5 class="title">Reject {{$member->institution_name}}'s Application</h5>
<form  action="{{ route('internal.review.dod') }}" method="POST">
  @csrf
<div class="tab-content">
  <div class="tab-pane active" id="infomation">
      <br>
      <div class="row gy-4">
          <div class="col-md-12">
             
              <div class="form-group">
                  <label class="form-label" for="lead-name">Note</label>
                  <div class="form-control-wrap">
                      <input hidden value="6" name="status">
                      <input hidden name="user_id" value="{{Auth::user()->id}}">
                      <input hidden name="user_name" value="{{Auth::user()->name}}">
                      <input hidden name="app_code" value="{{$member->app_code}}">
                      <textarea  name="note" type="text" class="form-control"></textarea>
                  </div>
              </div>
          </div>
         
         
          <div class="col-12">
             
              <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                  <li>
                         <button class="btn btn-primary" name="SUBMIT" id="submit" onclick="setTimeout('document.getElementById(\'' + this.id + '\').disabled=true;', 50); loading();" type="submit">
                                <i class="fas fa-spinner fa-spin" style="display:none;"></i>
                               <span class="btn-text">Submit</span>
                             </button> 
                      {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                  </li>
              </ul>
          </div>
      </div>
  </div><!-- .tab-pane -->
 
</div>
</form><!-- .tab-content -->

</div><!-- .modal-body -->
</div><!-- .modal-content -->
</div><!-- .modal-dialog -->
</div><!-- .modal -->

@endforeach








@foreach($app as $member)
<div class="modal fade" id="icgapprove-{{$member->id}}">
<div class="modal-dialog" role="document">
<div class="modal-content">
<a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross"></em></a>
<div class="modal-body modal-body-sm text-center">
<div class="nk-modal py-4">
    <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-check bg-success"></em>
    <h4 class="nk-modal-title">Are You Sure ?</h4>
    <div class="nk-modal-text mt-n2"> 
        {{-- <p class="text-soft">This will delete user details permanently.</p> --}}
    </div>
    <ul class="d-flex justify-content-center gx-4 mt-4">
        <li>
            <form  action="{{ route('internal.review.icg') }}" method="POST" enctype="multipart/form-data">
                @csrf
                                <input hidden name="status" value="10">
                                <input hidden name="user_id" value="{{Auth::user()->id}}">
                                <input hidden name="user_name" value="{{Auth::user()->name}}">
                                <input hidden name="app_code" value="{{$member->app_code}}">
                                <button class="btn btn-dim btn-success" name="SUBMIT" id="submit" onclick="loading(); setTimeout('document.getElementById(\'' + this.id + '\').disabled=true;', 50);" type="submit">
                                    <i class="fas fa-spinner fa-spin" style="display:none;"></i>
                                   <span class="btn-text">Yes</span>
                                 </button> 
            </form>
        </li>
        <li>
            
            <button data-dismiss="modal" data-toggle="modal" data-target="#editEventPopup" class="btn btn-danger btn-dim">Cancel</button>
        </li>
    </ul>
</div>
</div>
</div>
</div>
</div><!-- .modal -->
@endforeach






@foreach($app as $member)
<div class="modal fade" role="dialog" id="rejecicg-{{$member->id}}">
<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
<div class="modal-content">
<a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
<div class="modal-body modal-body-md">
<h5 class="title">Reject {{$member->institution_name}}'s Application</h5>
<form  action="{{ route('internal.review.icg') }}" method="POST">
  @csrf
<div class="tab-content">
  <div class="tab-pane active" id="infomation">
      <br>
      <div class="row gy-4">
          <div class="col-md-12">
             
              <div class="form-group">
                  <label class="form-label" for="lead-name">Note</label>
                  <div class="form-control-wrap">
                      <input hidden value="7" name="status">
                      <input hidden name="user_id" value="{{Auth::user()->id}}">
                      <input hidden name="user_name" value="{{Auth::user()->name}}">
                      <input hidden name="app_code" value="{{$member->app_code}}">
                      <textarea  name="note" type="text" class="form-control"></textarea>
                  </div>
              </div>
          </div>
         
         
          <div class="col-12">
             
              <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                  <li>
                         <button class="btn btn-primary" name="SUBMIT" id="submit" onclick="setTimeout('document.getElementById(\'' + this.id + '\').disabled=true;', 50); loading();" type="submit">
                                <i class="fas fa-spinner fa-spin" style="display:none;"></i>
                               <span class="btn-text">Submit</span>
                             </button> 
                      {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                  </li>
              </ul>
          </div>
      </div>
  </div><!-- .tab-pane -->
 
</div>
</form><!-- .tab-content -->

</div><!-- .modal-body -->
</div><!-- .modal-content -->
</div><!-- .modal-dialog -->
</div><!-- .modal -->

@endforeach






















































