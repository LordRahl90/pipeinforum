<?php
/**
 * Created by PhpStorm.
 * User: lordrahl
 * Date: 08/09/2017
 * Time: 2:54 PM
 */
?>
@extends('partials.baselayout')
@section('title','Register')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 breadcrumbf">
                <a href="#">Create New account</a>
            </div>
        </div>
    </div>


    <div class="container">
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
        <div class="row">
            <div class="col-lg-8 col-md-8">

                <!-- POST -->
                <div class="post">
                    <form action="/user/register" class="form newtopic" method="post" id="newUserForm">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="postinfotop">
                            <h2>Create New Account</h2>
                        </div>

                        <div class="accsection networks">
                            <div class="acccap">
                                <div class="userinfo pull-left">&nbsp;</div>
                                <div class="posttext pull-left">
                                    <div class="htext">
                                        <h3>Register With:</h3>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="topwrap">
                                <div class="userinfo pull-left">&nbsp;</div>
                                <div class="posttext pull-left">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4">
                                            <a href="/user/register/facebook" class="btn btn-fb">
                                                <i class="fa fa-facebook"></i>
                                                <span class="font-family:arial">Facebook</span></a>
                                            {{--<div class="fb-login-button" data-max-rows="1" data-size="small"--}}
                                                 {{--data-button-type="continue_with" data-show-faces="true"--}}
                                                 {{--data-auto-logout-link="false" data-use-continue-as="true">--}}
                                            {{--</div>--}}
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <a class="btn btn-tw">
                                                <i class="fa fa-twitter"></i>
                                                Twitter</a>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <a class="btn btn-gp">
                                                <i class="fa fa-google-plus"></i>
                                                Google</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- acc section -->
                        <div class="accsection">
                            <div class="acccap">
                                <div class="userinfo pull-left">&nbsp;</div>
                                <div class="posttext pull-left"><h3>Required Fields</h3>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="topwrap">
                                <div class="userinfo pull-left">
                                    <div class="avatar">
                                        <img src="{{ asset("images/avatar-blank.jpg") }}" alt="" />
                                        <div class="status green">&nbsp;</div>
                                    </div>
                                    <div class="imgsize">60 x 60</div>
                                    <div>
                                        <button type="button" id="addPicture" class="btn">Add</button>
                                    </div>
                                </div>
                                <div class="posttext pull-left">

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <input type="text" placeholder="First Name" class="form-control required"
                                           name="first_name" />
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <input type="text" placeholder="Last Name" class="form-control required"
                                                   name="last_name" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <input type="text" placeholder="User Name" class="form-control required"
                                                   name="username" />
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <input type="text" placeholder="Email" class="form-control required"
                                                   name="email" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <input type="password" placeholder="Password" class="form-control"
                                                   id="pass" name="password" />
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <input type="password" placeholder="Retype Password" class="form-control"
                                                   id="pass2" name="confirm_password" />
                                        </div>
                                    </div>

                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div><!-- acc section END -->



                        <!-- acc section -->
                        <div class="accsection privacy">
                            <div class="acccap">
                                <div class="userinfo pull-left">&nbsp;</div>
                                <div class="posttext pull-left"><h3>Privacy</h3></div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="topwrap">
                                <div class="userinfo pull-left">&nbsp;</div>
                                <div class="posttext pull-left">

                                    <div class="row newtopcheckbox">
                                        <div class="col-lg-6 col-md-6">
                                            <div><p>Who can see my Profile?</p></div>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="radio" id="everyone" name="visibility"
                                                                   value="Everyone" />
                                                            Everyone
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="radio" id="friends" name="visibility"
                                                                   value="just_friends"  />
                                                            Only
                                                            Friends
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <div>
                                                <p>Share posts on Social Networks</p>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3 col-md-4">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" id="fb"/> <i class="fa fa-facebook-square"></i>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-4">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" id="tw" /> <i class="fa fa-twitter"></i>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-4">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" id="gp"  /> <i class="fa fa-google-plus-square"></i>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div><!-- acc section END -->

                        <div class="postinfobot">

                            <div class="notechbox pull-left">
                                <input type="checkbox" name="note" id="note" class="form-control" />
                            </div>

                            <div class="pull-left lblfch">
                                <label for="note"> I agree with the Terms and Conditions of this site</label>
                            </div>

                            <div class="pull-right postreply">
                                <div class="pull-left smile"><a href="#"><i class="fa fa-smile-o"></i></a></div>
                                <div class="pull-left">
                                    <button type="button" id="registerUserButton" class="btn btn-primary">
                                        Sign Up
                                    </button>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div><!-- POST -->
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>

        function checkLoginState(){
            FB.getLoginStatus(function(response) {
                statusChangeCallback(response);
            });
        }

        function statusChangeCallBack(response) {
            console.log(response);
        }


        $(function(){
            $("#registerUserButton").click(function(){
                $("#newUserForm").submit();
            });
        });
    </script>


@endsection
