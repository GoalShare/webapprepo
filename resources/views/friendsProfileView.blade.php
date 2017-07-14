@extends('layouts.navbar')

@section('content')
  @foreach ($user as $users)

  @endforeach
<div class="row">

    <div class="container">
      <!-- user prof -->

          <br>
          <div class="col s12 m6 l6">
            <img src="{{asset('uploads/avatars/'.$users->avatar)}}" alt="" width="200px" height="200px" class="circle">
          </div>
          <div class="col s12 m6 l6">
            <br>

            <h4 class="flow-text"> <b>{{$users->fname}}  {{$users->lname}} </b><h4>



                <p class="flow-text">{{$users->email}} <br>
                    {{$users->phone}}  <br>{{$users->dob}} </p>

                 <form class="" action="{{route('addfriend')}}" method="post">
                   {{csrf_field()}}
                   <input type="hidden" name="friend" value="requested">
                   <input type="hidden" name="friendid" value="{{$users->id}}">
                   <button class="btn waves-effect waves-light blue darken-4 tooltipped" data-position="bottom" data-delay="50" data-tooltip="Add Friend" type="submit" name="action"{{($friendship!='')?'disabled':''}}>{{($friendship!='')?$friendship:'send request'}}
                 </form>

              <i class="material-icons right">person_pin</i>
            </button>

          </div>



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
                              @if ($userskills->type=='skill')
                              <div class="chip">

                                  {{$userskills->skill}}


                              </div>
                              @endif
                            @endforeach


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
                                @if ($userskills->type=='strength')
                                <div class="chip">

                                    {{$userskills->skill}}

                                </div>
                                  @endif
                              @endforeach


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
                 Name: {{$goals->goalname}}<br>
                 @foreach ($privacys as $privacy)
                   @if (($privacy->goalid==$goals->goalid)&&($privacy->goalintentprivacy=='public'))
                     Intent:{{$goals->goalintent}}<br>
                   @endif
                 @endforeach
                 @foreach ($privacys as $privacy)
                   @if (($privacy->goalid==$goals->goalid)&&($privacy->goalcategoryprivacy=='public'))
                     Category:{{$goals->goalcategory}}<br>
                   @endif
                 @endforeach
                 @foreach ($privacys as $privacy)
                   @if (($privacy->goalid==$goals->goalid)&&($privacy->goalstartdateprivacy=='public'))
                     Startdate:{{$goals->goalstartdate}}<br>
                   @endif
                 @endforeach
                 @foreach ($privacys as $privacy)
                   @if (($privacy->goalid==$goals->goalid)&&($privacy->goalenddateprivacy=='public'))
                     Enddate:{{$goals->goalenddate}}<br>
                   @endif
                 @endforeach
                 @foreach ($privacys as $privacy)
                   @if (($privacy->goalid==$goals->goalid)&&($privacy->goalpriorityprivacy=='public'))
                     Priority:{{$goals->goalpriority}}
                   @endif
                 @endforeach
                 @foreach ($privacys as $privacy)
                   @if (($privacy->goalid==$goals->goalid)&&($privacy->goalcompletedpercentageprivacy=='public'))
                     <div class="progress">
                         <div class="determinate" style="width: {{$goals->goalcompletedpercentage}}%"> </div>
                     </div>
                     {{$goals->goalcompletedpercentage}}%
                   @endif
                 @endforeach
               </div>
             @endif
           @endforeach
         </li>

         <li>
           <div class="collapsible-header"><b>Goals in progress</b></div>
           @foreach ($goal as $goals)
             @if ($goals->goalcompletedpercentage<100)
               <div class="collapsible-body">
                 Name: {{$goals->goalname}}<br>
                 @foreach ($privacys as $privacy)
                   @if (($privacy->goalid==$goals->goalid)&&($privacy->goalintentprivacy=='public'))
                     Intent:{{$goals->goalintent}}<br>
                   @endif
                 @endforeach
                 @foreach ($privacys as $privacy)
                   @if (($privacy->goalid==$goals->goalid)&&($privacy->goalcategoryprivacy=='public'))
                     Category:{{$goals->goalcategory}}<br>
                   @endif
                 @endforeach
                 @foreach ($privacys as $privacy)
                   @if (($privacy->goalid==$goals->goalid)&&($privacy->goalstartdateprivacy=='public'))
                     Startdate:{{$goals->goalstartdate}}<br>
                   @endif
                 @endforeach
                 @foreach ($privacys as $privacy)
                   @if (($privacy->goalid==$goals->goalid)&&($privacy->goalenddateprivacy=='public'))
                     Enddate:{{$goals->goalenddate}}<br>
                   @endif
                 @endforeach
                 @foreach ($privacys as $privacy)
                   @if (($privacy->goalid==$goals->goalid)&&($privacy->goalpriorityprivacy=='public'))
                     Priority:{{$goals->goalpriority}}
                   @endif
                 @endforeach
                 @foreach ($privacys as $privacy)
                   @if (($privacy->goalid==$goals->goalid)&&($privacy->goalcompletedpercentageprivacy=='public'))
                     <div class="progress">
                         <div class="determinate" style="width: {{$goals->goalcompletedpercentage}}%"> </div>
                     </div>
                     {{$goals->goalcompletedpercentage}}%
                   @endif
                 @endforeach

               </div>
             @endif
           @endforeach
         </li>

       </ul>
       <br>
       <br><br>

   </div>
 </div>
     <!-- ///////////// -->

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



          </div>



   </div>
</div>

</div>


@endsection
