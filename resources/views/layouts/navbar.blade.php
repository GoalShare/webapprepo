<!DOCTYPE html>
<html lang="en">
<head>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://apis.google.com/js/client.js"></script>
    <script src="https://sdk.amazonaws.com/js/aws-sdk-2.1.24.min.js"></script>
    <link rel="stylesheet" href="{{asset('materialize/css/materialize.css')}}">
    <meta name="description" content="Welcome to lifewithgoals.com. Set your life goals and track your achievements">
    <script src="{{asset('materialize/js/materialize.js')}}"></script>
    <meta charset="utf-8">
    <meta name="keywords" content="www.lifewithgoals.com, life, goals, lifewithgoals, goal management, goal management system, goals for life, set goals, add goals, search goals, make goals, create goals, aim, life aims, improve my life, my goals, my life goals, achive, manage life, etc.">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- You can use open graph tags to customize link previews.
    Learn more: https://developers.facebook.com/docs/sharing/webmasters -->

<meta property="og:type"            content="article" />
<meta property="og:url"             content="http://www.lifewithgoals.com" />
<meta property="og:title"           content="Introducing our New Site" />
<meta property="og:image"           content="" />
<meta property="og:description"    content="" />

  <script type="text/javascript" src="//platform.linkedin.com/in.js">
      api_key:   81te096pbtgr0p
      onLoad:    onLinkedInLoad
      authorize: true
      lang:      en_US


  </script>
    <title>Life With Goals</title>
{{-- favicon --}}
<link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon/favicon-32x32.png')}}">
<link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon/favicon-16x16.png')}}">
<link rel="manifest" href="{{asset('favicon/manifest.json')}}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="{{ asset('css/styles_goalcards.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <script src="{{asset('js/init.js')}}"></script>
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-102672548-1', 'auto');
    ga('send', 'pageview');
  </script>
<!-- goal page css-->
      <link href="{{asset('css/goal.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="{{asset('css/circle.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>

    <!-- -->

<style>
  body {
    display: flex;
    min-height: 100vh;
    flex-direction: column;
    }
  main {
    flex: 1 0 auto;
    }
    .front{
      position: absolute;
      margin-top: 20px;
    }
    .alignedCard{
      overflow-y: scroll;
      height: 200px;
    }
.footerCont{
  padding-left: 20px;
}
          #view-source {
            position: fixed;
            display: block;
            right: 0;
            bottom: 0;
            margin-right: 40px;
            margin-bottom: 40px;
            z-index: 900;
          }
      .mdl-layout__content {
        padding: 24px;
        flex: none;
      }
      .portfolio-max-width {
        max-width: 900px;
        margin: auto;
      }
      .team_hr {
          border: 1px solid #fff;
          width: 39.5%;
          float: left;
      }
      .team_hr_left {
          margin-right: 30px;
          margin-left: 15px;
      }
      .team_hr_right {
          margin-left: 30px;
      }
      .hr_gray {
          border: 1px solid #cccccc;
      }
      .drawer-separator {
        height: 1px;
        background-color: #dcdcdc;
        margin: 8px 0;
      }
      .img-size{
        align-items: center;
      }
    .containerholder {
    position: relative;
  }
    .overlay {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
    background:rgba(0, 0, 0, 0.6);
      z-index: 2;
      overflow: hidden;
      width: 100%;
      height: 0;
      transition: .5s ease;
    }
    .containerholder:hover .overlay {
      height: 100%;
    }
    .text {
      white-space: nowrap;
      color: white;
      font-size: 20px;
      position: absolute;
      overflow: hidden;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
    }
    .btn2{
      padding-top: 20px;
    }
    /*copy this class to everywhere*/
    .front{
        margin-top: 20px;
        position: relative;
      }
      .logoImg{
        margin-top: 15px;
      }
      .logoImg2{
        margin-top: 7px;
      }
      ::-webkit-scrollbar-track
      {
      	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
      	background-color: #F5F5F5;
      }
    ::-webkit-scrollbar
      {
      	width: 6px;
      	background-color:  #999999;
      }
    ::-webkit-scrollbar-thumb
      {
      	background-color:  #999999;
      }
    /*///*/
  </style>
</head>
<body>
    <nav>
      <div class="nav-wrapper blue darken-4 ">
        <ul class="left">
              <li><a href="#" data-activates="slide-out" class="button-collapse left"><i class="material-icons">menu</i></a></li>
              <li><img class="logoImg hide-on-small-only left" onclick="javascript:location.href='{{url('/dashboard')}}'"  src="{{asset('favicon/LOGO.png')}}" alt="" height="40px" width="200px"></li>
              <li><img class="logoImg2 hide-on-med-and-up left" onclick="javascript:location.href='{{url('/dashboard')}}'"  src="{{asset('favicon/favicon.ico')}}" ></li>
        </ul>
        <ul class="right ">
          <li>
            <form action="{{route('search')}}" method="post" id="search-form">
              {{ csrf_field()}}
              <input type="search" autocomplete="off" name="searchkey" placeholder="Search " id="search" class="searchbar blue-text text-darken-4 dropdown-button" data-hover="false" data-activates="suggestions">
            </form>
            <style media="screen">
            /*ul#suggestions {
              margin-top: -20px;
              list-style: none;
              margin: 0;
              padding: 0;
              width: 208px;
              display: none;
              z-index: 5;
            }
            ul#suggestions li {
            }
            ul#suggestions li a {
              display: block;
              min-height: 1em;
              padding: 0.5em 10px;
              background: #CCC;
              color: #000;
              text-decoration: none;
            }
            ul#suggestions li a:hover {
              background: #AAA;
            }*/
            </style>
            <ul class=" dropdown-content searchdrop center" style="margin-top:45px;min-width:300px;" id="suggestions">
            </ul>
            <script type="text/javascript">
            // note: IE8 doesn't support DOMContentLoaded
            document.addEventListener('DOMContentLoaded', function() {
              var suggestions = document.getElementById("suggestions");
              var form = document.getElementById("search-form");
              var action = form.getAttribute("action");
              var search = document.getElementById("search");
              function showSuggestions(json) {
                  var li_list = suggestionsToList(json);
                  suggestions.innerHTML = li_list;
                  suggestions.style.display = 'block';
                }
                function suggestionsToList(items) {
                  // <li><a href="search.php?q=alpha">Alpha</a></li>
                  var output = '';
                  for(i=0; i < items.length; i++) {
                    if((items[i].id)!={{Auth::id()}}){
                    output += '<li>';
                    output += '<a href="';
                    output += "/search/"+ items[i].id + "\">";
                    output += items[i].fname +' '+items[i].lname;
                    output += '</a>';
                    output += '</li><br>';
                  }
                  }
                  return output;
                }
              function getSuggestions() {
                var q = search.value;
                var form_data=new FormData(form);
                if(q.length < 2) {
                  suggestions.style.display = 'none';
                  return;
                }
                var xhr = new XMLHttpRequest();
                xhr.open('POST',action, true);
                xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                xhr.send(form_data);
                xhr.onreadystatechange = function () {
                  if(xhr.readyState == 4 && xhr.status == 200) {
                    var result = xhr.responseText;
                    console.log('Result: ' + result);
                    var json = JSON.parse(result);
                    showSuggestions(json);
                    // var json = JSON.parse(result);
                    // showSuggestions(json);
                  }
                };
              }
              // use "input" (every key), not "change" (must lose focus)
              search.addEventListener("input", getSuggestions);
            });

            </script>
          </li>
          <li><a class="dropdown-button" data-hover="false" data-activates="friendrequestdropdown" data-beloworigin="true" ><i class=" large material-icons ">people</i></a></li>
          <ul id="friendrequestdropdown" class='dropdown-content' style="min-width:300px;max-height:200px;">
            <li>
              @if ($friendrequest->isEmpty())
                <a class="center"><b>you don't have any friend requests</b></a>
              @else
              @foreach ($friendrequest as $friendrequests)
              <a  class="truncate">
              <img src="{{asset('uploads/avatars/'.$friendrequests->avatar)}}" alt="Contact Person" class="circle" height="40px" width="40px">
              &nbsp;&nbsp;{{$friendrequests->fname}}&nbsp;{{$friendrequests->lname}}
              <button class="btn-floating right" style="z-index:3000;" onclick="document.getElementById('{{$friendrequests->id}}frm').submit();"><i style="margin-top:-12px;" class="material-icons">person_add</i></button></a>
              <form class="inline" id="{{$friendrequests->id}}frm" style="display:inline;"action="{{route('confirmfriend')}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="userid" value="{{$friendrequests->id}}">
              </form>
            @endforeach
            @endif
            </li>
<!--            <li style="background-color:#dbdbdb;"><a><b>Show more</b><i class="material-icons">add</i></a></li>-->
          </ul>
          <li><span class="new badge red">4</span><a class="dropdown-button" data-hover="false" data-activates="noticationdropdown" data-beloworigin="true" ><i class="large material-icons ">notifications</i></a></li>
          <ul id="noticationdropdown" class='dropdown-content' style="min-width:300px;max-height:200px;">
              <li>
            @foreach ($notification as $notifications)
                <a>
                  <b><span onclick="window.location.href='{{url('/search/'.$notifications->user_id)}}'">{{$notifications->user_fname}} {{$notifications->user_lname}}</span></b> {{$notifications->authorization}} the goal <b><span onclick="window.location.href='{{ url('/goal/'.$notifications->goalid) }}'">{{ $notifications->goalname }}</span></b> to you.
                </a>
            @endforeach
              </li>
          </ul>
          <li class="hide-on-small-only" style="margin-top:-10px;"><a class="dropdown-button" data-beloworigin="true" data-alignment="center" data-hover="false" data-activates="profiledropdown"><img class="circle front z-depth-1" src="{{asset('uploads/avatars/'.Auth::User()->avatar)}}"width="40px" height="40px" ></a></li>
          <ul id="profiledropdown" class='dropdown-content' style="min-width:150px;">
            <li class="center-align"><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="material-icons">settings_power</i>Logout</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
            <li class="divider"></li>
            <li class="center-align"><a href="{{url('profile/'.Auth::id())}}"><i class="material-icons">account_circle</i>Profile</a></li>
          </ul>
        </ul>


      {{-- <li><a class="dropdown-button" href="#!" data-activates="dropdown1">ssdsds</a></li> --}}






      </div>
    </nav>
    </div>

    <!-- Dropdown Structure -->
    <ul id="slide-out" class="side-nav ">
      <li>
       <a href="{{url('profile/'.Auth::id())}}" ><i class="material-icons">person_pin</i><span class="black-text name"> {{Auth::User()->fname." ".Auth::User()->lname}}</span></a>
      </li>
       <li>
         <div class="container">
           {{-- <img class="circle front " src="{{asset('uploads/avatars/'.Auth::User()->avatar)}}" width="150px" height="150px" > --}}
           <a href="{{url('profile/'.Auth::id())}}" class="waves-effect"><img class="circle front z-depth-1" src="{{asset('uploads/avatars/'.Auth::User()->avatar)}}" width="160px" height="160px" ></a>
          <br>
         </div>
         <div class="divider"></div>
        </li>
         <div class="user-view">
           <li>
            <a href="{{url('profile/'.Auth::id())}}"><i class="material-icons">account_circle</i><span class="black-text email truncate">Go to Profile</span></a>
           </li>
        <li>
         <a href="{{url('profile/'.Auth::id())}}"><i class="material-icons">email</i><span class="black-text email truncate"> {{Auth::User()->email}}</span></a>
        </li>
       </div>
 <div class="divider">

 </div>
       <li><a href="{{url('/dashboard')}}">Dashboard<i class="material-icons">dashboard</i></a></li>
       <li><div class="divider"></div></li>
       <li><a class="waves-effect" href="{{url('/calendar')}}">My Schedule<i class="material-icons">date_range</i></a></li>
       <li><div class="divider"></div></li>
       <li><a class="waves-effect" href="{{url('/files')}}">My Documents<i class="material-icons">attach_file</i></a></li>
       <li><a class="waves-effect" href="#sendinvitebtnmodal">Send Invite<i class="material-icons">people</i></a></li>
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
              // document.getElementById("sendinvitebtnmodal").style.display="none";
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

                   }

                   document.getElementById("found2").innerHTML = '<span style="color:#0d47a1;font-size:17px;"><span>&nbsp&nbsp&nbsp</span>Connect with people you know on Gmail.</span>';
                   document.getElementById("found3").innerHTML = '<span><span>&nbsp&nbsp&nbsp&nbsp</span>We found'+" "+ count+" "+'people from your address book. Select the people you would like to connect to.</span>';

              }




              document.getElementById("demo11").innerHTML=text;


              // document.getElementById("myModal11").style.display="inline";







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
      <script>
      function windowclose(){
        document.getElementById("myModal11").style.display="none";
      }
      </script>
       <!-- subheaders -->
       {{-- <li><a class="subheader">&nbsp Pinned Goals</a></li>
       <li><a class="subheader">&nbsp  Goals</a></li> --}}
       <!-- // -->
       <li><div class="divider"></div></li>
       <li><a class="waves-effect" href="#!">Categories<i class="material-icons">toc</i></a></li>
       @foreach ($categorylist as $categorylists)
         <li><a class="col s9 truncate" href="{{ url('/dashboard/'.$categorylists->goalcategory) }}">&nbsp;&nbsp;&nbsp {{$categorylists->goalcategory}}</a></li>
       @endforeach
       <br>
       <li><div class="divider"></div></li>
       <li><a class="waves-effect" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('signout-form').submit();">Sign out<i class="material-icons">settings_power</i></a></li>
                <form id="signout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
       <div class="divider"></div>

     </ul>

    <!-- /head -->
    <!-- end of navbar -->



        @yield('content')

   <!-- footer -->
<footer class="page-footer blue darken-4"  >
         <div class="container">
           <div class="row">
             <div class="col l6 s12">
               <h5 class="white-text">Life With Goals</h5><br>

               <p class="white-text">
                 <a href="#" class="white-text footerCont" style=" font-size:x-small;">English(UK)</a>
                 <a href="" class="white-text footerCont" style=" font-size:x-small;">Sinhalese</a>
               </p>

               <div class="divider"></div>
               <p class="white-text">
                 <a href="{!! url('/aboutus'); !!}" class="white-text footerCont" style=" font-size:x-small;">About us</a>
                 <a href="{!! url('/aboutus'); !!}" class="white-text footerCont" style=" font-size:x-small;">  Support</a>
                 <a href="{!! url('/aboutus'); !!}" class="white-text footerCont" style=" font-size:x-small;"> Work with us</a>
               </p>
             </div>
           </div>
         </div>
         <div class="footer-copyright">
           <div class="container" style=" font-size:x-small;">
           © 2017 Copyright Text
           <!-- <a class="grey-text text-lighten-4 right" href="#!">More Links</a> -->
           </div>
         </div>
       </footer>
<!-- /footer -->


</body>
        <!-- Scripts -->
      <script>
      $('.dropdown-button').dropdown({
          inDuration: 300,
          outDuration: 225,
          constrainWidth: false, // Does not change width of dropdown to that of the activator
          hover: true, // Activate on hover
          gutter: 0, // Spacing from edge
          belowOrigin: false, // Displays dropdown below the button
          alignment: 'left', // Displays dropdown with edge aligned to the left of button
          stopPropagation: false // Stops event propagation
        }
      );
  $(document).ready(function(){
  $('.collapsible').collapsible();
});
  $(function(){
    $(document).ready(function(){
      // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
      $('.modal').modal();
    });
  });
  </script>

</html>
