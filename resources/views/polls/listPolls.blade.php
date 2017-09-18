<?php
/**
 * Created by PhpStorm.
 * User: lordrahl
 * Date: 18/09/2017
 * Time: 1:30 PM
 */

?>
@extends('partials.index-partial')
@section('title',"Polls")
@section('top-pagination')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-xs-12">
                @if(count($polls)>0)
                    {!! $polls->links() !!}
                @endif
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    @if(count($polls)>0)
        @foreach($polls as $post)
            <?php
            $owner=$post->owner;
            $avatar=new \YoHang88\LetterAvatar\LetterAvatar($owner->first_name.' '.$owner->last_name);
            ?>
            <div class="post">
                <div class="wrap-ut pull-left">
                    <div class="userinfo pull-left">
                        <div class="avatar">
                            <img src="{{ $avatar }}" alt="" />
                            <div class="status green">&nbsp;</div>
                        </div>

                        <div class="icons">
                            <img src="{{ asset("images/icon1.jpg") }}" alt="" />
                            <img src="{{ asset("images/icon4.jpg") }}" alt="" />
                        </div>
                    </div>
                    <div class="posttext pull-left">
                        <h2><a href="/polls/details/{{ $post->slug }}">{{ $post->title }}</a></h2>
                        <p>{{ substr(strip_tags($post->synopsis),0,50) }}...</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="postinfo pull-left">
                    <div class="comments">
                        <div class="commentbg">
                            {{ count($post->responses) }}
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
                    <h2><a href="#">No Polls Here</a></h2>
                    <p>No Polls Here.</p>
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
                @if(count($polls)>0)
                    {!! $polls->links() !!}
                @endif
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection