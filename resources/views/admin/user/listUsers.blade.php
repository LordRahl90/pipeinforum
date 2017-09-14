<?php
/**
 * Created by PhpStorm.
 * User: lordrahl
 * Date: 13/09/2017
 * Time: 10:50 AM
 */
?>
@extends('partials.dashboard-partials')
@section('page-title',"Admin Users")
@section('page-content')
    <table class="table table-bordered table-hover" id="users_list">
        <thead>
        <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Username</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        </thead>

        <tbody>
        @foreach($users as $user)
            <?php
              $userInfo=$user->user;
            ?>
            <tr>
                <td>{{ $userInfo->first_name }}</td>
                <td>{{ $userInfo->last_name }}</td>
                <td>{{ $userInfo->username }}</td>
                <td>{{ $userInfo->email }}</td>
                <td></td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
@section('scripts')
    <script>
        $(function(){
            $("#users_list").DataTable();
        });
    </script>
@endsection