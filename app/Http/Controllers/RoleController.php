<?php

namespace App\Http\Controllers;

use App\Http\Requests\BusinessRoleRequest;
use App\Http\Requests\EmployeeRoleRequest;
use App\Models\Business;
use App\Models\BusinessEmployee;
use App\Models\BusinessVerification;
use App\Models\UserInfo;
use App\Services\BusinessService;
use App\Services\EmployeeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;

class RoleController extends Controller
{

    private $businessService;
    private $employeeService;





    public function __construct(BusinessService $businessService,EmployeeService $employeeService)
    {
        $this->businessService=$businessService;
        $this->employeeService=$employeeService;
    }







    public function chooseRole(){

        if($this->businessService->count('owner_id') || $this->employeeService->count('user_id')){
            return redirect()->route('dashboard.main');
        }
        return view('role/choose-role');
    }







    public function setRole($category){
        if($category==1){
            return view('role/business-role');
        }
        elseif ($category==2){
            return view('role/employee-role');
        }
        elseif ($category==3 || $category==4){
            return redirect()->route('dashboard.main');
        }
    }










    public function businessRole(BusinessRoleRequest $request){
        //return $request;
        try{
            $business=$this->businessService->store($request);
            $user=auth()->user();
            //$user->assignRole('business');
            if(Auth::check()){
                return redirect()->route('dashboard.main');
            }else{
                return redirect()->route('login');
            }


        }catch (\Exception $e){
            return redirect()->back()->withInput()->with('error','something went wrong. Try again.');
        }
    }







    public function employeeRole(EmployeeRoleRequest $request){
        //return $request;
        try{
            $businessId=BusinessVerification::where('code',$request->pin)->first()->business_id;
            //return $businessId;
            if($businessId){
                $data['business_id']=$businessId;
                $data['user_id']=Auth::id();
                $business_employee=$this->employeeService->store($data);
                $user=auth()->user();
                $user->flag=0;
                $user->save();
                return redirect()->route('dashboard.main');
            }
        }catch (\Exception $e){
            return redirect()->back()->withInput()->with('error','something went wrong. Try again.');
        }

    }




}
