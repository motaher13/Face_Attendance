<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\UserLogin;
use App\Http\Requests\Auth\UserRegistration;
use App\Services\Auth\WebAuthService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * @var WebAuthService
     */
    private $webAuthService;

    /**
     * AuthController constructor.
     * @param WebAuthService $webAuthService
     */
    public function __construct(WebAuthService $webAuthService)
    {
        $this->webAuthService = $webAuthService;
    }


    public function login()
    {
        return view('auth.login');
    }

    public function doLogin(UserLogin $request)
    {
        $isSignedIn = $this->webAuthService->signIn($request);
        if($isSignedIn){
            return redirect()->route('dashboard.main')->with('success','Welcome back!');
        }
        return redirect()->back()->withInput($request->all())->with('error','Invalid Email/Password.');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        if(Auth::check()){
            Auth::logout();
            return redirect()->route('web.login')->with('success','You have now been signed out.');
        }
        return redirect()->route('web.login')->with('error','You need to login first.');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function doRegister(UserRegistration $request)
    {
        try{
            $user = $this->webAuthService->register($request);
            if($user){
                Auth::login($user);
                return redirect()->route('dashboard.main')->with('success','Welcome, Your account created successfully.');
            }
        }catch (\Exception $exception){
            return redirect()->back()->withInput()->with('error','something went wrong. Try again.');
        }
    }

    public function reset()
    {
        return view('auth.password-reset')->with('user',Auth::user());
    }
    

    public function doReset(Request $request)
    {
        $rules = [
            'password' => 'required|confirmed'
        ];
        $this->validate($request,$rules);
        $user = $this->webAuthService->resetPassword($request);
        if($user){
            return redirect()->back()->with('success','Password Updated Successfully');
        }
        return redirect()->back()->with('error','Something went wrong. Try again.');
    }

    
}
