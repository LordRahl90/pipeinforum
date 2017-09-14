<?php
/**
 * Created by PhpStorm.
 * User: lordrahl
 * Date: 12/09/2017
 * Time: 8:34 PM
 */
?>
@extends('partials.dashboard-partials')
@section('page-title',"Available Categories")
@section('page-content')

    <table class="table table-bordered table-hover" id="category_list">
        <thead>
            <tr>
                <th>Category</th>
            </tr>
        </thead>

        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->category }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
@section('scripts')
    <script>
        $(function(){
            $("#category_list").DataTable();
        });
    </script>
@endsection