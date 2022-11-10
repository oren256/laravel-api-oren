<?php

namespace App\Http\Resources;

use App\Models\Equipment;
use App\Models\EquipmentType;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\EquipmentTypeResource;

class EquipmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'equipment_type' => EquipmentTypeResource::collection($this->whenLoaded('type')),
            'serial_number' => $this->serial_number,
            'comment' => $this->comment,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
