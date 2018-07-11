<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

use Illuminate\Support\Facades\Auth;
use App\Services\UserService;


class UserController extends Controller
{
    private $userService;

    /**
     * UserController constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @return $this
     */
    public function studentIndex()
    {
        $students= UserInfo::where('status','student')->get();
        return view('admin.user.student-index')->with('students',$students);
    }



    public function teacherIndex()
    {
        $teachers= UserInfo::where('status','teacher')->get();
        return view('admin.user.teacher-index')->with('teachers',$teachers);
    }



    public function profile()
    {
        return view('auth.profile')->with('user',Auth::user());
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
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



    public function createTeacher()
    {
        return view('admin.user.create-teacher');
    }



    public function createStudent()
    {
        return view('admin.user.create-student');
    }

    public function storeStudent(Request $request)
    {
        $user= $this->userService->storeUserWithRole($request);
        if($user){
            return redirect()->route('student.index')->with('success','Student created successfully.');
        }
        return redirect()->back()->with('error','Something went wrong. Try again.');
    }


    public function storeTeacher(Request $request)
    {
        $user= $this->userService->storeUserWithRole($request);
        if($user){
            return redirect()->route('teacher.index')->with('success','Teacher created successfully.');
        }
        return redirect()->back()->with('error','Something went wrong. Try again.');
    }



    public function edit($id)
    {
        $user = $this->userService->find($id);
        //$roles = $this->roleService->getRolesExceptOne(Settings::$client_role);

        return view('admin.user.edit')->with( 'user', $user );
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        if ($request->has('password')) {
            if ($request->has('password_confirmation')) {
                if ( $request->password == $request->password_confirmation ) {
                    $user= $this->userService->updateUser($request,$id);
                }else
                    $user = null;

            }else
                $user = null;

        }else
            $user= $this->userService->updateUser($request,$id);

        if($user){
            return redirect()->route('user.index')->with('success','Changes Saved');
        }
        return redirect()->back()->withInput()->with('error','Something went wrong. Try again.');
    }
    /**
     * @param $id
     * @return $this|mixed
     */
    public function show($id)
    {
        $user = $this->userService->find($id);
        //$roles = $this->roleService->getRolesExceptOne(Settings::$client_role);
        return view('admin.user.show')
            ->with('user', $user);
            //->with('roles', $roles);
    }
    public function delete($id)
    {
        $status = $this->userService->delete($id);
        if($status){
            return redirect()->route('user.index')->with('success','Deletion Success');
        }
        return redirect()->back()->with('error','Something went wrong. Try again.');
    }



}
