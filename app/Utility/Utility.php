<?php
/**
 * Created by PhpStorm.
 * User: lordrahl
 * Date: 08/09/2017
 * Time: 5:29 PM
 */

namespace App\Utility;

use App\Models\PollResponse;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\TopPoll;
use Illuminate\Support\Facades\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class Utility
{

    public function __construct()
    {
    }


    /**
     * @param $msg
     * @return \Illuminate\Http\JsonResponse
     */
    public static function success($msg){
        return response()->json(["status"=>"success","message"=>$msg]);
    }

    /**
     * @param $msg
     * @return \Illuminate\Http\JsonResponse
     */
    public  static function error($msg){
        return response()->json(["status"=>"error","message"=>$msg]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public static function databaseError(){
        return response()->json(["status"=>"error","message"=>"An error occurred while connecting... Please try again"]);
    }


    public static function collection_paginate($items, $per_page)
    {
        $page   = Request::get('page', 1);
        $offset = ($page * $per_page) - $per_page;

        return new LengthAwarePaginator(
            $items->forPage($page, $per_page)->values(),
            $items->count(),
            $per_page,
            Paginator::resolveCurrentPage(),
            ['path' => Paginator::resolveCurrentPath()]
        );
    }


    public static function getTopCategories(){
        $topCategories=PostCategory::with(['subCategories','posts'])->withCount(['posts'])->orderBy('posts_count','desc')
            ->take(7)->get();
        return $topCategories;
    }

    public static function getActiveThreads(){
        $activeThreads=Post::withCount('comments')->orderBy('comments_count','desc')->take(5)->get();
        return $activeThreads;
    }

    public static function getTopPoll(){
        $topPoll=TopPoll::with('poll')->where("status",'=',true)->get();
        return $topPoll;
    }

    public static function hasUserVoted($poll_id,$user_id){
        $pollDetail=PollResponse::whereRaw('poll_id=? and user_id=?',[$poll_id,$user_id])->get();
        if(count($pollDetail)>0){
            return true;
        }
        else{
            return false;
        }
    }

    public static function topPosts(){
        $posts=Post::withCount('comments')->orderBy('comments_count','desc')->orderBy('created_at','asc')->take(5)
            ->get();
        return $posts;
    }


    public static function getOptionPercentage($option_id){

    }
}