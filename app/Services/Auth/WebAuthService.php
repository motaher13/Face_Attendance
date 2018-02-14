<?php
/**
 * Created by PhpStorm.
 * User: vivacom
 * Date: 6/8/17
 * Time: 11:37 AM
 */

namespace App\Services\Auth;


use App\BaseSettings\Settings;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebAuthService
{
    /**
     * @var UserService
     */
    private $userService;

    /**
     * WebAuthService constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @param $request
     * @return bool
     */
    public function signIn($request)
    {

        return Auth::attempt($this->getCredentials($request),$request->has('remember'));
    }

    /**
     * @param Request $request
     * @return array
     */
    private function getCredentials(Request $request)
    {
        return [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];
    }

    public function register(Request $request)
    {
        $password = bcrypt($request->get('password'));
        $request->merge(['password' => $password]);
        $data = $request->only(['username','email','password']);
        $user =  $this->userService->create($data);

        if($request->role==3 || $request->role==4){
            $user->flag=0;
        }
        else{
            $user->flag=(int)$request->role;
        }
        $user->save();

        if($user->flag==1)
            $user->assignRole('business');
        elseif ($user->flag==2)
            $user->assignRole('employee');
        elseif ($request->role==3)
            $user->assignRole('selfteach');
        elseif ($request->role==4)
            $user->assignRole('tutor');

        return $user;
    }


    public function resetPassword(Request $request)
    {
        $password = bcrypt($request->get('password'));
        $request->merge(['password' => $password]);
        $data = $request->only(['password']);
        $user =  $this->userService->update($data,\auth()->user()->id);
        return $user;
    }
}