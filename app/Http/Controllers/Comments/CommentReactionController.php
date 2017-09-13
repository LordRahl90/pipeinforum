<?php

namespace App\Http\Controllers\Comments;

use App\Repositories\Models\PostReactionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PostReaction;
use Illuminate\Support\Facades\Input;
use App\Utility\Utility;

class CommentReactionController extends Controller
{
    /**
     * @param PostReactionRepository $postReactionRepository
     * @return \Illuminate\Http\JsonResponse
     */
    public function reactToComment(PostReactionRepository $postReactionRepository){
        $user_id=auth()->user()->id;
        $comment_id=Input::get('comment_id');
        $reaction=Input::get('reaction');

        //make sure he hasnt reacted before
        $checkReaction=PostReaction::whereRaw('user_id=? and comment_id=?',[$user_id,$comment_id])->get();

        if(count($checkReaction)>0){
            $removeComment=$checkReaction->first()->delete();
            if(!$removeComment){
                return Utility::databaseError();
            }
        }else{
            $newReaction=$postReactionRepository->create([
                'comment_id'=>$comment_id,
                'user_id'=>$user_id,
                'reaction'=>$reaction
            ]);

            if(!$newReaction){
                return Utility::databaseError();
            }
        }

        return Utility::success("Reaction Posted Successfully");
    }
}
