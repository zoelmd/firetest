@extends('layouts.frontmaster')

@section('content')
<div class="main-body admin-two dashboard" style="padding-top:180px;">
     <div class="container-request">
		 <div class="content_padding">
	    	<div class="container user-dashboard-body">  
				<div class="row">
					<div class="col-md-12">
						
						<div class="panel panel-primary" style="border: none; border-radius: 0">
							
							<div class="panel-heading" style="border-radius: 0">
								<h3 class="panel-title text-uppercase"><b>Confirm Payment by Coin </b></h3>
							</div>
							
							<div class="panel-body" style="padding: 30px 0 ;">
								<div  class="col-md-8 col-md-offset-2 text-center" style="background-color: #F3F3F3; border: 1px solid #e3e3e4;" >
									<h1></i>{{$amon}}<span style="font-size:20px;font-weight: 700px;">{{$currency_text}}</span>  
									<i class="fa fa-exchange"></i> </i>{{ $bcoin }}<span style="font-size:20px;font-weight: 700px;">BTC</span></h1>
									<b style="color: red; margin-top: 15px;"> Minimum 3 Confirmation Required to Credited Your Account.<br/>(It May Take Upto 2 to 24 Hours)</b>
									<br/>
									<p style="margin-top: 15px;">{!! $form !!}</p>
								</div>
							</div>

						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection