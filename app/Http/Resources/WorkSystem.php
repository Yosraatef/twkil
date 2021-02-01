<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WorkSystem extends JsonResource
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
            'hours' => $this->hours,
            'noAgency' => $this->noAgency,
            'is_agency' => $this->is_agency,
        ];
    }
}
