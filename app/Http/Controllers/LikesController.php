<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use Auth;
class LikesController extends Controller
{
    function _construct(){
    	$this->middleware('auth.basic');
    }
 	
     
    function like($id){
       $like=Like::create([
       		'user_id'=>Auth::user()->id,
       		'comment_id'=>$id,
       		'status'=>1
       ]);
       $like->save();
       return response()->json(['msg'=>'Reaction saved!'], 200);
    }
    
    function dislike($id){
    	$like=Like::where('user_id','=',Auth::user()->id)
    			  ->where('comment_id','=',$id)
    	          ->delete();
        	return response()
              ->json(['msg'=>'Unliked successful'],200);
    }
    
}
