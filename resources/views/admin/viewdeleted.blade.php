@extends('layouts.app')
    @section('content')
        <div class="container">
            <h3 class="text-center">Deleted User {{ $deletedUser->name }}</h3>
            <hr>
            <div style="width: 50%; margin: auto;">
                <p>Name: <b>{{ $deletedUser->name }}</b></p>
                <p>Contact: <b>{{ $deletedUser->contact }}</b></p>
                <p>Address: <b>{{ $deletedUser->address }}</b></p>
                <p>Date Joined: <b>{{$deletedUser->date_joined }}</b></p>
                <p>Department: <b>{{ $department->department_name }}</b></p>
                <p>Username: <b>{{ $deletedUser->username }}</b></p>
                <p>Email: <b>{{ $deletedUser->email }}</b></p>
                <p>Status: <b>{{ $deletedUser->status==1?'Admin':'Employee' }}</b></p>
            </div>
        </div>
    @endsection