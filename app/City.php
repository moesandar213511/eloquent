<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['id','user_id','name'];

    public function blog(){
    	return $this->hasManyThrough('App\Blog','App\User','city_id','user_id');
    }
}
