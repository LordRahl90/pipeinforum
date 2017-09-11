<?php

namespace App\Http\Controllers\Comments;

use App\Utility\Utility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Models\CommentRepository as Comment;

class CommentController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * @param Request $request
     * @param Comment $commentRepository
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request,Comment $commentRepository)
    {
        $request->validate([
            'post_id'=>'required',
            'reply'=>'required'
        ]);

        $notification=false;

        if($request->get('notify')!=null){
            $notification=true;
        }

        $user=auth()->user()->id;

        $commentPayload=[
            'post_id'=>$request->get('post_id'),
            'user_id'=>$user,
            'quote_comment_id'=>$request->get('quote_comment_id'),
            'comment'=>$request->get('reply'),
            'show'=>true,
            'notification'=>$notification
        ];

        $newComment=$commentRepository->create($commentPayload);
        if(!$newComment){
            return Utility::databaseError();
        }

        return Utility::success("Comment Posted successfully");
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
