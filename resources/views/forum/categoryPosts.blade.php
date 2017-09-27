<?php
/**
 * Created by PhpStorm.
 * User: lordrahl
 * Date: 11/09/2017
 * Time: 7:37 PM
 */

?>
@extends('partials.index-partial')
@section('title',$category)
@section('top-pagination')
    @if(count($posts)>0)
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-xs-12">
                    {!! $posts->links() !!}
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    @endif
@endsection
@section('content')

    @if(count($posts)>0)
        @foreach($posts as $post)
            <div class="post">
                <div class="wrap-ut pull-left">
                    <div class="userinfo pull-left">
                        <div class="avatar">
                            <img src="{{ asset("images/avatar.jpg") }}" alt="" />
                            <div class="status green">&nbsp;</div>
                        </div>

                        <div class="icons">
                            <img src="{{ asset("images/icon1.jpg") }}" alt="" /><img src="{{ asset("images/icon4.jpg") }}" alt="" />
                        </div>
                    </div>
                    <div class="posttext pull-left">
                        <h2><a href="/topic/{{ $post->slug }}">{{ $post->title }}</a></h2>
                        <p>{{ substr(strip_tags($post->content),0,50) }}...</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="postinfo pull-left">
                    <div class="comments">
                        <div class="commentbg">
                            {{ count($post->comments) }}
                            <div class="mark"></div>
                        </div>

                    </div>
                    <div class="views"><i class="fa fa-eye"></i> 1,568</div>
                    <div class="time"><i class="fa fa-clock-o"></i> 24 min</div>
                </div>
                <div class="clearfix"></div>
            </div><!-- POST -->
        @endforeach
    @else
        <div class="post">
            <div class="wrap-ut pull-left">
                <div class="userinfo pull-left">
                    <div class="avatar">
                        <img src="{{ asset("images/avatar.jpg") }}" alt="" />
                        <div class="status green">&nbsp;</div>
                    </div>

                    <div class="icons">
                        <img src="{{ asset("images/icon1.jpg") }}" alt="" />
                        <img src="{{ asset("images/icon4.jpg") }}" alt="" />
                    </div>
                </div>
                <div class="posttext pull-left">
                    <h2><a href="#">No Topic posted yet</a></h2>
                    <p>Be the first to create a topic on this board.</p>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="postinfo pull-left">
                <div class="comments">
                    <div class="commentbg">
                        560
                        <div class="mark"></div>
                    </div>

                </div>
                <div class="views"><i class="fa fa-eye"></i> 1,568</div>
                <div class="time"><i class="fa fa-clock-o"></i> 24 min</div>
            </div>
            <div class="clearfix"></div>
        </div><!-- POST -->
    @endif

@endsection
@section('bottom-pagination')
    @if(count($posts)>0)
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-xs-12">
                    {!! $posts->links() !!}
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    @endif
@endsection