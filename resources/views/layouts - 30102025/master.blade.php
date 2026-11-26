<!DOCTYPE html>
<html lang="zxx" class="js">
<head>
    <base href="">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset('assets/images/fmdq_favicon.png')}}">
    <title>FMDQ Depository Participant Onboarding Portal</title>
    <link href="{{ asset('assets/css/dashlite.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/theme.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/libs/fontawesome-icons.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/libs/themify-icons.css')}}" rel="stylesheet" type="text/css" />
    <meta name="csrf-token" content="{{ csrf_token() }}"> 


</head>
<body class="nk-body bg-lighter npc-default has-sidebar ">
    <div class="nk-app-root">
       
     <div class="nk-main ">
    @include('layouts.sidebar')
    @include('layouts.header')


    @yield('content')

    @include('layouts.footer')

    

    <script src="{{ asset('assets/js/bundle.js')}}"></script>
    <script src="{{ asset('assets/js/scripts.js')}}"></script>
    <script src="{{ asset('assets/js/charts/chart-ecommerce.js')}}"></script>
    <script src="{{ asset('assets/js/libs/datatable-btns.js')}}"></script>



            
<script>
    function loading() {

$(".btn .fa-spinner").show();
$(".btn .btn-text").html("Processing...");

/* var button = document.getElementById("submit");
button.innerHTML = "Loading...";
var span = document.getElementById("button_span");
span.classList.add("spinner-grow");
span.classList.add("spinner-grow-sm");*/
}
</script>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
</body>

</html>

  
