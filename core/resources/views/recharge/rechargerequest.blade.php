@extends('layouts.frontmaster')
@section('content')
    <div class="main-body">
        <section class="ads-category">
            <!--Start container-->
            <div class="container">
        <div class="container-request">
            <div class="col-md-6">
            <div class="content">
                <div class="row justify-content-md-center">
                      <div class="col-md-12">
                          <form action="{{route('confirm.payment')}}" method="POST"  novalidate>
                              {{ csrf_field() }}
                              <div class="request-number">
                              <div class="operator-logo">
                                  <img alt="Top up Airtel with Bitcoin" class="img-responsive" src="{{url('/assets/images/operatorlogo/')}}/{{$operator->operator_logo}}" sizes="180px" width="200" height="40" srcset="">
                                </div>
                                <input name="operator_url" type="hidden" value="{{url('/assets/images/operatorlogo/')}}/{{$operator->operator_logo}}">
                                <input name="operator_name" type="hidden" value="{{$operator->operator_name}}">
                              <h2 class="text-center">Refill : +{{$country->dial_code}} {{$cell_number}}</h2>
                               <input name="cell_number" type="hidden" value="+{{$country->dial_code}} {{$cell_number}}">
                              <h5 class="text-center">{{$operator->operator_name}}</h5>
                                  <input name="operator_id" type="hidden" value="{{$operator->id}}">
                           
                           </div>
                           <div class="recharge-amonut">
                              <div class="row justify-content-md-center">
                                   <div class="col-md-12 width-manage">
                                      <h5 class="text-center"> enter a recharge amount </h5>
                                       <div class="input-group custom-amount-input">
                                            <span class="input-group-addon"><span class="input-text">{{$country->currency_code}}</span></span>
                                              <input type="number" name="recharge_amount" min="10" max="1000" step="5" id="selected_amount" class="input-md form-control" placeholder="e.g. 200" required>
                                            <div class="btc-price btc-price-visible">
                                                  <p>you pay <var class="btc-price-text"><strong id="custom_amount_cost">0.000000</strong> BTC</var></p>
                                                    <input name="btc_amount" id="btc_amount" type="hidden" value="0">
                                           </div>
                                        </div>
                                            <span class="recharge-limit" style="display: none"> Please choose an amount between
                                               <var><strong>{{$operator->min_recharge}} {{$country->currency_code}}</strong>
                                               </var> and <var><strong> {{$operator->max_recharge}} <span id="currency_code">{{$country->currency_code}}</span></strong></var>.
                                           </span>
                                        <p id="range-input-hint" class="input-hint">
                                            Min: <var><strong>
                                                    <span id="min_limit">{{$operator->min_recharge}}</span> {{$country->currency_code}}
                                                </strong></var>,
                                            max: <var><strong> <span id="max_limit">{{$operator->max_recharge}}</span> {{$country->currency_code}}</strong></var>
                                        </p>
                                        <p class="input-hint">
                                             Refills in {{$country->country_name}} often have delays of up to {{$general_settings->recharge_hour}} hours
                                        </p>
                                        <input type="hidden" name="country_name" value="{{$country->country_name}}">
                                         <input type="hidden" name="country_id" value="{{$country->id}}">
                                          <input type="hidden" name="currency_code" value="{{$country->currency_code}}">

                                    <div class="pricelist_wrapper custom-amount-input">
                                        <h3>Your email</h3>
                                        <div class="input-group custom-amount-input">
                                            <span class="input-group-addon"><span class="input-text">email</span></span>
                                              <input type="email" name="customer_email" id="customer_email" class="input-md form-control" placeholder=" e.g. example@example.com" required>

                                        </div>
                                        <p class="input-hint-email">The email is used to send you status updates about your order</p>
                                    </div>
                                   </div>
                              </div>
                           </div>

                           <div class="operator-confirmation">
                              <h3>Confirm Order Details</h3>
                              <label for="form_number_verified">
                              <span class="operator-confirmation-check">
                              <input type="checkbox" id="form_number_verified">
                              <span class="operator-confirmation-check-marker"></span>
                              </span>
                              <span class="operator-confirmation-check-label">
                              I want to send a <var id="operator-confirmation-amount"> <span id="confirm_amount">0</span> {{$country->currency_code}}</var> refill for <var><strong>{{$operator->operator_name}} {{$country->country_name}}</strong></var>
                                to the number <var><strong id="formatted_number">+{{$operator->operator_code}} {{$cell_number}}</strong></var>. <a href="{{url('')}}">Change number or operator?</a>
                              </span>
                              </label>
                           </div>
                          <div class="operator-page-button-group-bg">
                              <div class="operator-page-button-group">
                                    <button id="confirm_payment" class="btn btn-success confirm-pay pay-with-bitpay btn-block" type="submit"><i class="fa fa-btc" ></i>  To payment</button>
                              </div>
                          </div>
                          </form>
                      </div>
                </div>
            </div>
      </div>
            </div>
            </div>
        </section>
    </div>
<!--End Rechare Section-->
<script>
     $(document).ready(function(){
         var min_limit = $('#min_limit').text()*1;
         var max_limit = $('#max_limit').text()*1;
         var currency_code = $('#currency_code').text();
         $(document).on('keypress, keyup', '#selected_amount', function() {
            var amount = $('#selected_amount').val();
            var exchange_rate = '{{$country->exchange_rate}}'*1;
              console.log(exchange_rate);
            if(amount<0){
                return false;
            }else if(amount==''){
                $('.recharge-limit').css('display','none');
                $('#confirm_amount').text(0);
                 $('#custom_amount_cost').text(0);
                return false;
            }
            else if(amount<min_limit||amount>max_limit){
                $('.recharge-limit').css('display','block')
            }else{
                $('.recharge-limit').css('display','none');
                $('#confirm_amount').text(amount);
                $.ajax({
                        type:"GET",
                        url:'{{route('btc.rate')}}',
                        data : { amount : amount, exchange_rate : exchange_rate },
                        success: function (data) {
                            
                            $('#custom_amount_cost').text(data.display_btc_rate);
                            $('#btc_amount').val(data.display_btc_rate);
                        },
                        error:function (error) {
                             var message = JSON.parse(error.responseText);

                             console.log(message.errors);
                           
                        }
                    });
            }

     });

         $(document).on('click','#confirm_payment',function () {
             var amount = $('#selected_amount').val();
             var customer_email = $('#customer_email').val();
             var checkedValue = $('#form_number_verified:checked').val();
             if(amount==''){
                 swal('Error','Recharge amount field is empty!','error');
                 return false;
             }else if(amount<0){
                 swal('Error','Please enter positive number!','error');
                 return false;
             }else if(!$.isNumeric(amount)){
                 swal('Error','Please enter numaric value!','error');
                 return false;
             }else if(amount<min_limit||amount>max_limit){
                 swal('Error','Recharge amount out of limit (Min:'+min_limit+''+currency_code+' & Max: '+max_limit+''+currency_code+')!','error');
                 return false;
             }else if(customer_email==''){
                 swal('Error','Email field is empty!','error');
                 return false;
             }else if(!isEmail(customer_email)){
                 swal('Error','Please enter valid email address!','error');
                 return false;
             }else if(checkedValue==null){
                 swal('Error','Please agree with our T&C to click check!','error');
                 return false;
             }
             else{
                 return true;
             }
         });

         function isEmail(email) {
             var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
             return regex.test(email);
         }
 });
</script>
@endsection


