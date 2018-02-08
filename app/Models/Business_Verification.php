<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Business_Verification extends Model
{
    protected $guarded = [];

    public function business(){
        return $this->belongsTo(Business::class,'business_id','id');
    }
}
