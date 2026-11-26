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
                                    (Non-Capital Market Operator – Corporate)
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
                                                        action="{{ route('form_step_three_corporate_account', $form_3_edit->id) }}"
                                                        enctype="multipart/form-data" method="POST" id="fileUploadForm">
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
                                                                                <b> <small style="color: red">Please note that
                                                                                        the
                                                                                        maximum file size for
                                                                                        upload is 5MB.</small></b>
                                                                                {{-- <a href="onb/public/{{$form_3_edit->memorandumand_articles_of_association}}">Link</a> --}}
                                                                                @if (!empty($form_3_edit->memorandumand_articles_of_association))
                                                                                    <a href="../../public/{{ $form_3_edit->memorandumand_articles_of_association }}"
                                                                                        download="{{ $form_3_edit->memorandumand_articles_of_association }}"><br><br>Download
                                                                                        Memorandum and Articles of
                                                                                        Association</a>
                                                                                    <div class="form-control-wrap">
                                                                                        <div class="custom-file">
                                                                                            <input
                                                                                                name="memorandumand_articles_of_association"
                                                                                                type="file"
                                                                                                class="custom-file-input"
                                                                                                id="mem_art">
                                                                                            <label class="custom-file-label"
                                                                                                for="inputGroupFile01">Choose
                                                                                                file</label>
                                                                                        </div>
                                                                                    </div>
                                                                                @endif
                                                                                @if (empty($form_3_edit->memorandumand_articles_of_association))
                                                                                    <div class="form-control-wrap">
                                                                                        <div class="custom-file">
                                                                                            <input
                                                                                                name="memorandumand_articles_of_association"
                                                                                                type="file" required
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
                                                                                <b> <small style="color: red">Please note that
                                                                                        the
                                                                                        maximum file size for
                                                                                        upload is 5MB.</small></b>
                                                                                @if (!empty($form_3_edit->board_resolution))
                                                                                    <a href="../../public/{{ $form_3_edit->board_resolution }}"
                                                                                        download="{{ $form_3_edit->board_resolution }}"><br>Download
                                                                                        Board Resolution</a>
                                                                                    <div class="form-control-wrap">
                                                                                        <div class="custom-file">
                                                                                            <input name="board_resolution"
                                                                                                type="file"
                                                                                                class="custom-file-input"
                                                                                                id="mem_art">
                                                                                            <label class="custom-file-label"
                                                                                                for="inputGroupFile01">Choose
                                                                                                file</label>
                                                                                        </div>
                                                                                    </div>
                                                                                @endif
                                                                                @if (empty($form_3_edit->board_resolution))
                                                                                    <div class="form-control-wrap">
                                                                                        <div class="custom-file">
                                                                                            <input required
                                                                                                name="board_resolution"
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









                                                            <div class="col-md-6">
                                                                <div class="gallery card card-bordered" style="height: 210px">

                                                                    <div
                                                                        class="gallery-body card-inner align-center justify-between flex-wrap g-2">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label class="form-label"
                                                                                    for="fw-last-name">Certificate of
                                                                                    Incorporation</label>

                                                                                <b> <small style="color: red">Please note that
                                                                                        the
                                                                                        maximum file size for
                                                                                        upload is 5MB.</small></b>

                                                                                @if (!empty($form_3_edit->certificate_of_incorporation))
                                                                                    <a href="../../public/{{ $form_3_edit->certificate_of_incorporation }}"
                                                                                        download="{{ $form_3_edit->certificate_of_incorporation }}"><br>Download
                                                                                        Certificate of Incorporation</a>
                                                                                    <div class="form-control-wrap">
                                                                                        <div class="custom-file">
                                                                                            <input
                                                                                                name="certificate_of_incorporation"
                                                                                                type="file"
                                                                                                class="custom-file-input"
                                                                                                id="mem_art">
                                                                                            <label class="custom-file-label"
                                                                                                for="inputGroupFile01">Choose
                                                                                                file</label>
                                                                                        </div>
                                                                                    </div>
                                                                                @endif
                                                                                <br>
                                                                                <br>
                                                                                @if (empty($form_3_edit->certificate_of_incorporation))
                                                                                    <div class="form-control-wrap">
                                                                                        <div class="custom-file">
                                                                                            <input required
                                                                                                name="certificate_of_incorporation"
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
                                                                                <b> <small style="color: red">Please note that
                                                                                        the
                                                                                        maximum file size for
                                                                                        upload is 5MB.</small></b>
                                                                                @if (!empty($form_3_edit->particulars_of_directors))
                                                                                    <a href="../../public/{{ $form_3_edit->particulars_of_directors }}"
                                                                                        download="{{ $form_3_edit->particulars_of_directors }}"><br>Download
                                                                                        Particulars of Directors</a>
                                                                                    <div class="form-control-wrap">
                                                                                        <div class="custom-file">
                                                                                            <input
                                                                                                name="particulars_of_directors"
                                                                                                type="file"
                                                                                                class="custom-file-input"
                                                                                                id="mem_art">
                                                                                            <label class="custom-file-label"
                                                                                                for="inputGroupFile01">Choose
                                                                                                file</label>
                                                                                        </div>
                                                                                    </div>
                                                                                @endif
                                                                                @if (empty($form_3_edit->particulars_of_directors))
                                                                                    <div class="form-control-wrap">
                                                                                        <div class="custom-file">
                                                                                            <input
                                                                                                name="particulars_of_directors"
                                                                                                type="file" required
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
                                                                                <b> <small style="color: red">Please note that
                                                                                        the
                                                                                        maximum file size for
                                                                                        upload is 5MB.</small></b>
                                                                                @if (!empty($form_3_edit->particulars_of_shareholders))
                                                                                    <a href="../../public/{{ $form_3_edit->particulars_of_shareholders }}"
                                                                                        download="{{ $form_3_edit->particulars_of_shareholders }}"><br>Download
                                                                                        Particulars of Directors</a>
                                                                                    <div class="form-control-wrap">
                                                                                        <div class="custom-file">
                                                                                            <input
                                                                                                name="particulars_of_shareholders"
                                                                                                type="file"
                                                                                                class="custom-file-input"
                                                                                                id="mem_art">
                                                                                            <label class="custom-file-label"
                                                                                                for="inputGroupFile01">Choose
                                                                                                file</label>
                                                                                        </div>
                                                                                    </div>
                                                                                @endif
                                                                                @if (empty($form_3_edit->particulars_of_shareholders))
                                                                                    <div class="form-control-wrap">
                                                                                        <div class="custom-file">
                                                                                            <input
                                                                                                name="particulars_of_shareholders"
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
                                                                                @if (empty($form_3_edit->means_of_identification2))
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
                                                                                <b> <small style="color: red">Please note that
                                                                                        the
                                                                                        maximum file size for
                                                                                        upload is 5MB.</small></b>
                                                                                @if (!empty($form_3_edit->means_of_identification2))
                                                                                    <a href="../../public/{{ $form_3_edit->means_of_identification2 }}"
                                                                                        download="{{ $form_3_edit->means_of_identification2 }}"><br>Download
                                                                                        Means of Identification</a>
                                                                                    <div class="form-control-wrap">
                                                                                        <div class="custom-file">
                                                                                            <input
                                                                                                name="means_of_identification2"
                                                                                                type="file"
                                                                                                class="custom-file-input"
                                                                                                id="mem_art">
                                                                                            <label class="custom-file-label"
                                                                                                for="inputGroupFile01">Choose
                                                                                                file</label>
                                                                                        </div>
                                                                                    </div>
                                                                                @endif
                                                                                @if (empty($form_3_edit->means_of_identification2))
                                                                                    <div class="form-control-wrap">
                                                                                        <div class="custom-file">
                                                                                            <input required
                                                                                                name="means_of_identification2"
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
                                                                                <b> <small style="color: red">Please note that
                                                                                        the
                                                                                        maximum file size for
                                                                                        upload is 5MB.</small></b>
                                                                                @if (!empty($form_3_edit->means_of_identification3))
                                                                                    <a href="../../public/{{ $form_3_edit->means_of_identification3 }}"
                                                                                        download="{{ $form_3_edit->means_of_identification3 }}"><br>Download
                                                                                        Means of Identification</a>
                                                                                    <div class="form-control-wrap">
                                                                                        <div class="custom-file">
                                                                                            <input
                                                                                                name="means_of_identification3"
                                                                                                type="file"
                                                                                                class="custom-file-input"
                                                                                                id="mem_art">
                                                                                            <label class="custom-file-label"
                                                                                                for="inputGroupFile01">Choose
                                                                                                file</label>
                                                                                        </div>
                                                                                    </div>
                                                                                @endif
                                                                                @if (empty($form_3_edit->means_of_identification3))
                                                                                    <div class="form-control-wrap">
                                                                                        <div class="custom-file">
                                                                                            <input required
                                                                                                name="means_of_identification3"
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
                                                                                href="{{ route('form_two_edit_CO', $form_3_edit->id) }}">
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

        {{-- <script>
            document.addEventListener('DOMContentLoaded', function() {
                const fileInputs = document.querySelectorAll('.custom-file-input'); // Select all file input elements
                const maxFileSize = 5 * 1024 * 1024; // 5MB in bytes

                // Add change event listener to each file input
                fileInputs.forEach(function(fileInput) {
                    fileInput.addEventListener('change', function(event) {
                        const file = event.target.files[0]; // Get the selected file

                        if (file) {
                            // Check file size
                            if (file.size > maxFileSize) {
                                alert(
                                    `The file "${file.name}" exceeds the maximum allowed size of 5MB.`
                                    );
                                event.target.value = ""; // Clear the file input
                            }

                            // Check file type
                            const fileType = file.type; // Get the MIME type
                            if (fileType !== 'application/pdf') {
                                alert(
                                    `The file "${file.name}" is not a PDF. Please upload a valid PDF file.`
                                    );
                                event.target.value = ""; // Clear the file input
                            }
                        }
                    });
                });

                // Handle the form submit event
                const form = document.getElementById('fileUploadForm');
                form.addEventListener('submit', function(event) {
                    let isValid = true;

                    fileInputs.forEach(function(fileInput) {
                        const file = fileInput.files[0];

                        if (file) {
                            // Validate file size
                            if (file.size > maxFileSize) {
                                isValid = false;
                            }

                            // Validate file type
                            const fileType = file.type;
                            if (fileType !== 'application/pdf') {
                                isValid = false;
                            }
                        }
                    });

                    if (!isValid) {
                        event.preventDefault(); // Prevent form submission
                        alert(
                            'One or more files are not valid or exceed the 5MB size limit. Please select valid PDF files.'
                            );
                    }
                });
            });
        </script> --}}
    @endsection
