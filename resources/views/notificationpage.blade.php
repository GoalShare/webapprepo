@extends('layouts.navbar')

@section('content')
<div class="container" style="height:500px;">

<div class="row" style="height:50px;"></div>
  <div class="row">

@foreach ($notification as $notifications)

@if($notifications->authorization=="aligned")
<div class="card" style="background-color:#ede7f6;">
  <div class="row"></div>
  <div class="row">&nbsp&nbsp&nbsp
    <a style="color:#0d47a1;">
      <b><span onclick="window.location.href='{{url('/search/'.$notifications->user_id)}}'">{{$notifications->user_fname}} {{$notifications->user_lname}}</span></b> {{$notifications->authorization}} the goal <b><span onclick="window.location.href='{{ url('/goal/'.$notifications->goalid) }}'">{{ $notifications->goalname }}</span></b> to you.
    </a>
  </div>
    <div class="row"></div>
</div>


@else
<div class="card" style="background-color:#e3f2fd;">
  <div class="row"></div>
  <div class="row">&nbsp&nbsp&nbsp
    <a style="color:#0d47a1;">
      <b><span onclick="window.location.href='{{url('/search/'.$notifications->user_id)}}'">{{$notifications->user_fname}} {{$notifications->user_lname}}</span></b> {{$notifications->authorization}} the goal <b><span onclick="window.location.href='{{ url('/goal/'.$notifications->goalid) }}'">{{ $notifications->goalname }}</span></b> to you.
    </a>
  </div>
    <div class="row"></div>
</div>
@endif

@endforeach
</div>
</div>
@endsection
