<?php

namespace App\Http\Controllers;

use App\Models\Attendence;
use App\Models\Routine;
use App\Models\UserInfo;
use Illuminate\Http\Request;


class FaceDetectionController extends Controller
{

    public function detectWebcam(Request $request,$room)
    {


        $path = null;
        if (!empty($request->namafoto)) {
            $encoded_data = $request->namafoto;
            $binary_data = base64_decode($encoded_data);

            // save to server (beware of permissions // set ke 775 atau 777)
            $namafoto = uniqid() . ".png";
            $result = file_put_contents('upload/' . $namafoto, $binary_data);
            if (!$result) die("Could not save image!  Check file permissions.");
//            $path=storage_path('upload/'.$namafoto);
//            cant use $path because it writes "Public" folder a "storage"
//
            $command = "python /home/motaher/Desktop/openface-master/demos/classifier.py infer /home/motaher/Desktop/openface-master/data/nishi-feature/classifier.pkl /home/motaher/Desktop/Work/Attendence_System/public/upload/" . $namafoto;
            $output = shell_exec($command);

            $reg=explode("_",$output);
            $reg=(int)$reg[sizeof($reg)-1];
//            $reg=2014331013;

            $user_info=UserInfo::where('regid',$reg)->first();
            $routine=Routine::where('room','=',$room)->first();
            $attendance=Attendence::create(['user_id'=>$user_info->user->id,'course_id'=>$routine->course_id]);
//            $attendance->user_id=;
//            $attendance->course_id=;
//            $attendance->save();

            $response = array('success' => true, 'data' => $output);
            return response()->json($response);
//            return $output;
        }

        return $path;
    }
}
