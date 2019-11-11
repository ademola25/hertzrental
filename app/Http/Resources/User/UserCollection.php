<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\Resource;

class UserCollection extends Resource
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
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'cid' => $this->cid,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
