<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnrolledStudent extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class,'student_id','id');
    }

    public function course(){
        return $this->belongsTo(Course::class,'course_id','id');
    }

    public function running_course(){
        return $this->belongsTo(RunningCourse::class,'running_course_id','id');
    }
}
