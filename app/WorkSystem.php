<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkSystem extends Model
{
    protected $fillable = [
        'hours', 'noAgency' ,'is_agency'
    ];
    public function centers()
    {
        return $this->hasMany('App\Center','workSystem_id');
    }
}
