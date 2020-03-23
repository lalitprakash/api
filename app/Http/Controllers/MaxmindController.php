<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\MaxmindRequestModel;
use App\Model\MaxmindResponseModel;
use MaxMind\MinFraud;


class MaxmindController extends Controller
{
    //save requesr 
    public function MaxmindRequestSave(Request $request){
    	$site_id   = $request->get('site_id');
    	$site_name = $request->get('site_name');
        $ip_addres = $request->get('ip_address');
		$session_age = $request->get('session_agent');
		$session_id = $request->get('session_id');
		$user_agent = $request->get('user_agent');
		$accept_language = $request->get('accept_language');
		$transaction_id = $request->get('transaction_id');
		$shop_id = $request->get('shop_id');
		$time = $request->get('time');
		$type = $request->get('type');
		$user_id = $request->get('user_id');
		$username_md5 = $request->get('username_md5');
		$email_address = $request->get('email_address');
		$domain = $request->get('domain');
		$first_name = $request->get('first_name');
		$last_name = $request->get('last_name');
		$company = $request->get('company');
		$address = $request->get('address');
		$address_2 = $request->get('address_2');
		$city = $request->get('city');
		$region = $request->get('region');
		$country = $request->get('country');
		$postal = $request->get('postal');
		$phone_number = $request->get('phone_number');
		$phone_country_code = $request->get('phone_country_code');
		$ship_first_name = $request->get('ship_first_name');
		$ship_last_name = $request->get('ship_last_name');
		$ship_company = $request->get('ship_company');
		$ship_address = $request->get('ship_address');
		$ship_address_2 = $request->get('ship_address_2');
		$ship_city = $request->get('ship_city');
		$ship_region = $request->get('ship_region');
		$ship_country = $request->get('ship_country');
		$ship_postal = $request->get('ship_postal');
		$ship_phone_number = $request->get('ship_phone_number');
		$ship_phone_country_code = $request->get('ship_phone_country_code');
		$delivery_speed = $request->get('delivery_speed');
		$processor = $request->get('processor');
		$was_authorized = $request->get('was_authorized');
		$decline_code = $request->get('decline_code');
		$issuer_id_number = $request->get('issuer_id_number');
		$last_4_digits = $request->get('last_4_digits');
		$bank_name = $request->get('bank_name');
		$bank_phone_country_code = $request->get('bank_phone_country_code');
		$bank_phone_number = $request->get('bank_phone_number');
		$avs_result = $request->get('avs_result');
		$cvv_result = $request->get('cvv_result');
		$amount = $request->get('amount');
		$currency = $request->get('currency');
		$discount_code = $request->get('discount_code');
		$is_gift = $request->get('is_gift');
		$has_gift_message = $request->get('has_gift_message');
		$affiliate_id = $request->get('affiliate_id');
		$subaffiliate_id = $request->get('subaffiliate_id');
		$referrer_uri = $request->get('referrer_uri');
		$category = $request->get('category');
		$item_id = $request->get('item_id');
		$quantity = $request->get('quantity');
		$price = $request->get('price');
		$section = $request->get('section');
		$previous_purchases = $request->get('previous_purchases');
		$discount = $request->get('discount');
		$previous_user = $request->get('previous_user');

		if(isset($time)&& !empty($time)){
           $time =str_replace(" ","+",$time);
		}
        if(isset($username_md5)&& !empty($username_md5)){
		$username_md5 = md5($username_md5);
	    }
	//adding request to request Model
    $maxreqdata = MaxmindRequestModel::create($request->all());
   /* return response()->json($maxreqdata,200);

    exit;*/
    //return response()->json('data has been inserted',201);
    $maxreqid  = $maxreqdata->id; 
	//return responsce()->json('testing end',20);
    
	
    //testing the data in to database..

    $maxmind = new MinFraud(14675, 'ABCD5690809907890');
    

    $mxrequest = $maxmind->withDevice([
            'ip_address'  => $ip_addres,
            'session_age' => $session_age,
            'session_id'  => $session_id,
            'user_agent'  => $user_agent,
            'accept_language' => $accept_language,
        ])->withEvent([
            'transaction_id' => $transaction_id,
            'shop_id'        => $shop_id,
            'time'           => $time,
            'type'           => $type,
        ])->withAccount([
            'user_id'      => $user_id,
            'username_md5' => $username_md5,
        ])->withEmail([
            'address' => $email_address,
            'domain'  => $domain,
        ])->withBilling([
            'first_name'         => $first_name,
            'last_name'          => $last_name,
            'company'            => $company,
            'address'            => $address,
            'address_2'          => $address_2,
            'city'               => $city,
            'region'             => $region,
            'country'            => $country,
            'postal'             => $postal,
            'phone_number'       => $phone_number,
            'phone_country_code' => $phone_country_code,
        ])->withShipping([
            'first_name'         => $ship_first_name,
            'last_name'          => $ship_last_name,
            'company'            => $ship_company,
            'address'            => $ship_address,
            'address_2'          => $ship_address_2,
            'city'               => $ship_city,
            'region'             => $ship_region,
            'country'            => $ship_country,
            'postal'             => $ship_postal,
            'phone_number'       => $ship_phone_number,
            'phone_country_code' => $ship_phone_country_code,
            'delivery_speed'     => $delivery_speed,
        ])->withPayment([
            'processor'             => $processor,
            'was_authorized'        => $was_authorized,
            'decline_code'          => $decline_code,
        ])->withCreditCard([
            'issuer_id_number'        => $issuer_id_number,
            'last_4_digits'           => $last_4_digits,
            'bank_name'               => $bank_name,
            'bank_phone_country_code' => $bank_phone_country_code,
            'bank_phone_number'       => $bank_phone_number,
            'avs_result'              => $avs_result,
            'cvv_result'              => $cvv_result,
        ])->withOrder([
            'amount'           => $amount,
            'currency'         => $currency,
            'discount_code'    => $discount_code,
            'is_gift'          => $is_gift,
            'has_gift_message' => $has_gift_message,
            'affiliate_id'     => $affiliate_id,
            'subaffiliate_id'  => $subaffiliate_id,
            'referrer_uri'     => $referrer_uri,
        ])->withShoppingCartItem([
            'category' => $category,
            'item_id'  => $item_id,
            'quantity' => $quantity,
            'price'    => $price,
        ])->withCustomInputs([
            'section'            => $section,
            'previous_purchases' => $previous_purchases,
            'discount'           => $discount,
            'previous_user'      => $previous_user,
        ]);

		$insightsResponse    			= $mxrequest->insights();
		$score               			= $insightsResponse->riskScore;
        $maxmind_id          			= $insightsResponse->id;
        $address_latitude    			= $insightsResponse->billingAddress->latitude;
        $address_longitude   			= $insightsResponse->billingAddress->longitude;
        $distanceToIpLocation           = $insightsResponse->billingAddress->distanceToIpLocation;
        $isInIpCountry                  = $insightsResponse->billingAddress->isInIpCountry;
        $creditCard_issuer_name     	= $insightsResponse->creditCard->issuer->name;
        $issuer_number 					= $insightsResponse->creditCard->issuer->phoneNumber;
        $creditCard_barand              = $insightsResponse->creditCard->brand;
        $creditCard_country             = $insightsResponse->creditCard->country;
        $creditCard_type              	= $insightsResponse->creditCard->type;
        $firstSeen                      = $insightsResponse->email->firstSeen;
        $isDisposable                   = $insightsResponse->email->isDisposable;
        $isFree                         = $insightsResponse->email->isFree;
        $isHighRisk                     = $insightsResponse->shippingAddress->isHighRisk;
        $distanceToBillingAddress       = $insightsResponse->shippingAddress->distanceToBillingAddress;
        $isPostalInCity       			= $insightsResponse->shippingAddress->isPostalInCity;
        $ship_latitude       	    	= $insightsResponse->shippingAddress->latitude;
        $ship_longitude      	    	= $insightsResponse->shippingAddress->longitude;
        $ship_ToIpLocation      	    = $insightsResponse->shippingAddress->distanceToIpLocation;
        $ship_Country                   = $insightsResponse->shippingAddress->isInIpCountry;

		$status = 0;
		if(isset($score)&& !empty($score)){
             $status =1; 
		}else{
			 $status = 0;
		}
        
        $resarray 	= Array(
        'request_id'=> $maxreqid,
        'risk_score' => $score, 
        'status' => $status,
        'maxmind_id' => $maxmind_id,
        'address_latitude' => $address_latitude,
		'address_longitude'=> $address_longitude,
		'distanceToIpLocation'=> $distanceToIpLocation,
		'isInIpCountry'=> $isInIpCountry,
		'creditCard_issuer_name'=> $creditCard_issuer_name, 
		'issuer_number'=> $issuer_number, 
		'creditCard_barand'=> $creditCard_barand,
		'creditCard_country'=> $creditCard_country,
		'creditCard_type' => $creditCard_type,
		'firstSeen' => $firstSeen,
		'isDisposable'=> $isDisposable,
		'isFree'   => $isFree,
	 	'isHighRisk' => $isHighRisk,
		'distanceToBillingAddress' => $distanceToBillingAddress,
		'isPostalInCity' => $isPostalInCity,
		'ship_latitude' => $ship_latitude,
		'ship_longitude' => $ship_longitude,
		'ship_ToIpLocation'=> $ship_ToIpLocation,
		'ship_Country' =>  $ship_Country,
		'record_deleted' => '0',				    					    
		 );


        $resutl=MaxmindResponseModel::create($resarray);
        
		return response()->json($resutl,200);
    }
}
