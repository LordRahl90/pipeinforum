<?php
/**
 * Created by PhpStorm.
 * User: lordrahl
 * Date: 12/09/2017
 * Time: 10:40 PM
 */

?>
@extends('partials.dashboard-partials')
@section('page-title',"Add Admin Users")
@section('page-content')
    {!! Form::open() !!}

    <input type="hidden" name="user_id" value="" id="user_id" />
    <div class="col-md-12 col-lg-12">
        <div class="col-md-8">
            <div class="row">
                <label class="col-md-2" for="category">User Email</label>
                <div class="col-md-10">
                    <input type="email" class="form-control" name="email" id="email" placeholder=
                    "Enter User Email">
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <button type="button" class="btn btn-default" id="searchUser">Search User</button>
        </div>
    </div>

    <div class="row" id="user-details" style="display: none">
        <ul style="list-style: none">
            <li id="firstname"></li>
            <li id="lastname"></li>
            <li id="username"></li>
        </ul>
    </div>


    <div class="col-md-12" style="padding-top: 2%; display: none;" id="buttonsContent">
        <div class="col-md-6" align="center">
            <button id="add-as-admin" class="btn btn-primary" type="button">Add User As Admin</button>
        </div>

        <div class="col-md-6" align="left">
            <button id="remove-as-admin" class="btn btn-danger" type="button">Remove User from Admin</button>
        </div>
    </div>


    {!! Form::close() !!}
@endsection
@section('scripts')
    <script>
        $(function(){

            $("#searchUser").click(function(){
               var email=$("#email").val();

               if(email==""){
                   return;
               }

               $.post('/admin/user/details',{_token:'{{ csrf_token() }}',email:email}, function(data){
                   if(data.status!='success'){
                       error(data.message);
                       return;
                   }

                   $("#buttonsContent").slideDown();
                    var user=data.message;
                        console.log(user);
                        $("#firstname").text(user.first_name);
                        $("#lastname").text(user.last_name);
                        $("#username").text(user.username);
                        $("#user_id").val(user.id);
                   $("#user-details").slideDown();
               });

            });


            $("#add-as-admin").click(function(){
                var user_id=$("#user_id").val();

                if(user_id=="" || user_id==undefined){
                    error("Provide a valid user")
                    return;
                }

                $.post('/admin/user/create',{_token:'{{ csrf_token() }}',user_id:user_id}, function(data){
                    if(data.status!='success'){
                        error(data.message);
                        return;
                    }
                    success(data.message);
                });

            });
            
            
            $("#remove-as-admin").click(function () {
                var user_id=$("#user_id").val();

                if(user_id=="" || user_id==undefined){
                    error("Provide a valid user")
                    return;
                }

                $.post('/admin/user/delete',{_token:'{{ csrf_token() }}',user_id:user_id}, function(data){
                    console.log(data);
                    if(data.status!='success'){
                        error(data.message);
                        return;
                    }
                    success(data.message);
                });

            });

        });
    </script>
@endsection