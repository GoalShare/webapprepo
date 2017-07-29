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

    .cammob{
        margin-bottom: 200px;
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
                            <i class="material-icons tooltipped" data-position="bottom" data-delay="50" data-tooltip="Upload Profile Picture" >camera_alt</i>

                            <input type="file" name="profilepic"  onchange="javascript:this.form.submit();">
                          </div>
                        </div>


                          </p>

                        </form>




                    </div>

                    <div class=" btn btn-floating hide-on-med-and-up">
                      <form style=""enctype="multipart/form-data" action="{{route('profile')}}" method="post" id="addprofilepicfrm">
                        {{ csrf_field() }}

                            <div class="file-field"  >

                          <i class="material-icons">camera_alt</i>
                            <input type="file" name="profilepic"  onchange="javascript:this.form.submit();">

                        </div>




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

          <!-- Modal Trigger -->


          <!-- Modal Structure -->
          <div id="modal1" class="modal modal-fixed-footer">
            <div class="modal-content">
              <h4>Edit Portfolio</h4>


              <form  action="" method="post" id="addgoalform">


                    <div class="input-field col s12">
                     <textarea id="userbio" class="materialize-textarea"></textarea>
                     <label for="userbio">User Bio</label>
                   </div>
                      <li class="divider"></li>
                      <div class="input-field col s12">
                       <textarea id="work" class="materialize-textarea"></textarea>
                       <label for="work">Work Experiance</label>
                     </div>
                        <li class="divider"></li>
                        <div class="input-field col s12">
                         <textarea id="education" class="materialize-textarea"></textarea>
                         <label for="education">Education</label>
                       </div>
                          <li class="divider"></li>


          <input type="text" class="hidden" name="action" value="2">
            </div>
            <div class="modal-footer">

              <button type="submit" id="addgoalbtn" style="margin-right:10px;margin-left:10px;"class="modal-action waves-effectwaves-effect waves-light btn">Confirm</button>
            </form>

            </div>

          </div>



                              <div class="col s12 m12 l12">
                                <div class="card">
                                  <div class="card-action">
                                     <h5><b>Portfolio</b></h5>
                                  </div>
                                  <div class="row"style="margin:10px;">
                                      <div class="col s12 m6 l6">
                                          <div class="card ">
                                             <div class="card-content ">
                                               <span class="card-title"><i class="material-icons">account_box</i>&nbsp;Aspiration
                                                 <button type="button" onclick="addbiodata()" id="addbiobtn" class="btn btn-floating right pulse"><i class="material-icons">border_color</i></button>
                                                 <i style="display:none;cursor:pointer;" id="closebiobtn"onclick="closeaddbio()" class="material-icons right">close</i>
                                               </span>
                                               <li class="divider"></li><br>
                                               @if (Auth::User()->bio=="")
                                                 <p id="inibio"class="blue-text">Please Enter your aspiration</p>
                                               @else
                                                 <p id="setbio">{{Auth::User()->bio}}</p>
                                               @endif
                                               <form action="{{route('addbio')}}" method="post" id="addbio-form" style="display:none;">
                                                 <div class="row">
                                                   <form class="col s12">
                                                      {{csrf_field()}}
                                                     <div class="row">
                                                       <div class="input-field col s12">
                                                         <textarea id="biocontent" name="bio" class="materialize-textarea"></textarea>
                                                         <label for="biocontent">Type you aspiration</label>
                                                         <button type="button" id="biosubmit" class="btn btn-floating" type="submit"><i class="material-icons">send</i></button>
                                                       </div>
                                                     </div>
                                                   </form>
                                                 </div>
                                               </form>
                                               <script type="text/javascript">
                                                //  var addbiobtn=document.getElementById("addbiobtn");
                                                //  var closebio document.getElementById("closebiobtn");
                                                 var inibio =document.getElementById("inibio");
                                                 var setbio =document.getElementById("setbio");
                                                 var addbioform=document.getElementById("addbio-form");
                                                 var biosubmit=document.getElementById("biosubmit");
                                                 function addbiodata() {
                                                   console.log('sds');
                                                   document.getElementById("addbiobtn").style.display="none";
                                                   document.getElementById("closebiobtn").style.display="inline";
                                                   @if (Auth::User()->bio=="")
                                                   inibio.style.display="none";
                                                   @endif
                                                   @if (Auth::User()->bio!="")
                                                   setbio.style.display="none";
                                                   @endif
                                                   console.log('sdsdsds');
                                                   addbioform.style.display="block";
                                                 }
                                                 function closeaddbio() {
                                                   document.getElementById("addbiobtn").style.display="inline";
                                                   document.getElementById("closebiobtn").style.display="none";
                                                   @if (Auth::User()->bio=="")
                                                   inibio.style.display="block";
                                                   @endif
                                                   @if (Auth::User()->bio!="")
                                                   setbio.style.display="block";
                                                   @endif
                                                   addbioform.style.display="none";

                                                 }

                                                    function postbio() {
                                                      var action = addbioform.getAttribute("action");
                                                      var form_data=new FormData(addbioform);
                                                      var xhr = new XMLHttpRequest();
                                                      xhr.open('POST',action, true);
                                                      xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                                                      xhr.send(form_data);
                                                      xhr.onreadystatechange = function () {
                                                        if(xhr.readyState == 4 && xhr.status == 200) {
                                                          var result = xhr.responseText;
                                                          biosubmit.disabled=false;
                                                          console.log('Result: ' + result);
                                                          var json = JSON.parse(result);
                                                          addbioform.style.display="none";
                                                          setbio.innerHTML=json;
                                                          setbio.style.display="block";
                                                          document.getElementById("addbiobtn").style.display="inline";
                                                          document.getElementById("closebiobtn").style.display="none";


                                                        }
                                                        else {
                                                          biosubmit.disabled=true;
                                                        }
                                                      };

                                                    }
                                                    biosubmit.addEventListener("click",function(event){
                                                      event.preventDefault();
                                                      postbio();
                                                    });
                                               </script>
                                             </div>
                                          </div>
                                      </div>
                                      <div class="col s12 m6 l6">
                                          <div class="card ">
                                             <div class="card-content">
                                               <span class="card-title"><i class="material-icons">work</i>&nbsp;Work Experience</span>
                                               <li class="divider"></li><br>
                                               <b>previous :</b><br>
                                                 <span id="nopreviouswork" class="blue-text ">Add your previous employments</span>
                                                 @foreach ($portfolio as $work)
                                                 @if ($work->category=='work' && $work->nature=='previous')
                                                   <span class="chip col s12">{{$work->data}} <i id="{{$work->data}}"class="close material-icons">close</i></span>
                                                   <form id="{{$work->id}}" action="{{route('deleteportfolio')}}" method="post">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="id" value="{{$work->id}}">
                                                   </form>
                                                   <script type="text/javascript">
                                                     document.getElementById("nopreviouswork").style.display="none";
                                                     var deletepreviouswork=document.getElementById('{{$work->data}}');
                                                     deletepreviouswork.addEventListener("click",deletepreviousworkfunction)
                                                     function deletepreviousworkfunction() {
                                                     var form=document.getElementById('{{$work->id}}');
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
                                                 <div id="addnewprevious">
                                                 </div>
                                                 <br>
                                                 <form id="addpreviouswork-form" action="{{route('addpreviouswork')}}" method="post">
                                                   {{csrf_field()}}
                                                   <div class="input-field col s12">
                                                     <input id="previouswork" type="text" name="previous">
                                                     <label for="previouswork">
                                                       Enter your previous Employments
                                                     </label>
                                                     <button type="submit" class="btn btn-floating right"id="addpreviousworkbtn" name="button"><i type="submit"class="material-icons">send</i></button>
                                                   </div>
                                                 </form>
                                                 <script type="text/javascript">
                                                   var addpreviousworkbtn=document.getElementById('addpreviousworkbtn');
                                                   addpreviousworkbtn.addEventListener("click", function(event) {
                                                   addpreviousworkfunction();
                                                   event.preventDefault();
                                                   });

                                                   function addpreviousworkfunction() {
                                                   var form=document.getElementById('addpreviouswork-form');
                                                   var action = form.getAttribute("action");
                                                   var form_data = new FormData(form);
                                                   var xhr = new XMLHttpRequest();
                                                   xhr.open('POST', action, true);
                                                   xhr.send(form_data);
                                                   xhr.onreadystatechange = function () {
                                                     if(xhr.readyState == 4 && xhr.status == 200) {
                                                        var result = xhr.responseText;
                                                        console.log('Result: ' + result);
                                                        var json = JSON.parse(result);
                                                        document.getElementById("nopreviouswork").style.display="none";
                                                        document.getElementById("addnewprevious").innerHTML+='<span class="chip col s12">'+json+'</span>';
                                                        form.reset();
                                                     }
                                                   };
                                                 }
                                                 </script>
                                                 <br><br>
                                               <b>current :</b><br>
                                                 <span id="nocurrentwork" class="blue-text ">Add your current employment</span>
                                                 @foreach ($portfolio as $work)
                                                 @if ($work->category=='work' && $work->nature=='current')
                                                   <span class="chip col s12">{{$work->data}}<i id="{{$work->data}}"class="close material-icons">close</i></span>
                                                   <form  id="{{$work->id}}" action="{{route('deleteportfolio')}}" method="post">
                                                    {{ csrf_field() }}
                                                    <input type="hidden"name="id" value="{{$work->id}}">
                                                   </form>
                                                   <script type="text/javascript">
                                                     document.getElementById("nocurrentwork").style.display="none";
                                                     var deletecurrentwork=document.getElementById('{{$work->data}}');
                                                     deletecurrentwork.addEventListener("click",deletecurrentworkfunction)
                                                     function deletecurrentworkfunction() {
                                                     var form=document.getElementById('{{$work->id}}');
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
                                                 <div id="addnewcurrent">
                                                 </div>
                                                 <br>
                                                 <form id="addcurrentwork-form" action="{{route('addcurrentwork')}}" method="post">
                                                   {{csrf_field()}}
                                                   <div class="input-field col s12">
                                                     <input id="currentwork" type="text" name="current">
                                                     <label for="currentwork">
                                                       Enter your current Employment
                                                     </label>
                                                     <button type="submit" class="btn btn-floating right"id="addcurrentworkbtn" name="button"><i type="submit"class="material-icons">send</i></button>
                                                   </div>
                                                 </form>
                                                 <script type="text/javascript">
                                                   var addcurrentworkbtn=document.getElementById('addcurrentworkbtn');
                                                   addcurrentworkbtn.addEventListener("click", function(event) {
                                                   addcurrentworkfunction();
                                                   event.preventDefault();
                                                   });

                                                   function addcurrentworkfunction() {
                                                   var form=document.getElementById('addcurrentwork-form');
                                                   var action = form.getAttribute("action");
                                                   var form_data = new FormData(form);
                                                   var xhr = new XMLHttpRequest();
                                                   xhr.open('POST', action, true);
                                                   xhr.send(form_data);
                                                   xhr.onreadystatechange = function () {
                                                     if(xhr.readyState == 4 && xhr.status == 200) {
                                                        var result = xhr.responseText;
                                                        console.log('Result: ' + result);
                                                        var json = JSON.parse(result);
                                                        document.getElementById("nocurrentwork").style.display="none";
                                                        document.getElementById("addnewcurrent").innerHTML+='<span class="chip col s12">'+json+'</span>';
                                                        form.reset();
                                                     }
                                                   };
                                                 }
                                                 </script>
                                                 <div class="card-content">
                                                   &nbsp;
                                                 </div>
                                             </div>
                                          </div>
                                      </div>
                                    </div>
                                    <div class="divider"></div><br>
                                    <div class="row" style="margin:10px;">
                                        <div class="col s12 m6 l6">
                                            <div class="card ">
                                               <div class="card-content ">
                                                 <span class="card-title"><i class="material-icons">school</i>&nbsp;Education</span>
                                                 <li class="divider"></li><br>
                                                 <b>primary school :</b><br>
                                                 <span id="noprimarysch" class="blue-text">Add your primary school</span>
                                                 @foreach ($portfolio as $edu)
                                                 @if ($edu->category=='education' && $edu->nature=='primarysch')
                                                  <span class="chip col s12">{{$edu->data}}<i id="{{$edu->data}}"class="close material-icons">close</i></span>
                                                  <form id="{{$edu->id}}" action="{{route('deleteportfolio')}}" method="post">
                                                   {{ csrf_field() }}
                                                   <input type="hidden" name="id" value="{{$edu->id}}">
                                                  </form>
                                                  <script type="text/javascript">
                                                    document.getElementById("noprimarysch").style.display="none";
                                                    var deleteprimarysch=document.getElementById('{{$edu->data}}');
                                                    deleteprimarysch.addEventListener("click",deleteprimaryschfunction)
                                                    function deleteprimaryschfunction() {
                                                    var form=document.getElementById('{{$edu->id}}');
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
                                                 <div id="addnewprimary">
                                                 </div>
                                                 <br>
                                                 <form id="addprimary-form" action="{{route('addprimary')}}" method="post">
                                                   {{csrf_field()}}
                                                   <div class="input-field col s12">
                                                     <input id="primary" type="text" name="primary">
                                                     <label for="primary">
                                                       Enter your primary school
                                                     </label>
                                                     <button type="submit" class="btn btn-floating right"id="addprimarybtn" name="button"><i type="submit"class="material-icons">send</i></button>
                                                   </div>
                                                 </form>
                                                 <script type="text/javascript">
                                                   var addprimarybtn=document.getElementById('addprimarybtn');
                                                   addprimarybtn.addEventListener("click", function(event) {
                                                   addprimaryfunction();
                                                   event.preventDefault();
                                                   });

                                                   function addprimaryfunction() {
                                                   var form=document.getElementById('addprimary-form');
                                                   var action = form.getAttribute("action");
                                                   var form_data = new FormData(form);
                                                   var xhr = new XMLHttpRequest();
                                                   xhr.open('POST', action, true);
                                                   xhr.send(form_data);
                                                   xhr.onreadystatechange = function () {
                                                     if(xhr.readyState == 4 && xhr.status == 200) {
                                                        var result = xhr.responseText;
                                                        console.log('Result: ' + result);
                                                        var json = JSON.parse(result);
                                                        document.getElementById("noprimarysch").style.display="none";
                                                        document.getElementById("addnewprimary").innerHTML+='<span class="chip col s12">'+json+'</span>';
                                                        form.reset();
                                                     }
                                                   };
                                                 }
                                                 </script>
                                                 <br><br>
                                                 <b>secondary school :</b><br>
                                                 <span id="nosecondarysch" class="blue-text">Add your secondary school</span>
                                                 @foreach ($portfolio as $edu)
                                                 @if ($edu->category=='education' && $edu->nature=='secondarysch')
                                                  <span class="chip col s12">{{$edu->data}}<i id="{{$edu->data}}"class="close material-icons">close</i></span>
                                                  <form id="{{$edu->id}}" action="{{route('deleteportfolio')}}" method="post">
                                                   {{ csrf_field() }}
                                                   <input type="hidden" name="id" value="{{$edu->id}}">
                                                  </form>
                                                  <script type="text/javascript">
                                                    document.getElementById("nosecondarysch").style.display="none";
                                                    var deletesecondarysch=document.getElementById('{{$edu->data}}');
                                                    deletesecondarysch.addEventListener("click",deletesecondaryschfunction)
                                                    function deletesecondaryschfunction() {
                                                    var form=document.getElementById('{{$edu->id}}');
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
                                                 <div id="addnewsecondary">
                                                 </div>
                                                 <br>
                                                 <form id="addsecondary-form" action="{{route('addsecondary')}}" method="post">
                                                   {{csrf_field()}}
                                                   <div class="input-field col s12">
                                                     <input id="secondary" type="text" name="secondary">
                                                     <label for="secondary">
                                                       Enter your secondary school
                                                     </label>
                                                     <button type="submit" class="btn btn-floating right"id="addsecondarybtn" name="button"><i type="submit"class="material-icons">send</i></button>
                                                   </div>
                                                 </form>
                                                 <script type="text/javascript">
                                                   var addsecondarybtn=document.getElementById('addsecondarybtn');
                                                   addsecondarybtn.addEventListener("click", function(event) {
                                                   addsecondaryfunction();
                                                   event.preventDefault();
                                                   });

                                                   function addsecondaryfunction() {
                                                   var form=document.getElementById('addsecondary-form');
                                                   var action = form.getAttribute("action");
                                                   var form_data = new FormData(form);
                                                   var xhr = new XMLHttpRequest();
                                                   xhr.open('POST', action, true);
                                                   xhr.send(form_data);
                                                   xhr.onreadystatechange = function () {
                                                     if(xhr.readyState == 4 && xhr.status == 200) {
                                                        var result = xhr.responseText;
                                                        console.log('Result: ' + result);
                                                        var json = JSON.parse(result);
                                                        document.getElementById("nosecondarysch").style.display="none";
                                                        document.getElementById("addnewsecondary").innerHTML+='<span class="chip col s12">'+json+'</span>';
                                                        form.reset();
                                                     }
                                                   };
                                                 }
                                                 </script>
                                                 <br><br>
                                                 <b>college :</b><br>
                                                 <span id="nocollege" class="blue-text">Add your college</span>
                                                 @foreach ($portfolio as $edu)
                                                 @if ($edu->category=='education' && $edu->nature=='college')
                                                  <span class="chip col s12">{{$edu->data}}<i id="{{$edu->data}}"class="close material-icons">close</i></span>
                                                  <form id="{{$edu->id}}" action="{{route('deleteportfolio')}}" method="post">
                                                   {{ csrf_field() }}
                                                   <input type="hidden" name="id" value="{{$edu->id}}">
                                                  </form>
                                                  <script type="text/javascript">
                                                    document.getElementById("nocollege").style.display="none";
                                                    var deletecollege=document.getElementById('{{$edu->data}}');
                                                    deletecollege.addEventListener("click",deletecollegefunction)
                                                    function deletecollegefunction() {
                                                    var form=document.getElementById('{{$edu->id}}');
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
                                                 <div id="addnewcollege">
                                                 </div>
                                                 <br>
                                                 <form id="addcollege-form" action="{{route('addcollege')}}" method="post">
                                                   {{csrf_field()}}
                                                   <div class="input-field col s12">
                                                     <input id="college" type="text" name="college">
                                                     <label for="college">
                                                       Enter your college
                                                     </label>
                                                     <button type="submit" class="btn btn-floating right"id="addcollegebtn" name="button"><i type="submit"class="material-icons">send</i></button>
                                                   </div>
                                                 </form>
                                                 <script type="text/javascript">
                                                   var addcollegebtn=document.getElementById('addcollegebtn');
                                                   addcollegebtn.addEventListener("click", function(event) {
                                                   addcollegefunction();
                                                   event.preventDefault();
                                                   });

                                                   function addcollegefunction() {
                                                   var form=document.getElementById('addcollege-form');
                                                   var action = form.getAttribute("action");
                                                   var form_data = new FormData(form);
                                                   var xhr = new XMLHttpRequest();
                                                   xhr.open('POST', action, true);
                                                   xhr.send(form_data);
                                                   xhr.onreadystatechange = function () {
                                                     if(xhr.readyState == 4 && xhr.status == 200) {
                                                        var result = xhr.responseText;
                                                        console.log('Result: ' + result);
                                                        var json = JSON.parse(result);
                                                        document.getElementById("nocollege").style.display="none";
                                                        document.getElementById("addnewcollege").innerHTML+='<span class="chip col s12">'+json+'</span>';
                                                        form.reset();
                                                     }
                                                   };
                                                 }
                                                 </script>
                                                 <br><br>
                                                 <b>universities :</b><br>
                                                 <span id="nouniversity" class="blue-text">Add your university</span>
                                                 @foreach ($portfolio as $edu)
                                                 @if ($edu->category=='education' && $edu->nature=='university')
                                                  <span class="chip col s12">{{$edu->data}}<i id="{{$edu->data}}"class="close material-icons">close</i></span>
                                                  <form id="{{$edu->id}}" action="{{route('deleteportfolio')}}" method="post">
                                                   {{ csrf_field() }}
                                                   <input type="hidden" name="id" value="{{$edu->id}}">
                                                  </form>
                                                  <script type="text/javascript">
                                                    document.getElementById("nouniversity").style.display="none";
                                                    var deleteuniversity=document.getElementById('{{$edu->data}}');
                                                    deleteuniversity.addEventListener("click",deleteuniversityfunction)
                                                    function deleteuniversityfunction() {
                                                    var form=document.getElementById('{{$edu->id}}');
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
                                                 <div id="addnewuniversity">
                                                 </div>
                                                 <br>
                                                 <form id="adduniversity-form" action="{{route('adduniversity')}}" method="post">
                                                   {{csrf_field()}}
                                                   <div class="input-field col s12">
                                                     <input id="university" type="text" name="university">
                                                     <label for="university">
                                                       Enter your university
                                                     </label>
                                                     <button type="submit" class="btn btn-floating right"id="adduniversitybtn" name="button"><i type="submit"class="material-icons">send</i></button>
                                                   </div>
                                                 </form>
                                                 <script type="text/javascript">
                                                   var adduniversitybtn=document.getElementById('adduniversitybtn');
                                                   adduniversitybtn.addEventListener("click", function(event) {
                                                   adduniversityfunction();
                                                   event.preventDefault();
                                                   });

                                                   function adduniversityfunction() {
                                                   var form=document.getElementById('adduniversity-form');
                                                   var action = form.getAttribute("action");
                                                   var form_data = new FormData(form);
                                                   var xhr = new XMLHttpRequest();
                                                   xhr.open('POST', action, true);
                                                   xhr.send(form_data);
                                                   xhr.onreadystatechange = function () {
                                                     if(xhr.readyState == 4 && xhr.status == 200) {
                                                        var result = xhr.responseText;
                                                        console.log('Result: ' + result);
                                                        var json = JSON.parse(result);
                                                        document.getElementById("nouniversity").style.display="none";
                                                        document.getElementById("addnewuniversity").innerHTML+='<span class="chip col s12">'+json+'</span>';
                                                        form.reset();
                                                     }
                                                   };
                                                 }
                                                 </script>
                                                 <div class="card-content">
                                                   &nbsp;
                                                 </div>
                                               </div>
                                            </div>
                                        </div>
                                        <div class="col s12 m6 l6">
                                            <div class="card">
                                               <div class="card-content ">
                                                 <span class="card-title"><i class="material-icons">grade</i>&nbsp;achievements</span>
                                                 <li class="divider"></li><br>
                                                 <span id="noachievements" class="blue-text">Add your achievements</span>
                                                 @foreach ($portfolio as $edu)
                                                 @if ($edu->category=='achievements' && $edu->nature=='achievements')
                                                  <span class="chip col s12">{{$edu->data}}<i id="{{$edu->data}}"class="close material-icons">close</i></span>
                                                  <form id="{{$edu->id}}" action="{{route('deleteportfolio')}}" method="post">
                                                   {{ csrf_field() }}
                                                   <input type="hidden" name="id" value="{{$edu->id}}">
                                                  </form>
                                                  <script type="text/javascript">
                                                    document.getElementById("noachievements").style.display="none";
                                                    var deleteachievements=document.getElementById('{{$edu->data}}');
                                                    deleteachievements.addEventListener("click",deleteachievementsfunction)
                                                    function deleteachievementsfunction() {
                                                    var form=document.getElementById('{{$edu->id}}');
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
                                                 <div id="addnewachievements">
                                                 </div>
                                                 <br>
                                                 <form id="addachievements-form" action="{{route('addachievements')}}" method="post">
                                                   {{csrf_field()}}
                                                   <div class="input-field col s12">
                                                     <input id="achievements" type="text" name="achievements">
                                                     <label for="achievements">
                                                       Enter your achievements
                                                     </label>
                                                     <button type="submit" class="btn btn-floating right"id="addachievementsbtn" name="button"><i type="submit"class="material-icons">send</i></button>
                                                   </div>
                                                 </form>
                                                 <script type="text/javascript">
                                                   var addachievementsbtn=document.getElementById('addachievementsbtn');
                                                   addachievementsbtn.addEventListener("click", function(event) {
                                                   addachievementsfunction();
                                                   event.preventDefault();
                                                   });

                                                   function addachievementsfunction() {
                                                   var form=document.getElementById('addachievements-form');
                                                   var action = form.getAttribute("action");
                                                   var form_data = new FormData(form);
                                                   var xhr = new XMLHttpRequest();
                                                   xhr.open('POST', action, true);
                                                   xhr.send(form_data);
                                                   xhr.onreadystatechange = function () {
                                                     if(xhr.readyState == 4 && xhr.status == 200) {
                                                        var result = xhr.responseText;
                                                        console.log('Result: ' + result);
                                                        var json = JSON.parse(result);
                                                        document.getElementById("noachievements").style.display="none";
                                                        document.getElementById("addnewachievements").innerHTML+='<span class="chip col s12">'+json+'</span>';
                                                        form.reset();
                                                     }
                                                   };
                                                 }
                                                 </script>
                                                 <div class="card-content">
                                                   &nbsp;
                                                 </div>
                                               </div>
                                            </div>
                                        </div>
                                      </div>
                                      <div class="divider"></div><br>
                                      <div class="row" style="margin:10px;">
                                          <div class="col s12 m6 l6">
                                              <div class="card ">
                                                 <div class="card-content ">
                                                   <span class="card-title"><i class="material-icons">portrait</i>&nbsp;Professional Qualifications</span>
                                                   <li class="divider"></li><br>
                                                   <span id="noprofqual" class="blue-text">Add your professional qualifications</span>
                                                   @foreach ($portfolio as $edu)
                                                   @if ($edu->category=='profqual' && $edu->nature=='profqual')
                                                    <span class="chip col s12">{{$edu->data}}<i id="{{$edu->data}}"class="close material-icons">close</i></span>
                                                    <form id="{{$edu->id}}" action="{{route('deleteportfolio')}}" method="post">
                                                     {{ csrf_field() }}
                                                     <input type="hidden" name="id" value="{{$edu->id}}">
                                                    </form>
                                                    <script type="text/javascript">
                                                      document.getElementById("noprofqual").style.display="none";
                                                      var deleteprofqual=document.getElementById('{{$edu->data}}');
                                                      deleteprofqual.addEventListener("click",deleteprofqualfunction)
                                                      function deleteprofqualfunction() {
                                                      var form=document.getElementById('{{$edu->id}}');
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
                                                   <div id="addnewprofqual">
                                                   </div>
                                                   <br>
                                                   <form id="addprofqual-form" action="{{route('addprofqual')}}" method="post">
                                                     {{csrf_field()}}
                                                     <div class="input-field col s12">
                                                       <input id="profqual" type="text" name="profqual">
                                                       <label for="profqual">
                                                         Enter your professional qualifications
                                                       </label>
                                                       <button type="submit" class="btn btn-floating right"id="addprofqualbtn" name="button"><i type="submit"class="material-icons">send</i></button>
                                                     </div>
                                                   </form>
                                                   <script type="text/javascript">
                                                     var addprofqualbtn=document.getElementById('addprofqualbtn');
                                                     addprofqualbtn.addEventListener("click", function(event) {
                                                     addprofqualfunction();
                                                     event.preventDefault();
                                                     });

                                                     function addprofqualfunction() {
                                                     var form=document.getElementById('addprofqual-form');
                                                     var action = form.getAttribute("action");
                                                     var form_data = new FormData(form);
                                                     var xhr = new XMLHttpRequest();
                                                     xhr.open('POST', action, true);
                                                     xhr.send(form_data);
                                                     xhr.onreadystatechange = function () {
                                                       if(xhr.readyState == 4 && xhr.status == 200) {
                                                          var result = xhr.responseText;
                                                          console.log('Result: ' + result);
                                                          var json = JSON.parse(result);
                                                          document.getElementById("noprofqual").style.display="none";
                                                          document.getElementById("addnewprofqual").innerHTML+='<span class="chip col s12">'+json+'</span>';
                                                          form.reset();
                                                       }
                                                     };
                                                   }
                                                   </script>
                                                   <div class="card-content">
                                                     &nbsp;
                                                   </div>
                                                 </div>
                                              </div>
                                          </div>
                                          <div class="col s12 m6 l6">
                                              <div class="card ">
                                                 <div class="card-content ">
                                                   <span class="card-title"><i class="material-icons">subject</i>&nbsp;Patents</span>
                                                   <li class="divider"></li><br>
                                                   <span id="nopatents" class="blue-text">Add your patents</span>
                                                   @foreach ($portfolio as $edu)
                                                   @if ($edu->category=='patents' && $edu->nature=='patents')
                                                    <span class="chip col s12">{{$edu->data}}<i id="{{$edu->data}}"class="close material-icons">close</i></span>
                                                    <form id="{{$edu->id}}" action="{{route('deleteportfolio')}}" method="post">
                                                     {{ csrf_field() }}
                                                     <input type="hidden" name="id" value="{{$edu->id}}">
                                                    </form>
                                                    <script type="text/javascript">
                                                      document.getElementById("nopatents").style.display="none";
                                                      var deletepatents=document.getElementById('{{$edu->data}}');
                                                      deletepatents.addEventListener("click",deletepatentsfunction)
                                                      function deletepatentsfunction() {
                                                      var form=document.getElementById('{{$edu->id}}');
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
                                                   <div id="addnewpatents">
                                                   </div>
                                                   <br>
                                                   <form id="addpatents-form" action="{{route('addpatents')}}" method="post">
                                                     {{csrf_field()}}
                                                     <div class="input-field col s12">
                                                       <input id="patents" type="text" name="patents">
                                                       <label for="patents">
                                                         Enter your patents
                                                       </label>
                                                       <button type="submit" class="btn btn-floating right"id="addpatentsbtn" name="button"><i type="submit"class="material-icons">send</i></button>
                                                     </div>
                                                   </form>
                                                   <script type="text/javascript">
                                                     var addpatentsbtn=document.getElementById('addpatentsbtn');
                                                     addpatentsbtn.addEventListener("click", function(event) {
                                                     addpatentsfunction();
                                                     event.preventDefault();
                                                     });

                                                     function addpatentsfunction() {
                                                     var form=document.getElementById('addpatents-form');
                                                     var action = form.getAttribute("action");
                                                     var form_data = new FormData(form);
                                                     var xhr = new XMLHttpRequest();
                                                     xhr.open('POST', action, true);
                                                     xhr.send(form_data);
                                                     xhr.onreadystatechange = function () {
                                                       if(xhr.readyState == 4 && xhr.status == 200) {
                                                          var result = xhr.responseText;
                                                          console.log('Result: ' + result);
                                                          var json = JSON.parse(result);
                                                          document.getElementById("nopatents").style.display="none";
                                                          document.getElementById("addnewpatents").innerHTML+='<span class="chip col s12">'+json+'</span>';
                                                          form.reset();
                                                       }
                                                     };
                                                   }
                                                   </script>
                                                   <div class="card-content">
                                                     &nbsp;
                                                   </div>
                                                 </div>
                                              </div>
                                          </div>
                                        </div>
                                        <div class="divider"></div><br>
                                        <div class="row" style="margin:10px;">
                                            <div class="col s12 m6 l6">
                                                <div class="card ">
                                                   <div class="card-content ">
                                                     <span class="card-title"><i class="material-icons">insert_drive_file</i>&nbsp;Research Papers</span>
                                                     <li class="divider"></li><br>
                                                     <span id="noresearchpapers" class="blue-text">Add your research papers</span>
                                                     @foreach ($portfolio as $edu)
                                                     @if ($edu->category=='researchpapers' && $edu->nature=='researchpapers')
                                                      <span class="chip col s12">{{$edu->data}}<i id="{{$edu->data}}"class="close material-icons">close</i></span>
                                                      <form id="{{$edu->id}}" action="{{route('deleteportfolio')}}" method="post">
                                                       {{ csrf_field() }}
                                                       <input type="hidden" name="id" value="{{$edu->id}}">
                                                      </form>
                                                      <script type="text/javascript">
                                                        document.getElementById("noresearchpapers").style.display="none";
                                                        var deleteresearchpapers=document.getElementById('{{$edu->data}}');
                                                        deleteresearchpapers.addEventListener("click",deleteresearchpapersfunction)
                                                        function deleteresearchpapersfunction() {
                                                        var form=document.getElementById('{{$edu->id}}');
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
                                                     <div id="addnewresearchpapers">
                                                     </div>
                                                     <br>
                                                     <form id="addresearchpapers-form" action="{{route('addresearchpapers')}}" method="post">
                                                       {{csrf_field()}}
                                                       <div class="input-field col s12">
                                                         <input id="researchpapers" type="text" name="researchpapers">
                                                         <label for="researchpapers">
                                                           Enter your research papers
                                                         </label>
                                                         <button type="submit" class="btn btn-floating right"id="addresearchpapersbtn" name="button"><i type="submit"class="material-icons">send</i></button>
                                                       </div>
                                                     </form>
                                                     <script type="text/javascript">
                                                       var addresearchpapersbtn=document.getElementById('addresearchpapersbtn');
                                                       addresearchpapersbtn.addEventListener("click", function(event) {
                                                       addresearchpapersfunction();
                                                       event.preventDefault();
                                                       });

                                                       function addresearchpapersfunction() {
                                                       var form=document.getElementById('addresearchpapers-form');
                                                       var action = form.getAttribute("action");
                                                       var form_data = new FormData(form);
                                                       var xhr = new XMLHttpRequest();
                                                       xhr.open('POST', action, true);
                                                       xhr.send(form_data);
                                                       xhr.onreadystatechange = function () {
                                                         if(xhr.readyState == 4 && xhr.status == 200) {
                                                            var result = xhr.responseText;
                                                            console.log('Result: ' + result);
                                                            var json = JSON.parse(result);
                                                            document.getElementById("noresearchpapers").style.display="none";
                                                            document.getElementById("addnewresearchpapers").innerHTML+='<span class="chip col s12">'+json+'</span>';
                                                            form.reset();
                                                         }
                                                       };
                                                     }
                                                     </script>
                                                     <div class="card-content">
                                                       &nbsp;
                                                     </div>
                                                   </div>
                                                </div>
                                            </div>
                                            <div class="col s12 m6 l6">
                                                <div class="card ">
                                                   <div class="card-content ">
                                                     <span class="card-title"><i class="material-icons">location_on</i>&nbsp;Places</span>
                                                     <li class="divider"></li><br>
                                                     <b>From :</b><br>
                                                     <span id="nofrom" class="blue-text">Add where you're from</span>
                                                     @foreach ($portfolio as $edu)
                                                     @if ($edu->category=='location' && $edu->nature=='from')
                                                      <span class="chip col s12">{{$edu->data}}<i id="{{$edu->data}}"class="close material-icons">close</i></span>
                                                      <form id="{{$edu->id}}" action="{{route('deleteportfolio')}}" method="post">
                                                       {{ csrf_field() }}
                                                       <input type="hidden" name="id" value="{{$edu->id}}">
                                                      </form>
                                                      <script type="text/javascript">
                                                        document.getElementById("nofrom").style.display="none";
                                                        var deletefrom=document.getElementById('{{$edu->data}}');
                                                        deletefrom.addEventListener("click",deletefromfunction)
                                                        function deletefromfunction() {
                                                        var form=document.getElementById('{{$edu->id}}');
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
                                                     <div id="addnewfrom">
                                                     </div>
                                                     <br>
                                                     <form id="addfrom-form" action="{{route('addfrom')}}" method="post">
                                                       {{csrf_field()}}
                                                       <div class="input-field col s12">
                                                         <input id="from" type="text" name="from">
                                                         <label for="from">
                                                           Enter where you're from
                                                         </label>
                                                         <button type="submit" class="btn btn-floating right"id="addfrombtn" name="button"><i type="submit"class="material-icons">send</i></button>
                                                       </div>
                                                     </form>
                                                     <script type="text/javascript">
                                                       var addfrombtn=document.getElementById('addfrombtn');
                                                       addfrombtn.addEventListener("click", function(event) {
                                                       addfromfunction();
                                                       event.preventDefault();
                                                       });

                                                       function addfromfunction() {
                                                       var form=document.getElementById('addfrom-form');
                                                       var action = form.getAttribute("action");
                                                       var form_data = new FormData(form);
                                                       var xhr = new XMLHttpRequest();
                                                       xhr.open('POST', action, true);
                                                       xhr.send(form_data);
                                                       xhr.onreadystatechange = function () {
                                                         if(xhr.readyState == 4 && xhr.status == 200) {
                                                            var result = xhr.responseText;
                                                            console.log('Result: ' + result);
                                                            var json = JSON.parse(result);
                                                            document.getElementById("nofrom").style.display="none";
                                                            document.getElementById("addnewfrom").innerHTML+='<span class="chip col s12">'+json+'</span>';
                                                            form.reset();
                                                         }
                                                       };
                                                     }
                                                     </script>
                                                     <br><br>
                                                     <b>living :</b><br>
                                                     <span id="noliving" class="blue-text">Add where you're living</span>
                                                     @foreach ($portfolio as $edu)
                                                     @if ($edu->category=='location' && $edu->nature=='living')
                                                      <span class="chip col s12">{{$edu->data}}<i id="{{$edu->data}}"class="close material-icons">close</i></span>
                                                      <form id="{{$edu->id}}" action="{{route('deleteportfolio')}}" method="post">
                                                       {{ csrf_field() }}
                                                       <input type="hidden" name="id" value="{{$edu->id}}">
                                                      </form>
                                                      <script type="text/javascript">
                                                        document.getElementById("noliving").style.display="none";
                                                        var deleteliving=document.getElementById('{{$edu->data}}');
                                                        deleteliving.addEventListener("click",deletelivingfunction)
                                                        function deletelivingfunction() {
                                                        var form=document.getElementById('{{$edu->id}}');
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
                                                     <div id="addnewliving">
                                                     </div>
                                                     <br>
                                                     <form id="addliving-form" action="{{route('addliving')}}" method="post">
                                                       {{csrf_field()}}
                                                       <div class="input-field col s12">
                                                         <input id="living" type="text" name="living">
                                                         <label for="living">
                                                           Enter where you're living
                                                         </label>
                                                         <button type="submit" class="btn btn-floating right"id="addlivingbtn" name="button"><i type="submit"class="material-icons">send</i></button>
                                                       </div>
                                                     </form>
                                                     <script type="text/javascript">
                                                       var addlivingbtn=document.getElementById('addlivingbtn');
                                                       addlivingbtn.addEventListener("click", function(event) {
                                                       addlivingfunction();
                                                       event.preventDefault();
                                                       });

                                                       function addlivingfunction() {
                                                       var form=document.getElementById('addliving-form');
                                                       var action = form.getAttribute("action");
                                                       var form_data = new FormData(form);
                                                       var xhr = new XMLHttpRequest();
                                                       xhr.open('POST', action, true);
                                                       xhr.send(form_data);
                                                       xhr.onreadystatechange = function () {
                                                         if(xhr.readyState == 4 && xhr.status == 200) {
                                                            var result = xhr.responseText;
                                                            console.log('Result: ' + result);
                                                            var json = JSON.parse(result);
                                                            document.getElementById("noliving").style.display="none";
                                                            document.getElementById("addnewliving").innerHTML+='<span class="chip col s12">'+json+'</span>';
                                                            form.reset();
                                                         }
                                                       };
                                                     }
                                                     </script>
                                                     <div class="card-content">
                                                       &nbsp;
                                                     </div>
                                                   </div>
                                                </div>
                                            </div>
                                          </div>
                                          <div class="divider"></div><br>
                                          <div class="row" style="margin:10px;">
                                              <div class="col s12 m6 l6">
                                                  <div class="card ">
                                                     <div class="card-content ">
                                                       <span class="card-title"><i class="material-icons">recent_actors</i>&nbsp;Interests</span>
                                                       <li class="divider"></li><br>
                                                       <span id="nointerests" class="blue-text">Add your interests</span>
                                                       @foreach ($portfolio as $edu)
                                                       @if ($edu->category=='interests' && $edu->nature=='interests')
                                                        <span class="chip col s12">{{$edu->data}}<i id="{{$edu->data}}"class="close material-icons">close</i></span>
                                                        <form id="{{$edu->id}}" action="{{route('deleteportfolio')}}" method="post">
                                                         {{ csrf_field() }}
                                                         <input type="hidden" name="id" value="{{$edu->id}}">
                                                        </form>
                                                        <script type="text/javascript">
                                                          document.getElementById("nointerests").style.display="none";
                                                          var deleteinterests=document.getElementById('{{$edu->data}}');
                                                          deleteinterests.addEventListener("click",deleteinterestsfunction)
                                                          function deleteinterestsrsityfunction() {
                                                          var form=document.getElementById('{{$edu->id}}');
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
                                                       <div id="addnewinterests">
                                                       </div>
                                                       <br>
                                                       <form id="addinterests-form" action="{{route('addinterests')}}" method="post">
                                                         {{csrf_field()}}
                                                         <div class="input-field col s12">
                                                           <input id="interests" type="text" name="interests">
                                                           <label for="interests">
                                                             Enter your interests
                                                           </label>
                                                           <button type="submit" class="btn btn-floating right"id="addinterestsbtn" name="button"><i type="submit"class="material-icons">send</i></button>
                                                         </div>
                                                       </form>
                                                       <script type="text/javascript">
                                                         var addinterestsbtn=document.getElementById('addinterestsbtn');
                                                         addinterestsbtn.addEventListener("click", function(event) {
                                                         addinterestsfunction();
                                                         event.preventDefault();
                                                         });

                                                         function addinterestsfunction() {
                                                         var form=document.getElementById('addinterests-form');
                                                         var action = form.getAttribute("action");
                                                         var form_data = new FormData(form);
                                                         var xhr = new XMLHttpRequest();
                                                         xhr.open('POST', action, true);
                                                         xhr.send(form_data);
                                                         xhr.onreadystatechange = function () {
                                                           if(xhr.readyState == 4 && xhr.status == 200) {
                                                              var result = xhr.responseText;
                                                              console.log('Result: ' + result);
                                                              var json = JSON.parse(result);
                                                              document.getElementById("nointerests").style.display="none";
                                                              document.getElementById("addnewinterests").innerHTML+='<span class="chip col s12">'+json+'</span>';
                                                              form.reset();
                                                           }
                                                         };
                                                       }
                                                       </script>
                                                       <div class="card-content">
                                                         &nbsp;
                                                       </div>
                                                     </div>
                                                  </div>
                                              </div>
                                              <div class="col s12 m6 l6">
                                                  <div class="card ">
                                                     <div class="card-content ">
                                                       <span class="card-title"><i class="material-icons">group</i>&nbsp;Social Links</span>
                                                       <li class="divider"></li><br>
                                                       <b>Facebook:</b><br>
                                                       <span id="nofacebook" class="blue-text">Add your facebook</span>
                                                       @foreach ($portfolio as $edu)
                                                       @if ($edu->category=='social' && $edu->nature=='facebook')
                                                        <span class="chip col s12"><a href="//{{$edu->data}}" class="blue-text"><u>{{$edu->data}}</u></a><i id="{{$edu->data}}"class="close material-icons">close</i></span>
                                                        <form id="{{$edu->id}}" action="{{route('deleteportfolio')}}" method="post">
                                                         {{ csrf_field() }}
                                                         <input type="hidden" name="id" value="{{$edu->id}}">
                                                        </form>
                                                        <script type="text/javascript">
                                                          document.getElementById("nofacebook").style.display="none";
                                                          var deletefacebook=document.getElementById('{{$edu->data}}');
                                                          deletefacebook.addEventListener("click",deletefacebookfunction)
                                                          function deletefacebookfunction() {
                                                          var form=document.getElementById('{{$edu->id}}');
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
                                                       <div id="addnewfacebook">
                                                       </div>
                                                       <br>
                                                       <form id="addfacebook-form" action="{{route('addfacebook')}}" method="post">
                                                         {{csrf_field()}}
                                                         <div class="input-field col s12">
                                                           <input id="facebook" type="text" name="facebook">
                                                           <label for="facebook">
                                                             Enter your facebook
                                                           </label>
                                                           <button type="submit" class="btn btn-floating right"id="addfacebookbtn" name="button"><i type="submit"class="material-icons">send</i></button>
                                                         </div>
                                                       </form>
                                                       <script type="text/javascript">
                                                         var addfacebookbtn=document.getElementById('addfacebookbtn');
                                                         addfacebookbtn.addEventListener("click", function(event) {
                                                         addfacebookfunction();
                                                         event.preventDefault();
                                                         });

                                                         function addfacebookfunction() {
                                                         var form=document.getElementById('addfacebook-form');
                                                         var action = form.getAttribute("action");
                                                         var form_data = new FormData(form);
                                                         var xhr = new XMLHttpRequest();
                                                         xhr.open('POST', action, true);
                                                         xhr.send(form_data);
                                                         xhr.onreadystatechange = function () {
                                                           if(xhr.readyState == 4 && xhr.status == 200) {
                                                              var result = xhr.responseText;
                                                              console.log('Result: ' + result);
                                                              var json = JSON.parse(result);
                                                              document.getElementById("nofacebook").style.display="none";
                                                              document.getElementById("addnewfacebook").innerHTML+='<span class="chip col s12"><a href="//'+json+'" class="blue-text"><u>'+json+'</u></a></span>';
                                                              form.reset();
                                                           }
                                                         };
                                                       }
                                                       </script>
                                                       <br><br>
                                                       <b>LinkedIn :</b><br>
                                                       <span id="nolinkedin" class="blue-text">Add your linkedin</span>
                                                       @foreach ($portfolio as $edu)
                                                       @if ($edu->category=='social' && $edu->nature=='linkedin')
                                                        <span class="chip col s12"><a href="//{{$edu->data}}" target="_blank" class="blue-text"><u>{{$edu->data}}</u></a><i id="{{$edu->data}}"class="close material-icons">close</i></span>
                                                        <form id="{{$edu->id}}" action="{{route('deleteportfolio')}}" method="post">
                                                         {{ csrf_field() }}
                                                         <input type="hidden" name="id" value="{{$edu->id}}">
                                                        </form>
                                                        <script type="text/javascript">
                                                          document.getElementById("nolinkedin").style.display="none";
                                                          var deletelinkedin=document.getElementById('{{$edu->data}}');
                                                          deletelinkedin.addEventListener("click",deletelinkedinfunction)
                                                          function deletelinkedinfunction() {
                                                          var form=document.getElementById('{{$edu->id}}');
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
                                                       <div id="addnewlinkedin">
                                                       </div>
                                                       <br>
                                                       <form id="addlinkedin-form" action="{{route('addlinkedin')}}" method="post">
                                                         {{csrf_field()}}
                                                         <div class="input-field col s12">
                                                           <input id="linkedin" type="text" name="linkedin">
                                                           <label for="linkedin">
                                                             Enter your linkedin
                                                           </label>
                                                           <button type="submit" class="btn btn-floating right"id="addlinkedinbtn" name="button"><i type="submit"class="material-icons">send</i></button>
                                                         </div>
                                                       </form>
                                                       <script type="text/javascript">
                                                         var addlinkedinbtn=document.getElementById('addlinkedinbtn');
                                                         addlinkedinbtn.addEventListener("click", function(event) {
                                                         addlinkedinfunction();
                                                         event.preventDefault();
                                                         });

                                                         function addlinkedinfunction() {
                                                         var form=document.getElementById('addlinkedin-form');
                                                         var action = form.getAttribute("action");
                                                         var form_data = new FormData(form);
                                                         var xhr = new XMLHttpRequest();
                                                         xhr.open('POST', action, true);
                                                         xhr.send(form_data);
                                                         xhr.onreadystatechange = function () {
                                                           if(xhr.readyState == 4 && xhr.status == 200) {
                                                              var result = xhr.responseText;
                                                              console.log('Result: ' + result);
                                                              var json = JSON.parse(result);
                                                              document.getElementById("nolinkedin").style.display="none";
                                                              document.getElementById("addnewlinkedin").innerHTML+='<span class="chip col s12"><a href="//'+json+'" class="blue-text"><u>'+json+'</u></a></span>';
                                                              form.reset();
                                                           }
                                                         };
                                                       }
                                                       </script>
                                                       <br><br>
                                                       <b>Twitter :</b><br>
                                                       <span id="notwitter" class="blue-text">Add your twitter</span>
                                                       @foreach ($portfolio as $edu)
                                                       @if ($edu->category=='social' && $edu->nature=='twitter')
                                                        <span class="chip col s12"><a href="//{{$edu->data}}" class="blue-text"><u>{{$edu->data}}</u></a><i id="{{$edu->data}}"class="close material-icons">close</i></span>
                                                        <form id="{{$edu->id}}" action="{{route('deleteportfolio')}}" method="post">
                                                         {{ csrf_field() }}
                                                         <input type="hidden" name="id" value="{{$edu->id}}">
                                                        </form>
                                                        <script type="text/javascript">
                                                          document.getElementById("notwitter").style.display="none";
                                                          var deletetwitter=document.getElementById('{{$edu->data}}');
                                                          deletetwitter.addEventListener("click",deletetwitterfunction)
                                                          function deletetwitterfunction() {
                                                          var form=document.getElementById('{{$edu->id}}');
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
                                                       <div id="addnewtwitter">
                                                       </div>
                                                       <br>
                                                       <form id="addtwitter-form" action="{{route('addtwitter')}}" method="post">
                                                         {{csrf_field()}}
                                                         <div class="input-field col s12">
                                                           <input id="twitter" type="text" name="twitter">
                                                           <label for="twitter">
                                                             Enter your twitter
                                                           </label>
                                                           <button type="submit" class="btn btn-floating right"id="addtwitterbtn" name="button"><i type="submit"class="material-icons">send</i></button>
                                                         </div>
                                                       </form>
                                                       <script type="text/javascript">
                                                         var addtwitterbtn=document.getElementById('addtwitterbtn');
                                                         addtwitterbtn.addEventListener("click", function(event) {
                                                         addtwitterfunction();
                                                         event.preventDefault();
                                                         });

                                                         function addtwitterfunction() {
                                                         var form=document.getElementById('addtwitter-form');
                                                         var action = form.getAttribute("action");
                                                         var form_data = new FormData(form);
                                                         var xhr = new XMLHttpRequest();
                                                         xhr.open('POST', action, true);
                                                         xhr.send(form_data);
                                                         xhr.onreadystatechange = function () {
                                                           if(xhr.readyState == 4 && xhr.status == 200) {
                                                              var result = xhr.responseText;
                                                              console.log('Result: ' + result);
                                                              var json = JSON.parse(result);
                                                              document.getElementById("notwitter").style.display="none";
                                                              document.getElementById("addnewtwitter").innerHTML+='<span class="chip col s12"><a href="//'+json+'" class="blue-text"><u>'+json+'</u></a></span>';
                                                              form.reset();
                                                           }
                                                         };
                                                       }
                                                       </script>
                                                       <br><br>
                                                       <b>Instagram :</b><br>
                                                       <span id="noinstagram" class="blue-text">Add your instagram</span>
                                                       @foreach ($portfolio as $edu)
                                                       @if ($edu->category=='social' && $edu->nature=='instagram')
                                                        <span class="chip col s12"><a href="//{{$edu->data}}" class="blue-text"><u>{{$edu->data}}</u></a><i id="{{$edu->data}}"class="close material-icons">close</i></span>
                                                        <form id="{{$edu->id}}" action="{{route('deleteportfolio')}}" method="post">
                                                         {{ csrf_field() }}
                                                         <input type="hidden" name="id" value="{{$edu->id}}">
                                                        </form>
                                                        <script type="text/javascript">
                                                          document.getElementById("noinstagram").style.display="none";
                                                          var deleteinstagram=document.getElementById('{{$edu->data}}');
                                                          deleteinstagram.addEventListener("click",deleteinstagramfunction)
                                                          function deleteinstagramfunction() {
                                                          var form=document.getElementById('{{$edu->id}}');
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
                                                       <div id="addnewinstagram">
                                                       </div>
                                                       <br>
                                                       <form id="addinstagram-form" action="{{route('addinstagram')}}" method="post">
                                                         {{csrf_field()}}
                                                         <div class="input-field col s12">
                                                           <input id="instagram" type="text" name="instagram">
                                                           <label for="instagram">
                                                             Enter your instagram
                                                           </label>
                                                           <button type="submit" class="btn btn-floating right"id="addinstagrambtn" name="button"><i type="submit"class="material-icons">send</i></button>
                                                         </div>
                                                       </form>
                                                       <script type="text/javascript">
                                                         var addinstagrambtn=document.getElementById('addinstagrambtn');
                                                         addinstagrambtn.addEventListener("click", function(event) {
                                                         addinstagramfunction();
                                                         event.preventDefault();
                                                         });

                                                         function addinstagramfunction() {
                                                         var form=document.getElementById('addinstagram-form');
                                                         var action = form.getAttribute("action");
                                                         var form_data = new FormData(form);
                                                         var xhr = new XMLHttpRequest();
                                                         xhr.open('POST', action, true);
                                                         xhr.send(form_data);
                                                         xhr.onreadystatechange = function () {
                                                           if(xhr.readyState == 4 && xhr.status == 200) {
                                                              var result = xhr.responseText;
                                                              console.log('Result: ' + result);
                                                              var json = JSON.parse(result);
                                                              document.getElementById("noinstagram").style.display="none";
                                                              document.getElementById("addnewinstagram").innerHTML+='<span class="chip col s12"><a href="//'+json+'" class="blue-text"><u>'+json+'</u></a></span>';
                                                              form.reset();
                                                           }
                                                         };
                                                       }
                                                       </script>
                                                       <div class="card-content">
                                                         &nbsp;
                                                       </div>
                                                     </div>
                                                  </div>
                                              </div>
                                            </div>
                              </div>

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

                            <br><span class="blue-text">Enter your skills below</span>
                           <div id="skillchip" style="border-bottom:2px solid #0d47a1;"class="chips chips-initial"></div>

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
                                <br><span class="blue-text">Enter your strengths below</span>
                              <div style="border-bottom:2px solid #0d47a1;" id="strengthchip"class="chips chips-initial">

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
