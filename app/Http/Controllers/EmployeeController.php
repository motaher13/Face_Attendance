<?php

namespace App\Http\Controllers;

use App\Models\BusinessEmployee;
use App\Models\EnrolledStudent;
use App\Models\Course;
use App\Models\RunningCourse;
use App\Models\User;
use Illuminate\Http\Request;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use App\Models\Event;


class EmployeeController extends Controller
{


   public function index(){
        $employees=auth()->user()->business->business_employee;
        $users=array();
        foreach($employees as $employee){
            $person=User::find($employee->user_id);
            array_push($users,$person);
        }
        return view('employee.list')->with('users',$users)->with('user',auth()->user());
   }




   public function remove($id){
       $user=User::find($id);
        $user->delete();
        return redirect()->route('employee.list');
   }



   public function details($id){
        $user=User::find($id);
       $courses=Course::join('enrolled_students', 'courses.id', '=', 'enrolled_students.course_id')
           ->join('course_categories', 'courses.category_id', '=', 'course_categories.id')
           ->join('running_courses', 'courses.id', '=', 'running_courses.course_id')
           ->select('courses.title','courses.type','course_categories.name','courses.length', 'enrolled_students.result','enrolled_students.id','enrolled_students.status','running_courses.start_date','running_courses.end_date')
           ->where('student_id','=',$id)
           ->get();
        return view('employee.details')->with('user',$user)->with('courses',$courses);
   }

   public function test(){
       $events = [];
       $courses = RunningCourse::all();


       return view('test')->with('courses',$courses);

   }

}
