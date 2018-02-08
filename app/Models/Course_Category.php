<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course_Category extends Model
{
    protected $guarded = [];

    public function course(){
        return $this->hasMany(Course::class,'category_id','id');
    }

}
