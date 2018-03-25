<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $guarded = [];


    public function user(){
        return $this->belongsTo(User::class,'owner_id','id');
    }

    public function business_employee(){
        return $this->hasMany(BusinessEmployee::class,'business_id','id');
    }

    public function business_verification(){
        return $this->hasMany(BusinessVerification::class,'business_id','id');
    }
}
