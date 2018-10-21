<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Country;

class Operator extends Model
{
    protected $table    = 'operators';

    protected $fillable = [
        						'operator_name',
        						'operator_logo',
        						'country_id',
        						'operator_code',
        						'min_recharge',
        						'min_recharge',
        						'max_recharge',
        						'status_id'
        					];

    public function country(){

    	return $this->hasOne(Country::class,'id','country_id');
    }
}
