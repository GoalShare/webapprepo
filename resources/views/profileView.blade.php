@extends('layouts.navbar')

@section('content')
<div class="row">

    <div class="container">
      <!-- user prof -->

          <br>
          <div class="col s12 m6 l6">
            <img src="{{asset('uploads/avatars/'.Auth::User()->avatar)}}" alt="" width="200px" height="200px" class="circle">
          </div>
          <div class="col s12 m6 l6">
            <br>
              <blockquote>
            <h4 class="flow-text"> <b>{{Auth::User()->fname}}  {{Auth::User()->lname}} PreferedName</b><h4>



                <p class="flow-text">{{Auth::User()->email}} <br>
                    {{Auth::User()->phone}}  <br>{{Auth::User()->dob}} </p>
             </blockquote>

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
             <div class="collapsible-header"><b>Aligned Goals</b></div>
             <div class="collapsible-body">
              Goal Name
               <div class="progress">
                   <div class="determinate" style="width: 70%"> </div>
               </div>
               70%
             </div>
             <div class="collapsible-body">
              Goal Name
               <div class="progress">
                   <div class="determinate" style="width: 70%"> </div>
               </div>
               70%
             </div>
           </li>

           <li>
             <div class="collapsible-header"><b>Aligned Goals</b></div>
             <div class="collapsible-body">
              Goal Name
               <div class="progress">
                   <div class="determinate" style="width: 50%"> </div>
               </div>
               50%
             </div>
           </li>

           <li>
             <div class="collapsible-header"><b>Accomplished Goals</b></div>
             <div class="collapsible-body">
               Goal Name
                <div class="progress">
                    <div class="determinate" style="width: 20%"> </div>
                </div>
                20%
             </div>
           </li>
           <li>
             <div class="collapsible-header"><b>
             </div>

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
            <li class="divider"></li>
            <div class="card-content">
              Aligned Friends</br>
          </a>
          <div class="chip">
            <img src="1.png" alt="Contact Person">
            Jane Doe
          </div>
          </a>

          <div class="card-action">
            Friends</br>

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
