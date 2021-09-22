<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Shipping extends JsonResource
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
            'date' => $this->date,
            'confirmed' => $this->confirmed,
            'user' => $this->user_id,
            'client' => $this->client_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
