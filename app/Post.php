<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use App\User;
use App\Comment;
class Post extends Model
{
    //@optional
    use SoftDeletes;
    protected $table="post";
    protected $fillable=['user_id','title', 'content'];
    protected $dates=['deleted_at'];
    //one post belongs to a user
    public function user(){
       return $this->belongsTo(User::class);
    }
   //one posts may have multiple comments
    public function comments(){
      return $this->hasMany(Comment::class);
    }

    function gestTitleAttribute($value){
        //mutate our post title first letter
        return ucfirst($value);
    }

    function setTitleAttribute($value){
        //convert title to lowercase
        return $this->attributes['title']=strtolower($value);
    }

    function getCreatedAtAttribute($value){
        $date_now=Carbon::now();
        return $date_now->diffForHumans($value);
    }

    function getUpdatedAtAttribute($value){
        $date_now=Carbon::now();
        return $date_now->diffForHumans($value);
    }
}
