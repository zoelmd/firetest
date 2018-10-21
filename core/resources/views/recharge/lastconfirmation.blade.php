@extends('layouts.frontmaster')

@section('content')
    <section class="admin-two dashboard" style="padding-top:100px;" style="color: #F7F7F7">
        <!--Start Container-->
        <div class="container">
            <!--Start Admin Wrap-->
            <div class="admin-two-wrap">
                <!--Start Admin Wrap Row-->
                <div class="row">
                    <!--Start Admin Menu Col-->
                <!--Start Admin Content Col-->
                    <div class="col-md-12">
                        <!--Start Admin Content-->
                        <div class="admin-two-cont">
                            <!--Start Dashboard-->
                            <div class="admin-dashboard">
                                <div class="panel panel-primary" style="border: none; border-radius: 0">
                            <div class="panel-heading" style="border-radius: 0">
                                <h3 class="panel-title text-uppercase"><b>Confirm Payment by BTC Blockchain </b></h3>
                            </div>
                            <div class="panel-body">
                                <div class="row" style="padding: 15px;">
                                    <!--Start Visitors Country-->
                                    <div class="col-md-8 col-md-offset-2" style="background-color: #F3F3F3; border: 1px solid #e3e3e4;">
                                        <h2 class="text-center">SCAN TO SEND</h2>
                                        <div class="row">
                                            <div class="col-md-4" >
                                                <div class="btc-barcode" style="display: block; margin-top: 0 auto">
                                             {!!  $bitcoin['code']  !!}
                                            </div>
                                            </div>
                                                <div class="col-md-8" style="margin-top: 30px;">
                                                <h5> Please send exactly <span style="color:red">{{ $bitcoin['amount']}} </span>BTC: </h5>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" readonly="" value="{{ $bitcoin['sendto']}}" id="rurl" style="font-size: 15px;">  
                                                    <span class="input-group-addon" style="cursor: pointer; padding: 0px 10px" id="cbtn"><i class="fa fa-files-o"></i> Copy</span></div>
                                                    <br>
                                               
                                                     <a class="btn btn-sccess btn-block" target="_blank" href="https://blockchain.info/address/{{ $bitcoin['sendto']}}" style="background-color: green; color: #fff; text-decoration: none;"> Go to BTC Blockchain</a> 
                                                </div>  
                                        </div>
                                        <h3 style="color: red;" class="text-center">** 3 Confirmation Required To credited Your Account</h3>

                                    </div>
                                    <!--End Dashboard-->

                                </div>


                                </div>
                                <!--End Admin Content Col-->
                            </div>
                            <!--End Admin Wrap-->
                        </div>
                    </div>
    </section>

<script type="text/javascript">
 document.getElementById("cbtn").onclick = function()
 {
   document.getElementById('rurl').select();
   document.execCommand('copy');
 }
</script>    
@endsection