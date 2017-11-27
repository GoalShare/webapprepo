@extends('blog.app')

@section('content')

<style>
    .card {
        box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
    }

    .card {
        margin-top: 30px;
        box-sizing: border-box;
        border-radius: 2px;
        background-clip: padding-box;
    }
    .card span.card-title {
        color: #fff;
        font-size: 24px;
        font-weight: 300;
        text-transform: uppercase;
    }

    .card .card-image {
        position: relative;
        overflow: hidden;
    }
    .card .card-image img {
        border-radius: 2px 2px 0 0;
        background-clip: padding-box;
        position: relative;
        z-index: -1;
    }
    .card .card-image span.card-title {
        position: absolute;
        bottom: 0;
        left: 0;
        padding: 16px;
    }
    .card .card-content {
        padding: 16px;
        border-radius: 0 0 2px 2px;
        background-clip: padding-box;
        box-sizing: border-box;
    }
    .card .card-content p {
        margin: 0;
        color: inherit;
    }
    .card .card-content span.card-title {
        line-height: 48px;
    }
    .card .card-action {
        border-top: 1px solid rgba(160, 160, 160, 0.2);
        padding: 16px;
    }
    .card .card-action a {
        color: #ffab40;
        margin-right: 16px;
        transition: color 0.3s ease;
        text-transform: uppercase;
    }
    .card .card-action a:hover {
        color: #ffd8a6;
        text-decoration: none;
    }
</style>

    <div class="col-md-12 col-md-offset-0">
        <div class="card">
            <div class="card-image">
                <img class="img-responsive" src="http://material-design.storage.googleapis.com/publish/v_2/material_ext_publish/0Bx4BSt6jniD7TDlCYzRROE84YWM/materialdesign_introduction.png">
                <span class="card-title">Material Cards</span>
            </div>

            <div class="card-content">
                <p>Cards for display in portfolio style material design by Google.</p>
            </div>

            <div class="card-action">
                <ul class="list-inline list-unstyled">
                    <li><span><i class="glyphicon glyphicon-calendar"></i> 2 days, 8 hours </span></li>
                    <li>|</li>
                    <span><i class="glyphicon glyphicon-comment"></i> 2 comments</span>
                    <li>|</li>
                    <li>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star-empty"></span>
                    </li>
                    <li>|</li>
                    <li>
                        <!-- Use Font Awesome http://fortawesome.github.io/Font-Awesome/ -->
                        <span><i class="fa fa-facebook-square"></i></span>
                        <span><i class="fa fa-twitter-square"></i></span>
                        <span><i class="fa fa-google-plus-square"></i></span>
                    </li>
                </ul>
                <a href="#" target="new_blank">Link</a>
                <a href="#" target="new_blank">Link</a>
                <a href="#" target="new_blank">Link</a>
                <a href="#" target="new_blank">Link</a>
                <a href="#" target="new_blank">Link</a>
            </div>
        </div>
    </div>


<div class="col-md-12 col-md-offset-0">
    <div class="card">
        <div class="card-image">
            <img class="img-responsive" src="http://material-design.storage.googleapis.com/publish/v_2/material_ext_publish/0Bx4BSt6jniD7TDlCYzRROE84YWM/materialdesign_introduction.png">
            <span class="card-title">Material Cards</span>
        </div>

        <div class="card-content">
            <p>Cards for display in portfolio style material design by Google.</p>
        </div>

        <div class="card-action">
            <ul class="list-inline list-unstyled">
                <li><span><i class="glyphicon glyphicon-calendar"></i> 2 days, 8 hours </span></li>
                <li>|</li>
                <span><i class="glyphicon glyphicon-comment"></i> 2 comments</span>
                <li>|</li>
                <li>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star-empty"></span>
                </li>
                <li>|</li>
                <li>
                    <!-- Use Font Awesome http://fortawesome.github.io/Font-Awesome/ -->
                    <span><i class="fa fa-facebook-square"></i></span>
                    <span><i class="fa fa-twitter-square"></i></span>
                    <span><i class="fa fa-google-plus-square"></i></span>
                </li>
            </ul>
            <a href="#" target="new_blank">Link</a>
            <a href="#" target="new_blank">Link</a>
            <a href="#" target="new_blank">Link</a>
            <a href="#" target="new_blank">Link</a>
            <a href="#" target="new_blank">Link</a>
        </div>
    </div>
</div>




@endsection
