@extends('blog.app')
@section('nav')
    <a href="#" class="logo"><img src="images/logo.png" alt="Logo Image"></a>

    <div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="ion-navicon"></i></div>

    <ul class="main-menu visible-on-click" id="main-menu">
        <li><a href="#">test</a></li>
        <li><a href="#">test</a></li>
        <li><a href="#">test</a></li>
    </ul><!-- main-menu -->

    <div class="src-area">
        <ul class="main-menu visible-on-click" id="main-menu">
            <li><a href="#">test</a></li>

        </ul><!-- main-menu -->

    </div>
    @endsection
@section('content')



    <div class="col-md-6 col-sm-12">
        <div class="card h-100">
            <div class="single-post post-style-1">

                <div class="blog-image"><img src="{{ asset('/images/blog/alex-lambley-205711.jpg') }}" alt="Blog Image"></div>

                <a class="avatar" href="#"><img src="{{ asset('/images/blog/icons8-team-355979.jpg') }} " alt="Profile Image"></a>

                <div class="blog-info">

                    <h4 class="title"><a href="#"><b>How Did Van Gogh's Turbulent Mind Depict One of the Most Complex
                                Concepts in Physics?</b></a></h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                        ut labore et dolore magna aliqua. Ut enim ad minim veniam</p><br>
                    <ul class="post-footer">
                        <li><a href="#"><i class="ion-heart"></i>57</a></li>
                        <li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
                        <li><a href="#"><i class="ion-eye"></i>138</a></li>
                    </ul>

                </div><!-- blog-info -->
            </div><!-- single-post -->
        </div><!-- card -->
    </div><!-- col-md-6 col-sm-12 -->


@endsection
@section('sidebar')
    <div class="single-post info-area ">

        <div class="about-area">
            <h4 class="title"><b>ABOUT BONA</b></h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur
                Ut enim ad minim veniam</p>
        </div>

        <div class="subscribe-area">

            <h4 class="title"><b>SUBSCRIBE</b></h4>
            <div class="input-area">
                <form>
                    <input class="email-input" type="text" placeholder="Enter your email">
                    <button class="submit-btn" type="submit"><i class="ion-ios-email-outline"></i></button>
                </form>
            </div>

        </div><!-- subscribe-area -->

        <div class="tag-area">

            <h4 class="title"><b>TAG CLOUD</b></h4>
            <ul>
                <li><a href="#">Manual</a></li>
                <li><a href="#">Liberty</a></li>
                <li><a href="#">Recomendation</a></li>
                <li><a href="#">Interpritation</a></li>
                <li><a href="#">Manual</a></li>
                <li><a href="#">Liberty</a></li>
                <li><a href="#">Recomendation</a></li>
                <li><a href="#">Interpritation</a></li>
            </ul>

        </div><!-- subscribe-area -->

    </div><!-- info-area -->
@endsection

@section('footer')
    <div class="col-lg-4 col-md-6">
        <div class="footer-section">

            <a class="logo" href="#"><img src="images/logo.png" alt="Logo Image"></a>
            <p class="copyright">Bona @ 2017. All rights reserved.</p>
            <p class="copyright">Designed by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
            <ul class="icons">
                <li><a href="#"><i class="ion-social-facebook-outline"></i></a></li>
                <li><a href="#"><i class="ion-social-twitter-outline"></i></a></li>
                <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                <li><a href="#"><i class="ion-social-vimeo-outline"></i></a></li>
                <li><a href="#"><i class="ion-social-pinterest-outline"></i></a></li>
            </ul>

        </div><!-- footer-section -->
    </div><!-- col-lg-4 col-md-6 -->

    <div class="col-lg-4 col-md-6">
        <div class="footer-section">
            <h4 class="title"><b>CATAGORIES</b></h4>
            <ul class="icons">
                <li><a href="#"><i class="ion-social-facebook-outline"></i></a></li>
                <li><a href="#"><i class="ion-social-twitter-outline"></i></a></li>
                <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                <li><a href="#"><i class="ion-social-vimeo-outline"></i></a></li>
                <li><a href="#"><i class="ion-social-pinterest-outline"></i></a></li>
            </ul>
        </div><!-- footer-section -->
    </div><!-- col-lg-4 col-md-6 -->

    <div class="col-lg-4 col-md-6">
        <div class="footer-section">

            <h4 class="title"><b>SUBSCRIBE</b></h4>
            <div class="input-area">
                <form>
                    <input class="email-input" type="text" placeholder="Enter your email">
                    <button class="submit-btn" type="submit"><i class="icon ion-ios-email-outline"></i></button>
                </form>
            </div>

        </div><!-- footer-section -->
    </div><!-- col-lg-4 col-md-6 -->
@endsection