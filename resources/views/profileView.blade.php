<!-- Start Page Loading -->
<!-- <div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div> -->
<!-- End Page Loading -->

@extends('layouts.navbar')

@section('content')

{{-- @include('layouts.friendsView') --}}
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link href="{{asset('/css/stylenewview.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
  <!-- Custome CSS-->
  <link href="{{asset('/css/custom-stylenewview.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
  <!-- CSS style Horizontal Nav (Layout 03)-->
  <link href="{{asset('/css/style-horizontalnewview.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="{{asset('/css/prismnewview.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{asset('/css/perfect-scrollbarnewview.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{asset('/css/chartistnewview.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
  </head>




<!--add goal form -->
<div id="addgoal" class="modal modal-fixed-footer ">
<div class="modal-content" style="text-align:center;">
  <h4>Add Your Goal</h4>
  <form enctype="multipart/form-data" action="{{route('dashboard')}}" method="post" id="addgoalform">
    {{ csrf_field() }}
      <div class="row blue lighten-5">
        <div class=" col l6 m6 s12 ">
          <div class="card-panel">
            <div class="input-field ">
              <input id="goalname" name="goalname" type="text" class="validate tooltipped" data-position="bottom" data-delay="50" data-tooltip="Enter your Goal Name " required>
              <label for="goalname">Goal Name</label>
            </div>
            <small>give a name to your Goal to easily access it</small>
          </div>
        </div>
        <div class=" col l6 m6 s12">
          <div class="card-panel">
          <div class="input-field">
            <input id="goalintent" name="goalintent" type="text" class="validate tooltipped" data-position="bottom" data-delay="50" data-tooltip="Enter your Goal intent " required>
            <label for="goalintent">Goal Intent</label>
          </div>
          <small>let us know what you want to achive with this goal</small>
          </div>
        </div>
      </div>
      <div class="row green lighten-5">
        <div class=" col l6 m6 s12">
          <div class="card-panel">
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
          </div>
         </div>
         <div class=" col l6 m6 s12">
           <div class="card-panel">
              <div class="input-field tooltipped" data-position="bottom" data-delay="50" data-tooltip="Select Goal category">
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
                <small>select the category in which your goal belongs from the given types of categories</small>
              </div>
            </div>
          <script type="text/javascript">
          $(document).ready(function() {
              $('select').material_select();
            });
          </script>
      </div>
      <div class="row indigo lighten-5">
       <div class="col l6 m6 s12">
        <div class="card-panel">
          <div class="input-field row">
            @php
              $month=date("n");
              $year=date("Y");
              $day=date("d");
            @endphp
           <select class="col s2" id="gsdatedropdown" onchange="gssetdob()">
             {{-- @if ($month==1||$month==3||$month==5||$month==7||$month==8||$month==10||$month==12)
               @for ($i=1; $i<32 ; $i++) --}}
                 {{-- <option value="{{ $i }}" {{ ($day==$i)?"selected":"" }}>{{ $i }}</option> --}}
               {{-- @endfor
             @elseif ($month==4||$month==6||$month==9||$month==11)
               @for ($i=1; $i<31 ; $i++) --}}
                 {{-- <option value="{{ $i }}" {{ ($day==$i)?"selected":"" }}>{{ $i }}</option> --}}
               {{-- @endfor
             @elseif ($month==2&&$year%4==0)
               @for ($i=1; $i<30 ; $i++) --}}
                 {{-- <option value="{{ $i }}" {{ ($day==$i)?"selected":"" }}>{{ $i }}</option> --}}
               {{-- @endfor
             @elseif ($month==2&&$year%4!=0)
               @for ($i=1; $i<29 ; $i++) --}}
                 {{-- <option value="{{ $i }}" {{ ($day==$i)?"selected":"" }}>{{ $i }}</option> --}}
               {{-- @endfor
             @endif --}}
             @for ($i=1; $i <=31 ; $i++)
               <option value="{{ $i }}" {{ ($day==$i)?"selected":"" }}>{{ $i }}</option>
             @endfor
           </select>
           <select class="col s6" id="gsmonthdropdown" onchange="gssetdatefunc()">
             <option data-month="JAN" value="01" {{ ($month==1)?"selected":"" }}>January</option>
             <option data-month="FEB" value="02" {{ ($month==2)?"selected":"" }}>February </option>
             <option data-month="MAR" value="03" {{ ($month==3)?"selected":"" }}>March </option>
             <option data-month="APR" value="04" {{ ($month==4)?"selected":"" }}>April</option>
             <option data-month="MAY" value="05" {{ ($month==5)?"selected":"" }}>May</option>
             <option data-month="JUN" value="06" {{ ($month==6)?"selected":"" }}>June </option>
             <option data-month="JUL" value="07" {{ ($month==7)?"selected":"" }}>July</option>
             <option data-month="AUG" value="08" {{ ($month==8)?"selected":"" }}>August</option>
             <option data-month="SEP" value="09" {{ ($month==9)?"selected":"" }}>September</option>
             <option data-month="OCT" value="10" {{ ($month==10)?"selected":"" }}>October</option>
             <option data-month="NOV" value="11" {{ ($month==11)?"selected":"" }}>November </option>
             <option data-month="DEC" value="12" {{ ($month==12)?"selected":"" }}>December </option>
           </select>
           <select class="col s4" id="gsyeardropdown" onchange="gsfebdates()">
             <option value="{{ $year }}" selected>{{ $year }}</option>
             @for ($i=($year+1); $i<($year+20) ; $i++)
               <option value="{{$i}}">{{ $i }}</option>
             @endfor
           </select>
           <label>Enter the starting date</label>
         </div>
         <small>Enter the date you are starting this Goal. Today's date will be automatically asigned</small>
        </div>
      </div>
      <input type="hidden" id="goalstartdate" name="goalstartdate" value="{{ $year }}-{{ $month }}-{{ $day }}">
      <script type="text/javascript">
      var gsdatedropdown=document.getElementById('gsdatedropdown');
      var gsmonthdropdown=document.getElementById('gsmonthdropdown');
      var gsyeardropdown=document.getElementById('gsyeardropdown');
      var goalstartdate=document.getElementById('goalstartdate');
      var d=new Date();
      function gsfebdates() {
        if (gsmonthdropdown.value==02) {

        if(gsyeardropdown.value%4 == 0)
        {
            if( gsyeardropdown.value%100 == 0)
            {
                // year is divisible by 400, hence the year is a leap year
                if ( gsyeardropdown.value%400 == 0){
                    gsdatedropdown.innerHTML="";
                    for (var i = 1; i <= 29; i++) {
                      gsdatedropdown.innerHTML+='<option value="'+i+'">'+i+'</option>';
                    }
                }
                else{
                    gsdatedropdown.innerHTML="";
                    for (var i = 1; i <= 28; i++) {
                      gsdatedropdown.innerHTML+='<option value="'+i+'">'+i+'</option>';
                    }
                }
            }
            else{
              gsdatedropdown.innerHTML="";
              for (var i = 1; i <= 29; i++) {
                gsdatedropdown.innerHTML+='<option value="'+i+'">'+i+'</option>';
              }
            }

      }

    }
      goalstartdate.value=gsyeardropdown.value+'-'+gsmonthdropdown.value+'-'+gsdatedropdown.value;
      console.log(goalstartdate.value);
    }

    function gssetdob() {
      goalstartdate.value=gsyeardropdown.value+'-'+gsmonthdropdown.value+'-'+gsdatedropdown.value;
      console.log(goalstartdate.value);
    }

      function gssetdatefunc() {
        if (gsmonthdropdown.value==02) {
            if(gsyeardropdown.value%4 == 0)
            {
                if( gsyeardropdown.value%100 == 0)
                {
                    // year is divisible by 400, hence the year is a leap year
                    if ( gsyeardropdown.value%400 == 0){
                        gsdatedropdown.innerHTML="";
                        for (var i = 1; i <= 29; i++) {
                          gsdatedropdown.innerHTML+='<option value="'+i+'">'+i+'</option>';
                        }
                    }
                    else{
                        gsdatedropdown.innerHTML="";
                        for (var i = 1; i <= 28; i++) {
                          gsdatedropdown.innerHTML+='<option value="'+i+'">'+i+'</option>';
                        }
                    }
                }
                else{
                  gsdatedropdown.innerHTML="";
                  for (var i = 1; i <= 29; i++) {
                    gsdatedropdown.innerHTML+='<option value="'+i+'">'+i+'</option>';
                  }
                }

            }
            else{
              gsdatedropdown.innerHTML="";
              for (var i = 1; i <= 28; i++) {
                gsdatedropdown.innerHTML+='<option value="'+i+'">'+i+'</option>';
              }
            }

        }
        else {
          if (gsmonthdropdown.value==01||gsmonthdropdown.value==03||gsmonthdropdown.value==05||gsmonthdropdown.value==07||gsmonthdropdown.value==08||gsmonthdropdown.value==010||gsmonthdropdown.value==12) {
            gsdatedropdown.innerHTML="";
            for (var i = 1; i <= 31; i++) {
              gsdatedropdown.innerHTML+='<option value="'+i+'">'+i+'</option>';
            }
          } else {
            gsdatedropdown.innerHTML="";
            for (var i = 1; i <= 30; i++) {
              gsdatedropdown.innerHTML+='<option value="'+i+'">'+i+'</option>';
            }
          }
        }
        goalstartdate.value=gsyeardropdown.value+'-'+gsmonthdropdown.value+'-'+gsdatedropdown.value;
        console.log(goalstartdate.value);
      }
      </script>
      <div class="col l6 m6 s12">
       <div class="card-panel">
         <div class="input-field row">
          <select class="col s2" id="gedatedropdown" onchange="gesetdob()" style="height:50px;">
            {{-- @if ($month==1||$month==3||$month==5||$month==7||$month==8||$month==10||$month==12)
              @for ($i=1; $i<32 ; $i++) --}}
                {{-- <option value="{{ $i }}" {{ ($day==$i)?"selected":"" }}>{{ $i }}</option> --}}
              {{-- @endfor
            @elseif ($month==4||$month==6||$month==9||$month==11)
              @for ($i=1; $i<31 ; $i++) --}}
                {{-- <option value="{{ $i }}" {{ ($day==$i)?"selected":"" }}>{{ $i }}</option> --}}
              {{-- @endfor
            @elseif ($month==2&&$year%4==0)
              @for ($i=1; $i<30 ; $i++) --}}
                {{-- <option value="{{ $i }}" {{ ($day==$i)?"selected":"" }}>{{ $i }}</option> --}}
              {{-- @endfor
            @elseif ($month==2&&$year%4!=0)
              @for ($i=1; $i<29 ; $i++) --}}
                {{-- <option value="{{ $i }}" {{ ($day==$i)?"selected":"" }}>{{ $i }}</option> --}}
              {{-- @endfor
            @endif --}}
            @for ($i=1; $i <=31 ; $i++)
              <option value="{{ $i }}" {{ ($day==$i)?"selected":"" }}>{{ $i }}</option>
            @endfor
          </select>
          <select class="col s6" id="gemonthdropdown" onchange="gesetdatefunc()">
            <option data-month="JAN" value="01" {{ ($month==1)?"selected":"" }}>January</option>
            <option data-month="FEB" value="02" {{ ($month==2)?"selected":"" }}>February </option>
            <option data-month="MAR" value="03" {{ ($month==3)?"selected":"" }}>March </option>
            <option data-month="APR" value="04" {{ ($month==4)?"selected":"" }}>April</option>
            <option data-month="MAY" value="05" {{ ($month==5)?"selected":"" }}>May</option>
            <option data-month="JUN" value="06" {{ ($month==6)?"selected":"" }}>June </option>
            <option data-month="JUL" value="07" {{ ($month==7)?"selected":"" }}>July</option>
            <option data-month="AUG" value="08" {{ ($month==8)?"selected":"" }}>August</option>
            <option data-month="SEP" value="09" {{ ($month==9)?"selected":"" }}>September</option>
            <option data-month="OCT" value="10" {{ ($month==10)?"selected":"" }}>October</option>
            <option data-month="NOV" value="11" {{ ($month==11)?"selected":"" }}>November </option>
            <option data-month="DEC" value="12" {{ ($month==12)?"selected":"" }}>December </option>
          </select>
          <select class="col s4" id="geyeardropdown" onchange="gefebdates()">
            <option value="{{ $year }}" selected>{{ $year }}</option>
            @for ($i=($year+1); $i<($year+20) ; $i++)
              <option value="{{$i}}">{{ $i }}</option>
            @endfor
          </select>
          <label>Enter the ending date</label>
        </div>
        <small>Enter the enddate of your goal.A date of two days from now will be automatically asigned</small>
       </div>
     </div>
     <input type="hidden" id="goalenddate" name="goalenddate" value="{{ $year }}-{{ $month }}-{{ $day+2 }}">
     <script type="text/javascript">
     var gedatedropdown=document.getElementById('gedatedropdown');
     var gemonthdropdown=document.getElementById('gemonthdropdown');
     var geyeardropdown=document.getElementById('geyeardropdown');
     var goalenddate=document.getElementById('goalenddate');
     function gefebdates() {
       if (gemonthdropdown.value==02) {

       if(geyeardropdown.value%4 == 0)
       {
           if( geyeardropdown.value%100 == 0)
           {
               // year is divisible by 400, hence the year is a leap year
               if ( geyeardropdown.value%400 == 0){
                   gedatedropdown.innerHTML="";
                   for (var i = 1; i <= 29; i++) {
                     gedatedropdown.innerHTML+='<option value="'+i+'">'+i+'</option>';
                   }
               }
               else{
                   gedatedropdown.innerHTML="";
                   for (var i = 1; i <= 28; i++) {
                     gedatedropdown.innerHTML+='<option value="'+i+'">'+i+'</option>';
                   }
               }
           }
           else{
             gedatedropdown.innerHTML="";
             for (var i = 1; i <= 29; i++) {
               gedatedropdown.innerHTML+='<option value="'+i+'">'+i+'</option>';
             }
           }

     }

   }
     goalstartdate.value=geyeardropdown.value+'-'+gemonthdropdown.value+'-'+gedatedropdown.value;
     console.log(goalenddate.value);
   }

   function gesetdob() {
     goalstartdate.value=geyeardropdown.value+'-'+gemonthdropdown.value+'-'+gedatedropdown.value;
     console.log(goalenddate.value);
   }

     function gesetdatefunc() {
       if (gemonthdropdown.value==02) {
           if(geyeardropdown.value%4 == 0)
           {
               if( geyeardropdown.value%100 == 0)
               {
                   // year is divisible by 400, hence the year is a leap year
                   if ( geyeardropdown.value%400 == 0){
                       gedatedropdown.innerHTML="";
                       for (var i = 1; i <= 29; i++) {
                         gedatedropdown.innerHTML+='<option value="'+i+'">'+i+'</option>';
                       }
                   }
                   else{
                       gedatedropdown.innerHTML="";
                       for (var i = 1; i <= 28; i++) {
                         gedatedropdown.innerHTML+='<option value="'+i+'">'+i+'</option>';
                       }
                   }
               }
               else{
                 gedatedropdown.innerHTML="";
                 for (var i = 1; i <= 29; i++) {
                   gedatedropdown.innerHTML+='<option value="'+i+'">'+i+'</option>';
                 }
               }

           }
           else{
             gedatedropdown.innerHTML="";
             for (var i = 1; i <= 28; i++) {
               gedatedropdown.innerHTML+='<option value="'+i+'">'+i+'</option>';
             }
           }

       }
       else {
         if (gemonthdropdown.value==01||gemonthdropdown.value==03||gemonthdropdown.value==05||gemonthdropdown.value==07||gemonthdropdown.value==08||gemonthdropdown.value==010||gemonthdropdown.value==12) {
           gedatedropdown.innerHTML="";
           for (var i = 1; i <= 31; i++) {
             gedatedropdown.innerHTML+='<option value="'+i+'">'+i+'</option>';
           }
         } else {
           gedatedropdown.innerHTML="";
           for (var i = 1; i <= 30; i++) {
             gedatedropdown.innerHTML+='<option value="'+i+'">'+i+'</option>';
           }
         }
       }
       goalstartdate.value=geyeardropdown.value+'-'+gemonthdropdown.value+'-'+gedatedropdown.value;
       console.log(goalenddate.value);
     }
     </script>
      </div>
<input type="hidden" style="display:none;" name="action" value="2">
</div>
<div class="modal-footer" style="height:18%;">
        <button type="submit" id="addgoalbtn" style="margin-right:10px;margin-left:10px;"class="modal-action waves-effectwaves-effect waves-light btn center">Add Goal</button>
        <a onclick="$('#addgoal').modal('close');"style="margin-right:10px;margin-left:10px;"class="model-close waves-effectwaves-effect waves-light btn center">cancel</a>
        <div class="file-field input-field left">
          <div class="btn btn-floating">
            <span><i class="material-icons">photo</i></span>
            <input type="file" name="goalpicture">
          </div>
          <div class="file-path-wrapper">
            <input  style="display:none;"class="file-path validate tooltipped" data-position="bottom" data-delay="50" data-tooltip="Upload Your Goal Picture" type="text" name="goalpicturepath">
          </div>
        </div>
</form>
</div>
</div>
<div class="row">

    <div class="container">
      <div class="row hide-on-small-only">
        <br><br>
        <div class="col l1 m1  center-align"></div>
        <div class="col l2 m2  center-align">
          <span class=" red-text "><b>New Goal</b></span><br>
          <a href="#addgoal" class="btn btn-floating red btn-large "><i class="material-icons">add</i></a>
        </div>
        <div class="col l2 m2  center-align">
          <span class=" blue-text text-lighten-1"><b>Send Invite</b></span><br>
          <!-- <a class="btn btn-floating blue lighten-1 btn-large googleContactsButton" href="#myModal11"><i class="material-icons">people</i></a> -->
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
          <span class=" blue-text text-darken-4"><b>Knowledge Hub</b></span><br>
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
<style media="screen">
  .card .cambtnnew{

    position:absolute;
    z-index: 4;
    margin-left: 30px;
    margin-top: -95px;


  }

  .card .covercambtnnew{
    position:absolute;
    z-index: 4;
    margin-left: 5px;
    margin-top: -10px;
  }

  .hidden{
    visibility: hidden;
  }

    .cammob{
        margin-bottom: 200px;
    }
</style>


    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- START CONTENT -->
    <section id="content">
      <!--start container-->
        <div id="profile-page" class="section">
          <div class="row">
          <!-- profile-page-header -->


          <div class="col l12 m12 s12">
            <div id="profile-page-header" class="card">
              <div class="covercambtnnew hide-on-med-and-down" id="imgoverlayfade">
                      <form style=""enctype="multipart/form-data" action="{{route('profilecover')}}" method="post" id="addprofilepicfrm">
                        {{ csrf_field() }}
                          <p class="white-text">
                            <div class="file-field input-field"  >
                              <div class="btn btn-floating">
                            <i class="material-icons tooltipped" data-position="bottom" data-delay="50" data-tooltip="Upload Profile Picture" >camera_alt</i>
                            <input type="file" name="coverpic"  onchange="javascript:this.form.submit();">
                          </div>
                        </div>
                          </p>
                        </form>
                  </div>


                  <div class="covercambtnnew hide-on-med-and-down" id="imgoverlayfade">
                    <form style=""enctype="multipart/form-data" action="{{route('profilecover')}}" method="post" id="addprofilepicfrm">
                      {{ csrf_field() }}
                        <p class="white-text">
                          <div class="file-field input-field"  >
                            <div class="btn btn-floating">
                  <i class="material-icons tooltipped" data-position="bottom" data-delay="50" data-tooltip="Upload Profile Picture" >camera_alt</i>
                    <input type="file" name="coverpic"  onchange="javascript:this.form.submit();">
                </div>
                </div>
                </p>
                </form>
                </div>



                <div class="card-image waves-effect waves-block waves-light">
                    <!-- <img class="activator" src="imagesnewview/user-profile-bg.jpg" alt="user background"> -->
                     <img class="activator" src="{{asset('uploads/cover/'.Auth::User()->usercover)}}" alt="user background" class="img-cover responsive-img">
                </div>


                          <div class=" btn btn-floating hide-on-med-and-up" style="margin-top:-375px;margin-left:35%;z-index:5;">
                            <form style=""enctype="multipart/form-data" action="{{route('profile')}}" method="post" id="addprofilepicfrm">
                              {{ csrf_field() }}
                                  <div class="file-field">
                                <i class="material-icons">camera_alt</i>
                                  <input type="file" name="profilepic"  onchange="javascript:this.form.submit();">
                              </div>
                              </form>
                          </div>

                          <div class="cambtnnew hide-on-med-and-down" id="imgoverlayfade">
                              <form style=""enctype="multipart/form-data" action="{{route('profile')}}" method="post" id="addprofilepicfrm">
                                  {{ csrf_field() }}
                                    <p class="white-text">
                                        <div class="file-field input-field"  >
                                              <div class="btn btn-floating">
                                            <i class="material-icons tooltipped" data-position="bottom" data-delay="50" data-tooltip="Upload Profile Picture" >camera_alt</i>
                                            <input type="file" name="profilepic"  onchange="javascript:this.form.submit();">
                                          </div>
                                        </div>
                                    </p>
                                </form>
                            </div>

              <figure id="imageWrapper" class="card-profile-image hide-on-med-and-down">
                  <!-- <img src="imagesnewview/avatar.jpg" alt="profile image" class="circle z-depth-2 responsive-img activator"> -->
                   <img src="{{asset('uploads/avatars/'.Auth::User()->avatar)}}" alt="profile image" class="circle z-depth-2 responsive-img activator img-thumbnail img-profile" style="border: 5px solid white;box-shadow: 0 0 3px 3px rgba(0,0,0,0.6);">
              </figure>

<div class="row hide-on-med-and-up">
  <div class="col l12 s12 m12">

    <figure id="imageWrapper" class="card-profile-image" style="margin-top:-125px;margin-left:25%;">
        <img src="{{asset('uploads/avatars/'.Auth::User()->avatar)}}" alt="profile image" class="circle z-depth-2 responsive-img activator img-thumbnail img-profile" style="border: 5px solid white;box-shadow: 0 0 3px 3px rgba(0,0,0,0.6);">
    </figure>

  </div>
</div>

              <script type="text/javascript">
                document.getElementById("imgoverlayfade").style.display='none';
                var imageWrapper = document.getElementById('imageWrapper');
                var imageprof = document.getElementById('imageprof');
                var profilepic=document.getElementById("profilepic");
                profilepic.addEventListener("mouseover",mouseOver);
                profilepic.addEventListener("mouseout",mouseOut);
                imageWrapper.addEventListener("mouseover",wrapperShow);
                imageWrapper.addEventListener("mouseout",WrapperDis);
                imageprof.addEventListener("mouseover",WrapperDis1);
                imageprof.addEventListener("mouseout",WrapperDis1);

                var dob=0;
                var phone=0;
                function mouseOver(){
                  document.getElementById("imgoverlayfade").style.display='inline';
                }
                function mouseOut(){
                  document.getElementById("imgoverlayfade").style.display='none';
                }
              </script>

              <div class="card-content">
                <div class="row hide-on-small-only">
                  <div class="col l6 m6 s12">
                  <form id="infoform" action="{{route('modifyprofile')}}" method="post" >


                  <br><br>
                    <h4 class="card-title grey-text text-darken-4"><span id="names" onclick="displaynameedit()">{{Auth::User()->fname}}  {{Auth::User()->lname}}</span></h4>
                    <div class="row" id="namefields" style="display:none;">

                    <div class="input-field col s12 l5 m5">
                      <input type="text"  id="fname" name="fname" value="{{Auth::User()->fname}}" placeholder="{{Auth::User()->fname}}" required></input>
                    </div>

                    <div class="input-field col s10 l5 m5">
                      <input type="text" id="lname"  name="lname" value="{{Auth::User()->lname}}" placeholder="{{Auth::User()->lname}}" required></input>
                    </div>

                    <div class="input-field col s2 l2 m2" style="padding-top:3px;">
                         <a style="cursor:pointer;" class="blue-text text-darken-4"  id="modifyname"><i class="material-icons">done</i></a>
                    </div>
                  </div>
                  <span class="flow-text" id="existdetails"><span id="useremail" style="font-size:20px;">{{Auth::User()->email}}</span></span><br>
                    <span class="flow-text" id="userphone" onclick="displayphoneedit()" style="font-size:20px;">+{{Auth::User()->countrycode}}-{{Auth::User()->phone}}</span><br>



                    <div class="row" id="phonerow" style="display:none;">
                      <div class="input-field col l3 m3 s3">
                        <select name="countrycode" id="countryCode" >
                           <option value="{{Auth::User()->countrycode}}" selected>+{{Auth::User()->countrycode}}</option>
                           <option data-countryCode="DZ" value="213">Algeria (+213)</option>
                           <option data-countryCode="AD" value="376">Andorra (+376)</option>
                           <option data-countryCode="AO" value="244">Angola (+244)</option>
                           <option data-countryCode="AI" value="1264">Anguilla (+1264)</option>
                           <option data-countryCode="AG" value="1268">Antigua &amp; Barbuda (+1268)</option>
                           <option data-countryCode="AR" value="54">Argentina (+54)</option>
                           <option data-countryCode="AM" value="374">Armenia (+374)</option>
                           <option data-countryCode="AW" value="297">Aruba (+297)</option>
                           <option data-countryCode="AU" value="61">Australia (+61)</option>
                           <option data-countryCode="AT" value="43">Austria (+43)</option>
                           <option data-countryCode="AZ" value="994">Azerbaijan (+994)</option>
                           <option data-countryCode="BS" value="1242">Bahamas (+1242)</option>
                           <option data-countryCode="BH" value="973">Bahrain (+973)</option>
                           <option data-countryCode="BD" value="880">Bangladesh (+880)</option>
                           <option data-countryCode="BB" value="1246">Barbados (+1246)</option>
                           <option data-countryCode="BY" value="375">Belarus (+375)</option>
                           <option data-countryCode="BE" value="32">Belgium (+32)</option>
                           <option data-countryCode="BZ" value="501">Belize (+501)</option>
                           <option data-countryCode="BJ" value="229">Benin (+229)</option>
                           <option data-countryCode="BM" value="1441">Bermuda (+1441)</option>
                           <option data-countryCode="BT" value="975">Bhutan (+975)</option>
                           <option data-countryCode="BO" value="591">Bolivia (+591)</option>
                           <option data-countryCode="BA" value="387">Bosnia Herzegovina (+387)</option>
                           <option data-countryCode="BW" value="267">Botswana (+267)</option>
                           <option data-countryCode="BR" value="55">Brazil (+55)</option>
                           <option data-countryCode="BN" value="673">Brunei (+673)</option>
                           <option data-countryCode="BG" value="359">Bulgaria (+359)</option>
                           <option data-countryCode="BF" value="226">Burkina Faso (+226)</option>
                           <option data-countryCode="BI" value="257">Burundi (+257)</option>
                           <option data-countryCode="KH" value="855">Cambodia (+855)</option>
                           <option data-countryCode="CM" value="237">Cameroon (+237)</option>
                           <option data-countryCode="CA" value="1">Canada (+1)</option>
                           <option data-countryCode="CV" value="238">Cape Verde Islands (+238)</option>
                           <option data-countryCode="KY" value="1345">Cayman Islands (+1345)</option>
                           <option data-countryCode="CF" value="236">Central African Republic (+236)</option>
                           <option data-countryCode="CL" value="56">Chile (+56)</option>
                           <option data-countryCode="CN" value="86">China (+86)</option>
                           <option data-countryCode="CO" value="57">Colombia (+57)</option>
                           <option data-countryCode="KM" value="269">Comoros (+269)</option>
                           <option data-countryCode="CG" value="242">Congo (+242)</option>
                           <option data-countryCode="CK" value="682">Cook Islands (+682)</option>
                           <option data-countryCode="CR" value="506">Costa Rica (+506)</option>
                           <option data-countryCode="HR" value="385">Croatia (+385)</option>
                           <option data-countryCode="CU" value="53">Cuba (+53)</option>
                           <option data-countryCode="CY" value="90392">Cyprus North (+90392)</option>
                           <option data-countryCode="CY" value="357">Cyprus South (+357)</option>
                           <option data-countryCode="CZ" value="42">Czech Republic (+42)</option>
                           <option data-countryCode="DK" value="45">Denmark (+45)</option>
                           <option data-countryCode="DJ" value="253">Djibouti (+253)</option>
                           <option data-countryCode="DM" value="1809">Dominica (+1809)</option>
                           <option data-countryCode="DO" value="1809">Dominican Republic (+1809)</option>
                           <option data-countryCode="EC" value="593">Ecuador (+593)</option>
                           <option data-countryCode="EG" value="20">Egypt (+20)</option>
                           <option data-countryCode="SV" value="503">El Salvador (+503)</option>
                           <option data-countryCode="GQ" value="240">Equatorial Guinea (+240)</option>
                           <option data-countryCode="ER" value="291">Eritrea (+291)</option>
                           <option data-countryCode="EE" value="372">Estonia (+372)</option>
                           <option data-countryCode="ET" value="251">Ethiopia (+251)</option>
                           <option data-countryCode="FK" value="500">Falkland Islands (+500)</option>
                           <option data-countryCode="FO" value="298">Faroe Islands (+298)</option>
                           <option data-countryCode="FJ" value="679">Fiji (+679)</option>
                           <option data-countryCode="FI" value="358">Finland (+358)</option>
                           <option data-countryCode="FR" value="33">France (+33)</option>
                           <option data-countryCode="GF" value="594">French Guiana (+594)</option>
                           <option data-countryCode="PF" value="689">French Polynesia (+689)</option>
                           <option data-countryCode="GA" value="241">Gabon (+241)</option>
                           <option data-countryCode="GM" value="220">Gambia (+220)</option>
                           <option data-countryCode="GE" value="7880">Georgia (+7880)</option>
                           <option data-countryCode="DE" value="49">Germany (+49)</option>
                           <option data-countryCode="GH" value="233">Ghana (+233)</option>
                           <option data-countryCode="GI" value="350">Gibraltar (+350)</option>
                           <option data-countryCode="GR" value="30">Greece (+30)</option>
                           <option data-countryCode="GL" value="299">Greenland (+299)</option>
                           <option data-countryCode="GD" value="1473">Grenada (+1473)</option>
                           <option data-countryCode="GP" value="590">Guadeloupe (+590)</option>
                           <option data-countryCode="GU" value="671">Guam (+671)</option>
                           <option data-countryCode="GT" value="502">Guatemala (+502)</option>
                           <option data-countryCode="GN" value="224">Guinea (+224)</option>
                           <option data-countryCode="GW" value="245">Guinea - Bissau (+245)</option>
                           <option data-countryCode="GY" value="592">Guyana (+592)</option>
                           <option data-countryCode="HT" value="509">Haiti (+509)</option>
                           <option data-countryCode="HN" value="504">Honduras (+504)</option>
                           <option data-countryCode="HK" value="852">Hong Kong (+852)</option>
                           <option data-countryCode="HU" value="36">Hungary (+36)</option>
                           <option data-countryCode="IS" value="354">Iceland (+354)</option>
                           <option data-countryCode="IN" value="91">India (+91)</option>
                           <option data-countryCode="ID" value="62">Indonesia (+62)</option>
                           <option data-countryCode="IR" value="98">Iran (+98)</option>
                           <option data-countryCode="IQ" value="964">Iraq (+964)</option>
                           <option data-countryCode="IE" value="353">Ireland (+353)</option>
                           <option data-countryCode="IL" value="972">Israel (+972)</option>
                           <option data-countryCode="IT" value="39">Italy (+39)</option>
                           <option data-countryCode="JM" value="1876">Jamaica (+1876)</option>
                           <option data-countryCode="JP" value="81">Japan (+81)</option>
                           <option data-countryCode="JO" value="962">Jordan (+962)</option>
                           <option data-countryCode="KZ" value="7">Kazakhstan (+7)</option>
                           <option data-countryCode="KE" value="254">Kenya (+254)</option>
                           <option data-countryCode="KI" value="686">Kiribati (+686)</option>
                           <option data-countryCode="KP" value="850">Korea North (+850)</option>
                           <option data-countryCode="KR" value="82">Korea South (+82)</option>
                           <option data-countryCode="KW" value="965">Kuwait (+965)</option>
                           <option data-countryCode="KG" value="996">Kyrgyzstan (+996)</option>
                           <option data-countryCode="LA" value="856">Laos (+856)</option>
                           <option data-countryCode="LV" value="371">Latvia (+371)</option>
                           <option data-countryCode="LB" value="961">Lebanon (+961)</option>
                           <option data-countryCode="LS" value="266">Lesotho (+266)</option>
                           <option data-countryCode="LR" value="231">Liberia (+231)</option>
                           <option data-countryCode="LY" value="218">Libya (+218)</option>
                           <option data-countryCode="LI" value="417">Liechtenstein (+417)</option>
                           <option data-countryCode="LT" value="370">Lithuania (+370)</option>
                           <option data-countryCode="LU" value="352">Luxembourg (+352)</option>
                           <option data-countryCode="MO" value="853">Macao (+853)</option>
                           <option data-countryCode="MK" value="389">Macedonia (+389)</option>
                           <option data-countryCode="MG" value="261">Madagascar (+261)</option>
                           <option data-countryCode="MW" value="265">Malawi (+265)</option>
                           <option data-countryCode="MY" value="60">Malaysia (+60)</option>
                           <option data-countryCode="MV" value="960">Maldives (+960)</option>
                           <option data-countryCode="ML" value="223">Mali (+223)</option>
                           <option data-countryCode="MT" value="356">Malta (+356)</option>
                           <option data-countryCode="MH" value="692">Marshall Islands (+692)</option>
                           <option data-countryCode="MQ" value="596">Martinique (+596)</option>
                           <option data-countryCode="MR" value="222">Mauritania (+222)</option>
                           <option data-countryCode="YT" value="269">Mayotte (+269)</option>
                           <option data-countryCode="MX" value="52">Mexico (+52)</option>
                           <option data-countryCode="FM" value="691">Micronesia (+691)</option>
                           <option data-countryCode="MD" value="373">Moldova (+373)</option>
                           <option data-countryCode="MC" value="377">Monaco (+377)</option>
                           <option data-countryCode="MN" value="976">Mongolia (+976)</option>
                           <option data-countryCode="MS" value="1664">Montserrat (+1664)</option>
                           <option data-countryCode="MA" value="212">Morocco (+212)</option>
                           <option data-countryCode="MZ" value="258">Mozambique (+258)</option>
                           <option data-countryCode="MN" value="95">Myanmar (+95)</option>
                           <option data-countryCode="NA" value="264">Namibia (+264)</option>
                           <option data-countryCode="NR" value="674">Nauru (+674)</option>
                           <option data-countryCode="NP" value="977">Nepal (+977)</option>
                           <option data-countryCode="NL" value="31">Netherlands (+31)</option>
                           <option data-countryCode="NC" value="687">New Caledonia (+687)</option>
                           <option data-countryCode="NZ" value="64">New Zealand (+64)</option>
                           <option data-countryCode="NI" value="505">Nicaragua (+505)</option>
                           <option data-countryCode="NE" value="227">Niger (+227)</option>
                           <option data-countryCode="NG" value="234">Nigeria (+234)</option>
                           <option data-countryCode="NU" value="683">Niue (+683)</option>
                           <option data-countryCode="NF" value="672">Norfolk Islands (+672)</option>
                           <option data-countryCode="NP" value="670">Northern Marianas (+670)</option>
                           <option data-countryCode="NO" value="47">Norway (+47)</option>
                           <option data-countryCode="OM" value="968">Oman (+968)</option>
                           <option data-countryCode="PW" value="680">Palau (+680)</option>
                           <option data-countryCode="PA" value="507">Panama (+507)</option>
                           <option data-countryCode="PG" value="675">Papua New Guinea (+675)</option>
                           <option data-countryCode="PY" value="595">Paraguay (+595)</option>
                           <option data-countryCode="PE" value="51">Peru (+51)</option>
                           <option data-countryCode="PH" value="63">Philippines (+63)</option>
                           <option data-countryCode="PL" value="48">Poland (+48)</option>
                           <option data-countryCode="PT" value="351">Portugal (+351)</option>
                           <option data-countryCode="PR" value="1787">Puerto Rico (+1787)</option>
                           <option data-countryCode="QA" value="974">Qatar (+974)</option>
                           <option data-countryCode="RE" value="262">Reunion (+262)</option>
                           <option data-countryCode="RO" value="40">Romania (+40)</option>
                           <option data-countryCode="RU" value="7">Russia (+7)</option>
                           <option data-countryCode="RW" value="250">Rwanda (+250)</option>
                           <option data-countryCode="SM" value="378">San Marino (+378)</option>
                           <option data-countryCode="ST" value="239">Sao Tome &amp; Principe (+239)</option>
                           <option data-countryCode="SA" value="966">Saudi Arabia (+966)</option>
                           <option data-countryCode="SN" value="221">Senegal (+221)</option>
                           <option data-countryCode="CS" value="381">Serbia (+381)</option>
                           <option data-countryCode="SC" value="248">Seychelles (+248)</option>
                           <option data-countryCode="SL" value="232">Sierra Leone (+232)</option>
                           <option data-countryCode="SG" value="65">Singapore (+65)</option>
                           <option data-countryCode="SK" value="421">Slovak Republic (+421)</option>
                           <option data-countryCode="SI" value="386">Slovenia (+386)</option>
                           <option data-countryCode="SB" value="677">Solomon Islands (+677)</option>
                           <option data-countryCode="SO" value="252">Somalia (+252)</option>
                           <option data-countryCode="ZA" value="27">South Africa (+27)</option>
                           <option data-countryCode="ES" value="34">Spain (+34)</option>
                           <option data-countryCode="LK" value="94">Sri Lanka (+94)</option>
                           <option data-countryCode="SH" value="290">St. Helena (+290)</option>
                           <option data-countryCode="KN" value="1869">St. Kitts (+1869)</option>
                           <option data-countryCode="SC" value="1758">St. Lucia (+1758)</option>
                           <option data-countryCode="SD" value="249">Sudan (+249)</option>
                           <option data-countryCode="SR" value="597">Suriname (+597)</option>
                           <option data-countryCode="SZ" value="268">Swaziland (+268)</option>
                           <option data-countryCode="SE" value="46">Sweden (+46)</option>
                           <option data-countryCode="CH" value="41">Switzerland (+41)</option>
                           <option data-countryCode="SI" value="963">Syria (+963)</option>
                           <option data-countryCode="TW" value="886">Taiwan (+886)</option>
                           <option data-countryCode="TJ" value="7">Tajikstan (+7)</option>
                           <option data-countryCode="TH" value="66">Thailand (+66)</option>
                           <option data-countryCode="TG" value="228">Togo (+228)</option>
                           <option data-countryCode="TO" value="676">Tonga (+676)</option>
                           <option data-countryCode="TT" value="1868">Trinidad &amp; Tobago (+1868)</option>
                           <option data-countryCode="TN" value="216">Tunisia (+216)</option>
                           <option data-countryCode="TR" value="90">Turkey (+90)</option>
                           <option data-countryCode="TM" value="7">Turkmenistan (+7)</option>
                           <option data-countryCode="TM" value="993">Turkmenistan (+993)</option>
                           <option data-countryCode="TC" value="1649">Turks &amp; Caicos Islands (+1649)</option>
                           <option data-countryCode="TV" value="688">Tuvalu (+688)</option>
                           <option data-countryCode="UG" value="256">Uganda (+256)</option>
                           <option data-countryCode="GB" value="44">UK (+44)</option>
                           <option data-countryCode="UA" value="380">Ukraine (+380)</option>
                           <option data-countryCode="AE" value="971">United Arab Emirates (+971)</option>
                           <option data-countryCode="UY" value="598">Uruguay (+598)</option>
                           <option data-countryCode="US" value="1">USA (+1)</option>
                           <option data-countryCode="UZ" value="7">Uzbekistan (+7)</option>
                           <option data-countryCode="VU" value="678">Vanuatu (+678)</option>
                           <option data-countryCode="VA" value="379">Vatican City (+379)</option>
                           <option data-countryCode="VE" value="58">Venezuela (+58)</option>
                           <option data-countryCode="VN" value="84">Vietnam (+84)</option>
                           <option data-countryCode="VG" value="84">Virgin Islands - British (+1284)</option>
                           <option data-countryCode="VI" value="84">Virgin Islands - US (+1340)</option>
                           <option data-countryCode="WF" value="681">Wallis &amp; Futuna (+681)</option>
                           <option data-countryCode="YE" value="969">Yemen (North)(+969)</option>
                           <option data-countryCode="YE" value="967">Yemen (South)(+967)</option>
                           <option data-countryCode="ZM" value="260">Zambia (+260)</option>
                           <option data-countryCode="ZW" value="263">Zimbabwe (+263)</option>
                        </select>
                        <label for="countrycode ">
                          country code
                        </label>
                        <script type="text/javascript">
                        $(document).ready(function() {
                           $('select').material_select();
                         });
                        </script>
                      </div>
                      <div class="input-field col  l7 m7 s7" >
                        <input id="phoneNumber" name="phone" oninput="validphone()" type="tel" class="validate" placeholder="{{Auth::User()->phone}}" value="{{Auth::User()->phone}}">
                        <span class="red-text" id="phoneNumbererror"></span>
                        <script type="text/javascript">
                        var phoneNumber=document.getElementById("phoneNumber");
                        var phoneNumbererror=document.getElementById("phoneNumbererror");
                        function validphone() {
                          var z=phoneNumber.value;
                          if(z.length<9) {
                            phoneNumbererror.classList.remove('green-text');
                            phoneNumber.style.borderColor = "red";
                            phoneNumbererror.classList.add('red-text');
                            phoneNumbererror.innerHTML='phone no. must contain more than 9 digits ';
                            phone=0;
                            if( dob!=1 || phone!=1){
                              document.getElementById("modifyprofile").disabled=true;
                            }
                          }
                          else {
                            phoneNumbererror.classList.remove('red-text');
                            phoneNumbererror.classList.add('green-text');
                            phoneNumbererror.innerHTML='valid';
                            phoneNumber.style.borderColor = "green";
                            phone=1;
                            if(phone==1 && dob==1){
                              document.getElementById("modifyprofile").disabled=false;
                            }
                          }
                        }
                        </script>
                      </div>
                      <div class="input-field col s2 l2 m2" style="padding-top:3px;">
                           <a type="submit" style="cursor:pointer;" class="blue-text text-darken-4"  id="modifyphone"><i class="material-icons">done</i></a>
                      </div>


                     <script type="text/javascript">
                      var useragreement=document.getElementById("useragreement");
                      useragreement.addEventListener("change",accept);
                      function accept() {

                        if (useragreement.checked) {
                          document.getElementById("register").disabled=false;
                        }
                        else {
                          document.getElementById("register").disabled=true;
                        }
                      }
                    </script>
                    </div>


<span class="flow-text" id="userdob" onclick="displaydobedit()" style="font-size:20px;">{{Auth::User()->dob}}</span>
<br><br><br>
{{csrf_field()}}
<input type="hidden" id="dob" name="dob" value="{{Auth::User()->dob}}">
<div class="row" id="dobrow"style="display:none;">
<div class="input-field col s3" >
<select id="datedropdown" oninput="setdob()"  name="">
 @for ($i=1; $i <=31 ; $i++)
   <option data-date="{{$i}}" value="{{$i}}">{{$i}}</option>
 @endfor
</select>
</div>
<div class="input-field col s4">
<select name="month" id="monthdropdown" oninput="setdatefunc()">
   <option data-month="JAN" value="01" selected>January</option>
   <option data-month="FEB" value="02">February </option>
   <option data-month="MAR" value="03">March </option>
   <option data-month="APR" value="04">April</option>
   <option data-month="MAY" value="05">May</option>
   <option data-month="JUN" value="06">June </option>
   <option data-month="JUL" value="07">July</option>
   <option data-month="AUG" value="08">August</option>
   <option data-month="SEP" value="09">September</option>
   <option data-month="OCT" value="10">October</option>
   <option data-month="NOV" value="11">November </option>
   <option data-month="DEC" value="12">December </option>
 </select>
</div>
<div class="input-field col s3">
<select id="yeardropdown" oninput="febdates()" name="">
 @for ($i=2001; $i >=1920 ; $i--)
   <option data-year="{{$i}}" value="{{$i}}">{{$i}}</option>
 @endfor
</select>
</div>
<div class="input-field col s2 l2 m2" style="padding-top:3px;">
<a type="submit" style="cursor:pointer;" class="blue-text text-darken-4"  id="modifydob"><i class="material-icons">done</i></a>
</div>
<script type="text/javascript">
var datedropdown=document.getElementById('datedropdown');
var monthdropdown=document.getElementById('monthdropdown');
var yeardropdown=document.getElementById('yeardropdown');
var dob=document.getElementById('dob');

function setdob() {
dob.value=yeardropdown.value+'-'+monthdropdown.value+'-'+datedropdown.value;
console.log(dob.value);
}

function febdates() {
if (monthdropdown.value==02) {

if(yeardropdown.value%4 == 0)
{
 if( yeardropdown.value%100 == 0)
 {
     // year is divisible by 400, hence the year is a leap year
     if ( yeardropdown.value%400 == 0){
         datedropdown.innerHTML='';
         for (var i = 1; i <= 29; i++) {
           datedropdown.innerHTML+='<option value="'+i+'">'+i+'</option>';
         }
     }
     else{
         datedropdown.innerHTML='';
         for (var i = 1; i <= 28; i++) {
           datedropdown.innerHTML+='<option value="'+i+'">'+i+'</option>';
         }
     }
 }
 else{
   datedropdown.innerHTML='';
   for (var i = 1; i <= 29; i++) {
     datedropdown.innerHTML+='<option value="'+i+'">'+i+'</option>';
   }
 }

}

}
dob.value=yeardropdown.value+'-'+monthdropdown.value+'-'+datedropdown.value;
console.log(dob.value);
}
function setdatefunc() {
// console.log(monthdropdown.value);
// console.log(yeardropdown.value);
if (monthdropdown.value==02) {
   if(yeardropdown.value%4 == 0)
   {
       if( yeardropdown.value%100 == 0)
       {
           // year is divisible by 400, hence the year is a leap year
           if ( yeardropdown.value%400 == 0){
               datedropdown.innerHTML='';
               for (var i = 1; i <= 29; i++) {
                 datedropdown.innerHTML+='<option value="'+i+'">'+i+'</option>';
               }
           }
           else{
               datedropdown.innerHTML='';
               for (var i = 1; i <= 28; i++) {
                 datedropdown.innerHTML+='<option value="'+i+'">'+i+'</option>';
               }
           }
       }
       else{
         datedropdown.innerHTML='';
         for (var i = 1; i <= 29; i++) {
           datedropdown.innerHTML+='<option value="'+i+'">'+i+'</option>';
         }
       }

   }
   else{
     datedropdown.innerHTML='';
     for (var i = 1; i <= 28; i++) {
       datedropdown.innerHTML+='<option value="'+i+'">'+i+'</option>';
     }
   }

}
else {
 if (monthdropdown.value==01||monthdropdown.value==03||monthdropdown.value==05||monthdropdown.value==07||monthdropdown.value==08||monthdropdown.value==010||monthdropdown.value==12) {
   datedropdown.innerHTML='';
   for (var i = 1; i <= 31; i++) {
     datedropdown.innerHTML+='<option value="'+i+'">'+i+'</option>';
   }
 } else {
   datedropdown.innerHTML='';
   for (var i = 1; i <= 30; i++) {
     datedropdown.innerHTML+='<option value="'+i+'">'+i+'</option>';
   }
 }
}
dob.value=yeardropdown.value+'-'+monthdropdown.value+'-'+datedropdown.value;
console.log(dob.value);
}

</script>
</div>

                  </form>
                </div>
                <br><br><br><br>
                  <div id="profile-page-sidebar" class="col l6 m6 s12">


                    <!-- Profile About  -->
                    <div class="card" onclick="displayaboutmeedit()">
                      <div class="card-content black-text">
                        <span class="card-title">About Me!</span>
                        <p>

                          <span id="aboutnames" onclick="displayaboutmeedit()">{{Auth::User()->aboutmetext}}</span>

                          <div class="row" id="aboutmefields" style="display:none;">
                          <div class="input-field col s11 l11 m11">
                          <form class="" action="{{ route('aboutme') }}" method="post" id="aboutme-form">
                            {{ csrf_field() }}
                            <input type="text"  id="aboutme" name="aboutme" value="{{Auth::User()->aboutmetext}}" placeholder="{{Auth::User()->aboutmetext}}" required></input>
                          </form>

                               </div>

                               <div class="input-field col s1 l1 m1" style="padding-top:3px;">
                                    <a style="cursor:pointer;" class="blue-text text-darken-4"  id="modifyaboutme"><i class="material-icons">done</i></a>
                               </div>


                             </div>


                        </p>
                        <script>
                        var aboutmeform=document.getElementById('aboutme-form');
                        var aboutmefields=document.getElementById('aboutmefields');
                        var aboutnames=document.getElementById('aboutnames');
                        var modifyaboutme=document.getElementById('modifyaboutme');

                        function displayaboutmeedit() {

                          aboutmefields.style.display='block';
                          aboutnames.style.display='none';

                        }

                        modifyaboutme.addEventListener("click",function(event){
                          event.preventDefault();

                          var action= aboutmeform.getAttribute("action");

                          var form_data=new FormData(aboutmeform);
                          var xhr = new XMLHttpRequest();
                          xhr.open('POST',action, true);
                          xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                          xhr.send(form_data);
                          xhr.onreadystatechange = function () {
                            if(xhr.readyState == 4 && xhr.status == 200) {
                              var result = xhr.responseText;
                              // biosubmit.disabled=false;
                              console.log('Result: ' + result);
                              var json = JSON.parse(result);
                              aboutmefields.style.display='none';
                              aboutnames.style.display='block';
                              aboutnames.innerHTML=json.aboutmetext;
                              console.log('ds');
                            }
                          };

                        });

                        </script>
                      </div>
                    </div>

                    <!-- Profile About  -->
                  </div>

                </div>


                <div class="row hide-on-med-and-up">
                  <div class="col l6 m6 s12 center-align" style="margin-top:-150px;">
                  <form id="infoform" action="{{route('modifyprofile')}}" method="post" >


                  <br><br>
                    <h4 class="card-title grey-text text-darken-4"><span id="names" onclick="displaynameedit()">{{Auth::User()->fname}}  {{Auth::User()->lname}}</span></h4>
                    <div class="row" id="namefields" style="display:none;">

                    <div class="input-field col s12 l5 m5">
                      <input type="text"  id="fname" name="fname" value="{{Auth::User()->fname}}" placeholder="{{Auth::User()->fname}}" required></input>
                    </div>

                    <div class="input-field col s10 l5 m5">
                      <input type="text" id="lname"  name="lname" value="{{Auth::User()->lname}}" placeholder="{{Auth::User()->lname}}" required></input>
                    </div>

                    <div class="input-field col s2 l2 m2" style="padding-top:3px;">
                         <a style="cursor:pointer;" class="blue-text text-darken-4"  id="modifyname"><i class="material-icons">done</i></a>
                    </div>
                  </div>
                  <span class="flow-text" id="existdetails"><span id="useremail" style="font-size:20px;">{{Auth::User()->email}}</span></span><br>
                    <span class="flow-text" id="userphone" onclick="displayphoneedit()" style="font-size:20px;">+{{Auth::User()->countrycode}}-{{Auth::User()->phone}}</span><br>



                    <div class="row" id="phonerow" style="display:none;">
                      <div class="input-field col l3 m3 s3">
                        <select name="countrycode" id="countryCode" >
                           <option value="{{Auth::User()->countrycode}}" selected>+{{Auth::User()->countrycode}}</option>
                           <option data-countryCode="DZ" value="213">Algeria (+213)</option>
                           <option data-countryCode="AD" value="376">Andorra (+376)</option>
                           <option data-countryCode="AO" value="244">Angola (+244)</option>
                           <option data-countryCode="AI" value="1264">Anguilla (+1264)</option>
                           <option data-countryCode="AG" value="1268">Antigua &amp; Barbuda (+1268)</option>
                           <option data-countryCode="AR" value="54">Argentina (+54)</option>
                           <option data-countryCode="AM" value="374">Armenia (+374)</option>
                           <option data-countryCode="AW" value="297">Aruba (+297)</option>
                           <option data-countryCode="AU" value="61">Australia (+61)</option>
                           <option data-countryCode="AT" value="43">Austria (+43)</option>
                           <option data-countryCode="AZ" value="994">Azerbaijan (+994)</option>
                           <option data-countryCode="BS" value="1242">Bahamas (+1242)</option>
                           <option data-countryCode="BH" value="973">Bahrain (+973)</option>
                           <option data-countryCode="BD" value="880">Bangladesh (+880)</option>
                           <option data-countryCode="BB" value="1246">Barbados (+1246)</option>
                           <option data-countryCode="BY" value="375">Belarus (+375)</option>
                           <option data-countryCode="BE" value="32">Belgium (+32)</option>
                           <option data-countryCode="BZ" value="501">Belize (+501)</option>
                           <option data-countryCode="BJ" value="229">Benin (+229)</option>
                           <option data-countryCode="BM" value="1441">Bermuda (+1441)</option>
                           <option data-countryCode="BT" value="975">Bhutan (+975)</option>
                           <option data-countryCode="BO" value="591">Bolivia (+591)</option>
                           <option data-countryCode="BA" value="387">Bosnia Herzegovina (+387)</option>
                           <option data-countryCode="BW" value="267">Botswana (+267)</option>
                           <option data-countryCode="BR" value="55">Brazil (+55)</option>
                           <option data-countryCode="BN" value="673">Brunei (+673)</option>
                           <option data-countryCode="BG" value="359">Bulgaria (+359)</option>
                           <option data-countryCode="BF" value="226">Burkina Faso (+226)</option>
                           <option data-countryCode="BI" value="257">Burundi (+257)</option>
                           <option data-countryCode="KH" value="855">Cambodia (+855)</option>
                           <option data-countryCode="CM" value="237">Cameroon (+237)</option>
                           <option data-countryCode="CA" value="1">Canada (+1)</option>
                           <option data-countryCode="CV" value="238">Cape Verde Islands (+238)</option>
                           <option data-countryCode="KY" value="1345">Cayman Islands (+1345)</option>
                           <option data-countryCode="CF" value="236">Central African Republic (+236)</option>
                           <option data-countryCode="CL" value="56">Chile (+56)</option>
                           <option data-countryCode="CN" value="86">China (+86)</option>
                           <option data-countryCode="CO" value="57">Colombia (+57)</option>
                           <option data-countryCode="KM" value="269">Comoros (+269)</option>
                           <option data-countryCode="CG" value="242">Congo (+242)</option>
                           <option data-countryCode="CK" value="682">Cook Islands (+682)</option>
                           <option data-countryCode="CR" value="506">Costa Rica (+506)</option>
                           <option data-countryCode="HR" value="385">Croatia (+385)</option>
                           <option data-countryCode="CU" value="53">Cuba (+53)</option>
                           <option data-countryCode="CY" value="90392">Cyprus North (+90392)</option>
                           <option data-countryCode="CY" value="357">Cyprus South (+357)</option>
                           <option data-countryCode="CZ" value="42">Czech Republic (+42)</option>
                           <option data-countryCode="DK" value="45">Denmark (+45)</option>
                           <option data-countryCode="DJ" value="253">Djibouti (+253)</option>
                           <option data-countryCode="DM" value="1809">Dominica (+1809)</option>
                           <option data-countryCode="DO" value="1809">Dominican Republic (+1809)</option>
                           <option data-countryCode="EC" value="593">Ecuador (+593)</option>
                           <option data-countryCode="EG" value="20">Egypt (+20)</option>
                           <option data-countryCode="SV" value="503">El Salvador (+503)</option>
                           <option data-countryCode="GQ" value="240">Equatorial Guinea (+240)</option>
                           <option data-countryCode="ER" value="291">Eritrea (+291)</option>
                           <option data-countryCode="EE" value="372">Estonia (+372)</option>
                           <option data-countryCode="ET" value="251">Ethiopia (+251)</option>
                           <option data-countryCode="FK" value="500">Falkland Islands (+500)</option>
                           <option data-countryCode="FO" value="298">Faroe Islands (+298)</option>
                           <option data-countryCode="FJ" value="679">Fiji (+679)</option>
                           <option data-countryCode="FI" value="358">Finland (+358)</option>
                           <option data-countryCode="FR" value="33">France (+33)</option>
                           <option data-countryCode="GF" value="594">French Guiana (+594)</option>
                           <option data-countryCode="PF" value="689">French Polynesia (+689)</option>
                           <option data-countryCode="GA" value="241">Gabon (+241)</option>
                           <option data-countryCode="GM" value="220">Gambia (+220)</option>
                           <option data-countryCode="GE" value="7880">Georgia (+7880)</option>
                           <option data-countryCode="DE" value="49">Germany (+49)</option>
                           <option data-countryCode="GH" value="233">Ghana (+233)</option>
                           <option data-countryCode="GI" value="350">Gibraltar (+350)</option>
                           <option data-countryCode="GR" value="30">Greece (+30)</option>
                           <option data-countryCode="GL" value="299">Greenland (+299)</option>
                           <option data-countryCode="GD" value="1473">Grenada (+1473)</option>
                           <option data-countryCode="GP" value="590">Guadeloupe (+590)</option>
                           <option data-countryCode="GU" value="671">Guam (+671)</option>
                           <option data-countryCode="GT" value="502">Guatemala (+502)</option>
                           <option data-countryCode="GN" value="224">Guinea (+224)</option>
                           <option data-countryCode="GW" value="245">Guinea - Bissau (+245)</option>
                           <option data-countryCode="GY" value="592">Guyana (+592)</option>
                           <option data-countryCode="HT" value="509">Haiti (+509)</option>
                           <option data-countryCode="HN" value="504">Honduras (+504)</option>
                           <option data-countryCode="HK" value="852">Hong Kong (+852)</option>
                           <option data-countryCode="HU" value="36">Hungary (+36)</option>
                           <option data-countryCode="IS" value="354">Iceland (+354)</option>
                           <option data-countryCode="IN" value="91">India (+91)</option>
                           <option data-countryCode="ID" value="62">Indonesia (+62)</option>
                           <option data-countryCode="IR" value="98">Iran (+98)</option>
                           <option data-countryCode="IQ" value="964">Iraq (+964)</option>
                           <option data-countryCode="IE" value="353">Ireland (+353)</option>
                           <option data-countryCode="IL" value="972">Israel (+972)</option>
                           <option data-countryCode="IT" value="39">Italy (+39)</option>
                           <option data-countryCode="JM" value="1876">Jamaica (+1876)</option>
                           <option data-countryCode="JP" value="81">Japan (+81)</option>
                           <option data-countryCode="JO" value="962">Jordan (+962)</option>
                           <option data-countryCode="KZ" value="7">Kazakhstan (+7)</option>
                           <option data-countryCode="KE" value="254">Kenya (+254)</option>
                           <option data-countryCode="KI" value="686">Kiribati (+686)</option>
                           <option data-countryCode="KP" value="850">Korea North (+850)</option>
                           <option data-countryCode="KR" value="82">Korea South (+82)</option>
                           <option data-countryCode="KW" value="965">Kuwait (+965)</option>
                           <option data-countryCode="KG" value="996">Kyrgyzstan (+996)</option>
                           <option data-countryCode="LA" value="856">Laos (+856)</option>
                           <option data-countryCode="LV" value="371">Latvia (+371)</option>
                           <option data-countryCode="LB" value="961">Lebanon (+961)</option>
                           <option data-countryCode="LS" value="266">Lesotho (+266)</option>
                           <option data-countryCode="LR" value="231">Liberia (+231)</option>
                           <option data-countryCode="LY" value="218">Libya (+218)</option>
                           <option data-countryCode="LI" value="417">Liechtenstein (+417)</option>
                           <option data-countryCode="LT" value="370">Lithuania (+370)</option>
                           <option data-countryCode="LU" value="352">Luxembourg (+352)</option>
                           <option data-countryCode="MO" value="853">Macao (+853)</option>
                           <option data-countryCode="MK" value="389">Macedonia (+389)</option>
                           <option data-countryCode="MG" value="261">Madagascar (+261)</option>
                           <option data-countryCode="MW" value="265">Malawi (+265)</option>
                           <option data-countryCode="MY" value="60">Malaysia (+60)</option>
                           <option data-countryCode="MV" value="960">Maldives (+960)</option>
                           <option data-countryCode="ML" value="223">Mali (+223)</option>
                           <option data-countryCode="MT" value="356">Malta (+356)</option>
                           <option data-countryCode="MH" value="692">Marshall Islands (+692)</option>
                           <option data-countryCode="MQ" value="596">Martinique (+596)</option>
                           <option data-countryCode="MR" value="222">Mauritania (+222)</option>
                           <option data-countryCode="YT" value="269">Mayotte (+269)</option>
                           <option data-countryCode="MX" value="52">Mexico (+52)</option>
                           <option data-countryCode="FM" value="691">Micronesia (+691)</option>
                           <option data-countryCode="MD" value="373">Moldova (+373)</option>
                           <option data-countryCode="MC" value="377">Monaco (+377)</option>
                           <option data-countryCode="MN" value="976">Mongolia (+976)</option>
                           <option data-countryCode="MS" value="1664">Montserrat (+1664)</option>
                           <option data-countryCode="MA" value="212">Morocco (+212)</option>
                           <option data-countryCode="MZ" value="258">Mozambique (+258)</option>
                           <option data-countryCode="MN" value="95">Myanmar (+95)</option>
                           <option data-countryCode="NA" value="264">Namibia (+264)</option>
                           <option data-countryCode="NR" value="674">Nauru (+674)</option>
                           <option data-countryCode="NP" value="977">Nepal (+977)</option>
                           <option data-countryCode="NL" value="31">Netherlands (+31)</option>
                           <option data-countryCode="NC" value="687">New Caledonia (+687)</option>
                           <option data-countryCode="NZ" value="64">New Zealand (+64)</option>
                           <option data-countryCode="NI" value="505">Nicaragua (+505)</option>
                           <option data-countryCode="NE" value="227">Niger (+227)</option>
                           <option data-countryCode="NG" value="234">Nigeria (+234)</option>
                           <option data-countryCode="NU" value="683">Niue (+683)</option>
                           <option data-countryCode="NF" value="672">Norfolk Islands (+672)</option>
                           <option data-countryCode="NP" value="670">Northern Marianas (+670)</option>
                           <option data-countryCode="NO" value="47">Norway (+47)</option>
                           <option data-countryCode="OM" value="968">Oman (+968)</option>
                           <option data-countryCode="PW" value="680">Palau (+680)</option>
                           <option data-countryCode="PA" value="507">Panama (+507)</option>
                           <option data-countryCode="PG" value="675">Papua New Guinea (+675)</option>
                           <option data-countryCode="PY" value="595">Paraguay (+595)</option>
                           <option data-countryCode="PE" value="51">Peru (+51)</option>
                           <option data-countryCode="PH" value="63">Philippines (+63)</option>
                           <option data-countryCode="PL" value="48">Poland (+48)</option>
                           <option data-countryCode="PT" value="351">Portugal (+351)</option>
                           <option data-countryCode="PR" value="1787">Puerto Rico (+1787)</option>
                           <option data-countryCode="QA" value="974">Qatar (+974)</option>
                           <option data-countryCode="RE" value="262">Reunion (+262)</option>
                           <option data-countryCode="RO" value="40">Romania (+40)</option>
                           <option data-countryCode="RU" value="7">Russia (+7)</option>
                           <option data-countryCode="RW" value="250">Rwanda (+250)</option>
                           <option data-countryCode="SM" value="378">San Marino (+378)</option>
                           <option data-countryCode="ST" value="239">Sao Tome &amp; Principe (+239)</option>
                           <option data-countryCode="SA" value="966">Saudi Arabia (+966)</option>
                           <option data-countryCode="SN" value="221">Senegal (+221)</option>
                           <option data-countryCode="CS" value="381">Serbia (+381)</option>
                           <option data-countryCode="SC" value="248">Seychelles (+248)</option>
                           <option data-countryCode="SL" value="232">Sierra Leone (+232)</option>
                           <option data-countryCode="SG" value="65">Singapore (+65)</option>
                           <option data-countryCode="SK" value="421">Slovak Republic (+421)</option>
                           <option data-countryCode="SI" value="386">Slovenia (+386)</option>
                           <option data-countryCode="SB" value="677">Solomon Islands (+677)</option>
                           <option data-countryCode="SO" value="252">Somalia (+252)</option>
                           <option data-countryCode="ZA" value="27">South Africa (+27)</option>
                           <option data-countryCode="ES" value="34">Spain (+34)</option>
                           <option data-countryCode="LK" value="94">Sri Lanka (+94)</option>
                           <option data-countryCode="SH" value="290">St. Helena (+290)</option>
                           <option data-countryCode="KN" value="1869">St. Kitts (+1869)</option>
                           <option data-countryCode="SC" value="1758">St. Lucia (+1758)</option>
                           <option data-countryCode="SD" value="249">Sudan (+249)</option>
                           <option data-countryCode="SR" value="597">Suriname (+597)</option>
                           <option data-countryCode="SZ" value="268">Swaziland (+268)</option>
                           <option data-countryCode="SE" value="46">Sweden (+46)</option>
                           <option data-countryCode="CH" value="41">Switzerland (+41)</option>
                           <option data-countryCode="SI" value="963">Syria (+963)</option>
                           <option data-countryCode="TW" value="886">Taiwan (+886)</option>
                           <option data-countryCode="TJ" value="7">Tajikstan (+7)</option>
                           <option data-countryCode="TH" value="66">Thailand (+66)</option>
                           <option data-countryCode="TG" value="228">Togo (+228)</option>
                           <option data-countryCode="TO" value="676">Tonga (+676)</option>
                           <option data-countryCode="TT" value="1868">Trinidad &amp; Tobago (+1868)</option>
                           <option data-countryCode="TN" value="216">Tunisia (+216)</option>
                           <option data-countryCode="TR" value="90">Turkey (+90)</option>
                           <option data-countryCode="TM" value="7">Turkmenistan (+7)</option>
                           <option data-countryCode="TM" value="993">Turkmenistan (+993)</option>
                           <option data-countryCode="TC" value="1649">Turks &amp; Caicos Islands (+1649)</option>
                           <option data-countryCode="TV" value="688">Tuvalu (+688)</option>
                           <option data-countryCode="UG" value="256">Uganda (+256)</option>
                           <option data-countryCode="GB" value="44">UK (+44)</option>
                           <option data-countryCode="UA" value="380">Ukraine (+380)</option>
                           <option data-countryCode="AE" value="971">United Arab Emirates (+971)</option>
                           <option data-countryCode="UY" value="598">Uruguay (+598)</option>
                           <option data-countryCode="US" value="1">USA (+1)</option>
                           <option data-countryCode="UZ" value="7">Uzbekistan (+7)</option>
                           <option data-countryCode="VU" value="678">Vanuatu (+678)</option>
                           <option data-countryCode="VA" value="379">Vatican City (+379)</option>
                           <option data-countryCode="VE" value="58">Venezuela (+58)</option>
                           <option data-countryCode="VN" value="84">Vietnam (+84)</option>
                           <option data-countryCode="VG" value="84">Virgin Islands - British (+1284)</option>
                           <option data-countryCode="VI" value="84">Virgin Islands - US (+1340)</option>
                           <option data-countryCode="WF" value="681">Wallis &amp; Futuna (+681)</option>
                           <option data-countryCode="YE" value="969">Yemen (North)(+969)</option>
                           <option data-countryCode="YE" value="967">Yemen (South)(+967)</option>
                           <option data-countryCode="ZM" value="260">Zambia (+260)</option>
                           <option data-countryCode="ZW" value="263">Zimbabwe (+263)</option>
                        </select>
                        <label for="countrycode ">
                          country code
                        </label>
                        <script type="text/javascript">
                        $(document).ready(function() {
                           $('select').material_select();
                         });
                        </script>
                      </div>
                      <div class="input-field col  l7 m7 s7" >
                        <input id="phoneNumber" name="phone" oninput="validphone()" type="tel" class="validate" placeholder="{{Auth::User()->phone}}" value="{{Auth::User()->phone}}">
                        <span class="red-text" id="phoneNumbererror"></span>
                        <script type="text/javascript">
                        var phoneNumber=document.getElementById("phoneNumber");
                        var phoneNumbererror=document.getElementById("phoneNumbererror");
                        function validphone() {
                          var z=phoneNumber.value;
                          if(z.length<9) {
                            phoneNumbererror.classList.remove('green-text');
                            phoneNumber.style.borderColor = "red";
                            phoneNumbererror.classList.add('red-text');
                            phoneNumbererror.innerHTML='phone no. must contain more than 9 digits ';
                            phone=0;
                            if( dob!=1 || phone!=1){
                              document.getElementById("modifyprofile").disabled=true;
                            }
                          }
                          else {
                            phoneNumbererror.classList.remove('red-text');
                            phoneNumbererror.classList.add('green-text');
                            phoneNumbererror.innerHTML='valid';
                            phoneNumber.style.borderColor = "green";
                            phone=1;
                            if(phone==1 && dob==1){
                              document.getElementById("modifyprofile").disabled=false;
                            }
                          }
                        }
                        </script>
                      </div>
                      <div class="input-field col s2 l2 m2" style="padding-top:3px;">
                           <a type="submit" style="cursor:pointer;" class="blue-text text-darken-4"  id="modifyphone"><i class="material-icons">done</i></a>
                      </div>


                     <script type="text/javascript">
                      var useragreement=document.getElementById("useragreement");
                      useragreement.addEventListener("change",accept);
                      function accept() {

                        if (useragreement.checked) {
                          document.getElementById("register").disabled=false;
                        }
                        else {
                          document.getElementById("register").disabled=true;
                        }
                      }
                    </script>
                    </div>


                <span class="flow-text" id="userdob" onclick="displaydobedit()" style="font-size:20px;">{{Auth::User()->dob}}</span>
                <br><br><br>
                {{csrf_field()}}
                <input type="hidden" id="dob" name="dob" value="{{Auth::User()->dob}}">
                <div class="row" id="dobrow"style="display:none;">
                <div class="input-field col s3" >
                <select id="datedropdown" oninput="setdob()"  name="">
                @for ($i=1; $i <=31 ; $i++)
                <option data-date="{{$i}}" value="{{$i}}">{{$i}}</option>
                @endfor
                </select>
                </div>
                <div class="input-field col s4">
                <select name="month" id="monthdropdown" oninput="setdatefunc()">
                <option data-month="JAN" value="01" selected>January</option>
                <option data-month="FEB" value="02">February </option>
                <option data-month="MAR" value="03">March </option>
                <option data-month="APR" value="04">April</option>
                <option data-month="MAY" value="05">May</option>
                <option data-month="JUN" value="06">June </option>
                <option data-month="JUL" value="07">July</option>
                <option data-month="AUG" value="08">August</option>
                <option data-month="SEP" value="09">September</option>
                <option data-month="OCT" value="10">October</option>
                <option data-month="NOV" value="11">November </option>
                <option data-month="DEC" value="12">December </option>
                </select>
                </div>
                <div class="input-field col s3">
                <select id="yeardropdown" oninput="febdates()" name="">
                @for ($i=2001; $i >=1920 ; $i--)
                <option data-year="{{$i}}" value="{{$i}}">{{$i}}</option>
                @endfor
                </select>
                </div>
                <div class="input-field col s2 l2 m2" style="padding-top:3px;">
                <a type="submit" style="cursor:pointer;" class="blue-text text-darken-4"  id="modifydob"><i class="material-icons">done</i></a>
                </div>
                <script type="text/javascript">
                var datedropdown=document.getElementById('datedropdown');
                var monthdropdown=document.getElementById('monthdropdown');
                var yeardropdown=document.getElementById('yeardropdown');
                var dob=document.getElementById('dob');

                function setdob() {
                dob.value=yeardropdown.value+'-'+monthdropdown.value+'-'+datedropdown.value;
                console.log(dob.value);
                }

                function febdates() {
                if (monthdropdown.value==02) {

                if(yeardropdown.value%4 == 0)
                {
                if( yeardropdown.value%100 == 0)
                {
                // year is divisible by 400, hence the year is a leap year
                if ( yeardropdown.value%400 == 0){
                datedropdown.innerHTML='';
                for (var i = 1; i <= 29; i++) {
                datedropdown.innerHTML+='<option value="'+i+'">'+i+'</option>';
                }
                }
                else{
                datedropdown.innerHTML='';
                for (var i = 1; i <= 28; i++) {
                datedropdown.innerHTML+='<option value="'+i+'">'+i+'</option>';
                }
                }
                }
                else{
                datedropdown.innerHTML='';
                for (var i = 1; i <= 29; i++) {
                datedropdown.innerHTML+='<option value="'+i+'">'+i+'</option>';
                }
                }

                }

                }
                dob.value=yeardropdown.value+'-'+monthdropdown.value+'-'+datedropdown.value;
                console.log(dob.value);
                }
                function setdatefunc() {
                // console.log(monthdropdown.value);
                // console.log(yeardropdown.value);
                if (monthdropdown.value==02) {
                if(yeardropdown.value%4 == 0)
                {
                if( yeardropdown.value%100 == 0)
                {
                // year is divisible by 400, hence the year is a leap year
                if ( yeardropdown.value%400 == 0){
                datedropdown.innerHTML='';
                for (var i = 1; i <= 29; i++) {
                 datedropdown.innerHTML+='<option value="'+i+'">'+i+'</option>';
                }
                }
                else{
                datedropdown.innerHTML='';
                for (var i = 1; i <= 28; i++) {
                 datedropdown.innerHTML+='<option value="'+i+'">'+i+'</option>';
                }
                }
                }
                else{
                datedropdown.innerHTML='';
                for (var i = 1; i <= 29; i++) {
                datedropdown.innerHTML+='<option value="'+i+'">'+i+'</option>';
                }
                }

                }
                else{
                datedropdown.innerHTML='';
                for (var i = 1; i <= 28; i++) {
                datedropdown.innerHTML+='<option value="'+i+'">'+i+'</option>';
                }
                }

                }
                else {
                if (monthdropdown.value==01||monthdropdown.value==03||monthdropdown.value==05||monthdropdown.value==07||monthdropdown.value==08||monthdropdown.value==010||monthdropdown.value==12) {
                datedropdown.innerHTML='';
                for (var i = 1; i <= 31; i++) {
                datedropdown.innerHTML+='<option value="'+i+'">'+i+'</option>';
                }
                } else {
                datedropdown.innerHTML='';
                for (var i = 1; i <= 30; i++) {
                datedropdown.innerHTML+='<option value="'+i+'">'+i+'</option>';
                }
                }
                }
                dob.value=yeardropdown.value+'-'+monthdropdown.value+'-'+datedropdown.value;
                console.log(dob.value);
                }

                </script>
                </div>

                  </form>
                </div>
                <br><br><br><br>
                  <div id="profile-page-sidebar" class="col l6 m6 s12">


                    <!-- Profile About  -->
                    <div class="card" onclick="displayaboutmeedit()">
                      <div class="card-content black-text">
                        <span class="card-title">About Me!</span>
                        <p>

                          <span id="aboutnames" onclick="displayaboutmeedit()">{{Auth::User()->aboutmetext}}</span>

                          <div class="row" id="aboutmefields" style="display:none;">
                          <div class="input-field col s11 l11 m11">
                          <form class="" action="{{ route('aboutme') }}" method="post" id="aboutme-form">
                            {{ csrf_field() }}
                            <input type="text"  id="aboutme" name="aboutme" value="{{Auth::User()->aboutmetext}}" placeholder="{{Auth::User()->aboutmetext}}" required></input>
                          </form>

                               </div>

                               <div class="input-field col s1 l1 m1" style="padding-top:3px;">
                                    <a style="cursor:pointer;" class="blue-text text-darken-4"  id="modifyaboutme"><i class="material-icons">done</i></a>
                               </div>


                             </div>


                        </p>
                        <script>
                        var aboutmeform=document.getElementById('aboutme-form');
                        var aboutmefields=document.getElementById('aboutmefields');
                        var aboutnames=document.getElementById('aboutnames');
                        var modifyaboutme=document.getElementById('modifyaboutme');

                        function displayaboutmeedit() {

                          aboutmefields.style.display='block';
                          aboutnames.style.display='none';

                        }

                        modifyaboutme.addEventListener("click",function(event){
                          event.preventDefault();

                          var action= aboutmeform.getAttribute("action");

                          var form_data=new FormData(aboutmeform);
                          var xhr = new XMLHttpRequest();
                          xhr.open('POST',action, true);
                          xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                          xhr.send(form_data);
                          xhr.onreadystatechange = function () {
                            if(xhr.readyState == 4 && xhr.status == 200) {
                              var result = xhr.responseText;
                              // biosubmit.disabled=false;
                              console.log('Result: ' + result);
                              var json = JSON.parse(result);
                              aboutmefields.style.display='none';
                              aboutnames.style.display='block';
                              aboutnames.innerHTML=json.aboutmetext;
                              console.log('ds');
                            }
                          };

                        });

                        </script>
                      </div>
                    </div>

                    <!-- Profile About  -->
                  </div>

                </div>
              </div>

          </div>
        </div>


      </div>
          <!--/ profile-page-header -->

        </div>


      <!--end container-->
    </section> <!-- END CONTENT -->

          <script type="text/javascript">
          var infoform=document.getElementById('infoform');
          var modifyname=document.getElementById('modifyname');
          var existdetails=document.getElementById('existdetails');
          var userphone=document.getElementById('userphone');
          var userdob=document.getElementById('userdob');
          var dobrow=document.getElementById('dobrow');
          var names=document.getElementById('names');
          var phonerow=document.getElementById('phonerow');
          var fname=document.getElementById('fname');
          var lname=document.getElementById('lname');
          var namefields=document.getElementById('namefields');
          var editprofileinfobtn=document.getElementById('editprofileinfobtn');
          var modifyprofile=document.getElementById('modifyprofile');
          var modifyphone=document.getElementById('modifyphone');
          var modifydob=document.getElementById('modifydob');

          function displaydobedit() {
            userdob.style.display='none';
            dobrow.style.display='block';
          }

          function displayphoneedit() {
            userphone.style.display='none';
            phonerow.style.display='block';
          }

          function displaynameedit() {
            // infoform.style.display='block';
            // existdetails.style.display='none';
            namefields.style.display='block';
            names.style.display='none';
            // editprofileinfobtn.style.display='none';
            dob=1;
            phone=1;
          }

          function closeinfoform() {
            infoform.style.display='none';
            existdetails.style.display='block';
            names.style.display='block';
            editprofileinfobtn.style.display='block';
          }
            // var editprofileinfobtn=document.getElementById("editprofileinfobtn");
             modifyname.addEventListener("click",function(event){
               event.preventDefault();
               var action= infoform.getAttribute("action");
               var form_data=new FormData(infoform);
               var xhr = new XMLHttpRequest();
               xhr.open('POST',action, true);
               xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
               xhr.send(form_data);
               xhr.onreadystatechange = function () {
                 if(xhr.readyState == 4 && xhr.status == 200) {
                   var result = xhr.responseText;
                   biosubmit.disabled=false;
                   console.log('Result: ' + result);
                   var json = JSON.parse(result);
                   namefields.style.display='none';
                   names.style.display='block';
                   names.innerHTML="<b>"+json.fname+" "+json.lname+"</b>";
                   console.log('ds');
                 }
               };

             });
             modifydob.addEventListener("click",function(event){
               event.preventDefault();
                dob.value=yeardropdown.value+'-'+monthdropdown.value+'-'+datedropdown.value
               var action= infoform.getAttribute("action");
               var form_data=new FormData(infoform);
               var xhr = new XMLHttpRequest();
               xhr.open('POST',action, true);
               xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
               xhr.send(form_data);
               xhr.onreadystatechange = function () {
                 if(xhr.readyState == 4 && xhr.status == 200) {
                   var result = xhr.responseText;
                   biosubmit.disabled=false;
                   console.log('Result: ' + result);
                   var json = JSON.parse(result);
                   dobrow.style.display='none';
                   userdob.style.display='block';
                   userdob.innerHTML=json.dob;
                   console.log('ds');
                 }
               };

             });
             modifyphone.addEventListener("click",function(event){
               event.preventDefault();
               var action= infoform.getAttribute("action");
               var form_data=new FormData(infoform);
               var xhr = new XMLHttpRequest();
               xhr.open('POST',action, true);
               xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
               xhr.send(form_data);
               xhr.onreadystatechange = function () {
                 if(xhr.readyState == 4 && xhr.status == 200) {
                   var result = xhr.responseText;
                   biosubmit.disabled=false;
                   console.log('Result: ' + result);
                   var json = JSON.parse(result);
                   phonerow.style.display='none';
                   userphone.style.display='block';
                   userphone.innerHTML="+"+json.countrycode+"-"+json.phone;
                   console.log('ds');
                 }
               };

             });
          </script>
        </div>




        <div class="container">
<div class="row">

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
                                        <i style="display:none;cursor:pointer;" id="closebiobtn" onclick="closeaddbio()" class="material-icons right">close</i>
                                      </span>
                                               <li class="divider"></li><br>
                                               @if (Auth::User()->bio=="")
                                                 <p id="inibio" onclick="addbiodata()" class="blue-text">Please Enter your aspiration</p>
                                               @else
                                                 <p id="setbio" onclick="addbiodata()">{{Auth::User()->bio}}</p>
                                               @endif
                                               <form action="{{route('addbio')}}" method="post" id="addbio-form" style="display:none;">
                                                 <div class="row">
                                                   <form class="col s12">
                                                      {{csrf_field()}}
                                                     <div class="row">
                                                       <div class="input-field col s12">
                                                         <textarea id="biocontent" name="bio" class="materialize-textarea"></textarea>
                                                         <label for="biocontent">Type you aspiration</label>
                                                         <button type="button" id="biosubmit" class="btn btn-floating" type="submit"><i class="material-icons">send</i></button>
                                                       </div>
                                                     </div>
                                                   </form>
                                                 </div>
                                               </form>
                                               <script type="text/javascript">
                                                //  var addbiobtn=document.getElementById("addbiobtn");
                                                //  var closebio document.getElementById("closebiobtn");
                                                 var inibio =document.getElementById("inibio");
                                                 var setbio =document.getElementById("setbio");
                                                 var addbioform=document.getElementById("addbio-form");
                                                 var biosubmit=document.getElementById("biosubmit");
                                                 function addbiodata() {
                                                   console.log('sds');
                                                   document.getElementById("closebiobtn").style.display="inline";
                                                   @if (Auth::User()->bio=="")
                                                   inibio.style.display="none";
                                                   @endif
                                                   @if (Auth::User()->bio!="")
                                                   setbio.style.display="none";
                                                   @endif
                                                   console.log('sdsdsds');
                                                   addbioform.style.display="block";
                                                 }
                                                 function closeaddbio() {
                                                   document.getElementById("closebiobtn").style.display="none";
                                                   @if (Auth::User()->bio=="")
                                                   inibio.style.display="block";
                                                   @endif
                                                   @if (Auth::User()->bio!="")
                                                   setbio.style.display="block";
                                                   @endif
                                                   addbioform.style.display="none";

                                                 }

                                                    function postbio() {
                                                      var action = addbioform.getAttribute("action");
                                                      var form_data=new FormData(addbioform);
                                                      var xhr = new XMLHttpRequest();
                                                      xhr.open('POST',action, true);
                                                      xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                                                      xhr.send(form_data);
                                                      xhr.onreadystatechange = function () {
                                                        if(xhr.readyState == 4 && xhr.status == 200) {
                                                          var result = xhr.responseText;
                                                          biosubmit.disabled=false;
                                                          console.log('Result: ' + result);
                                                          var json = JSON.parse(result);
                                                          addbioform.style.display="none";
                                                          setbio.innerHTML=json;
                                                          setbio.style.display="block";
                                                          document.getElementById("closebiobtn").style.display="none";


                                                        }
                                                        else {
                                                          biosubmit.disabled=true;
                                                        }
                                                      };

                                                    }
                                                    biosubmit.addEventListener("click",function(event){
                                                      event.preventDefault();
                                                      postbio();
                                                    });
                                               </script>
                                             </div>
                                          </div>
                                          <div class="card ">
                                            {{-- contentstart --}}
                                             <div class="card-content ">
                                               <span class="card-title"><i class="material-icons">school</i>&nbsp;Education</span>
                                               <div class="divider"></div><br>
                                               <b>University:</b><br>
                                               <ul class="collection">
                                                 @foreach ($portfolio as $data)
                                                   @if ($data->category=='education' && $data->nature=='university')
                                                     <li class="collection-item" id="{{$data->id}}item">{{$data->data}}<i id="{{$data->id}}" style="cursor:pointer;" class="close material-icons right">close</i></li>
                                                     <form id="{{$data->id}}frm" action="{{route('deleteportfolio')}}" method="post">
                                                      {{ csrf_field() }}
                                                      <input type="hidden" name="id" value="{{$data->id}}">
                                                     </form>
                                                     <script type="text/javascript">
                                                     console.log('sdsdssdsdfrfrgfrg');
                                                       var universityitem=document.getElementById('{{$data->id}}item');
                                                       var deleteuniversity=document.getElementById('{{$data->id}}');
                                                       deleteuniversity.addEventListener("click",deleteuniversityfunction);
                                                       function deleteuniversityfunction() {
                                                         console.log('sdsds');
                                                       var form=document.getElementById('{{$data->id}}frm');
                                                       var action = form.getAttribute("action");
                                                       var form_data = new FormData(form);
                                                       var xhr = new XMLHttpRequest();
                                                       xhr.open('POST', action, true);
                                                       xhr.send(form_data);
                                                       xhr.onreadystatechange = function () {
                                                         if(xhr.readyState == 4 && xhr.status == 200) {
                                                           console.log('fsdf');
                                                            var result = xhr.responseText;
                                                            universityitem.style.display='none';
                                                            console.log('Result: ' + result);

                                                         }
                                                       };
                                                     }
                                                     </script>
                                                   @endif
                                                 @endforeach
                                               </ul>
                                               <form id="adduniversityform" action="{{route('adduniversity')}}" method="post" style="display:none;">
                                                 {{csrf_field()}}
                                                 <div class="row">
                                                 <div class="input-field col s9">
                                                   <input id="from" type="text" name="university">
                                                 </div>
                                                 <div class=" input-field col s3">
                                                   <span class="blue-text" style="cursor:pointer;" id="adduniversitybtn" onclick="adduniversityform.submit();"><i class="material-icons">done</i></span>
                                                   <span class="blue-text" style="cursor:pointer;" onclick="closeuniversityinput()"><i class="material-icons">close</i></span>
                                                 </div>
                                               </div>
                                               </form>
                                              <a class="blue-text" id="adduniversity" style="cursor:pointer;" onclick="showuniversityinput()">Add university</a>
                                              <script type="text/javascript">
                                              var adduniversity=document.getElementById('adduniversity');
                                              var adduniversityform=document.getElementById('adduniversityform');
                                                function showuniversityinput() {
                                                  adduniversityform.style.display='block';
                                                  adduniversity.style.display='none';
                                                }
                                                function closeuniversityinput() {
                                                  adduniversityform.style.display='none';
                                                  adduniversity.style.display='block';
                                                }
                                              </script>
                                              <br>
                                              <div class="divider"></div>
                                              <br>
                                              <b>college :</b><br>
                                              <ul class="collection">
                                                @foreach ($portfolio as $data)
                                                  @if ($data->category=='education' && $data->nature=='college')
                                                    <li class="collection-item" id="{{$data->id}}item">{{$data->data}}<i id="{{$data->id}}" style="cursor:pointer;" class="close material-icons right">close</i></li>
                                                    <form id="{{$data->id}}frm" action="{{route('deleteportfolio')}}" method="post">
                                                     {{ csrf_field() }}
                                                     <input type="hidden" name="id" value="{{$data->id}}">
                                                    </form>
                                                    <script type="text/javascript">
                                                    console.log('sdsdssdsdfrfrgfrg');
                                                      var collegeitem=document.getElementById('{{$data->id}}item');
                                                      var deletecollege=document.getElementById('{{$data->id}}');
                                                      deletecollege.addEventListener("click",deletecollegefunction);
                                                      function deletecollegefunction() {
                                                        console.log('sdsds');
                                                      var form=document.getElementById('{{$data->id}}frm');
                                                      var action = form.getAttribute("action");
                                                      var form_data = new FormData(form);
                                                      var xhr = new XMLHttpRequest();
                                                      xhr.open('POST', action, true);
                                                      xhr.send(form_data);
                                                      xhr.onreadystatechange = function () {
                                                        if(xhr.readyState == 4 && xhr.status == 200) {
                                                          console.log('fsdf');
                                                           var result = xhr.responseText;
                                                           collegeitem.style.display='none';
                                                           console.log('Result: ' + result);

                                                        }
                                                      };
                                                    }
                                                    </script>
                                                  @endif
                                                @endforeach
                                              </ul>
                                              <form id="addcollegeform" action="{{route('addcollege')}}" method="post" style="display:none;">
                                                {{csrf_field()}}
                                                <div class="row">
                                                <div class="input-field col s9">
                                                  <input id="from" type="text" name="college">
                                                </div>
                                                <div class=" input-field col s3">
                                                  <span class="blue-text" style="cursor:pointer;" id="addcollegebtn" onclick="addcollegeform.submit();"><i class="material-icons">done</i></span>
                                                  <span class="blue-text" style="cursor:pointer;" onclick="closecollegeinput()"><i class="material-icons">close</i></span>
                                                </div>
                                              </div>
                                              </form>
                                             <a class="blue-text" id="addcollege" style="cursor:pointer;" onclick="showcollegeinput()">Add college</a>
                                             <script type="text/javascript">
                                             var addcollege=document.getElementById('addcollege');
                                             var addcollegeform=document.getElementById('addcollegeform');
                                               function showcollegeinput() {
                                                 addcollegeform.style.display='block';
                                                 addcollege.style.display='none';
                                               }
                                               function closecollegeinput() {
                                                 addcollegeform.style.display='none';
                                                 addcollege.style.display='block';
                                               }
                                             </script>
                                              <br>
                                              <div class="divider"></div>
                                              <br>
                                              <b>secondary school :</b><br>
                                              <ul class="collection">
                                                @foreach ($portfolio as $data)
                                                  @if ($data->category=='education' && $data->nature=='secondarysch')
                                                    <li class="collection-item" id="{{$data->id}}item">{{$data->data}}<i id="{{$data->id}}" style="cursor:pointer;" class="close material-icons right">close</i></li>
                                                    <form id="{{$data->id}}frm" action="{{route('deleteportfolio')}}" method="post">
                                                     {{ csrf_field() }}
                                                     <input type="hidden" name="id" value="{{$data->id}}">
                                                    </form>
                                                    <script type="text/javascript">
                                                    console.log('sdsdssdsdfrfrgfrg');
                                                      var secondaryschitem=document.getElementById('{{$data->id}}item');
                                                      var deletesecondarysch=document.getElementById('{{$data->id}}');
                                                      deletesecondarysch.addEventListener("click",deletesecondaryschfunction);
                                                      function deletesecondaryschfunction() {
                                                        console.log('sdsds');
                                                      var form=document.getElementById('{{$data->id}}frm');
                                                      var action = form.getAttribute("action");
                                                      var form_data = new FormData(form);
                                                      var xhr = new XMLHttpRequest();
                                                      xhr.open('POST', action, true);
                                                      xhr.send(form_data);
                                                      xhr.onreadystatechange = function () {
                                                        if(xhr.readyState == 4 && xhr.status == 200) {
                                                          console.log('fsdf');
                                                           var result = xhr.responseText;
                                                           secondaryschitem.style.display='none';
                                                           console.log('Result: ' + result);

                                                        }
                                                      };
                                                    }
                                                    </script>
                                                  @endif
                                                @endforeach
                                              </ul>
                                              <form id="addsecondaryschform" action="{{route('addsecondary')}}" method="post" style="display:none;">
                                                {{csrf_field()}}
                                                <div class="row">
                                                <div class="input-field col s9">
                                                  <input id="from" type="text" name="secondary">
                                                </div>
                                                <div class=" input-field col s3">
                                                  <span class="blue-text" style="cursor:pointer;" id="addsecondaryschbtn" onclick="addsecondaryschform.submit();"><i class="material-icons">done</i></span>
                                                  <span class="blue-text" style="cursor:pointer;" onclick="closesecondaryschinput()"><i class="material-icons">close</i></span>
                                                </div>
                                              </div>
                                              </form>
                                             <a class="blue-text" id="addsecondarysch" style="cursor:pointer;" onclick="showsecondaryschinput()">Add secondary school</a>
                                             <script type="text/javascript">
                                             var addsecondarysch=document.getElementById('addsecondarysch');
                                             var addsecondaryschform=document.getElementById('addsecondaryschform');
                                               function showsecondaryschinput() {
                                                 addsecondaryschform.style.display='block';
                                                 addsecondarysch.style.display='none';
                                               }
                                               function closesecondaryschinput() {
                                                 addsecondaryschform.style.display='none';
                                                 addsecondarysch.style.display='block';
                                               }
                                             </script>
                                             <br>
                                             <div class="divider"></div>
                                             <br>
                                             <b>primary school :</b><br>
                                             <ul class="collection">
                                               @foreach ($portfolio as $data)
                                                 @if ($data->category=='education' && $data->nature=='primarysch')
                                                   <li class="collection-item" id="{{$data->id}}item">{{$data->data}}<i id="{{$data->id}}" style="cursor:pointer;" class="close material-icons right">close</i></li>
                                                   <form id="{{$data->id}}frm" action="{{route('deleteportfolio')}}" method="post">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="id" value="{{$data->id}}">
                                                   </form>
                                                   <script type="text/javascript">
                                                   console.log('sdsdssdsdfrfrgfrg');
                                                     var primaryschitem=document.getElementById('{{$data->id}}item');
                                                     var deleteprimarysch=document.getElementById('{{$data->id}}');
                                                     deleteprimarysch.addEventListener("click",deleteprimaryschfunction);
                                                     function deleteprimaryschfunction() {
                                                       console.log('sdsds');
                                                     var form=document.getElementById('{{$data->id}}frm');
                                                     var action = form.getAttribute("action");
                                                     var form_data = new FormData(form);
                                                     var xhr = new XMLHttpRequest();
                                                     xhr.open('POST', action, true);
                                                     xhr.send(form_data);
                                                     xhr.onreadystatechange = function () {
                                                       if(xhr.readyState == 4 && xhr.status == 200) {
                                                         console.log('fsdf');
                                                          var result = xhr.responseText;
                                                          primaryschitem.style.display='none';
                                                          console.log('Result: ' + result);

                                                       }
                                                     };
                                                   }
                                                   </script>
                                                 @endif
                                               @endforeach
                                             </ul>
                                             <form id="addprimaryschform" action="{{route('addprimary')}}" method="post" style="display:none;">
                                               {{csrf_field()}}
                                               <div class="row">
                                               <div class="input-field col s9">
                                                 <input id="from" type="text" name="primary">
                                               </div>
                                               <div class=" input-field col s3">
                                                 <span class="blue-text" style="cursor:pointer;" id="addprimaryschbtn" onclick="addprimaryschform.submit();"><i class="material-icons">done</i></span>
                                                 <span class="blue-text" style="cursor:pointer;" onclick="closeprimaryschinput()"><i class="material-icons">close</i></span>
                                               </div>
                                             </div>
                                             </form>
                                            <a class="blue-text" id="addprimarysch" style="cursor:pointer;" onclick="showprimaryschinput()">Add primary school</a>
                                            <script type="text/javascript">
                                            var addprimarysch=document.getElementById('addprimarysch');
                                            var addprimaryschform=document.getElementById('addprimaryschform');
                                              function showprimaryschinput() {
                                                addprimaryschform.style.display='block';
                                                addprimarysch.style.display='none';
                                              }
                                              function closeprimaryschinput() {
                                                addprimaryschform.style.display='none';
                                                addprimarysch.style.display='block';
                                              }
                                            </script>
                                              {{-- contenten --}}
                                             </div>
                                          </div>

                                          <div class="card ">
                                             <div class="card-content ">
                                               <span class="card-title"><i class="material-icons">portrait</i>&nbsp;Professional Qualifications</span>
                                               <ul class="collection">
                                                 @foreach ($portfolio as $data)
                                                   @if ($data->category=='profqual' && $data->nature=='profqual')
                                                     <li class="collection-item" id="{{$data->id}}item">{{$data->data}}<i id="{{$data->id}}" style="cursor:pointer;" class="close material-icons right">close</i></li>
                                                     <form id="{{$data->id}}frm" action="{{route('deleteportfolio')}}" method="post">
                                                      {{ csrf_field() }}
                                                      <input type="hidden" name="id" value="{{$data->id}}">
                                                     </form>
                                                     <script type="text/javascript">
                                                     console.log('sdsdssdsdfrfrgfrg');
                                                       var profqualitem=document.getElementById('{{$data->id}}item');
                                                       var deleteprofqual=document.getElementById('{{$data->id}}');
                                                       deleteprofqual.addEventListener("click",deleteprofqualfunction);
                                                       function deleteprofqualfunction() {
                                                         console.log('sdsds');
                                                       var form=document.getElementById('{{$data->id}}frm');
                                                       var action = form.getAttribute("action");
                                                       var form_data = new FormData(form);
                                                       var xhr = new XMLHttpRequest();
                                                       xhr.open('POST', action, true);
                                                       xhr.send(form_data);
                                                       xhr.onreadystatechange = function () {
                                                         if(xhr.readyState == 4 && xhr.status == 200) {
                                                           console.log('fsdf');
                                                            var result = xhr.responseText;
                                                            profqualitem.style.display='none';
                                                            console.log('Result: ' + result);

                                                         }
                                                       };
                                                     }
                                                     </script>
                                                   @endif
                                                 @endforeach
                                               </ul>
                                               <form id="addprofqualform" action="{{route('addprofqual')}}" method="post" style="display:none;">
                                                 {{csrf_field()}}
                                                 <div class="row">
                                                 <div class="input-field col s9">
                                                   <input id="from" type="text" name="profqual">
                                                 </div>
                                                 <div class=" input-field col s3">
                                                   <span class="blue-text" style="cursor:pointer;" id="addprofqualbtn" onclick="addprofqualform.submit();"><i class="material-icons">done</i></span>
                                                   <span class="blue-text" style="cursor:pointer;" onclick="closeprofqualinput()"><i class="material-icons">close</i></span>
                                                 </div>
                                               </div>
                                               </form>
                                              <a class="blue-text" id="addprofqual" style="cursor:pointer;" onclick="showprofqualinput()">Add professional qualifications</a>
                                              <script type="text/javascript">
                                              var addprofqual=document.getElementById('addprofqual');
                                              var addprofqualform=document.getElementById('addprofqualform');
                                                function showprofqualinput() {
                                                  addprofqualform.style.display='block';
                                                  addprofqual.style.display='none';
                                                }
                                                function closeprofqualinput() {
                                                  addprofqualform.style.display='none';
                                                  addprofqual.style.display='block';
                                                }
                                              </script>
                                              <br>
                                              <div class="divider"></div>
                                              <br>
                                             </div>
                                          </div>

                                          <div class="card ">
                                             <div class="card-content ">
                                               <span class="card-title"><i class="material-icons">insert_drive_file</i>&nbsp;Research Papers</span>
                                               <ul class="collection">
                                                 @foreach ($portfolio as $data)
                                                   @if ($data->category=='researchpapers' && $data->nature=='researchpapers')
                                                     <li class="collection-item" id="{{$data->id}}item">{{$data->data}}<i id="{{$data->id}}" style="cursor:pointer;" class="close material-icons right">close</i></li>
                                                     <form id="{{$data->id}}frm" action="{{route('deleteportfolio')}}" method="post">
                                                      {{ csrf_field() }}
                                                      <input type="hidden" name="id" value="{{$data->id}}">
                                                     </form>
                                                     <script type="text/javascript">
                                                     console.log('sdsdssdsdfrfrgfrg');
                                                       var researchpapersitem=document.getElementById('{{$data->id}}item');
                                                       var deleteresearchpapers=document.getElementById('{{$data->id}}');
                                                       deleteresearchpapers.addEventListener("click",deleteresearchpapersfunction);
                                                       function deleteresearchpapersfunction() {
                                                         console.log('sdsds');
                                                       var form=document.getElementById('{{$data->id}}frm');
                                                       var action = form.getAttribute("action");
                                                       var form_data = new FormData(form);
                                                       var xhr = new XMLHttpRequest();
                                                       xhr.open('POST', action, true);
                                                       xhr.send(form_data);
                                                       xhr.onreadystatechange = function () {
                                                         if(xhr.readyState == 4 && xhr.status == 200) {
                                                           console.log('fsdf');
                                                            var result = xhr.responseText;
                                                            researchpapersitem.style.display='none';
                                                            console.log('Result: ' + result);

                                                         }
                                                       };
                                                     }
                                                     </script>
                                                   @endif
                                                 @endforeach
                                               </ul>
                                               <form id="addresearchpapersform" action="{{route('addresearchpapers')}}" method="post" style="display:none;">
                                                 {{csrf_field()}}
                                                 <div class="row">
                                                 <div class="input-field col s9">
                                                   <input id="from" type="text" name="researchpapers">
                                                 </div>
                                                 <div class=" input-field col s3">
                                                   <span class="blue-text" style="cursor:pointer;" id="addresearchpapersbtn" onclick="addresearchpapersform.submit();"><i class="material-icons">done</i></span>
                                                   <span class="blue-text" style="cursor:pointer;" onclick="closeresearchpapersinput()"><i class="material-icons">close</i></span>
                                                 </div>
                                               </div>
                                               </form>
                                              <a class="blue-text" id="addresearchpapers" style="cursor:pointer;" onclick="showresearchpapersinput()">Add research papers</a>
                                              <script type="text/javascript">
                                              var addresearchpapers=document.getElementById('addresearchpapers');
                                              var addresearchpapersform=document.getElementById('addresearchpapersform');
                                                function showresearchpapersinput() {
                                                  addresearchpapersform.style.display='block';
                                                  addresearchpapers.style.display='none';
                                                }
                                                function closeresearchpapersinput() {
                                                  addresearchpapersform.style.display='none';
                                                  addresearchpapers.style.display='block';
                                                }
                                              </script>
                                              <br>
                                              <div class="divider"></div>
                                              <br>
                                             </div>
                                          </div>
                                      </div>

                                      <div class="col s12 m6 l6">
                                          <div class="card ">
                                             <div class="card-content">
                                               <span class="card-title "><i class="material-icons">work</i>&nbsp;Work Experience</span>
                                               <li class="divider"></li><br>
                                               <b>current employment:</b><br>
                                               <ul class="collection">
                                                 @foreach ($portfolio as $data)
                                                   @if ($data->category=='work' && $data->nature=='current')
                                                     <li class="collection-item" id="{{$data->id}}item">{{$data->data}}<i id="{{$data->id}}" style="cursor:pointer;" class="close material-icons right">close</i></li>
                                                     <form id="{{$data->id}}frm" action="{{route('deleteportfolio')}}" method="post">
                                                      {{ csrf_field() }}
                                                      <input type="hidden" name="id" value="{{$data->id}}">
                                                     </form>
                                                     <script type="text/javascript">
                                                     console.log('sdsdssdsdfrfrgfrg');
                                                       var item=document.getElementById('{{$data->id}}item');
                                                       var deletecurrent=document.getElementById('{{$data->id}}');
                                                       deletecurrent.addEventListener("click",deletecurrentfunction);
                                                       function deletecurrentfunction() {
                                                         console.log('sdsds');
                                                       var form=document.getElementById('{{$data->id}}frm');
                                                       var action = form.getAttribute("action");
                                                       var form_data = new FormData(form);
                                                       var xhr = new XMLHttpRequest();
                                                       xhr.open('POST', action, true);
                                                       xhr.send(form_data);
                                                       xhr.onreadystatechange = function () {
                                                         if(xhr.readyState == 4 && xhr.status == 200) {
                                                           console.log('fsdf');
                                                            var result = xhr.responseText;
                                                            item.style.display='none';
                                                            console.log('Result: ' + result);

                                                         }
                                                       };
                                                     }
                                                     </script>
                                                   @endif
                                                 @endforeach
                                               </ul>
                                               <form id="addcurrentform" action="{{route('addcurrentwork')}}" method="post" style="display:none;">
                                                 {{csrf_field()}}
                                                 <div class="row">
                                                 <div class="input-field col s9">
                                                   <input id="from" type="text" name="current">
                                                 </div>
                                                 <div class=" input-field col s3">
                                                   <span class="blue-text" style="cursor:pointer;" id="addcurrentbtn" onclick="addcurrentform.submit();"><i class="material-icons">done</i></span>
                                                   <span class="blue-text" style="cursor:pointer;" onclick="closecurrentinput()"><i class="material-icons">close</i></span>
                                                 </div>
                                               </div>
                                               </form>
                                              <a class="blue-text" id="addcurrent" style="cursor:pointer;" onclick="showcurrentinput()">Add current employment</a>
                                              <script type="text/javascript">
                                              var addcurrent=document.getElementById('addcurrent');
                                              var addcurrentform=document.getElementById('addcurrentform');
                                                function showcurrentinput() {
                                                  addcurrentform.style.display='block';
                                                  addcurrent.style.display='none';
                                                }
                                                function closecurrentinput() {
                                                  addcurrentform.style.display='none';
                                                  addcurrent.style.display='block';
                                                }
                                              </script>
                                              <br>
                                              <div class="divider"></div>
                                              <br>
                                              <b>previous employment:</b><br>
                                              <ul class="collection">
                                                @foreach ($portfolio as $data)
                                                  @if ($data->category=='work' && $data->nature=='previous')
                                                    <li class="collection-item" id="{{$data->id}}item">{{$data->data}}<i id="{{$data->id}}" style="cursor:pointer;" class="close material-icons right">close</i></li>
                                                    <form id="{{$data->id}}frm" action="{{route('deleteportfolio')}}" method="post">
                                                     {{ csrf_field() }}
                                                     <input type="hidden" name="id" value="{{$data->id}}">
                                                    </form>
                                                    <script type="text/javascript">
                                                    console.log('sdsdssdsdfrfrgfrg');
                                                      var previousitem=document.getElementById('{{$data->id}}item');
                                                      var deleteprevious=document.getElementById('{{$data->id}}');
                                                      deleteprevious.addEventListener("click",deletepreviousfunction);
                                                      function deletepreviousfunction() {
                                                        console.log('sdsds');
                                                      var form=document.getElementById('{{$data->id}}frm');
                                                      var action = form.getAttribute("action");
                                                      var form_data = new FormData(form);
                                                      var xhr = new XMLHttpRequest();
                                                      xhr.open('POST', action, true);
                                                      xhr.send(form_data);
                                                      xhr.onreadystatechange = function () {
                                                        if(xhr.readyState == 4 && xhr.status == 200) {
                                                          console.log('fsdf');
                                                           var result = xhr.responseText;
                                                           previousitem.style.display='none';
                                                           console.log('Result: ' + result);

                                                        }
                                                      };
                                                    }
                                                    </script>
                                                  @endif
                                                @endforeach
                                              </ul>
                                              <form id="addpreviousform" action="{{route('addpreviouswork')}}" method="post" style="display:none;">
                                                {{csrf_field()}}
                                                <div class="row">
                                                <div class="input-field col s9">
                                                  <input id="from" type="text" name="previous">
                                                </div>
                                                <div class=" input-field col s3">
                                                  <span class="blue-text" style="cursor:pointer;" id="addpreviousbtn" onclick="addpreviousform.submit();"><i class="material-icons">done</i></span>
                                                  <span class="blue-text" style="cursor:pointer;" onclick="closepreviousinput()"><i class="material-icons">close</i></span>
                                                </div>
                                              </div>
                                              </form>
                                             <a class="blue-text" id="addprevious" style="cursor:pointer;" onclick="showpreviousinput()">Add previous employment</a>
                                             <script type="text/javascript">
                                             var addprevious=document.getElementById('addprevious');
                                             var addpreviousform=document.getElementById('addpreviousform');
                                               function showpreviousinput() {
                                                 addpreviousform.style.display='block';
                                                 addprevious.style.display='none';
                                               }
                                               function closepreviousinput() {
                                                 addpreviousform.style.display='none';
                                                 addprevious.style.display='block';
                                               }
                                             </script>
                                             </div>
                                          </div>
                                          <div class="card">
                                             <div class="card-content ">
                                               <span class="card-title"><i class="material-icons">grade</i>&nbsp;Achievements</span><br>
                                               <ul class="collection">
                                                 @foreach ($portfolio as $data)
                                                   @if ($data->category=='achievements' && $data->nature=='achievements')
                                                     <li class="collection-item" id="{{$data->id}}item">{{$data->data}}<i id="{{$data->id}}" style="cursor:pointer;" class="close material-icons right">close</i></li>
                                                     <form id="{{$data->id}}frm" action="{{route('deleteportfolio')}}" method="post">
                                                      {{ csrf_field() }}
                                                      <input type="hidden" name="id" value="{{$data->id}}">
                                                     </form>
                                                     <script type="text/javascript">
                                                     console.log('sdsdssdsdfrfrgfrg');
                                                       var achievementsitem=document.getElementById('{{$data->id}}item');
                                                       var deleteachievements=document.getElementById('{{$data->id}}');
                                                       deleteachievements.addEventListener("click",deleteachievementsfunction);
                                                       function deleteachievementsfunction() {
                                                         console.log('sdsds');
                                                       var form=document.getElementById('{{$data->id}}frm');
                                                       var action = form.getAttribute("action");
                                                       var form_data = new FormData(form);
                                                       var xhr = new XMLHttpRequest();
                                                       xhr.open('POST', action, true);
                                                       xhr.send(form_data);
                                                       xhr.onreadystatechange = function () {
                                                         if(xhr.readyState == 4 && xhr.status == 200) {
                                                           console.log('fsdf');
                                                            var result = xhr.responseText;
                                                            achievementsitem.style.display='none';
                                                            console.log('Result: ' + result);

                                                         }
                                                       };
                                                     }
                                                     </script>
                                                   @endif
                                                 @endforeach
                                               </ul>
                                               <form id="addachievementsform" action="{{route('addachievements')}}" method="post" style="display:none;">
                                                 {{csrf_field()}}
                                                 <div class="row">
                                                 <div class="input-field col s9">
                                                   <input id="from" type="text" name="achievements">
                                                 </div>
                                                 <div class=" input-field col s3">
                                                   <span class="blue-text" style="cursor:pointer;" id="addachievementsbtn" onclick="addachievementsform.submit();"><i class="material-icons">done</i></span>
                                                   <span class="blue-text" style="cursor:pointer;" onclick="closeachievementsinput()"><i class="material-icons">close</i></span>
                                                 </div>
                                               </div>
                                               </form>
                                              <a class="blue-text" id="addachievements" style="cursor:pointer;" onclick="showachievementsinput()">Add achievements</a>
                                              <script type="text/javascript">
                                              var addachievements=document.getElementById('addachievements');
                                              var addachievementsform=document.getElementById('addachievementsform');
                                                function showachievementsinput() {
                                                  addachievementsform.style.display='block';
                                                  addachievements.style.display='none';
                                                }
                                                function closeachievementsinput() {
                                                  addachievementsform.style.display='none';
                                                  addachievements.style.display='block';
                                                }
                                              </script>
                                              <br>
                                              <div class="divider"></div>
                                              <br>
                                             </div>
                                          </div>

                                          <div class="card ">
                                             <div class="card-content ">
                                               <span class="card-title"><i class="material-icons">subject</i>&nbsp;Patents</span>
                                               <ul class="collection">
                                                 @foreach ($portfolio as $data)
                                                   @if ($data->category=='patents' && $data->nature=='patents')
                                                     <li class="collection-item" id="{{$data->id}}item">{{$data->data}}<i id="{{$data->id}}" style="cursor:pointer;" class="close material-icons right">close</i></li>
                                                     <form id="{{$data->id}}frm" action="{{route('deleteportfolio')}}" method="post">
                                                      {{ csrf_field() }}
                                                      <input type="hidden" name="id" value="{{$data->id}}">
                                                     </form>
                                                     <script type="text/javascript">
                                                     console.log('sdsdssdsdfrfrgfrg');
                                                       var patentsitem=document.getElementById('{{$data->id}}item');
                                                       var deletepatents=document.getElementById('{{$data->id}}');
                                                       deletepatents.addEventListener("click",deletepatentsfunction);
                                                       function deletepatentsfunction() {
                                                         console.log('sdsds');
                                                       var form=document.getElementById('{{$data->id}}frm');
                                                       var action = form.getAttribute("action");
                                                       var form_data = new FormData(form);
                                                       var xhr = new XMLHttpRequest();
                                                       xhr.open('POST', action, true);
                                                       xhr.send(form_data);
                                                       xhr.onreadystatechange = function () {
                                                         if(xhr.readyState == 4 && xhr.status == 200) {
                                                           console.log('fsdf');
                                                            var result = xhr.responseText;
                                                            patentsitem.style.display='none';
                                                            console.log('Result: ' + result);

                                                         }
                                                       };
                                                     }
                                                     </script>
                                                   @endif
                                                 @endforeach
                                               </ul>
                                               <form id="addpatentsform" action="{{route('addpatents')}}" method="post" style="display:none;">
                                                 {{csrf_field()}}
                                                 <div class="row">
                                                 <div class="input-field col s9">
                                                   <input id="from" type="text" name="patents">
                                                 </div>
                                                 <div class=" input-field col s3">
                                                   <span class="blue-text" style="cursor:pointer;" id="addpatentsbtn" onclick="addpatentsform.submit();"><i class="material-icons">done</i></span>
                                                   <span class="blue-text" style="cursor:pointer;" onclick="closepatentsinput()"><i class="material-icons">close</i></span>
                                                 </div>
                                               </div>
                                               </form>
                                              <a class="blue-text" id="addpatents" style="cursor:pointer;" onclick="showpatentsinput()">Add patents</a>
                                              <script type="text/javascript">
                                              var addpatents=document.getElementById('addpatents');
                                              var addpatentsform=document.getElementById('addpatentsform');
                                                function showpatentsinput() {
                                                  addpatentsform.style.display='block';
                                                  addpatents.style.display='none';
                                                }
                                                function closepatentsinput() {
                                                  addpatentsform.style.display='none';
                                                  addpatents.style.display='block';
                                                }
                                              </script>
                                              <br>
                                              <div class="divider"></div>
                                              <br>
                                             </div>
                                          </div>

                                          <div class="card ">
                                             <div class="card-content ">
                                               <span class="card-title"><i class="material-icons">recent_actors</i>&nbsp;Interests</span>
                                               <ul class="collection">
                                                 @foreach ($portfolio as $data)
                                                   @if ($data->category=='interests' && $data->nature=='interests')
                                                     <li class="collection-item" id="{{$data->id}}item">{{$data->data}}<i id="{{$data->id}}" style="cursor:pointer;" class="close material-icons right">close</i></li>
                                                     <form id="{{$data->id}}frm" action="{{route('deleteportfolio')}}" method="post">
                                                      {{ csrf_field() }}
                                                      <input type="hidden" name="id" value="{{$data->id}}">
                                                     </form>
                                                     <script type="text/javascript">
                                                     console.log('sdsdssdsdfrfrgfrg');
                                                       var interestsitem=document.getElementById('{{$data->id}}item');
                                                       var deleteinterests=document.getElementById('{{$data->id}}');
                                                       deleteinterests.addEventListener("click",deleteinterestsfunction);
                                                       function deleteinterestsfunction() {
                                                         console.log('sdsds');
                                                       var form=document.getElementById('{{$data->id}}frm');
                                                       var action = form.getAttribute("action");
                                                       var form_data = new FormData(form);
                                                       var xhr = new XMLHttpRequest();
                                                       xhr.open('POST', action, true);
                                                       xhr.send(form_data);
                                                       xhr.onreadystatechange = function () {
                                                         if(xhr.readyState == 4 && xhr.status == 200) {
                                                           console.log('fsdf');
                                                            var result = xhr.responseText;
                                                            interestsitem.style.display='none';
                                                            console.log('Result: ' + result);

                                                         }
                                                       };
                                                     }
                                                     </script>
                                                   @endif
                                                 @endforeach
                                               </ul>
                                               <form id="addinterestsform" action="{{route('addinterests')}}" method="post" style="display:none;">
                                                 {{csrf_field()}}
                                                 <div class="row">
                                                 <div class="input-field col s9">
                                                   <input id="from" type="text" name="interests">
                                                 </div>
                                                 <div class=" input-field col s3">
                                                   <span class="blue-text" style="cursor:pointer;" id="addinterestsbtn" onclick="addinterestsform.submit();"><i class="material-icons">done</i></span>
                                                   <span class="blue-text" style="cursor:pointer;" onclick="closeinterestsinput()"><i class="material-icons">close</i></span>
                                                 </div>
                                               </div>
                                               </form>
                                              <a class="blue-text" id="addinterests" style="cursor:pointer;" onclick="showinterestsinput()">Add interests</a>
                                              <script type="text/javascript">
                                              var addinterests=document.getElementById('addinterests');
                                              var addinterestsform=document.getElementById('addinterestsform');
                                                function showinterestsinput() {
                                                  addinterestsform.style.display='block';
                                                  addinterests.style.display='none';
                                                }
                                                function closeinterestsinput() {
                                                  addinterestsform.style.display='none';
                                                  addinterests.style.display='block';
                                                }
                                              </script>
                                              <br>
                                              <div class="divider"></div>
                                              <br>
                                             </div>
                                          </div>
                                      </div>
                                    </div>
                                    {{-- <div class="divider"></div><br> --}}
                                    {{-- <div class="row"> --}}
                                        {{-- <div class="col s12 m6 l6">
                                            <div class="card "> --}}
                                              {{-- contentstart --}}
                                               {{-- <div class="card-content ">
                                                 <span class="card-title"><i class="material-icons">school</i>&nbsp;Education</span>
                                                 <div class="divider"></div><br>
                                                 <b>University:</b><br>
                                                 <ul class="collection">
                                                   @foreach ($portfolio as $data)
                                                     @if ($data->category=='education' && $data->nature=='university')
                                                       <li class="collection-item" id="{{$data->id}}item">{{$data->data}}<i id="{{$data->id}}" style="cursor:pointer;" class="close material-icons right">close</i></li>
                                                       <form id="{{$data->id}}frm" action="{{route('deleteportfolio')}}" method="post">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="id" value="{{$data->id}}">
                                                       </form>
                                                       <script type="text/javascript">
                                                       console.log('sdsdssdsdfrfrgfrg');
                                                         var universityitem=document.getElementById('{{$data->id}}item');
                                                         var deleteuniversity=document.getElementById('{{$data->id}}');
                                                         deleteuniversity.addEventListener("click",deleteuniversityfunction);
                                                         function deleteuniversityfunction() {
                                                           console.log('sdsds');
                                                         var form=document.getElementById('{{$data->id}}frm');
                                                         var action = form.getAttribute("action");
                                                         var form_data = new FormData(form);
                                                         var xhr = new XMLHttpRequest();
                                                         xhr.open('POST', action, true);
                                                         xhr.send(form_data);
                                                         xhr.onreadystatechange = function () {
                                                           if(xhr.readyState == 4 && xhr.status == 200) {
                                                             console.log('fsdf');
                                                              var result = xhr.responseText;
                                                              universityitem.style.display='none';
                                                              console.log('Result: ' + result);

                                                           }
                                                         };
                                                       }
                                                       </script>
                                                     @endif
                                                   @endforeach
                                                 </ul>
                                                 <form id="adduniversityform" action="{{route('adduniversity')}}" method="post" style="display:none;">
                                                   {{csrf_field()}}
                                                   <div class="row">
                                                   <div class="input-field col s9">
                                                     <input id="from" type="text" name="university">
                                                   </div>
                                                   <div class=" input-field col s3">
                                                     <span class="blue-text" style="cursor:pointer;" id="adduniversitybtn" onclick="adduniversityform.submit();"><i class="material-icons">done</i></span>
                                                     <span class="blue-text" style="cursor:pointer;" onclick="closeuniversityinput()"><i class="material-icons">close</i></span>
                                                   </div>
                                                 </div>
                                                 </form>
                                                <a class="blue-text" id="adduniversity" style="cursor:pointer;" onclick="showuniversityinput()">Add university</a>
                                                <script type="text/javascript">
                                                var adduniversity=document.getElementById('adduniversity');
                                                var adduniversityform=document.getElementById('adduniversityform');
                                                  function showuniversityinput() {
                                                    adduniversityform.style.display='block';
                                                    adduniversity.style.display='none';
                                                  }
                                                  function closeuniversityinput() {
                                                    adduniversityform.style.display='none';
                                                    adduniversity.style.display='block';
                                                  }
                                                </script>
                                                <br>
                                                <div class="divider"></div>
                                                <br>
                                                <b>college :</b><br>
                                                <ul class="collection"> --}}
                                                  {{-- @foreach ($portfolio as $data)
                                                    @if ($data->category=='education' && $data->nature=='college')
                                                      <li class="collection-item" id="{{$data->id}}item">{{$data->data}}<i id="{{$data->id}}" style="cursor:pointer;" class="close material-icons right">close</i></li>
                                                      <form id="{{$data->id}}frm" action="{{route('deleteportfolio')}}" method="post">
                                                       {{ csrf_field() }}
                                                       <input type="hidden" name="id" value="{{$data->id}}">
                                                      </form>
                                                      <script type="text/javascript">
                                                      console.log('sdsdssdsdfrfrgfrg');
                                                        var collegeitem=document.getElementById('{{$data->id}}item');
                                                        var deletecollege=document.getElementById('{{$data->id}}');
                                                        deletecollege.addEventListener("click",deletecollegefunction);
                                                        function deletecollegefunction() {
                                                          console.log('sdsds');
                                                        var form=document.getElementById('{{$data->id}}frm');
                                                        var action = form.getAttribute("action");
                                                        var form_data = new FormData(form);
                                                        var xhr = new XMLHttpRequest();
                                                        xhr.open('POST', action, true);
                                                        xhr.send(form_data);
                                                        xhr.onreadystatechange = function () {
                                                          if(xhr.readyState == 4 && xhr.status == 200) {
                                                            console.log('fsdf');
                                                             var result = xhr.responseText;
                                                             collegeitem.style.display='none';
                                                             console.log('Result: ' + result);

                                                          }
                                                        };
                                                      }
                                                      </script>
                                                    @endif
                                                  @endforeach --}}
                                                {{-- </ul> --}}
                                                {{-- <form id="addcollegeform" action="{{route('addcollege')}}" method="post" style="display:none;">
                                                  {{csrf_field()}}
                                                  <div class="row">
                                                  <div class="input-field col s9">
                                                    <input id="from" type="text" name="college">
                                                  </div>
                                                  <div class=" input-field col s3">
                                                    <span class="blue-text" style="cursor:pointer;" id="addcollegebtn" onclick="addcollegeform.submit();"><i class="material-icons">done</i></span>
                                                    <span class="blue-text" style="cursor:pointer;" onclick="closecollegeinput()"><i class="material-icons">close</i></span>
                                                  </div>
                                                </div>
                                                </form>
                                               <a class="blue-text" id="addcollege" style="cursor:pointer;" onclick="showcollegeinput()">Add college</a> --}}
                                               {{-- <script type="text/javascript">
                                               var addcollege=document.getElementById('addcollege');
                                               var addcollegeform=document.getElementById('addcollegeform');
                                                 function showcollegeinput() {
                                                   addcollegeform.style.display='block';
                                                   addcollege.style.display='none';
                                                 }
                                                 function closecollegeinput() {
                                                   addcollegeform.style.display='none';
                                                   addcollege.style.display='block';
                                                 }
                                               </script> --}}
                                                {{-- <br>
                                                <div class="divider"></div>
                                                <br>
                                                <b>secondary school :</b><br>
                                                <ul class="collection"> --}}
                                                  {{-- @foreach ($portfolio as $data)
                                                    @if ($data->category=='education' && $data->nature=='secondarysch')
                                                      <li class="collection-item" id="{{$data->id}}item">{{$data->data}}<i id="{{$data->id}}" style="cursor:pointer;" class="close material-icons right">close</i></li>
                                                      <form id="{{$data->id}}frm" action="{{route('deleteportfolio')}}" method="post">
                                                       {{ csrf_field() }}
                                                       <input type="hidden" name="id" value="{{$data->id}}">
                                                      </form>
                                                      <script type="text/javascript">
                                                      console.log('sdsdssdsdfrfrgfrg');
                                                        var secondaryschitem=document.getElementById('{{$data->id}}item');
                                                        var deletesecondarysch=document.getElementById('{{$data->id}}');
                                                        deletesecondarysch.addEventListener("click",deletesecondaryschfunction);
                                                        function deletesecondaryschfunction() {
                                                          console.log('sdsds');
                                                        var form=document.getElementById('{{$data->id}}frm');
                                                        var action = form.getAttribute("action");
                                                        var form_data = new FormData(form);
                                                        var xhr = new XMLHttpRequest();
                                                        xhr.open('POST', action, true);
                                                        xhr.send(form_data);
                                                        xhr.onreadystatechange = function () {
                                                          if(xhr.readyState == 4 && xhr.status == 200) {
                                                            console.log('fsdf');
                                                             var result = xhr.responseText;
                                                             secondaryschitem.style.display='none';
                                                             console.log('Result: ' + result);

                                                          }
                                                        };
                                                      }
                                                      </script>
                                                    @endif
                                                  @endforeach --}}
                                                {{-- </ul>
                                                <form id="addsecondaryschform" action="{{route('addsecondary')}}" method="post" style="display:none;">
                                                  {{csrf_field()}}
                                                  <div class="row">
                                                  <div class="input-field col s9">
                                                    <input id="from" type="text" name="secondary">
                                                  </div>
                                                  <div class=" input-field col s3">
                                                    <span class="blue-text" style="cursor:pointer;" id="addsecondaryschbtn" onclick="addsecondaryschform.submit();"><i class="material-icons">done</i></span>
                                                    <span class="blue-text" style="cursor:pointer;" onclick="closesecondaryschinput()"><i class="material-icons">close</i></span>
                                                  </div>
                                                </div>
                                                </form>
                                               <a class="blue-text" id="addsecondarysch" style="cursor:pointer;" onclick="showsecondaryschinput()">Add secondary school</a> --}}
                                               {{-- <script type="text/javascript">
                                               var addsecondarysch=document.getElementById('addsecondarysch');
                                               var addsecondaryschform=document.getElementById('addsecondaryschform');
                                                 function showsecondaryschinput() {
                                                   addsecondaryschform.style.display='block';
                                                   addsecondarysch.style.display='none';
                                                 }
                                                 function closesecondaryschinput() {
                                                   addsecondaryschform.style.display='none';
                                                   addsecondarysch.style.display='block';
                                                 }
                                               </script> --}}
                                               {{-- <br>
                                               <div class="divider"></div>
                                               <br>
                                               <b>primary school :</b><br>
                                               <ul class="collection"> --}}
                                                 {{-- @foreach ($portfolio as $data)
                                                   @if ($data->category=='education' && $data->nature=='primarysch')
                                                     <li class="collection-item" id="{{$data->id}}item">{{$data->data}}<i id="{{$data->id}}" style="cursor:pointer;" class="close material-icons right">close</i></li>
                                                     <form id="{{$data->id}}frm" action="{{route('deleteportfolio')}}" method="post">
                                                      {{ csrf_field() }}
                                                      <input type="hidden" name="id" value="{{$data->id}}">
                                                     </form>
                                                     <script type="text/javascript">
                                                     console.log('sdsdssdsdfrfrgfrg');
                                                       var primaryschitem=document.getElementById('{{$data->id}}item');
                                                       var deleteprimarysch=document.getElementById('{{$data->id}}');
                                                       deleteprimarysch.addEventListener("click",deleteprimaryschfunction);
                                                       function deleteprimaryschfunction() {
                                                         console.log('sdsds');
                                                       var form=document.getElementById('{{$data->id}}frm');
                                                       var action = form.getAttribute("action");
                                                       var form_data = new FormData(form);
                                                       var xhr = new XMLHttpRequest();
                                                       xhr.open('POST', action, true);
                                                       xhr.send(form_data);
                                                       xhr.onreadystatechange = function () {
                                                         if(xhr.readyState == 4 && xhr.status == 200) {
                                                           console.log('fsdf');
                                                            var result = xhr.responseText;
                                                            primaryschitem.style.display='none';
                                                            console.log('Result: ' + result);

                                                         }
                                                       };
                                                     }
                                                     </script>
                                                   @endif
                                                 @endforeach --}}
                                               {{-- </ul>
                                               <form id="addprimaryschform" action="{{route('addprimary')}}" method="post" style="display:none;">
                                                 {{csrf_field()}}
                                                 <div class="row">
                                                 <div class="input-field col s9">
                                                   <input id="from" type="text" name="primary">
                                                 </div>
                                                 <div class=" input-field col s3">
                                                   <span class="blue-text" style="cursor:pointer;" id="addprimaryschbtn" onclick="addprimaryschform.submit();"><i class="material-icons">done</i></span>
                                                   <span class="blue-text" style="cursor:pointer;" onclick="closeprimaryschinput()"><i class="material-icons">close</i></span>
                                                 </div>
                                               </div>
                                               </form>
                                              <a class="blue-text" id="addprimarysch" style="cursor:pointer;" onclick="showprimaryschinput()">Add primary school</a> --}}
                                              {{-- <script type="text/javascript">
                                              var addprimarysch=document.getElementById('addprimarysch');
                                              var addprimaryschform=document.getElementById('addprimaryschform');
                                                function showprimaryschinput() {
                                                  addprimaryschform.style.display='block';
                                                  addprimarysch.style.display='none';
                                                }
                                                function closeprimaryschinput() {
                                                  addprimaryschform.style.display='none';
                                                  addprimarysch.style.display='block';
                                                }
                                              </script> --}}
                                                {{-- contenten --}}
                                               {{-- </div>
                                            </div>
                                        </div> --}}
                                        {{-- <div class="col s12 m6 l6">
                                            <div class="card">
                                               <div class="card-content ">
                                                 <span class="card-title"><i class="material-icons">grade</i>&nbsp;achievements</span><br>
                                                 <ul class="collection">
                                                   @foreach ($portfolio as $data)
                                                     @if ($data->category=='achievements' && $data->nature=='achievements')
                                                       <li class="collection-item" id="{{$data->id}}item">{{$data->data}}<i id="{{$data->id}}" style="cursor:pointer;" class="close material-icons right">close</i></li>
                                                       <form id="{{$data->id}}frm" action="{{route('deleteportfolio')}}" method="post">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="id" value="{{$data->id}}">
                                                       </form>
                                                       <script type="text/javascript">
                                                       console.log('sdsdssdsdfrfrgfrg');
                                                         var achievementsitem=document.getElementById('{{$data->id}}item');
                                                         var deleteachievements=document.getElementById('{{$data->id}}');
                                                         deleteachievements.addEventListener("click",deleteachievementsfunction);
                                                         function deleteachievementsfunction() {
                                                           console.log('sdsds');
                                                         var form=document.getElementById('{{$data->id}}frm');
                                                         var action = form.getAttribute("action");
                                                         var form_data = new FormData(form);
                                                         var xhr = new XMLHttpRequest();
                                                         xhr.open('POST', action, true);
                                                         xhr.send(form_data);
                                                         xhr.onreadystatechange = function () {
                                                           if(xhr.readyState == 4 && xhr.status == 200) {
                                                             console.log('fsdf');
                                                              var result = xhr.responseText;
                                                              achievementsitem.style.display='none';
                                                              console.log('Result: ' + result);

                                                           }
                                                         };
                                                       }
                                                       </script>
                                                     @endif
                                                   @endforeach
                                                 </ul>
                                                 <form id="addachievementsform" action="{{route('addachievements')}}" method="post" style="display:none;">
                                                   {{csrf_field()}}
                                                   <div class="row">
                                                   <div class="input-field col s9">
                                                     <input id="from" type="text" name="achievements">
                                                   </div>
                                                   <div class=" input-field col s3">
                                                     <span class="blue-text" style="cursor:pointer;" id="addachievementsbtn" onclick="addachievementsform.submit();"><i class="material-icons">done</i></span>
                                                     <span class="blue-text" style="cursor:pointer;" onclick="closeachievementsinput()"><i class="material-icons">close</i></span>
                                                   </div>
                                                 </div>
                                                 </form>
                                                <a class="blue-text" id="addachievements" style="cursor:pointer;" onclick="showachievementsinput()">Add achievements</a>
                                                <script type="text/javascript">
                                                var addachievements=document.getElementById('addachievements');
                                                var addachievementsform=document.getElementById('addachievementsform');
                                                  function showachievementsinput() {
                                                    addachievementsform.style.display='block';
                                                    addachievements.style.display='none';
                                                  }
                                                  function closeachievementsinput() {
                                                    addachievementsform.style.display='none';
                                                    addachievements.style.display='block';
                                                  }
                                                </script>
                                                <br>
                                                <div class="divider"></div>
                                                <br>
                                               </div>
                                            </div>
                                        </div> --}}

                                      {{-- </div> --}}
                                      {{-- <div class="divider"></div><br> --}}
                                      {{-- <div class="row" style="margin:10px;"> --}}
                                          {{-- <div class="col s12 m6 l6">
                                              <div class="card ">
                                                 <div class="card-content ">
                                                   <span class="card-title"><i class="material-icons">portrait</i>&nbsp;Professional Qualifications</span>
                                                   <ul class="collection">
                                                     @foreach ($portfolio as $data)
                                                       @if ($data->category=='profqual' && $data->nature=='profqual')
                                                         <li class="collection-item" id="{{$data->id}}item">{{$data->data}}<i id="{{$data->id}}" style="cursor:pointer;" class="close material-icons right">close</i></li>
                                                         <form id="{{$data->id}}frm" action="{{route('deleteportfolio')}}" method="post">
                                                          {{ csrf_field() }}
                                                          <input type="hidden" name="id" value="{{$data->id}}">
                                                         </form>
                                                         <script type="text/javascript">
                                                         console.log('sdsdssdsdfrfrgfrg');
                                                           var profqualitem=document.getElementById('{{$data->id}}item');
                                                           var deleteprofqual=document.getElementById('{{$data->id}}');
                                                           deleteprofqual.addEventListener("click",deleteprofqualfunction);
                                                           function deleteprofqualfunction() {
                                                             console.log('sdsds');
                                                           var form=document.getElementById('{{$data->id}}frm');
                                                           var action = form.getAttribute("action");
                                                           var form_data = new FormData(form);
                                                           var xhr = new XMLHttpRequest();
                                                           xhr.open('POST', action, true);
                                                           xhr.send(form_data);
                                                           xhr.onreadystatechange = function () {
                                                             if(xhr.readyState == 4 && xhr.status == 200) {
                                                               console.log('fsdf');
                                                                var result = xhr.responseText;
                                                                profqualitem.style.display='none';
                                                                console.log('Result: ' + result);

                                                             }
                                                           };
                                                         }
                                                         </script>
                                                       @endif
                                                     @endforeach
                                                   </ul>
                                                   <form id="addprofqualform" action="{{route('addprofqual')}}" method="post" style="display:none;">
                                                     {{csrf_field()}}
                                                     <div class="row">
                                                     <div class="input-field col s9">
                                                       <input id="from" type="text" name="profqual">
                                                     </div>
                                                     <div class=" input-field col s3">
                                                       <span class="blue-text" style="cursor:pointer;" id="addprofqualbtn" onclick="addprofqualform.submit();"><i class="material-icons">done</i></span>
                                                       <span class="blue-text" style="cursor:pointer;" onclick="closeprofqualinput()"><i class="material-icons">close</i></span>
                                                     </div>
                                                   </div>
                                                   </form>
                                                  <a class="blue-text" id="addprofqual" style="cursor:pointer;" onclick="showprofqualinput()">Add professional qualifications</a>
                                                  <script type="text/javascript">
                                                  var addprofqual=document.getElementById('addprofqual');
                                                  var addprofqualform=document.getElementById('addprofqualform');
                                                    function showprofqualinput() {
                                                      addprofqualform.style.display='block';
                                                      addprofqual.style.display='none';
                                                    }
                                                    function closeprofqualinput() {
                                                      addprofqualform.style.display='none';
                                                      addprofqual.style.display='block';
                                                    }
                                                  </script>
                                                  <br>
                                                  <div class="divider"></div>
                                                  <br>
                                                 </div>
                                              </div>
                                          </div> --}}
                                          {{-- <div class="col s12 m6 l6">
                                              <div class="card ">
                                                 <div class="card-content ">
                                                   <span class="card-title"><i class="material-icons">subject</i>&nbsp;Patents</span>
                                                   <ul class="collection">
                                                     @foreach ($portfolio as $data)
                                                       @if ($data->category=='patents' && $data->nature=='patents')
                                                         <li class="collection-item" id="{{$data->id}}item">{{$data->data}}<i id="{{$data->id}}" style="cursor:pointer;" class="close material-icons right">close</i></li>
                                                         <form id="{{$data->id}}frm" action="{{route('deleteportfolio')}}" method="post">
                                                          {{ csrf_field() }}
                                                          <input type="hidden" name="id" value="{{$data->id}}">
                                                         </form>
                                                         <script type="text/javascript">
                                                         console.log('sdsdssdsdfrfrgfrg');
                                                           var patentsitem=document.getElementById('{{$data->id}}item');
                                                           var deletepatents=document.getElementById('{{$data->id}}');
                                                           deletepatents.addEventListener("click",deletepatentsfunction);
                                                           function deletepatentsfunction() {
                                                             console.log('sdsds');
                                                           var form=document.getElementById('{{$data->id}}frm');
                                                           var action = form.getAttribute("action");
                                                           var form_data = new FormData(form);
                                                           var xhr = new XMLHttpRequest();
                                                           xhr.open('POST', action, true);
                                                           xhr.send(form_data);
                                                           xhr.onreadystatechange = function () {
                                                             if(xhr.readyState == 4 && xhr.status == 200) {
                                                               console.log('fsdf');
                                                                var result = xhr.responseText;
                                                                patentsitem.style.display='none';
                                                                console.log('Result: ' + result);

                                                             }
                                                           };
                                                         }
                                                         </script>
                                                       @endif
                                                     @endforeach
                                                   </ul>
                                                   <form id="addpatentsform" action="{{route('addpatents')}}" method="post" style="display:none;">
                                                     {{csrf_field()}}
                                                     <div class="row">
                                                     <div class="input-field col s9">
                                                       <input id="from" type="text" name="patents">
                                                     </div>
                                                     <div class=" input-field col s3">
                                                       <span class="blue-text" style="cursor:pointer;" id="addpatentsbtn" onclick="addpatentsform.submit();"><i class="material-icons">done</i></span>
                                                       <span class="blue-text" style="cursor:pointer;" onclick="closepatentsinput()"><i class="material-icons">close</i></span>
                                                     </div>
                                                   </div>
                                                   </form>
                                                  <a class="blue-text" id="addpatents" style="cursor:pointer;" onclick="showpatentsinput()">Add patents</a>
                                                  <script type="text/javascript">
                                                  var addpatents=document.getElementById('addpatents');
                                                  var addpatentsform=document.getElementById('addpatentsform');
                                                    function showpatentsinput() {
                                                      addpatentsform.style.display='block';
                                                      addpatents.style.display='none';
                                                    }
                                                    function closepatentsinput() {
                                                      addpatentsform.style.display='none';
                                                      addpatents.style.display='block';
                                                    }
                                                  </script>
                                                  <br>
                                                  <div class="divider"></div>
                                                  <br>
                                                 </div>
                                              </div>
                                          </div>
                                        </div> --}}
                                        {{-- <div class="divider"></div><br> --}}
                                        {{-- <div class="row" style="margin:10px;"> --}}
                                            {{-- <div class="col s12 m6 l6">
                                                <div class="card ">
                                                   <div class="card-content ">
                                                     <span class="card-title"><i class="material-icons">insert_drive_file</i>&nbsp;Research Papers</span>
                                                     <ul class="collection">
                                                       @foreach ($portfolio as $data)
                                                         @if ($data->category=='researchpapers' && $data->nature=='researchpapers')
                                                           <li class="collection-item" id="{{$data->id}}item">{{$data->data}}<i id="{{$data->id}}" style="cursor:pointer;" class="close material-icons right">close</i></li>
                                                           <form id="{{$data->id}}frm" action="{{route('deleteportfolio')}}" method="post">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="id" value="{{$data->id}}">
                                                           </form>
                                                           <script type="text/javascript">
                                                           console.log('sdsdssdsdfrfrgfrg');
                                                             var researchpapersitem=document.getElementById('{{$data->id}}item');
                                                             var deleteresearchpapers=document.getElementById('{{$data->id}}');
                                                             deleteresearchpapers.addEventListener("click",deleteresearchpapersfunction);
                                                             function deleteresearchpapersfunction() {
                                                               console.log('sdsds');
                                                             var form=document.getElementById('{{$data->id}}frm');
                                                             var action = form.getAttribute("action");
                                                             var form_data = new FormData(form);
                                                             var xhr = new XMLHttpRequest();
                                                             xhr.open('POST', action, true);
                                                             xhr.send(form_data);
                                                             xhr.onreadystatechange = function () {
                                                               if(xhr.readyState == 4 && xhr.status == 200) {
                                                                 console.log('fsdf');
                                                                  var result = xhr.responseText;
                                                                  researchpapersitem.style.display='none';
                                                                  console.log('Result: ' + result);

                                                               }
                                                             };
                                                           }
                                                           </script>
                                                         @endif
                                                       @endforeach
                                                     </ul>
                                                     <form id="addresearchpapersform" action="{{route('addresearchpapers')}}" method="post" style="display:none;">
                                                       {{csrf_field()}}
                                                       <div class="row">
                                                       <div class="input-field col s9">
                                                         <input id="from" type="text" name="researchpapers">
                                                       </div>
                                                       <div class=" input-field col s3">
                                                         <span class="blue-text" style="cursor:pointer;" id="addresearchpapersbtn" onclick="addresearchpapersform.submit();"><i class="material-icons">done</i></span>
                                                         <span class="blue-text" style="cursor:pointer;" onclick="closeresearchpapersinput()"><i class="material-icons">close</i></span>
                                                       </div>
                                                     </div>
                                                     </form>
                                                    <a class="blue-text" id="addresearchpapers" style="cursor:pointer;" onclick="showresearchpapersinput()">Add research papers</a>
                                                    <script type="text/javascript">
                                                    var addresearchpapers=document.getElementById('addresearchpapers');
                                                    var addresearchpapersform=document.getElementById('addresearchpapersform');
                                                      function showresearchpapersinput() {
                                                        addresearchpapersform.style.display='block';
                                                        addresearchpapers.style.display='none';
                                                      }
                                                      function closeresearchpapersinput() {
                                                        addresearchpapersform.style.display='none';
                                                        addresearchpapers.style.display='block';
                                                      }
                                                    </script>
                                                    <br>
                                                    <div class="divider"></div>
                                                    <br>
                                                   </div>
                                                </div>
                                            </div> --}}
                                            {{-- <div class="col s12 m6 l6">
                                                <div class="card ">
                                                   <div class="card-content ">
                                                     <span class="card-title"><i class="material-icons">recent_actors</i>&nbsp;Interests</span>
                                                     <ul class="collection">
                                                       @foreach ($portfolio as $data)
                                                         @if ($data->category=='interests' && $data->nature=='interests')
                                                           <li class="collection-item" id="{{$data->id}}item">{{$data->data}}<i id="{{$data->id}}" style="cursor:pointer;" class="close material-icons right">close</i></li>
                                                           <form id="{{$data->id}}frm" action="{{route('deleteportfolio')}}" method="post">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="id" value="{{$data->id}}">
                                                           </form>
                                                           <script type="text/javascript">
                                                           console.log('sdsdssdsdfrfrgfrg');
                                                             var interestsitem=document.getElementById('{{$data->id}}item');
                                                             var deleteinterests=document.getElementById('{{$data->id}}');
                                                             deleteinterests.addEventListener("click",deleteinterestsfunction);
                                                             function deleteinterestsfunction() {
                                                               console.log('sdsds');
                                                             var form=document.getElementById('{{$data->id}}frm');
                                                             var action = form.getAttribute("action");
                                                             var form_data = new FormData(form);
                                                             var xhr = new XMLHttpRequest();
                                                             xhr.open('POST', action, true);
                                                             xhr.send(form_data);
                                                             xhr.onreadystatechange = function () {
                                                               if(xhr.readyState == 4 && xhr.status == 200) {
                                                                 console.log('fsdf');
                                                                  var result = xhr.responseText;
                                                                  interestsitem.style.display='none';
                                                                  console.log('Result: ' + result);

                                                               }
                                                             };
                                                           }
                                                           </script>
                                                         @endif
                                                       @endforeach
                                                     </ul>
                                                     <form id="addinterestsform" action="{{route('addinterests')}}" method="post" style="display:none;">
                                                       {{csrf_field()}}
                                                       <div class="row">
                                                       <div class="input-field col s9">
                                                         <input id="from" type="text" name="interests">
                                                       </div>
                                                       <div class=" input-field col s3">
                                                         <span class="blue-text" style="cursor:pointer;" id="addinterestsbtn" onclick="addinterestsform.submit();"><i class="material-icons">done</i></span>
                                                         <span class="blue-text" style="cursor:pointer;" onclick="closeinterestsinput()"><i class="material-icons">close</i></span>
                                                       </div>
                                                     </div>
                                                     </form>
                                                    <a class="blue-text" id="addinterests" style="cursor:pointer;" onclick="showinterestsinput()">Add interests</a>
                                                    <script type="text/javascript">
                                                    var addinterests=document.getElementById('addinterests');
                                                    var addinterestsform=document.getElementById('addinterestsform');
                                                      function showinterestsinput() {
                                                        addinterestsform.style.display='block';
                                                        addinterests.style.display='none';
                                                      }
                                                      function closeinterestsinput() {
                                                        addinterestsform.style.display='none';
                                                        addinterests.style.display='block';
                                                      }
                                                    </script>
                                                    <br>
                                                    <div class="divider"></div>
                                                    <br>
                                                   </div>
                                                </div>
                                            </div> --}}
                                          {{-- </div> --}}
                                          {{-- <div class="divider"></div><br>
                                          <div class="row" style="margin:10px;">
                                              <div class="col s12 m6 l6">
                                                  <div class="card ">
                                                     <div class="card-content ">
                                                       <span class="card-title"><i class="material-icons">recent_actors</i>&nbsp;Interests</span>
                                                       <li class="divider"></li><br>
                                                       <span id="nointerests" class="blue-text">Add your interests</span>
                                                       @foreach ($portfolio as $edu)
                                                       @if ($edu->category=='interests' && $edu->nature=='interests')
                                                        <span class="chip col s12">{{$edu->data}}<i id="{{$edu->data}}"class="close material-icons">close</i></span>
                                                        <form id="{{$edu->id}}" action="{{route('deleteportfolio')}}" method="post">
                                                         {{ csrf_field() }}
                                                         <input type="hidden" name="id" value="{{$edu->id}}">
                                                        </form>
                                                        <script type="text/javascript">
                                                          document.getElementById("nointerests").style.display="none";
                                                          var deleteinterests=document.getElementById('{{$edu->data}}');
                                                          deleteinterests.addEventListener("click",deleteinterestsfunction)
                                                          function deleteinterestsrsityfunction() {
                                                          var form=document.getElementById('{{$edu->id}}');
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
                                                       @endif
                                                       @endforeach
                                                       <div id="addnewinterests">
                                                       </div>
                                                       <br>
                                                       <form id="addinterests-form" action="{{route('addinterests')}}" method="post">
                                                         {{csrf_field()}}
                                                         <div class="input-field col s12">
                                                           <input id="interests" type="text" name="interests">
                                                           <label for="interests">
                                                             Enter your interests
                                                           </label>
                                                           <button type="submit" class="btn btn-floating right"id="addinterestsbtn" name="button"><i type="submit"class="material-icons">send</i></button>
                                                         </div>
                                                       </form>
                                                       <script type="text/javascript">
                                                         var addinterestsbtn=document.getElementById('addinterestsbtn');
                                                         addinterestsbtn.addEventListener("click", function(event) {
                                                         addinterestsfunction();
                                                         event.preventDefault();
                                                         });

                                                         function addinterestsfunction() {
                                                         var form=document.getElementById('addinterests-form');
                                                         var action = form.getAttribute("action");
                                                         var form_data = new FormData(form);
                                                         var xhr = new XMLHttpRequest();
                                                         xhr.open('POST', action, true);
                                                         xhr.send(form_data);
                                                         xhr.onreadystatechange = function () {
                                                           if(xhr.readyState == 4 && xhr.status == 200) {
                                                              var result = xhr.responseText;
                                                              console.log('Result: ' + result);
                                                              var json = JSON.parse(result);
                                                              document.getElementById("nointerests").style.display="none";
                                                              document.getElementById("addnewinterests").innerHTML+='<span class="chip col s12">'+json+'</span>';
                                                              form.reset();
                                                           }
                                                         };
                                                       }
                                                       </script>
                                                       <div class="card-content">
                                                         &nbsp;
                                                       </div>
                                                     </div>
                                                  </div>
                                              </div> --}}
                                              {{-- <div class="col s12 m6 l6">
                                                  <div class="card ">
                                                     <div class="card-content ">
                                                       <span class="card-title"><i class="material-icons">group</i>&nbsp;Social Links</span>
                                                       <li class="divider"></li><br>
                                                       <b>Facebook:</b><br>
                                                       <span id="nofacebook" class="blue-text">Add your facebook</span>
                                                       @foreach ($portfolio as $edu)
                                                       @if ($edu->category=='social' && $edu->nature=='facebook')
                                                        <span class="chip col s12"><a href="//{{$edu->data}}" class="blue-text"><u>{{$edu->data}}</u></a><i id="{{$edu->data}}"class="close material-icons">close</i></span>
                                                        <form id="{{$edu->id}}" action="{{route('deleteportfolio')}}" method="post">
                                                         {{ csrf_field() }}
                                                         <input type="hidden" name="id" value="{{$edu->id}}">
                                                        </form>
                                                        <script type="text/javascript">
                                                          document.getElementById("nofacebook").style.display="none";
                                                          var deletefacebook=document.getElementById('{{$edu->data}}');
                                                          deletefacebook.addEventListener("click",deletefacebookfunction)
                                                          function deletefacebookfunction() {
                                                          var form=document.getElementById('{{$edu->id}}');
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
                                                       @endif
                                                       @endforeach
                                                       <div id="addnewfacebook">
                                                       </div>
                                                       <br>
                                                       <form id="addfacebook-form" action="{{route('addfacebook')}}" method="post">
                                                         {{csrf_field()}}
                                                         <div class="input-field col s12">
                                                           <input id="facebook" type="text" name="facebook">
                                                           <label for="facebook">
                                                             Enter your facebook
                                                           </label>
                                                           <button type="submit" class="btn btn-floating right"id="addfacebookbtn" name="button"><i type="submit"class="material-icons">send</i></button>
                                                         </div>
                                                       </form>
                                                       <script type="text/javascript">
                                                         var addfacebookbtn=document.getElementById('addfacebookbtn');
                                                         addfacebookbtn.addEventListener("click", function(event) {
                                                         addfacebookfunction();
                                                         event.preventDefault();
                                                         });

                                                         function addfacebookfunction() {
                                                         var form=document.getElementById('addfacebook-form');
                                                         var action = form.getAttribute("action");
                                                         var form_data = new FormData(form);
                                                         var xhr = new XMLHttpRequest();
                                                         xhr.open('POST', action, true);
                                                         xhr.send(form_data);
                                                         xhr.onreadystatechange = function () {
                                                           if(xhr.readyState == 4 && xhr.status == 200) {
                                                              var result = xhr.responseText;
                                                              console.log('Result: ' + result);
                                                              var json = JSON.parse(result);
                                                              document.getElementById("nofacebook").style.display="none";
                                                              document.getElementById("addnewfacebook").innerHTML+='<span class="chip col s12"><a href="//'+json+'" class="blue-text"><u>'+json+'</u></a></span>';
                                                              form.reset();
                                                           }
                                                         };
                                                       }
                                                       </script>
                                                       <br><br>
                                                       <b>LinkedIn :</b><br>
                                                       <span id="nolinkedin" class="blue-text">Add your linkedin</span>
                                                       @foreach ($portfolio as $edu)
                                                       @if ($edu->category=='social' && $edu->nature=='linkedin')
                                                        <span class="chip col s12"><a href="//{{$edu->data}}" target="_blank" class="blue-text"><u>{{$edu->data}}</u></a><i id="{{$edu->data}}"class="close material-icons">close</i></span>
                                                        <form id="{{$edu->id}}" action="{{route('deleteportfolio')}}" method="post">
                                                         {{ csrf_field() }}
                                                         <input type="hidden" name="id" value="{{$edu->id}}">
                                                        </form>
                                                        <script type="text/javascript">
                                                          document.getElementById("nolinkedin").style.display="none";
                                                          var deletelinkedin=document.getElementById('{{$edu->data}}');
                                                          deletelinkedin.addEventListener("click",deletelinkedinfunction)
                                                          function deletelinkedinfunction() {
                                                          var form=document.getElementById('{{$edu->id}}');
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
                                                       @endif
                                                       @endforeach
                                                       <div id="addnewlinkedin">
                                                       </div>
                                                       <br>
                                                       <form id="addlinkedin-form" action="{{route('addlinkedin')}}" method="post">
                                                         {{csrf_field()}}
                                                         <div class="input-field col s12">
                                                           <input id="linkedin" type="text" name="linkedin">
                                                           <label for="linkedin">
                                                             Enter your linkedin
                                                           </label>
                                                           <button type="submit" class="btn btn-floating right"id="addlinkedinbtn" name="button"><i type="submit"class="material-icons">send</i></button>
                                                         </div>
                                                       </form>
                                                       <script type="text/javascript">
                                                         var addlinkedinbtn=document.getElementById('addlinkedinbtn');
                                                         addlinkedinbtn.addEventListener("click", function(event) {
                                                         addlinkedinfunction();
                                                         event.preventDefault();
                                                         });

                                                         function addlinkedinfunction() {
                                                         var form=document.getElementById('addlinkedin-form');
                                                         var action = form.getAttribute("action");
                                                         var form_data = new FormData(form);
                                                         var xhr = new XMLHttpRequest();
                                                         xhr.open('POST', action, true);
                                                         xhr.send(form_data);
                                                         xhr.onreadystatechange = function () {
                                                           if(xhr.readyState == 4 && xhr.status == 200) {
                                                              var result = xhr.responseText;
                                                              console.log('Result: ' + result);
                                                              var json = JSON.parse(result);
                                                              document.getElementById("nolinkedin").style.display="none";
                                                              document.getElementById("addnewlinkedin").innerHTML+='<span class="chip col s12"><a href="//'+json+'" class="blue-text"><u>'+json+'</u></a></span>';
                                                              form.reset();
                                                           }
                                                         };
                                                       }
                                                       </script>
                                                       <br><br>
                                                       <b>Twitter :</b><br>
                                                       <span id="notwitter" class="blue-text">Add your twitter</span>
                                                       @foreach ($portfolio as $edu)
                                                       @if ($edu->category=='social' && $edu->nature=='twitter')
                                                        <span class="chip col s12"><a href="//{{$edu->data}}" class="blue-text"><u>{{$edu->data}}</u></a><i id="{{$edu->data}}"class="close material-icons">close</i></span>
                                                        <form id="{{$edu->id}}" action="{{route('deleteportfolio')}}" method="post">
                                                         {{ csrf_field() }}
                                                         <input type="hidden" name="id" value="{{$edu->id}}">
                                                        </form>
                                                        <script type="text/javascript">
                                                          document.getElementById("notwitter").style.display="none";
                                                          var deletetwitter=document.getElementById('{{$edu->data}}');
                                                          deletetwitter.addEventListener("click",deletetwitterfunction)
                                                          function deletetwitterfunction() {
                                                          var form=document.getElementById('{{$edu->id}}');
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
                                                       @endif
                                                       @endforeach
                                                       <div id="addnewtwitter">
                                                       </div>
                                                       <br>
                                                       <form id="addtwitter-form" action="{{route('addtwitter')}}" method="post">
                                                         {{csrf_field()}}
                                                         <div class="input-field col s12">
                                                           <input id="twitter" type="text" name="twitter">
                                                           <label for="twitter">
                                                             Enter your twitter
                                                           </label>
                                                           <button type="submit" class="btn btn-floating right"id="addtwitterbtn" name="button"><i type="submit"class="material-icons">send</i></button>
                                                         </div>
                                                       </form>
                                                       <script type="text/javascript">
                                                         var addtwitterbtn=document.getElementById('addtwitterbtn');
                                                         addtwitterbtn.addEventListener("click", function(event) {
                                                         addtwitterfunction();
                                                         event.preventDefault();
                                                         });

                                                         function addtwitterfunction() {
                                                         var form=document.getElementById('addtwitter-form');
                                                         var action = form.getAttribute("action");
                                                         var form_data = new FormData(form);
                                                         var xhr = new XMLHttpRequest();
                                                         xhr.open('POST', action, true);
                                                         xhr.send(form_data);
                                                         xhr.onreadystatechange = function () {
                                                           if(xhr.readyState == 4 && xhr.status == 200) {
                                                              var result = xhr.responseText;
                                                              console.log('Result: ' + result);
                                                              var json = JSON.parse(result);
                                                              document.getElementById("notwitter").style.display="none";
                                                              document.getElementById("addnewtwitter").innerHTML+='<span class="chip col s12"><a href="//'+json+'" class="blue-text"><u>'+json+'</u></a></span>';
                                                              form.reset();
                                                           }
                                                         };
                                                       }
                                                       </script>
                                                       <br><br>
                                                       <b>Instagram :</b><br>
                                                       <span id="noinstagram" class="blue-text">Add your instagram</span>
                                                       @foreach ($portfolio as $edu)
                                                       @if ($edu->category=='social' && $edu->nature=='instagram')
                                                        <span class="chip col s12"><a href="//{{$edu->data}}" class="blue-text"><u>{{$edu->data}}</u></a><i id="{{$edu->data}}"class="close material-icons">close</i></span>
                                                        <form id="{{$edu->id}}" action="{{route('deleteportfolio')}}" method="post">
                                                         {{ csrf_field() }}
                                                         <input type="hidden" name="id" value="{{$edu->id}}">
                                                        </form>
                                                        <script type="text/javascript">
                                                          document.getElementById("noinstagram").style.display="none";
                                                          var deleteinstagram=document.getElementById('{{$edu->data}}');
                                                          deleteinstagram.addEventListener("click",deleteinstagramfunction)
                                                          function deleteinstagramfunction() {
                                                          var form=document.getElementById('{{$edu->id}}');
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
                                                       @endif
                                                       @endforeach
                                                       <div id="addnewinstagram">
                                                       </div>
                                                       <br>
                                                       <form id="addinstagram-form" action="{{route('addinstagram')}}" method="post">
                                                         {{csrf_field()}}
                                                         <div class="input-field col s12">
                                                           <input id="instagram" type="text" name="instagram">
                                                           <label for="instagram">
                                                             Enter your instagram
                                                           </label>
                                                           <button type="submit" class="btn btn-floating right"id="addinstagrambtn" name="button"><i type="submit"class="material-icons">send</i></button>
                                                         </div>
                                                       </form>
                                                       <script type="text/javascript">
                                                         var addinstagrambtn=document.getElementById('addinstagrambtn');
                                                         addinstagrambtn.addEventListener("click", function(event) {
                                                         addinstagramfunction();
                                                         event.preventDefault();
                                                         });

                                                         function addinstagramfunction() {
                                                         var form=document.getElementById('addinstagram-form');
                                                         var action = form.getAttribute("action");
                                                         var form_data = new FormData(form);
                                                         var xhr = new XMLHttpRequest();
                                                         xhr.open('POST', action, true);
                                                         xhr.send(form_data);
                                                         xhr.onreadystatechange = function () {
                                                           if(xhr.readyState == 4 && xhr.status == 200) {
                                                              var result = xhr.responseText;
                                                              console.log('Result: ' + result);
                                                              var json = JSON.parse(result);
                                                              document.getElementById("noinstagram").style.display="none";
                                                              document.getElementById("addnewinstagram").innerHTML+='<span class="chip col s12"><a href="//'+json+'" class="blue-text"><u>'+json+'</u></a></span>';
                                                              form.reset();
                                                           }
                                                         };
                                                       }
                                                       </script>
                                                       <div class="card-content">
                                                         &nbsp;
                                                       </div>
                                                     </div>
                                                  </div>
                                              </div> --}}
                                            {{-- </div> --}}
                              </div>

                            </div>

</div>
<div class="row">
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
                {{$goals->goalname}}
                <div class="progress">
                    <div class="determinate" style="width: {{$goals->goalcompletedpercentage}}%"> </div>
                </div>
                {{$goals->goalcompletedpercentage}}%
              </div>
            @endif
          @endforeach
        </li>

        <li>
          <div class="collapsible-header"><b>Goals in progress</b></div>
          @foreach ($goal as $goals)
            @if ($goals->goalcompletedpercentage<100)
              <div class="collapsible-body">
                {{$goals->goalname}}
                <div class="progress">
                    <div class="determinate" style="width: {{$goals->goalcompletedpercentage}}%"> </div>
                </div>
                {{$goals->goalcompletedpercentage}}%
              </div>
            @endif
          @endforeach
        </li>

      </ul>
      <br>
      <br><br>

  </div>
</div>
</div>
<!-- ///////////////// -->
<div class="row">

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
                              @if($userskills->type=="skill")
                            <div class="chip">

                                {{$userskills->skill}}

                              <i id="{{$userskills->skill}}"class="close material-icons">close</i>
                            </div>
                            <form id="{{$userskills->id}}" action="{{route('deleteskill')}}" method="post">
                             {{ csrf_field() }}
                             <input type="hidden" name="id" value="{{$userskills->id}}">
                            </form>
                            <script type="text/javascript">
                              var deletealignedbtn=document.getElementById('{{$userskills->skill}}');
                              deletealignedbtn.addEventListener("click",deletealignedfunction)
                              function deletealignedfunction() {
                              var form=document.getElementById('{{$userskills->id}}');
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
                          @endif
                            @endforeach

                            <form id="skillform" action="{{ route('skill')}}" method="post">
                          {{ csrf_field() }}
                          <input type="hidden" id="skillinput" name="skill" value="">

                            <br><span class="blue-text">Enter your skills below</span>
                           <div id="skillchip" style="border-bottom:2px solid #0d47a1;"class="chips chips-initial"></div>

                            </form>

                            <script type="text/javascript">
                            var y=0;
                            $('#skillchip').on('chip.add', function(e, chip){


                              var z=$('#skillchip').material_chip('data');

                              var form = document.getElementById("skillform");
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
                                @if($userskills->type=="strength")
                              <div class="chip">

                                  {{$userskills->skill}}

                                <i id="{{$userskills->skill}}"class="close material-icons">close</i>
                              </div>
                              <form id="{{$userskills->id}}" action="{{route('deleteskill')}}" method="post">
                               {{ csrf_field() }}
                               <input type="hidden" name="id" value="{{$userskills->id}}">
                              </form>
                              <script type="text/javascript">
                                var deletealignedbtn=document.getElementById('{{$userskills->skill}}');
                                deletealignedbtn.addEventListener("click",deletealignedfunction)
                                function deletealignedfunction() {
                                var form=document.getElementById('{{$userskills->id}}');
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
                            @endif
                              @endforeach
                              <form id="strengthform"action="{{route('strength')}}" method="post">
                              {{ csrf_field() }}
                                <input type="hidden" id="strengthinput" name="strength" value="">
                                <br><span class="blue-text">Enter your strengths below</span>
                              <div style="border-bottom:2px solid #0d47a1;" id="strengthchip"class="chips chips-initial">

                              </div>
                              </form>
                              <script type="text/javascript">
                              var i=0;
                              $('#strengthchip').on('chip.add', function(e, chip){
                                //agdyabadadadad
                                var x=$('#strengthchip').material_chip('data');
                                var form = document.getElementById("strengthform");
                                var action = form.getAttribute("action");
                                var strengthinput=document.getElementById("strengthinput");
                                strengthinput.value=x[i].tag;
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
                                console.log(x[i].tag);
                                i++;
                              });
                              </script>
                            </div>

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



<!-- forthpart -->
<div class="row">
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

                <script type="text/javascript">
                $('.chips').material_chip();
                </script>

          </div>
        </div>


<style>

.userdetail {
  /* width: 100%;
  position: relative;
  background: #FFF;
  border: 1px solid #D5D5D5; */
  /* padding-bottom: 5px; */
  /* margin-bottom: 20px; */
position: relative;
top: -70px;

}

.profile .image {
  display: block;
  position: relative;
  z-index: 1;
  overflow: hidden;
  text-align: center;

}

.profile .user {
  position: relative;

  /* padding: 0px 5px 5px; */
}

.profile .user .avatar {
  position: relative;
  left: 20px;
  top: -85px;
  z-index: 2;
}


.img-profile{
    height:100px;
    width:100px;
}

.img-cover{
    width:1000px;
    height:100px;
}


</style>


     </div>
     <!-- ///////////// -->
     <!-- forthpart -->

          </div>

   </div>
</div>

</div>
</div>






<!--prism-->
<script type="text/javascript" src="{{asset('/js/prismnewview.js') }}"></script>
<!--scrollbar-->
<script type="text/javascript" src="{{asset('/js/perfect-scrollbarnewview.min.js') }}"></script>
<!-- chartist -->
<script type="text/javascript" src="{{asset('/js/chartistnewview.min.js') }}"></script>
<!-- sparkline -->
<script type="text/javascript" src="{{asset('/js/jquery.sparklinenewview.min.js') }}"></script>
<script type="text/javascript" src="{{asset('/js/sparkline-scriptnewview.js') }}"></script>
<!-- google map api -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAZnaZBXLqNBRXjd-82km_NO7GUItyKek"></script>
<!--plugins.js - Some Specific JS codes for Plugin Settings-->
<script type="text/javascript" src="{{asset('/js/pluginsnewview.js') }}"></script>


@endsection
