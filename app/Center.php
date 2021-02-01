<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    protected $fillable = [
        'name','workSystem_id'
    ];
    public function workSystem()
    {
        return $this->belongsTo('App\WorkSystem','workSystem_id');
    }
    public function users()
     {
         return $this->hasMany('App\User');
     }
     public function Agencies()
      {
          return $this->hasMany('App\Agency');
      }
}
