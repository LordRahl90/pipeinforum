<?php
/**
 * Created by PhpStorm.
 * User: lordrahl
 * Date: 08/09/2017
 * Time: 8:30 PM
 */
?>
@extends('partials.baselayout')
@section('content')
    <div class="post">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <form class="form newtopic">

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
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>
@endsection