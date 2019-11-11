<?php

namespace App\Http\Resources\Booking;

//use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Resources\Json\Resource;
use App\Model\Trips;

class BookingCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       // return parent::toArray($request);
        return [
            'reservation_id' => $this->reservation_id,
            'client_name' => $this->client_name,
            'cid' => $this->cid,
            'contact_fullname' => $this->contact_fullname,
            'contact_email_address' => $this->contact_email_address,
            'contact_phone_number' => $this->contact_phone_number,
            'task_status' => $this->task_status,
            'comment' => $this->comment,
            'client_type' => $this->client_type,
            'created_at' => $this->created_at,
            'cost' => $this->cost,
            'credit_type' => $this->credit_type,
            'type' => $this->type,
            'href' => ['trips' => route('trips.index', $this->reservation_id)],
            'trip_count' => $this->trips->count() > 0 ? round($this->trips->count()) : 'No Trips',
            

        ];
    }
}
