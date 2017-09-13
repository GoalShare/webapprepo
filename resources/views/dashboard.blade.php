  @extends('layouts.navbar')
@section('content')
  @php
   $carbon = new Carbon(Auth::User()->created_at);
   $compare =Carbon::now();
  @endphp
    <!--add goal form -->
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
          <li class="collection-item">
            <div class="input-field col s6">
              <label  style="color:#565656;font-size:12pt;"for="goalstartdate">Goal Start-Date</label>
              <input class="" data-position="bottom" data-delay="50" data-tooltip="Enter your Goal start date" style="color:#565656;" type="date" id="goalstartdate" oninput="dateValid()" name="goalstartdate" required>
              <span id="goalstartdateerror"></span>
            </div>
          </li>
          <li class="collection-item">
            <div class="input-field col s6">
              <label  style="color:#565656;font-size:12pt;"for="goalenddate">Goal End-Date</label>
              <input class="" data-position="bottom" data-delay="50" data-tooltip="Enter your Goal end date" style="color:#565656;" type="date" oninput="dateValid()" id="goalenddate" name="goalenddate" required>
                <span id="goalenddateerror"></span>
            </div>
          </li>
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
      <!--end of add goal -->
    <div class="demo-blog mdl-layout mdl-js-layout has-drawer is-upgraded">
      <main class="mdl-layout__content">
        </br>
        </br>
				<div class="row mdl-grid portfolio-max-width hide-on-small-only">
          <div class="col l2 m2  center-align">
            <span class=" red-text "><b>New Goal</b></span><br>
						<a href="#addgoal" class="btn btn-floating red btn-large "><i class="material-icons">add</i></a>
					</div>
          <div class="col l2 m2  center-align">
            <span class=" blue-text text-lighten-1"><b>Send Invite</b></span><br>
						<a class="btn btn-floating blue lighten-1 btn-large googleContactsButton" href="#myModal11"><i class="material-icons">people</i></a>
					</div>
          <script type="text/javascript">

                var clientId = '735097041023-sohugeckr0u9ltkmni4hd05pmmkc4a7p.apps.googleusercontent.com';
                var apiKey = 'R9ijmkXitCwlC-Zh7oY26ICw';
                var scopes = 'https://www.googleapis.com/auth/contacts.readonly';

                $(document).on("click",".googleContactsButton", function(){
                  gapi.client.setApiKey(apiKey);
                  window.setTimeout(authorize);
                });

                function authorize() {
                  gapi.auth.authorize({client_id: clientId, scope: scopes, immediate: false}, handleAuthorization);
                }

                function handleAuthorization(authorizationResult) {
                  if (authorizationResult && !authorizationResult.error) {
                    $.get("https://www.google.com/m8/feeds/contacts/default/thin?alt=json&access_token=" + authorizationResult.access_token + "&max-results=500&v=3.0",
                      function(result){
                        console.log(result);
                        var text = '';
                    for(var i=0;i<result.feed.entry.length;i++){
                        var x=result.feed.entry[i].gd$email;
                        var y=result.feed.entry[i].title;
                        if(x==undefined){
                          console.log("yy");
                        }

                        else{

                          text =text+'<div class="col l6"><div class="card" style="width:100%; height:100%;max-height:100%;"><div class="row"><div class="col l4"><span class="checkboxlist"><input type="checkbox" name="checkboxnames" value="'+x[0].address+'" id="'+i+'"/><label for="'+i+'"></label></span><img src="img/Cornmanthe3rd-Plex-Communication-gmail.ico" height="40px" width="40px"></div><div class="col l8 truncate">'+y.$t+'<br><span style="font-size:10px;">'+x[0].address+'</span></div></div></div></div>';
                            // console.log(document.getElementsByTagName("input")[0].value);


                             }



                        }


                      document.getElementById("demo11").innerHTML=text;


                      //
                      //
                      var invitebtn=document.getElementById('sendinv');
                       invitebtn.addEventListener("click",function(event){
                       Check();
                      });
                      function Check(){
                              if($('[type="checkbox"]').is(":checked")){
                                 console.log("qwertyuiop");
                                 $('input[name="checkboxnames"]:checked').each(function() {
                                    console.log(this.value);
                                    });
                              }
                              else{
                                console.log("jdcnjsnkmkmkmookmokmok");
                              }
                         }
                      });
                  }
                }


              </script>

              <!-- The Modal -->
              <div id="myModal11" class="modal"style="z-index:4000;width:50%;">

                <!-- Modal content -->
                <div class="modal-content">
                  <div class="row right">
                  <span class="close11" style="cursor:pointer;position:fixed;">&times;</span>

                </div>
                    <div class="wwww">
                    <div id="demo11" class="row"></div></div>
                      <div class="row right">


                    <button class="btn" type="reset">Reset</button>
                    &nbsp&nbsp
                    <button class="btn" id="sendinv">Send Invite</button>
                    <script>

                    </script>
                  </div>




                </div>

                </div>


              <script>
              // Get the modal
              var modal11 = document.getElementById('myModal11');

              // Get the button that opens the modal
              var btn11 = document.getElementById("myBtn11");

              // Get the <span> element that closes the modal
              var span11 = document.getElementsByClassName("close11")[0];

              // When the user clicks the button, open the modal
              btn11.onclick = function() {
                  modal11.style.display = "block";
              }

              // When the user clicks on <span> (x), close the modal
              span11.onclick = function() {
                  modal11.style.display = "none";
              }

              // When the user clicks anywhere outside of the modal, close it
              window.onclick = function(event) {
                  if (event.target == modal) {
                      modal11.style.display = "none";
                  }
              }
              </script>

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
        </div>
        <div class="container" id="goaldisplay">
          @if($goal->isEmpty())
          <style media="screen">
            .colorOfCard{
              background-color: #08e7d6;
            }
            .imageGif{
              border: none;
            }
          </style>

      <div class="container">
        <div class="col s12 m6">
          <div class="card colorOfCard z-depth-5 m6">
            <div class="card-image">

              <span class="card-title ">Card Title</span>
            </div>
            <div class="card-content center">
                <img src="https://media.giphy.com/media/26tP80DaorPjmqlC8/giphy.gif" height="200px" width="200px" class="imageGif">
                <span class="card-title " style="text-align:center"><p class="grey-text flow-text z-depth-2"><h1>WELCOME</h1></p><p class="flow-text"><h1>{{ Auth::User()->fname}}</h1></p></br></span>
            </div>
          </div>
        </div>
        </div>
          @else
          {{-- starrrrrrrrrrrrrrrrrrrtttttttttttttttttt --}}
          <br>
          <ul class="collection">
            <li class="collection-item"><b>Pinned Goals</b></li>
          </ul>
            <!-- the main goal that will be repeated -->
          <div class="row center">
            @foreach ($goal as $goals)
              @if($goals->pinned==1)
            <div class="col l4 m6 s12 card sticky-action responsive">
           <div class="card-image waves-effect waves-block waves-light">
             <img class="activator" src="{{asset('uploads/goals/'.$goals->goalpicturetwo)}}" alt="goal picture">
           </div>
           <div class="card-content">
              <span class="card-title  grey-text text-darken-4">
                <span class="col s2 tooltipped" style="cursor:pointer;" data-position="right" data-delay="50" data-tooltip="Pin this goal">
                  <form method="post" action="{{ route('dashboard') }}" id="unpin" style="position:inline;">
                      {{ csrf_field() }}
                    <input type="hidden" name="pinned" value="0">
                    <input type="hidden" name="goalid" value="{{$goals->goalid}}">
                    <input type="hidden" name="email" value="{{$email}}">
                    <input type="hidden" name="action" value="1">
                    <button type="submit" style="border:none;background-color:#fff;" id="unpinbtn">
                        <img class="icon icons8-Pin-Filled" width="20" height="20" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAABfklEQVQ4T6WU0U0CQRCG/90EnimBDtQOsAKxAs+EnfAGVKBUIL6RXR7OCsQKwA6wAinBe12SHTMGyN5xF+5kkn2b+TIz/z+r8I8gomdmHgGYOOfSGKGa8gaDQU9rvTrUMfNjDG0ETJKk02q1vpVSnbiRGNoIaIxZKqXuKqa6t9YuawOJaAzgpWpFzPwD4LYUOBwOuyGEETNfA5C3BdAtjlqEC/QEaIxJpJNzxRWdTk+ARLQBcNVQ/SyE0F8sFusToCjZbrfXdaHM/LHb7ZI0TWWHKN1hTWgGIBFlaxn7HJSZN865m+JqKm1DRGkIIdVazyrGz6y1OYNXjiy3CuDp6C2l5F5zQjHzp3Oud7ZDIuoDeI8Sp977WVEoZn51zonZc5Eb2RgjJl5FHpxaa6VbFHaaee+7B2VLRdkfvsAEevRVnHyAMvOs+G0d8o4diggAHgB8aa378/lczq1x/AGjw3/z3o/LRqlLVtGHObHWikUuCmWM2TJzInd4EWlf/Avee7REp9E1bAAAAABJRU5ErkJggg==">
                    </button>
                  </form>
                </span>
                <span style="cursor:pointer;" class="col s8 truncate activator tooltipped" data-position="bottom" data-delay="50" data-tooltip="Goal name - {{ $goals->goalname }}">{{ $goals->goalname }}</span>
                <span style="cursor:pointer;" class="col s2 activator tooltipped" data-position="bottom" data-delay="50" data-tooltip="View details"><i class="material-icons right">more_vert</i></span>
              </span>
              <br><br>
              <div style="border-top:1px solid grey;"><br>
              </div>
              <div class="row" >
                  <div class="col s12">
                    Priority :
                    {{$goals->goalpriority}}
                  </div>
              </div>
              <div class="row">
                  <div class="col s12">
                    End date :
                    {{$goals->goalenddate}}
                  </div>
              </div>
              <div class="row">
                  <div class="col s12">
                    Start date :
                    {{$goals->goalstartdate}}
                  </div>
              </div>
              <div style="border-top:1px solid grey;">
              </div>
            </div>
           <div class="card-action">
             <div class="row">
               <div class="col s3">
                 <a class="waves-effect waves-light btn btn-floating tooltipped" data-position="bottom" data-delay="50" data-tooltip="Go to goal" href="{{ url('/goal/'.$goals->goalid) }}"><i class="material-icons">exit_to_app</i></a>
               </div>
               <div class="col s3">
                 <form  action="{{route('deletegoal')}}" method="post">
                   {{csrf_field()}}
                   <button type="submit" class="waves-effect waves-light btn btn-floating tooltipped" data-position="bottom" data-delay="50" data-tooltip="Delete goal"><input type="hidden" name="goalid" value="{{$goals->goalid}}"><i class="material-icons  ">delete</i></button>
                 </form>
               </div>
               <div class="col s3">
                 @if ($goals->goalauthorization=="gift")
                   <a class="waves-effect waves-light btn btn-floating tooltipped" data-position="bottom" data-delay="50" data-tooltip="this goal is shared to you">
                     <i class="material-icons">share</i>
                   </a>
                 @else
                   <a class="waves-effect waves-light btn btn-floating blue lighten-3 tooltipped"  data-position="bottom" data-delay="50" data-tooltip="this goal is not shared">
                     <i class="material-icons">share</i>
                   </a>
                 @endif
               </div>
               <div class="col s3">
                 @if ($goals->goalauthorization=="aligned")
                   <a class="waves-effect waves-light btn btn-floating tooltipped"  data-position="bottom" data-delay="50" data-tooltip="this goal is aligned to you">
                     <i class="material-icons">call_merge</i>
                   </a>
                 @else
                   <a class="waves-effect waves-light btn btn-floating blue lighten-3 tooltipped"  data-position="bottom" data-delay="50" data-tooltip="this goal is not aligned">
                     <i class="material-icons">call_merge</i>
                   </a>
                 @endif
               </div>
             </div>
             <div class="row">
               <div class="col s10 tooltipped"  data-position="bottom" data-delay="50" data-tooltip="completed percentage">
                 @if ($goals->goalcompletedpercentage<=30)
                   <div class="progress red lighten-4">
                      <div class="determinate red darken-4" style="width: {{ $goals->goalcompletedpercentage }}%"></div>
                  </div>
                @elseif ($goals->goalcompletedpercentage<=60)
                  <div class="progress orange lighten-4">
                     <div class="determinate orange darken-4" style="width: {{ $goals->goalcompletedpercentage }}%"></div>
                 </div>
               @elseif ($goals->goalcompletedpercentage<=80)
                  <div class="progress yellow lighten-4">
                     <div class="determinate yellow darken-4" style="width: {{ $goals->goalcompletedpercentage }}%"></div>
                 </div>
               @elseif ($goals->goalcompletedpercentage<100)
                  <div class="progress green lighten-4">
                     <div class="determinate green darken-4" style="width: {{ $goals->goalcompletedpercentage }}%"></div>
                 </div>
               @elseif ($goals->goalcompletedpercentage==100)
                  <div class="progress  light-green accent-3">
                     <div class="determinate  light-green accent-3" style="width: {{ $goals->goalcompletedpercentage }}%"></div>
                 </div>
                 @endif
               </div>
               <div class="col s2 tooltipped"  data-position="bottom" data-delay="50" data-tooltip="{{ $goals->goalcompletedpercentage }}% completed">
                 @if ($goals->goalcompletedpercentage<=30)
                 <span class="red-text text-darken-4"><b>{{ $goals->goalcompletedpercentage }}%</b></span>
                 @elseif ($goals->goalcompletedpercentage<=60)
                   <span class="orange-text text-darken-4"><b>{{ $goals->goalcompletedpercentage }}%</b></span>
                 @elseif ($goals->goalcompletedpercentage<=80)
                   <span class="yellow-text text-darken-4"><b>{{ $goals->goalcompletedpercentage }}%</b></span>
                 @elseif ($goals->goalcompletedpercentage<100)
                   <span class="green-text text-darken-4"><b>{{ $goals->goalcompletedpercentage }}%</b></span>
                 @elseif ($goals->goalcompletedpercentage==100)
                   <!-- Christmas Star icon by Icons8 -->
                  <img class="icon icons8-Christmas-Star" width="20" height="20" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAACKUlEQVQ4T62UPW8TQRCG39m9u5Ao1tmyQGBcJMiRXCGMhGlQiERFCkSJkBD8BCpaXNHyF6AjDYIGWhtBkTS2qIysfFUWNLEgDrbvbgbtOef4C5+LXLc7s8+8887eEs75o3PmYS6gbOdL/s9gw37Q2IgTEAuU6koS3sJ+7yBwnXR7le41D2dB44Hb+RIIL3t7AdQSKnEqZwKlml+BJ1WAkgYIJeIkeJ3u7339n8rZwJ38GwBPzeEQCIAuYNd52MjNBMrna3cY+iYHuAtQSjwugGlBJ9WiSvRrRkC1TLAuUQ2gFghliLQAqsHGIRXqB2G27Kzd4GN8ky6WgjYA/6y+dVHBQEMPQ5g6C3qC4EQgXfFI8RNrc3dr0LKBAqoMkIsosSPgvwI7o+H/YtgZFa6lY0AAPOOBQCfkkYGFlgx7MQKNAizg3wIQwz8CwENHxmATwKh9o5Tb4vIfAZ8A9hUF/8go1OA2g4/N/qiyqP7UKXsfck3u0GWTpF1Ap3XooU4TtDvw8C0V68/Gpz0V2Hufa0mPXFiAk1WA6g8FSuBc1YAdHqtQsT7xK04FdrdyAiHYWQVyRq8NOYCd1eZutKj4IzWXwu67NdEpgk6dtify0W8Gtwc2nMaoWJ8QNLERfMo9Dzr0uq8CFRBKdKteNot+DCVjR189F6jYqA2rnAqkZf2CFulxBBpvy4DZwysrY22O50wA5cvqdVrf/x737oVXbEpu7PM1D3g45x/V0vYVEDEg7AAAAABJRU5ErkJggg==">
                 @endif
               </div>
             </div>
           </div>
           <div class="card-reveal" style="opacity: 0.7;filter: alpha(opacity=70); /* For IE8 and earlier *">
                 <span class="card-title grey-text text-darken-4">{{ $goals->goalname }}<i class="material-icons right">close</i></span>
                 <ol class="collection">
                   @foreach ($task as $tasks)
                     @if($goals->goalid==$tasks->goalid)
                   <li class="collection-item">
                       {{$tasks->taskname}}&nbsp;&nbsp;<b>{{ $tasks->taskcompletedpercentage }}%</b>
                   </li>
                   @endif
                   @endforeach

                </ol>
                <ul class="collection">
                  @if ($goals->gottasks==0)
                      <li class="collection-item">
                        No Tasks yet...
                      </li>
                  @endif
                </ul>
           </div>
          </div>
      @endif
    @endforeach
  </div>
  <ul class="collection">
    <li class="collection-item"><b>other</b></li>
  </ul>
  <div class="row center">
      @foreach ($goal as $goals)
      @if ($goals->pinned==0)
        <div class="col l4 m6 s12 card sticky-action responsive">
       <div class="card-image waves-effect waves-block waves-light">
         <img class="activator" src="{{asset('uploads/goals/'.$goals->goalpicturetwo)}}" alt="goal picture">
       </div>
       <div class="card-content">
          <span class="card-title  grey-text text-darken-4">
            <span class="col s2 tooltipped" style="cursor:pointer;" data-position="right" data-delay="50" data-tooltip="Pin this goal">
              <form method="post" action="{{ route('dashboard') }}" id="unpin" style="position:inline;">
                  {{ csrf_field() }}
                <input type="hidden" name="pinned" value="1">
                <input type="hidden" name="goalid" value="{{$goals->goalid}}">
                <input type="hidden" name="email" value="{{$email}}">
                <input type="hidden" name="action" value="1">
                <button type="submit" style="border:none;background-color:#fff;" id="unpinbtn">
                  <!-- Pin Filled icon by Icons8 -->
                  <img class="icon icons8-Pin-Filled" width="20" height="20" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAABf0lEQVQ4T6WUzXHCQAyFpREFUAIdBA+7d1JBSAVxKgipIKSCkA5IBSEVQM6WZ0kFoQR8944y8tiM8Q/Ywac9aD9L7z0twj++KIoWiPiEiM+TyWRVRmBfXhRFU0TcFPcQ8bEM7QV0zg29978AMDzpqgTtBWTmNQDctUx1b4xZdwbGcTwXkbczEh2I6LYR6JwbpWmqoo8BYCwie0QcVUdtgB9qwDiOw7yTE526mCcirzUgM+8A4KYLoFSTiMjMWrutAXMntz2gX0QUBkFw0B+0aajxuARNACBUZzsF+1KnIrKz1gZVaVpjw8wrEVkh4rJl/MQYUzOuEZjv6gsAZNny3uu+nhglIt/W2unFDpl5BgCfRaFGYTAYLBs0fTfGzM8CnXNj770ufjaKwqy1Cz1XNE2IaFQ422iKXkjTdJNvxzFX5eICqrpWn63j61Mc1AQAeACAHyKaBUGw7xnurDwzpbT4H0Q0bxqlKxyLBzN/fTUiV33IzHsRCXUPryLll/8ASP7A5nfoHrQAAAAASUVORK5CYII=">
                </button>
              </form>
            </span>
            <span style="cursor:pointer;" class="col s8 truncate activator tooltipped" data-position="bottom" data-delay="50" data-tooltip="Goal name - {{ $goals->goalname }}">{{ $goals->goalname }}</span>
            <span style="cursor:pointer;" class="col s2 activator tooltipped" data-position="bottom" data-delay="50" data-tooltip="View details"><i class="material-icons right">more_vert</i></span>
          </span>
          <br><br>
          <div style="border-top:1px solid grey;"><br>
          </div>
          <div class="row" >
              <div class="col s12">
                Priority :
                {{$goals->goalpriority}}
              </div>
          </div>
          <div class="row">
              <div class="col s12">
                End date :
                {{$goals->goalenddate}}
              </div>
          </div>
          <div class="row">
              <div class="col s12">
                Start date :
                {{$goals->goalstartdate}}
              </div>
          </div>
          <div style="border-top:1px solid grey;">
          </div>
        </div>
       <div class="card-action">
         <div class="row">
           <div class="col s3">
             <a class="waves-effect waves-light btn btn-floating tooltipped" data-position="bottom" data-delay="50" data-tooltip="Go to goal" href="{{ url('/goal/'.$goals->goalid) }}"><i class="material-icons">exit_to_app</i></a>
           </div>
           <div class="col s3">
             <form  action="{{route('deletegoal')}}" method="post">
               {{csrf_field()}}
               <button type="submit" class="waves-effect waves-light btn btn-floating tooltipped" data-position="bottom" data-delay="50" data-tooltip="Delete goal"><input type="hidden" name="goalid" value="{{$goals->goalid}}"><i class="material-icons  ">delete</i></button>
             </form>
           </div>
           <div class="col s3">
             @if ($goals->goalauthorization=="gift")
               <a class="waves-effect waves-light btn btn-floating tooltipped" data-position="bottom" data-delay="50" data-tooltip="this goal is shared to you">
                 <i class="material-icons">share</i>
               </a>
             @else
               <a class="waves-effect waves-light btn btn-floating blue lighten-3 tooltipped"  data-position="bottom" data-delay="50" data-tooltip="this goal is not shared">
                 <i class="material-icons">share</i>
               </a>
             @endif
           </div>
           <div class="col s3">
             @if ($goals->goalauthorization=="aligned")
               <a class="waves-effect waves-light btn btn-floating tooltipped"  data-position="bottom" data-delay="50" data-tooltip="this goal is aligned to you">
                 <i class="material-icons">call_merge</i>
               </a>
             @else
               <a class="waves-effect waves-light btn btn-floating blue lighten-3 tooltipped"  data-position="bottom" data-delay="50" data-tooltip="this goal is not aligned">
                 <i class="material-icons">call_merge</i>
               </a>
             @endif
           </div>
         </div>
         <div class="row">
           <div class="col s10 tooltipped"  data-position="bottom" data-delay="50" data-tooltip="completed percentage">
             @if ($goals->goalcompletedpercentage<=30)
               <div class="progress red lighten-4">
                  <div class="determinate red darken-4" style="width: {{ $goals->goalcompletedpercentage }}%"></div>
              </div>
            @elseif ($goals->goalcompletedpercentage<=60)
              <div class="progress orange lighten-4">
                 <div class="determinate orange darken-4" style="width: {{ $goals->goalcompletedpercentage }}%"></div>
             </div>
           @elseif ($goals->goalcompletedpercentage<=80)
              <div class="progress yellow lighten-4">
                 <div class="determinate yellow darken-4" style="width: {{ $goals->goalcompletedpercentage }}%"></div>
             </div>
           @elseif ($goals->goalcompletedpercentage<100)
              <div class="progress green lighten-4">
                 <div class="determinate green darken-4" style="width: {{ $goals->goalcompletedpercentage }}%"></div>
             </div>
           @elseif ($goals->goalcompletedpercentage==100)
              <div class="progress  light-green accent-3">
                 <div class="determinate  light-green accent-3" style="width: {{ $goals->goalcompletedpercentage }}%"></div>
             </div>
             @endif
           </div>
           <div class="col s2 tooltipped"  data-position="bottom" data-delay="50" data-tooltip="{{ $goals->goalcompletedpercentage }}% completed">
             @if ($goals->goalcompletedpercentage<=30)
             <span class="red-text text-darken-4"><b>{{ $goals->goalcompletedpercentage }}%</b></span>
             @elseif ($goals->goalcompletedpercentage<=60)
               <span class="orange-text text-darken-4"><b>{{ $goals->goalcompletedpercentage }}%</b></span>
             @elseif ($goals->goalcompletedpercentage<=80)
               <span class="yellow-text text-darken-4"><b>{{ $goals->goalcompletedpercentage }}%</b></span>
             @elseif ($goals->goalcompletedpercentage<100)
               <span class="green-text text-darken-4"><b>{{ $goals->goalcompletedpercentage }}%</b></span>
             @elseif ($goals->goalcompletedpercentage==100)
               <!-- Christmas Star icon by Icons8 -->
              <img class="icon icons8-Christmas-Star" width="20" height="20" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAACKUlEQVQ4T62UPW8TQRCG39m9u5Ao1tmyQGBcJMiRXCGMhGlQiERFCkSJkBD8BCpaXNHyF6AjDYIGWhtBkTS2qIysfFUWNLEgDrbvbgbtOef4C5+LXLc7s8+8887eEs75o3PmYS6gbOdL/s9gw37Q2IgTEAuU6koS3sJ+7yBwnXR7le41D2dB44Hb+RIIL3t7AdQSKnEqZwKlml+BJ1WAkgYIJeIkeJ3u7339n8rZwJ38GwBPzeEQCIAuYNd52MjNBMrna3cY+iYHuAtQSjwugGlBJ9WiSvRrRkC1TLAuUQ2gFghliLQAqsHGIRXqB2G27Kzd4GN8ky6WgjYA/6y+dVHBQEMPQ5g6C3qC4EQgXfFI8RNrc3dr0LKBAqoMkIsosSPgvwI7o+H/YtgZFa6lY0AAPOOBQCfkkYGFlgx7MQKNAizg3wIQwz8CwENHxmATwKh9o5Tb4vIfAZ8A9hUF/8go1OA2g4/N/qiyqP7UKXsfck3u0GWTpF1Ap3XooU4TtDvw8C0V68/Gpz0V2Hufa0mPXFiAk1WA6g8FSuBc1YAdHqtQsT7xK04FdrdyAiHYWQVyRq8NOYCd1eZutKj4IzWXwu67NdEpgk6dtify0W8Gtwc2nMaoWJ8QNLERfMo9Dzr0uq8CFRBKdKteNot+DCVjR189F6jYqA2rnAqkZf2CFulxBBpvy4DZwysrY22O50wA5cvqdVrf/x737oVXbEpu7PM1D3g45x/V0vYVEDEg7AAAAABJRU5ErkJggg==">
             @endif
           </div>
         </div>
       </div>
       <div class="card-reveal" style="opacity: 0.7;filter: alpha(opacity=70); /* For IE8 and earlier *">
             <span class="card-title grey-text text-darken-4">{{ $goals->goalname }}<i class="material-icons right">close</i></span>
             <ol class="collection">
               @foreach ($task as $tasks)
                 @if($goals->goalid==$tasks->goalid)
               <li class="collection-item">
                   {{$tasks->taskname}}&nbsp;&nbsp;<b>{{ $tasks->taskcompletedpercentage }}%</b>
               </li>
               @endif
               @endforeach

            </ol>
            <ul class="collection">
              @if ($goals->gottasks==0)
                  <li class="collection-item">
                    No Tasks yet...
                  </li>
              @endif
            </ul>
       </div>
      </div>
        @endif
        @endforeach
      </div>
      @endif
       {{-- eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeennnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnndddddddddddddddddddddd --}}
        </div>
        <!-- Tap Target Structure -->
  <div class="fab" id="view-source" >
        <div  class="tap-target" data-activates="view-source">
          <div class="tap-target-content white-text">
            <h5>Start Building Your Life Goals</h5>
            <p>
              Click on "+" and define your Goal


            </p>


          </div>
        </div>

          <button id="addgoalbtntwo" style="display:none;" class="btn-floating btn-large waves-effect waves-light red tooltipped hide-on-small-only" data-position="top" data-delay="50" data-tooltip="ADD GOAL"><i class="material-icons">add</i></button>
          <button  class="btn-floating btn-large waves-effect waves-light red tooltipped hide-on-med-and-up " data-position="top" data-delay="50" data-tooltip="ADD GOAL"><i class="material-icons">add</i></button>
                  </div>



        @if ($goal->isEmpty()||($compare->diffInHours($carbon))<1)
          <script>
          var addgoalbtntwo=document.getElementById("addgoalbtntwo");
          addgoalbtntwo.style.display="block";
          $('.tap-target').tapTarget('open');
          </script>
        @endif



      </main>
      </div>


  <!--  Scripts-->


@endsection
