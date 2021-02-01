<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
  protected $fillable = [
      'mowkel_id', 'mtawkel_id', 'center_id','is_acceptMtawkel','is_acceptManger','is_acceptMidani','replay','date'
  ];
  public function center()
  {
      return $this->belongsTo('App\Center','center_id');
  }
  public function userMtawkel()
  {
      return $this->belongsTo('App\User','mtawkel_id');
  }
  public function userMowkel()
  {
      return $this->belongsTo('App\User','mowkel_id');
  }
}
