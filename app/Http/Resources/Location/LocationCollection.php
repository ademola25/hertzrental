<?php

namespace App\Http\Resources\Location;

use Illuminate\Http\Resources\Json\Resource;

class LocationCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        
         return [
            'location_id' => $this->location_id,
            'location_name' => $this->location_name,
            'reservation' => $this->reservation

        ];
    }
}
