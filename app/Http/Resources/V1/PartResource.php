<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class PartResource extends JsonResource
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

            'id'=>$this->id,
            'supplier_id'=>$this->supplier_id,
            'part_desc'=>$this->part_desc,
            'category'=>$this->category,
            'part_number'=>$this->part_number,
            'quantity'=>$this->quantity,
            'price'=>$this->price,
            'priority'=>$this->priority,
            'days_valid'=>$this->days_valid,
            'condition'=>$this->condition,







        ];
    }
}
