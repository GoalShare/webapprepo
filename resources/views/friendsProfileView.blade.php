@extends('layouts.navbar')

@section('content')
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
<div class="row">

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

          <br>
          <div class="col s12 m6 l6">
            <img src="{{asset('uploads/avatars/'.$users->avatar)}}" alt="" width="200px" height="200px" class="circle">
          </div>
          <div class="col s12 m6 l6">
            <br>
            <h4 class="flow-text"> <b>{{$users->fname}}  {{$users->lname}} </b><h4>
                <p class="flow-text">{{$users->email}} <br>
                    {{$users->phone}}  <br>{{$users->dob}} </p>

                 <form class="" action="{{route('addfriend')}}" method="post">
                   {{csrf_field()}}
                   <input type="hidden" name="friend" value="requested">
                   <input type="hidden" name="friendid" value="{{$users->id}}">
                   <button class="btn waves-effect waves-light blue darken-4 tooltipped" data-position="bottom" data-delay="50" data-tooltip="Add Friend" type="submit" name="action"{{($friendship!='')?'disabled':''}}>{{($friendship!='')?$friendship:'send request'}}
                 </form>

              <i class="material-icons right">person_pin</i>
            </button>
          </div>
          <div class="col s12 m12 l12">
            <div class="card">
              <div class="card-action">
                 <h5><b>Portfolio</b></h5>
              </div>
              <div class="row"style="margin:10px;">
                  <div class="col s12 m6 l6">
                      <div class="card ">
                         <div class="card-content ">
                           <span class="card-title"><i class="material-icons">account_box</i>&nbsp;Aspiration
                           </span>
                           <li class="divider"></li><br>
                           @if ($users->bio=="")
                             <p id="inibio"class="blue-text">{{$users->fname}} did not share an aspiration</p>
                           @else
                             <p id="setbio">{{$users->bio}}</p>
                           @endif
                         </div>
                      </div>
                  </div>
                  <div class="col s12 m6 l6">
                      <div class="card ">
                         <div class="card-content">
                           <span class="card-title"><i class="material-icons">work</i>&nbsp;Work Experience</span>
                           <li class="divider"></li><br>
                           <b>previous :</b><br>
                             <span id="nopreviouswork" class="blue-text ">{{$users->fname}} did not share previous employments</span>
                             @foreach ($portfolio as $work)
                             @if ($work->category=='work' && $work->nature=='previous')
                               <span class="chip col s12">{{$work->data}}</span>
                               <script type="text/javascript">
                                 document.getElementById("nopreviouswork").style.display="none";
                               </script>
                             @endif
                             @endforeach
                             <br><br>
                           <b>current :</b><br>
                             <span id="nocurrentwork" class="blue-text ">{{$users->fname}} did not share current employment</span>
                             @foreach ($portfolio as $work)
                             @if ($work->category=='work' && $work->nature=='current')
                               <span class="chip col s12">{{$work->data}}</span>
                               <script type="text/javascript">
                                 document.getElementById("nocurrentwork").style.display="none";
                               </script>
                             @endif
                             @endforeach
                             <div class="card-content">
                               &nbsp;
                             </div>
                         </div>
                      </div>
                  </div>
                </div>
                <div class="divider"></div><br>
                <div class="row" style="margin:10px;">
                    <div class="col s12 m6 l6">
                        <div class="card ">
                           <div class="card-content ">
                             <span class="card-title"><i class="material-icons">school</i>&nbsp;Education</span>
                             <li class="divider"></li><br>
                             <b>primary school :</b><br>
                             <span id="noprimarysch" class="blue-text">{{$users->fname}} did not share primary school</span>
                             @foreach ($portfolio as $edu)
                             @if ($edu->category=='education' && $edu->nature=='primarysch')
                              <span class="chip col s12">{{$edu->data}}</span>
                              <script type="text/javascript">
                                document.getElementById("noprimarysch").style.display="none";
                              </script>
                             @endif
                             @endforeach
                             <br><br>
                             <b>secondary school :</b><br>
                             <span id="nosecondarysch" class="blue-text">{{$users->fname}} did not share secondary school</span>
                             @foreach ($portfolio as $edu)
                             @if ($edu->category=='education' && $edu->nature=='secondarysch')
                              <span class="chip col s12">{{$edu->data}}</span>
                              <script type="text/javascript">
                                document.getElementById("nosecondarysch").style.display="none";
                              </script>
                             @endif
                             @endforeach
                             <br><br>
                             <b>college :</b><br>
                             <span id="nocollege" class="blue-text">{{$users->fname}} did not share college</span>
                             @foreach ($portfolio as $edu)
                             @if ($edu->category=='education' && $edu->nature=='college')
                              <span class="chip col s12">{{$edu->data}}</span>
                              <script type="text/javascript">
                                document.getElementById("nocollege").style.display="none";
                              </script>
                             @endif
                             @endforeach
                             <br><br>
                             <b>universities :</b><br>
                             <span id="nouniversity" class="blue-text">{{$users->fname}} did not share university</span>
                             @foreach ($portfolio as $edu)
                             @if ($edu->category=='education' && $edu->nature=='university')
                              <span class="chip col s12">{{$edu->data}}</span>
                              <script type="text/javascript">
                                document.getElementById("nouniversity").style.display="none";
                              </script>
                             @endif
                             @endforeach
                             <div class="card-content">
                               &nbsp;
                             </div>
                           </div>
                        </div>
                    </div>
                    <div class="col s12 m6 l6">
                        <div class="card">
                           <div class="card-content ">
                             <span class="card-title"><i class="material-icons">grade</i>&nbsp;achievements</span>
                             <li class="divider"></li><br>
                             <span id="noachievements" class="blue-text">{{$users->fname}} did not share achievements</span>
                             @foreach ($portfolio as $edu)
                             @if ($edu->category=='achievements' && $edu->nature=='achievements')
                              <span class="chip col s12">{{$edu->data}}</span>
                              <script type="text/javascript">
                                document.getElementById("noachievements").style.display="none";
                              </script>
                             @endif
                           @endforeach
                             <div class="card-content">
                               &nbsp;
                             </div>
                           </div>
                        </div>
                    </div>
                  </div>
                  <div class="divider"></div><br>
                  <div class="row" style="margin:10px;">
                      <div class="col s12 m6 l6">
                          <div class="card ">
                             <div class="card-content ">
                               <span class="card-title"><i class="material-icons">portrait</i>&nbsp;Professional Qualifications</span>
                               <li class="divider"></li><br>
                               <span id="noprofqual" class="blue-text">{{$users->fname}} did not share professional qualifications</span>
                               @foreach ($portfolio as $edu)
                               @if ($edu->category=='profqual' && $edu->nature=='profqual')
                                <span class="chip col s12">{{$edu->data}}</span>
                                <script type="text/javascript">
                                  document.getElementById("noprofqual").style.display="none";
                                </script>
                               @endif
                               @endforeach
                               <div class="card-content">
                                 &nbsp;
                               </div>
                             </div>
                          </div>
                      </div>
                      <div class="col s12 m6 l6">
                          <div class="card ">
                             <div class="card-content ">
                               <span class="card-title"><i class="material-icons">subject</i>&nbsp;Patents</span>
                               <li class="divider"></li><br>
                               <span id="nopatents" class="blue-text">{{$users->fname}} did not share patents</span>
                               @foreach ($portfolio as $edu)
                               @if ($edu->category=='patents' && $edu->nature=='patents')
                                <span class="chip col s12">{{$edu->data}}</span>
                                <script type="text/javascript">
                                  document.getElementById("nopatents").style.display="none";
                                </script>
                               @endif
                               @endforeach
                               <div class="card-content">
                                 &nbsp;
                               </div>
                             </div>
                          </div>
                      </div>
                    </div>
                    <div class="divider"></div><br>
                    <div class="row" style="margin:10px;">
                        <div class="col s12 m6 l6">
                            <div class="card ">
                               <div class="card-content ">
                                 <span class="card-title"><i class="material-icons">insert_drive_file</i>&nbsp;Research Papers</span>
                                 <li class="divider"></li><br>
                                 <span id="noresearchpapers" class="blue-text">{{$users->fname}} did not share research papers</span>
                                 @foreach ($portfolio as $edu)
                                 @if ($edu->category=='researchpapers' && $edu->nature=='researchpapers')
                                  <span class="chip col s12">{{$edu->data}}</span>
                                  <script type="text/javascript">
                                    document.getElementById("noresearchpapers").style.display="none";
                                  </script>
                                 @endif
                                 @endforeach
                                 <div class="card-content">
                                   &nbsp;
                                 </div>
                               </div>
                            </div>
                        </div>
                        <div class="col s12 m6 l6">
                            <div class="card ">
                               <div class="card-content ">
                                 <span class="card-title"><i class="material-icons">location_on</i>&nbsp;Places</span>
                                 <li class="divider"></li><br>
                                 <b>From :</b><br>
                                 <span id="nofrom" class="blue-text">{{$users->fname}} did not share this detail</span>
                                 @foreach ($portfolio as $edu)
                                 @if ($edu->category=='location' && $edu->nature=='from')
                                  <span class="chip col s12">{{$edu->data}}</span>
                                  <script type="text/javascript">
                                    document.getElementById("nofrom").style.display="none";
                                  </script>
                                 @endif
                                 @endforeach
                                 <br><br>
                                 <b>living :</b><br>
                                 <span id="noliving" class="blue-text">{{$users->fname}} did not share this detail</span>
                                 @foreach ($portfolio as $edu)
                                 @if ($edu->category=='location' && $edu->nature=='living')
                                  <span class="chip col s12">{{$edu->data}}</span>
                                  <script type="text/javascript">
                                    document.getElementById("noliving").style.display="none";
                                  </script>
                                 @endif
                                 @endforeach
                                 <div class="card-content">
                                   &nbsp;
                                 </div>
                               </div>
                            </div>
                        </div>
                      </div>
                      <div class="divider"></div><br>
                      <div class="row" style="margin:10px;">
                          <div class="col s12 m6 l6">
                              <div class="card ">
                                 <div class="card-content ">
                                   <span class="card-title"><i class="material-icons">recent_actors</i>&nbsp;Interests</span>
                                   <li class="divider"></li><br>
                                   <span id="nointerests" class="blue-text">{{$users->fname}} did not share interests</span>
                                   @foreach ($portfolio as $edu)
                                   @if ($edu->category=='interests' && $edu->nature=='interests')
                                    <span class="chip col s12">{{$edu->data}}</span>
                                    <script type="text/javascript">
                                      document.getElementById("nointerests").style.display="none";
                                    </script>
                                   @endif
                                   @endforeach
                                   <div class="card-content">
                                     &nbsp;
                                   </div>
                                 </div>
                              </div>
                          </div>
                          {{-- <div class="col s12 m6 l6">
                              <div class="card ">
                                 <div class="card-content ">
                                   <span class="card-title"><i class="material-icons">group</i>&nbsp;Social Links</span>
                                   <li class="divider"></li><br>
                                   <b>Facebook:</b><br>
                                   <span id="nofacebook" class="blue-text">{{$users->fname}} did not share facebook</span>
                                   @foreach ($portfolio as $edu)
                                   @if ($edu->category=='social' && $edu->nature=='facebook')
                                    <span class="chip col s12"><a href="//{{$edu->data}}" class="blue-text"><u>{{$edu->data}}</u></a></span>
                                    <script type="text/javascript">
                                      document.getElementById("nofacebook").style.display="none";
                                    </script>
                                   @endif
                                   @endforeach
                                   <br><br>
                                   <b>LinkedIn :</b><br>
                                   <span id="nolinkedin" class="blue-text">{{$users->fname}} did not share linkedin</span>
                                   @foreach ($portfolio as $edu)
                                   @if ($edu->category=='social' && $edu->nature=='linkedin')
                                    <span class="chip col s12"><a href="//{{$edu->data}}" target="_blank" class="blue-text"><u>{{$edu->data}}</u></a></span>
                                    <script type="text/javascript">
                                      document.getElementById("nolinkedin").style.display="none";
                                    </script>
                                   @endif
                                   @endforeach
                                   </script>
                                   <br><br>
                                   <b>Twitter :</b><br>
                                   <span id="notwitter" class="blue-text">{{$users->fname}} did not share twitter</span>
                                   @foreach ($portfolio as $edu)
                                   @if ($edu->category=='social' && $edu->nature=='twitter')
                                    <span class="chip col s12"><a href="//{{$edu->data}}" class="blue-text"><u>{{$edu->data}}</u></a></span>
                                    <script type="text/javascript">
                                      document.getElementById("notwitter").style.display="none";
                                    </script>
                                   @endif
                                   @endforeach
                                   <br><br>
                                   <b>Instagram :</b><br>
                                   <span id="noinstagram" class="blue-text">{{$users->fname}} did not share instagram</span>
                                   @foreach ($portfolio as $edu)
                                   @if ($edu->category=='social' && $edu->nature=='instagram')
                                    <span class="chip col s12"><a href="//{{$edu->data}}" class="blue-text"><u>{{$edu->data}}</u></a></span>
                                    <script type="text/javascript">
                                      document.getElementById("noinstagram").style.display="none";
                                    </script>
                                   @endif
                                   @endforeach
                                   <div class="card-content">
                                     &nbsp;
                                   </div>
                                 </div>
                              </div>
                          </div> --}}
                        </div>
          </div>

        </div>



          <div class="col s12 m12 l12">
          <div class="card">
            <div class="card-action">
                <h5><b>Skills and Strengths</b></h5>
                   <li class="divider"></li>
            </div>
            <div class="card-content">

                  <div class="row">
                      <div class="col s12 m6 l6">
                        <div class="card">
                          <div class="card-action">
                            Skills
                            <li class="divider"></li>
                          </div>
                          <div class="card-content">
                            <!-- chips -->
                            @foreach ($userskill as $userskills)
                              @if ($userskills->type=='skill')
                              <div class="chip">

                                  {{$userskills->skill}}


                              </div>
                              @endif
                            @endforeach


                          </div>

                        </div>
                      </div>



                        <div class="col s12 m6 l6">
                          <div class="card">
                            <div class="card-action">
                              Strengths
                              <li class="divider"></li>
                            </div>
                            <div class="card-content">
                              <!-- chips -->
                              @foreach ($userskill as $userskills)
                                @if ($userskills->type=='strength')
                                <div class="chip">

                                    {{$userskills->skill}}

                                </div>
                                  @endif
                              @endforeach


                            </div>

                          </div>
                        </div>
                      </div>

            </div>

          </div>
        </div>




     <!-- ///////////////////////// -->
     <!-- Second part -->

   <!-- //////////////// -->
   <!-- third part -->

   <div class="col s12 m12 l12">
     <div class="card">
       <div class="card-action">
          <h5><b>Goals</b></h5>
       </div>
       <ul class="collapsible popout" data-collapsible="accordion">
         <li>
           <div class="collapsible-header"><b>Accomplished Goals</b></div>
           @foreach ($goal as $goals)
             @if ($goals->goalcompletedpercentage==100)
               <div class="collapsible-body">
                 Name: {{$goals->goalname}}<br>
                 @foreach ($privacys as $privacy)
                   @if (($privacy->goalid==$goals->goalid)&&($privacy->goalintentprivacy=='public'))
                     Intent:{{$goals->goalintent}}<br>
                   @endif
                 @endforeach
                 @foreach ($privacys as $privacy)
                   @if (($privacy->goalid==$goals->goalid)&&($privacy->goalcategoryprivacy=='public'))
                     Category:{{$goals->goalcategory}}<br>
                   @endif
                 @endforeach
                 @foreach ($privacys as $privacy)
                   @if (($privacy->goalid==$goals->goalid)&&($privacy->goalstartdateprivacy=='public'))
                     Startdate:{{$goals->goalstartdate}}<br>
                   @endif
                 @endforeach
                 @foreach ($privacys as $privacy)
                   @if (($privacy->goalid==$goals->goalid)&&($privacy->goalenddateprivacy=='public'))
                     Enddate:{{$goals->goalenddate}}<br>
                   @endif
                 @endforeach
                 @foreach ($privacys as $privacy)
                   @if (($privacy->goalid==$goals->goalid)&&($privacy->goalpriorityprivacy=='public'))
                     Priority:{{$goals->goalpriority}}
                   @endif
                 @endforeach
                 @foreach ($privacys as $privacy)
                   @if (($privacy->goalid==$goals->goalid)&&($privacy->goalcompletedpercentageprivacy=='public'))
                     <div class="progress">
                         <div class="determinate" style="width: {{$goals->goalcompletedpercentage}}%"> </div>
                     </div>
                     {{$goals->goalcompletedpercentage}}%
                   @endif
                 @endforeach
               </div>
             @endif
           @endforeach
         </li>

         <li>
           <div class="collapsible-header"><b>Goals in progress</b></div>
           @foreach ($goal as $goals)
             @if ($goals->goalcompletedpercentage<100)
               <div class="collapsible-body">
                 Name: {{$goals->goalname}}<br>
                 @foreach ($privacys as $privacy)
                   @if (($privacy->goalid==$goals->goalid)&&($privacy->goalintentprivacy=='public'))
                     Intent:{{$goals->goalintent}}<br>
                   @endif
                 @endforeach
                 @foreach ($privacys as $privacy)
                   @if (($privacy->goalid==$goals->goalid)&&($privacy->goalcategoryprivacy=='public'))
                     Category:{{$goals->goalcategory}}<br>
                   @endif
                 @endforeach
                 @foreach ($privacys as $privacy)
                   @if (($privacy->goalid==$goals->goalid)&&($privacy->goalstartdateprivacy=='public'))
                     Startdate:{{$goals->goalstartdate}}<br>
                   @endif
                 @endforeach
                 @foreach ($privacys as $privacy)
                   @if (($privacy->goalid==$goals->goalid)&&($privacy->goalenddateprivacy=='public'))
                     Enddate:{{$goals->goalenddate}}<br>
                   @endif
                 @endforeach
                 @foreach ($privacys as $privacy)
                   @if (($privacy->goalid==$goals->goalid)&&($privacy->goalpriorityprivacy=='public'))
                     Priority:{{$goals->goalpriority}}
                   @endif
                 @endforeach
                 @foreach ($privacys as $privacy)
                   @if (($privacy->goalid==$goals->goalid)&&($privacy->goalcompletedpercentageprivacy=='public'))
                     <div class="progress">
                         <div class="determinate" style="width: {{$goals->goalcompletedpercentage}}%"> </div>
                     </div>
                     {{$goals->goalcompletedpercentage}}%
                   @endif
                 @endforeach

               </div>
             @endif
           @endforeach
         </li>

       </ul>
       <br>
       <br><br>

   </div>
 </div>
     <!-- ///////////// -->

     <div class="col s12 m12 l12 center-align">
       <div class="card ">

            <div class="card-action">
               <h5><b>Friends</b></h5>
            </div>


          <div class="card-action">
            @foreach ($friends as $friend)
              @if ($friend->id!=Auth::id())
              <a href="{{url('/search/'.$friend->id)}}"><div class="chip">
                <img src="{{asset('uploads/avatars/'.$friend->avatar)}}" alt="Contact Person">
                {{$friend->fname}}&nbsp;{{$friend->lname}}
              </div></a>
              @endif
            @endforeach
            @foreach ($friendstwos as $friendtwo)
              @if ($friendtwo->id!=Auth::id())
              <a href="{{url('/search/'.$friendtwo->id)}}"><div class="chip">
                <img src="{{asset('uploads/avatars/'.$friendtwo->avatar)}}" alt="Contact Person">
                {{$friendtwo->fname}}&nbsp;{{$friendtwo->lname}}
              </div></a>
              @endif
            @endforeach
         </div>

            </div>



          </div>



   </div>
</div>

</div>


@endsection
