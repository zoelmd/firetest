@extends('backend.master')
@section('main-content')
    <div class="row">
    <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-body">
                    <table class="table table-striped table-bordered nowrap" id="table_order">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>OrderRef</th>
                            <th>Country</th>
                            <th>Operator</th>
                            <th>Number</th>
                            <th>Btc Amount</th>
                            <th>Recharge Amount</th>
                            <th>PaymentStatus</th>
                            <th>RechargeStatus</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $i=1 @endphp
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$order->order_id}}</td>
                                <td>{{$order->country->country_name}}</td>
                                <td>{{$order->operator->operator_name}}</td>
                                <td>{{$order->cell_number}}</td>
                                <td>{{number_format($order->btc_amount,8)}} <i class="fa fa-btc"></i></td>
                                <td>{{$order->recharge_amount}} {{$order->country->currency_code}}</td>
                                <td>
                                    <div class="btn-group" data-toggle="buttons">   
                                        @if($order->bit_tx_id == 0)
                                             <button type="button" class="btn btn-sm btn-success button-small payment-button" data-toggle="modal" data-target="#rechargeModal" id="recharge-button" data-status="{{$order->bit_tx_id}}" value="{{$order->id}}"> <i class="fa fa-pencil-square-o"></i></button>
                                             <button type="submit" class="btn btn-sm btn-warning button-small"> <i class="fa fa-spinner"></i>  Pending</button>
                                        @else
                                            <button type="submit" class="btn btn-sm green button-small block" style="width:120px; background-color:green"><i class="fa fa-check-square-o"></i> Paid</button>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                     @if($order->bit_tx_id == 0)
                                         <button type="submit" class="btn btn-sm btn-danger button-small" style="width:120px;"> <i class="fa fa-times"></i> Not Avaiable</button>
                                     @else
                                     <div class="btn-group" data-toggle="buttons">
                                        <button type="button" class="btn btn-sm btn-success button-small recharge-button" data-toggle="modal" data-target="#rechargeModal" id="recharge-button" data-status="{{$order->recharge_status}}" value="{{$order->id}}"> <i class="fa fa-pencil-square-o"></i> </button>

                                         @if($order->recharge_status == 0)
                                            <button type="submit" class="btn btn-sm purple button-small"> <i class="fa fa-times"></i> Pending</button> 
                                        @else
                                            <button type="submit" class="btn btn-sm purple button-small" style="background-color:green"> <i class="fa fa-check-square-o"></i> Complete</button>
                                            
                                        @endif
                                    </div>
                                     @endif
                                    <button class="btn btn-danger btn-sm" id="order_delete" value="{{$order->id}}">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>

      <div class="modal fade" id="rechargeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title bold uppercase" id="modal_title_label">Update Status</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4 ">
                              <label for="date" class="control-label bold uppercase ">Date: </label>
                        </div>
                        <div class="col-md-8">
                            <div class="input-group date">
                             <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                                <input  type="text" class="form-control  createdpicker" name="date" id="date" required="">
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix margintwenty">
                        <div class="col-md-4 ">
                              <label for="date" class="control-label bold uppercase ">Payment Ref Or Txn Id: </label>
                        </div>
                        <div class="col-md-8">
                            <div class="input-group date">
                             <div class="input-group-addon">
                                <i class="fa fa-money"></i>
                            </div>
                                <input  type="text" class="form-control" name="payment_id" id="payment_id" required="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer clearfix">
                    <button type="button" class="btn green-meadow bold uppercase btn-block save" id="save" value="add"><i class="fa fa-send"></i> Confirm</button>
                    <input type="hidden" id="order_id" name="order_id" value="">
                    <input type="hidden" id="status" name="status" value="">
                    <input type="hidden" id="update_type" name="update_type" value="">
                </div>
            </div>
        </div>
    </div>
    </div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#table_order').dataTable();
        
        var date = new Date();
        var today = date.getDate()+'-'+ date.getMonth()+'-'+date.getFullYear();   
        $('#date').val(today);
        $(".createdpicker").datepicker({
            format:'dd-mm-yyyy'
        });
        $('#table_order').on('draw.dt', function () {
            $(".createdpicker").datepicker("setDate",today);
        })

        
        /*Recharge status update*/
        $(document).on('click','.recharge-button',function(){
            $('#order_id').val($(this).val());
            $('#status').val($(this).attr('data-status'));  
            $('#update_type').val('recharge');
            $('#modal_title_label ').text('Update Recharge Status');
            $('.margintwenty').css('display','none');
            $('.save').attr('id','update');

        });

        $(document).on('click','#update',function(){
            var order_id    = $('#order_id').val();
            var status      = $('#status').val();
            var date        = $('#date').val();    
            var update_type = $('#update_type').val();
            if(date==''){
                swal("Error", "Date input field empty!", "warning");
                return false;
            }else {
                updateOrderTable(order_id, status, date, update_type);
            }
            updateOrderTable(order_id, status, date, update_type);
        });

         /*Payment status update*/
          $(document).on('click','.payment-button',function(){
            $('#order_id').val($(this).val());
            $('#update_type').val('payment');
            $('#modal_title_label ').text('Update Manual Payment Status');
            $('.margintwenty').css('display','block');
            $('.save').attr('id','pupdate');
        });

        $(document).on('click','#pupdate',function(){
            var order_id    = $('#order_id').val();
            var status      = $('#payment_id').val();
            var date        = $('#date').val();
            var update_type = $('#update_type').val();
            if(date==''||status==''){
                swal("Error", "Need both input field for update!", "warning");
                return false;
            }else {
                updateOrderTable(order_id, status, date, update_type);
            }

        });

        function updateOrderTable(order_id, status, date, update_type){

            $.ajax({
                    url: '{{route('admin.update.order')}}',
                    type: 'GET',
                    data: { order_id    : order_id, 
                            status      : status,
                            date        : date,
                            update_type : update_type},
                    })
                    .done(function(data) {
                        console.log(data);
                        $('#table_order').load(location.href + ' #table_order > *');
                        $('#rechargeModal').modal('hide');
                        swal("Update", "Recharge Status Update Successfully!", "success");
                    })
                    .fail(function() {
                        console.log("error");
                    })
                    .always(function() {
                        console.log("complete");
                    }); 
        }
    });
</script>

<script>
     $(document).ready(function(){
        $(document).on('click', '#order_delete', function() {
            var delete_id = $(this).val();
            alert(delete_id);
            if(delete_id==''){
               swal('Error','Something Wrong!','error'); 
            }else{
                
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                        type:"POST",
                        url:'{{route('order.delete')}}',
                        data : { delete_id : delete_id},
                        success: function (data) {
                             console.log(data);
                             location.reload();
                             swal('Success','Deleted Successfully','success');
                        },
                        error:function (error) {
                             swal('Error','Something Wrong!','error'); 
                             console.log(error);
                           
                        }
                    });
            }

     });
 });
          
</script>   
@endsection