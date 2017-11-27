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
                     @if(($likesdislikes->type=="l") && ($likesdislikes->contectid==$learningboardfilesdata->ID))
                          countlikes=countlikes+1;

                     @elseif(($likesdislikes->type=="d") && ($likesdislikes->contectid==$learningboardfilesdata->ID))
                         countdislikes=countdislikes+1;

                      @elseif(($likesdislikes->type=="s") && ($likesdislikes->contectid==$learningboardfilesdata->ID))
                          countshares=countshares+1;

                      @elseif(($likesdislikes->type=="f") && ($likesdislikes->contectid==$learningboardfilesdata->ID))
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

                               document.write('<a class="center col s3" style="font-size: 30px"><i style="cursor:pointer;" class="material-icons" id="likebtn{{$learningboardfilesdata->ID}}">thumb_up</i>');
                               document.write('<span class="count" id="likes{{$learningboardfilesdata->ID}}" style="color:#9e9e9e;font-size:15px;">'+countlikes+'</span></a>');

                               document.write('<a class="center col s3" style="font-size: 30px"><i style="cursor:pointer;" class="material-icons" id="dislikebtn{{$learningboardfilesdata->ID}}">thumb_down</i>');
                               document.write('<span class="count" id="dislikes{{$learningboardfilesdata->ID}}" style="color:#9e9e9e;font-size:15px;">'+countdislikes+'</span></a>');

                               document.write('<a class="center col s3" style="font-size: 30px"><i class="material-icons" id="dislikebtn{{$learningboardfilesdata->L_ID}}">share</i>');
                               document.write('<span class="count" id="share{{$learningboardfilesdata->L_ID}}" style="color:#9e9e9e;font-size:15px;">'+countshares+'</span></a>');



                               document.write('<a class="center col s3" style="font-size: 30px"><i class="material-icons" id="dislikebtn{{$learningboardfilesdata->L_ID}}">rss_feed</i>');
                               document.write('<span class="count" id="follows{{$learningboardfilesdata->L_ID}}" style="color:#9e9e9e;font-size:15px;">'+countfollows+'</span></a>');

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

                              document.write('<a class="center col s3" style="font-size: 30px"><i style="cursor:pointer;" class="material-icons" id="likebtn{{$learningboardfilesdata->ID}}">thumb_up</i>');
                              document.write('<span class="count" id="likes{{$learningboardfilesdata->ID}}" style="color:#9e9e9e;font-size:15px;">'+countlikes+'</span></a>');

                              document.write('<a class="center col s3" style="font-size: 30px"><i style="cursor:pointer;" class="material-icons" id="dislikebtn{{$learningboardfilesdata->ID}}">thumb_down</i>');
                              document.write('<span class="count" id="dislikes{{$learningboardfilesdata->ID}}" style="color:#9e9e9e;font-size:15px;">'+countdislikes+'</span></a>');

                              document.write('<a class="center col s3" style="font-size: 30px"><i class="material-icons" id="dislikebtn{{$learningboardfilesdata->L_ID}}">share</i>');
                              document.write('<span class="count" id="share{{$learningboardfilesdata->L_ID}}" style="color:#9e9e9e;font-size:15px;">'+countshares+'</span></a>');

                              document.write('<a class="center col s3" style="font-size: 30px"><i class="material-icons" id="dislikebtn{{$learningboardfilesdata->L_ID}}">rss_feed</i>');
                              document.write('<span class="count" id="follows{{$learningboardfilesdata->L_ID}}" style="color:#9e9e9e;font-size:15px;">'+countfollows+'</span></a>');

                               document.write('</div>');

                               document.write('<div class="row">');
                                 document.write('<div class="col s12">');
                           document.write('<iframe width="525" height="300" src="https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$learningboardfilesdata->filename}}"></iframe>');
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

                               document.write('<a class="center col s3" style="font-size: 30px"><i style="cursor:pointer;" class="material-icons" id="likebtn{{$learningboardfilesdata->ID}}">thumb_up</i>');
                               document.write('<span class="count" id="likes{{$learningboardfilesdata->ID}}" style="color:#9e9e9e;font-size:15px;">'+countlikes+'</span></a>');


                               document.write('<a class="center col s3" style="font-size: 30px"><i style="cursor:pointer;" class="material-icons" id="dislikebtn{{$learningboardfilesdata->ID}}">thumb_down</i>');
                               document.write('<span class="count" id="dislikes{{$learningboardfilesdata->ID}}" style="color:#9e9e9e;font-size:15px;">'+countdislikes+'</span></a>');

                               document.write('<a class="center col s3 modal-trigger" href="#modal1{{$learningboardfilesdata->ID}}" style="font-size: 30px"><i class="material-icons">share</i>');
                               document.write('<span class="count" id="share{{$learningboardfilesdata->ID}}" style="color:#9e9e9e;font-size:15px;">'+countshares+'</span></a>');






                             document.write('</div>');

                             document.write('<div class="row">');
                             document.write('<div class="col s12">');
                             document.write('<img height="300" width="525" src="https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$learningboardfilesdata->filename}}"/>');
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
                    $(document).ready(function(){
                      // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
                      $('.modal').modal();
                    });
               </script>

               <!-- Modal Structure -->
  <div id="modal1{{$learningboardfilesdata->ID}}" class="modal">

      <div class="row">
        <div class="col l6 m6 s12">

          <form action="{{route('sharealignsearch')}}" method="post" id="sharealignform">
            {{ csrf_field() }}
            <input type="hidden" name="sharegoalid" value="{{$goals->goalid}}">
            <div class="input-field grey lighten-4 grey-text text-darken-3">
              <input id="shareemail" name="shareemail" type="search" autocomplete="off" class="grey lighten-4" {{($email!=Auth::User()->email&&$privacys->canshareprivacy=="public")?"disabled":""}}>
              <label for="shareemail">email</label>
            </div>
          </form>
          <form action="{{ route('sharealignpost') }}" method="post" id="sharefinalalign">
            {{ csrf_field() }}
            <input type="hidden" name="sharegoalid" value="{{$goals->goalid}}">
            <input type="hidden" name="shareemail" value="" id="sharealignthisemail">
            <span class="btn btn-floating right" id="sharealignbtn">
              <i class="material-icons">share</i>
            </span>
          </form>
          <br> <br>
          <ul class="collection" id="sharealignpeopleresult" style="max-height:500px;">
          </ul>
          <script type="text/javascript">
          document.addEventListener('DOMContentLoaded', function() {
            var sharealignbtn=document.getElementById('sharealignbtn');
            var sharealignpeopleresult = document.getElementById("sharealignpeopleresult");
            var sharealignthisemail = document.getElementById("sharealignthisemail");
            var sharealignform=document.getElementById("sharefinalalign");
            var sharealignformaction=sharealignform.getAttribute("action");
            var shareform = document.getElementById("sharealignform");
            var action = shareform.getAttribute("action");
            var searchemail = document.getElementById("shareemail");
            var sharealignedpeoplelist = document.getElementById('sharealignedpeoplelist');

            function shareshowAlignedpeople(json) {
                var shareli_list = ShareAlignedpeopleToList(json);
                sharealignpeopleresult.innerHTML = shareli_list;
              }

              function ShareAlignedpeopleToList(shareitems) {
                var shareoutput = '';

                for(i=0; i < shareitems.length; i++) {
                  if((shareitems[i].id)!={{Auth::id()}}){
                  shareoutput += '<a style="cursor:pointer;" onclick="console.log('+"'"+shareitems[i].lname+"'"+'); document.getElementById('+"'"+'shareemail'+"'"+').value='+"'"+shareitems[i].email+"'"+';" class="collection-item">';
                  shareoutput+='<span class="title">';
                  shareoutput += shareitems[i].fname +' '+ shareitems[i].lname;
                  shareoutput += '</span>';
                  shareoutput += '<small class="truncate">'+ shareitems[i].email+'</small>';
                  shareoutput += '</a>';
               // output += '<li onclick="console.log('+"'sadsas'"+')">jsndsj</li>';
                }
                }
                return shareoutput;
              }

            function sharealignthis() {

             sharealignthisemail.value=shareemail.value;

             var shareform_data=new FormData(sharealignform);

             var xhr = new XMLHttpRequest();

              xhr.open('POST',sharealignformaction, true);

              xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

              xhr.send(shareform_data);

              xhr.onreadystatechange = function () {
                if(xhr.readyState == 4 && xhr.status == 200) {
                  var shareresult = xhr.responseText;
                  var sharejson = JSON.parse(shareresult);
                  console.log(sharejson);
                  var shareoutput="";
                  for (var i = 0; i < sharejson.length; i++) {
                    shareoutput += '<li class="collection-item avatar">';
                    shareoutput += '<img src="uploads/avatars/'+sharejson[i].avatar+'" alt="" class="circle">';
                    shareoutput += '<span class="title">'+sharejson[i].fname+" "+sharejson[i].lname+'</span>';
                    shareoutput += '<p class="truncate">'+sharejson[i].email+'</p>';
                    shareoutput += '<a href="#!" class="secondary-content"><i class="material-icons">close</i></a>';
                    shareoutput += '</li>';
                  }
                  sharealignedpeoplelist.innerHTML += shareoutput;
                }
              };
            }

            function getShareAlignedpeople() {
              var q = shareemail.value;
              var form_data=new FormData(shareform);
              var xhr = new XMLHttpRequest();
              xhr.open('POST',action, true);
              xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
              xhr.send(form_data);
              xhr.onreadystatechange = function () {
                if(xhr.readyState == 4 && xhr.status == 200) {
                  var result = xhr.responseText;
                  var json = JSON.parse(result);
                  shareshowAlignedpeople(json);
                  // var json = JSON.parse(result);
                  // showSuggestions(json);
                }
              };
            }
            // use "input" (every key), not "change" (must lose focus)
            shareemail.addEventListener("input", getShareAlignedpeople);
            sharealignbtn.addEventListener("click", sharealignthis);


          });
          </script>

        </div>
        <div class="col l6 m6 s12">
          <b><p>Shared people</p></b>
          <ul class="collection" id="sharealignedpeoplelist">
            @foreach ($shared as $shares)
              <li class="collection-item avatar">
                <img src="{{asset('uploads/avatars/'.$shares->avatar)}}" alt="" class="circle">
                     <span class="title"><a href="{{url('/search/'.$shares->id)}}">{{$shares->fname}}&nbsp;{{$shares->lname}}</a></span>
                     <p class="truncate">{{ $shares->email }}</p>
                     <a href="#!" class="secondary-content"><i class="material-icons">close</i></a>
              </li>
            @endforeach
          </ul>
        </div>
      </div>

  </div>

               <form id="likeform{{$learningboardfilesdata->ID}}" action="{{route('subconlikes')}}" method="post">
                 {{ csrf_field() }}
                 <input type="hidden" name="subconid" value="{{$learningboardfilesdata->ID}}">
                 <input type="hidden" name="type" value="l">
               </form>



               <script type="text/javascript">
                 var likebtn=document.getElementById("likebtn{{$learningboardfilesdata->ID}}");
                 likebtn.addEventListener("click",likedfunction)
                 function likedfunction() {
                 var form=document.getElementById("likeform{{$learningboardfilesdata->ID}}");
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
                      var newlike=document.getElementById("likes{{$learningboardfilesdata->ID}}").innerHTML;
                      // var newdislike=document.getElementById("dislikes").innerHTML;
                      document.getElementById("likes{{$learningboardfilesdata->ID}}").innerHTML=parseInt(newlike,10) + 1;
                      document.getElementById("likebtn{{$learningboardfilesdata->ID}}").disabled=true;
                      // document.getElementById("dislikebtn").disabled=false;
                      // document.getElementById("dislikes").innerHTML=parseInt(newdislike,10) - 1;


                   }
                 };
               }
               </script>

               <form id="dislikeform{{$learningboardfilesdata->ID}}" action="{{route('subconlikes')}}" method="post">
                 {{ csrf_field() }}
                 <input type="hidden" name="subconid" value="{{$learningboardfilesdata->ID}}">
                 <input type="hidden" name="type" value="d">
               </form>

               <script type="text/javascript">
                 var dislikebtn=document.getElementById("dislikebtn{{$learningboardfilesdata->ID}}");
                 dislikebtn.addEventListener("click",dislikedfunction)
                 function dislikedfunction() {
                 var form=document.getElementById("dislikeform{{$learningboardfilesdata->ID}}");
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
                      var newdislike=document.getElementById("dislikes{{$learningboardfilesdata->ID}}").innerHTML;
                      // var newdislike=document.getElementById("dislikes").innerHTML;
                      document.getElementById("dislikes{{$learningboardfilesdata->ID}}").innerHTML=parseInt(newdislike,10) + 1;
                      document.getElementById("dislikebtn{{$learningboardfilesdata->ID}}").disabled=true;
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
