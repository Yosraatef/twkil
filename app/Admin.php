<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
      use HasRoles, Notifiable;
      protected $fillable = [
          'name', 'email', 'password','type','status','image','phone'
      ];
      protected $hidden = [
          'password', 'remember_token',
      ];
}
