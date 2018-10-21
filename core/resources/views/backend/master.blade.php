<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
    <head>
        <meta charset="utf-8" />
        <title>{{ $general_settings->title }} - {{ $page_title }}</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <link rel="icon" href="{{url('/assets/images/uploads/')}}/{{$general_settings->icon}}">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @include('backend.layouts.includes.master-styles')
    </head>

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
    @include('backend.layouts.includes.alert')
    <!-- BEGIN HEADER -->
    <div class="page-header navbar navbar-fixed-top">

        <!-- BEGIN HEADER INNER -->
        <div class="page-header-inner ">
            <div class="page-logo">
                <a href="">
                    <img src="{{url('/assets/images/uploads/')}}/{{$general_settings->logo}}" height="50px" width="150px" alt="logo" class="logo-default" /> </a>
                <div class="menu-toggler sidebar-toggler"> </div>
            </div>

            <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>

            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <span class="username username-hide-on-mobile"> {{Auth()->user()->name}} </span>
                            <i class="fa fa-angle-down"></i>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="{{ route('admin.change-password') }}">
                                    <i class="icon-settings"></i> Change Passwrod
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('admin.logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->

        </div>
    </div>

    <div class="clearfix"> </div>

    <div class="page-container">
       <!-- @include('backend.layouts.includes.master-siderbar')-->

        <!-- BEGIN MAIN CONTENT -->
        <div class="page-content-wrapper" >
            <div class="page-content">
                @section('page_title')
                    <p class="page-title"> {{ $page_title }} </p><hr id="#pagehr">
                @show

                @yield('main-content')
            </div>
        </div>
        <!-- END MAIN CONTENT -->
    </div>
    <!-- END CONTAINER -->

    @include('backend.layouts.includes.master-footer')
    @include('backend.layouts.includes.master-scripts')
    </body>

</html>