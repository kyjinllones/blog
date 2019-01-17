<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
class CommentsController extends Controller
{
    function store(Request $request, $user_id, $post_id){
        $comment=Comment::create(
            [
                'text'=>$request->text,
                'user_id'=>$user_id,
                'post_id'=>$post_id,
            ]
        );
        $comment->save();
        return response()->json(['message'=>'Your comment has been saved.'], 200);
    }
}