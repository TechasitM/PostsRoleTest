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

    // //setter
    // public function setPasswordAttiribute($password){
    //     return $this->attributes['password']= Hash::make($password); //use Hash ;
    // }
    
    public function setStaffNameAtrribute($val){
        return $this->attributes['staffname']= strtolower($val) ;
    }

       protected $fillable = [
        'name',
        'email',
        'role',
        'status',
        'password',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
