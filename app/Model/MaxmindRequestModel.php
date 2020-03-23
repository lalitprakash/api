<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MaxmindRequestModel extends Model
{
    protected $table = 'maxmind_request';
    public $timestamps = true;
    protected $fillable = ['site_id','site_name','ip_address','session_agent','session_id','user_agent','accept_language','transaction_id','shop_id','time','type','user_id','username_md5','email_address','domain','first_name','last_name','company','address','address_2','city','region','country','postal','phone_number','phone_country_code','ship_first_name','ship_last_name','ship_company','ship_address','ship_address_2','ship_city','ship_region','ship_country','ship_postal','ship_phone_number','ship_phone_country_code','delivery_speed','processor','was_authorized','decline_code','issuer_id_number','last_4_digits','bank_name','bank_phone_country_code','bank_phone_number','avs_result','cvv_result','amount','currency','discount_code','is_gift','has_gift_message','affiliate_id','subaffiliate_id','referrer_uri','category','item_id','quantity','price','section','previous_purchases','record_deleted','created_at','updated_at'];

    //use gard as blank which make all field as fillable.

  
}
