<?php
/**
 * Created by PhpStorm.
 * User: lordrahl
 * Date: 08/09/2017
 * Time: 2:35 PM
 */

$topCategories=\App\Utility\Utility::getTopCategories();
$activeThreads=\App\Utility\Utility::getActiveThreads();
$topPoll=\App\Utility\Utility::getTopPoll();
$topPosts=\App\Utility\Utility::topPosts();

//dd($topPosts);

$currentUser=null;

if(!auth()->check()){
    $avatar=new \YoHang88\LetterAvatar\LetterAvatar("Guest");
}
else{
    $user=auth()->user();
    $avatar=new \YoHang88\LetterAvatar\LetterAvatar($user->first_name.' '.$user->last_name);
    $currentUser=auth()->user()->id;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PipeIn :: @yield('title')</title>

    <!-- Bootstrap -->
    <link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet">

    <!-- Custom -->
    <link href="{{ asset("css/custom.css") }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset("font-awesome-4.0.3/css/font-awesome.min.css") }}">
    <link rel="stylesheet" href="{{ asset("bower_components/summernote/dist/summernote.css") }}" />
    <link rel="stylesheet" href="{{ asset("bower_components/toastr/toastr.min.css") }}" />


    <!-- CSS STYLE-->
    <link rel="stylesheet" type="text/css" href="{{ asset("css/style.css") }}" media="screen" />

    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="{{ asset("rs-plugin/css/settings.css") }}" media="screen" />
</head>
<body>
{{--<div id="fb-root"></div>--}}
{{--<script>(function(d, s, id) {--}}
        {{--var js, fjs = d.getElementsByTagName(s)[0];--}}
        {{--if (d.getElementById(id)) return;--}}
        {{--js = d.createElement(s); js.id = id;--}}
        {{--js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.10&appId=1395027497211285";--}}
        {{--fjs.parentNode.insertBefore(js, fjs);--}}
    {{--}(document, 'script', 'facebook-jssdk'));--}}
{{--</script>--}}
<div class="container-fluid">

    <!-- Slider -->
    <div class="tp-banner-container">
        <div class="tp-banner" >
            <ul>
                <!-- SLIDE  -->
                <li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
                    <!-- MAIN IMAGE -->
                    <img src="{{ asset("images/slide.jpg") }}"  alt="slidebg1"  data-bgfit="cover" data-bgposition="left top"
                         data-bgrepeat="no-repeat">
                    <!-- LAYERS -->
                </li>
            </ul>
        </div>
    </div>
    <!-- //Slider -->

    <div class="headernav">
        <div class="container">
            <div class="row">
                <div class="col-lg-1 col-xs-3 col-sm-2 col-md-2 logo ">
                    <a href="/">
                        <img src="{{ asset("images/logo.jpg") }}" alt="" />
                    </a>
                </div>
                <div class="col-lg-3 col-xs-9 col-sm-5 col-md-3 selecttopic">
                    <a href="/" >PipeIn&trade;</a>
                </div>
                <div class="col-lg-4 search hidden-xs hidden-sm col-md-3">
                    <div class="wrap">
                        <form action="#" method="post" class="form">
                            <div class="pull-left txt"><input type="text" class="form-control" placeholder="Search Topics"></div>
                            <div class="pull-right"><button class="btn btn-default" type="button"><i class="fa fa-search"></i></button></div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4 col-xs-12 col-sm-5 col-md-4 avt">
                    <div class="stnt pull-left">
                        @if(\Illuminate\Support\Facades\Auth::check())
                            <div class="stnt pull-left">
                                {{--<form action="http://forum.azyrusthemes.com/03_new_topic.html" method="post" class="form">--}}
                                <a href="/user/post/create" class="btn btn-primary">Start New Topic</a>
                                {{--</form>--}}
                            </div>
                        @endif
                    </div>
                    <div class="env pull-left"><i class="fa fa-envelope"></i></div>

                    <div class="avatar pull-left dropdown">
                        <a data-toggle="dropdown" href="#"><img src="{{ $avatar }}" alt="" /></a> <b class="caret"></b>
                        <div class="status green">&nbsp;</div>
                        <ul class="dropdown-menu" role="menu">
                            {{--<li role="presentation">--}}
                            {{--<a role="menuitem" tabindex="-2" href="#">Inbox</a>--}}
                            {{--</li>--}}
                            @if(\Illuminate\Support\Facades\Auth::check())
                                <li role="presentation">
                                    <a role="menuitem" tabindex="-1" href="/user/profile">My Profile</a>
                                </li>

                                <li role="presentation">
                                    <a role="menuitem" tabindex="-3" href="/signout">
                                        Log Out
                                    </a>
                                </li>
                            @else
                                <li role="presentation">
                                    <a role="menuitem" tabindex="-4" href="/user/login">Sign In</a>
                                    <a role="menuitem" tabindex="-4" href="/user/register">Create account</a>
                                </li>
                            @endif
                        </ul>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>


    <section class="content">
        @yield('top-pagination')
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <!-- POST -->
                    @yield('content')


                    @if(count($topPosts)>0)
                        @foreach($topPosts as $post)
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
                    @endif
                </div>

                <div class="col-lg-4 col-md-4">
                    <!-- -->
                    <div class="sidebarblock">
                        <h3>Categories</h3>
                        <div class="divline"></div>
                        <div class="blocktxt">
                            <ul class="cats">
                                @if(count($topCategories)>0)
                                    @foreach($topCategories as $topCategory)
                                        <li>
                                            <a href="/category/{{ $topCategory->slug }}">{{ $topCategory->category }}
                                                <span class="badge pull-right">
                                                    {{ $topCategory->posts_count}}
                                                </span>
                                            </a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>

                    <!-- -->
                    @if(count($topPoll)>0)
                        <?php
                        $topPoll=$topPoll->first()->poll;
                        $hasUserVoted=\App\Utility\Utility::hasUserVoted($topPoll->id,$currentUser);
                        $pollResponse=$topPoll->responses->count();
                        ?>
                        <div class="sidebarblock">
                            <h3>Poll of the Week @if(!auth()->check()) <span>Please sign in/register to vote</span>
                                @endif</h3>
                            <div class="divline"></div>
                            <div class="blocktxt">
                                <p>{{ $topPoll->title }}</p>
                                <form action="/polls/vote" method="post" class="form" id="pollForm">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                    <input type="hidden" name="poll_id" value="{{ $topPoll->id }}" />
                                    <table class="poll">

                                        @if(count($topPoll->options)>0)
                                            @if($hasUserVoted)
                                                @foreach($topPoll->options as $option)
                                                    <?php
                                                    $optionResponse=$option->responses;
                                                    $optionResponseCount=$optionResponse->count();
                                                    $percentage= ($optionResponseCount/$pollResponse)*100;
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <div class="progress">
                                                                <div class="progress-bar color1" role="progressbar"
                                                                     aria-valuenow="40"
                                                                     aria-valuemin="0" aria-valuemax="100"
                                                                     style="width: {{ $percentage }}%">
                                                                    {{ $option->option }} ({{ number_format($percentage) }}%)
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            @else
                                                @foreach($topPoll->options as $option)
                                                    <tr>
                                                        @if(auth()->check())
                                                            <td>
                                                                <div class="progress">
                                                                    <div class="progress-bar color1" role="progressbar"
                                                                         aria-valuenow="40" aria-valuemin="0"
                                                                         aria-valuemax="100" style="width: 100%">
                                                                        {{ $option->option }}
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <td class="chbox">
                                                                <input id="opt{{ $option->id }}" type="radio" name="opt"
                                                                       value="{{ $option->id }}" class="poll_option">
                                                                <label for="opt{{ $option->id }}"></label>
                                                            </td>
                                                        @else
                                                            <td colspan="2">
                                                                <div class="progress">
                                                                    <div class="progress-bar color1" role="progressbar"
                                                                         aria-valuenow="40" aria-valuemin="0"
                                                                         aria-valuemax="100" style="width: 100%">
                                                                        {{ $option->option }}
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                            @endif
                                        @endif
                                    </table>
                                </form>
                                {{--<p class="smal">Voting ends on 19th of October</p>--}}
                                <p class="smal"><span>{{ number_format($pollResponse) }} Vote(s).</span> Voting ends on
                                    {{ Date('d, M',
                                strtotime
                                ($topPoll->created_at)) }}</p>
                            </div>
                        </div>

                @endif

                    <!-- -->
                    <div class="sidebarblock">
                        <h3>My Active Threads</h3>

                        @if(count($activeThreads)>0)
                            @foreach($activeThreads as $activeThread)
                                <div class="divline"></div>
                                <div class="blocktxt">
                                    <a href="/topic/{{ $activeThread->slug }}">{{ $activeThread->title }}</a>
                                </div>
                            @endforeach
                        @endif
                    </div>


                </div>
            </div>
        </div>
        @yield('bottom-pagination')
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-1 col-xs-3 col-sm-2 logo "><a href="#"><img src="{{ asset("images/logo.jpg") }}" alt=""  /></a></div>
                {{--<div class="col-lg-8 col-xs-9 col-sm-5 ">Copyrights {{ Date('Y') }}, http://www.pipein.com.ng</div>--}}
                <div class="col-lg-8 col-xs-9 col-sm-5 ">Copyrights {{ Date('Y') }}, Adebayo Quam Babatunde</div>
                <div class="col-lg-3 col-xs-12 col-sm-5 sociconcent">
                    <ul class="socialicons">
                        <li>
                            <a href="/admin">
                                Admin Login
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</div>

<!-- get jQuery from the google apis -->
<script src="{{ asset("bower_components/jquery/dist/jquery.min.js") }}"></script>

<script src="{{ asset("js/jquery.form.min.js") }}"></script>

<!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
<script type="text/javascript" src="{{ asset("rs-plugin/js/jquery.themepunch.plugins.min.js") }}"></script>
<script type="text/javascript" src="{{ asset("rs-plugin/js/jquery.themepunch.revolution.min.js") }}"></script>
<script src="{{ asset("js/bootstrap.min.js") }}"></script>
<script src="{{ asset("bower_components/summernote/dist/summernote.min.js") }}"></script>
<script src="{{ asset("bower_components/toastr/toastr.min.js") }}"></script>
<script src="{{ asset("js/utility.js") }}"></script>


<!-- LOOK THE DOCUMENTATION FOR MORE INFORMATIONS -->
<script type="text/javascript">

    var revapi;

    jQuery(document).ready(function() {
        "use strict";
        revapi = jQuery('.tp-banner').revolution(
            {
                delay: 15000,
                startwidth: 1200,
                startheight: 278,
                hideThumbs: 10,
                fullWidth: "on"
            });

        $("#pollForm").ajaxForm(function(data){
           if(data.status!='success'){
               error(data.message);
               return;
           }

           success(data.message);
           location.reload();
        });

        $(".poll_option").click(function(){
            var form=$("#pollForm");
            form.submit();
        });
    });	//ready

</script>

<!-- END REVOLUTION SLIDER -->
@yield('script')
</body>

<!-- Mirrored from forum.azyrusthemes.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Sep 2017 16:08:38 GMT -->
</html>
