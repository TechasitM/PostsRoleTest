<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    //getter
    public function getStaffFullNameAttribute(){
        return $this->staffname . " ".$this->staffurname ;
    }

    //setter
    public function setPasswordAttiribute($password){
        return $this->attributes['password']= Hash::make($password); //use Hash ;
    }
    
    public function setStaffNameAtrribute($val){
        return $this->attributes['staffname']= strtolower($val) ;
    }

}
