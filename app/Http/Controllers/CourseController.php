<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseMaterialRequest;
use App\Http\Requests\CourseRequest;
use App\Models\Business_Employee;
use App\Models\Course;
use App\Models\Enrolled_Student;
use App\Services\CourseMaterialService;
use App\Services\CourseService;
use Illuminate\Http\Request;


class CourseController extends Controller
{
    private $courseService;
    private $courseMaterialService;

    public function __construct(CourseService $courseService,CourseMaterialService $courseMaterialService)
    {
        $this->courseService=$courseService;
        $this->courseMaterialService=$courseMaterialService;
    }



    public function index()
    {
        $courses=Course::join('course__categories', 'courses.category_id', '=', 'course__categories.id')
            ->select('courses.*','course__categories.name')
            ->get();
        return view('course.index')->with('courses',$courses)->with('user',auth()->user());
    }





    public function create()
    {
         $category=$this->courseService->getCategory();

        return view('course.create')->with('categories',$category);
    }




    public function store(CourseRequest $request)
    {
        try{
            $course=$this->courseService->store($request);

            return redirect()->route('dashboard.main');
        }catch (\Exception $e){
            return redirect()->back()->withInput()->with('error','something went wrong. Try again.');
        }
    }





    public function addMaterial($id)
    {
        return view('course.addMaterial')->with('course_id',$id);

    }





    public function doAddMaterial(CourseMaterialRequest $request,$id)
    {
        try{

            $material=$this->courseMaterialService->store($request,$id);
            return redirect()->route('dashboard.main');
        }catch (\Exception $e){
            return redirect()->back()->withInput()->with('error','something went wrong. Try again.');
        }
    }





    public function categoryCreate()
    {
        return view('course.category_create');
    }





    public function doCategoryCreate(Request $request)
    {
        try{
            $this->validate(request(),[
                'name'=>'required',
            ]);
            $category=$this->courseService->categoryStore($request);
            return redirect()->route('dashboard.main');
        }catch (\Exception $e){
            return redirect()->back()->withInput()->with('error','something went wrong. Try again.');
        }
    }





    public function showEnrolled()
    {
        $courses=Course::join('enrolled__students', 'courses.id', '=', 'enrolled__students.course_id')
            ->select('courses.title', 'enrolled__students.result','enrolled__students.id')
            ->where('student_id','=',auth()->user()->id)
            ->get();

        return view('course.show_enrolled')->with('courses',$courses)->with('user',auth()->user());
    }





    public function removeEnrolled($id)
    {
        $do=$this->courseService->removeEnrolled($id);
        if($do)
            return redirect()->back();
        else
            return redirect()->back()->with('error','something went wrong. Try again.');
    }






    public function showCreated()
    {
        $courses=Course::where('tutor_id','=',auth()->user()->id)
            ->get();

        return view('course.show_created')->with('courses',$courses)->with('user',auth()->user());
    }






    public function enrol($id)
    {
        try{
            $enrol=$this->courseService->enrol($id,auth()->user()->id);
            if($enrol)
                return redirect()->route('course.index')->with('success','Course Enrolled ');
            else
                return redirect()->back()->with('error','Course has been enrolled already.');
        }catch (\Exception $e){
            return redirect()->route('course.index')->withInput()->with('error','something went wrong. Try again.');
        }
    }






    public function delete($id)
    {

        $status=$this->courseService->delete($id);
        if($status){
            return redirect()->route('course.index')->with('success','Deletion Success');
        }else{

            return redirect()->back()->with('error','Something went wrong. Try again.');
        }

    }





    public function details($id)
    {
        $course=Course::find($id);

        return view('course.details')->with('course',$course);
    }



    public function enrolEmployee($id)
    {

        try{
            $users=$this->courseService->getEmployee($id);
            return view('course.enrol_employee')->with('users',$users)->with('course_id',$id);
        }catch (\Exception $e){
            return redirect()->route('course.index')->withInput()->with('error','something went wrong. Try again.');
        }
    }





    public function doEnrolEmployee(Request $request)
    {

        try{
            $do=$this->courseService->enrol_employee($request);
            return redirect()->route('course.index')->with('success','Course Enrolled');
        }catch (\Exception $e){
            return redirect()->route('course.index')->withInput()->with('error','something went wrong. Try again.');
        }
    }





}
