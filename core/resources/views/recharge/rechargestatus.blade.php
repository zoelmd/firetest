@extends('layouts.frontmaster')
@section('content')
    <div class="main-body">
    <section class="ads-category">
        <!--Start container-->
        <div class="container">
    <div class="recharge-status-title">
        <h3 class="text-center recharge-status-title">Recharge Status Checking</h3>
    </div>
    <div class="clearfix"></div>
    <div class="row center-margin-div">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-3">
                    <input type="text" class="form-control" id="search_order_id" placeholder=" Order id Number">
                </div>
                <div class="col-md-3">
                    <button class="btn btn-success btn-block" id="search">Search</button>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
    <div class="container-request" >
        <div class="col-md-6">
            <div class="content">
                <div class="row justify-content-md-center checking-recharge-status-min">
                    <div class="col-md-12  checking-recharge-status" style="display: none">
                        <div class="request-number">
                            <div class="operator-logo">
                                <img alt="Top up Airtel with Bitcoin" class="img-responsive recharge-img" src="" sizes="180px" width="200" height="40" srcset="">
                            </div>
                            <h2 class="text-center">Refill : <span class="cell_number"></span></h2>
                            <input name="cell_number" type="hidden" value="">
                            <h5 class="text-center"><span id="operator_name"></span></h5>
                        </div>
                        <div class="order-details">
                            <h3>Your order</h3>
                            <h4 notranslate=""><span class="operator_name"></span> <span class="country_name"></span> <span class="recharge_amount"> </span> <span class="currency_code"></span></h4>
                            <dl class="order-summary">
                                <dt>Phone number</dt>
                                <dd><var class="phone_number_ltr"> <span class="cell_number"></span></var> </dd>

                                <dt>E-mail address </dt>
                                <dd><var> <span id="customer_email"></span></var></dd>

                                <dt>Order ID </dt>
                                <dd><var><span id="order_id"></span></var></dd>

                                <dt>Price</dt>
                                <dd><var><span id="btc_amount"></span></var> BTC</dd>
                            </dl>
                            <div class="pay_re_status">
                                <div class="row">
                                    <div class="col-md-6 pay_status"></div>
                                    <div class="col-md-6 recharge_status"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 checking-recharge-status-error" style="display: none">
                        <div class="order-details-a">
                            <div class="notice verify-info-banner">
                                <div class="notice-icon-a"> <i class="fa fa-exclamation-triangle "></i> </div>
                                <div class="notice-text"> <h4> <strong>Error</strong> Status Not Found</h4> </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
        </div>
    </section>
    </div>
    <script>
        $(document).ready(function () {
            $(document).on('click', '#search', function() {
                var order_id = $('#search_order_id').val();
                $('.pay_status').empty();
                $('.recharge_status').empty();
                if(order_id==''){
                    $('.checking-recharge-status').css('display','none');
                    swal('Error','Order id field is empty!');
                    $('.checking-recharge-status-error').css('display','block');
                    return false;
                }else{
                    $.ajax({
                        type:"GET",
                        url:'{{route('order.checking.ajax')}}',
                        data : { order_id : order_id},
                        success: function (data) {
                            console.log(data);
                            if(data==0){
                                swal('Error','Invalid Order id!');
                                $('.checking-recharge-status').css('display','none');
                                $('.checking-recharge-status-error').css('display','block');
                            }else{
                                $('.cell_number').text(data.cell_number);
                                $('.operator_name').text(data.operator.operator_name);
                                $('.country_name').text(data.country.country_name);
                                $('.recharge_amount').text(data.recharge_amount);
                                $('.currency_code').text(data.country.currency_code);
                                $('#customer_email').text(data.customer_email);
                                $('#order_id').text(data.order_id);
                                $('#btc_amount').text(data.btc_amount);
                                var imgUrl = "{{url('/assets/images/operatorlogo')}}";
                                $('.recharge-img').attr('src',imgUrl.concat('/'.concat(data.operator.operator_logo)));
                                if(data.recharge_status==0){
                                    var input = $('<button class="btn btn-warning btn-block">On Process</button>');
                                }else {
                                    var input = $('<button class="btn btn-success btn-block">Complete</button>');
                                }
                                input.appendTo('.recharge_status');
                                if(data.bit_tx_id==0){
                                    var input = $('<button class="btn btn-danger btn-block">Due</button>');
                                }else {
                                    var input = $('<button class="btn btn-success btn-block">Complete</button>');
                                }
                                input.appendTo('.pay_status');
                                $('.checking-recharge-status').css('display','block');
                                $('.checking-recharge-status-error').css('display','none');
                            }


                        },
                        error:function () {

                        }
                    });
                }

            });
        });
    </script>
@endsection
