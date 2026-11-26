<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>Reset Passcode | DashLite Admin Template</title>
    <!-- StyleSheets  -->
    <link href="{{ asset('assets/css/dashlite.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/theme.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/libs/fontawesome-icons.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/libs/themify-icons.css')}}" rel="stylesheet" type="text/css" />
</head>

<body class="nk-body npc-crypto bg-white pg-auth">
    <!-- app body @s -->
    <div class="nk-app-root">
        <div class="nk-split nk-split-page nk-split-md">
            
            <div class="nk-split-content nk-split-stretch" style=" background-image: url('https://img.freepik.com/free-vector/forex-trading-background_52683-41604.jpg?w=996&t=st=1671746160~exp=1671746760~hmac=59fb446d89b72cf3cc15355473cff31dc123096ec0191d1956345859ac328677'); "></div><!-- .nk-split-content -->

            <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white w-lg-45">
                <div class="absolute-top-right d-lg-none p-3 p-sm-5">
                    <a href="#" class="toggle btn btn-white btn-icon btn-light" data-target="athPromo"><em class="icon ni ni-info"></em></a>
                </div>
                <div class="nk-block nk-block-middle nk-auth-body">
                    <div class="brand-logo pb-5">
                        <a href="html/index.html" class="logo-link">
                            <img class="logo-light logo-img logo-img-lg" src="./images/logo.png" srcset="./images/logo2x.png 2x" alt="logo">
                            <img class="logo-dark logo-img logo-img-lg" src="./images/logo-dark.png" srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
                        </a>
                    </div>
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h5 class="nk-block-title">Reset password</h5>
                            <div class="nk-block-des">
                                <p>If you forgot your password, well, then we’ll email you instructions to reset your password.</p>
                            </div>
                        </div>
                    </div><!-- .nk-block-head -->
                    <form action="html/pages/auths/auth-success-v3.html">
                        <div class="form-group">
                            <div class="form-label-group">
                                <label class="form-label" for="default-01">Email</label>
                                <a class="link link-primary link-sm" href="#">Need Help?</a>
                            </div>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control form-control-lg" id="default-01" placeholder="Enter your email address">
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-lg btn-primary btn-block">Send Reset Link</button>
                        </div>
                    </form><!-- form -->
                    <div class="form-note-s2 pt-5">
                        <a href="html/pages/auths/auth-login-v3.html"><strong>Return to login</strong></a>
                    </div>
                </div><!-- .nk-block -->
               
            </div><!-- .nk-split-content -->
        </div><!-- .nk-split -->
    </div><!-- app body @e -->
    <!-- JavaScript -->
    <script src="{{ asset('assets/js/bundle.js')}}"></script>
    <script src="{{ asset('assets/js/scripts.js')}}"></script>
</body>

</html>