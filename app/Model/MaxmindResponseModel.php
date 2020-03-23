<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MaxmindResponseModel extends Model
{
    protected $table = 'maxmind_response';
    public    $timestamps = true;
    protected $fillable = ['request_id', 'risk_score', 'status','maxmind_id',
'address_latitude',
'address_longitude',
'distanceToIpLocation', 
'isInIpCountry',
'creditCard_issuer_name',
'issuer_number',
'creditCard_barand',
'creditCard_country',
'creditCard_type',
'firstSeen',
'isDisposable',
'isFree',
'isHighRisk',
'distanceToBillingAddress',
'isPostalInCity',
'ship_latitude',
'ship_longitude',
'ship_ToIpLocation',
'ship_Country',
'record_deleted'
];

    
}
