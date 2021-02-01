<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobTitle extends Model
{
  protected $table = 'jobtitles';
  protected $fillable = [
      'name'
  ];
  public function users()
   {
       return $this->hasMany('App\User');
   }
}
