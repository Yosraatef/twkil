<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Auth;
class Login extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $success['token'] =  Auth()->user()->createToken('twkil')-> accessToken;
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
            'remember_token' => $this->remember_token,
            'api_token' => 'Bearer ' . $success['token'],
        ];
    }
}
