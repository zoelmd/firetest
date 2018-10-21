@extends('layouts.frontmaster')

@section('content')
        <div class="main-body" style="padding-top:220px; padding-bottom:100px;">
        <div class="container-request">
            <div class="col-md-6">
                <div class="content">
                    <div class="row">
                          <div class="center-position" style="margin:0 auto;">
                          <div class="col-md-12 text-center" style="max-width:600px">
                               <div class="request-number">
                                  <div class="operator-logo">
                                      <img alt="Top up Airtel with Bitcoin" class="img-responsive" src="{{$operator_url}}" sizes="180px" width="200" height="40" srcset="">
                                    </div>
                                  <h2 class="text-center">Refill : {{$cell_number}}</h2>
                                   <input name="cell_number" type="hidden" value="{{$cell_number}}">
                                  <h5 class="text-center">{{$operator_name}}</h5>
                               </div>
                               <div class="order-details">
                                    <h3>Your order</h3>
                                    <h4 notranslate="">{{$operator_name}} {{$country_name}} {{$recharge_amount}} {{$currency_code}}</h4>
                                    <dl class="order-summary" style="text-align:left">
                                        <dt>Phone number</dt>
                                        <dd><var class="phone_number_ltr">{{$cell_number}}</var> </dd>

                                        <dt>E-mail address </dt>
                                        <dd><var>{{$customer_email}}</var></dd>

                                        <dt>Order ID </dt>
                                        <dd><var>{{$order_id}}</var></dd>

                                        <dt>Price</dt>
                                        <dd><var>{{$btc_amount}}</var> BTC</dd>
                                    </dl>
                                        <div class="notice verify-info-banner">
                                           <div class="notice-icon"> <i class="fa fa-exclamation-triangle "></i> </div>
                                           <div class="notice-text"> <strong>Please doublecheck</strong> your phone number, if the top up is sent to the wrong number we'll be unable to give you a refund.</div>
                                        </div>
                                        <div class="payment-account-banner">
                                            <p>As soon as the transaction is confirmed (normally this takes ~10 minutes), the topup amount will be credited to your phone.</p>
                                        </div>
                                    </div>
                                <div class="operator-page-button-group-bg" style="padding: 8px 12px 20px 12px">
                                    <div class="row">
                                      <div class="col-md-6">
                                                                             
                                          <form action="{{route('payment.now')}}" method="POST" id="form_id">
                                            {{ csrf_field() }}
                                            <input name="btc_amount" type="hidden" value="{{$btc_amount}}">
                                            <input type="hidden" name="gateway_id" value="1">
                                            <button class="btn btn-warning confirm-pay pay-with-bitpay btn-block" type="submit"><i class="fa fa-btc" id="chain"></i> <b> Blockchain Payment</b></button>
                                        </form>

                                   
                                      </div>
                                      <div class="col-md-6">
                                        <form action="{{route('payment.now')}}" method="POST" id="form_id">
                                            {{ csrf_field() }}
                                            <input name="btc_amount" type="hidden" value="{{$btc_amount}}">
                                            <input type="hidden" name="gateway_id" value="2">
                                            <button class="btn confirm-pay pay-with-bitpay btn-block" style="background-color: #0084FF;  color: #fff" type="submit"><i class="fa fa-btc" id="coin"></i> <b> Coin Payment</b></button>
                                        </form>
                               
                                      </div>
                                    </div>


                                </div>
                          </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
         </div>
<!--End Recharge Section-->
@endsection


