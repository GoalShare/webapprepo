@extends('layouts.navbar')

@section('content')

<div class="container" style="height:500px;">
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
                       <a id="maintopic" href="{{url('/existingboard')}}" class="breadcrumb">{{$topic}}</a>
                       <a id="topic" href="{{url('/existingboard')}}" class="breadcrumb">{{$acodamictopicID->Category_Contain_Name}}</a>
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
      <h6>All Learning Boards</h6>

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
                              <div class="col l4">
                                <p>
                              <a style="cursor:pointer;" onclick="exsistingsubfunc{{$learningboards->ID}}()">
                              <script>
                              count=count+1;
                              document.write(count+".");
                              </script>

                              {{$learningboards->LB_Name}}
                              <script>
                                function exsistingsubfunc{{$learningboards->ID}}(){
                                    document.getElementById("CCIDinput{{$learningboards->ID}}").value="{{$learningboards->CC_ID}}";
                                    document.getElementById("SCIDinput{{$learningboards->ID}}").value="{{$learningboards->SC_ID}}";
                                    document.getElementById("LBIDinput{{$learningboards->ID}}").value="{{$learningboards->ID}}";
                                    var form=document.getElementById("learningboardsform{{$learningboards->ID}}");
                                    form.submit();
                                                  }
                              </script>
                              <form id="learningboardsform{{$learningboards->ID}}" action="{{route('getselectedexsistingboard')}}" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="CCIDfilename" value="" id="CCIDinput{{$learningboards->ID}}">
                                <input type="hidden" name="SCIDfilename" value="" id="SCIDinput{{$learningboards->ID}}">
                                <input type="hidden" name="LBIDfilename" value="" id="LBIDinput{{$learningboards->ID}}">
                              </form>

                            </a>
                          </p>
                        </div>
                        <div class="col l4">

                        </div>
                        <div class="col l4"></div>
                        </div>

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
