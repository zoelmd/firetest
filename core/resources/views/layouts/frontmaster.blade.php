<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>{{$general_settings->title}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{url('/assets/images/uploads/')}}/{{$general_settings->icon}}" />

    <!--Chart Stylesheet-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/charts.css') }}">
    <!--Bootstrap Stylesheet-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/bootstrap.css') }}">
    <!--Bootstrap Range Slider-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/bootstrap-slider.css') }}">
    <!--Slick Carousel Stylesheet-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/slick.css') }}">
    <!--Bootstrap Select Stylesheet-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/bootstrap-select.css') }}">
    <!--Input Select With Search Stylesheet-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/select2.css') }}">
    <!--Font Awesome Stylesheet-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/font-awesome.min.css') }}">
    <!--Animate Stylesheet-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/animate.css') }}">
    <!--Main Stylesheet-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/style.css') }}">
    <!--Responsive Stylesheet-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/responsive.css') }}">
    <!--Color Switcher Stylesheet-->
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/switcher-colors.css') }}"> -->

    <!--Creative Stylesheet-->
    <link type="text/css" href="{{ asset('assets/plugins/css/intlTelInput.css') }}" rel="stylesheet">

    <link href="{{asset('/assets/backend/custom/css/sweetalert.css')}}" rel="stylesheet" type="text/css" />

    <link type="text/css" href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <!-- Theam Color Css-->
    <link href="{{ asset('assets/frontend/css/color.php?color='.$general_settings->color) }}" rel="stylesheet">
    <!-- Modanizr JS -->
    <script src="{{ asset('assets/frontend/js/modernizr.custom.js') }}"></script>
    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js') }}"></script>
    <![endif]-->
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-migrate-3.0.1.js') }}"></script>
    <style>
        .intl-tel-input.separate-dial-code .selected-dial-code {
            display: table-cell;
            vertical-align: middle;
            padding-left: 25px;
        }
    </style>
</head>

<body>

<!--Start Preloader One-->
<div class="site-preloader">
    <div class="spinner">
        <div class="rect1"></div>
        <div class="rect2"></div>
        <div class="rect3"></div>
        <div class="rect4"></div>
        <div class="rect5"></div>
    </div>
</div>
<!--End Preloader One-->

<!--Start Body Wrap-->
<div id="body-wrap">
    <!--Start Header-->
    <header class="header style-one header-main">
        <!--Start Header Top-->
        <div class="header-top">
            <!--Start Header Top container-->
            <div class="container">
                <!--Start Header Top Row-->
                <div class="row">
                    <div class="col-sm-6 col-xs-12">
                        <div class="topbar-contact-info">
                            @php $c = App\Contact::orderBy('id','asc')->first() @endphp
                            <ul>
                                <li><i class="fa fa-phone"></i> {{$c->cell_number}} <small>&#124;</small></li>
                                <li><i class="fa fa-envelope"></i> {{$c->email}}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <div class="header-social-icon">
                            <ul>
                                @foreach(App\Social::whereStatus(0)->get() as $social)
                                    <li>
                                        <a href="{{$social->faurl}}">
                                            <i class="fa fa-{{$social->facode}}"></i>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <!--End Header Top Row-->
            </div>
            <!--End Header Top container-->
        </div>
        <!--End Header Top-->

        <div class="clearfix"></div>
        <!--Start Main Menu-->
        <div class="mainmenu" data-spy="affix" data-offset-top="197">
            <!--Start Nav-->
            <nav class="navbar navbar-default">
                <!--Start Main Menu container-->
                <div class="container">
                     <div class="col-md-3">
                        <div class="logo">
                            <a href="{{route('index')}}">
                             <img src="{{url('/assets/images/uploads/')}}/{{$general_settings->logo}}" height="50px" width="150px" alt="logo" class="logo-default" /> </a>
                        </div>
                    </div>
                    <div class="col-md-9 text-right">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index-one-layout-1.html"><img class="img-responsive" src="images/logo/logo.png" alt=""></a>
                    </div>

                    <div id="navbar" class="navbar-collapse collapse">
                        <!--Start Menu List-->
                        <ul class="nav navbar-nav">
                            <li class="active">
                                <a href="{{url('/')}}">Home</a>
                            </li>
                            @foreach(App\Menu::all() as $menu)
                                <li>
                                    <a href="{{route('page', ['menu_id' => $menu->id ])}}">
                                        {{$menu->name}}
                                    </a>
                                </li>
                            @endforeach
                                <li> <a href="{{route('contact.us')}}">Contact</a></li>
                        </ul>
                        <!--End Menu List-->
                    </div>
                    </div>
                </div>
                <!--End Main Menu container-->
            </nav>
            <!--End Nav-->
        </div>
        <!--End Main Menu-->
    </header>
    <!--End Header-->
               @yield('content')

    <!--Start Footer-->
    <footer class="footer">
        <!--Start Footer Support Info-->
        <div class="footer-support-info">
            <!--Start Container-->
            <div class="container">
                <!--Start Row-->
                <div class="row">
                    <!--Start Support Content-->
                    <div class="footer-sup-info-cont">
                        <!--Start Support Item Col-->
                        <div class="col-sm-4">
                            <!--Start Support Item-->
                            <div class="fotr-sup-info-item text-center">
                                <div class="sup-info-icon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <p class="text-center">support@addirectory.com</p>
                            </div>
                            <!--End Support Item-->
                        </div>
                        <!--End Support Item Col-->

                        <!--Start Support Item Col-->
                        <div class="col-sm-4">
                            <!--Start Support Item-->
                            <div class="fotr-sup-info-item text-center">
                                <div class="sup-info-icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <p class="text-center">+123 456 789 000</p>
                            </div>
                            <!--End Support Item-->
                        </div>
                        <!--End Support Item Col-->

                        <!--Start Support Item Col-->
                        <div class="col-sm-4">
                            <!--Start Support Item-->
                            <div class="fotr-sup-info-item text-center">
                                <div class="sup-info-icon">
                                    <i class="fa fa-comments-o"></i>
                                </div>
                                <p class="text-center">Chat With Us</p>
                            </div>
                            <!--End Support Item-->
                        </div>
                        <!--End Support Item Col-->
                    </div>
                    <!--End Support Content-->
                </div>
                <!--End Row-->
            </div>
            <!--End Container-->
        </div>
        <!--End Footer Support Info-->

        <!--Start Footer Top-->
        <div class="footer-style-three-top">
            <!--Start Container-->
            <div class="container">
                <!--Start Row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="fot-styl-three-logo text-center">
                            <img src="images/logo/logo.png" alt="">
                            <h2>Ad<span>Directory</span></h2>
                        </div>
                        <div class="fot-styl-three-social text-center">
                            <h3>Follow Us</h3>
                            <ul>
                                <li><a href=""><i class="fa fa-facebook"></i></a></li>
                                <li><a href=""><i class="fa fa-twitter"></i></a></li>
                                <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                                <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--End Row-->
            </div>
            <!--End Container-->
        </div>
        <!--End Footer Top-->

        <!--Start Footer Bottom-->
        <div class="footer-bottom">
            <!--Start container-->
            <div class="container">
                <!--Start Row-->
                <div class="row">
                    <!--Start Col-->
                    <div class="col-sm-6 col-xs-6 col-md-offset-3">
                        <div class="copy-right-text">
                            <p class="text-center">&copy; 2017 {{$general_settings->title}}. All rights reserved.</p>
                        </div>
                    </div>
                    <!--End Col-->
                </div>
                <!--End Row-->
            </div>
            <!--End container-->
        </div>
        <!--End Footer Bottom-->

        <!--Start ClickToTop-->
        <div class="totop">
            <!--Start ClickToTop-->
            <a href="#top"><i class="fa fa-angle-up"></i></a>
        </div>
        <!--End ClickToTop-->
    </footer>
    <!--End Footer-->
</div>
<!--End Body Wrap-->

<!--Main jQuery JS-->
<!--Google Map APi Key-->
<script src="https://maps.googleapis.com/maps/api/js?key={{$general_settings->google_map}}"></script>
<!--Conter JS-->
<script type="text/javascript" src="{{ asset('assets/frontend/js/waypoints.js') }}"></script>
<!-- Gmap Load Here -->
<script src="{{ asset('assets/frontend/js/gmaps.js') }}"></script>
<!-- Map Js File Load -->
<script src="{{ asset('assets/frontend/js/map-script.php?color='.$general_settings->color) }}"></script>

<script type="text/javascript" src="{{ asset('assets/frontend/js/jquery.counterup.min.js') }}"></script>
<!--Bootstrap JS-->
<script type="text/javascript" src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
<!--Bootstrap Select JS-->
<script type="text/javascript" src="{{ asset('assets/frontend/js/bootstrap-select.min.js') }}"></script>
<!--Bootstrap Range Slide JS-->
<script type="text/javascript" src="{{ asset('assets/frontend/js/bootstrap-slider.min.js') }}"></script>
<!--Slick Crousel JS-->
<script type="text/javascript" src="{{ asset('assets/frontend/js/slick.js') }}"></script>
<!--Form Select Option JS-->
<script type="text/javascript" src="{{ asset('assets/frontend/js/select2.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('assets/backend/custom/js/sweetalert.min.js') }}"></script>
<!-- Main JS -->
<script type="text/javascript" src="{{ asset('assets/frontend/js/main.js') }}"></script>

@if(Session::has('msg'))
    <script>
        $(document).ready(function(){
            swal("{{Session::get('msg')}}","", "success");
        });
    </script>
@endif
@if(Session::has('delmsg'))
    <script>
        $(document).ready(function(){
            swal("{{Session::get('delmsg')}}","", "warning");
        });

    </script>
@endif
</body>

</html>
