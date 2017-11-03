@extends('layouts.navbar')

@section('content')
  <div class="container">

    <div class="row" style="height:25px;"></div>

    <div class="row">
<div class="col l4"></div>
    <div class="col l4">
        <div class="card-tabs">
          <ul class="tabs tabs-fixed-width">
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
              <div class="card tosearch" id="" style="height:100px;">
                <div style="height:40px;cursor:pointer;"></div>
                <center><b>{{$acodamictopic->Category_Contain_Name}}</b></center>
              </div>
            </div>
            </div>

            <!-- Modal Structure -->
          <div id="{{$acodamictopic->ID}}" class="modal">
            <div class="modal-content">
              <h4>Modal Header</h4>
              <p>A bunch of text</p>
            </div>
            <div class="modal-footer">
              <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
            </div>
          </div>



      @endif

      @endforeach
    </div>


    <div class="row" id="Spaorttab" style="display:none;">
      @foreach($acodamictopics as $acodamictopic)
          @if($acodamictopic->CT_ID == 3)

            <div class="col s4 m6 l3">
              <div data-target="{{$acodamictopic->ID}}" class="modal-trigger">
              <div class="card tosearch" id="" style="height:100px;">
                <div style="height:40px;cursor:pointer;"></div>
                <center><b>{{$acodamictopic->Category_Contain_Name}}</b></center>
              </div>
            </div>
            </div>


            <!-- Modal Structure -->
          <div id="{{$acodamictopic->ID}}" class="modal">
            <div class="modal-content">
              <h4>Modal Header</h4>
              <p>A bunch of text</p>
            </div>
            <div class="modal-footer">
              <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
            </div>
          </div>



      @endif

      @endforeach


    </div>

  </div>
@endsection
