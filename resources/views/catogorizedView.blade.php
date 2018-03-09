@extends('layouts.navbar')

@section('content')

    <!--add goal form -->
      <div id="addgoal" class="modal modal-fixed-footer">
    <div class="modal-content" style="text-align:center;">
      <h4>Add a Goal</h4>
      <form enctype="multipart/form-data" action="{{route('dashboard')}}" method="post" id="addgoalform">
{{ csrf_field() }}
        <div class="collection">
          <a href="#!" class="collection-item">
            <div class="input-field col s6">
              <input id="goalname" name="goalname" type="text" class="validate" required>
              <label for="goalname">Goal Name</label>
            </div>
          </a>
          <a href="#!" class="collection-item">
            <div class="input-field col s6">
              <input id="goalintent" name="goalintent" type="text" class="validate" required>
              <label for="goalintent">Goal Intent</label>
            </div>
          </a>
          <a href="#!" class="collection-item">
                <p class="center-align">
                  <input class="with-gap" name="goalpriority" type="radio" value="high" id="HighPriority" checked="checked" />
                  <label for="HighPriority">High Priority</label>
                </p>
                <p class="center-align">
                  <input class="with-gap" name="goalpriority" type="radio" value="medium" id="MediumPriority" />
                  <label for="MediumPriority">Medium Priority</label>
                </p>
                <p class="center-align">
                  <input class="with-gap" name="goalpriority" type="radio" value="low" id="LowPriority"  />
                  <label for="LowPriority">Low Priority</label>
                </p>
          </a>
          <a href="#!" class="collection-item">
            <div class="input-field col s12">
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
          </a>
          <a href="#!" class="collection-item">
            <div class="mdl-textfield mdl-js-textfield">
              <label  style="color:#565656;font-size:12pt;"for="goalstartdate">Goal Start-Date</label>
              <input class="mdl-textfield__input" style="color:#565656;" type="date" id="goalstartdate" name="goalstartdate" required>
            </div>
          </a>
          <a href="#!" class="collection-item">
            <div class="mdl-textfield mdl-js-textfield">
              <label  style="color:#565656;font-size:12pt;"for="goalenddate">Goal End-Date</label>
              <input class="mdl-textfield__input" style="color:#565656;" type="date" id="goalenddate" name="goalenddate" required>
            </div>
          </a>
          <a href="#!" class="collection-item">
            <div class="file-field input-field">
              <div class="btn">
                <span>Upload a Goal Picture</span>
                <input type="file" name="goalpicture">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text" name="goalpicturepath">
              </div>
            </div>
          </a>
        </div>
<input type="text" class="hidden" name="action" value="2">
    </div>
    <div class="modal-footer">
      <a href="#!" id="cancelmodalbtn" style="margin-right:10px;margin-left:10px;"class="model-close waves-effectwaves-effect waves-light btn">Not Now</a>
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

   addgoalbtn

 });
  </script>
      <!--end of add goal -->


    <div class="demo-blog mdl-layout mdl-js-layout has-drawer is-upgraded">

      <main class="mdl-layout__content">
        <div class="container" id="goaldisplay">
        <div class="row hide-on-small-only"><br><br>
          <div class="col l1 m1  center-align"></div>
          <div class="col l2 m2  center-align">
            <span class=" red-text "><b>New Goal</b></span><br>
            <a href="#addgoal" class="btn btn-floating red btn-large "><i class="material-icons">add</i></a>
          </div>
          <div class="col l2 m2  center-align">
            <span class=" blue-text text-lighten-1"><b>Send Invite</b></span><br>
            <a class="btn btn-floating blue lighten-1 btn-large" href="#sendinvitebtnmodal"><i class="material-icons">people</i></a>
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
          <!-- <div class="col l2 m2 center-align">
            <span class=" blue-text text-darken-4"><b>My Documents</b></span><br>
            <a href="{{url('/mainlearningboard')}}" class="btn btn-floating btn-large "><i class="material-icons">attach_file</i></a>
          </div> -->
          <div class="col l2 m2 center-align">
            <span class=" purple-text text-darken-3"><b>My Schedule</b></span><br>
            <a href="{{url('/calendar')}}" class="btn btn-floating purple darken-3 btn-large "><i class="material-icons">date_range</i></a>
          </div>
          <div class="col l2 m2  center-align">
            <span class=" green-text text-darken-4"><b>My Profile</b></span><br>
            <a href="{{url('profile/'.Auth::id())}}" class="btn btn-floating green darken-4 btn-large "><i class="material-icons">people</i></a>
          </div>
          <div class="col l1 m1  center-align"></div>
      </div>
        </br>
        <div class="row center">
             <p class="flow-text" style="text-transform: uppercase;"><b>{{$category}}</b></p>
        </div>
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
    </div>

      </main>
      </div>


  <!--  Scripts-->


@endsection
