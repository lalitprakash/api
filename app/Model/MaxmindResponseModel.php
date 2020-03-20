<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MaxmindResponseModel extends Model
{
    protected $table = 'maxmind_response';
    public    $timestamps = true;
    protected $fillable = ['request_id', 'risk_score', 'status','reco_delted'];

    
}
