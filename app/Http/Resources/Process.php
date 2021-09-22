<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Process extends JsonResource
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
            'process' => $this->process,
            'hour' => $this->hour,
            'turn' => $this->turn,
            'initial' => $this->initial,
            'jabas' => $this->jabas,
            'unit' => $this->unit,
            'packing' => $this->packing,
            'net' => $this->net,
            'product' => $this->product,
            'lot' => $this->lot,
            'final' => $this->final,
            'guia' => $this->guia,
            'observation' => $this->observation,
            'user' => $this->user_id,
            'shipping' => $this->shipping_id,
            'client' => $this->client_id,
            'order' => $this->order_id,
            'entry' => $this->entry_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
