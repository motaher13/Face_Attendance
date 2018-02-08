<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Running_Course extends Model
{
    protected $guarded = [];


    public function course(){
        return $this->belongsTo(Course::class,'course_id','id');
    }

    public function enrolled_student(){
        return $this->hasMany(Enrolled_Student::class,'running_course_id','id');
    }
}
