<?php

namespace App\Http\Controllers\Post;

use App\Models\PostReaction;
use App\Repositories\Models\PostReactionRepository;
use App\Utility\Utility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class PostReactionController extends Controller
{

    /**
     * @param PostReactionRepository $postReactionRepository
     * @return \Illuminate\Http\JsonResponse
     */
    public function reactToPost(PostReactionRepository $postReactionRepository){
        $user_id=auth()->user()->id;
        $post_id=Input::get('post_id');
        $reaction=Input::get('reaction');

        //make sure he hasnt reacted before
        $checkReaction=PostReaction::whereRaw('user_id=? and post_id=?',[$user_id,$post_id])->get();

        if(count($checkReaction)>0){
            $removeComment=$checkReaction->first()->delete();
            if(!$removeComment){
                return Utility::databaseError();
            }
        }else{
            $newReaction=$postReactionRepository->create([
                'post_id'=>$post_id,
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
