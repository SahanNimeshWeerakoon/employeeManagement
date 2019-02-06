@extends('layouts.front-app')
@section('content')
    @include('inc.front-nav')
    <div class="about-us">
        <div class="container">
            <h1 class="text-center">About Us</h1>
            @include('inc.dots')
            <p class="text-center">
                NIT Sistems is a software development company who provides you the best solutions through technology since 1997. We have been giving 
                solutions to 58 companies with 97 solutions including E Commers websites, personal websites, Systems, Maintaining the SEO, developing 
                mobile applications and etc. Our team consists of 20 members. 
            </p>
            <p class="text-center">
                We will act as the technology partner of you and guide you through out your business on how to proceed with the technology. We will 
                stimulate your quality and maintain our answers with maximum reliability.
            </p>
            <div class="row">
                <div class="col-md-4">
                    <h3 class="text-center">What We Do</h3>
                    <hr>
                    <p>
                        We analyse your business problems and discuss with our group to give you the answer through Technology. We create fully mobile 
                        responsive web sites with latest technologies and maintain it's SEO. We create mobile applications, create
                        systems for your management. We practically give you the answer for any problem you have in your business.
                    </p>
                </div>
                <div class="col-md-4">
                    <h3 class="text-center">Our Mission</h3>
                    <hr>
                    <p>
                        Our mission is to maintain the client's trust and improve our selves so that we can provide the more and more to our future clients.
                    </p>
                </div>
                <div class="col-md-4">
                    <h3 class="text-center">Our Vission</h3>
                    <hr>
                    <p>
                        Our Vission is to increase our customer density in the world and bring NIT Sistems to the top level in the world
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection