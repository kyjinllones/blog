<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
use App\User;
use App\Like;
class Comment extends Model
{
    protected $fillable=['text','user_id','post_id'];

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function post(){
    	return $this->belongsTo(Post::class);
    }

    public function user_like(){
        return $this->belongsTo('Like::class');
    }
}
