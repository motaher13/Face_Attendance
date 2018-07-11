<?php
/**
 * Created by PhpStorm.
 * User: Motaher
 * Date: 2/10/2018
 * Time: 7:45 PM
 */

namespace App\Services;


use App\Models\BusinessEmployee;
use App\Repositories\EmployeeRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\BaseSettings\Settings;
use Illuminate\Http\Request;

class EmployeeService Extends BaseService
{


    private $employeeRepository ;


    /**
     * userInfoService constructor.
     * @param $BusinessRepository $userRepository
     */
    public function __construct(EmployeeRepository $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;

    }




    /**
     * return Repository instance
     *
     * @return mixed
     */
    public function baseRepository()
    {
        return $this->employeeRepository;
    }

    public function store($data)
    {
        $business_employee =  $this->create($data);
        return $business_employee;
    }

    public function count($attribute){
        return (BusinessEmployee::where($attribute,Auth::id())->get())->count();
    }
}