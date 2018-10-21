<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
       protected $table    = 'countries';

       protected $fillable = [
        						'country_name',
        						'country_code',
        						'currency_name',
        						'dial_code',
        						'currency_symbol',
        						'currency_code',
        						'exchange_rate',
        						'status_id'
        					];

}
