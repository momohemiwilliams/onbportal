<!DOCTYPE html>
<html lang="zxx" class="js">
<head>
    <base href="">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png')}}">
    <title>Default Dashboard</title>
    <link href="{{ asset('assets/css/dashlite.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/theme.css')}}" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,700,900|Roboto+Condensed:400,300,700" rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="dist/css/demo.css">
    <link rel="stylesheet" href="dist/css/dropify.min.css">
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
</head>
<body class="nk-body npc-invest bg-lighter ">
    <div class="nk-app-root">
       
        <div class="nk-wrap ">
    @include('layouts.participantssidebar')
    
   


    @yield('content')

    @include('layouts.footer')

<script src="{{ asset('assets/js/bundle.js')}}"></script>
<script src="{{ asset('assets/js/scripts.js')}}"></script>
<script src="{{ asset('assets/js/charts/chart-ecommerce.js')}}"></script>

<script src="{{ asset('assets/js/libs/datatable-btns.js')}}"></script>


</body>

</html>

  
