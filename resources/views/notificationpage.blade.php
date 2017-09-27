@extends('layouts.navbar')

@section('content')
@foreach ($notification as $notifications)
    <a>
      <b><span onclick="window.location.href='{{url('/search/'.$notifications->user_id)}}'">{{$notifications->user_fname}} {{$notifications->user_lname}}</span></b> {{$notifications->authorization}} the goal <b><span onclick="window.location.href='{{ url('/goal/'.$notifications->goalid) }}'">{{ $notifications->goalname }}</span></b> to you.
    </a>
@endforeach
@endsection
