<?php
/**
 * Created by PhpStorm.
 * User: lordrahl
 * Date: 18/09/2017
 * Time: 10:28 AM
 */
?>
@extends('partials.dashboard-partials')
@section('page-title',"Available Polls")
@section('page-content')

    @if(count($polls)>0)

        <table class="table table-bordered table-responsive" id="pollListTable">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Target</th>
                    <th>Expiry</th>
                    <th>Responses</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($polls as $poll)
                    <tr>
                        <input type="hidden" name="poll_id" class="poll_id" value="{{ $poll->id }}" />
                        <td>{{ $poll->title }}</td>
                        <td>{{ $poll->target }}</td>
                        <td>{{ $poll->expiry_date }}</td>
                        <td>{{ $poll->responses->count() }}</td>
                        <td>
                            <button type="button" class="btn btn-info make_top">Make Top Poll</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


    @endif

@endsection
@section('scripts')
    <script>
        $(function(){
           $("#pollListTable").DataTable();

           $(".make_top").click(function(){
              var poll_id=$(this).closest('tr').find('.poll_id').val();

              $.post('/admin/polls/make-top',{_token:'{{ csrf_token() }}',poll_id:poll_id}, function(data){
                 if(data.status!='success'){
                     error(data.message);
                     return;
                 }
                 success(data.message);
              });
           });

        });
    </script>
@endsection