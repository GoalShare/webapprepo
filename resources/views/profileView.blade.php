@extends('layouts.navbar')

@section('content')

@include('layouts.friendsView')
<div class="row">

    <div class="container">
      <!-- user prof -->
<style media="screen">
  .cambtn{

    position:absolute;
    z-index: 4;
    margin-left: -100px;


  }

  .hidden{
    visibility: hidden;
  }
</style>

          <br>
          <div class="col s12 m6 l6 center-align" id="profilepic">



                      <div class="cambtn hide-on-med-and-down" id="imgoverlayfade">
                      <form style=""enctype="multipart/form-data" action="{{route('profile')}}" method="post" id="addprofilepicfrm">
                        {{ csrf_field() }}
                          <p class="white-text">
                            <div class="file-field input-field"  >
                              <div class="btn btn-floating">
                            <i class="material-icons tooltipped" data-position="bottom" data-delay="50" data-tooltip="Upload Profile Picture" >camera</i>

                            <input type="file" name="profilepic"  onchange="javascript:this.form.submit();">
                          </div>
                        </div>


                          </p>

                        </form>




                    </div>

                    <div class="btn btn-floating hide-on-med-and-up">
                      <form style=""enctype="multipart/form-data" action="{{route('profile')}}" method="post" id="addprofilepicfrm">
                        {{ csrf_field() }}
                          <p class="white-text">
                            <div class="file-field input-field"  >
                              <div class="btn btn-floating">
                            <i class="material-icons" >camera</i>

                            <input type="file" name="profilepic"  onchange="javascript:this.form.submit();">
                          </div>
                        </div>


                          </p>

                        </form>
                    </div>




                      <div id="imageWrapper" style="z-index:1;">
                         <img   src="{{asset('uploads/avatars/'.Auth::User()->avatar)}}" alt="" width="200px" height="200px" class="circle">
                      </div>
                  </div>




          <script type="text/javascript">

            document.getElementById("imgoverlayfade").style.display='none';
            var imageWrapper = document.getElementById('imageWrapper');
            var imageprof = document.getElementById('imageprof');
            var profilepic=document.getElementById("profilepic");
            profilepic.addEventListener("mouseover",mouseOver);
            profilepic.addEventListener("mouseout",mouseOut);
            imageWrapper.addEventListener("mouseover",wrapperShow);
            imageWrapper.addEventListener("mouseout",WrapperDis);
            imageprof.addEventListener("mouseover",WrapperDis1);
            imageprof.addEventListener("mouseout",WrapperDis1);


            //
            // $("#imageWrapper").hover(function() {
            //   $("#imgoverlayfade").removeClass('hidden');
            // }, function() {
            //   $("#imgoverlayfade").addClass('hidden');
            // });

            //
            // function WrapperDis1(){
            //     $("#imgoverlayfade").removeClass('hidden');
            // }
            //
            // function WrapperDis1(){
            //     $("#imgoverlayfade").addClass('hidden');
            // }
            //
            // function wrapperShow(){
            //     $("#imgoverlayfade").removeClass('hidden');
            // }
            //
            // function WrapperDis(){
            //     $("#imgoverlayfade").addClass('hidden');
            // }
            //
            function mouseOver(){
              document.getElementById("imgoverlayfade").style.display='inline';


            }
            function mouseOut(){
              document.getElementById("imgoverlayfade").style.display='none';


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
                              @if($userskills->type=="skill")
                            <div class="chip">

                                {{$userskills->skill}}

                              <i id="{{$userskills->skill}}"class="close material-icons">close</i>
                            </div>
                            <form id="{{$userskills->id}}" action="{{route('deleteskill')}}" method="post">
                             {{ csrf_field() }}
                             <input type="hidden" name="id" value="{{$userskills->id}}">
                            </form>
                            <script type="text/javascript">
                              var deletealignedbtn=document.getElementById('{{$userskills->skill}}');
                              deletealignedbtn.addEventListener("click",deletealignedfunction)
                              function deletealignedfunction() {
                              var form=document.getElementById('{{$userskills->id}}');
                              var action = form.getAttribute("action");
                              var form_data = new FormData(form);
                              var xhr = new XMLHttpRequest();
                              xhr.open('POST', action, true);
                              xhr.send(form_data);
                              xhr.onreadystatechange = function () {
                                if(xhr.readyState == 4 && xhr.status == 200) {
                                   var result = xhr.responseText;
                                   console.log('Result: ' + result);
                                }
                              };
                            }
                            </script>
                          @endif
                            @endforeach

                            <form id="skillform" action="{{ route('skill')}}" method="post">
                          {{ csrf_field() }}
                          <input type="hidden" id="skillinput" name="skill" value="">


                           <div id="skillchip"class="chips chips-initial"></div>

                            </form>

                            <script type="text/javascript">
                            var y=0;
                            $('#skillchip').on('chip.add', function(e, chip){


                              var z=$('#skillchip').material_chip('data');

                              var form = document.getElementById("skillform");
                              var action = form.getAttribute("action");
                              var skillinput=document.getElementById("skillinput");
                              skillinput.value=z[y].tag;
                              var form_data = new FormData(form);
                              var xhr = new XMLHttpRequest();
                              xhr.open('POST', action, true);
                              xhr.send(form_data);
                              console.log(form_data);
                              xhr.onreadystatechange = function () {
                                if(xhr.readyState == 4 && xhr.status == 200) {
                                   var result = xhr.responseText;
                                   console.log('Result: ' + result);
                                }
                              };

                              console.log(z[y].tag);
                              y++;
                            });
                            </script>

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
                                @if($userskills->type=="strength")
                              <div class="chip">

                                  {{$userskills->skill}}

                                <i id="{{$userskills->skill}}"class="close material-icons">close</i>
                              </div>
                              <form id="{{$userskills->id}}" action="{{route('deleteskill')}}" method="post">
                               {{ csrf_field() }}
                               <input type="hidden" name="id" value="{{$userskills->id}}">
                              </form>
                              <script type="text/javascript">
                                var deletealignedbtn=document.getElementById('{{$userskills->skill}}');
                                deletealignedbtn.addEventListener("click",deletealignedfunction)
                                function deletealignedfunction() {
                                var form=document.getElementById('{{$userskills->id}}');
                                var action = form.getAttribute("action");
                                var form_data = new FormData(form);
                                var xhr = new XMLHttpRequest();
                                xhr.open('POST', action, true);
                                xhr.send(form_data);
                                xhr.onreadystatechange = function () {
                                  if(xhr.readyState == 4 && xhr.status == 200) {
                                     var result = xhr.responseText;
                                     console.log('Result: ' + result);
                                  }
                                };
                              }
                              </script>
                            @endif
                              @endforeach
                              <form id="strengthform"action="{{route('strength')}}" method="post">
                              {{ csrf_field() }}
                                <input type="hidden" id="strengthinput" name="strength" value="">
                              <div id="strengthchip"class="chips chips-initial">

                              </div>
                              </form>
                              <script type="text/javascript">
                              var i=0;
                              $('#strengthchip').on('chip.add', function(e, chip){
                                //agdyabadadadad
                                var x=$('#strengthchip').material_chip('data');
                                var form = document.getElementById("strengthform");
                                var action = form.getAttribute("action");
                                var strengthinput=document.getElementById("strengthinput");
                                strengthinput.value=x[i].tag;
                                var form_data = new FormData(form);
                                var xhr = new XMLHttpRequest();
                                xhr.open('POST', action, true);
                                xhr.send(form_data);
                                console.log(form_data);
                                xhr.onreadystatechange = function () {
                                  if(xhr.readyState == 4 && xhr.status == 200) {
                                     var result = xhr.responseText;
                                     console.log('Result: ' + result);
                                  }
                                };
                                console.log(x[i].tag);
                                i++;
                              });
                              </script>
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

                <script type="text/javascript">
                $('.chips').material_chip();
                </script>

          </div>
     </div>
     <!-- ///////////// -->
     <!-- forthpart -->

          </div>





   </div>
</div>

</div>


@endsection
