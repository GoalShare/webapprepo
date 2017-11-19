@extends('layouts.navbar')
@section('content')
@foreach ($goal as $goals)
@endforeach
@foreach ($privacy as $privacys)
@endforeach
@php
  $userstatus="";
@endphp
@foreach ($aligned as $aligns)
  {{ ($aligns->id==Auth::id())?$userstatus=="aligneduser":$userstatus=="creator" }}
@endforeach
@php
  $edt= Carbon\Carbon::createFromFormat('Y-m-d', $goals->goalenddate)->toFormattedDateString();
  $std= Carbon\Carbon::createFromFormat('Y-m-d', $goals->goalstartdate)->toFormattedDateString();
@endphp
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
  {{-- END OF PANEL BUTTONS --}}
 <div class="container">
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
</div>

<div id="goaldisplay" style="width:100%;">
  <div class="row">
    <div class="col l2 m2 hide-on-small-only">
    </div>
    <h3 class="blue-text text-darken-4 col s12 l8 m8 z-depth-1" style="padding-bottom:7px;">
      {{ $goals->goalname }}
    </h3>
    <div class="col l2 m2 hide-on-small-only">
    </div>
  </div>
<div class="row">
  <div class="col l2 m2 hide-on-small-only">
  </div>


  {{-- central panel start --}}


  <div class="col l8 m8">
    <div class="card">
        <div class="card-image" style="height:350px;">
          <img src="{{ asset('uploads/goals/'.$goals->goalpictureone)}}" height="350px;">
            <span class="card-title">
                <div id="piearea" class="c100 p{{$goals->goalcompletedpercentage}} big hide-on-med-and-down">
                    <span class="blue-text" id="gcppie">{{$goals->goalcompletedpercentage}}%</span>
                    <div class="slice">
                        <div class="bar"></div>
                        <div class="fill"></div>
                    </div>
                </div>
            </span>
          <form style=""enctype="multipart/form-data" action="{{route('goalPicUpload')}}" method="post" id="goalPicUpload">
            {{ csrf_field() }}
            <a class="btn-floating halfway-fab waves-effect waves-light white">
              <i class="material-icons tooltipped grey-text" data-position="bottom" data-delay="50" data-tooltip="Upload Profile Picture" >photo_size_select_actual</i>
              <input type="hidden" name="goalid" value="{{ $goals->goalid}}">
              <input type="file" name="goalpicture"  onchange="javascript:this.form.submit();">
            </a>
          </form>
            {{-- <i class="material-icons grey-text">photo_size_select_actual</i> --}}
            {{-- <a href="#" class="btn-floating halfway-fab waves-effect waves-light white"><i class="material-icons grey-text">thumb_up</i></a>
            <a href="#" class="btn-floating halfway-fab waves-effect waves-light white"><i class="material-icons grey-text">thumb_down</i></a> --}}
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col l2 m2 center" style="min-height:75px;"><div class="tabheadfrgoal left" id="taskstabbtncover"><a id="taskstabbtn" class="btn btn-large btn-floating waves-effect waves-light"><i class="material-icons" onclick="showtask()">format_list_bulleted</i></a></div></div>
        <div class="col l2 m2 center" style="min-height:75px;"><div class="left" id="alignstabbtncover"><a id="alignstabbtn" class="btn btn-large btn-floating waves-effect waves-light blue darken-2" onclick="showalign()"><i class="material-icons">call_merge</i></a></div></div>
        <div class="col l2 m2 center" style="min-height:75px;"><div class="left" id="sharestabbtncover"><a id="sharestabbtn" class="btn btn-large btn-floating waves-effect waves-light blue darken-2" onclick="showshare()"><i class="material-icons">share</i></a></div></div>
        <div class="col l2 m2 center" style="min-height:75px;"><div class="left" id="settingstabbtncover"><a id="settingstabbtn" class="btn btn-large btn-floating waves-effect waves-light blue darken-2" onclick="showsetting()"><i class="material-icons">settings</i></a></div></div>
        <div class="col l2 m2 center" style="min-height:75px;"><div class="left" id="skillstabbtncover"><a id="skillstabbtn" class="btn btn-large btn-floating waves-effect waves-light blue darken-2" onclick="showskill()"><i class="material-icons">star</i></a></div></div>
        <div class="col l2 m2 center" style="min-height:75px;"><div class="left" id="likestabbtncover"><a id="likestabbtn" class="btn btn-large btn-floating waves-effect waves-light blue darken-2" onclick="showlike()"><i class="material-icons">whatshot</i></a></div></div>
      </div>
      <div class="row">
        <div class="col s12">

          {{-- tasks --}}

          <div class="card blue darken-4" id="taskstabcontent">
            <div class="card-content white-text">
              <span class="card-title">Tasks</span>
              <p>Here you have all tasks belongin to your Goal. You can asign people for individual tasks and also control the changes they can make.</p>
              @if ($email!=Auth::User()->email && $privacys->addtaskprivacy=="public")
                <a href="#" class="btn white blue-text text-darken-4 btn-large right disabled ">Add Task</a>
                <br><br>
                Ask Goal creator to grant adding tasks
              @else
                <a class="btn white blue-text text-darken-4 btn-large right" href="#addtaskmodal">Add Task</a>
                <br><br>
              @endif
              <div id="addtaskmodal" class="modal modal-fixed-footer">
                <div class="modal-content">
                  <h4 class="grey-text text-darken-4">Add New Task</h4>
                  <form class=""id="addtaskformpopup" action="{{route('goal')}}" method="post">
                    {{ csrf_field() }}
                  <input type="text" style="display:none;"class="hidden" value="{{$goals->goalid}}" name="goalid">
                  <input type="text"style="display:none;" class="hidden" value="addtask" name="action">
                  <input type="text" style="display:none;"class="hidden" value="{{$goals->goalauthorization}}" name="goalauthorization">
                  <input type="hidden" name="email" value="{{$email}}">
                  <div class="row">
                    <div class="input-field col l6 m6 s12 grey-text">
                      <input name="taskname" id="tasknamepopup" type="text" class="validate">
                      <label for="tasknamepopup">Task Name</label>
                    </div>
                    <div class="input-field col l6 m6 s12 grey-text">
                      <input id="taskintentpopup" name="taskintent" type="text" class="validate">
                      <label for="taskintentpopup">Task Intent</label>
                    </div>
                  </div>
                  <div class="row indigo lighten-5">
                   <div class="col l6 m6 s12">
                    <div class="card-panel">
                      <div class="input-field row grey-text">


                       <input type="text" name="taskstartdate"  id="goalstartdatefieldpopup" class="datepicker">

                       <label>Enter the starting date</label>
                     </div>
                    </div>
                  </div>

                  <div class="col l6 m6 s12">
                   <div class="card-panel">
                     <div class="input-field row grey-text">
                             <input type="text" name="taskenddate" id="goalenddatefieldpopup"  class="datepicker">
                      <label>Enter the ending date</label>
                    </div>
                   </div>
                 </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" onclick="document.getElementById('addtaskformpopup').submit();"name="button" class="btn"> Add task</button>
                </div>
                </form>
                </div>
<script type="text/javascript">
var from_$inputpopup = $('#goalstartdatefieldpopup').pickadate({format: 'yyyy-mm-dd' });
var from_pickerpopup = from_$inputpopup.pickadate('picker');

var to_$inputpopup = $('#goalenddatefieldpopup').pickadate({format: 'yyyy-mm-dd' });
var to_pickerpopup = to_$inputpopup.pickadate('picker');

// Check if there’s a “from” or “to” date to start with.
if ( from_pickerpopup.get('value') ) {
  to_pickerpopup.set('min', from_pickerpopup.get('select'));
}
if ( to_pickerpopup.get('value') ) {
  from_pickerpopup.set('max', to_pickerpopup.get('select'));
}

// When something is selected, update the “from” and “to” limits.
from_pickerpopup.on('set', function(event) {
  if ( event.select ) {
    to_pickerpopup.set('min', from_pickerpopup.get('select'));
    console.log($('#goalstartdatefieldpopup').val());
  }
  else if ( 'clear' in event ) {
    to_pickerpopup.set('min', false);
    console.log($('#goalstartdatefieldpopup').val());
  }
})
to_pickerpopup.on('set', function(event) {
  if ( event.select ) {
    from_pickerpopup.set('max', to_pickerpopup.get('select'));
    console.log($('#goalenddatefieldpopup').val());
  }
  else if ( 'clear' in event ) {
    from_pickerpopup.set('max', false);
    console.log($('#goalenddatefieldpopup').val());

  }
})
</script>

              </div>

              @foreach ($task as $tasks)
                <div class="row" id="row{{ $tasks->id }}">
                  <div class="col s12">
                    <div class="card  sticky-action {{ ($tasks->taskcompletedpercentage<30)?"deep-orange lighten-4":($tasks->taskcompletedpercentage<75)?"yellow lighten-4":"green lighten-4" }} ">
                      <div class="card-content grey-text text-darken-3">
                        <span class="card-title">{{ $tasks->taskname }} &nbsp;&nbsp;&nbsp;&nbsp;<span id="showpercentage{{ $tasks->id }}">{{ $tasks->taskcompletedpercentage }}</span>%</span>
                          <p class="range-field">
                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                            <input name="completedpercentage" oninput="$('#showpercentage{{ $tasks->id }}').html(this.value);
                            $.post('{{ route('increasepercentage') }}',
                              {
                                completedpercentage: this.value,
                                _token: $('#token').val(),
                                goalid: '{{ $goals->goalid }}',
                                id: {{ $tasks->id }}
                              },
                           function(data,status){console.log('Data: ' + data + 'Status: ' + status);$('#gcppie').html(data+'%');$('#piearea').removeClass('p{{$goals->goalcompletedpercentage}}');$('#piearea').addClass('p'+data);});"
                          type="range" id="percentage{{ $tasks->id  }}" value="{{ $tasks->taskcompletedpercentage}}"min="0" max="100" {{(Auth::User()->email!=$email&&$privacys->allowcommitprivacy!="private" )?"disabled":""}} />
                          </p>
                        <div class="row">
                          <div class="col s12 l6 m6" >
                            @if ($aligned->isEmpty())
                              <div class="card-panel white">
                                 <span class="grey-text text-darken-3">
                                   There are no aligns yet align people to asign them to tasks.
                                 </span>
                              </div>
                            @else
                              <small>Click on person you want to asign this task</small><br>
                              @foreach ($aligned as $asigns)
                                <div class="col s2" style="cursor:pointer;" onclick="
                                $.post('{{ route('asigntotask') }}',
                                  {
                                    id: {{ $asigns->id }},
                                    fname:'{{ $asigns->fname }}',
                                    lname:'{{ $asigns->lname }}',
                                    avatar:'{{ $asigns->avatar }}',
                                    email:'{{ $asigns->email }}',
                                    taskid: {{ $tasks->id }},
                                    _token: '{{ csrf_token() }}'
                                  },
                               function(data,status){var obj=JSON.parse(data);for(i=0;i < obj.length;i++){console.log('Data: ' + obj[i].id + 'Status: ' + status);};});">
                                  <img src="{{asset('uploads/avatars/'.$asigns->avatar)}}" height="40px" width="40px" data-position="bottom" data-delay="50" data-tooltip="{{ $asigns->fname." ".$asigns->lname }}" class="circle tooltipped" >
                                </div>
                              @endforeach
                            @endif
                          </div>
                          <div class="col s12 l6 m6 card-panel white">
                            <div class="card-title">
                              People Asigned
                            </div>
                            <div class="asignedpeople">
                              @foreach ($asigned as $asign)
                                @if ($asign->taskid==$tasks->id)
                                  <div class="col s2">
                                    <img src="{{asset('uploads/avatars/'.$asign->avatar)}}" height="40px" width="40px" data-position="bottom" data-delay="50" data-tooltip="{{ $asign->fname." ".$asign->lname }}" class="circle tooltipped" >
                                  </div>
                                @endif
                              @endforeach
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card-action center">
                        <button onclick="
                        $.post('{{ route('allcomplete') }}',
                          {
                            _token: $('#token').val(),
                            goalid: '{{ $goals->goalid }}',
                            id: {{ $tasks->id }}
                          },
                       function(data,status){console.log('Data: ' + data + 'Status: ' + status);$('#percentage{{ $tasks->id  }}').val(100);$('#showpercentage{{ $tasks->id }}').html(100);$('#gcppie').html(data+'%');$('#piearea').removeClass('p{{$goals->goalcompletedpercentage}}');$('#piearea').addClass('p'+data);});" class="btn btn-floating left"><i class="material-icons">done_all</i></button>
                       <div class="right">
                        <button  class="btn btn-floating" onclick="
                        $.post('{{ route('deletetask') }}',
                          {
                            _token: $('#token').val(),
                            id: {{ $tasks->id }}
                          },
                       function(data,status){console.log('Data: ' + data + 'Status: ' + status);$('#row{{ $tasks->id }}').hide();$('#gcppie').html(data+'%');$('#piearea').removeClass('p{{$goals->goalcompletedpercentage}}');$('#piearea').addClass('p'+data);});"><i class="material-icons">delete</i></button>
                       @if ($email==Auth::User()->email)
                         &nbsp;&nbsp;
                         <button class="btn btn-floating pulse bragbutton" onclick="this.disabled='true';
                         $.post('{{ route('taskbrag') }}',
                             {
                               goalid: '{{$goals->goalid}}',
                               taskname: '{{$tasks->taskname}}',
                               taskcompletedpercentage:{{$tasks->taskcompletedpercentage}},
                               _token: $('#token').val(),
                               id: {{ $tasks->id }}
                             },
                          function(data,status){console.log('Data: ' + data + 'Status: ' + status);Materialize.toast('You have bragged about {{$tasks->taskname}}', 4000); $('.bragbutton').prop('disabled',false);});
                         ">
                           <i class="material-icons">whatshot</i>
                         </button>
                       @endif
                     </div>
                        <a class=" activator " style="cursor:pointer;"><i class="material-icons" style="font-size:50px;">keyboard_arrow_up</i></a>
                      </div>
                      <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
                        <div class="row">
                          <div class="col l6 m6 s12">
                            <div class="card-panel white ">
                              <span class="grey-text text-darken-3">
                                 Intent : {{ $tasks->taskintent }}
                                 <div class="divider"></div><br>
                                 Start Date : {{ Carbon\Carbon::createFromFormat('Y-m-d', $tasks->taskstartdate)->toFormattedDateString() }}
                                 <div class="divider"></div><br>
                                 End Date : {{  Carbon\Carbon::createFromFormat('Y-m-d', $tasks->taskenddate)->toFormattedDateString()  }}
                                 <div class="divider"></div><br>
                                 <small class="right">click to modify</small>
                              </span>
                            </div>
                          </div>
                          <form class="col l6 m6 s12 card-panel grey-text text-darken-3">
                            <div class="row">
                                <div class="input-field col s12">
                                  <textarea  id="textarea1" class="materialize-textarea grey-text text-darken-3" oninput="
                                    $.post('{{ route('addnote') }}',
                                      {
                                        note: this.value,
                                        taskid: {{ $tasks->id }},
                                        _token: '{{ csrf_token() }}'
                                      },
                                    function(data,status){console.log('Data: ' + data + 'Status: ' + status);});
                                    ">{{ $tasks->note }}</textarea>
                                    @if($tasks->note=="")
                                  <label for="textarea1">Add Note</label>
                                        @endif
                                </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>

          {{-- tasks end --}}
          {{-- aligns --}}

          <div class="card blue darken-4" id="alignstabcontent" style="display:none;">
            <div class="card-content white-text">
              <span class="card-title">Align Goal</span>
              <div class="card">
                 <div class="card-content grey-text text-darken-3">
                   <p>Add people to work with you. Achieve your goal faster. Remember to set up the privacy of your goal before exposing it to other people</p>
                 </div>
                 <div class="card-tabs">
                   <ul class="tabs tabs-fixed-width">
                     <li class="tab"><a href="#aligntab" class="blue-text text-darken-4 active">Align People</a></li>
                     <li class="tab"><a class="blue-text text-darken-4" href="#infotab"><i class="material-icons">info_outline</i></a></li>
                   </ul>
                 </div>
                 <div class="card-content grey lighten-4 grey-text text-darken-3">
                   <div id="aligntab">
                     <div class="row">
                       <div class="col l6 m6 s12">
                         @if ($goals->goalauthorization!='aligned')
                         <form action="{{route('alignsearch')}}" method="post" id="alignform">
                           {{ csrf_field() }}
                           <input type="hidden" name="goalid" value="{{$goals->goalid}}">
                           <div class="input-field grey lighten-4 grey-text text-darken-3">
                             <input id="alignsearchemail" name="email" type="search" autocomplete="off" class="grey lighten-4" {{($email!=Auth::User()->email)?"disabled":""}}>
                             <label for="email">email</label>
                           </div>
                         </form>
                         <form action="{{ route('align') }}" method="post" id="finalalign">
                           {{ csrf_field() }}
                           <input type="hidden" name="goalid" value="{{$goals->goalid}}">
                           <input type="hidden" name="email" value="" id="alignthisemail">
                           <span class="btn btn-floating right" id="alignbtn"><i class="material-icons">call_merge</i></span>
                         </form>
                         <br> <br>
                         <ul class="collection" id="alignpeopleresult" style="max-height:500px;">
                         </ul>
                         <script type="text/javascript">
                           document.addEventListener('DOMContentLoaded',function(){
                              var from_$input = $('#goalstartdatefield').pickadate({format: 'yyyy-mm-dd' });
                              var from_picker = from_$input.pickadate('picker');

                              var to_$input = $('#goalenddatefield').pickadate({format: 'yyyy-mm-dd' });
                              var to_picker = to_$input.pickadate('picker');

                              // Check if there’s a “from” or “to” date to start with.
                              if ( from_picker.get('value') ) {
                                to_picker.set('min', from_picker.get('select'));
                              };
                              if ( to_picker.get('value') ) {
                                from_picker.set('max', to_picker.get('select'));
                              };

                              // When something is selected, update the “from” and “to” limits.
                              from_picker.on('set', function(event) {
                                if ( event.select ) {
                                  to_picker.set('min', from_picker.get('select'));
                                  console.log($('#goalstartdatefield').val());
                                }
                                else if ( 'clear' in event ) {
                                  to_picker.set('min', false);
                                  console.log($('#goalstartdatefield').val());
                                };
                              });
                              to_picker.on('set', function(event) {
                                if ( event.select ) {
                                  from_picker.set('max', to_picker.get('select'));
                                  console.log($('#goalenddatefield').val());
                                }
                                else if ( 'clear' in event ) {
                                  from_picker.set('max', false);
                                  console.log($('#goalenddatefield').val());

                                };
                              });
                           });
                         </script>
                         <script type="text/javascript">

                         document.addEventListener('DOMContentLoaded', function() {

                           var alignbtn=document.getElementById('alignbtn');
                           var alignpeopleresult = document.getElementById("alignpeopleresult");
                           var alignthisemail = document.getElementById('alignthisemail');
                           var alignform=document.getElementById('finalalign');
                           var alignformaction=alignform.getAttribute("action");
                           var form = document.getElementById("alignform");
                           var action = form.getAttribute("action");
                           var alignsearchemail = document.getElementById("alignsearchemail");
                           var alignedpeoplelist = document.getElementById('alignedpeoplelist');

                           function showAlignedpeople(json) {
                               var li_list = AlignedpeopleToList(json);
                               alignpeopleresult.innerHTML = li_list;
                             }

                             function AlignedpeopleToList(items) {
                               var output = '';

                               for(i=0; i < items.length; i++) {
                                 if((items[i].id)!={{Auth::id()}}){
                                 output += '<a style="cursor:pointer;" onclick="console.log('+"'"+items[i].lname+"'"+');document.getElementById('+"'"+'alignsearchemail'+"'"+').value='+"'"+items[i].email+"'"+';" class="collection-item">';
                                 output+='<span class="title">';
                                 output += items[i].fname +' '+items[i].lname;
                                 output += '</span>';
                                 output += '<small class="truncate">'+items[i].email+'</small>';
                                 output += '</a>';
                              // output += '<li onclick="console.log('+"'sadsas'"+')">jsndsj</li>';
                               }
                               }
                               return output;
                             }

                           function alignthis() {
                             alignthisemail.value=alignsearchemail.value;
                             var form_data=new FormData(alignform);
                             var xhr = new XMLHttpRequest();
                             xhr.open('POST',alignformaction, true);
                             xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                             xhr.send(form_data);
                             xhr.onreadystatechange = function () {
                               if(xhr.readyState == 4 && xhr.status == 200) {
                                 var result = xhr.responseText;
                                 var json = JSON.parse(result);
                                 console.log(json);
                                 var output="";
                                 for (var i = 0; i < json.length; i++) {
                                   output += '<li class="collection-item avatar">';
                                   output += '<img src="uploads/avatars/'+json[i].avatar+'" alt="" class="circle">';
                                   output += '<span class="title">'+json[i].fname+" "+json[i].lname+'</span>';
                                   output += '<p class="truncate">'+json[i].email+'</p>'
                                   output += '<a href="#!" class="secondary-content"><i class="material-icons">close</i></a>';
                                   output += '</li>';
                                 }
                                 alignedpeoplelist.innerHTML += output;
                               }
                             };
                           }

                           function getAlignedpeople() {
                             var q = alignsearchemail.value;
                             var form_data=new FormData(form);
                             var xhr = new XMLHttpRequest();
                             console.log("yfrdcuk");
                             xhr.open('POST',action, true);
                             xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                             xhr.send(form_data);
                             xhr.onreadystatechange = function () {
                               if(xhr.readyState == 4 && xhr.status == 200) {
                                 var result = xhr.responseText;
                                 var json = JSON.parse(result);
                                 showAlignedpeople(json);
                                 // var json = JSON.parse(result);
                                 // showSuggestions(json);
                               }
                             };
                           }
                           // use "input" (every key), not "change" (must lose focus)
                           alignsearchemail.addEventListener("input", getAlignedpeople);
                           alignbtn.addEventListener("click", alignthis);


                         });
                         </script>
                       @elseif ($goals->goalauthorization=='aligned')
                         <p>You are aligned to this Goal. Please suggest the owner people who are interested in this Goal. We are adding more functionalities soon</p>
                       @endif
                       </div>
                       <div class="col l6 m6 s12">
                         <b><p>Aligned People</p></b>
                         <ul class="collection" id="alignedpeoplelist">
                           @foreach ($aligned as $aligns)
                             <li class="collection-item avatar">
                               <img src="{{asset('uploads/avatars/'.$aligns->avatar)}}" alt="" class="circle">
                                    <span class="title"><a href="{{url('/search/'.$aligns->id)}}">{{$aligns->fname}}&nbsp;{{$aligns->lname}}</a></span>
                                    <p class="truncate">{{ $aligns->email }}</p>
                                    <a href="#!" class="secondary-content"><i class="material-icons">close</i></a>
                             </li>
                           @endforeach
                         </ul>
                       </div>
                     </div>
                   </div>
                   <div id="infotab">
                     Here you have all the info you need before you align your goal
                   </div>
                 </div>
               </div>
            </div>
          </div>

          {{-- aligns end --}}
          {{-- share --}}

          <div class="card blue darken-4" id="sharestabcontent" style="display:none;">
                      <div class="card-content white-text">
                        <span class="card-title">Share Goal</span>
                        <div class="card">
                           <div class="card-content grey-text text-darken-3">
                             <p>Share your goal let others achieve what you have achieved</p>
                           </div>
                           <div class="card-tabs">
                             <ul class="tabs tabs-fixed-width">
                               <li class="tab"><a href="#sharealigntab" class="blue-text text-darken-4 active"> Share Goal</a></li>
                               <li class="tab"><a class="blue-text text-darken-4" href="#shareinfotab"><i class="material-icons">info_outline</i></a></li>
                             </ul>
                           </div>
                           <div class="card-content grey lighten-4 grey-text text-darken-3">
                             <div id="sharealigntab">
                               <div class="row">
                                 <div class="col l6 m6 s12">
                                   @if ($userstatus!="aligneduser")
                                   <form action="{{route('sharealignsearch')}}" method="post" id="sharealignform">
                                     {{ csrf_field() }}
                                     <input type="hidden" name="sharegoalid" value="{{$goals->goalid}}">
                                     <div class="input-field grey lighten-4 grey-text text-darken-3">
                                       <input id="shareemail" name="shareemail" type="search" autocomplete="off" class="grey lighten-4" {{($email!=Auth::User()->email&&$privacys->canshareprivacy=="public")?"disabled":""}}>
                                       <label for="shareemail">email</label>
                                     </div>
                                   </form>
                                   <form action="{{ route('sharealignpost') }}" method="post" id="sharefinalalign">
                                     {{ csrf_field() }}
                                     <input type="hidden" name="sharegoalid" value="{{$goals->goalid}}">
                                     <input type="hidden" name="shareemail" value="" id="sharealignthisemail">
                                     <span class="btn btn-floating right" id="sharealignbtn">
                                       <i class="material-icons">share</i>
                                     </span>
                                   </form>
                                   <br> <br>
                                   <ul class="collection" id="sharealignpeopleresult" style="max-height:500px;">
                                   </ul>
                                   <script type="text/javascript">
                                   document.addEventListener('DOMContentLoaded', function() {
                                     var sharealignbtn=document.getElementById('sharealignbtn');
                                     var sharealignpeopleresult = document.getElementById("sharealignpeopleresult");
                                     var sharealignthisemail = document.getElementById("sharealignthisemail");
                                     var sharealignform=document.getElementById("sharefinalalign");
                                     var sharealignformaction=sharealignform.getAttribute("action");
                                     var shareform = document.getElementById("sharealignform");
                                     var action = shareform.getAttribute("action");
                                     var searchemail = document.getElementById("shareemail");
                                     var sharealignedpeoplelist = document.getElementById('sharealignedpeoplelist');

                                     function shareshowAlignedpeople(json) {
                                         var shareli_list = ShareAlignedpeopleToList(json);
                                         sharealignpeopleresult.innerHTML = shareli_list;
                                       }

                                       function ShareAlignedpeopleToList(shareitems) {
                                         var shareoutput = '';

                                         for(i=0; i < shareitems.length; i++) {
                                           if((shareitems[i].id)!={{Auth::id()}}){
                                           shareoutput += '<a style="cursor:pointer;" onclick="console.log('+"'"+shareitems[i].lname+"'"+'); document.getElementById('+"'"+'shareemail'+"'"+').value='+"'"+shareitems[i].email+"'"+';" class="collection-item">';
                                           shareoutput+='<span class="title">';
                                           shareoutput += shareitems[i].fname +' '+ shareitems[i].lname;
                                           shareoutput += '</span>';
                                           shareoutput += '<small class="truncate">'+ shareitems[i].email+'</small>';
                                           shareoutput += '</a>';
                                        // output += '<li onclick="console.log('+"'sadsas'"+')">jsndsj</li>';
                                         }
                                         }
                                         return shareoutput;
                                       }

                                     function sharealignthis() {

                                      sharealignthisemail.value=shareemail.value;

                                      var shareform_data=new FormData(sharealignform);

                                      var xhr = new XMLHttpRequest();

                                       xhr.open('POST',sharealignformaction, true);

                                       xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

                                       xhr.send(shareform_data);

                                       xhr.onreadystatechange = function () {
                                         if(xhr.readyState == 4 && xhr.status == 200) {
                                           var shareresult = xhr.responseText;
                                           var sharejson = JSON.parse(shareresult);
                                           console.log(sharejson);
                                           var shareoutput="";
                                           for (var i = 0; i < sharejson.length; i++) {
                                             shareoutput += '<li class="collection-item avatar">';
                                             shareoutput += '<img src="uploads/avatars/'+sharejson[i].avatar+'" alt="" class="circle">';
                                             shareoutput += '<span class="title">'+sharejson[i].fname+" "+sharejson[i].lname+'</span>';
                                             shareoutput += '<p class="truncate">'+sharejson[i].email+'</p>';
                                             shareoutput += '<a href="#!" class="secondary-content"><i class="material-icons">close</i></a>';
                                             shareoutput += '</li>';
                                           }
                                           sharealignedpeoplelist.innerHTML += shareoutput;
                                         }
                                       };
                                     }

                                     function getShareAlignedpeople() {
                                       var q = shareemail.value;
                                       var form_data=new FormData(shareform);
                                       var xhr = new XMLHttpRequest();
                                       xhr.open('POST',action, true);
                                       xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                                       xhr.send(form_data);
                                       xhr.onreadystatechange = function () {
                                         if(xhr.readyState == 4 && xhr.status == 200) {
                                           var result = xhr.responseText;
                                           var json = JSON.parse(result);
                                           shareshowAlignedpeople(json);
                                           // var json = JSON.parse(result);
                                           // showSuggestions(json);
                                         }
                                       };
                                     }
                                     // use "input" (every key), not "change" (must lose focus)
                                     shareemail.addEventListener("input", getShareAlignedpeople);
                                     sharealignbtn.addEventListener("click", sharealignthis);


                                   });
                                   </script>
                                 @elseif ($goals->goalauthorization=='aligned')
                                   <p>You are aligned to this Goal. Please suggest the owner people who are interested in this Goal. We are adding more functionalities soon</p>
                                 @endif
                                 </div>
                                 <div class="col l6 m6 s12">
                                   <b><p>Shared people</p></b>
                                   <ul class="collection" id="sharealignedpeoplelist">
                                     @foreach ($shared as $shares)
                                       <li class="collection-item avatar">
                                         <img src="{{asset('uploads/avatars/'.$shares->avatar)}}" alt="" class="circle">
                                              <span class="title"><a href="{{url('/search/'.$shares->id)}}">{{$shares->fname}}&nbsp;{{$shares->lname}}</a></span>
                                              <p class="truncate">{{ $shares->email }}</p>
                                              <a href="#!" class="secondary-content"><i class="material-icons">close</i></a>
                                       </li>
                                     @endforeach
                                   </ul>
                                 </div>
                               </div>
                             </div>
                             <div id="shareinfotab">
                               Here you have all the info you need before you align your goal
                             </div>
                           </div>
                         </div>
                      </div>
                    </div>

          {{-- share end --}}
          {{-- settings --}}
          @foreach ($privacy as $privacys)
          @endforeach
          <div class="card blue darken-4" id="settingstabcontent" style="display:none;">
            <div class="card-content white-text">
              <span class="card-title">Goal setting</span>
              <div class="card grey-text text-darken-3">
                 <div class="card-content">
                   @if ($goals->goalauthorization=="aligned")
                     <p>You are aligned to this goal. We are working to develop more options for you. For now only the Creator has access to this content</p>

                   @else
                     <p>Welcome to settings. Protect your goal and be able to change who can see or work on your goal.</p>
                   @endif
                 </div>
                 @if ($goals->goalauthorization!='aligned')
                 <div class="card-tabs">
                   <ul class="tabs tabs-fixed-width">
                       <li class="tab"><a class="active blue-text text-darken-4" href="#other">Goal</a></li>
                       <li class="tab"><a class=" blue-text text-darken-4" href="#goalprivacy">Goal privacy</a></li>
                     <li class="tab"><a class="blue-text text-darken-4" href="#alignprivacy">Align Privacy</a></li>
                   </ul>
                 </div>
                 <div class="card-content grey lighten-4">
                   <div id="goalprivacy">
                     <p>Change who can see and what is can be seen of this goal in your profile</p>
                     <ul class="collection">
                       <li class="collection-item">
                         <div class="row"><div class="col s9">
                           Hide Goal <br>
                           <small>switch on to make the goal invisible on your profile and Goal search. Switch off to hide individual components of your goal.</small>
                         </div>
                           <a href="#!" class="secondary-content">
                         <form id="hidegoalprivacyfrm" action="{{route('goal')}}" method="post">
                           {{ csrf_field() }}
                         <div class="switch col s3">
                          <label>
                              <input id="hidegoalprivacy" {{($privacys->hidegoalprivacy!='public')?'checked':''}}  value="private" type="checkbox" name="hidegoalprivacy" {{($email!=Auth::User()->email)?"disabled":""}}>
                            <span class="lever"></span>
                          </label>
                        </div>
                        <input type="text" style="display:none;" value="{{$goals->goalid}}" name="goalid">
                        <input type="text" style="display:none;" value="updateprivacy" name="action">
                        <input type="text" style="display:none;" value="hidegoalprivacy" name="attribute">
                        </form>
                        <script type="text/javascript">

                        var hidegoalprivacy=document.getElementById("hidegoalprivacy");
                        hidegoalprivacy.addEventListener("change",function(event){
                          event.preventDefault();
                          setgoalhideprivacy();
                        });
                        function setgoalhideprivacy(){
                         var form = document.getElementById("hidegoalprivacyfrm");
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
                              console.log(result);
                              if (result=="private") {
                                $(".othergoalprivacy").hide();
                                // document.getElementsByClassName('othergoalprivacy').style.display="none";
                              }
                              else {
                                // document.getElementsByClassName('othergoalprivacy').style.display="block";
                                $(".othergoalprivacy").show();
                              }
                           }
                         };
                       }

                        </script>
                       </a>
                       </div>
                       </li>
                       @if($privacys->hidegoalprivacy!="private")

                      <li class="collection-item othergoalprivacy">
                        <div class="row"><div class="col s9">
                          make intent private <br>
                          <small>hide the intent of your goal in your profile and Goal search</small>
                        </div>
                          <a href="#!" class="secondary-content">
                        <form id="goalintentprivacyfrm" action="{{route('goal')}}" method="post">
                          {{ csrf_field() }}
                        <div class="switch col s3">
                         <label>
                             <input id="goalintentprivacy" {{($privacys->goalintentprivacy!='public')?'checked':''}}  value="private" type="checkbox" name="goalintentprivacy" {{($email!=Auth::User()->email)?"disabled":""}}>
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
                      </a>
                      </div>
                      </li>
                      <li class="collection-item othergoalprivacy">
                        <div class="row">
                          <div class="col s9">
                           make category private <br>
                           <small>hide the category of your goal in your profile and Goal search</small>
                        </div>
                          <a href="#!" class="secondary-content">
                        <form id="goalcategoryprivacyfrm" action="{{route('goal')}}" method="post">
                          {{ csrf_field() }}
                        <div class="switch col s3">
                         <label>
                             <input id="goalcategoryprivacy" {{($privacys->goalcategoryprivacy!='public')?'checked':''}}  value="private" type="checkbox" name="goalcategoryprivacy" {{($email!=Auth::User()->email)?"disabled":""}}>
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
                      <li class="collection-item othergoalprivacy">
                        <div class="row">
                          <div class="col s9">
                          make priority private <br>
                          <small>hide the priority of your goal in your profile and Goal search</small>
                          </div>
                          <a href="#!" class="secondary-content">
                        <form id="goalpriorityprivacyfrm" action="{{route('goal')}}" method="post">
                          {{ csrf_field() }}
                        <div class="switch col s3">
                         <label>
                             <input id="goalpriorityprivacy" {{($privacys->goalpriorityprivacy!='public')?'checked':''}}  value="private" type="checkbox" name="goalpriorityprivacy" {{($email!=Auth::User()->email)?"disabled":""}}>
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
                      <li class="collection-item othergoalprivacy">
                        <div class="row">
                          <div class="col s9">
                          make start date private <br>
                          <small>hide the start date of your goal in your profile and Goal search</small>
                          </div>
                          <a href="#!" class="secondary-content">
                        <form id="goalstartdateprivacyfrm" action="{{route('goal')}}" method="post">
                          {{ csrf_field() }}
                        <div class="switch col s3">
                         <label>
                             <input id="goalstartdateprivacy" {{($privacys->goalstartdateprivacy!='public')?'checked':''}}  value="private" type="checkbox" name="goalstartdateprivacy" {{($email!=Auth::User()->email)?"disabled":""}}>
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
                      <li class="collection-item othergoalprivacy">
                        <div class="row">
                          <div class="col s9">
                          make end date private <br>
                          <small>hide the end date of your goal in your profile and Goal search</small>
                          </div>
                          <a href="#!" class="secondary-content">
                        <form id="goalenddateprivacyfrm" action="{{route('goal')}}" method="post">
                          {{ csrf_field() }}
                        <div class="switch col s3">
                         <label>
                             <input id="goalenddateprivacy" {{($privacys->goalenddateprivacy!='public')?'checked':''}}  value="private" type="checkbox" name="goalenddateprivacy" {{($email!=Auth::User()->email)?"disabled":""}}>
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
                      <li class="collection-item othergoalprivacy">
                        <div class="row">
                          <div class="col s9">
                          make completed percentage private <br>
                          <small>hide the completed percentage of your goal in your profile and Goal search</small>
                          </div>
                          <a href="#!" class="secondary-content">
                        <form id="goalcompletedpercentageprivacyfrm" action="{{route('goal')}}" method="post">
                          {{ csrf_field() }}
                        <div class="switch col s3">
                         <label>
                             <input id="goalcompletedpercentageprivacy" {{($privacys->goalcompletedpercentageprivacy!='public')?'checked':''}}  value="private" type="checkbox" name="goalcompletedpercentageprivacy" {{($email!=Auth::User()->email)?"disabled":""}}>
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
                @endif
                    </ul>
                   </div>
                   <div id="alignprivacy">
                     <p>Set up the privacy for people who are working on your goal with you.</p>
                     <ul class="collection">
                         <li class="collection-item">
                           <div class="row">
                             <div class="col s9">
                                Permit sharing <br>
                                <small>Switch on to allow aligned people sharing this goal</small>
                             </div>
                             <a href="#!" class="secondary-content">
                           <form id="canshareprivacyfrm" action="{{route('goal')}}" method="post">
                             {{ csrf_field() }}
                           <div class="switch col s3">
                            <label>
                                <input id="canshareprivacy" {{($privacys->canshareprivacy!='public')?'checked':''}}  value="private" type="checkbox" name="canshareprivacy" {{($email!=Auth::User()->email)?"disabled":""}}>
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
                            Permit adding tasks <br>
                            <small>Switch on to allow aligned users the ability to add new tasks</small>
                             </div>
                             <a href="#!" class="secondary-content">
                           <form id="addtaskprivacyfrm" action="{{route('goal')}}" method="post">
                             {{ csrf_field() }}
                           <div class="switch col s3">
                            <label>
                                <input id="addtaskprivacy" {{($privacys->addtaskprivacy!='public')?'checked':''}}  value="private" type="checkbox" name="addtaskprivacy" {{($email!=Auth::User()->email)?"disabled":""}}>
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
                         <li class="collection-item">
                           <div class="row">
                             <div class="col s9">
                            Permit overriding tasks <br>
                            <small>Switch on to allow aligned users the ability to modify tasks</small>
                             </div>
                             <a href="#!" class="secondary-content">
                           <form id="overridetaskprivacyfrm" action="{{route('goal')}}" method="post">
                             {{ csrf_field() }}
                           <div class="switch col s3">
                            <label>
                                <input id="overridetaskprivacy" {{($privacys->overridetaskprivacy!='public')?'checked':''}}  value="private" type="checkbox" name="overridetaskprivacy" {{($email!=Auth::User()->email)?"disabled":""}}>
                              <span class="lever"></span>
                            </label>
                          </div>
                          <input type="text" style="display:none;" value="{{$goals->goalid}}" name="goalid">
                          <input type="text" style="display:none;" value="updateprivacy" name="action">
                          <input type="text" style="display:none;" value="overridetaskprivacy" name="attribute">
                          </form>
                          <script type="text/javascript">

                          var overridetaskprivacy=document.getElementById("overridetaskprivacy");
                          overridetaskprivacy.addEventListener("change",function(event){
                            event.preventDefault();
                            setoverridetaskprivacyy();
                          });
                          function setoverridetaskprivacy(){
                           var form = document.getElementById("overridetaskprivacyfrm");
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
                            Deny commits <br>
                            <small>Switch off to deny aligned users commit on your goal. This is turned on by default</small>
                             </div>
                             <a href="#!" class="secondary-content">
                           <form id="allowcommitprivacyfrm" action="{{route('goal')}}" method="post">
                             {{ csrf_field() }}
                           <div class="switch col s3">
                            <label>
                                <input id="allowcommitprivacy" {{($privacys->allowcommitprivacy!='public')?'checked':''}}  value="private" type="checkbox" name="allowcommitprivacy" {{($email!=Auth::User()->email)?"disabled":""}}>
                              <span class="lever"></span>
                            </label>
                          </div>
                          <input type="text" style="display:none;" value="{{$goals->goalid}}" name="goalid">
                          <input type="text" style="display:none;" value="updateprivacy" name="action">
                          <input type="text" style="display:none;" value="allowcommitprivacy" name="attribute">
                          </form>
                          <script type="text/javascript">

                          var allowcommitprivacy=document.getElementById("allowcommitprivacy");
                          allowcommitprivacy.addEventListener("change",function(event){
                            event.preventDefault();
                            setallowcommitprivacy();
                          });
                          function setallowcommitprivacy(){
                           var form = document.getElementById("allowcommitprivacyfrm");
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
                     </ul>
                   </div>
                   <div id="other">
                       Change your goal into what you need
                       <ul class="collection">
                           <li class="collection-item row">
                               <span class="col s4 input-field">Goal Name</span>
                               <div class="input-field col s8">
                                   <input id="goalnamefield" oninput="editgoalname();" value="{{ $goals->goalname }}" type="text" class="validate" {{($email!=Auth::User()->email)?"disabled":""}}>
                                   <br>
                                   <div class="progress" id="goalnamepre" style="display:none;">
                                       <div class="indeterminate"></div>
                                   </div>
                                   <small>Modify goal name</small>
                               </div>
                               <script type="text/javascript">
                                 function editgoalname() {
                                   $('#goalnamepre').show();
                                   $.post('{{route('updategoalname')}}',{
                                     goalname:$('#goalnamefield').val(),
                                     goalid:'{{$goals->goalid}}',
                                     _token:'{{ csrf_token() }}'
                                   },function(data,status){
                                     console.log('Data: ' + data + 'Status: ' + status);
                                     $('#goalnamepre').hide();
                                   });
                                 }
                               </script>
                           </li>
                           <li class="collection-item">
                               <span class="col s4 input-field">Goal Intent</span>
                               <div class="input-field col s8">
                                   <input id="goalintentfield" oninput="editgoalintent();"  value="{{ $goals->goalintent }}" type="text" class="validate" {{($email!=Auth::User()->email)?"disabled":""}}>
<br>
                                   <div class="progress" id="goalintentpre" style="display:none;">
                                       <div class="indeterminate"></div>
                                   </div>
                                   <small>Modify goal intent</small>
                               </div>
                               <script type="text/javascript">
                                 function editgoalintent() {
                                   $('#goalintentpre').show();
                                   $.post('{{route('updategoalintent')}}',{
                                     goalintent:$('#goalintentfield').val(),
                                     goalid:'{{$goals->goalid}}',
                                     _token:'{{ csrf_token() }}'
                                   },function(data,status){
                                     console.log('Data: ' + data + 'Status: ' + status);
                                     $('#goalintentpre').hide();
                                   });
                                 }
                               </script>
                               <br><br><br><br><br>
                           </li>
                       </ul>
                       <div class="row">
                           <div class="col s12">
                               <span>Goal priority</span>
                               <div class="card-panel white input-field">
                                   <select id="goalpriorityfield" onchange="editgoalpriority();" {{($email!=Auth::User()->email)?"disabled":""}}>
                                       <option value="" disabled selected>{{$goals->goalpriority}}</option>
                                       <option value="high">high</option>
                                       <option value="medium">medium</option>
                                       <option value="low">low</option>
                                   </select>
                               </div>
                               <br>
                               <div class="progress" id="goalprioritytpre" style="display:none;">
                                   <div class="indeterminate"></div>
                               </div>
                               <script type="text/javascript">
                                 function editgoalpriority() {
                                   $('#goalprioritytpre').show();
                                   $.post('{{route('updategoalpriority')}}',{
                                     goalpriority:$('#goalpriorityfield').val(),
                                     goalid:'{{$goals->goalid}}',
                                     _token:'{{ csrf_token() }}'
                                   },function(data,status){
                                     console.log('Data: ' + data + 'Status: ' + status);
                                     $('#goalprioritytpre').hide();

                                   });
                                 }
                               </script>
                           </div>
                       </div>
                       <div class="row">
                           <div class="col s12">
                               <span>Goal Category</span>
                               <div class="card-panel white input-field">
                                   <select id="goalcategoryfield" onchange="updategoalcategory();" {{($email!=Auth::User()->email)?"disabled":""}}>
                                       <option value="" disabled selected>{{$goals->goalcategory}}</option>
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
                                   <script type="text/javascript">
                                     function updategoalcategory() {
                                       $('#goalcategorypre').show();
                                       $.post('{{route('updategoalcategory')}}',{
                                         goalpriority:$('#goalcategoryfield').val(),
                                         goalid:'{{$goals->goalid}}',
                                         _token:'{{ csrf_token() }}'
                                       },function(data,status){
                                         console.log('Data: ' + data + 'Status: ' + status);
                                          $('#goalcategorypre').hide();
                                       });
                                     }
                                   </script>
                               </div>
                               <br>
                               <div class="progress" id="goalcategorypre" style="display:none;">
                                   <div class="indeterminate"></div>
                               </div>
                           </div>
                       </div>
                       <div class="row ">
                           <div class="col l6 m6 s12">
                               <div class="card-panel">
                                   <div class="input-field row grey-text">
                                       <input type="text" name="taskstartdate"  id="goalstartdatefield" class="datepicker" {{($email!=Auth::User()->email)?"disabled":""}}>
                                       <label>Enter the starting date</label>
                                   </div>
                               </div>
                           </div>
                           <div class="col l6 m6 s12">
                               <div class="card-panel">
                                   <div class="input-field row grey-text">
                                       <input type="text" name="taskenddate" id="goalenddatefield"  class="datepicker" {{($email!=Auth::User()->email)?"disabled":""}}>
                                       <label>Enter the ending date</label>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                 </div>
               @endif
               </div>
            </div>
          </div>

          {{-- settings end --}}
          {{-- skills --}}

          <div class="card blue darken-4" id="skillstabcontent" style="display:none;">
            <div class="card-content white-text">
              <span class="card-title">Skills and Strengths</span>
              <div class="card black-text">
                <div class="row">
                  <div class="col s12">
                    <div class="row" style="height:5px;"></div>
                    <p class="card-title">Skills I have</p>
                    @foreach ($userskill as $userskills)
                      <div class="chip">
                       {{$userskills->skill}}
                       {{-- <i class="close material-icons">close</i> --}}
                     </div>
                    @endforeach
                    <div class="row" style="height:10px;"></div>

                    <p class="card-title">Skills to acquire:</p>

                    <form id="addachievementsform" action="{{route('goalskill')}}" method="post" style="display:none;">
                      {{csrf_field()}}
                      <div class="row">
                        <div class="input-field col s9">
                          <input type="hidden" name="goalid" value="{{ $goals->goalid}}">
                          <input id="skillinput" type="text" name="goalskill">
                        </div>
                      <div class=" input-field col s3">
                        <span class="blue-text" style="cursor:pointer;" id="addachievementsbtn" onclick="addachievementsform.submit();"><i class="material-icons">done</i></span>
                        <span class="blue-text" style="cursor:pointer;" onclick="closeachievementsinput()"><i class="material-icons">close</i></span>
                      </div>
                    </div>
                    </form>


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
                      <div class="collection">
                          @foreach ($goalskill as $goalskills)
                              <div class="collection-item flow-text" id="{{$goalskills->id}}item">{{$goalskills->skill}}<i id="{{$goalskills->id}}btn" style="cursor:pointer;" class="close material-icons right">close</i></div>

                             <form id="{{$goalskills->id}}form" action="{{route('deletegoalskill')}}" method="post">
                              {{ csrf_field() }}
                              <input type="hidden" name="id" value="{{$goalskills->id}}">
                             </form>

                             <script type="text/javascript">
                               var deletealignedbtn=document.getElementById('{{$goalskills->id}}btn');
                               deletealignedbtn.addEventListener("click",deletealignedfunction)
                               function deletealignedfunction() {
                               var form=document.getElementById('{{$goalskills->id}}form');
                               var action = form.getAttribute("action");
                               var form_data = new FormData(form);
                               var xhr = new XMLHttpRequest();
                               xhr.open('POST', action, true);
                               xhr.send(form_data);
                               xhr.onreadystatechange = function () {
                                 if(xhr.readyState == 4 && xhr.status == 200) {
                                    var result = xhr.responseText;
                                    console.log('Result: ' + result);
                                    document.getElementById("{{$goalskills->id}}item").style.display='none';
                                 }
                               };
                             }
                             </script>
                          @endforeach
                        </div>

                        <a class="blue-text" id="addachievements" style="cursor:pointer;" onclick="showachievementsinput()">Add Skills</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          {{-- skills end --}}
          {{-- likes --}}

          @php
           $countlikes=0;$countdislikes=0;
          foreach ($likesanddislikes as $likesdislikes){
             if($likesdislikes->type=="l"){
               $countlikes=$countlikes+1;

             }

           else
            $countdislikes=$countdislikes+1;
          }

          @endphp




          <div class="card blue darken-4" id="likestabcontent" style="display:none;">
            <div class="card-content white-text">
              <span class="card-title">Brag</span>
              <div class="row">
               <div class="col s12">
                 <div class="card-panel">
                   <span class="grey-text text-darken-3">I am a very simple card. I am good at containing small bits of information.
                   I am convenient because I require little markup to use effectively. I am similar to what is called a panel in other frameworks.
                   </span>
                 </div>
               </div>
             </div>
            </div>
          </div>

          {{-- likes end --}}

        </div>
      </div>
  {{-- </div> --}}

  <script type="text/javascript">
  var taskstabcontent=document.getElementById('taskstabcontent');
  var alignstabcontent=document.getElementById('alignstabcontent');
  var sharestabcontent=document.getElementById('sharestabcontent');
  var settingstabcontent=document.getElementById('settingstabcontent');
  var skillstabcontent=document.getElementById('skillstabcontent');
  var likestabcontent=document.getElementById('likestabcontent');
  var taskstabbtncover=document.getElementById('taskstabbtncover');
  var alignstabbtncover=document.getElementById('alignstabbtncover');
  var sharestabbtncover=document.getElementById('sharestabbtncover');
  var settingstabbtncover=document.getElementById('settingstabbtncover');
  var skillstabbtncover=document.getElementById('skillstabbtncover');
  var likestabbtncover=document.getElementById('likestabbtncover');
  var taskstabbtn=document.getElementById('taskstabbtn');
  var alignstabbtn=document.getElementById('alignstabbtn');
  var sharestabbtn=document.getElementById('sharestabbtn');
  var settingstabbtn=document.getElementById('settingstabbtn');
  var skillstabbtn=document.getElementById('skillstabbtn');
  var likestabbtn=document.getElementById('likestabbtn');


  function showalign() {
    $("#alignstabbtncover").addClass("tabheadfrgoal");
    $("#taskstabbtncover").removeClass("tabheadfrgoal");
    $("#sharestabbtncover").removeClass("tabheadfrgoal");
    $("#settingstabbtncover").removeClass("tabheadfrgoal");
    $("#skillstabbtncover").removeClass("tabheadfrgoal");
    $("#likestabbtncover").removeClass("tabheadfrgoal");

    taskstabcontent.style.display="none";
    sharestabcontent.style.display="none";
    settingstabcontent.style.display="none";
    skillstabcontent.style.display="none";
    likestabcontent.style.display="none";
    alignstabcontent.style.display="block";

    $("#alignstabbtn").removeClass("darken-2");
    $("#taskstabbtn").removeClass("darken-4");
    $("#sharestabbtn").removeClass("darken-4");
    $("#settingstabbtn").removeClass("darken-4");
    $("#skillstabbtn").removeClass("darken-4");
    $("#likestabbtn").removeClass("darken-4");

    $("#alignstabbtn").addClass("darken-4");
    $("#taskstabbtn").addClass("blue darken-2");
    $("#sharestabbtn").addClass("blue darken-2");
    $("#settingstabbtn").addClass("blue darken-2");
    $("#skillstabbtn").addClass("blue darken-2");
    $("#likestabbtn").addClass("blue darken-2");
  }

  function showtask() {
    $("#taskstabbtncover").addClass("tabheadfrgoal");
    $("#alignstabbtncover").removeClass("tabheadfrgoal");
    $("#sharestabbtncover").removeClass("tabheadfrgoal");
    $("#settingstabbtncover").removeClass("tabheadfrgoal");
    $("#skillstabbtncover").removeClass("tabheadfrgoal");
    $("#likestabbtncover").removeClass("tabheadfrgoal");

    taskstabcontent.style.display="block";
    sharestabcontent.style.display="none";
    settingstabcontent.style.display="none";
    skillstabcontent.style.display="none";
    likestabcontent.style.display="none";
    alignstabcontent.style.display="none";

    $("#alignstabbtn").removeClass("darken-4");
    $("#taskstabbtn").removeClass("darken-2");
    $("#sharestabbtn").removeClass("darken-4");
    $("#settingstabbtn").removeClass("darken-4");
    $("#skillstabbtn").removeClass("darken-4");
    $("#likestabbtn").removeClass("darken-4");

    $("#alignstabbtn").addClass("darken-2");
    $("#taskstabbtn").addClass("blue darken-4");
    $("#sharestabbtn").addClass("blue darken-2");
    $("#settingstabbtn").addClass("blue darken-2");
    $("#skillstabbtn").addClass("blue darken-2");
    $("#likestabbtn").addClass("blue darken-2");
  }

  function showshare() {
    $("#taskstabbtncover").removeClass("tabheadfrgoal");
    $("#alignstabbtncover").removeClass("tabheadfrgoal");
    $("#sharestabbtncover").addClass("tabheadfrgoal");
    $("#settingstabbtncover").removeClass("tabheadfrgoal");
    $("#skillstabbtncover").removeClass("tabheadfrgoal");
    $("#likestabbtncover").removeClass("tabheadfrgoal");

    taskstabcontent.style.display="none";
    sharestabcontent.style.display="block";
    settingstabcontent.style.display="none";
    skillstabcontent.style.display="none";
    likestabcontent.style.display="none";
    alignstabcontent.style.display="none";

    $("#alignstabbtn").removeClass("darken-4");
    $("#taskstabbtn").removeClass("darken-4");
    $("#sharestabbtn").removeClass("darken-2");
    $("#settingstabbtn").removeClass("darken-4");
    $("#skillstabbtn").removeClass("darken-4");
    $("#likestabbtn").removeClass("darken-4");

    $("#alignstabbtn").addClass("darken-2");
    $("#taskstabbtn").addClass("blue darken-2");
    $("#sharestabbtn").addClass("blue darken-4");
    $("#settingstabbtn").addClass("blue darken-2");
    $("#skillstabbtn").addClass("blue darken-2");
    $("#likestabbtn").addClass("blue darken-2");
  }

  function showsetting() {
    $("#taskstabbtncover").removeClass("tabheadfrgoal");
    $("#alignstabbtncover").removeClass("tabheadfrgoal");
    $("#sharestabbtncover").removeClass("tabheadfrgoal");
    $("#settingstabbtncover").addClass("tabheadfrgoal");
    $("#skillstabbtncover").removeClass("tabheadfrgoal");
    $("#likestabbtncover").removeClass("tabheadfrgoal");

    taskstabcontent.style.display="none";
    sharestabcontent.style.display="none";
    settingstabcontent.style.display="block";
    skillstabcontent.style.display="none";
    likestabcontent.style.display="none";
    alignstabcontent.style.display="none";

    $("#alignstabbtn").removeClass("darken-4");
    $("#taskstabbtn").removeClass("darken-4");
    $("#sharestabbtn").removeClass("darken-4");
    $("#settingstabbtn").removeClass("darken-2");
    $("#skillstabbtn").removeClass("darken-4");
    $("#likestabbtn").removeClass("darken-4");

    $("#alignstabbtn").addClass("darken-2");
    $("#taskstabbtn").addClass("blue darken-2");
    $("#sharestabbtn").addClass("blue darken-2");
    $("#settingstabbtn").addClass("blue darken-4");
    $("#skillstabbtn").addClass("blue darken-2");
    $("#likestabbtn").addClass("blue darken-2");
  }

  function showskill() {
    $("#taskstabbtncover").removeClass("tabheadfrgoal");
    $("#alignstabbtncover").removeClass("tabheadfrgoal");
    $("#sharestabbtncover").removeClass("tabheadfrgoal");
    $("#settingstabbtncover").removeClass("tabheadfrgoal");
    $("#skillstabbtncover").addClass("tabheadfrgoal");
    $("#likestabbtncover").removeClass("tabheadfrgoal");

    taskstabcontent.style.display="none";
    sharestabcontent.style.display="none";
    settingstabcontent.style.display="none";
    skillstabcontent.style.display="block";
    likestabcontent.style.display="none";
    alignstabcontent.style.display="none";

    $("#alignstabbtn").removeClass("darken-4");
    $("#taskstabbtn").removeClass("darken-4");
    $("#sharestabbtn").removeClass("darken-4");
    $("#settingstabbtn").removeClass("darken-4");
    $("#skillstabbtn").removeClass("darken-2");
    $("#likestabbtn").removeClass("darken-4");

    $("#alignstabbtn").addClass("darken-2");
    $("#taskstabbtn").addClass("blue darken-2");
    $("#sharestabbtn").addClass("blue darken-2");
    $("#settingstabbtn").addClass("blue darken-2");
    $("#skillstabbtn").addClass("blue darken-4");
    $("#likestabbtn").addClass("blue darken-2");
  }

  function showlike() {
    $("#taskstabbtncover").removeClass("tabheadfrgoal");
    $("#alignstabbtncover").removeClass("tabheadfrgoal");
    $("#sharestabbtncover").removeClass("tabheadfrgoal");
    $("#settingstabbtncover").removeClass("tabheadfrgoal");
    $("#skillstabbtncover").removeClass("tabheadfrgoal");
    $("#likestabbtncover").addClass("tabheadfrgoal");

    taskstabcontent.style.display="none";
    sharestabcontent.style.display="none";
    settingstabcontent.style.display="none";
    skillstabcontent.style.display="none";
    likestabcontent.style.display="block";
    alignstabcontent.style.display="none";

    $('.count').each(function () {
      $(this).prop('Counter',0).animate({
        Counter: $(this).text()
          }, {
                duration: 2000,
                easing: 'swing',
                step: function (now) {
                  $(this).text(Math.ceil(now));
                }
              });
            });

    $('.countdislike').each(function () {
      $(this).prop('Counter',0).animate({
        Counter: $(this).text()
          }, {
        duration: 4000,
        easing: 'swing',
        step: function (now) {
        $(this).text(Math.ceil(now));
              }
      });
    });

    $("#alignstabbtn").removeClass("darken-4");
    $("#taskstabbtn").removeClass("darken-4");
    $("#sharestabbtn").removeClass("darken-4");
    $("#settingstabbtn").removeClass("darken-4");
    $("#skillstabbtn").removeClass("darken-4");
    $("#likestabbtn").removeClass("darken-2");

    $("#alignstabbtn").addClass("darken-2");
    $("#taskstabbtn").addClass("blue darken-2");
    $("#sharestabbtn").addClass("blue darken-2");
    $("#settingstabbtn").addClass("blue darken-2");
    $("#skillstabbtn").addClass("blue darken-2");
    $("#likestabbtn").addClass("blue darken-4");
  }
  </script>
  {{-- central panel end --}}


  <div class="col l2 m2 hide-on-small-only">
    <div class="card blue darken-4">
      <div class="card-content white-text">
        <span class="card-title">{{ $goals->goalname }}</span>
        <div class="divider"></div>
        ends - {{ $edt }}<br>
        <div class="divider"></div>
        started - {{ $std }}<br>
        <div class="divider"></div>
        intent - {{ $goals->goalintent }}
        <div class="divider"></div>
        category - {{ $goals->goalcategory }}
        <div class="divider"></div>
        permission - {{ $goals->goalauthorization }}
        <div class="divider"></div>
      </div>
    </div>
  <ul class="collapsible" data-collapsible="expandable">
   <li>
     <div class="collapsible-header"><i class="material-icons">call_merge</i>Align</div>
     <div class="collapsible-body">
         @if($aligned->isEmpty())
             No aligns yet
             @endif
       @foreach ($aligned as $alignsshort)
             <a href="{{url('/search/'.$alignsshort->id)}}"><img src="{{ asset('uploads/avatars/'.$alignsshort->avatar) }}" height="50px" width="50px" class="circle responsive-img tooltipped" data-position="bottom" data-delay="50" data-tooltip="{{ $alignsshort->fname." ".$alignsshort->lname }}"></a>
       @endforeach
     </div>
   </li>
   <li>
     <div class="collapsible-header"><i class="material-icons">share</i>Share</div>
     <div class="collapsible-body">
         @if($shared->isEmpty())
             No shares yet
             @endif
       @foreach ($shared as $shares)
          <a href="{{url('/search/'.$shares->id)}}"><img src="{{ asset('uploads/avatars/'.$shares->avatar) }}" height="50px" width="50px" class="circle responsive-img tooltipped" data-position="bottom" data-delay="50" data-tooltip="{{ $shares->fname." ".$shares->lname }}"></a>
       @endforeach
     </div>
   </li>
 </ul>
  </div>
</div>
</div>
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

@endsection
