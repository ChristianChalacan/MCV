<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Pallet extends JsonResource
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
            'gross_weight' => $this->gross_weight,
            'pallet_weight' => $this->pallet_weight,
            'unit' => $this->unit,
            'gaveta_weight' => $this->gaveta_weight,
            'net_weight' => $this->net_weight,
            'entry' => $this->entry_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
