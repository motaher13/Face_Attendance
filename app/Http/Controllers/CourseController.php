<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseMaterialRequest;
use App\Http\Requests\CourseRequest;
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


    public function create(){
         $category=$this->courseService->getCategory();

        return view('course.create')->with('categories',$category);
    }

    public function store(CourseRequest $request){
        try{
            $course=$this->courseService->store($request);

            return redirect()->route('dashboard.main');
        }catch (\Exception $e){
            return redirect()->back()->withInput()->with('error','something went wrong. Try again.');
        }
    }

    public function addMaterial($id){
        return view('course.addMaterial')->with('course_id',$id);

    }

    public function doAddMaterial(CourseMaterialRequest $request,$id){
        try{

            $material=$this->courseMaterialService->store($request,$id);
            return redirect()->route('dashboard.main');
        }catch (\Exception $e){
            return redirect()->back()->withInput()->with('error','something went wrong. Try again.');
        }

    }

    public function categoryCreate(){
        return view('course.category_create');
    }

    public function doCategoryCreate(Request $request){
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
}
