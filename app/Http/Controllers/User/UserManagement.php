<?php

namespace App\Http\Controllers\User;

use App\Utility\Utility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Models\UserRepository as User;
use Illuminate\Support\Facades\Hash;

class UserManagement extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.register');
    }

    /**
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request,User $user)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|email|unique:users,email',
            'username'=>'required|unique:users,username',
            'password'=>'required:min:6',
            'confirm_password'=>'required|same:password',
            'visibility'=>'required',
            'note'=>'required'
        ]);

        $payload=[
            'first_name'=>$request->get('first_name'),
            'last_name'=>$request->get('last_name'),
            'username'=>$request->get('username'),
            'email'=>$request->get('email'),
            'password'=>Hash::make($request->get('password')),
            'visibility'=> $request->get('visibility')=='Everyone'? true:false
        ];
        $newUser=$user->create($payload);

        if(!$newUser){
            return Utility::error("An error occurred... Please try again");
        }

        return Utility::success("User Created Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
