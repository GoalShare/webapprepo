@extends('blog.postapp')


<style>

    * {
        margin: 0;
        padding: 0;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    a {
        color: #03658c;
        text-decoration: none;
    }

    ul {
        list-style-type: none;
    }

    body {
        font-family: 'Roboto', Arial, Helvetica, Sans-serif, Verdana;
        background: #dee1e3;
    }

    /** ====================
     * Lista de Comentarios
     =======================*/
    .comments-container {
        margin: 30px auto 15px;
        width: 768px;
    }

    .comments-container h1 {
        font-size: 36px;
        color: #283035;
        font-weight: 400;
    }

    .comments-container h1 a {
        font-size: 18px;
        font-weight: 700;
    }

    .comments-list:after {
        content: '';
        position: absolute;
        background: #c7cacb;
        bottom: 0;
        left: 27px;
        width: 7px;
        height: 7px;
        border: 3px solid #dee1e3;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        border-radius: 50%;
        list-style-type: none;
    }

    .comments-list li {
        margin-bottom: 15px;
        display: block;
        position: relative;
        list-style-type: none;
    }

    .comments-list li:after {
        content: '';
        display: block;
        clear: both;
        height: 0;
        width: 0;
        list-style-type: none;
    }

    /**
     * Avatar
     ---------------------------*/
    .comments-list .comment-avatar {
        width: 45px;
        height: 45px;
        position: relative;
        z-index: 99;
        float: left;
        margin-left: 20px;
        border: 3px solid #FFF;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        overflow: hidden;
        list-style-type: none;
    }

    .comments-list .comment-avatar img {
        width: 100%;
        height: 100%;
        list-style-type: none;
    }

    .reply-list .comment-avatar {
        width: 50px;
        height: 50px;
    }

    .comment-main-level:after {
        content: '';
        width: 0;
        height: 0;
        display: block;
        clear: both;
    }

    /**
     * Caja del Comentario
     ---------------------------*/
    .comments-list .comment-box {
        width: 542px;
        margin-left: 85px;
        position: relative;
        -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15);
        -moz-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15);
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15);
        list-style-type: none;
    }

    .comments-list .comment-box:before, .comments-list .comment-box:after {
        content: '';
        height: 0;
        width: 0;
        position: absolute;
        display: block;
        border-width: 10px 12px 10px 0;
        border-style: solid;
        border-color: transparent #FCFCFC;
        top: 8px;
        left: -11px;
        list-style-type: none;
    }

    .comments-list .comment-box:before {
        border-width: 11px 13px 11px 0;
        border-color: transparent rgba(0, 0, 0, 0.05);
        left: -12px;
    }

    .reply-list .comment-box {
        width: 610px;
    }

    .comment-box .comment-head {
        background: #FCFCFC;
        padding: 2px 12px;
        border-bottom: 1px solid #E5E5E5;
        overflow: hidden;
        -webkit-border-radius: 4px 4px 0 0;
        -moz-border-radius: 4px 4px 0 0;
        border-radius: 4px 4px 0 0;
    }

    .comment-box .comment-head i {
        float: right;
        margin-left: 14px;
        position: relative;
        top: 2px;
        color: #A6A6A6;
        cursor: pointer;
        -webkit-transition: color 0.3s ease;
        -o-transition: color 0.3s ease;
        transition: color 0.3s ease;
    }

    .comment-box .comment-head i:hover {
        color: #03658c;
    }

    .comment-box .comment-name {
        color: #283035;
        font-size: 14px;
        font-weight: 700;
        float: left;
        margin-right: 10px;
    }

    .comment-box .comment-name a {
        color: #283035;
    }

    .comment-box .comment-head span {
        float: left;
        color: #999;
        font-size: 13px;
        position: relative;
        top: 1px;
    }

    .comment-box .comment-content {
        background: #FFF;
        padding: 12px;
        font-size: 15px;
        color: #595959;
        -webkit-border-radius: 0 0 4px 4px;
        -moz-border-radius: 0 0 4px 4px;
        border-radius: 0 0 4px 4px;
    }

    .comment-box .comment-name.by-author, .comment-box .comment-name.by-author a {
        color: #03658c;
    }

    .comment-box .comment-name.by-author:after {

        background: #03658c;
        color: #FFF;
        font-size: 12px;
        padding: 3px 5px;
        font-weight: 700;
        margin-left: 10px;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
    }

    /** =====================
     * Responsive
     ========================*/
    @media only screen and (max-width: 766px) {
        .comments-container {
            width: 480px;
        }

        .comments-list .comment-box {
            width: 390px;
        }

        .reply-list .comment-box {
            width: 320px;
        }
    }
</style>

<title>{{ $post->title }}</title>
<meta property="og:locale" content="en_US"/>
<meta property="og:type" content="article"/>
<meta property="og:title" content="{{ $post->title }}"/>
<meta property="og:type" content="{{ $post->title }}"/>
<meta property="og:image" content="http://www.lifewithgoals.com/images/{{ $post->cover }}"/>
<meta property="og:site_name" content="{{ $post->title }}"/>

<meta property="og:url" content="http://www.lifewithgoals.com/{{ $post->slug }}"/>

<meta property="og:site_name" content="LifeWithGOals Blog"/>

<meta property="og:image:secure_url" content="http://www.lifewithgoals.com/images/{{ $post->cover }}"/>
<meta property="og:image:width" content="730"/>
<meta property="og:image:height" content="485"/>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

@php
    // Variable to check
    $str = $post->body;

    // Remove HTML tags from string
    $newstr = filter_var($str, FILTER_SANITIZE_STRING);

@endphp

<meta name="description" content="{!! str_limit($newstr, $limit = 200, $end = ' ') !!}...."/>
@section('postbody')



    <link href="{{ asset('/src/css/reaction.css') }}" rel="stylesheet">
    <link href="{{ asset('/src/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/src/css/reaction.css') }}" rel="stylesheet">
    <script src="{{ asset('/src/js/jquery.min.js') }}"></script>

    <div class="blog-post-inner">

        <div class="post-info">

            <div class="left-area">
                <a class="avatar" href="#"><img src="{{asset('uploads/avatars/'.$post->author->avatar)}}"
                                                alt="Profile Image"></a>
            </div>

            <div class="middle-area">
                <a class="name" href="{{ url('/user/'.$post->author_id)}}"></b>
                    {{ $post->author->fname }} {{ $post->author->lname }}</a></b></a>
                <h6 class="date">on {{ $post->created_at->format('M d,Y \a\t h:i a') }}</h6>


            </div>
            <div class="right-area">
                @if(!Auth::guest() && ($post->author_id == Auth::user()->id || Auth::user()->is_admin()))

                    <a class="name" href="#"><b>
                            <h6 class="date">
                                <a href="{{ url('edit/'.$post->slug)}}">
                                    <button style="float: right" class="btn">Edit Post</button>
                                </a>
                            </h6>
                        </b></a>


                @endif

            </div>
        </div><!-- post-info -->


        @if($post)
            <h3 class="title">
                <a href="#">

                    <b>{{ $post->title }}</b></a></h3>

        @else
            Page does not exist
        @endif
        @if( $post->cover==0)
        @else

            <div class="post-image"><img src="/images/{{ $post->cover }}" alt="Blog Image"></div>

        @endif

        <p class="para">   {!! $post->body !!}</p>


        <ul class="tags">

            @php

                $post_id = $post->id;
                $results= DB::table('posts')
                        ->select('tags')
                        ->where('id', '=',  $post_id)
                          ->first();

                $tags = $results->tags;
                $tagsArray =  explode(',', $tags);



            @endphp
            @foreach($tagsArray as $ta)

                <li><a href="#"> {{ $ta }} </a></li>
            @endforeach


        </ul>
    </div><!-- blog-post-inner -->

    <div data-postid="{{$post->id}}" class="post-icons-area">

        @if (Auth::guest())
            <li><p style="margin-left: 83px"><a href="{{url('/')}}">Login</a> to Like </p></li>
        @else
            <ul class="post-icons">


                <li>
                    <div class="facebook-reaction"><!-- container div for reaction system -->
                        @php
                            $post_id = $post->id;
                            $userid = Auth::user()->id;

                        @endphp
                        <span class="like-btn"> <!-- Default like button -->
						<span class="like-btn-emo like-btn-{{DB::table('blikes')->where('blikes.post_id', $post_id)->Where('blikes.user_id', $userid)->value('like')}}"></span>
                            <!-- Default like button emotion-->

						<span data-reaction="{{DB::table('blikes')->where('blikes.post_id', $post_id)->Where('blikes.user_id', $userid)->value('like')}} "
                              id="{{$post->id}}"
                              class="like-btn-text-{{DB::table('blikes')->where('blikes.post_id', $post_id)->Where('blikes.user_id', $userid)->value('like')}}">{{DB::table('blikes')->where('blikes.post_id', $post_id)->Where('blikes.user_id', $userid)->value('like')}}</span>


                            <!-- Default like button text,(Like, wow, sad..) default:Like  -->
						  <ul class="reactions-box" style="z-index: 9999999 !important; "> <!-- Reaction buttons container-->
								<li id="{{$post->id}}" class="reaction reaction-like" data-reaction="Like"></li>
								<li id="{{$post->id}}" class="reaction reaction-love" data-reaction="Love"></li>
								<li id="{{$post->id}}" class="reaction reaction-haha" data-reaction="HaHa"></li>
								<li id="{{$post->id}}" class="reaction reaction-wow" data-reaction="Wow"></li>
								<li id="{{$post->id}}" class="reaction reaction-sad" data-reaction="Sad"></li>
								<li id="{{$post->id}}" class="reaction reaction-angry" data-reaction="Angry"></li>
						  </ul>
					</span>
                        <div class="like-stat"> <!-- Like statistic container-->
                            <span class="like-emo"> <!-- like emotions container -->
							<span class="like-btn-like"></span>
                                <span class="like-btn-{{DB::table('blikes')->where('blikes.post_id', $post_id)->Where('blikes.user_id', $userid)->value('like')}}"></span>


                                <!-- given emotions like, wow, sad (default:Like) -->
						</span>
                            <span class="like-details">You and @php
                                    $post_id = $post->id;
                                    $likes= DB::table('blikes')
                                            ->leftJoin('posts', 'blikes.post_id', '=', 'posts.id')
                                            ->where('blikes.post_id', '=',  $post_id)
                                            ->count();
                                    echo $likes;

                                @endphp others</span>
                        </div>
                    </div>
                </li>
                <!--
                                           <li><a href="#"><i class="ion-heart"></i></a></li>
                                           <li><a href="#"><i class="ion-chatbubble"></i></a></li>-->


              <!--  <li><a href="#"><i class="ion-heart"></i> @php
                            $post_id = $post->id;
                            $likes= DB::table('blikes')
                                    ->leftJoin('posts', 'blikes.post_id', '=', 'posts.id')
                                    ->where('blikes.post_id', '=',  $post_id)
                                    ->count();
                            echo $likes;

                        @endphp</a></li>
-->

                <li><a href="#"><i class="ion-chatbubble"></i>{{$totcomments}}</a></li>


            </ul>
        @endif


        <ul class="icons" style="padding-top: 50px">
            <li>SHARE :</li>
            <li><a class="facebook customer share" href="https://www.facebook.com/sharer.php?u={{Request::fullUrl()}}"
                   title="Facebook share" target="_blank"><i class="ion-social-facebook" ></i></a></li>
            <li><a class="google_plus customer share" href="https://plus.google.com/share?url={{Request::fullUrl()}}" target="_blank"><i class="fa fa-google-plus"></i></a>
            </li>
            <li><a class="twitter customer share" href="#" target="_blank"><i class="ion-social-twitter"></i></a></li>
            <li><a class="linkedin customer share" href="https://www.linkedin.com/shareArticle?mini=true&url={{Request::fullUrl()}}" target="_blank"><i
                            class="ion-social-pinterest"></i></a></li>


        </ul>


    </div>
    <script> ;(function ($) {

            $.fn.customerPopup = function (e, intWidth, intHeight, blnResize) {

                // Prevent default anchor event
                e.preventDefault();

                // Set values for window
                intWidth = intWidth || '500';
                intHeight = intHeight || '400';
                strResize = (blnResize ? 'yes' : 'no');

                // Set title and open popup with focus on it
                var strTitle = ((typeof this.attr('title') !== 'undefined') ? this.attr('title') : 'Social Share'),
                    strParam = 'width=' + intWidth + ',height=' + intHeight + ',resizable=' + strResize,
                    objWindow = window.open(this.attr('href'), strTitle, strParam).focus();
            }

            /* ================================================== */

            $(document).ready(function ($) {
                $('.customer.share').on("click", function (e) {
                    $(this).customerPopup(e);
                });
            });

        }(jQuery));</script>
    <script>
        var token = '{{ Session::token() }}';
        //  var urlLike = '{{ route('like') }}';
        var emolLike = '{{ route('emo') }}';
    </script>
@endsection

@section('sidebar')
    <div class="single-post info-area">
        <div class="tag-area">

            <h4 class="title"><b>TAGS</b></h4>
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
        <div class="sidebar-area about-area">
            <!--  <h4 class="title"><b>ABOUT Life With Goals</b></h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                  ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur
                  Ut enim ad minim veniam</p> -->
        </div>

        <div class="sidebar-area subscribe-area">
            <!--
                        <h4 class="title"><b>SUBSCRIBE</b></h4>
                        <div class="input-area">
                            <form>
                                <input class="email-input" type="text" placeholder="Enter your email">
                                <button class="submit-btn" type="submit"><i class="icon ion-ios-email-outline"></i></button>
                            </form>
                        </div>
            -->
        </div><!--- subscribe-area --->

        <div class="sidebar-area subscribe-area">


        </div>

    </div><!-- info-area -->

@endsection
@section('comments')

    <div class="comment-form">
    @if($post)
        <!--   <div>
                <h4 style="margin-left: 0px">Leave a comment</h4>
            </div> -->
            @if(Auth::guest())
                <p style="margin-left: 83px"><a href="{{url('/')}}">Login</a> to Comment</p>
            @else
                <form method="post" action="/comment/add">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="on_post" value="{{ $post->id }}">
                    <input type="hidden" name="slug" value="{{ $post->slug }}">
                    <div class="row">
                        <div class="col-sm-12">
											<textarea name="body" rows="2"
                                                      class="text-area-messge form-control"
                                                      placeholder="Enter your comment" aria-required="true"
                                                      aria-invalid="false" required></textarea>
                        </div><!-- col-sm-12 -->
                        <div class="col-sm-12">
                            <button name='post_comment' value="Post" class="submit-btn" type="submit" id="form-submit">
                                <b>POST COMMENT</b></button>
                        </div><!-- col-sm-12 -->

                    </div><!-- row -->
                </form>
            @endif


        @else
            404 error
        @endif

    </div><!-- comment-form -->





    <div class="commnets-area ">
        @if($comments)

            @foreach($comments as $comment)
                <div class="comment">

                    <div class="post-info">

                        <div class="left-area">
                            <a class="avatar" href="#"><img src="{{asset('uploads/avatars/'.$comment->author->avatar)}}"
                                                            alt="Profile Image"></a>
                        </div>

                        <div class="middle-area">
                            <a class="name" href="#"><b>By {{ $comment->author->fname}} {{ $comment->author->lname}}</b></a>
                            <h6 class="date">on {{ $comment->created_at->format('M d,Y \a\t h:i a') }}</h6>
                        </div>

                        <div class="right-area">
                            <h5 class="reply-btn"><a href="#"><b>REPLY</b></a></h5>
                        </div>

                    </div><!-- post-info -->

                    <p>{{ $comment->body }}</p>

                </div>
            @endforeach

        @endif
    </div><!-- commnets-area -->

    <a class="more-comment-btn" href="#"></b>VIEW MORE COMMENTS</a>


@endsection
@section('footer')
    <div class="col-lg-4 col-md-6">
        <div class="footer-section">

        </div><!-- footer-section -->
    </div><!-- col-lg-4 col-md-6 -->

    <div class="col-lg-4 col-md-6">
        <div class="footer-section">
            <a class="logo" href="#"><img src="images/logo.png" alt="Life With Goals "></a>
            <p class="copyright">@ 2018. All rights reserved.</p>

        </div><!-- footer-section -->
    </div><!-- col-lg-4 col-md-6 -->

@endsection





@section('content2')
    @if($post)

        <style>
            .media {
                /*box-shadow:0px 0px 4px -2px #000;*/
                margin: 20px 0;
                padding: 30px;
            }

            .dp {
                border: 10px solid #eee;
                transition: all 0.2s ease-in-out;
            }

            .dp:hover {
                border: 2px solid #eee;

                /*-webkit-font-smoothing:antialiased;*/
            }
        </style>
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object dp img-circle" src=" {{asset('uploads/avatars/'.$post->author->avatar)}}"
                     style="width: 100px;height:100px;">
            </a>
            <div class="media-body">
                <h4 class="media-heading">{{ $post->author->fname}} {{ $post->author->lname}}
                    <small> Sri Lanka</small>
                </h4>
                <h5>Author <a href="http://gridle.in">LifeWithGoals</a></h5>
                <hr style="margin:8px auto">

                <span class="label label-default">Tech</span>
                <span class="label label-default">IOT</span>
                <span class="label label-info">Programming</span>
                <span class="label label-default">Art</span>
            </div>
        </div>

    @endif
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


<script src="{{ asset('/src/reaction.js') }}"></script>


