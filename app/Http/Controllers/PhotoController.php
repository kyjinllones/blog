<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Photo;
use File;
use Validator; 	
use DB;
class PhotoController extends Controller
{
	public function _construct(){
		$this->middleware('auth');
	}
   //this is to upload profile pic of the user

   protected $rules = [
   	 'prof_pic'=>'required|file|image|max:2024',
   ];
   protected $messages = [
   	 'prof_pic.required' => 'Select a file before submitting!',
   	 'prof_pic.file' => 'This should be a file format',
   	 'prof_pic.image' =>'The file should be an image.'
   ];
   public function upload(Request $request){
      $validator=Validator::make($request->all(), $this->rules, $this->messages);
      if($validator->fails())
      	return back()->withErrors($validator)->withInput();
      $file = $request->file('prof_pic');
      $new_file_name = base64_encode($file->getClientOriginalName());
      $extension = $file->getClientOriginalExtension();
      $uploaded_file = $new_file_name.'.'.$extension;
      $path=$file->move('storage/avatars',$uploaded_file);
      $statusChange=DB::update('update photos set status=0
       where user_id= '.$request->user()->id);
      $photo = new Photo;
      $photo->prof_pic=$uploaded_file;
      $photo->status=1;
      $photo->user_id=$request->user()->id;
      $photo->save();
      return back();
   } 	
   //this is to delete the profile pic
   public function delete(){
    
   }
   //change the current profile picture
   public function change(){
    
   }
}
