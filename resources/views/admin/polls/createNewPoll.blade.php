<?php
/**
 * Created by PhpStorm.
 * User: lordrahl
 * Date: 18/09/2017
 * Time: 8:41 AM
 */
?>
@extends('partials.dashboard-partials')
@section('page-title',"New Poll")
@section('page-content')
    {!! Form::open(['url'=>'/admin/polls/create','id'=>'newPollForm']) !!}

        @if(session()->has('errors'))
            <div class="alert alert-danger alert-dismissable">
                <ul style="list-style: none">
                @foreach(session('errors')->all() as $sess)
                    <li>{{ $sess }}</li>
                @endforeach
                </ul>
            </div>
        @endif

        @if(session()->has('message'))
            <div class="alert alert-success alert-dismissable">
                <p>{{ session('message') }}</p>
            </div>
        @endif

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control required" name="title" id="title" placeholder="Title">
        </div>

        <div class="form-group">
            <label for="synopsis">Synopsis</label>
            <textarea class="form-control required" name="synopsis" id="synopsis"></textarea>
        </div>

        <div class="form-group">
            <label for="target">Target</label>
            <input type="text" class="form-control required" name="target" id="target" placeholder="Target">
        </div>

        <div class="form-group">
            <label for="expiry_date">Expiry Date</label>
            <input type="text" class="form-control required" name="expiry_date" id="expiry_date" placeholder="Poll Ends on">
        </div>


        <fieldset>
            <legend>Options</legend>
            <div class="col-md-8">
                <div id="optionsList">
                    <div class="form-group">
                        <label for="title">Options</label>
                        <input type="text" class="form-control required" name="option[]"  placeholder="Option">
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <button type="button" id="moreOptionsBtn" class="btn btn-default">Add More Options</button>
            </div>
        </fieldset>

    {!! Form::close() !!}

    <div id="moreOptions" style="display: none;">
        <div class="form-group">
            <label for="title">Options</label>
            <input type="text" class="form-control required" name="option[]"  placeholder="Option">
        </div>
    </div>
@endsection
@section('page-footer')
    <button type="button" id="createPollButton" class="btn btn-primary">Create New Poll</button>

@endsection
@section('scripts')
    <script>
        $(function(){
            $("#synopsis").summernote();

            $('#expiry_date').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd'
            });

            $("#moreOptionsBtn").click(function(){
               $("#optionsList").append($("#moreOptions").html());
            });

            $("#createPollButton").click(function(){
               var form=$("#newPollForm");
               form.submit();
            });
        });
    </script>
@endsection