<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use Validator;
use Storage;
use App\User;

class ProfileController extends Controller
{
    //
     //public function profile(){
      //return view ('profile');
   // }
    //public function addProfile(Request $request){
      //$this ->validate($request,[ 
          //'name'=>'required',
          //'address'=>'required',
          //'secondary_email_address'=>'required',
          //'phone_number'=>'required',
          //'gender'=>'required',
          //'birthdate'=>'required',
          //'marital_status'=>'required'
        //]);
        //return "Validation Passed";

     //}
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

    protected $rules=[
        'address'=>'required',
        'birthdate'=>'required|date',
        //'secondary_email_address'=>'required',
        //'phone_number'=>'required',
        //'gender'=>'required',
        //'marital_status'=>'required'
        'prof_pic'=>'required'

    ];
    public function update(Request $req){
        $validator=Validator::make($req->all(), $this->rules);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        $file_name=base64_encode($req->file('prof_pic')
            ->getClientOriginalName());
        $file_extension=$req->file('prof_pic')
            ->getClientOriginalExtension();
        //accept 4 arguments
        //path, the file, your_filename, optional disk
        $path=$req->file('prof_pic')->storeAs('public/avatars',
            $file_name.".".$file_extension);

        //save profile
        // if(isset($profile)){
        $profile=Profile::create([
            'address'=>$req->address,
            'birthdate'=>$req->birthdate,
            // 'secondary_email_address'=>$req->secondary_email_address,
            // 'phone_number'=>$req->phone_number,
            //'gender'=>$req->gender,
            //'marital_status'=>$req->gender,
            'prof_pic'=>$file_name.".".$file_extension,
            'user_id'=>$req->user()->id
        ]);
    // }else
    //     $profile=Profile::find([
    //         $profile->address=>$req->address,
    //         $profile->birthdate=>$req->birthdate,
    //         // 'secondary_email_address'=>$req->secondary_email_address,
    //         // 'phone_number'=>$req->phone_number,
    //         //'gender'=>$req->gender,
    //         //'marital_status'=>$req->gender,
    //         $profile->prof_pic=>$file_name.".".$file_extension,
    //         $profile->user_id=>$req->user()->id
    //     ]);

        $profile->save();
        return redirect()->route('profile',$req->user()->id);

    }
     
      public function changePhoto($id, Request $req)
    {
    $file = Profile::find($id);
    $filename = Input::get('prof_pic');
    $path = public_path().'public/avatar';

    if (!File::delete($path.$filename))
      {
        Session::flash('flash_message', 'ERROR deleted the File!');
        return Redirect()->route('profile',$req->user()->id);

      }
    else
      {
        $file->delete();
      Session::flash('flash_message', 'Successfully deleted the File!');
      return Redirect()->route('profile',$req->user()->id);

      }
    
  
     }
  }
