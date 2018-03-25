<?php
/**
 * Created by PhpStorm.
 * User: Motaher
 * Date: 2/15/2018
 * Time: 6:25 PM
 */

namespace App\Services;


use App\Models\CourseCategory;
use App\Models\EnrolledStudent;
use App\Models\RunningCourse;
use App\Models\User;
use App\Repositories\CourseRepository;
use Illuminate\Http\Request;
use ValidateRequests;
use App\Models\BusinessEmployee;
use App\Models\CourseMaterial;


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

        $data=$request->only(['category_id','title','short_description','long_description','length','type']);
        $data['tutor_id']=auth()->user()->id;
        $course =  $this->create($data);
        if($request->type=='scheduled'){
            $running_course=RunningCourse::create([
                'course_id'=>$course->id,
                'start_date'=>$request->start_date,
                'end_date'=>$request->end_date
            ]);
        }


        if($request->file_ids){
            $files=CourseMaterial::whereIn('id', explode(",", $request->file_ids))->get();
            foreach ($files as $file){
                CourseMaterial::create([
                    'course_id'=>$course->id,
                    'link'=>$file->link,
                    'type'=>'video'
                ]);

            }

        }
        else{
            CourseMaterial::create([
                'course_id'=>$course->id,
                'link'=>$request->url,
                'type'=>'url'
            ]);
        }



        return $course;
    }












    public function categoryStore(Request $request){
        $category=CourseCategory::create([
            'name'=>$request->name,
        ]);
        return $category;
    }









    public function getCategory(){
        return CourseCategory::all();
    }






    public function removeEnrolled($id){
        $enrolled_student=EnrolledStudent::find($id);
        $enrolled_student->delete();
        return true;

    }










    public function enrol($id,$student_id){
//        dd($student_id);
        $enrolled=EnrolledStudent::where('student_id','=',$student_id)
            ->where('course_id','=',$id)
            ->first();
        if($enrolled)
            return false;
        $enrolled_student=new EnrolledStudent;
        $enrolled_student->student_id=$student_id;
        $enrolled_student->course_id=$id;
        $enrolled_student->save();

        return $enrolled_student;
    }













    public function getEmployee($id){
        $enrolled_students=EnrolledStudent::where('course_id','=',$id)
            ->select('student_id')
            ->get();
        $users=BusinessEmployee::join('businesses','businesses.id','=','business_employees.business_id')
            ->where('businesses.owner_id','=',auth()->user()->id)
            ->join('users','users.id','=','business_employees.user_id')
            ->join('user_infos','users.id','=','user_infos.user_id')
            ->whereNotIn('users.id',$enrolled_students)
            ->select('users.id','user_infos.name')
            ->get();

        $enrolled_users=BusinessEmployee::join('businesses','businesses.id','=','business_employees.business_id')
            ->where('businesses.owner_id','=',auth()->user()->id)
            ->join('users','users.id','=','business_employees.user_id')
            ->whereIn('users.id',$enrolled_students)
            ->select('users.id')
            ->get();


        $enrolled_users=User::whereIN('id',$enrolled_users)->get();

        return array($users,$enrolled_users) ;

    }














    public function enrol_employee(Request $request){
        $employees=$request->employee;
        $id=$request->course_id;
        foreach ($employees as $employee){
            $do=$this->enrol($id,$employee);
            //dd($do);
        }

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