<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model {

    protected $table = 'profiles';
    protected $fillable = ['name', 'address','secondary_email_address','phone_number','gender','birthdate','marital_status'];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

}