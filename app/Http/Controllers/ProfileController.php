<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use Auth;
class ProfileController extends Controller
{
    //
    public function profile(){
    	return view ('profile');
    }
    public function addProfile(Request $request){
    		$this ->validate($request,[ 
    			'name'=>'required',
    			'address'=>'required',
    			'secondary_email_address'=>'required',
    			'phone_number'=>'required',
    			'gender'=>'required',
    			'birthdate'=>'required',
    			'marital_status'=>'required'
    		]);
    		return "Validation Passed";

    }
}
