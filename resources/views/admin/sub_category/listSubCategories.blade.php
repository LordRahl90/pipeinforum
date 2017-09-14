<?php
/**
 * Created by PhpStorm.
 * User: lordrahl
 * Date: 12/09/2017
 * Time: 10:22 PM
 */

?>
@extends('partials.dashboard-partials')
@section('page-title',"List Sub-Categories")
@section('page-content')

    <table class="table table-bordered table-hover" id="sub_category_list">
        <thead>
        <tr>
            <th>Category</th>
            <th>Title</th>
            <th>Posts</th>
        </tr>
        </thead>

        <tbody>
        @foreach($subCategories as $subCategory)
            <tr>
                <td>{{ $subCategory->category->category }}</td>
                <td>{{ $subCategory->sub_category }}</td>
                <td>{{ count($subCategory->posts) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection

@section('scripts')
    <script>
        $(function(){

            $("#sub_category_list").DataTable();

        });
    </script>
@endsection