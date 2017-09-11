<?php
/**
 * Created by PhpStorm.
 * User: lordrahl
 * Date: 08/09/2017
 * Time: 2:47 PM
 */

$comments=\App\Utility\Utility::collection_paginate($post->comments,5);

//dd($comments);
?>
@extends('partials.index-partial')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 breadcrumbf">
                <a href="/">PipeIn</a>
                <span class="diviver">&gt;</span>
                <a href="#">{{ $post->sub_category->sub_category }}</a>
                <span class="diviver">&gt;</span>
                <a href="#">{{ ucfirst($post->title) }}</a>
            </div>
        </div>
    </div>

    @if(session('errors'))
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-xs-12">
                    <div class="row alert alert-danger alert-dismissable">
                        <ul style="list-style: none">
                            @foreach(session('errors')->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <!-- POST -->
                <div class="post beforepagination">
                    <div class="topwrap">
                        <div class="userinfo pull-left">
                            <div class="avatar">
                                <img src="{{ asset("images/avatar.jpg") }}" alt="" />
                                <div class="status green">&nbsp;</div>
                            </div>

                            <div class="icons">
                                <div class="icons">
                                    <img src="{{ asset("images/icon1.jpg") }}" alt="" />
                                    <img src="{{ asset("images/icon4.jpg") }}" alt="" />
                                    <img src="{{ asset("images/icon5.jpg") }}" alt="" />
                                    <img src="{{ asset("images/icon6.jpg") }}" alt="" />
                                </div>
                            </div>
                        </div>
                        <div class="posttext pull-left">
                            <h2>{{ $post->title }}</h2>
                            <p align="justify">
                                {!! $post->content !!}
                            </p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="postinfobot">

                        <div class="likeblock pull-left">
                            <a href="#" class="up"><i class="fa fa-thumbs-o-up"></i>25</a>
                            <a href="#" class="down"><i class="fa fa-thumbs-o-down"></i>3</a>
                        </div>

                        <div class="prev pull-left">
                            <a href="#comment"><i class="fa fa-reply"></i></a>
                        </div>

                        {{--<div class="posted pull-left"><i class="fa fa-clock-o"></i> Posted on : 20 Nov @ 9:30am</div>--}}
                        <div class="posted pull-left"><i class="fa fa-clock-o"></i> Posted on : {{ Date('D M @ H:i',
                        strtotime($post->created_at)) }}</div>

                        <div class="next pull-right">
                            <a href="#"><i class="fa fa-share"></i></a>

                            <a href="#"><i class="fa fa-flag"></i></a>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                </div><!-- POST -->

                <div class="row similarposts" style="padding-top: 2%">
                    <div class="col-lg-10">
                        <i class="fa fa-info-circle"></i>
                        <p>
                            Comments to  <a href="#">{{ $post->title }}</a>
                        </p></div>
                    <div class="col-lg-2 loading"><i class="fa fa-spinner"></i></div>
                </div>

                @if(count($comments)>0)

                    <div class="paginationf">
                        {!! $comments->links() !!}
                        <div class="clearfix"></div>
                    </div>

                    @foreach($comments as $comment)
                        <!-- POST -->
                            <div class="post">
                                <div class="topwrap">
                                    <div class="userinfo pull-left">
                                        <div class="avatar">
                                            <img src="{{ asset("images/icon3.jpg") }}" alt="" />
                                            <div class="status red">&nbsp;</div>
                                        </div>

                                        <div class="icons">
                                            <img src="{{ asset("images/icon3.jpg") }}" alt="" />
                                            <img src="{{ asset("images/icon4.jpg") }}" alt="" />
                                            <img src="{{ asset("images/icon5.jpg") }}" alt="" />
                                            <img src="{{ asset("images/icon6.jpg") }}" alt="" />
                                        </div>
                                    </div>
                                    <div class="posttext pull-left">
                                        @if($comment->quote_comment_id != null)
                                            <blockquote>
                                                <span class="original">Original Posted by - theguy_21:</span>
                                                Did you see that Dove ad pop up in your Facebook feed this year? How about the Geico camel one?
                                            </blockquote>
                                        @endif

                                        <p class="main_comment">{!! $comment->comment !!}</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="postinfobot">

                                    <div class="likeblock pull-left">
                                        <a href="#" class="up"><i class="fa fa-thumbs-o-up"></i>55</a>
                                        <a href="#" class="down"><i class="fa fa-thumbs-o-down"></i>12</a>
                                    </div>

                                    <div class="prev pull-left">
                                        <input type="hidden" name="comment_id" class="comment_id" value="{{ $comment->id }}" />
                                        <input type="hidden" name="comment" class="comment" value="{{ $comment->comment
                                         }}" />
                                        <a href="#"><i class="fa fa-reply reply"></i></a>
                                    </div>

                                    <div class="posted pull-left">
                                        <i class="fa fa-clock-o"></i> Posted on : 20 Nov @ 9:50am</div>
                                    <div class="next pull-right">
                                        <a href="#"><i class="fa fa-share"></i></a>

                                        <a href="#"><i class="fa fa-flag"></i></a>
                                    </div>

                                    <div class="clearfix"></div>
                                </div>
                            </div><!-- POST -->

                    @endforeach

                @else

                @endif


                <!-- POST -->
                <div class="post" id="comment">
                    <form action="/user/comment" class="form" method="post" id="postCommentForm">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="post_id" value="{{ $post->id }}" />
                        
                        <div id="quoted_post" style="display: block; padding:2%;">
                            <input type="hidden" name="quote_comment_id" id="quote_comment_id" value="" />
                            <div class="alert alert-warning alert-dismissable" style="padding-top:2%;" id="removeQuote">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <blockquote id="quoted_content"></blockquote>
                            </div>
                        </div>
                        <div class="topwrap">
                            <div class="userinfo pull-left">
                                <div class="avatar">
                                    <img src="{{ asset("images/avatar4.jpg") }}" alt="" />
                                    <div class="status red">&nbsp;</div>
                                </div>

                                <div class="icons">
                                    <img src="{{ asset("images/icon3.jpg") }}" alt="" />
                                    <img src="{{ asset("images/icon4.jpg") }}" alt="" />
                                    <img src="{{ asset("images/icon5.jpg") }}" alt="" />
                                    <img src="{{ asset("images/icon6.jpg") }}" alt="" />
                                </div>
                            </div>
                            <div class="posttext pull-left">
                                <div class="textwraper">
                                    <div class="postreply">Post a Reply</div>
                                    <textarea name="reply" id="reply" placeholder="Type your message here"></textarea>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="postinfobot">

                            <div class="notechbox pull-left">
                                <input type="checkbox" name="notify" id="notify" class="form-control required" />
                            </div>

                            <div class="pull-left">
                                <label for="note"> Email me when some one post a reply</label>
                            </div>

                            <div class="pull-right postreply">
                                <div class="pull-left smile"><a href="#"><i class="fa fa-smile-o"></i></a></div>
                                <div class="pull-left"><button type="button" id="postReplyButton" class="btn
                                btn-primary">Post
                                        Reply</button></div>
                                <div class="clearfix"></div>
                            </div>

                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div><!-- POST -->
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                {!! $comments->links() !!}
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(function(){
            $("#reply").summernote();

            $("#postReplyButton").click(function(){
                $("#postCommentForm").submit();
            });


            $(".reply").click(function(e){
                e.preventDefault();
                 var comment_id=$(this).closest('div').find('.comment_id').val();
                 var comment=$(this).closest('div').find('.comment').val();

                 $("#quoted_content").html(comment);
                 $("#quote_comment_id").val(comment_id);
                 $("#quoted_post").show();
                 location="#comment";
            });


            $(".close").click(function(){
               $("#quote_comment_id").val("");
            });
        });
    </script>
@endsection