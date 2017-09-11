<?php
/**
 * Created by PhpStorm.
 * User: lordrahl
 * Date: 08/09/2017
 * Time: 2:34 PM
 */
?>
@extends('partials.index-partial')
@section('title',"Welcome to PipeIn")
@section('top-pagination')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-xs-12">
                {!! $posts->links() !!}
                {{--<div class="pull-left"><a href="#" class="prevnext"><i class="fa fa-angle-left"></i></a></div>--}}
                {{--<div class="pull-left">--}}
                    {{--<ul class="paginationforum">--}}
                        {{--<li class="hidden-xs"><a href="#">1</a></li>--}}
                        {{--<li class="hidden-xs"><a href="#">2</a></li>--}}
                        {{--<li class="hidden-xs"><a href="#">3</a></li>--}}
                        {{--<li class="hidden-xs"><a href="#">4</a></li>--}}
                        {{--<li><a href="#">5</a></li>--}}
                        {{--<li><a href="#">6</a></li>--}}
                        {{--<li><a href="#" class="active">7</a></li>--}}
                        {{--<li><a href="#">8</a></li>--}}
                        {{--<li class="hidden-xs"><a href="#">9</a></li>--}}
                        {{--<li class="hidden-xs"><a href="#">10</a></li>--}}
                        {{--<li class="hidden-xs hidden-md"><a href="#">11</a></li>--}}
                        {{--<li class="hidden-xs hidden-md"><a href="#">12</a></li>--}}
                        {{--<li class="hidden-xs hidden-sm hidden-md"><a href="#">13</a></li>--}}
                        {{--<li><a href="#">1586</a></li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
                {{--<div class="pull-left"><a href="#" class="prevnext last"><i class="fa fa-angle-right"></i></a></div>--}}
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
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
                            {{ count($post->comment) }}
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
                    <p>It's one thing to subject yourself to a Halloween costume mishap because, hey, that's your prerogative.</p>
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
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-xs-12 col-md-8">
                {{ $posts->links() }}
                {{--<div class="pull-left"><a href="#" class="prevnext"><i class="fa fa-angle-left"></i></a></div>--}}
                {{--<div class="pull-left">--}}
                    {{--<ul class="paginationforum">--}}
                        {{--<li class="hidden-xs"><a href="#">1</a></li>--}}
                        {{--<li class="hidden-xs"><a href="#">2</a></li>--}}
                        {{--<li class="hidden-xs"><a href="#">3</a></li>--}}
                        {{--<li class="hidden-xs"><a href="#">4</a></li>--}}
                        {{--<li><a href="#">5</a></li>--}}
                        {{--<li><a href="#">6</a></li>--}}
                        {{--<li><a href="#" class="active">7</a></li>--}}
                        {{--<li><a href="#">8</a></li>--}}
                        {{--<li class="hidden-xs"><a href="#">9</a></li>--}}
                        {{--<li class="hidden-xs"><a href="#">10</a></li>--}}
                        {{--<li class="hidden-xs hidden-md"><a href="#">11</a></li>--}}
                        {{--<li class="hidden-xs hidden-md"><a href="#">12</a></li>--}}
                        {{--<li class="hidden-xs hidden-sm hidden-md"><a href="#">13</a></li>--}}
                        {{--<li><a href="#">1586</a></li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
                {{--<div class="pull-left"><a href="#" class="prevnext last"><i class="fa fa-angle-right"></i></a></div>--}}
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection