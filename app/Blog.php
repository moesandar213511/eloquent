<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['user_id','title','content'];

    //not s in function name
    public function user(){
    	return $this->belongsTo('App\User');
    }
    public function comment(){
    	return $this->morphMany('App\Comment','commendable');
    }
}
