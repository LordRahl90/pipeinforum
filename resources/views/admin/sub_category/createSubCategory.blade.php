<?php
/**
 * Created by PhpStorm.
 * User: lordrahl
 * Date: 12/09/2017
 * Time: 9:54 PM
 */

?>
@extends('partials.dashboard-partials')
@section('page-title',"Create Sub-Category")
@section('page-content')
    {!! Form::open(['url'=>'/admin/sub-category/create','id'=>'createSubCategoryForm']) !!}

    <div class="form-group">
        <label>Select Category</label>
        <select class="form-control required" name="category" id="category">
            <option value="">Select Category</option>
            @if(count($categories)>0)
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                @endforeach
            @endif
        </select>
    </div>

    <div class="form-group">
        <label for="category">Sub-Category</label>
        <input type="text" class="form-control" name="sub_category" id="sub_category" placeholder="Enter Sub-Category">
    </div>

    <button type="button" id="createSubCategoryBtn" class="btn btn-primary">Create Sub-Category</button>

    {!! Form::close() !!}
@endsection
@section('scripts')
    <script>
        $(function(){

            $("#createSubCategoryForm").ajaxForm(function(data){
                console.log(data);
               if(data.status!='success'){
                   error(data.message.toString());
                   return;
               }

               success(data.message);
            });

            $("#createSubCategoryBtn").click(function(){
               var form=$("#createSubCategoryForm");
               form.submit();
            });

        });
    </script>
@endsection