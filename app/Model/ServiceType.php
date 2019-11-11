<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
     protected  $table = "service_types";
    
     protected $fillable = [
        'service_id', 'service_type_name', 'reservation', 'reservation_name', 'service_type_description',
        'asset_type'
    ];
}
