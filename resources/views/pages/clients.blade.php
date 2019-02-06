@extends('layouts.front-app')
@section('content')
    @include('inc.front-nav')

    <div class="clients">
        <div class="container">
            <h1 class="text-center">Our Happy Clients</h1>
            @include('inc.dots')
            <p class="text-center">It's convincing that we are gold. But in case you want any examples of our magnificient work, Here They Are. Hope this will help.</p>
            <img src="{{ asset('images/worldmap.jpg') }}" class="map" alt="">
            <div class="row">
                <div class="col-md-3">
                    <img src="{{ asset('images/clients/b1.png') }}" alt="">
                </div>
                <div class="col-md-3">
                    <img src="{{ asset('images/clients/dialog.png') }}" alt="">
                </div>
                <div class="col-md-3">
                    <img src="{{ asset('images/clients/mobitel.png') }}" alt="">
                </div>
                <div class="col-md-3">
                    <img src="{{ asset('images/clients/ndb-bank.png') }}" alt="">
                </div>
                <div class="col-md-3">
                    <img src="{{ asset('images/clients/slt.png') }}" alt="">
                </div>
                <div class="col-md-3">
                    <img src="{{ asset('images/clients/softlogic.png') }}" alt="">
                </div>
                <div class="col-md-3">
                    <img src="{{ asset('images/clients/wow.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>

@endsection