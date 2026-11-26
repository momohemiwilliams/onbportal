<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset('assets/images/fmdq_favicon.png') }}">
    <title>FMDQ Depository Participant Onboarding Portal</title>
    <link href="{{ asset('assets/css/dashlite.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/theme.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/libs/fontawesome-icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/libs/themify-icons.css') }}" rel="stylesheet" type="text/css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">



</head>

<body class="nk-body bg-lighter npc-default has-sidebar ">
    <div class="nk-app-root">

        <div class="nk-main ">
            @include('layouts.external_sidebar')
            @include('layouts.header_external')


            @yield('content')

            @include('components.toaster')
            @include('layouts.footer')


            <script src="{{ asset('assets/js/bundle.js') }}"></script>
            <script src="{{ asset('assets/js/scripts.js') }}"></script>
            <script src="{{ asset('assets/js/charts/chart-ecommerce.js') }}"></script>
            <script src="{{ asset('assets/js/libs/datatable-btns.js') }}"></script>

            <script>
                function loading() {

                    $(".btn .fa-spinner").show();
                    $(".btn .btn-text").html("Loading...");

                    /* var button = document.getElementById("submit");
                    button.innerHTML = "Loading...";
                    var span = document.getElementById("button_span");
                    span.classList.add("spinner-grow");
                    span.classList.add("spinner-grow-sm");*/
                }
            </script>

            <!-- app-root @e -->
            <!-- JavaScript -->
            {{-- <script src="{{ asset('assets/js/bundle.js')}}"></script>
<script src="{{ asset('assets/js/scripts.js')}}"></script> --}}
            <script>
                $(document).ready(function() {
                    $("#btnFetch").click(function() {
                        // disable button
                        $(this).prop("disabled", true);
                        // add spinner to button
                        $(this).html(
                            `<center><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></center>`
                        );
                    });
                });
            </script>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const fileInputs = document.querySelectorAll('.custom-file-input');
                    const maxFileSize = 5 * 1024 * 1024;

                    fileInputs.forEach(function(fileInput) {
                        fileInput.addEventListener('change', function(event) {
                            const file = event.target.files[0];
                            if (!file) return;
                            const fileType = file.type;
                            if (file.size > maxFileSize) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'File Too Large',
                                    text: `The file "${file.name}" exceeds the maximum allowed size of 5MB.`,
                                });
                                event.target.value = "";
                            } else if (fileType !== 'application/pdf') {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Invalid File Type',
                                    text: `The file "${file.name}" is not a PDF. Please upload only PDF files.`,
                                });
                                event.target.value = "";
                            }
                        });
                    });

                    const form = document.getElementById('fileUploadForm');
                    if (form) {
                        form.addEventListener('submit', function(event) {
                            let isValid = true;
                            fileInputs.forEach(function(fileInput) {
                                const file = fileInput.files[0];
                                const fileType = file ? file.type : '';
                                if (file && (file.size > maxFileSize || fileType !== 'application/pdf')) {
                                    isValid = false;
                                }
                            });
                            if (!isValid) {
                                event.preventDefault();
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Submission Error',
                                    text: 'One or more files are either too large or not in PDF format. Please select smaller PDF files.',
                                });
                            }
                        });
                    }
                });
            </script>

</body>


</html>
