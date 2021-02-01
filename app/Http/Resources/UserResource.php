<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
        'name' => $this->name,
        'email' => $this->email,
        'phone' => $this->phone,
        'type' => $this->type,
        'center' => new Center($this->center),
        'codeJob' => $this->codeJob,
        'JobTitle' => $this->JobTitle,
        'noAgencyInMonth' => $this->noAgencyInMonth,
        'device_token' => $this->device_token,
      ];

    }
}
