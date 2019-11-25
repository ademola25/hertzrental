<?php

namespace App\Http\Resources\Trip;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TripCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
          return [
            'passenger_names' => $this->passenger_names,
            'passenger_phone_numbers' => $this->passenger_phone_numbers,
            'departure' => $this->departure,
            'destination' => $this->destination,
            'pick_up_date' => $this->pick_up_date,
            'end_date' => $this->end_date,
            'pickup_street' => $this->pickup_street,
            'actual_street' => $this->actual_street,
            'vehicle_make' => $this->vehicle_make,
            'service_type' => $this->service_type,
            'vehicle_type' => $this->vehicle_type,
            'number_of_days' => $this->number_of_days,
            'price' => $this->price,
            'total_cost' => $this->total_cost,
            'trip_status' => $this->trip_status,
            'logged_by' => $this->logged_by,
           
        ];
    }
}
