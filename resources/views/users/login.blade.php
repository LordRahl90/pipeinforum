<?php
/**
 * Created by PhpStorm.
 * User: lordrahl
 * Date: 08/09/2017
 * Time: 2:54 PM
 */
?>
@extends('partials.baselayout')
@section('title','Login')
@section('content')

    <div class="row" style="padding-left: 5%; padding-right: 5%; padding-top:2%">
        @if(session('errors'))
            <div class="row alert alert-danger alert-dismissable">
                <ul style="list-style: none">
                    @foreach(session('errors')->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('message'))
            <div class="row alert alert-success alert-dismissable">
                {{ session('message') }}
            </div>
        @endif
    </div>

    <div class="post">
        <form action="/user/login" class="form newtopic" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="postinfotop">
                <h2>Create New Account</h2>
            </div>

            <!-- acc section -->
            <div class="accsection">
                <div class="acccap">
                    <div class="userinfo pull-left">&nbsp;</div>
                    <div class="posttext pull-left"><h3>Required Fields</h3></div>
                    <div class="clearfix"></div>
                </div>
                <div class="topwrap">
                    <div class="posttext" style="padding-left: 10%;">
                        <div class="row">
                            <div class="col-lg-3 col-md-3">
                                <label>Username:</label>
                            </div>
                            <div class="col-lg-9 col-md-9">
                                <input type="text" placeholder="Username" class="form-control required"
                                       name="username" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-3">
                                <label>Password:</label>
                            </div>
                            <div class="col-lg-9 col-md-9">
                                <input type="password" placeholder="Password" class="form-control required"
                                       name="password" />
                            </div>
                        </div>

                        <div style="padding-top:2%; padding-bottom: 7%;">
                            <div class="pull-right postreply">
                                <div class="pull-left">
                                    <button type="submit" class="btn btn-primary" id="signInButton">Sign
                                        In</button>
                                </div>
                            </div>
                        </div>

                        <div class="accsection networks">
                            <div class="acccap">
                                <div class="userinfo pull-left">&nbsp;</div>
                                <div class="posttext pull-left">
                                    <div class="htext">
                                        <h3>Login With:</h3>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="topwrap">
                                <div class="userinfo pull-left">&nbsp;</div>
                                <div class="posttext pull-left">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <button class="btn btn-fb">
                                                <i class="fa fa-facebook"></i>
                                                Login Facebook Account</button>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <button class="btn btn-sm-group btn-tw">
                                                <i class="fa fa-twitter"></i>
                                                Login Twitter Account</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div><!-- acc section END -->
        </form>
    </div><!-- POST -->
@endsection
