<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
//    protected $hidden = [
//        'password', 'remember_token',
//    ];
//
    public function blog(){
        return $this->hasMany('App\Blog');
    }
    public function city(){
        return $this->hasOne('App\City');
    }
    public function role(){
        return $this->belongsToMany('App\Role');
    }
    public function comment(){
        return $this->morphMany('App\Comment','commendable');
    }
    
}
