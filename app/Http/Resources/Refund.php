<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Refund extends JsonResource
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
            'quantity' => $this->quantity,
            'confirmed' => $this->confirmed,
            'observation' => $this->observation,
            'user' => $this->user_id,
            'provider' => $this->provider_id,
            'entry' => $this->entry_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
