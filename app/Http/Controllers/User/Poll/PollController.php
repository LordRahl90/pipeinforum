<?php

namespace App\Http\Controllers\User\Poll;

use App\Service\PollManager;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class PollController extends Controller
{
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
