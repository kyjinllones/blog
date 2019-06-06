<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Photo extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function getProfPicAttribute($value){
    	return asset('storage/avatars/'.$value);
    }

    public function getStatusAttribute($value){
    	if($value==1)
    		return 'Current';
    	else
    		return 'Not Current';
    }

    public function setStatusAttribute($value){
       $this->attributes['status']=(integer)$value;
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }
}

