<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h4 class="text-center">Our Services</h4>
                <hr>
                <ul class="list-group">
                    <li class="list-group-item">Web Development</li>
                    <li class="list-group-item">Software Development</li>
                    <li class="list-group-item">Migrations</li>
                    <li class="list-group-item">IOT</li>
                    <li class="list-group-item">SEO</li>
                    <li class="list-group-item">And anything related to development. <i class="far fa-laugh-squint"></i></li>
                </ul>
            </div>
            <div class="col-md-5">
                <div class="text-center">
                    <h1>
                        <img src="{{ asset('images/logo.png') }}" alt="NIT Sistems logo" title="NIT Sistems logo" />
                        NIT Sistems</h1>
                    <p>The Future Of Memory Innovation</p>
                </div>
            </div>
            <div class="col-md-4">
                <h4 class="text-center">We Would Love A Message From You</h4>
                <form action="/send/email" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name"><i class="fas fa-smile"></i>&nbsp;Your Name</label>
                        <input type="text" name="name" placeholder="Your Name" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="email"><i class="fas fa-envelope"></i>&nbsp;Your Email</label>
                        <input type="email" name="email" placeholder="Your Name" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="message"><i class="fas fa-comments"></i>&nbsp;Your Message</label>
                        <textarea name="message" cols="30" rows="10" class="form-control" placeholder="Your Message"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="SEND" class="contact float-right" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</footer>
<div class="terms text-center">
    <p>2011-2019 © NIT Sistems. All rights reserved</p>
</div>