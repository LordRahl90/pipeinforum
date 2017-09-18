<?php

namespace App\Http\Controllers\User\Poll;

use App\Service\PollManager;
use App\Utility\Utility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class PollController extends Controller
{


    /**
     * @param PollManager $manager
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(PollManager $manager){
        $polls=[];
        $pollCount=$manager->getAllPolls();

        if(count($pollCount)>0){
            $polls=Utility::collection_paginate($pollCount,10);
        }

        return view('polls.listPolls',['polls'=>$polls]);
    }


    /**
     * @param $slug
     * @param PollManager $manager
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function loadSinglePoll($slug, PollManager $manager){
        $poll=$manager->getOnePoll("slug",$slug);
        return view('polls.pollDetails',['poll'=>$poll]);
    }

    /**
     * @param PollManager $manager
     * @return \Illuminate\Http\JsonResponse
     */
    public function processVote(PollManager $manager){
        $option=Input::get('opt');
        $poll_id=Input::get('poll_id');
        $user_id=auth()->user()->id;

        $payload=[
            'user_id'=>$user_id,
            'poll_id'=>$poll_id,
            'option_id'=>$option
        ];

        return $manager->managePoll(json_encode($payload));
    }
}
