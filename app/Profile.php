<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Carbon\Carbon;
class Profile extends Model {

    protected $table = 'profiles';
    protected $fillable = ['birthdate', 'prof_pic','address','user_id'];//'name','address','secondary_email_address','phone_number','gender','birthdate','marital_status'];
    public $timestamps=false;
    protected $append=['age','birthday'];
    

    public function User()
    {
        return $this->belongsTo(User::class);
    }
    

    public function getAgeAttribute(){
           $date=Carbon::now();
            return $date->diffInYears($this->attributes['birthdate']);
        }

     public function getBirthdateAttribute($value){
            return date('M-d, Y',strtotime($value));
        }
   

}