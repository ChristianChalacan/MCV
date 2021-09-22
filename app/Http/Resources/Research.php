<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Research extends JsonResource
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
            'feature' => $this->feature,
            'quantity' => $this->quantity,
            'value_one' => $this->valueone,
            'value_two' => $this->valuetwo,
            'value_three' => $this->valuethree,
            'value_four' => $this->valuefour,
            'value_five' => $this->valuefive,
            'confirmed' => $this->confirmed,
            'organoleptic' => $this->organoleptic,
            'entry' => $this->entry_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
