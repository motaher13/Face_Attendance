<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function userInfo(){
        return $this->hasOne('App\Models\UserInfo', 'user_id', 'id');
    }

    public function business(){
        return $this->hasMany(Business::class,'owner_id','id');
    }

    public function business_employee(){
        return $this->hasOne(Business_Employee::class,'user_id','id');
    }

    public function education(){
        return $this->hasOne(Education::class,'user_id','id');
    }

    public function enrolled_student(){
        return $this->hasMany(Enrolled_Student::class,'student_id','id');
    }

    public function course(){
        return $this->hasMany(Course::class,'tutor_id','id');
    }
}
