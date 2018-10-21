@extends('backend.master')
@section('main-content')
    <div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-body">
                <table class="table" id="table_transitons">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>OrderNo</th>
                        <th>Country</th>
                        <th>Operator</th>
                        <th>Number</th>
                        <th>Status</th>
                        <th>Txnid</th>
                        <th>Btc Amount</th>
                        <th>Balance</th>
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
                            <td>
                                <div class="btn-group" data-toggle="buttons">
                                    @if($order->bit_tx_id == 0)
                                        <button type="button" class="btn btn-sm btn-success button-small payment-button" data-toggle="modal" data-target="#rechargeModal" id="recharge-button" data-status="{{$order->bit_tx_id}}" value="{{$order->id}}"> <i class="fa fa-pencil-square-o"></i></button>
                                        <button type="submit" class="btn btn-sm btn-warning button-small"> <i class="fa fa-spinner"></i>  Pending</button>
                                    @else
                                        <button type="submit" class="btn btn-sm green button-small block" style="width:60px; background-color:green"><i class="fa fa-check-square-o"></i> Paid</button>
                                    @endif
                                </div>
                            </td>
                            <td>{{$order->bit_tx_id}}</td>
                            <td>{{number_format($order->btc_amount,8)}} <i class="fa fa-btc"></i></td>
                            <td class="text-success bold">
                            @php $payment = App\Order::where('bit_tx_id','>',0)->where('id', '<=' ,$order->id)->get()->sum(['btc_amount']) @endphp
                              {{number_format($payment,8)}} <i class="fa fa-btc"></i>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#table_transitons').dataTable();
        });
    </script>
@endsection