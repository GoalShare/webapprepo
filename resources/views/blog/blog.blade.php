@extends('blog.app')

@section('title')
    <h4>  {{$title}} </h4>
@endsection

@section('content')

    @if ( !$posts->count() )
        There is no post till now. Login and write a new post now!!!
    @else
        <div class="">
            @foreach( $posts as $post )
                <div class="list-group">
                    <img class="card-img-top" src="images/{{ $post->cover }}" alt="" style="width:100%;padding: 0px;">
                    <div class="list-group-item">

                        <h3><a href="{{ url('/'.$post->slug) }}">{{ $post->title }}</a>

                            @if(!Auth::guest() && ($post->author_id == Auth::user()->id || Auth::user()->is_admin()))

                                @if($post->active == '1')

                                    <button class="btn" style="float: right"><a href="{{ url('edit/'.$post->slug)}}">Edit
                                            Post</a></button>
                                @else
                                    <button class="btn" style="float: right"><a href="{{ url('edit/'.$post->slug)}}">Edit
                                            Draft</a></button>
                                @endif
                            @endif

                        </h3>

                        <p style="color: darkgray; text-decoration: none"><span><i
                                        class="glyphicon glyphicon-calendar"></i> {{ $post->created_at->format('M d,Y \a\t h:i a') }} </span>&nbsp<span><i

                                        class="glyphicon glyphicon-user"></i>  <a style=" text-decoration: none"
                                                                                  href="{{ url('/user/'.$post->author_id)}}">{{ $post->author->fname }} {{ $post->author->lname }}</a></span>
                        </p>


                    </div>
                    <div class="list-group-item">
                        <article>
                            {!! str_limit($post->body, $limit = 300, $end = '  .........
                            </br></br>
                            <button type="button" class="btn btn-secondary btn-sm"><a href='.url("/".$post->slug).'>Read More</a></button>

                            ') !!}
                        </article>
                    </div>
                </div>
            @endforeach
            {!! $posts->render() !!}
        </div>
    @endif

@endsection

@section('content2')
    @if($post)
        <br>
        <div class="col-md-12">
            <img src="http://placehold.it/300x300" alt="" class="img-rounded img-responsive" />
            <br>
            <img src="http://placehold.it/300x300" alt="" class="img-rounded img-responsive" />
            <br>
            <img src="http://placehold.it/300x300" alt="" class="img-rounded img-responsive" />
            <br>
            <img src="http://placehold.it/300x300" alt="" class="img-rounded img-responsive" />
        </div>
    @endif
@endsection