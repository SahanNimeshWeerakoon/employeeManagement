@extends('layouts.front-app')
    @section('head')
      
    @endsection
    @section('content')
    <a href="/login" class="btn btn-outline-warning login-button">LOGIN</a>
    <div id="container">
        <video src="{{ asset('video/homebackground.mp4') }}" autoplay="true" loop="true" muted="true"></video>
    </div>
    <div id="content">
        <div class="details">
            <h1>WE WILL FIND THE SOLUTION FOR YOUR SUCCESS THROUG TECHNOLOGY</h1>
            {{-- <p>
                We analyze your business and find a better solutions for your problems with the coporation of technology.
            </p> --}}
            <p>
                <a class="quote" data-toggle="modal" data-target="#myModal">Get a Free Quote</a>
                <a href="#contact" class="contact">Contact us</a>
            </p>
        </div>
    </div>
    <div class="home-nav" id="navbar">
        @include('inc.front-nav')
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
        
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Please Send Us Your Contact Details</h4>
            <button type="button" class="close float-right" data-dismiss="modal">&times;</button>
            </div>
            <form action="/send/quotation" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" name="name" placeholder="Your Name" class="form-control" required/>
                    </div>
                    <div class="form-group">
                        <label for="contact">Your Email/Phone No.</label>
                        <input type="text" name="contact" placeholder="Your Email or Phone Number" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label for="inquiry">Your Message</label>
                        <textarea name="inquiry" cols="30" rows="5" placeholder="Your Message or Inquiry" class="form-control" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-info float-right" />
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
        
        </div>
    </div>

    <div class="who-we-are">
        <div class="container">
            <h2 class="text-center">Who We Are</h2>
            @include('inc.dots')
            <p>
                NIT Sistems is a software development company who provides you the best solutions through technology since <b>1997</b>.
                We have been giving solutions to <b>58</b> companies with <b>97</b> solutions including E Commers websites, personal websites, Systems, Maintaining the SEO,
                developing mobile applications and etc. Our team consists of <b>20</b> members.
                <br><br>
                
                We will act as the technology partner of you and guide you through out your business on how to proceed 
                with the technology. Contact us via <a href="mailto:info@nitsistem@gmail.com"><b>email</b></a> , <a href="tel:+94114930969"><b>phone number</b></a> or come and meet us.
                our address : <b>no:65,symonds road , maradana, colombo 10,srilanka.</b>
            </p>
            <a href="/about" class="float-right more">See More &nbsp;<i class="fas fa-angle-right"></i></a>
        </div>
    </div>

    <div class="our-technologies">
        <div class="overlay">
            <h2 class="text-center">Our Technologies</h2>
            @include('inc.dots')
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <i class="fab fa-angular"></i>
                        <small>Angular 2+</small>
                    </div>
                    <div class="col-md-3">
                        <i class="fab fa-react"></i>
                        <small>React</small>
                    </div>
                    <div class="col-md-3">
                        <i class="fab fa-laravel"></i>
                        <small>Laravel</small>
                    </div>
                    <div class="col-md-3">
                        <i class="fab fa-java"></i>
                        <small>Java</small>
                    </div>
                    <div class="col-md-3">
                        <i class="fab fa-node"></i>
                        <small>Node JS</small>
                    </div>
                    <div class="col-md-3">
                        <i class="fab fa-android"></i>
                        <small>Android</small>
                    </div>
                    <div class="col-md-3">
                        <i class="fab fa-sass"></i>
                        <small>Sass</small>
                    </div>
                    <div class="col-md-3">
                        <i class="fab fa-html5"></i>
                        <small>HTML 5</small>
                    </div>
                    <div class="col-md-3">
                        <i class="fab fa-css3"></i>
                        <small>CSS 3</small>
                    </div>
                    <div class="col-md-3">
                        <i class="fab fa-aws"></i>
                        <small>AWS</small>
                    </div>
                    <div class="col-md-3">
                        <i class="fab fa-gulp"></i>
                        <small>Gulp</small>
                    </div>
                    <div class="col-md-3">
                        <i class="fab fa-git"></i>
                        <small class="text-center">GIT</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="our-projects">
        <h2 class="text-center">Our Projects</h2>
        @include('inc.dots')
        <div id="projectCarousel" class="container">
            <div class="item">
                <a href="#">
                    <img src="{{ asset('images/our-technologies1.jpg') }}" alt="" />
                    Hotel Kitchen Management
                </a>
            </div>
            <div class="item">
                <a href="#">
                    <img src="{{ asset('images/our-technologies2.jpg') }}" alt="" />
                    Website 
                </a>
            </div>
            <div class="item">
                <a href="#">
                    <img src="{{ asset('images/our-technologies3.jpg') }}" alt="" />
                    Migration
                </a>
            </div>
            <div class="item">
                <a href="#">
                    <img src="{{ asset('images/our-technologies4.jpg') }}" alt="" />
                    Mobile app for a site
                </a>
            </div>
            <div class="item">
                <a href="#">
                    <img src="{{ asset('images/our-technologies5.jpg') }}" alt="" />
                    Hotel Kitchen Management
                </a>
            </div>
            <div class="item">
                <a href="#">
                    <img src="{{ asset('images/our-technologies1.jpg') }}" alt="" />
                    Website 
                </a>
            </div>
            <div class="item">
                <a href="#">
                    <img src="{{ asset('images/our-technologies2.jpg') }}" alt="" />
                    Migration
                </a>
            </div>
            <div class="item">
                <a href="#">
                    <img src="{{ asset('images/our-technologies3.jpg') }}" alt="" />
                    Mobile app for a site
                </a>
            </div>
            <div class="item">
                <a href="#">
                    <img src="{{ asset('images/our-technologies4.jpg') }}" alt="" />
                    Hotel Kitchen Management
                </a>
            </div>
            <div class="item">
                <a href="#">
                    <img src="{{ asset('images/our-technologies5.jpg') }}" alt="" />
                    Website 
                </a>
            </div>
        </div>
    </div>

    <div class="contact-us" id="contact">
        <div class="details">
            <div class="container">
                <h2 class="text-center">Contact Us</h2>
                @include('inc.dots')
                <div class="row">
                    <div class="col-md-4 text-center">
                        <i class="fas fa-phone"></i>
                        <h3>Call Us</h3>
                        <a href="tel:+94114930969">+94 11 49 30 969 / +94 75 55 30 779</a>
                    </div>
                    <div class="col-md-4 text-center">
                        <i class="fas fa-envelope"></i>
                        <h3>Email Us</h3>
                        <a href="mailto:nitsistem@gmail.com">nitsistem@gmail.com</a>
                    </div>
                    <div class="col-md-4 text-center">
                        <i class="fas fa-map-marker-alt"></i>
                        <h3>Our Address</h3>
                        <a href="#contact">
                            no:65,symonds road , maradana, colombo 10,srilanka
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <h2 class="text-center">Don't Be Shy Let's Chat <i class="far fa-smile-wink"></i></h2>
        @include('inc.dots')
        <div class="container">
            <form action="/send/email" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name"><i class="fas fa-smile"></i>&nbsp;Your Name</label>
                    <input type="text" name="name" placeholder="Your Name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"  />
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="email"><i class="fas fa-envelope"></i>&nbsp;Your Email</label>
                    <input type="email" name="email" placeholder="Your Email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" />
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="message"><i class="fas fa-comments"></i>&nbsp;Your Message</label>
                    <textarea name="message" cols="30" rows="10" class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}" placeholder="Your Message"></textarea>
                    @if ($errors->has('message'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('message') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <input type="submit" value="SEND" class="contact float-right" />
                </div>
            </form>
        </div>
    </div>
    @endsection
    @section('script')
    <script>
        // JQUERY for slick carousel
        $(document).ready(function() {
            $('#projectCarousel').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
            });
        });

        // JQUERY for onscroll fix nav bar
        $(document).ready(function() {
            const navBar = $('#navbar');
            const topHeight = navBar.offset().top;
            
            $(window).scroll(function() {
                if($(this).scrollTop() >= topHeight+27.5)  {
                    navBar.addClass('sticky');
                    navBar.css("background", "rgba(0,0,0,0.9)");
                } else {
                    navBar.removeClass('sticky');
                    navBar.css("background", "#000");
                }
            });
        });
    </script>
    @endsection