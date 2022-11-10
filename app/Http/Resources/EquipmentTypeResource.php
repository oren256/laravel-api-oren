<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\EquipmentType;

class EquipmentTypeResource extends JsonResource
{
    /**
     * Возвращает валидированные данные из модели в виде JSON
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'mask' => $this->mask,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
