<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Observation extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'observation' => $this->observation,
            'user' => $this->user_id,
            'shipping' => $this->shipping_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
