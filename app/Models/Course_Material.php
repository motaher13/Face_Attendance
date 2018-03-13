<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course_Material extends Model
{
    protected $guarded = ['id'];

    public function course(){

        return $this->belongsTo(Course::class,'course_id','id');
    }


}
