@extends('layouts.navbar')

@section('content')
<br><br>



<link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.css" rel='stylesheet' />
<link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.print.css" rel='stylesheet' media='print' />
<script src="{{asset('js/lib/moment.min.js')}}"></script>
<script src="{{asset('js/lib/jquery.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
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

        @foreach ($task as $tasks)
        {
					title: @foreach ($goal as $goals)
						@if ($tasks->goalid==$goals->goalid)
						'Goal : | {{$goals->goalname}} |\n'
						@endif
					@endforeach+'Task : {{$tasks->taskname}}',
					start: '{{$tasks->taskstartdate}}',
          url: @foreach ($goal as $goals)
						@if ($tasks->goalid==$goals->goalid)
						'{{url('/goal/'.$goals->goalid)}}'
						@endif
					@endforeach,
          end:'{{$tasks->taskenddate}}',
          color:@foreach ($goal as $goals)
						@if ($tasks->goalid==$goals->goalid)
						'#{{$goals->color}}'
						@endif
					@endforeach
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
    <div class="right">
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
