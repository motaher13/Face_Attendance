<?php
/**
 * Created by PhpStorm.
 * User: vivacom
 * Date: 6/1/17
 * Time: 5:12 PM
 */

namespace App\Repositories;



use App\Models\Education;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\BaseSettings\Settings;



class UserRepository extends Repository
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return User::class;
    }

    /**
     * Filter data based on user input
     *
     * @param array $filter
     * @param       $query
     */
    public function filterData(array $filter, $query)
    {
        // TODO: Implement filterData() method.
    }

    public function updateUserInfo(array $data)
    {
        $user=Auth::user();
        $userInfo=UserInfo::where('user_id',$user->id)->first();
        if (is_null($userInfo)) {
            $userInfo=new UserInfo;
            $userInfo->user_id=$user->id;
        }
        $user->email=$data['email'];
        $user->save();
        $userInfo->name=$data['name'];
        $userInfo->phone=$data['phone'];
        $userInfo->save();
        return $user;
    }

    public function createTeacherInfo(array $data)
    {
        $userInfo=new UserInfo;
        $userInfo->user_id=$data['user_id'];
        $userInfo->name=$data['name'];
        $userInfo->phone=$data['phone'];
        $userInfo->status=$data['status'];
        $userInfo->save();

    }


    public function createStudentInfo(array $data)
    {
        $userInfo=new UserInfo;
        $userInfo->user_id=$data['user_id'];
        $userInfo->name=$data['name'];
        $userInfo->phone=$data['phone'];
        $userInfo->session=$data['session'];
        $userInfo->regid=$data['regid'];
        $userInfo->status=$data['status'];
        $userInfo->save();

    }

    public function updateProfileName($fileName)
    {
        $user=Auth::user();
        $user->userInfo->photo = Settings::$upload_path . $fileName;
        $user->userInfo->save();
        return $user;
         
    }
}