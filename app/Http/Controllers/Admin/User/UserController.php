<?php

namespace App\Http\Controllers\Admin\User;

use App\Repositories\Models\AdminUserRepository;
use App\Repositories\Models\UserRepository;
use App\Utility\Utility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function loadLogin(){
        return view('admin.access.login');
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function loadDashboard(){
        if(!auth()->check()){
            return redirect('/');
        }
        return view("admin.dashboard");
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showApproveAdmin(){
        return view("admin.user.addAdmin");
    }


    /**
     * @param UserRepository $userRepository
     * @return \Illuminate\Http\JsonResponse
     */
    public function returnUserDetails(UserRepository $userRepository){
        $email=Input::get('email');

        $v=Validator::make(Input::all(),[
          'email'=>'email|required|exists:users,email'
        ]);

        if($v->fails()){
            return Utility::error($v->messages()->all());
        }

        return Utility::success($userRepository->findBy('email',$email));
    }


    /**
     * @param AdminUserRepository $adminUserRepository
     * @return \Illuminate\Http\JsonResponse
     */
    public function approveAdmin(AdminUserRepository $adminUserRepository){

        $user_id=Input::get('user_id');

        $checkExistence=$adminUserRepository->findBy('user_id',$user_id);

        if(count($checkExistence)>0){
            return Utility::error("User Is an Admin Already");
        }

        $newAdmin=$adminUserRepository->create([
            'user_id'=>$user_id
        ]);

        if(!$newAdmin){
            return Utility::databaseError();
        }

        return Utility::success("Admin Added Successfully!");
    }


    /**
     * @param AdminUserRepository $adminUserRepository
     * @return \Illuminate\Http\JsonResponse
     */
    public function removeAdmin(AdminUserRepository $adminUserRepository){
        $user_id=Input::get('user_id');

        $checkExistence=$adminUserRepository->findBy('user_id',$user_id);

        if(count($checkExistence)<=0){
            return Utility::error("User Is not an Admin");
        }

        $removeUser=$adminUserRepository->delete($checkExistence->id);

        if(!$removeUser){
            return Utility::databaseError();
        }

        return Utility::success("User Removed successfully!!");
    }


    public function listAdminUsers(AdminUserRepository $adminUserRepository){
        $users=$adminUserRepository->orderBy('user_id','asc');
        return view('admin.user.listUsers',['users'=>$users]);
    }

    public function approveModerator(){

    }

    public function login(){
        $v=Validator::make(Input::all(),[
            'email'=>'required|exists:users,email',
            'password'=>'required'
        ]);

        if($v->fails()){
            return redirect()->back()->withErrors(['error'=>$v->messages()->all()]);
        }

        if(!Auth::attempt(['email'=>Input::get('email'),'password'=>Input::get('password')])){
            return redirect()->back()->withErrors(['error'=>"Password does not match ".Input::get('email')]);
        }

        return redirect('/admin/dashboard');
    }
}
