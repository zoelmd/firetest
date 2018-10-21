<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    protected $table    = 'gsettings';
    protected $fillable = [
        'title', 'color', 'logo','icon','google_map', 'start_date', 'base_currency', 'base_currency_symbol',
        'decimal_point','vedio_link'
    ];

    public function setUserCanRegAttribute($val)
    {
        $this->attributes['user_can_reg'] = $val == 'on' ? 1 : 0;
    }

    public function setEmailVerifyAttribute($val)
    {
        $this->attributes['email_verify'] = $val == 'on' ? 1 : 0;
    }

    public function setCanWithdrawAttribute($val)
    {
        $this->attributes['can_withdraw'] = $val == 'on' ? 1 : 0;
    }

    public function setEmailNotifyAttribute($val)
    {
        $this->attributes['email_notify'] = $val == 'on' ? 1 : 0;
    }

    public function setPhoneNotifyAttribute($val)
    {
        $this->attributes['phone_notify'] = $val == 'on' ? 1 : 0;
    }

    public function setPhoneVerifyAttribute($val)
    {
        $this->attributes['phone_verify'] = $val == 'on' ? 1 : 0;
    }

    public function setGoogleRecaptchaAttribute($val)
    {
        $this->attributes['google_recaptcha'] = $val == 'on' ? 1 : 0;
    }

    public static function getDefaults()
    {
        return [
            'title'   => 'The SoftKing',
            'color'   => '#2ecc71',
            'google_map' => 'google map code',
            'logo' => 'logo.jpg',
            'icon' => 'icon.png',
            'base_currency' => 'BDT',
            'base_currency_symbol' => 'Tk',
            'decimal_point' => 2
        ];
    }
}

