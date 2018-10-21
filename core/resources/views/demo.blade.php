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
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <style type="text/css">
    	.body{
    		margin: auto;
    		width: 200px;
    	}
    	.body .button {
    		width: 150px;
    		align-items: center;
    	}
    	.body .button a{
    		text-decoration: none;
		    text-align: center;
		    padding: 15px 40px 10px 43px;
		    font-weight: 700;
		    text-transform: uppercase;
    	}
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <h4>
                      This is demo version change not working..
                   </h4>
                </div>
               

            </div>
        </nav>
         <div class="body">
          	<button class="button"><a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                  Back
            </a></button>
         </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
function goBack() {
    window.history.back();
}
</script>
</body>
</html>


