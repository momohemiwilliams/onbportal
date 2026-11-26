@extends('layouts.master')

@section('content')
           
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title"><strong class="text-primary small">Abu Bin Ishtiyak</strong></h3>
                    </div>
                </div>
                <div class="nk-block nk-block-lg">
                    <div class="card">
                        <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#personal-info"><em class="icon ni ni-user-circle-fill"></em><span>Participant information</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#profile-overview"><em class="icon ni ni-book-fill"></em><span>Dcoument</span></a>
                            </li>
                            
                            <li class="nav-item nav-item-trigger">
                                <span class="badge badge-success">Complete</span>
                            </li>
                        </ul>
                        <div class="card-inner">
                            <div class="tab-content">
                                <div class="tab-pane active" id="personal-info">
                                    <div class="nk-block">
                                        <div class="nk-block-head nk-block-head-line">
                                            <h6 class="title overline-title text-base">Personal Information</h6>
                                        </div><!-- .nk-block-head -->
                                        <div class="profile-ud-list">
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Name of Participant</span>
                                                    <span class="profile-ud-value">Abu Bin Ishtiyak</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Email</span>
                                                    <span class="profile-ud-value">Email@mail.com</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Direct Line</span>
                                                    <span class="profile-ud-value">0807456543356</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Mobile Number</span>
                                                    <span class="profile-ud-value">0807456543356</span>
                                                </div>
                                            </div>
                                           
                                        </div><!-- .profile-ud-list -->
                                    </div><!-- .nk-block -->
                                    <div class="nk-block">
                                        <div class="nk-block-head nk-block-head-line">
                                            <h6 class="title overline-title text-base">Company Information</h6>
                                        </div><!-- .nk-block-head -->
                                        <div class="profile-ud-list">
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Office Address</span>
                                                    <span class="profile-ud-value">Lagos Nigeria</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Company Email Address</span>
                                                    <span class="profile-ud-value">Stanbic@mail.com</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Company Registration (RC)
                                                        No.</span>
                                                    <span class="profile-ud-value">RC624242</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Company Registration
                                                        Date</span>
                                                    <span class="profile-ud-value">02/02/2000</span>
                                                </div>
                                            </div>
                                        </div><!-- .profile-ud-list -->
                                    </div><!-- .nk-block -->
                                    <div class="nk-block">
                                        <div class="nk-block-head nk-block-head-line">
                                            <h6 class="title overline-title text-base"> Settlement Bank Information</h6>
                                        </div><!-- .nk-block-head -->
                                        <div class="profile-ud-list">
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Name of Settlement Bank</span>
                                                    <span class="profile-ud-value">Stanbic PLC</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Settlement Bank Account No</span>
                                                    <span class="profile-ud-value">00775533</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Local Entity Identification 
                                                        (LEI) Code </span>
                                                    <span class="profile-ud-value">65GG</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">SWIFT BIC Code
                                                    </span>
                                                    <span class="profile-ud-value">56877677</span>
                                                </div>
                                            </div>
                                        </div><!-- .profile-ud-list -->
                                    </div><!-- .nk-block -->
                                    <div class="nk-divider divider md"></div>
                                    
                                </div><!-- tab pane -->
                                <div class="tab-pane" id="profile-overview">
                                    <div class="nk-block-head nk-block-head-md">
                                        <div class="nk-block-between">
                                          
                                                <table class="table table-tranx">
                                                    <thead>
                                                        <tr class="tb-tnx-head">
                                                            <th class="tb-tnx-id"><span class="">#</span></th>
                                                            <th class="tb-tnx-info">
                                                                <span class="tb-tnx-desc d-none d-sm-inline-block">
                                                                    <span>File Name</span>
                                                                </span>
                                                               
                                                            </th>

                                                            <th class="tb-tnx-info">
                                                                <span class="tb-tnx-desc d-none d-sm-inline-block">
                                                                    <span>Date Uploaded</span>
                                                                </span>
                                                               
                                                            </th>
                                                           
                                                            <th class="tb-tnx-action">
                                                                <span>&nbsp;</span>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                      
                                                        <tr class="tb-tnx-item">
                                                            <td class="tb-tnx-id">
                                                                <a href="#"><span>4904</span></a>
                                                            </td>
                                                            <td class="tb-tnx-info">
                                                                <div class="tb-tnx-desc">
                                                                    <span class="title">Stanbic CAC.pdf</span>
                                                                </div>
                                                               
                                                            </td>

                                                            <td class="tb-tnx-info">
                                                                <div class="tb-tnx-desc">
                                                                    <span class="date">06-19-2019</span>
                                                                </div>
                                                               
                                                            </td>



                                                           
                                                        
                                                            <td class="tb-tnx-action">
                                                                <div class="dropdown">
                                                                    <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                                        <ul class="link-list-opt no-bdr">
                                                                           
                                                                            <li><a href="#" class="file-dl-toast"><em class="icon ni ni-download"></em><span>Download</span></a></li>
                                                                           
                                                                        </ul>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                      
                                                    </tbody>
                                                </table>
                                           
                                        </div>
                                    </div><!-- .nk-block-head -->
                                  
                                </div>
                                <!--tab pane-->
                                <div class="tab-pane" id="profile-courses">
                                    <div class="nk-tb-list border border-light rounded overflow-hidden is-compact">
                                        <div class="nk-tb-item nk-tb-head">
                                            <div class="nk-tb-col">
                                                <span class="lead-text">#</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="lead-text">Courses List</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="lead-text d-none d-sm-inline">Status</span>
                                            </div>
                                            <div class="nk-tb-col nk-tb-col-tools">
                                                <span class="lead-text">&nbsp;</span>
                                            </div>
                                        </div>
                                        <div class="nk-tb-item">
                                            <div class="nk-tb-col"> 1 </div>
                                            <div class="nk-tb-col"> Learn Android Development with project </div>
                                            <div class="nk-tb-col">
                                                <span class="badge badge-dot badge-dot-xs badge-success">Active</span>
                                            </div>
                                            <div class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1">
                                                    <li>
                                                        <a href="#" class="btn btn-sm btn-icon btn-trigger mr-n1" data-toggle="dropdown"><em class="icon ni ni-trash-alt text-danger"></em></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="nk-tb-item">
                                            <div class="nk-tb-col"> 2 </div>
                                            <div class="nk-tb-col"> Learn Android Development with project </div>
                                            <div class="nk-tb-col">
                                                <span class="badge badge-dot badge-dot-xs badge-warning">Pending</span>
                                            </div>
                                            <div class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1">
                                                    <li>
                                                        <a href="#" class="btn btn-sm btn-icon btn-trigger mr-n1" data-toggle="dropdown"><em class="icon ni ni-trash-alt text-danger"></em></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="nk-tb-item">
                                            <div class="nk-tb-col"> 3 </div>
                                            <div class="nk-tb-col"> Learn Android Development with project </div>
                                            <div class="nk-tb-col">
                                                <span class="badge badge-dot badge-dot-xs badge-danger">Canceled</span>
                                            </div>
                                            <div class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1">
                                                    <li>
                                                        <a href="#" class="btn btn-sm btn-icon btn-trigger mr-n1" data-toggle="dropdown"><em class="icon ni ni-trash-alt text-danger"></em></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--tab pane-->
                                <div class="tab-pane" id="profile-review">
                                    <div class="nk-tb-list border border-light rounded overflow-hidden">
                                        <div class="nk-tb-item nk-tb-head">
                                            <div class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="custom-control-input" id="uid">
                                                    <label class="custom-control-label" for="uid"></label>
                                                </div>
                                            </div>
                                            <div class="nk-tb-col"><span class="lead-text">Student</span></div>
                                            <div class="nk-tb-col tb-col-sm"><span class="lead-text">Course name</span></div>
                                            <div class="nk-tb-col tb-col-md"><span class="lead-text">Rating</span></div>
                                            <div class="nk-tb-col tb-col-lg"><span class="lead-text">Review</span></div>
                                            <div class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1 my-n1">
                                                    <li>
                                                        <div class="drodown">
                                                            <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger mr-n1" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a href="#"><em class="icon ni ni-mail"></em><span>Send Email to All</span></a></li>
                                                                    <li><a href="#"><em class="icon ni ni-na"></em><span>Suspend Selected</span></a></li>
                                                                    <li><a href="#"><em class="icon ni ni-trash"></em><span>Delete All</span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- .nk-tb-item -->
                                        <div class="nk-tb-item">
                                            <div class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="custom-control-input" id="uid1">
                                                    <label class="custom-control-label" for="uid1"></label>
                                                </div>
                                            </div>
                                            <div class="nk-tb-col">
                                                <div class="user-card">
                                                    <div class="user-avatar bg-primary">
                                                        <span>AB</span>
                                                    </div>
                                                    <div class="user-info">
                                                        <span class="tb-lead">Abu Bin Ishtiyak</span>
                                                        <span>info@softnio.com</span>
                                                        <ul class="d-flex d-md-none text-warning">
                                                            <li><em class="icon ni ni-star-fill"></em></li>
                                                            <li><em class="icon ni ni-star-fill"></em></li>
                                                            <li><em class="icon ni ni-star-fill"></em></li>
                                                            <li><em class="icon ni ni-star-fill"></em></li>
                                                            <li><em class="icon ni ni-star-fill"></em></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="nk-tb-col tb-col-sm">
                                                <span>UI/UX Design with Adobe XD</span>
                                            </div>
                                            <div class="nk-tb-col tb-col-md">
                                                <ul class="d-flex text-warning">
                                                    <li><em class="icon ni ni-star-fill"></em></li>
                                                    <li><em class="icon ni ni-star-fill"></em></li>
                                                    <li><em class="icon ni ni-star-fill"></em></li>
                                                    <li><em class="icon ni ni-star-fill"></em></li>
                                                    <li><em class="icon ni ni-star-fill"></em></li>
                                                </ul>
                                            </div>
                                            <div class="nk-tb-col tb-col-lg">
                                                <span>The instructor was very knowledgable, worked at a good peace.</span>
                                            </div>
                                            <div class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1">
                                                    <li>
                                                        <a href="#" class="btn btn-sm btn-icon btn-trigger mr-n1" data-toggle="dropdown"><em class="icon ni ni-trash-alt text-danger"></em></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- .nk-tb-item -->
                                        <div class="nk-tb-item">
                                            <div class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="custom-control-input" id="uid7">
                                                    <label class="custom-control-label" for="uid7"></label>
                                                </div>
                                            </div>
                                            <div class="nk-tb-col">
                                                <div class="user-card">
                                                    <div class="user-avatar bg-warning">
                                                        <span>VL</span>
                                                    </div>
                                                    <div class="user-info">
                                                        <span class="tb-lead">Victoria Lynch</span>
                                                        <span>victoria@example.com</span>
                                                        <ul class="d-flex d-md-none text-warning">
                                                            <li><em class="icon ni ni-star-fill"></em></li>
                                                            <li><em class="icon ni ni-star-fill"></em></li>
                                                            <li><em class="icon ni ni-star-fill"></em></li>
                                                            <li><em class="icon ni ni-star-fill"></em></li>
                                                            <li><em class="icon ni ni-star-fill"></em></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="nk-tb-col tb-col-sm">
                                                <span>UI/UX Design with Adobe XD</span>
                                            </div>
                                            <div class="nk-tb-col tb-col-md">
                                                <ul class="d-flex text-warning">
                                                    <li><em class="icon ni ni-star-fill"></em></li>
                                                    <li><em class="icon ni ni-star-fill"></em></li>
                                                    <li><em class="icon ni ni-star-fill"></em></li>
                                                    <li><em class="icon ni ni-star-fill"></em></li>
                                                    <li><em class="icon ni ni-star-fill"></em></li>
                                                </ul>
                                            </div>
                                            <div class="nk-tb-col tb-col-lg">
                                                <span> I will highly recommend this type of instructor.</span>
                                            </div>
                                            <div class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1">
                                                    <li>
                                                        <a href="#" class="btn btn-sm btn-icon btn-trigger mr-n1" data-toggle="dropdown"><em class="icon ni ni-trash-alt text-danger"></em></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- .nk-tb-item -->
                                        <div class="nk-tb-item">
                                            <div class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="custom-control-input" id="uid8">
                                                    <label class="custom-control-label" for="uid8"></label>
                                                </div>
                                            </div>
                                            <div class="nk-tb-col">
                                                <div class="user-card">
                                                    <div class="user-avatar bg-success">
                                                        <span>PN</span>
                                                    </div>
                                                    <div class="user-info">
                                                        <span class="tb-lead">Patrick Newman</span>
                                                        <span>patrick@example.com</span>
                                                        <ul class="d-flex d-md-none text-warning">
                                                            <li><em class="icon ni ni-star-fill"></em></li>
                                                            <li><em class="icon ni ni-star-fill"></em></li>
                                                            <li><em class="icon ni ni-star-fill"></em></li>
                                                            <li><em class="icon ni ni-star-fill"></em></li>
                                                            <li><em class="icon ni ni-star-fill"></em></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="nk-tb-col tb-col-sm">
                                                <span>Learn Android Development with project</span>
                                            </div>
                                            <div class="nk-tb-col tb-col-md">
                                                <ul class="d-flex text-warning">
                                                    <li><em class="icon ni ni-star-fill"></em></li>
                                                    <li><em class="icon ni ni-star-fill"></em></li>
                                                    <li><em class="icon ni ni-star-fill"></em></li>
                                                    <li><em class="icon ni ni-star-fill"></em></li>
                                                    <li><em class="icon ni ni-star-fill"></em></li>
                                                </ul>
                                            </div>
                                            <div class="nk-tb-col tb-col-lg">
                                                <span>I look forward to taking more classes from here.</span>
                                            </div>
                                            <div class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1">
                                                    <li>
                                                        <a href="#" class="btn btn-sm btn-icon btn-trigger mr-n1" data-toggle="dropdown"><em class="icon ni ni-trash-alt text-danger"></em></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- .nk-tb-item -->
                                        <div class="nk-tb-item">
                                            <div class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="custom-control-input" id="uid9">
                                                    <label class="custom-control-label" for="uid9"></label>
                                                </div>
                                            </div>
                                            <div class="nk-tb-col">
                                                <div class="user-card">
                                                    <div class="user-avatar">
                                                        <img src="./images/avatar/d-sm.jpg" alt="">
                                                    </div>
                                                    <div class="user-info">
                                                        <span class="tb-lead">Jane Harris</span>
                                                        <span>harris@example.com</span>
                                                        <ul class="d-flex d-md-none text-warning">
                                                            <li><em class="icon ni ni-star-fill"></em></li>
                                                            <li><em class="icon ni ni-star-fill"></em></li>
                                                            <li><em class="icon ni ni-star-fill"></em></li>
                                                            <li><em class="icon ni ni-star-fill"></em></li>
                                                            <li><em class="icon ni ni-star-fill"></em></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="nk-tb-col tb-col-sm">
                                                <span>Learn Android Development with project</span>
                                            </div>
                                            <div class="nk-tb-col tb-col-md">
                                                <ul class="d-flex text-warning">
                                                    <li><em class="icon ni ni-star-fill"></em></li>
                                                    <li><em class="icon ni ni-star-fill"></em></li>
                                                    <li><em class="icon ni ni-star-fill"></em></li>
                                                    <li><em class="icon ni ni-star-fill"></em></li>
                                                    <li><em class="icon ni ni-star-fill"></em></li>
                                                </ul>
                                            </div>
                                            <div class="nk-tb-col tb-col-lg">
                                                <span>This was my first time it far exceeded my expectations.</span>
                                            </div>
                                            <div class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1">
                                                    <li>
                                                        <a href="#" class="btn btn-sm btn-icon btn-trigger mr-n1" data-toggle="dropdown"><em class="icon ni ni-trash-alt text-danger"></em></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- .nk-tb-item -->
                                    </div>
                                </div>
                                <!--tab pane-->
                            </div>
                            <!--tab content-->
                        </div>
                        <!--card inner-->
                    </div>
                    <!--card-->
                </div>
                <!--nk block lg-->
            </div>
        </div>
    </div>
</div>


    

@endsection



