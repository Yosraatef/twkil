<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddAgencyResource extends JsonResource
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
        'agency_id' => $this->id,
        'mtawkel_id' => new UserResource($this->userMtawkel),
        'agency_date' => $this->date,
      ];

    }
}
