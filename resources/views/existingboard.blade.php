@extends('layouts.navbar')

@section('content')
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

    <div class="row" style="height:25px;"></div>

    <div class="row">
<div class="col l4"></div>
    <div class="col l4">
        <div class="card-tabs">
          <ul class="tabs" style="overflow:hidden;">
            <li class="tab"><a class="active blue-text text-darken-4" href="#Acadomictab">Acadomic</a></li>
            <li class="tab"><a class="blue-text text-darken-4" href="#Industrialtab">Industrial</a></li>
            <li class="tab"><a class="blue-text text-darken-4" href="#Spaorttab">Sport</a></li>
          </ul>
        </div>
    </div>
<div class="col l4"></div>
    </div>
    <script type="text/javascript">

    function courseFunction() {

      var textBox=$.trim( $('#myInput').val());

      if(textBox == ""){
          $('.tosearch').show();

      }

      else{

        $('.tosearch').hide();
        var txt = $('#myInput').val();
        $('.tosearch:contains("'+txt+'")').show();

      }
    }


    </script>


    <div class="row" id="Acadomictab">


      @foreach($acodamictopics as $acodamictopic)
          @if($acodamictopic->CT_ID == 1)

            <div class="col s4 m6 l3">
              <div data-target="{{$acodamictopic->ID}}" class="modal-trigger">
              <div class="card tosearch" style="height:100px;cursor:pointer;">
                <div style="height:40px;"></div>
                <center><b id="">{{$acodamictopic->Category_Contain_Name}}</b></center>
              </div>
            </div>
            </div>

            <!-- Modal Structure -->
          <div id="{{$acodamictopic->ID}}" class="modal">
            <center><h4>{{$acodamictopic->Category_Contain_Name}}</h4></center>
            @foreach($acodamicsubtopics as $acodamicsubtopic)
              @if($acodamictopic->ID==$acodamicsubtopic->CC_ID)


                <div class="col s4 m6 l3">

                  <div class="card" id="testcolor{{$acodamicsubtopic->ID}}" onclick="testfunc{{$acodamicsubtopic->ID}}()" style="cursor:pointer;height:150px;width:150px;border-radius: 50%;">
                    <div style="height:50px;"></div>

                    <center><b id="{{$acodamicsubtopic->ID}}">{{$acodamicsubtopic->Sub_Contain_Name}}</b></center>
                  </div>
                </div>

                <script>
                  document.getElementById("testcolor{{$acodamicsubtopic->ID}}").style.backgroundColor="#{{$acodamicsubtopic->Sub_Contain_Color}}";
                </script>



              @endif

              <script>
                function testfunc{{$acodamicsubtopic->ID}}(){
                  var x=document.getElementById("{{$acodamicsubtopic->ID}}").id;

                  document.getElementById("topicfilenameinput").value="Acadomic";
                  document.getElementById("subtopicfilenameinput").value=x;

                  var form=document.getElementById("subtopicfilenameform");
                  form.submit();

                }
              </script>


            @endforeach

          </div>

      @endif

      @endforeach



      <form class="" id="subtopicfilenameform" action="{{route('exsitingsubtopicformrout')}}" method="post">
       {{csrf_field()}}
       <input type="hidden" name="topicfilename" value="" id="topicfilenameinput">
       <input type="hidden" name="subtopicfilename" value="" id="subtopicfilenameinput">
       {{-- <input type="hidden" name="maintopicfilename" value="" id="maintopicfilenameinput"> --}}
      </form>

    </div>


    <div class="row" id="Industrialtab" style="display:none;">
      @foreach($acodamictopics as $acodamictopic)
          @if($acodamictopic->CT_ID == 2)

            <div class="col s4 m6 l3">
              <div data-target="{{$acodamictopic->ID}}" class="modal-trigger">
              <div class="card tosearch" style="height:100px;cursor:pointer;">
                <div style="height:40px;"></div>
                <center><b id="">{{$acodamictopic->Category_Contain_Name}}</b></center>
              </div>
            </div>
            </div>

            <!-- Modal Structure -->
          <div id="{{$acodamictopic->ID}}" class="modal">
            <center><h4>{{$acodamictopic->Category_Contain_Name}}</h4></center>
            @foreach($acodamicsubtopics as $acodamicsubtopic)
              @if($acodamictopic->ID==$acodamicsubtopic->CC_ID)


                <div class="col s4 m6 l3">

                  <div class="card" id="testcolorind{{$acodamicsubtopic->ID}}" onclick="testfuncind{{$acodamicsubtopic->ID}}()" style="cursor:pointer;height:150px;width:150px;border-radius: 50%;">
                    <div style="height:50px;"></div>

                    <center><b id="{{$acodamicsubtopic->ID}}">{{$acodamicsubtopic->Sub_Contain_Name}}</b></center>
                  </div>
                </div>

                <script>
                  document.getElementById("testcolorind{{$acodamicsubtopic->ID}}").style.backgroundColor="#{{$acodamicsubtopic->Sub_Contain_Color}}";
                </script>



              @endif

              <script>
                function testfuncind{{$acodamicsubtopic->ID}}(){
                  var x=document.getElementById("{{$acodamicsubtopic->ID}}").id;

                  document.getElementById("topicfilenameinput").value="Industrial";
                  document.getElementById("subtopicfilenameinput").value=x;

                  var form=document.getElementById("subtopicfilenameform");
                  form.submit();

                }
              </script>


            @endforeach

          </div>

      @endif

      @endforeach



      {{-- <form class="" id="subtopicfilenameform" action="{{route('exsitingsubtopicformrout')}}" method="post">
       {{csrf_field()}}
       <input type="hidden" name="topicfilename" value="" id="topicfilenameinput">
       <input type="hidden" name="subtopicfilename" value="" id="subtopicfilenameinput">

      </form> --}}
    </div>


    <div class="row" id="Spaorttab" style="display:none;">

      @foreach($acodamictopics as $acodamictopic)
          @if($acodamictopic->CT_ID == 3)

            <div class="col s4 m6 l3">
              <div data-target="{{$acodamictopic->ID}}" class="modal-trigger">
              <div class="card tosearch" style="height:100px;cursor:pointer;">
                <div style="height:40px;"></div>
                <center><b id="">{{$acodamictopic->Category_Contain_Name}}</b></center>
              </div>
            </div>
            </div>

            <!-- Modal Structure -->
          <div id="{{$acodamictopic->ID}}" class="modal">
            <center><h4>{{$acodamictopic->Category_Contain_Name}}</h4></center>
            @foreach($acodamicsubtopics as $acodamicsubtopic)
              @if($acodamictopic->ID==$acodamicsubtopic->CC_ID)


                <div class="col s4 m6 l3">

                  <div class="card" id="testcolorspo{{$acodamicsubtopic->ID}}" onclick="testfuncspo{{$acodamicsubtopic->ID}}()" style="cursor:pointer;height:150px;width:150px;border-radius: 50%;">
                    <div style="height:50px;"></div>

                    <center><b id="{{$acodamicsubtopic->ID}}">{{$acodamicsubtopic->Sub_Contain_Name}}</b></center>
                  </div>
                </div>

                <script>
                  document.getElementById("testcolorspo{{$acodamicsubtopic->ID}}").style.backgroundColor="#{{$acodamicsubtopic->Sub_Contain_Color}}";
                </script>



              @endif

              <script>
                function testfuncspo{{$acodamicsubtopic->ID}}(){
                  var x=document.getElementById("{{$acodamicsubtopic->ID}}").id;

                  document.getElementById("topicfilenameinput").value="Sports";
                  document.getElementById("subtopicfilenameinput").value=x;

                  var form=document.getElementById("subtopicfilenameform");
                  form.submit();

                }
              </script>


            @endforeach

          </div>

      @endif

      @endforeach


    </div>

  </div>
@endsection
