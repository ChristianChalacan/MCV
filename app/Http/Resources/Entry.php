<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Entry extends JsonResource
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
            'turn' => $this->turn,
            'hour' => $this->hour,
            'batch' => $this->batch,
            'vehicle' => $this->vehicle,
            'hygiene' => $this->hygiene,
            'weight' => $this->weight,
            'rejection' => $this->rejection,
            'extra' => $this->extra,
            'observation' => $this->observation,
            'available_weight' => $this->available_weight,
            'available_jabas' => $this->availablejabas,
            'user' => $this->user_id,
            'kind' => $this->kind_id,
            'charge' => $this->charge_id,
            'provider' => $this->provider_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
