@extends('layouts.navbar')

@section('content')
  <script src="https://sdk.amazonaws.com/js/aws-sdk-2.1.24.min.js"></script>
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
  <div class="card">
      <div style="height:20px;"></div>
      @foreach ($learningboardtable as $learningboardtabledata)
        @if ($lbid==$learningboardtabledata->ID)
          @foreach ($users as $user)
            @if($user->id==$learningboardtabledata->User_ID)
              <span><h6><a>{{$learningboardtabledata->LB_Name}}</a>&nbsp by &nbsp<a>{{$user->fname}}</a>&nbsp<a>{{$user->lname}}</a></h6></span>
            @endif
          @endforeach

        @endif
      @endforeach



<div style="height:20px;"></div>
<div class="row">

<script>
var count=0;


</script>

             @foreach ($learningboardfilestable as $learningboardfilesdata)
               @if(($learningboardfilesdata->L_ID==$lbid)&&($learningboardfilesdata->CC_ID==$ccid)&&($learningboardfilesdata->SC_ID==$scid))
                 <script>
                 var countlikes=0;var countdislikes=0;var countshares=0;var countfollows=0;
                  @foreach ($likesanddislikes as $likesdislikes)
                     @if(($likesdislikes->type=="l") && ($likesdislikes->contectid==$learningboardfilesdata->L_ID))
                          countlikes=countlikes+1;

                     @elseif(($likesdislikes->type=="d") && ($likesdislikes->contectid==$learningboardfilesdata->L_ID))
                         countdislikes=countdislikes+1;

                      @elseif(($likesdislikes->type=="s") && ($likesdislikes->contectid==$learningboardfilesdata->L_ID))
                          countshares=countshares+1;

                      @elseif(($likesdislikes->type=="f") && ($likesdislikes->contectid==$learningboardfilesdata->L_ID))
                          countfollows=countfollows+1;
                     @endif
                  @endforeach
                 </script>
                 <script>
                 var fileName = 'https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$learningboardfilesdata->filename}}';
                 var extension = fileName.split('.').pop();
                 if(extension=="mp4"){
                   count=count+1;
                   document.write('<div class="col l6">');
                     document.write('<div class="card" style="height:550px;">');
                        document.write('<div class="card-title">');
                         document.write('<center><b>Video</b></center>');
                         document.write('</div>');
                         document.write('<div class="row');
                         console.log(count);
                               document.write('<span class="">'+count+'.'+'{{$learningboardfilesdata->title}}'+'</span>'+'<div style="width:5px;"></div>');



                               document.write('</div>');
                               document.write('<div class="row">');
                               document.write('<div class="col s12">');
                               document.write('<video class="responsive-video" width="550" height="500" controls><source src="https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$learningboardfilesdata->filename}}" type="video/mp4"></video>');
                               document.write('</div>');
                               document.write('</div>');
                               document.write('<div class="row">');
                               document.write('<div class="col s12">');
                               @foreach ($users as $user)
                                 @if($user->id==$learningboardfilesdata->user_ID)
                                      document.write('<p>Posted-on:'+" "+"{{$learningboardfilesdata->date}}"+'&nbsp by &nbsp'+"{{$user->fname}}"+" "+"{{$user->lname}}"+'</p>');
                                  @endif
                               @endforeach
                               document.write('<p>'+"{{$learningboardfilesdata->discription}}"+'</p>');
                               document.write('</div>');
                               document.write('</div>');
                               document.write('</div>');
                               document.write('</div>');

                   }

                   </script>
                   <script>
                   var fileName = 'https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$learningboardfilesdata->filename}}';
                   var extension = fileName.split('.').pop();
                   if(extension=="pdf"){
                     count=count+1;
                     document.write('<div class="col l6">');
                       document.write('<div class="card" style="height:550px;">');
                          document.write('<div class="card-title">');
                           document.write('<center><b>Document</b></center>');
                           document.write('</div>');
                           document.write('<div class="row');
                           console.log(count);
                          //
                              document.write('<span class="">'+count+'.'+'{{$learningboardfilesdata->title}}'+'</span>'+'<div style="width:5px;"></div>');


                               document.write('</div>');

                               document.write('<div class="row">');
                                 document.write('<div class="col s12">');
                           document.write('<iframe width="525" height="320" src="https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$learningboardfilesdata->filename}}"></iframe>');
                           document.write('</div>');
                             document.write('</div>');
                             document.write('<div class="row">');
                               document.write('<div class="col s12">');
                               @foreach ($users as $user)
                                 @if($user->id==$learningboardfilesdata->user_ID)
                                      document.write('<p>Posted-on:'+" "+"{{$learningboardfilesdata->date}}"+'&nbsp by &nbsp'+"{{$user->fname}}"+" "+"{{$user->lname}}"+'</p>');
                                  @endif
                               @endforeach
                                 document.write('<p>'+"{{$learningboardfilesdata->discription}}"+'</p>');
                               document.write('</div>');
                             document.write('</div>');

                       document.write('</div>');
                    document.write('</div>');

                     }



                 </script>



                 <script>
                 var fileName = 'https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$learningboardfilesdata->filename}}';
                 var extension = fileName.split('.').pop();
                 if(extension=="jpg" || extension=="png" || extension=="jpeg"){
                   count=count+1;
                   document.write('<div class="col l6">');
                     document.write('<div class="card" style="height:550px;">');
                        document.write('<div class="card-title">');
                         document.write('<center><b>Document</b></center>');
                         document.write('</div>');
                         document.write('<div class="row');
                         console.log(count);
                        //
                            document.write('<span class="">'+count+'.'+'{{$learningboardfilesdata->title}}'+'</span>'+'<div style="width:5px;"></div>');

                               document.write('<a class="center col s3" style="font-size: 30px"><i class="material-icons" id="likebtn{{$learningboardfilesdata->L_ID}}">thumb_up</i>');
                               document.write('<span class="count" id="likes{{$learningboardfilesdata->L_ID}}" style="color:#9e9e9e;font-size:15px;">'+countlikes+'</span></a>');


                               // document.write('<a class="center col s3" style="font-size: 30px"><i class="material-icons" id="dislikebtn{{$learningboardfilesdata->L_ID}}">thumb_down</i>');
                               // document.write('<span class="count" id="dislikes{{$learningboardfilesdata->L_ID}}" style="color:#9e9e9e;font-size:15px;">'+countdislikes+'</span></a>');
                               //
                               // document.write('<a class="center col s3" style="font-size: 30px"><i class="material-icons" id="dislikebtn{{$learningboardfilesdata->L_ID}}">share</i>');
                               // document.write('<span class="count" id="share{{$learningboardfilesdata->L_ID}}" style="color:#9e9e9e;font-size:15px;">'+countshares+'</span></a>');
                               //
                               // document.write('<a class="center col s3" style="font-size: 30px"><i class="material-icons" id="dislikebtn{{$learningboardfilesdata->L_ID}}">rss_feed</i>');
                               // document.write('<span class="count" id="follows{{$learningboardfilesdata->L_ID}}" style="color:#9e9e9e;font-size:15px;">'+countfollows+'</span></a>');

                             document.write('</div>');

                             document.write('<div class="row">');
                             document.write('<div class="col s12">');
                             document.write('<img width="525" height="320" src="https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$learningboardfilesdata->filename}}"/>');
                             document.write('</div>');
                             document.write('</div>');
                             document.write('<div class="row">');
                             document.write('<div class="col s12">');
                             @foreach ($users as $user)
                               @if($user->id==$learningboardfilesdata->user_ID)
                                    document.write('<p>Posted-on:'+" "+"{{$learningboardfilesdata->date}}"+'&nbsp by &nbsp'+"{{$user->fname}}"+" "+"{{$user->lname}}"+'</p>');
                                @endif
                             @endforeach
                               document.write('<p>'+"{{$learningboardfilesdata->discription}}"+'</p>');
                             document.write('</div>');
                           document.write('</div>');

                     document.write('</div>');
                  document.write('</div>');

                   }



               </script>

               <form id="likeform{{$learningboardfilesdata->L_ID}}" action="{{route('subconlikes')}}" method="post">
                 {{ csrf_field() }}
                 <input type="hidden" name="subconid" value="{{$learningboardfilesdata->L_ID}}">
                 <input type="hidden" name="type" value="l">
               </form>
               <script type="text/javascript">
                 var likebtn=document.getElementById("likebtn{{$learningboardfilesdata->L_ID}}");
                 likebtn.addEventListener("click",likedfunction)
                 function likedfunction() {
                 var form=document.getElementById("likeform{{$learningboardfilesdata->L_ID}}");
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
                      var newlike=document.getElementById("likes{{$learningboardfilesdata->L_ID}}").innerHTML;
                      // var newdislike=document.getElementById("dislikes").innerHTML;
                      document.getElementById("likes{{$learningboardfilesdata->L_ID}}").innerHTML=parseInt(newlike,10) + 1;
                      document.getElementById("likebtn{{$learningboardfilesdata->L_ID}}").disabled=true;
                      // document.getElementById("dislikebtn").disabled=false;
                      // document.getElementById("dislikes").innerHTML=parseInt(newdislike,10) - 1;


                   }
                 };
               }
               </script>
               @endif
             @endforeach


        </div>
  </div>
</div>
@endsection
