<?php
/**
 * Created by PhpStorm.
 * User: lordrahl
 * Date: 11/09/2017
 * Time: 1:28 PM
 */
?>
@extends('partials.baselayout')
@section('title',"New Forum Post")
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
    </div>

    <!-- POST -->
    <div class="post">
        <form action="/user/post/create" class="form newtopic" method="post" id="newPostForm">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="topwrap">
                <div class="userinfo pull-left">
                    <div class="avatar">
                        <img src="{{ asset("images/avatar4.jpg") }}" alt="">
                        <div class="status red">&nbsp;</div>
                    </div>

                    <div class="icons">
                        <img src="{{ asset("images/icon3.jpg") }}" alt="">
                        <img src="{{ asset("images/icon4.jpg") }}" alt="">
                        <img src="{{ asset("images/icon5.jpg") }}" alt="">
                        <img src="{{ asset("images/icon6.jpg") }}" alt="">
                    </div>
                </div>
                <div class="posttext pull-left">

                    <div>
                        <input type="text" placeholder="Enter Topic Title" class="form-control required" name="title">
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <select name="category" id="category" class="form-control required">
                                <option value="" disabled="" selected="">Select Category</option>
                                @if(count($categories)>0)
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <select name="subcategory" id="subcategory" class="form-control required">
                                <option value="" disabled="" selected="">Select Subcategory</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <textarea name="content" id="content" placeholder="Description" class="form-control required
"></textarea>
                    </div>
                    <div class="row newtopcheckbox">
                        <div class="col-lg-6 col-md-6">
                            <div><p>How do you want to post this?</p></div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="checkbox">
                                        <label>
                                            <input name="poster" type="checkbox" id="everyone"> Anonymous
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div>
                                <p>Share on Social Networks</p>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" id="fb"> <i class="fa fa-facebook-square"></i>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" id="tw"> <i class="fa fa-twitter"></i>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" id="gp"> <i class="fa fa-google-plus-square"></i>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="clearfix"></div>
            </div>
            <div class="postinfobot">

                <div class="notechbox pull-left">
                    <input type="checkbox" name="notify" id="note" class="form-control">
                </div>

                <div class="pull-left">
                    <label for="note"> Email me when some one post a reply</label>
                </div>

                <div class="pull-right postreply">
                    <div class="pull-left smile"><a href="#"><i class="fa fa-smile-o"></i></a></div>
                    <div class="pull-left"><button type="button" id="newPostButton" class="btn
                    btn-primary">Post</button></div>
                    <div class="clearfix"></div>
                </div>


                <div class="clearfix"></div>
            </div>
        </form>
    </div><!-- POST -->

    <div class="row similarposts">
        <div class="col-lg-10"><i class="fa fa-info-circle"></i> <p>Similar Posts according to your <a href="http://forum.azyrusthemes.com/03_new_topic.html#">Topic Title</a>.</p></div>
        <div class="col-lg-2 loading"><i class="fa fa-spinner"></i></div>
    </div>
@endsection

@section('script')
    <script>
        $(function(){

            $("#content").summernote();

           $("#category").change(function(){
               var category=$(this).val();

               if(category!=""){
                    $.get('/fetch/category/'+category, function(data){
                       var sub_categories=data.sub_categories;
                       console.log(data);

                       if(sub_categories.length > 0){
                           $("#subcategory").empty();
                           $("#subcategory").append('<option value="" disabled="disabled" ' +
                               'selected="selected>Select Sub-Category</option>');
                           $.each(sub_categories, function(i,v){
                                $("#subcategory").append('<option value="'+v.id+'">'+v.sub_category+'</option>');
                           });
                       }
                    });
               }
           });


           $("#newPostForm").ajaxForm(function(data){
               if(data.status!='success'){
                   error(data.message);
                   return;
               }

               success(data.message);
               location.reload();
           });


           $("#newPostButton").click(function(){
               $("#newPostForm").submit();
           });

        });
    </script>
@endsection