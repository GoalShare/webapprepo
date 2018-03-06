<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Life WIth Goals|Blog</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">

    <!-- Font -->

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">


    <link href="http://code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet">
    <!-- Stylesheets -->
    <link href="{{ asset('/recblog/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('/recblog/css/swiper.css') }}" rel="stylesheet">
    <link href="{{ asset('/recblog/css/ionicons.css') }}" rel="stylesheet">


    <link href="{{ asset('/recblog/post/postresponsive.css') }}" rel="stylesheet">

    <link href="{{ asset('/recblog/post/poststyles.css') }}" rel="stylesheet">

    <style>
        .insets {
            float: right;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            box-shadow:
                    inset 0 0 0 2px rgba(255,255,255,0.6),
                    0 1px 1px rgba(0,0,0,0.1);
            background-color: transparent !important;
            z-index: 999;
            margin: 8px 10px 10px 0px;
        }

        .insets img {
            border-radius: inherit;
            width: inherit;
            height: inherit;
            display: block;
            position: relative;
            z-index: 998;


        }
    </style>

</head>

<body>
<header>


    <div class="container-fluid position-relative no-side-padding">




    @if (Auth::guest())
            <a href="#" class="logo"><img src="{{asset('favicon/LOGO.png')}}" alt="Logo Image"></a>

            <div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="ion-navicon"></i>  </div>




        @else


            <a href="#" class="logo"><img src="{{asset('favicon/LOGO.png')}}" alt="Logo Image"></a>

            <div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="ion-navicon"></i>  </div>



            <ul class="nav navbar-nav navbar-right">

                <li>
                    <div class="insets">
                        <img src="{{asset('uploads/avatars/'.Auth::User()->avatar)}}">
                    </div>

                </li>

            </ul>

        @endif

    </div><!-- conatiner -->

</header>

<section class="post-area section">
    <div class="container">

        <div class="row">

            <div class="col-lg-8 col-md-12 no-right-padding">

                <div class="main-post">
                    @yield('postbody')
                </div><!-- main-post -->
            </div><!-- col-lg-8 col-md-12 -->

            <div class="col-lg-4 col-md-12 no-left-padding">

                @yield('sidebar')

            </div><!-- col-lg-4 col-md-12 -->

        </div><!-- row -->
        <section class="comment-section">
            <div class="container">
                <h4><b>Leave a Comment</b></h4>
                <div class="row">

                    <div class="col-lg-8 col-md-12">
                        @yield('comments')

                    </div><!-- col-lg-8 col-md-12 -->

                </div><!-- row -->

            </div><!-- container -->
        </section>
    </div><!-- container -->

</section><!-- post-area -->
<style>
    body{
        font-family: 'Roboto';

        background: #f1f1f1;
    }

    h3{
        color: #555;
    }

    #presentation{
        width: 480px;
        height: 120px;
        padding: 20px;
        margin: auto;
        background: #FFF;
        margin-top: 10px;
        box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
        transition: all 0.3s;
        border-radius: 3px;
    }

    #presentation:hover{
        box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
        transition: all 0.3s;
        transform: translateZ(10px);
    }

    #floating-button{
        width: 55px;
        height: 55px;
        border-radius: 50%;
        background: #db4437;
        position: fixed;
        bottom: 30px;
        right: 30px;
        cursor: pointer;
        box-shadow: 0px 2px 5px #666;
    }

    .plus{
        color: white;
        position: absolute;
        top: 0;
        display: block;
        bottom: 0;
        left: 0;
        right: 0;
        text-align: center;
        padding: 0;
        margin: 0;
        line-height: 55px;
        font-size: 38px;
        font-family: 'Roboto';
        font-weight: 300;
        animation: plus-out 0.3s;
        transition: all 0.3s;
    }

    #container-floating{
        position: fixed;
        width: 70px;
        height: 70px;
        bottom: 30px;
        right: 30px;
        z-index: 50px;
    }

    #container-floating:hover{
        height: 400px;
        width: 90px;
        padding: 30px;
    }

    #container-floating:hover .plus{
        animation: plus-in 0.15s linear;
        animation-fill-mode: forwards;
    }

    .edit{
        position: absolute;
        top: 0;
        display: block;
        bottom: 0;
        left: 0;
        display: block;
        right: 0;
        padding: 0;
        opacity: 0;
        margin: auto;
        line-height: 65px;
        transform: rotateZ(-70deg);
        transition: all 0.3s;
        animation: edit-out 0.3s;
    }

    #container-floating:hover .edit{
        animation: edit-in 0.2s;
        animation-delay: 0.1s;
        animation-fill-mode: forwards;
    }

    @keyframes edit-in{
        from {opacity: 0; transform: rotateZ(-70deg);}
        to {opacity: 1; transform: rotateZ(0deg);}
    }

    @keyframes edit-out{
        from {opacity: 1; transform: rotateZ(0deg);}
        to {opacity: 0; transform: rotateZ(-70deg);}
    }

    @keyframes plus-in{
        from {opacity: 1; transform: rotateZ(0deg);}
        to {opacity: 0; transform: rotateZ(180deg);}
    }

    @keyframes plus-out{
        from {opacity: 0; transform: rotateZ(180deg);}
        to {opacity: 1; transform: rotateZ(0deg);}
    }

    .nds{
        width: 40px;
        height: 40px;
        border-radius: 50%;
        position: fixed;
        z-index: 300;
        transform:  scale(0);
        cursor: pointer;
    }

    .nd1{
        background: #d3a411;
        right: 40px;
        bottom: 120px;
        animation-delay: 0.2s;
        animation: bounce-out-nds 0.3s linear;
        animation-fill-mode:  forwards;
    }

    .nd3{
        background: #3c80f6;
        right: 40px;
        bottom: 180px;
        animation-delay: 0.15s;
        animation: bounce-out-nds 0.15s linear;
        animation-fill-mode:  forwards;
    }

    .nd4{
        background: #ba68c8;
        right: 40px;
        bottom: 240px;
        animation-delay: 0.1s;
        animation: bounce-out-nds 0.1s linear;
        animation-fill-mode:  forwards;
    }

    .nd5{
        background-image: url('http://icons.iconarchive.com/icons/elegantthemes/beautiful-flat/128/caution-icon.png');
        background-size: 100%;
        right: 40px;
        bottom: 300px;
        animation-delay: 0.08s;
        animation: bounce-out-nds 0.1s linear;
        animation-fill-mode:  forwards;
    }

    @keyframes bounce-nds{
        from {opacity: 0;}
        to {opacity: 1; transform: scale(1);}
    }

    @keyframes bounce-out-nds{
        from {opacity: 1; transform: scale(1);}
        to {opacity: 0; transform: scale(0);}
    }

    #container-floating:hover .nds{

        animation: bounce-nds 0.1s linear;
        animation-fill-mode:  forwards;
    }

    #container-floating:hover .nd3{
        animation-delay: 0.08s;
    }
    #container-floating:hover .nd4{
        animation-delay: 0.15s;
    }
    #container-floating:hover .nd5{
        animation-delay: 0.2s;
    }

    .letter{
        font-size: 23px;
        font-family: 'Roboto';
        color: white;
        position: absolute;
        left: 0;
        right: 0;
        margin: 0;
        top: 0;
        bottom: 0;
        text-align: center;
        line-height: 40px;
    }

    .reminder{
        position: absolute;
        left: 0;
        right: 0;
        margin: auto;
        top: 0;
        bottom: 0;
        line-height: 40px;
    }

    .profile{
        border-radius: 50%;
        width: 40px;
        position: absolute;
        top: 0;
        bottom: 0;
        margin: auto;
        right: 20px;
    }
</style>
@if (Auth::guest())

@else
    <div id="container-floating">

        <div class="nd5 nds" data-toggle="tooltip" data-placement="left" data-original-title="Simone"></div>

        <div class="nd4 nds" data-toggle="tooltip" data-placement="left" data-original-title="contract@gmail.com">
            <a href="{{ url('/user/'.Auth::id()) }}">
                <img class="reminder" src="http://lucialiu.me/images/portfolio/tastemap/profile-icon.png"/>
            </a>
        </div>

        <div class="nd3 nds" data-toggle="tooltip" data-placement="left" data-original-title="Reminder">
            <a href="  {{ url('/user/'.Auth::id().'/posts') }}">
                <img class="reminder" src="http://icons.iconarchive.com/icons/elegantthemes/beautiful-flat/128/clipboard-icon.png"/>
            </a>

        </div>

        <div class="nd1 nds" data-toggle="tooltip" data-placement="left" data-original-title="Edoardo@live.it"><img class="reminder">
            <a href="{{ url('/new-post') }}">
                <img class="reminder" src="http://icons.iconarchive.com/icons/elegantthemes/beautiful-flat/128/compose-icon.png"/>
            </a>


        </div>

        <div id="floating-button" data-toggle="tooltip" data-placement="left" data-original-title="Create" onclick="newmail()">
            <p class="plus">+</p>
            <img style="border-radius: 50%" class="edit" src=" ">
        </div>

    </div>
@endif





<footer>

    <div class="container">
        <div class="row">
            @yield('footer')


        </div><!-- row -->
    </div><!-- container -->
</footer>

</body>


<script src="{{ asset('/recblog/js/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('/recblog/js/tether.min.js') }}"></script>
<script src="{{ asset('/recblog/js/bootstrap.js') }}"></script>
<script src="{{ asset('/recblog/js/swiper.js') }}"></script>
<script src="{{ asset('/recblog/js/scripts.js') }}"></script>

</html>
