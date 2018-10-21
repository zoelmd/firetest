<?php

namespace App\Http\Controllers;

use App\Gateway;
use App\Order;
use App\Country;
use Illuminate\Http\Request;
use App\Lib\coinPayments;
use Session;


class PaymentController extends Controller
{
    public function payNow(Request $request){


        //return $request;
        $track = Session::get('Track');

        $data = Order::whereId($track)->orderBy('id', 'DESC')->first();

        if($data->bit_tx_id!=0)
        {
            // Error Message // Redirect
            return redirect()->route('home')->with('alert', 'An Error Occurd!');;
            exit();
        }

        if($request->gateway_id==2){
            
            $this->validate($request,
                [
                    'btc_amount' => 'required',
                ]);

            if ($request->btc_amount <= 0) 
            {
                return redirect()->route('deposit')->with('alert', 'Invalid Amount');
            }
            else
            {
                $method = Gateway::find(2);
            // You need to set a callback URL if you want the IPN to work
                $callbackUrl = route('ipn.coinPay');

            // Create an instance of the class
                $CP = new coinPayments();

            // Set the merchant ID and secret key (can be found in account settings on CoinPayments.net)
                $CP->setMerchantId($method->val1);
                $CP->setSecretKey($method->val2);

               $senddata['page_title']  =  'CoinPyment Confirm';
               $senddata['bcoin']  =  $data->btc_amount;
               $senddata['amon']   =  $data->recharge_amount;
               $senddata['currency_text']   =  Country::find($data->country_id)->currency_code;
               $senddata['form']   = $CP->createPayment('Deposit BTC Coin', 'btc',  $data->btc_amount, $track, $callbackUrl);


               return view('recharge.btccoinconfirm', $senddata);
            }

        }elseif($request->gateway_id==1){
            
            $gatewayData = Gateway::find(1);
            
            //Bitcoin
            if($data->bcid==0)
            {
              //   $blockchain_receive_root = "https://api.blockchain.info/";
              //   $mysite_root = url('/');
              //   $secret = "ABIR";
              //   $my_xpub = $gatewayData->val2;
              //   $my_api_key = $gatewayData->val1;
              //   $invoice_id = $track;
              //   $callback_url = $mysite_root . "/ipnbtc?invoice_id=" . $invoice_id . "&secret=" . $secret;

              //   $resp = @file_get_contents($blockchain_receive_root . "v2/receive?key=" . $my_api_key . "&callback=" . urlencode($callback_url) . "&xpub=" . $my_xpub);
              //   if (!$resp) {
              //       //BITCOIN API HAVING ISSUE. PLEASE TRY LATER
              //       return redirect()->route('index');
              //       exit;
              //   }

              //   $response = json_decode($resp);
             //$sendto = $response->address;
                 $sendto = "1HoPiJqnHoqwM8NthJu86hhADR5oWN8qG7";
            
                 
                           

             

                //$bcamo = file_get_contents("https://blockchain.info/tobtc?currency=USD&value=$data->inusd");
                $data['bcid'] = $sendto;
                //$data['bcam'] = $data->btc_amount;
                $data->save();
            }
            /////UPDATE THE SEND TO ID

            $bitcoin['amount'] = $data->btc_amount;
            $bitcoin['sendto'] = $data->bcid;

            $var = "bitcoin:$data->bcid?amount=$data->btc_amount";
            $bitcoin['code'] =  "<img src=\"https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=$var&choe=UTF-8\" title='' style='width:300px;' />";

            return view('recharge.lastconfirmation', compact('bitcoin'));

            return redirect()->route('home')->with('alert', 'Sorry!');
        }else{

        }



    }

    public function ipnbtc(Request $request){

        $track = $_GET['invoice_id'];
        $secret = $_GET['secret'];
        $address = $_GET['address'];
        $value = $_GET['value'];
        $confirmations = $_GET['confirmations'];
        $value_in_btc = $_GET['value'] / 100000000;

        $trx_hash = $_GET['transaction_hash'];

        $order = Order::where('trxid',$track)->orderBy('id', 'DESC')->first();


        if ($order->bit_tx_id==0) {

            if ($order->btc_amount==$value_in_btc && $secret=="ABIR" && $confirmations>2){

                Order::whereId($track)->update([
                        'bit_tx_id'=>  '1'
                ]);
               

            }

        }

    }

        public function btcCoinIPN(Request $request){

        $track = $request->custom;
        $status = $request->status;
        $amount1 =$request->amount2;
        $currency1 = $request->currency1;

         $data = Order::where('trxid',$track)->orderBy('id', 'DESC')->first();


         if ($currency1 == "btc" && $amount2 >= $data->btc_amount && $data->status == '0') {

            if ($status>=100 || $status==2) {
                
                rder::whereId($track)->update([
                        'bit_tx_id'=>  '1'
                ]);
             
                

            }

        }



    }


}
