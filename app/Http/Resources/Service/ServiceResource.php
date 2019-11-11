<?php

namespace App\Http\Resources\Service;

use Illuminate\Http\Resources\Json\Resource;


class ServiceResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
           'service_id' => $this->service_id,
           'service_type_name' => $this->service_type_name,
            'reservation' => $this->reservation,
           'reservation_name' => $this->reservation_name,
           'service_type_description' => $this->service_type_description,
           'asset_type' => $this->asset_type
        ];
      
    }
}
