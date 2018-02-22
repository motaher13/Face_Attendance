<?php
/**
 * Created by PhpStorm.
 * User: Motaher
 * Date: 2/15/2018
 * Time: 6:25 PM
 */

namespace App\Services;


use App\Models\Course_Category;
use App\Models\Enrolled_Student;
use App\Models\Running_Course;
use App\Repositories\CourseRepository;
use Illuminate\Http\Request;
use ValidateRequests;

class CourseService extends BaseService
{
    private $courseRepository;

    public function __construct(CourseRepository $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }

    /**
     * return Repository instance
     *
     * @return mixed
     */
    public function baseRepository()
    {
        return $this->courseRepository;
    }

    public function store(Request $request){

        $data=$request->only(['category_id','title','description','length','type']);
        $data['tutor_id']=auth()->user()->id;
        $course =  $this->create($data);
        $running_course=Running_Course::create([
            'course_id'=>$course->id,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date
        ]);
        return $course;
    }

    public function categoryStore(Request $request){
        $category=Course_Category::create([
            'name'=>$request->name,
        ]);
        return $category;
    }

    public function getCategory(){
        return Course_Category::all();
    }

    public function removeEnrolled($id){
        $enrolled_student=Enrolled_Student::find($id);
        $enrolled_student->delete();
        return true;

    }

    public function enrol($id){
        $enrolled=Enrolled_Student::where('student_id','=',auth()->user()->id)
            ->where('course_id','=',$id)
            ->first();
        if($enrolled)
            return false;
        $enrolled_student=new Enrolled_Student;
        $enrolled_student->student_id=auth()->user()->id;
        $enrolled_student->course_id=$id;
        $enrolled_student->save();
        return $enrolled_student;
    }

    public function delete($id){
        try{
            $status =  $this->courseRepository->delete($id);
            return $status;
        }catch (\Exception $exception){
            DB::rollBack();
        }
    }
}