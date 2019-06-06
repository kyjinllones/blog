<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Validator;

class ProfileController extends Controller
{
    public function _construct(){
      $this->middleware('auth')
           ->except('view_friend');
    }

    public function index($user_id){
       $profile=Profile::where('user_id','=',$user_id)->get();
       if($profile->count()!=null)
          return view('profile.view_profile')
                   ->withProfile($profile);
       else
          return view('profile.edit_details');
    }
    
    protected $rules = [
      'address'=>'required',
      'birthdate'=>'required|date',
    ];

    public function update(Request $req){
      $validator=Validator::make($req->all(), $this->rules);
      if($validator->fails()){
        return back()->withErrors($validator)->withInput();
      }
      $profile=Profile::create([
           'address'=>$req->address,
           'birthdate'=>$req->birthdate,
           'user_id'=>$req->user()->id,
      ]);
      $profile->save();
      return redirect()->route('profile', $req->user()->id);
    }

    public function view_friend(Request $request){
      return redirect('/profile/friend-cookie')->cookie('friend', 'Peter Piper', 1);
    }

    public function get_cookie_friend(Request $request){
       return response('<h1>'.$request->cookie("friend").'</h1>');
    }
}
