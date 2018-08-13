<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseMaterialRequest;
use App\Http\Requests\CourseRequest;
use App\Models\BusinessEmployee;
use App\Models\Course;
use App\Models\EnrolledStudent;
use App\Models\UserInfo;
use App\Services\CourseMaterialService;
use App\Services\CourseService;
use Illuminate\Http\Request;
use App\Models\CourseMaterial;
use App\Models\TempFile;
use App\Models\RunningCourse;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;


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
        $courses=Course::all();
        return view('course.index')->with('courses',$courses);
    }








    public function create()
    {
        $user_infos=UserInfo::where('status','teacher')->get();
        return view('course.create')->with('user_infos',$user_infos);
    }




    public function store(Request $request)
    {
        try{
            $data=$request->only(['title','course_code','session','semester','teacher_id','start_date','end_date']);
            $course=$this->courseService->store($data);

            return redirect()->route('course.index');
        }catch (\Exception $e){
            return redirect()->back()->withInput()->with('error','something went wrong. Try again.');
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




    public function test(Request $request){
        $skip = 5;
        $limit = 10 - $skip;
        $courses=Course::skip($skip)->take($limit)->get();
//        return $courses;
        $courses=json_encode($courses);
        $response = array('success' => true, 'data' => $courses);
        return response()->json($response);
    }


//    public function addMaterial($id)
//    {
//        return view('course.addMaterial')->with('course_id',$id);
//
//    }





//    public function doAddMaterial(Request $request,$id)
//    {
//        try{
//
//           // $material=$this->courseMaterialService->store($request,$id);
////            return redirect()->route('dashboard.main');
//
//            $photos = [];
//            foreach ($request->photos as $photo) {
//
//                $input= $photo->getClientOriginalName();
//                $destinationPath = public_path('/upload');
//                $photo->move($destinationPath, $input);
//                $product_photo = TempFile::create([
//                    'link' =>$input
//                ]);
//
//                $photo_object = new \stdClass();
//                $photo_object->name = str_replace('upload/', '',$photo->getClientOriginalName());
//                $photo_object->size = 18;//round(Storage::size($filename) / 1024, 2);
//                $photo_object->fileID = $product_photo->id;
//                $photos[] = $photo_object;
//            }
//
//            return response()->json(array('files' => $photos), 200);
//
//        }catch (\Exception $e){
//            return redirect()->back()->withInput()->with('error','something went wrong. Try again.');
//        }
//    }





//    public function add_url(Request $request)
//    {
//        $urls=$request->url;
//        $source=$request->source;
//        for($i=0;$i<sizeof($source  );$i++){
//            $item=TempFile::create();
//            $item->url=$urls[$i];
//            $item->source=$source[$i];
//            $item->code=$request->code;
//            $item->save();
//        }
//
//        $response = array('success' => true);
//        return response()->json($response);
//
//    }





//    public function categoryCreate()
//    {
//        return view('course.category_create');
//    }
//
//
//
//
//
//    public function doCategoryCreate(Request $request)
//    {
//        try{
//            $this->validate(request(),[
//                'name'=>'required',
//            ]);
//            $category=$this->courseService->categoryStore($request);
//            return redirect()->route('dashboard.main');
//        }catch (\Exception $e){
//            return redirect()->back()->withInput()->with('error','something went wrong. Try again.');
//        }
//    }
//
//
//
//
//
//    public function showEnrolled()
//    {
////        $courses=Course::join('enrolled__students', 'courses.id', '=', 'enrolled__students.course_id')
////            ->select('courses.title', 'enrolled__students.result','enrolled__students.id','enrolled__students.seen')
////            ->where('student_id','=',auth()->user()->id)
////            ->get();
////        foreach($courses as $course){
////            $data=$course;
////            if($data->seen==false){
////                $enrolled=Enrolled_Student::find($course->id);
////                $enrolled->seen=true;
////                $enrolled->save();
////            }
////        }
//        $enrolled_student=auth()->user()->enrolled_student;
//
//        return view('course.show_enrolled')->with('enrolled_student',$enrolled_student);
//    }
//
//
//
//
//
//    public function removeEnrolled($id)
//    {
//        $do=$this->courseService->removeEnrolled($id);
//        if($do)
//            return redirect()->back();
//        else
//            return redirect()->back()->with('error','something went wrong. Try again.');
//    }






//    public function showCreated()
//    {
//        $courses=Course::where('tutor_id','=',auth()->user()->id)
//            ->get();
//
//        return view('course.show_created')->with('courses',$courses)->with('user',auth()->user());
//    }
//
//




//    public function enrol($id)
//    {
//        try{
//            $enrol=$this->courseService->enrol($id,auth()->user()->id);
//            if($enrol)
//                return redirect()->back()->with('success','Course Enrolled ');
//            else
//                return redirect()->back()->with('error','Course has been enrolled already.');
//        }catch (\Exception $e){
//            return redirect()->back()->withInput()->with('error','something went wrong. Try again.');
//        }
//    }










//    public function details($id)
//    {
//        $course=Course::find($id);
//
//        if(auth()->user()->hasRole('selfteach') || auth()->user()->hasRole('employee')){
//            $notifications= auth()->user()->enrolled_student;
//            foreach($notifications as $notification){
//                if($notification->course_id==$id){
//                    $notification->seen=true;
//                    $notification->save();
//                }
//
//            }
//        }
//
//
//        $enrolled_student=0;
//
//        if(auth()->user()->hasRole('employee')|| auth()->user()->hasRole('selfteach')){
//            $enrolleds=auth()->user()->enrolled_student;
//            foreach ($enrolleds as $enrolled ){
//                if($enrolled->course_id==$course->id){
//                    $enrolled_student=1;
//                    break;
//                }
//            }
//        }
//
//        if(auth()->user()->hasRole('business')){
//            $employees=$this->courseService->getEmployee($id);
//            return view('course.details')->with('users',$employees[0])->with('enrolled_users',$employees[1])->with('course',$course)->with('course_id',$id)->with('enrolled',$enrolled_student);
//        }
//
//        return view('course.details')->with('course',$course)->with('enrolled',$enrolled_student);
//
//    }
//
//
//
//
//
//
//
//
//
//
//
//    public function enrolEmployee($id)
//    {
//
//        try{
//            $employees=$this->courseService->getEmployee($id);
//
//            return view('course.enrol_employee')->with('users',$employees[0])->with('enrolled_users',$employees[1])->with('course_id',$id);
//        }catch (\Exception $e){
//            return redirect()->back()->withInput()->with('error','something went wrong. Try again.');
//        }
//    }
//
//
//
//
//
//    public function doEnrolEmployee(Request $request)
//    {
//
//        try{
//            $do=$this->courseService->enrol_employee($request);
//            return redirect()->back()->with('success','Course Enrolled');
//        }catch (\Exception $e){
//            return redirect()->back()->withInput()->with('error','something went wrong. Try again.');
//        }
//    }





}
