@extends('layouts.navbar')
@section('content')
{{-- @include('layouts.friendsView') --}}
      @foreach ($goal as $goals)
      @endforeach
      @foreach ($user as $users)
          @endforeach
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
                      <option  value="Be happy">Be happy</option>
                      <option  value="Career and professional growth">Career and professional growth</option>
                      <option  value="Community and recreation">Community and recreation</option>
                      <option  value="Creativity and Designs">Creativity and Designs</option>
                      <option  value="Drama, Entertainment and Music">Drama, Entertainment and Music</option>
                      <option  value="Education and Learning">Education and Learning</option>
                     <option  value="Travel and Adventure">Travel and Adventure</option>
                     <option  value="Finance and stability">Finance and stability</option>
                     <option  value="Friends">Friends</option>
                     <option  value="Health, fitness and sports">Health, fitness and sports</option>
                     <option  value="Hobbies">Hobbies</option>
                     <option  value="Love, Marriage and Relationship">Love, Marriage and Relationship</option>
                     <option  value="Personal, family and home">Personal, family and home</option>
                     <option  value="Spiritual Life<">Spiritual Life</option>
                     <option  value="Time of the Year">Time of the Year</option>
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
  <div id="addtaskmodal" class="modal modal-fixed-footer">
    <div class="modal-content" style="text-align:center;">
      <h4>Add a Task</h4>
      <style type="text/css">


                .dark-area {
                    background-color: #666;
                    padding: 40px;
                    margin: 0 -40px 20px -40px;
                    clear: both;
                }

                .clearfix:before,.clearfix:after {content: " "; display: table;}
                .clearfix:after {clear: both;}
                .clearfix {*zoom: 1;}

            </style>

      <form action="{{route('goal')}}" method="post" id="addtaskform">
{{ csrf_field() }}
        <input type="text" style="display:none;"class="hidden" value="{{$goals->goalid}}" name="goalid">
        <input type="text"style="display:none;" class="hidden" value="addtask" name="action">
        <input type="text" style="display:none;"class="hidden" value="{{$goals->goalauthorization}}" name="goalauthorization">
        <ul class="collection">
          <li class="collection-item">
            <div class="input-field col s6">
              <input class="validate  tooltipped" data-position="bottom" data-delay="50" data-tooltip="Enter Task Name " style="color:#565656;" type="text" id="taskname" name="taskname" required>
              <label style="color:#565656;"for="taskname">Task Name</label>
            </div>
          </li>
          <li class="collection-item">
            <div class="input-field col s6">
              <input  style="color:#565656;"  class="validate tooltipped" data-position="bottom" data-delay="50" data-tooltip="Enter task Intent " type="text" id="taskintent" name="taskintent" required>
              <label style="color:#565656;"for="taskintent">Task Intent</label>
            </div>
          </li>
          <li class="collection-item">
            <p>
                 <input name="taskpriority" value="high" type="radio" id="priority1" />
                 <label for="priority1">high</label>
               </p>
               <p>
                 <input name="taskpriority" value="medium" type="radio" id="priority2" />
                 <label for="priority2">medium</label>
               </p>
               <p>
                 <input  name="taskpriority" value="low" type="radio" id="priority3"  />
                 <label for="priority3">low</label>
               </p>
          </li>
          {{-- <li class="collection-item">
            <div class="input-field col s6">
              <span  style="color:#565656;font-size:12pt;">Task Start-Date</span>
              <input  style="color:#565656;" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Enter your Task start date" type="date" id="taskstartdate" name="taskstartdate" required>
            </div>
          </li> --}}
          <form>
            <script type="text/javascript">
            var taskenddate=0;
            var taskstartdate=0;

            </script>
          <li class="collection-item">
            <div class="input-field col s6">
              <span  style="color:#565656;font-size:12pt;">Task Start-Date</span>
              <input  style="color:#565656;" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Enter your Task start date" type="date" id="taskstartdate"  oninput="dateValid()"name="taskstartdate" required>
                  <span id="taskstartdateerror"></span>
              <!-- <script type="text/javascript">

            </script> -->
            </div>
          </li>
          <li class="collection-item">
            <div class="input-field col s6">
              <span style="color:#565656;font-size:12pt;">Task End-Date</span>
              <input  style="color:#565656;" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Enter your Task end date" type="date"  id="taskenddate" oninput="dateValid()" name="taskenddate" required>
              <span id="taskenddateerror"></span>
            </div>
          </li>

                    <script type="text/javascript">


                  //
                  //
                  //   function dateValid() {
                  //     var taskstartdate=document.getElementById("taskstartdate");
                  //
                  //     var taskstartdateerror=document.getElementById("taskstartdateerror");
                  //     var taskenddate=document.getElementById("taskenddate");
                  //
                  //     var taskenddateerror=document.getElementById("taskenddateerror");
                  //   //  var d=new Date(taskstartdate.value
                  //         var d = new Date(document.getElementById("taskstartdate").value);
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
                  //   // // var today = new Date();
                  //   // //                                       var dd = today.getDate();
                  //   // //                                       var mm = today.getMonth()+1;
                  //   // //                                       var yyyy = today.getFullYear();
                  //   // //
                  //   // //                                       if(dd<10) {
                  //   // //                                           dd = '0'+dd
                  //   // //                                       }
                  //   // //
                  //   // //                                       if(mm<10) {
                  //   // //                                           mm = '0'+mm
                  //   // //                                       }
                  //   //
                  //   //                                     today = mm + '/' + dd + '/' + yyyy;
                  //
                  //
                  //
                  //
                  //
                  //
                  //
                  //           var date1 = new Date(shortStartDate);
                  //           //  var date2 = new Date(today);
                  //       //    var date2={{$goals->goalstartdate}};
                  //          var date2 = new Date("{{$goals->goalstartdate}}");
                  //     //      var date3={{$goals->goalenddate}};
                  //           var date3 = new Date("{{$goals->goalenddate}}");
                  //           console.log(date1);
                  //           console.log(date2);
                  //           console.log(date3);
                  //
                  //       if (date1 > date2 && date1 < date3) {
                  //         //  console.log('valid date');
                  //       //  console.log('valid date');
                  //        taskstartdateerror.innerHTML='valid date';
                  //        taskstartdateerror.classList.remove('red-text');
                  //        taskstartdateerror.classList.add('green-text');
                  //        taskstartdate=1;
                  //        if(taskstartdate==1 && taskenddate==1){
                  //          document.getElementById("addtaskbtn").disabled=false;
                  //        }
                  //
                  //
                  //     }
                  //     else {
                  //
                  //         taskstartdateerror.innerHTML='Task start date is invalid';
                  //         taskstartdateerror.classList.remove('green-text');
                  //         taskstartdateerror.classList.add('red-text');
                  //         taskstartdate=0;
                  //         if(taskstartdate==1 || taskenddate==1){
                  //           document.getElementById("addtaskbtn").disabled=true;
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
                  //         var end = new Date(document.getElementById("taskenddate").value);
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
                  //       if (endate1 > date1 && endate1 < date3) {
                  //         //  console.log('valid date');
                  //       //  console.log('valid date');
                  //        taskenddateerror.innerHTML='valid date';
                  //        taskenddateerror.classList.remove('red-text');
                  //        taskenddateerror.classList.add('green-text');
                  //        taskenddate=1;
                  //        if(taskstartdate==1 && taskenddate==1){
                  //          document.getElementById("addtaskbtn").disabled=false;
                  //        }
                  //
                  //
                  //     }
                  //     else {
                  //
                  //         taskenddateerror.innerHTML='Task end date is invalid';
                  //         taskenddateerror.classList.remove('green-text');
                  //         taskenddateerror.classList.add('red-text');
                  //         taskenddate=0;
                  //         if(taskstartdate!==1 || taskenddate!==1){
                  //           document.getElementById("addtaskbtn").disabled=true;
                  //          }
                  //
                  //     }
                  //
                  //   }
                  </script>
          {{-- <li class="collection-item">
            <div class="input-field col s6">
              <span style="color:#565656;font-size:12pt;">Task End-Date</span>
              <input  style="color:#565656;" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Enter your Task end date" type="date" id="taskenddate" name="taskenddate" required>
            </div>
          </li>
          <script type="text/javascript">
                    function dateValid() {
                      var taskstartdate=document.getElementById("taskstartdate");

                      var taskstartdateerror=document.getElementById("taskstartdateerror");
                      var taskenddate=document.getElementById("taskenddate");

                      var taskenddateerror=document.getElementById("taskenddateerror");
                    //  var d=new Date(taskstartdate.value
                          var d = new Date(document.getElementById("taskstartdate").value);
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



                    // // var today = new Date();
                    // //                                       var dd = today.getDate();
                    // //                                       var mm = today.getMonth()+1;
                    // //                                       var yyyy = today.getFullYear();
                    // //
                    // //                                       if(dd<10) {
                    // //                                           dd = '0'+dd
                    // //                                       }
                    // //
                    // //                                       if(mm<10) {
                    // //                                           mm = '0'+mm
                    // //                                       }
                    //
                    //                                     today = mm + '/' + dd + '/' + yyyy;







                            var date1 = new Date(shortStartDate);
                            //  var date2 = new Date(today);
                        //    var date2={{$goals->goalstartdate}};
                           var date2 = new Date("{{$goals->goalstartdate}}");
                      //      var date3={{$goals->goalenddate}};
                            var date3 = new Date("{{$goals->goalenddate}}");
                            console.log(date1);
                            console.log(date2);
                            console.log(date3);

                        if (date1 > date2 && date1 < date3) {
                          //  console.log('valid date');
                        //  console.log('valid date');
                         taskstartdateerror.innerHTML='valid date';
                         taskstartdateerror.classList.remove('red-text');
                         taskstartdateerror.classList.add('green-text');
                         taskstartdate=1;
                         if(taskstartdate==1 && taskenddate==1){
                           document.getElementById("addtaskbtn").disabled=false;
                         }


                      }
                      else {

                          taskstartdateerror.innerHTML='Task start date is invalid';
                          taskstartdateerror.classList.remove('green-text');
                          taskstartdateerror.classList.add('red-text');
                          taskstartdate=0;
                          if(taskstartdate==1 || taskenddate==1){
                            document.getElementById("addtaskbtn").disabled=true;
                          }

                      }





                    // -----------------------------------------------------------------------------------------------------------------------------------------------------------


                  //  function endateValid() {

                          var end = new Date(document.getElementById("taskenddate").value);

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



                        if (endate1 > date1 && endate1 < date3) {
                          //  console.log('valid date');
                        //  console.log('valid date');
                         taskenddateerror.innerHTML='valid date';
                         taskenddateerror.classList.remove('red-text');
                         taskenddateerror.classList.add('green-text');
                         taskenddate=1;
                         if(taskstartdate==1 && taskenddate==1){
                           document.getElementById("addtaskbtn").disabled=false;
                         }


                      }
                      else {

                          taskenddateerror.innerHTML='Task end date is invalid';
                          taskenddateerror.classList.remove('green-text');
                          taskenddateerror.classList.add('red-text');
                          taskenddate=0;
                          if(taskstartdate!==1 || taskenddate!==1){
                            document.getElementById("addtaskbtn").disabled=true;
                           }

                      }

                    }
                  </script> --}}
        </ul>

    </div>
    <div class="modal-footer">
      <button type="submit" id="addtaskbtn" style="margin-right:10px;margin-left:10px;"class="modal-action waves-effectwaves-effect waves-light btn">Add Task</button>
    </form>  <a href="#!" id="cancelmodalbtn" style="margin-right:10px;margin-left:10px;"class="model-close waves-effectwaves-effect waves-light btn">Not Now</a>
    </div>
    <script>
    document.getElementById("cancelmodalbtn").addEventListener("click",function(event){
      $('#addtaskmodal').modal('close');
    });
    // var addtaskbtn=document.getElementById('addtaskbtn');
    // addtaskbtn.addEventListener("click",function(event){
    //   event.preventDefault();
    //   addtask();
    // });
    // function addtask(){
    //  var form = document.getElementById("addtaskform");
    //  var action = form.getAttribute("action");
    //  var form_data = new FormData(form);
    //  var xhr = new XMLHttpRequest();
    //  xhr.open('POST', action, true);
    //  xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    //  xhr.send(form_data);
    //  xhr.onreadystatechange = function () {
    //    if(xhr.readyState == 4 && xhr.status == 200) {
    //       var result = xhr.responseText;
    //       console.log('Result: ' + result);
    //       $('#addtaskmodal').modal('close');
    //       window.location.reload();
    //    }
    //  };
  //  }
    </script>
  </div>
<div>

</div>
<div class="container">
    <div class="row hide-on-small-only">
      <br><br>
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
        <span class=" blue-text text-darken-4"><b>Knowledge Hub</b></span><br>
        <a href="{{url('/mainlearningboard')}}" class="btn btn-floating btn-large "><i class="material-icons">attach_file</i></a>
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
  <div class="row">
        <div class="col s12 m12">

          <div class="card ">


            <div class="card-content white-text" style="min-height:300px;background-image:url({{asset('uploads/goals/'.$goals->goalpictureone)}});  " >
                <div class="row">
                  <span class="card-title"><h3>{{$goals->goalname}}</h3></span>
                  <div class="clearfix">

                           <div class="c100 p{{$goals->goalcompletedpercentage}} big">
                               <span class="blue-text">{{$goals->goalcompletedpercentage}}%</span>
                               <div class="slice">
                                   <div class="bar"></div>
                                   <div class="fill"></div>
                               </div>
                           </div>


                    </div>
                </div>

                 <div class="cambtn" id="imgoverlayfade">

                      <form style=""enctype="multipart/form-data" action="{{route('goalPicUpload')}}" method="post" id="goalPicUpload">
                        {{ csrf_field() }}
                          <p class="white-text">
                            <div class="file-field input-field"  >
                              <div class="btn btn-floating">
                            <i class="material-icons tooltipped" data-position="bottom" data-delay="50" data-tooltip="Upload Profile Picture" >camera_alt</i>
                            <input type="hidden" name="goalid" value="{{ $goals->goalid}}">
                            <input type="file" name="goalpicture"  onchange="javascript:this.form.submit();">
                          </div>
                        </div>


                          </p>

                        </form>




                    </div>

            </div>
            <div class="card-action ">
              <div class="row">
                <div class="col l6 center-align">
                  @if ($goals->goalauthorization!='creator')
                    <div class="chip">
                      <img src="{{asset('uploads/avatars/'.Auth::User()->avatar)}}" alt="Contact Person">
                      {{$users->fname}}&nbsp;{{$users->lname}}&nbsp;({{($goals->goalauthorization=='gift')?'shared':$goals->goalauthorization}})
                    </div>
                  @endif

                  {{-- To display orginal creator --}}
                  {{-- @if (($goals->goalauthorization="creator")&&($goals->email!=Auth::User()->email)) --}}
                  @foreach ($creator as $creators)
                    <div class="chip">
                      <img src="{{asset('uploads/avatars/'.$creators->avatar)}}" alt="Contact Person">
                      {{$creators->fname}}&nbsp;{{$creators->lname}}&nbsp;({{$creators->goalauthorization}})
                    </div>
                  @endforeach



                </div>
                <br>
                <div class="row center-align">
                  <div class="col l12 s12">
                    <ul class="collapsible popout" data-collapsible="accordion">
                      <li>
                      <div class="collapsible-header">
                        <img class="icon icons8-Merge-Git-Filled tooltipped" data-position="bottom" data-delay="50" data-tooltip="Work on same goal " width="30" height="30" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAB0klEQVRIS+2XT07CUBDGv3mJkQRI6gmQE4gnsC4Ed3ACW04gnEA9gfUEtV5A3dm6EG8AJ9AbSEJJMCZvzDPR9C8+tdiFdt/5zXyd+WZKKOmhZdzKvru5WGCKUX9adH6Z4Oqe2xKCLgHaVEBmdsLAHhYJzwTXO94jgEYUJEHDuX/gFAVPgZW8aywekgBm3IeBZa4MDNM16uviKQUGrkPf6q0ODKDW8RwCDqMQJrkb3vRHKwWr4NXOxUCwPGbQI7O057f9cVFQFWfpONXanqpwFAbWcZHQf3BKzT8qNWEc+tbg15uLiBsz326WAMZO0T6tO04GEbaklNs6JqI2GxEdgWAw6GruW2dZamkZCBNNBfhUAoO8QCp4bd81icVdzGqBs6we0QIr56q33R5IOGo7KzdjJrU6P54wsE5qHe+KgG6ywtmz3EgeE9rg92DVvQubBLfAaCXAppp7IuwkwS8km4ubfizRL4OXdffbYgGfxqRmTMLAiiX5aXN9Z4SiK5UZk7zNlluxyp4gu2BMmflEp6M/EjVdo1KBkZQ3WkgmOOsQ0B0nXZXS4LJOn/KOPWUEbW+s3CoqW9G2mXvQE4nzdzjnuI/u9/yyZf76L8xPKtF99xVcbfQfFIlphQAAAABJRU5ErkJggg==">
                      </div>

                      <div class="collapsible-body">
                        <div class="row ">
                        <div class="col s12 l6 m6">
                        <div class="card blue-grey darken-1 alignedCard" >
                          <div class="card-content white-text"  >
                            <span class="card-title">People you aligned</span>
                          @if ($aligned->isEmpty())
                            <span class="white-text darken-4">There are no alignes yet</span>
                          @endif
                        @foreach ($aligned as $alignes)
                          <div class=" col s12 chip">
                            <img src="{{asset('uploads/avatars/'.$alignes->avatar)}}" alt="Contact Person"/>
                            <a id="test"href="{{url('/search/'.$alignes->id)}}">{{$alignes->fname}}&nbsp;{{$alignes->lname}}</a>
                            @if ($goals->goalauthorization!='aligned')
                                <i id="{{$alignes->email}}"class="close material-icons">close</i>
                            @endif
                          </div>
                          <form id="{{$alignes->id}}" action="{{route('deletealigned')}}" method="post">
                           {{ csrf_field() }}
                           <input type="hidden" name="goalid" value="{{$goals->goalid}}">
                           <input type="hidden" name="email" value="{{$alignes->email}}">
                          </form>
                          <script type="text/javascript">
                            var deletealignedbtn=document.getElementById('{{$alignes->email}}');
                            deletealignedbtn.addEventListener("click",deletealignedfunction)
                            function deletealignedfunction() {
                            var form=document.getElementById('{{$alignes->id}}');
                            var action = form.getAttribute("action");
                            var form_data = new FormData(form);
                            var xhr = new XMLHttpRequest();
                            xhr.open('POST', action, true);
                            xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                            xhr.send(form_data);
                            xhr.onreadystatechange = function () {
                              if(xhr.readyState == 4 && xhr.status == 200) {
                                 var result = xhr.responseText;
                                 console.log('Result: ' + result);
                              }
                            };
                          }
                          </script>
                          <br>
                        @endforeach
                          </div>
                          <br>

                          </div>
                          </div>
                          <!-- collapsible-body end -->
                          <div class="col s12 m6 l6">
                            <div class="card blue-grey darken-1">
                              <div class="card-content white-text">
              <div>
                <form class="inline" action="{{route('align')}}" method="post">
                  {{ csrf_field() }}
                  <input type="hidden" name="goalid" value="{{$goals->goalid}}">
                  <div class="input-field ">
                    @if ($goals->goalauthorization!='aligned')
                            <input id="email" name="email" type="text" class="validate">
                            <label class="white-text"for="email">email</label>
                    @else
                      Sorry, You are not authorized to align this task
                    @endif
                    @if ($goals->goalauthorization!='aligned')
                    <button type="submit"  class="btn btn-floating tooltipped" data-position="bottom" data-delay="50" data-tooltip="Work on same goal " name="button">
                      <!-- Merge Git Filled icon by Icons8 -->
<img class="icon icons8-Merge-Git-Filled" width="30" height="30" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAADDUlEQVRIS8VXMUxTYRD+7iXgwCsUFyZAhUUTtA4OBhJxoBhYILogasukwgBGJYQFcJGYGHERtrYJBBcjiWjoI1FIRBMdKDC4gAGcWLTYsmjSM/fKq215bR+Pin/Spe+/7/vvv//uviNYXEUNPhcReUBwgeEkIpeYMnMIhDAYIWYO7Mx2hKxAUtZN9T6nWqh0E7gHRE4rgGAOM2gkqnmGsu3PSOxw+1pA9ASgY5YI92zidTDfiWgdU2b2psRqY2CEgG57hKlWzBg0834PscMd8IPgMcw7W06iuKgQrz9uYuXrD5tnYX8k6O1INk4hTvd0cuAims+XJ/bXdr6yTc6MoajmGTTAEsTxmCovjQ8lRQX49qItxcNnU1/QN/bZpteSArFWI+Zx4nqf03GEFtMf0s+ZGykkQirk9hevR4Le42KvE6vuwCARBtIB2xuqMHq3Vv9b4tt0fwbbO7/t8+p5H79yndjh9odBVGKGKDHuv+6CxDcvizkc0bylpF7y1RMr7zKB1p0uQ/81F5p6g3nhFZBYLHaWcuXsvyBm4Cmp7sAcES4cpsfMmBfiEBHOZCMevnkOdV3TebtqaSzkaAxwNkS56jePGlF+efLALzqlclklnv6wiasP5vLmtaWrllddohZiXFvFaJYCIjkvub+xFcXtxwt4v7xlelBmLFl+XG1DbzF2rw7FRQWY0NZ08IWVv8DSTIZvnUsQhaO/UHHleSbi+X2nk8S8vaEalWVqAnRidhU1VUch5Mkr07vQ00kkjaIoi5mCV3OiFO3u6pzNQSqcdDNjSYnNVO30ApKrZEqXqihTLbVDIe9qPaWHoW/sk3kWMG9HNK/TcpNYXvuO5t7ggVMqpUnE26Ii6rAy+crT2+LD8SXI7wBrIxL06BruPwuBXRfS+/KhSB/j+szEnhQPqVy2xR4jENE83pSSaRavTIrETmzTRZ6BkUPQKyPpD24f5BvgWM++BH0yuO59fIQxlUZ7DsK8vTvCJKSs2WGzz05JFvrQpiheMGRYcxo9XAo+gDAIIY7F/FaHtj9Q9mlGLYa+lgAAAABJRU5ErkJggg==">
                    </button><br>@endif
              </div>

                                        </form>
            </div>

          </div>
        </div>
      </div>
                            </div>
                        </div>
                    </li>
                    </ul>
                  </div>



                  <div class="col l12 s12">


                  <!-- Thumbs Up icon by Icons8 -->
                {{-- <a class='dropdown-button ' href='#' data-activates='dropdownLikes'>
                  <img class="icon icons8-Thumbs-Up" width="30" height="30" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAB8klEQVRIS+2WTU7bQBTH/29aJCQcNZwAOEHTG7gLEnaFCzD2CaAnINwgPYE9vUDbXewscG8AJwBuALIjBSHmoZHiKPFHHEPcbDpbv5nf+79PEzZ0aENcvAu8feTtTyZ4QOQ+1BXwZvDOodcRRFcgajM4Sp74pI4DbwLPQ8H8CKJPzLhMQtlfVXlt8CIUioX2icUVM/4mobQbAWehcSidncOfjhDsMfAjCeT52sHF0Lk8k/6aDN1oreAiqAG0usoHQWrQ93FwOlgVauxyOTYt8lELOf8Igc9N9YKhTHjTb62eugOwx8wDgHItxcDdOJSqyKEc2DrybFMsOeMM1Di4xeK2WiX7ceC4WbtyME8rVgvHhJOzObS9trWNzjIwsfBNRLTWX8Yj93oxipmbqeK0L62u6hPhIgeuljqrgaK7pYrXAba66poIn+MnvZudao2CWz3FAO7jQO6vnOP3Kp6lDPiTBPL434GntVHW442F2uqp3wR8KyvKxsDpcIkDWbiIGgGnw4UZN0koC3u9EXCr6x2DxK9lG6sRsNVTAwLOtCZ3PDo10yt3ysHgCEwRiG0C2QD7zGSWQsXhNgGOWSrPpA8mQ7fwzupLooqX+b5M7bK1OFt9NXkwUXn58BKVKU3fq/3PVdeRMvv/4HVFsvKdjYX6FauZgi58jZneAAAAAElFTkSuQmCC">
                </a> --}}
                {{-- dropdown for likes --}}
                {{-- <div class="right">
                  <ul id='dropdownLikes' class='dropdown-content'>
                    <li class="rigth"><a href="#!">one</a></li>
                    <li><a href="#!">two</a></li>
                  </ul>
                </div> --}}
</div>

                {{-- ///////////////////////////// --}}
                    <!-- Merge Git Filled icon by Icons8 -->


                {{-- ///////////////////////////// --}}
                    <!-- Share icon by Icons8 -->

                    <div class="row center-align">
                      <div class="col l12 s12">
                    <ul class="collapsible popout" data-collapsible="accordion">
                      <li>
                      <div class="collapsible-header">
                        <img class="icon icons8-Share tooltipped" data-position="bottom" data-delay="50" data-tooltip="Share your Goal" width="30" height="30" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAACLElEQVRIS8VW21HbUBDdc/OYzOBMTAWhg5AKUD5I+As0YEsVYFeAqAC5AuE0gD9B/ohcQZwKQjqwR/JM8Di7zJVlImskhIUc6Vdz79lz7tmzC6rpQ024tBXgxpFrEKsDEvjhsDXKIlcp8Jsjd+8l4wrA/gpMRMYLJSd/rq3bZAGVAjc+932ADtIMhcQPb8xPWwHWbF+J+pXnmeCOd8m3Jqv/lTHW7wpR3/OAmfnjbGiNKwVegsIlwl4msMg08MxmZVLHZroAcPxYWzKhO7tpOc8HNtxm47U6Bch+uExkylA2MU0A6QD0QYRGIHYCzxqkC9v4jXcOv5lK8dmarEL9YM6dpHmKgikTeCmhahPEICHdh70Xf6kJhQsQjH89SiMR7iRNUwSYa67IKIwrAtbMkLrwNzPs2bB1+VSgQqnffunrhHmfd6EInYdzdjaRtTAydw7dfaXUj1wWwidZRinDeu2NawPWlT9Bajucc69SqTVwbK4BAe/yJZRbFtgzr90vI7M+81g7mURkEGi8ADtRO0E5yemjp46wdCtppyIGywARnVgJ58tlcCfdTeTfOLmiwpaRqWPxLBGZEwZsYkwBPtXLgFYEIr1KIjOpSJRwohwQff0/QyKFEs9inWLZwSMyCTxz9/nTKYNeLYuArqO21SfKgLxlT2gUeu2HqZbbx0Utlfc/HqcDvQQkRufPheLjra63K7B4oTdIsR9eW37hdCrLtMy5cgFSBil15h5m8AMuCihNVgAAAABJRU5ErkJggg==">
                      </div>
                      <div class="collapsible-body" >
                        <div class="row">
                        <div class="col s12 l6 m6">
                        <div class="card blue-grey darken-1 alignedCard" >
                          <div class="card-content white-text">
                              <span class="card-title">People you shared</span>
                        @if ($shared->isEmpty())
                          <span class="witch-text darken-4">There are no shares yet</span>
                        @endif
                        @foreach ($shared as $shares)
                            <div class=" col s12 chip">
                            <img src="{{asset('uploads/avatars/'.$shares->avatar)}}" alt="Contact Person"/>
                            <a href="{{url('/search/'.$shares->id)}}">
                            {{$shares->fname}}&nbsp;{{$shares->lname}}
                            </a>
                          </div>
                          <br>
                        @endforeach
                        </div>
                        <br><br>

                </div>
              </div>
                          <div class="col s12 m6 l6">
                            <div class="card blue-grey darken-1">
                              <div class="card-content white-text">


                                <div>
                          <form class="inline" action="{{route('share')}}" method="post">
                            {{ csrf_field()}}
                            <input type="hidden" name="goalid" value="{{$goals->goalid}}">
                            <div class="input-field ">

                              @if ($goals->goalauthorization!='aligned')
                                      <input id="email" name="email" type="text" class="validate">
                                      <label  class="white-text" for="email">email</label>

                                      <button type="submit"  class="btn btn-floating tooltipped" data-position="bottom" data-delay="50" data-tooltip="Share your Goal" name="button"><i class="material-icons">share</i></button>
                                    @endif
                            </div>

                          </form>
                          <br>
                        </div>
                      </div>
                    </div>
                        </div>
                      </div>

                  </div>
                </li>
                </ul>
                  </div>
                  </div>

                  <script type="text/javascript">

                  </script>
                  {{-- dropdown for likes --}}

                  {{-- ///////////////////////////// --}}
                  </div>
              </div>
                <div class="row">
                  <div class="col l6 center-align">
                    <div class="chip">
                      @php
                        $edt= Carbon\Carbon::createFromFormat('Y-m-d', $goals->goalenddate)->toFormattedDateString();
                        $std= Carbon\Carbon::createFromFormat('Y-m-d', $goals->goalstartdate)->toFormattedDateString();
                      @endphp
                      Started On:{{$std}}
                    </div>
                  </div>
                  <div class="col l6 center-align">
                    <div class="chip">
                      Ending On:{{$edt}}
                    </div>
                  </div>

                </div>
              <div class="row">
                <div class="col s12">
                  <ul class="tabs">
                    <li class="tab col s3"><a class="active" href="#test1">Overview</a></li>
                    <li class="tab col s3"><a href="#test2">Task</a></li>
                    <li class="tab col s3 "><a href="#test3">Skills</a></li>
                    <li class="tab col s3"><a href="#test4">Privacy</a></li>
                  </ul>
                </div>
                <div id="test1" class="col s12">

                    <ul class="collection">
                      <li class="collection-item row">
                        <div class="col l6">
                          <b>Intent</b>
                        </div>
                        <div class="col l6 s12">
                          <form name="intentfrm" action="{{route('goal')}}" method="post" id="intentfrm" style="display:inline;">
                            {{ csrf_field() }}
                            <div class="preloader-wrapper small active" id="intentpreloader" style="display:none;">
                            <div class="spinner-layer spinner-blue-only">
                                  <div class="circle-clipper left">
                                    <div class="circle"></div>
                                  </div><div class="gap-patch">
                                    <div class="circle"></div>
                                  </div><div class="circle-clipper right">
                                    <div class="circle"></div>
                                  </div>
                                </div>
                              </div>
                            <div class="row" id="intentrow">
                            <div class="col s10">
                              <div class="col s12" id="resultintent">
                                <span id="result">{{$goals->goalintent}}</span>
                              </div>
                            <div class="input-field col s12" id="intent" style="display:none;">
                              <input name="goalintent" placeholder="{{$goals->goalintent}}" type="text" required>
                              <input type="text" style="display:none;" value="{{$goals->goalid}}" name="goalid">
                              <input type="text" style="display:none;" value="updategoal" name="action">
                              <input type="text" style="display:none;" value="goalintent" name="attribute">
                              <label id="intentfield" for="goalintent" ></label>
                            </div>
                          </div>
                            <div class="col s2 right">
                              @if ($goals->goalauthorization!='aligned')
                                  <button  class="btn-floating tooltipped" data-position="bottom" data-delay="50" data-tooltip="Done "style="display:none;" type="submit" id="editintent"><i class="material-icons">done</i></button>
                                  <button  class="btn-floating tooltipped" data-position="bottom" data-delay="50" data-tooltip="Edit"id="intentbtn" ><i class="material-icons ">mode_edit</i></button>
                              @endif
                            </div>
                          </div>
                          </form>
                          <script type="text/javascript">
                              var intentbtn=document.getElementById('intentbtn');
                              var editintent=document.getElementById('editintent');
                              var intent=document.getElementById('intent');
                              var intentfield=document.getElementById('intentfield');

                              intentbtn.addEventListener("click", function(event) {
                              event.preventDefault();
                              intentbtn.style.display='none';
                              document.getElementById('resultintent').style.display='none';
                              intent.style.display='inline';
                              editintent.style.display='inline';

                            });

                              editintent.addEventListener("click",function(event){
                                event.preventDefault();
                                document.getElementById("intentpreloader").style.display='block';
                                document.getElementById("intentrow").style.display='none';
                                editintentpost();
                              });

                              function editintentpost(){
                               var form = document.getElementById("intentfrm");
                               var action = form.getAttribute("action");
                               var result_div = document.getElementById("result");
                               var form_data = new FormData(form);

                               var xhr = new XMLHttpRequest();
                               xhr.open('POST', action, true);
                               xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                               xhr.send(form_data);
                               xhr.onreadystatechange = function () {
                                 if(xhr.readyState == 4 && xhr.status == 200) {
                                    var result = xhr.responseText;
                                    console.log('Result: ' + result);
                                    document.getElementById("intentrow").style.display='block';
                                    // var json = JSON.parse(result);
                                    // if(json.hasOwnProperty('errors') && json.errors.length > 0) {
                                    //   displayErrors(json.errors);
                                    // } else {
                                      // postResult(json.intent);
                                    // }
                                    if(result!=''){
                                    document.getElementById("intentpreloader").style.display='none';
                                    editintent.style.display='none';
                                    intent.style.display='none';
                                    document.getElementById("resultintent").style.display='inline';
                                    result_div.innerHTML = result;
                                    intentbtn.style.display='inline';

                                 }
                                   else {
                                     document.getElementById("intentpreloader").style.display='none';
                                     document.getElementById("intentfield").innerHTML='You cannot leave this empty';
                                     document.getElementById("intentfield").style.color='red';
                                   }
                                 }
                               };
                             }
                          </script>
                        </div>
                      </li>
                      <li class="collection-item row">
                        <div class="col l6">
                          <b>Category</b>
                        </div>
                        <div class="col l6 s12">
                             <form  name="categoryfrm" action="{{route('goal')}}" method="post" id="categoryfrm" style="display:inline;">
                                {{ csrf_field() }}
                                <div class="preloader-wrapper small active" id="categorypreloader" style="display:none;">
                                <div class="spinner-layer spinner-blue-only">
                                      <div class="circle-clipper left">
                                        <div class="circle"></div>
                                      </div><div class="gap-patch">
                                        <div class="circle"></div>
                                      </div><div class="circle-clipper right">
                                        <div class="circle"></div>
                                      </div>
                                    </div>
                                  </div>
                                <div class="row" id="categoryrow">
                                <div class="col s10">
                                  <div class="col s12" id="resultcategory">
                                    <span id="categoryresult">{{$goals->goalcategory}}</span>
                                  </div>
                                <div class="input-field col s12" id="category" style="display:none;">
                                      <select name="goalcategory" id="goalcategory">
                                        <option value="non specified" disabled selected>select goal category</option>
                                                                               <option value="business">business</option>
                                                                               <option value="education">education</option>
                                                                               <option value="Health and fitness">Health and fitness</option>
                                                                               <option value="Get Educated and professional memberships">Get Educated and professional memberships</option>
                                                                               <option value=" Financial stability and Gains"> Financial stability and Gains</option>
                                                                               <option value="Construct my first house">Construct my first house</option>
                                                                               <option value="Buy a car">Buy a car</option>
                                                                               <option value=" Find a partner"> Find a partner</option>
                                                                               <option value="Travel around and see the world">Travel around and see the world</option>
                                                                               <option value="Skill up as a professional">Skill up as a professional</option>
                                                                               <option value="Sports and Aquatics">Sports and Aquatics</option>
                                                                               <option value="Ignite a concept">Ignite a concept</option>
                                      </select>
                                      <label id="categoryfield" for="goalcategory"></label>
                                  <input type="text" style="display:none;" value="{{$goals->goalid}}" name="goalid">
                                  <input type="text" style="display:none;" value="updategoal" name="action">
                                  <input type="text" style="display:none;" value="goalcategory" name="attribute">
                                </div>
                              </div>
                                <div class="col s2 right">
                                  @if ($goals->goalauthorization!='aligned')
                                    <button  class="btn-floating tooltipped" data-position="bottom" data-delay="50" data-tooltip="done"style="display:none;" type="submit" id="editcategory"><i class="material-icons">done</i></button>
                                    <button  class="btn-floating tooltipped" data-position="bottom" data-delay="50" data-tooltip="Edit" id="categorybtn" ><i class="material-icons ">mode_edit</i></button>
                                  @endif
                                </div>
                              </div>
                              </form>
                              <script type="text/javascript">
                                  var categorybtn=document.getElementById('categorybtn');
                                  var editcategory=document.getElementById('editcategory');
                                  var category=document.getElementById('category');
                                  var categoryfield=document.getElementById('categoryfield');

                                  categorybtn.addEventListener("click", function(event) {
                                  event.preventDefault();
                                  categorybtn.style.display='none';
                                  document.getElementById('resultcategory').style.display='none';
                                  document.getElementById('goalcategory').style.display='inline';
                                  category.style.display='inline';
                                  editcategory.style.display='inline';

                                });

                                  editcategory.addEventListener("click",function(event){
                                    event.preventDefault();
                                    document.getElementById("categorypreloader").style.display='block';
                                    document.getElementById("categoryrow").style.display='none';
                                    editcategorypost();
                                  });

                                  function editcategorypost(){
                                   var form = document.getElementById("categoryfrm");
                                   var action = form.getAttribute("action");
                                   var result_div = document.getElementById("categoryresult");
                                   var form_data = new FormData(form);

                                   var xhr = new XMLHttpRequest();
                                   xhr.open('POST', action, true);
                                   xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                                   xhr.send(form_data);
                                   xhr.onreadystatechange = function () {
                                     if(xhr.readyState == 4 && xhr.status == 200) {
                                        var result = xhr.responseText;
                                        console.log('Result: ' + result);
                                        document.getElementById("categoryrow").style.display='block';
                                        if(result!=''){
                                        document.getElementById("categorypreloader").style.display='none';
                                        editcategory.style.display='none';
                                        category.style.display='none';
                                        result_div.innerHTML = result;
                                        document.getElementById("resultcategory").style.display='inline';
                                        categorybtn.style.display='inline';

                                     }
                                       else {
                                         document.getElementById("categorypreloader").style.display='none';
                                         document.getElementById("categoryfield").innerHTML='You cannot leave this empty';
                                         document.getElementById("categoryfield").style.color='red';
                                       }
                                     }
                                   };
                                 }
                              </script>


                        </div>
                      </li>
                      <li class="collection-item row">
                        <div class="col l6">
                          <b>Priority</b>
                        </div>
                        <div class="col l6 s12">
                             <form name="priorityfrm" action="{{route('goal')}}" method="post" id="priorityfrm" style="display:inline;">
                                {{ csrf_field() }}
                                <div class="preloader-wrapper small active" id="prioritypreloader" style="display:none;">
                                <div class="spinner-layer spinner-blue-only">
                                      <div class="circle-clipper left">
                                        <div class="circle"></div>
                                      </div><div class="gap-patch">
                                        <div class="circle"></div>
                                      </div><div class="circle-clipper right">
                                        <div class="circle"></div>
                                      </div>
                                    </div>
                                  </div>
                                <div class="row" id="priorityrow">
                                <div class="col s10">
                                  <div class="col s12" id="resultpriority">
                                    <span id="priorityresult">{{$goals->goalpriority}}</span>
                                  </div>
                                <div class="input-field col s12" id="priority" style="display:none;">
                                      <select name="goalpriority" id="goalpriority">
                                        <option value="high"  selected>high</option>
                                        <option value="medium">medium</option>
                                        <option value="low">low</option>
                                      </select>
                                      <label id="priorityfield" for="goalpriority"></label>
                                  <input type="text" style="display:none;" value="{{$goals->goalid}}" name="goalid">
                                  <input type="text" style="display:none;" value="updategoal" name="action">
                                  <input type="text" style="display:none;" value="goalpriority" name="attribute">
                                </div>
                              </div>
                                <div class="col s2 right">
                                @if ($goals->goalauthorization!='aligned')
                                    <button  class="btn-floating tooltipped" data-position="bottom" data-delay="50" data-tooltip="done" style="display:none;" type="submit" id="editpriority"><i class="material-icons">done</i></button>
                                    <button  class="btn-floating  tooltipped" data-position="bottom" data-delay="50" data-tooltip="Edit" id="prioritybtn" ><i class="material-icons ">mode_edit</i></button>
                                  @endif
                                </div>
                              </div>
                              </form>
                              <script type="text/javascript">
                                  var prioritybtn=document.getElementById('prioritybtn');
                                  var editpriority=document.getElementById('editpriority');
                                  var priority=document.getElementById('priority');
                                  var priorityfield=document.getElementById('priorityfield');

                                  prioritybtn.addEventListener("click", function(event) {
                                  event.preventDefault();
                                  prioritybtn.style.display='none';
                                  document.getElementById('resultpriority').style.display='none';
                                  document.getElementById('goalpriority').style.display='inline';
                                  priority.style.display='inline';
                                  editpriority.style.display='inline';

                                });

                                  editpriority.addEventListener("click",function(event){
                                    event.preventDefault();
                                    document.getElementById("prioritypreloader").style.display='block';
                                    document.getElementById("priorityrow").style.display='none';
                                    editprioritypost();
                                  });

                                  function editprioritypost(){
                                   var form = document.getElementById("priorityfrm");
                                   var action = form.getAttribute("action");
                                   var result_div = document.getElementById("priorityresult");
                                   var form_data = new FormData(form);

                                   var xhr = new XMLHttpRequest();
                                   xhr.open('POST', action, true);
                                   xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                                   xhr.send(form_data);
                                   xhr.onreadystatechange = function () {
                                     if(xhr.readyState == 4 && xhr.status == 200) {
                                        var result = xhr.responseText;
                                        console.log('Result: ' + result);
                                        document.getElementById("priorityrow").style.display='block';
                                        if(result!=''){
                                        document.getElementById("prioritypreloader").style.display='none';
                                        editpriority.style.display='none';
                                        priority.style.display='none';
                                        result_div.innerHTML = result;
                                        document.getElementById("resultpriority").style.display='inline';
                                        prioritybtn.style.display='inline';

                                     }
                                       else {
                                         document.getElementById("prioritypreloader").style.display='none';
                                         document.getElementById("priorityfield").innerHTML='You cannot leave this empty';
                                         document.getElementById("priorityfield").style.color='red';
                                       }
                                     }
                                   };
                                 }
                              </script>


                        </div>
                      </li>
                      <li class="collection-item row">
                        <div class="col l6">
                          <b>Start Date</b>
                        </div>
                        <div class="col l6 s12">
                             <form  name="startdatefrm" action="{{route('goal')}}" method="post" id="startdatefrm" style="display:inline;">
                                {{ csrf_field() }}
                                <div class="preloader-wrapper small active" id="startdatepreloader" style="display:none;">
                                <div class="spinner-layer spinner-blue-only">
                                      <div class="circle-clipper left">
                                        <div class="circle"></div>
                                      </div><div class="gap-patch">
                                        <div class="circle"></div>
                                      </div><div class="circle-clipper right">
                                        <div class="circle"></div>
                                      </div>
                                    </div>
                                  </div>
                                <div class="row" id="startdaterow">
                                <div class="col s10">
                                  <div class="col s12" id="resultstartdate">
                                    <span id="startdateresult">{{$goals->goalstartdate}}</span>
                                  </div>
                                <div class="input-field col s12" id="startdate" style="display:none;">
                                      <input type="date"name="goalstartdate" id="goalstartdate" required>
                                      <label id="startdatefield" for="goalstartdate"></label>
                                  <input type="text" style="display:none;" value="{{$goals->goalid}}" name="goalid">
                                  <input type="text" style="display:none;" value="updategoal" name="action">
                                  <input type="text" style="display:none;" value="goalstartdate" name="attribute">
                                </div>
                              </div>
                                <div class="col s2 right">
                                  @if ($goals->goalauthorization!='aligned')

                                    <button  class="btn-floating tooltipped" data-position="bottom" data-delay="50" data-tooltip="done" style="display:none;" type="submit" id="editstartdate"><i class="material-icons">done</i></button>
                                    <button  class="btn-floating tooltipped" data-position="bottom" data-delay="50" data-tooltip="Edit" id="startdatebtn" ><i class="material-icons ">mode_edit</i></button>

                                  @endif
                                </div>
                              </div>
                              </form>
                              <script type="text/javascript">
                                  var startdatebtn=document.getElementById('startdatebtn');
                                  var editstartdate=document.getElementById('editstartdate');
                                  var startdate=document.getElementById('startdate');
                                  var startdatefield=document.getElementById('startdatefield');

                                  startdatebtn.addEventListener("click", function(event) {
                                  event.preventDefault();
                                  startdatebtn.style.display='none';
                                  document.getElementById('resultstartdate').style.display='none';
                                  document.getElementById('goalstartdate').style.display='inline';
                                  startdate.style.display='inline';
                                  editstartdate.style.display='inline';

                                });

                                  editstartdate.addEventListener("click",function(event){
                                    event.preventDefault();
                                    document.getElementById("startdatepreloader").style.display='block';
                                    document.getElementById("startdaterow").style.display='none';
                                    editstartdatepost();
                                  });

                                  function editstartdatepost(){
                                   var form = document.getElementById("startdatefrm");
                                   var action = form.getAttribute("action");
                                   var result_div = document.getElementById("startdateresult");
                                   var form_data = new FormData(form);

                                   var xhr = new XMLHttpRequest();
                                   xhr.open('POST', action, true);
                                   xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                                   xhr.send(form_data);
                                   xhr.onreadystatechange = function () {
                                     if(xhr.readyState == 4 && xhr.status == 200) {
                                        var result = xhr.responseText;
                                        console.log('Result: ' + result);
                                        document.getElementById("startdaterow").style.display='block';
                                        if(result!=''){
                                        document.getElementById("startdatepreloader").style.display='none';
                                        editstartdate.style.display='none';
                                        startdate.style.display='none';
                                        result_div.innerHTML = result;
                                        document.getElementById("resultstartdate").style.display='inline';
                                        startdatebtn.style.display='inline';

                                     }
                                       else {
                                         document.getElementById("startdatepreloader").style.display='none';
                                         document.getElementById("startdatefield").innerHTML='You cannot leave this empty';
                                         document.getElementById("startdatefield").style.color='red';
                                       }
                                     }
                                   };
                                 }
                              </script>


                        </div>
                      </li>
                      <li class="collection-item row">
                        <div class="col l6">
                          <b>End Date</b>
                        </div>
                        <div class="col l6 s12">
                             <form  name="enddatefrm" action="{{route('goal')}}" method="post" id="enddatefrm" style="display:inline;">
                                {{ csrf_field() }}
                                <div class="preloader-wrapper small active" id="enddatepreloader" style="display:none;">
                                <div class="spinner-layer spinner-blue-only">
                                      <div class="circle-clipper left">
                                        <div class="circle"></div>
                                      </div><div class="gap-patch">
                                        <div class="circle"></div>
                                      </div><div class="circle-clipper right">
                                        <div class="circle"></div>
                                      </div>
                                    </div>
                                  </div>
                                <div class="row" id="enddaterow">
                                <div class="col s10">
                                  <div class="col s12" id="resultenddate">
                                    <span id="enddateresult">{{$goals->goalenddate}}</span>
                                  </div>
                                <div class="input-field col s12" id="enddate" style="display:none;">
                                      <input type="date"name="goalenddate" id="goalenddate" required>
                                      <label id="enddatefield" for="goalenddate"></label>
                                  <input type="text" style="display:none;" value="{{$goals->goalid}}" name="goalid">
                                  <input type="text" style="display:none;" value="updategoal" name="action">
                                  <input type="text" style="display:none;" value="goalenddate" name="attribute">
                                </div>
                              </div>
                                <div class="col s2 right">
                                  @if ($goals->goalauthorization!='aligned')
                                    <button  class="btn-floating tooltipped" data-position="bottom" data-delay="50" data-tooltip="done" style="display:none;" type="submit" id="editenddate"><i class="material-icons">done</i></button>
                                    <button  class="btn-floating tooltipped" data-position="bottom" data-delay="50" data-tooltip="Edit" id="enddatebtn" ><i class="material-icons ">mode_edit</i></button>
                                  @endif
                                </div>
                              </div>
                              </form>
                              <script type="text/javascript">
                                  var enddatebtn=document.getElementById('enddatebtn');
                                  var editenddate=document.getElementById('editenddate');
                                  var enddate=document.getElementById('enddate');
                                  var enddatefield=document.getElementById('enddatefield');

                                  enddatebtn.addEventListener("click", function(event) {
                                  event.preventDefault();
                                  enddatebtn.style.display='none';
                                  document.getElementById('resultenddate').style.display='none';
                                  document.getElementById('goalenddate').style.display='inline';
                                  enddate.style.display='inline';
                                  editenddate.style.display='inline';

                                });

                                  editenddate.addEventListener("click",function(event){
                                    event.preventDefault();
                                    document.getElementById("enddatepreloader").style.display='block';
                                    document.getElementById("enddaterow").style.display='none';
                                    editenddatepost();
                                  });

                                  function editenddatepost(){
                                   var form = document.getElementById("enddatefrm");
                                   var action = form.getAttribute("action");
                                   var result_div = document.getElementById("enddateresult");
                                   var form_data = new FormData(form);

                                   var xhr = new XMLHttpRequest();
                                   xhr.open('POST', action, true);
                                   xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                                   xhr.send(form_data);
                                   xhr.onreadystatechange = function () {
                                     if(xhr.readyState == 4 && xhr.status == 200) {
                                        var result = xhr.responseText;
                                        console.log('Result: ' + result);
                                        document.getElementById("enddaterow").style.display='block';
                                        if(result!=''){
                                        document.getElementById("enddatepreloader").style.display='none';
                                        editenddate.style.display='none';
                                        enddate.style.display='none';
                                        result_div.innerHTML = result;
                                        document.getElementById("resultenddate").style.display='inline';
                                        enddatebtn.style.display='inline';

                                     }
                                       else {
                                         document.getElementById("enddatepreloader").style.display='none';
                                         document.getElementById("enddatefield").innerHTML='You cannot leave this empty';
                                         document.getElementById("startdatefield").style.color='red';
                                       }
                                     }
                                   };
                                 }
                              </script>


                        </div>
                      </li>
                    </ul>

                </div>
                {{-- taskssssssssssssssssssssssss --}}
                <div id="test2" class="col s12">
                  @if ($task->isEmpty())
                    <div id="notask" class="row">
                      <div class="col s12 m12">
                        <div class="card blue-grey darken-1">
                          <div class="card-content white-text">
                            <span class="card-title">No Tasks are added yet</span>
                            <p>start working on your goal by adding tasks click the button below to add a new task</p>
                          </div>
                          <div class="card-action">
                            @if ($goals->goalauthorization!='aligned')
                              <a  class="waves-effect waves-light btn-large " href="#addtaskmodal">Add a Task</a>
                            @else
                              <a class="waves-effect waves-light btn-large disabled" href="#">Ask creator to add tasks</a>
                            @endif

                          </div>
                        </div>
                      </div>
                    </div>
                    <script>
                    $(document).ready(function(){
                        // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
                        $('.modal').modal();
                      });

                    </script>
                  @else
                  <ul class="collapsible" data-collapsible="expandable">
                    @php
                      $taskcount=1;
                    @endphp
                    @foreach ($task as $tasks)
                                          <li>
                                            <div class="collapsible-header">
                                              <div class="row">
                                              <div class="col s10">
                                              <b>{{$taskcount}}.&nbsp;&nbsp;{{$tasks->taskname}}</b>
                                            </div>
                                            <div class="col s2">
                                              @if ($goals->goalauthorization!='aligned')
                                              <form class="" action="{{route('deletetask')}}" method="post">
                                                {{csrf_field()}}
                                                <button type="submit" style="border:none;background-color:inherit;">
                                                  <input type="hidden" name="taskid" value="{{$tasks->id}}">
                                                  <input type="hidden" name="goalid" value="{{$tasks->goalid}}">
                                                  <i class="material-icons tooltipped" data-position="right" data-delay="50" data-tooltip="delete task">delete</i></button>
                                              </form>
                                            @endif
                                            </div>
                                          </div>
                                          </div>
                                            @php
                                              $taskcount=$taskcount+1;
                                            @endphp

                                            <div class="collapsible-body blue-text text-darken-4">

                                              <div>
                                                <form name="task{{$tasks->id}}frm" id="task{{$tasks->id}}frm" action="{{route('updatetask')}}" method="post">
                                                   <!-- id="taskintentfrm","taskpriorityfrm" style="display:inline;" -->
                                              <div class="row">
                                                  <div class="col s6 center-align">
                                                    <b>Intent :</b>
                                                  </div>
                                                  <div class="col s6 center-align">

                                                      <li id="taskintentfrm" style="display:inline;">
                                                      {{ csrf_field() }}
                                                      <div class="preloader-wrapper small active" id="taskintentpreloader" style="display:none;">
                                                      <div class="spinner-layer spinner-blue-only">
                                                            <div class="circle-clipper left">
                                                              <div class="circle"></div>
                                                            </div><div class="gap-patch">
                                                              <div class="circle"></div>
                                                            </div><div class="circle-clipper right">
                                                              <div class="circle"></div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      <div class="row" id="taskintentrow">
                                                      <div class="col s10">
                                                        <div class="col s12" id="resulttaskintent">
                                                          <span id="result">{{$tasks->taskintent}}</span>
                                                        </div>
                                                      <div class="input-field col s12" id="tskintent" style="display:none;">
                                                        <input name="taskintent" value="{{$tasks->taskintent}}" type="text" required>
                                                        <input name="id" type="hidden" value="{{$tasks->id}}">
                                                        <input type="text" style="display:none;" value="{{$tasks->id}}" name="id">
                                                        <input type="text" style="display:none;" value="updatetask" name="action">
                                                        <input type="text" style="display:none;" value="tskintent" name="attribute">
                                                        <label id="taskintentfield" for="tskintent" ></label>
                                                      </div>
                                                    </div>

                                                    </div>


                                                  </li>
                                                  </div>
                                                </div>
                                                <div class="divider"></div>
                                                <div class="row">
                                                    <div class="col s6 center-align">
                                                      <b>Priority :</b>
                                                    </div>
                                                    <div class="col s6 center-align">

                                                      <li id="taskpriorityfrm" style="display:inline;">
                                                         {{ csrf_field() }}
                                                         <div class="preloader-wrapper small active" id="taskprioritypreloader" style="display:none;">
                                                         <div class="spinner-layer spinner-blue-only">
                                                               <div class="circle-clipper left">
                                                                 <div class="circle"></div>
                                                               </div><div class="gap-patch">
                                                                 <div class="circle"></div>
                                                               </div><div class="circle-clipper right">
                                                                 <div class="circle"></div>
                                                               </div>
                                                             </div>
                                                           </div>
                                                         <div class="row" id="taskpriorityrow">
                                                         <div class="col s10">
                                                           <div class="col s12" id="resulttaskpriority">
                                                             <span id="taskpriorityresult">{{$tasks->taskpriority}}</span>
                                                           </div>
                                                         <div class="input-field col s12" id="tskpriority" style="display:none;">
                                                               <select name="taskpriority" id="taskpriority">
                                                                 <option value="{{$tasks->taskpriority}}" selected>{{$tasks->taskpriority}}</option>
                                                                 <option value="high">high</option>
                                                                 <option value="medium">medium</option>
                                                                 <option value="low">low</option>
                                                               </select>
                                                               <label id="taskpriorityfield" for="taskpriority"></label>
                                                          <input type="hidden" style="display:none;" value="{{$goals->goalid}}" name="goalid">
                                                           <input type="text" style="display:none;" value="{{$tasks->id}}" name="id">
                                                           <input type="text" style="display:none;" value="updatetask" name="action">
                                                           <input type="text" style="display:none;" value="taskpriority" name="attribute">
                                                         </div>
                                                       </div>

                                                       </div>
                                                     </li>
                                                     </div>
                                                   </div>
                                                   <div class="divider"></div>
                                                   <div class="row">
                                                       <div class="col s6 center-align">
                                                         <b>Start Date :</b>
                                                       </div>
                                                       <div class="col s6 center-align">

                                                         <li id="taskstartdatefrm" style="display:inline;">
                                                            {{ csrf_field() }}
                                                            <div class="preloader-wrapper small active" id="taskstartdatepreloader" style="display:none;">
                                                            <div class="spinner-layer spinner-blue-only">
                                                                  <div class="circle-clipper left">
                                                                    <div class="circle"></div>
                                                                  </div><div class="gap-patch">
                                                                    <div class="circle"></div>
                                                                  </div><div class="circle-clipper right">
                                                                    <div class="circle"></div>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            <div class="row" id="taskstartdaterow">
                                                            <div class="col s10">
                                                              <div class="col s12" id="resulttaskstartdate">
                                                                <span id="taskstartdateresult">{{Carbon\Carbon::createFromFormat('Y-m-d', $tasks->taskstartdate)->toFormattedDateString()}}</span>
                                                              </div>
                                                            <div class="input-field col s12" id="tskstartdate" style="display:none;">
                                                                  <input type="date" name="taskstartdate" id="taskstartdate"  value="{{$tasks->taskstartdate}}"required>
                                                                  <label id="taskstartdatefield" for="taskstartdate"></label>
                                                              <input type="text" style="display:none;" value="{{$tasks->id}}" name="id">
                                                              <input type="text" style="display:none;" value="updatetask" name="action">
                                                              <input type="text" style="display:none;" value="taskstartdate" name="attribute">
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </li>
                                                          </div>
                                                        </div>
                                                        <div class="divider"></div>
                                                        <div class="row">
                                                          <div class="col s6 center-align">
                                                            <b>End Date :</b>
                                                          </div>
                                                          <div class="col s6 center-align">

                                                            <li id="taskenddatefrm" style="display:inline;">
                                                               {{ csrf_field() }}
                                                               <div class="preloader-wrapper small active" id="taskenddatepreloader" style="display:none;">
                                                               <div class="spinner-layer spinner-blue-only">
                                                                     <div class="circle-clipper left">
                                                                       <div class="circle"></div>
                                                                     </div><div class="gap-patch">
                                                                       <div class="circle"></div>
                                                                     </div><div class="circle-clipper right">
                                                                       <div class="circle"></div>
                                                                     </div>
                                                                   </div>
                                                                 </div>
                                                               <div class="row" id="taskenddaterow">
                                                               <div class="col s10">
                                                                 <div class="col s12" id="resulttaskenddate">
                                                                   <span id="taskenddateresult">{{Carbon\Carbon::createFromFormat('Y-m-d', $tasks->taskenddate)->toFormattedDateString()}}</span>
                                                                 </div>
                                                               <div class="input-field col s12" id="tskenddate" style="display:none;">
                                                                     <input type="date"name="taskenddate" id="taskenddate" value="{{$tasks->taskenddate}}"required>
                                                                     <label id="taskenddatefield" for="taskenddate"></label>
                                                                 <input type="text" style="display:none;" value="{{$tasks->id}}" name="id">
                                                                 <input type="text" style="display:none;" value="updatetask" name="action">
                                                                 <input type="text" style="display:none;" value="taskenddate" name="attribute">
                                                               </div>
                                                             </div>

                                                             </div>
                                                           </li>
                                                           </div>
                                                         </div>

                                                <div class="col s2 right">
                                                  @if ($goals->goalauthorization!='aligned')
                                                      {{-- <button  class="btn-floating tooltipped" data-position="bottom" data-delay="50" data-tooltip="Done "style="display:none;" type="submit" id="edittask{{$tasks->id}}"><i class="material-icons">done</i></button>
                                                      <button type="submit"  class="btn-floating tooltipped" data-position="bottom" data-delay="50" data-tooltip="Edit"id="task{{$tasks->id}}" ><i class="material-icons ">mode_edit</i></button> --}}
                                                  @endif
                                                </div>
                                              </form>
                                              <script type="text/javascript">
                                              //
                                              //     var taskintentbtn=document.getElementById('task{{$tasks->id}}');
                                              //     var edittaskintent=document.getElementById('edittask{{$tasks->id}}');
                                              //     var taskupdateform=document.getElementById('task{{$tasks->id}}frm')
                                              //     var tskintent=document.getElementById('tskintent');
                                              //     var tskpriority=document.getElementById('tskpriority');
                                              //     var tskstartdate=document.getElementById('tskstartdate');
                                              //     var tskenddate=document.getElementById('tskenddate');
                                              //     var taskintentfield=document.getElementById('taskintentfield');
                                              //     var taskpriorityfield=document.getElementById('taskpriorityfield');
                                              //     var taskstartdatefield=document.getElementById('taskstartdatefield');
                                              //     var taskenddatefield=document.getElementById('taskenddatefield');
                                              //
                                              //
                                              //     taskintentbtn.addEventListener("click", function(event) {
                                              //     event.preventDefault();
                                              //     taskintentbtn.style.display='none';
                                              //     document.getElementById('resulttaskintent').style.display='none';
                                              //     document.getElementById('resulttaskpriority').style.display='none';
                                              //     document.getElementById('resulttaskstartdate').style.display='none';
                                              //     document.getElementById('resulttaskenddate').style.display='none';
                                              //     document.getElementById('taskpriority').style.display='inline';
                                              //     document.getElementById('taskstartdate').style.display='inline';
                                              //     document.getElementById('taskenddate').style.display='inline';
                                              //     tskintent.style.display='inline';
                                              //     tskenddate.style.display='inline';
                                              //     tskstartdate.style.display='inline';
                                              //     tskpriority.style.display='inline';
                                              //     edittaskintent.style.display='inline';
                                              //
                                              //   });
                                              //
                                              //   edittaskintent.addEventListener("click", function(event) {
                                              //   event.preventDefault();
                                              //   taskupdateform.submit();
                                              //
                                              //
                                              // });
                                              //
                                              //

                                              </script>
                                              </div>

                                            <div class="divider"></div>
                                            <div class=" section row">
                                              <form action="{{route('goal')}}" method="post" name="{{$taskcount.'form'}}" id="{{$taskcount.'form'}}">
                                               {{csrf_field()}}
                                               <input type="hidden" name="goalid" value="{{$goals->goalid}}">
                                               <input type="hidden" name="taskid" value="{{$tasks->id}}">
                                               <input type="hidden" name="action" value="updatecp">
                                                <div class="col s10">
                                                  <b>Completed Percetage</b>
                                                      <p class="range-field">
                                                        <input type="range" name="cpinput" value="{{$tasks->taskcompletedpercentage}}" id="cpinput" min="0" max="100" />
                                                      </p>
                                                </div>
                                                <div class="col s2"><br>
                                                  <button type="submit" id="{{$taskcount}}" class="waves-effect waves-light btn-floating tooltipped" data-position="bottom" data-delay="50" data-tooltip="Done "><i class="material-icons">done</i></button>
                                                </div>
                                              </form>
                                            </div>
                                          <div class="divider"></div>
                                            </div>
                                          </li>
                                          {{-- <script type="text/javascript">
                                          // for (var i = 1; i <={{$taskcount}}; i++) {
                                            var cpbtn=document.getElementById("{{$taskcount}}");
                                            cpbtn.addEventListener("click",function(event){
                                              event.preventDefault();
                                              setpercentage();
                                            });
                                            function setpercentage(){
                                             var form = document.getElementById("{{$taskcount.'form'}}");
                                             var action = form.getAttribute("action");
                                             var form_data = new FormData(form);


                                             var xhr = new XMLHttpRequest();
                                             xhr.open('POST', action, true);
                                             xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                                             xhr.send(form_data);
                                             xhr.onreadystatechange = function () {
                                               if(xhr.readyState == 4 && xhr.status == 200) {
                                                  var result = xhr.responseText;
                                                  console.log('Result: ' + result);
                                                  document.getElementById("goalpercentage").innerHTML=result;
                                               }
                                             };
                                           }

                                          // }

                                          </script> --}}
                                        @endforeach
                    @foreach ($privacy as $privacys)
                      <li class="right-align"><a style="margin:5px;" class="waves-effect waves-light btn-floating pulse  tooltipped" data-position="bottom" data-delay="50" data-tooltip="Divide your goal to Tasks" href="#addtaskmodal"><i class="material-icons">add</i></a></li>
                    @endforeach
                  </ul>
                @endif



                </div>
                {{-- skillllllllllllllllllllllllllllsssssssssssssssss --}}
                <div id="test3" class="col s12">
                  <p class="flow-text"><h5>Skills I have</h5></p>
                  @foreach ($userskill as $userskills)
                    <div class="chip">
                     {{$userskills->skill}}
                     {{-- <i class="close material-icons">close</i> --}}
                   </div>
                  @endforeach


                  <div class="section-spacer"></div>

                  <p class="flow-text"><h5>Skills to acquire:</h5></p>
                        @foreach ($goalskill as $goalskills)
                          <div class="chip">
                            {{$goalskills->skill}}
                            @if ($goals->goalauthorization!='aligned')
                              <i id="{{$goalskills->skill}}"class="close material-icons">close</i>
                            @endif
                           </div>
                           <form id="{{$goalskills->id}}" action="{{route('deletegoalskill')}}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{$goalskills->id}}">
                           </form>
                           <script type="text/javascript">
                             var deletealignedbtn=document.getElementById('{{$goalskills->skill}}');
                             deletealignedbtn.addEventListener("click",deletealignedfunction)
                             function deletealignedfunction() {
                             var form=document.getElementById('{{$goalskills->id}}');
                             var action = form.getAttribute("action");
                             var form_data = new FormData(form);
                             var xhr = new XMLHttpRequest();
                             xhr.open('POST', action, true);
                             xhr.send(form_data);
                             xhr.onreadystatechange = function () {
                               if(xhr.readyState == 4 && xhr.status == 200) {
                                  var result = xhr.responseText;
                                  console.log('Result: ' + result);
                               }
                             };
                           }
                           </script>
                        @endforeach
<br>
@if ($goals->goalauthorization!='aligned')
                      <form id="goalskillform"action="{{ route('goalskill')}}" method="post">
                         {{ csrf_field() }}
                         <input type="hidden" id="skillinput" name="goalskill" value="">
                         <input type="hidden" name="goalid" value="{{ $goals->goalid}}">
                        <div id="goalskill" class="chips chips-initial col s12"></div>
                    </form>
@endif


                  <script type="text/javascript">
                  $('.chips-initial').material_chip();
                  var y=0;
                  $('#goalskill').on('chip.add', function(e, chip){


                    var z=$('#goalskill').material_chip('data');

                    var form = document.getElementById("goalskillform");
                    var action = form.getAttribute("action");
                    var skillinput=document.getElementById("skillinput");
                    skillinput.value=z[y].tag;
                    var form_data = new FormData(form);
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', action, true);
                    xhr.send(form_data);
                    console.log(form_data);
                    xhr.onreadystatechange = function () {
                      if(xhr.readyState == 4 && xhr.status == 200) {
                         var result = xhr.responseText;
                         console.log('Result: ' + result);
                      }
                    };

                    console.log(z[y].tag);
                    y++;
                  });

                  </script>




                </div>
                {{-- priiiiiiiiiiiiivvvvvvvvvaaaaaaaaaacyyyyyyyyyyyyyy --}}
                @foreach ($privacy as $privacys)

                @endforeach
                <div id="test4" class="col s12">
                  <ul class="collection">
                   <li class="collection-item">
                     <div class="row"><div class="col s9">
                       make intent private
                     </div>
                       <a href="#!" class="secondary-content">
                     <form id="goalintentprivacyfrm" action="{{route('goal')}}" method="post">
                       {{ csrf_field() }}
                     <div class="switch col s3">
                      <label>
                          <input id="goalintentprivacy" {{($privacys->goalintentprivacy!='public')?'checked':''}}  value="private" type="checkbox" name="goalintentprivacy">
                        <span class="lever"></span>
                      </label>
                    </div>
                    <input type="text" style="display:none;" value="{{$goals->goalid}}" name="goalid">
                    <input type="text" style="display:none;" value="updateprivacy" name="action">
                    <input type="text" style="display:none;" value="goalintentprivacy" name="attribute">
                    </form>
                    <script type="text/javascript">

                    var goalintentprivacy=document.getElementById("goalintentprivacy");
                    goalintentprivacy.addEventListener("change",function(event){
                      event.preventDefault();
                      setintentprivacy();
                    });
                    function setintentprivacy(){
                     var form = document.getElementById("goalintentprivacyfrm");
                     var action = form.getAttribute("action");
                     var form_data = new FormData(form);


                     var xhr = new XMLHttpRequest();
                     xhr.open('POST', action, true);
                     xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                     xhr.send(form_data);
                     console.log('string');
                     xhr.onreadystatechange = function () {
                       if(xhr.readyState == 4 && xhr.status == 200) {
                          var result = xhr.responseText;
                          console.log('Result: ' + result);
                       }
                     };
                   }

                    </script>
                   </a></div>
                   </li>
                   <li class="collection-item">
                     <div class="row">
                       <div class="col s9">
                        make category private
                     </div>
                       <a href="#!" class="secondary-content">
                     <form id="goalcategoryprivacyfrm" action="{{route('goal')}}" method="post">
                       {{ csrf_field() }}
                     <div class="switch col s3">
                      <label>
                          <input id="goalcategoryprivacy" {{($privacys->goalcategoryprivacy!='public')?'checked':''}}  value="private" type="checkbox" name="goalcategoryprivacy">
                        <span class="lever"></span>
                      </label>
                    </div>
                    <input type="text" style="display:none;" value="{{$goals->goalid}}" name="goalid">
                    <input type="text" style="display:none;" value="updateprivacy" name="action">
                    <input type="text" style="display:none;" value="goalcategoryprivacy" name="attribute">
                    </form>
                    <script type="text/javascript">

                    var goalcategoryprivacy=document.getElementById("goalcategoryprivacy");
                    goalcategoryprivacy.addEventListener("change",function(event){
                      event.preventDefault();
                      setcategoryprivacy();
                    });
                    function setcategoryprivacy(){
                     var form = document.getElementById("goalcategoryprivacyfrm");
                     var action = form.getAttribute("action");
                     var form_data = new FormData(form);


                     var xhr = new XMLHttpRequest();
                     xhr.open('POST', action, true);
                     xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                     xhr.send(form_data);
                     console.log('string');
                     xhr.onreadystatechange = function () {
                       if(xhr.readyState == 4 && xhr.status == 200) {
                          var result = xhr.responseText;
                          console.log('Result: ' + result);
                       }
                     };
                   }

                    </script>
                   </a>
                 </div>
               </li>
                   <li class="collection-item">
                     <div class="row">
                       <div class="col s9">
                       make priority private
                       </div>
                       <a href="#!" class="secondary-content">
                     <form id="goalpriorityprivacyfrm" action="{{route('goal')}}" method="post">
                       {{ csrf_field() }}
                     <div class="switch col s3">
                      <label>
                          <input id="goalpriorityprivacy" {{($privacys->goalpriorityprivacy!='public')?'checked':''}}  value="private" type="checkbox" name="goalpriorityprivacy" >
                        <span class="lever"></span>
                      </label>
                    </div>
                    <input type="text" style="display:none;" value="{{$goals->goalid}}" name="goalid">
                    <input type="text" style="display:none;" value="updateprivacy" name="action">
                    <input type="text" style="display:none;" value="goalpriorityprivacy" name="attribute">
                    </form>
                    <script type="text/javascript">

                    var goalpriorityprivacy=document.getElementById("goalpriorityprivacy");
                    goalpriorityprivacy.addEventListener("change",function(event){
                      event.preventDefault();
                      setpriorityprivacy();
                    });
                    function setpriorityprivacy(){
                     var form = document.getElementById("goalpriorityprivacyfrm");
                     var action = form.getAttribute("action");
                     var form_data = new FormData(form);


                     var xhr = new XMLHttpRequest();
                     xhr.open('POST', action, true);
                     xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                     xhr.send(form_data);
                     console.log('string');
                     xhr.onreadystatechange = function () {
                       if(xhr.readyState == 4 && xhr.status == 200) {
                          var result = xhr.responseText;
                          console.log('Result: ' + result);
                       }
                     };
                   }

                    </script>
                   </a>
                 </div>
               </li>
                   <li class="collection-item">
                     <div class="row">
                       <div class="col s9">
                       make start date private
                       </div>
                       <a href="#!" class="secondary-content">
                     <form id="goalstartdateprivacyfrm" action="{{route('goal')}}" method="post">
                       {{ csrf_field() }}
                     <div class="switch col s3">
                      <label>
                          <input id="goalstartdateprivacy" {{($privacys->goalstartdateprivacy!='public')?'checked':''}}  value="private" type="checkbox" name="goalstartdateprivacy">
                        <span class="lever"></span>
                      </label>
                    </div>
                    <input type="text" style="display:none;" value="{{$goals->goalid}}" name="goalid">
                    <input type="text" style="display:none;" value="updateprivacy" name="action">
                    <input type="text" style="display:none;" value="goalstartdateprivacy" name="attribute">
                    </form>
                    <script type="text/javascript">

                    var goalstartdateprivacy=document.getElementById("goalstartdateprivacy");
                    goalstartdateprivacy.addEventListener("change",function(event){
                      event.preventDefault();
                      setstartdateprivacy();
                    });
                    function setstartdateprivacy(){
                     var form = document.getElementById("goalstartdateprivacyfrm");
                     var action = form.getAttribute("action");
                     var form_data = new FormData(form);


                     var xhr = new XMLHttpRequest();
                     xhr.open('POST', action, true);
                     xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                     xhr.send(form_data);
                     console.log('string');
                     xhr.onreadystatechange = function () {
                       if(xhr.readyState == 4 && xhr.status == 200) {
                          var result = xhr.responseText;
                          console.log('Result: ' + result);
                       }
                     };
                   }

                    </script>
                   </a>
                 </div>
               </li>
                   <li class="collection-item">
                     <div class="row">
                       <div class="col s9">
                       make end date private
                       </div>
                       <a href="#!" class="secondary-content">
                     <form id="goalenddateprivacyfrm" action="{{route('goal')}}" method="post">
                       {{ csrf_field() }}
                     <div class="switch col s3">
                      <label>
                          <input id="goalenddateprivacy" {{($privacys->goalenddateprivacy!='public')?'checked':''}}  value="private" type="checkbox" name="goalenddateprivacy" >
                        <span class="lever"></span>
                      </label>
                    </div>
                    <input type="text" style="display:none;" value="{{$goals->goalid}}" name="goalid">
                    <input type="text" style="display:none;" value="updateprivacy" name="action">
                    <input type="text" style="display:none;" value="goalenddateprivacy" name="attribute">
                    </form>
                    <script type="text/javascript">

                    var goalenddateprivacy=document.getElementById("goalenddateprivacy");
                    goalenddateprivacy.addEventListener("change",function(event){
                      event.preventDefault();
                      setenddateprivacy();
                    });
                    function setenddateprivacy(){
                     var form = document.getElementById("goalenddateprivacyfrm");
                     var action = form.getAttribute("action");
                     var form_data = new FormData(form);


                     var xhr = new XMLHttpRequest();
                     xhr.open('POST', action, true);
                     xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                     xhr.send(form_data);
                     console.log('string');
                     xhr.onreadystatechange = function () {
                       if(xhr.readyState == 4 && xhr.status == 200) {
                          var result = xhr.responseText;
                          console.log('Result: ' + result);
                       }
                     };
                   }

                    </script>
                   </a>
                 </div>
               </li>
                   <li class="collection-item">
                     <div class="row">
                       <div class="col s9">
                       make completed percentage private
                       </div>
                       <a href="#!" class="secondary-content">
                     <form id="goalcompletedpercentageprivacyfrm" action="{{route('goal')}}" method="post">
                       {{ csrf_field() }}
                     <div class="switch col s3">
                      <label>
                          <input id="goalcompletedpercentageprivacy" {{($privacys->goalcompletedpercentageprivacy!='public')?'checked':''}}  value="private" type="checkbox" name="goalcompletedpercentageprivacy" >
                        <span class="lever"></span>
                      </label>
                    </div>
                    <input type="text" style="display:none;" value="{{$goals->goalid}}" name="goalid">
                    <input type="text" style="display:none;" value="updateprivacy" name="action">
                    <input type="text" style="display:none;" value="goalcompletedpercentageprivacy" name="attribute">
                    </form>
                    <script type="text/javascript">

                    var goalcompletedpercentageprivacy=document.getElementById("goalcompletedpercentageprivacy");
                    goalcompletedpercentageprivacy.addEventListener("change",function(event){
                      event.preventDefault();
                      setcompletedpercentageprivacy();
                    });
                    function setcompletedpercentageprivacy(){
                     var form = document.getElementById("goalcompletedpercentageprivacyfrm");
                     var action = form.getAttribute("action");
                     var form_data = new FormData(form);


                     var xhr = new XMLHttpRequest();
                     xhr.open('POST', action, true);
                     xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                     xhr.send(form_data);
                     console.log('string');
                     xhr.onreadystatechange = function () {
                       if(xhr.readyState == 4 && xhr.status == 200) {
                          var result = xhr.responseText;
                          console.log('Result: ' + result);
                       }
                     };
                   }

                    </script>
                   </a>
                 </div>
               </li>
               @if ($goals->goalauthorization!='aligned')
                 <li class="collection-item">
                   <div class="row">
                     <div class="col s9">
                        Permit share goal
                     </div>
                     <a href="#!" class="secondary-content">
                   <form id="canshareprivacyfrm" action="{{route('goal')}}" method="post">
                     {{ csrf_field() }}
                   <div class="switch col s3">
                    <label>
                        <input id="canshareprivacy" {{($privacys->canshareprivacy!='public')?'checked':''}}  value="private" type="checkbox" name="canshareprivacy" >
                      <span class="lever"></span>
                    </label>
                  </div>
                  <input type="text" style="display:none;" value="{{$goals->goalid}}" name="goalid">
                  <input type="text" style="display:none;" value="updateprivacy" name="action">
                  <input type="text" style="display:none;" value="canshareprivacy" name="attribute">
                  </form>
                  <script type="text/javascript">

                  var canshareprivacy=document.getElementById("canshareprivacy");
                  canshareprivacy.addEventListener("change",function(event){
                    event.preventDefault();
                    setcanshareprivacy();
                  });
                  function setcanshareprivacy(){
                   var form = document.getElementById("canshareprivacyfrm");
                   var action = form.getAttribute("action");
                   var form_data = new FormData(form);


                   var xhr = new XMLHttpRequest();
                   xhr.open('POST', action, true);
                   xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                   xhr.send(form_data);
                   console.log('string');
                   xhr.onreadystatechange = function () {
                     if(xhr.readyState == 4 && xhr.status == 200) {
                        var result = xhr.responseText;
                        console.log('Result: ' + result);
                     }
                   };
                 }

                  </script>
                 </a>
               </div>
                 </li>
                 <li class="collection-item">
                   <div class="row">
                     <div class="col s9">
                    Permit adding tasks
                     </div>
                     <a href="#!" class="secondary-content">
                   <form id="addtaskprivacyfrm" action="{{route('goal')}}" method="post">
                     {{ csrf_field() }}
                   <div class="switch col s3">
                    <label>
                        <input id="addtaskprivacy" {{($privacys->addtaskprivacy!='public')?'checked':''}}  value="private" type="checkbox" name="addtaskprivacy" >
                      <span class="lever"></span>
                    </label>
                  </div>
                  <input type="text" style="display:none;" value="{{$goals->goalid}}" name="goalid">
                  <input type="text" style="display:none;" value="updateprivacy" name="action">
                  <input type="text" style="display:none;" value="addtaskprivacy" name="attribute">
                  </form>
                  <script type="text/javascript">

                  var addtaskprivacy=document.getElementById("addtaskprivacy");
                  addtaskprivacy.addEventListener("change",function(event){
                    event.preventDefault();
                    setaddtaskprivacy();
                  });
                  function setaddtaskprivacy(){
                   var form = document.getElementById("addtaskprivacyfrm");
                   var action = form.getAttribute("action");
                   var form_data = new FormData(form);


                   var xhr = new XMLHttpRequest();
                   xhr.open('POST', action, true);
                   xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                   xhr.send(form_data);
                   console.log('string');
                   xhr.onreadystatechange = function () {
                     if(xhr.readyState == 4 && xhr.status == 200) {
                        var result = xhr.responseText;
                        console.log('Result: ' + result);
                     }
                   };
                 }
                  </script>
                 </a>
               </div>
                 </li>
               @endif

                 </ul>

                </div>
                </div>
              </div>
            </div>




<div class="container">
  <div class="row">

  <form class="" action="{{ route('comment') }}" method="post" id="comment-form">
      {{ csrf_field() }}
    <div class="input-field col m6 s12 l6">
      <input id="comment" type="text" name="comment" class="validate" >
      <input type="hidden" name="goalid" value="{{ $goals->goalid}}">
      <label for="comment">
        Comment
      </label>
     <button type="submit" class="waves-effect waves-light btn btn-floating  blue darken-4" id="cmtbtn"><i class="material-icons">send</i></button>
    </div>

 </form>
 <script type="text/javascript">
 // note: IE8 doesn't support DOMContentLoaded
 document.addEventListener('DOMContentLoaded', function() {
   var cmtform = document.getElementById("comment-form");
   var action = cmtform.getAttribute("action");
   var cmtbtn = document.getElementById("cmtbtn");
   var cmtcard=document.getElementById("cmtcard");

   function showComment(json) {
       var cmt = commentToCard(json);
       cmtcard.innerHTML = cmt+cmtcard.innerHTML;
          }


     function commentToCard(items) {
       var output = '';
         output += '<div class="row col s12 blue-text" style="padding-left:50px">';
         output += '<img src="';
         output += "/uploads/avatars/"+items.avatar+'"'+'class="circle " height="50px" width="50px">';
         output += '<strong style="font-size:20pt;">'+items.name+'</strong><br>';
         output += '<span>'+items.datetime+'</span><br>'+items.comment+'<li class="divider"></li>';
         output += '</div>';
       return output;
     }


   function getComments() {
     var form_data=new FormData(cmtform);
     var xhr = new XMLHttpRequest();
     xhr.open('POST',action, true);
     xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
     xhr.send(form_data);
     xhr.onreadystatechange = function () {
      //  while (xhr.readyState < 4) {
      //    cmtbtn.disabled=true;
      //  }
       if(xhr.readyState == 4 && xhr.status == 200) {
         var result = xhr.responseText;
         cmtbtn.disabled=false;
         console.log('Result: ' + result);
         var json =JSON.parse(result);
         showComment(json);
         // var json = JSON.parse(result);
         // showSuggestions(json);
       }
       else {
         cmtbtn.disabled=true;
       }
     };

   }
   cmtbtn.addEventListener("click",function(event){
     event.preventDefault();
     getComments();
   });
 });

 </script>

 <br>
</div>

<div class="col s12 ">
  <div class="row">
  <div class="card" id="cmtcard">

  </div>

  <div class="card ">
    @foreach ($comment as $comments)
    <div class="row col s12 blue-text" style="padding-left:50px">
        <img src="{{asset('uploads/avatars/'.$comments->avatar)}}" class="circle " height="50px" width="50px">
        <strong style="font-size:20pt;">{{$comments ->fname}}</strong><br>
        @php
          $carb=new Carbon($comments ->Commenteddate);
        @endphp
        <span>{{$carb->toDayDateTimeString()}}</span>
        <br>
            {{$comments ->commenttext}}
          <li class="divider"></li>
    </div>

  @endforeach
  </div>
  </div>
</div>



        </div>
                <!-- comments start -->
                {{-- <div class="row">
                  <div class="input-field col s6">
                   <input id="first_name" type="text" class="validate">
                   <label for="first_name">Join the discussion </label>
                   <a href="#" >
                   <i class="material-icons right ">send</i>
                 </a>
                 </div><br>
                </div> --}}
                {{-- <div class="row col s12">
                    <img src="2.png" class="circle " height="50px" width="50px">
                    <strong>{Commenter's name}</strong>
                    <span>{x time ago}</span>
                    <br>
                    <blockquote >
                      In in culpa nulla elit esse. Ex cillum enim aliquip sit sit ullamco ex eiusmod fugiat. Cupidatat ad minim officia mollit laborum magna dolor tempor cupidatat mollit.
                      Est velit sit ad aliqua ullamco laborum excepteur dolore proident incididunt in labore elit.
                    </blockquote>
                    <div class="row">
                        <a><i class="material-icons">thumb_up</i></a>
                        <a><i class="material-icons">thumb_down</i></a>
                        <a><i class="material-icons">share</i></a>
                    </div>

                    <blockquote >
                      <div class="row col s12">
                          <img src="1.png" class="circle " height="50px" width="50px">
                          <strong>{Replier's Name}</strong>
                          <span>{x time ago}</span>
                          <br>
                          <blockquote >
                          Yes i agree
                          </blockquote>
                          <div class="row">
                              <a><i class="material-icons">thumb_up</i></a>
                              <a><i class="material-icons">thumb_down</i></a>
                              <a><i class="material-icons">share</i></a>
                          </div>
                      </div>
                    </blockquote>
                    <li class="divider"></li>


                </div> --}}

               <!-- ///////// -->
              </div>





            </div>

          </div>
        </div>
      </div>
</div>




</div>



@endsection
