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
        $sessions=Routine::join('courses','courses.id','=','routines.course_id')
            ->distinct()->pluck('session');

        if(count($sessions)){
            $routines=Routine::join('courses','courses.id','=','routines.course_id')
                ->where('session','=',min((array)$sessions))
                ->select('routines.id','routines.day','courses.course_code','courses.title','routines.start_time','routines.end_time')
                ->get();
            $routines=$routines->where('day','=','Sunday');
        }

        else{
            $routines=[];
        }

        return view('routine.index')->with('sessions',$sessions)->with('routines',$routines);
    }









    public function indexUpdate(Request $request){

        $routines=Routine::join('courses','courses.id','=','routines.course_id')
            ->where('session','=',$request->batch_session)
            ->where('day','=',$request->day)
            ->select('routines.id','routines.day','courses.course_code','courses.title','routines.start_time','routines.end_time')
            ->get();
//        $routines=$routines->where('day','=',$request->day);

        $routines=json_encode($routines);
        $response = array('success' => true, 'data' => $routines);
        return response()->json($response);

    }







    public function add(Request $request){
        $course_id=$request->course_id;
        $start_time=$request->start_time;
        $end_time=$request->end_time;
        $day=$request->day;
        $room=$request->room;

        for($i=0;$i<sizeof($day);$i++){
            $item=Routine::create();
            $item->start_time=date( "H:i:s", strtotime( $start_time[$i] ) );
            $item->end_time=date( "H:i:s", strtotime( $end_time[$i] ) );
            $item->day=$day[$i];
            $item->room=$room[$i];
            $item->course_id=$course_id[$i];
            $item->save();


        }
        return redirect()->route('routine.add');
    }





    public function update($id){
        $routine=Routine::find($id);
//        dd($id,$routine->id);
        $courses=Course::all();
        return view('routine.update')->with('routine',$routine)->with('courses',$courses);
    }














    public function doUpdate(Request $request,$id){
        $item=Routine::find($id);
        $item->start_time=date( "H:i:s", strtotime( $request->start_time ) );
        $item->end_time=date( "H:i:s", strtotime( $request->end_time ) );
        $item->day=$request->day;
        $item->room=$request->room;
        $item->course_id=$request->course_id;
        $item->save();
    }









    public function delete($id){
        if($id==-10000000)
        {
            if(Routine::truncate()){
                return redirect()->route('routine.index')->with('success','Deletion Success');
            }else{
                return redirect()->back()->with('error','Something went wrong. Try again.');
            }
        }
        $routine=Routine::find($id);

        if($routine->delete()){
            return redirect()->route('routine.index')->with('success','Deletion Success');
        }else{
            return redirect()->back()->with('error','Something went wrong. Try again.');
        }

    }








    public function attendanceIndex($id){
        if($id=='id'){
            $attendances=[];
        }
        else{
            $attendances = Attendence::join('user_infos','attendences.user_id','=','user_infos.user_id')
                ->where('course_id',$id)
                ->groupBy('attendences.user_id','user_infos.regid')
                ->select('attendences.user_id','user_infos.regid', DB::raw('count(*) as total'))
                ->get();
        }
        $course_id=Routine::distinct()->pluck('course_id');
        $courses=Course::whereIn('id',$course_id)->get();
        return view('routine.attendance')->with('attendances',$attendances)->with('courses',$courses)->with('thiscourse_id',$id);
    }








//    public function attendanceIndexUpdate(Request $request){
//
//        $attendances = Attendence::join('user_infos','attendences.user_id','=','user_infos.user_id')
//            ->where('course_id',$request->course_id)
//            ->groupBy('attendences.user_id','user_infos.regid')
//            ->select('attendences.user_id','user_infos.regid', DB::raw('count(*) as total'))
//            ->get();
//
////            ->get();
//
//        $response = array('success' => true, 'data' => $attendances);
//        return response()->json($response);
//    }




    public function attendanceIncrease($user_id,$course_id){
        $new=Attendence::create();
        $new->course_id=$course_id;
        $new->user_id=$user_id;
        $new->save();
        return redirect()->route('attendance.index',$course_id)->with('success','Attendance Updated');
    }


    public function attendanceDecrease($user_id,$course_id){
        $attendance=Attendence::where('user_id',$user_id)->where('course_id',$course_id)->first();
        $attendance->delete();
        return redirect()->route('attendance.index',$course_id)->with('success','Attendance Updated');
    }


}
