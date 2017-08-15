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
<div id="addgoal" class="modal modal-fixed-footer">
<div class="modal-content" style="text-align:center;">
<h4>Add a Goal</h4>
<form enctype="multipart/form-data" action="{{route('dashboard')}}" method="post" id="addgoalform">
	{{ csrf_field() }}
	<ul class="collection">
		<li class="collection-item">
			<div class="input-field col s6">
				<input id="goalname" name="goalname" type="text" class="validate tooltipped" data-position="bottom" data-delay="50" data-tooltip="Enter your Goal Name " required>
				<label for="goalname">Goal Name</label>
			</div>
		</li>
		<li class="collection-item">
			<div class="input-field col s6">
				<input id="goalintent" name="goalintent" type="text" class="validate tooltipped" data-position="bottom" data-delay="50" data-tooltip="Enter your Goal intent " required>
				<label for="goalintent">Goal Intent</label>
			</div>
		</li>
		<li class="collection-item">
					<p class="left-align">
						<input class="with-gap" name="goalpriority" type="radio" value="high" id="HighPriority" checked="checked" />
						<label for="HighPriority">High Priority</label>
					</p>
					<p class="left-align">
						<input class="with-gap" name="goalpriority" type="radio" value="medium" id="MediumPriority" />
						<label for="MediumPriority">Medium Priority</label>
					</p>
					<p class="left-align">
						<input class="with-gap" name="goalpriority" type="radio" value="low" id="LowPriority"  />
						<label for="LowPriority">Low Priority</label>
					</p>
		</li>
		<li class="collection-item">
			<div class="input-field col s12 tooltipped" data-position="bottom" data-delay="50" data-tooltip="Select Goal category">
					<select name="goalcategory" required>
						 <option  value="non specified" disabled selected>select goal category</option>
						 <option  value="business">business</option>
						 <option  value="education">education</option>
						 <option  value="Health and fitness">Health and fitness</option>
						 <option  value="Get Educated and professional memberships">Get Educated and professional memberships</option>
						 <option  value=" Financial stability and Gains"> Financial stability and Gains</option>
						 <option  value="Construct my first house">Construct my first house</option>
						 <option  value="Buy a car">Buy a car</option>
						 <option  value=" Find a partner"> Find a partner</option>
						 <option  value="Travel around and see the world">Travel around and see the world</option>
						 <option  value="Skill up as a professional">Skill up as a professional</option>
						 <option  value="Sports and Aquatics">Sports and Aquatics</option>
						 <option  value="Ignite a concept">Ignite a concept</option>
					</select>
					<label>Goal Category</label>
				</div>
				<script type="text/javascript">
				$(document).ready(function() {
						$('select').material_select();
					});
				</script>
		</li>
		<form>
		<li class="collection-item">
			<div class="mdl-textfield mdl-js-textfield">
				<label  style="color:#565656;font-size:12pt;"for="goalstartdate">Goal Start-Date</label>
				<input class="mdl-textfield__input tooltipped" data-position="bottom" data-delay="50" data-tooltip="Enter your Goal start date" style="color:#565656;" type="date" id="goalstartdate" oninput="dateValid()" name="goalstartdate" required>
				<span id="goalstartdateerror"></span>
			</div>
		</li>
		<li class="collection-item">
			<div class="mdl-textfield mdl-js-textfield">
				<label  style="color:#565656;font-size:12pt;"for="goalenddate">Goal End-Date</label>
				<input class="mdl-textfield__input tooltipped" data-position="bottom" data-delay="50" data-tooltip="Enter your Goal end date" style="color:#565656;" type="date" oninput="dateValid()" id="goalenddate" name="goalenddate" required>
					<span id="goalenddateerror"></span>

			</div>
		</li>
		<form>
		<li class="collection-item">
			<div class="file-field input-field">
				<div class="btn">
					<span>Upload a Goal Picture</span>
					<input type="file" name="goalpicture">
				</div>
				<div class="file-path-wrapper">
					<input class="file-path validate tooltipped" data-position="bottom" data-delay="50" data-tooltip="Upload Your Goal Picture" type="text" name="goalpicturepath">
				</div>
			</div>
		</li>
	</ul>
<input type="text" class="hidden" name="action" value="2">
</div>
<div class="modal-footer">
<a href="#" id="cancelmodalbtn" style="margin-right:10px;margin-left:10px;"class="model-close waves-effectwaves-effect waves-light btn">Not Now</a>
<button type="submit" id="addgoalbtn" style="margin-right:10px;margin-left:10px;"class="modal-action waves-effectwaves-effect waves-light btn">Add Goal</button>
</form>
</div>
</div>
<div class="container">
	<div class="row hide-on-small-only">
		<div class="col l2 m2  center-align">
			<span class=" red-text "><b>New Goal</b></span><br>
			<a href="#addgoal" class="btn btn-floating red btn-large "><i class="material-icons">add</i></a>
		</div>
		<div class="col l2 m2  center-align">
			<span class=" blue-text text-lighten-1"><b>Send Invite</b></span><br>
			<a href="#" class="btn btn-floating blue lighten-1 btn-large "><i class="material-icons">people</i></a>
		</div>
		<div class="col l2 m2  center-align">
			<span class=" grey-text text-darken-3"><b>Dashboard</b></span><br>
			<a href="{{url('/dashboard')}}" class="btn btn-floating grey darken-3 btn-large "><i class="material-icons">dashboard</i></a>
		</div>
		<div class="col l2 m2 center-align">
			<span class=" blue-text text-darken-4"><b>My Documents</b></span><br>
			<a href="{{url('/files')}}" class="btn btn-floating btn-large "><i class="material-icons">attach_file</i></a>
		</div>
		<div class="col l2 m2 center-align">
			<span class=" purple-text text-darken-3"><b>My Schedule</b></span><br>
			<a href="{{url('/calendar')}}" class="btn btn-floating purple darken-3 btn-large "><i class="material-icons">date_range</i></a>
		</div>
		<div class="col l2 m2  center-align">
			<span class=" green-text text-darken-4"><b>My Profile</b></span><br>
			<a href="{{url('profile/'.Auth::id())}}" class="btn btn-floating green darken-4 btn-large "><i class="material-icons">people</i></a>
		</div>
	</div><br><br>
  <div id='calendar'></div>
</div>
<br><br>
@endsection
