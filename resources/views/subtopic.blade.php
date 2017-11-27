@extends('layouts.navbar')

@section('content')

<div class="container" style="height:500px;">

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
  <div class="card">
    {{-- <a class="right" href="{{url('/mainlearningboard')}}" style="cursor:pointer;"><i class="material-icons">close</i></a> --}}
{{-- @foreach ($acodamictopicsID as $acodamictopicID)

  @foreach($acodamicsubtopicID as $acodamicsubtopicIDs)
      @if($acodamictopicID->ID==$acodamicsubtopicIDs->CC_ID)
      {{$acodamictopicID->Category_Contain_Name}}
      @endif
  @endforeach
@endforeach --}}


@foreach ($acodamictopicsID as $acodamictopicID)
      @foreach($acodamicsubtopicID as $acodamicsubtopicIDs)
        @if($x==$acodamicsubtopicIDs->ID)
            @if($acodamictopicID->ID==$acodamicsubtopicIDs->CC_ID)
              {{-- <center><h3>{{$acodamictopicID->Category_Contain_Name}}</h3></center>
              <div class="col l4"><h5>{{$acodamicsubtopicIDs->Sub_Contain_Name}}</h5></div>
              <div class="col l4"></div> --}}

              <nav class="blue darken-4">
                  <div class="nav-wrapper">
                    <div class="col s12">
                      {{-- <a href="{{url('/mainlearningboard')}}" class="breadcrumb">{{$acodamictopicID->Category_Contain_Name}}</a>
                      <a href="#!" class="breadcrumb"><b>{{$acodamicsubtopicIDs->Sub_Contain_Name}}</b></a>
                      <div class="col l4"><input style="max-width:200px;margin-top:-45px;" class="right" type="text" id="myInput" onkeyup="courseFunction()" placeholder="SEARCH A COURSE"></div>
                       --}}
                       <a id="maintopic" href="{{url('/mainlearningboard')}}" class="breadcrumb">{{$topic}}</a>
                       <a id="topic" href="{{url('/mainlearningboard')}}" class="breadcrumb">{{$acodamictopicID->Category_Contain_Name}}</a>
                       <a id="subtopic" href="#!" class="breadcrumb">{{$acodamicsubtopicIDs->Sub_Contain_Name}}</a>



                    </div>
                  </div>
                </nav>
          @endif
        @endif
    @endforeach
@endforeach



<div class="row"></div>

<div class="right"><i class="material-icons">search</i><input class="" style="max-width:150px;max-height:20px;" type="text" id="myInput" onkeyup="courseFunction()" placeholder="SEARCH A COURSE"></div>
      {{-- <hr> --}}
      <div class="row" style="height:20px;"></div>
      <h6>Popular Learning Board</h6>

<script>
var count=0;
</script>




<div class="tosearch">

          @foreach ($acodamictopicsID as $acodamictopicID)
                @foreach($acodamicsubtopicID as $acodamicsubtopicIDs)
                  @if($x==$acodamicsubtopicIDs->ID)
                      @if($acodamictopicID->ID==$acodamicsubtopicIDs->CC_ID)
                        @foreach($learningboard as $learningboards)
                          @if(($acodamictopicID->ID==$learningboards->CC_ID)&&($acodamicsubtopicIDs->ID==$learningboards->SC_ID))
                            @if($learningboards->ID)
                              <div class="row">
                              <div class="col s4">
                                <p>
                              <a style="cursor:pointer;" onclick="learningboardfunc{{$learningboards->ID}}()">
                              <script>
                              count=count+1;
                              document.write(count+".");
                              </script>

                              {{$learningboards->LB_Name}}
                              <script>
                                function learningboardfunc{{$learningboards->ID}}(){
                                    document.getElementById("CCIDinput{{$learningboards->ID}}").value="{{$learningboards->CC_ID}}";
                                    document.getElementById("SCIDinput{{$learningboards->ID}}").value="{{$learningboards->SC_ID}}";
                                    document.getElementById("LBIDinput{{$learningboards->ID}}").value="{{$learningboards->ID}}";
                                    var form=document.getElementById("learningboardsform{{$learningboards->ID}}");
                                    form.submit();
                                                  }
                              </script>
                              <form id="learningboardsform{{$learningboards->ID}}" action="{{route('selectedlearningboard')}}" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="CCIDfilename" value="" id="CCIDinput{{$learningboards->ID}}">
                                <input type="hidden" name="SCIDfilename" value="" id="SCIDinput{{$learningboards->ID}}">
                                <input type="hidden" name="LBIDfilename" value="" id="LBIDinput{{$learningboards->ID}}">
                              </form>

                            </a>
                          </p>
                        </div>
                        @php
           $countlikes=0;$share=0;$follow=0;
          foreach ($likesanddislikes as $likesdislikes){
             if(($likesdislikes->type=="l") && ($likesdislikes->learningboardtopicid==$learningboards->ID)){
               $countlikes=$countlikes+1;

             }

           // else
           //  $countdislikes=$countdislikes+1;
          }

          @endphp
                        <div class="col s1">

                          <a style="font-size: 30px;cursor:pointer;"><i class="material-icons" id="likebtn{{$learningboards->ID}}">thumb_up</i><span class="count" id="likes{{$learningboards->ID}}" style="color:#9e9e9e;font-size:15px;">@php echo $countlikes; @endphp</span></a>
                        </div>
                          <div class="col s1">
                          <a style="font-size: 30px;cursor:pointer;" ><i class="material-icons">share</i><span class="count" id="likes" style="color:#9e9e9e;font-size:15px;">@php echo $share; @endphp</span></a>
                        </div>
                          <div class="col s1">
                          <a  style="font-size: 30px;cursor:pointer;" ><i class="material-icons">rss_feed</i><span class="count" id="likes" style="color:#9e9e9e;font-size:15px;">@php echo $share; @endphp</span></a>
                        </div>
                        <div class="col s4"></div>
                        </div>

                        <form id="likeform{{$learningboards->ID}}" action="{{route('lsubtopilikes')}}" method="post">
                          {{ csrf_field() }}
                          <input type="hidden" name="learningbordsid" value="{{$learningboards->ID}}">
                          <input type="hidden" name="type" value="l">
                        </form>
                <script type="text/javascript">
                  var likebtn=document.getElementById("likebtn{{$learningboards->ID}}");
                  likebtn.addEventListener("click",likedfunction)
                  function likedfunction() {
                  var form=document.getElementById("likeform{{$learningboards->ID}}");
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
                       var newlike=document.getElementById("likes{{$learningboards->ID}}").innerHTML;
                       // var newdislike=document.getElementById("dislikes").innerHTML;
                       document.getElementById("likes{{$learningboards->ID}}").innerHTML=parseInt(newlike,10) + 1;
                       document.getElementById("likebtn{{$learningboards->ID}}").disabled=true;
                       // document.getElementById("dislikebtn").disabled=false;
                       // document.getElementById("dislikes").innerHTML=parseInt(newdislike,10) - 1;


                    }
                  };
                }
                </script>




                          @else
                            <p>"There are no learning boards"</p>
                          @endif

                          @endif
                        @endforeach
                     @endif
                  @endif
              @endforeach
          @endforeach

</div>
  </div>
</div>


@endsection
