<?php

namespace App\Http\Controllers;

use App\Models\Business_Employee;
use App\Models\Enrolled_Student;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

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
       $courses=Course::join('enrolled__students', 'courses.id', '=', 'enrolled__students.course_id')
           ->join('course__categories', 'courses.category_id', '=', 'course__categories.id')
           ->join('running__courses', 'courses.id', '=', 'running__courses.course_id')
           ->select('courses.title','course__categories.name','courses.length', 'enrolled__students.result','enrolled__students.id','enrolled__students.status','running__courses.start_date','running__courses.end_date')
           ->where('student_id','=',$id)
           ->get();
        return view('employee.details')->with('user',$user)->with('courses',$courses);
   }

}
