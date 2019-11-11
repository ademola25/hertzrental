<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Booking;

class Trips extends Model
{
    protected  $table = "trips";
      
    public function reservations(){
        return $this->belongsTo(Booking::class);
    }
    
   
}
