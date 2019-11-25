<?php

namespace App\Http\Resources\Price;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Model\LocationCost;
use Carbon\Carbon;


class PriceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
    
       $matchThese = ['departure' => $request->departure, 'destination' => $request->destination, 
                  'vehicle_type' => $request->vehicle_type, 'service_type' => $request->service_type, 
               'vehicle_make' => $request->vehicle_make, 'cid' => 96];
               
         $getCost = LocationCost::where($matchThese)->value('cost');
         
        $sPickDate =  Carbon::parse($request->pickup_date);
        $sEndDate =  Carbon::parse($request->end_date);
                    
        $days =  $sEndDate->diffInDays($sPickDate);
        $days = $days == 0 ? $days + 1 : $days + 1;
        
        $totalCost = $getCost * $days;
       
       // return parent::toArray($request);
           return [
            'departure' => $request->departure,
            'destination' => $request->destination,
            'vehicle_type' => $request->vehicle_type,
            'vehicle_make' => $request->vehicle_make,
            'service_type' => $request->service_type,
            'pickup_date' => $request->pickup_date,
            'end_date' => $request->end_date,
            'days' => $days,
            'price' => $getCost,
            'totalCost' => $totalCost,
             
           // 'href' => ['trips' => route('trips.index', $this->reservation_id)],
            //'trip_count' => $this->trips->count() > 0 ? round($this->trips->count()) : 'No Trips',
            

        ];
    }
}
