@extends('layouts.master')
@section('title') @lang('alerts') @endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')  @endslot
        @slot('title') alerts @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Manage alerts</h4>
               
                </div><!-- end card header -->
                

                <div class="container">
    <div class="justify-content-center">
        
        <div class="card">
            <div class="card-header">
                    @if (\Session::has('success'))
                        <div><div class="alert alert-primary alert-dismissible shadow fade show" alert="alert">
            <strong> {{ \Session::get('success') }} </strong> </b> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div></div>
        @endif

        @if (count($errors) > 0)
                        <div><div class="alert alert-primary alert-dismissible shadow fade show" alert="alert">
                        <strong>Opps!</strong> Something went wrong, please check below errors.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div></div>
        @endif



             
                <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal"
                                                        data-bs-target="#addalert"><i
                                            class="ri-add-line align-bottom me-1"></i> Add</button>
                
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as  $alert)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $alert->name }}</td>
                                <td>
                                   
                                  
                                        <a class="btn btn-primary"  data-bs-toggle="modal"
                                        data-bs-target="#editalert-{{$alert->id}}">Edit</a>
                                  
                                  
                                    <button class="btn btn-danger remove-item-btn"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deletealert-{{$alert->id}}">Delete</button>
                                   
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>

            
            </div>
            <!-- end col -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

   


    <!-- Delete Modal -->

    <!-- Modal -->
    @foreach ($data as  $alert)
    <div class="modal fade zoomIn" id="deletealert-{{$alert->id}}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="btn-close"></button>
                </div>
                <div class="modal-body">
                    <div class="mt-2 text-center">
                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                            colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                        <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                            <h4>Are you Sure ?</h4>
                            <p class="text-muted mx-4 mb-0">Are you Sure You want to Delete this alert ?</p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                        <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                        <form  method="POST" action="{{ route('deleteAlert', $alert->id)}}" >
                            @csrf
                        <button type="submit" class="btn w-sm btn-danger " id="delete-record">Yes, Delete It!</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    @endforeach

     <!-- CREATE MODAL -->
  
    <div class="modal fade" id="addalert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel">Add alert</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
               
                <form  method="POST" action="{{ route('alertStore')}}" >
                    @csrf
                    <div class="modal-body">

                       

                        <div class="mb-3">
                            <label for="customername-field" class="form-label">Name</label>
                            <input type="text" name="name" id="customername-field" class="form-control" placeholder="Enter Name"
                                required />
                        </div>


                        <div class="mb-3">
                            <label for="customername-field" class="form-label">Rule</label>
                            <select class="form-select rounded-pill mb-3" name="rule_id">
                                @foreach($rules as $rule)
                                <option   value="{{ $rule->id }}">
                                    {{$rule->name }}</option>
                                    @endforeach
                            </select>
                          
                        </div>


                        <div class="mb-3">
                            <label for="customername-field" class="form-label">Market</label>
                            <select class="form-select rounded-pill mb-3" name="rule_id">
                                @foreach($markets as $market)
                                <option   value="{{ $market->id }}">
                                    {{$market->name }}</option>
                                    @endforeach
                            </select>
                          
                        </div>



                        <div class="mb-3">
                            <label for="customername-field" class="form-label">Action</label>
                            <textarea class="form-control" name="action" required></textarea>
                           
                        </div>

                     
                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                           
                            <button type="submit" class="btn btn-success" id="edit-btn">Submit</button>
                        </div>
                    </div>
                </form>
                    
            </div>
        </div>
    </div>




      <!-- Edit MODAL -->
  @foreach ($data as  $alert)
    <div class="modal fade" id="editalert-{{ $alert->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
              
                <form  method="POST" action="{{ route('updateAlert', $alert->id)}}" >
                    @csrf
                    <div class="modal-body">

                       

                        <div class="mb-3">
                            <label for="customername-field" class="form-label">Name</label>
                            <input type="text" name="name" value="{{$alert->name}}" id="customername-field" class="form-control" placeholder="Enter Name"
                                required />
                        </div>
                        
                     
                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                           
                            <button type="submit" class="btn btn-success" id="edit-btn">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach


   
    <!--end modal -->
@endsection
@section('script')
    <script src="{{ URL::asset('assets/libs/prismjs/prismjs.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/list.js/list.js.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/list.pagination.js/list.pagination.js.min.js') }}"></script>

    <!-- listjs init -->
    <script src="{{ URL::asset('assets/js/pages/listjs.init.js') }}"></script>

    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection


