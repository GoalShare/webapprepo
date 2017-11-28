@extends('layouts.navbar')

@section('content')
<div class="container" style="height:100%;">
<input type="hidden" name="_token" id="notificationtokenpage" value="{{ csrf_token() }}">
<input type="hidden" name="_token" id="notificationtokenpageone" value="{{ csrf_token() }}">

<div class="row" style="height:30px;"></div>
  <div class="row">
    <ul class="collection">
      @foreach ($message as $messagesd)
        @if($messagesd->accept=="")
      <li id="noti{{$messagesd->id}}" class="collection-item avatar {{ ($messagesd->authorization=="aligned")?"blue lighten-5":"red lighten-5" }} ">
        <img src="{{asset('uploads/avatars/'.$messagesd->avatar)}}" alt="" class="circle">
        <span style="cursor:pointer;" onclick="
        $.post('{{ route('makeseen') }}',
          {
            _token: $('#notificationtokenpage').val(),
            id: {{ $messagesd->id }}
          },function(data,status){console.log('Data: ' + data + 'Status: ' + status);window.location.href='{{ url('/goal/'.$messagesd->goalid) }}';});" class="title">
          {{$messagesd->user_fname}} {{$messagesd->user_lname}} {{$messagesd->authorization}} the goal {{ $messagesd->goalname }} to you.
          @if ($messagesd->status=="notseen")
            <span class="blue-text text-darken-4 badge pulse">new</span>
          @endif
        </span>
        <p>
          <small>Click to enter the goal
            <br>
            <span style="cursor:pointer;" id="accept{{$messagesd->id}}" onclick="
            $.post('{{ route('acceptgoal') }}',
              {
                _token: $('#notificationtokenpageone').val(),
                action: 'accept',
                user: '{{$messagesd->receiver_email}}',
                goalid: '{{$messagesd->goalid}}',
                id: {{ $messagesd->id }},
              },function(data,status){console.log('Data: ' + data + 'Status: ' + status);document.getElementById('reject{{$messagesd->id}}').style.display='none';document.getElementById('accept{{$messagesd->id}}').style.display='none';});" class="new badge green" data-badge-caption="accept"></span>
            <span style="cursor:pointer;" id="reject{{$messagesd->id}}" onclick="
            $.post('{{ route('acceptgoal') }}',
              {
                _token: $('#notificationtokenpageone').val(),
                action: 'reject',
                authorization: '{{$messagesd->authorization}}',
                user: '{{$messagesd->receiver_email}}',
                goalid: '{{$messagesd->goalid}}',
                id: {{ $messagesd->id }}
              },function(data,status){console.log('Data: ' + data + 'Status: ' + status);document.getElementById('noti{{$messagesd->id}}').style.display='none';});" class="new badge red" data-badge-caption="reject"></span>
          </small>

        </p>
        <a href="{{ url('/goal/'.$messagesd->goalid) }}" class="secondary-content">
        @if($messagesd->authorization=="aligned" && $messagesd->status=="seen")
          <i class="material-icons">call_merge</i>
        @elseif ($messagesd->authorization=="shared" && $messagesd->status=="seen")
          <i class="material-icons">share</i>
        @endif
        </a>
      </li>
    @endif
    @endforeach
    </ul>
</div>
</div>
@endsection
