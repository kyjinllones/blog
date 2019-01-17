<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;
use App\User;
class Like extends Model
{
    protected $fillable = ['number','status','user_id','comment_id'];
    protected $guarded = ['created_at','updated_at'];
    protected $appends = ['number'];

    public function setStatusAttribute($value){
        return $this->attributes['status']=(boolean)$value;
    }

    public function comment(){
        return $this->belongsTo('App\Comment');
    }

    public function user(){
        return $this->hasMany('App\User');
    }

    public function getNumberAttribute($value){
        return $this->where('status',true)->count();
    }
}
