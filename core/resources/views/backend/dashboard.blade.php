@extends('backend.master')

@section('main-content')

	<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="dashboard-stat blue">
				<div class="visual">
					<i class="fa fa-globe"></i>
				</div>
				<div class="details">
					<div class="number">
						<span data-counter="counterup" data-value="{{App\Operator::groupBy('country_id')->count()}}">0</span>
					</div>
					<div class="desc"> Total Country </div>
				</div>
				<a class="more" href=""> View more
					<i class="m-icon-swapright m-icon-white"></i>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="dashboard-stat red">
				<div class="visual">
					<i class="fa fa-bar-chart-o"></i>
				</div>
				<div class="details">
					<div class="number">
						<span data-counter="counterup" data-value="{{App\Operator::all()->count()}}">0</span> </div>
					<div class="desc">Total Operator</div>
				</div>
				<a class="more" href=""> View more
					<i class="m-icon-swapright m-icon-white"></i>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="dashboard-stat green">
				<div class="visual">
					<i class="fa fa-money"></i>
				</div>
				<div class="details">
					<div class="number">
						<span data-counter="counterup" data-value="{{number_format(App\Order::whereRecharge_status(1)->sum('recharge_amount'),$general_settings->decimal_point)}}">0</span>
					</div>
					<div class="desc"> Total Recharge Balance </div>
				</div>
				<a class="more" href=""> View more
					<i class="m-icon-swapright m-icon-white"></i>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="dashboard-stat purple">
				<div class="visual">
					<i class="fa fa-btc"></i>
				</div>
				<div class="details">
					<div class="number">
						<span data-counter="counterup" data-value="{{number_format(App\Order::where('bit_tx_id','>','0')->sum('btc_amount'),4)}}"></span> </div>
					<div class="desc">Total BTC Balance </div>
				</div>
				<a class="more" href=""> View more
					<i class="m-icon-swapright m-icon-white"></i>
				</a>
			</div>
		</div>
	</div>

    <div class="clearfix"></div>

    <div class="row">
		<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
			<div class="dashboard-stat blue">
				<div class="visual">
					<i class="fa fa-money"></i>
				</div>
				<div class="details">
					<div class="number">
						<span data-counter="counterup" data-value="{{number_format(App\Order::whereRecharge_status(0)->where('bit_tx_id','>','0')->sum('recharge_amount'),$general_settings->decimal_point)}}">0</span>
					</div>
					<div class="desc"> Pending Recharge Balance </div>
				</div>
				<a class="more" href=""> View more
					<i class="m-icon-swapright m-icon-white"></i>
				</a>
			</div>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div class="dashboard-stat red">
				<div class="visual">
					<i class="fa fa-bars"></i>
				</div>
				<div class="details">
					<div class="number">
						<span data-counter="counterup" data-value="{{App\Order::whereRecharge_status(0)->where('bit_tx_id','>','0')->count()}}">0</span> </div>
					<div class="desc">Total Recharge Pending </div>
				</div>
				<a class="more" href=""> View more
					<i class="m-icon-swapright m-icon-white"></i>
				</a>
			</div>
		</div>

		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<div class="dashboard-stat green">
				<div class="visual">
					<i class="fa fa-bars"></i>
				</div>
				<div class="details">
					<div class="number">
						<span id="hour_section" data-counter="counterup" data-value="{{$general_settings->recharge_hour}}">0</span> </div>
					<div class="desc">Recharge Processing Time</div>
				</div>
				<a class="more" href=""> <span id="hour_change" toggle="modal" data-target="#hour_modal">Change to click</span>
					<i class="m-icon-swapright m-icon-white"></i>
				</a>
			</div>
		</div>

	</div>
<div class="row">
    <div class="col-md-12 col-sm-12">
        <!-- BEGIN PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-share font-red-sunglo hide"></i>
                    <span class="caption-subject font-red-sunglo bold uppercase">Revenue</span>
                    <span class="caption-helper">monthly stats...</span>
                </div>
            </div>
            <div class="portlet-body">
                <div id="site_activities_loading">
                    <img src="" alt="loading" /> </div>
                <div id="site_activities_content" class="display-none">
                    <div id="site_activities" style="height: 228px;"> </div>
                </div>
            </div>
        </div>
        <!-- END PORTLET-->
    </div>
    </div>

     <!-- Modal -->
  <div class="modal fade" id="hour_modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Change Recharge Procesing Hour</h4>
        </div>
        <div class="modal-body">
         <div class="form-group" style="margin-bottom: 35px">
         <label for="hour" class="col-lg-4 control-label">Process Hour:</label>
         	<div class="col-lg-8"> 
         		<input type="number" name="hour" class="form-control" id="hour" required="" placeholder="Recharge Processing Hour">
         	</div>	
         </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
           <button type="button" class="btn btn-success" id="update_hour">Update</button>
        </div>
      </div>
      
    </div>
  </div>

<script>
     $(document).ready(function(){
         $(document).on('click', '#hour_change', function(event) {
            event.preventDefault();             
              $('#hour_modal').modal('show');
         });
        $(document).on('click', '#update_hour', function(event) {
            event.preventDefault();
            
            var hour = $('#hour').val();
            if(hour==''){

               swal('Error','The name field is empty!','error'); 
            }else{
                $.ajax({
                        type:"GET",
                        url:'{{route('admin.change.recharg.hour')}}',
                        data : { hour : hour},
                        success: function (data) {
                        	console.log(data);
                            swal('Success','Update Successfully','success');
                            $('#hour_section').text(data);
                            $('#hour').val('');
                            $('#hour_modal').modal('hide');

                        },
                        error:function (error) {
                             var message = JSON.parse(error.responseText);
                             swal('Error',message.errors.hour,'error');
                             console.log(message.errors.hour);
                           
                        }
                    });
            }

     });
 });
          
</script>
@endsection