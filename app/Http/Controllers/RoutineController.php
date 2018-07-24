<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Attendence;
use App\Models\Course;
use App\Models\Routine;
use Illuminate\Http\Request;

class RoutineController extends Controller
{
    public function create(){
        $courses=Course::all();
        return view('routine.create')->with('courses',$courses);
    }


    public function index(){
        
    }

    public function add(Request $request){
        $course_id=$request->course_id;
        $start_time=$request->start_time;
        $end_time=$request->end_time;
        $day=$request->day;
        $room=$request->room;

        for($i=0;$i<sizeof($day);$i++){
            $item=Routine::create();
            $item->start_time=$start_time[$i];
            $item->end_time=$end_time[$i];
            $item->day=$day[$i];
            $item->room=$room[$i];
            $item->course_id=$course_id[$i];
            $item->save();


        }
        return redirect()->route('routine.add');
    }

    public function attendance(){
        $attendances = $user_info = Attendence::groupBy(['course_id','user_id'])
            ->select('course_id','user_id', DB::raw('count(*) as total'))
            ->get();
//        return $attendances;
        return view('routine.attendance')->with('attendances',$attendances);
    }
}
