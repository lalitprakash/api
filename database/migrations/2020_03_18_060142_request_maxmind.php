<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RequestMaxmind extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        $date = new DateTime();
        $unixTimeStamp = $date->getTimestamp();

        //create request table.
         Schema::connection('mysql')->create('maxmind_request', function (Blueprint $table) {
            $table->increments('id', true)->unsigned();
            $table->string('site_id',255)->nullable();
            $table->string('site_name',255)->nullable();
            $table->string('ip_address',255)->nullable();
            $table->string('session_agent',255)->nullable();
            $table->string('session_id',255)->nullable();
            $table->string('user_agent',255)->nullable();
            $table->string('accept_language',255)->nullable();
            $table->string('transaction_id',255)->nullable();
            $table->string('shop_id',255)->nullable();
            $table->string('time',255)->nullable();
            $table->string('type',255)->nullable();
            $table->string('user_id',255)->nullable();
            $table->string('username_md5',255)->nullable();
            $table->string('email_address',255)->nullable();
            $table->string('domain',255)->nullable();
            $table->string('first_name',255)->nullable();
            $table->string('last_name',255)->nullable();
            $table->string('company',255)->nullable();
            $table->string('address',255)->nullable();
            $table->string('address_2',255)->nullable();
            $table->string('city',255)->nullable();
            $table->string('region',255)->nullable();
            $table->string('country',255)->nullable();
            $table->string('postal',255)->nullable();
            $table->string('phone_number',255)->nullable();
            $table->string('phone_country_code',255)->nullable();
            $table->string('ship_first_name',255)->nullable();
            $table->string('ship_last_name',255)->nullable();
            $table->string('ship_company',255)->nullable();
            $table->string('ship_address',255)->nullable();
            $table->string('ship_address_2',255)->nullable();
            $table->string('ship_city',255)->nullable();
            $table->string('ship_region',255)->nullable();
            $table->string('ship_country',255)->nullable();
            $table->string('ship_postal',255)->nullable();
            $table->string('ship_phone_number',255)->nullable();
            $table->string('ship_phone_country_code',255)->nullable();
            $table->string('delivery_speed',255)->nullable();
            $table->string('processor',255)->nullable();
            $table->string('was_authorized',255)->nullable();
            $table->string('decline_code',255)->nullable();
            $table->string('issuer_id_number',255)->nullable();
            $table->string('last_4_digits',255)->nullable();
            $table->string('bank_name',255)->nullable();
            $table->string('bank_phone_country_code',255)->nullable();
            $table->string('bank_phone_number',255)->nullable();
            $table->string('avs_result',255)->nullable();
            $table->string('cvv_result',255)->nullable();
            $table->string('amount',255)->nullable();
            $table->string('currency',255)->nullable();
            $table->string('discount_code',255)->nullable();
            $table->string('is_gift',255)->nullable();
            $table->string('has_gift_message',255)->nullable();
            $table->string('affiliate_id',255)->nullable();
            $table->string('subaffiliate_id',255)->nullable();
            $table->string('referrer_uri',255)->nullable();
            $table->string('category',255)->nullable();
            $table->string('item_id',255)->nullable();
            $table->string('quantity',255)->nullable();
            $table->string('price',255)->nullable();
            $table->string('section',255)->nullable();
            $table->string('previous_purchases',255)->nullable();
            $table->boolean('record_deleted')->default(0);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        //create response table.
        Schema::connection('mysql')->create('maxmind_response', function (Blueprint $table) {
            $table->increments('id', true)->unsigned();
            $table->integer('request_id')->unsigned();
            $table->string('risk_score',255);
            $table->string('status',255)->default(0);
            $table->boolean('record_deleted')->default(0);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::connection('mysql')->table('maxmind_response', function (Blueprint $table) {
            $table->foreign('request_id')->references('id')->on('maxmind_request');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::connection('mysql')->drop('maxmind_request');
    }
}
