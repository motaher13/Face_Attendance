<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = [];

    public function course_category(){
        return $this->belongsTo(Course_Category::class,'category_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'tutor_id','id');
    }

    public function enrolled_student(){
        return $this->hasMany(Enrolled_Student::class,'course_id','id');
    }

    public function running_course(){
        return $this->hasMany(Running_Course::class,'course_id','id');
    }

}
