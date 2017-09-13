<?php

namespace App\Http\Controllers\Site;

use App\Repositories\Models\CommentRepository;
use App\Repositories\Models\PostCategoryRepository;
use App\Utility\Utility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Models\PostRepository as Post;
use Illuminate\Support\Facades\Log;

class SiteMonitor extends Controller
{

    /**
     * @param Post $postRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Post $postRepository){
        $posts=[];
        $ret_posts=$postRepository->orderBy('created_at');
        if(count($ret_posts)>0){
            $posts=$ret_posts;
        }
        if(count($posts)>0){
            $paginated=Utility::collection_paginate($posts,5);
        }else{
            $paginated=$posts;
        }
        return view('forum.index',['posts'=>$paginated]);
    }

    /**
     * @param $slug
     * @param Post $postRepository
     * @param CommentRepository $commentRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function loadFullPost($slug,Post $postRepository, CommentRepository $commentRepository){
        $post=[];
        $ret_post=$postRepository->findBy('slug',$slug);
        if(count($ret_post)>0){
            $post=$ret_post;
        }
        return view('forum.story',[
            'post'=>$post,
            'commentRepo'=>$commentRepository
        ]);
    }


    /**
     * @param $slug
     * @param PostCategoryRepository $postCategoryRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function loadCategoryPosts($slug, PostCategoryRepository $postCategoryRepository){
        $category=$postCategoryRepository->findBy('slug',$slug);
        if($category!=null){
            if(count($category->posts)>0){
                $posts=Utility::collection_paginate($category->posts,10);
            }else{
                $posts=[];
            }
        }else{
            $posts=[];
        }

        return view('forum.categoryPosts',['posts'=>$posts,'category'=>$category->category]);
    }


    public function loadCategoryInfo($id, PostCategoryRepository $postCategoryRepository){
        $categories=$postCategoryRepository->withRelationship($id);
        return Utility::success($categories);
    }


    public function signOut(){
        auth()->logout();
        return redirect('/');
    }
}
