@extends('blog.app')

@section('nav')

@endsection
@section('title')
    <h4>  {{$title}} </h4>
@endsection

@section('content')

    @if ( !$posts->count() )
        There is no post till now. Login and write a new post now!!!
    @else

        @foreach( $posts as $post )
            <div class="col-md-6 col-sm-12">
                <div class="card h-100">
                    <div class="single-post post-style-1">
                        <div class="profile-pic">
                            <div class="blog-image"><img src="images/{{ $post->cover }}" alt="Blog Image">
                                <div class="edit"><a href="{{ url('edit/'.$post->slug)}}">

                                    @if(!Auth::guest() && ($post->author_id == Auth::user()->id || Auth::user()->is_admin()))

                                        @if($post->active == '1')
<!--
                                            <a href="">
                                                <button style="float: right" class="btn">Edit
                                                    Post
                                                </button>
                                            </a> -->
                                                <i style="color: white; font-size: 18px " class="fa fa-pencil fa-lg"></i></a>
                                        @else


                                        @endif
                                    @endif
                                </div></div>

                        </div>

                        <a class="avatar" href="#">
                            <img src="{{asset('uploads/avatars/'.$post->author->avatar)}}" alt="Profile Image">
                            </a>

                        <div class="blog-info">
                            <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

                            <style>
                                .profile-pic {
                                    position: relative;
                                    display: inline-block;
                                }

                                .profile-pic:hover .edit {
                                    display: block;
                                }

                                .edit {
                                    padding-top: 7px;
                                    padding-right: 7px;
                                    position: absolute;
                                    right: 0;
                                    top: 0;
                                    display: none;
                                }
                            </style>
                            <h3 class="title"><a href="{{ url('/'.$post->slug) }}"><b>{{ $post->title }}</b></a></h3>
                            <!--
                            <a href="{{ url('/'.$post->slug) }}"><h3><b>{{ $post->title }}</b> </h3></a>
-->
                            <h6 class="binfo" style="color: darkgray; text-decoration: none";>

                                <span><i
                                            class="glyphicon glyphicon-calendar">

                                    </i> {{ $post->created_at->format('M d,Y \a\t h:i a') }} </span>&nbsp<span><i
                                            class="glyphicon glyphicon-user"></i>  <a style=" text-decoration: none"
                                                                                      href="{{ url('/user/'.$post->author_id)}}">{{ $post->author->fname }} {{ $post->author->lname }}</a></span>
                            </h6>
                            <p>

                                {!! str_limit($post->body, $limit = 200, $end = '  .........
                                </br></br>
                                <button type="button" class="btn btn-secondary btn-sm"><a href='.url("/".$post->slug).'>Read More</a></button>

                                ') !!}</p><br>
                            <ul class="post-footer">
                                <li><a href="#"><i class="ion-heart"></i>0</a></li>
                                <li><a href="#"><i class="ion-chatbubble"></i>0</a></li>
                                <li><a href="#"><i class="ion-eye"></i>0</a></li>
                            </ul>

                        </div><!-- blog-info -->
                    </div><!-- single-post -->
                </div><!-- card -->
            </div><!-- col-md-6 col-sm-12 -->

        @endforeach
        {!! $posts->render() !!}


    @endif

@endsection

@section('sidebar')
    <div class="single-post info-area ">

        <!--   <div class="about-area">
             <h4 class="title"><b>ABOUT LIFE WITH GOALS</b></h4>
             <p>As a startup, our vision is to connect people with common goals to achieve greater success or people to work through a goal they like and share the success to inspire other people. We are a young bunch of IT professional those like to think differently with a mentality of innovation. </p>
         </div>

       <div class="subscribe-area">

             <h4 class="title"><b>SUBSCRIBE</b></h4>
             <div class="input-area">
                 <form>
                     <input class="email-input" type="text" placeholder="Enter your email">
                     <button class="submit-btn" type="submit"><i class="ion-ios-email-outline"></i></button>
                 </form>
             </div>

         </div> subscribe-area -->

        <div class="tag-area">

            <h4 class="title"><b>#TAGS</b></h4>
            <ul>
                <li><a href="#">Health</a></li>
                <li><a href="#">Life</a></li>
                <li><a href="#">Goals</a></li>
                <li><a href="#">Personality</a></li>
                <li><a href="#">Peoples</a></li>
                <li><a href="#">Targets</a></li>
                <li><a href="#">Recomendation</a></li>

            </ul>

        </div><!-- subscribe-area -->
        <div class="col-md-12">
            <img src="http://placehold.it/300x300" alt="" class="img-rounded img-responsive"/>
            <br><br>
            <img src="http://placehold.it/300x300" alt="" class="img-rounded img-responsive"/>

        </div>
    </div><!-- info-area -->



@endsection
@section('footer')
    <div class="col-lg-4 col-md-6">
        <div class="footer-section">



        </div><!-- footer-section -->
    </div><!-- col-lg-4 col-md-6 -->

    <div class="col-lg-4 col-md-6">
        <div class="footer-section">
            <a class="logo" href="#"><img src="images/logo.png" alt="Life With Goals "></a>
            <p class="copyright"> 2017. All rights reserved.</p>

        </div><!-- footer-section -->
    </div><!-- col-lg-4 col-md-6 -->


@endsection