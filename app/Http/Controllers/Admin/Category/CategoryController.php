<?php

namespace App\Http\Controllers\Admin\Category;

use App\Repositories\Models\PostCategoryRepository;
use App\Utility\Utility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PostCategoryRepository $postCategoryRepository)
    {
        $categories=$postCategoryRepository->withRelationships();
        return view('admin.category.listCategories',['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.createNewCategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param PostCategoryRepository $postCategoryRepository
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, PostCategoryRepository $postCategoryRepository)
    {
        $v=Validator::make($request->all(),['category'=>'required']);
        if($v->fails()){
            return Utility::error($v->messages()->all());
        }

        $newCategory=$postCategoryRepository->create(['category'=>$request->get('category')]);

        if(!$newCategory){
            return Utility::databaseError();
        }

        return Utility::success("Category Created Successfully");
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
