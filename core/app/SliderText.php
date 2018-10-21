<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SliderText extends Model
{
    protected $table = 'slider_text';
	
	protected $fillable = ['text_1','text_2'];
}
