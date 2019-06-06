<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Post;
use App\User;
class PostsController extends Controller
{
    //
    function index(Post $post){
       $posts=$post->withTrashed()->orderBy('updated_at','desc')->get();
       return view('posts')->withPosts($posts);
    }
    //search title the return posts with similar title
    function find(Request $req){
        $posts=Post::where('title',
            'like','%'.$req->search.'%')->get();
        return view('posts')->withPosts($posts);
    }
    //add new post
    function add(Request $request){
    
        $post= Post::create(
            [
                'user_id'=>Auth::user()->id,
                'title'=>$request->title,
                'content'=>$request->content
            ]
        );
        return redirect()->route('posts');
    }

    function new_post(){
        return view('post');
    }

    function edit($id){
        $post=Post::find($id);
        return view('post')->withPost($post);
    }


    function delete($id, Request $request){
      $user_id=$request->user()->id;
      $user=User::find($user_id);
      $post=$user->posts->find($id); 
       $post->delete();
            if ($post->trashed()){
              return redirect()->route('posts');
            }
       return redirect()->route('posts.post');
    }

    function update($id, Request $request){
       $user_id=$request->user()->id;
      $user=User::find($user_id);
      $post=$user->posts->find($id);
      return response('Doesnt located your post?');
       $post=Post::find($id);
       $post->title=$request->title;
       $post->content=$request->content;
       $post->save();
       return redirect()->route('posts');
    }

    function view_details($id, $title){
      $post=Post::find($id);
      return view('details')->withPost($post);
    }
    function restore($id, Request $request){
       $post=Post::withTrashed()
            ->where('id','=',$id) 
            ->where('user_id','=',$request->user()->id);
       $post->restore();
       return redirect()->route('posts');
    }
}
