<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog | Life With Goals</title>

    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <nav style=" background-color: #0d47a1;color: #ffffff; border-radius:0% "
         class="navbar navbar-default navbar-static-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                @if (Auth::guest())
                    <img style="margin-top: 3%" class="logoImg hide-on-small-only left" onclick="javascript:location.href='{{url('/dashboard')}}'"  src="{{asset('favicon/LOGO.png')}}" alt="" height="39px" width="200px">

            @else
                    <img style="margin-top: 8%; margin-left: 37%" class="logoImg hide-on-small-only left" onclick="javascript:location.href='{{url('/dashboard')}}'"  src="{{asset('favicon/LOGO.png')}}" alt="" height="39px" width="200px">

            @endif
              <!--   <a style="color: #ffffff;" class="navbar-brand" href="/">Blog | Life With Goals</a> -->
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">




                    <li>
                        <a style="color: #ffffff;margin-top: 13%; margin-left: 82%" href="{{ url('/blog') }}">Home</a>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li>
                            <a style="color: #ffffff;" href="{{url('/')}}">Login</a>
                        </li>
                        <li>
                            <a style="color: #ffffff;" href="{{url('/')}}">Register</a>
                        </li>
                    @else
                        <li class="dropdown">   <!--
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">{{ Auth::user()->fname }}  {{ Auth::user()->lname }} <span
                                        class="caret"></span></a>

                                                              <li class="dropdown" ><a class="dropdown-toggle" data-toggle="dropdown" role="button"
                                                                                       aria-expanded="false"><img    style="margin-top:-5px;" class="img-circle" src="{{asset('uploads/avatars/'.Auth::User()->avatar)}}"width="40px" height="40px" ></a></li>


                            <ul class="dropdown-menu" role="menu">
                                @if (Auth::user()->can_post())
                                    <li>
                                        <a href="{{ url('/new-post') }}">Add new post</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/user/'.Auth::id().'/posts') }}">My Posts</a>
                                    </li>
                                @endif
                                <li>
                                    <a href="{{ url('/user/'.Auth::id()) }}">My Profile</a>
                                </li>
                                <li>
                                    <a href="{{ url('/auth/logout') }}">Logout</a>
                                </li>
                            </ul>-->

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img    style="margin-top:-5px;" class="img-circle" src="{{asset('uploads/avatars/'.Auth::User()->avatar)}}"width="40px" height="40px" ></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url('/new-post') }}">New Post <span class="	glyphicon glyphicon-comment pull-right"></span></a></li>
                                <li class="divider"></li>
                                <li><a href="{{ url('/user/'.Auth::id().'/posts') }}">My Posts <span class="glyphicon glyphicon-stats pull-right"></span></a></li>

                                <li><a href="{{ url('/user/'.Auth::id()) }}">Profile <span class="	glyphicon glyphicon-user pull-right">  </span></a></li>
                                <li class="divider"></li>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                                <li><a href="{{ route('logout') }}"> <a href="{{ route('logout') }}"
                                                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a> <span class="glyphicon glyphicon-log-out pull-right"></span></a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>

    </nav>

</head>

<body>


<div class="container">

    @if ($errors->any())
        <div class='flash alert-danger'>
            <ul class="panel-body">
                @foreach ( $errors->all() as $error )
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    <main role="main" class="container">
        <div class="row">

            <div class="col-md-7  col-md-offset-1">
                @if (Session::has('message'))
                    <div class="flash alert-info">
                        <p class="panel-body">
                            {{ Session::get('message') }}
                        </p>
                    </div>
                @endif
                <div class=" ">
                    <div class="panel-heading">
                        <h2>@yield('title')</h2>
                        @yield('title-meta')

                    </div>
                    <div class="panel-body">
                        @yield('content')
                    </div>
                </div>
            </div>

            <div class="col-md-4  ">
                @yield('content2')
            </div><!-- /.blog-sidebar -->

        </div>
    </main>

</div>


<!-- Scripts -->

<script src="{{ asset('/js/jquery.min-2.1.3.js') }}"></script>
<script src="{{ asset('/js/bootstrap.min-3.3.1.js') }}"></script>
</body>

@if (Auth::guest())



@else
    <!--
    <div class="btn-group-sm hidden" id="mini-fab">
        <a href="{{ url('/user/'.Auth::id()) }}" class="btn btn-info btn-fab" data-toggle="tooltip" data-placement="left" data-original-title="Other"
           title="Profile" id="autre">
            <i class="material-icons">
                <svg style="width:24px;height:30px" viewBox="0 0 24 20">
                    <path fill="#000000"
                          d="M16,12A2,2 0 0,1 18,10A2,2 0 0,1 20,12A2,2 0 0,1 18,14A2,2 0 0,1 16,12M10,12A2,2 0 0,1 12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12M4,12A2,2 0 0,1 6,10A2,2 0 0,1 8,12A2,2 0 0,1 6,14A2,2 0 0,1 4,12Z"/>
                </svg>
            </i>
        </a>
        <a href="{{ url('/user/'.Auth::id().'/posts') }}" class="btn btn-warning btn-fab" data-toggle="tooltip" data-placement="left" data-original-title="SMS"
           title="My Posts" id="sms">
            <i class="material-icons">
                <svg style="width:24px;height:30px" viewBox="0 0 24 20">
                    <path fill="#000000"
                          d="M9,22A1,1 0 0,1 8,21V18H4A2,2 0 0,1 2,16V4C2,2.89 2.9,2 4,2H20A2,2 0 0,1 22,4V16A2,2 0 0,1 20,18H13.9L10.2,21.71C10,21.9 9.75,22 9.5,22V22H9Z"/>
                </svg>
            </i>
        </a>
        <a href="{{ url('/new-post') }}" class="btn btn-danger btn-fab" data-toggle="tooltip" data-placement="left" data-original-title="Mail"
           title="New Post" id="mail">
            <i class="material-icons">
                <svg style="width:24px;height:30px" viewBox="0 0 24 20">
                    <path fill="#000000"
                          d="M4,8L12,13L20,8V8L12,3L4,8V8M22,8V18A2,2 0 0,1 20,20H4A2,2 0 0,1 2,18V8C2,7.27 2.39,6.64 2.97,6.29L12,0.64L21.03,6.29C21.61,6.64 22,7.27 22,8Z"/>
                </svg>
            </i>
        </a>
    </div>
    <div class="btn-group">
        <a href="javascript:void(0)" class="btn btn-success btn-fab" id="main">
            <i class="material-icons">
                <svg style="width:24px;height:30px" viewBox="0 0 24 23">
                    <path fill="#000000"
                          d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z"/>
                </svg>
            </i>
        </a>
    </div>-->

    <style>
        body {
            width: 100%;
            height: 100%;
        }

        .btn-group-sm .btn-fab {
            position: fixed !important;
            right: 24px;
            border-radius: 100%;
        }

        .btn-group .btn-fab {
            position: fixed !important;
            right: 20px;
            border-radius:50%;
        }

        #main {
            bottom: 22px;
        }

        #mail {
            bottom: 83px
        }

        #sms {
            bottom: 132px
        }

        #autre {
            bottom: 182px
        }
    </style>
    <script>
        $("#main").click(function () {
            $("#mini-fab").toggleClass('hidden');
        });

        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
        $.material.init();
    </script>
@endif

<div style=" background-color: #0d47a1;color: #ffffff; border-radius:0% " id="footer" class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1"><br><br>
            <center>
                <p>Copyright &copy; 2017 | <a href="/">Life With Goals | Blog</a></p></center>
            <br><br>
        </div>
    </div>
</div>

</html>
