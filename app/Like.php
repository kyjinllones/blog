<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = ['status','user_id','comment_id'];
    protected $guarded = ['created_at', 'updated_at'];
    protected $appends = ['number'];

     public function setStatusAttribute($value){
        $this->attributes['status']=(int)$value;
     }
     
     public function getStatusAttribute($value){
        return $value;
     }
    public function comment(){
        return $this->belongsTo(App\Comment::class);
    }

    public function user(){
        return $this->belongsTo(App\User::class);
    }
}
