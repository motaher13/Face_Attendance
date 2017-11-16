<?php
/**
 * Created by PhpStorm.
 * User: vivacom
 * Date: 6/1/17
 * Time: 5:54 PM
 */

namespace App\Services;


use App\Repositories\UserRepository;
use Illuminate\Support\Facades\DB;
use App\BaseSettings\Settings;
use Illuminate\Http\Request;


class UserService extends BaseService
{
    /**
     * @var UserRepository
     */
    private $userRepository;
    private $fileUploadService;

    /**
     * UserService constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository,FileUploadService $fileUploadService)
    {
        $this->userRepository = $userRepository;
        $this->fileUploadService=$fileUploadService;
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try{
            //DB::table('model_has_roles')->where('model_id',$id)->delete();
            //DB::table('model_has_permissions')->where('model_id',$id)->delete();
            $status =  $this->userRepository->delete($id);
            DB::commit();
            return $status;
        }catch (\Exception $exception){
            DB::rollBack();
        }
    }


    /**
     * return Repository instance
     *
     * @return mixed
     */
    public function baseRepository()
    {
        return $this->userRepository;
    }

    public function profileUpdate(Request $request)
    {
        $data = $request->only(['name','email','phone','occupation','about']);
        $user =  $this->userRepository->updateUserInfo($data);
        return $user;
    }

    public function profilePicUpdate(Request $request)
    {
        $fileName=$this->fileUploadService->saveFile($request->file('photo'),Settings::$upload_path);
        $user =  $this->userRepository->updateProfileName($fileName);
        return $user;
    }

    public function storeUserWithRole ( $request )
    {
        $password=bcrypt($request->get('password'));
        $request->merge(['password'=>$password]);
        $userData=$request->only(['name', 'email', 'password']);
        $user=$this->userRepository->create($userData);
        //$user->assignRole($request->role);
//        $userInfoData = [
//            'user_id' => $user->id,
//            'name' => $request->name,
//            'phone' => $request->phone,
//            'occupation' => $request->occupation,
//            'about' => $request->about,
//        ];
//        $userInfo=$this->userInfoRepository->create($userInfoData);
        return $user;
//            [
//            'user'=> ,
//            //'userInfo'=> $userInfo
//        ];
    }

    /**
     * @param $request
     * @param $id
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function updateUser ( $request, $id )
    {
        if ($request->has('password')) {
            $password=bcrypt($request->get('password'));
            $request->merge(['password'=>$password]);
            $userData = $request->only( 'name', 'email', 'password' );
        }else
            $userData = $request->only( 'name', 'email' );

        $user = $this->userRepository->update( $userData, $id );
        // $userInfoData = $request->only( 'name', 'phone', 'occupation', 'about' );
        //$userInfoData = $request->only( 'name', 'about' );
        //$userInfo = $this->userInfoRepository->updateUserInfoByUserId( $userInfoData, $id );
        return $user;
    }
}