  @extends('layouts.navbar')

@section('content')




  @php
   $carbon = new Carbon(Auth::User()->created_at);
   $compare =Carbon::now();
  @endphp
  @if (($goal->isEmpty())==false)
    @if ($compare->diffInHours($carbon)>1)
{{-- @include('layouts.friendsView') --}}
    @endif
  @endif
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

          <script type="text/javascript">

        //
        //
        //
        //   function dateValid() {
        //     var taskstartdate=document.getElementById("goalstartdate");
        //
        //     var goalstartdateerror=document.getElementById("goalstartdateerror");
        //     var goalenddate=document.getElementById("goalenddate");
        //
        //     var goalenddateerror=document.getElementById("goalenddateerror");
        //   //  var d=new Date(goalstartdate.value
        //         var d = new Date(document.getElementById("goalstartdate").value);
        //                   //  var startDate = "";
        //     var convertedStartDate = new Date(d);
        //     var month = convertedStartDate.getMonth() + 1
        //     var day = convertedStartDate.getDay();
        //     var year = convertedStartDate.getFullYear();
        //     if(day<10) {
        //         day = '0'+day
        //     }
        //
        //     if(month<10) {
        //         month = '0'+month
        //     }
        //     var shortStartDate = month + "/" + day + "/" + year;
        //
        //
        //
        //   var today = new Date();
        //                                         var dd = today.getDate();
        //                                         var mm = today.getMonth()+1;
        //                                         var yyyy = today.getFullYear();
        //
        //                                         if(dd<10) {
        //                                             dd = '0'+dd
        //                                         }
        //
        //                                         if(mm<10) {
        //                                             mm = '0'+mm
        //                                         }
        //
        //                                       today = mm + '/' + dd + '/' + yyyy;
        //
        //
        //
        //
        //
        //
        //
        //           var date1 = new Date(shortStartDate);
        //             var date2 = new Date(today);
        //
        //
        //       if (date1 > date2) {
        //         //  console.log('valid date');
        //       //  console.log('valid date');
        //        goalstartdateerror.innerHTML='valid date';
        //        goalstartdateerror.classList.remove('red-text');
        //        goalstartdateerror.classList.add('green-text');
        //        goalstartdate=1;
        //        if(goalstartdate==1 && goalenddate==1){
        //          document.getElementById("addgoalbtn").disabled=false;
        //        }
        //
        //
        //     }
        //     else {
        //
        //         goalstartdateerror.innerHTML='goal start date is invalid';
        //         goalstartdateerror.classList.remove('green-text');
        //         goalstartdateerror.classList.add('red-text');
        //         goalstartdate=0;
        //         if(goalstartdate==1 || goalenddate==1){
        //           document.getElementById("addgoalbtn").disabled=true;
        //         }
        //
        //     }
        //
        //
        //
        //
        //
        //   // -----------------------------------------------------------------------------------------------------------------------------------------------------------
        //
        //
        // //  function endateValid() {
        //
        //         var end = new Date(document.getElementById("goalenddate").value);
        //
        //     var convertedEndDate = new Date(end);
        //     var enmonth = convertedEndDate.getMonth() + 1
        //     var enday = convertedEndDate.getDay();
        //     var enyear = convertedEndDate.getFullYear();
        //     if(enday<10) {
        //         enday = '0'+enday
        //     }
        //
        //     if(enmonth<10) {
        //         enmonth = '0'+enmonth
        //     }
        //     var shortEndDate = enmonth + "/" + enday + "/" + enyear;
        //
        //           var endate1 = new Date(shortEndDate);
        //
        //
        //
        //       if (endate1 > date1) {
        //         //  console.log('valid date');
        //       //  console.log('valid date');
        //        goalenddateerror.innerHTML='valid date';
        //        goalenddateerror.classList.remove('red-text');
        //        goalenddateerror.classList.add('green-text');
        //        goalenddate=1;
        //        if(goalstartdate==1 && goalenddate==1){
        //          document.getElementById("addgoalbtn").disabled=false;
        //        }
        //
        //
        //     }
        //     else {
        //
        //         goalenddateerror.innerHTML='goal end date is invalid';
        //         goalenddateerror.classList.remove('green-text');
        //         goalenddateerror.classList.add('red-text');
        //         goalenddate=0;
        //         if(goalstartdate!==1 || goalenddate!==1){
        //           document.getElementById("addgoalbtn").disabled=true;
        //          }
        //
        //     }
        //
        //   }
        </script>

          <form>
          {{-- <li class="collection-item">
            <div class="mdl-textfield mdl-js-textfield">
              <label  style="color:#565656;font-size:12pt;"for="goalstartdate">Goal Start-Date</label>
              <input class="mdl-textfield__input tooltipped" data-position="bottom" data-delay="50" data-tooltip="Enter your Goal start date" style="color:#565656;" type="date" id="goalstartdate" name="goalstartdate" required>
            </div>
          </li>
          <li class="collection-item">
            <div class="mdl-textfield mdl-js-textfield">
              <label  style="color:#565656;font-size:12pt;"for="goalenddate">Goal End-Date</label>
              <input class="mdl-textfield__input tooltipped" data-position="bottom" data-delay="50" data-tooltip="Enter your Goal end date" style="color:#565656;" type="date" id="goalenddate" name="goalenddate" required>
            </div>
          </li>
          <script type="text/javascript">

          function dateValid() {
            var taskstartdate=document.getElementById("goalstartdate");

            var goalstartdateerror=document.getElementById("goalstartdateerror");
            var goalenddate=document.getElementById("goalenddate");

            var goalenddateerror=document.getElementById("goalenddateerror");
          //  var d=new Date(goalstartdate.value
                var d = new Date(document.getElementById("goalstartdate").value);
                          //  var startDate = "";
            var convertedStartDate = new Date(d);
            var month = convertedStartDate.getMonth() + 1
            var day = convertedStartDate.getDay();
            var year = convertedStartDate.getFullYear();
            if(day<10) {
                day = '0'+day
            }

            if(month<10) {
                month = '0'+month
            }
            var shortStartDate = month + "/" + day + "/" + year;



          var today = new Date();
                                                var dd = today.getDate();
                                                var mm = today.getMonth()+1;
                                                var yyyy = today.getFullYear();

                                                if(dd<10) {
                                                    dd = '0'+dd
                                                }

                                                if(mm<10) {
                                                    mm = '0'+mm
                                                }

                                              today = mm + '/' + dd + '/' + yyyy;







                  var date1 = new Date(shortStartDate);
                    var date2 = new Date(today);


              if (date1 > date2) {
                //  console.log('valid date');
              //  console.log('valid date');
               goalstartdateerror.innerHTML='valid date';
               goalstartdateerror.classList.remove('red-text');
               goalstartdateerror.classList.add('green-text');
               goalstartdate=1;
               if(goalstartdate==1 && goalenddate==1){
                 document.getElementById("addgoalbtn").disabled=false;
               }


            }
            else {

                goalstartdateerror.innerHTML='goal start date is invalid';
                goalstartdateerror.classList.remove('green-text');
                goalstartdateerror.classList.add('red-text');
                goalstartdate=0;
                if(goalstartdate==1 || goalenddate==1){
                  document.getElementById("addgoalbtn").disabled=true;
                }

            }





          // -----------------------------------------------------------------------------------------------------------------------------------------------------------


        //  function endateValid() {

                var end = new Date(document.getElementById("goalenddate").value);

            var convertedEndDate = new Date(end);
            var enmonth = convertedEndDate.getMonth() + 1
            var enday = convertedEndDate.getDay();
            var enyear = convertedEndDate.getFullYear();
            if(enday<10) {
                enday = '0'+enday
            }

            if(enmonth<10) {
                enmonth = '0'+enmonth
            }
            var shortEndDate = enmonth + "/" + enday + "/" + enyear;

                  var endate1 = new Date(shortEndDate);



              if (endate1 > date1) {
                //  console.log('valid date');
              //  console.log('valid date');
               goalenddateerror.innerHTML='valid date';
               goalenddateerror.classList.remove('red-text');
               goalenddateerror.classList.add('green-text');
               goalenddate=1;
               if(goalstartdate==1 && goalenddate==1){
                 document.getElementById("addgoalbtn").disabled=false;
               }


            }
            else {

                goalenddateerror.innerHTML='goal end date is invalid';
                goalenddateerror.classList.remove('green-text');
                goalenddateerror.classList.add('red-text');
                goalenddate=0;
                if(goalstartdate!==1 || goalenddate!==1){
                  document.getElementById("addgoalbtn").disabled=true;
                 }

            }

          }
        </script> --}}
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
  <script>


  $(document).ready(function(){
   // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
   document.getElementById('view-source').addEventListener("click",function(event){
     event.preventDefault();
     $('.modal').modal();
     $('#addgoal').modal('open');
   });
   document.getElementById('cancelmodalbtn').addEventListener("click",function(event){
     event.preventDefault();
     $('.modal').modal();
     $('#addgoal').modal('close');
   });
 });
  </script>






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
						<a class="btn btn-floating blue lighten-1 btn-large googleContactsButton" id="myBtn11"><i class="material-icons">people</i></a>
					</div>
          <script src="https://apis.google.com/js/client.js?onload=gapiLoad"></script>
          <script src="https://apis.google.com/js/client.js"></script>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
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

                          text =text+'<div class="col l6"><div class="card" style="width:100%; height:100%;max-height:100%;"><div class="row"><div class="col l4"><input type="checkbox" value="'+x+'" id="'+i+'"/><label for="'+i+'"></label><img src="img/Cornmanthe3rd-Plex-Communication-gmail.ico" height="40px" width="40px"></div><div class="col l8 truncate">'+y.$t+'<br><span style="font-size:10px;">'+x[0].address+'</span></div></div></div></div>';
                          console.log(document.getElementById(i));
                        }
                      }

                      document.getElementById("demo11").innerHTML=text;

                      //
                      //

                      // var invitebtn=document.getElementById('sendinv');
                      //  invitebtn.addEventListener("click",function(event){
                      //  event.preventDefault();
                      //  Check();
                      // });
                      // function Check(){
                      //   console.log("idhsadcbshjdncs");
                      //   var inputs =document.getElementsByTagName("input");
                      //     for (var i = 0; i < inputs.length; i++) {
                      //         console.log(inputs[i].value);
                      //         }
                      // }
                      });
                  }
                }


              </script>
              <style>
              /* The Modal (background) */


              /* The Close Button */
              .close11 {
                  color: #aaaaaa;
                  float: right;
                  font-size: 28px;
                  font-weight: bold;
              }

              .close11:hover,
              .close11:focus {
                  color: #000;
                  text-decoration: none;
                  cursor: pointer;
              }
              </style>

              <!-- The Modal -->
              <div id="myModal11" class="modal"style="z-index:4000;width:50%;">

                <!-- Modal content -->
                <div class="modal-content">
                  <div class="row right">
                  <span class="close11" style="cursor:pointer;position:fixed;">&times;</span>

                </div>

                    <div id="demo11" class="row"></div>
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



				<script type="text/javascript">
				// var goaldisplay=document.getElementById('goaldisplay');
				// var calendardisplay=document.getElementById('calendardisplay');
				// function displaycalendar() {
				// 	calendardisplay.style.display="block";
				// 	goaldisplay.addClass="hide";
				// }
				//
				// function displaydashboard() {
				// 	calendardisplay.style.display="none";
				// 	goaldisplay.style.display="block";
				// }
				</script>
        <div class="mdl-grid portfolio-max-width" id="goaldisplay">
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
              <!-- <p class="flow-text "><h2 class="white-text">WELCOME</h2> -->
                 <span class="card-title " style="text-align:center"><p class="grey-text flow-text z-depth-2"><h1>WELCOME</h1></p><p class="flow-text"><h1>{{ Auth::User()->fname}}</h1></p></br></span>
            </div>
          </div>
        </div>

        </div>

          @else
          {{-- starrrrrrrrrrrrrrrrrrrtttttttttttttttttt --}}
             <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp mdl-cell mdl-cell--12-col">
              <tbody>
                <tr>
                 <td class="mdl-data-table__cell--non-numeric"><b>Pinned Goals</b></td>
                </tr>
              </tbody>
             </table>
            <!-- the main goal that will be repeated -->
            @foreach ($goal as $goals)
              @if($goals->pinned==1)
            <div class="mdl-cell mdl-card mdl-shadow--4dp portfolio-card">
              <div class="containerholder">

              <div class="overlay">
              <!-- what goes in the slide up -->
              <div class="text">
                <!-- repeatable List for tasks -->
                <ul class="demo-list-item mdl-list">
                  @foreach ($task as $tasks)
                    @if($goals->goalid==$tasks->goalid)
                  <li class="mdl-list__item">
                    <span class="mdl-list__item-primary-content" style="color:white;">
                      {{$tasks->taskname}}
                    </span>
                  </li>
                  @endif
                  @endforeach
                  @if ($goals->gottasks==0)
                      <li class="mdl-list__item">
                    <span class="mdl-list__item-primary-content" style="color:white;">
                        No Tasks yet
                    </span>
                  </li>
                  @endif
                </ul>

              </div>

              </div>
            <!-- <div id="some-div"> -->
                <div class="mdl-card__media">
                    <img class="article-image" src="{{asset('uploads/goals/'.$goals->goalpicturetwo)}}" border="0" alt="" >
                </div>
                <div class="mdl-card__title">
                  <h2 class="mdl-card__title-text">{{$goals->goalname}}</h2>
                </div>
                <div class="mdl-card__supporting-text">
                  Priority:{{$goals->goalpriority}}<br>
                  End date:{{$goals->goalenddate}}<br>
                  Start date:{{$goals->goalstartdate}}<br>
                  Authorization:{{$goals->goalauthorization}}<br>
                </div>


             <!-- <span id="some-element">
               sdfsfsdfsdfsffdsfsfd
             </span> -->
               <!-- </div> -->
             </div>
             <div class="mdl-card__actions mdl-card--border">

             <!--  Progress Bar -->
             <div id="{{$goals->goalid}}" class="mdl-progress mdl-js-progress"></div><br>

             <script>
             // javascript for the progressbar needs to repeat for all goals
                 document.querySelector('#{{$goals->goalid}}').addEventListener('mdl-componentupgraded', function() {
                   this.MaterialProgress.setProgress({{$goals->goalcompletedpercentage}});
                 });
             </script>
               <form method="post" action="{{ route('dashboard') }}" id="unpin" class="right">
                 {{ csrf_field() }}
               <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--accent" href="{{ url('/goal/'.$goals->goalid) }}">Go to Goal</a>&nbsp   &nbsp &nbsp   &nbsp &nbsp   &nbsp
               <input type="text" class="hidden" name="pinned" value="0">
               <input type="text" class="hidden" name="goalid" value="{{$goals->goalid}}">
               <input type="text" class="hidden" name="email" value="{{$email}}">
               <input type="text" class="hidden" name="action" value="1">
               <button type="submit"  class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--accent" id="unpinbtn"><a style="color:blue" class="material-icons">pin_drop</a></button>
             </form>

             <form class="right" action="{{route('deletegoal')}}" method="post">
               {{csrf_field()}}
               <button type="submit" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--accent" ><input type="hidden" name="goalid" value="{{$goals->goalid}}"><i class="material-icons  ">delete</i></button>
             </form>
             <script>

             </script>
           </div>
          </div>
      @endif
    @endforeach
      <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp mdl-cell mdl-cell--12-col">
       <tbody>
         <tr>
          <td class="mdl-data-table__cell--non-numeric"><b>Other</b></td>
         </tr>
       </tbody>
      </table>

      @foreach ($goal as $goals)
      @if ($goals->pinned==0)
          <!-- ////////////////////////////////// -->
            <div class="mdl-cell mdl-card mdl-shadow--4dp portfolio-card">
              <div class="containerholder">

              <div class="overlay">
              <!-- what goes in the slide up -->
              <div class="text">
                <!-- repeatable List for tasks -->
                <ul class="demo-list-item mdl-list">
                  @foreach ($task as $tasks)
                    @if($goals->goalid==$tasks->goalid)
                  <li class="mdl-list__item">
                    <span class="mdl-list__item-primary-content" style="color:white;">
                      {{$tasks->taskname}}
                    </span>
                  </li>
                  @endif
                  @endforeach
                  @if ($goals->gottasks==0)
                      <li class="mdl-list__item">
                    <span class="mdl-list__item-primary-content" style="color:white;">
                        No Tasks yet
                    </span>
                  </li>
                  @endif
                </ul>
              </div>

              </div>
            <!-- <div id="some-div"> -->
                <div class="mdl-card__media">
                    <img class="article-image" src="{{asset('uploads/goals/'.$goals->goalpicturetwo)}}" border="0" alt="">
                </div>
                <div class="mdl-card__title">
                  <h2 class="mdl-card__title-text">{{$goals->goalname}}</h2>
                </div>
                <div class="mdl-card__supporting-text">
                  Priority:{{$goals->goalpriority}}<br>
                  End date:{{$goals->goalenddate}}<br>
                  Start date:{{$goals->goalstartdate}}<br>
                  Authorization:{{$goals->goalauthorization}}<br>
                </div>

             <!-- <span id="some-element">
               sdfsfsdfsdfsffdsfsfd
             </span> -->
               <!-- </div> -->
             </div>
             <div class="mdl-card__actions mdl-card--border">

             <!--  Progress Bar -->
             <div id="{{$goals->goalid}}" class="mdl-progress mdl-js-progress"></div><br>

             <script>
             // javascript for the progressbar needs to repeat for all goals
                 document.querySelector('#{{$goals->goalid}}').addEventListener('mdl-componentupgraded', function() {
                   this.MaterialProgress.setProgress({{$goals->goalcompletedpercentage}});
                 });
             </script>
             <form method="post" action="{{ route('dashboard') }}" id="pin" class="right">
               {{ csrf_field() }}
             <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--accent" href="{{ url('/goal/'.$goals->goalid) }}">Go to Goal</a>&nbsp   &nbsp &nbsp   &nbsp &nbsp   &nbsp
             <input type="text" class="hidden" name="pinned" value="1">
             <input type="text" class="hidden" name="goalid" value="{{$goals->goalid}}">
             <input type="text" class="hidden" name="email" value="{{$email}}">
             <input type="text" class="hidden" name="action" value="1">
             <button type="submit"  class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--accent"><i class="material-icons">pin_drop</i></button>
           </form>
            <form class="right" action="{{route('deletegoal')}}" method="post">
               {{csrf_field()}}
               <button type="submit" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--accent" ><input type="hidden" name="goalid" value="{{$goals->goalid}}"><i class="material-icons  ">delete</i></button>
             </form>
           </div>
          </div>
        @endif
        @endforeach
      @endif
       {{-- eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeennnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnndddddddddddddddddddddd --}}
            <div id="overlay2"></div>



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
