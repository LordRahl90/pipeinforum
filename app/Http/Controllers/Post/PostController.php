<?php

namespace App\Http\Controllers\Post;

use App\Utility\Utility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Models\PostCategoryRepository as PostCategory;
use App\Repositories\Models\PostRepository as Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(PostCategory $postCategoryRepository)
    {
        $categories=$postCategoryRepository->all();
        return view('forum.newPost',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $postRepository)
    {
        $request->validate([
            'title'=>'required',
            'subcategory'=>'required',
            'content'=>'required'
        ]);

        $user_id=auth()->user()->id;

        $poster=true;
        $notification=false;

        if($request->get('poster')!=null){
            $poster=false;
        }

        if($request->get('notify')!=null){
            $notification=true;
        }

        $newPostPayload=[
            'user_id'=>$user_id,
            'sub_category_id'=>$request->get('subcategory'),
            'title'=>$request->get('title'),
            'content'=>$request->get('content'),
            'notification'=>$notification,
            'status'=>$poster,
        ];

        $newPost=$postRepository->create($newPostPayload);

        if(!$newPost){
            return Utility::databaseError();
        }

        return Utility::success("Post Created Successfully...");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
