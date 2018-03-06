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