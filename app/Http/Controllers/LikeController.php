 <?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use Auth;

class LikeController extends Controller
{
    public function _construct(){
        $this->middleware('Auth.basic');
    }

    function like($id, Request $request){
        $like=Like::create([
        'user_id'=>Auth::user()->id,
            'comment_id'=>$id,
            'status'=>1
        ]);
        $like->save();
        if($like->exists)
            return response()->json(['msg'=>'Reaction saved'],200);
        else
            return response()->json(['msg'=>'A problem occurred'],200);


    }

    function dislike($id){
    	$like=Like::where(['user_id','=',Auth::user->id]
    				->where('comment_id','=',$id)
    				->forceDelete();

    			if(!$like->exists)
    				return response()
    					->json
    		return response()->json(['msg'=>'You\'ve unliked this comment],200);

    }
}
}
