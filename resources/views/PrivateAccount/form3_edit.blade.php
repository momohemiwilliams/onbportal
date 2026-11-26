@extends('layouts.external')

@section('content')
    <!-- content @s -->
        <div class="nk-content nk-content-fluid">
            <div class="container-xl wide-lg">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between g-3">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Depository Participant Eligibility Form (Private)</h3>
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
                                            <a class="nav-link" href="#"><em
                                                    class="icon ni ni-user-circle"></em><span>Account Details</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " href="#"><em
                                                    class="icon ni ni-repeat"></em><span>Personal Details</span></a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link active" href="#"><em
                                                    class="icon ni ni-file-text"></em><span>Documents</span></a>
                                        </li>

                                        {{-- <li class="nav-item">
                                                        <a class="nav-link"  href="#"><em class="icon ni ni-bell"></em><span>Notifications</span></a>
                                                    </li> --}}
                                        <li class="nav-item">
                                            <a class="nav-link" href="#"><em
                                                    class="icon ni ni-activity"></em><span>Signature Mandate</span></a>
                                        </li>

                                    </ul><!-- .nav-tabs -->
                                    <div class="card-inner">
                                        <div class="nk-block">
                                            <center>
                                                <p><b>The completed form should be accompanied with the underlisted:</b></p>
                                            </center>
                                            {{-- <center> <p><b>In the absence of immediate availability of Board Resolution, a three (3) months deferral letter signed by the principal officer of the prospective participant should be provided/uploaded for the onboarding process to be completed</b></p></center> --}}
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <div class="">
                                                <div class="card-inner">

                                                    <form
                                                        action="{{ route('form_step_three_private_account', $form_3_edit->id) }}"
                                                        enctype="multipart/form-data" method="POST" id="fileUploadForm">
                                                        @csrf
                                                        <div class="row g-4">


                                                            <div class="col-md-12">
                                                                <div class="gallery card card-bordered">

                                                                    <div
                                                                        class="gallery-body card-inner align-center justify-between flex-wrap g-2">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label class="form-label"
                                                                                    for="fw-last-name">Means of Identification
                                                                                    (i.e., International Passport, Driver’s
                                                                                    License or National Identification Number
                                                                                    Slip of all Nominated Principal
                                                                                    Officer(s))</label>
                                                                                <b> <small style="color: red">Please note that
                                                                                        the
                                                                                        maximum file size for
                                                                                        upload is 5MB.</small></b>
                                                                                @if (!empty($form_3_edit->means_of_identification1))
                                                                                    <a href="../../public/{{ $form_3_edit->means_of_identification1 }}"
                                                                                        download="{{ $form_3_edit->means_of_identification1 }}"><br>Download
                                                                                        Means of Identification</a>
                                                                                    <div class="form-control-wrap">
                                                                                        <div class="custom-file">
                                                                                            <input
                                                                                                name="means_of_identification1"
                                                                                                type="file"
                                                                                                class="custom-file-input"
                                                                                                id="mem_art">
                                                                                            <label class="custom-file-label"
                                                                                                for="inputGroupFile01">Choose
                                                                                                file</label>
                                                                                        </div>
                                                                                    </div>
                                                                                @endif
                                                                                @if (empty($form_3_edit->means_of_identification1))
                                                                                    <div class="form-control-wrap">
                                                                                        <div class="custom-file">
                                                                                            <input required
                                                                                                name="means_of_identification1"
                                                                                                type="file"
                                                                                                class="custom-file-input"
                                                                                                id="mem_art">
                                                                                            <label class="custom-file-label"
                                                                                                for="inputGroupFile01">Choose
                                                                                                file</label>
                                                                                        </div>
                                                                                    </div>
                                                                                @endif

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>








                                                            <div class="col-md-12">
                                                                <br><br>
                                                                <div class="form-group">

                                                                    <ul class="custom-control-group g-3 align-center">
                                                                        <li>
                                                                            <a
                                                                                href="{{ route('form_two_edit_PA', $form_3_edit->id) }}">
                                                                                <span
                                                                                    class="btn btn-lg btn-primary">Previous</span></a>
                                                                        </li>
                                                                        <li>
                                                                            <button type="submit"
                                                                                class="btn btn-lg btn-primary">Continue</button>
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
