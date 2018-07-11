<?php
/**
 * Created by PhpStorm.
 * User: vivacom
 * Date: 6/1/17
 * Time: 5:54 PM
 */

namespace App\Services;


use App\Models\UserInfo;
use App\Repositories\userInfoRepository;
use Illuminate\Support\Facades\DB;
use App\BaseSettings\Settings;
use Illuminate\Http\Request;


class userInfoService extends BaseService
{

    private $userInfoRepository;


    /**
     * userInfoService constructor.
     * @param $userInfoRepository $userRepository
     */
    public function __construct(userInfoRepository $userInfoRepository)
    {
        $this->userInfoRepository = $userInfoRepository;

    }




    /**
     * return Repository instance
     *
     * @return mixed
     */
    public function baseRepository()
    {
        return $this->userInfoRepository;
    }

    public function storeInfo($id,Request $request)
    {

        $data=$request->only(['name','address','phone']);
        $data['user_id']=$id;
        //return $data;
        $userInfo =  $this->create($data);
        return $userInfo;
    }
}