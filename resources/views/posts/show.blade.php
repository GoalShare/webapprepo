@extends('blog.guestapp')

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
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="article" />
<meta property="og:title" content="{{ $post->title }}" />
<meta property="og:type" content="{{ $post->title }}" />
<meta property="og:image" content="http://www.lifewithgoals.com/images/{{ $post->cover }}" />
<meta property="og:site_name" content="{{ $post->title }}" />

<meta property="og:url" content="http://www.lifewithgoals.com/{{ $post->slug }}" />

<meta property="og:site_name" content="LifeWithGOals Blog" />

<meta property="og:image:secure_url" content="http://www.lifewithgoals.com/images/{{ $post->cover }}" />
<meta property="og:image:width" content="730" />
<meta property="og:image:height" content="485" />

@php
    // Variable to check
    $str = $post->body;

    // Remove HTML tags from string
    $newstr = filter_var($str, FILTER_SANITIZE_STRING);

@endphp

<meta name="description" content="{!! str_limit($newstr, $limit = 200, $end = ' ') !!}...." />

@section('title')

    @if($post)

        {{ $post->title }}
        @if(!Auth::guest() && ($post->author_id == Auth::user()->id || Auth::user()->is_admin()))


            <a href="{{ url('edit/'.$post->slug)}}"><button  style="float: right" class="btn">Edit Post</button></a>

        @endif
    @else
        Page does not exist
    @endif

@endsection


@section('title-meta')
<style>
    @import url("//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css");

    /*
    The above link can also go in HTML document as a link in head.
    Rather than @import in an external CSS file,
    The following code into the <head> section of your site's HTML.
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    */


    /*
     * Social Buttons for Bootstrap
     *
     * Copyright 2013-2014 Panayiotis Lipiridis
     * Licensed under the MIT License
     *
     * https://github.com/lipis/bootstrap-social
     */

    .btn-social{position:relative;padding-left:44px;text-align:left;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}.btn-social :first-child{position:absolute;left:0;top:0;bottom:0;width:32px;line-height:34px;font-size:1.6em;text-align:center;border-right:1px solid rgba(0,0,0,0.2)}
    .btn-social.btn-lg{padding-left:61px}.btn-social.btn-lg :first-child{line-height:45px;width:45px;font-size:1.8em}
    .btn-social.btn-sm{padding-left:38px}.btn-social.btn-sm :first-child{line-height:28px;width:28px;font-size:1.4em}
    .btn-social.btn-xs{padding-left:30px}.btn-social.btn-xs :first-child{line-height:20px;width:20px;font-size:1.2em}
    .btn-social-icon{position:relative;padding-left:44px;text-align:left;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;height:34px;width:34px;padding:0}.btn-social-icon :first-child{position:absolute;left:0;top:0;bottom:0;width:32px;line-height:34px;font-size:1.6em;text-align:center;border-right:1px solid rgba(0,0,0,0.2)}
    .btn-social-icon.btn-lg{padding-left:61px}.btn-social-icon.btn-lg :first-child{line-height:45px;width:45px;font-size:1.8em}
    .btn-social-icon.btn-sm{padding-left:38px}.btn-social-icon.btn-sm :first-child{line-height:28px;width:28px;font-size:1.4em}
    .btn-social-icon.btn-xs{padding-left:30px}.btn-social-icon.btn-xs :first-child{line-height:20px;width:20px;font-size:1.2em}
    .btn-social-icon :first-child{border:none;text-align:center;width:100% !important}
    .btn-social-icon.btn-lg{height:45px;width:45px;padding-left:0;padding-right:0}
    .btn-social-icon.btn-sm{height:30px;width:30px;padding-left:0;padding-right:0}
    .btn-social-icon.btn-xs{height:22px;width:22px;padding-left:0;padding-right:0}
    .btn-bitbucket{color:#fff;background-color:#205081;border-color:rgba(0,0,0,0.2)}.btn-bitbucket:hover,.btn-bitbucket:focus,.btn-bitbucket:active,.btn-bitbucket.active,.open .dropdown-toggle.btn-bitbucket{color:#fff;background-color:#183c60;border-color:rgba(0,0,0,0.2)}
    .btn-bitbucket:active,.btn-bitbucket.active,.open .dropdown-toggle.btn-bitbucket{background-image:none}
    .btn-bitbucket.disabled,.btn-bitbucket[disabled],fieldset[disabled] .btn-bitbucket,.btn-bitbucket.disabled:hover,.btn-bitbucket[disabled]:hover,fieldset[disabled] .btn-bitbucket:hover,.btn-bitbucket.disabled:focus,.btn-bitbucket[disabled]:focus,fieldset[disabled] .btn-bitbucket:focus,.btn-bitbucket.disabled:active,.btn-bitbucket[disabled]:active,fieldset[disabled] .btn-bitbucket:active,.btn-bitbucket.disabled.active,.btn-bitbucket[disabled].active,fieldset[disabled] .btn-bitbucket.active{background-color:#205081;border-color:rgba(0,0,0,0.2)}
    .btn-dropbox{color:#fff;background-color:#1087dd;border-color:rgba(0,0,0,0.2)}.btn-dropbox:hover,.btn-dropbox:focus,.btn-dropbox:active,.btn-dropbox.active,.open .dropdown-toggle.btn-dropbox{color:#fff;background-color:#0d70b7;border-color:rgba(0,0,0,0.2)}
    .btn-dropbox:active,.btn-dropbox.active,.open .dropdown-toggle.btn-dropbox{background-image:none}
    .btn-dropbox.disabled,.btn-dropbox[disabled],fieldset[disabled] .btn-dropbox,.btn-dropbox.disabled:hover,.btn-dropbox[disabled]:hover,fieldset[disabled] .btn-dropbox:hover,.btn-dropbox.disabled:focus,.btn-dropbox[disabled]:focus,fieldset[disabled] .btn-dropbox:focus,.btn-dropbox.disabled:active,.btn-dropbox[disabled]:active,fieldset[disabled] .btn-dropbox:active,.btn-dropbox.disabled.active,.btn-dropbox[disabled].active,fieldset[disabled] .btn-dropbox.active{background-color:#1087dd;border-color:rgba(0,0,0,0.2)}
    .btn-facebook{color:#fff;background-color:#3b5998;border-color:rgba(0,0,0,0.2)}.btn-facebook:hover,.btn-facebook:focus,.btn-facebook:active,.btn-facebook.active,.open .dropdown-toggle.btn-facebook{color:#fff;background-color:#30487b;border-color:rgba(0,0,0,0.2)}
    .btn-facebook:active,.btn-facebook.active,.open .dropdown-toggle.btn-facebook{background-image:none}
    .btn-facebook.disabled,.btn-facebook[disabled],fieldset[disabled] .btn-facebook,.btn-facebook.disabled:hover,.btn-facebook[disabled]:hover,fieldset[disabled] .btn-facebook:hover,.btn-facebook.disabled:focus,.btn-facebook[disabled]:focus,fieldset[disabled] .btn-facebook:focus,.btn-facebook.disabled:active,.btn-facebook[disabled]:active,fieldset[disabled] .btn-facebook:active,.btn-facebook.disabled.active,.btn-facebook[disabled].active,fieldset[disabled] .btn-facebook.active{background-color:#3b5998;border-color:rgba(0,0,0,0.2)}
    .btn-flickr{color:#fff;background-color:#ff0084;border-color:rgba(0,0,0,0.2)}.btn-flickr:hover,.btn-flickr:focus,.btn-flickr:active,.btn-flickr.active,.open .dropdown-toggle.btn-flickr{color:#fff;background-color:#d6006f;border-color:rgba(0,0,0,0.2)}
    .btn-flickr:active,.btn-flickr.active,.open .dropdown-toggle.btn-flickr{background-image:none}
    .btn-flickr.disabled,.btn-flickr[disabled],fieldset[disabled] .btn-flickr,.btn-flickr.disabled:hover,.btn-flickr[disabled]:hover,fieldset[disabled] .btn-flickr:hover,.btn-flickr.disabled:focus,.btn-flickr[disabled]:focus,fieldset[disabled] .btn-flickr:focus,.btn-flickr.disabled:active,.btn-flickr[disabled]:active,fieldset[disabled] .btn-flickr:active,.btn-flickr.disabled.active,.btn-flickr[disabled].active,fieldset[disabled] .btn-flickr.active{background-color:#ff0084;border-color:rgba(0,0,0,0.2)}
    .btn-foursquare{color:#fff;background-color:#0072b1;border-color:rgba(0,0,0,0.2)}.btn-foursquare:hover,.btn-foursquare:focus,.btn-foursquare:active,.btn-foursquare.active,.open .dropdown-toggle.btn-foursquare{color:#fff;background-color:#005888;border-color:rgba(0,0,0,0.2)}
    .btn-foursquare:active,.btn-foursquare.active,.open .dropdown-toggle.btn-foursquare{background-image:none}
    .btn-foursquare.disabled,.btn-foursquare[disabled],fieldset[disabled] .btn-foursquare,.btn-foursquare.disabled:hover,.btn-foursquare[disabled]:hover,fieldset[disabled] .btn-foursquare:hover,.btn-foursquare.disabled:focus,.btn-foursquare[disabled]:focus,fieldset[disabled] .btn-foursquare:focus,.btn-foursquare.disabled:active,.btn-foursquare[disabled]:active,fieldset[disabled] .btn-foursquare:active,.btn-foursquare.disabled.active,.btn-foursquare[disabled].active,fieldset[disabled] .btn-foursquare.active{background-color:#0072b1;border-color:rgba(0,0,0,0.2)}
    .btn-github{color:#fff;background-color:#444;border-color:rgba(0,0,0,0.2)}.btn-github:hover,.btn-github:focus,.btn-github:active,.btn-github.active,.open .dropdown-toggle.btn-github{color:#fff;background-color:#303030;border-color:rgba(0,0,0,0.2)}
    .btn-github:active,.btn-github.active,.open .dropdown-toggle.btn-github{background-image:none}
    .btn-github.disabled,.btn-github[disabled],fieldset[disabled] .btn-github,.btn-github.disabled:hover,.btn-github[disabled]:hover,fieldset[disabled] .btn-github:hover,.btn-github.disabled:focus,.btn-github[disabled]:focus,fieldset[disabled] .btn-github:focus,.btn-github.disabled:active,.btn-github[disabled]:active,fieldset[disabled] .btn-github:active,.btn-github.disabled.active,.btn-github[disabled].active,fieldset[disabled] .btn-github.active{background-color:#444;border-color:rgba(0,0,0,0.2)}
    .btn-google-plus{color:#fff;background-color:#dd4b39;border-color:rgba(0,0,0,0.2)}.btn-google-plus:hover,.btn-google-plus:focus,.btn-google-plus:active,.btn-google-plus.active,.open .dropdown-toggle.btn-google-plus{color:#fff;background-color:#ca3523;border-color:rgba(0,0,0,0.2)}
    .btn-google-plus:active,.btn-google-plus.active,.open .dropdown-toggle.btn-google-plus{background-image:none}
    .btn-google-plus.disabled,.btn-google-plus[disabled],fieldset[disabled] .btn-google-plus,.btn-google-plus.disabled:hover,.btn-google-plus[disabled]:hover,fieldset[disabled] .btn-google-plus:hover,.btn-google-plus.disabled:focus,.btn-google-plus[disabled]:focus,fieldset[disabled] .btn-google-plus:focus,.btn-google-plus.disabled:active,.btn-google-plus[disabled]:active,fieldset[disabled] .btn-google-plus:active,.btn-google-plus.disabled.active,.btn-google-plus[disabled].active,fieldset[disabled] .btn-google-plus.active{background-color:#dd4b39;border-color:rgba(0,0,0,0.2)}
    .btn-instagram{color:#fff;background-color:#3f729b;border-color:rgba(0,0,0,0.2)}.btn-instagram:hover,.btn-instagram:focus,.btn-instagram:active,.btn-instagram.active,.open .dropdown-toggle.btn-instagram{color:#fff;background-color:#335d7e;border-color:rgba(0,0,0,0.2)}
    .btn-instagram:active,.btn-instagram.active,.open .dropdown-toggle.btn-instagram{background-image:none}
    .btn-instagram.disabled,.btn-instagram[disabled],fieldset[disabled] .btn-instagram,.btn-instagram.disabled:hover,.btn-instagram[disabled]:hover,fieldset[disabled] .btn-instagram:hover,.btn-instagram.disabled:focus,.btn-instagram[disabled]:focus,fieldset[disabled] .btn-instagram:focus,.btn-instagram.disabled:active,.btn-instagram[disabled]:active,fieldset[disabled] .btn-instagram:active,.btn-instagram.disabled.active,.btn-instagram[disabled].active,fieldset[disabled] .btn-instagram.active{background-color:#3f729b;border-color:rgba(0,0,0,0.2)}
    .btn-linkedin{color:#fff;background-color:#007bb6;border-color:rgba(0,0,0,0.2)}.btn-linkedin:hover,.btn-linkedin:focus,.btn-linkedin:active,.btn-linkedin.active,.open .dropdown-toggle.btn-linkedin{color:#fff;background-color:#005f8d;border-color:rgba(0,0,0,0.2)}
    .btn-linkedin:active,.btn-linkedin.active,.open .dropdown-toggle.btn-linkedin{background-image:none}
    .btn-linkedin.disabled,.btn-linkedin[disabled],fieldset[disabled] .btn-linkedin,.btn-linkedin.disabled:hover,.btn-linkedin[disabled]:hover,fieldset[disabled] .btn-linkedin:hover,.btn-linkedin.disabled:focus,.btn-linkedin[disabled]:focus,fieldset[disabled] .btn-linkedin:focus,.btn-linkedin.disabled:active,.btn-linkedin[disabled]:active,fieldset[disabled] .btn-linkedin:active,.btn-linkedin.disabled.active,.btn-linkedin[disabled].active,fieldset[disabled] .btn-linkedin.active{background-color:#007bb6;border-color:rgba(0,0,0,0.2)}
    .btn-tumblr{color:#fff;background-color:#2c4762;border-color:rgba(0,0,0,0.2)}.btn-tumblr:hover,.btn-tumblr:focus,.btn-tumblr:active,.btn-tumblr.active,.open .dropdown-toggle.btn-tumblr{color:#fff;background-color:#1f3346;border-color:rgba(0,0,0,0.2)}
    .btn-tumblr:active,.btn-tumblr.active,.open .dropdown-toggle.btn-tumblr{background-image:none}
    .btn-tumblr.disabled,.btn-tumblr[disabled],fieldset[disabled] .btn-tumblr,.btn-tumblr.disabled:hover,.btn-tumblr[disabled]:hover,fieldset[disabled] .btn-tumblr:hover,.btn-tumblr.disabled:focus,.btn-tumblr[disabled]:focus,fieldset[disabled] .btn-tumblr:focus,.btn-tumblr.disabled:active,.btn-tumblr[disabled]:active,fieldset[disabled] .btn-tumblr:active,.btn-tumblr.disabled.active,.btn-tumblr[disabled].active,fieldset[disabled] .btn-tumblr.active{background-color:#2c4762;border-color:rgba(0,0,0,0.2)}
    .btn-twitter{color:#fff;background-color:#55acee;border-color:rgba(0,0,0,0.2)}.btn-twitter:hover,.btn-twitter:focus,.btn-twitter:active,.btn-twitter.active,.open .dropdown-toggle.btn-twitter{color:#fff;background-color:#309aea;border-color:rgba(0,0,0,0.2)}
    .btn-twitter:active,.btn-twitter.active,.open .dropdown-toggle.btn-twitter{background-image:none}
    .btn-twitter.disabled,.btn-twitter[disabled],fieldset[disabled] .btn-twitter,.btn-twitter.disabled:hover,.btn-twitter[disabled]:hover,fieldset[disabled] .btn-twitter:hover,.btn-twitter.disabled:focus,.btn-twitter[disabled]:focus,fieldset[disabled] .btn-twitter:focus,.btn-twitter.disabled:active,.btn-twitter[disabled]:active,fieldset[disabled] .btn-twitter:active,.btn-twitter.disabled.active,.btn-twitter[disabled].active,fieldset[disabled] .btn-twitter.active{background-color:#55acee;border-color:rgba(0,0,0,0.2)}
    .btn-vk{color:#fff;background-color:#587ea3;border-color:rgba(0,0,0,0.2)}.btn-vk:hover,.btn-vk:focus,.btn-vk:active,.btn-vk.active,.open .dropdown-toggle.btn-vk{color:#fff;background-color:#4a6a89;border-color:rgba(0,0,0,0.2)}
    .btn-vk:active,.btn-vk.active,.open .dropdown-toggle.btn-vk{background-image:none}
    .btn-vk.disabled,.btn-vk[disabled],fieldset[disabled] .btn-vk,.btn-vk.disabled:hover,.btn-vk[disabled]:hover,fieldset[disabled] .btn-vk:hover,.btn-vk.disabled:focus,.btn-vk[disabled]:focus,fieldset[disabled] .btn-vk:focus,.btn-vk.disabled:active,.btn-vk[disabled]:active,fieldset[disabled] .btn-vk:active,.btn-vk.disabled.active,.btn-vk[disabled].active,fieldset[disabled] .btn-vk.active{background-color:#587ea3;border-color:rgba(0,0,0,0.2)}

</style>


<script> ;(function($){

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
            $('.customer.share').on("click", function(e) {
                $(this).customerPopup(e);
            });
        });

    }(jQuery));</script>





    <p>{{ $post->created_at->format('M d,Y \a\t h:i a') }} By <a
                href="{{ url('/user/'.$post->author_id)}}">{{ $post->author->fname }} {{ $post->author->lname }}</a></p>

    <div class="row">
        <div class="col-md-3">
            <a href="#" class="btn btn-inverse "><i class="glyphicon glyphicon-thumbs-up"></i></a>
            <a href="#" class="btn btn-inverse "><i class="glyphicon glyphicon-heart"></i></a>
            <a href="#" class="btn btn-inverse "><i class="glyphicon glyphicon-share-alt"></i></a>


        </div>


            <div class="col-md-9">

                <a class="facebook customer share" href="https://www.facebook.com/sharer.php?u={{Request::fullUrl()}}"  title="Facebook share" target="_blank" style="margin-left: 83%"class="btn btn-social-icon btn-xs btn-facebook"><i class="fa fa-facebook"></i></a>
                <a class="google_plus customer share" href="https://plus.google.com/share?url={{Request::fullUrl()}}" title="Google Plus Share" target="_blank"  style="margin-left: 3%"  class="btn btn-social-icon btn-xs btn-google-plus"><i class="fa fa-google-plus"></i></a>
                <a  class="linkedin customer share" href="https://www.linkedin.com/shareArticle?mini=true&url={{Request::fullUrl()}}" title="linkedin Share" target="_blank"style="margin-left: 3%" class="btn btn-social-icon btn-xs btn-twitter"><i class="fa fa-twitter"></i></a>

            </div>
    </div>
  <br>
@if( $post->cover==0)
@else<img class="card-img-top" src="/images/{{ $post->cover }}" alt="" style="width:100%;padding: 0px;">
@endif

@endsection

@section('content')

    @if($post)
        <div>
            {!! $post->body !!}
        </div>

        <div>
            @if($comments)


                <ul id="comments-list" class="comments-list">
                    @foreach($comments as $comment)
                        <div class="comments-container">
                            <ul id="comments-list" class="comments-list">
                                <li>
                                    <div class="comment-main-level">
                                        <!-- Avatar -->
                                        <div class="comment-avatar"><img
                                                    src="{{asset('uploads/avatars/'.$comment->author->avatar)}}" alt="">
                                        </div>
                                        <!-- Contenedor del Comentario -->
                                        <div class="comment-box">
                                            <div  class="comment-head">
                                                <h6 class="comment-name by-author">
                                                    <a style="float: left" href="/">{{ $comment->author->fname}} {{ $comment->author->lname}}</a>
                                                <span style="font-size: 10px;margin-top: 3px;margin-left: 10px">{{ $comment->created_at->format('M d,Y \a\t h:i a') }}</span> </h6>
                                              <!--  <i style="margin-left: 50px" class="glyphicon glyphicon-thumbs-down"> 0</i>
                                                <i style="margin-left: 48px"   class="glyphicon glyphicon-thumbs-up"> 2</i> -->

                                            </div>
                                            <div class="comment-content">
                                                {{ $comment->body }}
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>


                    @endforeach
                </ul>
            @endif
        </div>

        <div>
            <h4 style="margin-left: 83px">Leave a comment</h4>
        </div>
        @if(Auth::guest())
            <p style="margin-left: 83px"><a href="{{url('/')}}">Login</a> to Comment</p>
        @else
            <div style="margin-left: 70px" class="panel-body">
                <form method="post" action="/comment/add">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="on_post" value="{{ $post->id }}">
                    <input type="hidden" name="slug" value="{{ $post->slug }}">
                    <div class="form-group">
                        <textarea style="width: 543px" required="required" placeholder="Enter comment here" name="body"
                                  class="form-control"></textarea>
                    </div>
                    <input type="submit" name='post_comment' class="btn btn-success" value="Post"/>
                </form>
            </div>
        @endif


    @else
        404 error
    @endif

@endsection


@section('content2')
    @if($post)

<style>
    .media
    {
        /*box-shadow:0px 0px 4px -2px #000;*/
        margin: 20px 0;
        padding:30px;
    }
    .dp
    {
        border:10px solid #eee;
        transition: all 0.2s ease-in-out;
    }
    .dp:hover
    {
        border:2px solid #eee;

        /*-webkit-font-smoothing:antialiased;*/
    }
</style>
    <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object dp img-circle" src=" {{asset('uploads/avatars/'.$post->author->avatar)}}" style="width: 100px;height:100px;">
        </a>
        <div class="media-body">
            <h4 class="media-heading">{{ $post->author->fname}} {{ $post->author->lname}} <small> Sri Lanka</small></h4>
            <h5>Author   <a href="http://gridle.in">LifeWithGoals</a></h5>
            <hr style="margin:8px auto">

            <span class="label label-default">Tech</span>
            <span class="label label-default">IOT</span>
            <span class="label label-info">Programming</span>
            <span class="label label-default">Art</span>
        </div>
    </div>

    @endif
@endsection
