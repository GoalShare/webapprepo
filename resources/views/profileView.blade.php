@extends('layouts.navbar')

@section('content')
<div class="row">

    <div class="container">
      <!-- user prof -->

          <br>
          <div class="col s12 m6 l6 center-align" id="profilepic">
            <form style="display:none;"enctype="multipart/form-data" action="{{route('profile')}}" method="post" id="addprofilepicfrm">
            {{ csrf_field() }}
            <div class="file-field input-field">
              <div class="btn btn-floating">
                <span><i class="material-icons">add</i></span>
                <input type="file" name="profilepic">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate col s10" type="text" name="profilepicpath">
                <button type="submit" class="col s2" style="border:none;background-color:inherit;" name="button"><i class="material-icons">send</i></button>
              </div>
            </div>
            </form>
            <img src="{{asset('uploads/avatars/'.Auth::User()->avatar)}}" alt="" width="200px" height="200px" class="circle">
          </div>
          <script type="text/javascript">
            var profilepic=document.getElementById("profilepic");
            profilepic.addEventListener("mouseover",mouseOver);
            profilepic.addEventListener("mouseout",mouseOut);

            function mouseOver(){
              document.getElementById("addprofilepicfrm").style.display='inline';
            }
            function mouseOut(){
              document.getElementById("addprofilepicfrm").style.display='none';
            }
          </script>
          <style media="screen">

          </style>
          <div class="col s12 m6 l6">
            <br>

            <h4 class="flow-text"> <b>&nbsp;&nbsp;&nbsp;&nbsp;{{Auth::User()->fname}}  {{Auth::User()->lname}}</b></h4>


                <p class="flow-text">{{Auth::User()->email}} <br>
                    {{Auth::User()->phone}}  <br>{{Auth::User()->dob}} </p>


          </div>



          <div class="col s12 m12 l12">
          <div class="card">
            <div class="card-action">
                <h5><b>Skills and Streangths</b></h5>
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
                            <div class="chip">
                              Laravel
                              <i class="close material-icons">close</i>
                            </div>

                          </div>

                        </div>
                      </div>



                        <div class="col s12 m6 l6">
                          <div class="card">
                            <div class="card-action">
                              Streangths
                              <li class="divider"></li>
                            </div>
                            <div class="card-content">
                              <!-- chips -->
                              <div class="chip">
                                Laravel
                                <i class="close material-icons">close</i>
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
<!-- ///////////////// -->


<!-- forthpart -->
     <div class="col s12 m12 l12 center-align">
       <div class="card ">

            <div class="card-action">
               <h5><b>Friends</b></h5>
            </div>


          <div class="card-action">

            <div class="chip">
              <img src="1.png" alt="Contact Person">
              Jane Doe
            </div>
         </div>

            </div>

            <a href="#">View all friends</a>


          </div>
     </div>
     <!-- ///////////// -->





   </div>
</div>

</div>


@endsection
