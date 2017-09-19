  @extends('layouts.navbar')
@section('content')
  @php
   $carbon = new Carbon(Auth::User()->created_at);
   $compare =Carbon::now();
  @endphp
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
      <!--end of add goal -->

        <div class="container" id="goaldisplay">
          <div class="row hide-on-small-only"><br><br>
            <div class="col l2 m2  center-align">
              <span class=" red-text "><b>New Goal</b></span><br>
              <a href="#addgoal" class="btn btn-floating red btn-large "><i class="material-icons">add</i></a>
            </div>
            <div class="col l2 m2  center-align">
              <span class=" blue-text text-lighten-1"><b>Send Invite</b></span><br>
              <a class="btn btn-floating blue lighten-1 btn-large googleContactsButton" href="#myModal11"><i class="material-icons">people</i></a>
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
          @if($goal->isEmpty())
            <div class="row">
              <div class="col s12 m4 l4">
                <div class="card-panel teal">
                  <span class="white-text">
                  <h4>Hi {{ Auth::User()->fname }}&nbsp;{{ Auth::User()->lname }},</h4>
                  we warmly welcome you to lifewithgoals.com. This is a platform to help you build, organize and monitor goals in your life, work and leisure and also much more.
                  </span>
                </div>
                <div class="card-panel purple darken-3">
                  <span class="white-text">
                  <h4>Get your day planned</h4>
                  Have a plan for every second. Access your schedule to know what you have planned. Let us know your progress on every step. We will let you know what you achieved.
                  </span>
                </div>
              </div>
              <div class="col s12 m4 l4">
                <div class="card-panel red">
                  <span class="white-text">
                  <h4>You are just few clicks away...</h4>
                  <ol>
                    <li>Click on "+" button.</li>
                    <li>Enter details of what you want to achieve</li>
                    <li>Go to your Goal</li>
                    <li>Achive it with our help</li>
                  </ol>
                  </span>
                </div>
                <div class="card-panel blue">
                  <span class="white-text">
                  <h4>Invite People</h4>
                  Invite others to lifewithgoals.com to grow together. Help them achieve their goals like you have. Just click the send invite button and select who you want to invite
                  </span>
                </div>
              </div>
              <div class="col s12 m4 l4">
                <div class="card-panel blue darken-4">
                  <span class="white-text">
                  <h4>Upload files</h4>
                  Access your files anytime anywhere. We have them organized for you. We will keep them secured for you.
                  </span>
                </div>
                <div class="card-panel blue-grey darken-3">
                  <span class="white-text">
                  <h4>Share and Align</h4>
                  Now you can share your goals with others so others can achieve what you have achieved too. You can also align a goal with others to work together on the same goal. Achieve something greater than you. Remember to set the correct privacy
                  </span>
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
          <div class="tap-target-content white-text"><br>
            &nbsp;&nbsp;&nbsp;&nbsp;<h5>Start Building Your Life Goals</h5>
            <p>
              Click on "+" and define your Goal


            </p>


          </div>
        </div>

          <a href="#addgoal" id="addgoalbtntwo" style="display:none;" class="btn-floating btn-large waves-effect waves-light red tooltipped hide-on-small-only pulse" data-position="top" data-delay="50" data-tooltip="ADD GOAL"><i class="material-icons">add</i></a>
          <a href="#addgoal"  class="btn-floating btn-large waves-effect waves-light red tooltipped hide-on-med-and-up pulse" data-position="top" data-delay="50" data-tooltip="ADD GOAL"><i class="material-icons">add</i></a>
                  </div>
        @if ($goal->isEmpty()||($compare->diffInHours($carbon))<1)
          <script>
          var addgoalbtntwo=document.getElementById("addgoalbtntwo");
          addgoalbtntwo.style.display="block";
          $('.tap-target').tapTarget('open');
          </script>
        @endif
      </div>
@endsection
