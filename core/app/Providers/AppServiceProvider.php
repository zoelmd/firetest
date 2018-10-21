<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\GeneralSetting;
use View;
use App\Log;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $general_settings = GeneralSetting::getDefaults();
        
        if (Schema::hasTable('gsettings')) {
            $general_settings = GeneralSetting::orderBy('id', 'DESC')->first();

            if (!$general_settings) {
                $general_settings = GeneralSetting::create(GeneralSetting::getDefaults());
            }
            View::share([
                'general_settings' => $general_settings
            ]);
        }

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
