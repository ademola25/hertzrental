<?php

namespace App\Http\Resources\Vehicle;

use Illuminate\Http\Resources\Json\Resource;

class VehicleCollection extends Resource
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
            'vehicle_id' => $this->vehicle_id,
            'plate_number' => $this->plate_number,
            'service_type' => $this->service_type,
            'vehicle_type' => $this->vehicle_type,
            //'vehicle_make+model' => $this->vehicle_make+model,
            'year' => $this->year,
            'color' => $this->color,
            'vehicle_status' => $this->vehicle_status,
            'cid' => $this->cid,
            'vehicle_driver' => $this->vehicle_driver,
            'driver_phone_number' => $this->driver_phone_number,
            'chasis_number' => $this->chasis_number,
            'engine_number' => $this->engine_number,
            'Latitude' => $this->Latitude,
            'Longitude' => $this->Longitude,
            'start_mileage' => $this->start_mileage,
            'purchase_date' => $this->purchase_date,
            'mileage_date' => $this->mileage_date,
            'battery_spec' => $this->battery_spec,
           
        ];
    }
}
