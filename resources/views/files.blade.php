

 @extends('layouts.navbar')

@section('content')
<script src="https://sdk.amazonaws.com/js/aws-sdk-2.1.24.min.js"></script>

<!--<style>
  .cardsub{
    width:100px;
     height:70px;
  }
</style>-->
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
  <div class="row">
    <div class="card" style="height:600px; overflow-y:scroll;">

      <div class="card-content">
        <div class="btn-floating right" style="display:none;" id="gridviewbtn">
          <i class="material-icons">view_module</i>
        </div>

        <div class="btn-floating right" id="listviewbtn">
          <i class="material-icons">list</i>
        </div>

        <script type="text/javascript">

        $(document).ready(function(){
            $("#listviewbtn").click(function() {
              $("#listviewbtn").hide();
              $("#listviewrow").show();
              $("#gridviewrow").hide();
              $("#gridviewbtn").show();
            });
            $("#gridviewbtn").click(function() {
              $("#gridviewrow").show();
              $("#listviewbtn").show();
              $("#gridviewbtn").hide();
              $("#listviewrow").hide();
            });
          });

        </script>

      <div class="row">
        <div class="col s12 m12 l4">
          <p class="card-title activator grey-text text-darken-4">Upload Your Files</p>
        </div>
      </div>

      <div class="row">
        <div class="col s12 m12 l8">
          <div class="blue-text text-darken-4" id="filesizebar" style="font-weight:bold;" disabled></div>
        </div>
      </div>

      <div class="row">
        <div id="progressdiv" style="display:none;">
          <div class="col s11 m11 l11">
            <div class="progress">
              <div class="determinate" id="percentage"></div>
            </div>
          </div>


          <div class="col s1 m1 l1">
            <b><span class="right" id="percentagedis"></span></b>
          </div>
        </div>
      </div>
    </div>

<div class="row">
<h5>&nbsp My Folders</h5>
<div class="col s4 m6 l2">
  <a class="right btn btn-floating" id="countfilesdisplay"></a>
  <div class="card" id="allfilesfolder" style="height:20%;">
    <div class="card-image waves-effect waves-block waves-light" style="height:150px;">
      <img src="img/icons8-Extensions Folder-100.png">
      <center><span class="blue-text text-darken-4" id="filesizeallfilesdisplay"></span></center>
    </div>
    <center><div class="card-content" style="height:50px;"><b>All Files</b></div></center>
  </div>
  <script>
  allfilesfolder.addEventListener("click",function(event){
    event.preventDefault();
    document.getElementById("documents").style.display="none";
    document.getElementById("pictures").style.display="none";
    document.getElementById("videos").style.display="none";
    document.getElementById("rars&zips").style.display="none";
    document.getElementById("pictures").style.display="none";
    document.getElementById("gridviewrow").style.display="inline";
    document.getElementById("listviewrow").style.display="none";
  });
  </script>
</div>

<div class="col s4 m6 l2">
  <a class="right btn btn-floating" id="countmicdisplay"></a>
  <div class="card" id="musicfolder" style="height:200px;">
    <div class="card-image waves-effect waves-block waves-light" style="height:150px;">
      <img src="img/icons8-Music Folder-100 (1).png">
      <center><span class="blue-text text-darken-4" id="filesizemicdisplay"></span></center>
    </div>
    <center><div class="card-content" style="height:50px;"><b>Music</b></div></center>
  </div>
  <script>
  musicfolder.addEventListener("click",function(event){
    event.preventDefault();
    document.getElementById("documents").style.display="none";
    document.getElementById("pictures").style.display="none";
    document.getElementById("videos").style.display="none";
    document.getElementById("rars&zips").style.display="none";
    document.getElementById("musics").style.display="inline";
    document.getElementById("gridviewrow").style.display="none";
    document.getElementById("listviewrow").style.display="none";

    Materialize.showStaggeredList('#musics');
  });
  </script>
</div>

<div class="col s4 m6 l2">
<a class="right btn btn-floating" id="countpicdisplay"></a>
  <div class="card" id="picturesfolder" style="height:200px;">

    <div class="card-image waves-effect waves-block waves-light" style="height:150px;">
      <img src="img/icons8-Pictures Folder-100 (2).png">
      <center><span class="blue-text text-darken-4" id="filesizepicdisplay"></span></center>
    </div>
    <center><div class="card-content" style="height:50px;"><b>Pictures</b></div></center>
  </div>
  <script>
  picturesfolder.addEventListener("click",function(event){
    event.preventDefault();
    document.getElementById("musics").style.display="none";
    document.getElementById("documents").style.display="none";
    document.getElementById("videos").style.display="none";
    document.getElementById("rars&zips").style.display="none";
    document.getElementById("pictures").style.display="inline";
    document.getElementById("gridviewrow").style.display="none";
    document.getElementById("listviewrow").style.display="none";

    Materialize.showStaggeredList('#pictures');
  });
  </script>
</div>
<div class="col s4 m6 l2">
  <a class="right btn btn-floating" id="countviddisplay"></a>
  <div class="card" id="videosfolder" style="height:200px;;">
    <div class="card-image waves-effect waves-block waves-light" style="height:150px;">
      <img src="img/icons8-Movies Folder-100.png">
      <center><span class="blue-text text-darken-4" id="filesizeviddisplay"></span></center>
    </div>
    <center><div class="card-content" style="height:50px;"><b>Videos</b></div></center>
  </div>
  <script>
  videosfolder.addEventListener("click",function(event){
    event.preventDefault();
    document.getElementById("musics").style.display="none";
    document.getElementById("pictures").style.display="none";
    document.getElementById("documents").style.display="none";
    document.getElementById("rars&zips").style.display="none";
    document.getElementById("videos").style.display="inline";
    document.getElementById("gridviewrow").style.display="none";
    document.getElementById("listviewrow").style.display="none";

    Materialize.showStaggeredList('#videos');
  });
  </script>
</div>
<div class="col s4 m6 l2">
  <a class="right btn btn-floating" id="countdocdisplay"></a>
  <div class="card" id="documentsfolder" style="height:200px;;">
    <div class="card-image waves-effect waves-block waves-light" style="height:150px;">
      <img src="img/icons8-Documents Folder-100.png">
      <center><span class="blue-text text-darken-4" id="filesizedocdisplay"></span></center>
    </div>
    <center><div class="card-content" style="height:50px;"><b>Documents</b></div></center>
  </div>
  <script>
  documentsfolder.addEventListener("click",function(event){
    event.preventDefault();
    document.getElementById("musics").style.display="none";
    document.getElementById("pictures").style.display="none";
    document.getElementById("videos").style.display="none";
    document.getElementById("rars&zips").style.display="none";
    document.getElementById("documents").style.display="inline";
    document.getElementById("gridviewrow").style.display="none";
    document.getElementById("listviewrow").style.display="none";

    Materialize.showStaggeredList('#documents');
  });
  </script>
</div>
<div class="col s4 m6 l2">
  <a class="right btn btn-floating" id="countzipdisplay"></a>
  <div class="card" id="zipfolder" style="height:200px;;">
    <div class="card-image waves-effect waves-block waves-light" style="height:150px;">
      <img src="img/icons8-Archive Folder-100.png">
      <center><span class="blue-text text-darken-4" id="filesizezipdisplay"></span></center>
    </div>
    <center><div class="card-content" style="height:50px;"><b>Zip & Rar</b></div></center>
  </div>
  <script>
  zipfolder.addEventListener("click",function(event){
    event.preventDefault();
    document.getElementById("musics").style.display="none";
    document.getElementById("pictures").style.display="none";
    document.getElementById("videos").style.display="none";
    document.getElementById("documents").style.display="none";
    document.getElementById("rars&zips").style.display="inline";
    document.getElementById("gridviewrow").style.display="none";
    document.getElementById("listviewrow").style.display="none";

    Materialize.showStaggeredList('#rars&zips');

  });
  </script>
</div>

</div>








    <div id="musics" style="display:none;">
      <div class="row">
        <h5>&nbsp Uploaded Musics</h5>
    @foreach ($files as $file)
     <script>
     var fileName = 'https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}';
     var extension = fileName.split('.').pop();
     if(extension=="mp3" || extension=="wmv" || extension=="amw"){

       document.write('<div class="col s12 m6 l2">');
       document.write('<div class="card" style="height:180px;">');
       document.write('<div class="card-image waves-effect waves-block waves-light" style="height:100px;">');
       document.write('<img src="https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}" />');
       document.write('</div>');
       document.write('<a href="https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}">');
       document.write('<p style="font-size=5px;color:black;" class="truncate">Doc Name: {{$file->filename}}</p></a>');
       document.write('<p class="truncate">New Name: {{$file->fakename}}</p>');
       document.write('</div>');
       document.write('</div>');

       }
     </script>
     @endforeach

      </div>
    </div>


    <div id="pictures" style="display:none;">
      <div class="row">
        <h5>&nbsp Uploaded Pictures</h5>
    @foreach ($files as $file)
     <script>
     var fileName = 'https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}';
     var extension = fileName.split('.').pop();
     if(extension=="jpg" || extension=="png" || extension=="jpeg"){

       document.write('<div class="col s12 m6 l2">');
       document.write('<div class="card" style="height:180px;">');
       document.write('<div class="card-image waves-effect waves-block waves-light" style="height:100px;">');
       document.write('<img src="https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}" />');
       document.write('</div>');
       document.write('<a href="https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}">');
       document.write('<p style="font-size=5px;color:black;" class="truncate">Doc Name: {{$file->filename}}</p></a>');
       document.write('<p class="truncate">New Name: {{$file->fakename}}</p>');
       document.write('</div>');
       document.write('</div>');

       }
     </script>
     @endforeach

      </div>
    </div>

    <div id="videos" style="display:none;">
      <div class="row">
        <h5>&nbsp Uploaded Videos</h5>
    @foreach ($files as $file)
    <script>
    var fileName = 'https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}';
    var extension = fileName.split('.').pop();
    if(extension=="mp4" || extension=="kmv"){

      document.write('<div class="col s12 m6 l2">');
      document.write('<div class="card" style="height:180px;">');
      document.write('<div class="card-image waves-effect waves-block waves-light" style="height:100px;">');
      document.write('<img src="img/icons8-YouTube-50.png" />');
      document.write('</div>');
      document.write('<a href="https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}">');
      document.write('<p style="font-size=5px;color:black;" class="truncate">Doc Name: {{$file->filename}}</p></a>');
      document.write('<p class="truncate">New Name: {{$file->fakename}}</p>');
      document.write('</div>');
      document.write('</div>');

      }
    </script>
     @endforeach

      </div>
    </div>


    <div id="documents" style="display:none;">
      <div class="row">
        <h5>&nbsp Uploaded Documents</h5>
    @foreach ($files as $file)
     <script>


     var fileName = 'https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}';
     var extension = fileName.split('.').pop();
     if(extension=="pdf"){

       document.write('<div class="col s12 m6 l2">');
       document.write('<div class="card" style="height:180px;">');
       document.write('<div class="card-image waves-effect waves-block waves-light" style="height:100px;">');
       document.write('<iframe src="https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}" style="width:600px; height:100px;" frameborder="0"></iframe>');
       document.write('</div>');
       document.write('<a href="https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}">');
       document.write('<p style="font-size=5px;color:black;" class="truncate">Doc Name: {{$file->filename}}</p></a>');
       document.write('<p class="truncate">New Name: {{$file->fakename}}</p>');
       document.write('</div>');
       document.write('</div>');

       }

       else if(extension=="txt" || extension=="docx"){
         document.write('<div class="col s12 m6 l2">');
         document.write('<div class="card" style="height:180px;">');
         document.write('<div class="card-image waves-effect waves-block waves-light" style="height:100px;">');
         document.write('<img src="img/icons8-DOC-50.png" height="100px">');
         document.write('</div>');
         document.write('<a href="https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}">');
         document.write('<p style="font-size=5px;color:black;" class="truncate">Doc Name: {{$file->filename}}</p></a>');
         document.write('<p class="truncate">New Name: {{$file->fakename}}</p>');
         document.write('</div>');
         document.write('</div>');
       }
     </script>
     @endforeach

      </div>
    </div>


    <div id="rars&zips" style="display:none;">
      <div class="row">
        <h5>&nbsp Uploaded Rar & Zips</h5>
    @foreach ($files as $file)
    <script>
    var fileName = 'https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}';
    var extension = fileName.split('.').pop();
    if(extension=="rar"){

      document.write('<div class="col s12 m6 l2">');
      document.write('<div class="card" style="height:180px;">');
      document.write('<div class="card-image waves-effect waves-block waves-light" style="height:100px;">');
      document.write('<img src="img/icons8-RAR-50.png" />');
      document.write('</div>');
      document.write('<a href="https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}">');
      document.write('<p style="font-size=5px;color:black;" class="truncate">Doc Name: {{$file->filename}}</p></a>');
      document.write('<p class="truncate">New Name: {{$file->fakename}}</p>');
      document.write('</div>');
      document.write('</div>');

      }

      else if(extension=="zip"){
        document.write('<div class="col s12 m6 l2">');
        document.write('<div class="card" style="height:180px;">');
        document.write('<div class="card-image waves-effect waves-block waves-light" style="height:100px;">');
        document.write('<img src="img/icons8-ZIP-50.png" />');
        document.write('</div>');
        document.write('<a href="https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}">');
        document.write('<p style="font-size=5px;color:black;" class="truncate">Doc Name: {{$file->filename}}</p></a>');
        document.write('<p class="truncate">New Name: {{$file->fakename}}</p>');
        document.write('</div>');
        document.write('</div>');
      }
    </script>
     @endforeach

      </div>
    </div>



  <script>
  var totafilelsize=0;var countpic=0;var countmic=0;var countvid=0;var countdoc=0;var countzip=0;countpdf=0;
  var filesizepic=0;var filesizeallfiles=0; var filesizemic=0; var filesizevid=0; var filesizedoc=0; var filesizezip=0; var filesizepdf=0;
  </script>


    <div class="row" id="gridviewrow">
    <h5>&nbsp Uploaded Files</h5>

     @foreach ($files as $file)

        <div class="col s12 m6 l2">

          <div class="card" id="{{$file->id}}cardgrid" style="height:220px;">

             <!--Modal Trigger -->
            <div data-target="{{$file->id}}gridpopup" class="modal-trigger">
            <div class="card-image waves-effect waves-block waves-light" style="height:100px;">

                 <script>
                     totafilelsize=totafilelsize+({{$file->size}});
                     var fileName = 'https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}';


                     var extension = fileName.split('.').pop();
                       if(extension=="pdf"){
                         countpdf=countpdf+1;
                         filesizepdf=filesizepdf+({{$file->size}});
                         document.write('<iframe src="https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}" style="width:600px; height:100px;" frameborder="0"></iframe>');

                         }

                       else if(extension=="jpg" || extension=="png" || extension=="jpeg"){
                         countpic=countpic+1;
                         filesizepic=filesizepic+({{$file->size}});
                         document.write('<img src="https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}"/>');
                         }

                         else if(extension=="mp3" || extension=="amw" || extension=="wmv"){
                           countmic=countmic+1;
                           filesizemic=filesizemic+({{$file->size}});
                           document.write('<img src="https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}"/>');
                           }

                       else if(extension=="doc" || extension=="docx" || extension=="txt"){
                         countdoc=countdoc+1;
                         filesizedoc=filesizedoc+({{$file->size}});
                        document.write('<img src="img/icons8-DOC-50.png" height="100px">');
                        }

                       else if(extension=="rar" || extension=="zip"){
                         countzip=countzip+1;
                         filesizezip=filesizezip+({{$file->size}});
                        document.write('<img src="img/icons8-RAR-50.png">');
                        }

                       else if(extension=="mp4" || extension=="mkv"){
                         countvid=countvid+1;
                         filesizevid=filesizevid+({{$file->size}});
                         document.write('<img src="img/icons8-YouTube-50.png"/>');
                         }

                </script>
             </div>
           </div>

       <div id="{{$file->id}}gridpopup" class="modal">
         <div class="modal-content">
             <h5><b>File Name:</b> {{$file->filename}}</h5>
             <script>
               var rd = {{$file->size}}.toFixed(4);
               document.write('<h5><b>File Size:</b>'+rd+'GB</h5>');
              </script>

             <h5><b>Uploaded Date:</b> {{$file->created_date}}</h5>
           </div>
       </div>

    <div class="card-content" style="height:120px;">
      <div class="row">
        <a href="https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}">
        <p style="font-size=5px;color:black;" class="truncate">Doc Name: {{$file->filename}}</p></a>
        <p class="truncate">New Name: {{$file->fakename}}</p>
      </div>

      <div class="row">
          <div class="col l4">
          <a class="modal-trigger" href="#{{$file->id}}modgrid"><i class="material-icons" style="cursor:pointer;color:#0d47a1;">mode_edit</i></a>
        </div>

        <div class="col l4">
          <a href="https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}" download>
          <i class="material-icons" style="color:#0d47a1;">file_download</i></a>
        </div>
        <div class="col l4">
            <form id="{{$file->id}}deleteformgrid" action="{{route('deletefile')}}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{$file->id}}">
            <button type="submit" style="background-color:Transparent;border:none;"><i class="material-icons" style="color:black;">delete</i></button>
          </form>

        </div>
      </div>

          <!-- Modal Structure -->
          <div id="{{$file->id}}modgrid" class="modal">
            <div class="modal-content">
              <h5>File Name Already Exist: {{$file->filename}}</h5>
              <form method="POST" id="{{$file->id}}frmgrid" action="{{route('updatefilename')}}">
                {{csrf_field()}}
                <input type="text" name="newfilename" id="name{{$file->id}}grid" placeholder="Change Your File Name"  required>

                <input type="hidden" name="newfileid" value="{{$file->id}}" id="id{{$file->id}}grid">

                <button type="submit" class="btn">Send</button>

              </form>

            </div>
          </div>
       </div>
    </div>
</div>
 @endforeach
 <script>

 document.getElementById("countmicdisplay").innerHTML=countmic;
document.getElementById("countpicdisplay").innerHTML=countpic;
document.getElementById("countviddisplay").innerHTML=countvid;
document.getElementById("countdocdisplay").innerHTML=countdoc+countpdf;
document.getElementById("countzipdisplay").innerHTML=countzip;
document.getElementById("countfilesdisplay").innerHTML=countmic+countpic+countvid+countdoc+countpdf+countzip;

var docpdf=filesizedoc+filesizepdf;
var all=filesizepic+filesizemic+filesizevid+filesizezip+filesizedoc+filesizepdf;
var filesizepicrd = filesizepic.toFixed(4);
var filesizemicrd = filesizemic.toFixed(4);
var filesizevidrd = filesizevid.toFixed(4);
var filesizeziprd = filesizezip.toFixed(4);
var docpdfrd=docpdf.toFixed(4);
var allrd=all.toFixed(4);
document.getElementById("filesizepicdisplay").innerHTML=filesizepicrd+'GB';
document.getElementById("filesizemicdisplay").innerHTML=filesizemicrd+'GB';
document.getElementById("filesizeviddisplay").innerHTML=filesizevidrd+'GB';
document.getElementById("filesizedocdisplay").innerHTML=docpdfrd+'GB';
document.getElementById("filesizezipdisplay").innerHTML=filesizeziprd+'GB';
document.getElementById("filesizeallfilesdisplay").innerHTML=allrd+'GB';


var remainsize=5-allrd;

document.getElementById("filesizebar").innerHTML="Your Total file size:"+" "+allrd+" "+"GB and Your remaining file size: "+remainsize+"GB";

if(allrd==5){
  document.getElementById("buttonupload").style.display="none";
}
 </script>
 </div>





     <div class="row" id="listviewrow" style="display:none;">

        @foreach ($files as $file)

         <div class="col s12 m12 l12">

         <div class="card" id="{{$file->id}}listcard" style="height:80px;">

        <!--Modal Trigger -->

<div class="row" style="height:50px;">

  <div class="col s3 m1 l1">
  <div data-target="{{$file->id}}listpopup" class="modal-trigger">
         <div class="card-image waves-effect waves-block waves-light" width="75%">

         <script>
           totafilelsize=totafilelsize+({{$file->size}});
         var fileName = 'https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}';


         var extension = fileName.split('.').pop();
         if(extension=="pdf"){
           document.write('<img src="img/icons8-PDF-50.png" width="50px" height="50px">');
         }
        else if(extension=="jpg" || extension=="png" || extension=="jpeg"){
           document.write('<img src="img/icons8-Image File-50.png" height="50px"/>');
         }
       else if(extension=="doc" || extension=="docx" || extension=="txt"){
           document.write('<img src="img/icons8-DOC-50.png" height="50px">');
         }
       else if(extension=="zip"){
           document.write('<img src="img/icons8-ZIP-50.png" height="50px">');
         }
         else if(extension=="rar"){
           document.write('<img src="img/icons8-RAR-50.png" height="50px">');
         }
       </script>
     </div>
   </div>
     <div id="{{$file->id}}listpopup" class="modal">
       <div class="modal-content">
             <h5><b>File Name:</b> {{$file->filename}}</h5>
             <script>
               var rd = {{$file->size}}.toFixed(4);
               document.write('<h5><b>File Size:</b>'+rd+'GB</h5>');
              </script>

             <h5><b>Uploaded Date:</b> {{$file->created_date}}</h5>
           </div>
     </div>
       </div>



     <div class="col s7 m8 l8">
        <div>
            <a  style="font-size:12px;color:black;" href="https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}">
                Original File Name: {{$file->filename}}</a>
         </div>
         <div style="font-size:12px;color:black;">
                 Customized File Name: {{$file->fakename}}</a>
          </div>

         <div style="font-size:12px;color:black;">
            <script>
              var flsz = {{$file->size}}.toFixed(4);
              document.write('Size: '+flsz+'GB');
            </script>
          </div>

          <div style="font-size:12px;color:black;">
            Last uploaded date: {{$file->created_date}}
          </div>
     </div>


<div class="col s2 m2 l2">
  <div class="row"></div>
         <div class="row">
           <div class="col s12 m4 l4">
              <a class="modal-trigger" href="#{{$file->id}}mod">
                <i class="material-icons" style="cursor:pointer;color:#0d47a1;">mode_edit</i></a>
           </div>

           <div class="col s12 m4 l4">
               <a href="https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}" download>
               <i class="material-icons" style="color:#0d47a1;">file_download</i></a>
            </div>

            <div class="col s12 m4 l4">
               <form id="{{$file->id}}deleteformlist" action="{{route('deletefile')}}" method="POST">
                 {{ csrf_field() }}
                 <input type="hidden" name="id" value="{{$file->id}}">
                 <button type="submit" style="background-color:Transparent;border:none;"><i class="material-icons" style="color:black;">delete</i></button>
                 </form>
          </div>
        </div>
          <!-- Modal Structure -->
         <div id="{{$file->id}}mod" class="modal">
            <div class="modal-content">
              <h5>File Name Already Exist: {{$file->fakename}}</h5>
              <form method="POST" id="{{$file->id}}frmgrid" action="{{route('updatefilename')}}">
                {{csrf_field()}}
                <input type="text" name="newfilename" id="name{{$file->id}}grid" placeholder="Change Your File Name"  required>

                <input type="hidden" name="newfileid" value="{{$file->id}}" id="id{{$file->id}}grid">

                <button type="submit" class="btn">Send</button>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

       <div id="{{$file->id}}" class="modal">
         <div class="modal-content">
           <h5><b>File Name:</b> {{$file->filename}} </h5>
           <script>
             var rd = {{$file->size}}.toFixed(4);
             document.write('<h5><b>File Size:</b>'+rd+'GB</h5>');
            </script>

           <h5><b>Uploaded Date:</b> {{$file->created_date}}</h5>
         </div>
       </div>


   @endforeach

       </div>


</div>
</div>

</div>
 <form id="fileUploadForm" method="post" enctype="multipart/form-data" action="{{route('uploadfile')}}">
     {{csrf_field()}}
     <div class="file-field input-field">
     <div class="fixed-action-btn" style="margin-bottom:10%;">
      <button class="btn btn-floating halfway-fab right waves-effect pulse btn-large waves-light" data-position="top" data-delay="50">
      <i class="material-icons">file_upload</i>
      <input type="file" name="file" id="file"  id="buttonupload" onchange="uploadFile()" placeholder required>

      </button>
      </div>
       </div>

     </form>

 <form class="" id="filenameform" action="{{route('uploadfile')}}" method="post">
  {{csrf_field()}}
  <input type="hidden" name="filename" value="" id="filenameinput">
  <input type="hidden" name="filesize" value="" id="filesizeinput">
</form>
 <script type="text/javascript">
    AWS.config.update({
            accessKeyId : 'AKIAIZ53HQQ6SFH3XHDQ',
            secretAccessKey : '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'
    });
    AWS.config.region = 'ap-southeast-1';
</script>
<script type="text/javascript">
   function uploadFile(){
     document.getElementById("progressdiv").style.display="inline";

        var formup=document.getElementById("fileUploadForm");
        var bucket = new AWS.S3({params: {Bucket: 'lifewithgoals'}});
        var fileChooser = document.getElementById('file');
        var filename=document.getElementById('file').value;
        var file = fileChooser.files[0];
        var tempfilename=file.name;
        var tempfilesize=(file.size)/(1024*1024*1024);
        var filenameinput=document.getElementById('filenameinput');
        var filesizeinput=document.getElementById('filesizeinput');
        var newfilenameform=document.getElementById('filenameform');

if (file) {

    var params = {
    Key: tempfilename, ContentType: file.type, Body: file};
    bucket.upload(params).on('httpUploadProgress', function(evt) {
        console.log("Uploaded :: " + parseInt((evt.loaded * 100) / evt.total)+'%');
        document.getElementById("percentage").style.width=(parseInt((evt.loaded * 100) / evt.total)+'%');
        document.getElementById("percentagedis").innerHTML=(parseInt((evt.loaded * 100) / evt.total)+'%');
        if((parseInt((evt.loaded * 100) / evt.total)+'%')=="100%"){
          document.getElementById("progressdiv").style.display="none";
        }
}).send(function(err, data) {
filenameinput.value=tempfilename;
filesizeinput.value=tempfilesize;
newfilenameform.submit();


// window.location.href = "index.php?filename="+tempfilename;


});
<!-- //formup.submit();

  }
   }
</script>


@endsection
