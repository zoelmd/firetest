<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>{{ $general_settings->title }} - {{ $page_title }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    @include('backend.layouts.includes.master-styles')
</head>

<body class="login">
    <div class="logo">
      <a href="">
        <img src="{{url('/assets/images/uploads/')}}/{{$logo->name}}" height="50px" width="150px" alt="logo" class="logo-default" /> 
      </a>
    </div>

    <div class="content">
        @yield('main-content')
    </div>
    @include('backend.layouts.includes.master-scripts')
</body>

</html>