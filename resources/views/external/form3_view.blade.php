@extends('layouts.external')

@section('content')
    <!-- content @s
        -->
        <div class="nk-content nk-content-fluid">
            <div class="container-xl wide-lg">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between g-3">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Depository Participant Eligibility Form
                                    (Capital Market Operator)
                                </h3>
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
                                                    class="icon ni ni-user-circle"></em><span>Participant Particulars</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " href="#"><em
                                                    class="icon ni ni-repeat"></em><span>Principal Officer(s) Details</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#"><em
                                                    class="icon ni ni-text-rich"></em><span>Correspondence Email
                                                    Address</span></a>
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
                                            <p style="text-align:center;"><b>In the absence of the immediate availability of a
                                                    Board Resolution, a three (3) months deferral letter signed by the Principal
                                                    Officer of the Prospective Participant should be provided for the onboarding
                                                    process to be completed.</b></p>
                                            <div class="">
                                                <div class="card-inner">

                                                    <form action="{{ route('external.onboarding.step4.update', $form_3->id) }}"
                                                        enctype="multipart/form-data" method="POST">
                                                        @csrf
                                                        <div class="row g-4">



                                                            <div class="col-md-6">
                                                                <div class="gallery card card-bordered" style="height: 210px">

                                                                    <div
                                                                        class="gallery-body card-inner align-center justify-between flex-wrap g-2">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="fw-first-name"> A
                                                                                    certified true copy of the ‘ Memorandum and
                                                                                    Articles of Association’ for the company
                                                                                </label>
                                                                                {{-- <a href="onb/public/{{$form_3->memorandumand_articles_of_association}}">Link</a> --}}
                                                                                @if (!empty($form_3->memorandumand_articles_of_association))
                                                                                    <a href="../../public/{{ $form_3->memorandumand_articles_of_association }}"
                                                                                        download="{{ $form_3->memorandumand_articles_of_association }}"><br>Download
                                                                                        Memorandum and Articles of
                                                                                        Association</a>
                                                                                @endif

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="col-md-6">
                                                                <div class="gallery card card-bordered" style="height: 210px">

                                                                    <div
                                                                        class="gallery-body card-inner align-center justify-between flex-wrap g-2">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                {{-- <label class="form-label" for="fw-last-name">A certified true copy of the Board Resolution to onboard as a Participant of FMDQ Depository (must include names of individual(s) nominated as signatories to the account) </label> --}}
                                                                                <label class="form-label">Board Resolution to
                                                                                    onboard as a Participant of FMDQ Depository
                                                                                    (must include names of individual(s)
                                                                                    nominated as signatories to the
                                                                                    account)</label>
                                                                                @if (!empty($form_3->board_resolution))
                                                                                    <a href="../../public/{{ $form_3->board_resolution }}"
                                                                                        download="{{ $form_3->board_resolution }}"><br>Download
                                                                                        Board Resolution</a>
                                                                                @endif


                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>









                                                            <div class="col-md-6">
                                                                <div class="gallery card card-bordered" style="height: 210px">

                                                                    <div
                                                                        class="gallery-body card-inner align-center justify-between flex-wrap g-2">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label class="form-label"
                                                                                    for="fw-last-name">Certificate of
                                                                                    Incorporation</label>

                                                                                @if (!empty($form_3->certificate_of_incorporation))
                                                                                    <a href="../../public/{{ $form_3->certificate_of_incorporation }}"
                                                                                        download="{{ $form_3->certificate_of_incorporation }}"><br>Download
                                                                                        Certificate of Incorporation</a>
                                                                                @endif


                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>









                                                            <div class="col-md-6">
                                                                <div class="gallery card card-bordered" style="height: 210px">

                                                                    <div
                                                                        class="gallery-body card-inner align-center justify-between flex-wrap g-2">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label class="form-label"
                                                                                    for="fw-last-name">Particulars of Directors
                                                                                    - CAC Form 7 (include CAC 1.1 or Status
                                                                                    Report where there is change of
                                                                                    Director)</label>
                                                                                @if (!empty($form_3->particulars_of_directors))
                                                                                    <a href="../../public/{{ $form_3->particulars_of_directors }}"
                                                                                        download="{{ $form_3->particulars_of_directors }}"><br>Download
                                                                                        Particulars of Directors</a>
                                                                                @endif


                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>





                                                            <div class="col-md-6">
                                                                <div class="gallery card card-bordered" style="height: 210px">

                                                                    <div
                                                                        class="gallery-body card-inner align-center justify-between flex-wrap g-2">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label class="form-label"
                                                                                    for="fw-last-name">Particulars of
                                                                                    Shareholders - CAC Form 2 or Status Report
                                                                                    (if applicable)</label>
                                                                                @if (!empty($form_3->particulars_of_shareholders))
                                                                                    <a href="../../public/{{ $form_3->particulars_of_shareholders }}"
                                                                                        download="{{ $form_3->particulars_of_shareholders }}"><br>Download
                                                                                        Particulars of Shareholders</a>
                                                                                @endif


                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>









                                                            <div class="col-md-6">
                                                                <div class="gallery card card-bordered" style="height: 210px">

                                                                    <div
                                                                        class="gallery-body card-inner align-center justify-between flex-wrap g-2">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <br>
                                                                                <label class="form-label"
                                                                                    for="fw-mobile-number"> Evidence of
                                                                                    Securities and Exchange Commission (SEC)
                                                                                    Registration (for SEC regulated entities)
                                                                                </label>
                                                                                @if (!empty($form_3->evidence_of_securities_and_exchange_commission))
                                                                                    <a href="../../public/{{ $form_3->evidence_of_securities_and_exchange_commission }}"
                                                                                        download="{{ $form_3->evidence_of_securities_and_exchange_commission }}"><br><br>Download
                                                                                        Evidence of Securities and Exchange
                                                                                        Commission (SEC) Registration</a>
                                                                                @endif





                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>



                                                            <div class="col-md-6">
                                                                <div class="gallery card card-bordered" style="height: 210px">

                                                                    <div
                                                                        class="gallery-body card-inner align-center justify-between flex-wrap g-2">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label class="form-label"
                                                                                    for="fw-mobile-number">Evidence of Trading
                                                                                    Exchange License/Approval for proprietary
                                                                                    and/or client trade (if Applicable)
                                                                                </label>
                                                                                @if (!empty($form_3->evidence_of_trading_exchange_license))
                                                                                    <a href="../../public/{{ $form_3->evidence_of_trading_exchange_license }}"
                                                                                        download="{{ $form_3->evidence_of_trading_exchange_license }}">Download
                                                                                        Evidence of Trading Exchange
                                                                                        License/Approval for proprietary and/or
                                                                                        client trade</a>
                                                                                @endif



                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>








                                                            <div class="col-md-6">
                                                                <div class="gallery card card-bordered" style="height: 210px">

                                                                    <div
                                                                        class="gallery-body card-inner align-center justify-between flex-wrap g-2">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label class="form-label"
                                                                                    for="fw-mobile-number">Evidence of
                                                                                    Registration from other Regulatory bodies
                                                                                    (if Applicable)
                                                                                </label>
                                                                                @if (!empty($form_3->evidence_of_registration_from_regulatory))
                                                                                    <a href="../../public/{{ $form_3->evidence_of_registration_from_regulatory }}"
                                                                                        download="{{ $form_3->evidence_of_registration_from_regulatory }}">Download
                                                                                        Evidence of registration from other
                                                                                        Regulatory bodies</a>
                                                                                @endif



                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>







                                                            <div class="col-md-6">
                                                                <div class="gallery card card-bordered" style="height: 210px">

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
                                                                                @if (!empty($form_3->means_of_identification1))
                                                                                    <a href="../../public/{{ $form_3->means_of_identification1 }}"
                                                                                        download="{{ $form_3->means_of_identification1 }}"><br>Download
                                                                                        Means of Identification</a>
                                                                                @endif


                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>





                                                            <div class="col-md-6">
                                                                <div class="gallery card card-bordered" style="height: 210px">

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
                                                                                @if (!empty($form_3->means_of_identification2))
                                                                                    <a href="../../public/{{ $form_3->means_of_identification2 }}"
                                                                                        download="{{ $form_3->means_of_identification2 }}"><br>Download
                                                                                        Means of Identification</a>
                                                                                @endif


                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>






                                                            <div class="col-md-6">
                                                                <div class="gallery card card-bordered" style="height: 210px">

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
                                                                                @if (!empty($form_3->means_of_identification3))
                                                                                    <a href="../../public/{{ $form_3->means_of_identification3 }}"
                                                                                        download="{{ $form_3->means_of_identification3 }}"><br>Download
                                                                                        Means of Identification</a>
                                                                                @endif


                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>





                                                            <div class="col-md-6">
                                                                <div class="gallery card card-bordered" style="height: 210px">

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
                                                                                @if (!empty($form_3->means_of_identification4))
                                                                                    <a href="../../public/{{ $form_3->means_of_identification4 }}"
                                                                                        download="{{ $form_3->means_of_identification4 }}"><br>Download
                                                                                        Means of Identification</a>
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
                                                                                href="{{ route('userform_two_view', $form_3->id) }}">
                                                                                <span
                                                                                    class="btn btn-lg btn-primary">Previous</span></a>
                                                                        </li>

                                                                        <li>
                                                                            <a
                                                                                href="{{ route('userform_four_view', $form_3->id) }}">
                                                                                <span
                                                                                    class="btn btn-lg btn-primary">Next</span></a>
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
