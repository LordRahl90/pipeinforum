<?php

namespace App\Http\Controllers\Site;

use App\Utility\Utility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Models\PostRepository as Post;

class SiteMonitor extends Controller
{
    public function index(Post $postRepository){

        $posts=$postRepository->orderBy('created_at');
        $paginated=Utility::collection_paginate($posts,5);

        return view('forum.index',['posts'=>$paginated]);
    }

    public function loadFullPost($slug,Post $postRepository){
        $post=$postRepository->findBy('slug',$slug);
        return view('forum.story',['post'=>$post]);
    }
}
