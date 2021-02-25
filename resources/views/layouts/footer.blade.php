<footer class="footer-area">
    <div class="container">
        <div class="footer-top">
            <div class="row">
                <div class="col-sm-4">
                    <a class="footer-logo" href="#"><img src="/assets/img/primenestlogo.png" alt="prime nest logo"
                            title="prime nest logo "></a>
                </div>
                <div class="col-sm-8">
                    <div class="footer-social text-sm-right">
                        <span>FOLLOW US</span>
                        <ul class="social-icon">
                            <li>
                                <a href="{{ config('app.facebook') }}" target="_blank"><i
                                        class="fa fa-facebook  "></i></a>
                            </li>
                            <li>
                                <a href="{{ config('app.twitter') }}" target="_blank"><i
                                        class="fa fa-twitter  "></i></a>
                            </li>
                            <li>
                                <a href="{{ config('app.instagram') }}" target="_blank"><i
                                        class="fa fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="widget widget_nav_menu">
                        <h4 class="widget-title">About Us</h4>
                        <p> At Prime Nest we work to give every Nigerian a realistic opportunity to own a home of their
                            dreams. </p>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="widget widget_nav_menu">
                        <h4 class="widget-title">Quick Links</h4>
                        <ul>
                            <li><a href="/about-us">About Us</a></li>
                            <li><a href="/property">Properties</a></li>
                            <li><a href="/faq">FAQ</a></li>

                            <li><a href="/contact-us">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget widget_nav_menu">
                        <h4 class="widget-title">Featured Links</h4>
                        <ul>
                            <li><a href="https://blog.primenest.ng/" target="_blank">Blog</a></li>
                            <!-- <li><a href="about.html">Las Vegas Apartment</a></li>
                                <li><a href="#">Sacramento Townhome</a></li>
                                <li><a href="#">San Francisco Offices</a></li> -->
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <form class="widget widget-subscribe">
                        <div class="rld-single-input">
                            <input type="text" placeholder="Full Name">
                        </div>
                        <div class="rld-single-input">
                            <input type="text" placeholder="Your@email.com">
                        </div>
                        <button class="btn btn-yellow w-100">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="copy-right text-center">
            Copyright ©{{ date('Y') }} <a href="/" target="_blank"><span> Prime Nest Solutions </span></a> , All
            rights reserved
        </div>
    </div>
</footer>
