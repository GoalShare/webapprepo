@extends('layouts.navbar')

@section('content')
<br><br>
<link href="{{asset('css/fullcalendar.min.css')}}" rel='stylesheet' />
<link href="{{asset('css/fullcalendar.print.min.css')}}" rel='stylesheet' media='print' />
<script src="{{asset('js/lib/moment.min.js')}}"></script>
<script src="{{asset('js/lib/jquery.min.js')}}"></script>
<script src="{{asset('js/fullcalendar.min.js')}}"></script>
<script>

	$(document).ready(function() {

		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,agendaDay,listMonth'
			},
      nowIndicator:true,
			defaultDate: Date(),
			navLinks: true, // can click day/week names to navigate views
			editable: false,
			disableDragging:true,
			eventLimit: true, // allow "more" link when too many events
			events: [

        @foreach ($goal as $goals)
        {
					title: '{{$goals->goalname}}',
					start: '{{$goals->goalstartdate}}',
          url: '{{url('/goal/'.$goals->goalid)}}',
          end:'{{$goals->goalenddate}}',
          color:'#0{{rand(0,99)}}'
				},
				@endforeach
			]
		});

	});

</script>
<style>


	#calendar {
		max-width: 900px;
		margin: 0 auto;
	}

</style>
    <div class="left">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <span class=" blue-text text-darken-4"><b>dashboard</b></span><br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{url('/dashboard')}}" class="btn btn-floating btn-large" ><i class="material-icons">dashboard</i></a>
    </div>
<br>
<div class="container">
  <div id='calendar'></div>
</div>
<br><br>
@endsection
