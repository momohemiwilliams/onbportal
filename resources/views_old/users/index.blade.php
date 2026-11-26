@extends('layouts.master')

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
                                            <h3 class="nk-block-title page-title">Users List</h3>
                                            <div class="nk-block-des text-soft">
                                               
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="more-options"><em class="icon ni ni-more-v"></em></a>
                                                <div class="toggle-expand-content" data-content="more-options">
                                                    <ul class="nk-block-tools g-3">
                                                   
                                                       
                                                        <li class="nk-block-tools-opt">
                                                            <a href="#" class="btn btn-icon btn-primary d-md-none"><em class="icon ni ni-plus"></em></a>
                                                            <a href="#" data-toggle="modal" data-target="#addUser" class="btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em><span>Add</span></a>
                                                        </li>

                                                        {{-- <li><a href="#" data-toggle="modal" data-target="#addLead"><span>Add Orgranigation</span></a></li>
                                                        <li><a href="#"><span>Import Lead</span></a></li> --}}
                                                    </ul>
                                                </div>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block nk-block-lg">
                                    
                                    <div class="example-alert">
                                        @if (\Session::has('success'))
                                 <div class="alert alert-success alert-icon alert-dismissible">
                                    <em class="icon ni ni-check-circle"></em>  <strong> {{ \Session::get('success') }}<button class="close" data-dismiss="alert"></button>
                                        </div>
                                        @endif


                                        @if (count($errors) > 0)
                                        <div><div class="alert alert-danger alert-icon alert-dismissible">
                                            <strong>Opps!</strong> Something went wrong, please check below errors.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button class="close" data-dismiss="alert"></button>
                                               </div>
                                               @endif

                                        
                                                            
                                </div>
                                    <div class="card card-preview">
                                        <div class="card-inner">
                                            <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                                <thead>
                                                    <tr class="nk-tb-item nk-tb-head">
                                                        <th>#</th>
                                                        <th class="nk-tb-col"><span class="sub-text">User</span></th>
                                                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Group</span></th>
                                                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Email</span></th>
                                                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Role</span></th>
                                                       
                                                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Created At</span></th>
                                                        
                                                        <th class="nk-tb-col nk-tb-col-tools text-right">
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($data as $key => $user)
                                                    <tr class="nk-tb-item">
                                                        <td class="nk-tb-col nk-tb-col-check">
                                                            {{ $loop->iteration }}
                                                        </td>
                                                        <td class="nk-tb-col">
                                                            <div class="user-card">
                                                              
                                                                <div class="user-info">
                                                                    <span class="tb-lead">{{$user->name}} <span class="dot dot-success d-md-none ml-1"></span></span>
                                                                  
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="nk-tb-col tb-col-lg" data-order="Email Verified - Kyc Unverified">
                                                            {{optional($user->group)->name}}
                                                           
                                                        </td>
                                                        <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                                                            <span class="tb-amount">{{$user->email}}<span class="currency"></span></span>
                                                        </td>
                                                        <td class="nk-tb-col tb-col-md">
                                                            @if(!empty($user->getRoleNames()))
                                                            @foreach($user->getRoleNames() as $val)
                                                            <span class="badge badge-primary">{{ $val }}</span>
                                                            @endforeach
                                                            @endif
                                                        </td>
                                                       
                                                        <td class="nk-tb-col tb-col-lg">
                                                            <span>{{$user->created_at}}</span>
                                                        </td>
                                                       
                                                        <td class="nk-tb-col nk-tb-col-tools">
                                                            <ul class="nk-tb-actions gx-1">
                                                             
                                                                <li>
                                                                    <div class="drodown">
                                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <ul class="link-list-opt no-bdr">
                                                                                <li><a href="#"  data-toggle="modal" data-target="#editUser-{{$user->id}}"><em class="icon ni ni-edit"></em><span>Edit</span></a></li>

                                                                                <li><a href="#"  data-toggle="modal" data-target="#editUser-{{$user->id}}"><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
                                                                                
                                                                                {{-- <a href="#" data-toggle="modal" data-target="#addUser" class="btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em><span>Add</span></a> --}}
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr><!-- .nk-tb-item  -->
                                                    @endforeach
                                                 
                                                </tbody>
                                            </table>
                                        </div>
                                    </div><!-- .card-preview -->
                                </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
  <!-- @@ Lead Add Modal @e -->
  <div class="modal fade" role="dialog" id="addUser">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-md">
                <h5 class="title">Add User</h5>
                {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
                <div class="tab-content">
                    <div class="tab-pane active" id="infomation">
                        <div class="row gy-4">
                            <div class="col-md-6">
                               
                                <div class="form-group">
                                    <label class="form-label" for="lead-name">Name</label>
                                    <div class="form-control-wrap">
                                        
                                        <input name="name" type="text" class="form-control" id="lead-name" placeholder="e.g. Abu Bin Ishtiyak">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Group</label>
                                    <div class="form-control-wrap">
                                        <select name="group_id" class="form-select form-control" data-placeholder="Select one">
                                            <option value="">Select one</option>
                                            @foreach($groups as $group)
                                            <option value="{{ $group->id }}">
                                                {{$group->name }}</option>
                                                @endforeach

                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="open-deal">Email</label>
                                    <input name="email" type="text" class="form-control" id="open-deal" placeholder="example@mail.com">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="open-deal">Role</label>
                                    {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                                </div>
                            </div>
                            
                            
                            <div class="col-12">
                                <input type="text" name="usertype" value="internal">
                                <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                    <li>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- .tab-pane -->
                   
                </div><!-- .tab-content -->
                {!! Form::close() !!}
            </div><!-- .modal-body -->
        </div><!-- .modal-content -->
    </div><!-- .modal-dialog -->
</div><!-- .modal -->





@foreach($data as $user)
  <!-- @@ Lead Add Modal @e -->
  <div class="modal fade" role="dialog" id="editUser-{{$user->id}}">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-md">
                <h5 class="title">{{$user->name}}</h5>
                <form  method="POST" action="{{ route('updateUser', $user->id)}}" >
                    @csrf
                <div class="tab-content">
                    <div class="tab-pane active" id="infomation">
                        <div class="row gy-4">
                            <div class="col-md-6">
                               
                                <div class="form-group">
                                    <label class="form-label" for="lead-name">Name</label>
                                    <div class="form-control-wrap">
                                        
                                        <input value="{{$user->name}}" name="name" type="text" class="form-control" id="lead-name" placeholder="e.g. Abu Bin Ishtiyak">
                                    </div>
                                </div>
                            </div>
                           
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label"  for="open-deal">Email</label>
                                    <input name="email" value="{{$user->email}}" type="text" class="form-control" id="open-deal" placeholder="example@mail.com">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="open-deal">Role</label>
                                    <?php 
                                    $id = $user->id;
                                    
                                    $user =  \App\Models\User::find($id);
                                    $roles =  Spatie\Permission\Models\Role::pluck('name', 'name')->all();
                                    $userRole = $user->roles->pluck('name', 'name')->all();
                                     ?>
                                    {!! Form::select('roles[]', $roles, $userRole, array('class' => 'form-control','multiple')) !!}
                                </div>
                            </div>
                            
                            
                            <div class="col-12">
                               
                                <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                    <li>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- .tab-pane -->
                   
                </div><!-- .tab-content -->
                </form>
            </div><!-- .modal-body -->
        </div><!-- .modal-content -->
    </div><!-- .modal-dialog -->
</div><!-- .modal -->

@endforeach




{{-- @foreach($data as $user)
<!-- @@ Lead Edit Modal @e -->
<div class="modal fade" role="dialog" id="editUser-{{$user->id}}">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-md">
                <h5 class="title">Edit Lead</h5>
                <ul class="nk-nav nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#editInfomation">Lead Detail's</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#editAddress">Contact Detail's</a>
                    </li>
                </ul><!-- .nav-tabs -->
                <div class="tab-content">
                    <div class="tab-pane active" id="editInfomation">
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="edit-name">Name</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="edit-name" placeholder="Name" value="Abu Bin Ishtiyak">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Type</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select form-control">
                                            <option value="default_option">People</option>
                                            <option value="cold_lead">Organization</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Group</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select form-control">
                                            <option value="default_option">Customer</option>
                                            <option value="cold_lead">Cold lead</option>
                                            <option value="hot_lead">Hot Lead</option>
                                            <option value="warm_lead">Warm Lead</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="edit-open-deal">Open Deal</label>
                                    <input type="text" class="form-control" id="edit-open-deal" placeholder="Open Deal" value="2">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="edit-close-deal">Close Deal</label>
                                    <input type="text" class="form-control" id="edit-close-deal" placeholder="Close Deal" value="3">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Status</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select form-control">
                                            <option value="default_option">Active</option>
                                            <option value="pending">Pending</option>
                                            <option value="cenceled">Cenceled</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                    <li>
                                        <a href="#" data-dismiss="modal" class="btn btn-primary">Update lead</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- .tab-pane -->
                    <div class="tab-pane" id="editAddress">
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="edit-email">Email Address</label>
                                    <input type="email" class="form-control" id="edit-email" placeholder="Email Address" value="info@softnio.com">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="edit-phone-no">Phone Number</label>
                                    <input type="text" class="form-control" id="edit-phone-no" placeholder="Phone Number" value="+811 847-4958">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="edit-lead-address">Address</label>
                                    <input type="text" class="form-control" id="lead-address" placeholder="Address" value="Mirpur, Dhaka, Bangladesh.">
                                </div>
                            </div>
                            <div class="col-12">
                                <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                    <li>
                                        <a href="#" data-dismiss="modal" class="btn btn-primary">Update Lead</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- .tab-pane -->
                </div><!-- .tab-content -->
            </div><!-- .modal-body -->
        </div><!-- .modal-content -->
    </div><!-- .modal-dialog -->
</div><!-- .modal -->
@endforeach --}}
<!-- @@ organization lead Edit Modal @e -->

<!-- @@ organization lead Delete Modal @e -->
@foreach ($data as  $user)
<div class="modal fade" id="deleteUser-{{$user->id}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross"></em></a>
            <div class="modal-body modal-body-sm text-center">
                <div class="nk-modal py-4">
                    <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-cross bg-danger"></em>
                    <h4 class="nk-modal-title">Are You Sure ?</h4>
                    <div class="nk-modal-text mt-n2">
                        <p class="text-soft">This will delete user details permanently.</p>
                    </div>
                    <ul class="d-flex justify-content-center gx-4 mt-4">
                        <li>
                            <form action="{{ route('deleteUser', $user->id) }}" enctype="multipart/form-data" method="POST">
                                @csrf 
                            <button type="submit" class="btn btn-success">Yes, Delete it</button>
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




@foreach ($data as  $user)
<div class="modal fade" id="resetpassword-{{$user->id}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross"></em></a>
            <div class="modal-body modal-body-sm text-center">
                <div class="nk-modal py-4">
                    <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-cross bg-danger"></em>
                    <h4 class="nk-modal-title">Are You Sure ?</h4>
                    <div class="nk-modal-text mt-n2">
                        <p class="text-soft">This will reset user password.</p>
                    </div>
                    <ul class="d-flex justify-content-center gx-4 mt-4">
                        <li>
                            <form action="{{ route('updateUserPassword', $user->id) }}" enctype="multipart/form-data" method="POST">
                                @csrf
                            <input type="submit" class="btn btn-lg btn-primary btn-block" name="SUBMIT" value="Update Password"
                             onclick="this.disabled='disabled';this.form.submit();" />
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








   

    

@endsection











{{-- <th class="sort" data-sort="name" scope="col">Name</th>
<th class="sort" data-sort="company_name" scope="col">Email
</th>
<th class="sort" data-sort="email_id" scope="col">Role</th>
<th class="sort" data-sort="phone" scope="col">Department</th>

<th class="sort" data-sort="date" scope="col">Created At
</th>
<th scope="col">Action</th> --}}


{{-- @foreach ($data as $key => $user)
<tr>
    
   <td>{{ $loop->iteration }}</td>
    <td class="name">{{$user->name}}</td>
    <td class="company_name">{{$user->email}}</td>
    <td class="company_name">
@if(!empty($user->getRoleNames()))
    @foreach($user->getRoleNames() as $val)
    <span class="badge bg-success">{{ $val }}</span>
    @endforeach --}}































































































