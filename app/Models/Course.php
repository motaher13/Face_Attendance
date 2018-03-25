<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = [];

    public function course_category(){
        return $this->belongsTo(CourseCategory::class,'category_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'tutor_id','id');
    }

    public function enrolled_student(){
        return $this->hasMany(EnrolledStudent::class,'course_id','id');
    }

    public function running_course(){
        return $this->hasMany(RunningCourse::class,'course_id','id');
    }

    public function course_material(){
        return $this->hasMany(CourseMaterial::class,'course_id','id');
    }

}
