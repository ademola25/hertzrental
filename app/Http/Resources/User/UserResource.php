<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'cid' => $this->cid,
            'designation' => $this->designation,
             'phone_number' => $this->phone_number,
            'user_status' => $this->user_status,
            'shared_pool_admin' => $this->shared_pool_admin,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
