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
          <a href="#sendinvitebtnmodal" class="btn btn-floating blue lighten-1 btn-large "><i class="material-icons">people</i></a>
        </div>


                <!-- Modal Structure -->
          <div id="sendinvitebtnmodal" class="modal">
              <div style="height:25px;background-color:#0d47a1;color:white;"><img src="{{asset('favicon/favicon-16x16.png')}}" height="20px">Send Invite</div>
            <div class="modal-content">

              <!-- <h5 style="color:#0d47a1;">We are ready to connect with your friends.</h5> -->
              <div class="row" style="height:25px;"></div>
              <div class="row">
                <div class="col s4 m4 l4">
                  <center><a class="googleContactsButton" href="#myModal11"><img src="{{asset('img/mail_logo_rgb_web.png')}}" style="margin-top:-5%;" width="80%" height="80%"></a></center>
                </div>

                <div class="col s4 m4 l4"><center><a onclick="send_private_msg_to_fb_user()"><img style="cursor:pointer" src="{{asset('img/facebook_logos_PNG19749.png')}}" width="80%" height="80%"></a></center>


                  <script type="text/javascript">
             function send_private_msg_to_fb_user(){
                FB.login(function(response){
                   if (response.authResponse){
                      FB.ui({
                         method: 'send',
                         name: 'Send Private Message to Facebook User using Javascript Facebook API',
                         link: 'http://www.lifewithgoals.com',
                        description: 'In this tutorial I will show you how to send private message to facebook user using Javascript Facebook API. Although it looks very complicated but in real it is very simple, just follow the tutorial.'
             });
            }
           });
          }
          </script>
                 </div>
                <div class="col s4 m4 l4"><script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>
                  <center>
                    <a><img src="{{asset('img/LinkedIn_Logo.svg.png')}}" data-href="http://www.lifewithgoals.com/" style="cursor:pointer;width:80%; height:80%;" onclick="window.open('https://www.linkedin.com/cws/share?url=http://www.lifewithgoals.com/','targetWindow','width=700px,height=600px');" ></a>
                  </center>
                </div>
          </div>
          </div>
        </div>

          <script language="javascript" type="text/javascript">

            window.fbAsyncInit = function() {
              FB.init({
                appId            : '284837855364891',
                status     : true,
                autoLogAppEvents : true,
                xfbml            : true,
                version          : 'v2.10'

              });

            };

            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appid=284837855364891";
                fjs.parentNode.insertBefore(js, fjs);
              }(document, 'script', 'facebook-jssdk'));


          </script>

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
                              document.getElementById("sendinvitebtnmodal").style.display="none";
                              console.log(result);
                              var text = '';
                              var count=0;
                          for(var i=0;i<result.feed.entry.length;i++){
                              var x=result.feed.entry[i].gd$email;
                              var y=result.feed.entry[i].title;
                              if(x==undefined){
                                console.log("yy");
                              }

                              else{
                                count=count+1;
                                var set=0;
                                @foreach($allemail as $allemails)
                                  var v="{{$allemails}}";
                                  // console.log(v);
                                  if(x[0].address==v){
                                    console.log(x[0].address+" "+i);
                                    // console.log($('#ch'+k)[0]);

                                    text =text+'<div class="col s12 m12 l6"><div class="card disabledcard" style="width:100%; height:100%;max-height:100%; background-color: #EEEEEE;"><div class="row"><div class="col l4"><span class="checkboxlist"><input type="checkbox" name="checkboxnames" value="'+x[0].address+'" id="ch'+i+'" disabled/><label for="ch'+i+'"></label></span><img src="{{asset('img/Cornmanthe3rd-Plex-Communication-gmail.ico')}}" height="40px" width="40px"></div><div class="col l8 truncate"><span style="font-weight: bold;" >'+y.$t+'</span><br><span style="font-size:12px;color:#A7A7A7;">'+x[0].address+'</span></div></div></div></div>';
                                    set=1;

                                  }
                                  else{

                                  }
                                @endforeach

                                if(set==0){
                                  text =text+'<div class="col s12 m12 l6"><div class="card tosearch" style="width:100%; height:100%;max-height:100%; background-color: #EEEEEE;"><div class="row"><div class="col l4"><span class="checkboxlist"><input type="checkbox" name="checkboxnames" value="'+x[0].address+'" id="ch'+i+'"/><label for="ch'+i+'"></label></span><img src="{{asset('img/Cornmanthe3rd-Plex-Communication-gmail.ico')}}" height="40px" width="40px"></div><div class="col l8 truncate"><span <span style="font-weight: bold;">'+y.$t+'</span><br><span style="font-size:12px;color:#A7A7A7;">'+x[0].address+'</span></div></div></div></div>';

                                }




                                  // console.log(document.getElementsByTagName("input")[0].value);
                                  // $.get("http://picasaweb.google.com/data/entry/api/user/"+x[0].address+"?alt=json")
                                  //     .done(function() {
                                  //       $.get("http://picasaweb.google.com/data/entry/api/user/"+x[0].address+"?alt=json",
                                  //         function(data){
                                  //           console.log(data);
                                  //             var x=data.entry.gphoto$thumbnail.$t;
                                  //             console.log('<img src="'+x+'">');});
                                  //     }).fail(function() {
                                  //       console.log("wefdsdvcsdvcsdzcsd");
                                  //     });


                                   }

                                   document.getElementById("found2").innerHTML = '<span style="color:#0d47a1;font-size:17px;"><span>&nbsp&nbsp&nbsp</span>Connect with people you know on Gmail.</span>';
                                   document.getElementById("found3").innerHTML = '<span><span>&nbsp&nbsp&nbsp&nbsp</span>We found'+" "+ count+" "+'people from your address book. Select the people you would like to connect to.</span>';

                              }




                              document.getElementById("demo11").innerHTML=text;


                              document.getElementById("myModal11").style.display="inline";







                            //
                            //
                            var invitebtn=document.getElementById('sendinv');
                             invitebtn.addEventListener("click",function(event){
                             Check();
                            });
                            function Check(){


                              var checkArray =new Array();
                                var count=0;
                                    if($('[type="checkbox"]').is(":checked")){
                                       console.log("qwertyuiop");

                                        $('input[name="checkboxnames"]:checked').each(function() {

                                      //console.log(this.value);

                                         checkArray.push(this.value);
                                      //     // document.write('<input type="hidden" name="test'+count+'" value="'+this.value+'" />');
                                       //
                                          });
                                    }
                                    else{
                                      console.log("jdcnjsnkmkmkmookmokmok");
                                    }
                                    console.log(checkArray.length);
                                    for(var i=0;i<checkArray.length;i++){
                                    console.log('<input type="hidden" name="'+i+'" value="'+checkArray[i]+'">');
                                    document.getElementById("checklistnameform").innerHTML=document.getElementById("checklistnameform").innerHTML+('<input type="hidden" name="val'+i+'" value="'+checkArray[i]+'">');
                                  }
                                  $('#lengthsize').val(checkArray.length);

                                   submitForm();

                               }



                            });
                        }
                      }


                    </script>


                    <form id="checklistnameform" action="{{route('chkdetails')}}" method="post">
                     {{csrf_field()}}
                     <input type="hidden" name="length" id="lengthsize" value="">
                    </form>

                    <script>
                    function submitForm(){
                      var newchecklistnameform=document.getElementById('checklistnameform');
                      newchecklistnameform.submit();

                    }
                    </script>


        <!--
        <script>

        //             $.get("http://picasaweb.google.com/data/entry/api/user/chirathpereraz1st@gmail.com?alt=json",
        //               function(data){
        //                 console.log(data);
        //                   var x=data.entry.gphoto$thumbnail.$t;
        //                   console.log(x);
        //
        //
        //  });
        $.get("http://picasaweb.google.com/data/entry/api/user/qeuniversityreach@pearson.com?alt=json")
            .done(function() {
              $.get("http://picasaweb.google.com/data/entry/api/user/chirathpereraz1st@gmail.com?alt=json",
                function(data){
                  console.log(data);
                    var x=data.entry.gphoto$thumbnail.$t;
                    console.log('<img src="'+x+'">');});
            }).fail(function() {
              console.log("wefdsdvcsdvcsdzcsd");
            });


            xhttp=new XMLHttpRequest();
        xhttp.open("GET","http://picasaweb.google.com/data/entry/api/user/chirathpereraz1st@gmail.com?alt=json",false);
        xhttp.send();

        if (xhttp.status === 404) {
            console.log("correct");
        }
                    </script> -->


                    <!-- The Modal -->
                    <div id="myModal11" class="modal modal-fixed-footer" style="height:600px;max-height:600px; z-index:3000;">
                      <div style="height:140px;">
                        <div id="found1" style="height:25px;background-color:#0d47a1;color:white;"><img src="{{asset('img/Martz90-Circle-Gmail.png')}}" height="20px" width="20px">&nbsp Gmail<a class="right" style="cursor:pointer;" onclick="windowclose();"><i class="material-icons">close</i></a></div>
                        <div id="found2" style="height:25px;"></div>
                        <div id="found3" style="height:25px;"></div><br>
                        <div class="row" style="background-color:#EDEEEE;height:25px;">

                            <div class="col s4 m4 l4"><span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span>
                              <input type="checkbox" id="chk" onclick="toggle(this);" />
                              <label for="chk"></label>Select all
                            </div>
                            <div class="col s4 m4 l4"></div>
                            <div class="col s4 m4 l4">
                              <input style="max-width:200px;max-height:20px;" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
                            </div>
                          </div>

                        <script>
                        function windowclose(){
                          document.getElementById("myModal11").style.display="none";
                        }
                        function toggle(source) {
                          var checkboxes = document.querySelectorAll('input[type="checkbox"]');

                            for (var i = 0; i < checkboxes.length; i++) {

                                if (checkboxes[i] != source)
                                  checkboxes[i].checked = source.checked;
                                }
                              }

                              function myFunction() {
                                console.log("dcisdjcnsjkdcnkdmn");


                                var textBox=$.trim( $('#myInput').val() );

                                if(textBox == ""){
                                    $('.tosearch').show();
                                    $('.disabledcard').hide();
                                }

                                else{
                                  $('.disabledcard').hide();
                                  $('.tosearch').hide();
                                  var txt = $('#myInput').val();
                                  $('.tosearch:contains("'+txt+'")').show();
                                  $('.disabledcard').hide();
                                }
                              }

        </script>
                      </div>
                      <!-- Modal content -->
                      <div class="modal-content" style="height:410px;max-height:410px;">

                          <div id="demo11" class="row"></div>


                      </div>
                      <div class="modal-footer" style="height:50px;">
                          <button class="modal-action waves-effect waves-green btn right" id="sendinv" >Send Invite</button>

                          <button class="modal-action modal-close waves-effect waves-green btn left" type="reset" >Reset</button>


                      </div>



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
