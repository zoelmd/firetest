<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    	protected $table    = 'contacts';

       	protected $fillable = [
        						'about',
        						'cell_number',
        						'email',
        						'address'
        					];
       	public static function getDefaults()
    {
        return [
            'about'  		 => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum.',
            'cell_number'    => '+88-01716-44-17-00',
            'email'  		 => 'support@thesoftking.com',
            'address' 		 => '11/3 Garden Street, Ring Road, Shyamoli, Dhaka 1207, Bangladesh'
        ];
    }
}
