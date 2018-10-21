<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$general_settings->title}}</title>

    <!-- Styles -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{asset('/assets/backend/custom/css/sweetalert.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/css/intlTelInput.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/js/jquery-3.2.1.slim.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-migrate-3.0.1.js') }}"></script>
</head>
<body>
    <div class="container">
    <div id="app">
        <div class="header">
            <div class="row">
             <div class="col-md-3">
                <div class="page-logo">
                <a href="{{url('/')}}">
                    <img src="{{url('/assets/images/uploads/')}}/{{$general_settings->logo}}" height="50px" width="150px" alt="logo" class="logo-default" /></a>
                <div class="menu-toggler sidebar-toggler"> </div>
            </div>

            </div>
             <div class="col-md-9">
                <div class="menu-area">
                   <div class="topnav" id="myTopnav">
                            <a href="{{url('/')}}">Home</a>
                            @foreach(App\Menu::all() as $menu)
                             <a href="{{route('page', ['menu_id' => $menu->id ])}}">
                              {{$menu->name}} 
                            </a>
                            @endforeach
                    </div>

                </div>
               
            </div>
            </div>
        </div>
        @yield('content')
        <footer>
        <section class="block">
            <div data-velocity="-.2" style="background: url({{asset('assets/frontend/images/resource/parallax2.jpg')}}) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax blackish"></div><!-- PARALLAX BACKGROUND IMAGE -->
            <div class="container">
                <div class="row">
                    <div class="col-md-6 column">
                        <div class="about_widget widget">
                            <div class="logo">
                                <div class="left">
                                    <img src="{{url('/assets/images/uploads/')}}/{{$general_settings->logo}}" alt="" class="img-responsive ico_thumb" height="80%" width="80%" style="padding-left: 0" />
                                </div>
                                  @php $contact = App\Contact::orderBy('id','asc')->first() @endphp
                                <div class="right">
                                     <p>{{$contact->about}}</p>
                                </div>
                            </div><!-- LOGO -->
                           
                            
                            <ul class="social-btns">
                                 @foreach(App\Social::whereStatus(0)->get() as $social)
                                <li>
                                    <a href="{{$social->faurl}}">
                                        <i class="fa fa-{{$social->facode}}"></i>  
                                    </a>
                                </li>
                                 @endforeach
                            </ul>
                          
                            <span><i class="fa fa-envelope"></i>{{$contact->email}}</span>
                            <span><i class="fa fa-phone"></i>{{$contact->cell_number}}</span>
                            <span><i class="fa fa-location-arrow"></i>{{$contact->address}}</span>
                        </div>
                    </div>
            
                    <div class="col-md-6 column">
                        <div class="subscribe_widget widget">
                            <div class="heading1 sub-heading">
                                <h2><span>Contact</span> Us</h2>
                            </div><!-- heading -->
                            <p>Positioning the closest positioned for abs positioning</p>
                            <form method="POST" accept="{{route('subscriber.create')}}" novalidate="">
                                <label><i class="fa fa-envelope"></i>
                                    <input type="text" name="name" id="name" placeholder="YOUR NAME" required="" />
                                </label>
                                
                                <label><i class="fa fa-pencil"></i>
                                    <input type="email" placeholder="TYPE YOUR EMAIL" id="email" name="email" required="" />
                                </label>
                                <button type="button" class="flat-btn sub-button" id="submit_subscribe">SUBSCRIBE</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="bottom-line">
            <div class="container">
                <span>Copyright All Right Reserved 2015 <a href="#" title="">{{$general_settings->title}}</a></span>
                <ul>
                    <li><a title="" href="#">HOME</a></li>
                            @foreach(App\Menu::all() as $menu)
                             <li> <a href="{{route('page', ['menu_id' => $menu->id ])}}">
                              {{$menu->name}} 
                            </a></li>
                            @endforeach
                </ul>
            </div>
        </div>
    </footer>
    </div>
  </div>

    <!-- Scripts
    <script src="{{ asset('assets/js/app.js') }}"></script>-->
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/backend/custom/js/sweetalert.min.js') }}"></script>
     @include('backend.layouts.includes.alert')
</body>
</html>
