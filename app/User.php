<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role','money','address','phone',
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
    public function cart1(){
        return $this->hasOne("App\User","id_user","id");
      }
    public function olderu(){
        return $this->hasMany("App\Older","id_user","id_user");
      }
      public function comments(){
        //khoa ngoai va khoa chin cua 2 bang tuong ung
        return $this->hasMany("App\Comment",'id_user',"id");
    }
}
