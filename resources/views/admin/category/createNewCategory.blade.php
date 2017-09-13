<?php
/**
 * Created by PhpStorm.
 * User: lordrahl
 * Date: 12/09/2017
 * Time: 8:14 PM
 */
?>
@extends('partials.dashboard-partials')
@section('page-title',"Create New Category")
@section('page-content')
    {!! Form::open(['url'=>'/admin/category/create','id'=>'createCategoryForm']) !!}

        <div class="form-group">
            <label for="category">Category</label>
            <input type="text" class="form-control" name="category" id="category" placeholder="Enter Category">
        </div>

        <button type="button" id="createCategoryBtn" class="btn btn-primary">Create Category</button>

    {!! Form::close() !!}
@endsection
@section('scripts')
    <script>
        $(function(){


            $("#createCategoryForm").ajaxForm(function(data){
                if(data.status!='success'){
                    error(data.message.toString());
                    return;
                }

                $("#category").val("");
                success(data.message);
            });

            $("#createCategoryBtn").click(function(){
                var form=$("#createCategoryForm");
                form.submit();
            });
        });
    </script>
@endsection