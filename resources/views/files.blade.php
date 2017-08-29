

 @extends('layouts.navbar')

@section('content')
<script src="https://sdk.amazonaws.com/js/aws-sdk-2.1.24.min.js"></script>

<!--<style>
  .cardsub{
    width:100px;
     height:70px;
  }
</style>-->

<div class="container">
  <div class="row hide-on-small-only">
    <br><br>
    <div class="col l2 m2  center-align">
      <span class=" red-text "><b>New Goal</b></span><br>
      <a href="#addgoal" class="btn btn-floating red btn-large "><i class="material-icons">add</i></a>
    </div>
    <div class="col l2 m2  center-align">
      <span class=" blue-text text-lighten-1"><b>Send Invite</b></span><br>
      <a href="#" class="btn btn-floating blue lighten-1 btn-large "><i class="material-icons">people</i></a>
    </div>
    <div class="col l2 m2  center-align">
      <span class=" grey-text text-darken-3"><b>Dashboard</b></span><br>
      <a href="{{url('/dashboard')}}" class="btn btn-floating grey darken-3 btn-large "><i class="material-icons">dashboard</i></a>
    </div>
    <div class="col l2 m2 center-align">
      <span class=" blue-text text-darken-4"><b>My Documents</b></span><br>
      <a href="{{url('/files')}}" class="btn btn-floating btn-large "><i class="material-icons">attach_file</i></a>
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
  <div class="row">
    <div class="card" style="height:600px; overflow-y:scroll;">

      <div class="card-content">
        <div class="btn-floating right" style="display:none;" id="gridviewbtn">
          <i class="material-icons">view_module</i>
        </div>

        <div class="btn-floating right" id="listviewbtn">
          <i class="material-icons">list</i>
        </div>

        <script type="text/javascript">

        $(document).ready(function(){
            $("#listviewbtn").click(function() {
              $("#listviewbtn").hide();
              $("#listviewrow").show();
              $("#gridviewrow").hide();
              $("#gridviewbtn").show();
            });
            $("#gridviewbtn").click(function() {
              $("#gridviewrow").show();
              $("#listviewbtn").show();
              $("#gridviewbtn").hide();
              $("#listviewrow").hide();
            });
          });

        </script>

      <div class="row">
        <div class="col s12 m12 l4">
          <p class="card-title activator grey-text text-darken-4">Upload Your Files</p>
        </div>
      </div>

      <div class="row">
        <div class="col s12 m12 l8">
          <div class="blue-text text-darken-4" id="filesizebar" style="font-weight:bold;" disabled></div>
        </div>
      </div>

      <div class="row">
        <div id="progressdiv" style="display:none;">
          <div class="col s11 m11 l11">
            <div class="progress">
              <div class="determinate" id="percentage"></div>
            </div>
          </div>


          <div class="col s1 m1 l1">
            <b><span class="right" id="percentagedis"></span></b>
          </div>
        </div>
      </div>
    </div>

<div class="row">
<h5>&nbsp My Folders</h5>
<div class="col s4 m6 l2">
  <a class="right btn btn-floating" id="countfilesdisplay"></a>
  <div class="card" id="allfilesfolder" style="height:20%;">
    <div class="card-image waves-effect waves-block waves-light" style="height:150px;">
      <img src="img/icons8-Extensions Folder-100.png">
      <center><span class="blue-text text-darken-4" id="filesizeallfilesdisplay"></span></center>
    </div>
    <center><div class="card-content" style="height:50px;"><b>All Files</b></div></center>
  </div>
  <script>
  allfilesfolder.addEventListener("click",function(event){
    event.preventDefault();
    document.getElementById("documents").style.display="none";
    document.getElementById("pictures").style.display="none";
    document.getElementById("videos").style.display="none";
    document.getElementById("rars&zips").style.display="none";
    document.getElementById("pictures").style.display="none";
    document.getElementById("gridviewrow").style.display="inline";
    document.getElementById("listviewrow").style.display="none";
  });
  </script>
</div>

<div class="col s4 m6 l2">
  <a class="right btn btn-floating" id="countmicdisplay"></a>
  <div class="card" id="musicfolder" style="height:200px;">
    <div class="card-image waves-effect waves-block waves-light" style="height:150px;">
      <img src="img/icons8-Music Folder-100 (1).png">
      <center><span class="blue-text text-darken-4" id="filesizemicdisplay"></span></center>
    </div>
    <center><div class="card-content" style="height:50px;"><b>Music</b></div></center>
  </div>
  <script>
  musicfolder.addEventListener("click",function(event){
    event.preventDefault();
    document.getElementById("documents").style.display="none";
    document.getElementById("pictures").style.display="none";
    document.getElementById("videos").style.display="none";
    document.getElementById("rars&zips").style.display="none";
    document.getElementById("musics").style.display="inline";
    document.getElementById("gridviewrow").style.display="none";
    document.getElementById("listviewrow").style.display="none";

    Materialize.showStaggeredList('#musics');
  });
  </script>
</div>

<div class="col s4 m6 l2">
<a class="right btn btn-floating" id="countpicdisplay"></a>
  <div class="card" id="picturesfolder" style="height:200px;">

    <div class="card-image waves-effect waves-block waves-light" style="height:150px;">
      <img src="img/icons8-Pictures Folder-100 (2).png">
      <center><span class="blue-text text-darken-4" id="filesizepicdisplay"></span></center>
    </div>
    <center><div class="card-content" style="height:50px;"><b>Pictures</b></div></center>
  </div>
  <script>
  picturesfolder.addEventListener("click",function(event){
    event.preventDefault();
    document.getElementById("musics").style.display="none";
    document.getElementById("documents").style.display="none";
    document.getElementById("videos").style.display="none";
    document.getElementById("rars&zips").style.display="none";
    document.getElementById("pictures").style.display="inline";
    document.getElementById("gridviewrow").style.display="none";
    document.getElementById("listviewrow").style.display="none";

    Materialize.showStaggeredList('#pictures');
  });
  </script>
</div>
<div class="col s4 m6 l2">
  <a class="right btn btn-floating" id="countviddisplay"></a>
  <div class="card" id="videosfolder" style="height:200px;;">
    <div class="card-image waves-effect waves-block waves-light" style="height:150px;">
      <img src="img/icons8-Movies Folder-100.png">
      <center><span class="blue-text text-darken-4" id="filesizeviddisplay"></span></center>
    </div>
    <center><div class="card-content" style="height:50px;"><b>Videos</b></div></center>
  </div>
  <script>
  videosfolder.addEventListener("click",function(event){
    event.preventDefault();
    document.getElementById("musics").style.display="none";
    document.getElementById("pictures").style.display="none";
    document.getElementById("documents").style.display="none";
    document.getElementById("rars&zips").style.display="none";
    document.getElementById("videos").style.display="inline";
    document.getElementById("gridviewrow").style.display="none";
    document.getElementById("listviewrow").style.display="none";

    Materialize.showStaggeredList('#videos');
  });
  </script>
</div>
<div class="col s4 m6 l2">
  <a class="right btn btn-floating" id="countdocdisplay"></a>
  <div class="card" id="documentsfolder" style="height:200px;;">
    <div class="card-image waves-effect waves-block waves-light" style="height:150px;">
      <img src="img/icons8-Documents Folder-100.png">
      <center><span class="blue-text text-darken-4" id="filesizedocdisplay"></span></center>
    </div>
    <center><div class="card-content" style="height:50px;"><b>Documents</b></div></center>
  </div>
  <script>
  documentsfolder.addEventListener("click",function(event){
    event.preventDefault();
    document.getElementById("musics").style.display="none";
    document.getElementById("pictures").style.display="none";
    document.getElementById("videos").style.display="none";
    document.getElementById("rars&zips").style.display="none";
    document.getElementById("documents").style.display="inline";
    document.getElementById("gridviewrow").style.display="none";
    document.getElementById("listviewrow").style.display="none";

    Materialize.showStaggeredList('#documents');
  });
  </script>
</div>
<div class="col s4 m6 l2">
  <a class="right btn btn-floating" id="countzipdisplay"></a>
  <div class="card" id="zipfolder" style="height:200px;;">
    <div class="card-image waves-effect waves-block waves-light" style="height:150px;">
      <img src="img/icons8-Archive Folder-100.png">
      <center><span class="blue-text text-darken-4" id="filesizezipdisplay"></span></center>
    </div>
    <center><div class="card-content" style="height:50px;"><b>Zip & Rar</b></div></center>
  </div>
  <script>
  zipfolder.addEventListener("click",function(event){
    event.preventDefault();
    document.getElementById("musics").style.display="none";
    document.getElementById("pictures").style.display="none";
    document.getElementById("videos").style.display="none";
    document.getElementById("documents").style.display="none";
    document.getElementById("rars&zips").style.display="inline";
    document.getElementById("gridviewrow").style.display="none";
    document.getElementById("listviewrow").style.display="none";

    Materialize.showStaggeredList('#rars&zips');

  });
  </script>
</div>

</div>








    <div id="musics" style="display:none;">
      <div class="row">
        <h5>&nbsp Uploaded Musics</h5>
    @foreach ($files as $file)
     <script>
     var fileName = 'https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}';
     var extension = fileName.split('.').pop();
     if(extension=="mp3" || extension=="wmv" || extension=="amw"){

       document.write('<div class="col s12 m6 l2">');
       document.write('<div class="card" style="height:180px;">');
       document.write('<div class="card-image waves-effect waves-block waves-light" style="height:100px;">');
       document.write('<img src="https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}" />');
       document.write('</div>');
       document.write('<a href="https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}">');
       document.write('<p style="font-size=5px;color:black;" class="truncate">Doc Name: {{$file->filename}}</p></a>');
       document.write('<p class="truncate">New Name: {{$file->fakename}}</p>');
       document.write('</div>');
       document.write('</div>');

       }
     </script>
     @endforeach

      </div>
    </div>


    <div id="pictures" style="display:none;">
      <div class="row">
        <h5>&nbsp Uploaded Pictures</h5>
    @foreach ($files as $file)
     <script>
     var fileName = 'https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}';
     var extension = fileName.split('.').pop();
     if(extension=="jpg" || extension=="png" || extension=="jpeg"){

       document.write('<div class="col s12 m6 l2">');
       document.write('<div class="card" style="height:180px;">');
       document.write('<div class="card-image waves-effect waves-block waves-light" style="height:100px;">');
       document.write('<img src="https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}" />');
       document.write('</div>');
       document.write('<a href="https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}">');
       document.write('<p style="font-size=5px;color:black;" class="truncate">Doc Name: {{$file->filename}}</p></a>');
       document.write('<p class="truncate">New Name: {{$file->fakename}}</p>');
       document.write('</div>');
       document.write('</div>');

       }
     </script>
     @endforeach

      </div>
    </div>

    <div id="videos" style="display:none;">
      <div class="row">
        <h5>&nbsp Uploaded Videos</h5>
    @foreach ($files as $file)
    <script>
    var fileName = 'https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}';
    var extension = fileName.split('.').pop();
    if(extension=="mp4" || extension=="kmv"){

      document.write('<div class="col s12 m6 l2">');
      document.write('<div class="card" style="height:180px;">');
      document.write('<div class="card-image waves-effect waves-block waves-light" style="height:100px;">');
      document.write('<img src="img/icons8-YouTube-50.png" />');
      document.write('</div>');
      document.write('<a href="https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}">');
      document.write('<p style="font-size=5px;color:black;" class="truncate">Doc Name: {{$file->filename}}</p></a>');
      document.write('<p class="truncate">New Name: {{$file->fakename}}</p>');
      document.write('</div>');
      document.write('</div>');

      }
    </script>
     @endforeach

      </div>
    </div>


    <div id="documents" style="display:none;">
      <div class="row">
        <h5>&nbsp Uploaded Documents</h5>
    @foreach ($files as $file)
     <script>


     var fileName = 'https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}';
     var extension = fileName.split('.').pop();
     if(extension=="pdf"){

       document.write('<div class="col s12 m6 l2">');
       document.write('<div class="card" style="height:180px;">');
       document.write('<div class="card-image waves-effect waves-block waves-light" style="height:100px;">');
       document.write('<iframe src="https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}" style="width:600px; height:100px;" frameborder="0"></iframe>');
       document.write('</div>');
       document.write('<a href="https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}">');
       document.write('<p style="font-size=5px;color:black;" class="truncate">Doc Name: {{$file->filename}}</p></a>');
       document.write('<p class="truncate">New Name: {{$file->fakename}}</p>');
       document.write('</div>');
       document.write('</div>');

       }

       else if(extension=="txt" || extension=="docx"){
         document.write('<div class="col s12 m6 l2">');
         document.write('<div class="card" style="height:180px;">');
         document.write('<div class="card-image waves-effect waves-block waves-light" style="height:100px;">');
         document.write('<img src="img/icons8-DOC-50.png" height="100px">');
         document.write('</div>');
         document.write('<a href="https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}">');
         document.write('<p style="font-size=5px;color:black;" class="truncate">Doc Name: {{$file->filename}}</p></a>');
         document.write('<p class="truncate">New Name: {{$file->fakename}}</p>');
         document.write('</div>');
         document.write('</div>');
       }
     </script>
     @endforeach

      </div>
    </div>


    <div id="rars&zips" style="display:none;">
      <div class="row">
        <h5>&nbsp Uploaded Rar & Zips</h5>
    @foreach ($files as $file)
    <script>
    var fileName = 'https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}';
    var extension = fileName.split('.').pop();
    if(extension=="rar"){

      document.write('<div class="col s12 m6 l2">');
      document.write('<div class="card" style="height:180px;">');
      document.write('<div class="card-image waves-effect waves-block waves-light" style="height:100px;">');
      document.write('<img src="img/icons8-RAR-50.png" />');
      document.write('</div>');
      document.write('<a href="https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}">');
      document.write('<p style="font-size=5px;color:black;" class="truncate">Doc Name: {{$file->filename}}</p></a>');
      document.write('<p class="truncate">New Name: {{$file->fakename}}</p>');
      document.write('</div>');
      document.write('</div>');

      }

      else if(extension=="zip"){
        document.write('<div class="col s12 m6 l2">');
        document.write('<div class="card" style="height:180px;">');
        document.write('<div class="card-image waves-effect waves-block waves-light" style="height:100px;">');
        document.write('<img src="img/icons8-ZIP-50.png" />');
        document.write('</div>');
        document.write('<a href="https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}">');
        document.write('<p style="font-size=5px;color:black;" class="truncate">Doc Name: {{$file->filename}}</p></a>');
        document.write('<p class="truncate">New Name: {{$file->fakename}}</p>');
        document.write('</div>');
        document.write('</div>');
      }
    </script>
     @endforeach

      </div>
    </div>



  <script>
  var totafilelsize=0;var countpic=0;var countmic=0;var countvid=0;var countdoc=0;var countzip=0;countpdf=0;
  var filesizepic=0;var filesizeallfiles=0; var filesizemic=0; var filesizevid=0; var filesizedoc=0; var filesizezip=0; var filesizepdf=0;
  </script>


    <div class="row" id="gridviewrow">
    <h5>&nbsp Uploaded Files</h5>

     @foreach ($files as $file)

        <div class="col s12 m6 l2">

          <div class="card" id="{{$file->id}}cardgrid" style="height:220px;">

             <!--Modal Trigger -->
            <div data-target="{{$file->id}}gridpopup" class="modal-trigger">
            <div class="card-image waves-effect waves-block waves-light" style="height:100px;">

                 <script>
                     totafilelsize=totafilelsize+({{$file->size}});
                     var fileName = 'https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}';


                     var extension = fileName.split('.').pop();
                       if(extension=="pdf"){
                         countpdf=countpdf+1;
                         filesizepdf=filesizepdf+({{$file->size}});
                         document.write('<iframe src="https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}" style="width:600px; height:100px;" frameborder="0"></iframe>');

                         }

                       else if(extension=="jpg" || extension=="png" || extension=="jpeg"){
                         countpic=countpic+1;
                         filesizepic=filesizepic+({{$file->size}});
                         document.write('<img src="https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}"/>');
                         }

                         else if(extension=="mp3" || extension=="amw" || extension=="wmv"){
                           countmic=countmic+1;
                           filesizemic=filesizemic+({{$file->size}});
                           document.write('<img src="https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}"/>');
                           }

                       else if(extension=="doc" || extension=="docx" || extension=="txt"){
                         countdoc=countdoc+1;
                         filesizedoc=filesizedoc+({{$file->size}});
                        document.write('<img src="img/icons8-DOC-50.png" height="100px">');
                        }

                       else if(extension=="rar" || extension=="zip"){
                         countzip=countzip+1;
                         filesizezip=filesizezip+({{$file->size}});
                        document.write('<img src="img/icons8-RAR-50.png">');
                        }

                       else if(extension=="mp4" || extension=="mkv"){
                         countvid=countvid+1;
                         filesizevid=filesizevid+({{$file->size}});
                         document.write('<img src="img/icons8-YouTube-50.png"/>');
                         }

                </script>
             </div>
           </div>

       <div id="{{$file->id}}gridpopup" class="modal">
         <div class="modal-content">
             <h5><b>File Name:</b> {{$file->filename}}</h5>
             <script>
               var rd = {{$file->size}}.toFixed(4);
               document.write('<h5><b>File Size:</b>'+rd+'GB</h5>');
              </script>

             <h5><b>Uploaded Date:</b> {{$file->created_date}}</h5>
           </div>
       </div>

    <div class="card-content" style="height:120px;">
      <div class="row">
        <a href="https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}">
        <p style="font-size=5px;color:black;" class="truncate">Doc Name: {{$file->filename}}</p></a>
        <p class="truncate">New Name: {{$file->fakename}}</p>
      </div>

      <div class="row">
          <div class="col l4">
          <a class="modal-trigger" href="#{{$file->id}}modgrid"><i class="material-icons" style="cursor:pointer;color:#0d47a1;">mode_edit</i></a>
        </div>

        <div class="col l4">
          <a href="https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}" download>
          <i class="material-icons" style="color:#0d47a1;">file_download</i></a>
        </div>
        <div class="col l4">
            <form id="{{$file->id}}deleteformgrid" action="{{route('deletefile')}}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{$file->id}}">
            <button type="submit" style="background-color:Transparent;border:none;"><i class="material-icons" style="color:black;">delete</i></button>
          </form>

        </div>
      </div>

          <!-- Modal Structure -->
          <div id="{{$file->id}}modgrid" class="modal">
            <div class="modal-content">
              <h5>File Name Already Exist: {{$file->filename}}</h5>
              <form method="POST" id="{{$file->id}}frmgrid" action="{{route('updatefilename')}}">
                {{csrf_field()}}
                <input type="text" name="newfilename" id="name{{$file->id}}grid" placeholder="Change Your File Name"  required>

                <input type="hidden" name="newfileid" value="{{$file->id}}" id="id{{$file->id}}grid">

                <button type="submit" class="btn">Send</button>

              </form>

            </div>
          </div>
       </div>
    </div>
</div>
 @endforeach
 <script>

 document.getElementById("countmicdisplay").innerHTML=countmic;
document.getElementById("countpicdisplay").innerHTML=countpic;
document.getElementById("countviddisplay").innerHTML=countvid;
document.getElementById("countdocdisplay").innerHTML=countdoc+countpdf;
document.getElementById("countzipdisplay").innerHTML=countzip;
document.getElementById("countfilesdisplay").innerHTML=countmic+countpic+countvid+countdoc+countpdf+countzip;

var docpdf=filesizedoc+filesizepdf;
var all=filesizepic+filesizemic+filesizevid+filesizezip+filesizedoc+filesizepdf;
var filesizepicrd = filesizepic.toFixed(4);
var filesizemicrd = filesizemic.toFixed(4);
var filesizevidrd = filesizevid.toFixed(4);
var filesizeziprd = filesizezip.toFixed(4);
var docpdfrd=docpdf.toFixed(4);
var allrd=all.toFixed(4);
document.getElementById("filesizepicdisplay").innerHTML=filesizepicrd+'GB';
document.getElementById("filesizemicdisplay").innerHTML=filesizemicrd+'GB';
document.getElementById("filesizeviddisplay").innerHTML=filesizevidrd+'GB';
document.getElementById("filesizedocdisplay").innerHTML=docpdfrd+'GB';
document.getElementById("filesizezipdisplay").innerHTML=filesizeziprd+'GB';
document.getElementById("filesizeallfilesdisplay").innerHTML=allrd+'GB';


var remainsize=5-allrd;

document.getElementById("filesizebar").innerHTML="Your Total file size:"+" "+allrd+" "+"GB and Your remaining file size: "+remainsize+"GB";

if(allrd==5){
  document.getElementById("buttonupload").style.display="none";
}
 </script>
 </div>





     <div class="row" id="listviewrow" style="display:none;">

        @foreach ($files as $file)

         <div class="col s12 m12 l12">

         <div class="card" id="{{$file->id}}listcard" style="height:80px;">

        <!--Modal Trigger -->

<div class="row" style="height:50px;">

  <div class="col s3 m1 l1">
  <div data-target="{{$file->id}}listpopup" class="modal-trigger">
         <div class="card-image waves-effect waves-block waves-light" width="75%">

         <script>
           totafilelsize=totafilelsize+({{$file->size}});
         var fileName = 'https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}';


         var extension = fileName.split('.').pop();
         if(extension=="pdf"){
           document.write('<img src="img/icons8-PDF-50.png" width="50px" height="50px">');
         }
        else if(extension=="jpg" || extension=="png" || extension=="jpeg"){
           document.write('<img src="img/icons8-Image File-50.png" height="50px"/>');
         }
       else if(extension=="doc" || extension=="docx" || extension=="txt"){
           document.write('<img src="img/icons8-DOC-50.png" height="50px">');
         }
       else if(extension=="zip"){
           document.write('<img src="img/icons8-ZIP-50.png" height="50px">');
         }
         else if(extension=="rar"){
           document.write('<img src="img/icons8-RAR-50.png" height="50px">');
         }
       </script>
     </div>
   </div>
     <div id="{{$file->id}}listpopup" class="modal">
       <div class="modal-content">
             <h5><b>File Name:</b> {{$file->filename}}</h5>
             <script>
               var rd = {{$file->size}}.toFixed(4);
               document.write('<h5><b>File Size:</b>'+rd+'GB</h5>');
              </script>

             <h5><b>Uploaded Date:</b> {{$file->created_date}}</h5>
           </div>
     </div>
       </div>



     <div class="col s7 m8 l8">
        <div>
            <a  style="font-size:12px;color:black;" href="https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}">
                Original File Name: {{$file->filename}}</a>
         </div>
         <div style="font-size:12px;color:black;">
                 Customized File Name: {{$file->fakename}}</a>
          </div>

         <div style="font-size:12px;color:black;">
            <script>
              var flsz = {{$file->size}}.toFixed(4);
              document.write('Size: '+flsz+'GB');
            </script>
          </div>

          <div style="font-size:12px;color:black;">
            Last uploaded date: {{$file->created_date}}
          </div>
     </div>


<div class="col s2 m2 l2">
  <div class="row"></div>
         <div class="row">
           <div class="col s12 m4 l4">
              <a class="modal-trigger" href="#{{$file->id}}mod">
                <i class="material-icons" style="cursor:pointer;color:#0d47a1;">mode_edit</i></a>
           </div>

           <div class="col s12 m4 l4">
               <a href="https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}" download>
               <i class="material-icons" style="color:#0d47a1;">file_download</i></a>
            </div>

            <div class="col s12 m4 l4">
               <form id="{{$file->id}}deleteformlist" action="{{route('deletefile')}}" method="POST">
                 {{ csrf_field() }}
                 <input type="hidden" name="id" value="{{$file->id}}">
                 <button type="submit" style="background-color:Transparent;border:none;"><i class="material-icons" style="color:black;">delete</i></button>
                 </form>
          </div>
        </div>
          <!-- Modal Structure -->
         <div id="{{$file->id}}mod" class="modal">
            <div class="modal-content">
              <h5>File Name Already Exist: {{$file->fakename}}</h5>
              <form method="POST" id="{{$file->id}}frmgrid" action="{{route('updatefilename')}}">
                {{csrf_field()}}
                <input type="text" name="newfilename" id="name{{$file->id}}grid" placeholder="Change Your File Name"  required>

                <input type="hidden" name="newfileid" value="{{$file->id}}" id="id{{$file->id}}grid">

                <button type="submit" class="btn">Send</button>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

       <div id="{{$file->id}}" class="modal">
         <div class="modal-content">
           <h5><b>File Name:</b> {{$file->filename}} </h5>
           <script>
             var rd = {{$file->size}}.toFixed(4);
             document.write('<h5><b>File Size:</b>'+rd+'GB</h5>');
            </script>

           <h5><b>Uploaded Date:</b> {{$file->created_date}}</h5>
         </div>
       </div>


   @endforeach

       </div>


</div>
</div>

</div>
 <form id="fileUploadForm" method="post" enctype="multipart/form-data" action="{{route('uploadfile')}}">
     {{csrf_field()}}
     <div class="file-field input-field">
     <div class="fixed-action-btn" style="margin-bottom:10%;">
      <button class="btn btn-floating halfway-fab right waves-effect pulse btn-large waves-light" data-position="top" data-delay="50">
      <i class="material-icons">file_upload</i>
      <input type="file" name="file" id="file"  id="buttonupload" onchange="uploadFile()" placeholder required>

      </button>
      </div>
       </div>

     </form>

 <form class="" id="filenameform" action="{{route('uploadfile')}}" method="post">
  {{csrf_field()}}
  <input type="hidden" name="filename" value="" id="filenameinput">
  <input type="hidden" name="filesize" value="" id="filesizeinput">
</form>
 <script type="text/javascript">
    AWS.config.update({
            accessKeyId : 'AKIAIZ53HQQ6SFH3XHDQ',
            secretAccessKey : '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'
    });
    AWS.config.region = 'ap-southeast-1';
</script>
<script type="text/javascript">
   function uploadFile(){
     document.getElementById("progressdiv").style.display="inline";

        var formup=document.getElementById("fileUploadForm");
        var bucket = new AWS.S3({params: {Bucket: 'lifewithgoals'}});
        var fileChooser = document.getElementById('file');
        var filename=document.getElementById('file').value;
        var file = fileChooser.files[0];
        var tempfilename=file.name;
        var tempfilesize=(file.size)/(1024*1024*1024);
        var filenameinput=document.getElementById('filenameinput');
        var filesizeinput=document.getElementById('filesizeinput');
        var newfilenameform=document.getElementById('filenameform');

if (file) {

    var params = {
    Key: tempfilename, ContentType: file.type, Body: file};
    bucket.upload(params).on('httpUploadProgress', function(evt) {
        console.log("Uploaded :: " + parseInt((evt.loaded * 100) / evt.total)+'%');
        document.getElementById("percentage").style.width=(parseInt((evt.loaded * 100) / evt.total)+'%');
        document.getElementById("percentagedis").innerHTML=(parseInt((evt.loaded * 100) / evt.total)+'%');
        if((parseInt((evt.loaded * 100) / evt.total)+'%')=="100%"){
          document.getElementById("progressdiv").style.display="none";
        }
}).send(function(err, data) {
filenameinput.value=tempfilename;
filesizeinput.value=tempfilesize;
newfilenameform.submit();


// window.location.href = "index.php?filename="+tempfilename;


});
<!-- //formup.submit();

  }
   }
</script>


@endsection
