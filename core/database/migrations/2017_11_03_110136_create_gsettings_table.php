<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGsettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gsettings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('color', 20);
            $table->string('phone', 30);
            $table->string('email');
            $table->string('address');
            $table->string('logo');
            $table->string('icon');
            $table->text('google_map');
            $table->string('base_currency');
            $table->string('base_currency_symbol');
            $table->string('decimal_point');
            $table->tinyInteger('user_can_reg');
            $table->tinyInteger('email_verify');
            $table->tinyInteger('phone_verify');
            $table->tinyInteger('can_withdraw');
            $table->tinyInteger('email_notify');
            $table->tinyInteger('phone_notify');
            $table->tinyInteger('google_recaptcha');
            $table->string('google_site_key');
            $table->string('google_secret_key');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gsettings');
    }
}
