<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('images/logo.png') }}" alt="">
            NIT SISTEMS
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            {{-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Services
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Web Development</a>
                    <a class="dropdown-item" href="#">Software Development</a>
                    <a class="dropdown-item" href="#">Migrations</a>
                    <a class="dropdown-item" href="#">IOT</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">SEO</a>
                </div>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link" href="/team">Meet Our Team</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/clients">Our Clients</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/about">About Us</a>
            </li>
            </ul>
            <ul class="ml-auto navbar-nav">
                <li class="nav-item">
                    <a href="Tel:+94114930969" class="ml-auto contact">Call Us</a>
                </li>
                &nbsp;&nbsp;
                <li>
                    <a href="#footer" class="ml-auto contact">Contact Us</a>
                </li>
            </ul>
        </div>
    </div>
</nav>