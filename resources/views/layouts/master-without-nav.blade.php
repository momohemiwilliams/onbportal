<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="">
    <meta charset="utf-8">

    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ asset('assets/images/fmdq_favicon.png') }}">
    <!-- Page Title  -->
    <title>FMDQ Depository Participant Onboarding Portal</title>
    <!-- StyleSheets  -->
    <link href="{{ asset('assets/css/dashlite.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/theme.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/libs/fontawesome-icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/libs/themify-icons.css') }}" rel="stylesheet" type="text/css" />
</head>

<body class="nk-body bg-white npc-general pg-auth">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                @include('components.public_header')

                <!-- content @s -->
                @yield('content')

                @include('components.toaster')
                @include('components.public_footer')

            <!-- wrap @e -->
        </div>
        <!-- content @e -->
    </div>
    <!-- main @e -->
    </div>



    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="{{ asset('assets/js/bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
</html>
