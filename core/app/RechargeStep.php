<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RechargeStep extends Model
{
     protected $table    = 'recharge_steps';
     
     protected $fillable = ['name','order','content','icon','status'];

    public function setStatusAttribute($val)
    
    {
        $this->attributes['status'] = $val == 'on' ? 0 : 1;
    }
}
