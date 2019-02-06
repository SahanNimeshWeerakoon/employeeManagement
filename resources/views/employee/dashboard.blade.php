@extends('layouts.app')
    @section('content')
        <div class="container">
            <br>
            <h1 class="text-center">Your Details</h1>
            <br>
            {{-- <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-4">
                    <h5>Id:</h5>
                </div>
                <div class="col-md-6">
                    <h5>{{ $user->id }}</h5>
                </div>
            </div>
            <hr> --}}
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-4">
                    <h5>Name: </h5>
                </div>
                <div class="col-md-6">
                    <h5>{{ $user->name }}</h5>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-4">
                    <h5>Contact: </h5>
                </div>
                <div class="col-md-6">
                    <h5>{{ $user->contact }}</h5>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-4">
                    <h5>Address: </h5>
                </div>
                <div class="col-md-6">
                    <h5>{{ $user->address }}</h5>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-4">
                    <h5>Date Joined: </h5>
                </div>
                <div class="col-md-6">
                    <h5>{{ $user->date_joined }}</h5>
                </div>
            </div>
        </div>
    @endsection