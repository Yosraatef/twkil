<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','phone', 'password','type','device_token','is_active','center_id','codeJob','jobTitle_id',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function center()
    {
        return $this->belongsTo('App\Center','center_id');
    }
    public function jobTitle()
    {
        return $this->belongsTo('App\JobTitle','jobTitle_id');
    }
    public function Agencies()
     {
         return $this->hasMany('App\Agency');
     }
}
