<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Trips;

class Booking extends Model
{
    protected  $table = "reservations";
    protected $primaryKey = 'reservation_id';
    
    protected $fillable = [
        'reservation_id', 'client_name', 'cid', 'contact_fullname', 'contact_email_address',
        'task_status', 'comment', 'client_type', 'created_at', 'task_status', 'reservation_date',
        'cost', 'credit_type', 'type', 'office', 'contact_name', 'contact_phone_number', 'random_num'
         
    ];
    
    public function trips(){
        return $this->hasMany(Trips::class, 'reservation_id');
    }
}
