@extends('layouts.app')

@section('content')
        <div class="container">
            @if (Route::has('login'))
                <div class="top-left links">
                    @auth
                        <a href="{{ url('admin/home') }}">Home</a>
                    @else
                        <a href="{{ route('admin.login') }}">Login</a>
                        <a href="{{ route('admin.register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
               <div class="card">
                  <div class="card-header">
                   Online Moblie Recharge
                  </div>
                  <div class="card-body">
                        <h1>International Telephone Input</h1>
                          <form>
                            <input id="phone" type="tel">
                            <button type="submit">Submit</button>
                          </form>

  
                  </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('assets/plugins/js/intlTelInput.js') }}"></script>

        <script>
  $(document).ready(function(){
    alert();
    $("#phone").intlTelInput({
      // allowDropdown: false,
      // autoHideDialCode: false,
      autoPlaceholder: "off",
      // dropdownContainer: "body",
      // excludeCountries: ["us"],
      // formatOnDisplay: false,
      geoIpLookup: function(callback) {
        $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
          var countryCode = (resp && resp.country) ? resp.country : "";
         alert(countryCode);
         callback(countryCode);
        });
      },
      // hiddenInput: "full_number",
      // initialCountry: "auto",
      // nationalMode: false,
      // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
      placeholderNumberType: "MOBILE",
      // preferredCountries: ['cn', 'jp'],
      // separateDialCode: true,
      utilsScript: "build/js/utils.js"
    });
    });
  </script>
@endsection