<script src="{{ asset('assets/plugins/js/intlTelInput.js') }}"></script>
<script>
    $(document).ready(function(){
        var countryCode;
        $("#phone").intlTelInput({
            geoIpLookup: function(callback) {
                $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                    countryCode = (resp && resp.country) ? resp.country : "";
                     console.log(resp);
                    callback(countryCode);
                    getOperator(country_code);

                });
            },
            initialCountry: "auto",
            // hiddenInput: "full_number",

            nationalMode: false,
            // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
            placeholderNumberType: "MOBILE",
            // preferredCountries: ['cn', 'jp'],
            separateDialCode: true,
            utilsScript: "{{ asset('assets/plugins/js/utils.js') }}"
        });

       $(document).on('click','#submit-recharege-request',function(){
           var isValid = $("#phone").intlTelInput("isValidNumber");
            if(isValid==false){
                swal("Request recharge number is invalid!","", "warning");
                return false;
            }else{
                return true;
            }
            
       });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        $('.country-list').on('click', function(e) {
            var country_code = $('.country-list li.active').attr("data-dial-code");
            $('#country_dial_code').val(country_code);
            getOperator(country_code);
        });

        $('li').on('click', function(e) {
            var country_code = $(this).find('.dial-code').text();
            $('#country_code').text(country_code);
        });
    });

     function getOperator(country_code){
                    $.ajax({
                        type:"GET",
                        url:'{{route('operator.by.country')}}',
                        data : { country_code : country_code },
                        //data:data,    // multiple data sent using ajax
                        success: function (data) {
                            $( "#operator_list" ).empty();
                            $( "#operator_contry" ).text(data.country_name);
                            $( "#operator_list" ).html(data.operator);
                            console.log(data);
                        },
                        error:function () {
                            console.log('Error');
                        }
                    });
            }
</script>

<script>
     $(document).ready(function(){
        
        setTimeout(explode, 1000);
       
        function explode(){
             
             var a = $('.selected-dial-code').text();
             var country_code = a.substring(1);
               $('#country_dial_code').val(country_code);
               $.ajax({
                        type:"GET",
                        url:'{{route('operator.by.country')}}',
                        data : { country_code : country_code },
                        //data:data,    // multiple data sent using ajax
                        success: function (data) {
                            $( "#operator_list" ).empty();
                            $( "#operator_contry" ).text(data.country_name);
                            $( "#operator_list" ).html(data.operator);
                            console.log(data);
                        },
                        error:function () {
                            console.log('Error');
                        }
                    });
        }
        
     });
          
</script>

<script>
     $(document).ready(function(){
        
        $(document).on('click', '#submit_subscribe', function(event) {
            event.preventDefault();
            //alert();
            var name = $('#name').val();
            var email = $('#email').val();
            var message = $('#message').val();
            if(name==''){

               swal('Error','The name field is empty!','error'); 
            }else{
                $.ajax({
                        type:"GET",
                        url:'{{route('subscriber.create')}}',
                        data : { name : name, email : email, message:message },
                        success: function (data) {
                            swal('Success','Subscirbe successfully','success');
                            $('#name').val('');
                            $('#email').val('');
                            $('#message').val('');
                        },
                        error:function (error) {
                             var message = JSON.parse(error.responseText);
                             swal('Error',message.errors.email,'error');
                             console.log(message.errors.email);
                           
                        }
                    });
            }

     });
 });
          
</script>