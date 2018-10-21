@section('scripts')
<script>
    $(document).ready(function(){
        $('#country-table').DataTable();
        $(document).on('click','#edit-button',function(){
            var client_id     = $(this).val();
            $('#submit-editm-modal').val(client_id);
               $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
               $.post('{{route('country.edit')}}',{client_id : client_id}, function(country){
                      //console.log(country);
                      $("#edit_country_name").val(country.country_name);
                      $("#edit_dial_code").val(country.dial_code);
                      $("#edit_currency_text").val(country.currency_code);
                      $("#edit_exchange_rate").val(country.exchange_rate);
                      //alert(country.status);
                      if(country.status==1){
                          $('#status_id').bootstrapSwitch('state', false);
                        //$("#status_id").attr('checked', 'checked');
                      }else{
                          $('#status_id').bootstrapSwitch('state', true);
                      }
           });
              

        });
        //Create Country
        $(document).on('click','#save_btn',function(){
            var country_name     = $("#country_name").val();
            var country_code     = $("#country_code").val();
            var dial_code        = $("#dial_code").val();
            var currency_name    = $("#currency_name").val();
            var currency_symbol  = $("#currency_symbol").val();
            var currency_code    = $("#currency_text").val();
            var exchange_rate    = $("#exchange_rate").val();
                if ($('#status_id').is(':checked')) {
                   status_id = 0;
                }else{
                    status_id = 1;
                }
                    $('#country_name_error').text('');
                    $('#dial_code_error').text('');
                    $('#currency_text_error').text('');
                    $('#exchange_rate_error').text('');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            $.ajax({
                type:"POST",
                url:'{{route('country.create')}}',
                data : { country_name : country_name,
                        country_code : country_code,
                        dial_code : dial_code,
                        currency_name: currency_name,
                        currency_symbol: currency_symbol,
                        currency_code : currency_code,
                        exchange_rate : exchange_rate,
                        status_id : status_id,
                        },

                success:function(data){                     
                  
                         console.log(data);
                        swal({title: "Save", text: "Country create successfully!", type: "success"},
                            function(){ 
                             location.reload();
                              }
                          );
                },
                error:function(data){
                     var parsedJson = JSON.parse(data.responseText);
                     errorsHtml = '<div class="alert alert-danger"><ul>';
                     $.each( parsedJson['errors'], function( i, val ) {
                             
                                     console.log(val);
                                     errorsHtml += '<li>' + val + '</li>';
                             
                           
                        });
                     errorsHtml += '</ul></div>';
                        console.log(errorsHtml);
                     $( '#form-errors' ).html( errorsHtml );
                }

            });

           
        });

         //Edit Country
        $(document).on('click','#submit-editm-modal',function(){
            var country_id         = $(this).val();
            var country_name     = $("#edit_country_name").val();
            var dial_code        = $("#edit_dial_code").val();
            var currency_code    = $("#edit_currency_text").val();
            var exchange_rate    = $("#edit_exchange_rate").val();
            if ($('#status_id').is(':checked')) {
               status_id = 1;
            }else{
                status_id = 0;
            }
                    $('#edit_country_name_error').text('');
                    $('#edit_dial_code_error').text('');
                    $('#edit_currency_text_error').text('');
                    $('#edit_exchange_rate_error').text('');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            $.ajax({
                type:"POST",
                url:'{{route('country.update')}}',
                data : { country_name : country_name,
                        dial_code : dial_code,
                        country_id : country_id,
                        currency_code : currency_code,
                        exchange_rate : exchange_rate,
                        status_id : status_id,
                        },
                success:function(data){                     
                    console.log(data);
                   swal({title: "Update", text: "Country data update successfully!", type: "success"},
                       function(){ 
                           location.reload();
                       }
                    );
                },
                error:function(data){
                     var parsedJson = JSON.parse(data.responseText);
                    
                    console.log(parsedJson.errors.currency_code);
                }
            });

           
        });
    });

</script>
@endsection