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
                                            <h3 class="nk-block-title page-title">Report</h3>
                                            <div class="nk-block-des text-soft">
                                               
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="more-options"><em class="icon ni ni-more-v"></em></a>
                                                <div class="toggle-expand-content" data-content="more-options">
                                                    <ul class="nk-block-tools g-3">
                                                   
                                                       
                                                        {{-- <li class="nk-block-tools-opt">
                                                            <a href="#" class="btn btn-icon btn-primary d-md-none"><em class="icon ni ni-plus"></em></a>
                                                            <a href="#" data-toggle="modal" data-target="#addUser" class="btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em><span>Add</span></a>
                                                        </li> --}}

                                                        {{-- <li><a href="#" data-toggle="modal" data-target="#addLead"><span>Add Orgranigation</span></a></li>
                                                        <li><a href="#"><span>Import Lead</span></a></li> --}}
                                                    </ul>
                                                </div>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block nk-block-lg">
                                    <div class="nk-block-head">
                                        <div class="nk-block-head-content">
                                            <h4 class="nk-block-title"></h4>
                                            <div class="nk-block-des">
                                                <div class="example-alert">
                                                    @if (\Session::has('error'))
                                             <div class="alert alert-danger alert-icon alert-dismissible">
                                                <em class="icon ni ni-check-circle"></em>  <strong> {{ \Session::get('error') }}<button class="close" data-dismiss="alert"></button>
                                                    </div>
                                                    @endif
                                
                                              
                                
                                                    @if (\Session::has('success') )
                                                    <div class="alert alert-success alert-icon alert-dismissible">
                                                       <em class="icon ni ni-check-circle"></em>  <strong> {{ \Session::get('success') }}<button class="close" data-dismiss="alert"></button>
                                                           </div>
                                                           @endif


                                                           @if (\Session::has('info') )
                                                    <div class="alert alert-primary alert-icon alert-dismissible">
                                                       <em class="icon ni ni-cross-circle"></em>  <strong> {{ \Session::get('info') }}<button class="close" data-dismiss="alert"></button>
                                                        
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-preview">
                                        <div class="card-inner">
                                            <table class="datatable-init-export nowrap table table-bordered table-responsive" data-export-title="Export">
                                                <thead>
                                                    <tr>
                                                        <th colspan="3">Request Initiator</th>
                                                        <th colspan="2">DSD User</th>
                                                         <th colspan="2">MEG User</th>
                                                          <th colspan="2">DOD User</th>
                                                          <th colspan="2">ICG User</th>
                                                    </tr>
                                                    <tr>
                                                        <th>S/N</th>
                                                        <th>Unique Ref</th>
                                                        <th>Time Stamp</th>
                                                        <th>User Stamp</th>
                                                        <th>Time Stamp</th>
                                                        <th>User Stamp </th>
                                                        <th>Time Stamp </th>
                                                        <th>User Stamp </th>
                                                        <th>Time Stamp </th>
                                                         <th>User Stamp</th>
                                                          <th>Time Stamp</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($formstatus as $track)
                                                   
                                                    <tr>
                                                        <td><a href="{{route('participant', $track->app_code)}}">{{ $loop->iteration }}</a></td>
                                                        <td><a href="{{route('participant', $track->app_code)}}">{{$track->app_code}}</a></td>
                                                        <td>{{$track->app_time}}</td>
                                                        <td>
                                                           
                                                            {{$track->dsd_user_name}}
                                                         
                                                           </td>
                                                        <td>
                                                          
                                                            {{$track->dsd_user_time}}
                                                         
                                                            </td>
                                                            <td>
                                                               
                                                                {{$track->meg_user_name}}
                                                            
                                                               </td>
                                                            <td>
                                                                
                                                                {{$track->meg_user_time}}
                                                               
                                                                </td>
                                                                <td>
                                                                   
                                                                    {{$track->dod_user_name}}
                                                                   
                                                                   </td>
                                                                <td>
                                                                   
                                                                    {{$track->dod_user_time}}
                                                                  
                                                                    </td>
                                                                    <td>
                                                                       
                                                                        {{$track->icg_user_name}}
                                                                        
                                                                       </td>
                                                                    <td>
                                                                       
                                                                        {{$track->icg_user_time}}
                                                                       
                                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div><!-- .card-preview -->
                                </div>
                        </div>
                    </div>
                </div>
                </div>
             













@endsection



