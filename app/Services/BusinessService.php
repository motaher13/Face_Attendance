<?php
/**
 * Created by PhpStorm.
 * User: Motaher
 * Date: 2/10/2018
 * Time: 7:07 PM
 */

namespace App\Services;

use App\Models\Business;
use App\Repositories\BusinessRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\BaseSettings\Settings;
use Illuminate\Http\Request;


class BusinessService extends BaseService
{
    private $businessRepository ;


    /**
     * userInfoService constructor.
     * @param $BusinessRepository $userRepository
     */
    public function __construct(BusinessRepository $businessRepository)
    {
        $this->businessRepository = $businessRepository;

    }




    /**
     * return Repository instance
     *
     * @return mixed
     */

    public function baseRepository()
    {
        return $this->businessRepository;
    }

    public function store(Request $request)
    {

        $data=$request->only(['title','address','phone']);
        $data['owner_id']=Auth::id();
        //return $data;
        $business =  $this->create($data);
        $user=\auth()->user();
        $user->flag=0;
        $user->save();
        return $business;
    }

    public function count($attribute){
        return (Business::where($attribute,Auth::id())->get())->count();
    }
}