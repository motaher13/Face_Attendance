<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserInfo;
use Illuminate\Support\Facades\Auth;
use App\Services\UserService;


class UserController extends Controller
{
    private $userService;

    /**
     * AuthController constructor.
     * @param WebAuthService $webAuthService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function profile()
    {
        return view('auth.profile')->with('user',Auth::user());
    }

    public function profileUpdate(Request $request)
    {
    	
    	$user= $this->userService->profileUpdate($request);
        if($user){
        	return redirect()->back()->with('user',$user)->with('success','Your profile is updated successfully.');
    	}
        return redirect()->back()->with('error','Something went wrong. Try again.');


    }
    
    public function profilePicChange()
    {
        return view('auth.profile-pic-change')->with('user',Auth::user());
    }

    public function doProfilePicChange(Request $request)
    {

        if($request->hasFile('photo')){
    		$user= $this->userService->profilePicUpdate($request);
    		if($user){
        		return redirect()->back()->with('user',$user)->with('success','Your Profile Picture is updated successfully.');
    		}
        }
        return redirect()->back()->with('error','Please, Upload your picture.'); 
        
        
    }
}
