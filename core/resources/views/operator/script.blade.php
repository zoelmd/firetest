<script>
    $(document).ready(function(){
        $('#operator-table').DataTable();

        setTimeout(function() {
                 $(".erro-msg").fadeOut(3000, "linear");
        }, 5000 );
              


         $('#createModal').on('hidden.bs.modal', function(e) {
              $(this).find('form').trigger('reset');
              $("#date").datepicker('setDate', new Date());
          });


        $('#createModal').on('hidden.bs.modal', function(e) {
              $(this).find('form').trigger('reset');
              $("#date").datepicker('setDate', new Date());
               $('.selectpicker').selectpicker('val',0);
            });


        $(document).on('click','#edit-button',function(){
            var operator_id     = $(this).val();
            $('#submit-editm-modal').val(operator_id);
               $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
               $.post('{{route('operator.edit')}}',{operator_id : operator_id}, function(operator){
                      console.log(operator);
                      $("#edit_operator_code").val(operator.operator_code);
                      $("#edit_operator_name").val(operator.operator_name);
                      $("#edit_min_recharge").val(operator.min_recharge);
                      $("#edit_max_recharge").val(operator.max_recharge);
                      $("#edit_operator_id").val(operator.id);
                      
                      $('.selectpicker').selectpicker('val', operator.country_id);

           });
              

        });

         $(document).on('click','#delete_button',function(){
            var operator_id     = $(this).val(); 
            $('#new_operator_id').val(operator_id);  
                swal({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!',
                  cancelButtonText: 'No, cancel!',
                  confirmButtonClass: 'btn btn-success',
                  cancelButtonClass: 'btn btn-danger',
                  buttonsStyling: false
                })

        });

         $(document).on('click','.confirm',function(){
            
            var operator_id     = $('#new_operator_id').val();    
            if(empty(operator_id)){}
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

            $.post('{{route('operator.delete')}}',{operator_id : operator_id}, function(operator){
                alert('Your operator has been deleted.');
                location.reload();

           });
            
         }

        });






    });

</script>