<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table    = 'orders';

    protected $fillable = [
        'country_id',
        'operator_id',
        'order_id',
        'cell_number',
        'customer_email',
        'recharge_amount',
        'btc_amount',
        'recharge_status',
        'bit_tx_id'
    ];

    public function operator(){

        return $this->hasOne(Operator::class,'id','operator_id');
    }
    public function country(){

        return $this->hasOne(Country::class,'id','country_id');
    }
}
